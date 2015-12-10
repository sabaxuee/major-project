<?php 
error_reporting(0);
if($_POST['submit']=='Send')
{

$email=$_POST['email'];
//code=password(db)?
$password = $_GET['activation_code'];
//connect to db
mysql_connect("localhost", "root", "root") or die("cannot connect");
mysql_select_db("php_test")or die("cannot select DB");

$query = mysqli_query($con,"select * from employee where email='$email'")
or die(mysqli_error($con)); 

 if (mysqli_num_rows ($query)==1) 
 {
//what's the $code and $message, what's the link should be
$password=rand(1000,9999);
$message="You activation link is: http://bing.fun2pk.com/resetpass.php?email=$email&code=$code";
mail($email, "ZatWing", $message);


header("location:psd_send_successfully.php");
// update password? is it necessary? 
$query2 = mysqli_query($con,"update employee set activation_code='$code' where email='$email' ")
or die(mysqli_error($con)); 
}
else
{
echo 'No user exist with this email ';

}}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>forgot password</title>
</head>

<body>
<div id="wrapper">
  <header id="top"><img src="images/header.png" width="985" height="130"  alt="" margin-right="auto" margin-lefe="auto"/></header>
</div>

<div style="text-align: center;">
	<div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 480px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 50px auto auto;">
	<div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">Forgot your password?<br>Enter your email address and we'll send your login information in a few minutes.</span></div>
	<div style="background: ; padding: 15px">
	<style type="text/css" scoped>
	td { text-align:left; font-family: verdana,arial; color: #064073; font-size: 1.00em; }
	input { border: 1px solid #CCCCCC; border-radius: 5px; color: #666666; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
	input[type="button"], input[type="reset"], input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #0361A8; float: right; text-align:right; margin-top: 10px; margin-left:7px;}
	table.center { margin-left:auto; margin-right:auto; }
	.error { font-family: verdana,arial; color: #D41313; font-size: 1.00em; }
	</style>
<form method="post" action="forgot_password.php" name="aform" target="_top">
<input type="hidden" name="action" value="lost2">
<table class='center'>
<tr><td>Email:</td>  <td><input type="text" name="email"></td>
  <td>&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Send" style="margin-top: 0px;"></td></tr>
</table>
</form>
</div></div></div>
</body>
</html>