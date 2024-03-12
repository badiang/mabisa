<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    // if(!$_SESSION['idno']){ header('location:../actions/logout.php'); }
    require_once 'dbconn.php';
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

    if (isset($_GET['token']) && isset($_GET['id_'])) {
      $token = $_GET['token'];
      $id = $_GET['id_'];

      $stmt = $dbconn->prepare("SELECT COUNT(*) FROM account where id=? and token=? and verify='0'");
      $stmt->bindParam(1, $id);
      $stmt->bindParam(2, $token);
      $stmt->execute();
      $count = $stmt->fetchColumn();

      if ($count >= 1) {
          $stmt = $dbconn->prepare("UPDATE account set verify='1' where id=? and token=?");
          $stmt->bindParam(1, $id);
          $stmt->bindParam(2, $token);
          $stmt->execute();
?>
        <script type="text/javascript">
          alert('Your Email has been verified. You can now login in MABISA. Thank you.');
          window.location='../';
        </script>
  <?}else{?>
      <script type="text/javascript">
        alert('Email is already verified');
        window.location='../';
      </script>
  <?}?>
<?}?>