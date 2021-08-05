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
            <h1>Students</h1>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <?php
                 if(isset($_GET['edit_student'])){
            
                $edit_student_id = $_GET['edit_student'];
                 $query = "SELECT * FROM  students WHERE id = '$edit_student_id' ";
               $run1 = mysqli_query($con,$query);
               while($row1 = mysqli_fetch_assoc($run1))

             {

        
        
               ?>
            <div class="w-100 my-3 p-2 bg-white rounded">
                <h2 class="heading-two">Edit Student Details</h2>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="First Name"
                                value=" <?php echo $row1['fname']; ?> ">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Middle Name</label>
                            <input type="text" name="mname" class="form-control" placeholder="Middle Name"
                                value=" <?php echo $row1['mname']; ?> ">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Last Name"
                                value=" <?php echo $row1['lname']; ?> ">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Date of Birth</label>
                            <input type="date" name="birthdate" class="form-control" placeholder="Date of Birth"
                                value=" <?php echo $row1['dateofbirth']; ?> ">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="number" class="form-control" placeholder="Phone Number"
                                value=" <?php echo $row1['phonenumber']; ?> ">
                        </div>
                    </div>
                </div>

                <hr class="mt-2">

                <div class="row mt-2">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Permanent Address</label>
                            <input type="text" name="p-address" class="form-control" placeholder="Permanet Address"
                                value=" <?php echo $row1['address']; ?> ">
                        </div>
                    </div>
                </div>


                <div class="row mt-2">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">City Name</label>
                            <input type="text" name="cityname" class="form-control" placeholder="City Name"
                                value=" <?php echo $row1['cityname']; ?> ">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Country Name</label>
                            <input type="text" name="country" class="form-control" placeholder="Country"
                                value=" <?php echo $row1['country']; ?> ">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value=" <?php echo $row1['email']; ?> ">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Roll No</label>
                            <input type="text" name="rollno" class="form-control" placeholder="Roll Number"
                                value=" <?php echo $row1['rollno']; ?> ">
                        </div>
                    </div>

                    <div class="col-lg-4 my-3">
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Gender</label>
                            <input type="radio" name="gender" value="male" class="form-check-input ml-2" <?php
                                if($row1['gender']=='male' ) echo "checked" ; ?> >
                            <label class="form-check-label pl-4">Male</label>
                            <input type="radio" name="gender" value="female" class="form-check-input ml-2" <?php
                                if($row1['gender']=='female' ) echo "checked" ; ?>>
                            <label class="form-check-label pl-4">Female</label>
                        </div>
                    </div>

                </div>

            </div>
            <!-- parent Form -->
            <div class="w-100 my-3 p-2 bg-white rounded">
                <h2 class="heading-two">Parent Details</h2>
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="parent_fname" class="form-control" placeholder="First Name" value="<?php echo $row1['paren_fname'];  ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Middle Name</label>
                        <input type="text" name="parent_mname" class="form-control" placeholder="Middle Name" value=" <?php echo $row1['parent_mname']; ?> ">
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="parent_lname" class="form-control" placeholder="Last Name" value=" <?php echo $row1['parent_lname']; ?> ">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="parent_number" class="form-control" placeholder="Phone Number" value=" <?php echo $row1['parent_number']; ?> ">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="parent_email" class="form-control" placeholder="Email" value=" <?php echo $row1['paren_email']; ?> ">
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Gender</label>
                            <input type="radio" name="parent_gender" value="male" class="form-check-input ml-2"

                                <?php if($row1['parent_gender'] == 'male'){ echo "checked"; } ?> 
                                
                                >
                            <label class="form-check-label pl-4">Male</label>
                            <input type="radio" name="parent_gender" value="female" class="form-check-input ml-2"
                            <?php if($row1['parent_gender'] == 'female'){ echo "checked"; } ?> 
                            >
                            <label class="form-check-label pl-4">Female</label>
                        </div>
                    </div>
                </div>

                <hr class="mt-2">

                <div class="row mt-2">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Permanent Address</label>
                            <input type="text" name="parent_paddress" class="form-control"
                                placeholder="Permanet Address" value=" <?php echo $row1['parent_address']; ?> ">
                        </div>
                    </div>
                </div>


                <div class="row mt-2">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">City Name</label>
                            <input type="text" name="parent_cityname" class="form-control" placeholder="City Name" value=" <?php echo $row1['parent_cityname']; ?> ">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Country Name</label>
                            <input type="text" name="parent_country" class="form-control" placeholder="Country" value=" <?php echo $row1['parent_country']; ?> ">
                        </div>
                    </div>
                    <div class="button mt-2">
                        <input type="submit" class="btn-submit" value="Save Changes" name="update">
                    </div>
                </div>

            </div>
        </form>
        <?php }} ?>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>

<?php
if(isset($_POST['update'])){
    $edit_student_id = $_GET['edit_student'];    
    $date = date("Y-m-d");
    $time = time();
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
    $rollno = $_POST['rollno'];
    
    // parent variables
 $parent_fname = $_POST['parent_fname'];
$parent_mname = $_POST['parent_mname'];
$parent_lname = $_POST['parent_lname'];
$parent_number = $_POST['parent_number'];
$parent_email = $_POST['parent_email'];
$parent_gender = $_POST['parent_gender'];
$parent_paddress = $_POST['parent_paddress'];
$parent_cityname = $_POST['parent_cityname'];
$parent_country = $_POST['parent_country'];
    
    // $fileName  =  $email . $date. $time . $_FILES['sendimage']['name'];
    // $tempPath  =  $_FILES['sendimage']['tmp_name'];
    // $fileSize  =  $_FILES['sendimage']['size'];
    // $image_url = "http://" . $_SERVER['SERVER_NAME'].'/php-login-registration-api/upload/'.$fileName;
   
   //  parent image upload variables
    // $parent_fileName  =  $parent_email . $date. $time . $_FILES['parentsendimage']['name'];
    // $parent_tempPath  =   $_FILES['parentsendimage']['tmp_name'];
    // $parent_fileSize  =  $_FILES['parentsendimage']['size'];
    // $parent_image_url = "http://" . $_SERVER['SERVER_NAME'].'/php-login-registration-api/upload/'.$parent_fileName;
    
               
            $sql = "UPDATE students SET fname = '$fname' , 	mname = '$mname' , lname = '$lname', email = '$email' , gender = '$gender' , rollno = '$rollno', dateofbirth = '$birthdate' , phonenumber = '$number' , address = '$p_address' , cityname = '$cityname' , country = '$country', paren_fname = '$parent_fname' , parent_mname = '$parent_mname' , parent_lname = '$parent_lname' , parent_number = '$parent_number' , paren_email = '$parent_email' , parent_gender = '$parent_gender' , parent_address = '$parent_paddress' , parent_cityname = '$parent_cityname' , 	parent_country = '$parent_country'  WHERE id = $edit_student_id ";
            $run = mysqli_query($con,$sql);
            
            if($run){
             echo "<script>window.open('view_parent.php','_self')</script>";
            }
            else{
                echo "<script>window.open('edit_parent.php', '_self')</script>";
                
            }
       
       
    
        }
?>