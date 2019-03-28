<?php

session_start();
if($_SESSION['u_id']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
session_unset(); 
session_destroy(); 
header("Location: ../index.php");
?>