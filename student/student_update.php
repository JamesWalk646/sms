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
   $joiningdate = $data['joiningdate'];
   $profileimage = $data['profileimage'];
   $profileimageurl = $data['profileimageurl'];
   $parentfname = $data['parentfname'];
   $parentmname = $data['parentmname'];
   $parentlname = $data['parentlname'];
   $parentemail = $data['parentemail'];
   $parengender = $data['parentgender'];
   $parentaddress = $data['parentaddress'];
   $parentcityname = $data['parentcityname'];
   $parentcountry = $data['parentcountry'];
   $parentprofileimage = $data['parentprofileimage'];
   $parentprofileimageurl = $data['parentprofileimgurl'];
//    $teacher_subjects = $data['teacher_subjects'];
   

   $sql = "UPDATE students SET fname = '$fname' , mname = '$mname', lname = '$lname', email = '$email' , gender =  '$gender' , rollno = '$rollno' , phonenumber = '$phonenumber', address = '$address', cityname = '$cityname' , country = '$country' , joiningdate = '$joiningdate', parentfname = '$parentfname' , parentmname = '$parentmname', parentlname = '$parentlname',parentemail = '$parentemail', parentgender= '$parengender',	parentaddress = '$parentaddress',parentcityname = '$parentcityname',parentcountry = '$parentcountry' WHERE id = $id"; 
  $result =  mysqli_query($con,$sql);
  if($result){
      echo "Updated Student Details";
  }else{
      echo "Error".mysqli_error($con);
  }

?>