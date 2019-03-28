<?php
session_start();
if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}

?>
<?php

if(isset($_POST['logout'])){
	
	header("Location: ../includes/logout.php");
	exit();
	
}



?>
<html>

<head>
	<title>Create Bank Account</title>
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
				<li id="logo">Flat Management System </li>
				<li id="user">User:
					<?php echo $_SESSION['u_id'];?>
				</li><br>
				<form action="<?php $_PHP_SELF?>" method="post">
				
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
					<a href="../admin/admin.php" class="list-group-item list-group-item-action ">Users</a>
					<a href="accounts.php" class="list-group-item list-group-item-action">Bank Management</a>
					<a href="../admin/flat_add_edit.php" class="list-group-item list-group-item-action ">Flat</a>
				<a href="../admin/Flat_details.php" class="list-group-item list-group-item-action">Flat Details</a>

				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-transform: uppercase; font-weight: bold;">Create Bank Account</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="create_account.php" method="post">
									<div class="form-group row">
										<label for="username" class="col-4 col-form-label">User Name</label>

										<div class="col-8">
											<input id="username" name="username" placeholder="" class="form-control here" type="text">
										</div>
									</div>
								
									
									<div class="form-group row">
										<label for="userid" class="col-4 col-form-label">User ID</label>
										<div class="col-8">
											<input id="userid" name="userid" placeholder="" class="form-control here" type="text">
										</div>
									</div>


									<div class="form-group row">
										<label for="balance" class="col-4 col-form-label">Balance</label>
										<div class="col-8">
											<input id="balance" name="balance" placeholder="" class="form-control here" type="text">
										</div>
									</div>

									<div class="form-group row">
										<div class="offset-4 col-8">

											<button name="submit" type="submit" class="btn btn-primary">Add</button>


										</div>
									</div>

									<?php
			
									include_once("../includes/db.php");

									if ( isset( $_POST[ 'submit' ] ) ) {
										$username = strtolower($_POST[ 'username' ]);
										$userid = $_POST[ 'userid' ];
										$balance = $_POST[ 'balance' ];
										

										// checking empty fields
										if ( empty( $username ) || empty( $userid ) || empty( $balance ) ) {
											if ( empty( $username ) ) {
												echo "<font color='red'>User Name field is empty.</font><br/>";
											}

											if ( empty( $userid ) ) {
												echo "<font color='red'>User ID field is empty.</font><br/>";
											}

											if ( empty( $balance ) ) {
												echo "<font color='red'>Balance field is empty.</font><br/>";
											}
											
										} else {

											$result = mysqli_query( $con, "INSERT INTO money(	user_id,user_name,balance) VALUES($userid,'$username',$balance)" );

											echo "<font color='green'>Data added successfully.";
											echo "<br/><a href='accounts.php'>View Result</a>";

										}
									}
									?>


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