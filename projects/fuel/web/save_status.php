<?php
/*********************

**** CPanel ******************
*********/

/* Following code will match user login credentials */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db


$data = json_decode(file_get_contents("php://input"));

$get_id = ($data->cus_id);
$get_status = ($data->field_9);

if(empty($get_id) || empty($get_status))
{
	$response["success"] = 2;
	echo json_encode($response);
}
else
{
	// get customer 
	$result = mysqli_query($conn,"UPDATE booking SET field_6='$get_status' WHERE cus_id = '$get_id'");

	// check for empty result
	if($result)
	{
		// success
		$response["success"] = 1;
		
		// echoing JSON response
		echo json_encode($response);
	}
	else 
	{
		// unsuccess
		$response["success"] = 0;
		
		// echoing JSON response
		echo json_encode($response);
	}
}	
?>