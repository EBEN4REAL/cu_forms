<?php
require('../../includes/database/connect.db.php');
require('../../includes/functions/chat.func.php');


$messages = get_msg();
foreach ($messages as $message) {
	# code...
	echo '<img src="../../img/user.png"><strong>'.$message['sender'] . ' Sent' . '</strong>' . "<br>";
	echo $message['message']. "<br>" . "<br>";
}