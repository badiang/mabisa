<?php 
	function deletePointsCore36($id,$year,$dbconn,$area,$under,$numb)
	{
		$stmt = $dbconn->prepare("SELECT COUNT(*) FROM core36 where id=? and year=?");
		$stmt->bindParam(1, $id);
        $stmt->bindParam(2, $year);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		if ($count != 0) {
			$query = $dbconn->prepare("SELECT * from core36 where id=? and year=?");
            $query->bindParam(1, $id);
            $query->bindParam(2, $year);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $points = $row['points']-1;

            $insert = $dbconn->prepare("UPDATE core36 SET points=? where id=? and year=?");
            $insert->bindParam(1, $points);
            $insert->bindParam(2, $id);
            $insert->bindParam(3, $year);
            $insert->execute();

            $insert1 = $dbconn->prepare("UPDATE area_assessment_points SET comment$numb='',approved$numb='0' where user_id=? and year_=? and area_number=? and under_area=?");
            $insert1->bindParam(1, $id);
            $insert1->bindParam(2, $year);
            $insert1->bindParam(3, $area);
            $insert1->bindParam(4, $under);
            $insert1->execute();
		}
	}
 ?>