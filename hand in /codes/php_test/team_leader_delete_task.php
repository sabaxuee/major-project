<?php
session_start();
include 'inc/mysqli.php';
if(isset($_GET['id'])){
	$stmt = $mysqli->prepare("delete from task where task_ID=?");
	$stmt->bind_param('i', $_GET['id']);
	$stmt->execute(); 
	$stmt->close();
	header("location:team_leader_manage_project.php");
}
?>