<?php
header("Content-Type:application/json");
require "data.php";

switch($_SERVER['REQUEST_METHOD']) {
	case 'GET': apiGET(); break;
	case 'PUT': apiPUT(); break;
	case 'UPDATE': apiUPDATE(); break;
	case 'DELETE': apiDELETE(); break;
	default: response(400,"Invalid Request",NULL); break;
}

function apiGET() {
	if (isset($_GET['search'])) {
		$contact = getContacts($_GET['search']);
		if(empty($contact)) {
			response(200,"Contact Not Found",NULL);
		} else {
			response(200,"Contact Found",$contact);
		}
	} else {
		$contact = getContacts('all');
		response(200,"All Contacts",$contact);
	}
} 

function apiPUT() {
	$response['data']= $_SERVER['REQUEST_METHOD'];
	echo json_encode($response);
}

function apiDELETE() {
	$response['data']= $_SERVER['REQUEST_METHOD'];
	echo json_encode($response);
}

function apiUPDATE() {
	$response['data']= $_SERVER['REQUEST_METHOD'];
	echo json_encode($response);
}

function response($status,$status_message,$data) {
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	$response['method']=$_SERVER['REQUEST_METHOD'];
	
	$json_response = json_encode($response);
	echo $json_response;
}
