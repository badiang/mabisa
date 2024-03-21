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
       
        $query1 = $dbconn->prepare("SELECT 
            comment1,approved1,
            comment2,approved2,
            comment3,approved3,
            comment4,approved4,
            comment5,approved5,
            comment6,approved6,
            comment7,approved7,
            comment8,approved8,
            comment9,approved9,
            comment10,approved10
            FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=1");
        $query1->bindParam(1, $id);
        $query1->bindParam(2, $year);
        $query1->execute();
        $result1 = $query1->fetch(PDO::FETCH_ASSOC);
    
    if ($result1 !== false) {
        $comment1 = $result1['comment1'];
        $approved1 = $result1['approved1'];
        $comment2 = $result1['comment2'];
        $approved2 = $result1['approved2'];
        $comment3 = $result1['comment3'];
        $approved3 = $result1['approved3'];
        $comment4 = $result1['comment4'];
        $approved4 = $result1['approved4'];
        $comment5 = $result1['comment5'];
        $approved5 = $result1['approved5'];
        $comment6 = $result1['comment6'];
        $approved6 = $result1['approved6'];
        $comment7 = $result1['comment7'];
        $approved7 = $result1['approved7'];
        $comment8 = $result1['comment8'];
        $approved8 = $result1['approved8'];
        $comment9 = $result1['comment9'];
        $approved9 = $result1['approved9'];
        $comment10 = $result1['comment10'];
        $approved10 = $result1['approved10'];
    }

        $query12 = $dbconn->prepare("SELECT 
        comment1, approved1, remarks, area_points
            FROM area_assessment_points 
            WHERE user_id=? AND year_=? AND area_number=1 AND under_area=2");
        $query12->bindParam(1, $id);
        $query12->bindParam(2, $year);
        $query12->execute();
        $result12 = $query12->fetch(PDO::FETCH_ASSOC);
    
    if ($result12 !== false) {
        $remarks12 = $result12['remarks'];
        $area_points12 = $result12['area_points']; // This line should work now
        $comment121 = $result12['comment1'];
        $approved121 = $result12['approved1'];
    }
        
        $query13 = $dbconn->prepare("SELECT 
        comment1, approved1, remarks, area_points
            FROM area_assessment_points 
            WHERE user_id=? AND year_=? AND area_number=1 AND under_area=3");
        $query13->bindParam(1, $id);
        $query13->bindParam(2, $year);
        $query13->execute();
        $result13 = $query13->fetch(PDO::FETCH_ASSOC);
    
    if ($result13 !== false) {
        $remarks13 = $result13['remarks']; // This line should work now
        $comment131 = $result13['comment1'];
        $approved131 = $result13['approved1'];
    }
        
        $query14 = $dbconn->prepare("SELECT 
            comment1,approved1, remarks, area_points
            FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=4");
        $query14->bindParam(1, $id);
        $query14->bindParam(2, $year);
        $query14->execute();
        $result14 = $query14->fetch(PDO::FETCH_ASSOC);

    if ($result14 !== false) {
        $remarks14 = $result14['remarks'];
        $area_points14 = $result14['area_points'];
        $comment141 = $result14['comment1'];
        $approved141 = $result14['approved1'];
    }

        $query15 = $dbconn->prepare("SELECT 
            comment1,approved1 , remarks, area_points
            FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=5");
        $query15->bindParam(1, $id);
        $query15->bindParam(2, $year);
        $query15->execute();
        $result15 = $query15->fetch(PDO::FETCH_ASSOC);
    
    if ($result15 !== false) {
        $remarks15 = $result15['remarks'];
        $area_points15 = $result15['area_points'];
        $comment151 = $result15['comment1'];
        $approved151 = $result15['approved1'];
    }

        $query16 = $dbconn->prepare("SELECT 
            comment1,approved1, remarks, area_points
            comment2,approved2, remarks, area_points
            comment3,approved3, remarks, area_points
            comment4,approved4, remarks, area_points
            comment5,approved5, remarks, area_points
            comment6,approved6, remarks, area_points
            FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=6");
        $query16->bindParam(1, $id);
        $query16->bindParam(2, $year);
        $query16->execute();
        $result16 = $query16->fetch(PDO::FETCH_ASSOC);

    if ($result16 !== false) {
        $remarks16 = $result16['remarks'];
        $area_points16 = $result16['area_points'];
        $comment161 = $result16['comment1'];
        $approved161 = $result16['approved1'];
        $comment162 = $result16['comment2'];
        $approved162 = $result16['approved2'];
        $comment163 = $result16['comment3'];
        $approved163 = $result16['approved3'];
        $comment164 = $result16['comment4'];
        $approved164 = $result16['approved4'];
        $comment165 = $result16['comment5'];
        $approved165 = $result16['approved5'];
        $comment166 = $result16['comment6'];
        $approved166 = $result16['approved6'];
    }

        $query17 = $dbconn->prepare("SELECT 
            comment1,approved1, remarks, area_points
            FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=7");
        $query17->bindParam(1, $id);
        $query17->bindParam(2, $year);
        $query17->execute();
        $result17 = $query17->fetch(PDO::FETCH_ASSOC);

    if ($result17 !== false) {
        $remarks17 = $result17['remarks'];
        $area_points17 = $result17['area_points'];
        $comment171 = $result17['comment1'];
        $approved171 = $result17['approved1'];
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
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include '../lib/topbar.php' ?>
                <div class="container-fluid">
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
                        <p style="text-align: center;">Legends :&nbsp;&nbsp;&nbsp;&nbsp;
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
                                <div class="col-lg-12 text-center text-white"><b>1.1 Compliance with the Barangay Full Disclosure Policy (BFDP)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.1.1</th>
                                            <th class="text-center" style="width: 250px">Attachments</th>
                                            <th class="text-center" style="width: 150px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal111" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal111" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment1) ? $comment1 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved1)){ ?>
                                                    <?php if ($approved1 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename1)) { ?>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal112" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal112" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment2) ? $comment2 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved2)){ ?>
                                                    <?php if ($approved2 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename2)) { ?>
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
                                            <th class="">Annual Report</th>
                                            <th class="text-center"></th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal113" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal113" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                            <label for=""><b>Admin Remarks:</b> <?php echo isset($comment3) ? $comment3 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved3)){ ?>
                                                    <?php if ($approved3 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename3)) { ?>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal114" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal114" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment4) ? $comment4 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved4)){ ?>
                                                    <?php if ($approved4 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename4)) { ?>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal115" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal115" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment5) ? $comment5 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved5)){ ?>
                                                    <?php if ($approved5 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename5)) { ?>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal116" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal116" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment6) ? $comment6 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved6)){ ?>
                                                    <?php if ($approved6 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename6)) { ?>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal117" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal117" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment7) ? $comment7 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved7)){ ?>
                                                    <?php if ($approved7 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename7)) { ?>
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
                                            <th class="">Quarterly Report</th>
                                            <th class="text-center"></th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal118" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal118" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment8) ? $comment8 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved8)){ ?>
                                                    <?php if ($approved8 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename8)) { ?>
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
                                            <th class="">Monthly Report</th>
                                            <th class="text-center"></th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal119" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal119" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment9) ? $comment9 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved9)){ ?>
                                                    <?php if ($approved9 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename9)) { ?>
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
                                            <th class="text-center">Reports 1.1.2</th>
                                            <th class="text-center" style="width: 250px">Attachments</th>
                                            <th class="text-center" style="width: 150px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal1110" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal1110" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment10) ? $comment10 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved10)){ ?>
                                                    <?php if ($approved10 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename10)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.2 Innovations on revenue generation or exercise of corporate powers</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.2.1</th>
                                            <th class="text-center" style="width: 250px">Attachments</th>
                                            <th class="text-center" style="width: 150px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal121" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal121" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment121) ? $comment121 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved121)){ ?>
                                                    <?php if ($approved121 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename11)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.3 Approval of the Barangay Budget on the Specified Timeframe</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.3.1</th>
                                            <th class="text-center" style="width: 250px">Attachments</th>
                                            <th class="text-center" style="width: 150px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal131" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal131" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment131) ? $comment131 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved131)){ ?>
                                                    <?php if ($approved131 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename12)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.4 Allocation for Statutory Programs and Projects as Mandated by Laws and/or Other Issuances</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.4.1</th>
                                            <th class="text-center" style="width: 250px">Attachments</th>
                                            <th class="text-center" style="width: 150px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal141" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal141" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment141) ? $comment141 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved141)){ ?>
                                                    <?php if ($approved141 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename13)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.5 Posting of the Barangay Citizens' Charter (CitCha)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.5.1</th>
                                            <th class="text-center" style="width: 250px">Attachments</th>
                                            <th class="text-center" style="width: 150px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal151" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal151" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment151) ? $comment151 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved151)){ ?>
                                                    <?php if ($approved151 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename14)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.6 Release of the Sangguniang Kabataan (SK) Funds by the Barangay</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.6.1</th>
                                            <th class="text-center" style="width: 250px">Attachments</th>
                                            <th class="text-center" style="width: 150px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal161" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal161" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment161) ? $comment161 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved161)){ ?>
                                                    <?php if ($approved161 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename15)) { ?>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal162" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal162" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment162) ? $comment162 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved162)){ ?>
                                                    <?php if ($approved162 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename16)) { ?>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal163" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal163" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment163) ? $comment163 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved163)){ ?>
                                                    <?php if ($approved163 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename17)) { ?>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal164" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal164" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment164) ? $comment164 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved164)){ ?>
                                                    <?php if ($approved164 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename18)) { ?>
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
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.6.2</th>
                                            <th class="text-center" style="width: 250px">Attachments</th>
                                            <th class="text-center" style="width: 150px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal165" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal165" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment165) ? $comment165 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved165)){ ?>
                                                    <?php if ($approved165 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename19)) { ?>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal166" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal166" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment166) ? $comment166 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved166)){ ?>
                                                    <?php if ($approved166 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename20)) { ?>
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
                        <div class="card-body" id="viewLocation">
                            <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>1.7 Conduct of Barangay Assembly for CY 2023 (2nd Semester)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 1.7.1</th>
                                            <th class="text-center" style="width: 250px">Attachments</th>
                                            <th class="text-center" style="width: 150px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
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
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal171" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal171" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo isset($comment171) ? $comment171 : '' ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved171)){ ?>
                                                    <?php if ($approved171 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename21)) { ?>
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
<script src="assessment_view_create.js"></script>
</body>

</html>
