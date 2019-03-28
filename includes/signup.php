<?php

if(isset($_POST['submit'])){
	
	include_once('db.php');
	$uid=mysqli_real_escape_string($con, $_POST['username']);
	$email=mysqli_real_escape_string($con, $_POST['eamil']);
	$pwd=mysqli_real_escape_string($con, $_POST['password']);
	
	
	

	//Error handers////
	//Check for empty field
	
	
	if(empty($uid)||empty($email)||empty($pwd)){	
	//header("Location: ../index.php?signup=empty");
	echo "<script>alert('Fields empty!')</script>"; 
	//header("Location: ../index.php");
	exit();
		
	}
	else{
		
		//Check if input character are valid
		if(!preg_match("/^[a-zA-Z0-9]*$/",$uid)){
			
		header("Location: ../index.php?signup=invalid");
		exit();
		
		}else{
			
			//check if email is valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				
				header("Location: index.php?signup=email");
				exit();
			}else{
				
				$sql="SELECT * FROM users WHERE  user_uid='$uid'";
				
				$result=mysqli_query($con,$sql);
				
				$resultCheck=mysqli_num_rows($result);
				
				if($resultCheck>0)
				{
					header("Location: ../index.php?signup=usertaken");
					exit();
					
				}
				else{
					
					//Hashing the password
                    $hashpassword = password_hash($pwd, PASSWORD_BCRYPT);

					//$hashPwd=password_hash($pwd,PASSWORD_DEFAULT);
					
					
					
					//insert  the user into database
					
					$sql="INSERT INTO users(username,email,password,user_level)  VALUES ('$uid','$email','$hashpassword',4)";
					echo $sql;
					//echo $sql;
					//return; 
					mysqli_query($con,$sql);
					
			
					header("Location: ../index.php?signup=empty");
					exit();
					
					
				}
				
				
			}
			
		}
		
	}
	
	
}
else{

	header("Location: ../index.php");
	exit();	
}




?>