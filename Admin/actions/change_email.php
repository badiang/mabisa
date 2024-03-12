<?php
    // error_reporting(E_ALL ^ E_NOTICE);
    error_reporting(0);
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
    $date_ = date('Y-m-d');
    $time_ = date('H:i:s');
    $year_ = date('Y');
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];

    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\SMTP; 
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['change'])) {
        $email = trim($_POST['change_email']);

        $stmt = $dbconn->prepare("UPDATE account set email=? where id=?");
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $id);
        $stmt->execute();
        $_SESSION['email'] = $email;

    }
?>