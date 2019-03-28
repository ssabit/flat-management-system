<?php
session_start();
if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
//including the database connection file
include("../includes/db.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$result = mysqli_query($con, "DELETE FROM money WHERE id=$id");
 
//redirecting to the display page 
header("Location: accounts.php");


?>
