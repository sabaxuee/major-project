<?php
include 'inc/encrypt.php';
include 'inc/mysqli.php';
header('Content-Type:application/json');
$myArray = array();
if ($result = $mysqli->query("select
    a.project_ID,
    a.project_name,
	a.project_status,
    CONCAT_WS(' ',b.customer_company,b.customer_first_name,b.customer_last_name) as company,
	CONCAT_WS(' ',c.first_name,c.last_name) as employee_name,
	department_name
from
    project a
        left outer join customer b
            on a.customer_ID=b.customer_ID
		left outer join employee c
			on a.team_leader_ID = c.employee_ID
		left outer join department d
			on a.department_ID = d.department_ID")) {

    while($row = $result->fetch_object()) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();
?>