<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
//   create a database connection 
$con = mysqli_connect("localhost","root","","php_auth_api");


$response = array();
if($con){
    $sql = "SELECT * FROM  teachers";
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
            $response[$i]['dateofbirth'] = $row['dateofbirth'];
            $response[$i]['phone'] = $row['phone'];
            $response[$i]['qualification'] = $row['qualification'];
            $response[$i]['address'] = $row['address'];
            $response[$i]['cityname'] = $row['cityname'];
            $response[$i]['country'] = $row['country'];
            $response[$i]['profileimgurl'] = "http://" . $_SERVER['SERVER_NAME'].'/php-login-registration-api/' .'upload/'.$row['profileimage'];
            $i++;
        }
      echo json_encode($response,JSON_PRETTY_PRINT);
    }
    else{
        echo "Database Connection Failed";
    }
}    

?>
