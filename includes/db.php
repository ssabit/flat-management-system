<?php
$dbServername="flatmanagementsystem-mysqldbserver.mysql.database.azure.com";
$dbUsername="sabit@flatmanagementsystem-mysqldbserver";
$dbPassword="Saad1234";
$dbname="flatmanagementsystem";


$con=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbname);

if($con){
	
	//echo "connected";
	
}
else
//echo " not connected";
?>