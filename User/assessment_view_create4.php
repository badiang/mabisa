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

    if (isset($_GET['tab'])) {
        $temp = explode("/", $_GET['tab']);
        $key = $temp[0];
        $area = $temp[1];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM assessment where keyctr=?");
        $stmt->bindParam(1, $key);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count >= 1) {
            $query = $dbconn->prepare("SELECT a.keyctr,a.id,a.year,a.date_time,a.status,c.region_name,d.province_name,e.city_name,f.barangay_name FROM assessment as a  inner join region as c on a.region_code=c.region_code inner join province as d on a.province_code=d.province_code inner join city as e on a.city_code=e.city_code inner join barangay as f on a.barangay_code=f.barangay_code where a.keyctr=?");
            $query->bindParam(1, $key);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            $region_name = $result['region_name'];
            $province_name = $result['province_name'];
            $city_name = $result['city_name'];
            $barangay_name = $result['barangay_name'];
            $year = $result['year'];
            $_SESSION['view_year'] = $year;
            //$status = $result['status'];
        }else{
?>
            <script type="text/javascript">
                window.location="../";
            </script>
<?php
        }
        
    }else{
?>
        <script type="text/javascript">
            window.location="../";
        </script>
<?php
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
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4><b>Barangay <?php echo $barangay_name ?></b></h4>
                                    <h5>Basic Information</h5>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2"><b>Region</b></div>
                                        <div class="col-lg-9"><?php echo $region_name ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2"><b>Province</b></div>
                                        <div class="col-lg-9"><?php echo $province_name ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2"><b>Municipality</b></div>
                                        <div class="col-lg-9"><?php echo $city_name ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2"><b>Barangay</b></div>
                                        <div class="col-lg-9"><?php echo $barangay_name ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2"><b>Year</b></div>
                                        <div class="col-lg-9"><?php echo $year ?></div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2"><b>Status</b></div>
                                        <div class="col-lg-9">
                                            <?if ($status == 0) {?>
                                                <span class="btn-sm btn btn-primary">In Progress</span>
                                            <?}else{?>
                                                <span><?php echo $status ?></span>
                                            <?}?>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-center py-3">
                            <div class="row">
                                <div class="col-lg-12"><h5 class="text-white"><b>Essential Governance Area No. 1:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Social Protection and Sensitivity</b></h5></div>
                            </div>
                        </div>
                        <div class="card-body" id="viewLocation">
                        <p style="text-align: right; padding-right: 25px;">Legends&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="btn btn-sm btn-danger btn-circle">
                                        <i class="">&times;</i>
                                    </span>&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="btn btn-sm btn-success btn-circle">
                                        <i class="fas fa-check"></i>
                                    </span>&nbsp;&nbsp;Yes
                                </p>
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>4.1 Functionality of Barangay Violence Against Women (VAW) Desk</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.1.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Executive Order or similar issuance on the establishment of the Barangay VAW Desk and designated VAW Desk Officer</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile411()" name="file_report_411" id="file_report_411" accept=".pdf" hidden>
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename411 = $id.$year.'file411.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename411)) { ?>
                                                    <a href="<?php echo $filePath.$filename411 ?>" target="_blank"><?php echo $filename411 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename411 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_411()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename411)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.1.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                                                <?php 
                                                    $filename412 = $id.$year.'file412.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile412()" name="file_report_412" id="file_report_412" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename412)) { ?>
                                                    <a href="<?php echo $filePath.$filename412 ?>" target="_blank"><?php echo $filename412 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename412 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_412()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename412)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.1.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved 2023 Barangay Gender and Development (GAD) Plan and Budget</td>
                                                <?php 
                                                    $filename413 = $id.$year.'file413.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile413()" name="file_report_413" id="file_report_413" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename413)) { ?>
                                                    <a href="<?php echo $filePath.$filename413 ?>" target="_blank"><?php echo $filename413 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename413 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_413()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename413)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.1.4</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monthly Accomplishment Reports for CY 2023 (October-December 2023)</td>
                                                <?php 
                                                    $filename414 = $id.$year.'file414.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile414()" name="file_report_414" id="file_report_414" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename414)) { ?>
                                                    <a href="<?php echo $filePath.$filename414 ?>" target="_blank"><?php echo $filename414 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename414 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_414()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename414)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.1.5</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Updated database on VAW cases reported to the Barangay</td>
                                                <?php 
                                                    $filename415 = $id.$year.'file415.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile415()" name="file_report_415" id="file_report_415" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename415)) { ?>
                                                    <a href="<?php echo $filePath.$filename415 ?>" target="_blank"><?php echo $filename415 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename415 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_415()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename415)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.1.6</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>CY 2023 GAD Accomplishment Report</td>
                                                <?php 
                                                    $filename416 = $id.$year.'file416.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile416()" name="file_report_416" id="file_report_416" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename416)) { ?>
                                                    <a href="<?php echo $filePath.$filename416 ?>" target="_blank"><?php echo $filename416 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename416 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_416()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename416)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>4.2 Access to Health and Social Welfare Services in the Barangay</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.2.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentation of the BHS/C</td>
                                                <?php 
                                                    $filename417 = $id.$year.'file417.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile417()" name="file_report_417" id="file_report_417" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename417)) { ?>
                                                    <a href="<?php echo $filePath.$filename417 ?>" target="_blank"><?php echo $filename417 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename417 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_417()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename417)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.2.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance on the appointment of BHW</td>
                                                <?php 
                                                    $filename418 = $id.$year.'file418.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile418()" name="file_report_418" id="file_report_418" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename418)) { ?>
                                                    <a href="<?php echo $filePath.$filename418 ?>" target="_blank"><?php echo $filename418 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename418 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_418()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename418)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.2.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance on the appointment of BNS</td>
                                                <?php 
                                                    $filename419 = $id.$year.'file419.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile419()" name="file_report_419" id="file_report_419" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename419)) { ?>
                                                    <a href="<?php echo $filePath.$filename419 ?>" target="_blank"><?php echo $filename419 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename419 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_419()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename419)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.2.4</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentations of the operations of the BHS/C</td>
                                                <?php 
                                                    $filename420 = $id.$year.'file420.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile420()" name="file_report_420" id="file_report_420" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename420)) { ?>
                                                    <a href="<?php echo $filePath.$filename420 ?>" target="_blank"><?php echo $filename420 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename420 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_420()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename420)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Barangay Issuances on the provision of health services</td>
                                                <?php 
                                                    $filename421 = $id.$year.'file421.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile421()" name="file_report_421" id="file_report_421" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename421)) { ?>
                                                    <a href="<?php echo $filePath.$filename421 ?>" target="_blank"><?php echo $filename421 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename421 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_421()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename421)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>4.3 Functionality of the Barangay Development Council (BDC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.3.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance organizing the BDC with its composition compliant to Section 107 of RA 7160</td>
                                                <?php 
                                                    $filename422 = $id.$year.'file422.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile422()" name="file_report_422" id="file_report_422" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename422)) { ?>
                                                    <a href="<?php echo $filePath.$filename422 ?>" target="_blank"><?php echo $filename422 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename422 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_422()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename422)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.3.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Minutes (at least 2) of the public hearing/Barangay assemblies with attendance sheet</td>
                                                <?php 
                                                    $filename423 = $id.$year.'file423.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile423()" name="file_report_423" id="file_report_423" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename423)) { ?>
                                                    <a href="<?php echo $filePath.$filename423 ?>" target="_blank"><?php echo $filename423 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename423 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_423()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename423)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.3.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Barangay Development Plan with BDC and SB Resolutions adopting such</td>
                                                <?php 
                                                    $filename424 = $id.$year.'file424.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile424()" name="file_report_424" id="file_report_424" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename424)) { ?>
                                                    <a href="<?php echo $filePath.$filename424 ?>" target="_blank"><?php echo $filename424 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename424 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_424()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename424)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.3.4</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>CY 2023 Accomplishment Report of the BDP</td>
                                                <?php 
                                                    $filename425 = $id.$year.'file425.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile425()" name="file_report_425" id="file_report_425" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename425)) { ?>
                                                    <a href="<?php echo $filePath.$filename425 ?>" target="_blank"><?php echo $filename425 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename425 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_425()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename425)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>4.4 Implementation of the Kasambahay Law</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.4.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance designating a Kasambahay Desk and a KDO</td>
                                                <?php 
                                                    $filename426 = $id.$year.'file426.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile426()" name="file_report_426" id="file_report_426" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename426)) { ?>
                                                    <a href="<?php echo $filePath.$filename426 ?>" target="_blank"><?php echo $filename426 ?></a>&nbsp;&nbsp;<span onclick="delete_file4('<?php echo $filePath.$filename426 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_426()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename426)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.4.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Updated Kasambahay Report Form 2 (Kasambahay Masterlist) as of December 2023</td>
                                                <?php 
                                                    $filename427 = $id.$year.'file427.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile427()" name="file_report_427" id="file_report_427" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename427)) { ?>
                                                    <a href="<?php echo $filePath.$filename427 ?>" target="_blank"><?php echo $filename427 ?></a>&nbsp;&nbsp;<span onclick="delete_file4('<?php echo $filePath.$filename427 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_427()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename427)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>4.5 Functionality of the Barangay Council for the Protection of Children (BCPC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.5.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Executive Order or similar Issuance on the extablishment Barangay Council for Protection of Children (BCPC)</td>
                                                <?php 
                                                    $filename428 = $id.$year.'file428.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile428()" name="file_report_428" id="file_report_428" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename428)) { ?>
                                                    <a href="<?php echo $filePath.$filename428 ?>" target="_blank"><?php echo $filename428 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename428 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_428()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename428)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.5.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                                                <?php 
                                                    $filename429 = $id.$year.'file429.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile429()" name="file_report_429" id="file_report_429" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename429)) { ?>
                                                    <a href="<?php echo $filePath.$filename429 ?>" target="_blank"><?php echo $filename429 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename429 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_429()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename429)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.5.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved BCPC Annual Work and FInancial Plan (AWFP)</td>
                                                <?php 
                                                    $filename430 = $id.$year.'file430.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile430()" name="file_report_430" id="file_report_430" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename430)) { ?>
                                                    <a href="<?php echo $filePath.$filename430 ?>" target="_blank"><?php echo $filename430 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename430 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_430()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename430)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.5.4</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Updated database on children</td>
                                                <?php 
                                                    $filename431 = $id.$year.'file431.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile431()" name="file_report_431" id="file_report_431" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename431)) { ?>
                                                    <a href="<?php echo $filePath.$filename431 ?>" target="_blank"><?php echo $filename431 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename431 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_431()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename431)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.5.5</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Updated Localized Flow Chart of Referral System</td>
                                                <?php 
                                                    $filename432 = $id.$year.'file432.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile432()" name="file_report_432" id="file_report_432" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename432)) { ?>
                                                    <a href="<?php echo $filePath.$filename432 ?>" target="_blank"><?php echo $filename432 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename432 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_432()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename432)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.5.6</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>CY 2023 Approved Accomplishment Report on BCPC Plan</td>
                                                <?php 
                                                    $filename433 = $id.$year.'file433.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile433()" name="file_report_433" id="file_report_433" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename433)) { ?>
                                                    <a href="<?php echo $filePath.$filename433 ?>" target="_blank"><?php echo $filename433 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename433 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_433()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename433)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>4.6 Mechanism for Gender and Development (GAD)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.6.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance organizing the Barangay GAD Focal Point System</td>
                                                <?php 
                                                    $filename434 = $id.$year.'file434.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile434()" name="file_report_434" id="file_report_434" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename434)) { ?>
                                                    <a href="<?php echo $filePath.$filename434 ?>" target="_blank"><?php echo $filename434 ?></a>&nbsp;&nbsp;<span onclick="delete_file6('<?php echo $filePath.$filename434 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_434()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename434)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>4.7 Maintenance of Ipdated Record of Barangay Inhabitants (RBIs)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.7.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Accomplished RBI Form A of two semesters of CY 2023</td>
                                                <?php 
                                                    $filename435 = $id.$year.'file435.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile435()" name="file_report_435" id="file_report_435" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename435)) { ?>
                                                    <a href="<?php echo $filePath.$filename435 ?>" target="_blank"><?php echo $filename435 ?></a>&nbsp;&nbsp;<span onclick="delete_file7('<?php echo $filePath.$filename435 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_435()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename435)) { ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class="">&times;</i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
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
<script src="assessment_view_create4.js"></script>
</body>

</html>
