<?php
//error_reporting(0);
$msg = "";
if(isset($_POST['submit'])){
	if ($_POST['submit'] == 'Send') {

		$email = $_POST['email'];

		include 'inc/mysql.php';
		mysql_select_db("php_test") or die("cannot select DB");

		$query = mysql_query("select * from employee where email='$email'") or die(mysqli_error($con));

		if (mysql_num_rows($query) == 1) {
			 $row = mysql_fetch_array($query);

			require_once 'swift/swift_required.php';
			echo 1;
	        // Mail Transport
	        $transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
	            ->setUsername('egadalid@alligato.net') // Your Gmail Username
	            ->setPassword('Kassbella1'); // Your Gmail Password

	        // Mailer
	        $mailer = Swift_Mailer::newInstance($transport);

	        // Create a message
	        $message = Swift_Message::newInstance('SOMS Forgot Password')
	            ->setFrom(array('egadalid@gmail.com' => 'SOMS Administrator')) // can be $_POST['email'] etc...
	            ->setTo(array($email => $email)) // your email / multiple supported.
	            ->setBody('Your password is '.$row['password'], 'text/html');

	        // Send the message
	        $result = $mailer->send($message);

	        if ($result!=1) {
				$msg = 'Error sending email';
	        }else{
	        	$msg = 'Password sent. Go to <a href="index.php">login</a>.';
	        }
		} else {
			$msg = 'No user exist with this email ';

		}
	}

}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>forgot password</title>
	</head>

	<body>
		<div id="wrapper">
			<header id="top"><img src="images/header.png" width="985" height="130"  alt="" margin-right="auto" margin-lefe="auto"/>
			</header>
		</div>

		<div style="text-align: center;">
			<div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 480px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 50px auto auto;">
				<div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;">
					<span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">Forgot your password?
						<br>
						Enter your email address and we'll send your login information in a few minutes.</span>
				</div>
				<div style="background: ; padding: 15px">
					<style type="text/css" scoped>
						td {
							text-align: left;
							font-family: verdana, arial;
							color: #064073;
							font-size: 1.00em;
						}
						input {
							border: 1px solid #CCCCCC;
							border-radius: 5px;
							color: #666666;
							display: inline-block;
							font-size: 1.00em;
							padding: 5px;
							width: 100%;
						}
						input[type="button"], input[type="reset"], input[type="submit"] {
							height: auto;
							width: auto;
							cursor: pointer;
							box-shadow: 0px 0px 5px #0361A8;
							float: right;
							text-align: right;
							margin-top: 10px;
							margin-left: 7px;
						}
						table.center {
							margin-left: auto;
							margin-right: auto;
						}
						.error {
							font-family: verdana, arial;
							color: #D41313;
							font-size: 1.00em;
						}
					</style>
					<form method="post" action="forgot_password.php" name="aform" target="_top">
						<input type="hidden" name="action" value="lost2">
						<table class='center'>
							<tr>
								<td>Email:</td><td>
								<input type="text" name="email">
								</td>
								<td>&nbsp;&nbsp;&nbsp;
								<input type="submit" name="submit" value="Send" style="margin-top: 0px;">
								</td>
							</tr>
							<tr>
								<td colspan="2"><center><?=$msg?></center></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>