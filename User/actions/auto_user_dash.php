<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    // if(!$_SESSION['idno']){ header('location:../actions/logout.php'); }
    require_once '../../actions/dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }

    $id = $_SESSION['id'];
    if (isset($_POST['ref'])) {
        $val = $_POST['val'];
?>    
<?php include 'core.php'; ?>    
<?php include 'essen.php'; ?>    
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
<?php } ?>