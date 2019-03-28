<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="js/javascript.js"></script>
	<link rel="stylesheet" href="css/index.css" type="text/css">
</head>

<body>
	<div class="header">
		<div class="row">
			<div class="col-md-12">
				<!-- Logo -->
				<div class="logo">
					<h1><a href="index.php">Flat Management System</a></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<br><br><br>
		<br><br><br>
	</div>

	<!-- Login -->
	<div class="row=6" id="log">
		<div class="col-md-6 col-md-offset-3" id="login-box">
			<form action="includes/login.php" method="post">
				<center><b id="login">Login Here</b>
				</center>
				
				<div class="form-group">
					<level class="user">Username:</level>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Enter Username">
					</div>
				</div>

				<div class="form-group">
					<level class="user">Password:</level>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" name="password" placeholder="Enter Password">
					</div>
				</div>

				<div class="form-group">

					<input type="submit" name="login" class="btn btn-success" value="Login">
					<input type="button" onclick="signup()" class="btn btn-danger" value="Signup">

				</div>

				<br><br><br>
				<!--<a href="" id="forgot-pass">Forgot Password?</a>-->
			</form>
		</div>
	</div>

	<!-- Registration -->
	<div class="row=6" id="reg" style="display: none;">
		<div class="col-md-6 col-md-offset-3" id="login-box">
			<form action="includes/signup.php"  method="post">
				<center><b id="login">Signup Here</b>
				</center>				
				<div class="form-group">
					<level class="user">Username:</level>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Enter Username">
					</div>
				</div>

				<div class="form-group">
					<level class="user">Password:</level>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" name="password" placeholder="Enter Password">
					</div>
				</div>

				<div class="form-group">
					<level class="user">Email:</level>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input type="email" class="form-control" name="eamil" placeholder="Enter Email">
					</div>
				</div>

				<div class="form-group">

					<input type="submit" name="submit" class="btn btn-success" value="Resgister">
					<input type="button" onclick="signup()" class="btn btn-danger" value="Login">

					
					
					
				</div>
			</form>
		</div>
	</div>




</body>
</html>
<?php
        if(isset($_GET['login']) && $_GET['login']=='credentialserror'){
            echo "<script>alert('Invalid credentials!!!');</script>";
        }
        if(isset($_GET['login'])&& $_GET['login']=='empty'){
            echo "<script>alert('Fields Empty!!!');</script>";
        }
		if(isset($_GET['login'])&& $_GET['login']=='error'){
            echo "<script>alert('Invalid User Name or Password!!!');</script>";
        }
        
        
    ?>