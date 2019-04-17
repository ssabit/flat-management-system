<?php

session_start();

if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
$id=$_SESSION['id']
?>
<?php

if(isset($_POST['logout'])){
	
	header("Location: ../includes/logout.php");
	exit();
	
}



?>
<?php
// notification count
include_once("../includes/db.php");

$query ="Select COUNT(id) from service where manager=0 AND status=0 ";
$result = mysqli_query( $con, $query );
$row = mysqli_fetch_array( $result );
$count = $row[ 'COUNT(id)' ];

//echo "Total notice: ".$count;
//return;
?>


<?php

// php code to search data in mysql database and set it in input text

if ( isset( $_POST[ 'search' ] ) ) {
	// id to search
	$id = $_POST[ 'searchbar' ];

	//echo "$id";
	//return;
	//connect to mysql
		include_once("../includes/db.php");

	$query = "SELECT `id`,`user_id`,`flat_no`,`tenantname`, `flatrent`, `broadband`,`cabletv`,`gas`,`water`,`maintenance` FROM `flat` WHERE `flat_no`='$id'";

	
	$result = mysqli_query( $con, $query );

	if ( mysqli_num_rows( $result ) > 0 ) {
		while ( $row = mysqli_fetch_array( $result ) ) {

			$flatid=$row['id'];
			$user_id=$row['user_id'];
			$flat_no = $row[ 'flat_no' ];
			$tenantname = $row[ 'tenantname' ];
			$flatrent = $row[ 'flatrent' ];
			$broadband = $row[ 'broadband' ];
			$cabletv = $row[ 'cabletv' ];
			$gas = $row[ 'gas' ];
			$water = $row[ 'water' ];
			$maintenance = $row[ 'maintenance' ];

		}


	}

	// if the id not exist
	// show a message and clear inputs
	else {
			$flatid="";
			$user_id="";
			$flat_no = "";
			$tenantname = "";
			$flatrent ="";
			$broadband = "";
			$cabletv = "";
			$gas = "";
			$water = "";
			$maintenance = "";
	
		echo "<script>window.alert('Data Not Found!!')</script>";
		
	}
}

else {
			$flatid="";
			$user_id="";
			$flat_no = "";
			$tenantname = "";
			$flatrent ="";
			$broadband = "";
			$cabletv = "";
			$gas = "";
			$water = "";
			$maintenance = "";

	
}
if (isset($_POST['send'])) {

		$flat_no=ucwords($_POST['flatno']);
		$tenantname=ucwords($_POST['tenantname']);
		$user_id=$_POST['user_id'];
		$flatrent=$_POST['flatrent'];
		$broadband=$_POST['broadband'];
		$cabletv=$_POST['cabletv'];
		$gas=$_POST['gas'];
		$water=$_POST['water'];
		$maintenance=$_POST['maintenance'];
		$electricitybill=$_POST['electricitybill'];
		$total=$flatrent+$broadband+$cabletv+$gas+$water+$maintenance+$electricitybill;
		//echo $total;
		//return;


	include_once("../includes/db.php");
	//var_dump($connect);
	
	
	
		$date = new DateTime();
    	$date->setTimeZone(new DateTimeZone("Asia/Dhaka"));
    	$get_datetime = $date->format('l, F dS, Y g:i A');
	
	
	$sql="SELECT COUNT(rent_id) FROM `rent` where flat_no='$flat_no' AND tenantname='$tenantname' AND status=0";

	
	$result = mysqli_query( $con, $sql );
	$row = mysqli_fetch_array($result);
	$pendingrequest = $row['COUNT(rent_id)'];

	//echo $pendingrequest; 
	//return;
	if($pendingrequest>0){
		echo "<script>window.alert('You have already a pending request!!')</script>";
	}else{
		$sql= "INSERT INTO `rent`(`flat_no`,`user_id`,`tenantname`, `electricity-bill`, `total`,`date`) VALUES ('$flat_no',$user_id,'$tenantname',$electricitybill,$total,'$get_datetime')";
	
	if (mysqli_query($con, $sql)) {
    //echo "New record created successfully";
			$flatid="";
			$flat_no = "";
			$user_id="";
			$tenantname = "";
			$flatrent ="";
			$broadband = "";
			$cabletv = "";
			$gas = "";
			$water = "";
			$maintenance = "";
	
		echo "<script>window.alert('Rent Send Successfully')</script>";
		

	
} else {
		echo "<script>window.alert('input field empty')</script>";
    //echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
		echo "<script>window.alert('Request Completed!!')</script>";
	}

    }
	
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Rent</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/user.css">
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="../js/typeahead.js"></script>
	

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
	<script>
		$( document ).ready( function () {

			$( 'input.searchbar' ).typeahead( {
				name: 'searchbar',
				remote: 'find.php?query=%QUERY'

			} );

		} )
	</script>
	
	
	
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
					<a href="caretaker.php" class="list-group-item list-group-item-action ">Users</a>
					<a href="create_notice.php" class="list-group-item list-group-item-action ">Create Notice</a>
					<a href="requests.php" class="list-group-item list-group-item-action">Service Requet Received<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($count!=0)echo $count;?></span></a>
					<a href="#" class="list-group-item list-group-item-action active ">Rent Request Send</a>
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
								<h4 style="text-transform: uppercase; font-weight: bold;">Rent Send </h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="rent.php" method="post">
									
									<div class="form-group row">
										<label for="Searchbar" class="col-4 col-form-label">Search</label>

										<div class="col-6">
											<input type="text" name="searchbar" size="30" class="searchbar" placeholder="Enter Flat No">
											
											
											<button type="submit" name="search" style="width:10%; margin-left:5px; float:right;" class="btn btn-link"></button>
										</div>
										
									</div>
									
									<div class="form-group row">
										<label for="flatno" class="col-4 col-form-label" style="display: none;">id</label>

										<div class="col-8">
											<input id="flatno" name="flatno" class="form-control here" type="text" value="<?php echo $flat_no;?>" style="display:none;">
										</div>
									</div>
									<div class="form-group row">
										<label for="user_id" class="col-4 col-form-label" style="display: none;">User id</label>

										<div class="col-8">
											<input id="user_id" name="user_id" class="form-control here" type="text" value="<?php echo $user_id;?>" style="display:none;">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="tenantname" class="col-4 col-form-label">Tenant Name</label>

										<div class="col-8">
											<input id="tenantname" name="tenantname" placeholder="" class="form-control here" type="text" value="<?php echo $tenantname;?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="flat rent" class="col-4 col-form-label">Flat Rent</label>
										<div class="col-8">
											<input id="flat" name="flatrent" placeholder="" class="form-control here" type="text" value="<?php echo $flatrent;?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="broadband connection" class="col-4 col-form-label">Broadband</label>
										<div class="col-8">
											<input id="broadband" name="broadband" placeholder="" class="form-control here" type="text" value="<?php echo $broadband;?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="cable tv" class="col-4 col-form-label">Cable Tv</label>
										<div class="col-8">
											<input id="cabletv" name="cabletv" placeholder="" class="form-control here" type="text" value="<?php echo $cabletv;?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="gas" class="col-4 col-form-label">GAS</label>
										<div class="col-8">
											<input id="gas" name="gas" placeholder="" class="form-control here" type="text" value="<?php echo $gas;?>">
										</div>
									</div>
						

									<div class="form-group row">
										<label for="water" class="col-4 col-form-label">Water</label>
										<div class="col-8">
											<input id="water" name="water" placeholder="" class="form-control here" type="text" value="<?php echo $water;?>">
										</div>
									</div>

									<div class="form-group row">
										<label for="maintenance " class="col-4 col-form-label">Maintenance </label>
										<div class="col-8">
											<input id="maintenance" name="maintenance" placeholder="" class="form-control here" type="text" value="<?php echo $maintenance;?>">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="electricitybill " class="col-4 col-form-label">Electricity Bill </label>
										<div class="col-8">
											<input id="electricitybill" name="electricitybill" placeholder="" class="form-control here" type="text">
										</div>
									</div>
									

									
									<div class="form-group row">
										<div class="offset-4 col-8">
											<button name="send" type="submit" class="btn btn-primary">Send </button>
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