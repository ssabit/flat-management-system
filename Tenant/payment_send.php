<?php
    ob_start();
    session_start();
    if($_SESSION['u_id']==NULL){
        //haven't log in
        header("Location: ../index.php?login=error");
    }
    include_once("../includes/db.php");
    
    $rent_id = $_GET['id'];
    $user_id=$_SESSION['id'];
    $fltno=$_SESSION['flat'];
    $uname=$_SESSION['u_id'];
    echo "Rent id: ".$rent_id."<br>";
    echo "user_id:".$user_id;
    //return;
    
    $sql="Select * from money where user_id=$user_id";
    $result = mysqli_query($con,$sql);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck<1){
    	//echo "<script>window.alert('You Don't have an account for payment! Please Contact to Care Taker.')</script>";
    	header("Location: rent_details.php?account=null");
    }
    else{
		$res = mysqli_fetch_array($result);
		$mybalance=$res['balance'];
		echo "my balance".$mybalance;
		//return;
		$sql1="Select * from rent where rent_id=$rent_id";
		$result1 = mysqli_query($con,$sql1);
		$row = mysqli_fetch_array($result1);
		//$ebill=$row['electricity-bill'];
		$mybill=$row['total'];
		echo "my total bill". $mybill;
	
		$sql="Select * from money where user_id=7";
		$result=mysqli_query($con,$sql);
		$res = mysqli_fetch_array($result);
		$ctbalance=$res['balance'];
		echo "Care taker Balance". $ctbalance;

	
	$update_balance=$mybalance-$mybill;
	//$a=$update_balance;
	//return;

	if($update_balance<=0){
	
		header("Location: rent_details.php?balance=less");
		exit();
		
	}else{

		$date = new DateTime();
    	$date->setTimeZone(new DateTimeZone("Asia/Dhaka"));
    	$get_datetime = $date->format('l, F dS, Y g:i A');
		
		//Tanent Update money
		$sql="UPDATE money SET balance=$update_balance WHERE user_id=$user_id";
		mysqli_query($con,$sql);
		
		//Tanent insert payment history
		$sql="INSERT INTO payment_history(sender,receiver,balance_before,amount,balance_after,date) VALUES($user_id,7,$mybalance,$mybill,$update_balance,'$get_datetime')" ;
		mysqli_query( $con,$sql);
		
		//Caretaker update money
		$ctupdatebalance=$ctbalance+$mybill;
		$query="UPDATE money SET balance=$ctupdatebalance WHERE user_id=7";
		mysqli_query($con,$query);

		//Care Taker  payment history calculation
		$ctupdatebalance=$ctbalance+$mybill;

		$sql="INSERT INTO payment_history(sender,receiver,balance_before,amount,balance_after,date,checked) VALUES($user_id,7,$ctbalance,$mybill,$ctupdatebalance,'$get_datetime',1)" ;
		$res=mysqli_query( $con,$sql);

		$sql="UPDATE rent SET status=1 WHERE rent_id=$rent_id";
		mysqli_query($con,$sql);
		
		//////////////////////////////////invoice///////////
		
		$sql="SELECT * FROM `flat` where user_id=$user_id";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$frnet=$row['flatrent'];
		$broadband=$row['broadband'];
		$cabletv=$row['cabletv'];
		$gas=$row['gas'];
		$water=$row['water'];
		$maintainance=$row['maintenance'];
		
		$sql1="Select * from rent where rent_id=$rent_id";
		$result1 = mysqli_query($con,$sql1);
		$row = mysqli_fetch_array($result1);
		$ebill=$row['electricity-bill'];
		$mybill=$row['total'];
		
		$sql="INSERT INTO  invoice(flat_no,user_id,name,flatrent,broadband,cabletv,gas,water,maintenance,electricity,total,date) VALUES('$fltno',$user_id,'$uname',$frnet,$broadband,$cabletv,$gas,$water,$maintainance,$ebill,$mybill,'$get_datetime')" ;
		mysqli_query($con,$sql);
		//echo $sql;
		//return;
		header("Location: rent_details.php?payment=success");
	}
}
?>