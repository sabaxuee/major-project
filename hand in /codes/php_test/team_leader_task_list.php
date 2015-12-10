<?php
include 'inc/encrypt.php';
include 'inc/mysqli.php';
header('Content-Type:application/json');
$myArray = array();
if ($result = $mysqli->query("SELECT task_ID,task_name,project_name,CONCAT_WS(' ',first_name,last_name) as employee_name,estimate_time FROM task a,project b,employee c where a.project_ID = b.project_ID and a.employee_ID = c.employee_ID")) {

    while($row = $result->fetch_object()) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();
?>