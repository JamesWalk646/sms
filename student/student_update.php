<?php

$con = mysqli_connect("localhost","root","","php_auth_api");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"),true);
   $id = $data['id'];
   $fname= $data['fname'];
   $mname = $data['mname'];
   $lname = $data['lname'];
   $email = $data['email'];
   $gender = $data['gender'];
   $rollno = $data['rollno'];
   $phonenumber = $data['phonenumber'];
   $address = $data['address'];
   $cityname = $data['cityname'];
   $country = $data['country'];
   $dateofbirth = $data['dateofbirth'];
//    $teacher_subjects = $data['teacher_subjects'];
   

   $sql = "UPDATE students SET fname = '$fname' , mname = '$mname', lname = '$lname', email = '$email' , gender =  '$gender' ,dateofbirth = '$dateofbirth' , rollno = '$rollno' , phonenumber = '$phonenumber', address = '$address', cityname = '$cityname' , country = '$country' WHERE id = $id"; 
  $result =  mysqli_query($con,$sql);
  if($result){
      echo "Updated Student Details";
  }else{
      echo "Error".mysqli_error($con);
  }

?>