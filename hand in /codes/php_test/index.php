
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>homepage</title>
</head>

<body>
<div id="wrapper">
  <header id="top"><img src="images/header.png" width="985" height="130"  alt="" margin-right="auto" margin-lefe="auto"/></header>
</div>

<!- login area css ->

<div style="text-align: center;">
<div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 480px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 50px auto auto;">
<div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">Enter username and password</span></div>
<div style="background: ; padding: 15px">
<style type="text/css" scoped>
td { text-align:left; font-family: verdana,arial; color: #064073; font-size: 1.00em; }
input { border: 1px solid #CCCCCC; border-radius: 5px; color: #666666; display: inline-block; font-size: 1.00em;  padding: 5px; width: 100%; }
input[type="button"], input[type="reset"], input[type="submit"] { height: auto; width: auto; cursor: pointer; box-shadow: 0px 0px 5px #0361A8; float: right; text-align:right; margin-top: 10px; margin-left:7px;}
table.center { margin-left:auto; margin-right:auto; }
.error { font-family: verdana,arial; color: #D41313; font-size: 1.00em; }
</style>

<!- login area form ->
<form method="post" action="login.php" name="form" target="_top">


<table class='center'>
<tr><td>Username:</td><td><input id="username" name="username" placeholder="username" type="text"></td></tr>
<tr><td>Password:</td><td><input id="password" name="password" placeholder="**********" type="password"></td></tr>
<tr><td>&nbsp;</td><td><input name="submit" type="submit" value=" Login "></td></tr>
<tr><td colspan=2>&nbsp;</td></tr>
<tr><td colspan=2>Forgot password? Find it<a href="forgot_password.php"> here!</a></td></tr>

</table>
</form>
</div></div></div>

<!end of login>

</body>
</html>


