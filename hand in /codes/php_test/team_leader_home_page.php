<?php
session_start();
?>
<!doctype html>
<html>
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Team Leader Home page</title>
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
				<?php include 'inc/teamleader_menu.php'; ?>
           </div>
            <div class="col-md-9">
                <a href="team_leader_home_page.php">Current Project</a>
				<table data-toggle="table"
				data-url="team_leader_home_page_list.php" data-cache="false" data-search="true"
					data-show-columns="true" data-show-refresh="true"
					data-show-toggle="true">
					<thead>
						<tr>
							<th data-field="project_ID" data-switchable="false">Project ID</th>
						 <th data-field="project_name">Project Name</th>
							<th data-field="customer_company" data-visible="true">Customer Company Name</th>
							<th data-field="customer_home_phone" data-visible="true">Customer Phone</th>
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