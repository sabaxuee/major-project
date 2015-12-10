<?php
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Team Leader Manage Project</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-table.min.css" rel="stylesheet">
		<link rel="stylesheet" id="layout-css" href="css/layout.min.css"
		type="text/css" media="all">
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<form>
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
					<?php include 'inc/teamleader_menu.php'; ?>
				</div>
				<div class="col-md-9">
					<a href="team_leader_add_task.php">Insert a new task</a>
					<table data-toggle="table" data-search="true"
					data-url="team_leader_task_list.php" data-cache="false"
					data-show-columns="true" data-show-refresh="true"
       				data-show-toggle="true">
						<thead>
							<tr>
								<th data-field="task_ID">Task ID</th>
								<th data-field="task_name" data-switchable="false">Task Name</th>
								<th data-field="project_name">Project Name</th>
								<th data-field="employee_name" data-visible="true">Employee Name</th>
								<th data-field="estimate_time" data-visible="true">Estimated Hours</th>
								<th data-field="task_ID" data-formatter="editFormatter">Edit</th>
								<th data-field="task_ID" data-formatter="deleteFormatter">Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr></tr>
						</tbody>
					</table>
				</div>

			</div>
			<div id="confirm" class="modal hide fade">
			  <div class="modal-body">
			    Are you sure?
			  </div>
			  <div class="modal-footer">
			    <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
			    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
			  </div>
			</div>
			</form>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/bootstrap-table.min.js"></script>
			<script>
				function editFormatter(value){
					if(value){
						return '<div class="btn btn-default center-block" onclick="editTask('+value+')">Edit</div>';
					}
				}
				function deleteFormatter(value){
					if(value){
						return '<div class="btn btn-default center-block" onclick="deleteTask('+value+')">Delete</div>';
					}
				}
				function editTask(value){
					location.href='team_leader_edit_task.php?id='+value;
				}
				function deleteTask(value){
					if(confirm('Are you sure to delete Task ID '+value+'?')){
						location.href='team_leader_delete_task.php?id='+value;
					}
				}
				$("#manage_project").addClass("active");
			</script>
	</body>
</html>