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
 $qualification = $_POST['qualification'];
 $class = $_POST['class'];
 $subject = $_POST['subject'];
 
 $fileName  =  $email . $date. $time . $_FILES['sendimage']['name'];
 $tempPath  =  $_FILES['sendimage']['tmp_name'];
 $fileSize  =  $_FILES['sendimage']['size'];
 $image_url = "http://" . $_SERVER['SERVER_NAME'].'/php-login-registration-api/upload/'.$fileName;


        
            move_uploaded_file($tempPath , '../upload/' .$fileName);

            $sql = "INSERT INTO teachers(fname , mname , lname , email , gender , dateofbirth , phone , qualification , address , cityname , country , profileimage ,	prfileimageurl,class_name,subject_name) VALUES('$fname','$mname','$lname','$email','$gender', '$birthdate','$number', '$qualification' , '$p_address','$cityname','$country','$fileName','$image_url','$class','$subject')";
            
            $run = mysqli_query($con,$sql);
            
            if($run){
                echo  "<script>window.open('view_teachers.php','_self')</script>";
            }
            else{
                echo  "<script>window.open('add_teachers.php', '_self')</script>";
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

  <div class="container ">
    <div class="p-2 bg-white">
      <h1>Teachers</h1>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="w-100 my-3 p-2 bg-white rounded">
        <h2 class="heading-two">Add Teacher Details</h2>
        <div class="row mt-2">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="">Class</label>
             <input type="text" name="class" class="form-control" placeholder="Enter Class">
            </div>
             </div>
            <div class="col-lg-6">
            <div class="form-group">
              <label for="">Subject</label>
             <input type="text" name="subject" class="form-control" placeholder="Enter Subject">
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-lg-4">
            <div class="form-group">
              <label for="">First Name</label>
              <input type="text" name="fname" class="form-control" placeholder="First Name">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label for="">Middle Name</label>
              <input type="text" name="mname" class="form-control" placeholder="Middle Name">
            </div>
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

          <div class="col-lg-4 my-3">
            <div class="form-group">
              <label for="" class="font-weight-bold">Gender</label>
              <input type="radio" name="gender" value="male" class="form-check-input ml-2" required>
              <label class="form-check-label pl-4">Male</label>
              <input type="radio" name="gender" value="female" class="form-check-input ml-2">
              <label class="form-check-label pl-4">Female</label>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group">
              <label for="">Qualification</label>
              <input type="text" name="qualification" class="form-control" placeholder="Qualification">
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



        <div class="button mt-2">
          <input type="submit" class="btn-submit" value="Submit" name="submit">
        </div>
      </div>
      <!-- parent Form -->
    </form>


  </div>
</body>

</html>

<?php include 'footer.php'; ?>