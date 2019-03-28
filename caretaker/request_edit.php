<?php
session_start();


if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
?>

<?php

include_once("../includes/db.php");

//getting id from url
$id=$_GET['id'];

//return;

$solve=1;
//echo "solve";
//return;
$sql="UPDATE service SET status=$solve WHERE id=$id";

 $result = mysqli_query($con,$sql);
header("Location: requests.php");
?>