<?php
session_start();
include 'inc/mysqli.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$stmt = $mysqli -> prepare("UPDATE employee set password=? where username=?");
	$stmt -> bind_param('ss', $_POST['password'], $_SESSION['username']);
	$stmt -> execute();
	$stmt -> close();
	if($_SESSION['status'] == 'administrator'){
		header("location:admin_home.php");
	}
	if($_SESSION['status'] == 'employee'){
		header("location:emp_home.php");
	}
	if($_SESSION['status'] == 'teamleader'){
		header("location:team_leader_home_page.php");
	}
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Change Password</title>
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
			<h1>Welcome <?= $_SESSION['username'] ?>
			!</h1>
			<div class="row">
				<div class="col-md-3">
					<?php
					if($_SESSION['status'] == 'administrator'){
						include 'inc/admin_menu.php';
					}
					if($_SESSION['status'] == 'employee'){
						include 'inc/emp_menu.php';
					}
					if($_SESSION['status'] == 'teamleader'){
						include 'inc/teamleader_menu.php';
					}
					
					?>
				</div>

				<div class="col-md-9">
					<form action="change_password.php" method="post" id="frmAdmin" name="frmAdmin">
						<div class="form-group">
							<label for="password">Password</label>
							<input type="text" class="form-control" name="password" id="password" placeholder="Password">
						</div>

						<input class="btn btn-default" type="submit" value="Update">
					</form>
				</div>

			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			$( "#change_pass" ).addClass( "active" );
		</script>

	</body>
</html>