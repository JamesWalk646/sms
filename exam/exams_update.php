<?php
$con = mysqli_connect("localhost","root","","php_auth_api");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"),true);
   $id = $data['id'];
   $class_name = $data['class_name'];
   $exam_name = $data['exam_name'];
   $exam_startdate = $data['exam_startdate'];
   $exam_enddate = $data['exam_enddate'];
   $subject_name = $data['subject_name'];
   $sql = "UPDATE exams SET class_name = '$class_name' , exam_name = '$exam_name', exam_start_date  = '$exam_startdate', exam_end_date = '$exam_enddate',subject_name = '$subject_name'  WHERE id = $id"; 
  $result =  mysqli_query($con,$sql);
  if($result){
      echo "Updated Exams Details";
  }else{
      echo "Error".mysqli_error($con);
  }

?>