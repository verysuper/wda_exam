<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ff = "localhost";
$database_ff = "db00_q1";
$username_ff = "root";
$password_ff = "";
$ff = mysql_pconnect($hostname_ff, $username_ff, $password_ff) or trigger_error(mysql_error(),E_USER_ERROR); 
?>