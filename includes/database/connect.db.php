<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "medical_app";
$connection = mysqli_connect($db_host ,$db_user , $db_pass , $db_name );

if ($connection = mysqli_connect($db_host ,$db_user , $db_pass , $db_name )) {
	# code...
	$feedback[] =  "Connected to the server .." . "<br>";
	if ($database = mysqli_select_db($connection , $db_name )) {
		# code...
		echo "";
	}else{
		echo "";
	}
	
}else{
	$feedback[] =  "Couldn't establish connection with  the MYSQL server..<br>";
}