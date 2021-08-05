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
 $select_class = $_POST['select_class'];
 $sub_name = $_POST['sub-name'];
 $sub_code = $_POST['sub-code'];
 $teacher = $_POST['teacher'];
 $book_name = $_POST['book-name'];
 $sql = "INSERT INTO  teachers(subject_name,subject_code,fname,book_name)VALUES('$sub_name', '$sub_code', '$teacher','$book_name')";
 $run = mysqli_query($con,$sql);
            
 if($run){
     echo  "<script>window.open('view_subjects.php','_self')</script>";
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
    <h1>Subjects</h1>
</div>
<div class="w-100 my-3 p-2 bg-white rounded" style="height:100vh;">
<h2 class="heading-two">New Subject Entry</h2>

<form action="add_subject.php" method="post">
    <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
         <label>Subject Name</label>
          <input type="text" class="form-control" name="sub-name" placeholder="Subject Name" >
        </div>
      </div>
      <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
         <label>Subject Code</label>
          <input type="text" class="form-control" name="sub-code" placeholder="Subject Code" >
        </div>
       </div>
       <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
            <label>Teacher</label>
             <input type="text" name="teacher" class="form-control" placeholder="Teacher">
          </div>
        </div>
           
         <div class="row pt-3">
          <div class="col-lg-6 mx-lg-auto">
            <label>Book Name</label>
            <input type="text" class="form-control" name="book-name" placeholder="Book Name" >
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
