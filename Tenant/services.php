<?php
session_start();


if($_SESSION['u_id']==NULL){
    //haven't log in
    header("Location: ../index.php?login=error");
}
    //Logged in
    $flat=$_SESSION['flat'];
    $id=$_SESSION['id'];



 	$date = new DateTime();
    $date->setTimeZone(new DateTimeZone("Asia/Dhaka"));
    $get_datetime = $date->format('l, F dS, Y g:i A');


if ( isset( $_POST[ 'submit' ] ) ) {
	$problem = $_POST[ 'services' ];

	if ( $problem=="") {

	//echo "<font color='red'>Service Not Selected.</font><br/>";
		echo "<script>window.alert('Service Not Selected!!')</script>";

}
else{

	include_once( "../includes/db.php" );
	
	$sql="SELECT COUNT(id)  FROM `service` where flat_no='$flat' AND problem='$problem' AND status=0";

	
	$result = mysqli_query( $con, $sql );
	$row = mysqli_fetch_array($result);
	$pendingrequest = $row['COUNT(id)'];

	//echo $pendingrequest; 
	//return;
	if($pendingrequest>0){
		echo "<script>window.alert('You have already a pending request!!')</script>";
	}else{
		$sql="INSERT INTO service(	flat_no,problem,date) VALUES ('$flat','$problem','$get_datetime')";
		$result = mysqli_query( $con, $sql );
		echo "<script>window.alert('Request Completed!!')</script>";
	}
	
	
	
	
	
	
}






}

?>

<?php
// notification count
include_once("../includes/db.php");
$flat=$_SESSION['flat'];
$query ="Select COUNT(flat_no) from service where flat_no='$flat'  and status=1  and manager=1";
$result = mysqli_query( $con, $query );
$row = mysqli_fetch_array( $result );
$count1 = $row['COUNT(flat_no)'];
//echo "Flat notice: ".$count1;

	
$query ="Select COUNT(id) from notice";
$result = mysqli_query( $con, $query );
$row = mysqli_fetch_array( $result );
$count2 = $row[ 'COUNT(id)' ];

//echo "Admin notice: ".$count2;

$count=$count1+$count2;
//echo "Total notice: ".$count;

$query ="Select COUNT(rent_id) from rent where user_id=$id and status=0";
$result = mysqli_query( $con, $query );
$row = mysqli_fetch_array( $result );
$paymentpending = $row['COUNT(rent_id)'];


$query ="Select COUNT(id) from service where flat_no='$flat' and status=1 and manager=0";
$result = mysqli_query( $con, $query );
$row = mysqli_fetch_array($result);
$servicecount = $row['COUNT(id)'];

//return;
?>

<?php

if(isset($_POST['logout'])){
	
	header("Location: ../includes/logout.php");
	exit();
	
}



?>
<html>

<head>
	<title>Services</title>
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
					<a href="tenant.php" class="list-group-item list-group-item-action ">Profile</a>
					<a href="#" class="list-group-item list-group-item-action active">Services<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($servicecount>0)echo $servicecount;?></span></a>
					<a href="rent_details.php" class="list-group-item list-group-item-action">Rent 
					Details <span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($paymentpending>0)echo $paymentpending;?></span></a>
					<a href="payment_history.php" class="list-group-item list-group-item-action ">Payment History</a>
					<a href="../notice_board.php" target="_blank" class="list-group-item list-group-item-action ">Notice Board <span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($count!=0)echo $count;?></span></a>
					<a href="../emergency.php" target="_blank" class="list-group-item list-group-item-action">Emergency Contacts</a>
					<a href="../messaging/message.php"  target="_blank" class="list-group-item list-group-item-action">Message</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-transform: uppercase; font-weight: bold;">My Services</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="services.php" method="post">
									<div class="form-group row">
										<label for="services" class="col-4 col-form-label">Services By</label>
										<div class="col-8">
											<input id="services" name="services" placeholder="services" class="form-control here" type="hidden" style="width:50%;float: left;">

											<SELECT class="custom-select" style="width:40%; margin-left:5px;   float:left;" onChange="this.form.services.value=this.options[this.selectedIndex].value">
												<OPTION VALUE="">Select
													<OPTION VALUE="Internet">Broadband Connection
													<OPTION VALUE="Electrician">Electrician
													<OPTION VALUE="Houseworker">House Worker
													<OPTION VALUE="Plumber">Plumber
													<OPTION VALUE="Telephone">Telephone Connection
													
											</SELECT>
			
											
													
													
													
														
											<button name="submit" type="submit" class="btn btn-primary" style="margin-left:15px;">Request</button>
										</div>

									</div>

								<div class="table-responsive">
										<table class="table">
											<tbody>
												<thead>

													<th>Problem</th>
													<th>Status</th>
												
												</thead>


<?php

	include_once( "../includes/db.php" );
	$sql="Select * from service where flat_no='$flat' AND manager=0 order by status asc";
	$result = mysqli_query( $con, $sql );
	//echo "<script>window.alert('Request Completed!!')</script>";
												
												
												
	while ( $res = mysqli_fetch_array( $result ) ) {
		echo "<tr>";
		echo "<td>" . $res[ 'problem' ] . "</td>";	
		if($res <0){
			
		echo "<td>"."Data Not Found!!"."</td>";
			
		}else{
		if($res[ 'status' ]==0)
		{
			$stat="Pending";
			echo "<td>" ."<span class='btn btn-warning'>".$stat."</span>". "</td>";
		}
			else{
				
				$stat="Solved";
				echo "<td>" ."<span class='btn btn-success'>".$stat."</span>". "</td>";
			}
	
			
		}
													
												
	}
												
												


?>










											</tbody>



										</table>
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