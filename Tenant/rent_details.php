<?php
session_start();
if($_SESSION['u_id']==NULL){
    //haven't log in
    header("Location: ../index.php?login=error");
}
$name=$_SESSION['u_name'];
$user_id=$_SESSION['id'];
//$name="Saad Ibna Omar Sabit";
include_once("../includes/db.php");
$result = mysqli_query($con, "SELECT * FROM money where user_id=$user_id");
$res = mysqli_fetch_array($result);
$taka=$res['balance'];


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

$query ="Select COUNT(rent_id) from rent where user_id=$user_id and status=0";
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
	<title>Rent Details</title>
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="../css/table.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
					<a href="tenant.php" class="list-group-item list-group-item-action">Profile</a>
					<a href="services.php" class="list-group-item list-group-item-action  ">Services<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($servicecount>0)echo $servicecount;?></span></a>
					<a href="#" class="list-group-item list-group-item-action active">Rent 
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
								
								<h4 style="text-transform: uppercase; font-weight: bold;">Rent Details<span style="float: right;color: red;font-size: 30px;">Balance:&#2547; <?php echo $taka;?></h4>
								<hr>

							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="requests.php" method="post">
									<div class="table-responsive">
										<table class="table" id="users">
											<tbody>
												<thead>
													<th>Flat No</th>
													<th>Account No.</th>
													<th>Account Holder</th>
													<th>Electricity Bill</th>
													<th>Total</th>
													<th>Date</th>
													<th>Status</th>
													<th>Option</th>

 <?php 
													
	include_once("../includes/db.php");
 
$result = mysqli_query($con, "SELECT * FROM rent WHERE tenantname='$name' AND status=0");												
													
        while($res = mysqli_fetch_array($result)) {         
        $statuscheck=$res['status'];	
	
			echo "<tr>";
            //echo "<td>".$res['rent_id']."</td>";
            echo "<td>".$res['flat_no']."</td>";
            echo "<td>".$res['user_id']."</td>";
            echo "<td>".$res['tenantname']."</td>";
			echo "<td>".$res['electricity-bill']."</td>";
			echo "<td>".$res['total']."</td>";
			echo "<td>".$res['date']."</td>";
			
			//echo "<td>".$res['status']."</td>";
			if($res['status']==1)
			{
				echo "<td>"."Done"."</td>";
			}else if($res['status']==0)
			{
				
				echo "<td>"."Pending"."</td>";
			}else
			{
				
				echo "<td>"."None"."</td>";
			}
			//echo "<input type='text' name='id' value='$res[id]'/>";
			if($statuscheck==0)
			{
				echo "<td> <a class='btn btn-warning' href=\"payment_send.php?id=$res[rent_id]\">Payment</a></td>";
				
			}else{
				
				echo "<td><a class='btn btn-success'>Paid</a></td>";
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
<?php
        if(isset($_GET['balance']) && $_GET['balance']=='less'){
            echo "<script>alert('You Dont have enough balance in account to payment! Please deposit balance in Bank.');</script>";
        } 
		if(isset($_GET['account']) && $_GET['account']=='null'){
            echo "<script>alert('You Don't have an account for payment! Please Contact to Care Taker.');</script>";
        } 
		if(isset($_GET['payment']) && $_GET['payment']=='success'){
            echo "<script>alert('Payment Success');</script>";
        }
    ?>