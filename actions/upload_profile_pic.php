<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    if(!$_SESSION['id']){ header('location:logout.php'); }
    require_once 'dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }

    $id = $_SESSION['id'];
    $date_ = date('Y-m-d');
    $time_ = date('H:i:s');
    $trail = $id.' '.$date_.' '.$time_;


if(isset($_FILES['fileToUpload'])){
    $file_name = $_FILES['fileToUpload']['name'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_size = $_FILES['fileToUpload']['size'];
    $upload_path = 'profile/' . $file_name;

    // Maximum file size allowed (500KB)
    $max_file_size = 500 * 1024; // in bytes

    // Initialize alert variable
    $alert = '';

    if($file_size <= $max_file_size) {
        if(move_uploaded_file($file_tmp, $upload_path)){
            $alert .= 'File uploaded successfully.';
            
            $sql_check = "SELECT profile_pic FROM account where id='$id' ";
            $stmt_check = $dbconn->query($sql_check);
            if ($stmt_check) {
                while($row = $stmt_check->fetch(PDO::FETCH_ASSOC)) {
                    $existing_image = 'profile/' . $row["profile_pic"];
                    if(file_exists($existing_image)) {
                        if(!unlink($existing_image)) {
                            $alert = " Failed to delete existing image.";
                        }
                    }
                }
            }

            $sql = "UPDATE account SET profile_pic='$file_name' WHERE id='$id' ";
            $result_update = $dbconn->exec($sql);
            if ($result_update !== false) {
                $alert = " Profile picture updated in the database.";
            }
            ?>
                <script type="text/javascript" language="javascript">
                    alert('<?php echo $alert ?>');
                    window.location = "<? echo $_SERVER['HTTP_REFERER']; ?>";
                </script>
            <?
            exit;    
        } else{
            $alert = 'Error uploading file.';
        }
    } else {
        $alert = 'File size exceeds the maximum allowed size (500KB).';
    }
} else{
    $alert = 'No file selected.';
}
?>
<script type="text/javascript" language="javascript">
    alert('<? echo $alert;?>')
    window.location = "<? echo $_SERVER['HTTP_REFERER']; ?>"
</script>