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

    if (isset($_POST['location'])) {

        $country = strtoupper(trim($_POST['country']));
        $region = strtoupper(trim($_POST['region']));
        $province = strtoupper(trim($_POST['province']));
        $city = strtoupper(trim($_POST['city']));
        $barangay = strtoupper(trim($_POST['barangay']));

        try {

            $dbconn->beginTransaction();
            //add country
            $stmt = $dbconn->prepare("SELECT COUNT(*) FROM country where country_name=?");
            $stmt->bindParam(1, $country);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            if ($count == 0) {
                $stmt = $dbconn->prepare("SELECT * FROM country order by keyctr desc limit 1");
                $stmt->execute();
                $count0 = $stmt->fetch(PDO::FETCH_ASSOC);
                $country_code = '10'.$count0['keyctr']+1;
                $stmt = $dbconn->prepare("INSERT INTO country (country_code,country_name) VALUES (?,?)");
                $stmt->bindParam(1, $country_code);
                $stmt->bindParam(2, $country);
                $stmt->execute();
            }else{
                $stmt = $dbconn->prepare("SELECT * from country where country_name=?");
                $stmt->bindParam(1, $country);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $country_code = $result['country_code'];
            }
            //add region
            $stmt = $dbconn->prepare("SELECT COUNT(*) FROM region where region_name=?");
            $stmt->bindParam(1, $region);
            $stmt->execute();
            $count1 = $stmt->fetchColumn();
            if ($count1 == 0) {
                $stmt = $dbconn->prepare("SELECT * FROM region order by keyctr desc limit 1");
                $stmt->execute();
                $count11 = $stmt->fetch(PDO::FETCH_ASSOC);
                $region_code = '100'.$count11['keyctr']+1;
                $stmt = $dbconn->prepare("INSERT INTO region (region_code,region_name,country_code) VALUES (?,?,?)");
                $stmt->bindParam(1, $region_code);
                $stmt->bindParam(2, $region);
                $stmt->bindParam(3, $country_code);
                $stmt->execute();
            }else{
                $stmt = $dbconn->prepare("SELECT * from region where region_name=?");
                $stmt->bindParam(1, $region);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $region_code = $result['region_code'];
            }
            //add province
            $stmt = $dbconn->prepare("SELECT COUNT(*) FROM province where province_name=?");
            $stmt->bindParam(1, $province);
            $stmt->execute();
            $count2 = $stmt->fetchColumn();
            if ($count2 == 0) {
                $stmt = $dbconn->prepare("SELECT * FROM province order by keyctr desc limit 1");
                $stmt->execute();
                $count22 = $stmt->fetch(PDO::FETCH_ASSOC);
                $province_code = '1000'.$count22['keyctr']+1;
                $stmt = $dbconn->prepare("INSERT INTO province (province_code,province_name,region_code) VALUES (?,?,?)");
                $stmt->bindParam(1, $province_code);
                $stmt->bindParam(2, $province);
                $stmt->bindParam(3, $region_code);
                $stmt->execute();
            }else{
                $stmt = $dbconn->prepare("SELECT * from province where province_name=?");
                $stmt->bindParam(1, $province);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $province_code = $result['province_code'];
            }
            //add city
            $stmt = $dbconn->prepare("SELECT COUNT(*) FROM city where city_name=?");
            $stmt->bindParam(1, $city);
            $stmt->execute();
            $count3 = $stmt->fetchColumn();
            if ($count3 == 0) {
                $stmt = $dbconn->prepare("SELECT * FROM city order by keyctr desc limit 1");
                $stmt->execute();
                $count33 = $stmt->fetch(PDO::FETCH_ASSOC);
                $city_code = '10000'.$count33['keyctr']+1;
                $stmt = $dbconn->prepare("INSERT INTO city (city_code,city_name,province_code) VALUES (?,?,?)");
                $stmt->bindParam(1, $city_code);
                $stmt->bindParam(2, $city);
                $stmt->bindParam(3, $province_code);
                $stmt->execute();
            }else{
                $stmt = $dbconn->prepare("SELECT * from city where city_name=?");
                $stmt->bindParam(1, $city);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $city_code = $result['city_code'];
            }
            //add barangay
            $stmt = $dbconn->prepare("SELECT COUNT(*) FROM barangay where barangay_name=?");
            $stmt->bindParam(1, $barangay);
            $stmt->execute();
            $count4 = $stmt->fetchColumn();
            if ($count4 == 0) {
                $stmt = $dbconn->prepare("SELECT * FROM barangay order by keyctr desc limit 1");
                $stmt->execute();
                $count5 = $stmt->fetch(PDO::FETCH_ASSOC);
                $barangay_code = '100000'.$count5['keyctr'] +1;
                $stmt = $dbconn->prepare("INSERT INTO barangay (barangay_code,barangay_name,city_code) VALUES (?,?,?)");
                $stmt->bindParam(1, $barangay_code);
                $stmt->bindParam(2, $barangay);
                $stmt->bindParam(3, $city_code);
                $stmt->execute();
            }else{
                $stmt = $dbconn->prepare("SELECT * from barangay where barangay_name=?");
                $stmt->bindParam(1, $barangay);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $barangay_code = $result['barangay_code'];
            }

            $dbconn->commit();
            // echo "Transaction committed successfully!";
        } catch (PDOException $e) {
            $dbconn->rollBack();
            echo "Transaction failed: " . $e->getMessage();
        }
        
    }
?>