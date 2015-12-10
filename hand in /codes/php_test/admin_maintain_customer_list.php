<?php
include 'inc/encrypt.php';
include 'inc/mysqli.php';
header('Content-Type:application/json');
$myArray = array();
if ($result = $mysqli->query("SELECT customer_ID, customer_company, CONCAT_WS(' ',customer_first_name,customer_last_name) as customer_name, customer_email, customer_address, customer_home_phone, customer_cell_phone, payment_status
from customer")) {

    while($row = $result->fetch_object()) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();
?>