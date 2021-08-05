<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ){
header('location: login.php');
}
include 'navbar.php';
include 'sidebar.php';
$con = mysqli_connect("localhost","root","","php_auth_api");

$sql = "SELECT * FROM  class";
$result = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard - School Management System</title>
    <link rel="stylesheet" href="./assets/css/style.css">
  
</head>
<body>
<div class="container">
<div class="row bg-white">    

<div class="col-lg-2">
<div class="p-2 ">
<h1>Students</h1>    
</div>
</div>
 <div class="col-lg-8"></div>
<div class="col-lg-2  py-2">
<a href="add_student.php" class="btn-new"> Add a Student </a>
</div>

</div>

<div class="teacher-data mt-3 bg-white">
    <div class="row p-2">
        <div class="col-3">
            <span class="select-class">Select Class </span> 
            <select class="custom-select" aria-label="Default select example">
              <option>All</option>
            <?php  while($row = mysqli_fetch_array($result)):; ?>
                
                <option> <?php  echo $row['class_name']; ?> </option>
              <?php endwhile; ?>
            </select>
                
        </div>
      
        <div class="col-6"></div>
         
        <div class="col-3 mt-2">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </div>
    </div>
    <div class="row p-2">
      <div class="col-3">
    </div>
    </div>

    <div class="row">
      <div class="col-12 mx-lg-auto col-12">
        <table class="table table-responsive table-bordered">
            <thead>
              <tr>
                <th scope="col"> <input type="radio"> </th>
                <th scope="col">Roll No</th>
                <th scope="col">Full Name</th>
                <th scope="col">Parent</th>
                <th scope="col">Stree Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php
            
            $query =  "SELECT * FROM `students`  ";
            $run = mysqli_query($con,$query);
            $i=1;
            while($row1 = mysqli_fetch_assoc($run)){

            
            
            ?>
            <tbody>
              <tr>
                <th> <input type="radio"></th>
                <td> <?php echo $row1['rollno']; ?> </td>
                <td> <?php echo $row1['fname'] . " " .  $row1['lname']; ?> </td>
                <td> <?php echo $row1['paren_fname'] . " " .  $row1['parent_lname']; ?> </td>
                <td> <?php echo $row1['address']; ?> </td>
                <td> <?php echo $row1['phonenumber']; ?> </td>
              <td>
              <div class="d-flex text-center">
                      <a href="edit_student.php?edit_student=<?php echo $row1['id'];  ?>"> <i class="fa fa-edit mx-1"></i> </a>
                      <a href="delete_student.php?delete_student=<?php echo $row1['id'];  ?>"> <i class="fa fa-trash "></i> </a>
                      </div>
              </td>
              </tr>              
            </tbody>
            <?php } ?>
          </table>
          </div>
    </div>

</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>