<?php

//   create a database connection 
$con = mysqli_connect("localhost","root","","php_auth_api");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');


$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
	
$date = date("Y-m-d");
$time = time();
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$dateofbirth = $_POST['dateofbirth'];
$phone = $_POST['phone'];
$qualification = $_POST['qualification'];
$address = $_POST['address'];
$cityname = $_POST['cityname'];
$country = $_POST['country'];
$fileName  =  $email . $date. $time . $_FILES['profileimage']['name'];
$tempPath  =  $_FILES['profileimage']['tmp_name'];
$fileSize  =  $_FILES['profileimage']['size'];




		
if(empty($fileName))
{
	$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
	echo $errorMSG;
}
else
{
	$upload_path = '../upload/'; // set upload folder path 
	
	$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
		
	// valid image extensions
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
					
	// allow valid image file formats
	if(in_array($fileExt, $valid_extensions))
	{				
		//check file not exist our upload folder path
		if(!file_exists($upload_path . $fileName))
		{
			// check file size '5MB'
			if($fileSize < 5000000){
				move_uploaded_file($tempPath, $upload_path . $fileName); // move file from system temporary path to our upload folder path 
			}
			else{		
				$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
				echo $errorMSG;
			}
		}
		else
		{		
			$errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
			echo $errorMSG;
		}
	}
	else
	{		
		$errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
		echo $errorMSG;		
	}
}

		
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$sql = "INSERT INTO teachers(fname,mname,lname,email,gender,dateofbirth,phone,qualification,address,cityname,country,profileimage) VALUES('$fname','$mname','$lname','$email','$gender', '$dateofbirth','$phone', '$qualification', '$address','$cityname','$country','$fileName')";
 
	$result =  mysqli_query($con,$sql);
			
	echo json_encode(array("message" => "Image Uploaded Successfully", "status" => true));	
}

?>