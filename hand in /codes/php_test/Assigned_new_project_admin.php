<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>new project assigned</title>
<link href="style.css" rel="stylesheet" type="text/css">
<!--style for nav-->
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

a {
    display: block;
    width: 200px;
    background-color: #dddddd;
}
</style>

<!-- style for table -->
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: left;
}
</style>

</head>

<body>

<div class="container">
  <div class="header"  id="wrapper">
  <header id="top"><img src="images/header.png" width="985" height="130"  alt="" margin-right="auto" margin-lefe="auto"/>
  
   <!-- Unnamed (Shape) -->
      <div id="u12" class="ax_paragraph">
        
        <!-- Unnamed () -->
        <div id="u13" class="text">
          <p><span>Welcome User !</span></p>
        </div>
      </div>
      
  </header>
  </div>
  
  <div class="nav" >
  
  <ul >
  <li><a href="admin_home.php">Home</a></li>
  <li><a href="admin_assign_new_project.php">Assign Project</a></li> 
  <li><a href="admin_maintain_employee.php">Employee Maintain</a></li> 
  <li><a href="admin_maintain_customer.php">Customer Maintain</a></li> 
  <li><a href="admin_maintain_project.php">Project Maintain</a></li> 
  <li><a href="update_information.php">Update Information</a></li> 
  <li><a href="change_password.php">Change Password</a></li> 
  <li><a href="communication.php">Communication</a></li> 
 
</ul>   
  </div>
  
  <div class="main" >
  
  	<div id="u1" class="ax_paragraph">
    
    <div id="display infor" align="left">You've assigned a new project!</div>
    
    <div id="u2" class="ax_paragraph">
    
    <div id="table display">
    <table style="width:100%">
  <tr>
    <th width="30%">Project Name</th>
    <th width="15%">Project ID</th>
    <th width="15%">Customer ID</th>
    <th width="22%">Customer Name</th>
    <th width="18%">Team Leader Name</th>
  </tr>
  <tr>
    <td>office manage system</td>
    <td>p01</td>
    <td>c002</td>
    <td>John Lee</td>
    <td>6046789876</td>
  </tr>
  <tr>
    <td>online booking system</td>
    <td>p02</td>
    <td>c005</td>
    <td>Paul Lee</td>
    <td>6046781234</td>
  </tr>
  <tr>
    <td>weather report application </td>
    <td>p04</td>
    <td>c007</td>
    <td>Mark Ma</td>
    <td>6046781111</td>
  </tr>
</table>
    </div>
 </div>   
</body>
</html>