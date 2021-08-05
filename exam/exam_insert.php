<?php
$con = mysqli_connect("localhost","root","","php_auth_api");
$sql = "SELECT * FROM `class` ";
$result = mysqli_query($con,$sql);

$query = "SELECT * FROM subjects";
$run = mysqli_query($con,$query);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');


$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format

  while($row = mysqli_fetch_array($result)){
$select_class = $row['class_name'] . $_POST['select_class'];
}
$exam_name = $_POST['exam_name'];
$exam_startdate  = $_POST['exam_startdate'];
$exam_enddate  = $_POST['exam_enddate'];

while($row1 = mysqli_fetch_array($run)){
$select_subject =   $row1['subject_name1'].$_POST['select_subject'];
}
		
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$sql = "INSERT INTO exam(select_class,exam_name, exam_startdate,exam_enddate,select_subjects) VALUES('$select_class','$exam_name','$exam_startdate','$exam_enddate','$select_subject')";
 
	$result =  mysqli_query($con,$sql);
			
	echo json_encode(array("message" => "Data Sumitted Successfully", "status" => true));	
}

?>