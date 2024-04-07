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
    $id = $_SESSION['id'];

try {
    $core_tables = array(
    "core11", "core12", "core13", "core14", "core15", "core16", "core17",
    "core21", "core22", "core23",
    "core31", "core32", "core33", "core34", "core35", "core36",
    "essen11", "essen12", "essen13", "essen14", "essen15", "essen16", "essen17",
    "essen21", "essen22", "essen23",
    "essen31", "essen32", "essen33"
);


foreach ($core_tables as $index => $table) {
    $sql_base = "SELECT b.keyctr, a.year, c.barangay_name, a.id FROM $table AS a INNER JOIN assessment AS b ON b.id = a.id INNER JOIN barangay AS c ON b.barangay_code = c.barangay_code WHERE a.noti_me = 1 ";
    $sql_noti_show = $dbconn->prepare($sql_base);
    $sql_noti_show->execute();

    while ($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)) {
        $xn = $index + 1;

        if ($xn < 3) {

        }else{
            ?>
            <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=<?php echo $xn; ?>">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500"><?php echo $row_noti_show['year'] ?></div>
                    <span class="font-weight-bold">New Update from Barangay <?php echo $row_noti_show['barangay_name'] ?></span>
                </div>
            </a>
            <?php
        }
    }
}
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
	
?>
