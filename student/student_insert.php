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
$rollno = $_POST['rollno'];
$dateofbirth = $_POST['dateofbirth'];
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];
$cityname = $_POST['cityname'];
$country = $_POST['country'];
$joiningdate = $_POST['joiningdate'];
$fileName  =  $email . $date. $time . $_FILES['profileimage']['name'];
$tempPath  =  $_FILES['profileimage']['tmp_name'];
$fileSize  =  $_FILES['profileimage']['size'];
$parentfname = $_POST['parentfname'];
$parentmname = $_POST['parentmname'];
$parentlname = $_POST['parentlname'];
$parentemail = $_POST['parentemail'];
$parentgender = $_POST['parentgender'];
$parentaddress = $_POST['parentaddress'];
$parentcityname = $_POST['parentcityname'];
$parentcountry = $_POST['parentcountry'];
$parentprofileimage  =  $parentemail . $date. $time . $_FILES['parentprofileimage']['name'];
$parenttempPath  =  $_FILES['parentprofileimage']['tmp_name'];
$parentfileSize  =  $_FILES['parentprofileimage']['size'];



		
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

// parent image size and file validation

if(empty($parentprofileimage))
{
	$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
	echo $errorMSG;
}
else
{
	$upload_path = '../upload/'; // set upload folder path 
	
	$fileExt = strtolower(pathinfo($parentprofileimage,PATHINFO_EXTENSION)); // get image extension
		
	// valid image extensions
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
					
	// allow valid image file formats
	if(in_array($fileExt, $valid_extensions))
	{				
		//check file not exist our upload folder path
		if(!file_exists($upload_path . $parentprofileimage))
		{
			// check file size '5MB'
			if($parentfileSize < 5000000){
				move_uploaded_file($parenttempPath, $upload_path . $parentprofileimage); // move file from system temporary path to our upload folder path 
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

// parent image size and file end//

		
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$sql = "INSERT INTO students(fname,mname,lname,email,gender, rollno,dateofbirth,phonenumber,address,cityname,country,joiningdate, profileimage,parentfname,parentmname,parentlname,	parentemail,parentgender,parentaddress,parentcityname,parentcountry,parentprofileimage) VALUES('$fname','$mname','$lname','$email','$gender','$rollno', '$dateofbirth','$phonenumber','$address','$cityname','$country','$joiningdate', '$fileName', '$parentfname', '$parentlname','$parentlname','$parentemail','$parentgender','$parentaddress','$parentcityname','$parentcountry','$parentprofileimage')";
 
	$result =  mysqli_query($con,$sql);
			
	echo json_encode(array("message" => "Image Uploaded Successfully", "status" => true));	
}

?>