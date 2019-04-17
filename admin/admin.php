<?php
session_start();
if($_SESSION['u_id']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
include_once("../includes/db.php");
 
$result = mysqli_query($con, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
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
	<title>Users List</title>
	
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
					<a href="#" class="list-group-item list-group-item-action active">Users</a>
					<a href="../bank/accounts.php" class="list-group-item list-group-item-action">Bank Management</a>
					<a href="flat_add_edit.php" class="list-group-item list-group-item-action">Flat</a>
					<a href="Flat_details.php" class="list-group-item list-group-item-action">Flat Details</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-transform: uppercase; font-weight: bold;">User List</h4>
								<hr>
								<a href="add_user.php" class="glyphicon glyphicon-plus"  
>AddUser</a><br/>
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
										
													<th>Username</th>
													<th>Password</th>
													<th>Email</th>
													<th>Role</th>
													<th>Options</th>
												</thead>

												 <?php 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['username']."</td>";
            echo "<td style='max-width: 150px;word-wrap: break-word;'>".$res['password']."</td>";
            echo "<td>".$res['email']."</td>";
			//echo "<td>".$res['user_level']."</td>";
            if($res['user_level']==1)
			{
				echo "<td>"."Care Taker"."</td>";
			}else if($res['user_level']==2)
			{
				
				echo "<td>"."Landlord"."</td>";
			}else if($res['user_level']==3)
			{
				
				echo "<td>"."Admin"."</td>";
			}else if($res['user_level']==4)
			{
				
				echo "<td>"."Tenant"."</td>";
			}else
			{
				
				echo "<td>"."None"."</td>";
			}
			echo "<td><a href=\"user_edit.php?id=$res[id]\" ><button type='button' class='btn btn-info'>Edit</button></a> | <a href=\"delete_user.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button type='button' class='btn btn-danger'>Delete</button></a></td>";
			

			
			
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