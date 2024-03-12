<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    if(!$_SESSION['id']){ header('location:../logout.php'); }
    require_once '../../dbconn.php';
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

    if (isset($_POST['delete'])) {
        $val = $_POST['val'];

        try {

            $dbconn->beginTransaction();
            //add country
            

            $stmt = $dbconn->prepare("DELETE from assessment where keyctr=?");
            $stmt->bindParam(1, $val);
            $stmt->execute();
            echo 1;


            $dbconn->commit();
            // echo "Transaction committed successfully!";
        } catch (PDOException $e) {
            $dbconn->rollBack();
            echo "Deletion failed: " . $e->getMessage();
        }
?>

<?php } ?>