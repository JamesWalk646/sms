<?php
$con = mysqli_connect("localhost","root","","php_auth_api");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"),true);
   $id = $data['id'];
   $subject_name = $data['subject_name'];
   $subject_code = $data['subject_code'];
   $teacher_name = $data['teacher_name'];
   $book_name = $data['book_name'];

   $sql = "UPDATE teachers SET 	subject_name = '$subject_name' , subject_code = '$subject_code', fname = '$teacher_name', book_name = '$book_name'  WHERE id = $id"; 
  $result =  mysqli_query($con,$sql);
  if($result){
      echo "Updated Subjects Details";
  }else{
      echo "Error".mysqli_error($con);
  }

?>