<?php 
    $query = $dbconn->prepare("SELECT * FROM assessment ");
    $query->bindParam(1, $region);
    $query->bindParam(2, $province);
    $query->bindParam(3, $city);
    $query->bindParam(4, $barangay);
    $query->bindParam(5, $assessment_year);
    $query->execute();
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {

    }
 ?>