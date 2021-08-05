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
<h1>Teachers</h1>    
</div>
</div>
 <div class="col-lg-8"></div>
<div class="col-lg-2  py-2">
<a href="add_teachers.php" class="btn-new"> Add a Teacher </a>
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
        <select class="custom-select" aria-label="Default select example">
            <option selected>Select Action</option>
            <option value="1">Delete</option>
          </select>
          </div>
    </div>

    <div class="row">
      <div class="col-lg-11 mx-lg-auto col-12">
        <table class="table table-responsive table-bordered">
            <thead>
              <tr>
                <th scope="col"> <input type="checkbox" name="action"> </th>
                <th scope="col">Name</th>
                <th scope="col">Incharge Class</th>
                <th scope="col">Subject Handling</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php
            
            $query =  "SELECT * FROM `teachers`  ";
            $run = mysqli_query($con,$query);
            $i=1;
            while($row1 = mysqli_fetch_assoc($run)){

            
            
            ?>
            <tbody>
              <tr>
                <th> <input type="checkbox"> </th>
                <td><?php echo $row1['fname']; ?></td>
                <td><?php echo $row1['class_name']; ?></td>
                <td><?php  echo $row1['subject_name']; ?></td>
                <td><?php  echo $row1['phone']; ?></td>
                <td>
                      <div class="d-flex text-center">
                      <a href="edit_teacher.php?edit_teacher=<?php echo $row1['id']; ?>"> <i class="fa fa-edit mx-1"></i> </a>
                      <a href="delete_teacher.php?delete_teacher=<?php echo $row1['id']; ?>"> <i class="fa fa-trash "></i> </a>
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