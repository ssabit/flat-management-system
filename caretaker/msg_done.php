<?php
session_start();
if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
include_once("../includes/db.php");

$service_id = $_GET['id'];
$user_id=$_SESSION['id'];
echo "service_id: ".$service_id."<br>";
echo "user_id:".$user_id;
//return;

$sql="UPDATE service SET status=1 WHERE id=$service_id";
$result = mysqli_query($con,$sql);

header("Location: send_msg.php");


?>