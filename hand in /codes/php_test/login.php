<?php
session_start();
include 'inc/mysql.php';
ob_start();
$servername = "localhost";
$dbname = "php_test";

// Create connection
mysql_select_db("php_test") or die("cannot select DB");

// username and password sent from form
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM employee WHERE username = '$username'and password = '$password'";
$result = mysql_query($sql) or die(mysql_error());
// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if ($count == 1) {
	$row = mysql_fetch_array($result);

	if ($row['status'] == 'employee') {
		echo $row['status'];
		//Register $username, $password and redirect to file
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['status'] = 'employee';
		$_SESSION['employee_ID'] = $row['employee_ID'];
		header("location:emp_home.php");

	} elseif ($row['status'] == 'administrator') {

		echo $row['status'];

		// Register $username, $password and redirect to file
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['status'] = 'administrator';
		$_SESSION['employee_ID'] = $row['employee_ID'];
		header("location:admin_home.php");

	} elseif ($row['status'] == 'teamleader') {

		echo $row['status'];

		// Register $username, $password and redirect to file
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['status'] = 'teamleader';
		$_SESSION['employee_ID'] = $row['employee_ID'];
		header("location:team_leader_home_page.php");

	} else {
		echo "there's no such infor";
	}

} else {

	echo "Wrong Username or Password";

}

ob_end_flush();
?>