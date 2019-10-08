<?php

require('../../includes/database/connect.db.php');
require('../../includes/functions/chat.func.php');

if (isset($_GET['sender']) && !empty($_GET['sender'])) {
	# code...
	$sender = $_GET['sender'];

	if(isset($_GET['message']) && !empty($_GET['message'])) {
		# code...
		$message = $_GET['message'];
	   if (send_msg($sender , $message)) {
	   		# code...
	   	echo '<div class="alert alert-success">Message  sent</div>';
	   	}else{
	   		echo "Message wasn't sent";
	   	}	
	}else{
		echo "";
	}
}else{
	echo 'No name was entered';
}

?>