<?php
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin home page</title>
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
			<h1>Welcome <?= $_SESSION['username'] ?>
			!</h1>
			<div class="row">
				<div class="col-md-3">
					<?php include 'inc/admin_menu.php'; ?>
				</div>

				<div class="col-md-9">
					<a href="admin_home.php">Currently Projects are:</a>
					<table data-toggle="table"=
					data-url="admin_maintain_project_list.php" data-cache="false" data-search="true"
					data-show-columns="true" data-show-refresh="true"
       				data-show-toggle="true">
						<thead>
							<tr>
								<th data-field="project_ID" data-switchable="false">Project ID</th>
								<th data-field="project_name">Project Name</th>
								<th data-field="project_status" data-visible="true">Project Status</th>
								<th data-field="company" data-visible="true">Company</th>
								<th data-field="employee_name" data-visible="true">Team Leader</th>
								<th data-field="department_name" data-visible="true">Department</th>
							</tr>
						</thead>
						<tbody>
							<tr></tr>
						</tbody>
					</table>

				</div>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-table.min.js"></script>
		<script>
			$("#home").addClass("active");
		</script>
	</body>
</html>