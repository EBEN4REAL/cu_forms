<?php


function get_msg(){
    $query = "SELECT * FROM chat ";
    global $connection;
    $run_query = mysqli_query( $connection , $query);
    $messages = array();
    while ($message = mysqli_fetch_assoc($run_query)) {
    	# code...
    	$messages[] = array('sender'=>$message['sender'], 'message'=>$message['message']);
   }
   return $messages;

}
function send_msg($sender , $message){
	global $connection;
  
  if (!empty($sender) && !empty($message)) {
  	# code...()
  	$sender = mysqli_real_escape_string($connection ,$sender);
  	$message = mysqli_real_escape_string($connection ,$message); 

  	$sql_query = "INSERT INTO chat (sender,message) VALUES ('$sender','$message')";


  	if ($run = mysqli_query($connection , $sql_query)) {
  		# code...
  		return true;
  	}else{
  		return false;
  	}
  }else{
  	return false;
  }
}

