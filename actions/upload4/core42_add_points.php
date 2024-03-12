<?php 
	function addPointsCore42($id,$year,$dbconn)
	{
		$stmt = $dbconn->prepare("SELECT COUNT(*) FROM essen12 where id=? and year=?");
		$stmt->bindParam(1, $id);
        $stmt->bindParam(2, $year);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		if ($count == 0) {
			$points = 1;
			$insert = $dbconn->prepare("INSERT INTO essen12 (points,id,year) VALUES (?,?,?)");
            $insert->bindParam(1, $points);
            $insert->bindParam(2, $id);
            $insert->bindParam(3, $year);
            $insert->execute();
		}else{
			$query = $dbconn->prepare("SELECT * from essen12 where id=? and year=?");
            $query->bindParam(1, $id);
            $query->bindParam(2, $year);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $points = $row['points']+1;

            $insert = $dbconn->prepare("UPDATE essen12 SET points=? where id=? and year=?");
            $insert->bindParam(1, $points);
            $insert->bindParam(2, $id);
            $insert->bindParam(3, $year);
            $insert->execute();
		}
	}
 ?>