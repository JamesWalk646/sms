<?php
include 'config.php';

$username = $password = $confirmpassword = "";
$username_err = $password_err = $confirmpassword_err = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Username Should Be Empty";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($con,$sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt , "s",  $param_username);

            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This User Already Exist";
                }
                else{
                    $username = trim($_POST["username"]);
                }
            }
            else{
                echo "Something Went Wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);


if(empty(trim($_POST['password'])))
{
    $password_err = " Password Sholud Not Be Empty";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password Cannot be Less Than 5 Characters";
}
else{
    $password = trim($_POST['password']);
}

if(trim($_POST['password']) != trim($_POST['confirm_password']))
{
    $confirmpassword_err = "Password Sholud Match";
}

if(empty($username_err) && empty($password_err) && empty($confirmpassword_err)){
    $sql = "INSERT INTO users (username,password)VALUES (?, ?)";
    $stmt = mysqli_prepare($con,$sql);
    if($stmt){
        mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_password);
        $param_username = $username;
        $param_password =  password_hash($password,PASSWORD_DEFAULT);
        if(mysqli_stmt_execute($stmt))
        {
            header("location:login.php");
        }
        else{
            echo "Something Went Wrong..cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($con);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Register - SMS</title>

  </head>
  <body>
      <div class="container mt-4">
       <h3>Please Register Here:</h3>
       <hr>
   <form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Username">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name="confirm_password" id="inputPassword4" placeholder="Confirm Password">
    </div>
    </div>
  <button type="submit" class="btn btn-primary">Register</button>
  <a href="login.php" class="btn btn-primary">Login</a>
</form>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>