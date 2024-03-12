<?php
    // error_reporting(E_ALL ^ E_NOTICE);
    error_reporting(0);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    // if(!$_SESSION['idno']){ header('location:../actions/logout.php'); }
    require_once '../../actions/dbconn.php';
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
    $username = $_SESSION['username'];

    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\SMTP; 
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['change'])) {
        $password = trim($_POST['new_password']);
        $password2 = trim($_POST['confirm_password']);

        $stmt = $dbconn->prepare("UPDATE account set password=? where id=?");
        $stmt->bindParam(1, $password);
        $stmt->bindParam(2, $id);
        $stmt->execute();

        $stmt = $dbconn->prepare("SELECT email from account where id=?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $email = $result['email'];
        $_SESSION['password'] = $password;
        send_email($email,$username,$password,$date_);
    }
?>


<?php 
     function send_email($email,$username,$password,$date_)
    {
         

        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();        
        
        // $mail->Host  = 'smtp.gmail.com';  
        $mail->Host  = 'smtp.hostinger.com';                
        $mail->SMTPAuth = true;                         
        // $mail->Username = 'mabisa.notification@gmail.com';           
        $mail->Username = 'notification@mabisa-lgualoran.site';           
        // $mail->Password = 'laze pvnb ovmr xkmw';                   
        $mail->Password = 'Salindo!@#$%^&*()1234567890';                   
        $mail->SMTPSecure = 'tls';                          
        $mail->Port  = 587;
        $mail->SMTPDebug = 1;
        // $mail->setFrom('mabisa.notification@gmail.com', 'Verification');     
        $mail->setFrom('notification@mabisa-lgualoran.site', 'Verification');     
        $mail->addAddress($email);
        // $link = 'localhost/mabisa/actions/verify_email.php?token='.$token.'&id_='.$id;
        $mail->isHTML(true);                                
        $mail->Subject = 'Verification';
        $mail->Body = '
          <!DOCTYPE html>
          <html>
          <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
            table, th, td {
          /*    border: 1px solid black;*/
              border-collapse: collapse;
            }

            table.center {
              margin-left: auto; 
              margin-right: auto;
            }
            a:hover{
              background: white !important;
              color: #1B3954 !important;
            }
          </style>
          </head>
          <body class="container" style="text-align: center;;">
            <table class="center" style="width: 50%;float: center;">
              <thead>
                <tr>
                  <td style="font-size: 20px;"><b>Hi '.$username.' your</b></td>
                </tr>
                <tr>
                  <td style="font-size: 20px;"><b>Password Successfully Change</b></td>
                </tr>
                <tr>
                  <td style="font-size: 20px;"><b>and your New Password : '.$password.'</b></td>
                </tr>
                <tr>
                  <td style="font-size: 20px;"><b>Date : '.$date_.'</b></td>
                </tr>
              </thead>
            </table>
          </div>
          </body>
          </html>
        ';
        $mail->AltBody = '';
        $mail->send();
    }
 ?>