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
    // if (!empty($_GET['alert'])) {
    //     if ($_GET['alert'] == 1) {
    //         $stmt = $dbconn->prepare("UPDATE area_assessment_points set noti_me=false where user_id=?");
    //         $stmt->bindParam(1, $id);
    //         $stmt->execute();
    //     }
    //     $currentYear = $_GET['yr'];
    // }else{
    //     $currentYear = date('Y');
        
    // }
    
    $currentYear = date('Y');

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


        $query11 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='1' and under_area='1'");
        $query11->bindParam(1, $id);
        $query11->bindParam(2, $currentYear);
        $query11->execute();
        $result11 = $query11->fetch(PDO::FETCH_ASSOC);
        if (!empty($result11['remarks'])) {
            $remarks11 = $result11['remarks'];
        }

        $query12 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='1' and under_area='2'");
        $query12->bindParam(1, $id);
        $query12->bindParam(2, $currentYear);
        $query12->execute();
        $result12 = $query12->fetch(PDO::FETCH_ASSOC);
        if (!empty($result12['remarks'])) {
            $remarks12 = $result12['remarks'];
        }

        $query13 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='1' and under_area='3'");
        $query13->bindParam(1, $id);
        $query13->bindParam(2, $currentYear);
        $query13->execute();
        $result13 = $query13->fetch(PDO::FETCH_ASSOC);
        if (!empty($result13['remarks'])) {
            $remarks13 = $result13['remarks'];
        }
        
        $query14 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='1' and under_area='4'");
        $query14->bindParam(1, $id);
        $query14->bindParam(2, $currentYear);
        $query14->execute();
        $result14 = $query14->fetch(PDO::FETCH_ASSOC);
        if (!empty($result14['remarks'])) {
            $remarks14 = $result14['remarks'];
        }

        $query15 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='1' and under_area='5'");
        $query15->bindParam(1, $id);
        $query15->bindParam(2, $currentYear);
        $query15->execute();
        $result15 = $query15->fetch(PDO::FETCH_ASSOC);
        if (!empty($result15['remarks'])) {
            $remarks15 = $result15['remarks'];
        }

        $query16 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='1' and under_area='6'");
        $query16->bindParam(1, $id);
        $query16->bindParam(2, $currentYear);
        $query16->execute();
        $result16 = $query16->fetch(PDO::FETCH_ASSOC);
        if (!empty($result16['remarks'])) {
            $remarks16 = $result16['remarks'];
        }

        $query17 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='1' and under_area='7'");
        $query17->bindParam(1, $id);
        $query17->bindParam(2, $currentYear);
        $query17->execute();
        $result17 = $query17->fetch(PDO::FETCH_ASSOC);
        if (!empty($result17['remarks'])) {
            $remarks17 = $result17['remarks'];
        }

        $query21 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='2' and under_area='1'");
        $query21->bindParam(1, $id);
        $query21->bindParam(2, $currentYear);
        $query21->execute();
        $result21 = $query21->fetch(PDO::FETCH_ASSOC);
        if (!empty($result21['remarks'])) {
            $remarks21 = $result21['remarks'];
        }

        $query22 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='2' and under_area='2'");
        $query22->bindParam(1, $id);
        $query22->bindParam(2, $currentYear);
        $query22->execute();
        $result22 = $query22->fetch(PDO::FETCH_ASSOC);
        if (!empty($result22['remarks'])) {
            $remarks22 = $result22['remarks'];
        }

        $query23 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='2' and under_area='3'");
        $query23->bindParam(1, $id);
        $query23->bindParam(2, $currentYear);
        $query23->execute();
        $result23 = $query23->fetch(PDO::FETCH_ASSOC);
        if (!empty($result23['remarks'])) {
            $remarks23 = $result23['remarks'];
        }

        $query31 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='3' and under_area='1'");
        $query31->bindParam(1, $id);
        $query31->bindParam(2, $currentYear);
        $query31->execute();
        $result31 = $query31->fetch(PDO::FETCH_ASSOC);
        if (!empty($result31['remarks'])) {
            $remarks31 = $result31['remarks'];
        }

        $query32 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='3' and under_area='2'");
        $query32->bindParam(1, $id);
        $query32->bindParam(2, $currentYear);
        $query32->execute();
        $result32 = $query32->fetch(PDO::FETCH_ASSOC);
        if (!empty($result32['remarks'])) {
            $remarks32 = $result32['remarks'];
        }

        $query33 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='3' and under_area='3'");
        $query33->bindParam(1, $id);
        $query33->bindParam(2, $currentYear);
        $query33->execute();
        $result33 = $query33->fetch(PDO::FETCH_ASSOC);
        if (!empty($result33['remarks'])) {
            $remarks33 = $result33['remarks'];
        }

        $query34 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='3' and under_area='4'");
        $query34->bindParam(1, $id);
        $query34->bindParam(2, $currentYear);
        $query34->execute();
        $result34 = $query34->fetch(PDO::FETCH_ASSOC);
        if (!empty($result34['remarks'])) {
            $remarks34 = $result34['remarks'];
        }

        $query35 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='3' and under_area='5'");
        $query35->bindParam(1, $id);
        $query35->bindParam(2, $currentYear);
        $query35->execute();
        $result35 = $query35->fetch(PDO::FETCH_ASSOC);
        if (!empty($result35['remarks'])) {
            $remarks35 = $result35['remarks'];
        }

        $query36 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='3' and under_area='6'");
        $query36->bindParam(1, $id);
        $query36->bindParam(2, $currentYear);
        $query36->execute();
        $result36 = $query36->fetch(PDO::FETCH_ASSOC);
        if (!empty($result36['remarks'])) {
            $remarks36 = $result36['remarks'];
        }

        $query41 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='4' and under_area='1'");
        $query41->bindParam(1, $id);
        $query41->bindParam(2, $currentYear);
        $query41->execute();
        $result41 = $query41->fetch(PDO::FETCH_ASSOC);
        if (!empty($result41['remarks'])) {
            $remarks41 = $result41['remarks'];
        }

        $query42 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='4' and under_area='2'");
        $query42->bindParam(1, $id);
        $query42->bindParam(2, $currentYear);
        $query42->execute();
        $result42 = $query42->fetch(PDO::FETCH_ASSOC);
        if (!empty($result42['remarks'])) {
            $remarks42 = $result42['remarks'];
        }

        $query43 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='4' and under_area='3'");
        $query43->bindParam(1, $id);
        $query43->bindParam(2, $currentYear);
        $query43->execute();
        $result43 = $query43->fetch(PDO::FETCH_ASSOC);
        if (!empty($result43['remarks'])) {
            $remarks43 = $result43['remarks'];
        }

        $query44 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='4' and under_area='4'");
        $query44->bindParam(1, $id);
        $query44->bindParam(2, $currentYear);
        $query44->execute();
        $result44 = $query44->fetch(PDO::FETCH_ASSOC);
        if (!empty($result44['remarks'])) {
            $remarks44 = $result44['remarks'];
        }

        $query45 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='4' and under_area='5'");
        $query45->bindParam(1, $id);
        $query45->bindParam(2, $currentYear);
        $query45->execute();
        $result45 = $query45->fetch(PDO::FETCH_ASSOC);
        if (!empty($result45['remarks'])) {
            $remarks45 = $result45['remarks'];
        }

        $query46 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='4' and under_area='6'");
        $query46->bindParam(1, $id);
        $query46->bindParam(2, $currentYear);
        $query46->execute();
        $result46 = $query46->fetch(PDO::FETCH_ASSOC);
        if (!empty($result46['remarks'])) {
            $remarks46 = $result46['remarks'];
        }

        $query47 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='4' and under_area='7'");
        $query47->bindParam(1, $id);
        $query47->bindParam(2, $currentYear);
        $query47->execute();
        $result47 = $query47->fetch(PDO::FETCH_ASSOC);
        if (!empty($result47['remarks'])) {
            $remarks47 = $result47['remarks'];
        }

        $query51 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='5' and under_area='1'");
        $query51->bindParam(1, $id);
        $query51->bindParam(2, $currentYear);
        $query51->execute();
        $result51 = $query51->fetch(PDO::FETCH_ASSOC);
        if (!empty($result51['remarks'])) {
            $remarks51 = $result51['remarks'];
        }

        $query52 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='5' and under_area='2'");
        $query52->bindParam(1, $id);
        $query52->bindParam(2, $currentYear);
        $query52->execute();
        $result52 = $query52->fetch(PDO::FETCH_ASSOC);
        if (!empty($result52['remarks'])) {
            $remarks52 = $result52['remarks'];
        }

        $query53 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='5' and under_area='3'");
        $query53->bindParam(1, $id);
        $query53->bindParam(2, $currentYear);
        $query53->execute();
        $result53 = $query53->fetch(PDO::FETCH_ASSOC);
        if (!empty($result53['remarks'])) {
            $remarks53 = $result53['remarks'];
        }

        $query61 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='6' and under_area='1'");
        $query61->bindParam(1, $id);
        $query61->bindParam(2, $currentYear);
        $query61->execute();
        $result61 = $query61->fetch(PDO::FETCH_ASSOC);
        if (!empty($result61['remarks'])) {
            $remarks61 = $result61['remarks'];
        }

        $query62 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='6' and under_area='2'");
        $query62->bindParam(1, $id);
        $query62->bindParam(2, $currentYear);
        $query62->execute();
        $result62 = $query62->fetch(PDO::FETCH_ASSOC);
        if (!empty($result62['remarks'])) {
            $remarks62 = $result62['remarks'];
        }

        $query63 = $dbconn->prepare("SELECT remarks FROM area_assessment_points where user_id=? and year_=? and area_number='6' and under_area='3'");
        $query63->bindParam(1, $id);
        $query63->bindParam(2, $currentYear);
        $query63->execute();
        $result63 = $query63->fetch(PDO::FETCH_ASSOC);
        if (!empty($result63['remarks'])) {
            $remarks63 = $result63['remarks'];
        }

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
                                            <?php if ($status == 0) {?>
                                                <span class="btn-sm btn btn-primary">In Progress</span>
                                            <?php }else{?>
                                                <span><?php echo $status ?></span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body" id="viewLocation">
                            <div class="table-responsive" id="assessmenTable">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead style="background-color: #EDF865;">
                                        <tr>
                                            <th class="text-center" style="color: black;">CORE GOVERNANCE AREA</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color: #2980B9;">
                                        <tr>
                                            <td class="text-center" style="color: white;">Financial Administrator and Sustainability</td>
                                        </tr>
                                    </tbody>
                                    <tbody style="background-color: #F0E6E6;">
                                        <tr style="background-color: lightgray;"><th class="text-center">1.1 Compliance with the Barangay Full Disclosure Policy (BFDP)</th></tr>
                                        <?php if (!empty($result11['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks11 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">1.2 Innovations on revenue generation or exercise of corporate powers</th></tr>
                                        <?php if (!empty($result12['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks12 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">1.3 Approval of the Barangay Budget on the Specified Timeframe</th></tr>
                                        <?php if (!empty($result13['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks13 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">1.4 Allocation for Statutory Programs and Projects as Mandated by Laws and/or Other Issuances</th></tr>
                                        <?php if (!empty($result14['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks14 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">1.5 Posting of the Barangay Citizens' Charter (CitCha)</th></tr>
                                        <?php if (!empty($result15['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks15 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">1.6 Release of the Sangguniang Kabataan (SK) Funds by the Barangay</th></tr>
                                        <?php if (!empty($result16['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks16 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">1.7 Conduct of Barangay Assembly for CY 2023 (2nd Semester)</th></tr>
                                        <?php if (!empty($result17['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks17 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <table class="table table-bordered mt-2" id="" width="100%" cellspacing="0">
                                    <tbody style="background-color: #F1C40F;">
                                        <tr>
                                            <td class="text-center" style="color: white;">Disaster Preparedness</td>
                                        </tr>
                                    </tbody>
                                    <tbody style="background-color: #F0E6E6;">
                                        <tr style="background-color: lightgray;"><th class="text-center">2.1 Functionality of the Barangay Disaster Risk Reduction and Management Commitee (BDRRMC)</th></tr>
                                        <?php if (!empty($result21['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks21 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">2.2 Extend of Risk Assessment and Early Warning System (EWS)</th></tr>
                                        <?php if (!empty($result22['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks22 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">2.3 Extend of Preparedness For Effective Response And Recovery</th></tr>
                                        <?php if (!empty($result23['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks23 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <table class="table table-bordered mt-2" id="" width="100%" cellspacing="0">
                                    <tbody style="background-color: #2ECC71;">
                                        <tr>
                                            <td class="text-center" style="color: white;">Safety, Peace and Order</td>
                                        </tr>
                                    </tbody>
                                    <tbody style="background-color: #F0E6E6;">
                                        <tr style="background-color: lightgray;"><th class="text-center">3.1 Functionality of the Barangay Anti-Drug Abuse Council (BADAC)</th></tr>
                                        <?php if (!empty($result31['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks31 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">3.2 Functionality of the Barangay Peace and Order Committee (BPOC)</th></tr>
                                        <?php if (!empty($result32['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks32 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">3.3 Functionality of the Lupong Tagapamayapa (LT)</th></tr>
                                        <?php if (!empty($result33['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks33 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">3.4 Organization and Strengthening Capacities of Barangay Tanod</th></tr>
                                        <?php if (!empty($result34['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks34 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">3.5 Barangay Initiatives During Health Emergencies</th></tr>
                                        <?php if (!empty($result35['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks35 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">3.6 Conduct of Monthly Barangay Road Clearing Operations (BaRCO)</th></tr>
                                        <?php if (!empty($result36['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks36 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive mt-4" id="assessmenTable">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead style="background-color: #EDF865;">
                                        <tr>
                                            <th class="text-center" style="color: black;">ESSENTIAL GOVERNANCE AREA</th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color: #E74C3C;">
                                        <tr>
                                            <td class="text-center" style="color: white;">Social Protection and Sensitivity</td>
                                        </tr>
                                    </tbody>
                                    <tbody style="background-color: #F0E6E6;">
                                        <tr style="background-color: lightgray;"><th class="text-center">4.1 Functionality of Barangay Violence Against Women (VAW) Desk</th></tr>
                                        <?php if (!empty($result41['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks41 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">4.2 Access to Health and Social Welfare Services in the Barangay</th></tr>
                                        <?php if (!empty($result42['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks42 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">4.3 Functionality of the Barangay Development Council (BDC)</th></tr>
                                        <?php if (!empty($result43['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks43 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">4.4 Implementation of the Kasambahay Law</th></tr>
                                        <?php if (!empty($result44['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks44 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">4.5 Functionality of the Barangay Council for the Protection of Children (BCPC)</th></tr>
                                        <?php if (!empty($result45['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks45 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">4.6 Mechanism for Gender and Development (GAD)</th></tr>
                                        <?php if (!empty($result46['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks46 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">4.7 Maintenance of Ipdated Record of Barangay Inhabitants (RBIs)</th></tr>
                                        <?php if (!empty($result47['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks47 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <table class="table table-bordered mt-2" id="" width="100%" cellspacing="0">
                                    <tbody style="background-color: #9B59B6;">
                                        <tr>
                                            <td class="text-center" style="color: white;">Business-Friendliness and competitiveness</td>
                                        </tr>
                                    </tbody>
                                    <tbody style="background-color: #F0E6E6;">
                                        <tr style="background-color: lightgray;"><th class="text-center">5.1 Power to Levy Other Taxes, Fees, or Charges</th></tr>
                                        <?php if (!empty($result51['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks51 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">5.2 Compiliance to Section 11 of RA 11032 of the Ease of Doing Business Law</th></tr>
                                        <?php if (!empty($result52['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks52 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">5.3 Issuance of Barangay Clearance not covered by DILG MC No. 2019-177 such as: residency, indigency, etc, within seven (7) working days</th></tr>
                                        <?php if (!empty($result53['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks53 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <table class="table table-bordered mt-2" id="" width="100%" cellspacing="0">
                                    <tbody style="background-color: #B8E994;">
                                        <tr>
                                            <td class="text-center" style="color: white;">Environmental Management</td>
                                        </tr>
                                    </tbody>
                                    <tbody style="background-color: #F0E6E6;">
                                        <tr style="background-color: lightgray;"><th class="text-center">6.1 Functionality of the Barangay Ecological Solid Waste Management Committee (BESWMC)</th></tr>
                                        <?php if (!empty($result61['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks61 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">6.2 Existence of a Solid Waste Management Facility Pursuant to R.A. 9003</th></tr>
                                        <?php if (!empty($result62['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks62 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
                                        <tr style="background-color: lightgray;"><th class="text-center">6.3 Provision of Support Mechanisms for Segregated Collection</th></tr>
                                        <?php if (!empty($result63['remarks'])){ ?>
                                            <tr><td style="color: black;"><?php echo $remarks63 ?></td></tr>
                                        <?php }else{ ?>
                                            <tr><td style="color: black;">Comment / Review</td></tr>
                                        <?php } ?>
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
</body>

</html>
