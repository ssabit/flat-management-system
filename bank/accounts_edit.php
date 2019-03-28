<?php

session_start();
if($_SESSION['u_name']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
?>

<?php
// including the database connection file
include_once("../includes/db.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $username=$_POST['username'];
    $balance=$_POST['balance'];

    // checking empty fields
    if(empty($username) || empty($balance)) {            
        if(empty($username)) {
            echo "<font color='red'>UserName field is empty.</font><br/>";
        }
        
        if(empty($balance)) {
            echo "<font color='red'>Balance field is empty.</font><br/>";
        }
	
	} else {    

        $result = mysqli_query($con, "UPDATE money SET balance=$balance WHERE id=$id");
       
		//$result = mysqli_query($con, "UPDATE users SET username='$username',password='$password',email='$email' WHERE id=$id");
		// echo $username;
        //echo $password;
        //echo $email;
        //echo $userlevel;
		//echo "$result";
		//return;
		
        header("Location: accounts.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM money WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $username = $res['user_name'];
    $balance = $res['balance'];

}
?>



<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>User Edit</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
					<?php //echo $_SESSION['u_id'];?>
				</li><br>
				<li id="button"><button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
				</li>
			</ul>

		</div>



	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 ">
				<div class="list-group ">
					<a href="#" class="list-group-item list-group-item-action">Users</a>
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
								<h4>Edit User</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="accounts_edit.php" method="post">
									<div class="form-group row">
										<label for="username" class="col-4 col-form-label">User Name</label>

										<div class="col-8">
											<input id="username" name="username" placeholder="" class="form-control here" type="readonly" value="<?php echo $username;?>"readonly>
										</div>
									</div>
				
									<div class="form-group row">
										<label for="balance" class="col-4 col-form-label">Balance</label>
										<div class="col-8">
											<input id="balance" name="balance" placeholder="balance" class="form-control here" type="text" value="<?php echo $balance;?>">
										</div>
									</div>
									
									<div class="form-group row">
										<div class="offset-4 col-8">
											<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
											<button name="update" type="submit" class="btn btn-primary">Update</button>
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