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
                                      $stmt = $dbconn->prepare("SELECT COUNT(*) FROM country as a inner join region as b on a.country_code=b.country_code inner join province as c on b.region_code=c.region_code inner join city as d on c.province_code=d.province_code inner join barangay as e on d.city_code=e.city_code");
                                      $stmt->execute();
                                      $count = $stmt->fetchColumn();

                                      if ($count != 0) {
                                   ?>
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>Region</th>
                                            <th>Province</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php if ($count > 10) { ?>
                                    <tfoot>
                                        <tr>
                                            <th>Country</th>
                                            <th>Region</th>
                                            <th>Province</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <?php } ?>
                                    <tbody>
                                        <?php 
                                        // $query = $dbconn->prepare("SELECT * FROM pos.received_from where area_code=? and cmp_code=? order by brand_name");
                                        $query = $dbconn->prepare("SELECT a.country_name,b.region_name,c.province_name,d.city_name,e.barangay_name,e.barangay_code FROM country as a inner join region as b on a.country_code=b.country_code inner join province as c on b.region_code=c.region_code inner join city as d on c.province_code=d.province_code inner join barangay as e on d.city_code=e.city_code");
                                        // $query->bindParam(1, $area_code);
                                        // $query->bindParam(2, $cmp_code);
                                        $query->execute();
                                        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                       ?>
                                        <tr>
                                            <td><?php echo $row['country_name'] ?></td>
                                            <td><?php echo $row['region_name'] ?></td>
                                            <td><?php echo $row['province_name'] ?></td>
                                            <td><?php echo $row['city_name'] ?></td>
                                            <td><?php echo $row['barangay_name'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info btn-circle" onclick="edit_location('<?php echo $row['barangay_code'] ?>')" data-toggle="modal" data-target="#editLocation">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger btn-circle" onclick="delete_location('<?php echo $row['barangay_code'] ?>')">
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