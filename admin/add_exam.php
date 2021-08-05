<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ){
header('location: login.php');
}
// if(empty($_SESSION['username'])){
//   header('location:login.php');
// }
$con = mysqli_connect("localhost","root","","php_auth_api");
include 'navbar.php';
include 'sidebar.php';

if(isset($_POST['submit'])){
 $class_name = $_POST['class_name'];
 $exam_name = $_POST['exam_name'];
 $exam_start = $_POST['exam_start'];
 $exam_end = $_POST['exam_end'];
 $subject_name = $_POST['subject_name'];
 $sql = "INSERT INTO  exams(class_name,exam_name,exam_start_date,exam_end_date,subject_name)VALUES('$class_name', '$exam_name', '$exam_start','$exam_end','$subject_name')";
 $run = mysqli_query($con,$sql);
            
 if($run){
     echo  "<script>window.open('view_exams.php','_self')</script>";
 }
 else{
     $error = " Unable to submit data . Please try again " . mysqli_error($con);
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
    <h1>Exams</h1>
</div>
<div class="w-100 my-3 p-2 bg-white rounded" style="height:100vh;">
<h2 class="heading-two">Add Exam Information</h2>

<form action="" method="post">
    <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
         <label>Class Name</label>
          <input type="text" class="form-control" name="class_name" placeholder="Class Name" >
        </div>
      </div>
      <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
         <label>Exam Name</label>
          <input type="text" class="form-control" name="exam_name" placeholder="Exam Name">
        </div>
       </div>
       <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
            <label>Exam Start Date</label>
             <input type="date" name="exam_start" class="form-control" placeholder="Exam Start Date">
          </div>
        </div>
           
         <div class="row pt-3">
          <div class="col-lg-6 mx-lg-auto">
            <label>Exam End Date</label>
            <input type="date" class="form-control" name="exam_end" placeholder="Exam End Date" >
          </div>
      </div>

      <div class="row pt-3">
          <div class="col-lg-6 mx-lg-auto">
            <label>Subject Name</label>
            <input type="text" class="form-control" name="subject_name" placeholder="Subject Name" >
          </div>
      </div>
      
      <div class="button mt-3 text-center">
       <button class="btn-submit" name="submit">Save</button>
      </div>
</form>
</div>
</div>
</body>
</html>

<?php include 'footer.php'; ?>
