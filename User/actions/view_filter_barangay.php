<?php
    error_reporting(E_ALL ^ E_NOTICE);
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

    $id = $_SESSION['id'];
    if (isset($_POST['view'])) {
        $region = $_POST['region'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $barangay = $_POST['barangay'];
        $assessment_year = $_POST['assessment_year'];
?>    
    <?php 
                                      // $stmt = $dbconn->prepare("SELECT COUNT(*) FROM pos.received_from where area_code=? and cmp_code=? ");
                                      $stmt = $dbconn->prepare("SELECT COUNT(*) FROM assessment where region_code=? and province_code=? and city_code=? and barangay_code=? and year=?");
                                      $stmt->bindParam(1, $region);
                                      $stmt->bindParam(2, $province);
                                      $stmt->bindParam(3, $city);
                                      $stmt->bindParam(4, $barangay);
                                      $stmt->bindParam(5, $assessment_year);
                                      $stmt->execute();
                                      $count = $stmt->fetchColumn();

                                      if ($count != 0) {
                                   ?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Region</th>
                                            <th>Province</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                            <th>Year</th>
                                            <th>Status</th>
                                            <th>Transaction Date & Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php if ($count > 10) { ?>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Region</th>
                                            <th>Province</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                            <th>Year</th>
                                            <th>Status</th>
                                            <th>Transaction Date & Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <?php } ?>
                                    <tbody>
                                        <?php 
                                        $num = 1;
                                        // $query = $dbconn->prepare("SELECT * FROM pos.received_from where area_code=? and cmp_code=? order by brand_name");
                                        $query = $dbconn->prepare("SELECT a.keyctr,a.id,a.year,a.date_time,a.status,c.region_name,d.province_name,e.city_name,f.barangay_name FROM assessment as a  inner join region as c on a.region_code=c.region_code inner join province as d on a.province_code=d.province_code inner join city as e on a.city_code=e.city_code inner join barangay as f on a.barangay_code=f.barangay_code where a.region_code=? and a.province_code=? and a.city_code=? and a.barangay_code=? and a.year=?");
                                        $query->bindParam(1, $region);
                                        $query->bindParam(2, $province);
                                        $query->bindParam(3, $city);
                                        $query->bindParam(4, $barangay);
                                        $query->bindParam(5, $assessment_year);
                                        $query->execute();
                                        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $row['date_time']);
                                            $formattedDate = $date->format('F j, Y g:i A');
                                       ?>
                                        <tr>
                                            <td><?php echo $num ?></td>
                                            <td><?php echo $row['region_name'] ?></td>
                                            <td><?php echo $row['province_name'] ?></td>
                                            <td><?php echo $row['city_name'] ?></td>
                                            <td><?php echo $row['barangay_name'] ?></td>
                                            <td><?php echo $row['year'] ?></td>
                                            <?if ($row['status'] == 0) {?>
                                                <td>Not Completed</td>
                                            <?}else{?>
                                                <td class="bg-success text-white">Completed</td>
                                            <?}?>
                                            <td><?php echo $formattedDate; ?></td>
                                            <td>
                                                <a href="view_other_barangay_file.php?tab=<?php echo $row['keyctr'].'/1' ?>" target="_blank" class="btn btn-sm btn-info">view</a>
                                              <!-- <a href="#" class="btn btn-sm btn-danger btn-circle" onclick="delete_user('<?php echo $row['id'] ?>')">
                                                  <i class="fas fa-trash"></i>
                                              </a> -->
                                            </td>
                                        </tr>
                                        <?php $num++;} ?>
                                    </tbody>
                                    <?php }else{ ?>
                                        <tbody>
                                            <tr>
                                                <td>No Results Found..</td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
<?php } ?>