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

    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\SMTP; 
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['signup'])) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);

        $stmt = $dbconn->prepare("SELECT COUNT(*) FROM account where email=?");
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {

            if ($password == $password2) {

            $stmt = $dbconn->prepare("SELECT * FROM account order by keyctr desc limit 1");
            $stmt->execute();
            $count0 = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $year_.$count0['keyctr']+1;
            $acc_type = '01';
            $token = bin2hex(random_bytes(50));

            $stmt = $dbconn->prepare("INSERT INTO account (id,username,password,date,time,year,account_type,country_code,region_code,province_code,city_code,barangay_code,email,token) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $username);
            $stmt->bindParam(3, $password);
            $stmt->bindParam(4, $date_);
            $stmt->bindParam(5, $time_);
            $stmt->bindParam(6, $year_);
            $stmt->bindParam(7, $acc_type);
            $stmt->bindParam(8, $country);
            $stmt->bindParam(9, $region);
            $stmt->bindParam(10, $province);
            $stmt->bindParam(11, $city);
            $stmt->bindParam(12, $barangay);
            $stmt->bindParam(13, $email);
            $stmt->bindParam(14, $token);
            $stmt->execute();
            $alert = 'We already send emeil verification to your email. Please verify your email address. Thank you.';

            send_email($email,$token,$id);
?>
            <script type="text/javascript">
                alert('<?php echo $alert ?>');
                window.location = '../';
            </script>
<?
            
        }else{
            $alert = '2 Password not match. Please try again.';
?>
            <script type="text/javascript">
                alert('<?php echo $alert ?>');
                window.location = '../signup/';
            </script>
<?
        }
    }else{
        $alert = 'Email already been used. Please use another email. Thank you.';
?>
        <script type="text/javascript">
            alert('<?php echo $alert ?>');
            window.location = '../signup/';
        </script>
<?
    }
}
?>


<?php 
     function send_email($email,$token,$id)
    {
         

        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();        
                           
        $mail->Host  = 'smtp.gmail.com';                
        $mail->SMTPAuth = true;                         
        // $mail->Username = 'kensalindo.notification@gmail.com';           
        $mail->Username = 'mabisa.notification@gmail.com';           
        // $mail->Password = 'eldttypamxtfabtp';                   
        $mail->Password = 'laze pvnb ovmr xkmw';                   
        $mail->SMTPSecure = 'ssl';                          
        $mail->Port  = 465;
        $mail->setFrom('kensalindo.notification@gmail.com', 'Verification');     
        $mail->addAddress($email);
        $link = 'localhost/mabisa/actions/verify_email.php?token='.$token.'&id_='.$id;
        // $link = 'medixpro.ph/step_3/?token='.$token.'&id_='.$get_id;
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
                  <td style="font-size: 20px;"><b>Please Verify your Email Address</b></td>
                </tr>
                <tr>
                  <td style="font-size: 20px;"><b>to start using MABISA, we need to verify your email ID <span style="color: #00A3FF"><i>'.$email.'</i></span></b></td>
                </tr>
                <tr>
                  <td style="padding-top: 50px;padding-bottom: 50px">
                    <a type="button" href="'.$link.'" style="background-color: #1B3954;border: none;color: white;text-decoration: none;padding: 20px 20px 20px 20px;font-size: 20px;"><b>Click to verify</b></a>
                  </td>
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