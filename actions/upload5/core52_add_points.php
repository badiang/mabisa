<?php 
	function addPointsCore52($id,$year,$dbconn)
	{
		$stmt = $dbconn->prepare("SELECT COUNT(*) FROM essen22 where id=? and year=?");
		$stmt->bindParam(1, $id);
        $stmt->bindParam(2, $year);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		if ($count == 0) {
			$points = 1;
			$insert = $dbconn->prepare("INSERT INTO essen22 (points,id,year) VALUES (?,?,?)");
            $insert->bindParam(1, $points);
            $insert->bindParam(2, $id);
            $insert->bindParam(3, $year);
            $insert->execute();
		}else{
			$query = $dbconn->prepare("SELECT * from essen22 where id=? and year=?");
            $query->bindParam(1, $id);
            $query->bindParam(2, $year);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $points = $row['points']+1;

            $insert = $dbconn->prepare("UPDATE essen22 SET points=? where id=? and year=?");
            $insert->bindParam(1, $points);
            $insert->bindParam(2, $id);
            $insert->bindParam(3, $year);
            $insert->execute();
		}
	}
 ?>