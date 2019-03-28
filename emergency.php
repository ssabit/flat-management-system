<?php

session_start();

if ( $_SESSION[ 'u_id' ] == NULL ) {
	//haven't log in
	// echo "You haven't log in";
	header( "Location: ../index.php?login=error" );
}
$id = $_SESSION[ 'id' ];
//$flat=$_SESSION['flat'];
?>
<?php

if ( isset( $_POST[ 'logout' ] ) ) {

	header( "Location: includes/logout.php" );
	exit();

}



?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Emergency</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/user.css">

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
				<form action="<?php $_PHP_Self ?>" method="post">

					<li id="button"><button name="logout" type="submit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
					

					</li>
				</form>

			</ul>

		</div>



	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h2 style="font-size:30px;text-align:center;"></span>CALL 999. FOR ANY LIFE-THREATENING EMERGENCY.</h2>
								<hr>
							</div>
						</div>
						<h4 style="text-transform: uppercase; font-weight: bold;text-align:center;">Police</h4>
						<div class="row">
							<div class="col-md-12">
								<div style="text-align:left;">
									<li style="list-style:none;font-size:20px;">Address: House#1/C,Block-C,Line-9,Section-1</li>
									<li style="list-style:none;font-size:20px;">Landline: 9015922</li>
									<li style="list-style:none;font-size:20px;">DC: 01713373184</li>
									<li style="list-style:none;font-size:20px;">ADC: 01713373185</li>
									<li style="list-style:none;font-size:20px;">AC: 01713373187</li>
								</div>



							</div>
						</div>
						<hr>
						<h4 style="text-transform: uppercase; font-weight: bold;text-align:center;">Hospital</h4>
						<div class="row">
							<div class="col-md-12">
								<div style="text-align:left">
									
									<h5 style="font-size:22px;text-align:left;margin-top: 20px;">Islami Bank Hospital</h5>
									<li style="list-style:none;font-size:20px;">Address:Plot No 31, Main Road 3, Near Purobi Bus Stop Begum Rokeya sarani, Block B, Dhaka 1216</li>
									<li style="list-style:none;font-size:20px;">Phone:01992-346631</li>

									<h5 style="font-size:22px;text-align:left;margin-top: 20px;">Mirpur Adhunik Hospital And Diagnostic Center</h5>
									<li style="list-style:none;font-size:20px;">Address: House No 20-21, Block Dha, pallabi, Mirpur 12, Dhaka 1216</li>
									<li style="list-style:none;font-size:20px;">Phone:01761-076667</li>


									<h5 style="font-size:22px;text-align:left;margin-top: 20px;">National Heart Foundation Hospital & Research Institute</h5>
									<li style="list-style:none;font-size:20px;">Address:Plot-7/2, Dhaka 1216</li>
									<li style="list-style:none;font-size:20px;">Phone:02-9033442</li>
								</div>

								<hr>
								<h4 style="text-transform: uppercase; font-weight: bold;text-align:center;">Fire Service</h4>
								<div class="row">
									<div class="col-md-12">
										<div style="text-align:left">
											
											<li style="list-style:none;font-size:20px;">Address:Fire Service and Civil Defence Training Complex, Mirpur-10, Dhaka.</li>
											<li style="list-style:none;font-size:20px;">Landline:9001055</li>
										</div>



									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

</body>

</html>