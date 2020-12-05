<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "forbes";

$con = mysqli_connect($host, $user, $password, $db_name);
if(!$con){
	echo "unable to connect to database" . mysqli_connect_error();
	exit();
}
?>