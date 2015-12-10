<?php
include 'inc/session.php';
include 'inc/mysqli.php';
$project = null;
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$result = $mysqli -> query("SELECT * from project where project_ID=" . $_GET['id']);
	$project = $result -> fetch_object();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$stmt = $mysqli -> prepare("UPDATE project SET project_name=?, project_status=?, customer_ID=?, department_ID=?, team_leader_ID=? WHERE project_ID=?");
	$stmt -> bind_param('ssiiii', $_POST['project_name'], $_POST['project_status'], $_POST['customer_ID'], $_POST['department_ID'], $_POST['employee_ID'], $_POST['project_ID']);
	$stmt -> execute();
	$stmt -> close();
	header("location:admin_maintain_project.php");
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin edit project</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-table.min.css" rel="stylesheet">
		<link rel="stylesheet" id="layout-css" href="css/layout.min.css"
		type="text/css" media="all">
		<link href="css/style.css" rel="stylesheet" type="text/css">
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
					<?php include 'inc/admin_menu.php'; ?>
				</div>

				<div class="col-md-9">
					<form action="admin_edit_project.php" method="post" id="frmProject" name="frmProject">
						<input type="hidden" name="project_ID" value="<?=$_GET['id'] ?>">
						</hidden>
						<label>Please update project information </label>
						<div class="form-group">
							<label for="project_name">Project Name</label>
							<input type="text" class="form-control" name="project_name" id="project_name" placeholder="Project Name" value="<?=$project->project_name?>">
						</div>
						<div class="form-group">
							<label for="project_status">Project Status</label>
							<input type="text" class="form-control" name="project_status" id="project_status" placeholder="Project Status" value="<?=$project->project_status?>">
						</div>

						<div class="from-group">
							<label for="customer_ID">Customer Name</label>
							<select name="customer_ID" id="customer_ID" class="form-control">
								<option></option>
								<?php
								if ($result = $mysqli -> query("SELECT * from customer")) {
								
									while ($row = $result -> fetch_assoc()) {
										if($row['customer_ID'] == $project->customer_ID){
											?><option selected value="<?=$row['customer_ID'] ?>"><?=$row['customer_first_name'] ?> <?=$row['customer_last_name'] ?></option><?php
										}else{
											?><option value="<?=$row['customer_ID'] ?>"><?=$row['customer_first_name'] ?> <?=$row['customer_last_name'] ?></option><?php
										}
									}
								}
								?>
							</select>
						</div>

						<div class="from-group">
							<label for="department_ID">Department ID</label>
							<select name="department_ID" id="department_ID" class="form-control">
								<option></option>
								<?php
								if ($result = $mysqli -> query("SELECT * from department")) {
								
								while ($row = $result -> fetch_assoc()) {
										if($row['department_ID'] == $project->department_ID){
											?><option selected value="<?=$row['department_ID'] ?>"><?=$row['department_name'] ?></option><?php
										}else{
											?><option value="<?=$row['department_ID'] ?>"><?=$row['department_name'] ?></option><?php
										}
									}
								}
								
								?>
							</select>
						</div>

						<div class="from-group">
							<label for="employee_ID">Team Leader</label>
							<select name="employee_ID" id="employee_ID" class="form-control">
								<option></option>
								<?php
								if ($result = $mysqli -> query("SELECT * from employee")) {
								
								while ($row = $result -> fetch_assoc()) {
										if($row['employee_ID'] == $project->team_leader_ID){
											?><option selected value="<?=$row['employee_ID'] ?>"><?=$row['first_name'] ?>&nbsp;<?=$row['last_name'] ?></option><?php
										}else{
											?><option value="<?=$row['employee_ID'] ?>"><?=$row['first_name'] ?>&nbsp;<?=$row['last_name'] ?></option><?php
										}
									}
								}
								?>
							</select>
						</div>
						</br>
						<input class="btn btn-default" type="submit" value="Update">
					</form>
				</div>

			</div>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script>
				$("#maintain_project").addClass("active");
			</script>
	</body>
</html>