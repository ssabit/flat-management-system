<?php
session_start();
if($_SESSION['u_id']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
include_once("../includes/db.php");
 
$result = mysqli_query($con, "SELECT * FROM flat ORDER BY  	flat_no ASC"); // using mysqli_query instead
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
	<title>Flat Details</title>
	
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
				<form action="admin.php" method="post">
				
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
					<a href="admin.php" class="list-group-item list-group-item-action">Users</a>
					<a href="../bank/accounts.php" class="list-group-item list-group-item-action">Bank Management</a>
					<a href="flat_add_edit.php" class="list-group-item list-group-item-action">Flat</a>
					<a href="#" class="list-group-item list-group-item-action active">Flat Details</a>
				</div> 
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-transform: uppercase; font-weight: bold;">Flat Details</h4>
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
													<th>User ID</th>
													<th>Flat No</th>
													<th>Name</th>
													<th>Flat Rent</th>
													<th>Broadband</th>
													<th>Cable Tv</th>
													<th>GAS</th>
													<th>Water</th>
													<th>Maintenance</th>
													<th>Options</th>
												</thead>

												 <?php 
        while($res = mysqli_fetch_array($result)) {         
            $id=$res['id'];
			echo "<tr>";
            echo "<td>".$res['user_id']."</td>";
            echo "<td>".$res['flat_no']."</td>";
            echo "<td>".$res['tenantname']."</td>";
            echo "<td>".$res['flatrent']."</td>";
            echo "<td>".$res['broadband']."</td>";
            echo "<td>".$res['cabletv']."</td>";
            echo "<td>".$res['gas']."</td>";
            echo "<td>".$res['water']."</td>";
            echo "<td>".$res['maintenance']."</td>"; 
			echo "<td><a href=\"delete_details.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			

			
			
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