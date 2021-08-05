<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ){
header('location: login.php');
}
include 'navbar.php';
include 'sidebar.php';
$con = mysqli_connect("localhost","root","","php_auth_api");
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
<h1>Classes</h1>    
</div>
</div>
 <div class="col-lg-8"></div>
<div class="col-lg-2  py-2">
<a href="add_class.php" class="btn-new"> Add a Class </a>
</div>

</div>

<div class="teacher-data mt-3 bg-white">
    <div class="row p-2">
        <div class="col-3">
            <h3>CLASS LIST</h3>             
        </div>
      
        <div class="col-6"></div>
         
        <div class="col-3">
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
                <th scope="col"> # </th>
                <th scope="col">Class Number</th>
                <th scope="col">Class Name</th>
                <th scope="col">Teacher Incharge</th>
                <th scope="col">Number of Students</th>
                <th scope="col">Location</th>
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
                <th><?php echo $i++; ?></th>
                <td><?php echo $row1['class_number'] ?></td>
                <td><?php echo $row1['class_name'] ?></td>
                <td><?php echo $row1['fname'] ?></td>
                <td><?php echo $row1['num_of_students'] ?></td>
                <td><?php echo $row1['class_location'] ?></td>
                <td>
                    
                <div class="d-flex text-center">
                      <a href="edit_class.php?edit_class=<?php echo $row1['id']; ?>"> <i class="fa fa-edit mx-1"></i> </a>
                      <a href="delete_class.php?delete_class=<?php echo $row1['id']; ?>"> <i class="fa fa-trash "></i> </a>
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
