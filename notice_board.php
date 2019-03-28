<?php
session_start();
if($_SESSION['u_id']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
   
}
$_SESSION['u_level'];
$_SESSION['id'];
$_SESSION['u_id'];
$flatno=$_SESSION['flat'];
	include_once("includes/db.php");
	$query = "SELECT * FROM `notice`  order by id desc";

	$date = new DateTime();
	$date->setTimeZone(new DateTimeZone("Asia/Dhaka"));
	$get_datetime = $date->format('l, F dS, Y g:i A');

	$result = mysqli_query( $con, $query );

?>
<?php

if(isset($_POST['logout'])){
	
	header("Location: includes/logout.php");
	exit();
	
}



?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Notice Board</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/user.css">
	
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
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-transform: uppercase; font-weight: bold;">Notice Board</h4>
								<hr>
							</div>
						</div>
						<h4 style="text-transform: uppercase; font-weight: bold;text-align:center;">Official Notice Board</h4>
						<div class="row">
							<div class="col-md-12">
								<form action="admin/feed.php">
									<div class="table-responsive">
										<table class="table">
											<tbody>

												 <?php 
		
        while($row = mysqli_fetch_array($result)) {         
            echo "<tr >";
			echo "<td colspan='11'>"."Title: ".$row['notice_title']."<br><br>"."Published on - ".$row['date']."<br><br>"."Notice: ".$row['status']."</td>";
				
	
			
			if($_SESSION['u_level']==1){
					echo "<td><a href=\"caretaker/notice_delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><span class='glyphicon glyphicon-trash'></span></a></td>";
				
			}
			 echo "</tr>";

			
			
        }
        ?>

											</tbody>



										</table>
									</div>

								</form>



							</div>
						</div>

					</div>
					<hr>
					<h4 style="text-transform: uppercase; font-weight: bold;text-align:center;">Personal Notice Board</h4>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<!--<h4 style="text-transform: uppercase; font-weight: bold;">Personal Notice</h4>
								<hr>-->
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="admin/feed.php">
									<div class="table-responsive">
										<table class="table">
											<tbody>

											 <?php 
        
			$query = "SELECT * FROM `service` where  flat_no='$flatno' AND manager=1 order by id desc";	
			$result = mysqli_query( $con, $query );
			while($row = mysqli_fetch_array($result)) {         
            echo "<tr >";
			echo "<td colspan='11'>"."Category: ".$row['problem']."<br><br>"."Flat No: ".$row['flat_no']."<br><br>"."Published on - ".$row['date']."<br><br>"."MSG: ".$row['msg']."</td>";
			 echo "</tr>";
			
			
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