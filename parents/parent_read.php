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
            $response[$i]['parentfname'] = $row['paren_fname'];
            $response[$i]['parentmname'] = $row['parent_mname'];
            $response[$i]['parentlname'] = $row['parent_lname'];
            $response[$i]['parentemail'] = $row['paren_email'];
            $response[$i]['parentgender'] = $row['parent_gender'];
            $response[$i]['parentnumber'] = $row['parent_number'];
            $response[$i]['parentaddress'] = $row['parent_address'];
            $response[$i]['parentcityname'] = $row['parent_cityname'];
            $response[$i]['parentcountry'] = $row['parent_country'];
            $response[$i]['parentprofileimgurl'] = "http://" . $_SERVER['SERVER_NAME'].'/php-login-registration-api/' .'upload/'.$row['parent_profile'];
            $i++;
        }
      echo json_encode($response,JSON_PRETTY_PRINT);
    }
    else{
        echo "Database Connection Failed";
    }
}    

?>
