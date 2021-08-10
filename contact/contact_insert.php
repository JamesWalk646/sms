<?php

//   create a database connection 
$con = mysqli_connect("localhost","root","","php_auth_api");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');


$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
	
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// if no error caused, continue ....
if(!isset($errorMSG))
{
	$sql = "INSERT INTO contact(name,email,message)VALUES('$name','$email','$message')";
 
	$result =  mysqli_query($con,$sql);
			
	echo json_encode(array("message" => "Data Inserred Successfully", "status" => true));	
}

?>
