<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ){
header('location: login.php');
}
$con = mysqli_connect("localhost","root","","php_auth_api");
include 'navbar.php';
include 'sidebar.php';
  
$sql = "SELECT * FROM `teachers` ";
$result = mysqli_query($con,$sql);

if(isset($_POST['submit'])){
 $class_name = $_POST['cname'];
 $class_number = $_POST['cnumber'];
 $num_of_students = $_POST['num_of_students'];
 $class_teacher = $_POST['class_teacher'];
 $class_start = $_POST['cstart'];
 $class_end = $_POST['cend'];
 $class_location = $_POST['clocation'];
 

 $sql = "INSERT INTO  teachers(class_name,class_number, num_of_students ,fname , class_start, class_end, class_location)VALUES('$class_name','$class_number','$num_of_students','$class_teacher', '$class_start','$class_end','$class_location')";
 $run = mysqli_query($con,$sql);
            
 if($run){
     echo   "<script>window.open('view_class.php','_self')</script>";
 }
 else{
     $error = " Unable to submit data . Please try again " . mysqli_error($con,$run);
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
    <h1>Classes</h1>
</div>
<div class="w-100 my-3 p-2 bg-white rounded" style="height:100vh;">
<h2 class="heading-two">ADD CLASS INFORMATION</h2>
<form action="" method="post">
    <div class="row pt-3">
        <div class="col-4">
         <label>Class Name</label>
          <input type="text" class="form-control" name="cname" placeholder="Class Name" >
        </div>
        <div class="col-4">
         <label>Class Number</label>
          <input type="text" class="form-control" name="cnumber" placeholder="Class Number" >
        </div>
        <div class="col-4">
            <label>Number Of Students</label>
            <input type="text" class="form-control" name="num_of_students" placeholder="Number Of Students" >
          </div>
      </div>

      <div class="row pt-3">
        <div class="col-4">
         <label for="">Class Teacher</label>
         <input type="text" name="class_teacher" class="form-control" placeholder="Class Teacher">
        </div>
        <div class="col-4">
         <label>Class Starting on</label>
          <input type="date" class="form-control" name="cstart" placeholder="Class Starting on" >
        </div>
        <div class="col-4">
         <label>Class Ending on</label>
          <input type="date" class="form-control" name="cend" placeholder="Class Ending on" >
        </div>
      </div>

      <div class="row pt-3">
        <div class="col-6">
            <label>Class Location</label>
          <input type="text" class="form-control" name="clocation" placeholder="Class Location" >
        </div>
        </div>
      <div class="button mt-3">
       <button class="btn-submit" name="submit">Save</button>
      </div>
</form>
</div>
</div>
</body>
</html>

<?php include 'footer.php'; ?>
