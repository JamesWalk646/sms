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
include 'sidebar.php'
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
<h2 class="heading-two">Edit Exam Information</h2>
<?php
if(isset($_GET['edit_exam'])){
            
            $edit_exam_id = $_GET['edit_exam'];
            $query = "SELECT * FROM  exams WHERE id = '$edit_exam_id' ";
            $run1 = mysqli_query($con,$query);
            while($row1 = mysqli_fetch_assoc($run1))

            {

        
        
        ?>
<form action="" method="post">
<div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
         <label>Class Name</label>
          <input type="text" class="form-control" name="class_name" placeholder="Class Name" value="<?php echo $row1['class_name']; ?>">
        </div>
      </div>
      <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
         <label>Exam Name</label>
          <input type="text" class="form-control" name="exam_name" placeholder="Exam Name" value="<?php echo $row1['exam_name']; ?>">
        </div>
       </div>
       <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
            <label>Exam Start Date</label>
             <input type="date" name="exam_start" class="form-control" placeholder="Exam Start Date" value="<?php echo $row1['exam_start_date']; ?>">
          </div>
        </div>
           
         <div class="row pt-3">
          <div class="col-lg-6 mx-lg-auto">
            <label>Exam End Date</label>
            <input type="date" class="form-control" name="exam_end" placeholder="Exam End Date" value="<?php echo $row1['exam_end_date']; ?>">
          </div>
      </div>

      <div class="row pt-3">
          <div class="col-lg-6 mx-lg-auto">
            <label>Subject Name</label>
            <input type="text" class="form-control" name="subject_name" placeholder="Subject Name" value="<?php echo $row1['subject_name']; ?>">
          </div>
      </div>
      <div class="button mt-3 text-center">
       <button class="btn-submit" name="update">Save Changes</button>
      </div>
</form>
<?php }} ?>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>

<?php
if(isset($_POST['update'])){
    $edit_exam_id = $_GET['edit_exam'];    
 $class_name = $_POST['class_name'];
 $exam_name = $_POST['exam_name'];
 $exam_start = $_POST['exam_start'];
 $exam_end = $_POST['exam_end'];
 $subject_name = $_POST['subject_name'];
               
            $sql = "UPDATE exams SET  class_name = '$class_name' , exam_name = '$exam_name', exam_start_date = '$exam_start' , exam_end_date = '$exam_end',subject_name = '$subject_name' WHERE id = $edit_exam_id";
    
            $run = mysqli_query($con,$sql);
            
            if($run){
             echo "<script>window.open('view_exams.php','_self')</script>";
            }
            else{
                echo "<script>window.open('edit_exam.php','_self')</script>";
                
            }
       
       
    
        }
?>