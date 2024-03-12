
<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    // if(!$_SESSION['idno']){ header('location:../actions/logout.php'); }
    require_once '../actions/dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../lib/top.php' ?>
    <script src="own.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div style="float: left;">
                                <h6 class="m-0 font-weight-bold text-primary">Location Table</h6>
                                <small>Note: Only the Barangay can be edited.</small>
                            </div>
                            <div style="float: right;">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addLocation">Add Location</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="viewLocation" width="100%" cellspacing="0">
                                    <?php 
                                      // $stmt = $dbconn->prepare("SELECT COUNT(*) FROM pos.received_from where area_code=? and cmp_code=? ");
                                      $stmt = $dbconn->prepare("SELECT COUNT(*) FROM country as a inner join region as b on a.country_code=b.country_code inner join province as c on b.region_code=c.region_code inner join city as d on c.province_code=d.province_code inner join barangay as e on d.city_code=e.city_code");
                                      $stmt->execute();
                                      $count = $stmt->fetchColumn();

                                      if ($count != 0) {
                                   ?>
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>Region</th>
                                            <th>Province</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php if ($count > 10) { ?>
                                    <tfoot>
                                        <tr>
                                            <th>Country</th>
                                            <th>Region</th>
                                            <th>Province</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <?php } ?>
                                    <tbody>
                                        <?php 
                                        // $query = $dbconn->prepare("SELECT * FROM pos.received_from where area_code=? and cmp_code=? order by brand_name");
                                        $query = $dbconn->prepare("SELECT a.country_name,b.region_name,c.province_name,d.city_name,e.barangay_name,e.barangay_code FROM country as a inner join region as b on a.country_code=b.country_code inner join province as c on b.region_code=c.region_code inner join city as d on c.province_code=d.province_code inner join barangay as e on d.city_code=e.city_code");
                                        // $query->bindParam(1, $area_code);
                                        // $query->bindParam(2, $cmp_code);
                                        $query->execute();
                                        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                       ?>
                                        <tr>
                                            <td><?php echo $row['country_name'] ?></td>
                                            <td><?php echo $row['region_name'] ?></td>
                                            <td><?php echo $row['province_name'] ?></td>
                                            <td><?php echo $row['city_name'] ?></td>
                                            <td><?php echo $row['barangay_name'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info btn-circle" onclick="edit_location('<?php echo $row['barangay_code'] ?>')" data-toggle="modal" data-target="#editLocation">
                                                  <i class="fas fa-edit"></i>
                                              </a>
                                              <a href="#" class="btn btn-sm btn-danger btn-circle" onclick="delete_location('<?php echo $row['barangay_code'] ?>')">
                                                  <i class="fas fa-trash"></i>
                                              </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <?php }else{ ?>
                                        <tbody>
                                            <tr>
                                                <td>No Results Found..</td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include '../lib/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

<?php include '../lib/bot.php' ?>

</body>

</html>

<div class="modal fade" id="addLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Add Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="mt-4 mb-4">
            <div id="alert"></div>
        </div>
        <div class="form-group">
            <label for="country">Country Name</label>
            <input class="form-control" type="text" list="list_country" name="country" id="country">
            <datalist id="list_country">
                <?php 
                    $query = $dbconn->prepare("SELECT country_name FROM country ");
                    $query->execute();
                    while($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <option><?php echo $row1['country_name'] ?></option>
                <?php } ?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="region">Region Name</label>
            <input class="form-control" type="text" name="region" id="region">
            <datalist id="list_country">
                <?php 
                    $query = $dbconn->prepare("SELECT region_name FROM region");
                    $query->execute();
                    while($row2 = $query->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <option><?php echo $row2['region_name'] ?></option>
                <?php } ?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="province">Province Name</label>
            <input class="form-control" type="text" name="province" id="province">
            <datalist id="list_country">
                <?php 
                    $query = $dbconn->prepare("SELECT province_name FROM province ");
                    $query->execute();
                    while($row3 = $query->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <option><?php echo $row3['province_name'] ?></option>
                <?php } ?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="city">Municipality Name</label>
            <input class="form-control" type="text" name="city" id="city">
            <datalist id="list_country">
                <?php 
                    $query = $dbconn->prepare("SELECT city_name FROM city ");
                    $query->execute();
                    while($row4 = $query->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <option><?php echo $row4['city_name'] ?></option>
                <?php } ?>
            </datalist>
        </div>
        <div class="form-group">
            <label for="barangay">Barangay Name</label>
            <input class="form-control" type="text" name="barangay" id="barangay">
            <datalist id="list_country">
                <?php 
                    $query = $dbconn->prepare("SELECT barangay_name FROM barangay");
                    $query->execute();
                    while($row5 = $query->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <option><?php echo $row5['barangay_name'] ?></option>
                <?php } ?>
            </datalist>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveLocation()">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="editLocationForm">
      
    </div>
  </div>
</div>
<script type="text/javascript">
    $('#viewLocation').DataTable();
  //   $('#tableLocation').DataTable({
  //     responsive: {
  //     details: {
  //       type: 'column'
  //     }
  //   },
  //   columnDefs: [{
  //     className: 'control',
  //     orderable: false,
  //     targets: 0
  //   }],
  //   order: [1, 'asc']
  // });
</script>