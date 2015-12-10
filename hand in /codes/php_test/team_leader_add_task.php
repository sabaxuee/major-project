<?php
session_start();
include 'inc/mysqli.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//$result = $mysqli -> query("SELECT max(task_ID) as c from task");
	//$row = $result->fetch_assoc();
	//$count = $row['c'];
	//$count = $count + 1;
	$stmt = $mysqli->prepare("INSERT INTO task(task_name,project_ID,employee_ID,estimate_time) VALUES (?, ?, ?, ?)");
	$stmt->bind_param('siii',
	$_POST['task_name'],
	$_POST['project_ID'],
	$_POST['employee_ID'],
	$_POST['estimate_time']);
	$stmt->execute();
	$stmt->close();
	header("location:team_leader_manage_project.php");
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>team leader add task</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" id="layout-css" href="css/layout.min.css"
		type="text/css" media="all">
		<link href="css/style.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="js/comment-reply.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div class="head_img_container">
				<img src="images/header.png" alt="" class="img-responsive"
				alt="Responsive image" />
			</div>
			&nbsp;
			<h1>Welcome <?= $_SESSION['username'] ?> !</h1>
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						<a href="team_leader_home_page.php" class="list-group-item">Home</a>
						<a href="team_leader_manage_project.php" class="list-group-item  active">Manage Project</a>
						<a href="update_information.php" class="list-group-item">Update Information</a>
						<a href="change_password.php" class="list-group-item">Change Password</a>
						<a href="communication.php" class="list-group-item">Communication</a>
						<a href="logout.php" class="list-group-item">Log Out</a>
					</div>
				</div>

				<div class="col-md-9">
					<form action="team_leader_add_task.php" method="post" id="frmTask" name="frmTask">
						<label>Please insert the new task information </label>
						<div class="form-group">
							<label for="task_name">Task Name</label>
							<input type="text" class="form-control" name="task_name" id="task_name" placeholder="Task Name">
						</div>
						<div class="from-group">
							<label for="project_ID">Project Name</label>
							<select name="project_ID" id="project_ID" class="form-control">
								<?php
									if ($result = $mysqli -> query("SELECT * from project")) {

										while ($row = $result -> fetch_assoc()) {
										?><option value="<?=$row['project_ID'] ?>"><?=$row['project_name'] ?></option><?php
										}
									}
								?>
							</select>
						</div>
						<div class="from-group">
							<label for="employee_ID">Employee Name</label>
							<select name="employee_ID" id="employee_ID" class="form-control">
								<?php
									if ($result = $mysqli -> query("SELECT * from employee")) {

										while ($row = $result -> fetch_assoc()) {
										?><option value="<?=$row['employee_ID'] ?>"><?=$row['first_name'] ?>&nbsp;<?=$row['last_name'] ?> </option><?php
										}
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="estimate_time">Estimated Time</label>
							<input type="text" class="form-control" name="estimate_time" id="estimate_time" placeholder="Estimated Time">
						</div>

						<input class="btn btn-default" type="submit" value="Add">
						</form>
				</div>

			</div>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</body>
</html>