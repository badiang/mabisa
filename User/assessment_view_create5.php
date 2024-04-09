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

            $query51 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1 
                FROM area_assessment_points where user_id=? and year_=? and area_number=5 and under_area=1");
            $query51->bindParam(1, $id);
            $query51->bindParam(2, $year);
            $query51->execute();
            $result51 = $query51->fetch(PDO::FETCH_ASSOC);
            $remarks51 = $result51['remarks'];
            $area_points51 = $result51['area_points'];
            $comment511 = $result51['comment1'];
            $approved511 = $result51['approved1'];

            $query52 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1,
                comment2,approved2
                FROM area_assessment_points where user_id=? and year_=? and area_number=5 and under_area=2");
            $query52->bindParam(1, $id);
            $query52->bindParam(2, $year);
            $query52->execute();
            $result52 = $query52->fetch(PDO::FETCH_ASSOC);
            $remarks52 = $result52['remarks'];
            $area_points52 = $result52['area_points'];
            $comment521 = $result52['comment1'];
            $approved521 = $result52['approved1'];
            $comment522 = $result52['comment2'];
            $approved522 = $result52['approved2'];

            $query53 = $dbconn->prepare("SELECT remarks,area_points,
                comment1,approved1 
                FROM area_assessment_points where user_id=? and year_=? and area_number=5 and under_area=3");
            $query53->bindParam(1, $id);
            $query53->bindParam(2, $year);
            $query53->execute();
            $result53 = $query53->fetch(PDO::FETCH_ASSOC);
            $remarks53 = $result53['remarks'];
            $area_points53 = $result53['area_points'];
            $comment531 = $result53['comment1'];
            $approved531 = $result53['approved1'];
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
                                <div class="col-lg-12"><h5 class="text-white"><b>Essential Governance Area No. 2:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Business Friendliness and Competitiveness</b></h5></div>
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
                                <div class="col-lg-12 text-center text-white"><b>5.1 Power to Levy Other Taxes, Fees, or Charges</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 5.1.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Enacted Barangay Tax Ordinance</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile511()" name="file_report_511" id="file_report_511" accept=".pdf" hidden>
                                                <?php 
                                                    $filePath = '../actions/upload5/uploaded/'; 
                                                    $filename511 = $id.$year.'file511.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename511)) { ?>
                                                    <a href="<?php echo $filePath.$filename511 ?>" target="_blank"><?php echo $filename511 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename511 ?>',5,1,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_511()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal511" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal511" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment511 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved511)){ ?>
                                                    <?php if ($approved511 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename511)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>5.2 Compiliance to Section 11 of RA 11032 of the Ease of Doing Business Law</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 5.2.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Enacted Barangay Ordinance relative to Barangay Clearance Fees on business permit and locational clearance for building permit, in accordance with MC No. 2019-177</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile512()" name="file_report_512" id="file_report_512" accept=".pdf" hidden>
                                                <?php 
                                                    $filename512 = $id.$year.'file512.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename512)) { ?>
                                                    <a href="<?php echo $filePath.$filename512 ?>" target="_blank"><?php echo $filename512 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename512 ?>',5,2,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_512()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal521" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal521" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment521 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved521)){ ?>
                                                    <?php if ($approved521 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename512)) { ?>
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
                                            <th class="text-center">Reports 5.2.2</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved resolution authorizing the Municipal Treasurer to collect fees for Barangay Clearance for Business permit and locational clearance purpose</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile513()" name="file_report_513" id="file_report_513" accept=".pdf" hidden>
                                                <?php 
                                                    $filename513 = $id.$year.'file513.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename513)) { ?>
                                                    <a href="<?php echo $filePath.$filename513 ?>" target="_blank"><?php echo $filename513 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename513 ?>',5,2,2)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_513()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal522" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal522" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment522 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved522)){ ?>
                                                    <?php if ($approved522 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename513)) { ?>
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
                                <div class="col-lg-12 text-center text-white"><b>5.3 Issuance of Barangay Clearance not covered by DILG MC No. 2019-177 such as: residency, indigency, etc, within seven (7) working days</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 5.3.1</th>
                                            <th class="text-center" style="width: 200px">Attachments</th>
                                            <th class="text-center" style="width: 140px">Actions</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentation of the Citizens' Charter on the issuance of Barangay Clearance only (name of the Barangay should be visible)</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile514()" name="file_report_514" id="file_report_514" accept=".pdf" hidden>
                                                <?php 
                                                    $filename514 = $id.$year.'file514.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename514)) { ?>
                                                    <a href="<?php echo $filePath.$filename514 ?>" target="_blank"><?php echo $filename514 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename514 ?>',5,3,1)" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_514()">Upload File</button>
                                                <?php } ?>
                                                
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm btn-comment" data-toggle="modal" data-target="#commentModal531" onclick="generateFileLink()">
                                                    View Comment
                                                </button>
                                                <div class="modal fade" id="commentModal531" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
                                                                <label for=""><b>Admin Remarks:</b> <?php echo $comment531 ?></label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($approved531)){ ?>
                                                    <?php if ($approved531 == 1){ ?>
                                                        <img src="../img/icon/Approved.png" width="30">
                                                    <?php }else{ ?>
                                                        <img src="../img/icon/Disapproved.png" width="30">
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <?php if (file_exists($filePath.$filename514)) { ?>
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
<script src="assessment_view_create5.js"></script>
</body>

</html>
