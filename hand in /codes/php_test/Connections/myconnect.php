<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myconnect = "localhost:3306";
$database_myconnect = "php_test";
$username_myconnect = "root";
$password_myconnect = "root";
$myconnect = mysql_pconnect($hostname_myconnect, $username_myconnect, $password_myconnect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>