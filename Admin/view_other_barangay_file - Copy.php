<?php
error_reporting(0);
// error_reporting(E_ALL ^ E_NOTICE);
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
$user_id = $result['id'];

if ($_GET['xn'] == '1') {
$stmt = $dbconn->prepare("UPDATE core11 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '2') {
$stmt = $dbconn->prepare("UPDATE core12 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '3') {
$stmt = $dbconn->prepare("UPDATE core13 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '4') {
$stmt = $dbconn->prepare("UPDATE core14 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '5') {
$stmt = $dbconn->prepare("UPDATE core15 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '6') {
$stmt = $dbconn->prepare("UPDATE core16 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '7') {
$stmt = $dbconn->prepare("UPDATE core17 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '21') {
$stmt = $dbconn->prepare("UPDATE core21 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '22') {
$stmt = $dbconn->prepare("UPDATE core22 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '23') {
$stmt = $dbconn->prepare("UPDATE core23 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '31') {
$stmt = $dbconn->prepare("UPDATE core31 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '32') {
$stmt = $dbconn->prepare("UPDATE core32 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '33') {
$stmt = $dbconn->prepare("UPDATE core33 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '34') {
$stmt = $dbconn->prepare("UPDATE core34 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '35') {
$stmt = $dbconn->prepare("UPDATE core35 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '36') {
$stmt = $dbconn->prepare("UPDATE core36 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '41') {
$stmt = $dbconn->prepare("UPDATE essen11 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '42') {
$stmt = $dbconn->prepare("UPDATE essen12 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '43') {
$stmt = $dbconn->prepare("UPDATE essen13 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '44') {
$stmt = $dbconn->prepare("UPDATE essen14 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '45') {
$stmt = $dbconn->prepare("UPDATE essen15 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '46') {
$stmt = $dbconn->prepare("UPDATE essen16 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '47') {
$stmt = $dbconn->prepare("UPDATE essen17 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '51') {
$stmt = $dbconn->prepare("UPDATE essen21 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '52') {
$stmt = $dbconn->prepare("UPDATE essen22 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '53') {
$stmt = $dbconn->prepare("UPDATE essen23 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '61') {
$stmt = $dbconn->prepare("UPDATE essen31 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '62') {
$stmt = $dbconn->prepare("UPDATE essen32 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}
if ($_GET['xn'] == '63') {
$stmt = $dbconn->prepare("UPDATE essen33 set noti_me=0 where id=? and year=?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $year);
$stmt->execute();
}


$query1 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3,
	comment4,approved4,
	comment5,approved5,
	comment6,approved6,
	comment7,approved7,
	comment8,approved8,
	comment9,approved9,
	comment10,approved10,
	FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=1");
$query1->bindParam(1, $user_id);
$query1->bindParam(2, $year);
$query1->execute();
$result1 = $query1->fetch(PDO::FETCH_ASSOC);
$remarks1 = $result1['remarks'];
$area_points1 = $result1['area_points'];
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

$query12 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=2");
$query12->bindParam(1, $user_id);
$query12->bindParam(2, $year);
$query12->execute();
$result12 = $query12->fetch(PDO::FETCH_ASSOC);
$remarks12 = $result12['remarks'];
$area_points12 = $result12['area_points'];

$query13 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=3");
$query13->bindParam(1, $user_id);
$query13->bindParam(2, $year);
$query13->execute();
$result13 = $query13->fetch(PDO::FETCH_ASSOC);
$remarks13 = $result13['remarks'];
$area_points13 = $result13['area_points'];

$query14 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=4");
$query14->bindParam(1, $user_id);
$query14->bindParam(2, $year);
$query14->execute();
$result14 = $query14->fetch(PDO::FETCH_ASSOC);
$remarks14 = $result14['remarks'];
$area_points14 = $result14['area_points'];

$query15 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=5");
$query15->bindParam(1, $user_id);
$query15->bindParam(2, $year);
$query15->execute();
$result15 = $query15->fetch(PDO::FETCH_ASSOC);
$remarks15 = $result15['remarks'];
$area_points15 = $result15['area_points'];

$query16 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=6");
$query16->bindParam(1, $user_id);
$query16->bindParam(2, $year);
$query16->execute();
$result16 = $query16->fetch(PDO::FETCH_ASSOC);
$remarks16 = $result16['remarks'];
$area_points16 = $result16['area_points'];

$query17 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=7");
$query17->bindParam(1, $user_id);
$query17->bindParam(2, $year);
$query17->execute();
$result17 = $query17->fetch(PDO::FETCH_ASSOC);
$remarks17 = $result17['remarks'];
$area_points17 = $result17['area_points'];

$query21 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=2 and under_area=1");
$query21->bindParam(1, $user_id);
$query21->bindParam(2, $year);
$query21->execute();
$result21 = $query21->fetch(PDO::FETCH_ASSOC);
$remarks21 = $result21['remarks'];
$area_points21 = $result21['area_points'];

$query22 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=2 and under_area=2");
$query22->bindParam(1, $user_id);
$query22->bindParam(2, $year);
$query22->execute();
$result22 = $query22->fetch(PDO::FETCH_ASSOC);
$remarks22 = $result22['remarks'];
$area_points22 = $result22['area_points'];

$query23 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=2 and under_area=3");
$query23->bindParam(1, $user_id);
$query23->bindParam(2, $year);
$query23->execute();
$result23 = $query23->fetch(PDO::FETCH_ASSOC);
$remarks23 = $result23['remarks'];
$area_points23 = $result23['area_points'];

$query31 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=1");
$query31->bindParam(1, $user_id);
$query31->bindParam(2, $year);
$query31->execute();
$result31 = $query31->fetch(PDO::FETCH_ASSOC);
$remarks31 = $result31['remarks'];
$area_points31 = $result31['area_points'];

$query32 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=2");
$query32->bindParam(1, $user_id);
$query32->bindParam(2, $year);
$query32->execute();
$result32 = $query32->fetch(PDO::FETCH_ASSOC);
$remarks32 = $result32['remarks'];
$area_points32 = $result32['area_points'];

$query33 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=3");
$query33->bindParam(1, $user_id);
$query33->bindParam(2, $year);
$query33->execute();
$result33 = $query33->fetch(PDO::FETCH_ASSOC);
$remarks33 = $result33['remarks'];
$area_points33 = $result33['area_points'];

$query34 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=4");
$query34->bindParam(1, $user_id);
$query34->bindParam(2, $year);
$query34->execute();
$result34 = $query34->fetch(PDO::FETCH_ASSOC);
$remarks34 = $result34['remarks'];
$area_points34 = $result34['area_points'];

$query35 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=5");
$query35->bindParam(1, $user_id);
$query35->bindParam(2, $year);
$query35->execute();
$result35 = $query35->fetch(PDO::FETCH_ASSOC);
$remarks35 = $result35['remarks'];
$area_points35 = $result35['area_points'];

$query36 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=6");
$query36->bindParam(1, $user_id);
$query36->bindParam(2, $year);
$query36->execute();
$result36 = $query36->fetch(PDO::FETCH_ASSOC);
$remarks36 = $result36['remarks'];
$area_points36 = $result36['area_points'];

$query41 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=1");
$query41->bindParam(1, $user_id);
$query41->bindParam(2, $year);
$query41->execute();
$result41 = $query41->fetch(PDO::FETCH_ASSOC);
$remarks41 = $result41['remarks'];
$area_points41 = $result41['area_points'];

$query42 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=2");
$query42->bindParam(1, $user_id);
$query42->bindParam(2, $year);
$query42->execute();
$result42 = $query42->fetch(PDO::FETCH_ASSOC);
$remarks42 = $result42['remarks'];
$area_points42 = $result42['area_points'];

$query43 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=3");
$query43->bindParam(1, $user_id);
$query43->bindParam(2, $year);
$query43->execute();
$result43 = $query43->fetch(PDO::FETCH_ASSOC);
$remarks43 = $result43['remarks'];
$area_points43 = $result43['area_points'];

$query44 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=4");
$query44->bindParam(1, $user_id);
$query44->bindParam(2, $year);
$query44->execute();
$result44 = $query44->fetch(PDO::FETCH_ASSOC);
$remarks44 = $result44['remarks'];
$area_points44 = $result44['area_points'];

$query45 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=5");
$query45->bindParam(1, $user_id);
$query45->bindParam(2, $year);
$query45->execute();
$result45 = $query45->fetch(PDO::FETCH_ASSOC);
$remarks45 = $result45['remarks'];
$area_points45 = $result45['area_points'];

$query46 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=6");
$query46->bindParam(1, $user_id);
$query46->bindParam(2, $year);
$query46->execute();
$result46 = $query46->fetch(PDO::FETCH_ASSOC);
$remarks46 = $result46['remarks'];
$area_points46 = $result46['area_points'];

$query47 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=7");
$query47->bindParam(1, $user_id);
$query47->bindParam(2, $year);
$query47->execute();
$result47 = $query47->fetch(PDO::FETCH_ASSOC);
$remarks47 = $result47['remarks'];
$area_points47 = $result47['area_points'];

$query51 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=5 and under_area=1");
$query51->bindParam(1, $user_id);
$query51->bindParam(2, $year);
$query51->execute();
$result51 = $query51->fetch(PDO::FETCH_ASSOC);
$remarks51 = $result51['remarks'];
$area_points51 = $result51['area_points'];

$query52 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=5 and under_area=2");
$query52->bindParam(1, $user_id);
$query52->bindParam(2, $year);
$query52->execute();
$result52 = $query52->fetch(PDO::FETCH_ASSOC);
$remarks52 = $result52['remarks'];
$area_points52 = $result52['area_points'];

$query53 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=5 and under_area=3");
$query53->bindParam(1, $user_id);
$query53->bindParam(2, $year);
$query53->execute();
$result53 = $query53->fetch(PDO::FETCH_ASSOC);
$remarks53 = $result53['remarks'];
$area_points53 = $result53['area_points'];

$query61 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=6 and under_area=1");
$query61->bindParam(1, $user_id);
$query61->bindParam(2, $year);
$query61->execute();
$result61 = $query61->fetch(PDO::FETCH_ASSOC);
$remarks61 = $result61['remarks'];
$area_points61 = $result61['area_points'];

$query62 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=6 and under_area=2");
$query62->bindParam(1, $user_id);
$query62->bindParam(2, $year);
$query62->execute();
$result62 = $query62->fetch(PDO::FETCH_ASSOC);
$remarks62 = $result62['remarks'];
$area_points62 = $result62['area_points'];

$query63 = $dbconn->prepare("SELECT remarks,area_points,comment1,approved1 FROM area_assessment_points where user_id=? and year_=? and area_number=6 and under_area=3");
$query63->bindParam(1, $user_id);
$query63->bindParam(2, $year);
$query63->execute();
$result63 = $query63->fetch(PDO::FETCH_ASSOC);
$remarks63 = $result63['remarks'];
$area_points63 = $result63['area_points'];

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
<?php include 'sidebar.php' ?>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

<!-- Topbar -->
<?php include 'topbar.php' ?>
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
                    <?php if ($status == 0) {?>
                        <span class="btn-sm btn btn-primary">In Progress</span>
                    <?php }else{?>
                        <span><?php echo $status ?></span>
                    <?php }?>
                </div>
            </div>
        </div> -->
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
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>1.1 Compliance with the Barangay Full Disclosure Policy (BFDP)</b></div>
    </div>
    <div class="table-responsive mt-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 1.1.1</th>
                    <th class="text-center">Actions</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
            	<tr>
            		<td>BFDP Monitoring Form A of the DILG dated March 25, 2023</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal" onclick="generateFileLink()">
                            Comment
                        </button>
                        <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Uploaded File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename1 = $user_id.$year.'file1.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename1)) { ?>
                                                    <a href="<?php echo $filePath.$filename1 ?>" target="_blank"><?php echo $filename1 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment111">Your Comment:</label>
                                        <textarea class="form-control" id="comment111" rows="3"><?php if (!empty($comment1)): ?><?php echo $comment1 ?><?php endif ?></textarea>
                                        <span id="alert111"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,1,1,comment111.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,1,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,1,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
	                            <span id="fileStatus" class="btn btn-sm btn-success btn-circle">
	                                <i class="fas fa-check"></i>
	                            </span>
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
		            <td class="text-center">
		                <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal" onclick="generateFileLink()">
		                    Comment
		                </button>
		                <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
		                    <div class="modal-dialog" role="document">
		                        <div class="modal-content">
		                            <div class="modal-header">
		                                <h5 class="modal-title" id="commentModalLabel">Attached File:</h5></div>
		                            <div class="modal-body">
		                                <div class="card">
		                                    <div class="card-body">
		                                        <?php 
		                                            $filePath = '../actions/upload/uploaded/'; 
		                                            $filename2 = $user_id.$year.'file2.pdf';
		                                        ?>
		                                        <?php if (file_exists($filePath.$filename2)) { ?>
		                                            <a href="<?php echo $filePath.$filename2 ?>" target="_blank"><?php echo $filename2 ?></a>
		                                        <?php }?>
		                                    </div>
		                                </div>
		                                <form>
		                                    <div class="form-group mt-3">
		                                        <label for="comment">Your Comment:</label>
		                                        <textarea class="form-control" id="comment" rows="3"></textarea>
		                                    </div>
		                                </form>
		                            </div>
		                            <div class="modal-footer">
		                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                                <button type="button" class="btn btn-primary">Save changes</button>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </td>
		            <td class="text-center">
		                <?php if (file_exists($filePath.$filename2)) { ?>
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
                    <th class="">Annual Report</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="margin-left: 40px;">Barangay Financial Report</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal" onclick="generateFileLink()">
                            Comment
                        </button>
                        <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel">Attached File:</h5></div>
                                    <div class="modal-body">z
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename3 = $user_id.$year.'file3.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename3)) { ?>
                                                    <a href="<?php echo $filePath.$filename3 ?>" target="_blank"><?php echo $filename3 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="form-group mt-3">
                                                <label for="comment">Your Comment:</label>
                                                <textarea class="form-control" id="comment" rows="3"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename3)) { ?>
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
                    <td style="margin-left: 40px;">Barangay Budget</td>
                        <?php 
                            $filename4 = $user_id.$year.'file4.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename4)) { ?>
                            <a href="<?php echo $filePath.$filename4 ?>" target="_blank"><?php echo $filename4 ?></a>
                        <?php }?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename4)) { ?>
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
                    <td style="margin-left: 40px;">Summary of Income and Expenditures;</td>
                        <?php 
                            $filename5 = $user_id.$year.'file5.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename5)) { ?>
                            <a href="<?php echo $filePath.$filename5 ?>" target="_blank"><?php echo $filename5 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename5)) { ?>
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
                    <td style="margin-left: 40px;">20% Component of the IRA Utilization;</td>
                        <?php 
                            $filename6 = $user_id.$year.'file6.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename6)) { ?>
                            <a href="<?php echo $filePath.$filename6 ?>" target="_blank"><?php echo $filename6 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename6)) { ?>
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
                    <td style="margin-left: 40px;">Annual Procurement Plan or Procurement List</td>
                        <?php 
                            $filename7 = $user_id.$year.'file7.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename7)) { ?>
                            <a href="<?php echo $filePath.$filename7 ?>" target="_blank"><?php echo $filename7 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename7)) { ?>
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
                    <th class="">Quarterly Report</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="margin-left: 40px;">List of Notices of Award (4<sup>th</sup> quarter of CY. 2023)</td>
                        <?php 
                            $filename8 = $user_id.$year.'file8.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename8)) { ?>
                            <a href="<?php echo $filePath.$filename8 ?>" target="_blank"><?php echo $filename8 ?></a>
                        <?php }?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename8)) { ?>
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
                    <th class="">Monthly Report</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="margin-left: 40px;">Itemized Monthly Collections and Disbursements (Oct-Dec CY 2023)</td>
                        <?php 
                            $filename9 = $user_id.$year.'file9.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename9)) { ?>
                            <a href="<?php echo $filePath.$filename9 ?>" target="_blank"><?php echo $filename9 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename9)) { ?>
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
                    <th class="text-center">Reports 1.1.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Barangay Financial Report on Statement of Receipt and Expenditure (Annex 7)</td>
                    <td class="text-center">
                        <?php 
                            $filename10 = $user_id.$year.'file10.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename10)) { ?>
                            <a href="<?php echo $filePath.$filename10 ?>" target="_blank"><?php echo $filename10 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename10)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks1" value="">
                
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point()" name="point1" id="point1"  placeholder="Enter Points" value="<?php if(!empty($area_points1)){ echo $area_points1;}else{} ?>"> -->
            </div>
        </div>
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr1" hidden>
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
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Barangay Budget Preparation Form 2 of 2022 and 2023</td>
                    <td class="text-center">
                        <?php 
                            $filename11 = $user_id.$year.'file11.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename11)) { ?>
                            <a href="<?php echo $filePath.$filename11 ?>" target="_blank"><?php echo $filename11 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename11)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks2" value="<?php if(!empty($remarks12)){ echo $remarks12;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app12(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app12(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point12()" name="point2" id="point2"  placeholder="Enter Points" value="<?php if(!empty($area_points12)){ echo $area_points12;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr2" hidden>
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
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved Barangay Appropriation Ordinance</td>
                    <td class="text-center">
                        <?php 
                            $filename12 = $user_id.$year.'file12.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename12)) { ?>
                            <a href="<?php echo $filePath.$filename12 ?>" target="_blank"><?php echo $filename12 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename12)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks3" onchange="point13()" value="<?php if(!empty($remarks13)){ echo $remarks13;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app13(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app13(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point13()" name="point3" id="point3"  placeholder="Enter Points" value="<?php if(!empty($area_points13)){ echo $area_points13;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr3" hidden>
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
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved Barangay Appropriation Ordinance</td>
                    <td class="text-center">
                        <?php 
                            $filename13 = $user_id.$year.'file13.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename13)) { ?>
                            <a href="<?php echo $filePath.$filename13 ?>" target="_blank"><?php echo $filename13 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename13)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks4" onchange="point4()" value="<?php if(!empty($remarks14)){ echo $remarks14;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app14(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app14(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point4()" name="point4" id="point4"  placeholder="Enter Points" value="<?php if(!empty($area_points14)){ echo $area_points14;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr4" hidden>
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
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo document of the Barangay CitCha (name of the Barangay should be visible)</td>
                    <td class="text-center">
                        <?php 
                            $filename14 = $user_id.$year.'file14.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename14)) { ?>
                            <a href="<?php echo $filePath.$filename14 ?>" target="_blank"><?php echo $filename14 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename14)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks5" onchange="point5()" value="<?php if(!empty($remarks15)){ echo $remarks15;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app15(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app15(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point5()" name="point5" id="point5"  placeholder="Enter Points" value="<?php if(!empty($area_points15)){ echo $area_points15;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr5" hidden>
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
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>MOVs for 1.6.1.1 a.) Copy of the written agreement; and</td>
                    <td class="text-center">
                        <?php 
                            $filename15 = $user_id.$year.'file15.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename15)) { ?>
                            <a href="<?php echo $filePath.$filename15 ?>" target="_blank"><?php echo $filename15 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename15)) { ?>
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
                    <td>MOVs for 1.6.1.1 b.) Proof of deposit reflecting the Account No./ Name of Barangay SK (1 deposit slip for annual, 2 deposit slips for semestral, 4 deposit slips for quarterly)</td>
                    <td class="text-center">
                        <?php 
                            $filename16 = $user_id.$year.'file16.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename16)) { ?>
                            <a href="<?php echo $filePath.$filename16 ?>" target="_blank"><?php echo $filename16 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename16)) { ?>
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
                    <td>MOVs for 1.6.1.2 a.) 12 Monthly deposit slips reflecting the Account No. / Name of Barangay SK</td>
                    <td class="text-center">
                        <?php 
                            $filename17 = $user_id.$year.'file17.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename17)) { ?>
                            <a href="<?php echo $filePath.$filename17 ?>" target="_blank"><?php echo $filename17 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename17)) { ?>
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
                    <td>MOVs for 1.6.1.3 a.) Proof of transfer of the 10% SK fund to the trust fund of the Barangay such as deposit slip or Official Receipt or correspanding legal form/document issued by the municipal treasurer if the Barangay opted that the corresponding SK fund be kept as trust fund in the custody of the C/M treasurer.</td>
                    <td class="text-center">
                        <?php 
                            $filename18 = $user_id.$year.'file18.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename18)) { ?>
                            <a href="<?php echo $filePath.$filename18 ?>" target="_blank"><?php echo $filename18 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename18)) { ?>
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
    <div class="table-responsive mt-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 1.6.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>MOVs for 1.6.2 Certification from the C/MLGOO on current number of SK officials</td>
                    <td class="text-center">
                        <?php 
                            $filename19 = $user_id.$year.'file19.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename19)) { ?>
                            <a href="<?php echo $filePath.$filename19 ?>" target="_blank"><?php echo $filename19 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename19)) { ?>
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
                    <td>MOVs for 1.6.2 Approved Annual Barangay Youth Investment Program (ABYIP) for 2023</td>
                    <td class="text-center">
                        <?php 
                            $filename20 = $user_id.$year.'file20.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename20)) { ?>
                            <a href="<?php echo $filePath.$filename20 ?>" target="_blank"><?php echo $filename20 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename20)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks6" onchange="point6()" value="<?php if(!empty($remarks16)){ echo $remarks16;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app16(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app16(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point6()" name="point6" id="point6"  placeholder="Enter Points" value="<?php if(!empty($area_points16)){ echo $area_points16;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr6" hidden>
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
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Post Activity Report on the conduct of the wnd semester Barangay assembly duly signed/approved by the Punong Barangay (Annex D of DILG MC No.2022-131)</td>
                    <td class="text-center">
                        <?php 
                            $filename21 = $user_id.$year.'file21.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename21)) { ?>
                            <a href="<?php echo $filePath.$filename21 ?>" target="_blank"><?php echo $filename21 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename21)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks7" onchange="point7()" value="<?php if(!empty($remarks17)){ echo $remarks17;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app17(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app17(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point7()" name="point7" id="point7"  placeholder="Enter Points" value="<?php if(!empty($area_points17)){ echo $area_points17;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr7" hidden>
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
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>2.1 Functionality of the Barangay Disaster Risk Reduction and Management Commitee (BDRRMC)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
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
                        <?php 
                            $filePath = '../actions/upload2/uploaded/'; 
                            $filename211 = $user_id.$year.'file211.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename211)) { ?>
                            <a href="<?php echo $filePath.$filename211 ?>" target="_blank"><?php echo $filename211 ?></a>
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
                            $filename212 = $user_id.$year.'file212.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename212)) { ?>
                            <a href="<?php echo $filePath.$filename212 ?>" target="_blank"><?php echo $filename212 ?></a>
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
                            $filename213 = $user_id.$year.'file213.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename213)) { ?>
                            <a href="<?php echo $filePath.$filename213 ?>" target="_blank"><?php echo $filename213 ?></a>
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
                            $filename214 = $user_id.$year.'file214.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename214)) { ?>
                            <a href="<?php echo $filePath.$filename214 ?>" target="_blank"><?php echo $filename214 ?></a>
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
                            $filename215 = $user_id.$year.'file215.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename215)) { ?>
                            <a href="<?php echo $filePath.$filename215 ?>" target="_blank"><?php echo $filename215 ?></a>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks21" onchange="point21()" value=" <?php if(!empty($remarks21)){ echo $remarks21;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app21(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app21(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point21()" name="point21" id="point21"  placeholder="Enter Points" value="<?php if(!empty($area_points21)){ echo $area_points21;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr21" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>2.2 Extend of Risk Assessment and Early Warning System (EWS)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
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
                        <?php 
                            $filename216 = $user_id.$year.'file216.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename216)) { ?>
                            <a href="<?php echo $filePath.$filename216 ?>" target="_blank"><?php echo $filename216 ?></a>
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
                            $filename217 = $user_id.$year.'file217.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename217)) { ?>
                            <a href="<?php echo $filePath.$filename217 ?>" target="_blank"><?php echo $filename217 ?></a>
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
                            $filename218 = $user_id.$year.'file218.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename218)) { ?>
                            <a href="<?php echo $filePath.$filename218 ?>" target="_blank"><?php echo $filename218 ?></a>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks22" onchange="point22()" value="<?php if(!empty($remarks22)){ echo $remarks22;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app22(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app22(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point22()" name="point22" id="point22"  placeholder="Enter Points" value="<?php if(!empty($area_points22)){ echo $area_points22;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr22" hidden>
    </div>
</div>
<div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>2.3 Extend of Preparedness For Effective Response And Recovery</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
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
                        <?php 
                            $filename219 = $user_id.$year.'file219.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename219)) { ?>
                            <a href="<?php echo $filePath.$filename219 ?>" target="_blank"><?php echo $filename219 ?></a>
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
                            $filename220 = $user_id.$year.'file220.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename220)) { ?>
                            <a href="<?php echo $filePath.$filename220 ?>" target="_blank"><?php echo $filename220 ?></a>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks23" onchange="point23()" value="<?php if(!empty($remarks23)){ echo $remarks23;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app23(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app23(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point23()" name="point23" id="point23"  placeholder="Enter Points" value="<?php if(!empty($area_points23)){ echo $area_points23;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr23" hidden>
    </div>
</div>
<div class="card shadow mb-4">
<div class="card-header bg-primary text-center py-3">
    <div class="row">
        <div class="col-lg-12"><h5 class="text-white"><b>Core Governance Area No. 3:</b></h5></div>
        <div class="col-lg-12"><h5 class="text-white"><b>Safety, Peace and Order</b></h5></div>
    </div>
</div>
<div class="card-body" id="viewLocation">
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.1 Functionality of the Barangay Anti-Drug Abuse Council (BADAC)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.1.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Executive Order or similar issuance creating the BADAC with its composition and appropriate committees (Committees on Operations and on Advocacy)</td>
                    <td class="text-center">
                        <?php 
                            $filePath = '../actions/upload3/uploaded/'; 
                            $filename311 = $user_id.$year.'file311.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename311)) { ?>
                            <a href="<?php echo $filePath.$filename311 ?>" target="_blank"><?php echo $filename311 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename311)) { ?>
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
                    <th class="text-center">Reports 3.1.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance establishing the Rehabilitation Referral Desk</td>
                        <?php 
                            $filename312 = $user_id.$year.'file312.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename312)) { ?>
                            <a href="<?php echo $filePath.$filename312 ?>" target="_blank"><?php echo $filename312 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename312)) { ?>
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
                    <th class="text-center">Reports 3.1.3</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved Barangay Appropriation Ordinance</td>
                        <?php 
                            $filename313 = $user_id.$year.'file313.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename313)) { ?>
                            <a href="<?php echo $filePath.$filename313 ?>" target="_blank"><?php echo $filename313 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename313)) { ?>
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
                    <th class="text-center">Reports 3.1.4</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved BADAC Plan of Action</td>
                        <?php 
                            $filename314 = $user_id.$year.'file314.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename314)) { ?>
                            <a href="<?php echo $filePath.$filename314 ?>" target="_blank"><?php echo $filename314 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename314)) { ?>
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
                    <th class="text-center">Reports 3.1.5</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Transmittal of CIR (stamp received) to CADAC/MADAC and Local PNP Unit</td>
                        <?php 
                            $filename315 = $user_id.$year.'file315.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename315)) { ?>
                            <a href="<?php echo $filePath.$filename315 ?>" target="_blank"><?php echo $filename315 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename315)) { ?>
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
                    <th class="text-center">Reports 3.1.6</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Annual BADAC Accomplishment and Fund Utilization Report submitted not later than the 20th day of January (stamp received) to the CADAC/MADAC</td>
                        <?php 
                            $filename316 = $user_id.$year.'file316.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename316)) { ?>
                            <a href="<?php echo $filePath.$filename316 ?>" target="_blank"><?php echo $filename316 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename316)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks31" onchange="point31()" value="<?php if(!empty($remarks31)){ echo $remarks31;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app31(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app31(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point31()" name="point31" id="point31"  placeholder="Enter Points" value="<?php if(!empty($area_points31)){ echo $area_points31;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr31" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.2 Functionality of the Barangay Peace and Order Committee (BPOC)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.2.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Executive Order or similar issuance indicating correct membership on accordance to the EO 366 s. of 1996</td>
                    <td class="text-center">
                        <?php 
                            $filename317 = $user_id.$year.'file317.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename317)) { ?>
                            <a href="<?php echo $filePath.$filename317 ?>" target="_blank"><?php echo $filename317 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename317)) { ?>
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
                    <th class="text-center">Reports 3.2.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved BPOPS Plan</td>
                    <td class="text-center">
                        <?php 
                            $filename318 = $user_id.$year.'file318.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename318)) { ?>
                            <a href="<?php echo $filePath.$filename318 ?>" target="_blank"><?php echo $filename318 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename318)) { ?>
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
                    <th class="text-center">Reports 3.2.3</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Accomplishment Report (in any format) Submitted to the C/M POC on the prescribed schedules (stamp received)</td>
                    <td class="text-center">
                        <?php 
                            $filename319 = $user_id.$year.'file319.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename319)) { ?>
                            <a href="<?php echo $filePath.$filename319 ?>" target="_blank"><?php echo $filename319 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename319)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks32" onchange="point32()" value="<?php if(!empty($remarks32)){ echo $remarks32;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app32(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app32(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point32()" name="point32" id="point32"  placeholder="Enter Points" value="<?php if(!empty($area_points32)){ echo $area_points32;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr32" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.3 Functionality of the Lupong Tagapamayapa (LT)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.3.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Appointment of the Lupong Tagapamayapa</td>
                    <td class="text-center">
                        <?php 
                            $filename320 = $user_id.$year.'file320.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename320)) { ?>
                            <a href="<?php echo $filePath.$filename320 ?>" target="_blank"><?php echo $filename320 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename320)) { ?>
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
                    <th class="text-center">Reports 3.3.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>For Barangay of cities: 2 photo with caption of the computer database with searchable information</td>
                    <td class="text-center">
                        <?php 
                            $filename321 = $user_id.$year.'file321.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename321)) { ?>
                            <a href="<?php echo $filePath.$filename321 ?>" target="_blank"><?php echo $filename321 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename321)) { ?>
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
                    <td>For Barangay of municipalities : 1 photo, with caption on the manual and digital file</td>
                    <td class="text-center">
                        <?php 
                            $filename322 = $user_id.$year.'file322.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename322)) { ?>
                            <a href="<?php echo $filePath.$filename322 ?>" target="_blank"><?php echo $filename322 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename322)) { ?>
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
                    <th class="text-center">Reports 3.3.3</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Copies of minutes of meetings with attendance sheets (at least 3 minutes covering meetings conducted in 2023)</td>
                    <td class="text-center">
                        <?php 
                            $filename323 = $user_id.$year.'file323.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename323)) { ?>
                            <a href="<?php echo $filePath.$filename323 ?>" target="_blank"><?php echo $filename323 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename323)) { ?>
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
                    <th class="text-center">Reports 3.3.4</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                    <td class="text-center">
                        <?php 
                            $filename324 = $user_id.$year.'file324.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename324)) { ?>
                            <a href="<?php echo $filePath.$filename324 ?>" target="_blank"><?php echo $filename324 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename324)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks33" onchange="point33()" value="<?php if(!empty($remarks33)){ echo $remarks33;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app33(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app33(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point33()" name="point33" id="point33"  placeholder="Enter Points" value="<?php if(!empty($area_points33)){ echo $area_points33;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr33" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.4 Organization and Strengthening Capacities of Barangay Tanod</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.4.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance on the organization of the Barangay Tanod covering 2023</td>
                    <td class="text-center">
                        <?php 
                            $filename325 = $user_id.$year.'file325.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename325)) { ?>
                            <a href="<?php echo $filePath.$filename325 ?>" target="_blank"><?php echo $filename325 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename325)) { ?>
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
                    <th class="text-center">Reports 3.4.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                    <td class="text-center">
                        <?php 
                            $filename326 = $user_id.$year.'file326.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename326)) { ?>
                            <a href="<?php echo $filePath.$filename326 ?>" target="_blank"><?php echo $filename326 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename326)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks34" onchange="point34()" value="<?php if(!empty($remarks34)){ echo $remarks34;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app34(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app34(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point34()" name="point34" id="point34"  placeholder="Enter Points" value="<?php if(!empty($area_points34)){ echo $area_points34;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr34" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.5 Barangay Initiatives During Health Emergencies</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.5.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance on the organization of BHERTs</td>
                    <td class="text-center">
                        <?php 
                            $filename327 = $user_id.$year.'file327.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename327)) { ?>
                            <a href="<?php echo $filePath.$filename327 ?>" target="_blank"><?php echo $filename327 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename327)) { ?>
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
                    <th class="text-center">Reports 3.5.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo documentation of poster and/or tarpulin</td>
                    <td class="text-center">
                        <?php 
                            $filename328 = $user_id.$year.'file328.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename328)) { ?>
                            <a href="<?php echo $filePath.$filename328 ?>" target="_blank"><?php echo $filename328 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename328)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks35" onchange="point35()" value="<?php if(!empty($remarks35)){ echo $remarks35;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app35(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app35(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point35()" name="point35" id="point35"  placeholder="Enter Points" value="<?php if(!empty($area_points35)){ echo $area_points35;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr35" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.6 Conduct of Monthly Barangay Road Clearing Operations (BaRCO)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.6.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Monthly BarCo Reports for October-December 2023</td>
                    <td class="text-center">
                        <?php 
                            $filename329 = $user_id.$year.'file329.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename329)) { ?>
                            <a href="<?php echo $filePath.$filename329 ?>" target="_blank"><?php echo $filename329 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename329)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks36" onchange="point36()" value="<?php if(!empty($remarks36)){ echo $remarks36;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app36(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app36(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point36()" name="point36" id="point36"  placeholder="Enter Points" value="<?php if(!empty($area_points36)){ echo $area_points36;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr36" hidden>
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
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.1 Functionality of Barangay Violence Against Women (VAW) Desk</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.1.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Executive Order or similar issuance on the establishment of the Barangay VAW Desk and designated VAW Desk Officer</td>
                    <td class="text-center">
                        <?php 
                            $filePath = '../actions/upload4/uploaded/'; 
                            $filename411 = $user_id.$year.'file411.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename411)) { ?>
                            <a href="<?php echo $filePath.$filename411 ?>" target="_blank"><?php echo $filename411 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename411)) { ?>
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
                    <th class="text-center">Reports 4.1.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                        <?php 
                            $filename412 = $user_id.$year.'file412.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename412)) { ?>
                            <a href="<?php echo $filePath.$filename412 ?>" target="_blank"><?php echo $filename412 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename412)) { ?>
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
                    <th class="text-center">Reports 4.1.3</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved 2023 Barangay Gender and Development (GAD) Plan and Budget</td>
                        <?php 
                            $filename413 = $user_id.$year.'file413.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename413)) { ?>
                            <a href="<?php echo $filePath.$filename413 ?>" target="_blank"><?php echo $filename413 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename413)) { ?>
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
                    <th class="text-center">Reports 4.1.4</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Monthly Accomplishment Reports for CY 2023 (October-December 2023)</td>
                        <?php 
                            $filename414 = $user_id.$year.'file414.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename414)) { ?>
                            <a href="<?php echo $filePath.$filename414 ?>" target="_blank"><?php echo $filename414 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename414)) { ?>
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
                    <th class="text-center">Reports 4.1.5</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Updated database on VAW cases reported to the Barangay</td>
                        <?php 
                            $filename415 = $user_id.$year.'file415.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename415)) { ?>
                            <a href="<?php echo $filePath.$filename415 ?>" target="_blank"><?php echo $filename415 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename415)) { ?>
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
                    <th class="text-center">Reports 4.1.6</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CY 2023 GAD Accomplishment Report</td>
                        <?php 
                            $filename416 = $user_id.$year.'file416.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename416)) { ?>
                            <a href="<?php echo $filePath.$filename416 ?>" target="_blank"><?php echo $filename416 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename416)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks41" onchange="point41()" value="<?php if(!empty($remarks41)){ echo $remarks41;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app41(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app41(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point41()" name="point41" id="point41"  placeholder="Enter Points" value="<?php if(!empty($area_points41)){ echo $area_points41;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr41" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.2 Access to Health and Social Welfare Services in the Barangay</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.2.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo documentation of the BHS/C</td>
                        <?php 
                            $filename417 = $user_id.$year.'file417.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename417)) { ?>
                            <a href="<?php echo $filePath.$filename417 ?>" target="_blank"><?php echo $filename417 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename417)) { ?>
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
                    <th class="text-center">Reports 4.2.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance on the appointment of BHW</td>
                        <?php 
                            $filename418 = $user_id.$year.'file418.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename418)) { ?>
                            <a href="<?php echo $filePath.$filename418 ?>" target="_blank"><?php echo $filename418 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename418)) { ?>
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
                    <th class="text-center">Reports 4.2.3</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance on the appointment of BNS</td>
                        <?php 
                            $filename419 = $user_id.$year.'file419.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename419)) { ?>
                            <a href="<?php echo $filePath.$filename419 ?>" target="_blank"><?php echo $filename419 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename419)) { ?>
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
                    <th class="text-center">Reports 4.2.4</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo documentations of the operations of the BHS/C</td>
                        <?php 
                            $filename420 = $user_id.$year.'file420.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename420)) { ?>
                            <a href="<?php echo $filePath.$filename420 ?>" target="_blank"><?php echo $filename420 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename420)) { ?>
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
                    <td>Barangay Issuances on the provision of health services</td>
                        <?php 
                            $filename421 = $user_id.$year.'file421.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename421)) { ?>
                            <a href="<?php echo $filePath.$filename421 ?>" target="_blank"><?php echo $filename421 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename421)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks42" onchange="point42()" value="<?php if(!empty($remarks42)){ echo $remarks42;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app42(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app42(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point42()" name="point42" id="point42"  placeholder="Enter Points" value="<?php if(!empty($area_points42)){ echo $area_points42;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr42" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.3 Functionality of the Barangay Development Council (BDC)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.3.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance organizing the BDC with its composition compliant to Section 107 of RA 7160</td>
                        <?php 
                            $filename422 = $user_id.$year.'file422.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename422)) { ?>
                            <a href="<?php echo $filePath.$filename422 ?>" target="_blank"><?php echo $filename422 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename422)) { ?>
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
                    <th class="text-center">Reports 4.3.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Minutes (at least 2) of the public hearing/Barangay assemblies with attendance sheet</td>
                        <?php 
                            $filename423 = $user_id.$year.'file423.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename423)) { ?>
                            <a href="<?php echo $filePath.$filename423 ?>" target="_blank"><?php echo $filename423 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename423)) { ?>
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
                    <th class="text-center">Reports 4.3.3</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Barangay Development Plan with BDC and SB Resolutions adopting such</td>
                        <?php 
                            $filename424 = $user_id.$year.'file424.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename424)) { ?>
                            <a href="<?php echo $filePath.$filename424 ?>" target="_blank"><?php echo $filename424 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename424)) { ?>
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
                    <th class="text-center">Reports 4.3.4</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CY 2023 Accomplishment Report of the BDP</td>
                        <?php 
                            $filename425 = $user_id.$year.'file425.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename425)) { ?>
                            <a href="<?php echo $filePath.$filename425 ?>" target="_blank"><?php echo $filename425 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename425)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks43" onchange="point43()" value="<?php if(!empty($remarks43)){ echo $remarks43;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app43(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app43(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point43()" name="point43" id="point43"  placeholder="Enter Points" value="<?php if(!empty($area_points43)){ echo $area_points43;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr43" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.4 Implementation of the Kasambahay Law</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.4.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance designating a Kasambahay Desk and a KDO</td>
                        <?php 
                            $filename426 = $user_id.$year.'file426.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename426)) { ?>
                            <a href="<?php echo $filePath.$filename426 ?>" target="_blank"><?php echo $filename426 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename426)) { ?>
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
                    <th class="text-center">Reports 4.4.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Updated Kasambahay Report Form 2 (Kasambahay Masterlist) as of December 2023</td>
                        <?php 
                            $filename427 = $user_id.$year.'file427.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename427)) { ?>
                            <a href="<?php echo $filePath.$filename427 ?>" target="_blank"><?php echo $filename427 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename427)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks44" onchange="point44()" value="<?php if(!empty($remarks44)){ echo $remarks44;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app44(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app44(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point44()" name="point44" id="point44"  placeholder="Enter Points" value="<?php if(!empty($area_points44)){ echo $area_points44;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr44" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.5 Functionality of the Barangay Council for the Protection of Children (BCPC)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.5.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Executive Order or similar Issuance on the extablishment Barangay Council for Protection of Children (BCPC)</td>
                        <?php 
                            $filename428 = $user_id.$year.'file428.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename428)) { ?>
                            <a href="<?php echo $filePath.$filename428 ?>" target="_blank"><?php echo $filename428 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename428)) { ?>
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
                    <th class="text-center">Reports 4.5.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                        <?php 
                            $filename429 = $user_id.$year.'file429.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename429)) { ?>
                            <a href="<?php echo $filePath.$filename429 ?>" target="_blank"><?php echo $filename429 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename429)) { ?>
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
                    <th class="text-center">Reports 4.5.3</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved BCPC Annual Work and FInancial Plan (AWFP)</td>
                        <?php 
                            $filename430 = $user_id.$year.'file430.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename430)) { ?>
                            <a href="<?php echo $filePath.$filename430 ?>" target="_blank"><?php echo $filename430 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename430)) { ?>
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
                    <th class="text-center">Reports 4.5.4</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Updated database on children</td>
                        <?php 
                            $filename431 = $user_id.$year.'file431.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename431)) { ?>
                            <a href="<?php echo $filePath.$filename431 ?>" target="_blank"><?php echo $filename431 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename431)) { ?>
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
                    <th class="text-center">Reports 4.5.5</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Updated Localized Flow Chart of Referral System</td>
                        <?php 
                            $filename432 = $user_id.$year.'file432.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename432)) { ?>
                            <a href="<?php echo $filePath.$filename432 ?>" target="_blank"><?php echo $filename432 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename432)) { ?>
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
                    <th class="text-center">Reports 4.5.6</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CY 2023 Approved Accomplishment Report on BCPC Plan</td>
                        <?php 
                            $filename433 = $user_id.$year.'file433.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename433)) { ?>
                            <a href="<?php echo $filePath.$filename433 ?>" target="_blank"><?php echo $filename433 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename433)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks45" onchange="point45()" value="<?php if(!empty($remarks45)){ echo $remarks45;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app45(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app45(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point45()" name="point45" id="point45"  placeholder="Enter Points" value="<?php if(!empty($area_points45)){ echo $area_points45;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr45" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.6 Mechanism for Gender and Development (GAD)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.6.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance organizing the Barangay GAD Focal Point System</td>
                        <?php 
                            $filename434 = $user_id.$year.'file434.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename434)) { ?>
                            <a href="<?php echo $filePath.$filename434 ?>" target="_blank"><?php echo $filename434 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename434)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks46" onchange="point46()" value="<?php if(!empty($remarks46)){ echo $remarks46;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app46(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app46(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point46()" name="point46" id="point46"  placeholder="Enter Points" value="<?php if(!empty($area_points46)){ echo $area_points46;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr46" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.7 Maintenance of Ipdated Record of Barangay Inhabitants (RBIs)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.7.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Accomplished RBI Form A of two semesters of CY 2023</td>
                        <?php 
                            $filename435 = $user_id.$year.'file435.pdf';
                        ?>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename435)) { ?>
                            <a href="<?php echo $filePath.$filename435 ?>" target="_blank"><?php echo $filename435 ?></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename435)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks47" onchange="point47()" value="<?php if(!empty($remarks47)){ echo $remarks47;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app47(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app47(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point47()" name="point47" id="point47"  placeholder="Enter Points" value="<?php if(!empty($area_points47)){ echo $area_points47;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr47" hidden>
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
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>5.1 Power to Levy Other Taxes, Fees, or Charges</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 5.1.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Enacted Barangay Tax Ordinance</td>
                    <td class="text-center">
                        <?php 
                            $filePath = '../actions/upload5/uploaded/'; 
                            $filename511 = $user_id.$year.'file511.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename511)) { ?>
                            <a href="<?php echo $filePath.$filename511 ?>" target="_blank"><?php echo $filename511 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename511)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks51" onchange="point51()" value="<?php if(!empty($remarks51)){ echo $remarks51;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app51(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app51(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point51()" name="point51" id="point51"  placeholder="Enter Points" value="<?php if(!empty($area_points51)){ echo $area_points51;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr51" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>5.2 Compiliance to Section 11 of RA 11032 of the Ease of Doing Business Law</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 5.2.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Enacted Barangay Ordinance relative to Barangay Clearance Fees on business permit and locational clearance for building permit, in accordance with MC No. 2019-177</td>
                    <td class="text-center">
                        <?php 
                            $filename512 = $user_id.$year.'file512.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename512)) { ?>
                            <a href="<?php echo $filePath.$filename512 ?>" target="_blank"><?php echo $filename512 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename512)) { ?>
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
                    <th class="text-center">Reports 5.2.2</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved resolution authorizing the Municipal Treasurer to collect fees for Barangay Clearance for Business permit and locational clearance purpose</td>
                    <td class="text-center">
                        <?php 
                            $filename513 = $user_id.$year.'file513.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename513)) { ?>
                            <a href="<?php echo $filePath.$filename513 ?>" target="_blank"><?php echo $filename513 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename513)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks52" onchange="point52()" value="<?php if(!empty($remarks52)){ echo $remarks52;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app52(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app52(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point52()" name="point52" id="point52"  placeholder="Enter Points" value="<?php if(!empty($area_points52)){ echo $area_points52;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr52" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>5.3 Issuance of Barangay Clearance not covered by DILG MC No. 2019-177 such as: residency, indigency, etc, within seven (7) working days</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 5.3.1</th>
                    <th class="text-center">Attachments</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo documentation of the Citizens' Charter on the issuance of Barangay Clearance only (name of the Barangay should be visible)</td>
                    <td class="text-center">
                        <?php 
                            $filename514 = $user_id.$year.'file514.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename514)) { ?>
                            <a href="<?php echo $filePath.$filename514 ?>" target="_blank"><?php echo $filename514 ?></a>
                        <?php } ?>
                        
                    </td>
                    <td class="text-center">
                        <?php if (file_exists($filePath.$filename514)) { ?>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks53" onchange="point53()" value="<?php if(!empty($remarks53)){ echo $remarks53;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app53(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app53(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point53()" name="point53" id="point53"  placeholder="Enter Points" value="<?php if(!empty($area_points53)){ echo $area_points53;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr53" hidden>
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
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>6.1 Functionality of the Barangay Ecological Solid Waste Management Committee (BESWMC)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
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
                        <?php 
                            $filePath = '../actions/upload6/uploaded/'; 
                            $filename611 = $user_id.$year.'file611.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename611)) { ?>
                            <a href="<?php echo $filePath.$filename611 ?>" target="_blank"><?php echo $filename611 ?></a>
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
                        <?php 
                            $filename612 = $user_id.$year.'file612.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename612)) { ?>
                            <a href="<?php echo $filePath.$filename612 ?>" target="_blank"><?php echo $filename612 ?></a>
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
                        <?php 
                            $filename613 = $user_id.$year.'file613.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename613)) { ?>
                            <a href="<?php echo $filePath.$filename613 ?>" target="_blank"><?php echo $filename613 ?></a>
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
                        <?php 
                            $filename614 = $user_id.$year.'file614.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename614)) { ?>
                            <a href="<?php echo $filePath.$filename614 ?>" target="_blank"><?php echo $filename614 ?></a>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks61" onchange="point61()" value="<?php if(!empty($remarks61)){ echo $remarks61;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app61(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app61(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point61()" name="point61" id="point61"  placeholder="Enter Points" value="<?php if(!empty($area_points61)){ echo $area_points61;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr61" hidden>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>6.2 Existence of a Solid Waste Management Facility Pursuant to R.A. 9003</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
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
                        <?php 
                            $filename615 = $user_id.$year.'file615.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename615)) { ?>
                            <a href="<?php echo $filePath.$filename615 ?>" target="_blank"><?php echo $filename615 ?></a>
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
                        <?php 
                            $filename616 = $user_id.$year.'file616.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename616)) { ?>
                            <a href="<?php echo $filePath.$filename616 ?>" target="_blank"><?php echo $filename616 ?></a>
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
                        <?php 
                            $filename617 = $user_id.$year.'file617.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename617)) { ?>
                            <a href="<?php echo $filePath.$filename617 ?>" target="_blank"><?php echo $filename617 ?></a>
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
                        <?php 
                            $filename618 = $user_id.$year.'file618.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename618)) { ?>
                            <a href="<?php echo $filePath.$filename618 ?>" target="_blank"><?php echo $filename618 ?></a>
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
                        <?php 
                            $filename619 = $user_id.$year.'file619.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename619)) { ?>
                            <a href="<?php echo $filePath.$filename619 ?>" target="_blank"><?php echo $filename619 ?></a>
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
                        <?php 
                            $filename620 = $user_id.$year.'file620.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename620)) { ?>
                            <a href="<?php echo $filePath.$filename620 ?>" target="_blank"><?php echo $filename620 ?></a>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks62" onchange="point62()" value="<?php if(!empty($remarks62)){ echo $remarks62;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app62(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app62(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point62()" name="point62" id="point62"  placeholder="Enter Points" value="<?php if(!empty($area_points62)){ echo $area_points62;}else{} ?>""> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr62" hidden>
    </div>

    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>6.3 Provision of Support Mechanisms for Segregated Collection</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
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
                        <?php 
                            $filename621 = $user_id.$year.'file621.pdf';
                        ?>

                        <?php if (file_exists($filePath.$filename621)) { ?>
                            <a href="<?php echo $filePath.$filename621 ?>" target="_blank"><?php echo $filename621 ?></a>
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
        <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks63" onchange="point63()" value="<?php if(!empty($remarks63)){ echo $remarks63;}else{} ?>">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app63(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app63(1)"> Approved </button>
                <!-- <input class="form-control text-right" type="text" onchange="point63()" name="point63" id="point63"  placeholder="Enter Points" value="<?php if(!empty($area_points63)){ echo $area_points63;}else{} ?>"> -->
            </div>
        </div>
        
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr63" hidden>
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
<script src="view_other_barangay_file.js"></script>
</body>

</html>
