<?php
session_start();

if(isset($_POST['login'])){
	
	include('db.php');
	
	
	$uid=mysqli_real_escape_string($con,$_POST['username']);
	
	$pwd=mysqli_real_escape_string($con,$_POST['password']);

	
	if(empty($uid)||empty($pwd)){
		header("Location: ../index.php?login=empty");
		//echo "<script>window.alert('Input Fields are empty!')</script>";
		
		//echo "<script>alert('Email or password is incorrect!')</script>"; 
		//exit();	
		
	}else{
		
		$sql="SELECT * FROM users WHERE username='$uid'";
		 //echo $sql;
		//return;
		
		$result=mysqli_query($con,$sql);
		$resultCheck=mysqli_num_rows($result);

		if($resultCheck<1){			
			header("Location: ../index.php?login=credentialserror");
			//echo "resultchk";
			//return;
                        exit();
	
		}else{
			if($row=mysqli_fetch_assoc($result)){
			if(password_verify($pwd, $row['password'])){
                           // echo $pwd."<br>";
                            //echo  $row['password'];
                           // return;
				//login the user here
					$_SESSION['u_id']=$row['username'];
					$_SESSION['u_name']=$row['name'];
					$_SESSION['u_email']=$row['email'];
					$_SESSION['u_pwd']=$row['password'];
					$_SESSION['id']=$row['id'];
					$_SESSION['flat']=$row['flat_no'];
					
					$_SESSION['u_level']=$row['user_level'];
                                        //echo "Session";
                                        //return;
				
				include( '../messaging/database_connection.php' );
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$sub_query = "
				INSERT INTO login_details 
				(user_id) 
				VALUES ('".$row['id']."')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				$_SESSION['login_details_id'] = $connect->lastInsertId();
				
					if($row['user_level']==1){
						
						//echo "1"; 
						
						header("Location: ../caretaker/caretaker.php");
						exit();	
					}
					else if($row['user_level']==4){
							//echo "2"; 
						
						header("Location: ../tenant/tenant.php");
						exit();	
					}
					else if($row['user_level']==3){
		
						//echo "3"; 
						header("Location: ../admin/admin.php");
						exit();	
					}
					else{
						//echo "4"; 
						header("Location: ../lanlord/lanlord.php");
						exit();
						
					}
					
				}else{				
				
                  header("Location: ../index.php?login=passworderror");
				}
				
			}
			
		}
        }
}else{

	header("Location: ../index.php?login=error");
	//echo "login error";
	//echo "<script>window.alert('Invalid User Name or Password')</script>";
	exit();
	
}

?>