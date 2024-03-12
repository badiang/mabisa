<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('Asia/Manila');
    session_set_cookie_params(0);
    session_start();

    if(!$_SESSION['id']){ header('location:../actions/logout.php'); }
    require_once '../../actions/dbconn.php';
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    if (!$dbconn)
    {
      die("ERROR: Unable to connect to database.");
    }

$points = array();
$brgy = array();

$query2 = $dbconn->prepare("SELECT a.keyctr, a.id, a.year, f.barangay_name, SUM(area_points) AS points 
                           FROM assessment AS a 
                           INNER JOIN barangay AS f ON a.barangay_code = f.barangay_code 
                           INNER JOIN area_assessment_points AS b ON a.id = b.user_id 
                           GROUP BY f.barangay_name
                           HAVING points IS NOT NULL
                           ORDER BY points DESC
                           LIMIT 3");

$query2->execute();

while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
    $points[] = $row2['points'];
    $brgy[] = $row2['barangay_name'];
}

// Prepare the data to be sent as JSON
$data = array(
    'labels' => $brgy,      // Labels for the chart
    'points' => $points    // Data points for the chart
);

// Set the content type to JSON
header('Content-Type: application/json');

// Output the data as JSON
echo json_encode($data);
?>