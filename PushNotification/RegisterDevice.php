<?php 
	require_once 'DbOperation.php';
	$response = array(); 

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$token = $_POST['device_name'];
		

		$db = new DbOperation(); 

		$result = $db->registerDevice($token);

		if($result == 0){
			$response['error'] = false; 
			$response['message'] = 'Device registered successfully';
		}elseif($result == 1){
			$response['error'] = true; 
			$response['message'] = 'Error in registration';
		}
	}else{
		$response['error']=true;
		$response['message']='Invalid Request...';
	}

	echo json_encode($response);