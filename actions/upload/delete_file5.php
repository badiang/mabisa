<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    // if(!$_SESSION['idno']){ header('location:../actions/logout.php'); }
    require_once '../dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }
    require_once 'core15_delete_points.php';
    $id = $_SESSION['id'];
    $year = $_SESSION['view_year'];

if (isset($_POST["delete"])) {
    $val = '../'.$_POST['val'];
    if (file_exists($val)) {
        if (unlink($val)) {
            echo "File deleted successfully.";
            deletePointsCore15($id,$year,$dbconn);
        } else {
            echo "Failed to delete the file.";
        }
    } else {
        echo "File not found.";
    }
}
?>
