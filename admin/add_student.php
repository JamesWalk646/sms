<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ){
header('location: login.php');
}
$con = mysqli_connect("localhost","root","","php_auth_api");
include 'navbar.php';
include 'sidebar.php';

$match_err = "";
$size_error = "";
$error = "";
$success = "";
if(isset($_POST['submit'])){
 $date = date("Y-m-d");
 $time = time();
 $fname = $_POST['fname'];
 $mname = $_POST['mname'];
 $lname = $_POST['lname'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
 $birthdate = $_POST['birthdate'];
 $number = $_POST['number'];
 $p_address = $_POST['p-address'];
 $cityname = $_POST['cityname'];
 $country = $_POST['country'];
 $rollno = $_POST['rollno'];

//  Parent Variables
$parent_fname = $_POST['parent_fname'];
$parent_mname = $_POST['parent_mname'];
$parent_lname = $_POST['parent_lname'];
$parent_number = $_POST['parent_number'];
$parent_email = $_POST['parent_email'];
$parent_gender = $_POST['parent_gender'];
$parent_paddress = $_POST['parent_paddress'];
$parent_cityname = $_POST['parent_cityname'];
$parent_country = $_POST['parent_country'];

 $fileName  =  $email . $date. $time . $_FILES['sendimage']['name'];
 $tempPath  =  $_FILES['sendimage']['tmp_name'];
 $fileSize  =  $_FILES['sendimage']['size'];
 $image_url = "http://" . $_SERVER['SERVER_NAME'].'/php-login-registration-api/upload/'.$fileName;

 $parent_fileName  =  $parent_email . $date. $time . $_FILES['parent_sendimage']['name'];
 $parent_tempPath  =  $_FILES['parent_sendimage']['tmp_name'];
 $parent_fileSize  =  $_FILES['parent_sendimage']['size'];
 $parent_image_url = "http://" . $_SERVER['SERVER_NAME'].'/php-login-registration-api/upload/'.$parent_fileName;

        
            move_uploaded_file($tempPath , '../upload/' .$fileName);
            move_uploaded_file($parent_tempPath , '../upload/' .$parent_fileName);
            
            $sql = "INSERT INTO  students(fname,mname,lname,email,gender,rollno,dateofbirth,phonenumber,address,cityname,country,profileimage,profileimageurl,paren_fname,parent_mname,parent_lname,parent_number,paren_email,parent_gender,parent_address,parent_cityname,parent_country,parent_profile,parent_profileimage_url) VALUES('$fname','$mname','$lname','$email','$gender','$rollno', '$birthdate','$number','$p_address','$cityname','$country','$fileName','$image_url','$parent_fname','$parent_mname','$parent_lname', '$parent_number', '$parent_email','$parent_gender','$parent_paddress','$parent_cityname','$parent_country','$parent_fileName','$parent_image_url')";
            
            $run = mysqli_query($con,$sql);
            
            if($run){
                echo  "<script>window.open('view_student.php','_self')</script>";
            }
            else{
                echo  "<script>window.open('add_student.php', '_self')</script>";
            }
   
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard School Management System</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <div class="container">
        <div class="p-2 bg-white">
            <h1>Students</h1>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="w-100 my-3 p-2 bg-white rounded">
                <h2 class="heading-two">Student Details</h2>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Middle Name</label>
                        <input type="text" name="mname" class="form-control" placeholder="Middle Name">
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Date of Birth</label>
                            <input type="date" name="birthdate" class="form-control" placeholder="Date of Birth">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="number" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                </div>

                <hr class="mt-2">

                <div class="row mt-2">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Permanent Address</label>
                            <input type="text" name="p-address" class="form-control" placeholder="Permanet Address">
                        </div>
                    </div>
                </div>


                <div class="row mt-2">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">City Name</label>
                            <input type="text" name="cityname" class="form-control" placeholder="City Name">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Country Name</label>
                            <input type="text" name="country" class="form-control" placeholder="Country">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Roll No</label>
                            <input type="text" name="rollno" class="form-control" placeholder="Roll Number">
                        </div>
                    </div>

                    <div class="col-lg-4 my-3">
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Gender</label>
                            <input type="radio" name="gender" value="male" class="form-check-input ml-2" required>
                            <label class="form-check-label pl-4">Male</label>
                            <input type="radio" name="gender" value="female" class="form-check-input ml-2">
                            <label class="form-check-label pl-4">Female</label>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="sendimage" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!--  parent Form -->
            <div class="w-100 my-3 p-2 bg-white rounded">
                <h2 class="heading-two">Parent Details</h2>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="parent_fname" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Middle Name</label>
                        <input type="text" name="parent_mname" class="form-control" placeholder="Middle Name">
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="parent_lname" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="parent_number" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="parent_email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Gender</label>
                            <input type="radio" name="parent_gender" value="male" class="form-check-input ml-2" required>
                            <label class="form-check-label pl-4">Male</label>
                            <input type="radio" name="parent_gender" value="female" class="form-check-input ml-2">
                            <label class="form-check-label pl-4">Female</label>
                        </div>
                    </div>
                </div>

                <hr class="mt-2">

                <div class="row mt-2">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Permanent Address</label>
                            <input type="text" name="parent_paddress" class="form-control" placeholder="Permanet Address">
                        </div>
                    </div>
                </div>


                <div class="row mt-2">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">City Name</label>
                            <input type="text" name="parent_cityname" class="form-control" placeholder="City Name">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Country Name</label>
                            <input type="text" name="parent_country" class="form-control" placeholder="Country">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="parent_sendimage" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="button mt-2">
                        <input type="submit" class="btn-submit" value="Submit" name="submit">
                    </div>

                </div>
            </div>

        </form>


    </div>
</body>

</html>

<?php include 'footer.php'; ?>