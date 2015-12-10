<?php
// start our session first to save our variables
session_start();

$s = $_POST['seniority'];

// connect to database
$database = new PDO("mysql:dbname=php_test");

// prepare PDOStatement
$stmt = $database->prepare("SELECT * FROM mytable WHERE seniority=:seniority");
$stmt->bindValue(":seniority", $s);
$stmt->execute();

// get the results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$row = $results[0];
$salary = $row['salary'];

$_SESSION['salary'] = $salary;

header("Location: /php_test/admin_maintain_employee.php");

