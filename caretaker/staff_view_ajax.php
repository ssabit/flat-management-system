<?php include '../includes/db.php'; ?>

<?php 
	
	extract($_POST);

    $date = new DateTime();
	$date->setTimeZone( new DateTimeZone( "Asia/Dhaka" ) );
	$get_datetime = $date->format( 'g:i A, d-M-y' );

    // View records

	if (isset($_POST['readRecords'])) {
		
		$data = '<table class="table table-bordered table-striped">
    				<thead>
    				  <tr>
    				    <th>S.No.</th>
    				    <th>Image</th>
						
    				    <th>Name</th>
    				    <th>Category</th>
    				    <th>NID</th>
    				    <th>Gender</th>
    				    <th>Address</th>
    				    <th>Flat_no</th>
    				    <th>Phone</th>
    				    <th>Actions</th>
    				  </tr>
    				</thead>';

    	$q = "SELECT * FROM `domestic_worker` ";
    	$res = mysqli_query($con,$q);
    	 if (mysqli_num_rows($res) > 0 ) {
    	 	$s_no = 1;
    	 	$gender="";
    	 	$in_out="";
			 while ($row = mysqli_fetch_array($res)) {
				if($row['gender']==0){
					$gender="Male";
				}
					
					else{
						$gender="Female";
					}
				 
    	 		$data.='<tbody>
    					  <tr>
    					    <td>'.$s_no.'</td>
							<td><img src="../uploads/'.$row["image_name"].'" class="img-thumbnail" width="100" height="100" /></td>
    					    <td>'.$row['name'].'</td>
    					    <td>'.$row['category'].'</td>
    					    <td>'.$row['nid'].'</td>
							<td>'.$gender.'</td>
    					    <td>'.$row['address'].'</td>
    					    <td>'.$row['flat_no'].'</td>
    					    <td>'.$row['phone'].'</td>
							
    					    

    					    <td><a href="javascript:void(0);"  onclick="editRecord('.$row['id'].')" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp; 
    					        <a href="javascript:void(0);" onclick="deleteRecord('.$row['id'].')"  class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a></td>
    					  </tr>     
    					</tbody>';
    					$s_no++;
    	 	}
    	 }
    	 $data.='</table>';

    	 echo $data;
	}

// Delete records

    if (isset($_POST['deleteId'])) {
        $deleteId = $_POST['deleteId'];

        $q = "DELETE FROM `domestic_worker` WHERE id = $deleteId";
        $res = mysqli_query($con, $q);
    }


// Get data id for update

    if (isset($_POST['id']) && isset($_POST['id']) != "") {
        $u_id = $_POST['id'];

        $q = "SELECT * FROM `domestic_worker` WHERE id = $u_id";
        if (!$result = mysqli_query($con,$q)) {
            exit(mysqli_error());
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $response = $row;
            }
        }else{
            $response['status'] = 200;
            $response['message'] = "Data not found";
        }

        echo json_encode($response);

    }else{
        $response['status'] = 200;
        $response['message'] = "Invalid request";
    }



// update / edit record data

    if (isset($_POST['updateId'])) {
        $id = $_POST['updateId'];
        $name = $_POST['u_name'];
        $nid = $_POST['nid'];
        $flatno = $_POST['u_flatno'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $category = $_POST['category'];
        $address = $_POST['address'];

        $query = "UPDATE `domestic_worker` SET `name`='$name',`category`='$category',`nid`='$nid',`gender`='$gender',`address`='$address',`flat_no`='$flatno',`phone`='$phone' WHERE id = '$id' ";

        $result = mysqli_query($con,$query);
		
		var_dump($result);
		return;

    }

 ?>