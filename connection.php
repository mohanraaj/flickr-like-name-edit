<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "database_name";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Couldn`t establish connection");
mysql_select_db($mysql_database, $bd) or die("Unable to connect");

?>
