<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    if(!$_SESSION['id']){ header('location:../logout.php'); }
    require_once '../../dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }

    $date_ = date('Y-m-d');
    $time_ = date('H:i:s');
    $year_ = date('Y');
    $id = $_SESSION['id'];

    if (isset($_POST['view'])) {

        $query = $dbconn->prepare("SELECT a.keyctr,a.id,a.year,a.date_time,c.region_name,d.province_name,e.city_name,f.barangay_name FROM assessment as a  inner join region as c on a.region_code=c.region_code inner join province as d on a.province_code=d.province_code inner join city as e on a.city_code=e.city_code inner join barangay as f on a.barangay_code=f.barangay_code where id!='$id'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
?>
<div class="card shadow mb-4">
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
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div style="float: left;">
                                <h6 class="m-0 font-weight-bold text-primary">List of Barangay Assessment Result</h6>
                            </div>
                            <!-- <div style="float: right;">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addLocation">Add User</button>
                            </div> -->
                        </div>
                        <div class="card-body" id="viewLocation">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <?php 
                                      // $stmt = $dbconn->prepare("SELECT COUNT(*) FROM pos.received_from where area_code=? and cmp_code=? ");
                                      $stmt = $dbconn->prepare("SELECT COUNT(*) FROM assessment where id!='$id'");
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
                                            <th>Action</th>
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
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <?php } ?>
                                    <tbody>
                                        <?php 
                                        $num = 1;
                                        // $query = $dbconn->prepare("SELECT * FROM pos.received_from where area_code=? and cmp_code=? order by brand_name");
                                        $query = $dbconn->prepare("SELECT a.keyctr,a.id,a.year,a.date_time,c.region_name,d.province_name,e.city_name,f.barangay_name FROM assessment as a  inner join region as c on a.region_code=c.region_code inner join province as d on a.province_code=d.province_code inner join city as e on a.city_code=e.city_code inner join barangay as f on a.barangay_code=f.barangay_code where id!='$id'");
                                        // $query->bindParam(1, $area_code);
                                        // $query->bindParam(2, $cmp_code);
                                        $query->execute();
                                        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $row['date_time']);
                                            $formattedDate = $date->format('F j, Y g:i A');
                                       ?>
                                        <tr>
                                            <td><?php echo $num ?></td>
                                            <td><?php echo $row['region_name'] ?></td>
                                            <td><?php echo $row['province_name'] ?></td>
                                            <td><?php echo $row['city_name'] ?></td>
                                            <td><?php echo $row['barangay_name'] ?></td>
                                            <td><?php echo $row['year'] ?></td>
                                            <td>Not Started</td>
                                            <td><?php echo $formattedDate; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info" onclick="view_ass('<?php echo $row['keyctr'] ?>')">view</a>
                                              <!-- <a href="#" class="btn btn-sm btn-danger btn-circle" onclick="delete_user('<?php echo $row['id'] ?>')">
                                                  <i class="fas fa-trash"></i>
                                              </a> -->
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
<?php } ?>