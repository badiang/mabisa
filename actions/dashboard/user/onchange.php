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
?>
<?php
    if (isset($_POST['country'])) {
      $val = $_POST['val'];
?>
  <option selected disabled>Select Region</option>
  <?php 
      $query = $dbconn->prepare("SELECT * FROM region where country_code=?");
      $query->bindParam(1, $val);
      $query->execute();
      while($row2 = $query->fetch(PDO::FETCH_ASSOC)) {
   ?>
  <option value="<?php echo $row2['region_code'] ?>"><?php echo $row2['region_name'] ?></option>
  <?php } ?>
<?php } ?>

<?php
    if (isset($_POST['region'])) {
      $val = $_POST['val'];
?>
  <option selected disabled>Select Province</option>
  <?php 
      $query = $dbconn->prepare("SELECT * FROM province where region_code=?");
      $query->bindParam(1, $val);
      $query->execute();
      while($row3 = $query->fetch(PDO::FETCH_ASSOC)) {
   ?>
  <option value="<?php echo $row3['province_code'] ?>"><?php echo $row3['province_name'] ?></option>
  <?php } ?>
<?php } ?>

<?php
    if (isset($_POST['province'])) {
      $val = $_POST['val'];
?>
  <option selected disabled>Select Municipality</option>
  <?php 
      $query = $dbconn->prepare("SELECT * FROM city where province_code=?");
      $query->bindParam(1, $val);
      $query->execute();
      while($row4 = $query->fetch(PDO::FETCH_ASSOC)) {
   ?>
  <option value="<?php echo $row4['city_code'] ?>"><?php echo $row4['city_name'] ?></option>
  <?php } ?>
<?php } ?>

<?php
    if (isset($_POST['city'])) {
      $val = $_POST['val'];
?>
  <option selected disabled>Select Barangay</option>
      <?php 
          $query = $dbconn->prepare("SELECT * FROM barangay where city_code=?");
          $query->bindParam(1, $val);
          $query->execute();
          while($row5 = $query->fetch(PDO::FETCH_ASSOC)) {
       ?>
      <option value="<?php echo $row5['barangay_code'] ?>"><?php echo $row5['barangay_name'] ?></option>
      <?php } ?>
<?php } ?>
