<?php
session_start();
include 'inc/mysqli.php';
if(isset($_GET['id'])){
	$stmt = $mysqli->prepare("delete from project where project_ID=?");
	$stmt->bind_param('i', $_GET['id']);
	$stmt->execute(); 
	$stmt->close();
	header("location:admin_maintain_project.php");
}
?>