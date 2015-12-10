<?php
include 'inc/session.php';
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Maintain Project</title>
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
					<a href="admin_add_new_project.php">Create new Project</a>
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
								<th data-field="project_ID" data-formatter="editFormatter">Edit</th>
								<th data-field="project_ID" data-formatter="deleteFormatter">Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr></tr>
						</tbody>
					</table>
				</div>
				<
			</div>
			<div id="confirm" class="modal hide fade">
				<div class="modal-body">
					Are you sure?
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">
						Delete
					</button>
					<button type="button" data-dismiss="modal" class="btn">
						Cancel
					</button>
				</div>
			</div>
			</form>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/bootstrap-table.min.js"></script>
			<script>
				function editFormatter(value) {
					return '<div class="btn btn-default center-block" onclick="editProject(' + value + ')">Edit</div>';
				}

				function deleteFormatter(value) {
					return '<div class="btn btn-default center-block" onclick="deleteProject(' + value + ')">Delete</div>';
				}

				function editProject(value) {
					location.href = 'admin_edit_project.php?id=' + value;
				}

				function deleteProject(value) {
					if (confirm('Are you sure to delete Project ID ' + value + '?')) {
						location.href = 'admin_delete_project.php?id=' + value;
					}
				}
				$("#maintain_project").addClass("active");

			</script>
		</div>
	</body>
</html>