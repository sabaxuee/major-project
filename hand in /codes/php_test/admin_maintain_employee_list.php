<?php
include 'inc/encrypt.php';
include 'inc/mysqli.php';
header('Content-Type:application/json');
$myArray = array();
if ($result = $mysqli->query("SELECT CONCAT_WS(' ',first_name,last_name) as employee_name, username, employee_ID, password, address, postcode, email, cell_phone, home_phone
from employee")) {

    while($row = $result->fetch_object()) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();
?>