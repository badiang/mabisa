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
	comment10,approved10
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

$query12 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1 
	FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=2");
$query12->bindParam(1, $user_id);
$query12->bindParam(2, $year);
$query12->execute();
$result12 = $query12->fetch(PDO::FETCH_ASSOC);
$remarks12 = $result12['remarks'];
$area_points12 = $result12['area_points'];
$comment121 = $result12['comment1'];
$approved121 = $result12['approved1'];

$query13 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1 
	FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=3");
$query13->bindParam(1, $user_id);
$query13->bindParam(2, $year);
$query13->execute();
$result13 = $query13->fetch(PDO::FETCH_ASSOC);
$remarks13 = $result13['remarks'];
$area_points13 = $result13['area_points'];
$comment131 = $result13['comment1'];
$approved131 = $result13['approved1'];

$query14 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1 
	FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=4");
$query14->bindParam(1, $user_id);
$query14->bindParam(2, $year);
$query14->execute();
$result14 = $query14->fetch(PDO::FETCH_ASSOC);
$remarks14 = $result14['remarks'];
$area_points14 = $result14['area_points'];
$comment141 = $result14['comment1'];
$approved141 = $result14['approved1'];

$query15 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1 
	FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=5");
$query15->bindParam(1, $user_id);
$query15->bindParam(2, $year);
$query15->execute();
$result15 = $query15->fetch(PDO::FETCH_ASSOC);
$remarks15 = $result15['remarks'];
$area_points15 = $result15['area_points'];
$comment151 = $result15['comment1'];
$approved151 = $result15['approved1'];

$query16 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1, 
	comment2,approved2, 
	comment3,approved3, 
	comment4,approved4, 
	comment5,approved5, 
	comment6,approved6 
	FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=6");
$query16->bindParam(1, $user_id);
$query16->bindParam(2, $year);
$query16->execute();
$result16 = $query16->fetch(PDO::FETCH_ASSOC);
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

$query17 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1 
	FROM area_assessment_points where user_id=? and year_=? and area_number=1 and under_area=7");
$query17->bindParam(1, $user_id);
$query17->bindParam(2, $year);
$query17->execute();
$result17 = $query17->fetch(PDO::FETCH_ASSOC);
$remarks17 = $result17['remarks'];
$area_points17 = $result17['area_points'];
$comment171 = $result17['comment1'];
$approved171 = $result17['approved1'];

$query21 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3,
	comment4,approved4,
	comment5,approved5
	FROM area_assessment_points where user_id=? and year_=? and area_number=2 and under_area=1");
$query21->bindParam(1, $user_id);
$query21->bindParam(2, $year);
$query21->execute();
$result21 = $query21->fetch(PDO::FETCH_ASSOC);
$remarks21 = $result21['remarks'];
$area_points21 = $result21['area_points'];
$comment211 = $result21['comment1'];
$approved211 = $result21['approved1'];
$comment212 = $result21['comment2'];
$approved212 = $result21['approved2'];
$comment213 = $result21['comment3'];
$approved213 = $result21['approved3'];
$comment214 = $result21['comment4'];
$approved214 = $result21['approved4'];
$comment215 = $result21['comment5'];
$approved215 = $result21['approved5'];

$query22 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3
	FROM area_assessment_points where user_id=? and year_=? and area_number=2 and under_area=2");
$query22->bindParam(1, $user_id);
$query22->bindParam(2, $year);
$query22->execute();
$result22 = $query22->fetch(PDO::FETCH_ASSOC);
$remarks22 = $result22['remarks'];
$area_points22 = $result22['area_points'];
$comment221 = $result22['comment1'];
$approved221 = $result22['approved1'];
$comment222 = $result22['comment2'];
$approved222 = $result22['approved2'];
$comment223 = $result22['comment3'];
$approved223 = $result22['approved3'];

$query23 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2
	FROM area_assessment_points where user_id=? and year_=? and area_number=2 and under_area=3");
$query23->bindParam(1, $user_id);
$query23->bindParam(2, $year);
$query23->execute();
$result23 = $query23->fetch(PDO::FETCH_ASSOC);
$remarks23 = $result23['remarks'];
$area_points23 = $result23['area_points'];
$comment231 = $result23['comment1'];
$approved231 = $result23['approved1'];
$comment232 = $result23['comment2'];
$approved232 = $result23['approved2'];

$query31 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3,
	comment4,approved4,
	comment5,approved5,
	comment6,approved6
	FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=1");
$query31->bindParam(1, $user_id);
$query31->bindParam(2, $year);
$query31->execute();
$result31 = $query31->fetch(PDO::FETCH_ASSOC);
$remarks31 = $result31['remarks'];
$area_points31 = $result31['area_points'];
$comment311 = $result31['comment1'];
$approved311 = $result31['approved1'];
$comment312 = $result31['comment2'];
$approved312 = $result31['approved2'];
$comment313 = $result31['comment3'];
$approved313 = $result31['approved3'];
$comment314 = $result31['comment4'];
$approved314 = $result31['approved4'];
$comment315 = $result31['comment5'];
$approved315 = $result31['approved5'];
$comment316 = $result31['comment6'];
$approved316 = $result31['approved6'];

$query32 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3
	FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=2");
$query32->bindParam(1, $user_id);
$query32->bindParam(2, $year);
$query32->execute();
$result32 = $query32->fetch(PDO::FETCH_ASSOC);
$remarks32 = $result32['remarks'];
$area_points32 = $result32['area_points'];
$comment321 = $result32['comment1'];
$approved321 = $result32['approved1'];
$comment322 = $result32['comment2'];
$approved322 = $result32['approved2'];
$comment323 = $result32['comment3'];
$approved323 = $result32['approved3'];

$query33 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3,
	comment4,approved4,
	comment5,approved5
	FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=3");
$query33->bindParam(1, $user_id);
$query33->bindParam(2, $year);
$query33->execute();
$result33 = $query33->fetch(PDO::FETCH_ASSOC);
$remarks33 = $result33['remarks'];
$area_points33 = $result33['area_points'];
$comment331 = $result33['comment1'];
$approved331 = $result33['approved1'];
$comment332 = $result33['comment2'];
$approved332 = $result33['approved2'];
$comment333 = $result33['comment3'];
$approved333 = $result33['approved3'];
$comment334 = $result33['comment4'];
$approved334 = $result33['approved4'];
$comment335 = $result33['comment5'];
$approved335 = $result33['approved5'];

$query34 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2
	FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=4");
$query34->bindParam(1, $user_id);
$query34->bindParam(2, $year);
$query34->execute();
$result34 = $query34->fetch(PDO::FETCH_ASSOC);
$remarks34 = $result34['remarks'];
$area_points34 = $result34['area_points'];
$comment341 = $result34['comment1'];
$approved341 = $result34['approved1'];
$comment342 = $result34['comment2'];
$approved342 = $result34['approved2'];

$query35 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2
	FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=5");
$query35->bindParam(1, $user_id);
$query35->bindParam(2, $year);
$query35->execute();
$result35 = $query35->fetch(PDO::FETCH_ASSOC);
$remarks35 = $result35['remarks'];
$area_points35 = $result35['area_points'];
$comment351 = $result35['comment1'];
$approved351 = $result35['approved1'];
$comment352 = $result35['comment2'];
$approved352 = $result35['approved2'];

$query36 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1 
	FROM area_assessment_points where user_id=? and year_=? and area_number=3 and under_area=6");
$query36->bindParam(1, $user_id);
$query36->bindParam(2, $year);
$query36->execute();
$result36 = $query36->fetch(PDO::FETCH_ASSOC);
$remarks36 = $result36['remarks'];
$area_points36 = $result36['area_points'];
$comment361 = $result36['comment1'];
$approved361 = $result36['approved1'];

$query41 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3,
	comment4,approved4,
	comment5,approved5,
	comment6,approved6
	FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=1");
$query41->bindParam(1, $user_id);
$query41->bindParam(2, $year);
$query41->execute();
$result41 = $query41->fetch(PDO::FETCH_ASSOC);
$remarks41 = $result41['remarks'];
$area_points41 = $result41['area_points'];
$comment411 = $result41['comment1'];
$approved411 = $result41['approved1'];
$comment412 = $result41['comment2'];
$approved412 = $result41['approved2'];
$comment413 = $result41['comment3'];
$approved413 = $result41['approved3'];
$comment414 = $result41['comment4'];
$approved414 = $result41['approved4'];
$comment415 = $result41['comment5'];
$approved415 = $result41['approved5'];
$comment416 = $result41['comment6'];
$approved416 = $result41['approved6'];

$query42 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3,
	comment4,approved4,
	comment5,approved5
	FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=2");
$query42->bindParam(1, $user_id);
$query42->bindParam(2, $year);
$query42->execute();
$result42 = $query42->fetch(PDO::FETCH_ASSOC);
$remarks42 = $result42['remarks'];
$area_points42 = $result42['area_points'];
$comment421 = $result42['comment1'];
$approved421 = $result42['approved1'];
$comment422 = $result42['comment2'];
$approved422 = $result42['approved2'];
$comment423 = $result42['comment3'];
$approved423 = $result42['approved3'];
$comment424 = $result42['comment4'];
$approved424 = $result42['approved4'];
$comment425 = $result42['comment5'];
$approved425 = $result42['approved5'];

$query43 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3,
	comment4,approved4
	FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=3");
$query43->bindParam(1, $user_id);
$query43->bindParam(2, $year);
$query43->execute();
$result43 = $query43->fetch(PDO::FETCH_ASSOC);
$remarks43 = $result43['remarks'];
$area_points43 = $result43['area_points'];
$comment431 = $result43['comment1'];
$approved431 = $result43['approved1'];
$comment432 = $result43['comment2'];
$approved432 = $result43['approved2'];
$comment433 = $result43['comment3'];
$approved433 = $result43['approved3'];
$comment434 = $result43['comment4'];
$approved434 = $result43['approved4'];

$query44 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2
	FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=4");
$query44->bindParam(1, $user_id);
$query44->bindParam(2, $year);
$query44->execute();
$result44 = $query44->fetch(PDO::FETCH_ASSOC);
$remarks44 = $result44['remarks'];
$area_points44 = $result44['area_points'];
$comment441 = $result44['comment1'];
$approved441 = $result44['approved1'];
$comment442 = $result44['comment2'];
$approved442 = $result44['approved2'];

$query45 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3,
	comment4,approved4,
	comment5,approved5,
	comment6,approved6
	FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=5");
$query45->bindParam(1, $user_id);
$query45->bindParam(2, $year);
$query45->execute();
$result45 = $query45->fetch(PDO::FETCH_ASSOC);
$remarks45 = $result45['remarks'];
$area_points45 = $result45['area_points'];
$comment451 = $result45['comment1'];
$approved451 = $result45['approved1'];
$comment452 = $result45['comment2'];
$approved452 = $result45['approved2'];
$comment453 = $result45['comment3'];
$approved453 = $result45['approved3'];
$comment454 = $result45['comment4'];
$approved454 = $result45['approved4'];
$comment455 = $result45['comment5'];
$approved455 = $result45['approved5'];
$comment456 = $result45['comment6'];
$approved456 = $result45['approved6'];

$query46 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1 
	FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=6");
$query46->bindParam(1, $user_id);
$query46->bindParam(2, $year);
$query46->execute();
$result46 = $query46->fetch(PDO::FETCH_ASSOC);
$remarks46 = $result46['remarks'];
$area_points46 = $result46['area_points'];
$comment461 = $result46['comment1'];
$approved461 = $result46['approved1'];

$query47 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1 
	FROM area_assessment_points where user_id=? and year_=? and area_number=4 and under_area=7");
$query47->bindParam(1, $user_id);
$query47->bindParam(2, $year);
$query47->execute();
$result47 = $query47->fetch(PDO::FETCH_ASSOC);
$remarks47 = $result47['remarks'];
$area_points47 = $result47['area_points'];
$comment471 = $result47['comment1'];
$approved471 = $result47['approved1'];

$query51 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1 
	FROM area_assessment_points where user_id=? and year_=? and area_number=5 and under_area=1");
$query51->bindParam(1, $user_id);
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
$query52->bindParam(1, $user_id);
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
$query53->bindParam(1, $user_id);
$query53->bindParam(2, $year);
$query53->execute();
$result53 = $query53->fetch(PDO::FETCH_ASSOC);
$remarks53 = $result53['remarks'];
$area_points53 = $result53['area_points'];
$comment531 = $result53['comment1'];
$approved531 = $result53['approved1'];

$query61 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3,
	comment4,approved4
	FROM area_assessment_points where user_id=? and year_=? and area_number=6 and under_area=1");
$query61->bindParam(1, $user_id);
$query61->bindParam(2, $year);
$query61->execute();
$result61 = $query61->fetch(PDO::FETCH_ASSOC);
$remarks61 = $result61['remarks'];
$area_points61 = $result61['area_points'];
$comment611 = $result61['comment1'];
$approved611 = $result61['approved1'];
$comment612 = $result61['comment2'];
$approved612 = $result61['approved2'];
$comment613 = $result61['comment3'];
$approved613 = $result61['approved3'];
$comment614 = $result61['comment4'];
$approved614 = $result61['approved4'];

$query62 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1,
	comment2,approved2,
	comment3,approved3,
	comment4,approved4,
	comment5,approved5,
	comment6,approved6
	FROM area_assessment_points where user_id=? and year_=? and area_number=6 and under_area=2");
$query62->bindParam(1, $user_id);
$query62->bindParam(2, $year);
$query62->execute();
$result62 = $query62->fetch(PDO::FETCH_ASSOC);
$remarks62 = $result62['remarks'];
$area_points62 = $result62['area_points'];
$comment621 = $result62['comment1'];
$approved621 = $result62['approved1'];
$comment622 = $result62['comment2'];
$approved622 = $result62['approved2'];
$comment623 = $result62['comment3'];
$approved623 = $result62['approved3'];
$comment624 = $result62['comment4'];
$approved624 = $result62['approved4'];
$comment625 = $result62['comment5'];
$approved625 = $result62['approved5'];
$comment626 = $result62['comment6'];
$approved626 = $result62['approved6'];

$query63 = $dbconn->prepare("SELECT remarks,area_points,
	comment1,approved1 
	FROM area_assessment_points where user_id=? and year_=? and area_number=6 and under_area=3");
$query63->bindParam(1, $user_id);
$query63->bindParam(2, $year);
$query63->execute();
$result63 = $query63->fetch(PDO::FETCH_ASSOC);
$remarks63 = $result63['remarks'];
$area_points63 = $result63['area_points'];
$comment631 = $result63['comment1'];
$approved631 = $result63['approved1'];

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
                    <th class="text-center" style="width: 250px;">Actions</th>
                    <th class="text-center" style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
            	<tr>
            		<td>BFDP Monitoring Form A of the DILG dated March 25, 2023</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal" onclick="generateFileLink()">
                            View Attachment
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
                                    <label for="comment">Attached File:</label>
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
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal112" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal112" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
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
                                    <div class="form-group mt-3">
                                        <label for="comment112">Your Comment:</label>
                                        <textarea class="form-control" id="comment112" rows="3"><?php if (!empty($comment2)): ?><?php echo $comment2 ?><?php endif ?></textarea>
                                        <span id="alert112"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,1,2,comment112.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,1,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,1,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal113" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal113" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
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
                                    <div class="form-group mt-3">
                                        <label for="comment113">Your Comment:</label>
                                        <textarea class="form-control" id="comment113" rows="3"><?php if (!empty($comment3)): ?><?php echo $comment3 ?><?php endif ?></textarea>
                                        <span id="alert113"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,1,3,comment113.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,1,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,1,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <td style="margin-left: 40px;">Barangay Budget</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal114" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal114" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename4 = $user_id.$year.'file4.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename4)) { ?>
                                                    <a href="<?php echo $filePath.$filename4 ?>" target="_blank"><?php echo $filename4 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment114">Your Comment:</label>
                                        <textarea class="form-control" id="comment114" rows="3"><?php if (!empty($comment4)): ?><?php echo $comment4 ?><?php endif ?></textarea>
                                        <span id="alert114"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,1,4,comment114.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,1,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,1,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <td style="margin-left: 40px;">Summary of Income and Expenditures;</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal115" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal115" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename5 = $user_id.$year.'file5.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename5)) { ?>
                                                    <a href="<?php echo $filePath.$filename5 ?>" target="_blank"><?php echo $filename5 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment115">Your Comment:</label>
                                        <textarea class="form-control" id="comment115" rows="3"><?php if (!empty($comment5)): ?><?php echo $comment5 ?><?php endif ?></textarea>
                                        <span id="alert115"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,1,5,comment115.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,1,5,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,1,5,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <td style="margin-left: 40px;">20% Component of the IRA Utilization;</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal116" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal116" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename6 = $user_id.$year.'file6.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename6)) { ?>
                                                    <a href="<?php echo $filePath.$filename6 ?>" target="_blank"><?php echo $filename6 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment116">Your Comment:</label>
                                        <textarea class="form-control" id="comment116" rows="3"><?php if (!empty($comment6)): ?><?php echo $comment6 ?><?php endif ?></textarea>
                                        <span id="alert116"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,1,6,comment116.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,1,6,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,1,6,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <td style="margin-left: 40px;">Annual Procurement Plan or Procurement List</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal117" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal117" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename7 = $user_id.$year.'file7.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename7)) { ?>
                                                    <a href="<?php echo $filePath.$filename7 ?>" target="_blank"><?php echo $filename7 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment117">Your Comment:</label>
                                        <textarea class="form-control" id="comment117" rows="3"><?php if (!empty($comment7)): ?><?php echo $comment7 ?><?php endif ?></textarea>
                                        <span id="alert117"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,1,7,comment117.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,1,7,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,1,7,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal118" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal118" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename8 = $user_id.$year.'file8.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename8)) { ?>
                                                    <a href="<?php echo $filePath.$filename8 ?>" target="_blank"><?php echo $filename8 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment118">Your Comment:</label>
                                        <textarea class="form-control" id="comment118" rows="3"><?php if (!empty($comment8)): ?><?php echo $comment8 ?><?php endif ?></textarea>
                                        <span id="alert118"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,1,8,comment118.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,1,8,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,1,8,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal119" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal119" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename9 = $user_id.$year.'file9.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename9)) { ?>
                                                    <a href="<?php echo $filePath.$filename9 ?>" target="_blank"><?php echo $filename9 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment119">Your Comment:</label>
                                        <textarea class="form-control" id="comment119" rows="3"><?php if (!empty($comment9)): ?><?php echo $comment9 ?><?php endif ?></textarea>
                                        <span id="alert119"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,1,9,comment119.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,1,9,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,1,9,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal1110" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal1110" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename10 = $user_id.$year.'file10.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename10)) { ?>
                                                    <a href="<?php echo $filePath.$filename10 ?>" target="_blank"><?php echo $filename10 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment1110">Your Comment:</label>
                                        <textarea class="form-control" id="comment1110" rows="3"><?php if (!empty($comment10)): ?><?php echo $comment10 ?><?php endif ?></textarea>
                                        <span id="alert1110"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,1,10,comment1110.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,1,10,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,1,10,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
            </tbody>
        </table>
        <!-- <div class="row">
            <div class="col-lg-9">
                <input type="text" placeholder="Input Remarks..." name="" class="form-control" id="remarks1" value="">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-danger" onclick="btn_app(2)">Disapproved</button>
                <button class="btn btn-success" onclick="btn_app(1)"> Approved </button>
            </div>
        </div>
        <input type="text" placeholder="Input Remarks..." name="" class="form-control" value="<?php echo $key ?>" id="keyctr1" hidden> -->
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Barangay Budget Preparation Form 2 of 2022 and 2023</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal121" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal121" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename11 = $user_id.$year.'file11.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename11)) { ?>
                                                    <a href="<?php echo $filePath.$filename11 ?>" target="_blank"><?php echo $filename11 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment121">Your Comment:</label>
                                        <textarea class="form-control" id="comment121" rows="3"><?php if (!empty($comment121)): ?><?php echo $comment121 ?><?php endif ?></textarea>
                                        <span id="alert121"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,2,1,comment121.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,2,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,2,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved Barangay Appropriation Ordinance</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal131" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal131" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename12 = $user_id.$year.'file12.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename12)) { ?>
                                                    <a href="<?php echo $filePath.$filename12 ?>" target="_blank"><?php echo $filename12 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment131">Your Comment:</label>
                                        <textarea class="form-control" id="comment131" rows="3"><?php if (!empty($comment131)): ?><?php echo $comment131 ?><?php endif ?></textarea>
                                        <span id="alert131"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,3,1,comment131.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,3,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,3,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved Barangay Appropriation Ordinance</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal141" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal141" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename13 = $user_id.$year.'file13.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename13)) { ?>
                                                    <a href="<?php echo $filePath.$filename13 ?>" target="_blank"><?php echo $filename13 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment141">Your Comment:</label>
                                        <textarea class="form-control" id="comment141" rows="3"><?php if (!empty($comment141)): ?><?php echo $comment141 ?><?php endif ?></textarea>
                                        <span id="alert141"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,4,1,comment141.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,4,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,4,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo document of the Barangay CitCha (name of the Barangay should be visible)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal151" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal151" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename14 = $user_id.$year.'file14.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename14)) { ?>
                                                    <a href="<?php echo $filePath.$filename14 ?>" target="_blank"><?php echo $filename14 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment151">Your Comment:</label>
                                        <textarea class="form-control" id="comment151" rows="3"><?php if (!empty($comment151)): ?><?php echo $comment151 ?><?php endif ?></textarea>
                                        <span id="alert151"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,5,1,comment151.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,5,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,5,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>MOVs for 1.6.1.1 a.) Copy of the written agreement; and</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal161" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal161" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename15 = $user_id.$year.'file15.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename15)) { ?>
                                                    <a href="<?php echo $filePath.$filename15 ?>" target="_blank"><?php echo $filename15 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment161">Your Comment:</label>
                                        <textarea class="form-control" id="comment161" rows="3"><?php if (!empty($comment161)): ?><?php echo $comment161 ?><?php endif ?></textarea>
                                        <span id="alert161"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,6,1,comment161.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,6,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,6,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <td>MOVs for 1.6.1.1 b.) Proof of deposit reflecting the Account No./ Name of Barangay SK (1 deposit slip for annual, 2 deposit slips for semestral, 4 deposit slips for quarterly)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal162" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal162" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename16 = $user_id.$year.'file16.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename16)) { ?>
                                                    <a href="<?php echo $filePath.$filename16 ?>" target="_blank"><?php echo $filename16 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment162">Your Comment:</label>
                                        <textarea class="form-control" id="comment162" rows="3"><?php if (!empty($comment162)): ?><?php echo $comment162 ?><?php endif ?></textarea>
                                        <span id="alert162"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,6,2,comment162.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,6,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,6,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <td>MOVs for 1.6.1.2 a.) 12 Monthly deposit slips reflecting the Account No. / Name of Barangay SK</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal163" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal163" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename17 = $user_id.$year.'file17.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename17)) { ?>
                                                    <a href="<?php echo $filePath.$filename17 ?>" target="_blank"><?php echo $filename17 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment163">Your Comment:</label>
                                        <textarea class="form-control" id="comment163" rows="3"><?php if (!empty($comment163)): ?><?php echo $comment163 ?><?php endif ?></textarea>
                                        <span id="alert163"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,6,3,comment163.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,6,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,6,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <td>MOVs for 1.6.1.3 a.) Proof of transfer of the 10% SK fund to the trust fund of the Barangay such as deposit slip or Official Receipt or correspanding legal form/document issued by the municipal treasurer if the Barangay opted that the corresponding SK fund be kept as trust fund in the custody of the C/M treasurer.</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal164" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal164" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename18 = $user_id.$year.'file18.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename18)) { ?>
                                                    <a href="<?php echo $filePath.$filename18 ?>" target="_blank"><?php echo $filename18 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment164">Your Comment:</label>
                                        <textarea class="form-control" id="comment164" rows="3"><?php if (!empty($comment164)): ?><?php echo $comment164 ?><?php endif ?></textarea>
                                        <span id="alert164"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,6,4,comment164.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,6,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,6,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
            </tbody>
        </table>
    </div>
    <div class="table-responsive mt-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 1.6.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>MOVs for 1.6.2 Certification from the C/MLGOO on current number of SK officials</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal165" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal165" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename19 = $user_id.$year.'file19.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename19)) { ?>
                                                    <a href="<?php echo $filePath.$filename19 ?>" target="_blank"><?php echo $filename19 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment165">Your Comment:</label>
                                        <textarea class="form-control" id="comment165" rows="3"><?php if (!empty($comment165)): ?><?php echo $comment165 ?><?php endif ?></textarea>
                                        <span id="alert165"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,6,5,comment165.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,6,5,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,6,5,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <td>MOVs for 1.6.2 Approved Annual Barangay Youth Investment Program (ABYIP) for 2023</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal166" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal166" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename20 = $user_id.$year.'file20.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename20)) { ?>
                                                    <a href="<?php echo $filePath.$filename20 ?>" target="_blank"><?php echo $filename20 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment166">Your Comment:</label>
                                        <textarea class="form-control" id="comment166" rows="3"><?php if (!empty($comment166)): ?><?php echo $comment166 ?><?php endif ?></textarea>
                                        <span id="alert166"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,6,6,comment166.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,6,6,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,6,6,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Post Activity Report on the conduct of the wnd semester Barangay assembly duly signed/approved by the Punong Barangay (Annex D of DILG MC No.2022-131)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal171" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal171" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload/uploaded/'; 
                                                    $filename21 = $user_id.$year.'file21.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename21)) { ?>
                                                    <a href="<?php echo $filePath.$filename21 ?>" target="_blank"><?php echo $filename21 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment171">Your Comment:</label>
                                        <textarea class="form-control" id="comment171" rows="3"><?php if (!empty($comment171)): ?><?php echo $comment171 ?><?php endif ?></textarea>
                                        <span id="alert171"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(1,7,1,comment171.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(1,7,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(1,7,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
            </tbody>
        </table>
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Executive Order or similar issuance creating the BDRRMC compliant to composition requirements covering CY 2023.</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal211" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal211" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename211 = $user_id.$year.'file211.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename211)) { ?>
                                                    <a href="<?php echo $filePath.$filename211 ?>" target="_blank"><?php echo $filename211 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment211">Your Comment:</label>
                                        <textarea class="form-control" id="comment211" rows="3"><?php if (!empty($comment211)): ?><?php echo $comment211 ?><?php endif ?></textarea>
                                        <span id="alert211"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(2,1,1,comment211.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(2,1,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(2,1,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved211)){ ?>
                    		<?php if ($approved211 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename211)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 2.1.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved BDRRM Plan CY 2023</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal212" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal212" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename212 = $user_id.$year.'file212.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename212)) { ?>
                                                    <a href="<?php echo $filePath.$filename212 ?>" target="_blank"><?php echo $filename212 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment212">Your Comment:</label>
                                        <textarea class="form-control" id="comment212" rows="3"><?php if (!empty($comment212)): ?><?php echo $comment212 ?><?php endif ?></textarea>
                                        <span id="alert212"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(2,1,2,comment212.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(2,1,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(2,1,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved212)){ ?>
                    		<?php if ($approved212 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename212)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 2.1.3</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Enacted Appropriation Ordinance</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal213" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal213" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename213 = $user_id.$year.'file213.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename213)) { ?>
                                                    <a href="<?php echo $filePath.$filename213 ?>" target="_blank"><?php echo $filename213 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment213">Your Comment:</label>
                                        <textarea class="form-control" id="comment213" rows="3"><?php if (!empty($comment213)): ?><?php echo $comment213 ?><?php endif ?></textarea>
                                        <span id="alert213"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(2,1,3,comment213.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(2,1,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(2,1,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved213)){ ?>
                    		<?php if ($approved213 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename213)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 2.1.4</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Accomplishment Report</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal214" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal214" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename214 = $user_id.$year.'file214.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename214)) { ?>
                                                    <a href="<?php echo $filePath.$filename214 ?>" target="_blank"><?php echo $filename214 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment214">Your Comment:</label>
                                        <textarea class="form-control" id="comment214" rows="3"><?php if (!empty($comment214)): ?><?php echo $comment214 ?><?php endif ?></textarea>
                                        <span id="alert214"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(2,1,4,comment214.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(2,1,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(2,1,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved214)){ ?>
                    		<?php if ($approved214 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename214)) { ?>
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
                    <td>Annual Report on the utilization of the LDRRMF</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal215" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal215" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename215 = $user_id.$year.'file215.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename215)) { ?>
                                                    <a href="<?php echo $filePath.$filename215 ?>" target="_blank"><?php echo $filename215 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment215">Your Comment:</label>
                                        <textarea class="form-control" id="comment215" rows="3"><?php if (!empty($comment215)): ?><?php echo $comment215 ?><?php endif ?></textarea>
                                        <span id="alert215"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(2,1,5,comment215.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(2,1,5,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(2,1,5,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved215)){ ?>
                    		<?php if ($approved215 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename215)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>2.2 Extend of Risk Assessment and Early Warning System (EWS)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 2.2.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Post-Activity Report of activities such as Climate and Disaster Risk Assessment, Participatory Disaster Risk Assessment, BDRRM Planning, etc.</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal221" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal221" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename216 = $user_id.$year.'file216.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename216)) { ?>
                                                    <a href="<?php echo $filePath.$filename216 ?>" target="_blank"><?php echo $filename216 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment221">Your Comment:</label>
                                        <textarea class="form-control" id="comment221" rows="3"><?php if (!empty($comment221)): ?><?php echo $comment221 ?><?php endif ?></textarea>
                                        <span id="alert221"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(2,2,1,comment221.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(2,2,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(2,2,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved221)){ ?>
                    		<?php if ($approved221 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename216)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 2.2.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo documentation of the certified Barangay Risk/Hazzard Map</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal222" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal222" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename217 = $user_id.$year.'file217.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename217)) { ?>
                                                    <a href="<?php echo $filePath.$filename217 ?>" target="_blank"><?php echo $filename217 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment222">Your Comment:</label>
                                        <textarea class="form-control" id="comment222" rows="3"><?php if (!empty($comment222)): ?><?php echo $comment222 ?><?php endif ?></textarea>
                                        <span id="alert222"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(2,2,2,comment222.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(2,2,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(2,2,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved222)){ ?>
                    		<?php if ($approved222 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename217)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 2.2.3</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo documentation of EWS for the top two (2) hazards in the Barangay</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal223" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal223" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename218 = $user_id.$year.'file218.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename218)) { ?>
                                                    <a href="<?php echo $filePath.$filename218 ?>" target="_blank"><?php echo $filename218 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment223">Your Comment:</label>
                                        <textarea class="form-control" id="comment223" rows="3"><?php if (!empty($comment223)): ?><?php echo $comment223 ?><?php endif ?></textarea>
                                        <span id="alert223"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(2,2,3,comment223.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(2,2,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(2,2,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved223)){ ?>
                    		<?php if ($approved223 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename218)) { ?>
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
            </tbody>
        </table>
    </div>
</div>
<div class="card-body" id="viewLocation">
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>2.3 Extend of Preparedness For Effective Response And Recovery</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 2.3.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo Documentation of the permanent/alternate evacuation center</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal231" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal231" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename219 = $user_id.$year.'file219.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename219)) { ?>
                                                    <a href="<?php echo $filePath.$filename219 ?>" target="_blank"><?php echo $filename219 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment231">Your Comment:</label>
                                        <textarea class="form-control" id="comment231" rows="3"><?php if (!empty($comment231)): ?><?php echo $comment231 ?><?php endif ?></textarea>
                                        <span id="alert231"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(2,3,1,comment231.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(2,3,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(2,3,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved231)){ ?>
                    		<?php if ($approved231 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename219)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 2.3.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo Documentation of disaster supplies equipment</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal232" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal232" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload2/uploaded/'; 
                                                    $filename220 = $user_id.$year.'file220.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename220)) { ?>
                                                    <a href="<?php echo $filePath.$filename220 ?>" target="_blank"><?php echo $filename220 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment232">Your Comment:</label>
                                        <textarea class="form-control" id="comment232" rows="3"><?php if (!empty($comment232)): ?><?php echo $comment232 ?><?php endif ?></textarea>
                                        <span id="alert232"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(2,3,2,comment232.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(2,3,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(2,3,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved232)){ ?>
                    		<?php if ($approved232 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename220)) { ?>
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
            </tbody>
        </table>
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Executive Order or similar issuance creating the BADAC with its composition and appropriate committees (Committees on Operations and on Advocacy)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal311" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal311" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename311 = $user_id.$year.'file311.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename311)) { ?>
                                                    <a href="<?php echo $filePath.$filename311 ?>" target="_blank"><?php echo $filename311 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment311">Your Comment:</label>
                                        <textarea class="form-control" id="comment311" rows="3"><?php if (!empty($comment311)): ?><?php echo $comment311 ?><?php endif ?></textarea>
                                        <span id="alert311"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,1,1,comment311.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,1,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,1,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved311)){ ?>
                    		<?php if ($approved311 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename311)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.1.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance establishing the Rehabilitation Referral Desk</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal312" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal312" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename312 = $user_id.$year.'file312.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename312)) { ?>
                                                    <a href="<?php echo $filePath.$filename312 ?>" target="_blank"><?php echo $filename312 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment312">Your Comment:</label>
                                        <textarea class="form-control" id="comment312" rows="3"><?php if (!empty($comment312)): ?><?php echo $comment312 ?><?php endif ?></textarea>
                                        <span id="alert312"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,1,2,comment312.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,1,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,1,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved312)){ ?>
                    		<?php if ($approved312 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename312)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.1.3</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved Barangay Appropriation Ordinance</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal313" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal313" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename313 = $user_id.$year.'file313.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename313)) { ?>
                                                    <a href="<?php echo $filePath.$filename313 ?>" target="_blank"><?php echo $filename313 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment313">Your Comment:</label>
                                        <textarea class="form-control" id="comment313" rows="3"><?php if (!empty($comment313)): ?><?php echo $comment313 ?><?php endif ?></textarea>
                                        <span id="alert313"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,1,3,comment313.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,1,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,1,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved313)){ ?>
                    		<?php if ($approved313 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename313)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.1.4</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved BADAC Plan of Action</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal314" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal314" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename314 = $user_id.$year.'file314.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename314)) { ?>
                                                    <a href="<?php echo $filePath.$filename314 ?>" target="_blank"><?php echo $filename314 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment314">Your Comment:</label>
                                        <textarea class="form-control" id="comment314" rows="3"><?php if (!empty($comment314)): ?><?php echo $comment314 ?><?php endif ?></textarea>
                                        <span id="alert314"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,1,4,comment314.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,1,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,1,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved314)){ ?>
                    		<?php if ($approved314 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename314)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.1.5</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Transmittal of CIR (stamp received) to CADAC/MADAC and Local PNP Unit</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal315" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal315" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename315 = $user_id.$year.'file315.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename315)) { ?>
                                                    <a href="<?php echo $filePath.$filename315 ?>" target="_blank"><?php echo $filename315 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment315">Your Comment:</label>
                                        <textarea class="form-control" id="comment315" rows="3"><?php if (!empty($comment315)): ?><?php echo $comment315 ?><?php endif ?></textarea>
                                        <span id="alert315"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,1,5,comment315.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,1,5,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,1,5,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved315)){ ?>
                    		<?php if ($approved315 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename315)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.1.6</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Annual BADAC Accomplishment and Fund Utilization Report submitted not later than the 20th day of January (stamp received) to the CADAC/MADAC</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal316" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal316" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename316 = $user_id.$year.'file316.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename316)) { ?>
                                                    <a href="<?php echo $filePath.$filename316 ?>" target="_blank"><?php echo $filename316 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment316">Your Comment:</label>
                                        <textarea class="form-control" id="comment316" rows="3"><?php if (!empty($comment316)): ?><?php echo $comment316 ?><?php endif ?></textarea>
                                        <span id="alert316"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,1,6,comment316.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,1,6,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,1,6,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved316)){ ?>
                    		<?php if ($approved316 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename316)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.2 Functionality of the Barangay Peace and Order Committee (BPOC)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.2.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Executive Order or similar issuance indicating correct membership on accordance to the EO 366 s. of 1996</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal321" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal321" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename317 = $user_id.$year.'file317.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename317)) { ?>
                                                    <a href="<?php echo $filePath.$filename317 ?>" target="_blank"><?php echo $filename317 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment321">Your Comment:</label>
                                        <textarea class="form-control" id="comment321" rows="3"><?php if (!empty($comment321)): ?><?php echo $comment321 ?><?php endif ?></textarea>
                                        <span id="alert321"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,2,1,comment321.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,2,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,2,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved321)){ ?>
                    		<?php if ($approved321 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename317)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.2.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved BPOPS Plan</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal322" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal322" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename318 = $user_id.$year.'file318.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename318)) { ?>
                                                    <a href="<?php echo $filePath.$filename318 ?>" target="_blank"><?php echo $filename318 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment322">Your Comment:</label>
                                        <textarea class="form-control" id="comment322" rows="3"><?php if (!empty($comment322)): ?><?php echo $comment322 ?><?php endif ?></textarea>
                                        <span id="alert322"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,2,2,comment322.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,2,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,2,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved322)){ ?>
                    		<?php if ($approved322 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename318)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.2.3</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Accomplishment Report (in any format) Submitted to the C/M POC on the prescribed schedules (stamp received)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal323" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal323" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename319 = $user_id.$year.'file319.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename319)) { ?>
                                                    <a href="<?php echo $filePath.$filename319 ?>" target="_blank"><?php echo $filename319 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment323">Your Comment:</label>
                                        <textarea class="form-control" id="comment323" rows="3"><?php if (!empty($comment323)): ?><?php echo $comment323 ?><?php endif ?></textarea>
                                        <span id="alert323"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,2,3,comment323.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,2,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,2,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved323)){ ?>
                    		<?php if ($approved323 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename319)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.3 Functionality of the Lupong Tagapamayapa (LT)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.3.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Appointment of the Lupong Tagapamayapa</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal331" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal331" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename320 = $user_id.$year.'file320.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename320)) { ?>
                                                    <a href="<?php echo $filePath.$filename320 ?>" target="_blank"><?php echo $filename320 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment331">Your Comment:</label>
                                        <textarea class="form-control" id="comment331" rows="3"><?php if (!empty($comment331)): ?><?php echo $comment331 ?><?php endif ?></textarea>
                                        <span id="alert331"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,3,1,comment331.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,3,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,3,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved331)){ ?>
                    		<?php if ($approved331 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename320)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.3.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>For Barangay of cities: 2 photo with caption of the computer database with searchable information</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal332" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal332" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename321 = $user_id.$year.'file321.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename321)) { ?>
                                                    <a href="<?php echo $filePath.$filename321 ?>" target="_blank"><?php echo $filename321 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment332">Your Comment:</label>
                                        <textarea class="form-control" id="comment332" rows="3"><?php if (!empty($comment332)): ?><?php echo $comment332 ?><?php endif ?></textarea>
                                        <span id="alert332"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,3,2,comment332.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,3,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,3,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved332)){ ?>
                    		<?php if ($approved332 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename321)) { ?>
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
                    <td>For Barangay of municipalities : 1 photo, with caption on the manual and digital file</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal333" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal333" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename322 = $user_id.$year.'file322.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename322)) { ?>
                                                    <a href="<?php echo $filePath.$filename322 ?>" target="_blank"><?php echo $filename322 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment333">Your Comment:</label>
                                        <textarea class="form-control" id="comment333" rows="3"><?php if (!empty($comment333)): ?><?php echo $comment333 ?><?php endif ?></textarea>
                                        <span id="alert333"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,3,3,comment333.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,3,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,3,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved333)){ ?>
                    		<?php if ($approved333 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename322)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.3.3</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Copies of minutes of meetings with attendance sheets (at least 3 minutes covering meetings conducted in 2023)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal334" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal334" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename323 = $user_id.$year.'file323.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename323)) { ?>
                                                    <a href="<?php echo $filePath.$filename323 ?>" target="_blank"><?php echo $filename323 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment334">Your Comment:</label>
                                        <textarea class="form-control" id="comment334" rows="3"><?php if (!empty($comment334)): ?><?php echo $comment334 ?><?php endif ?></textarea>
                                        <span id="alert334"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,3,4,comment334.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,3,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,3,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved334)){ ?>
                    		<?php if ($approved334 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename323)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.3.4</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal335" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal335" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename324 = $user_id.$year.'file324.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename324)) { ?>
                                                    <a href="<?php echo $filePath.$filename324 ?>" target="_blank"><?php echo $filename324 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment335">Your Comment:</label>
                                        <textarea class="form-control" id="comment335" rows="3"><?php if (!empty($comment335)): ?><?php echo $comment335 ?><?php endif ?></textarea>
                                        <span id="alert335"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,3,5,comment335.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,3,5,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,3,5,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved335)){ ?>
                    		<?php if ($approved335 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename324)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.4 Organization and Strengthening Capacities of Barangay Tanod</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.4.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance on the organization of the Barangay Tanod covering 2023</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal341" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal341" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename325 = $user_id.$year.'file325.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename325)) { ?>
                                                    <a href="<?php echo $filePath.$filename325 ?>" target="_blank"><?php echo $filename325 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment341">Your Comment:</label>
                                        <textarea class="form-control" id="comment341" rows="3"><?php if (!empty($comment341)): ?><?php echo $comment341 ?><?php endif ?></textarea>
                                        <span id="alert341"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,4,1,comment341.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,4,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,4,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved341)){ ?>
                    		<?php if ($approved341 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename325)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.4.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal342" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal342" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename326 = $user_id.$year.'file326.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename326)) { ?>
                                                    <a href="<?php echo $filePath.$filename326 ?>" target="_blank"><?php echo $filename326 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment342">Your Comment:</label>
                                        <textarea class="form-control" id="comment342" rows="3"><?php if (!empty($comment342)): ?><?php echo $comment342 ?><?php endif ?></textarea>
                                        <span id="alert342"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,4,2,comment342.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,4,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,4,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved342)){ ?>
                    		<?php if ($approved342 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename326)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.5 Barangay Initiatives During Health Emergencies</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.5.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance on the organization of BHERTs</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal351" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal351" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename327 = $user_id.$year.'file327.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename327)) { ?>
                                                    <a href="<?php echo $filePath.$filename327 ?>" target="_blank"><?php echo $filename327 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment351">Your Comment:</label>
                                        <textarea class="form-control" id="comment351" rows="3"><?php if (!empty($comment351)): ?><?php echo $comment351 ?><?php endif ?></textarea>
                                        <span id="alert351"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,5,1,comment351.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,5,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,5,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved351)){ ?>
                    		<?php if ($approved351 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename327)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.5.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo documentation of poster and/or tarpulin</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal352" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal352" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename328 = $user_id.$year.'file328.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename328)) { ?>
                                                    <a href="<?php echo $filePath.$filename328 ?>" target="_blank"><?php echo $filename328 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment352">Your Comment:</label>
                                        <textarea class="form-control" id="comment352" rows="3"><?php if (!empty($comment352)): ?><?php echo $comment352 ?><?php endif ?></textarea>
                                        <span id="alert352"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,5,2,comment352.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,5,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,5,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved352)){ ?>
                    		<?php if ($approved352 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename328)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>3.6 Conduct of Monthly Barangay Road Clearing Operations (BaRCO)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 3.6.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Monthly BarCo Reports for October-December 2023</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal361" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal361" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload3/uploaded/'; 
                                                    $filename329 = $user_id.$year.'file329.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename329)) { ?>
                                                    <a href="<?php echo $filePath.$filename329 ?>" target="_blank"><?php echo $filename329 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment361">Your Comment:</label>
                                        <textarea class="form-control" id="comment361" rows="3"><?php if (!empty($comment361)): ?><?php echo $comment361 ?><?php endif ?></textarea>
                                        <span id="alert361"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(3,6,1,comment361.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(3,6,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(3,6,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved361)){ ?>
                    		<?php if ($approved361 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename329)) { ?>
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
            </tbody>
        </table>
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Executive Order or similar issuance on the establishment of the Barangay VAW Desk and designated VAW Desk Officer</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal411" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal411" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename411 = $user_id.$year.'file411.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename411)) { ?>
                                                    <a href="<?php echo $filePath.$filename411 ?>" target="_blank"><?php echo $filename411 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment411">Your Comment:</label>
                                        <textarea class="form-control" id="comment411" rows="3"><?php if (!empty($comment411)): ?><?php echo $comment411 ?><?php endif ?></textarea>
                                        <span id="alert411"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,1,1,comment411.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,1,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,1,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved411)){ ?>
                    		<?php if ($approved411 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename411)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.1.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal412" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal412" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename412 = $user_id.$year.'file412.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename412)) { ?>
                                                    <a href="<?php echo $filePath.$filename412 ?>" target="_blank"><?php echo $filename412 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment412">Your Comment:</label>
                                        <textarea class="form-control" id="comment412" rows="3"><?php if (!empty($comment412)): ?><?php echo $comment412 ?><?php endif ?></textarea>
                                        <span id="alert412"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,1,2,comment412.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,1,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,1,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved412)){ ?>
                    		<?php if ($approved412 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename412)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.1.3</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved 2023 Barangay Gender and Development (GAD) Plan and Budget</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal413" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal413" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename413 = $user_id.$year.'file413.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename413)) { ?>
                                                    <a href="<?php echo $filePath.$filename413 ?>" target="_blank"><?php echo $filename413 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment413">Your Comment:</label>
                                        <textarea class="form-control" id="comment413" rows="3"><?php if (!empty($comment413)): ?><?php echo $comment413 ?><?php endif ?></textarea>
                                        <span id="alert413"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,1,3,comment413.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,1,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,1,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved413)){ ?>
                    		<?php if ($approved413 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename413)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.1.4</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Monthly Accomplishment Reports for CY 2023 (October-December 2023)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal414" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal414" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename414 = $user_id.$year.'file414.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename414)) { ?>
                                                    <a href="<?php echo $filePath.$filename414 ?>" target="_blank"><?php echo $filename414 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment414">Your Comment:</label>
                                        <textarea class="form-control" id="comment414" rows="3"><?php if (!empty($comment414)): ?><?php echo $comment414 ?><?php endif ?></textarea>
                                        <span id="alert414"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,1,4,comment414.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,1,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,1,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved414)){ ?>
                    		<?php if ($approved414 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename414)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.1.5</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Updated database on VAW cases reported to the Barangay</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal415" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal415" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename415 = $user_id.$year.'file415.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename415)) { ?>
                                                    <a href="<?php echo $filePath.$filename415 ?>" target="_blank"><?php echo $filename415 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment415">Your Comment:</label>
                                        <textarea class="form-control" id="comment415" rows="3"><?php if (!empty($comment415)): ?><?php echo $comment415 ?><?php endif ?></textarea>
                                        <span id="alert415"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,1,5,comment415.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,1,5,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,1,5,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved415)){ ?>
                    		<?php if ($approved415 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename415)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.1.6</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CY 2023 GAD Accomplishment Report</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal416" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal416" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename416 = $user_id.$year.'file416.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename416)) { ?>
                                                    <a href="<?php echo $filePath.$filename416 ?>" target="_blank"><?php echo $filename416 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment416">Your Comment:</label>
                                        <textarea class="form-control" id="comment416" rows="3"><?php if (!empty($comment416)): ?><?php echo $comment416 ?><?php endif ?></textarea>
                                        <span id="alert416"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,1,6,comment416.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,1,6,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,1,6,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved416)){ ?>
                    		<?php if ($approved416 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename416)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.2 Access to Health and Social Welfare Services in the Barangay</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.2.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo documentation of the BHS/C</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal421" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal421" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename417 = $user_id.$year.'file417.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename417)) { ?>
                                                    <a href="<?php echo $filePath.$filename417 ?>" target="_blank"><?php echo $filename417 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment421">Your Comment:</label>
                                        <textarea class="form-control" id="comment421" rows="3"><?php if (!empty($comment421)): ?><?php echo $comment421 ?><?php endif ?></textarea>
                                        <span id="alert421"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,2,1,comment421.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,2,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,2,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved421)){ ?>
                    		<?php if ($approved421 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename417)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.2.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance on the appointment of BHW</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal422" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal422" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename418 = $user_id.$year.'file418.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename418)) { ?>
                                                    <a href="<?php echo $filePath.$filename418 ?>" target="_blank"><?php echo $filename418 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment422">Your Comment:</label>
                                        <textarea class="form-control" id="comment422" rows="3"><?php if (!empty($comment422)): ?><?php echo $comment422 ?><?php endif ?></textarea>
                                        <span id="alert422"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,2,2,comment422.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,2,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,2,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved422)){ ?>
                    		<?php if ($approved422 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename418)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.2.3</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance on the appointment of BNS</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal423" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal423" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename419 = $user_id.$year.'file419.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename419)) { ?>
                                                    <a href="<?php echo $filePath.$filename419 ?>" target="_blank"><?php echo $filename419 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment423">Your Comment:</label>
                                        <textarea class="form-control" id="comment423" rows="3"><?php if (!empty($comment423)): ?><?php echo $comment423 ?><?php endif ?></textarea>
                                        <span id="alert423"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,2,3,comment423.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,2,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,2,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved423)){ ?>
                    		<?php if ($approved423 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename419)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.2.4</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo documentations of the operations of the BHS/C</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal424" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal424" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename420 = $user_id.$year.'file420.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename420)) { ?>
                                                    <a href="<?php echo $filePath.$filename420 ?>" target="_blank"><?php echo $filename420 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment424">Your Comment:</label>
                                        <textarea class="form-control" id="comment424" rows="3"><?php if (!empty($comment424)): ?><?php echo $comment424 ?><?php endif ?></textarea>
                                        <span id="alert424"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,2,4,comment424.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,2,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,2,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved424)){ ?>
                    		<?php if ($approved424 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename420)) { ?>
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
                    <td>Barangay Issuances on the provision of health services</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal425" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal425" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename421 = $user_id.$year.'file421.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename421)) { ?>
                                                    <a href="<?php echo $filePath.$filename421 ?>" target="_blank"><?php echo $filename421 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment425">Your Comment:</label>
                                        <textarea class="form-control" id="comment425" rows="3"><?php if (!empty($comment425)): ?><?php echo $comment425 ?><?php endif ?></textarea>
                                        <span id="alert425"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,2,5,comment425.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,2,5,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,2,5,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved425)){ ?>
                    		<?php if ($approved425 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename421)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.3 Functionality of the Barangay Development Council (BDC)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.3.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance organizing the BDC with its composition compliant to Section 107 of RA 7160</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal431" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal431" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename422 = $user_id.$year.'file422.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename422)) { ?>
                                                    <a href="<?php echo $filePath.$filename422 ?>" target="_blank"><?php echo $filename422 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment431">Your Comment:</label>
                                        <textarea class="form-control" id="comment431" rows="3"><?php if (!empty($comment431)): ?><?php echo $comment431 ?><?php endif ?></textarea>
                                        <span id="alert431"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,3,1,comment431.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,3,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,3,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved431)){ ?>
                    		<?php if ($approved431 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename422)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.3.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Minutes (at least 2) of the public hearing/Barangay assemblies with attendance sheet</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal432" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal432" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename423 = $user_id.$year.'file423.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename423)) { ?>
                                                    <a href="<?php echo $filePath.$filename423 ?>" target="_blank"><?php echo $filename423 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment432">Your Comment:</label>
                                        <textarea class="form-control" id="comment432" rows="3"><?php if (!empty($comment432)): ?><?php echo $comment432 ?><?php endif ?></textarea>
                                        <span id="alert432"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,3,2,comment432.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,3,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,3,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved432)){ ?>
                    		<?php if ($approved432 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename423)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.3.3</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Barangay Development Plan with BDC and SB Resolutions adopting such</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal433" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal433" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename424 = $user_id.$year.'file424.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename424)) { ?>
                                                    <a href="<?php echo $filePath.$filename424 ?>" target="_blank"><?php echo $filename424 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment433">Your Comment:</label>
                                        <textarea class="form-control" id="comment433" rows="3"><?php if (!empty($comment433)): ?><?php echo $comment433 ?><?php endif ?></textarea>
                                        <span id="alert433"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,3,3,comment433.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,3,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,3,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved433)){ ?>
                    		<?php if ($approved433 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename424)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.3.4</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CY 2023 Accomplishment Report of the BDP</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal434" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal434" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename425 = $user_id.$year.'file425.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename425)) { ?>
                                                    <a href="<?php echo $filePath.$filename425 ?>" target="_blank"><?php echo $filename425 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment434">Your Comment:</label>
                                        <textarea class="form-control" id="comment434" rows="3"><?php if (!empty($comment434)): ?><?php echo $comment434 ?><?php endif ?></textarea>
                                        <span id="alert434"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,3,4,comment434.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,3,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,3,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved434)){ ?>
                    		<?php if ($approved434 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename425)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.4 Implementation of the Kasambahay Law</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.4.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance designating a Kasambahay Desk and a KDO</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal441" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal441" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename426 = $user_id.$year.'file426.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename426)) { ?>
                                                    <a href="<?php echo $filePath.$filename426 ?>" target="_blank"><?php echo $filename426 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment441">Your Comment:</label>
                                        <textarea class="form-control" id="comment441" rows="3"><?php if (!empty($comment441)): ?><?php echo $comment441 ?><?php endif ?></textarea>
                                        <span id="alert441"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,4,1,comment441.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,4,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,4,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved441)){ ?>
                    		<?php if ($approved441 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename426)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.4.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Updated Kasambahay Report Form 2 (Kasambahay Masterlist) as of December 2023</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal442" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal442" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename427 = $user_id.$year.'file427.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename427)) { ?>
                                                    <a href="<?php echo $filePath.$filename427 ?>" target="_blank"><?php echo $filename427 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment442">Your Comment:</label>
                                        <textarea class="form-control" id="comment442" rows="3"><?php if (!empty($comment442)): ?><?php echo $comment442 ?><?php endif ?></textarea>
                                        <span id="alert442"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,4,2,comment442.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,4,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,4,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved442)){ ?>
                    		<?php if ($approved442 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename427)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.5 Functionality of the Barangay Council for the Protection of Children (BCPC)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.5.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Executive Order or similar Issuance on the extablishment Barangay Council for Protection of Children (BCPC)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal451" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal451" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename428 = $user_id.$year.'file428.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename428)) { ?>
                                                    <a href="<?php echo $filePath.$filename428 ?>" target="_blank"><?php echo $filename428 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment451">Your Comment:</label>
                                        <textarea class="form-control" id="comment451" rows="3"><?php if (!empty($comment451)): ?><?php echo $comment451 ?><?php endif ?></textarea>
                                        <span id="alert451"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,5,1,comment451.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,5,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,5,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved451)){ ?>
                    		<?php if ($approved451 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename428)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.5.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal452" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal452" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename429 = $user_id.$year.'file429.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename429)) { ?>
                                                    <a href="<?php echo $filePath.$filename429 ?>" target="_blank"><?php echo $filename429 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment452">Your Comment:</label>
                                        <textarea class="form-control" id="comment452" rows="3"><?php if (!empty($comment452)): ?><?php echo $comment452 ?><?php endif ?></textarea>
                                        <span id="alert452"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,5,2,comment452.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,5,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,5,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved452)){ ?>
                    		<?php if ($approved452 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename429)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.5.3</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved BCPC Annual Work and FInancial Plan (AWFP)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal453" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal453" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename430 = $user_id.$year.'file430.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename430)) { ?>
                                                    <a href="<?php echo $filePath.$filename430 ?>" target="_blank"><?php echo $filename430 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment453">Your Comment:</label>
                                        <textarea class="form-control" id="comment453" rows="3"><?php if (!empty($comment453)): ?><?php echo $comment453 ?><?php endif ?></textarea>
                                        <span id="alert453"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,5,3,comment453.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,5,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,5,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved453)){ ?>
                    		<?php if ($approved453 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename430)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.5.4</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Updated database on children</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal454" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal454" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename431 = $user_id.$year.'file431.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename431)) { ?>
                                                    <a href="<?php echo $filePath.$filename431 ?>" target="_blank"><?php echo $filename431 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment454">Your Comment:</label>
                                        <textarea class="form-control" id="comment454" rows="3"><?php if (!empty($comment454)): ?><?php echo $comment454 ?><?php endif ?></textarea>
                                        <span id="alert454"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,5,4,comment454.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,5,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,5,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved454)){ ?>
                    		<?php if ($approved454 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename431)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.5.5</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Updated Localized Flow Chart of Referral System</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal455" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal455" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename432 = $user_id.$year.'file432.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename432)) { ?>
                                                    <a href="<?php echo $filePath.$filename432 ?>" target="_blank"><?php echo $filename432 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment455">Your Comment:</label>
                                        <textarea class="form-control" id="comment455" rows="3"><?php if (!empty($comment455)): ?><?php echo $comment455 ?><?php endif ?></textarea>
                                        <span id="alert455"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,5,5,comment455.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,5,5,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,5,5,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved455)){ ?>
                    		<?php if ($approved455 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename432)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.5.6</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CY 2023 Approved Accomplishment Report on BCPC Plan</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal456" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal456" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename433 = $user_id.$year.'file433.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename433)) { ?>
                                                    <a href="<?php echo $filePath.$filename433 ?>" target="_blank"><?php echo $filename433 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment456">Your Comment:</label>
                                        <textarea class="form-control" id="comment456" rows="3"><?php if (!empty($comment456)): ?><?php echo $comment456 ?><?php endif ?></textarea>
                                        <span id="alert456"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,5,6,comment456.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,5,6,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,5,6,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved456)){ ?>
                    		<?php if ($approved456 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename433)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.6 Mechanism for Gender and Development (GAD)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.6.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance organizing the Barangay GAD Focal Point System</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal461" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal461" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename434 = $user_id.$year.'file434.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename434)) { ?>
                                                    <a href="<?php echo $filePath.$filename434 ?>" target="_blank"><?php echo $filename434 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment461">Your Comment:</label>
                                        <textarea class="form-control" id="comment461" rows="3"><?php if (!empty($comment461)): ?><?php echo $comment461 ?><?php endif ?></textarea>
                                        <span id="alert461"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,6,1,comment461.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,6,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,6,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved461)){ ?>
                    		<?php if ($approved461 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename434)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>4.7 Maintenance of Ipdated Record of Barangay Inhabitants (RBIs)</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 4.7.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Accomplished RBI Form A of two semesters of CY 2023</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal471" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal471" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload4/uploaded/'; 
                                                    $filename435 = $user_id.$year.'file435.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename435)) { ?>
                                                    <a href="<?php echo $filePath.$filename435 ?>" target="_blank"><?php echo $filename435 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment471">Your Comment:</label>
                                        <textarea class="form-control" id="comment471" rows="3"><?php if (!empty($comment471)): ?><?php echo $comment471 ?><?php endif ?></textarea>
                                        <span id="alert471"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(4,7,1,comment471.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(4,7,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(4,7,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved471)){ ?>
                    		<?php if ($approved471 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename435)) { ?>
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
            </tbody>
        </table>
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Enacted Barangay Tax Ordinance</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal511" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal511" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload5/uploaded/'; 
                                                    $filename511 = $user_id.$year.'file511.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename511)) { ?>
                                                    <a href="<?php echo $filePath.$filename511 ?>" target="_blank"><?php echo $filename511 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment511">Your Comment:</label>
                                        <textarea class="form-control" id="comment511" rows="3"><?php if (!empty($comment511)): ?><?php echo $comment511 ?><?php endif ?></textarea>
                                        <span id="alert511"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(5,1,1,comment511.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(5,1,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(5,1,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>5.2 Compiliance to Section 11 of RA 11032 of the Ease of Doing Business Law</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 5.2.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Enacted Barangay Ordinance relative to Barangay Clearance Fees on business permit and locational clearance for building permit, in accordance with MC No. 2019-177</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal521" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal521" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload5/uploaded/'; 
                                                    $filename512 = $user_id.$year.'file512.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename512)) { ?>
                                                    <a href="<?php echo $filePath.$filename512 ?>" target="_blank"><?php echo $filename512 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment521">Your Comment:</label>
                                        <textarea class="form-control" id="comment521" rows="3"><?php if (!empty($comment521)): ?><?php echo $comment521 ?><?php endif ?></textarea>
                                        <span id="alert521"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(5,2,1,comment521.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(5,2,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(5,2,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 5.2.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved resolution authorizing the Municipal Treasurer to collect fees for Barangay Clearance for Business permit and locational clearance purpose</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal522" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal522" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload5/uploaded/'; 
                                                    $filename513 = $user_id.$year.'file513.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename513)) { ?>
                                                    <a href="<?php echo $filePath.$filename513 ?>" target="_blank"><?php echo $filename513 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment522">Your Comment:</label>
                                        <textarea class="form-control" id="comment522" rows="3"><?php if (!empty($comment522)): ?><?php echo $comment522 ?><?php endif ?></textarea>
                                        <span id="alert522"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(5,2,2,comment522.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(5,2,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(5,2,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>5.3 Issuance of Barangay Clearance not covered by DILG MC No. 2019-177 such as: residency, indigency, etc, within seven (7) working days</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 5.3.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Photo documentation of the Citizens' Charter on the issuance of Barangay Clearance only (name of the Barangay should be visible)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal531" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal531" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload5/uploaded/'; 
                                                    $filename514 = $user_id.$year.'file514.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename514)) { ?>
                                                    <a href="<?php echo $filePath.$filename514 ?>" target="_blank"><?php echo $filename514 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment531">Your Comment:</label>
                                        <textarea class="form-control" id="comment531" rows="3"><?php if (!empty($comment531)): ?><?php echo $comment531 ?><?php endif ?></textarea>
                                        <span id="alert531"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(5,3,1,comment531.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(5,3,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(5,3,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
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
            </tbody>
        </table>
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
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EO or similar issuance on the organization of the BESWMC</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal611" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal611" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename611 = $user_id.$year.'file611.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename611)) { ?>
                                                    <a href="<?php echo $filePath.$filename611 ?>" target="_blank"><?php echo $filename611 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment611">Your Comment:</label>
                                        <textarea class="form-control" id="comment611" rows="3"><?php if (!empty($comment611)): ?><?php echo $comment611 ?><?php endif ?></textarea>
                                        <span id="alert611"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,1,1,comment611.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,1,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,1,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved611)){ ?>
                    		<?php if ($approved611 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename611)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 6.1.2</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Approved Solid Waste Management Program/Plan with corresponding fund allocation</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal612" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal612" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename612 = $user_id.$year.'file612.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename612)) { ?>
                                                    <a href="<?php echo $filePath.$filename612 ?>" target="_blank"><?php echo $filename612 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment612">Your Comment:</label>
                                        <textarea class="form-control" id="comment612" rows="3"><?php if (!empty($comment612)): ?><?php echo $comment612 ?><?php endif ?></textarea>
                                        <span id="alert612"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,1,2,comment612.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,1,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,1,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved612)){ ?>
                    		<?php if ($approved612 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename612)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 6.1.3</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Certified true copy of any proof of training such as Certificate of Completion and/or Participation (at least 1)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal613" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal613" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename613 = $user_id.$year.'file613.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename613)) { ?>
                                                    <a href="<?php echo $filePath.$filename613 ?>" target="_blank"><?php echo $filename613 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment613">Your Comment:</label>
                                        <textarea class="form-control" id="comment613" rows="3"><?php if (!empty($comment613)): ?><?php echo $comment613 ?><?php endif ?></textarea>
                                        <span id="alert613"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,1,3,comment613.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,1,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,1,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved613)){ ?>
                    		<?php if ($approved613 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename613)) { ?>
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
            </tbody>
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 6.1.4</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Monthly Accomplishment Reports for 2023</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal614" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal614" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename614 = $user_id.$year.'file614.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename614)) { ?>
                                                    <a href="<?php echo $filePath.$filename614 ?>" target="_blank"><?php echo $filename614 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment614">Your Comment:</label>
                                        <textarea class="form-control" id="comment614" rows="3"><?php if (!empty($comment614)): ?><?php echo $comment614 ?><?php endif ?></textarea>
                                        <span id="alert614"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,1,4,comment614.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,1,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,1,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved614)){ ?>
                    		<?php if ($approved614 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename614)) { ?>
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
            </tbody>
        </table>
    </div>
    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>6.2 Existence of a Solid Waste Management Facility Pursuant to R.A. 9003</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 6.2.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>For MRF operated by the Barangay:</b> Photo documentation of the MRF/MRF Records of the Barangay</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal621" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal621" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename615 = $user_id.$year.'file615.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename615)) { ?>
                                                    <a href="<?php echo $filePath.$filename615 ?>" target="_blank"><?php echo $filename615 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment621">Your Comment:</label>
                                        <textarea class="form-control" id="comment621" rows="3"><?php if (!empty($comment621)): ?><?php echo $comment621 ?><?php endif ?></textarea>
                                        <span id="alert621"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,2,1,comment621.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,2,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,2,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved621)){ ?>
                    		<?php if ($approved621 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename615)) { ?>
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
            </tbody>
            <tbody>
                <tr>
                    <td><b>For MRS:</b> MOA with junkshop;</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal622" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal622" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename616 = $user_id.$year.'file616.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename616)) { ?>
                                                    <a href="<?php echo $filePath.$filename616 ?>" target="_blank"><?php echo $filename616 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment622">Your Comment:</label>
                                        <textarea class="form-control" id="comment622" rows="3"><?php if (!empty($comment622)): ?><?php echo $comment622 ?><?php endif ?></textarea>
                                        <span id="alert622"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,2,2,comment622.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,2,2,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,2,2,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved622)){ ?>
                    		<?php if ($approved622 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename616)) { ?>
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
            </tbody>
            <tbody>
                <tr>
                    <td><b>For MRS:</b> Mechanis, to process biodegradable wastes;</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal623" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal623" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename617 = $user_id.$year.'file617.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename617)) { ?>
                                                    <a href="<?php echo $filePath.$filename617 ?>" target="_blank"><?php echo $filename617 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment623">Your Comment:</label>
                                        <textarea class="form-control" id="comment623" rows="3"><?php if (!empty($comment623)): ?><?php echo $comment623 ?><?php endif ?></textarea>
                                        <span id="alert623"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,2,3,comment623.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,2,3,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,2,3,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved623)){ ?>
                    		<?php if ($approved623 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename617)) { ?>
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
            </tbody>
            <tbody>
                <tr>
                    <td><b>For MRS:</b> MOA with service provider for collection/treatment of special, hazardous, and infectious waste</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal624" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal624" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename618 = $user_id.$year.'file618.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename618)) { ?>
                                                    <a href="<?php echo $filePath.$filename618 ?>" target="_blank"><?php echo $filename618 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment624">Your Comment:</label>
                                        <textarea class="form-control" id="comment624" rows="3"><?php if (!empty($comment624)): ?><?php echo $comment624 ?><?php endif ?></textarea>
                                        <span id="alert624"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,2,4,comment624.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,2,4,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,2,4,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved624)){ ?>
                    		<?php if ($approved624 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename618)) { ?>
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
            </tbody>
            <tbody>
                <tr>
                    <td><b>For Clustered MRFs:</b> MOA with the host Barangay (applicable for barangay-clustered MRFs)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal625" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal625" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename619 = $user_id.$year.'file619.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename619)) { ?>
                                                    <a href="<?php echo $filePath.$filename619 ?>" target="_blank"><?php echo $filename619 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment625">Your Comment:</label>
                                        <textarea class="form-control" id="comment625" rows="3"><?php if (!empty($comment625)): ?><?php echo $comment625 ?><?php endif ?></textarea>
                                        <span id="alert625"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,2,5,comment625.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,2,5,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,2,5,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved625)){ ?>
                    		<?php if ($approved625 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename619)) { ?>
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
            </tbody>
            <tbody>
                <tr>
                    <td><b>For Clustered MRFs:</b> MOA or LGU document Indicating coverage of Municipal MRF (applicable for barangay-clustered to the Central MRF of Municipality)</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal626" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal626" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename620 = $user_id.$year.'file620.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename620)) { ?>
                                                    <a href="<?php echo $filePath.$filename620 ?>" target="_blank"><?php echo $filename620 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment626">Your Comment:</label>
                                        <textarea class="form-control" id="comment626" rows="3"><?php if (!empty($comment626)): ?><?php echo $comment626 ?><?php endif ?></textarea>
                                        <span id="alert626"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,2,6,comment626.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,2,6,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,2,6,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved626)){ ?>
                    		<?php if ($approved626 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename620)) { ?>
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
            </tbody>
        </table>
    </div>

    <div class="row bg-info">
        <div class="col-lg-12 text-center text-white"><b>6.3 Provision of Support Mechanisms for Segregated Collection</b></div>
    </div>
    <div class="table-responsive mt-4 mb-4 container" id="">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">Reports 6.3.1</th>
                    <th class="text-center"style="width: 250px;">Attachments</th>
                    <th class="text-center"style="width: 10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ordinance or similar issuance on segregation of wastes at-source</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary btn-comment" data-toggle="modal" data-target="#commentModal631" onclick="generateFileLink()">
                        View Attachment
                        </button>
                        <div class="modal fade" id="commentModal631" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="font-weight: bold;">Add comment on the attached file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
                                    </div>
                                    <div class="modal-body">
                                    <label for="comment">Attached File:</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $filePath = '../actions/upload6/uploaded/'; 
                                                    $filename621 = $user_id.$year.'file621.pdf';
                                                ?>
                                                <?php if (file_exists($filePath.$filename621)) { ?>
                                                    <a href="<?php echo $filePath.$filename621 ?>" target="_blank"><?php echo $filename621 ?></a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    <div class="form-group mt-3">
                                        <label for="comment631">Your Comment:</label>
                                        <textarea class="form-control" id="comment631" rows="3"><?php if (!empty($comment631)): ?><?php echo $comment631 ?><?php endif ?></textarea>
                                        <span id="alert631"></span>
                                    </div>
                                    <div class="text-right"><button type="button" class="btn btn-primary btn-sm" onclick="btn_submit_comment(6,3,1,comment631.value,'<?php echo $year ?>','<?php echo $user_id ?>')">Submit Comment</button></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="text-left">
                                        <button type="button" class="btn btn-primary" style="background-color: blue;" onclick="btn_submit_approved(6,3,1,1,'<?php echo $year ?>','<?php echo $user_id ?>')">Approve</button>
                                        <button type="button" class="btn btn-danger" style="background-color: red;" onclick="btn_submit_approved(6,3,1,2,'<?php echo $year ?>','<?php echo $user_id ?>')">Disapprove</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                    	<?php if (!empty($approved631)){ ?>
                    		<?php if ($approved631 == 1){ ?>
                    			<img src="../img/icon/Approved.png" width="30">
                    		<?php }else{ ?>
                    			<img src="../img/icon/Disapproved.png" width="30">
                    		<?php } ?>
                    	<?php }else{ ?>
                    		<?php if (file_exists($filePath.$filename621)) { ?>
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
<script src="view_other_barangay_file.js"></script>
</body>

</html>
