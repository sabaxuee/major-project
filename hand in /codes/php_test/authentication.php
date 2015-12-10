<?php

if ($_POST['action'] == "login")
{
$database = new Database();

if ($

if ($administrator == true)
{
	header("Location: /php_test/admin_home.php");
} else [
	header("Location: /php_test/emp_home.php");
}
}

else if ($