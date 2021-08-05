<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
//   create a database connection 
$con = mysqli_connect("localhost","root","","php_auth_api");


$response = array();
if($con){
    $sql = "SELECT * FROM  class";
    $result = mysqli_query($con,$sql);
    if($result){
       
        $i=0;
        while($row=mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['class_name'] = $row['class_name'];
            $response[$i]['class_number'] = $row['class_number'];
            $response[$i]['class_capacity'] = $row['class_capacity'];
            $response[$i]['select_classteacher'] = $row['select_classteacher'];
            $response[$i]['class_start'] = $row['class_start'];
            $response[$i]['class_end'] = $row['class_end'];
            $response[$i]['class_location'] = $row['class_location'];
            $i++;
        }
      echo json_encode($response,JSON_PRETTY_PRINT);
    }
    else{
        echo "Database Connection Failed";
    }
}    

?>
