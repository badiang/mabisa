<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    require_once 'dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    if (!$dbconn) {
      die("ERROR: Unable to connect to database.");
    }

    $alert = ""; // Initializing alert variable

    if (isset($_POST['login'])) {
        $ok = 1;
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $stmt = $dbconn->prepare("SELECT * from account where username=? and password=?");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['type'] = $result['account_type'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['password'] = $result['password'];

            if ($result['account_type'] == '00') {
                echo "<script>alert('Greetings, Administrator. Welcome to MABISA ".$username."');</script>";
                echo "<script>window.location = '../Admin/';</script>";
            } elseif ($result['account_type'] == '01') {
                echo "<script>alert('Greetings and welcome to MABISA! ".$username."');</script>";
                echo "<script>window.location = '../User/';</script>";
            } else {
                echo "<script>window.location = '../';</script>";
            }
        } else {
            $alert = 'Incorrect username or password. Please try again.';
        }
    }
?>
<script type="text/javascript">
    var alertMessage = '<?php echo $alert ?>';
    if (alertMessage !== '') {
        alert(alertMessage);
    }
    window.location = '../';
</script>