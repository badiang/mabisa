<?php 
    //core 1
    $score41 = 0;
    $query41 = $dbconn->prepare("SELECT * FROM essen11 where id=? and year=? ");
    $query41->bindParam(1, $id);
    $query41->bindParam(2, $current_year);
    $query41->execute();
    $row41 = $query41->fetch(PDO::FETCH_ASSOC);
    if ($row41['points'] == $row41['max']) {
        $score41 = $score41 + 1;
    }

    $score42 = 0;
    $query42 = $dbconn->prepare("SELECT * FROM essen12 where id=? and year=? ");
    $query42->bindParam(1, $id);
    $query42->bindParam(2, $current_year);
    $query42->execute();
    $row42 = $query42->fetch(PDO::FETCH_ASSOC);
    if ($row42['points'] == $row42['max']) {
        $score42 = $score42 + 1;
    }

    $score43 = 0;
    $query43 = $dbconn->prepare("SELECT * FROM essen13 where id=? and year=? ");
    $query43->bindParam(1, $id);
    $query43->bindParam(2, $current_year);
    $query43->execute();
    $row43 = $query43->fetch(PDO::FETCH_ASSOC);
    if ($row43['points'] == $row43['max']) {
        $score43 = $score43 + 1;
    }

    $score44 = 0;
    $query44 = $dbconn->prepare("SELECT * FROM essen14 where id=? and year=? ");
    $query44->bindParam(1, $id);
    $query44->bindParam(2, $current_year);
    $query44->execute();
    $row44 = $query44->fetch(PDO::FETCH_ASSOC);
    if ($row44['points'] == $row44['max']) {
        $score44 = $score44 + 1;
    }

    $score45 = 0;
    $query45 = $dbconn->prepare("SELECT * FROM essen15 where id=? and year=? ");
    $query45->bindParam(1, $id);
    $query45->bindParam(2, $current_year);
    $query45->execute();
    $row45 = $query45->fetch(PDO::FETCH_ASSOC);
    if ($row45['points'] == $row45['max']) {
        $score45 = $score45 + 1;
    }

    $score46 = 0;
    $query46 = $dbconn->prepare("SELECT * FROM essen16 where id=? and year=? ");
    $query46->bindParam(1, $id);
    $query46->bindParam(2, $current_year);
    $query46->execute();
    $row46 = $query46->fetch(PDO::FETCH_ASSOC);
    if ($row46['points'] == $row46['max']) {
        $score46 = $score46 + 1;
    }

    $score47 = 0;
    $query47 = $dbconn->prepare("SELECT * FROM essen17 where id=? and year=? ");
    $query47->bindParam(1, $id);
    $query47->bindParam(2, $current_year);
    $query47->execute();
    $row47 = $query47->fetch(PDO::FETCH_ASSOC);
    if ($row47['points'] == $row47['max']) {
        $score47 = $score47 + 1;
    }

    $total_score4 = $score41+$score42+$score43+$score44+$score45+$score46+$score47;

    //core 2
    $score51 = 0;
    $query51 = $dbconn->prepare("SELECT * FROM essen21 where id=? and year=? ");
    $query51->bindParam(1, $id);
    $query51->bindParam(2, $current_year);
    $query51->execute();
    $row51 = $query51->fetch(PDO::FETCH_ASSOC);
    if ($row51['points'] == $row51['max']) {
        $score51 = $score51 + 1;
    }

    $score52 = 0;
    $query52 = $dbconn->prepare("SELECT * FROM essen22 where id=? and year=? ");
    $query52->bindParam(1, $id);
    $query52->bindParam(2, $current_year);
    $query52->execute();
    $row52 = $query52->fetch(PDO::FETCH_ASSOC);
    if ($row52['points'] == $row52['max']) {
        $score52 = $score52 + 1;
    }

    $score53 = 0;
    $query53 = $dbconn->prepare("SELECT * FROM essen23 where id=? and year=? ");
    $query53->bindParam(1, $id);
    $query53->bindParam(2, $current_year);
    $query53->execute();
    $row53 = $query53->fetch(PDO::FETCH_ASSOC);
    if ($row53['points'] == $row53['max']) {
        $score53 = $score53 + 1;
    }

    $total_score5 = $score51+$score52+$score53;

    //core 3
    $score61 = 0;
    $query61 = $dbconn->prepare("SELECT * FROM essen31 where id=? and year=? ");
    $query61->bindParam(1, $id);
    $query61->bindParam(2, $current_year);
    $query61->execute();
    $row61 = $query61->fetch(PDO::FETCH_ASSOC);
    if ($row61['points'] == $row61['max']) {
        $score61 = $score61 + 1;
    }

    $score62 = 0;
    $query62 = $dbconn->prepare("SELECT * FROM essen32 where id=? and year=? ");
    $query62->bindParam(1, $id);
    $query62->bindParam(2, $current_year);
    $query62->execute();
    $row62 = $query62->fetch(PDO::FETCH_ASSOC);
    if ($row62['points'] == $row62['max']) {
        $score62 = $score62 + 1;
    }

    $score63 = 0;
    $query63 = $dbconn->prepare("SELECT * FROM essen33 where id=? and year=? ");
    $query63->bindParam(1, $id);
    $query63->bindParam(2, $current_year);
    $query63->execute();
    $row63 = $query63->fetch(PDO::FETCH_ASSOC);
    if ($row63['points'] == $row63['max']) {
        $score63 = $score63 + 1;
    }

    $total_score6 = $score61+$score62+$score63;
 ?>