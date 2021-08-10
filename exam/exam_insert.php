<?php
$con = mysqli_connect("localhost","root","","php_auth_api");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');


$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
$class_name = $_POST['class_name'];
$exam_name = $_POST['exam_name'];
$exam_startdate  = $_POST['exam_startdate'];
$exam_enddate  = $_POST['exam_enddate'];
$subject_name  = $_POST['subject_name'];
		
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$sql = "INSERT INTO exams(class_name,exam_name,exam_start_date,exam_end_date,subject_name)VALUES('$class_name','$exam_name','$exam_startdate','$exam_enddate','$subject_name')";
	$result =  mysqli_query($con,$sql);
	echo json_encode(array("message" => "Data Sumitted Successfully", "status" => true));	
}

?>