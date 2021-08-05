<?php
$con = mysqli_connect("localhost","root","","php_auth_api");
$query = "SELECT * FROM teachers";
$run = mysqli_query($con,$query);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"),true);
   $id = $data['id'];
   $subject_name1 = $data['subject_name1'];
   $subject_code = $data['subject_code'];
   while($row = mysqli_fetch_array($run)){
   $select_subjectteacher = $row[1].$data['select_subjectteacher'];
   }
   $book_name = $data['book_name'];

   $sql = "UPDATE subjects SET 	subject_name1 = '$subject_name1' , subject_code = '$subject_code', select_subjectteacher = '$select_subjectteacher', book_name = '$book_name'  WHERE id = $id"; 
  $result =  mysqli_query($con,$sql);
  if($result){
      echo "Updated Subjects Details";
  }else{
      echo "Error".mysqli_error($con);
  }

?>