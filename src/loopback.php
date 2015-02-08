<?php

$requestMethod = $_SERVER['REQUEST_METHOD']; 

$returnData = array();

$returnData['Type'] = $requestMethod;

switch ($requestMethod) {
	case 'GET':
		$returnData['parameters'] = $_GET; 
		break;
	case 'POST':
		$returnData['parameters'] = $_POST; 
		break;		
}

echo json_encode($returnData);

?>
