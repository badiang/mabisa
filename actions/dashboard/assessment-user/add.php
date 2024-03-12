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

    if (isset($_POST['add'])) {
        $region = $_POST['region'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $barangay = $_POST['barangay'];
        $year = $_POST['year'];

        try {

            $dbconn->beginTransaction();
            //add country
            $stmt = $dbconn->prepare("SELECT COUNT(*) FROM assessment where barangay_code=? and id=? and year=?");
            $stmt->bindParam(1, $barangay);
            $stmt->bindParam(2, $id);
            $stmt->bindParam(3, $year);
            $stmt->execute();
            $count1 = $stmt->fetchColumn();
            if ($count1 == 0) {

                $stmt_acc = $dbconn->prepare("SELECT COUNT(*) FROM account where barangay_code=? and id=?");
                $stmt_acc->bindParam(1, $barangay);
                $stmt_acc->bindParam(2, $id);
                $stmt_acc->execute();
                $count = $stmt_acc->fetchColumn();

                if ($count != 0) {
                    $insert = $dbconn->prepare("INSERT INTO assessment (id,region_code,province_code,city_code,barangay_code,year) VALUES (?,?,?,?,?,?)");
                    $insert->bindParam(1, $id);
                    $insert->bindParam(2, $region);
                    $insert->bindParam(3, $province);
                    $insert->bindParam(4, $city);
                    $insert->bindParam(5, $barangay);
                    $insert->bindParam(6, $year);
                    $insert->execute();
                    echo 1;
                }else{
                    echo 2;
                }
            }else{
              echo 0;
            }

            $dbconn->commit();
            // echo "Transaction committed successfully!";
        } catch (PDOException $e) {
            $dbconn->rollBack();
            echo "Transaction failed: " . $e->getMessage();
        }
?>

<?php } ?>