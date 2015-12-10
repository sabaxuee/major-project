<?php
include 'inc/encrypt.php';
include 'inc/mysqli.php';
header('Content-Type:application/json');
$myArray = array();
if ($result = $mysqli->query("SELECT project.project_ID, project.project_name, project.customer_ID, project.team_leader_ID, project.project_status 
from project")) {

    while($row = $result->fetch_object()) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();
?>