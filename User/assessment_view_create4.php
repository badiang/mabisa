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

            $query41 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1,
                comment2,approved2,
                comment3,approved3,
                comment4,approved4,
                comment5,approved5,
                comment6,approved6
                FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=1");
            $query41->bindParam(1, $id);
            $query41->bindParam(2, $year);
            $query41->execute();
            $result41 = $query41->fetch(PDO::FETCH_ASSOC);
            $remarks41 = $result41['remarks'];
            $area_points41 = $result41['area_points'];
            $comment411 = $result41['comment1'];
            $approved411 = $result41['approved1'];
            $comment412 = $result41['comment2'];
            $approved412 = $result41['approved2'];
            $comment413 = $result41['comment3'];
            $approved413 = $result41['approved3'];
            $comment414 = $result41['comment4'];
            $approved414 = $result41['approved4'];
            $comment415 = $result41['comment5'];
            $approved415 = $result41['approved5'];
            $comment416 = $result41['comment6'];
            $approved416 = $result41['approved6'];

            $query42 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1,
                comment2,approved2,
                comment3,approved3,
                comment4,approved4,
                comment5,approved5
                FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=2");
            $query42->bindParam(1, $id);
            $query42->bindParam(2, $year);
            $query42->execute();
            $result42 = $query42->fetch(PDO::FETCH_ASSOC);
            $remarks42 = $result42['remarks'];
            $area_points42 = $result42['area_points'];
            $comment421 = $result42['comment1'];
            $approved421 = $result42['approved1'];
            $comment422 = $result42['comment2'];
            $approved422 = $result42['approved2'];
            $comment423 = $result42['comment3'];
            $approved423 = $result42['approved3'];
            $comment424 = $result42['comment4'];
            $approved424 = $result42['approved4'];
            $comment425 = $result42['comment5'];
            $approved425 = $result42['approved5'];

            $query43 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1,
                comment2,approved2,
                comment3,approved3,
                comment4,approved4
                FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=3");
            $query43->bindParam(1, $id);
            $query43->bindParam(2, $year);
            $query43->execute();
            $result43 = $query43->fetch(PDO::FETCH_ASSOC);
            $remarks43 = $result43['remarks'];
            $area_points43 = $result43['area_points'];
            $comment431 = $result43['comment1'];
            $approved431 = $result43['approved1'];
            $comment432 = $result43['comment2'];
            $approved432 = $result43['approved2'];
            $comment433 = $result43['comment3'];
            $approved433 = $result43['approved3'];
            $comment434 = $result43['comment4'];
            $approved434 = $result43['approved4'];

            $query44 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1,
                comment2,approved2
                FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=4");
            $query44->bindParam(1, $id);
            $query44->bindParam(2, $year);
            $query44->execute();
            $result44 = $query44->fetch(PDO::FETCH_ASSOC);
            $remarks44 = $result44['remarks'];
            $area_points44 = $result44['area_points'];
            $comment441 = $result44['comment1'];
            $approved441 = $result44['approved1'];
            $comment442 = $result44['comment2'];
            $approved442 = $result44['approved2'];

            $query45 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1,
                comment2,approved2,
                comment3,approved3,
                comment4,approved4,
                comment5,approved5,
                comment6,approved6
                FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=5");
            $query45->bindParam(1, $id);
            $query45->bindParam(2, $year);
            $query45->execute();
            $result45 = $query45->fetch(PDO::FETCH_ASSOC);
            $remarks45 = $result45['remarks'];
            $area_points45 = $result45['area_points'];
            $comment451 = $result45['comment1'];
            $approved451 = $result45['approved1'];
            $comment452 = $result45['comment2'];
            $approved452 = $result45['approved2'];
            $comment453 = $result45['comment3'];
            $approved453 = $result45['approved3'];
            $comment454 = $result45['comment4'];
            $approved454 = $result45['approved4'];
            $comment455 = $result45['comment5'];
            $approved455 = $result45['approved5'];
            $comment456 = $result45['comment6'];
            $approved456 = $result45['approved6'];

            $query46 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1 
                FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=6");
            $query46->bindParam(1, $id);
            $query46->bindParam(2, $year);
            $query46->execute();
            $result46 = $query46->fetch(PDO::FETCH_ASSOC);
            $remarks46 = $result46['remarks'];
            $area_points46 = $result46['area_points'];
            $comment461 = $result46['comment1'];
            $approved461 = $result46['approved1'];

            $query47 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1 
                FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=7");
            $query47->bindParam(1, $id);
            $query47->bindParam(2, $year);
            $query47->execute();
            $result47 = $query47->fetch(PDO::FETCH_ASSOC);
            $remarks47 = $result47['remarks'];
            $area_points47 = $result47['area_points'];
            $comment471 = $result47['comment1'];
            $approved471 = $result47['approved1'];
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
                                <div class="col-lg-12 text-center text-white"><b>4.1 Functionality of Barangay Violence Against Women (VAW) Desk</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                        <th class="text-center">Reports 4.1.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename411 ?>" target="_blank"><?php echo $filename411 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename411 ?>',4,1,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_411()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal411" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal411" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment411 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved411)){ ?>
                                                    <?php if ($approved411 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename411)) { ?>
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
                                            <th class="text-center">Reports 4.1.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename412 ?>" target="_blank"><?php echo $filename412 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename412 ?>',4,1,2)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_412()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal412" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal412" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment412 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved412)){ ?>
                                                    <?php if ($approved412 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename412)) { ?>
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
                                            <th class="text-center">Reports 4.1.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename413 ?>" target="_blank"><?php echo $filename413 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename413 ?>',4,1,3)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_413()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal413" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal413" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment413 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved413)){ ?>
                                                    <?php if ($approved413 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename413)) { ?>
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
                                            <th class="text-center">Reports 4.1.4</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename414 ?>" target="_blank"><?php echo $filename414 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename414 ?>',4,1,4)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_414()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal414" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal414" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment414 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved414)){ ?>
                                                    <?php if ($approved414 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename414)) { ?>
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
                                            <th class="text-center">Reports 4.1.5</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename415 ?>" target="_blank"><?php echo $filename415 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename415 ?>',4,1,5)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_415()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal415" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal415" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment415 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved415)){ ?>
                                                    <?php if ($approved415 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename415)) { ?>
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
                                            <th class="text-center">Reports 4.1.6</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename416 ?>" target="_blank"><?php echo $filename416 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename416 ?>',4,1,6)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_416()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal416" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal416" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment416 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved416)){ ?>
                                                    <?php if ($approved416 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename416)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>4.2 Access to Health and Social Welfare Services in the Barangay</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                        <th class="text-center">Reports 4.2.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename417 ?>" target="_blank"><?php echo $filename417 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename417 ?>',4,2,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_417()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal421" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal421" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment421 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved421)){ ?>
                                                    <?php if ($approved421 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename417)) { ?>
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
                                            <th class="text-center">Reports 4.2.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename418 ?>" target="_blank"><?php echo $filename418 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename418 ?>',4,2,2)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_418()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal422" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal422" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment422 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved422)){ ?>
                                                    <?php if ($approved422 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename418)) { ?>
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
                                            <th class="text-center">Reports 4.2.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename419 ?>" target="_blank"><?php echo $filename419 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename419 ?>',4,2,3)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_419()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal423" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal423" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment423 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved423)){ ?>
                                                    <?php if ($approved423 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename419)) { ?>
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
                                            <th class="text-center">Reports 4.2.4</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename420 ?>" target="_blank"><?php echo $filename420 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename420 ?>',4,2,4)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_420()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal424" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal424" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment424 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved424)){ ?>
                                                    <?php if ($approved424 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename420)) { ?>
                                                        <img src="../img/icon/On Process.png" width="30">
                                                    <?php }else{ ?>
                                                        <span class="btn btn-sm btn-danger btn-circle">
                                                            <i class="">&times;</i>
                                                        </span>
                                                    <?php } ?>
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
                                                    <a href="<?php echo $filePath.$filename421 ?>" target="_blank"><?php echo $filename421 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename421 ?>',4,2,5)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_421()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal425" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal425" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment425 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved425)){ ?>
                                                    <?php if ($approved425 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename421)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>4.3 Functionality of the Barangay Development Council (BDC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                        <th class="text-center">Reports 4.3.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename422 ?>" target="_blank"><?php echo $filename422 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename422 ?>',4,3,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_422()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal431" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal431" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment431 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved431)){ ?>
                                                    <?php if ($approved431 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename422)) { ?>
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
                                            <th class="text-center">Reports 4.3.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename423 ?>" target="_blank"><?php echo $filename423 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename423 ?>',4,3,2)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_423()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal432" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal432" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment432 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved432)){ ?>
                                                    <?php if ($approved432 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename423)) { ?>
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
                                            <th class="text-center">Reports 4.3.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename424 ?>" target="_blank"><?php echo $filename424 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename424 ?>',4,3,3)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_424()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal433" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal433" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment433 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved433)){ ?>
                                                    <?php if ($approved433 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename424)) { ?>
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
                                            <th class="text-center">Reports 4.3.4</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename425 ?>" target="_blank"><?php echo $filename425 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename425 ?>',4,3,4)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_425()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal434" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal434" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment434 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved434)){ ?>
                                                    <?php if ($approved434 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename425)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>4.4 Implementation of the Kasambahay Law</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                        <th class="text-center">Reports 4.4.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename426 ?>" target="_blank"><?php echo $filename426 ?></a>&nbsp;&nbsp;<span onclick="delete_file4('<?php echo $filePath.$filename426 ?>',4,4,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_426()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal441" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal441" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment441 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved441)){ ?>
                                                    <?php if ($approved441 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename426)) { ?>
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
                                            <th class="text-center">Reports 4.4.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename427 ?>" target="_blank"><?php echo $filename427 ?></a>&nbsp;&nbsp;<span onclick="delete_file4('<?php echo $filePath.$filename427 ?>',4,4,2)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_427()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal442" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal442" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment442 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved442)){ ?>
                                                    <?php if ($approved442 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename427)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>4.5 Functionality of the Barangay Council for the Protection of Children (BCPC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                        <th class="text-center">Reports 4.5.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename428 ?>" target="_blank"><?php echo $filename428 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename428 ?>',4,5,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_428()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal451" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal451" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment451 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved451)){ ?>
                                                    <?php if ($approved451 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename428)) { ?>
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
                                            <th class="text-center">Reports 4.5.2</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename429 ?>" target="_blank"><?php echo $filename429 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename429 ?>',4,5,2)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_429()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal452" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal452" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment452 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved452)){ ?>
                                                    <?php if ($approved452 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename429)) { ?>
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
                                            <th class="text-center">Reports 4.5.3</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename430 ?>" target="_blank"><?php echo $filename430 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename430 ?>',4,5,3)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_430()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal453" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal453" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment453 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved453)){ ?>
                                                    <?php if ($approved453 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename430)) { ?>
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
                                            <th class="text-center">Reports 4.5.4</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename431 ?>" target="_blank"><?php echo $filename431 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename431 ?>',4,5,4)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_431()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal454" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal454" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment454 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved454)){ ?>
                                                    <?php if ($approved454 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename431)) { ?>
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
                                            <th class="text-center">Reports 4.5.5</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename432 ?>" target="_blank"><?php echo $filename432 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename432 ?>',4,5,5)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_432()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal455" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal455" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment455 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved455)){ ?>
                                                    <?php if ($approved455 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename432)) { ?>
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
                                            <th class="text-center">Reports 4.5.6</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Actions</th>
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
                                                    <a href="<?php echo $filePath.$filename433 ?>" target="_blank"><?php echo $filename433 ?></a>&nbsp;&nbsp;<span onclick="delete_file5('<?php echo $filePath.$filename433 ?>',4,5,6)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_433()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal456" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal456" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment456 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved456)){ ?>
                                                    <?php if ($approved456 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename433)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>4.6 Mechanism for Gender and Development (GAD)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                        <th class="text-center">Reports 4.6.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename434 ?>" target="_blank"><?php echo $filename434 ?></a>&nbsp;&nbsp;<span onclick="delete_file6('<?php echo $filePath.$filename434 ?>',4,6,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_434()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal461" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal461" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment461 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved461)){ ?>
                                                    <?php if ($approved461 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename434)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>4.7 Maintenance of Ipdated Record of Barangay Inhabitants (RBIs)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                        <th class="text-center">Reports 4.7.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename435 ?>" target="_blank"><?php echo $filename435 ?></a>&nbsp;&nbsp;<span onclick="delete_file7('<?php echo $filePath.$filename435 ?>',4,7,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_435()">Upload File</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal471" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal471" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment471 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved471)){ ?>
                                                    <?php if ($approved471 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename435)) { ?>
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
<script src="assessment_view_create4.js"></script>
</body>

</html>
