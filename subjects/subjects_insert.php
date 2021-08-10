<?php
$con = mysqli_connect("localhost","root","","php_auth_api");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');


$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
$subject_name = $_POST['subject_name'];
$subject_code= $_POST['subject_code'];
$teacher_name= $_POST['teacher_name'];
$book_name = $_POST['book_name'];
		
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$sql = "INSERT INTO teachers(subject_name,subject_code,fname,book_name) VALUES('$subject_name','$subject_code','$teacher_name','$book_name')";
 
	$result =  mysqli_query($con,$sql);
			
	echo json_encode(array("message" => "Data Sumitted Successfully", "status" => true));	
}

?>