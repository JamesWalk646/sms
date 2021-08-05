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
    <h1>Subjects</h1>
</div>
<div class="w-100 my-3 p-2 bg-white rounded" style="height:100vh;">
<h2 class="heading-two">Edit Subject Details</h2>
<?php
if(isset($_GET['edit_subject'])){
            
            $edit_subject_id = $_GET['edit_subject'];
            $query = "SELECT * FROM  teachers WHERE id = '$edit_subject_id' ";
            $run1 = mysqli_query($con,$query);
            while($row1 = mysqli_fetch_assoc($run1))

            {

        
        
        ?>
<form action="" method="post">
    <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
         <label>Subject Name</label>
          <input type="text" class="form-control" name="sub-name" placeholder="Subject Name" value="<?php echo $row1['subject_name']; ?> ">
        </div>
      </div>
      <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
         <label>Subject Code</label>
          <input type="text" class="form-control" name="sub-code"  placeholder="Subject Code" value="<?php echo $row1['subject_code']; ?> ">
        </div>
       </div>
       <div class="row pt-3">
        <div class="col-lg-6 mx-lg-auto">
            <label>Teacher</label>
          <input type="text" name="teacher" class="form-control" placeholder="Teacher" value="<?php echo $row1['fname'];  ?>">
          </div>
        </div>
           
         <div class="row pt-3">
          <div class="col-lg-6 mx-lg-auto">
            <label>Book Name</label>
            <input type="text" class="form-control" name="book-name" placeholder="Book Name" value="<?php echo $row1['book_name']; ?>">
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
    $edit_subject_id = $_GET['edit_subject'];    
    //  $date = date("Y-m-d");   
    //  $time = time();
    $sub_name = $_POST['sub-name'];
    $sub_code = $_POST['sub-code'];
    $teacher = $_POST['teacher'];
    $book_name = $_POST['book-name'];
    
               
            $sql = "UPDATE teachers SET  subject_name = '$sub_name' , subject_code = '$sub_code', fname = '$teacher' , book_name = '$book_name' WHERE id = $edit_subject_id";
    
            $run = mysqli_query($con,$sql);
            
            if($run){
             echo "<script>window.open('view_subjects.php','_self')</script>";
            }
            else{
                echo "<script>window.open('edit_subject.php','_self')</script>";
                
            }
       
       
    
        }
?>