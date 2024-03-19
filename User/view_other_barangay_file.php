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
    // $id = $_SESSION['id'];

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
            $id = $result['id'];
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
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.1 Compliance with the Barangay Full Disclosure Policy (BFDP)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.1.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>BFDP Monitoring Form A of the DILG dated March 25,2023</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename1 = $id.$year.'file1.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename1)) { ?>
                                                    <a href="<?php echo $filePath.$filename1 ?>" target="_blank"><?php echo $filename1 ?></a>
                                                <?php }?>
                                                
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

                                                <?php if (file_exists($filePath.$filename2)) { ?>
                                                    <a href="<?php echo $filePath.$filename2 ?>" target="_blank"><?php echo $filename2 ?></a>&nbsp;&nbsp;<span onclick="delete_file('<?php echo $filePath.$filename2 ?>')" style="cursor: pointer;color: red;"></span>
                                                <?php }?>
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

                                                <?php if (file_exists($filePath.$filename3)) { ?>
                                                    <a href="<?php echo $filePath.$filename3 ?>" target="_blank"><?php echo $filename3 ?></a>
                                                <?php }?>
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
                                                <?php if (file_exists($filePath.$filename4)) { ?>
                                                    <a href="<?php echo $filePath.$filename4 ?>" target="_blank"><?php echo $filename4 ?></a>
                                                <?php }?>
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
                                                <?php if (file_exists($filePath.$filename5)) { ?>
                                                    <a href="<?php echo $filePath.$filename5 ?>" target="_blank"><?php echo $filename5 ?></a>
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
                                                <?php if (file_exists($filePath.$filename6)) { ?>
                                                    <a href="<?php echo $filePath.$filename6 ?>" target="_blank"><?php echo $filename6 ?></a>
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
                                                <?php if (file_exists($filePath.$filename7)) { ?>
                                                    <a href="<?php echo $filePath.$filename7 ?>" target="_blank"><?php echo $filename7 ?></a>
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
                                                <?php if (file_exists($filePath.$filename8)) { ?>
                                                    <a href="<?php echo $filePath.$filename8 ?>" target="_blank"><?php echo $filename8 ?></a>
                                                <?php }?>
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
                                                <?php if (file_exists($filePath.$filename9)) { ?>
                                                    <a href="<?php echo $filePath.$filename9 ?>" target="_blank"><?php echo $filename9 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Barangay Financial Report on Statement of Receipt and Expenditure (Annex 7)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename10 = $id.$year.'file10.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename10)) { ?>
                                                    <a href="<?php echo $filePath.$filename10 ?>" target="_blank"><?php echo $filename10 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Barangay Budget Preparation Form 2 of 2022 and 2023</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename11 = $id.$year.'file11.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename11)) { ?>
                                                    <a href="<?php echo $filePath.$filename11 ?>" target="_blank"><?php echo $filename11 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved Barangay Appropriation Ordinance</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename12 = $id.$year.'file12.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename12)) { ?>
                                                    <a href="<?php echo $filePath.$filename12 ?>" target="_blank"><?php echo $filename12 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved Barangay Appropriation Ordinance</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename13 = $id.$year.'file13.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename13)) { ?>
                                                    <a href="<?php echo $filePath.$filename13 ?>" target="_blank"><?php echo $filename13 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo document of the Barangay CitCha (name of the Barangay should be visible)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename14 = $id.$year.'file14.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename14)) { ?>
                                                    <a href="<?php echo $filePath.$filename14 ?>" target="_blank"><?php echo $filename14 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>MOVs for 1.6.1.1 a.) Copy of the written agreement; and</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename15 = $id.$year.'file15.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename15)) { ?>
                                                    <a href="<?php echo $filePath.$filename15 ?>" target="_blank"><?php echo $filename15 ?></a>
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
                                                <?php 
                                                    $filename16 = $id.$year.'file16.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename16)) { ?>
                                                    <a href="<?php echo $filePath.$filename16 ?>" target="_blank"><?php echo $filename16 ?></a>
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
                                                <?php 
                                                    $filename17 = $id.$year.'file17.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename17)) { ?>
                                                    <a href="<?php echo $filePath.$filename17 ?>" target="_blank"><?php echo $filename17 ?></a>
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
                                                <?php 
                                                    $filename18 = $id.$year.'file18.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename18)) { ?>
                                                    <a href="<?php echo $filePath.$filename18 ?>" target="_blank"><?php echo $filename18 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>MOVs for 1.6.2 Certification from the C/MLGOO on current number of SK officials</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename19 = $id.$year.'file19.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename19)) { ?>
                                                    <a href="<?php echo $filePath.$filename19 ?>" target="_blank"><?php echo $filename19 ?></a>
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
                                                <?php 
                                                    $filename20 = $id.$year.'file20.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename20)) { ?>
                                                    <a href="<?php echo $filePath.$filename20 ?>" target="_blank"><?php echo $filename20 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Post Activity Report on the conduct of the wnd semester Barangay assembly duly signed/approved by the Punong Barangay (Annex D of DILG MC No.2022-131)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename21 = $id.$year.'file21.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename21)) { ?>
                                                    <a href="<?php echo $filePath.$filename21 ?>" target="_blank"><?php echo $filename21 ?></a>
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
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-center py-3">
                            <div class="row">
                                <div class="col-lg-12"><h5 class="text-white"><b>Core Governance Area No. 2:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Disaster Preparedness</b></h5></div>
                            </div>
                        </div>
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>2.1 Functionality of the Barangay Disaster Risk Reduction and Management Commitee (BDRRMC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 2.1.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Executive Order or similar issuance creating the BDRRMC compliant to composition requirements covering CY 2023.</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename211 = $id.$year.'file211.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename211)) { ?>
                                                    <a href="<?php echo $filePath.$filename211 ?>" target="_blank"><?php echo $filename211 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename211)) { ?>
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
                                            <th class="text-center">Reports 2.1.2</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved BDRRM Plan CY 2023</td>
                                                <?php 
                                                    $filename212 = $id.$year.'file212.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename212)) { ?>
                                                    <a href="<?php echo $filePath.$filename212 ?>" target="_blank"><?php echo $filename212 ?></a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename212)) { ?>
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
                                            <th class="text-center">Reports 2.1.3</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Enacted Appropriation Ordinance</td>
                                                <?php 
                                                    $filename213 = $id.$year.'file213.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename213)) { ?>
                                                    <a href="<?php echo $filePath.$filename213 ?>" target="_blank"><?php echo $filename213 ?></a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename213)) { ?>
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
                                            <th class="text-center">Reports 2.1.4</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Accomplishment Report</td>
                                                <?php 
                                                    $filename214 = $id.$year.'file214.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename214)) { ?>
                                                    <a href="<?php echo $filePath.$filename214 ?>" target="_blank"><?php echo $filename214 ?></a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename214)) { ?>
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
                                            <td>Annual Report on the utilization of the LDRRMF</td>
                                                <?php 
                                                    $filename215 = $id.$year.'file215.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename215)) { ?>
                                                    <a href="<?php echo $filePath.$filename215 ?>" target="_blank"><?php echo $filename215 ?></a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename215)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>2.2 Extend of Risk Assessment and Early Warning System (EWS)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 2.2.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Post-Activity Report of activities such as Climate and Disaster Risk Assessment, Participatory Disaster Risk Assessment, BDRRM Planning, etc.</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename216 = $id.$year.'file216.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename216)) { ?>
                                                    <a href="<?php echo $filePath.$filename216 ?>" target="_blank"><?php echo $filename216 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename216)) { ?>
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
                                            <th class="text-center">Reports 2.2.2</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentation of the certified Barangay Risk/Hazzard Map</td>
                                                <?php 
                                                    $filename217 = $id.$year.'file217.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename217)) { ?>
                                                    <a href="<?php echo $filePath.$filename217 ?>" target="_blank"><?php echo $filename217 ?></a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename217)) { ?>
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
                                            <th class="text-center">Reports 2.2.3</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentation of EWS for the top two (2) hazards in the Barangay</td>
                                                <?php 
                                                    $filename218 = $id.$year.'file218.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename218)) { ?>
                                                    <a href="<?php echo $filePath.$filename218 ?>" target="_blank"><?php echo $filename218 ?></a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename218)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>2.3 Extend of Preparedness For Effective Response And Recovery</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 2.3.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo Documentation of the permanent/alternate evacuation center</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename219 = $id.$year.'file219.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename219)) { ?>
                                                    <a href="<?php echo $filePath.$filename219 ?>" target="_blank"><?php echo $filename219 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename219)) { ?>
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
                                            <th class="text-center">Reports 2.3.2</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo Documentation of disaster supplies equipment</td>
                                                <?php 
                                                    $filename220 = $id.$year.'file220.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename220)) { ?>
                                                    <a href="<?php echo $filePath.$filename220 ?>" target="_blank"><?php echo $filename220 ?></a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename220)) { ?>
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
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-center py-3">
                            <div class="row">
                                <div class="col-lg-12"><h5 class="text-white"><b>Core Governance Area No. 3:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Safety, Peace and Order</b></h5></div>
                            </div>
                        </div>
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>3.1 Functionality of the Barangay Anti-Drug Abuse Council (BADAC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 3.1.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Executive Order or similar issuance creating the BADAC with its composition and appropriate committees (Committees on Operations and on Advocacy)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename311 = $id.$year.'file311.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename311)) { ?>
                                                    <a href="<?php echo $filePath.$filename311 ?>" target="_blank"><?php echo $filename311 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance establishing the Rehabilitation Referral Desk</td>
                                                <?php 
                                                    $filename312 = $id.$year.'file312.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename312)) { ?>
                                                    <a href="<?php echo $filePath.$filename312 ?>" target="_blank"><?php echo $filename312 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved Barangay Appropriation Ordinance</td>
                                                <?php 
                                                    $filename313 = $id.$year.'file313.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename313)) { ?>
                                                    <a href="<?php echo $filePath.$filename313 ?>" target="_blank"><?php echo $filename313 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved BADAC Plan of Action</td>
                                                <?php 
                                                    $filename314 = $id.$year.'file314.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename314)) { ?>
                                                    <a href="<?php echo $filePath.$filename314 ?>" target="_blank"><?php echo $filename314 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Transmittal of CIR (stamp received) to CADAC/MADAC and Local PNP Unit</td>
                                                <?php 
                                                    $filename315 = $id.$year.'file315.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename315)) { ?>
                                                    <a href="<?php echo $filePath.$filename315 ?>" target="_blank"><?php echo $filename315 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Annual BADAC Accomplishment and Fund Utilization Report submitted not later than the 20th day of January (stamp received) to the CADAC/MADAC</td>
                                                <?php 
                                                    $filename316 = $id.$year.'file316.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename316)) { ?>
                                                    <a href="<?php echo $filePath.$filename316 ?>" target="_blank"><?php echo $filename316 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Executive Order or similar issuance indicating correct membership on accordance to the EO 366 s. of 1996</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename317 = $id.$year.'file317.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename317)) { ?>
                                                    <a href="<?php echo $filePath.$filename317 ?>" target="_blank"><?php echo $filename317 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved BPOPS Plan</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename318 = $id.$year.'file318.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename318)) { ?>
                                                    <a href="<?php echo $filePath.$filename318 ?>" target="_blank"><?php echo $filename318 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Accomplishment Report (in any format) Submitted to the C/M POC on the prescribed schedules (stamp received)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename319 = $id.$year.'file319.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename319)) { ?>
                                                    <a href="<?php echo $filePath.$filename319 ?>" target="_blank"><?php echo $filename319 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Appointment of the Lupong Tagapamayapa</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename320 = $id.$year.'file320.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename320)) { ?>
                                                    <a href="<?php echo $filePath.$filename320 ?>" target="_blank"><?php echo $filename320 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>For Barangay of cities: 2 photo with caption of the computer database with searchable information</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename321 = $id.$year.'file321.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename321)) { ?>
                                                    <a href="<?php echo $filePath.$filename321 ?>" target="_blank"><?php echo $filename321 ?></a>
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
                                                <?php 
                                                    $filename322 = $id.$year.'file322.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename322)) { ?>
                                                    <a href="<?php echo $filePath.$filename322 ?>" target="_blank"><?php echo $filename322 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Copies of minutes of meetings with attendance sheets (at least 3 minutes covering meetings conducted in 2023)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename323 = $id.$year.'file323.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename323)) { ?>
                                                    <a href="<?php echo $filePath.$filename323 ?>" target="_blank"><?php echo $filename323 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename324 = $id.$year.'file324.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename324)) { ?>
                                                    <a href="<?php echo $filePath.$filename324 ?>" target="_blank"><?php echo $filename324 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance on the organization of the Barangay Tanod covering 2023</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename325 = $id.$year.'file325.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename325)) { ?>
                                                    <a href="<?php echo $filePath.$filename325 ?>" target="_blank"><?php echo $filename325 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename326 = $id.$year.'file326.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename326)) { ?>
                                                    <a href="<?php echo $filePath.$filename326 ?>" target="_blank"><?php echo $filename326 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance on the organization of BHERTs</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename327 = $id.$year.'file327.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename327)) { ?>
                                                    <a href="<?php echo $filePath.$filename327 ?>" target="_blank"><?php echo $filename327 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentation of poster and/or tarpulin</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename328 = $id.$year.'file328.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename328)) { ?>
                                                    <a href="<?php echo $filePath.$filename328 ?>" target="_blank"><?php echo $filename328 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monthly BarCo Reports for October-December 2023</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename329 = $id.$year.'file329.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename329)) { ?>
                                                    <a href="<?php echo $filePath.$filename329 ?>" target="_blank"><?php echo $filename329 ?></a>
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
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-center py-3">
                            <div class="row">
                                <div class="col-lg-12"><h5 class="text-white"><b>Essential Governance Area No. 1:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Social Protection and Sensitivity</b></h5></div>
                            </div>
                        </div>
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>4.1 Functionality of Barangay Violence Against Women (VAW) Desk</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 4.1.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Executive Order or similar issuance on the establishment of the Barangay VAW Desk and designated VAW Desk Officer</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename411 = $id.$year.'file411.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename411)) { ?>
                                                    <a href="<?php echo $filePath.$filename411 ?>" target="_blank"><?php echo $filename411 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                                                <?php 
                                                    $filename412 = $id.$year.'file412.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename412)) { ?>
                                                    <a href="<?php echo $filePath.$filename412 ?>" target="_blank"><?php echo $filename412 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved 2023 Barangay Gender and Development (GAD) Plan and Budget</td>
                                                <?php 
                                                    $filename413 = $id.$year.'file413.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename413)) { ?>
                                                    <a href="<?php echo $filePath.$filename413 ?>" target="_blank"><?php echo $filename413 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monthly Accomplishment Reports for CY 2023 (October-December 2023)</td>
                                                <?php 
                                                    $filename414 = $id.$year.'file414.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename414)) { ?>
                                                    <a href="<?php echo $filePath.$filename414 ?>" target="_blank"><?php echo $filename414 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Updated database on VAW cases reported to the Barangay</td>
                                                <?php 
                                                    $filename415 = $id.$year.'file415.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename415)) { ?>
                                                    <a href="<?php echo $filePath.$filename415 ?>" target="_blank"><?php echo $filename415 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>CY 2023 GAD Accomplishment Report</td>
                                                <?php 
                                                    $filename416 = $id.$year.'file416.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename416)) { ?>
                                                    <a href="<?php echo $filePath.$filename416 ?>" target="_blank"><?php echo $filename416 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentation of the BHS/C</td>
                                                <?php 
                                                    $filename417 = $id.$year.'file417.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename417)) { ?>
                                                    <a href="<?php echo $filePath.$filename417 ?>" target="_blank"><?php echo $filename417 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance on the appointment of BHW</td>
                                                <?php 
                                                    $filename418 = $id.$year.'file418.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename418)) { ?>
                                                    <a href="<?php echo $filePath.$filename418 ?>" target="_blank"><?php echo $filename418 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance on the appointment of BNS</td>
                                                <?php 
                                                    $filename419 = $id.$year.'file419.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename419)) { ?>
                                                    <a href="<?php echo $filePath.$filename419 ?>" target="_blank"><?php echo $filename419 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentations of the operations of the BHS/C</td>
                                                <?php 
                                                    $filename420 = $id.$year.'file420.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename420)) { ?>
                                                    <a href="<?php echo $filePath.$filename420 ?>" target="_blank"><?php echo $filename420 ?></a>
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
                                                <?php if (file_exists($filePath.$filename421)) { ?>
                                                    <a href="<?php echo $filePath.$filename421 ?>" target="_blank"><?php echo $filename421 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance organizing the BDC with its composition compliant to Section 107 of RA 7160</td>
                                                <?php 
                                                    $filename422 = $id.$year.'file422.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename422)) { ?>
                                                    <a href="<?php echo $filePath.$filename422 ?>" target="_blank"><?php echo $filename422 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Minutes (at least 2) of the public hearing/Barangay assemblies with attendance sheet</td>
                                                <?php 
                                                    $filename423 = $id.$year.'file423.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename423)) { ?>
                                                    <a href="<?php echo $filePath.$filename423 ?>" target="_blank"><?php echo $filename423 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Barangay Development Plan with BDC and SB Resolutions adopting such</td>
                                                <?php 
                                                    $filename424 = $id.$year.'file424.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename424)) { ?>
                                                    <a href="<?php echo $filePath.$filename424 ?>" target="_blank"><?php echo $filename424 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>CY 2023 Accomplishment Report of the BDP</td>
                                                <?php 
                                                    $filename425 = $id.$year.'file425.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename425)) { ?>
                                                    <a href="<?php echo $filePath.$filename425 ?>" target="_blank"><?php echo $filename425 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance designating a Kasambahay Desk and a KDO</td>
                                                <?php 
                                                    $filename426 = $id.$year.'file426.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename426)) { ?>
                                                    <a href="<?php echo $filePath.$filename426 ?>" target="_blank"><?php echo $filename426 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Updated Kasambahay Report Form 2 (Kasambahay Masterlist) as of December 2023</td>
                                                <?php 
                                                    $filename427 = $id.$year.'file427.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename427)) { ?>
                                                    <a href="<?php echo $filePath.$filename427 ?>" target="_blank"><?php echo $filename427 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Executive Order or similar Issuance on the extablishment Barangay Council for Protection of Children (BCPC)</td>
                                                <?php 
                                                    $filename428 = $id.$year.'file428.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename428)) { ?>
                                                    <a href="<?php echo $filePath.$filename428 ?>" target="_blank"><?php echo $filename428 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                                                <?php 
                                                    $filename429 = $id.$year.'file429.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename429)) { ?>
                                                    <a href="<?php echo $filePath.$filename429 ?>" target="_blank"><?php echo $filename429 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved BCPC Annual Work and FInancial Plan (AWFP)</td>
                                                <?php 
                                                    $filename430 = $id.$year.'file430.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename430)) { ?>
                                                    <a href="<?php echo $filePath.$filename430 ?>" target="_blank"><?php echo $filename430 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Updated database on children</td>
                                                <?php 
                                                    $filename431 = $id.$year.'file431.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename431)) { ?>
                                                    <a href="<?php echo $filePath.$filename431 ?>" target="_blank"><?php echo $filename431 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Updated Localized Flow Chart of Referral System</td>
                                                <?php 
                                                    $filename432 = $id.$year.'file432.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename432)) { ?>
                                                    <a href="<?php echo $filePath.$filename432 ?>" target="_blank"><?php echo $filename432 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>CY 2023 Approved Accomplishment Report on BCPC Plan</td>
                                                <?php 
                                                    $filename433 = $id.$year.'file433.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename433)) { ?>
                                                    <a href="<?php echo $filePath.$filename433 ?>" target="_blank"><?php echo $filename433 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance organizing the Barangay GAD Focal Point System</td>
                                                <?php 
                                                    $filename434 = $id.$year.'file434.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename434)) { ?>
                                                    <a href="<?php echo $filePath.$filename434 ?>" target="_blank"><?php echo $filename434 ?></a>
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
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Accomplished RBI Form A of two semesters of CY 2023</td>
                                                <?php 
                                                    $filename435 = $id.$year.'file435.pdf';
                                                ?>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename435)) { ?>
                                                    <a href="<?php echo $filePath.$filename435 ?>" target="_blank"><?php echo $filename435 ?></a>
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
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-center py-3">
                            <div class="row">
                                <div class="col-lg-12"><h5 class="text-white"><b>Essential Governance Area No. 2:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Business Friendliness and Competitiveness</b></h5></div>
                            </div>
                        </div>
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>5.1 Power to Levy Other Taxes, Fees, or Charges</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 5.1.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Enacted Barangay Tax Ordinance</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filePath = '../actions/upload5/uploaded/'; 
                                                    $filename511 = $id.$year.'file511.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename511)) { ?>
                                                    <a href="<?php echo $filePath.$filename511 ?>" target="_blank"><?php echo $filename511 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename511)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>5.2 Compiliance to Section 11 of RA 11032 of the Ease of Doing Business Law</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 5.2.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Enacted Barangay Ordinance relative to Barangay Clearance Fees on business permit and locational clearance for building permit, in accordance with MC No. 2019-177</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename512 = $id.$year.'file512.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename512)) { ?>
                                                    <a href="<?php echo $filePath.$filename512 ?>" target="_blank"><?php echo $filename512 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename512)) { ?>
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
                                            <th class="text-center">Reports 5.2.2</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved resolution authorizing the Municipal Treasurer to collect fees for Barangay Clearance for Business permit and locational clearance purpose</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename513 = $id.$year.'file513.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename513)) { ?>
                                                    <a href="<?php echo $filePath.$filename513 ?>" target="_blank"><?php echo $filename513 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename513)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>5.3 Issuance of Barangay Clearance not covered by DILG MC No. 2019-177 such as: residency, indigency, etc, within seven (7) working days</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 5.3.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentation of the Citizens' Charter on the issuance of Barangay Clearance only (name of the Barangay should be visible)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename514 = $id.$year.'file514.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename514)) { ?>
                                                    <a href="<?php echo $filePath.$filename514 ?>" target="_blank"><?php echo $filename514 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename514)) { ?>
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
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-center py-3">
                            <div class="row">
                                <div class="col-lg-12"><h5 class="text-white"><b>Essential Governance Area No. 3:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Environmental Management</b></h5></div>
                            </div>
                        </div>
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>6.1 Functionality of the Barangay Ecological Solid Waste Management Committee (BESWMC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 6.1.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance on the organization of the BESWMC</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename611 = $id.$year.'file611.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename611)) { ?>
                                                    <a href="<?php echo $filePath.$filename611 ?>" target="_blank"><?php echo $filename611 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename611)) { ?>
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
                                            <th class="text-center">Reports 6.1.2</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved Solid Waste Management Program/Plan with corresponding fund allocation</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename612 = $id.$year.'file612.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename612)) { ?>
                                                    <a href="<?php echo $filePath.$filename612 ?>" target="_blank"><?php echo $filename612 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename612)) { ?>
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
                                            <th class="text-center">Reports 6.1.3</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename613 = $id.$year.'file613.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename613)) { ?>
                                                    <a href="<?php echo $filePath.$filename613 ?>" target="_blank"><?php echo $filename613 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename613)) { ?>
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
                                            <th class="text-center">Reports 6.1.4</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monthly Accomplishment Reports for 2023</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename614 = $id.$year.'file614.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename614)) { ?>
                                                    <a href="<?php echo $filePath.$filename614 ?>" target="_blank"><?php echo $filename614 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename614)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>6.2 Existence of a Solid Waste Management Facility Pursuant to R.A. 9003</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 6.2.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>For MRF operated by the Barangay:</b> Photo documentation of the MRF/MRF Records of the Barangay</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename615 = $id.$year.'file615.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename615)) { ?>
                                                    <a href="<?php echo $filePath.$filename615 ?>" target="_blank"><?php echo $filename615 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename615)) { ?>
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
                                    <tbody>
                                        <tr>
                                            <td><b>For MRS:</b> MOA with junkshop;</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename616 = $id.$year.'file616.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename616)) { ?>
                                                    <a href="<?php echo $filePath.$filename616 ?>" target="_blank"><?php echo $filename616 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename616)) { ?>
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
                                    <tbody>
                                        <tr>
                                            <td><b>For MRS:</b> Mechanis, to process biodegradable wastes;</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename617 = $id.$year.'file617.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename617)) { ?>
                                                    <a href="<?php echo $filePath.$filename617 ?>" target="_blank"><?php echo $filename617 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename617)) { ?>
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
                                    <tbody>
                                        <tr>
                                            <td><b>For MRS:</b> MOA with service provider for collection/treatment of special, hazardous, and infectious waste</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename618 = $id.$year.'file618.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename618)) { ?>
                                                    <a href="<?php echo $filePath.$filename618 ?>" target="_blank"><?php echo $filename618 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename618)) { ?>
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
                                    <tbody>
                                        <tr>
                                            <td><b>For Clustered MRFs:</b> MOA with the host Barangay (applicable for barangay-clustered MRFs)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename619 = $id.$year.'file619.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename619)) { ?>
                                                    <a href="<?php echo $filePath.$filename619 ?>" target="_blank"><?php echo $filename619 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename619)) { ?>
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
                                    <tbody>
                                        <tr>
                                            <td><b>For Clustered MRFs:</b> MOA or LGU document Indicating coverage of Municipal MRF (applicable for barangay-clustered to the Central MRF of Municipality)</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename620 = $id.$year.'file620.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename620)) { ?>
                                                    <a href="<?php echo $filePath.$filename620 ?>" target="_blank"><?php echo $filename620 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename620)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>6.3 Provision of Support Mechanisms for Segregated Collection</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 6.3.1</th>
                                            <th class="text-center" style="width: 250px;">Attachments</th>
                                            <th class="text-center" style="width: 10px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ordinance or similar issuance on segregation of wastes at-source</td>
                                            <td class="text-center">
                                                <?php 
                                                    $filename621 = $id.$year.'file621.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename621)) { ?>
                                                    <a href="<?php echo $filePath.$filename621 ?>" target="_blank"><?php echo $filename621 ?></a>
                                                <?php } ?>
                                                
                                            </td>
                                            <td class="text-center">
                                                <?php if (file_exists($filePath.$filename621)) { ?>
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