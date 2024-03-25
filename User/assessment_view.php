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
        $key = $_GET['tab'];

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
            $status = $result['status'];


            $query1 = $dbconn->prepare("SELECT count(*) as count11 FROM area_assessment_points where user_id=? and year_=? and area_number=1 and approved=1");
            $query1->bindParam(1, $id);
            $query1->bindParam(2, $year);
            $query1->execute();
            $result1 = $query1->fetch(PDO::FETCH_ASSOC);
            // echo $result1['count11'];
            if ($result1['count11'] > 0) {

                $query_temp11 = $dbconn->prepare("SELECT points FROM core11 where id=? and year=?");
                $query_temp11->bindParam(1, $id);
                $query_temp11->bindParam(2, $year);
                $query_temp11->execute();
                $result_temp11 = $query_temp11->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp11['points'])) {
                    $points11 = $result_temp11['points'];
                }else{
                    $points11 = 0;
                }

                $query_temp12 = $dbconn->prepare("SELECT points FROM core12 where id=? and year=?");
                $query_temp12->bindParam(1, $id);
                $query_temp12->bindParam(2, $year);
                $query_temp12->execute();
                $result_temp12 = $query_temp12->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp12['points'])) {
                    $points12 = $result_temp12['points'];
                }else{
                    $points12 = 0;
                }

                $query_temp13 = $dbconn->prepare("SELECT points FROM core13 where id=? and year=?");
                $query_temp13->bindParam(1, $id);
                $query_temp13->bindParam(2, $year);
                $query_temp13->execute();
                $result_temp13 = $query_temp13->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp13['points'])) {
                    $points13 = $result_temp13['points'];
                }else{
                    $points13 = 0;
                }

                $query_temp14 = $dbconn->prepare("SELECT points FROM core14 where id=? and year=?");
                $query_temp14->bindParam(1, $id);
                $query_temp14->bindParam(2, $year);
                $query_temp14->execute();
                $result_temp14 = $query_temp14->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp14['points'])) {
                    $points14 = $result_temp14['points'];
                }else{
                    $points14 = 0;
                }

                $query_temp15 = $dbconn->prepare("SELECT points FROM core15 where id=? and year=?");
                $query_temp15->bindParam(1, $id);
                $query_temp15->bindParam(2, $year);
                $query_temp15->execute();
                $result_temp15 = $query_temp15->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp15['points'])) {
                    $points15 = $result_temp15['points'];
                }else{
                    $points15 = 0;
                }

                $query_temp16 = $dbconn->prepare("SELECT points FROM core16 where id=? and year=?");
                $query_temp16->bindParam(1, $id);
                $query_temp16->bindParam(2, $year);
                $query_temp16->execute();
                $result_temp16 = $query_temp16->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp16['points'])) {
                    $points16 = $result_temp16['points'];
                }else{
                    $points16 = 0;
                }

                $query_temp17 = $dbconn->prepare("SELECT points FROM core17 where id=? and year=?");
                $query_temp17->bindParam(1, $id);
                $query_temp17->bindParam(2, $year);
                $query_temp17->execute();
                $result_temp17 = $query_temp17->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp17['points'])) {
                    $points17 = $result_temp17['points'];
                }else{
                    $points17 = 0;
                }
                
                $points = $points11+$points12+$points13+$points14+$points15+$points16+$points17;
                $max = 21;
                $sub_total_all = ($points/$max)*100;
                $total1 = number_format($sub_total_all,2);
            }else{

                $query1 = $dbconn->prepare("SELECT count(*) as count11 FROM area_assessment_points where user_id=? and year_=? and area_number=1 and approved=2");
                $query1->bindParam(1, $id);
                $query1->bindParam(2, $year);
                $query1->execute();
                $result1 = $query1->fetch(PDO::FETCH_ASSOC);
                $check1 = $result1['count11'];
                $total1 = 0;
            }

            $query2 = $dbconn->prepare("SELECT count(*) as count21 FROM area_assessment_points where user_id=? and year_=? and area_number=2 and approved=1");
            $query2->bindParam(1, $id);
            $query2->bindParam(2, $year);
            $query2->execute();
            $result2 = $query2->fetch(PDO::FETCH_ASSOC);
            if ($result2['count21'] > 0) {

                $query_temp21 = $dbconn->prepare("SELECT points FROM core21 where id=? and year=?");
                $query_temp21->bindParam(1, $id);
                $query_temp21->bindParam(2, $year);
                $query_temp21->execute();
                $result_temp21 = $query_temp21->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp21['points'])) {
                    $points21 = $result_temp21['points'];
                }else{
                    
                    $points21 = 0;
                }

                $query_temp22 = $dbconn->prepare("SELECT points FROM core22 where id=? and year=?");
                $query_temp22->bindParam(1, $id);
                $query_temp22->bindParam(2, $year);
                $query_temp22->execute();
                $result_temp22 = $query_temp22->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp22['points'])) {
                    $points22 = $result_temp22['points'];
                }else{
                    $points22 = 0;
                }

                $query_temp23 = $dbconn->prepare("SELECT points FROM core23 where id=? and year=?");
                $query_temp23->bindParam(1, $id);
                $query_temp23->bindParam(2, $year);
                $query_temp23->execute();
                $result_temp23 = $query_temp23->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp23['points'])) {
                    $points23 = $result_temp23['points'];
                }else{
                    $points23 = 0;
                }
                
                $points = $points21+$points22+$points23;
                $max = 10;
                $sub_total_all = ($points/$max)*100;
                $total2 = number_format($sub_total_all,2);
            }else{
                $query2 = $dbconn->prepare("SELECT count(*) as count21 FROM area_assessment_points where user_id=? and year_=? and area_number=2 and approved=2");
                $query2->bindParam(1, $id);
                $query2->bindParam(2, $year);
                $query2->execute();
                $result2 = $query2->fetch(PDO::FETCH_ASSOC);
                $check2 = $result2['count21'];
                $total2 = 0;
            }

            $query3 = $dbconn->prepare("SELECT count(*) as count31 FROM area_assessment_points where user_id=? and year_=? and area_number=3 and approved=1");
            $query3->bindParam(1, $id);
            $query3->bindParam(2, $year);
            $query3->execute();
            $result3 = $query3->fetch(PDO::FETCH_ASSOC);
            if ($result3['count31'] > 0) {

                $query_temp31 = $dbconn->prepare("SELECT points FROM core31 where id=? and year=?");
                $query_temp31->bindParam(1, $id);
                $query_temp31->bindParam(2, $year);
                $query_temp31->execute();
                $result_temp31 = $query_temp31->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp31['points'])) {
                    $points31 = $result_temp31['points'];
                }else{
                    $points31 = 0;
                }

                $query_temp32 = $dbconn->prepare("SELECT points FROM core32 where id=? and year=?");
                $query_temp32->bindParam(1, $id);
                $query_temp32->bindParam(2, $year);
                $query_temp32->execute();
                $result_temp32 = $query_temp32->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp32['points'])) {
                    $points32 = $result_temp32['points'];
                }else{
                    $points32 = 0;
                }

                $query_temp33 = $dbconn->prepare("SELECT points FROM core33 where id=? and year=?");
                $query_temp33->bindParam(1, $id);
                $query_temp33->bindParam(2, $year);
                $query_temp33->execute();
                $result_temp33 = $query_temp33->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp33['points'])) {
                    $points33 = $result_temp33['points'];
                }else{
                    $points33 = 0;
                }

                $query_temp34 = $dbconn->prepare("SELECT points FROM core34 where id=? and year=?");
                $query_temp34->bindParam(1, $id);
                $query_temp34->bindParam(2, $year);
                $query_temp34->execute();
                $result_temp34 = $query_temp34->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp34['points'])) {
                    $points34 = $result_temp34['points'];
                }else{
                    $points34 = 0;
                }

                $query_temp35 = $dbconn->prepare("SELECT points FROM core35 where id=? and year=?");
                $query_temp35->bindParam(1, $id);
                $query_temp35->bindParam(2, $year);
                $query_temp35->execute();
                $result_temp35 = $query_temp35->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp35['points'])) {
                    $points35 = $result_temp35['points'];
                }else{
                    $points35 = 0;
                }

                $query_temp36 = $dbconn->prepare("SELECT points FROM core36 where id=? and year=?");
                $query_temp36->bindParam(1, $id);
                $query_temp36->bindParam(2, $year);
                $query_temp36->execute();
                $result_temp36 = $query_temp36->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp36['points'])) {
                    $points36 = $result_temp36['points'];
                }else{
                    $points36 = 0;
                }
                
                $points = $points31+$points32+$points33+$points34+$points35+$points36;
                $max = 19;
                $sub_total_all = ($points/$max)*100;
                $total3 = number_format($sub_total_all,2);
            }else{
                $query3 = $dbconn->prepare("SELECT count(*) as count31 FROM area_assessment_points where user_id=? and year_=? and area_number=3 and approved=2");
                $query3->bindParam(1, $id);
                $query3->bindParam(2, $year);
                $query3->execute();
                $result3 = $query3->fetch(PDO::FETCH_ASSOC);
                $check3 = $result3['count31'];
                $total3 = 0;
            }

            $query4 = $dbconn->prepare("SELECT count(*) as count41 FROM area_assessment_points where user_id=? and year_=? and area_number=4 and approved=1");
            $query4->bindParam(1, $id);
            $query4->bindParam(2, $year);
            $query4->execute();
            $result4 = $query4->fetch(PDO::FETCH_ASSOC);
            if ($result4['count41'] > 0) {

                $query_temp41 = $dbconn->prepare("SELECT points FROM essen11 where id=? and year=?");
                $query_temp41->bindParam(1, $id);
                $query_temp41->bindParam(2, $year);
                $query_temp41->execute();
                $result_temp41 = $query_temp41->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp41['points'])) {
                    $points41 = $result_temp41['points'];
                }else{
                    $points41 = 0;
                }

                $query_temp42 = $dbconn->prepare("SELECT points FROM essen12 where id=? and year=?");
                $query_temp42->bindParam(1, $id);
                $query_temp42->bindParam(2, $year);
                $query_temp42->execute();
                $result_temp42 = $query_temp42->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp42['points'])) {
                    $points42 = $result_temp42['points'];
                }else{
                    $points42 = 0;
                }

                $query_temp43 = $dbconn->prepare("SELECT points FROM essen13 where id=? and year=?");
                $query_temp43->bindParam(1, $id);
                $query_temp43->bindParam(2, $year);
                $query_temp43->execute();
                $result_temp43 = $query_temp43->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp43['points'])) {
                    $points43 = $result_temp43['points'];
                }else{
                    $points43 = 0;
                }

                $query_temp44 = $dbconn->prepare("SELECT points FROM essen14 where id=? and year=?");
                $query_temp44->bindParam(1, $id);
                $query_temp44->bindParam(2, $year);
                $query_temp44->execute();
                $result_temp44 = $query_temp44->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp44['points'])) {
                    $points44 = $result_temp44['points'];
                }else{
                    $points44 = 0;
                }

                $query_temp45 = $dbconn->prepare("SELECT points FROM essen15 where id=? and year=?");
                $query_temp45->bindParam(1, $id);
                $query_temp45->bindParam(2, $year);
                $query_temp45->execute();
                $result_temp45 = $query_temp45->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp45['points'])) {
                    $points45 = $result_temp45['points'];
                }else{
                    $points45 = 0;
                }

                $query_temp46 = $dbconn->prepare("SELECT points FROM essen16 where id=? and year=?");
                $query_temp46->bindParam(1, $id);
                $query_temp46->bindParam(2, $year);
                $query_temp46->execute();
                $result_temp46 = $query_temp46->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp46['points'])) {
                    $points46 = $result_temp46['points'];
                }else{
                    $points46 = 0;
                }

                $query_temp47 = $dbconn->prepare("SELECT points FROM essen17 where id=? and year=?");
                $query_temp47->bindParam(1, $id);
                $query_temp47->bindParam(2, $year);
                $query_temp47->execute();
                $result_temp47 = $query_temp47->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp47['points'])) {
                    $points47 = $result_temp47['points'];
                }else{
                    $points47 = 0;
                }
                
                $points = $points41+$points42+$points43+$points44+$points45+$points46+$points47;
                $max = 25;
                $sub_total_all = ($points/$max)*100;
                $total4 = number_format($sub_total_all,2);
            }else{
                $query4 = $dbconn->prepare("SELECT count(*) as count41 FROM area_assessment_points where user_id=? and year_=? and area_number=4 and approved=2");
                $query4->bindParam(1, $id);
                $query4->bindParam(2, $year);
                $query4->execute();
                $result4 = $query4->fetch(PDO::FETCH_ASSOC);
                $check4 = $result4['count41'];
                $total4 = 0;
            }

            $query5 = $dbconn->prepare("SELECT count(*) as count51 FROM area_assessment_points where user_id=? and year_=? and area_number=5 and approved=1");
            $query5->bindParam(1, $id);
            $query5->bindParam(2, $year);
            $query5->execute();
            $result5 = $query5->fetch(PDO::FETCH_ASSOC);
            if ($result5['count51'] > 0) {

                $query_temp51 = $dbconn->prepare("SELECT points FROM essen21 where id=? and year=?");
                $query_temp51->bindParam(1, $id);
                $query_temp51->bindParam(2, $year);
                $query_temp51->execute();
                $result_temp51 = $query_temp51->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp51['points'])) {
                    $points51 = $result_temp51['points'];
                }else{
                    $points51 = 0;
                }

                $query_temp52 = $dbconn->prepare("SELECT points FROM essen22 where id=? and year=?");
                $query_temp52->bindParam(1, $id);
                $query_temp52->bindParam(2, $year);
                $query_temp52->execute();
                $result_temp52 = $query_temp52->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp52['points'])) {
                    $points52 = $result_temp52['points'];
                }else{
                    $points52 = 0;
                }

                $query_temp53 = $dbconn->prepare("SELECT points FROM essen23 where id=? and year=?");
                $query_temp53->bindParam(1, $id);
                $query_temp53->bindParam(2, $year);
                $query_temp53->execute();
                $result_temp53 = $query_temp53->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp53['points'])) {
                    $points53 = $result_temp53['points'];
                }else{
                    $points53 = 0;
                }
                
                $points = $points51+$points52+$points53;
                $max = 4;
                $sub_total_all = ($points/$max)*100;
                $total5 = number_format($sub_total_all,2);
            }else{
                $query5 = $dbconn->prepare("SELECT count(*) as count51 FROM area_assessment_points where user_id=? and year_=? and area_number=5 and approved=2");
                $query5->bindParam(1, $id);
                $query5->bindParam(2, $year);
                $query5->execute();
                $result5 = $query5->fetch(PDO::FETCH_ASSOC);
                $check5 = $result5['count51'];
                $total5 = 0;
            }

            $query6 = $dbconn->prepare("SELECT count(*) as count61 FROM area_assessment_points where user_id=? and year_=? and area_number=6 and approved=1");
            $query6->bindParam(1, $id);
            $query6->bindParam(2, $year);
            $query6->execute();
            $result6 = $query6->fetch(PDO::FETCH_ASSOC);
            if ($result6['count61'] > 0) {

                $query_temp61 = $dbconn->prepare("SELECT points FROM essen31 where id=? and year=?");
                $query_temp61->bindParam(1, $id);
                $query_temp61->bindParam(2, $year);
                $query_temp61->execute();
                $result_temp61 = $query_temp61->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp61['points'])) {
                    $points61 = $result_temp61['points'];
                }else{
                    $points61 = 0;
                }

                $query_temp62 = $dbconn->prepare("SELECT points FROM essen32 where id=? and year=?");
                $query_temp62->bindParam(1, $id);
                $query_temp62->bindParam(2, $year);
                $query_temp62->execute();
                $result_temp62 = $query_temp62->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp62['points'])) {
                    $points62 = $result_temp62['points'];
                }else{
                    $points62 = 0;
                }

                $query_temp63 = $dbconn->prepare("SELECT points FROM essen33 where id=? and year=?");
                $query_temp63->bindParam(1, $id);
                $query_temp63->bindParam(2, $year);
                $query_temp63->execute();
                $result_temp63 = $query_temp63->fetch(PDO::FETCH_ASSOC);
                if (!empty($result_temp63['points'])) {
                    $points63 = $result_temp63['points'];
                }else{
                    $points63 = 0;
                }
                
                $points = $points61+$points62+$points63;
                $max = 11;
                $sub_total_all = ($points/$max)*100;
                $total6 = number_format($sub_total_all,2);
            }else{
                $query6 = $dbconn->prepare("SELECT count(*) as count61 FROM area_assessment_points where user_id=? and year_=? and area_number=6 and approved=2");
                $query6->bindParam(1, $id);
                $query6->bindParam(2, $year);
                $query6->execute();
                $result6 = $query6->fetch(PDO::FETCH_ASSOC);
                $check6 = $result6['count61'];
                $total6 = 0;
            }

            $total_all = number_format(($total1+$total2+$total3+$total4+$total5+$total6)/6,2);

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
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2"><b>Status</b></div>
                                        <div class="col-lg-9">
                                            <?php if ($total1 != 0 && $total2 != 0 && $total3 != 0 && $total4 != 0 && $total5  != 0 && $total6 != 0 ){ ?>
                                                <span class="btn-sm btn btn-success">Approved</span>
                                            <?php }else if ($check1 != 0 && $check2 != 0 && $check3 != 0 && $check4 != 0 && $check5  != 0 && $check6 != 0 ){ ?>
                                                <span class="btn-sm btn btn-danger">Disapproved</span>
                                            <?php }else{ ?>
                                                <?if ($status == 0) {?>
                                                    <span class="btn-sm btn btn-info">On Progress</span>
                                                <? } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div style="float: left;">
                                <h6 class="m-0 font-weight-bold text-primary">Barangay Assessment</h6><br>
                                <p>Legends&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <!-- <span class="btn btn-sm btn-danger btn-circle"> -->
                                    <span class="">
                                        <i class=""><img src="../img/icon/Disapproved.png" style="width:30px;height: 30px;"></i>
                                    </span>&nbsp;Disapproved&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="btn btn-sm btn-info btn-circle">
                                        <i class=""><img src="../img/icon/On Process.png" style="width:30px;height: 30px;"></i>
                                    </span>&nbsp;&nbsp;On Process&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="btn btn-sm btn-success btn-circle">
                                        <i class=""><img src="../img/icon/Approved.png" style="width:30px;height: 30px;"></i>
                                    </span>&nbsp;Approved
                                </p>
                            </div>
                            <!-- <div style="float: right;">
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addLocation">Add Assessment</button>
                            </div> -->
                        </div>
                        <div class="card-body" id="viewLocation">
                            <div class="table-responsive" id="assessmenTable">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead class="table-dark">
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Areas</th>
                                            <th>Total Score</th>
                                            <th>Admin Review</th>
                                            <th>Actions</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Financial Administration and Sustainability</td>
                                            <td class="text-center"><?php echo $total1 ?></td>
                                            <td class="text-center">
                                                <?php if ($total1 > 0 || $check1 > 0){ ?>
                                                        <!-- <i class="fas fa-check"></i> -->
                                                        <span class="text-primary">Yes</span>
                                                <?php }else{ ?>
                                                        <!-- <i class="">&times;</i> -->
                                                        <span class="text-warning">No</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="assessment_view_create.php?tab=<?php echo $key.'/1' ?>" class="btn btn-sm btn-success" >Create</a>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($total1 > 0){ ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class=""><img src="../img/icon/Approved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else if($check1 > 0){ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class=""><img src="../img/icon/Disapproved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-info btn-circle">
                                                        <i class=""><img src="../img/icon/On Process.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Disaster Preparedness</td>
                                            <td class="text-center"><?php echo $total2 ?></td>
                                            <td class="text-center">
                                                <?php if ($total2 > 0){ ?>
                                                    <!-- <i class="fas fa-check"></i> -->
                                                        <span class="text-primary">Yes</span>
                                                <?php }else{ ?>
                                                        <!-- <i class="">&times;</i> -->
                                                        <span class="text-warning">No</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="assessment_view_create2.php?tab=<?php echo $key.'/1' ?>" class="btn btn-sm btn-success" >Create</a>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($total2 > 0){ ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class=""><img src="../img/icon/Approved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else if($check2 > 0){ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class=""><img src="../img/icon/Disapproved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-info btn-circle">
                                                        <i class=""><img src="../img/icon/On Process.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Safety, Peace and Order</td>
                                            <td class="text-center"><?php echo $total3 ?></td>
                                            <td class="text-center">
                                                <?php if ($total3 > 0){ ?>
                                                    <!-- <i class="fas fa-check"></i> -->
                                                        <span class="text-primary">Yes</span>
                                                <?php }else{ ?>
                                                        <!-- <i class="">&times;</i> -->
                                                        <span class="text-warning">No</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="assessment_view_create3.php?tab=<?php echo $key.'/1' ?>" class="btn btn-sm btn-success" >Create</a>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($total3 > 0){ ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class=""><img src="../img/icon/Approved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else if($check3 > 0){ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class=""><img src="../img/icon/Disapproved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-info btn-circle">
                                                        <i class=""><img src="../img/icon/On Process.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Social Protection and Sensitivity</td>
                                            <td class="text-center"><?php echo $total4 ?></td>
                                            <td class="text-center">
                                                <?php if ($total4 > 0){ ?>
                                                    <!-- <i class="fas fa-check"></i> -->
                                                        <span class="text-primary">Yes</span>
                                                <?php }else{ ?>
                                                        <!-- <i class="">&times;</i> -->
                                                        <span class="text-warning">No</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="assessment_view_create4.php?tab=<?php echo $key.'/1' ?>" class="btn btn-sm btn-success" >Create</a>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($total4 > 0){ ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class=""><img src="../img/icon/Approved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else if($check4 > 0){ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class=""><img src="../img/icon/Disapproved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-info btn-circle">
                                                        <i class=""><img src="../img/icon/On Process.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Business-Friendliness and Competitiveness</td>
                                            <td class="text-center"><?php echo $total5 ?></td>
                                            <td class="text-center">
                                                <?php if ($total5 > 0){ ?>
                                                    <!-- <i class="fas fa-check"></i> -->
                                                        <span class="text-primary">Yes</span>
                                                <?php }else{ ?>
                                                        <!-- <i class="">&times;</i> -->
                                                        <span class="text-warning">No</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="assessment_view_create5.php?tab=<?php echo $key.'/1' ?>" class="btn btn-sm btn-success" >Create</a>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($total5 > 0){ ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class=""><img src="../img/icon/Approved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else if($check5 > 0){ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class=""><img src="../img/icon/Disapproved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-info btn-circle">
                                                        <i class=""><img src="../img/icon/On Process.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Environmental Management</td>
                                            <td class="text-center"><?php echo $total6 ?></td>
                                            <td class="text-center">
                                                <?php if ($total6 > 0){ ?>
                                                    <!-- <i class="fas fa-check"></i> -->
                                                        <span class="text-primary">Yes</span>
                                                <?php }else{ ?>
                                                        <!-- <i class="">&times;</i> -->
                                                        <span class="text-warning">No</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="assessment_view_create6.php?tab=<?php echo $key.'/1' ?>" class="btn btn-sm btn-success" >Create</a>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($total6 > 0){ ?>
                                                    <span class="btn btn-sm btn-success btn-circle">
                                                        <i class=""><img src="../img/icon/Approved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else if($check6 > 0){ ?>
                                                    <span class="btn btn-sm btn-danger btn-circle">
                                                        <i class=""><img src="../img/icon/Disapproved.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="btn btn-sm btn-info btn-circle">
                                                        <i class=""><img src="../img/icon/On Process.png" style="width:30px;height: 30px;"></i>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right"><b>Total:</b></td>
                                            <td class="text-center">
                                                <?php if (!empty($total_all)){ ?>
                                                    <?php echo $total_all ?>
                                                <?php }else{ ?>
                                                    0
                                                <?php } ?>
                                            </td>
                                            <td></td>
                                            <td></td>
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
</body>

</html>
