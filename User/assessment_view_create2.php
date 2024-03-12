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
                                <div class="col-lg-12"><h5 class="text-white"><b>Core Governance Area No. 2:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Disaster Preparedness</b></h5></div>
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
                                <div class="col-lg-12 text-center text-white"><b>2.1 Functionality of the Barangay Disaster Risk Reduction and Management Commitee (BDRRMC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 2.1.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Executive Order or similar issuance creating the BDRRMC compliant to composition requirements covering CY 2023.</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile211()" name="file_report_211" id="file_report_211" accept=".pdf" hidden>
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename211 = $id.$year.'file211.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename211)) { ?>
                                                    <a href="<?php echo $filePath.$filename211 ?>" target="_blank"><?php echo $filename211 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename211 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_211()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Approved BDRRM Plan CY 2023</td>
                                                <?php 
                                                    $filename212 = $id.$year.'file212.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile212()" name="file_report_212" id="file_report_212" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename212)) { ?>
                                                    <a href="<?php echo $filePath.$filename212 ?>" target="_blank"><?php echo $filename212 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename212 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_212()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Enacted Appropriation Ordinance</td>
                                                <?php 
                                                    $filename213 = $id.$year.'file213.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile213()" name="file_report_213" id="file_report_213" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename213)) { ?>
                                                    <a href="<?php echo $filePath.$filename213 ?>" target="_blank"><?php echo $filename213 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename213 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_213()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Accomplishment Report</td>
                                                <?php 
                                                    $filename214 = $id.$year.'file214.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile214()" name="file_report_214" id="file_report_214" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename214)) { ?>
                                                    <a href="<?php echo $filePath.$filename214 ?>" target="_blank"><?php echo $filename214 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename214 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_214()">Upload File</button>
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
                                                <input type="file" class="form-control" onchange="uploadFile215()" name="file_report_215" id="file_report_215" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename215)) { ?>
                                                    <a href="<?php echo $filePath.$filename215 ?>" target="_blank"><?php echo $filename215 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename215 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_215()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Post-Activity Report of activities such as Climate and Disaster Risk Assessment, Participatory Disaster Risk Assessment, BDRRM Planning, etc.</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile216()" name="file_report_216" id="file_report_216" accept=".pdf" hidden>
                                                <?php 
                                                    $filename216 = $id.$year.'file216.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename216)) { ?>
                                                    <a href="<?php echo $filePath.$filename216 ?>" target="_blank"><?php echo $filename216 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename216 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_216()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentation of the certified Barangay Risk/Hazzard Map</td>
                                                <?php 
                                                    $filename217 = $id.$year.'file217.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile217()" name="file_report_217" id="file_report_217" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename217)) { ?>
                                                    <a href="<?php echo $filePath.$filename217 ?>" target="_blank"><?php echo $filename217 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename217 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_217()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo documentation of EWS for the top two (2) hazards in the Barangay</td>
                                                <?php 
                                                    $filename218 = $id.$year.'file218.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile218()" name="file_report_218" id="file_report_218" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename218)) { ?>
                                                    <a href="<?php echo $filePath.$filename218 ?>" target="_blank"><?php echo $filename218 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename218 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_218()">Upload File</button>
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
                        </div>
                        <div class="row bg-info">
                                <div class="col-lg-12 text-center text-white"><b>2.3 Extend of Preparedness For Effective Response And Recovery</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 2.3.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo Documentation of the permanent/alternate evacuation center</td>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile219()" name="file_report_219" id="file_report_219" accept=".pdf" hidden>
                                                <?php 
                                                    $filename219 = $id.$year.'file219.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename219)) { ?>
                                                    <a href="<?php echo $filePath.$filename219 ?>" target="_blank"><?php echo $filename219 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename219 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_219()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Photo Documentation of disaster supplies equipment</td>
                                                <?php 
                                                    $filename220 = $id.$year.'file220.pdf';
                                                ?>
                                            <td class="text-center">
                                                <input type="file" class="form-control" onchange="uploadFile220()" name="file_report_220" id="file_report_220" accept=".pdf" hidden>
                                                <?php if (file_exists($filePath.$filename220)) { ?>
                                                    <a href="<?php echo $filePath.$filename220 ?>" target="_blank"><?php echo $filename220 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename220 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_220()">Upload File</button>
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
<script src="assessment_view_create2.js"></script>
</body>

</html>
