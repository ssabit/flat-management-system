<?php
session_start();

if ( $_SESSION[ 'u_name' ] == NULL ) {
	//haven't log in
	// echo "You haven't log in";
	header( "Location: ../index.php?login=error" );
}

?>
<?php
// notification count
include_once( "../includes/db.php" );

$query = "Select COUNT(id) from service where manager=0 AND status=0 ";
$result = mysqli_query( $con, $query );
$row = mysqli_fetch_array( $result );
$count = $row[ 'COUNT(id)' ];

//echo "Total notice: ".$count;
//return;
?>
<?php

if ( isset( $_POST[ 'logout' ] ) ) {

	header( "Location: ../includes/logout.php" );
	exit();

}



?>
<?php

if ( isset( $_POST[ 'post' ] ) ) {


	//echo "get data";
	$ntitle = $_POST[ 'noticetitle' ];
	$nstatus = $_POST[ 'notice' ];

	//echo $ntitle;
	//echo  $nstatus ;


	$date = new DateTime();
	$date->setTimeZone( new DateTimeZone( "Asia/Dhaka" ) );
	$get_datetime = $date->format( 'l, F dS, Y g:i A' );

	//$_SESSION['u_id']="saad";

	echo "Before query";
	include_once( "../includes/db.php" );
	//var_dump($connect);
	$sql = "INSERT INTO `notice`(`status`,`date`,`notice_owner`,`notice_title`) VALUES ('" . $nstatus . "','" . $get_datetime . "','" . $_SESSION[ 'u_id' ] . "','" . $ntitle . "')";



	if ( mysqli_query( $con, $sql ) ) {
		//echo "New record created successfully";
		echo "<script>window.alert('Notice Publish Successfully ')</script>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error( $con );
	}
}
?>



<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Create Notice</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/user.css">
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>


	<style>
		h1 {
			font-size: 20px;
			color: #111;
		}
		
		.content {
			width: 80%;
			margin: 0 auto;
			margin-top: 50px;
		}
		
		.tt-hint,
		.searchbar {
			border: 2px solid #CCCCCC;
			border-radius: 8px 8px 8px 8px;
			font-size: 24px;
			height: 45px;
			line-height: 30px;
			outline: medium none;
			padding: 8px 12px;
			width: 400px;
		}
		
		.tt-dropdown-menu {
			width: 400px;
			margin-top: 5px;
			padding: 8px 12px;
			background-color: #fff;
			border: 1px solid #ccc;
			border: 1px solid rgba(0, 0, 0, 0.2);
			border-radius: 8px 8px 8px 8px;
			font-size: 18px;
			color: #111;
			background-color: #F1F1F1;
		}
	</style>

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
				<form action="<?php $_PHP_SELF ?>" method="post">

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
			<div class="col-md-3 ">
				<div class="list-group ">
					<a href="caretaker.php" class="list-group-item list-group-item-action">Users</a>
					<a href="#.php" class="list-group-item list-group-item-action active">Create Notice</a>
					<a href="requests.php" class="list-group-item list-group-item-action">Service Requet Received<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($count!=0)echo $count;?></span></a>
					<a href="rent.php" class="list-group-item list-group-item-action ">Rent Request Send</a>
					<a href="payment_received.php" class="list-group-item list-group-item-action">Rent Request Details</a>
					<a href="payment_history.php" class="list-group-item list-group-item-action ">Payment History</a>
					<a href="send_msg.php" class="list-group-item list-group-item-action">Request/Complain</a>
					<a href="io_tracker.php" class="list-group-item list-group-item-action">In-Out Track</a>
					<a href="staff_Add.php"  class="list-group-item list-group-item-action">Staff Add</a>
					<a href="staff_view.php"  class="list-group-item list-group-item-action">Staff Details</a>
					<a href="../notice_board.php" target="_blank"  class="list-group-item list-group-item-action">Notice Board</a>
					<a href="../emergency.php" target="_blank" class="list-group-item list-group-item-action">Emergency Contacts</a>
					<a href="../messaging/message.php"  target="_blank" class="list-group-item list-group-item-action">Message</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-transform: uppercase; font-weight: bold;">Create Notice</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="<?php $_PHP_SELF ?>" method="post">


									<div class="form-group row">
										<label for="noticetitle" class="col-4 col-form-label">Title</label>

										<div class="col-8">
											<input id="noticetitle" name="noticetitle" placeholder="" class="form-control here" type="text">
										</div>
									</div>

									<div class="form-group row">
										<label for="notice" class="col-4 col-form-label">Notice</label>
										<div class="col-8">
											<textarea id="notice" name="notice" cols="40" rows="4" class="form-control"></textarea>
										</div>
									</div>

									<div class="form-group row">
										<div class="offset-4 col-8">
											<button name="post" type="submit" class="btn btn-primary">Post</button>
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