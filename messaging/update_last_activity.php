<?php

//update_last_activity.php

include('database_connection.php');

session_start();

$query = "
UPDATE login_details 
SET last_activity = DATE_ADD(now(), INTERVAL 6 HOUR) 
WHERE login_details_id = '".$_SESSION["login_details_id"]."'
";

$statement = $connect->prepare($query);

$statement->execute();

?>