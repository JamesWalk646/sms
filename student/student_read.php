<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
//   create a database connection 
$con = mysqli_connect("localhost","root","","php_auth_api");


$response = array();
if($con){
    $sql = "SELECT * FROM  students";
    $result = mysqli_query($con,$sql);
    if($result){
       
        $i=0;
        while($row=mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['fname'] = $row['fname'];
            $response[$i]['mname'] = $row['mname'];
            $response[$i]['lname'] = $row['lname'];
            $response[$i]['email'] = $row['email'];
            $response[$i]['gender'] = $row['gender'];
            $response[$i]['rollno'] = $row['rollno'];
            $response[$i]['dateofbirth'] = $row['dateofbirth'];
            $response[$i]['phonenumber'] = $row['phonenumber'];
            $response[$i]['address'] = $row['address'];
            $response[$i]['cityname'] = $row['cityname'];
            $response[$i]['country'] = $row['country'];
            $response[$i]['joiningdate'] = $row['joiningdate'];
            $response[$i]['profileimgurl'] = "http://" . $_SERVER['SERVER_NAME'].'/php-login-registration-api/' .'upload/'.$row['profileimage'];
            $response[$i]['parentfname'] = $row['parentfname'];
            $response[$i]['parentmname'] = $row['parentmname'];
            $response[$i]['parentfname'] = $row['parentfname'];
            $response[$i]['parentlname'] = $row['parentlname'];
            $response[$i]['parentemail'] = $row['parentemail'];
            $response[$i]['parentgender'] = $row['parentgender'];
            $response[$i]['parentaddress'] = $row['parentaddress'];
            $response[$i]['parentcityname'] = $row['parentcityname'];
            $response[$i]['parentcountry'] = $row['parentcountry'];
            $response[$i]['parentprofileimgurl'] = "http://" . $_SERVER['SERVER_NAME'].'/php-login-registration-api/' .'upload/'.$row['parentprofileimage'];
            $i++;
        }
      echo json_encode($response,JSON_PRETTY_PRINT);
    }
    else{
        echo "Database Connection Failed";
    }
}    

?>
