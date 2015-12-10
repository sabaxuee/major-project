<?php
include 'inc/session.php';
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>admin maintain customer</title>
		<link href="style.css" rel="stylesheet" type="text/css">
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
					<a href="admin_add_new_customer.php">Create new Customer</a>
					<table data-toggle="table" data-search="true"
					data-url="admin_maintain_customer_list.php" data-cache="false"
					data-show-columns="true" data-show-refresh="true"
					data-show-toggle="true">
						<thead>
							<tr>
								<th data-field="customer_ID" data-visible="true">Customer ID</th>
								<th data-field="customer_company" data-visible="true">Company</th>
								<th data-field="customer_name" data-visible="true">name</th>
								<th data-field="customer_email" data-visible="true">Email</th>
								<th data-field="customer_address" data-visible="true">Address</th>
								<th data-field="customer_home_phone" data-visible="true">Home Number</th>
								<th data-field="customer_cell_phone" data-visible="true">Cell Number</th>
								<th data-field="payment_status" data-visible="true">Payment Status</th>
								<th data-field="customer_ID" data-formatter="editFormatter">Edit</th>
								<th data-field="customer_ID" data-formatter="deleteFormatter">Delete</th>
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
					if(value){
						return '<div class="btn btn-default center-block" onclick="editCustomer(' + value + ')">Edit</div>';
					}
				}

				function deleteFormatter(value) {
					if(value){
						return '<div class="btn btn-default center-block" onclick="deleteCustomer(' + value + ')">Delete</div>';
					}
				}

				function editCustomer(value) {
					location.href = 'admin_edit_customer.php?id=' + value;
				}

				function deleteCustomer(value) {
					if (confirm('Are you sure to delete Customer ID ' + value + '?')) {
						location.href = 'admin_delete_customer.php?id=' + value;
					}
				}
				$("#maintain_customer").addClass("active");
			</script>

	</body>
</html>