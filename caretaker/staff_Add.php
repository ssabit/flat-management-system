<?php
session_start();

if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
include_once("../includes/db.php");
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

<?php
//echo $_SESSION[ 'u_first' ];
//return;
if ( isset( $_POST[ 'post' ] ) ) {

	$file = $_FILES[ 'file' ];

	//print_r();

	$fileName = $_FILES[ 'file' ][ 'name' ];
	$fileTmpName = $_FILES[ 'file' ][ 'tmp_name' ];
	$fileSize = $_FILES[ 'file' ][ 'size' ];
	$fileError = $_FILES[ 'file' ][ 'error' ];
	$fileType = $_FILES[ 'file' ][ 'type' ];

	/*$fSize=$fileSize/1000;
	
	echo "Name:".$fileName."<br>";
	echo "TmpName:".$fileTmpName."<br>";
	echo "Size:".$fSize."KB"."<br>";
	echo "Error:".$fileError."<br>";
	echo "Type:".$fileType."<br>";
	return;*/

	$fileExt = explode( '.', $fileName );
	$fileActualExt = strtolower( end( $fileExt ) );

	$allowed = array( 'jpg', 'jpeg', 'png' ); // Add all the file extensions


	if ( in_array( $fileActualExt, $allowed ) ) {

		if ( $fileError === 0 ) {
			if ( $fileSize < 500000 ) {
				$fileNameNew = uniqid( '', true ) . "." . $fileActualExt;
				$fileDestination = ( '../uploads/' . $fileNameNew );

				move_uploaded_file( $fileTmpName, $fileDestination );
				//echo $fileNameNew;
				//header("Location: upload.php?upload=success");

			} else {

				echo "Your file is too big!";
			}

		} else {
			echo "There was an error uploading your error!";
		}



	} else {

		//echo "You cannot upload files of this type!";

		echo "<script>window.alert('You cannot upload this type of files!')</script>";

	}


	$name = $_POST[ 'name' ];
	$nid = $_POST[ 'nid' ];
	$staff_category = $_POST[ 'staffcategory' ];
	$address = $_POST[ 'address' ];
	$gender = $_POST['gender'];
	$flatno = $_POST[ 'flatno' ];
	$phone = $_POST[ 'phone' ];


	//echo $name;
	//echo $staff_category;
	//echo $address;
	//echo $gender;
	//echo $flatno;
	//echo $phone;
	

	//return;

	$date = new DateTime();
	$date->setTimeZone( new DateTimeZone( "Asia/Dhaka" ) );
	$get_datetime = $date->format( 'l, F dS, Y g:i A' );
	/*echo $name;
	//echo $name;
	//echo $staff_category;
	//echo $address;
	//echo $gender;
	//echo $flatno;
	//echo $phone;
	return;*/
	if ( empty( $name ) || empty( $nid ) || empty( $staff_category ) || empty( $flatno ) || empty( $address ) ) {


		echo "<script>window.alert('Input fields are empty!!')</script>";
	} else {
		$connect = mysqli_connect( "localhost", "root", "", "flat_management_system" );
		//var_dump($connect);
		//$sql = "INSERT INTO `posts2`(`name`,`post_genre`,`status`,`time`) VALUES ('".name. "','".$staff_category."','".$address."','" .$get_datetime."')";

		/*echo name;
		//echo $staff_category;
		//echo $address;
		//echo $gender;
		//echo $flatno;
		//echo $phone;
		return;*/
		if ( $staff_category != NULL ) {
			$sql = "INSERT INTO `domestic_worker`(`name`,`category`,`nid`,`gender`,`address`,`image_name`,`flat_no`,`phone`) VALUES ('" . $name . "','" . $staff_category . "','" . $nid . "','" . $gender . "','" . $address . "','" . $fileNameNew . "','" . $flatno . "','" . $phone . "')";
		} else
			echo "type not found";
		//echo $sql;
		//return;

		if ( mysqli_query( $connect, $sql ) ) {

			echo "<script>window.alert('Data saved Successfully')</script>";
		}
	}
}

?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Add Staff</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/user.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
	<div class="header">

		<!-- Logo -->
		<div class="logo">
			<ul>
				<li id="logo">Flat Management System</li>
				<li id="user">User:
					<?php echo $_SESSION['u_id']; ?>
				</li><br>
				<form action="#" method="post">

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
					<a href="caretaker.php" class="list-group-item list-group-item-action ">Users</a>
					<a href="create_notice.php" class="list-group-item list-group-item-action ">Create Notice</a>
					<a href="requests.php" class="list-group-item list-group-item-action">Service Requet Received<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"></span></a>
					<a href="rent.php" class="list-group-item list-group-item-action ">Rent Request Send</a>
					<a href="payment_received.php" class="list-group-item list-group-item-action">Rent Request Details</a>
					<a href="payment_history.php" class="list-group-item list-group-item-action">Payment History</a>
					<a href="send_msg.php" class="list-group-item list-group-item-action">Request/Complain</a>
					<a href="io_tracker.php" class="list-group-item list-group-item-action">In-Out Track</a>
					<a href="#"  class="list-group-item list-group-item-action active">Staff Add</a>
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
								<h4 style="text-transform: uppercase; font-weight: bold;">Staff Add</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">


								<form action="<?php $_PHP_Self;?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

									<div class="form-group row">
										<label for="upload" class="col-4 col-form-label">Image</label>

										<div class="col-8">
											<input type="file" name="file" style="color:white;">
											<p class="help-block">Only png , jpg and jpeg allowed</p>
										</div>
									</div>

									<div class="form-group row">
										<label for="name" class="col-4 col-form-label">Staff Name</label>

										<div class="col-8">
											<input id="name" name="name" placeholder="Enter Name" class="form-control here" type="text">
										</div>
									</div>


									<div class="form-group row">
										<label for="gender" class="col-4 col-form-label">Gender</label>
										<div class="col-8">

											<input name="gender" id="input-gender-male" value="0" type="radio" checked />Male
											</label>

											<input name="gender" id="input-gender-female" value="1" type="radio">Female
											</label>
										</div>

									</div>



									<div class="form-group row">
										<label for="nid" class="col-4 col-form-label">NID</label>

										<div class="col-8">
											<input id="nid" name="nid" placeholder="Enter nid Number" class="form-control here" type="text">
										</div>
									</div>


									<div class="form-group row">
										<label for="category" class="col-4 col-form-label">Staff Category</label>
										<div class="col-8">
											<input id="category" name="staffcategory" placeholder="" class="form-control here" type="text" style="width:50%;float: left;display:none;">

											<SELECT class="custom-select" style="width:40%; margin-left:5px;   float:left; " onChange="this.form.staffcategory.value = this.options[this.selectedIndex].value">
												<OPTION VALUE="">Select
													<OPTION VALUE="domestic_worker">Domestic Worker
														<OPTION VALUE="cook">Cook
															<OPTION VALUE="driver">Driver

											</SELECT>
										</div>
									</div>
									<div class="form-group row">
										<label for="flatno" class="col-4 col-form-label">Flat No</label>
										<div class="col-8">
											<input id="flatno" name="flatno" placeholder="" class="form-control here" type="text" style="width:50%;float: left;display:none;">

											<SELECT class="custom-select" style="width:40%; margin-left:5px;   float:left; " onChange="this.form.flatno.value = this.options[this.selectedIndex].value">
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

											</SELECT>
										</div>
									</div>
									<div class="form-group row">
										<label for="phone" class="col-4 col-form-label">Phone</label>

										<div class="col-8">
											<input id="nid" name="phone" placeholder="Enter phone Number" class="form-control here" type="text">
										</div>
									</div>

									<div class="form-group row">
										<label for="address" class="col-4 col-form-label">Address</label>
										<div class="col-8">
											<textarea id="address" name="address" cols="40" rows="4" class="form-control"></textarea>
										</div>
									</div>

									<div class="form-group row">
										<div class="offset-4 col-8">
											<button name="post" type="submit" class="btn btn-primary">Add</button>
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