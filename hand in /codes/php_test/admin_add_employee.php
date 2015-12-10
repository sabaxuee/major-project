<?php
session_start();
include 'inc/mysqli.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//$result = $mysqli -> query("SELECT max(employee_ID) as c from employee");
	//$row = $result->fetch_assoc();
	//$count = $row['c'];
	//$count = $count + 1;
	$stmt = $mysqli -> prepare("INSERT INTO employee(first_name,last_name,username,gender,birthday,password,address,postcode,salary,status,department_ID,email,cell_phone,home_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt -> bind_param('ssssssssssisss', $_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['gender'], $_POST['birthday'], $_POST['password'], $_POST['address'], $_POST['postcode'], $_POST['salary'], $_POST['status'], $_POST['department_ID'], $_POST['email'], $_POST['cell_phone'], $_POST['home_phone']);
	$stmt -> execute();
	$stmt -> close();

	header("location:admin_maintain_employee.php");
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin add Employee</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-table.min.css" rel="stylesheet">
		<link href="css/bootstrap-formhelpers.min.css" rel="stylesheet" media="screen">
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
					<form action="admin_add_employee.php" method="post" id="frmEmployee" name="frmEmployee">
						<label>Please insert the new employee information </label>
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" name="first_name" id="first_name" placeholder="first_name">
						</div>

						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" name="last_name" id="last_name" placeholder="last_name">
						</div>

						<div class="form-group">
							<label for="username">username</label>
							<input type="text" class="form-control" name="username" id="username" placeholder="username">
						</div>
						<div class="form-group">
							<label for="gender">Gender</label>
							<input type="text" class="form-control" name="gender" id="gender" placeholder="gender">
						</div>
						<div class="form-group">
							<label for="gender">Birthday</label>
							<input id="birthday" name="birthday" type="hidden"  >
							<div id="datepicker" class="bfh-datepicker" class="datepicker" data-format="y-m-d"></div>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="text" class="form-control" name="password" id="password" placeholder="password">
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="address" id="address" placeholder="address">
						</div>
						<div class="form-group">
							<label for="postcode">Postcode</label>
							<input type="text" class="form-control" name="postcode" id="postcode" placeholder="postcode">
						</div>
						<div class="form-group">
							<label for="salary">Salary</label>
							<input type="text" class="form-control" name="salary" id="salary" placeholder="salary">
						</div>
						<div class="form-group">
							<label for="status">Status</label>
							<select name="status" id="status" class="form-control">
									<option value="employee">Employee</option>
									<option value="administrator">Administrator</option>
									<option value="teamleader">Team Leader</option>
							</select>
						</div>
						<div class="form-group">
							<label for="department_ID">Department ID</label>
							<select name="department_ID" id="department_ID" class="form-control">
								<option value=""></option>
								<?php
								if ($result = $mysqli -> query("SELECT * from department")) {

								while ($row = $result -> fetch_assoc()) {
									?><option value="<?=$row['department_ID'] ?>"><?=$row['department_name'] ?></option><?php
									}
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="email">
						</div>
						<div class="form-group">
							<label for="cell_phone">Cell Phone</label>
							<input name="cell_phone" type="text" class="form-control bfh-phone" data-format="+1 (ddd) ddd-dddd">
						</div>
						<div class="form-group">
							<label for="home_phone">Home Phone</label>
							<input name="home_phone" type="text" class="form-control bfh-phone" data-format="+1 (ddd) ddd-dddd">
						</div>
						<input class="btn btn-default" type="submit" value="Add">
					</form>
				</div>

			</div>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/bootstrap-formhelpers.min.js"></script>
			<script>
				$('#datepicker').on('change.bfhdatepicker', function() {
					$('#birthday').val($('#datepicker').val());
				});
				$("#maintain_emp").addClass("active");
			</script>
	</body>
</html>