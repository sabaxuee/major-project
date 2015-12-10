<?php
session_start();
include 'inc/encrypt.php';
include 'inc/mysqli.php';
header('Content-Type:application/json');
$myArray = array();
if ($result = $mysqli->query("SELECT project.project_ID,project.project_name, task.task_ID, task.task_name
from task
inner join project
on project.project_ID=task.project_ID
where employee_ID = ".$_SESSION['employee_ID'])) {

    while($row = $result->fetch_object()) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();
?>