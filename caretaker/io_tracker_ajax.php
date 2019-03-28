<?php include '../includes/db.php'; ?>

<?php 
	
	extract($_POST);

    $date = new DateTime();
	$date->setTimeZone( new DateTimeZone( "Asia/Dhaka" ) );
	$get_datetime = $date->format( 'g:i A, d-M-y' );

    if (isset($_POST['name']) && isset($_POST['people']) && isset($_POST['flatno']) && isset($_POST['cnum']) && isset($_POST['gender'])) {

        $q = "INSERT INTO `in_out_tracker`(`name`, `people`, `flat_no`, `cnum`,`gender`,`in_out`,`date_time`) VALUES ('$name','$people','$flatno','$cnum',$gender,$in_out,'$get_datetime')";
        $res = mysqli_query($con,$q);       
    }

    // View records

	if (isset($_POST['readRecords'])) {
		
		$data = '<table class="table table-bordered table-striped">
    				<thead>
    				  <tr>
    				    <th>S.No.</th>
    				    <th>Name</th>
    				    <th>People</th>
    				    <th>Flat No.</th>
    				    <th>In/Out</th>
    				    <th>Contact Number</th>
    				    <th>Gender</th>
    				    <th>Time</th>
    				    <th>Actions</th>
				
    				  </tr>
    				</thead>';

    	$q = "SELECT * FROM `in_out_tracker` ";
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
				 if($row['in_out']==0){
					$in_out="In";
				}
					
					else{
						$in_out="Out";
					}
    	 		$data.='<tbody>
    					  <tr>
    					    <td>'.$s_no.'</td>
    					    <td>'.$row['name'].'</td>
    					    <td>'.$row['people'].'</td>
    					    <td>'.$row['flat_no'].'</td>
							 <td>'.$in_out.'</td>
    					    <td>'.$row['cnum'].'</td>
							
    					    <td>'.$gender.'</td>
    					    <td>'.$row['date_time'].'</td>
    					   
							
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

        $q = "DELETE FROM `in_out_tracker` WHERE id = $deleteId";
        $res = mysqli_query($con, $q);
    }


// Get data id for update

    if (isset($_POST['id']) && isset($_POST['id']) != "") {
        $u_id = $_POST['id'];

        $q = "SELECT * FROM `in_out_tracker` WHERE id = $u_id";
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
        $u_id = $_POST['updateId'];
        $u_name = $_POST['u_name'];
        $u_people = $_POST['u_people'];
        $u_flatno = $_POST['u_flatno'];
        $u_cnum = $_POST['u_cnum'];
        $gender = $_POST['gender'];
        $in_out = $_POST['in_out'];

        $query = "UPDATE `in_out_tracker` SET `name`='$u_name',`people`='$u_people',`flat_no`='$u_flatno',`cnum`='$u_cnum',`gender`='$gender',`in_out`='$in_out',`date_time`='$get_datetime' WHERE id = '$u_id' ";

        $result = mysqli_query($con,$query);

    }

 ?>