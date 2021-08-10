<?php
$con = mysqli_connect("localhost","root","","php_auth_api");
$sql = "SELECT * FROM `teachers` ";
$result = mysqli_query($con,$sql);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');


$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format

$class_name = $_POST['class_name'];
$class_number = $_POST['class_number'];
$num_of_students= $_POST['num_of_students'];
$fname= $_POST['teacher_name'];
$class_start= $_POST['class_start'];
$class_end = $_POST['class_end'];
$class_location = $_POST['class_location'];		
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$sql = "INSERT INTO teachers(class_name,class_number,num_of_students,fname,class_start,class_end,class_location)VALUES('$class_name','$class_number','$num_of_students','$fname','$class_start', '$class_end','$class_location')";
 
	$result =  mysqli_query($con,$sql);
			
	echo json_encode(array("message" => "Data Submitted Successfully", "status" => true));	
}



?>