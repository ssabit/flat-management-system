<?php
session_start();

if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
include_once("../includes/db.php");
 
$result = mysqli_query($con, "SELECT * FROM money ORDER BY id"); // using mysqli_query instead
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
	<title>Accounts</title>
	
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
				<form action="<?php $_PHP_SELF?>" method="post">
				
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
					<a href="../admin/admin.php" class="list-group-item list-group-item-action ">Users</a>
					<a href="#" class="list-group-item list-group-item-action active">Bank Management</a>
					<a href="../admin/flat_add_edit.php" class="list-group-item list-group-item-action ">Flat</a>
				<a href="../admin/Flat_details.php" class="list-group-item list-group-item-action">Flat Details</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-transform: uppercase; font-weight: bold;">Clients List</h4>
								<hr>
								<a href="create_account.php" class="glyphicon glyphicon-plus"  
>CreateNewAccount</a><br/>
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
													<th>User ID</th>
													<th>User Name</th>
													<th>Balance</th>
													<th>Options</th>
												</thead>

												 <?php 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['user_id']."</td>";
            echo "<td>".$res['user_name']."</td>";
			echo "<td>".$res['balance']."</td>";
            echo "<td><a href=\"accounts_edit.php?id=$res[id]\">Edit</a> | <a href=\"delete_bank_account.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			

			
			
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