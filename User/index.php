
<?php
    // error_reporting(E_ALL ^ E_NOTICE);
    error_reporting(0);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    // if(!$_SESSION['idno']){ header('location:../actions/logout.php'); }
    require_once '../actions/dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }
    $current_year = date('Y');
    $id = $_SESSION['id'];
?>
<?php include 'core.php'; ?>
<?php include 'essen.php'; ?>
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
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
                        <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    <!-- </div> -->
                    <div class="text-center mt-4">
                        <h1>WELCOME TO MABISA</h1>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="assessment_year">Filter By Year :</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-control" id="assessment_year" style="width: 150px;" onchange="filter_d()">
                                    <?php 
                                        $currentYear = date("Y"); 
                                        $startingYear = 1990; // Specify the starting year here

                                        for ($year = $currentYear; $year >= $startingYear; $year--) {
                                    ?>
                                        <option value="<?php echo $year ?>"><?php echo $year ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div id="user_dash">
                    <div class="row mt-4">

                        <div class="col-lg-12 mb-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="btn btn-primary btn-block">CORE GOVERNANCE AREAS</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <!-- <div class="card border-left-primary shadow h-100 py-2"> -->
                            <div class="card bg-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12 mr-2 text-center" style="height: 50px">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Financial Administrator and Sustainability</div>
                                        </div>
                                        
                                        <div class="col-lg-12 mr-2 text-center">
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $total_score1 ?> / 7</div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <!-- <div class="card border-left-primary shadow h-100 py-2"> -->
                            <div class="card shadow h-100 py-2" style="background-color: #F1C40F;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12 mr-2 text-center" style="height: 50px">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Disaster Preparedness</div>
                                        </div>
                                        <div class="col-lg-12 mr-2 text-center">
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $total_score2 ?> / 3</div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <!-- <div class="card border-left-primary shadow h-100 py-2"> -->
                            <div class="card bg-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12 mr-2 text-center" style="height: 50px">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Safety, Peace and Order</div>
                                        </div>
                                        <div class="col-lg-12 mr-2 text-center">
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $total_score3 ?> / 6</div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->
                    <div class="row mt-4">

                        <div class="col-lg-12 mb-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="btn btn-info btn-block">ESSENTIAL GOVERNANCE AREAS</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <!-- <div class="card border-left-primary shadow h-100 py-2"> -->
                            <div class="card bg-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12 mr-2 text-center" style="height: 50px">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Social Protection and Sensitivity</div>
                                        </div>
                                        <div class="col-lg-12 mr-2 text-center">
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $total_score4 ?> / 7</div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <!-- <div class="card border-left-primary shadow h-100 py-2"> -->
                            <div class="card shadow h-100 py-2" style="background-color: #9F00FF;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12 mr-2 text-center" style="height: 50px">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Business-Friendliness and Competitiveness</div>
                                        </div>
                                        <div class="col-lg-12 mr-2 text-center">
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $total_score5 ?> / 3</div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <!-- <div class="card border-left-primary shadow h-100 py-2"> -->
                            <div class="card shadow h-100 py-2" style="background-color: #B8E994;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12 mr-2 text-center" style="height: 50px">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Environmental Management</div>
                                        </div>
                                        <div class="col-lg-12 mr-2 text-center">
                                            <div class="h5 mb-0 font-weight-bold text-white"><?php echo $total_score6 ?> / 3</div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
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
<script src="filter_dashboard.js"></script>
<script src="index.js"></script>
</body>

</html>