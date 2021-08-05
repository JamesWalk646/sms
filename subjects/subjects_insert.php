<?php
$con = mysqli_connect("localhost","root","","php_auth_api");
$sql = "SELECT * FROM `class` ";
$result = mysqli_query($con,$sql);

$query = "SELECT * FROM teachers";
$run = mysqli_query($con,$query);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');


$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format

  while($row = mysqli_fetch_array($result)){
$class_name = $row[1] . $_POST['class_name'];
}
$subject_name1 = $_POST['subject_name1'];
$subject_code= $_POST['subject_code'];

while($row1 = mysqli_fetch_array($run)){
$select_subjectteacher =   $row1[1].$_POST['select_subjectteacher'];
}
$book_name = $_POST['book_name'];
		
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$sql = "INSERT INTO subjects(select_class,subject_name1,subject_code,select_subjectteacher,book_name) VALUES('$class_name','$subject_name1','$subject_code','$select_subjectteacher','$book_name')";
 
	$result =  mysqli_query($con,$sql);
			
	echo json_encode(array("message" => "Data Sumitted Successfully", "status" => true));	
}

?>