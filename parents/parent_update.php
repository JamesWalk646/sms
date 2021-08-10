<?php

$con = mysqli_connect("localhost","root","","php_auth_api");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"),true);
$id = $data['id'];
$parentfname = $data['parentfname'];
$parentmname = $data['parentmname'];
$parentlname = $data['parentlname'];
$parent_number = $data['parentnumber'];
$parentemail = $data['parentemail'];
$parentgender = $data['parentgender'];
$parentaddress = $data['parentaddress'];
$parentcityname = $data['parentcityname'];
$parentcountry = $data['parentcountry'];
$sql = "UPDATE students SET paren_fname = '$parentfname' , 	parent_mname = '$parentmname', parent_lname = '$parentlname', paren_email = '$parentemail' , parent_gender =  '$parentgender' ,  parent_number = '$parent_number', parent_address = '$parentaddress', parent_cityname = '$parentcityname' , parent_country = '$parentcountry' WHERE id = $id"; 
  $result =  mysqli_query($con,$sql);
  if($result){
      echo "Updated Student Details";
  }else{
      echo "Error".mysqli_error($con);
  }

?>