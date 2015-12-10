<?php
session_start();
header('Content-Type:application/json');

// Create connection
mysql_connect("localhost", "root", "") or die("cannot connect");
mysql_select_db("php_test") or die("cannot select DB");
$rows = array();

$sql = "SELECT * FROM project";
$result = mysql_query($sql) or die(mysql_error());
// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if ($count > 1) {
    while($r = mysql_fetch_array($result)) {
        $rows[] = $r;
    }
}

echo json_encode($rows);
?>