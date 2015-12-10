<?php
include 'inc/session.php';
include 'inc/mysqli.php';
$employee = null;
$updated = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$stmt = $mysqli->prepare("UPDATE employee SET first_name=?,last_name=?,address=?,postcode=?,email=?,cell_phone=?,home_phone=? WHERE employee_ID=?");
	$stmt->bind_param('sssssssi',
	$_POST['first_name'],
	$_POST['last_name'],
	$_POST['address'],
	$_POST['postcode'],
	$_POST['email'],
	$_POST['cell_phone'],
	$_POST['home_phone'],
	$_POST['employee_ID']);
	$stmt->execute();
	$stmt->close();
	$updated = true;
}
$result = $mysqli -> query("SELECT * from employee where username='".$_SESSION['username']."'");
$employee = $result->fetch_object();
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Update Information</title>
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
			<h1>Welcome <?= $_SESSION['username'] ?>!</h1>
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
					<form role="form" action="update_information.php" method="post" id="frmEmp" name="frmEmp">
						<input type="hidden" name="employee_ID" value="<?=$employee -> employee_ID ?>">
						<label>Update information </label>
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" name="first_name" id="first_name" placeholder="first Name" value="<?=$employee -> first_name ?>">
						</div>

						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" name="last_name" id="last_name" placeholder="last Name" value="<?=$employee -> last_name ?>">
						</div>

						<div class="address">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" id="address" placeholder="address" value="<?=$employee -> address ?>">
						</div>

						<div class="form-group">
							<label for="postcode">Post Code</label>
							<input type="text" class="form-control" name="postcode" id="postcode" placeholder="postcode" value="<?=$employee -> postcode ?>">
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="email" value="<?=$employee -> email ?>">
						</div>

						<div class="form-group">
							<label for="cell_phone">Cell Phone</label>
							<input type="text" class="form-control" name="cell_phone" id="cell_phone" placeholder="cell_phone" value="<?=$employee -> cell_phone ?>">
						</div>

						<div class="form-group">
							<label for="home_phone">Home Phone</label>
							<input type="text" class="form-control" name="home_phone" id="home_phone" placeholder="home_phone" value="<?=$employee -> home_phone ?>">
						</div>

						<input class="btn btn-default" type="submit" value="Update">
					</form>
				</div>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-table.min.js"></script>
		<script>
			$("#update_info").addClass("active");
		</script>
		<?php
		if($updated){
			?>
			<script>
				alert('Update successful.')
			</script>
			<?php
		}
		?>
	</body>
</html>