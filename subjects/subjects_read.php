<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
//   create a database connection 
$con = mysqli_connect("localhost","root","","php_auth_api");


$response = array();
if($con){
    $sql = "SELECT * FROM subjects";
    $result = mysqli_query($con,$sql);
    if($result){
       
        $i=0;
        while($row=mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['select_class'] = $row['select_class'];
            $response[$i]['subject_name1'] = $row['subject_name1'];
            $response[$i]['subject_code'] = $row['subject_code'];
            $response[$i]['select_subjectteacher'] = $row['select_subjectteacher'];
            $response[$i]['book_name'] = $row['book_name'];
            $i++;
        }
      echo json_encode($response,JSON_PRETTY_PRINT);
    }
    else{
        echo "Database Connection Failed";
    }
}    

?>
