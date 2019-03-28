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

<!--
//index.php
! -->

<?php

include( 'database_connection.php' );

//session_start();

if ( !isset( $_SESSION[ 'user_id' ] ) ) {
	header( "location:../index.php" );
}

?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Message</title>
	 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
					<a href="#" target="_blank" class="list-group-item list-group-item-action active">Message</a>

				</div>
			</div>

			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-transform: uppercase; font-weight: bold;">Message </h4>

								<hr>


								<div class="table-responsive">
									<div id="user_details"></div>
									<div id="user_model_details"></div>
								</div>





							</div>
						</div>


					</div>
				</div>
			</div>


		</div>

	</div>
</body>

</html>

<script>
	$( document ).ready( function () {

		fetch_user();

		setInterval( function () {
			update_last_activity();
			fetch_user();
			update_chat_history_data();
		}, 5000 );

		function fetch_user() {
			$.ajax( {
				url: "fetch_user.php",
				method: "POST",
				success: function ( data ) {
					$( '#user_details' ).html( data );
				}
			} )
		}

		function update_last_activity() {
			$.ajax( {
				url: "update_last_activity.php",
				success: function () {

				}
			} )
		}

		function make_chat_dialog_box( to_user_id, to_user_name ) {
			var modal_content = '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="You have chat with ' + to_user_name + '">';
			modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
			modal_content += fetch_user_chat_history( to_user_id );
			modal_content += '</div>';
			modal_content += '<div class="form-group">';
			modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id + '" class="form-control chat_message"></textarea>';
			modal_content += '</div><div class="form-group" align="right">';
			modal_content += '<button type="button" name="send_chat" id="' + to_user_id + '" class="btn btn-info send_chat">Send</button></div></div>';
			$( '#user_model_details' ).html( modal_content );
		}

		$( document ).on( 'click', '.start_chat', function () {
			var to_user_id = $( this ).data( 'touserid' );
			var to_user_name = $( this ).data( 'tousername' );
			make_chat_dialog_box( to_user_id, to_user_name );
			$( "#user_dialog_" + to_user_id ).dialog( {
				autoOpen: false,
				width: 400
			} );
			$( '#user_dialog_' + to_user_id ).dialog( 'open' );
		} );

		$( document ).on( 'click', '.send_chat', function () {
			var to_user_id = $( this ).attr( 'id' );
			var chat_message = $( '#chat_message_' + to_user_id ).val();
			$.ajax( {
				url: "insert_chat.php",
				method: "POST",
				data: {
					to_user_id: to_user_id,
					chat_message: chat_message
				},
				success: function ( data ) {
					$( '#chat_message_' + to_user_id ).val( '' );
					$( '#chat_history_' + to_user_id ).html( data );
				}
			} )
		} );

		function fetch_user_chat_history( to_user_id ) {
			$.ajax( {
				url: "fetch_user_chat_history.php",
				method: "POST",
				data: {
					to_user_id: to_user_id
				},
				success: function ( data ) {
					$( '#chat_history_' + to_user_id ).html( data );
				}
			} )
		}

		function update_chat_history_data() {
			$( '.chat_history' ).each( function () {
				var to_user_id = $( this ).data( 'touserid' );
				fetch_user_chat_history( to_user_id );
			} );
		}

		$( document ).on( 'click', '.ui-button-icon', function () {
			$( '.user_dialog' ).dialog( 'destroy' ).remove();
		} );

		$( document ).on( 'focus', '.chat_message', function () {
			var is_type = 'yes';
			$.ajax( {
				url: "update_is_type_status.php",
				method: "POST",
				data: {
					is_type: is_type
				},
				success: function () {

				}
			} )
		} );

		$( document ).on( 'blur', '.chat_message', function () {
			var is_type = 'no';
			$.ajax( {
				url: "update_is_type_status.php",
				method: "POST",
				data: {
					is_type: is_type
				},
				success: function () {

				}
			} )
		} );

	} );
</script>