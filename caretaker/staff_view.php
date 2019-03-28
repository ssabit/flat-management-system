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
	<title>Staff Details</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
			<div class="col-md-3">
				<div class="list-group ">
					<a href="caretaker.php" class="list-group-item list-group-item-action ">Users</a>
					<a href="create_notice.php" class="list-group-item list-group-item-action ">Create Notice</a>
					<a href="requests.php" class="list-group-item list-group-item-action">Service Requet Received<span class="fa fa-globe" style="color: red;font-weight: 800;padding: 5px;"></span></a>
					<a href="rent.php" class="list-group-item list-group-item-action ">Rent Request Send</a>
					<a href="payment_received.php" class="list-group-item list-group-item-action">Rent Request Details</a>
					<a href="#" class="list-group-item list-group-item-action">Payment History</a>
					<a href="send_msg.php" class="list-group-item list-group-item-action">Request/Complain</a>
					<a href="io_tracker.php" class="list-group-item list-group-item-action">In-Out Track</a>
					<a href="staff_Add.php"  class="list-group-item list-group-item-action">Staff Add</a>
					<a href="#"  class="list-group-item list-group-item-action  active">Staff Details</a>
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
								<h4 style="text-transform: uppercase; font-weight: bold;">Staff Details</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div id="records_content">
									<!-- Data record Table -->
								</div>
								<div class="container">
									<!--Update Modal -->
									<div class="modal fade" id="myEditModal" role="dialog">
										<div class="modal-dialog">

											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="btn btn-warning btn-circle pull-right" data-dismiss="modal">&times;</button>
													<h3 class="modal-title text-center">Edit Data</h3>
												</div>
												<div class="modal-body">
													<form action="" method="post">
														<div class="form-group">
															<label for="name">Name:</label>
															<input type="text" class="form-control" id="u_name" placeholder="Enter name" name="name">
														</div>
														<div class="form-group">
															<label for="gender">Gender:</label>
															<div class="gender">
																<input name="gender" class="radio_chk" value="0" type="radio" checked />Male
																</label>
																<input name="gender" class="radio_chk" value="1" type="radio"/>Female
																</label>
															</div>

														</div>
														<div class="form-group">
															<label for="nid">NID:</label>
															<input type="text" class="form-control" id="nid" placeholder="How many people" name="nid">
														</div>
														<div class="form-group ">
															<label for="flatno">Staff Category:</label>
															<div class="">
																<input id="category" name="category" placeholder="category" class="form-control" type="text" style="width:50%;float: left;" value="">

																<SELECT class="form-control" style="width:40%; pading-left:10px; " onChange="this.form.category.value=this.options[this.selectedIndex].value">
																	<OPTION VALUE="">Select
																		<OPTION VALUE="domestic_worker">Domestic Worker
																			<OPTION VALUE="cook">Cook
																				<OPTION VALUE="driver">Driver
																</SELECT>
															</div>
														</div>

														<div class="form-group ">
															<label for="flatno">Flat No:</label>
															<div class="">
																<input id="u_flatno" name="flatno" placeholder="flatno" class="form-control" type="text" style="width:50%;float: left;" value="">

																<SELECT class="form-control" style="width:40%; pading-left:10px; " onChange="this.form.flatno.value=this.options[this.selectedIndex].value">
																	<OPTION VALUE="">Select
																		<OPTION VALUE="1(A)">1(A)
																			<OPTION VALUE="1(B)">1(B)
																				<OPTION VALUE="1(C)">1(C)
																					<OPTION VALUE="2(A)">2(A)
																						<OPTION VALUE="2(B)">2(B)
																</SELECT>
															</div>
														</div>



														<div class="form-group">
															<label for="phone">Contct Number:</label>
															<input type="text" class="form-control" id="phone" placeholder="Enter contact number" name="phone">
														</div>
													<div class="form-group">
										<label for="address" class="col-4 col-form-label">Address:</label>
										<div class="col-8">
											<textarea id="address" name="address" cols="40" rows="4" class="form-control"></textarea>
										</div>
									</div>						
														<div>
															<input type="hidden" name="u_id" id="u_id">
														</div>
														<button onclick="updateRecords();" type="button" name="submit" id="u_submit" class="btn btn-success">Submit Data</button>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>

										</div>
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

<script>
	$( function () {
		readRecords();
	} );


	function readRecords() {
		var readRecords = "readRecords";
		$.post( {
			url: 'staff_view_ajax.php',
			type: 'post',
			data: {
				readRecords: readRecords
			},
			success: function ( data, status ) {
				$( '#records_content' ).html( data )

			}
		} )
	}

	function deleteRecord( deleteId ) {
		var conf = confirm( 'Do you want to delete data?' );
		if ( conf == true ) {
			$.post( {
				url: 'staff_view_ajax.php',
				type: 'post',
				data: {
					deleteId: deleteId
				},
				success: function ( data, status ) {
					$( '#records_content' ).html( data );

					readRecords();
				}
			} );
		}
	}

	///////fetching data from database in this function

	function editRecord( id ) {
		$( '#u_id' ).val( id );
		$.post( {
			url: 'staff_view_ajax.php',
			type: 'post',
			data: {
				id: id
			},
			success: function ( data, status ) {
				var user = JSON.parse( data );

				$( '#u_name' ).val( user.name );
				$( '#nid' ).val( user.nid );
				$( '#category' ).val( user.category );
				$( '#u_flatno' ).val( user.flat_no );
				$( '#phone' ).val( user.phone );
				$( '#gender' ).val( user.gender );
				$( '#address' ).val( user.address );
			}
		} );

		$( "#myEditModal" ).modal( 'show' );
	}



	function updateRecords() {
		var u_id = $( '#u_id' ).val();
		var u_name = $( '#u_name' ).val();
		var nid = $( '#nid' ).val();
		var category = $( '#category' ).val();
		var u_flatno = $( '#u_flatno' ).val();
		var phone = $( '#phone' ).val();
		var gender = $( '.radio_chk:checked' ).val();
		var address = $( '#address' ).val();


		$.post( {
			url: 'staff_view_ajax.php',
			type: 'post',
			data: {
				u_name: u_name,
				nid: nid,
				u_flatno: u_flatno,
				phone: phone,
				updateId: u_id,
				gender: gender,
				address: address,
				category:category
				
			},
			success: function ( data, status ) {
				$( "#myEditModal" ).modal( 'hide' );
				readRecords();
			}
		} );
	}
</script>

</html>