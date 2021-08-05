<?php
$con = mysqli_connect("localhost","root","","php_auth_api");
$sql = "SELECT * FROM `teachers` ";
$result = mysqli_query($con,$sql);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"),true);
   $id = $data['id'];
   $class_name = $data['class_name'];
   $class_number = $data['class_number'];
   $class_capacity = $data['class_capacity'];

   while($row = mysqli_fetch_array($result)){
   $select_classteacher = $row[1].$data['select_classteacher'];
   }
   $class_start = $data['class_start'];
   $class_end = $data['class_end'];
   $class_location = $data['class_location'];


   $sql = "UPDATE class SET class_name = '$class_name' , class_number = '$class_number', class_capacity = '$class_capacity', select_classteacher = '$select_classteacher' , class_start =  '$class_start' , class_end = '$class_end' , class_location = '$class_location'  WHERE id = $id"; 
  $result =  mysqli_query($con,$sql);
  if($result){
      echo "Updated Class Details";
  }else{
      echo "Error".mysqli_error($con);
  }

?>