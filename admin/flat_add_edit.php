<?php

session_start();
if($_SESSION['u_id']==NULL){
    //haven't log in
   // echo "You haven't log in";
    header("Location: ../index.php?login=error");
}
include_once("../includes/db.php");
?>

<?php

if(isset($_POST['logout'])){
	
	header("Location: ../includes/logout.php");
	exit();
	
}



?>



<?php

if ( isset( $_POST[ 'search' ] ) ) {
	// id to search
	$id = $_POST[ 'searchbar' ];

	//echo "$id";




	$query = "SELECT `id`,`flat_no`, `user_id`, `tenantname`,`flatrent`,`broadband`,`cabletv`,gas,`water`,maintenance FROM `flat` WHERE `flat_no`='$id'";

			
	
	
	$result = mysqli_query( $con, $query );
	// if id exist 
	// show data in inputs
	if ( mysqli_num_rows( $result ) > 0 ) {
		while ( $row = mysqli_fetch_array( $result ) ) {

			$flatid=$row['id'];
			$flat_no = $row[ 'flat_no' ];
			$user_id = $row[ 'user_id' ];
			$tenantname = $row[ 'tenantname' ];
			$flatrent = $row[ 'flatrent' ];
			$broadband = $row[ 'broadband' ];
			$cabletv = $row[ 'cabletv' ];
			$gas = $row[ 'gas' ];
			$water = $row[ 'water' ];
			$maintenance = $row[ 'maintenance' ];
		}


	}

	// if the id not exist
	// show a message and clear inputs
	else {
			$flatid="";
			$flat_no="";
			$user_id="";
			$tenantname="";
			$flatrent="";
			$broadband="";
			$cabletv="";
			$gas="";
			$water="";
			$maintenance="";
		echo "<script>window.alert('Flat Not Found!!')</script>";
		
	}
}

else {
			$flatid="";
			$flat_no="";
			$user_id="";
			$tenantname="";
			$flatrent="";
			$broadband="";
			$cabletv="";
			$gas="";
			$water="";
			$maintenance="";
	
}




if (isset($_POST['add'])) {

			$flatid=$_POST['flatid'];
			$flat_no=$_POST['flatno'];
			$user_id=$_POST['userid'];
			$tenantname=$_POST['tenantname'];
			$flatrent=$_POST['flatrent'];
			$broadband=$_POST['broadband'];
			$cabletv=$_POST['cabletv'];
			$gas=$_POST['gas'];
			$water=$_POST['water'];
			$maintenance=$_POST['mintenance'];
		
		//echo "get data";

	//var_dump($connect);
	$sql= "INSERT INTO `flat`(`flat_no`, `user_id`, `tenantname`,`flatrent`,`broadband`,`cabletv`,`gas`,`water`,`maintenance`) VALUES ('$flat_no',$user_id,'$tenantname',$flatrent,$broadband,$cabletv,$gas,$water,$maintenance)";
		//echo "$sql";
		//sreturn;	
	if (mysqli_query($con, $sql)) {
    //echo "New record created successfully";
			$flat_no="";
			$user_id="";
			$tenantname="";
			$flatrent="";
			$broadband="";
			$cabletv="";
			$gas="";
			$water="";
			$maintenance="";
	
		echo "<script>window.alert('New record created successfully')</script>";
		
		
	
} else {
		echo "<script>window.alert('input field empty')</script>";
    //echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
	
    }
?>
<?php


if(isset($_POST['update']))
{    
	//echo "update got";
			$flatid=$_POST['flatid'];
			$flat_no=$_POST['flatno'];
			$user_id=$_POST['userid'];
			$tenantname=$_POST['tenantname'];
			$flatrent=$_POST['flatrent'];
			$broadband=$_POST['broadband'];
			$cabletv=$_POST['cabletv'];
			$gas=$_POST['gas'];
			$water=$_POST['water'];
			$maintenance=$_POST['mintenance'];

	
		
	
	
	
	
		$sql="UPDATE flat SET flat_no='$flat_no',user_id=$user_id,tenantname='$tenantname',flatrent=$flatrent,broadband=$broadband,cabletv=$cabletv,gas=$gas,water=$water,maintenance=$maintenance WHERE id=$flatid";
		
		//echo "$sql";
		//return;	
	$res=mysqli_query($con, $sql);
		//var_dump($res);
		
		if ($res) {
    //echo "New record created successfully";
			$flat_no="";
			$user_id="";
			$tenantname="";
			$flatrent="";
			$broadband="";
			$cabletv="";
			$gas="";
			$water="";
			$maintenance="";
	
		echo "<script>window.alert('Record Updated successfully')</script>";
		
	
} else {
    echo "<script>window.alert('input field empty')</script>";
			//echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
    }
?>



<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Flat Rent Add or Edit</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/user.css">
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<!--	<script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>-->
	
	<script src="../js/typeahead.js"></script>
	

	<style>
		h1 {
			font-size: 20px;
			color: #111;
		}
		
		.content {
			width: 80%;
			margin: 0 auto;
			margin-top: 50px;
		}
		
		.tt-hint,
		.searchbar {
			border: 2px solid #CCCCCC;
			border-radius: 8px 8px 8px 8px;
			font-size: 24px;
			height: 45px;
			line-height: 30px;
			outline: medium none;
			padding: 8px 12px;
			width: 400px;
		}
		
		.tt-dropdown-menu {
			width: 400px;
			margin-top: 5px;
			padding: 8px 12px;
			background-color: #fff;
			border: 1px solid #ccc;
			border: 1px solid rgba(0, 0, 0, 0.2);
			border-radius: 8px 8px 8px 8px;
			font-size: 18px;
			color: #111;
			background-color: #F1F1F1;
		}
	</style>
	<script>
		$( document ).ready( function () {

			$( 'input.searchbar' ).typeahead( {
				name: 'searchbar',
				remote: '../caretaker/find.php?query=%QUERY'

			} );

		} )
	</script>
	
	
	
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
			<div class="col-md-3 ">
				<div class="list-group ">
					<a href="admin.php" class="list-group-item list-group-item-action ">Users</a>
					<a href="../bank/accounts.php" class="list-group-item list-group-item-action">Bank Management</a>
					<a href="#" class="list-group-item list-group-item-action active">Flat</a>
					<a href="Flat_details.php" class="list-group-item list-group-item-action">Flat Details</a>

				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4 style="color: black;font-weight: bold;">Flat Add or Edit</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form action="<?php $_PHP_SELF?>" method="post">
									
									<div class="form-group row">
										<label for="Searchbar" class="col-4 col-form-label">Search Flat</label>

										<div class="col-6">
											<input type="text" name="searchbar" size="30" class="searchbar" placeholder="Enter flat No">
											
											
											<button type="submit" name="search" style="width:10%; margin-left:5px;   float:left;" class="btn btn-link"></button>
										</div>
										
									</div>
									
									<div class="form-group row">
										<label for="flatid" class="col-4 col-form-label" style="display: none">id</label>

										<div class="col-8">
											<input id="flatid" name="flatid" class="form-control here" type="text" value="<?php echo $flatid;?>" style="display: none">
										</div>
									</div>
					
									
									<div class="form-group row">
										<label for="flatno" class="col-4 col-form-label">Flat No</label>

										<div class="col-8">
											<input id="flatno" name="flatno" placeholder="" class="form-control here" type="text" value="<?php echo $flat_no;?>">
										</div>
									</div>
									
									
									<div class="form-group row">
										<label for="tenantname" class="col-4 col-form-label">Tenant Name</label>
										<div class="col-8">
											<input id="tenantname" name="tenantname" placeholder="" class="form-control here" type="text" value="<?php echo $tenantname;?>">
										</div>
									</div>
							
									<div class="form-group row">
										<label for="userid" class="col-4 col-form-label">User ID</label>
										<div class="col-8">
											<input id="userid" name="userid" placeholder="" class="form-control here" type="text" value="<?php echo $user_id;?>">
										</div>
									</div>
									
									
									<div class="form-group row">
										<label for="flatrent" class="col-4 col-form-label">Flat Rent</label>
										<div class="col-8">
											<input id="flatrent" name="flatrent" placeholder="" class="form-control here" type="text" value="<?php echo $flatrent;?>">
										</div>
									</div>				
										
									<div class="form-group row">
										<label for="broadband" class="col-4 col-form-label"> 	Broadband</label>

										<div class="col-8">
											<input id="broadband" name="broadband" placeholder="" class="form-control here" type="text" value="<?php echo $broadband;?>">
										</div>
									</div>
						
									<div class="form-group row">
										<label for="cabletv" class="col-4 col-form-label">CableTv</label>

										<div class="col-8">
											<input id="cabletv" name="cabletv" placeholder="" class="form-control here" type="text"  value="<?php echo $cabletv;?>">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="gas" class="col-4 col-form-label">Gas</label>
										<div class="col-8">
											<input id="gas" name="gas" placeholder="" class="form-control here" type="text"  value="<?php echo $gas;?>">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="water" class="col-4 col-form-label">Water</label>

										<div class="col-8">
											<input id="water" name="water" placeholder="" class="form-control here" type="text"  value="<?php echo $water;?>">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="mintenance" class="col-4 col-form-label">Mintenance</label>

										<div class="col-8">
											<input id="mintenance" name="mintenance" placeholder="" class="form-control here" type="text"  value="<?php echo $maintenance;?>">
										</div>
									</div>

									<div class="form-group row">
										<div class="offset-4 col-8">
											<button name="add" type="submit" class="btn btn-primary">Insert</button>
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