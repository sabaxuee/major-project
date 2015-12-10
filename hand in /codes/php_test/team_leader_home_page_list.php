<?php
include 'inc/encrypt.php';
include 'inc/mysqli.php';
header('Content-Type:application/json');
$myArray = array();
if ($result = $mysqli->query("SELECT project.project_name, project.project_ID, customer.customer_company, customer.customer_home_phone
from project
inner join customer
on project.customer_ID=customer.customer_ID")) {

    while($row = $result->fetch_object()) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();
?>