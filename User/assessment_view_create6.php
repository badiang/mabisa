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
        $ar = $_GET['ar'];
        if ($_GET['alert'] == 1) {
            $stmt = $dbconn->prepare("UPDATE area_assessment_points set noti_me=false where user_id=? and area_number=?");
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $ar);
            $stmt->execute();
        }
        $currentYear = $_GET['yr'];
    }else{
        $currentYear = date('Y');
        
    }

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

            $query61 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1,
                comment2,approved2,
                comment3,approved3,
                comment4,approved4
                FROM area_assessment_points where user_id=? and year_=? and area_number=6 and under_area=1");
            $query61->bindParam(1, $id);
            $query61->bindParam(2, $year);
            $query61->execute();
            $result61 = $query61->fetch(PDO::FETCH_ASSOC);

            if ($result61 !== false) {
                $remarks61 = $result61['remarks'];
                $area_points61 = $result61['area_points'];
                $comment611 = $result61['comment1'];
                $approved611 = $result61['approved1'];
                $comment612 = $result61['comment2'];
                $approved612 = $result61['approved2'];
                $comment613 = $result61['comment3'];
                $approved613 = $result61['approved3'];
                $comment614 = $result61['comment4'];
                $approved614 = $result61['approved4'];
            }
        
                $query62 = $dbconn->prepare("SELECT remarks,area_points,
                    comment1,approved1,
                    comment2,approved2,
                    comment3,approved3,
                    comment4,approved4,
                    comment5,approved5,
                    comment6,approved6
                    FROM area_assessment_points where user_id=? and year_=? and area_number=6 and under_area=2");
                $query62->bindParam(1, $id);
                $query62->bindParam(2, $year);
                $query62->execute();
                $result62 = $query62->fetch(PDO::FETCH_ASSOC);
        
            if ($result62 !== false) {
                $remarks62 = $result62['remarks'];
                $area_points62 = $result62['area_points'];
                $comment621 = $result62['comment1'];
                $approved621 = $result62['approved1'];
                $comment622 = $result62['comment2'];
                $approved622 = $result62['approved2'];
                $comment623 = $result62['comment3'];
                $approved623 = $result62['approved3'];
                $comment624 = $result62['comment4'];
                $approved624 = $result62['approved4'];
                $comment625 = $result62['comment5'];
                $approved625 = $result62['approved5'];
                $comment626 = $result62['comment6'];
                $approved626 = $result62['approved6'];
            }
        
                $query63 = $dbconn->prepare("SELECT remarks,area_points,
                    comment1,approved1 
                    FROM area_assessment_points where user_id=? and year_=? and area_number=6 and under_area=3");
                $query63->bindParam(1, $id);
                $query63->bindParam(2, $year);
                $query63->execute();
                $result63 = $query63->fetch(PDO::FETCH_ASSOC);
        
            if ($result63 !== false) {
                $remarks63 = $result63['remarks'];
                $area_points63 = $result63['area_points'];
                $comment631 = $result63['comment1'];
                $approved631 = $result63['approved1'];
            }
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
                                <div class="col-lg-12"><h5 class="text-white"><b>Essential Governance Area No. 3:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Environmental Management</b></h5></div>
                            </div>
                        </div>
                        <div class="card-body" id="viewLocation">
                        <p style="text-align: right; padding-right: 25px;">Legends&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="btn btn-sm btn-danger btn-circle">
                                        <i class="">&times;</i>
                                    </span>
                                    &nbsp;&nbsp;Empty
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <img src="../img/icon/On Process.png" width="30">
                                    &nbsp;&nbsp;On Process
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <img src="../img/icon/Approved.png" width="30">
                                    &nbsp;&nbsp;Approved
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <img src="../img/icon/Disapproved.png" width="30">
                                    &nbsp;&nbsp;Disapproved
                                </p>
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>6.1 Functionality of the Barangay Ecological Solid Waste Management Committee (BESWMC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 6.1.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EO or similar issuance on the organization of the BESWMC</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile611()" name="file_report_611" id="file_report_611" accept=".pdf" hidden>
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename611 = $id.$year.'file611.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename611)) { ?>
                                                    <a href="<?php echo $filePath.$filename611 ?>" target="_blank"><?php echo $filename611 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename611 ?>',6,1,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_611()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal611" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal611" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment611) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved611)){ ?>
                                                    <?php if ($approved611 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename611)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 6.1.2</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved Solid Waste Management Program/Plan with corresponding fund allocation</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile612()" name="file_report_612" id="file_report_612" accept=".pdf" hidden>
                                                <?php 
                                                    $filename612 = $id.$year.'file612.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename612)) { ?>
                                                    <a href="<?php echo $filePath.$filename612 ?>" target="_blank"><?php echo $filename612 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename612 ?>',6,1,2)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_612()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal612" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal612" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment612) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved612)){ ?>
                                                    <?php if ($approved612 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename612)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 6.1.3</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile613()" name="file_report_613" id="file_report_613" accept=".pdf" hidden>
                                                <?php 
                                                    $filename613 = $id.$year.'file613.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename613)) { ?>
                                                    <a href="<?php echo $filePath.$filename613 ?>" target="_blank"><?php echo $filename613 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename613 ?>',6,1,3)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_613()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal613" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal613" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment613) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved613)){ ?>
                                                    <?php if ($approved613 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename613)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 6.1.4</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monthly Accomplishment Reports for 2023</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile614()" name="file_report_614" id="file_report_614" accept=".pdf" hidden>
                                                <?php 
                                                    $filename614 = $id.$year.'file614.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename614)) { ?>
                                                    <a href="<?php echo $filePath.$filename614 ?>" target="_blank"><?php echo $filename614 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename614 ?>',6,1,4)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_614()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal614" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal614" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment614) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved614)){ ?>
                                                    <?php if ($approved614 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename614)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
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
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>For MRF operated by the Barangay:</b> Photo documentation of the MRF/MRF Records of the Barangay</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile615()" name="file_report_615" id="file_report_615" accept=".pdf" hidden>
                                                <?php 
                                                    $filename615 = $id.$year.'file615.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename615)) { ?>
                                                    <a href="<?php echo $filePath.$filename615 ?>" target="_blank"><?php echo $filename615 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename615 ?>',6,2,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_615()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal621" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal621" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment621) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved621)){ ?>
                                                    <?php if ($approved621 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename615)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td><b>For MRS:</b> MOA with junkshop;</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile616()" name="file_report_616" id="file_report_616" accept=".pdf" hidden>
                                                <?php 
                                                    $filename616 = $id.$year.'file616.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename616)) { ?>
                                                    <a href="<?php echo $filePath.$filename616 ?>" target="_blank"><?php echo $filename616 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename616 ?>',6,2,2)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_616()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal622" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal622" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment622) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved622)){ ?>
                                                    <?php if ($approved622 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename616)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td><b>For MRS:</b> Mechanis, to process biodegradable wastes;</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile617()" name="file_report_617" id="file_report_617" accept=".pdf" hidden>
                                                <?php 
                                                    $filename617 = $id.$year.'file617.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename617)) { ?>
                                                    <a href="<?php echo $filePath.$filename617 ?>" target="_blank"><?php echo $filename617 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename617 ?>',6,2,3)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_617()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal623" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal623" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment623) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved623)){ ?>
                                                    <?php if ($approved623 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename617)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td><b>For MRS:</b> MOA with service provider for collection/treatment of special, hazardous, and infectious waste</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile618()" name="file_report_618" id="file_report_618" accept=".pdf" hidden>
                                                <?php 
                                                    $filename618 = $id.$year.'file618.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename618)) { ?>
                                                    <a href="<?php echo $filePath.$filename618 ?>" target="_blank"><?php echo $filename618 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename618 ?>',6,2,4)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_618()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal624" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal624" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment624) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved624)){ ?>
                                                    <?php if ($approved624 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename618)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td><b>For Clustered MRFs:</b> MOA with the host Barangay (applicable for barangay-clustered MRFs)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile619()" name="file_report_619" id="file_report_619" accept=".pdf" hidden>
                                                <?php 
                                                    $filename619 = $id.$year.'file619.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename619)) { ?>
                                                    <a href="<?php echo $filePath.$filename619 ?>" target="_blank"><?php echo $filename619 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename619 ?>',6,2,5)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_619()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal625" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal625" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment625) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved625)){ ?>
                                                    <?php if ($approved625 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename619)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td><b>For Clustered MRFs:</b> MOA or LGU document Indicating coverage of Municipal MRF (applicable for barangay-clustered to the Central MRF of Municipality)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile620()" name="file_report_620" id="file_report_620" accept=".pdf" hidden>
                                                <?php 
                                                    $filename620 = $id.$year.'file620.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename620)) { ?>
                                                    <a href="<?php echo $filePath.$filename620 ?>" target="_blank"><?php echo $filename620 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename620 ?>',6,2,6)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_620()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal626" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal626" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment626) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved626)){ ?>
                                                    <?php if ($approved626 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename620)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
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
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ordinance or similar issuance on segregation of wastes at-source</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile621()" name="file_report_621" id="file_report_621" accept=".pdf" hidden>
                                                <?php 
                                                    $filename621 = $id.$year.'file621.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename621)) { ?>
                                                    <a href="<?php echo $filePath.$filename621 ?>" target="_blank"><?php echo $filename621 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename621 ?>',6,3,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_621()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal631" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal631" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">View Comment</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group mt-3">
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset ($comment631) ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved631)){ ?>
                                                    <?php if ($approved631 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename621)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
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
<script src="assessment_view_create6.js"></script>
</body>

</html>
