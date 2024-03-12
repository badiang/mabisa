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

    if (isset($_POST['view'])) {
?>
    <?php 
                                      // $stmt = $dbconn->prepare("SELECT COUNT(*) FROM pos.received_from where area_code=? and cmp_code=? ");
                                      $stmt = $dbconn->prepare("SELECT COUNT(*) FROM account where account_type!=00");
                                      $stmt->execute();
                                      $count = $stmt->fetchColumn();

                                      if ($count != 0) {
                                   ?>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php if ($count > 10) { ?>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <?php } ?>
                                    <tbody>
                                        <?php 
                                        // $query = $dbconn->prepare("SELECT * FROM pos.received_from where area_code=? and cmp_code=? order by brand_name");
                                        $query = $dbconn->prepare("SELECT a.id,a.username,a.password,a.date,a.account_type,b.country_name,c.region_name,d.province_name,e.city_name,f.barangay_name FROM account as a inner join country as b on a.country_code=b.country_code inner join region as c on a.region_code=c.region_code inner join province as d on a.province_code=d.province_code inner join city as e on a.city_code=e.city_code inner join barangay as f on a.barangay_code=f.barangay_code where a.account_type!=00");
                                        // $query->bindParam(1, $area_code);
                                        // $query->bindParam(2, $cmp_code);
                                        $query->execute();
                                        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                       ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['password'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><?php echo $row['barangay_name'].', '.$row['city_name'].', '.$row['province_name'].', '.$row['region_name'].', '.$row['country_name'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info btn-circle" onclick="edit_user('<?php echo $row['id'] ?>')" data-toggle="modal" data-target="#editUser">
                                                  <i class="fas fa-edit"></i>
                                              </a>
                                              <a href="#" class="btn btn-sm btn-danger btn-circle" onclick="delete_user('<?php echo $row['id'] ?>')">
                                                  <i class="fas fa-trash"></i>
                                              </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <?php }else{ ?>
                                        <tbody>
                                            <tr>
                                                <td>No Results Found..</td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
<?php } ?>
