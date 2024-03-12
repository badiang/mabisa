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

    $currentYear = date('Y');
    $id = $_SESSION['id'];

    $stmt = $dbconn->prepare("SELECT COUNT(*) FROM assessment as a  inner join region as c on a.region_code=c.region_code inner join province as d on a.province_code=d.province_code inner join city as e on a.city_code=e.city_code inner join barangay as f on a.barangay_code=f.barangay_code where a.id=? and a.year=?");
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $currentYear);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count != 0) {
        
        $query = $dbconn->prepare("SELECT a.keyctr,a.id,a.year,a.date_time,a.status,c.region_name,d.province_name,e.city_name,f.barangay_name FROM assessment as a  inner join region as c on a.region_code=c.region_code inner join province as d on a.province_code=d.province_code inner join city as e on a.city_code=e.city_code inner join barangay as f on a.barangay_code=f.barangay_code where a.id=? and a.year=?");
        $query->bindParam(1, $id);
        $query->bindParam(2, $currentYear);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        $region_name = $result['region_name'];
        $province_name = $result['province_name'];
        $city_name = $result['city_name'];
        $barangay_name = $result['barangay_name'];
        $year = $result['year'];
        $status = $result['status'];

    }else{
        $region_name = '';
        $province_name = '';
        $city_name = '';
        $barangay_name = '';
        $year = '';
        $status = '';

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
                                <div class="col-lg-12">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body" id="viewLocation">
                            <div class="text-center" style="background-color: #EC1958;color: white;">
                                <h5><b>Core Governance Area : 1</b></h5>
                                <h5><b>Financial Administration and Sustainability</b></h5>
                            </div>
                            <div class="table-responsive" id="assessmenTable">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>#</th>
                                            <th>Indicators</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.1</td>
                                            <td>Compliance with the Barangay Full Disclosure Policy (BFDP)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>1.2</td>
                                            <td>Innovations on revenue generation or exercise of corporate powers</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>1.3</td>
                                            <td>Approval of the Barangay Budget on the Specified Timeframe</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>1.4</td>
                                            <td>Approval for Statutory Program and projects as Mandated by Laws and or ther Issuances</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>1.5</td>
                                            <td>Posting of the Barangay Citizen's Charter (CitCha)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>1.6</td>
                                            <td>Release of the Sangguniang Kabataan (SK) Funds by the Barangay</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>1.7</td>
                                            <td>Conduct if Barangay Assembly for C.y. 2023 (2<sup>nd</sup> Semester)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th class="text-right">TOTAL : </th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="text-center mt-4" style="background-color: #EC1958;color: white;">
                                <h5><b>Core Governance Area : 2</b></h5>
                                <h5><b>Disaster Preparedness</b></h5>
                            </div>
                            <div class="table-responsive" id="assessmenTable">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>#</th>
                                            <th>Indicators</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2.1</td>
                                            <td>Functionality of the Barangay Disaster Risk Reduction and Management Commitee (BDRRMC)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>2.2</td>
                                            <td>Extend of Risk Assessment and Early Warning System (EWS)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>2.3</td>
                                            <td>Extend of Preparedness For Effective Response And Recovery</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th class="text-right">TOTAL : </th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="text-center mt-4" style="background-color: #EC1958;color: white;">
                                <h5><b>Core Governance Area : 3</b></h5>
                                <h5><b>Safety, Peace and Order</b></h5>
                            </div>
                            <div class="table-responsive" id="assessmenTable">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>#</th>
                                            <th>Indicators</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>3.1</td>
                                            <td>Functionality of the Barangay Anti-Drug Abuse Council (BADAC)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>3.2</td>
                                            <td>Functionality of the Barangay Peace and Order Committee (BPOC)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>3.3</td>
                                            <td>Functionality of the Lupong Tagapamayapa (LT)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>3.4</td>
                                            <td>Organization and Strengthening Capacities of Barangay Tanod</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>3.5</td>
                                            <td>Barangay Initiatives During Health Emergencies</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>3.6</td>
                                            <td>Conduct of Monthly Barangay Road Clearing Operations (BaRCO)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th class="text-right">TOTAL : </th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="text-center mt-4" style="background-color: #EC1958;color: white;">
                                <h5><b>Essential Governance Area : 1</b></h5>
                                <h5><b>Social Protection and Sensitivity</b></h5>
                            </div>
                            <div class="table-responsive" id="assessmenTable">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>#</th>
                                            <th>Indicators</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>4.1</td>
                                            <td>Functionality of Barangay Violence Against Women (VAW) Desk</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>4.2</td>
                                            <td>Access to Health and Social Welfare Services in the Barangay</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>4.3</td>
                                            <td>Functionality of the Barangay Development Council (BDC)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>4.4</td>
                                            <td>Implementation of the Kasambahay Law</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>4.5</td>
                                            <td>Functionality of the Barangay Council for the Protection of Children (BCPC)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>4.6</td>
                                            <td>Mechanism for Gender and Development (GAD)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>4.7</td>
                                            <td>Maintenance of Ipdated Record of Barangay Inhabitants (RBIs)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th class="text-right">TOTAL : </th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="text-center mt-4" style="background-color: #EC1958;color: white;">
                                <h5><b>Essential Governance Area : 2</b></h5>
                                <h5><b>Business Friendliness and Competitiveness</b></h5>
                            </div>
                            <div class="table-responsive" id="assessmenTable">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>#</th>
                                            <th>Indicators</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>5.1</td>
                                            <td>Power to Levy Other Taxes, Fees, or Charges</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>5.2</td>
                                            <td>Compiliance to Section 11 of RA 11032 of the Ease of Doing Business Law</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>5.3</td>
                                            <td>Issuance of Barangay Clearance not covered by DILG MC No. 2019-177 such as: residency, indigency, etc, within seven (7) working days</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th class="text-right">TOTAL : </th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="text-center mt-4" style="background-color: #EC1958;color: white;">
                                <h5><b>Essential Governance Area : 3</b></h5>
                                <h5><b>Environmental Management</b></h5>
                            </div>
                            <div class="table-responsive" id="assessmenTable">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>#</th>
                                            <th>Indicators</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>6.1</td>
                                            <td>Functionality of the Barangay Ecological Solid Waste Management Committee (BESWMC)</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>6.2</td>
                                            <td>Existence of a Solid Waste Management Facility Pursuant to R.A. 9003</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                        <tr>
                                            <td>6.3</td>
                                            <td>Provision of Support Mechanisms for Segregated Collection</td>
                                            <td><input class="form-control" type="number" name=""></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th class="text-right">TOTAL : </th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </tfoot>
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
</body>

</html>
