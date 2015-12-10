<?php
session_start ();
?>
<!doctype html>
<html>
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Employee home page</title>
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
				<?php include 'inc/emp_menu.php'; ?>
  				</div>
            <div class="col-md-9">
                <a href="emp_home.php">Today tasks are:</a>
					<table data-toggle="table"
					data-url="emp_home_list.php" data-search="true"
					data-cache="false"
					data-show-columns="true" data-show-refresh="true"
					data-show-toggle="true">
						<thead>
							<tr>
								<th data-field="project_ID" data-switchable="false">Project ID</th>
                                <th data-field="project_name" data-switchable="false">Project Name</th>
								<th data-field="task_ID" data-visible="true">Task ID</th>
								<th data-field="task_name" data-visible="true">Task Name</th>
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
