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
            <h1>Teachers</h1>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if(isset($_GET['edit_teacher'])){
           $edit_teacher_id = $_GET['edit_teacher'];
           $sql = "SELECT * FROM teachers WHERE id = $edit_teacher_id";
           $result =  mysqli_query($con,$sql);
           while($row = mysqli_fetch_assoc($result))
           {
        
        
        ?>
            <div class="w-100 my-3 p-2 bg-white rounded">
                <h2 class="heading-two">Edit Teacher Details</h2>
                <div class="row mt-3">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="">Class</label>
             <input type="text" name="class" class="form-control" placeholder="Enter Class" value="<?php echo $row['class_name'] ?>">
            </div>
             </div>
            <div class="col-lg-6">
            <div class="form-group">
              <label for="">Subject</label>
             <input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="<?php echo $row['subject_name'] ?> ">
            </div>
          </div>
        </div>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $row['fname'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Middle Name</label>
                            <input type="text" name="mname" class="form-control" placeholder="Middle Name" value="<?php echo $row['mname'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $row['lname'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Date of Birth</label>
                            <input type="date" name="birthdate" class="form-control" placeholder="Date of Birth" value="<?php echo $row['dateofbirth'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="number" class="form-control" placeholder="Phone Number" value="<?php echo $row['phone'] ?>">
                        </div>
                    </div>
                </div>

                <hr class="mt-2">

                <div class="row mt-2">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Permanent Address</label>
                            <input type="text" name="p-address" class="form-control" placeholder="Permanet Address" value="<?php echo $row['address'] ?>">
                        </div>
                    </div>
                </div>


                <div class="row mt-2">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">City Name</label>
                            <input type="text" name="cityname" class="form-control" placeholder="City Name" value="<?php echo $row['cityname'] ?>">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Country Name</label>
                            <input type="text" name="country" class="form-control" placeholder="Country" value="<?php echo $row['country'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['email'] ?>">
                        </div>
                    </div>

                    <div class="col-lg-4 my-3">
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Gender</label>
                            <input type="radio" name="gender" value="male" class="form-check-input ml-2"
                            <?php if($row['gender'] == 'male'){ echo "checked"; } ?>
                            >
                            <label class="form-check-label pl-4">Male</label>
                            <input type="radio" name="gender" value="female" class="form-check-input ml-2"
                            <?php if($row['gender'] == 'female'){ echo "checked"; } ?>
                            >
                            <label class="form-check-label pl-4">Female</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Qualification</label>
                            <input type="text" name="qualification" class="form-control" placeholder="Qualification" value="<?php echo $row['qualification'] ?>">
                        </div>
                    </div>

                </div>

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
    $edit_teacher_id = $_GET['edit_teacher'];  
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
       
               $sql = "UPDATE teachers SET fname = '$fname' , mname = '$mname' , lname = '$lname' , email = '$email' , gender = '$gender' , dateofbirth = '$birthdate' , phone = '$number' , qualification = '$qualification', address = '$p_address' , cityname = '$cityname' , country = '$country' , class_name = '$class', subject_name = '$subject'  WHERE id = $edit_teacher_id";
               
               $run = mysqli_query($con,$sql);
               
               if($run){
                   echo  "<script>window.open('view_teachers.php','_self')</script>";
               }
               else{
                   echo  "<script>window.open('edit_teacher.php', '_self')</script>";
               }
      
   }

?>