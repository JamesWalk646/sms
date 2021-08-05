<?php
$con = mysqli_connect("localhost","root","","php_auth_api");
$query = "SELECT * FROM subjects";
$run = mysqli_query($con,$query);

$sql = "SELECT * FROM class";
$result =  mysqli_query($con,$sql);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"),true);
   $id = $data['id'];
   while($row = mysqli_fetch_assoc($result)){
   $select_class = $row['class_name']. $data['select_class'];
   }
   $exam_name = $data['exam_name'];
   $exam_startdate = $data['exam_startdate'];
   $exam_enddate = $data['exam_enddate'];
   while($row = mysqli_fetch_array($run)){
   $select_subjects = $row[1].$data['select_subjects'];
   }

   $sql = "UPDATE exam SET 	select_class = '$select_class' , exam_name = '$exam_name', exam_startdate  = '$exam_startdate', exam_enddate = '$exam_enddate',select_subjects = '$select_subjects'  WHERE id = $id"; 
  $result =  mysqli_query($con,$sql);
  if($result){
      echo "Updated Exams Details";
  }else{
      echo "Error".mysqli_error($con);
  }

?>