<?php 
    //core 1
    $score41 = 0;
    $query41 = $dbconn->prepare("SELECT * FROM essen11 where id=? and year=? ");
    $query41->bindParam(1, $id);
    $query41->bindParam(2, $val);
    $query41->execute();
    $row41 = $query41->fetch(PDO::FETCH_ASSOC);
    if (empty($row41['max'])) {
        $max41 = 10;
        $score41 = 0;
    }else{
        $max41 = $row41['max'];
        if ($row41['points'] == $row41['max']) {
            $score41 = $score41 + 1;
        }
    }
    

    $score42 = 0;
    $query42 = $dbconn->prepare("SELECT * FROM essen12 where id=? and year=? ");
    $query42->bindParam(1, $id);
    $query42->bindParam(2, $val);
    $query42->execute();
    $row42 = $query42->fetch(PDO::FETCH_ASSOC);
    if (empty($row42['max'])) {
        $max42 = 10;
        $score42 = 0;
    }else{
        $max42 = $row42['max'];
        if ($row42['points'] == $row42['max']) {
            $score42 = $score42 + 1;
        }
    }
    

    $score43 = 0;
    $query43 = $dbconn->prepare("SELECT * FROM essen13 where id=? and year=? ");
    $query43->bindParam(1, $id);
    $query43->bindParam(2, $val);
    $query43->execute();
    $row43 = $query43->fetch(PDO::FETCH_ASSOC);
    if (empty($row43['max'])) {
        $max43 = 10;
        $score43 = 0;
    }else{
        $max43 = $row43['max'];
        if ($row43['points'] == $row43['max']) {
            $score43 = $score43 + 1;
        }
    }
    

    $score44 = 0;
    $query44 = $dbconn->prepare("SELECT * FROM essen14 where id=? and year=? ");
    $query44->bindParam(1, $id);
    $query44->bindParam(2, $val);
    $query44->execute();
    $row44 = $query44->fetch(PDO::FETCH_ASSOC);
    if (empty($row44['max'])) {
        $max44 = 10;
        $score44 = 0;
    }else{
        $max44 = $row44['max'];
        if ($row44['points'] == $row44['max']) {
            $score44 = $score44 + 1;
        }
    }
    

    $score45 = 0;
    $query45 = $dbconn->prepare("SELECT * FROM essen15 where id=? and year=? ");
    $query45->bindParam(1, $id);
    $query45->bindParam(2, $val);
    $query45->execute();
    $row45 = $query45->fetch(PDO::FETCH_ASSOC);
    if (empty($row45['max'])) {
        $max45 = 10;
        $score45 = 0;
    }else{
        $max45 = $row45['max'];
        if ($row45['points'] == $row45['max']) {
            $score45 = $score45 + 1;
        }
    }
    

    $score46 = 0;
    $query46 = $dbconn->prepare("SELECT * FROM essen16 where id=? and year=? ");
    $query46->bindParam(1, $id);
    $query46->bindParam(2, $val);
    $query46->execute();
    $row46 = $query46->fetch(PDO::FETCH_ASSOC);
    if (empty($row46['max'])) {
        $max46 = 10;
        $score46 = 0;
    }else{
        $max46 = $row46['max'];
        if ($row46['points'] == $row46['max']) {
            $score46 = $score46 + 1;
        }
    }
    

    $score47 = 0;
    $query47 = $dbconn->prepare("SELECT * FROM essen17 where id=? and year=? ");
    $query47->bindParam(1, $id);
    $query47->bindParam(2, $val);
    $query47->execute();
    $row47 = $query47->fetch(PDO::FETCH_ASSOC);
    if (empty($row47['max'])) {
        $max47 = 10;
        $score47 = 0;
    }else{
        $max47 = $row47['max'];
        if ($row47['points'] == $row47['max']) {
            $score47 = $score47 + 1;
        }
    }
    

    $total_score4 = $score41+$score42+$score43+$score44+$score45+$score46+$score47;
    $total_max4 = $max41+$max42+$max43+$max44+$max45+$max46+$max47;

    //core 2
    $score51 = 0;
    $query51 = $dbconn->prepare("SELECT * FROM essen21 where id=? and year=? ");
    $query51->bindParam(1, $id);
    $query51->bindParam(2, $val);
    $query51->execute();
    $row51 = $query51->fetch(PDO::FETCH_ASSOC);
    if (empty($row51['max'])) {
        $max51 = 10;
        $score51 = 0;
    }else{
        $max51 = $row51['max'];
        if ($row51['points'] == $row51['max']) {
            $score51 = $score51 + 1;
        }
    }
    

    $score52 = 0;
    $query52 = $dbconn->prepare("SELECT * FROM essen22 where id=? and year=? ");
    $query52->bindParam(1, $id);
    $query52->bindParam(2, $val);
    $query52->execute();
    $row52 = $query52->fetch(PDO::FETCH_ASSOC);
    if (empty($row52['max'])) {
        $max52 = 10;
        $score52 = 0;
    }else{
        $max52 = $row52['max'];
        if ($row52['points'] == $row52['max']) {
            $score52 = $score52 + 1;
        }
    }
    

    $score53 = 0;
    $query53 = $dbconn->prepare("SELECT * FROM essen23 where id=? and year=? ");
    $query53->bindParam(1, $id);
    $query53->bindParam(2, $val);
    $query53->execute();
    $row53 = $query53->fetch(PDO::FETCH_ASSOC);
    if (empty($row53['max'])) {
        $max53 = 10;
        $score53 = 0;
    }else{
        $max53 = $row53['max'];
        if ($row53['points'] == $row53['max']) {
            $score53 = $score53 + 1;
        }
    }
    

    $total_score5 = $score51+$score52+$score53;
    $total_max5 = $max51+$max52+$max53;

    //core 3
    $score61 = 0;
    $query61 = $dbconn->prepare("SELECT * FROM essen31 where id=? and year=? ");
    $query61->bindParam(1, $id);
    $query61->bindParam(2, $val);
    $query61->execute();
    $row61 = $query61->fetch(PDO::FETCH_ASSOC);
    if (empty($row61['max'])) {
        $max61 = 10;
        $score61 = 0;
    }else{
        $max61 = $row61['max'];
        if ($row61['points'] == $row61['max']) {
            $score61 = $score61 + 1;
        }
    }
    

    $score62 = 0;
    $query62 = $dbconn->prepare("SELECT * FROM essen32 where id=? and year=? ");
    $query62->bindParam(1, $id);
    $query62->bindParam(2, $val);
    $query62->execute();
    $row62 = $query62->fetch(PDO::FETCH_ASSOC);
    if (empty($row62['max'])) {
        $max62 = 10;
        $score62 = 0;
    }else{
        $max62 = $row62['max'];
        if ($row62['points'] == $row62['max']) {
            $score62 = $score62 + 1;
        }
    }
    

    $score63 = 0;
    $query63 = $dbconn->prepare("SELECT * FROM essen33 where id=? and year=? ");
    $query63->bindParam(1, $id);
    $query63->bindParam(2, $val);
    $query63->execute();
    $row63 = $query63->fetch(PDO::FETCH_ASSOC);
    if (empty($row63['max'])) {
        $max63 = 10;
        $score63 = 0;
    }else{
        $max63 = $row63['max'];
        if ($row63['points'] == $row63['max']) {
            $score63 = $score63 + 1;
        }
    }
    

    $total_score6 = $score61+$score62+$score63;
    $total_max6 = $max61+$max62+$max63;

    $grand_total_score2 = $total_score4+$total_score5+$total_score6;
    $grand_total_max2 = $total_max4+$total_max5+$total_max6;

    $grand_total_score3 = $grand_total_score1+$grand_total_score2;
    $grand_total_max3 = $grand_total_max1+$grand_total_max2;

    if ($grand_total_score3 == $grand_total_max3) {
        $query = $dbconn->prepare("UPDATE assessment SET status='1' where id=? and year=?");
        $query->bindParam(1, $id);
        $query->bindParam(2, $val);
        $query->execute();
    }
 ?>