<?php
include 'inc/session.php';
include 'inc/mysqli.php';
$customer = null;
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$result = $mysqli -> query("SELECT * from customer where customer_ID=" . $_GET['id']);
	$customer = $result -> fetch_object();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$stmt = $mysqli -> prepare("UPDATE customer SET customer_company=?,customer_first_name=?,customer_last_name=?,customer_gender=?,customer_address=?,customer_post_code=?,customer_email=?,customer_home_phone=?,customer_cell_phone=?,payment_status=? WHERE customer_ID=?");
	$stmt -> bind_param('ssssssssssi', $_POST['customer_company'], $_POST['customer_first_name'], $_POST['customer_last_name'], $_POST['customer_gender'], $_POST['customer_address'], $_POST['customer_post_code'], $_POST['customer_email'], $_POST['customer_home_phone'], $_POST['customer_cell_phone'], $_POST['payment_status'], $_POST['customer_ID']);
	$stmt -> execute();
	$stmt -> close();
	header("location:admin_maintain_customer.php");
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin edit customer</title>
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
					<form action="admin_edit_customer.php" method="post" id="frmCustomer" name="frmCustomer">
						<input type="hidden" name="customer_ID" value="<?=$_GET['id'] ?>">
						</hidden>
						<label>Please update customer information </label>
						<div class="form-group">
							<label for="customer_company">Customer Company</label>
							<input type="text" class="form-control" name="customer_company" id="customer_company" placeholder="customer_company" value="<?=$customer -> customer_company ?>">
						</div>

						<div class="form-group">
							<label for="customer_first_name">Customer First Name</label>
							<input type="text" class="form-control" name="customer_first_name" id="customer_first_name" placeholder="customer_first_name" value="<?=$customer -> customer_first_name ?>">
						</div>

						<div class="form-group">
							<label for="customer_last_name">Customer Last Name</label>
							<input type="text" class="form-control" name="customer_last_name" id="customer_last_name" placeholder="customer_last_name" value="<?=$customer -> customer_last_name ?>">
						</div>

						<div class="form-group">
							<label for="customer_gender">Customer Gender</label>
							<input type="text" class="form-control" name="customer_Gender" id="customer_Gender" placeholder="customer_Gender" value="<?=$customer -> customer_gender ?>">
						</div>

						<div class="form-group">
							<label for="customer_address">Customer Address</label>
							<input type="text" class="form-control" name="customer_address" id="customer_address" placeholder="customer_address" value="<?=$customer -> customer_address ?>">
						</div>

						<div class="form-group">
							<label for="customer_post_code">Customer Post Code</label>
							<input type="text" class="form-control" name="customer_post_code" id="customer_post_code" placeholder="customer_post_code" value="<?=$customer -> customer_post_code ?>">
						</div>

						<div class="form-group">
							<label for="customer_email">Customer Email</label>
							<input type="text" class="form-control" name="customer_email" id="customer_email" placeholder="customer_email" value="<?=$customer -> customer_email ?>">
						</div>

						<div class="form-group">
							<label for="customer_home_phone">Customer home phone</label>
							<input type="text" class="form-control" name="customer_home_phone" id="customer_home_phone" placeholder="customer_home_phone" value="<?=$customer -> customer_home_phone ?>">
						</div>

						<div class="form-group">
							<label for="customer_cell_phone">Customer Cell phone</label>
							<input type="text" class="form-control" name="customer_cell_phone" id="customer_cell_phone" placeholder="customer_cell_phone" value="<?=$customer -> customer_cell_phone ?>">
						</div>

						<div class="form-group">
							<label for="payment_status">Payment status</label>
							<input type="text" class="form-control" name="payment_status" id="payment_status" placeholder="Payment Status" value="<?=$customer -> payment_status ?>">
						</div>

						<input class="btn btn-default" type="submit" value="Update">
					</form>
				</div>

			</div>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script>
				$("#maintain_customer").addClass("active");
			</script>
	</body>
</html>