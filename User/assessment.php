<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    if(!$_SESSION['id']){ header('location:../actions/logout.php'); }
    require_once '../actions/dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }
    $id = $_SESSION['id'];
    if (!empty($_GET['alert'])) {
        if ($_GET['alert'] == 1) {
            $stmt = $dbconn->prepare("UPDATE area_assessment_points set noti_me=false where user_id=?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
        }
    }



    
    
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../lib/top.php' ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../lib/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include '../lib/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <!-- <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="region">Region Name</label>
                                        <select class="form-control" id="region" onchange="onchange_region(this.value)">
                                           <option selected disabled>Select Region</option>
                                           <?php 
                                                $query = $dbconn->prepare("SELECT * FROM region ");
                                                $query->execute();
                                                while($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                                             ?>
                                            <option value="<?php echo $row1['region_code'] ?>"><?php echo $row1['region_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="province">Province Name</label>
                                        <select class="form-control" id="province" onchange="onchange_province(this.value)">
                                            <option selected disabled>Select Province</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="city">Municipality Name</label>
                                        <select class="form-control" id="city" onchange="onchange_city(this.value)">
                                            <option selected disabled>Select Municipality</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="barangay">Barangay Name</label>
                                        <select class="form-control" id="barangay">
                                            <option selected disabled>Select Barangay</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="assessment_year">Year</label>
                                        <select class="form-control" id="assessment_year">
                                            <option selected disabled>Select Year</option>
                                            <?php 
                                                $currentYear = date("Y");
                                                $startingYear = 1990; // Specify the starting year here

                                                for ($year = $currentYear; $year >= $startingYear; $year--) {
                                            ?>
                                                <option value="<?php echo $year ?>"><?php echo $year ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div style="float: left;">
                                <h6 class="m-0 font-weight-bold text-primary">List of Created Assessment</h6>
                            </div>
                            <div style="float: right;">
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addLocation">Add Assessment</button>
                            </div>
                        </div>
                        <div class="card-body" id="viewLocation">
                            <div class="table-responsive" id="assessmenTable">
                                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php 
                                      // $stmt = $dbconn->prepare("SELECT COUNT(*) FROM pos.received_from where area_code=? and cmp_code=? ");
                                      $stmt = $dbconn->prepare("SELECT COUNT(*) FROM assessment where id='$id'");
                                      $stmt->execute();
                                      $count = $stmt->fetchColumn();

                                      if ($count != 0) {
                                   ?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Region</th>
                                            <th>Province</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                            <th>Year</th>
                                            <th>Status</th>
                                            <th>Transaction Date & Time</th>
                                            <th class="text-center"style="width: 100px;">Action</th>
                                        </tr>
                                    </thead>
                                    <?php if ($count > 10) { ?>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Region</th>
                                            <th>Province</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                            <th>Year</th>
                                            <th>Status</th>
                                            <th>Transaction Date & Time</th>
                                            <th class="text-center"style="width: 100px;">Action</th>
                                    
                                        </tr>
                                    </tfoot>
                                    <?php } ?>
                                    <tbody>
                                        <?php 
                                        $num = 1;
                                        $query = $dbconn->prepare("SELECT a.keyctr,a.id,a.year,a.date_time,a.status,c.region_name,d.province_name,e.city_name,f.barangay_name FROM assessment as a  inner join region as c on a.region_code=c.region_code inner join province as d on a.province_code=d.province_code inner join city as e on a.city_code=e.city_code inner join barangay as f on a.barangay_code=f.barangay_code where a.id='$id'");
                                        $query->execute();
                                        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $row['date_time']);
                                            $formattedDate = $date->format('F j, Y g:i A');
                                            $g_year = $row['year'];
                                            //count complete
                                            $count_complete = 0;
                                            $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=?");
                                            $stmt->bindParam(1, $id);
                                            $stmt->bindParam(2, $g_year);
                                            $stmt->execute();
                                            $count = $stmt->fetchColumn();

                                            $count_complete = $count_complete+$count;
                                       ?>
                                        <tr>
                                            <td><?php echo $num ?></td>
                                            <td><?php echo $row['region_name'] ?></td>
                                            <td><?php echo $row['province_name'] ?></td>
                                            <td><?php echo $row['city_name'] ?></td>
                                            <td><?php echo $row['barangay_name'] ?></td>
                                            <td><?php echo $row['year'] ?></td>
                                            <?php if ($count_complete == 29) {?>
                                                <td class="bg-success text-white">Completed</td>
                                            <?php }else if($count_complete > 0){?>
                                                <td class="bg-info text-white">On Progress</td>
                                            <?php }else{?>
                                                <td>Not Completed</td>
                                            <?php }?>
                                            <td><?php echo $formattedDate; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Assessment Actions">
                                                    <a href="assessment_view.php?tab=<?php echo $row['keyctr'] ?>" class="btn btn-sm btn-info">View</a>
                                                    <a href="#" class="btn btn-sm btn-danger" onclick="delete_assessment('<?php echo $row['keyctr'] ?>')">Delete</a>
                                                </div>
                                            </td>

                                        </tr>
                                        <?php $num++;} ?>
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
<script src="assessment.js"></script>
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
            <div id="alert_a"></div>
        </div>
        <div class="form-group">
            <label for="region_a">Region Name</label>
            <select class="form-control" id="region_a" onchange="onchange_region(this.value)">
               <?php 
                    $query = $dbconn->prepare("SELECT * FROM region ");
                    $query->execute();
                    while($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <option value="<?php echo $row1['region_code'] ?>"><?php echo $row1['region_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="province_a">Province Name</label>
            <select class="form-control" id="province_a" onchange="onchange_province(this.value)">
                <?php 
                    $query = $dbconn->prepare("SELECT * FROM province ");
                    $query->execute();
                    while($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <option value="<?php echo $row1['province_code'] ?>"><?php echo $row1['province_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="city_a">Municipality Name</label>
            <select class="form-control" id="city_a" onchange="onchange_city(this.value)">
                <?php 
                    $query = $dbconn->prepare("SELECT * FROM city ");
                    $query->execute();
                    while($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <option value="<?php echo $row1['city_code'] ?>"><?php echo $row1['city_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="barangay_a">Barangay Name</label>
            <select class="form-control" id="barangay_a">
                <?php 
                    $query = $dbconn->prepare("SELECT * FROM barangay ");
                    $query->execute();
                    while($row1 = $query->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <option value="<?php echo $row1['barangay_code'] ?>"><?php echo $row1['barangay_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="year_a">Year</label>
            <select class="form-control" id="year_a">
                <option selected disabled>Select Year</option>
                <?php 
                    $end = date("Y");
                    $end = $end+10;
                    $start = 2024; // Specify the starting year here

                    for ($year = $end; $year >= $start; $year--) {
                ?>
                    <option value="<?php echo $year ?>"><?php echo $year ?></option>
                <?php } ?>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveAssessment()">Save</button>
      </div>
    </div>
  </div>
</div>
