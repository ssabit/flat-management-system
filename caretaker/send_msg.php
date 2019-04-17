<?php

session_start();
if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
//$flat="1(A)";


 	$date = new DateTime();
    $date->setTimeZone(new DateTimeZone("Asia/Dhaka"));
    $get_datetime = $date->format('l, F dS, Y g:i A');


if ( isset( $_POST[ 'submit' ] ) ) {
	$flatno = $_POST['flatno'];
	$category = $_POST[ 'category' ];
	$pmessenge = $_POST['messenge'];
	

	if ( $flatno=="") {

		echo "<script>window.alert('Please Select Flat No.!!')</script>";
		//return;

}else if ( $category=="") {

	//echo "<font color='red'>Service Not Selected.</font><br/>";
		echo "<script>window.alert('Please Select Category!!')</script>";
		//return;

}else if ($pmessenge=="") {

	//echo "<font color='red'>Service Not Selected.</font><br/>";
		echo "<script>window.alert('Message Empty!!')</script>";
	

}
else{
	
	include_once( "../includes/db.php" );
	$sql="INSERT INTO service(flat_no,problem,date,manager,msg) VALUES ('$flatno','$category','$get_datetime',1,'$pmessenge')";
	$result = mysqli_query( $con, $sql );
	echo "<script>window.alert('Send Success!!')</script>";
	
}

}

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

<html>

<head>
	<title>Request / Complain</title>
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
				<form action="<?php $_PHP_SELF ?>" method="post">
				
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
					<a href="caretaker.php" class="list-group-item list-group-item-action">Users</a>
					<a href="create_notice.php" class="list-group-item list-group-item-action ">Create Notice</a>
					<a href="requests.php" class="list-group-item list-group-item-action">Service Requet Received<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"><?php if($count!=0)echo $count;?></span></a>
					<a href="rent.php" class="list-group-item list-group-item-action ">Rent Request Send</a>
					<a href="payment_received.php" class="list-group-item list-group-item-action">Rent Request Details</a>
					<a href="payment_history.php" class="list-group-item list-group-item-action ">Payment History</a>
					<a href="#" class="list-group-item list-group-item-action active">Request/Complain</a>
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
								<h4 style="text-transform: uppercase; font-weight: bold;">Request/Complain</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="<?php $_PHP_SELF; ?>" method="post">
								<div class="form-group row">
										<label for="flatno" class="col-4 col-form-label">Flat No.</label>
										<div class="col-8">
											<input id="flatno" name="flatno" placeholder="flatno" class="form-control here" type="hidden" style="width:50%;float: left;">

											<SELECT class="custom-select" style="width:40%; margin-left:5px;   float:left;" onChange="this.form.flatno.value=this.options[this.selectedIndex].value">
												<OPTION VALUE="">Select
													<OPTION VALUE="1(A)">1(A) 
													<OPTION VALUE="1(B)">1(B) 
													<OPTION VALUE="1(C)">1(C)
													<OPTION VALUE="2(A)">2(A)
													<OPTION VALUE="2(B)">2(B)
													<OPTION VALUE="2(C)">2(C)
													<OPTION VALUE="3(A)">3(A)
													<OPTION VALUE="3(B)">3(B)
													<OPTION VALUE="3(C)">3(C)
													<OPTION VALUE="4(A)">4(A)
													<OPTION VALUE="4(B)">4(B)
													<OPTION VALUE="4(C)">4(C)
													<OPTION VALUE="5(A)">5(A)
													<OPTION VALUE="5(B)">5(B)
													<OPTION VALUE="5(C)">5(C)
											</SELECT>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="category" class="col-4 col-form-label">Category</label>
										<div class="col-8">
											<input id="category" name="category" placeholder="category" class="form-control here" type="hidden" style="width:50%;float: left;">

											<SELECT class="custom-select" style="width:40%; margin-left:5px;   float:left;" onChange="this.form.category.value=this.options[this.selectedIndex].value">
												<OPTION VALUE="">Select
													<OPTION VALUE="Contact">Contact 
													<OPTION VALUE="Garbage">Garbage 
													<OPTION VALUE="Mail">Mail
													<OPTION VALUE="Parking">Parking
													<OPTION VALUE="Othres">Others
											</SELECT>
										</div>
									</div>
									<div class="form-group row">
                                            <label for="messenge" class="col-4 col-form-label">Message</label>
                                            <div class="col-8">
                                                <textarea id="messenge" name="messenge" cols="40" rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>	
														
										<div class="form-group row">
                                            <div class="offset-4 col-8">
                                               	<button name="submit" type="submit" class="btn btn-primary" style="margin-left:15px;">Send</button>	
                                            </div>
                                        </div>					
														
					
														
									<hr>						
									
														
							<div class="row">
							<div class="col-md-12">
								<h4 style="text-transform: uppercase; font-weight: bold;">Request/Complain List</h4>
						
							</div>
							</div>
								<div class="table-responsive">
									
										<table class="table">
											<tbody>
												<thead>

													<th>Flat No</th>
													<th>Category</th>
													<th>Message</th>
													<th>Status</th>
													<th>Option</th>
												
												</thead>


<?php

	include_once( "../includes/db.php" );
	$sql="Select * from service where  	manager=1";
	$result = mysqli_query( $con, $sql );
	//echo "<script>window.alert('Request Completed!!')</script>";
												
												
												
	while ( $res = mysqli_fetch_array( $result ) ) {
		$statuscheck=$res['status'];
		echo "<tr>";
		echo "<td>" . $res[ 'flat_no' ] . "</td>";	
		echo "<td>" . $res[ 'problem' ] . "</td>";	
		echo "<td>" . $res[ 'msg' ] . "</td>";	
		if($res <0){
			
		echo "<td>"."Data Not Found!!"."</td>";
			
		}else{
		if($res[ 'status' ]==0)
		{
			$stat="Pending";
			echo "<td>" ."<span class='btn btn-warning'>".$stat."</span>". "</td>";
		}
			else{
				
				$stat="DONE";
				echo "<td>" ."<span class='btn btn-success'>".$stat."</span>". "</td>";
			}
	
			
		}
		if($statuscheck==0)
			{
				echo "<td> <a class='btn btn-primary' href=\"msg_done.php?id=$res[id]\">DONE</a></td>";
				
			}else{
				
				echo "<td><a class='btn btn-success'>Solved</a></td>";
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