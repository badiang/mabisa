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
    if (isset($_POST['edit'])) {
      $val = $_POST['val'];

      $query = $dbconn->prepare("SELECT a.country_name,a.country_code,b.region_name,b.region_code,c.province_name,c.province_code,d.city_name,d.city_code,e.barangay_name,e.barangay_code FROM country as a inner join region as b on a.country_code=b.country_code inner join province as c on b.region_code=c.region_code inner join city as d on c.province_code=d.province_code inner join barangay as e on d.city_code=e.city_code where e.barangay_code=?");
        $query->bindParam(1, $val);
        // $query->bindParam(2, $cmp_code);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC)
?>
    <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Edit Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="mt-4 mb-4">
            <div id="alert2"></div>
        </div>
        <div class="form-group">
            <label for="country">Country Name</label>
            <input class="form-control" type="text" list="list_country" name="country" id="country2" value="<?php echo $row['country_name'] ?>" autocomplete="off" disabled>
        </div>
        <div class="form-group">
            <label for="region">Region Name</label>
            <input class="form-control" type="text" name="region" id="region2" value="<?php echo $row['region_name'] ?>" autocomplete="off" disabled>
        </div>
        <div class="form-group">
            <label for="province">Province Name</label>
            <input class="form-control" type="text" name="province" id="province2" value="<?php echo $row['province_name'] ?>" autocomplete="off" disabled>
        </div>
        <div class="form-group">
            <label for="city">Municipality Name</label>
            <input class="form-control" type="text" name="city" id="city2" value="<?php echo $row['city_name'] ?>" autocomplete="off" disabled>
        </div>
        <div class="form-group">
            <label for="barangay">Barangay Name</label>
            <input class="form-control" type="text" name="barangay" id="barangay2" value="<?php echo $row['barangay_name'] ?>" autocomplete="off">
            <input class="form-control" type="text" name="barangay" id="barangay3" value="<?php echo $row['barangay_code'] ?>" autocomplete="off" hidden>
            <datalist id="list_country">
                <?php 
                    $query = $dbconn->prepare("SELECT barangay_name FROM barangay");
                    $query->execute();
                    while($row5 = $query->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <option><?php echo $row5['barangay_name'] ?></option>
                <?php } ?>
            </datalist>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="updateLocation()">Update</button>
      </div>
<?php } ?>

