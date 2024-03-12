<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    if(!$_SESSION['id']){ header('location:../actions/logout.php'); }
    require_once '../../actions/dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }
    require_once '../../Admin/actions/send_sms.php';
    $id = $_SESSION['id'];
    $date_ = date('Y-m-d');
    $time_ = date('H:i:s');
    $trail = $id.' '.$date_.' '.$time_;
    if (isset($_POST['add_remarks1'])) {
        try {
        $remarks1 = $_POST['remarks1'];
        $keyctr1 = $_POST['keyctr1'];
        $btns = $_POST['btns'];
        $area_no = 1;
        $under_area = 1;

        if (empty($_POST['point1'])) {$points1=0;}else{$points1 = $_POST['point1'];}

        $total1 = $points1;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr1);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total1);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks1);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total1);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks1);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core11 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core11 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points1);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks1 != '' && $btns == 1) {
            $message = '1.1 Compliance with the Barangay Full Disclosure Policy (BFDP) have been remarked and approved';
            // echo $message;
            send_sms($number,$message);
        }
        if ($remarks1 != '' && $btns == 2) {
            $message = '1.1 Compliance with the Barangay Full Disclosure Policy (BFDP) have been remarked and disapproved';
            send_sms($number,$message);
        }

        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks2'])) {
        try {
        $remarks2 = $_POST['remarks2'];
        $keyctr2 = $_POST['keyctr2'];
        $btns = $_POST['btns'];
        $area_no = 1;
        $under_area = 2;

        if (empty($_POST['point2'])) {$points2=0;}else{$points2 = $_POST['point2'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = '1.2 Innovations on revenue generation or exercise of corporate powers have been remarked and has been approved';
            // echo $message;
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = '1.2 Innovations on revenue generation or exercise of corporate powers have been remarked and has been disapproved';
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks3'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 1;
        $under_area = 3;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = '1.3 Approval of the Barangay Budget on the Specified Timeframe have been remarked and has been approved';
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = '1.3 Approval of the Barangay Budget on the Specified Timeframe have been remarked and has been disapproved';
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks4'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 1;
        $under_area = 4;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = '1.4 Allocation for Statutory Programs and Projects as Mandated by Laws and/or Other Issuances have been remarked and has been approved';
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = '1.4 Allocation for Statutory Programs and Projects as Mandated by Laws and/or Other Issuances have been remarked and has been disapproved';
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks5'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 1;
        $under_area = 5;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "1.5 Posting of the Barangay Citizens' Charter (CitCha) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "1.5 Posting of the Barangay Citizens' Charter (CitCha) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks6'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 1;
        $under_area = 6;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "1.6 Release of the Sangguniang Kabataan (SK) Funds by the Barangay have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "1.6 Release of the Sangguniang Kabataan (SK) Funds by the Barangay have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks7'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 1;
        $under_area = 7;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "1.7 Conduct of Barangay Assembly for CY 2022 (2nd Semester) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "1.7 Conduct of Barangay Assembly for CY 2022 (2nd Semester) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks21'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 2;
        $under_area = 1;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "2.1 Functionality of the Barangay Disaster Risk Reduction and Management Commitee (BDRRMC) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "2.1 Functionality of the Barangay Disaster Risk Reduction and Management Commitee (BDRRMC) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks22'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 2;
        $under_area = 2;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "2.2 Extend of Risk Assessment and Early Warning System (EWS) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "2.2 Extend of Risk Assessment and Early Warning System (EWS) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks23'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 2;
        $under_area = 3;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "2.3 Extend of Preparedness For Effective Response And Recovery have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "2.3 Extend of Preparedness For Effective Response And Recovery have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks31'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 3;
        $under_area = 1;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "3.1 Functionality of the Barangay Anti-Drug Abuse Council (BADAC) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "3.1 Functionality of the Barangay Anti-Drug Abuse Council (BADAC) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks32'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 3;
        $under_area = 2;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "3.2 Functionality of the Barangay Peace and Order Committee (BPOC) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "3.2 Functionality of the Barangay Peace and Order Committee (BPOC) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks33'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 3;
        $under_area = 3;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "3.3 Functionality of the Lupong Tagapamayapa (LT) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "3.3 Functionality of the Lupong Tagapamayapa (LT) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks34'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 3;
        $under_area = 4;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "3.4 Organization and Strengthening Capacities of Barangay Tanod have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "3.4 Organization and Strengthening Capacities of Barangay Tanod have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks35'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 3;
        $under_area = 5;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "3.5 Barangay Initiatives During Health Emergencies have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "3.5 Barangay Initiatives During Health Emergencies have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks36'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 3;
        $under_area = 6;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "3.6 Conduct of Monthly Barangay Road Clearing Operations (BaRCO) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "3.6 Conduct of Monthly Barangay Road Clearing Operations (BaRCO) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks41'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 4;
        $under_area = 1;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "4.1 Functionality of Barangay Violence Against Women (VAW) Desk have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "4.1 Functionality of Barangay Violence Against Women (VAW) Desk have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks42'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 4;
        $under_area = 2;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "4.2 Access to Health and Social Welfare Services in the Barangay have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "4.2 Access to Health and Social Welfare Services in the Barangay have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks43'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 4;
        $under_area = 3;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "4.3 Functionality of the Barangay Development Council (BDC) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "4.3 Functionality of the Barangay Development Council (BDC) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks44'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 4;
        $under_area = 4;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "4.4 Implementation of the Kasambahay Law have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "4.4 Implementation of the Kasambahay Law have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks45'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 4;
        $under_area = 5;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "4.5 Functionality of the Barangay Council for the Protection of Children (BCPC) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "4.5 Functionality of the Barangay Council for the Protection of Children (BCPC) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks46'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 4;
        $under_area = 6;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "4.6 Mechanism for Gender and Development (GAD) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "4.6 Mechanism for Gender and Development (GAD) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks47'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 4;
        $under_area = 7;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "4.7 Maintenance of Ipdated Record of Barangay Inhabitants (RBIs) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "4.7 Maintenance of Ipdated Record of Barangay Inhabitants (RBIs) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks51'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 5;
        $under_area = 1;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "5.1 Power to Levy Other Taxes, Fees, or Charges have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "5.1 Power to Levy Other Taxes, Fees, or Charges have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks52'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 5;
        $under_area = 2;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "5.2 Compiliance to Section 11 of RA 11032 of the Ease of Doing Business Law have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "5.2 Compiliance to Section 11 of RA 11032 of the Ease of Doing Business Law have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks53'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 5;
        $under_area = 3;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "5.3 Issuance of Barangay Clearance not covered by DILG MC No. 2019-177 such as: residency, indigency, etc, within seven (7) working days have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "5.3 Issuance of Barangay Clearance not covered by DILG MC No. 2019-177 such as: residency, indigency, etc, within seven (7) working days have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks61'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 6;
        $under_area = 1;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "6.1 Functionality of the Barangay Ecological Solid Waste Management Committee (BESWMC) have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "6.1 Functionality of the Barangay Ecological Solid Waste Management Committee (BESWMC) have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks62'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 6;
        $under_area = 2;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "6.2 Existence of a Solid Waste Management Facility Pursuant to R.A. 9003 have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "6.2 Existence of a Solid Waste Management Facility Pursuant to R.A. 9003 have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }

    if (isset($_POST['add_remarks63'])) {
        try {
        $remarks2 = $_POST['remarks3'];
        $keyctr2 = $_POST['keyctr3'];
        $btns = $_POST['btns'];
        $area_no = 6;
        $under_area = 3;

        if (empty($_POST['point3'])) {$points2=0;}else{$points2 = $_POST['point3'];}

        $total2 = $points2;
        $dbconn->beginTransaction();
        $query1 = $dbconn->prepare("SELECT * from assessment where keyctr=?");
        $query1->bindParam(1, $keyctr2);
        $query1->execute();
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);
        $user_id = $row1['id'];
        $year = $row1['year'];

        $query2 = $dbconn->prepare("SELECT mobile from account where id=?");
        $query2->bindParam(1, $user_id);
        $query2->execute();
        $row2 = $query2->fetch(PDO::FETCH_ASSOC);
        $number = $row2['mobile'];

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area_no);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,area_points,user_id,year_,date_,time_,trail,remarks,approved) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->execute();

        }else{

            $insert = $dbconn->prepare("UPDATE area_assessment_points SET area_number=?,under_area=?,area_points=?,user_id=?,year_=?,date_=?,time_=?,trail=?,remarks=?,approved=? where user_id=? and year_=? and area_number=? and under_area=?");
            $insert->bindParam(1, $area_no);
            $insert->bindParam(2, $under_area);
            $insert->bindParam(3, $total2);
            $insert->bindParam(4, $user_id);
            $insert->bindParam(5, $year);
            $insert->bindParam(6, $date_);
            $insert->bindParam(7, $time_);
            $insert->bindParam(8, $trail);
            $insert->bindParam(9, $remarks2);
            $insert->bindParam(10, $btns);
            $insert->bindParam(11, $user_id);
            $insert->bindParam(12, $year);
            $insert->bindParam(13, $area_no);
            $insert->bindParam(14, $under_area);
            $insert->execute();
        }

        $stmt1 = $dbconn->prepare("SELECT COUNT(*) FROM core12 where id=? and year=?");
        $stmt1->bindParam(1, $user_id);
        $stmt1->bindParam(2, $year);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();
        if ($count != 0) {
            $insert = $dbconn->prepare("UPDATE core12 SET assessment_points=? where id=? and year=?");
            $insert->bindParam(1, $points2);
            $insert->bindParam(2, $user_id);
            $insert->bindParam(3, $year);
            $insert->execute();
        }

        if ($remarks2 != '' && $btns == 1) {
            $message = "6.3 Provision of Support Mechanisms for Segregated Collection have been remarked and has been approved";
            send_sms($number,$message);
        }
        if ($remarks2 != '' && $btns == 2) {
            $message = "6.3 Provision of Support Mechanisms for Segregated Collection have been remarked and has been disapproved";
            send_sms($number,$message);
        }
        
        $dbconn->commit();
        }catch (PDOException $e) {
            $dbconn->rollback();
            echo $e->getMessage();
        }
    }
?> 