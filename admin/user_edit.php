<?php

session_start();

if($_SESSION['u_id']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
//echo "username: ".$_SESSION['u_id']."<br>";
//echo "email: ".$_SESSION['u_email'];
?>
<?php

if(isset($_POST['logout'])){
	
	header("Location: ../includes/logout.php");
	exit();
	
}
?>
<?php
// including the database connection file
include_once("../includes/db.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
	if(isset($_POST['userlevel']))$level=$_POST['userlevel'];
	else echo "<script>window.alert('not found');</script>";
   
    // checking empty fields
    if(empty($username) || empty($password) || empty($email)|| empty($level) ) {            
        if(empty($username)) {
            echo "<font color='red'>UserName field is empty.</font><br/>";
        }
        
        if(empty($password)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        } 
		 if(empty($level)) {
            echo "<font color='red'>Level field is empty.</font><br/>";
        } 
	
	} else {    
            
            $hashpassword = password_hash($password, PASSWORD_BCRYPT);
            
        $result = mysqli_query($con, "UPDATE users SET username='$username',password='$hashpassword',email='$email',user_level=$level WHERE id=$id");
       
		//$result = mysqli_query($con, "UPDATE users SET username='$username',password='$hashpassword',email='$email' WHERE id=$id");
		// echo $username;
        //echo $hashpassword;
        //echo $email;
        //echo $userlevel;
		//echo "$result";
		//return;
		
        header("Location: admin.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM users WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $username = $res['username'];
    $password = $res['password'];
    $email = $res['email'];
	$level=$res['user_level'];
}
?>



<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>User Edit</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/user.css">
</head>

<body>
	<div class="header">

		<!-- Logo -->
		<div class="logo">
			<ul>
				<li id="logo">Flat Management System</li>
				<li id="user">User:
					<?php echo $_SESSION['u_id'];?>
				</li><br>
				<form action="user_edit.php" method="post">
				
				<li id="button"><button  name="logout" type="submit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
				</li>
				</form>
			</ul>

		</div>



	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 ">
				<div class="list-group ">
					<a href="admin.php" class="list-group-item list-group-item-action">Users</a>
	

				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4>Edit User</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="user_edit.php" method="post">
									<div class="form-group row">
										<label for="username" class="col-4 col-form-label">User Name</label>

										<div class="col-8">
											<input id="username" name="username" placeholder="" class="form-control here" type="text" value="<?php echo $username;?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="level" class="col-4 col-form-label">User Level</label>
										<div class="col-8">
											<input id="userlevel" name="userlevel" placeholder="userlevel" class="form-control here" type="hidden" style="width:50%;float: left;" value="<?php echo $level?>" readonly >

											<SELECT class="custom-select" style="width:40%; margin-left:5px;   float:left;" onChange="this.form.userlevel.value=this.options[this.selectedIndex].value">
												<OPTION VALUE="">Select
													<OPTION VALUE="4">Tenant
														<OPTION VALUE="1">Care Taker
															<OPTION VALUE="2">Landlord
															<OPTION VALUE="3">Admin
											</SELECT>
										</div>
									</div>
									<div class="form-group row">
										<label for="password" class="col-4 col-form-label">Password</label>
										<div class="col-8">
											<input id="password" name="password" placeholder="Password" class="form-control here" type="text" value="<?php echo $password;?>">
										</div>
									</div>


									<div class="form-group row">
										<label for="email" class="col-4 col-form-label">Email</label>
										<div class="col-8">
											<input id="email" name="email" placeholder="Email" class="form-control here" type="text" value="<?php echo $email;?>">
										</div>
									</div>
									
									<div class="form-group row">
										<div class="offset-4 col-8">
											<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
											<button name="update" type="submit" class="btn btn-primary">Update</button>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>