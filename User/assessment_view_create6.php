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
                                <div class="col-lg-12"><h5 class="text-white"><b>Essential Governance Area No. 3:</b></h5></div>
                                <div class="col-lg-12"><h5 class="text-white"><b>Environmental Management</b></h5></div>
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
                                <div class="col-lg-12 text-center text-white"><b>6.1 Functionality of the Barangay Ecological Solid Waste Management Committee (BESWMC)</b></div>
                            </div>
                            <div class="table-responsive mt-4 container" id="">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Reports 6.1.1</th>
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename611 ?>" target="_blank"><?php echo $filename611 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename611 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_611()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename612 ?>" target="_blank"><?php echo $filename612 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename612 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_612()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename613 ?>" target="_blank"><?php echo $filename613 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename613 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_613()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename614 ?>" target="_blank"><?php echo $filename614 ?></a>&nbsp;&nbsp;<span onclick="delete_file1('<?php echo $filePath.$filename614 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_614()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename615 ?>" target="_blank"><?php echo $filename615 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename615 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_615()">Upload File</button>
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
                                                <input type="file" class="form-control" onchange="uploadFile616()" name="file_report_616" id="file_report_616" accept=".pdf" hidden>
                                                <?php 
                                                    $filename616 = $id.$year.'file616.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename616)) { ?>
                                                    <a href="<?php echo $filePath.$filename616 ?>" target="_blank"><?php echo $filename616 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename616 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_616()">Upload File</button>
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
                                                <input type="file" class="form-control" onchange="uploadFile617()" name="file_report_617" id="file_report_617" accept=".pdf" hidden>
                                                <?php 
                                                    $filename617 = $id.$year.'file617.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename617)) { ?>
                                                    <a href="<?php echo $filePath.$filename617 ?>" target="_blank"><?php echo $filename617 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename617 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_617()">Upload File</button>
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
                                                <input type="file" class="form-control" onchange="uploadFile618()" name="file_report_618" id="file_report_618" accept=".pdf" hidden>
                                                <?php 
                                                    $filename618 = $id.$year.'file618.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename618)) { ?>
                                                    <a href="<?php echo $filePath.$filename618 ?>" target="_blank"><?php echo $filename618 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename618 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_618()">Upload File</button>
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
                                                <input type="file" class="form-control" onchange="uploadFile619()" name="file_report_619" id="file_report_619" accept=".pdf" hidden>
                                                <?php 
                                                    $filename619 = $id.$year.'file619.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename619)) { ?>
                                                    <a href="<?php echo $filePath.$filename619 ?>" target="_blank"><?php echo $filename619 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename619 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_619()">Upload File</button>
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
                                                <input type="file" class="form-control" onchange="uploadFile620()" name="file_report_620" id="file_report_620" accept=".pdf" hidden>
                                                <?php 
                                                    $filename620 = $id.$year.'file620.pdf';
                                                ?>

                                                <?php if (file_exists($filePath.$filename620)) { ?>
                                                    <a href="<?php echo $filePath.$filename620 ?>" target="_blank"><?php echo $filename620 ?></a>&nbsp;&nbsp;<span onclick="delete_file2('<?php echo $filePath.$filename620 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_620()">Upload File</button>
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
                                            <th class="text-center">Attachments</th>
                                            <th class="text-center">Status</th>
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
                                                    <a href="<?php echo $filePath.$filename621 ?>" target="_blank"><?php echo $filename621 ?></a>&nbsp;&nbsp;<span onclick="delete_file3('<?php echo $filePath.$filename621 ?>')" style="cursor: pointer;color: red;"><i class="fas fa-trash"></i></span>
                                                <?php }else{ ?>
                                                    <button class="btn btn-sm btn-success" onclick="upload_621()">Upload File</button>
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
<script src="assessment_view_create6.js"></script>
</body>

</html>
