<?php
session_start();
if($_SESSION['u_id']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
    //Logged in
  $id=$_SESSION['id'];
$flat=$_SESSION['flat'];


$id=$_SESSION['id'];
$flat=$_SESSION['flat'];
?>
<?php
// notification count
include_once("../includes/db.php");

$query ="Select COUNT(flat_no) from service where flat_no='$flat' and status=1 and manager=1";
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
<?php

$id=$_SESSION['id'];

include_once("../includes/db.php");

$query ="Select * from users where id=$id";

$result = mysqli_query( $con, $query );

if ( mysqli_num_rows( $result ) > 0 ) {
		while ( $row = mysqli_fetch_array( $result ) ) {

			$name = $row[ 'name' ];
			$email = $row[ 'email' ];
			$username = $row[ 'username' ];
			$nid = $row[ 'nid' ];
			$family_member = $row[ 'family_members' ];
			$address = $row[ 'address' ];
			$flat_no = $row[ 'flat_no' ];
			$phone=$row[ 'phone' ];
		
		}
}
else {
		echo "ERROR";
	}


?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Profile</title>
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
					<a href="#" class="list-group-item list-group-item-action active">Profile</a>
					<a href="services.php" class="list-group-item list-group-item-action  ">Services<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($servicecount>0)echo $servicecount;?></span></</a>
					<a href="rent_details.php" class="list-group-item list-group-item-action">Rent 
					Details <span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($paymentpending>0)echo $paymentpending;?></span></a>
					<a href="payment_history.php" class="list-group-item list-group-item-action ">Payment History</a>
					<a href="../notice_board.php" target="_blank" class="list-group-item list-group-item-action ">Notice Board <span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($count>0)echo $count;?></span></a>
					<a href="../emergency.php" target="_blank" class="list-group-item list-group-item-action">Emergency Contacts</a>
					<a href="../messaging/message.php"  target="_blank" class="list-group-item list-group-item-action">Message</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-transform: uppercase; font-weight: bold;">My Profile</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form>

									
<?php


include_once("../includes/db.php");

$query1 ="Select * from users where id=$id";

$result = mysqli_query( $con, $query1 );

if ( mysqli_num_rows( $result ) > 0 ) {
		while ( $row = mysqli_fetch_array( $result ) ) {

			$name = $row[ 'name' ];
			$email = $row[ 'email' ];
			$username = $row[ 'username' ];
			$nid = $row[ 'nid' ];
			$family_member = $row[ 'family_members' ];
			$address = $row[ 'address' ];
			$flat_no = $row[ 'flat_no' ];
			$phone=$row[ 'phone' ];
	
		
		}
}
else {
		echo "ERROR";
	}


?>
									
									
<div class="table-responsive">          
  <table class="table">

	<tr>
        <td>Name</td>
        <td><?php echo $name;?></td>
     </tr>
	
		<tr>
        <td>Username</td>
        <td><?php echo $username ;?></td>
     </tr>
		
		<tr>
        <td>Email</td>
        <td><?php echo $email;?></td>
     </tr>
		
		<tr>
        <td>Phone</td>
        <td><?php echo $phone;?></td>
     </tr>		
	  
	  <tr>
        <td>Flat No</td>
        <td><?php echo $flat_no;?></td>
     </tr>
	  
     <tr>
        <td>Address</td>
        <td><?php echo $address;?></td>
     </tr>
	  
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