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

    $id = $_SESSION['id'];
    $date_ = date('Y-m-d');
    $time_ = date('H:i:s');
    $trail = $id.' '.$date_.' '.$time_;

    if (isset($_POST['update'])) {
      $area = $_POST['area'];
      $under_area = $_POST['under_area'];
      $comment_numb = $_POST['comment_numb'];
      $comment = $_POST['comment'];
      $year = $_POST['year'];
      $user_id = $_POST['user_id'];

      try {
        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM area_assessment_points where user_id=? and year_=? and area_number=? and under_area=?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $year);
        $stmt->bindParam(3, $area);
        $stmt->bindParam(4, $under_area);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {
          $insert = $dbconn->prepare("INSERT INTO area_assessment_points (area_number,under_area,user_id,year_,date_,time_,trail,comment$comment_numb) VALUES (?,?,?,?,?,?,?,?)");
          $insert->bindParam(1, $area);
          $insert->bindParam(2, $under_area);
          $insert->bindParam(3, $user_id);
          $insert->bindParam(4, $year);
          $insert->bindParam(5, $date_);
          $insert->bindParam(6, $time_);
          $insert->bindParam(7, $trail);
          $insert->bindParam(8, $comment);
          $insert->execute();
        }else{
          $update = $dbconn->prepare("UPDATE area_assessment_points SET comment$comment_numb=? where user_id=? and year_=? and area_number=? and under_area=?");
          $update->bindParam(1, $comment);
          $update->bindParam(2, $user_id);
          $update->bindParam(3, $year);
          $update->bindParam(4, $area);
          $update->bindParam(5, $under_area);
          $update->execute();
        }
        echo 0;
      } catch (Exception $e) {
        echo $e;
      }
    }

?>