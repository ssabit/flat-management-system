<?php
session_start();

if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
$name=$_SESSION['u_name'];
$user_id=$_SESSION['id'];
//$name="Saad Ibna Omar Sabit";
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
					<a href="caretaker.php" class="list-group-item list-group-item-action ">Users</a>
					<a href="create_notice.php" class="list-group-item list-group-item-action ">Create Notice</a>
					<a href="requests.php" class="list-group-item list-group-item-action">Service Requet Received<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($count!=0)echo $count;?></span></a>
					<a href="rent.php" class="list-group-item list-group-item-action ">Rent Request Send</a>
					<a href="#" class="list-group-item list-group-item-action active">Rent Request Details</a>
					<a href="payment_history.php" class="list-group-item list-group-item-action ">Payment History</a>
					<a href="send_msg.php" class="list-group-item list-group-item-action">Request/Complain</a>
					<a href="io_tracker.php" class="list-group-item list-group-item-action">In-Out Track</a>
					<a href="staff_Add.php"  class="list-group-item list-group-item-action">Staff Add</a>
					<a href="staff_view.php"  class="list-group-item list-group-item-action">Staff Details</a>
					<a href="../notice_board.php" target="_blank" class="list-group-item list-group-item-action">Notice Board</a>
					<a href="../emergency.php" target="_blank" class="list-group-item list-group-item-action">Emergency Contacts</a>
					<a href="../messaging/message.php"  target="_blank" class="list-group-item list-group-item-action">Message</a>
					
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								
								<h4 style="text-transform: uppercase; font-weight: bold;">Rent Details</h4>
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
													<th>Customer ID</th>
													<th>Customer Name</th>
													<th>Electricity Bill</th>
													<th>Total</th>
													<th>Date</th>
													<th>Status</th>
											

 <?php 
													
	include_once("../includes/db.php");
 
$result = mysqli_query($con, "SELECT * FROM rent ORDER BY status asc");												
													
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
				echo "<td><a class='btn btn-warning'>Received</a></td>";
				
			
			
			
			
			
			}else if($res['status']==0)
			{
				
				echo "<td> <a class='btn btn-primary'>Pending</a></td>";
			}else
			{
				
				echo "<td>"."None"."</td>";
			}
			//echo "<input type='text' name='id' value='$res[id]'/>";
			/*if($statuscheck==0)
			{
				echo "<td> <a class='btn btn-primary' href=\"payment_send.php?id=$res[rent_id]\">Payment</a></td>";
				
			}else{
				
				echo "<td><a class='btn btn-warning'>Paid</a></td>";
			}
			*/
			
			

			
			
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