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
    require_once 'core16_add_points.php';
    $date_ = date('Y-m-d');
    $time_ = date('H:i:s');
    $trail = date('ymdHis');
    $id = $_SESSION['id'];
    $year = $_SESSION['view_year'];
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
    $targetDir = "../upload/uploaded/";
    $targetFile = $targetDir . $id. basename($_FILES["file"]["name"]);
    $filename = $id.$year.'file18.pdf';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($imageFileType != "pdf") {
        echo "Sorry, only PDF files are allowed. ";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir.$filename)) {
            echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
            addPointsCore16($id,$year,$dbconn);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
