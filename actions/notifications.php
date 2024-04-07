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


	$sql_noti_show = $dbconn->prepare("SELECT * FROM area_assessment_points WHERE user_id=? AND noti_me=1 limit 3, 18446744073709551615");
    $sql_noti_show->bindParam(1, $id);
    $sql_noti_show->execute();
    $notificationCount = 0; 
    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)) { 
        $timestamp = strtotime($row_noti_show['date_']);
        $formattedDate = date("F j, Y", $timestamp);
        $yr = date("Y",strtotime($row_noti_show['date_']));
        if ($row_noti_show['approved'] == 2) {
            ?>
            <a class="dropdown-item d-flex align-items-center" href="comment_review.php?alert=1&yr=<?php echo $yr ?>">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500"><?php echo $formattedDate ?></div>
                    <span class="font-weight-bold"><?php echo $row_noti_show['area_number'].'.'.$row_noti_show['under_area'] ?> has been disapproved by the admin.</span>                                      
                </div>
            </a>
            <?php
        } elseif ($row_noti_show['approved'] == 1) {
            ?>
            <a class="dropdown-item d-flex align-items-center" href="comment_review.php?alert=1&yr=<?php echo $yr ?>">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-check text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500"><?php echo $formattedDate ?></div>
                    <span class="font-weight-bold"><?php echo $row_noti_show['area_number'].'.'.$row_noti_show['under_area'] ?> has been approved by the admin.</span> 
                </div>
            </a>
            <?php
        }
    }
?>
