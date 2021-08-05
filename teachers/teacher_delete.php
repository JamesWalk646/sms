<?php
$con = mysqli_connect("localhost","root","","php_auth_api");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"),true);
   $id = $data['id'];
   
   $sql = "DELETE FROM  teachers WHERE id = $id "; 
  $result =  mysqli_query($con,$sql);
  if($result){
      echo "Deleted Teachers Details";
  }else{
      echo "Error".mysqli_error($con);
  }

?>