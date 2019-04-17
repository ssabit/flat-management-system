<?php
session_start();

if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
include_once("../includes/db.php");
$uid=$_SESSION['id'];

$result = mysqli_query($con, "SELECT * FROM money where user_id=$uid");
$res = mysqli_fetch_array($result);
$taka=$res['balance'];



// using mysqli_query instead
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
					<a href="caretaker.php" class="list-group-item list-group-item-action ">Users</a>
					<a href="create_notice.php" class="list-group-item list-group-item-action ">Create Notice</a>
					<a href="requests.php" class="list-group-item list-group-item-action">Service Requet Received<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($count!=0)echo $count;?></span></a>
					<a href="rent.php" class="list-group-item list-group-item-action ">Rent Request Send</a>
					<a href="payment_received.php" class="list-group-item list-group-item-action">Rent Request Details</a>
					<a href="#" class="list-group-item list-group-item-action active">Payment History</a>
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
								<h4 style="text-transform: uppercase; font-weight: bold;">Payment History <span style="float: right;color: red;font-size: 30px;">Balance:&#2547; <?php echo $taka;?></span></h4>
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
													<th>Dipositor Name</th>
													<th>Flat No.</th>
													<th>My Previous Balance</th>
													<th>Payment Received</th>
													<th>My Current Balance</th>
													<th>Date</th>
												</thead>

												 <?php 
		$result = mysqli_query($con, "SELECT * FROM payment_history where  receiver=$uid AND checked=1 ORDER BY id DESC");

        while($res = mysqli_fetch_array($result)) {         
           
			$senderid=$res['sender'];
			$sql="select * from flat where user_id=$senderid";
			$result=mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			$name=$row['tenantname'];
			$flatno=$row['flat_no'];
			
			
			
			echo "<tr>";
            echo "<td>".$res['id']."</td>";
            //echo "<td>".$res['sender']."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$flatno."</td>";
			
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