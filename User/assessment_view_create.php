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
                                            <?php if ($status == 0) {?>
                                                <span class="btn-sm btn btn-primary">In Progress</span>
                                            <?php }else{?>
                                                <span><?php echo $status ?></span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-center py-3">
                            <div class="row">
                                <div class="col-lg-12"><h5 class="text-white"><b>Core Governance Area No. 1:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Financial Administration and Sustainability</b></h5></div>
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
                                <div class="col-lg-12 text-center text-white"><b>1.1 Compliance with the Barangay Full Disclosure Policy (BFDP)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.1.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>BFDP Monitoring Form A of the DILG dated March 25,2023</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile()" name="file_report_1" id="file_report_1" value="1"  accept=".pdf" hidden>
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename1 = $id.$year.'file1.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename1)) { ?>
                                                    <a href="<?php echo $filePath.$filename1 ?>" target="_blank"><?php echo $filename1 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename1 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_1()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename1)) { ?>
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
                                            <td>Photo Documentation of the BFDP board displaying the following Documents:</td>
                                                <?php 
                                                    $filename2 = $id.$year.'file2.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile2()" name="file_report_2" id="file_report_2" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename2)) { ?>
                                                    <a href="<?php echo $filePath.$filename2 ?>" target="_blank"><?php echo $filename2 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename2 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_2()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename2)) { ?>
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
                                            <th class="">Annual Report</th>
                                            <th class="text-center"></th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="margin-left: 40px;">Barangay Financial Report</td>
                                                <?php 
                                                    $filename3 = $id.$year.'file3.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile3()" name="file_report_3" id="file_report_3" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename3)) { ?>
                                                    <a href="<?php echo $filePath.$filename3 ?>" target="_blank"><?php echo $filename3 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename3 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_3()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename3)) { ?>
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
                                            <td style="margin-left: 40px;">Barangay Budget</td>
                                                <?php 
                                                    $filename4 = $id.$year.'file4.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile4()" name="file_report_4" id="file_report_4" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename4)) { ?>
                                                    <a href="<?php echo $filePath.$filename4 ?>" target="_blank"><?php echo $filename4 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename4 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_4()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename4)) { ?>
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
                                            <td style="margin-left: 40px;">Summary of Income and Expenditures;</td>
                                                <?php 
                                                    $filename5 = $id.$year.'file5.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile5()" name="file_report_5" id="file_report_5" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename5)) { ?>
                                                    <a href="<?php echo $filePath.$filename5 ?>" target="_blank"><?php echo $filename5 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename5 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_5()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename5)) { ?>
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
                                            <td style="margin-left: 40px;">20% Component of the IRA Utilization;</td>
                                                <?php 
                                                    $filename6 = $id.$year.'file6.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile6()" name="file_report_6" id="file_report_6" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename6)) { ?>
                                                    <a href="<?php echo $filePath.$filename6 ?>" target="_blank"><?php echo $filename6 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename6 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_6()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename6)) { ?>
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
                                            <td style="margin-left: 40px;">Annual Procurement Plan or Procurement List</td>
                                                <?php 
                                                    $filename7 = $id.$year.'file7.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile7()" name="file_report_7" id="file_report_7" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename7)) { ?>
                                                    <a href="<?php echo $filePath.$filename7 ?>" target="_blank"><?php echo $filename7 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename7 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_7()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename7)) { ?>
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
                                            <th class="">Quarterly Report</th>
                                            <th class="text-center"></th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="margin-left: 40px;">List of Notices of Award (4<sup>th</sup> quarter of CY. 2023)</td>
                                                <?php 
                                                    $filename8 = $id.$year.'file8.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile8()" name="file_report_8" id="file_report_8" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename8)) { ?>
                                                    <a href="<?php echo $filePath.$filename8 ?>" target="_blank"><?php echo $filename8 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename8 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_8()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename8)) { ?>
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
                                            <th class="">Monthly Report</th>
                                            <th class="text-center"></th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="margin-left: 40px;">Itemized Monthly Collections and Disbursements (Oct-Dec CY 2023)</td>
                                                <?php 
                                                    $filename9 = $id.$year.'file9.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile9()" name="file_report_9" id="file_report_9" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename9)) { ?>
                                                    <a href="<?php echo $filePath.$filename9 ?>" target="_blank"><?php echo $filename9 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename9 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_9()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename9)) { ?>
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
                                            <th class="text-center">Reports 1.1.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Barangay Financial Report on Statement of Receipt and Expenditure (Annex 7)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile10()" name="file_report_10" id="file_report_10" accept=".pdf" hidden>
                                                <?php 
                                                    $filename10 = $id.$year.'file10.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename10)) { ?>
                                                    <a href="<?php echo $filePath.$filename10 ?>" target="_blank"><?php echo $filename10 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename10 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_10()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename10)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.2 Innovations on revenue generation or exercise of corporate powers</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.2.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Barangay Budget Preparation Form 2 of 2022 and 2023</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile11()" name="file_report_11" id="file_report_11" accept=".pdf" hidden>
                                                <?php 
                                                    $filename11 = $id.$year.'file11.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename11)) { ?>
                                                    <a href="<?php echo $filePath.$filename11 ?>" target="_blank"><?php echo $filename11 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename11 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_11()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename11)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.3 Approval of the Barangay Budget on the Specified Timeframe</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.3.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved Barangay Appropriation Ordinance</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile12()" name="file_report_12" id="file_report_12" accept=".pdf" hidden>
                                                <?php 
                                                    $filename12 = $id.$year.'file12.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename12)) { ?>
                                                    <a href="<?php echo $filePath.$filename12 ?>" target="_blank"><?php echo $filename12 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename12 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_12()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename12)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.4 Allocation for Statutory Programs and Projects as Mandated by Laws and/or Other Issuances</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.4.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved Barangay Appropriation Ordinance</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile13()" name="file_report_13" id="file_report_13" accept=".pdf" hidden>
                                                <?php 
                                                    $filename13 = $id.$year.'file13.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename13)) { ?>
                                                    <a href="<?php echo $filePath.$filename13 ?>" target="_blank"><?php echo $filename13 ?></a>&nbsp;&nbsp;<span onclick="delete_file4('<?php echo $filePath.$filename13 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_13()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename13)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.5 Posting of the Barangay Citizens' Charter (CitCha)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.5.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo document of the Barangay CitCha (name of the Barangay should be visible)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile14()" name="file_report_14" id="file_report_14" accept=".pdf" hidden>
                                                <?php 
                                                    $filename14 = $id.$year.'file14.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename14)) { ?>
                                                    <a href="<?php echo $filePath.$filename14 ?>" target="_blank"><?php echo $filename14 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename14 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_14()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename14)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.6 Release of the Sangguniang Kabataan (SK) Funds by the Barangay</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.6.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>MOVs for 1.6.1.1 a.) Copy of the written agreement; and</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile15()" name="file_report_15" id="file_report_15" accept=".pdf" hidden>
                                                <?php 
                                                    $filename15 = $id.$year.'file15.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename15)) { ?>
                                                    <a href="<?php echo $filePath.$filename15 ?>" target="_blank"><?php echo $filename15 ?></a>&nbsp;&nbsp;<span onclick="delete_file6('<?php echo $filePath.$filename15 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_15()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename15)) { ?>
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
                                            <td>MOVs for 1.6.1.1 b.) Proof of deposit reflecting the Account No./ Name of Barangay SK (1 deposit slip for annual, 2 deposit slips for semestral, 4 deposit slips for quarterly)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile16()" name="file_report_16" id="file_report_16" accept=".pdf" hidden>
                                                <?php 
                                                    $filename16 = $id.$year.'file16.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename16)) { ?>
                                                    <a href="<?php echo $filePath.$filename16 ?>" target="_blank"><?php echo $filename16 ?></a>&nbsp;&nbsp;<span onclick="delete_file6('<?php echo $filePath.$filename16 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_16()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename16)) { ?>
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
                                            <td>MOVs for 1.6.1.2 a.) 12 Monthly deposit slips reflecting the Account No. / Name of Barangay SK</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile17()" name="file_report_17" id="file_report_17" accept=".pdf" hidden>
                                                <?php 
                                                    $filename17 = $id.$year.'file17.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename17)) { ?>
                                                    <a href="<?php echo $filePath.$filename17 ?>" target="_blank"><?php echo $filename17 ?></a>&nbsp;&nbsp;<span onclick="delete_file6('<?php echo $filePath.$filename17 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_17()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename17)) { ?>
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
                                            <td>MOVs for 1.6.1.3 a.) Proof of transfer of the 10% SK fund to the trust fund of the Barangay such as deposit slip or Official Receipt or correspanding legal form/document issued by the municipal treasurer if the Barangay opted that the corresponding SK fund be kept as trust fund in the custody of the C/M treasurer.</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile18()" name="file_report_18" id="file_report_18" accept=".pdf" hidden>
                                                <?php 
                                                    $filename18 = $id.$year.'file18.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename18)) { ?>
                                                    <a href="<?php echo $filePath.$filename18 ?>" target="_blank"><?php echo $filename18 ?></a>&nbsp;&nbsp;<span onclick="delete_file6('<?php echo $filePath.$filename18 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_18()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename18)) { ?>
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
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.6.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>MOVs for 1.6.2 Certification from the C/MLGOO on current number of SK officials</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile19()" name="file_report_19" id="file_report_19" accept=".pdf" hidden>
                                                <?php 
                                                    $filename19 = $id.$year.'file19.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename19)) { ?>
                                                    <a href="<?php echo $filePath.$filename19 ?>" target="_blank"><?php echo $filename19 ?></a>&nbsp;&nbsp;<span onclick="delete_file6('<?php echo $filePath.$filename19 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_19()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename19)) { ?>
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
                                            <td>MOVs for 1.6.2 Approved Annual Barangay Youth Investment Program (ABYIP) for 2023</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile20()" name="file_report_20" id="file_report_20" accept=".pdf" hidden>
                                                <?php 
                                                    $filename20 = $id.$year.'file20.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename20)) { ?>
                                                    <a href="<?php echo $filePath.$filename20 ?>" target="_blank"><?php echo $filename20 ?></a>&nbsp;&nbsp;<span onclick="delete_file6('<?php echo $filePath.$filename20 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_20()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename20)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.7 Conduct of Barangay Assembly for CY 2023 (2nd Semester)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.7.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Post Activity Report on the conduct of the wnd semester Barangay assembly duly signed/approved by the Punong Barangay (Annex D of DILG MC No.2022-131)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile21()" name="file_report_21" id="file_report_21" accept=".pdf" hidden>
                                                <?php 
                                                    $filename21 = $id.$year.'file21.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename21)) { ?>
                                                    <a href="<?php echo $filePath.$filename21 ?>" target="_blank"><?php echo $filename21 ?></a>&nbsp;&nbsp;<span onclick="delete_file7('<?php echo $filePath.$filename21 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_21()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename21)) { ?>
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
<script src="assessment_view_create.js"></script>
</body>

</html>
