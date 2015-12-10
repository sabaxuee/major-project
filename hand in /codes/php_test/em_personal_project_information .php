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
		<div class="container">
		<div class="head_img_container">
			<img src="images/header.png" alt="" class="img-responsive"
				alt="Responsive image" />
		</div>
		&nbsp;
		<h1>Welcome <?= $_SESSION['username'] ?> !</h1>
		<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					<a href="emp_home.php" class="list-group-item active">Employee Home</a> 
                  <a href="em_personal_project_information.php" class="list-group-item">Personal Project 										Information</a> 
                  <a href="update_information.php" class="list-group-item">Update Information</a> 
                  <a href="change_password.php" class="list-group-item">Change Password</a> 
					<a href="communication.php" class="list-group-item">Communication</a>
		</div>
  		</div>
 
 
  <div class="main">
  
   <!-- Unnamed (Text Field) -->
      <div id="u51" class="ax_text_field">
        <input id="u51_input" type="text" value="Please insert task name or date"/>
      <input type="button">
      </div>
  
  <label>
  <blockquote>
    <h4>Today Task List </h4>
  </blockquote>
</label>
<table style="width:100%">
  <tr>
    <th>Task Name</th>
    <th>Task ID</th>
    <th>Project ID</th>
  </tr>
  <tr>
    <td>create index page</td>
    <td>t01_1</td>
    <td>p01</td>
  </tr>
  <tr>
    <td>create personal information page</td>
    <td>t01_2</td>
    <td>p01</td>
  </tr>
  <tr>
    <td>update information </td>
    <td>t01_3</td>
    <td>p01</td>
  </tr>
</table>
  
  <label>
  <blockquote>
    <h4>Tomorrow Task List </h4>
  </blockquote>
</label>
<table style="width:100%">
  <tr>
    <th>Task Name</th>
    <th>Task ID</th>
    <th>Project ID</th>
  </tr>
  <tr>
    <td>create customer page</td>
    <td>t01_4</td>
    <td>p01</td>
  </tr>
  <tr>
    <td>create change password page</td>
    <td>t01_5</td>
    <td>p01</td>
  </tr>
  <tr>
    <td>create commmunication </td>
    <td>t01_6</td>
    <td>p01</td>
  </tr>
</table>
</div>
  
</body>
</html>