<?php
session_start();
if($_SESSION['u_id']==NULL){
    //haven't log in
    header("Location: ../index.php?login=error");
}
include_once("../includes/db.php");
$uid=$_SESSION['id'];
 // using mysqli_query instead
?>
<?php
// notification count
include_once("../includes/db.php");
$flat=$_SESSION['flat'];
$query ="Select COUNT(flat_no) from service where flat_no='$flat'  and status=1 and manager=1";
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
$query ="Select COUNT(rent_id) from rent where user_id=$uid and status=0";
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


<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Payment History</title>
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="../css/table.css">
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
			<div class="col-md-3">
				<div class="list-group ">
					<a href="tenant.php" class="list-group-item list-group-item-action ">Profile</a>
					<a href="services.php" class="list-group-item list-group-item-action  ">Services<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($servicecount>0)echo $servicecount;?></span></a>
					<a href="rent_details.php" class="list-group-item list-group-item-action">Rent 
					Details <span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($paymentpending>0)echo $paymentpending;?></span></a>
					<a href="#" class="list-group-item list-group-item-action active">Payment History</a>
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
								<h4 style="text-transform: uppercase; font-weight: bold;">Payment History</h4>
								<hr>

							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="admin.php">
									<div class="table-responsive">
										<table class="table" id="users">
											<tbody>
												<thead>
										
													<th>ID</th>
													<th>Previous Balance</th>
													<th>Payment Amount</th>
													<th>Current Balance</th>
													<th>Date</th>
												</thead>

												 <?php 
		$result = mysqli_query($con, "SELECT * FROM payment_history where  sender=$uid AND checked=0 ORDER BY id DESC");
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            //echo "<td>".$res['sender']."</td>";
            //echo "<td>".$res['receiver']."</td>";
            echo "<td>".$res['balance_before']."</td>";
			echo "<td>".$res['amount']."</td>";
            echo "<td>".$res['balance_after']."</td>";
            echo "<td>".$res['date']."</td>";
			//echo "<td>".$res['user_level']."</td>";

			

			
			
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