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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard School Management System</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

  <div class="container ">
    <div class="p-2 bg-white">
      <h1>Class</h1>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
      <?php
        if(isset($_GET['edit_class'])){
           $edit_class_id = $_GET['edit_class'];
           $sql = "SELECT * FROM teachers WHERE id = $edit_class_id";
           $result =  mysqli_query($con,$sql);
           while($row = mysqli_fetch_assoc($result))
           {
        
        
        ?>
      <div class="w-100 my-3 p-2 bg-white rounded">
        <h2 class="heading-two">Edit Class Details</h2>
        <div class="row mt-3">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="">Class</label>
              <input type="text" name="cname" class="form-control" placeholder="Enter Class"
                value="<?php echo $row['class_name'] ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="">Class Number</label>
              <input type="text" name="cnumber" class="form-control" placeholder="Class Number" value="<?php echo $row['class_number'] ?>">
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-lg-4">
            <div class="form-group">
              <label for="">Teacher Name</label>
              <input type="text" name="fname" class="form-control" placeholder="teacher Name"
                value="<?php echo $row['fname'] ?>">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label for="">Class Start</label>
              <input type="date" class="form-control" name="cstart" placeholder="Class Starting on" value="<?php echo $row['class_start'] ?>">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label for="">Class End</label>
              <input type="date" name="cend" class="form-control" placeholder="Class End" value="<?php echo $row['class_end'] ?>">
            </div>
          </div>
        </div>

        <div class="row mt-2">

          <div class="col-lg-6">
            <div class="form-group">
              <label for="">Number Of Students</label>
              <input type="text" name="num_of_students" class="form-control" placeholder="Number Of Students"
                value="<?php echo $row['num_of_students'] ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="">Class Location</label>
              <input type="text" name="clocation" class="form-control" placeholder="Class Location" value="<?php echo $row['class_location'] ?>">
            </div>
          </div>
        </div>

        <hr class="mt-2">

        <div class="button mt-2">
          <input type="submit" class="btn-submit" value="Save Changes" name="update">
        </div>
      </div>
      <!-- parent Form -->
    </form>
    <?php }} ?>


  </div>
</body>

</html>

<?php include 'footer.php'; ?>

<?php
if(isset($_POST['update'])){
  $edit_class_id = $_GET['edit_class']; 
  $class_name = $_POST['cname'];
  $class_number = $_POST['cnumber'];
  $num_of_students = $_POST['num_of_students'];
  $class_teacher = $_POST['fname'];
  $class_start = $_POST['cstart'];
  $class_end = $_POST['cend'];
  $class_location = $_POST['clocation'];

   $sql = "UPDATE teachers SET fname = '$class_teacher' , class_name = '$class_name' , class_number = '$class_number' , num_of_students = '$num_of_students',class_location = '$class_location' , class_start = '$class_start' , class_end = '$class_end' WHERE id = '$edit_class_id' ";
   $run = mysqli_query($con,$sql);
   if($run){
    echo "<script>window.open('view_class.php','_self')</script>";
   }
   else{
       echo "<script>window.open('edit_class.php', '_self')</script>";
       
   }
  
  
  }

?>