<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    // if(!$_SESSION['idno']){ header('location:../actions/logout.php'); }
    require_once '../dbconn/dbconfig.php';   
    $dbconn = new PDO("pgsql:dbname='$dbname';port='$port';host='$host'", $dbUser, $dbPass );
    #Setting the error mode of our db object, which is very important for debugging.
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // always disable emulated prepared statement when using the MySQL driver
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\SMTP; 
    use PHPMailer\PHPMailer\Exception; 
    $date_ = date('Y-m-d');
    $time_ = date('H:i:s');
    if (isset($_POST['save'])) {
      $remarks = strtoupper(trim($_POST['remarks']));
      // $password = trim($_POST['password']);
      // $username = trim($_POST['username']);
      $phone_number = trim($_POST['phone_number']);
      $email = trim($_POST['email']);
      $first_name = strtoupper(trim($_POST['first_name']));
      $last_name = strtoupper(trim($_POST['last_name']));
      $token = bin2hex(random_bytes(50));

      // echo $remarks.' '.$password.' '.$username.' '.$phone_number.' '.$email.' '.$middle_name.' '.$first_name.' '.$last_name;
      // $query = $dbconn->prepare("SELECT count(*) as count3 from mpro.doctors_request_join where username_=?");
      // $query->bindValue(1,$username);
      // $query->execute();
      // $row3 = $query->fetch(PDO::FETCH_ASSOC);
      $query = $dbconn->prepare("SELECT count(keyctr) as count12 from mpro.doctors_request_join where email_=? ");
      $query->bindValue(1,$email);
      $query->execute();
      $row12 = $query->fetch(PDO::FETCH_ASSOC);

      $query = $dbconn->prepare("SELECT count(keyctr) as count13 from mpro.doctors_current_address where email=? ");
      $query->bindValue(1,$email);
      $query->execute();
      $row13 = $query->fetch(PDO::FETCH_ASSOC);

      if ($row12['count12'] == 0 && $row13['count13'] == 0) {

      $query = $dbconn->prepare("SELECT count(keyctr) as count1 from mpro.doctors_request_join where last_name=? and first_name=? ");
      $query->bindValue(1,$last_name);
      $query->bindValue(2,$first_name);
      $query->execute();
      $row1 = $query->fetch(PDO::FETCH_ASSOC);
      // echo $row1['count1'];
      
      $query = $dbconn->prepare("SELECT keyctr from mpro.doctors_request_join order by keyctr desc");
      $query->execute();
      $row2 = $query->fetch(PDO::FETCH_ASSOC);
      if (!empty($row2['keyctr'])) {
        $get_id = 'NXN-'.$row2['keyctr']+1;
      }else{
        $get_id = 'NXN-1';
      }
      
      if ($row1['count1'] == 0) {
        
        $password_ = $_POST['password'];
        $odpwwd='Ze^=g3r@m3l3H4nd0m0n=^rO';
        $password= hash_hmac('sha256', $password_, $odpwwd);

        $query = $dbconn->prepare("INSERT INTO mpro.doctors_request_join (last_name,first_name,email_,phone_number,remarks_,date_,time_,id_,token_)values(?,?,?,?,?,?,?,?,?)");
        $query->bindValue(1,$last_name);
        $query->bindValue(2,$first_name);
        $query->bindValue(3,$email);
        $query->bindValue(4,$phone_number);
        $query->bindValue(5,$remarks);
        $query->bindValue(6,$date_);
        $query->bindValue(7,$time_);
        $query->bindValue(8,$get_id);
        $query->bindValue(9,$token);
        $query->execute();
        // $row1 = $query->fetch(PDO::FETCH_ASSOC);

        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();        
                           
        $mail->Host  = 'smtp.gmail.com';                
        // $mail->Host  = 'smtp.nexen.com.ph';                 
        $mail->SMTPAuth = true;                         
        // $mail->Username = 'nexendrive@gmail.com'; 
        $mail->Username = 'medixpro.care@gmail.com';           
        // $mail->Password = 'eohgzocefqycmuqq';                 
        $mail->Password = 'ucvxnpvtvzytdzdt';                   
        $mail->SMTPSecure = 'ssl';                          
        $mail->Port  = 465;
        // $mail->setFrom('nexendrive@gmail.com', 'clairekensalindo');     
        $mail->setFrom('medixpro.care@gmail.com', 'MEDIXPRO');     
        $mail->addAddress($email);
        // $mail->addAddress('claireken@nexen.com.ph');
        // $link = 'localhost/new_medixpro/step_3/?token='.$token.'&id_='.$get_id;
        // $link = 'http://20.239.153.207:81/18-001/MEDIPRO/medixpro/step_3/?token='.$token.'&id_='.$get_id;
        // $link = 'http://20.239.153.207:81/18-001/MEDIPRO_TESTING/medixpro/step_3/?token='.$token.'&id_='.$get_id;
        $link = 'medixpro.ph/step_3/?token='.$token.'&id_='.$get_id;
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
            <img src="https://medixpro.ph/images/logo/main-logo.PNG" height="100" width="200">
            <table class="center" style="width: 50%;float: center;">
              <thead>
                <tr style="height: 100px">
                  <td style="font-size: 30px;"><b>HELLO DR. '.$first_name.' '.$last_name.'</b></td>
                </tr>
                <tr>
                  <td style="font-size: 20px;"><b>Please Verify your Email Address</b></td>
                </tr>
                <tr>
                  <td style="font-size: 20px;"><b>to start using MIDEXPRO, we need to verify your email ID <span style="color: #00A3FF"><i>'.$email.'</i></span></b></td>
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

        $sales = new PHPMailer(true);
        $sales->isSMTP();
        $sales->Host  = 'smtp.gmail.com';                
        // $mail->Host  = 'smtp.nexen.com.ph';                 
        $sales->SMTPAuth = true;                         
        // $mail->Username = 'nexendrive@gmail.com'; 
        $sales->Username = 'medixpro.care@gmail.com';           
        // $mail->Password = 'eohgzocefqycmuqq';                 
        $sales->Password = 'ucvxnpvtvzytdzdt';                   
        $sales->SMTPSecure = 'ssl';                          
        $sales->Port  = 465;
        // $mail->setFrom('nexendrive@gmail.com', 'clairekensalindo');     
        $sales->setFrom('medixpro.care@gmail.com', 'MEDIXPRO');     
        $sales->addAddress('sales@nexen.com.ph');
        // $sales->addAddress('claireken.r.salindo@gmail.com');
        $sales->isHTML(true);                                
        $sales->Subject = 'MEDIXPRO - Interested - Dr.'.$first_name.' '.$last_name;
        $sales->Body = '
          <!DOCTYPE html>
            <html>
            <head>
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            </head>
            <body class="container" style="text-align: left;">
                <div class="card-body">
                  <h5 class="card-title">Name: '.$first_name.' '.$last_name.'</h5>
                  <h5 class="card-title">Email: '.$email.'</h5>
                  <h5 class="card-title">Mobile Number: '.$phone_number.'</h5>
                </div>
              </div>
            </div>
            </body>
            </html>
        ';
        $sales->AltBody = '';
        $sales->send();
        echo '0';
      }else{
        $query = $dbconn->prepare("SELECT * from mpro.doctors_request_join where last_name=? and first_name=? and middle_name=? ");
        $query->bindValue(1,$last_name);
        $query->bindValue(2,$first_name);
        $query->bindValue(3,$middle_name);
        $query->execute();
        $row4 = $query->fetch(PDO::FETCH_ASSOC);
        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            
        $mail->Host  = 'smtp.gmail.com';                 
        $mail->SMTPAuth = true;                         
        // $mail->Username = 'nexendrive@gmail.com'; 
        $mail->Username = 'medixpro.care@gmail.com';           
        // $mail->Password = 'eohgzocefqycmuqq';                 
        $mail->Password = 'ucvxnpvtvzytdzdt';   
        $mail->SMTPSecure = 'SSL/TLS';                          
        $mail->Port  = 465;
        // $mail->setFrom('nexendrive@gmail.com', 'clairekensalindo');     
        $mail->setFrom('medixpro.care@gmail.com');     
        $mail->addAddress($email);
        // $mail->addAddress('claireken@nexen.com.ph');
        // $link = 'localhost/new_medixpro/step_3/?token='.$token.'&id_='.$get_id;
        // $link = 'http://20.239.153.207:81/18-001/MEDIPRO/medixpro/step_3/?token='.$token.'&id_='.$get_id;
        // $link = 'http://20.239.153.207:81/18-001/MEDIPRO_TESTING/medixpro/step_3/?token='.$token.'&id_='.$get_id;
        $link = 'medixpro.ph/step_3/?token='.$token.'&id_='.$get_id;
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
            <img src="https://medixpro.ph/images/logo/main-logo.PNG" height="100" width="200">
            <table class="center" style="width: 50%;float: center;">
              <thead>
                <tr style="height: 100px">
                  <td style="font-size: 30px;"><b>HELLO DR. '.$first_name.' '.$last_name.'</b></td>
                </tr>
                <tr>
                  <td style="font-size: 20px;"><b>Please Verify your Email Address</b></td>
                </tr>
                <tr>
                  <td style="font-size: 20px;"><b>to start using MIDEXPRO, we need to verify your email ID <span style="color: #00A3FF"><i>'.$email.'</i></span></b></td>
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
        echo '1';
      }
    }else{
      echo '2';
    }
    }

    if (isset($_POST['save1'])) {

      require 'PHPMailer/Exception.php';
      require 'PHPMailer/PHPMailer.php';
      require 'PHPMailer/SMTP.php';

      $id = trim($_POST['idno']);
      $license_no = trim($_POST['license_no']);
      $password = trim($_POST['password']);
      $odpwwd='Ze^=g3r@m3l3H4nd0m0n=^rO';
      $password_= hash_hmac('sha256', $password, $odpwwd);
      $status = 'true';
      $query = $dbconn->prepare("UPDATE mpro.doctors_request_join SET password_=?, license_no=?, status_=? WHERE id_=?");
      $query->bindValue(1,$password_);
      $query->bindValue(2,$license_no);
      $query->bindValue(3,$status);
      $query->bindValue(4,$id);
      $query->execute();

      $query = $dbconn->prepare("SELECT * from mpro.doctors_request_join where license_no=?");
      $query->bindValue(1,$license_no);
      $query->execute();
      $row5 = $query->fetch(PDO::FETCH_ASSOC);

      $last_name = $row5['last_name'];
      $first_name = $row5['first_name'];
      $middle_name = $row5['middle_name'];
      $remarks = $row5['remarks_'];
      $phone_number = $row5['phone_number'];
      $email_ = $row5['email_'];

      $code = '1004';
      $expire = '2030-12-31 00:00:00';
      $acc_status = 'Active';
      $iden= $first_name.' '.$last_name;
      $query = $dbconn->prepare("INSERT INTO xmain.policy_users (usrn,pwd,identification,access_status,expiration,idno,gp_code)values(?,?,?,?,?,?,?)");
      $query->bindValue(1,$license_no);
      $query->bindValue(2,$password_);
      $query->bindValue(3,$iden);
      $query->bindValue(4,$acc_status);
      $query->bindValue(5,$expire);
      $query->bindValue(6,$license_no);
      $query->bindValue(7,$code);
      $query->execute();

      $query = $dbconn->prepare("INSERT INTO mpro.doctors_profile (last_name,first_name,middle_name,remarks,cid,licensed_no)values(?,?,?,?,?,?)");
      $query->bindValue(1,$last_name);
      $query->bindValue(2,$first_name);
      $query->bindValue(3,$middle_name);
      $query->bindValue(4,$remarks);
      $query->bindValue(5,$license_no);
      $query->bindValue(6,$license_no);
      $query->execute();

      $query = $dbconn->prepare("INSERT INTO mpro.doctors_current_address (cid,mobile,email)values(?,?,?)");
      $query->bindValue(1,$license_no);
      $query->bindValue(2,$phone_number);
      $query->bindValue(3,$email_);
      $query->execute();

      $query = $dbconn->prepare("DELETE FROM mpro.doctors_request_join WHERE license_no=?");
      $query->bindValue(1,$license_no);
      $query->execute();

      $sales = new PHPMailer(true);
        $sales->isSMTP();
        $sales->Host  = 'smtp.gmail.com';                
        // $mail->Host  = 'smtp.nexen.com.ph';                 
        $sales->SMTPAuth = true;                         
        // $mail->Username = 'nexendrive@gmail.com'; 
        $sales->Username = 'medixpro.care@gmail.com';           
        // $mail->Password = 'eohgzocefqycmuqq';                 
        $sales->Password = 'ucvxnpvtvzytdzdt';                   
        $sales->SMTPSecure = 'ssl';                          
        $sales->Port  = 465;
        // $mail->setFrom('nexendrive@gmail.com', 'clairekensalindo');     
        $sales->setFrom('medixpro.care@gmail.com', 'MEDIXPRO');     
        $sales->addAddress('sales@nexen.com.ph');
        // $sales->addAddress('claireken.r.salindo@gmail.com');
        $sales->isHTML(true);                                
        $sales->Subject = 'MEDIXPRO - Verify - Dr.'.$first_name.' '.$last_name;
        $sales->Body = '
          <!DOCTYPE html>
            <html>
            <head>
            </head>
            <body class="container" style="text-align: left;">
                <div class="card-body">
                  <h5 class="card-title">Name: '.$first_name.' '.$last_name.'</h5>
                  <h5 class="card-title">Email: '.$email.'</h5>
                  <h5 class="card-title">Mobile Number: '.$phone_number.'</h5>
                </div>
              </div>
            </div>
            </body>
            </html>
        ';
        $sales->AltBody = '';
        $sales->send();

    }
?>