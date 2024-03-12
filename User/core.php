<?php 
    //core 1
    $score1 = 0;
    $query1 = $dbconn->prepare("SELECT * FROM core11 where id=? and year=? ");
    $query1->bindParam(1, $id);
    $query1->bindParam(2, $current_year);
    $query1->execute();
    $row1 = $query1->fetch(PDO::FETCH_ASSOC);
    if ($row1['points'] == $row1['max']) {
        $score1 = $score1 + 1;
    }else{
        $score1 = 0;
    }

    $score2 = 0;
    $query2 = $dbconn->prepare("SELECT * FROM core12 where id=? and year=? ");
    $query2->bindParam(1, $id);
    $query2->bindParam(2, $current_year);
    $query2->execute();
    $row2 = $query2->fetch(PDO::FETCH_ASSOC);
    if ($row2['points'] == $row2['max']) {
        $score2 = $score2 + 1;
    }else{
        $score2 = 0;
    }

    $score3 = 0;
    $query3 = $dbconn->prepare("SELECT * FROM core13 where id=? and year=? ");
    $query3->bindParam(1, $id);
    $query3->bindParam(2, $current_year);
    $query3->execute();
    $row3 = $query3->fetch(PDO::FETCH_ASSOC);
    if ($row3['points'] == $row3['max']) {
        $score3 = $score3 + 1;
    }else{
        $score3 = 0;
    }

    $score4 = 0;
    $query4 = $dbconn->prepare("SELECT * FROM core14 where id=? and year=? ");
    $query4->bindParam(1, $id);
    $query4->bindParam(2, $current_year);
    $query4->execute();
    $row4 = $query4->fetch(PDO::FETCH_ASSOC);
    if ($row4['points'] == $row4['max']) {
        $score4 = $score4 + 1;
    }else{
        $score4 = 0;
    }

    $score5 = 0;
    $query5 = $dbconn->prepare("SELECT * FROM core15 where id=? and year=? ");
    $query5->bindParam(1, $id);
    $query5->bindParam(2, $current_year);
    $query5->execute();
    $row5 = $query5->fetch(PDO::FETCH_ASSOC);
    if ($row5['points'] == $row5['max']) {
        $score5 = $score5 + 1;
    }else{
        $score5 = 0;
    }

    $score6 = 0;
    $query6 = $dbconn->prepare("SELECT * FROM core16 where id=? and year=? ");
    $query6->bindParam(1, $id);
    $query6->bindParam(2, $current_year);
    $query6->execute();
    $row6 = $query6->fetch(PDO::FETCH_ASSOC);
    if ($row6['points'] == $row6['max']) {
        $score6 = $score6 + 1;
    }else{
        $score6 = 0;
    }

    $score7 = 0;
    $query7 = $dbconn->prepare("SELECT * FROM core17 where id=? and year=? ");
    $query7->bindParam(1, $id);
    $query7->bindParam(2, $current_year);
    $query7->execute();
    $row7 = $query7->fetch(PDO::FETCH_ASSOC);
    if ($row7['points'] == $row7['max']) {
        $score7 = $score7 + 1;
    }else{
        $score7 = 0;
    }

    $total_score1 = $score1+$score2+$score3+$score4+$score5+$score6+$score7;

    //core 2
    $score21 = 0;
    $query21 = $dbconn->prepare("SELECT * FROM core21 where id=? and year=? ");
    $query21->bindParam(1, $id);
    $query21->bindParam(2, $current_year);
    $query21->execute();
    $row21 = $query21->fetch(PDO::FETCH_ASSOC);
    if ($row21['points'] == $row21['max']) {
        $score21 = $score21 + 1;
    }

    $score22 = 0;
    $query22 = $dbconn->prepare("SELECT * FROM core22 where id=? and year=? ");
    $query22->bindParam(1, $id);
    $query22->bindParam(2, $current_year);
    $query22->execute();
    $row22 = $query22->fetch(PDO::FETCH_ASSOC);
    if ($row22['points'] == $row22['max']) {
        $score22 = $score22 + 1;
    }

    $score23 = 0;
    $query23 = $dbconn->prepare("SELECT * FROM core23 where id=? and year=? ");
    $query23->bindParam(1, $id);
    $query23->bindParam(2, $current_year);
    $query23->execute();
    $row23 = $query23->fetch(PDO::FETCH_ASSOC);
    if ($row23['points'] == $row23['max']) {
        $score23 = $score23 + 1;
    }

    $total_score2 = $score21+$score22+$score23;

    //core 3
    $score31 = 0;
    $query31 = $dbconn->prepare("SELECT * FROM core31 where id=? and year=? ");
    $query31->bindParam(1, $id);
    $query31->bindParam(2, $current_year);
    $query31->execute();
    $row31 = $query31->fetch(PDO::FETCH_ASSOC);
    if ($row31['points'] == $row31['max']) {
        $score31 = $score31 + 1;
    }

    $score32 = 0;
    $query32 = $dbconn->prepare("SELECT * FROM core32 where id=? and year=? ");
    $query32->bindParam(1, $id);
    $query32->bindParam(2, $current_year);
    $query32->execute();
    $row32 = $query32->fetch(PDO::FETCH_ASSOC);
    if ($row32['points'] == $row32['max']) {
        $score32 = $score32 + 1;
    }

    $score33 = 0;
    $query33 = $dbconn->prepare("SELECT * FROM core33 where id=? and year=? ");
    $query33->bindParam(1, $id);
    $query33->bindParam(2, $current_year);
    $query33->execute();
    $row33 = $query33->fetch(PDO::FETCH_ASSOC);
    if ($row33['points'] == $row33['max']) {
        $score33 = $score33 + 1;
    }

    $score34 = 0;
    $query34 = $dbconn->prepare("SELECT * FROM core34 where id=? and year=? ");
    $query34->bindParam(1, $id);
    $query34->bindParam(2, $current_year);
    $query34->execute();
    $row34 = $query34->fetch(PDO::FETCH_ASSOC);
    if ($row34['points'] == $row34['max']) {
        $score34 = $score34 + 1;
    }

    $score35 = 0;
    $query35 = $dbconn->prepare("SELECT * FROM core35 where id=? and year=? ");
    $query35->bindParam(1, $id);
    $query35->bindParam(2, $current_year);
    $query35->execute();
    $row35 = $query35->fetch(PDO::FETCH_ASSOC);
    if ($row35['points'] == $row35['max']) {
        $score35 = $score35 + 1;
    }

    $score36 = 0;
    $query36 = $dbconn->prepare("SELECT * FROM core36 where id=? and year=? ");
    $query36->bindParam(1, $id);
    $query36->bindParam(2, $current_year);
    $query36->execute();
    $row36 = $query36->fetch(PDO::FETCH_ASSOC);
    if ($row36['points'] == $row36['max']) {
        $score36 = $score36 + 1;
    }

    $total_score3 = $score31+$score32+$score33+$score34+$score35+$score36;
 ?>