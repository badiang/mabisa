<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    // if(!$_SESSION['idno']){ header('location:../actions/logout.php'); }
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

    if (isset($_POST['save'])) {
        $country = $_POST['country'];
        $region = $_POST['region'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $barangay = $_POST['barangay'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $account_type = $_POST['account_type'];

        try {

            $dbconn->beginTransaction();
            //add country
            $stmt = $dbconn->prepare("SELECT COUNT(*) FROM account where barangay_code=?");
            $stmt->bindParam(1, $barangay);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            if ($count == 0) {
                $stmt = $dbconn->prepare("SELECT * FROM account order by keyctr desc limit 1");
                $stmt->execute();
                $count0 = $stmt->fetch(PDO::FETCH_ASSOC);
                $id = $year_.$count0['keyctr']+1;

                $stmt = $dbconn->prepare("INSERT INTO account (id,username,password,date,time,year,account_type,country_code,region_code,province_code,city_code,barangay_code,email,mobile) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bindParam(1, $id);
                $stmt->bindParam(2, $username);
                $stmt->bindParam(3, $password);
                $stmt->bindParam(4, $date_);
                $stmt->bindParam(5, $time_);
                $stmt->bindParam(6, $year_);
                $stmt->bindParam(7, $account_type);
                $stmt->bindParam(8, $country);
                $stmt->bindParam(9, $region);
                $stmt->bindParam(10, $province);
                $stmt->bindParam(11, $city);
                $stmt->bindParam(12, $barangay);
                $stmt->bindParam(13, $email);
                $stmt->bindParam(14, $phone);
                $stmt->execute();
                echo 1;
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