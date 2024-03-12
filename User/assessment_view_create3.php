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
                                <div class="col-lg-12"><h5 class="text-white"><b>Core Governance Area No. 3:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Safety, Peace and Order</b></h5></div>
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
                                <div class="col-lg-12 text-center text-white"><b>3.1 Functionality of the Barangay Anti-Drug Abuse Council (BADAC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 3.1.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Executive Order or similar issuance creating the BADAC with its composition and appropriate committees (Committees on Operations and on Advocacy)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile311()" name="file_report_311" id="file_report_311" accept=".pdf" hidden>
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename311 = $id.$year.'file311.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename311)) { ?>
                                                    <a href="<?php echo $filePath.$filename311 ?>" target="_blank"><?php echo $filename311 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename311 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_311()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename311)) { ?>
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
                                            <th class="text-center">Reports 3.1.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance establishing the Rehabilitation Referral Desk</td>
                                                <?php 
                                                    $filename312 = $id.$year.'file312.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile312()" name="file_report_312" id="file_report_312" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename312)) { ?>
                                                    <a href="<?php echo $filePath.$filename312 ?>" target="_blank"><?php echo $filename312 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename312 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_312()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename312)) { ?>
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
                                            <th class="text-center">Reports 3.1.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved Barangay Appropriation Ordinance</td>
                                                <?php 
                                                    $filename313 = $id.$year.'file313.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile313()" name="file_report_313" id="file_report_313" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename313)) { ?>
                                                    <a href="<?php echo $filePath.$filename313 ?>" target="_blank"><?php echo $filename313 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename313 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_313()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename313)) { ?>
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
                                            <th class="text-center">Reports 3.1.4</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved BADAC Plan of Action</td>
                                                <?php 
                                                    $filename314 = $id.$year.'file314.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile314()" name="file_report_314" id="file_report_314" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename314)) { ?>
                                                    <a href="<?php echo $filePath.$filename314 ?>" target="_blank"><?php echo $filename314 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename314 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_314()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename314)) { ?>
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
                                            <th class="text-center">Reports 3.1.5</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Transmittal of CIR (stamp received) to CADAC/MADAC and Local PNP Unit</td>
                                                <?php 
                                                    $filename315 = $id.$year.'file315.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile315()" name="file_report_315" id="file_report_315" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename315)) { ?>
                                                    <a href="<?php echo $filePath.$filename315 ?>" target="_blank"><?php echo $filename315 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename315 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_315()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename315)) { ?>
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
                                            <th class="text-center">Reports 3.1.6</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Annual BADAC Accomplishment and Fund Utilization Report submitted not later than the 20th day of January (stamp received) to the CADAC/MADAC</td>
                                                <?php 
                                                    $filename316 = $id.$year.'file316.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile316()" name="file_report_316" id="file_report_316" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename316)) { ?>
                                                    <a href="<?php echo $filePath.$filename316 ?>" target="_blank"><?php echo $filename316 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename316 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_316()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename316)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>3.2 Functionality of the Barangay Peace and Order Committee (BPOC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 3.2.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Executive Order or similar issuance indicating correct membership on accordance to the EO 366 s. of 1996</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile317()" name="file_report_317" id="file_report_317" accept=".pdf" hidden>
                                                <?php 
                                                    $filename317 = $id.$year.'file317.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename317)) { ?>
                                                    <a href="<?php echo $filePath.$filename317 ?>" target="_blank"><?php echo $filename317 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename317 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_317()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename317)) { ?>
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
                                            <th class="text-center">Reports 3.2.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved BPOPS Plan</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile318()" name="file_report_318" id="file_report_318" accept=".pdf" hidden>
                                                <?php 
                                                    $filename318 = $id.$year.'file318.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename318)) { ?>
                                                    <a href="<?php echo $filePath.$filename318 ?>" target="_blank"><?php echo $filename318 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename318 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_318()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename318)) { ?>
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
                                            <th class="text-center">Reports 3.2.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Accomplishment Report (in any format) Submitted to the C/M POC on the prescribed schedules (stamp received)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile319()" name="file_report_319" id="file_report_319" accept=".pdf" hidden>
                                                <?php 
                                                    $filename319 = $id.$year.'file319.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename319)) { ?>
                                                    <a href="<?php echo $filePath.$filename319 ?>" target="_blank"><?php echo $filename319 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename319 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_319()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename319)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>3.3 Functionality of the Lupong Tagapamayapa (LT)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 3.3.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Appointment of the Lupong Tagapamayapa</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile320()" name="file_report_320" id="file_report_320" accept=".pdf" hidden>
                                                <?php 
                                                    $filename320 = $id.$year.'file320.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename320)) { ?>
                                                    <a href="<?php echo $filePath.$filename320 ?>" target="_blank"><?php echo $filename320 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename320 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_320()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename320)) { ?>
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
                                            <th class="text-center">Reports 3.3.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>For Barangay of cities: 2 photo with caption of the computer database with searchable information</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile321()" name="file_report_321" id="file_report_321" accept=".pdf" hidden>
                                                <?php 
                                                    $filename321 = $id.$year.'file321.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename321)) { ?>
                                                    <a href="<?php echo $filePath.$filename321 ?>" target="_blank"><?php echo $filename321 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename321 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_321()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename321)) { ?>
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
                                            <td>For Barangay of municipalities : 1 photo, with caption on the manual and digital file</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile322()" name="file_report_322" id="file_report_322" accept=".pdf" hidden>
                                                <?php 
                                                    $filename322 = $id.$year.'file322.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename322)) { ?>
                                                    <a href="<?php echo $filePath.$filename322 ?>" target="_blank"><?php echo $filename322 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename322 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_322()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename322)) { ?>
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
                                            <th class="text-center">Reports 3.3.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Copies of minutes of meetings with attendance sheets (at least 3 minutes covering meetings conducted in 2023)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile323()" name="file_report_323" id="file_report_323" accept=".pdf" hidden>
                                                <?php 
                                                    $filename323 = $id.$year.'file323.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename323)) { ?>
                                                    <a href="<?php echo $filePath.$filename323 ?>" target="_blank"><?php echo $filename323 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename323 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_323()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename323)) { ?>
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
                                            <th class="text-center">Reports 3.3.4</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile324()" name="file_report_324" id="file_report_324" accept=".pdf" hidden>
                                                <?php 
                                                    $filename324 = $id.$year.'file324.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename324)) { ?>
                                                    <a href="<?php echo $filePath.$filename324 ?>" target="_blank"><?php echo $filename324 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename324 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_324()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename324)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>3.4 Organization and Strengthening Capacities of Barangay Tanod</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 3.4.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance on the organization of the Barangay Tanod covering 2023</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile325()" name="file_report_325" id="file_report_325" accept=".pdf" hidden>
                                                <?php 
                                                    $filename325 = $id.$year.'file325.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename325)) { ?>
                                                    <a href="<?php echo $filePath.$filename325 ?>" target="_blank"><?php echo $filename325 ?></a>&nbsp;&nbsp;<span onclick="delete_file4('<?php echo $filePath.$filename325 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_325()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename325)) { ?>
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
                                            <th class="text-center">Reports 3.4.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile326()" name="file_report_326" id="file_report_326" accept=".pdf" hidden>
                                                <?php 
                                                    $filename326 = $id.$year.'file326.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename326)) { ?>
                                                    <a href="<?php echo $filePath.$filename326 ?>" target="_blank"><?php echo $filename326 ?></a>&nbsp;&nbsp;<span onclick="delete_file4('<?php echo $filePath.$filename326 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_326()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename326)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>3.5 Barangay Initiatives During Health Emergencies</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 3.5.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance on the organization of BHERTs</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile327()" name="file_report_327" id="file_report_327" accept=".pdf" hidden>
                                                <?php 
                                                    $filename327 = $id.$year.'file327.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename327)) { ?>
                                                    <a href="<?php echo $filePath.$filename327 ?>" target="_blank"><?php echo $filename327 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename327 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_327()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename327)) { ?>
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
                                            <th class="text-center">Reports 3.5.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentation of poster and/or tarpulin</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile328()" name="file_report_328" id="file_report_328" accept=".pdf" hidden>
                                                <?php 
                                                    $filename328 = $id.$year.'file328.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename328)) { ?>
                                                    <a href="<?php echo $filePath.$filename328 ?>" target="_blank"><?php echo $filename328 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename328 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_328()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename328)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>3.6 Conduct of Monthly Barangay Road Clearing Operations (BaRCO)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 3.6.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monthly BarCo Reports for October-December 2023</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile329()" name="file_report_329" id="file_report_329" accept=".pdf" hidden>
                                                <?php 
                                                    $filename329 = $id.$year.'file329.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename329)) { ?>
                                                    <a href="<?php echo $filePath.$filename329 ?>" target="_blank"><?php echo $filename329 ?></a>&nbsp;&nbsp;<span onclick="delete_file6('<?php echo $filePath.$filename329 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_329()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename329)) { ?>
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
<script src="assessment_view_create3.js"></script>
</body>

</html>
