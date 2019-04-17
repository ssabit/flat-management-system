<?php

//insert_chat.php
session_start();
require __DIR__ . '/Twilio/autoload.php';
use Twilio\Rest\Client;
//echo "active".$_SESSION['active'];

include('database_connection.php');



$data = array(
 ':to_user_id'  => $_POST['to_user_id'],
 ':from_user_id'  => $_SESSION['user_id'],
 ':chat_message'  => $_POST['chat_message'],
 ':status'   => '1'
);
    date_default_timezone_set('Asia/Dhaka');
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($_POST['to_user_id'], $connect);
	 if($user_last_activity > $current_timestamp)
	 {

		$_SESSION['active']=1;
	 }
	 else
	 {

		 $_SESSION['active']=0;
	 }

//$date = new DateTime();
//$get_datetime =$date->setTimeZone( new DateTimeZone( "Asia/Dhaka" ) );

$query = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status,timestamp) 
VALUES (:to_user_id, :from_user_id, :chat_message, :status,'$current_timestamp')
";

$statement = $connect->prepare($query);

if( $_SESSION['active']==1){
	
if($statement->execute($data))
{

 echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
}

}else{
	
if($statement->execute($data))
{
 	//echo "inactive";
	echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
	
	$to_user_level=get_user_level($_POST['to_user_id'], $connect);
	
	if($to_user_level==1){
			// Your Account SID and Auth Token from twilio.com/console
			$account_sid = 'ACba2a3cfdad2c2fcc9b9c08a25cee905d';
			$auth_token = '4bfe883b3c6fff9c886d8c7370ba17eb';
			// In production, these should be environment variables. E.g.:
			// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
			// A Twilio number you own with SMS capabilities
			$twilio_number = "+18337572726";
			$client = new Client($account_sid, $auth_token);
			$client->messages->create(
			// Where to send a text message (your cell phone?)
			'+8801671763399',
			array(
				'from' => $twilio_number,
				'body' => $_POST['chat_message']
		)
			);
	}
}
	
	
}



?>