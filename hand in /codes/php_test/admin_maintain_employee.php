<?php
include 'inc/session.php';
?>
<!doctype html>
<html>
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Admin Maintain Employee</title>
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
        	<a href="admin_add_employee.php">Create new Employee:</a>
            <table data-toggle="table"=
                   data-url="admin_maintain_employee_list.php" data-cache="false" data-search="true"
					data-show-columns="true" data-show-refresh="true"
       				data-show-toggle="true">
                <thead>
                <tr>
                    <th data-field="employee_ID" data-visible="true">Employee_ID</th>
                    <th data-field="employee_name" data-switchable="false">Employee Name</th>
                    <th data-field="username" data-switchable="false">Userame</th>
                    <th data-field="password" data-visible="true">Password</th>
                    <th data-field="address" data-visible="true">Address</th>
                    <th data-field="postcode" data-visible="true">postcode</th>
                    <th data-field="email" data-visible="true">Email</th>
                    <th data-field="cell_phone" data-visible="true">Cell Phone</th>
                    <th data-field="home_phone" data-visible="true">Home Phone</th>
                    <th data-field="employee_ID" data-formatter="editFormatter">Edit</th>
					<th data-field="employee_ID" data-formatter="deleteFormatter">Delete</th>
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
						return '<div class="btn btn-default center-block" onclick="editEmployee('+value+')">Edit</div>';
					}
				}
				function deleteFormatter(value){
					if(value){
						return '<div class="btn btn-default center-block" onclick="deleteEmployee('+value+')">Delete</div>';
					}
				}
				function editEmployee(value){
					location.href='admin_edit_emp.php?id='+value;
				}
				function deleteEmployee(value){
					if(confirm('Are you sure to delete Employee ID '+value+'?')){
						location.href='admin_delete_emp.php?id='+value;
					}
				}
				$("#maintain_emp").addClass("active");
			</script>

</body>
</html>