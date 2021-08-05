<?php
session_start();
if(isset($_SESSION['username'])){
  header('location: index.php');
  exit;
}
require_once "config.php";

$username = $password = "";
$err = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
{
  $err = "Please Enter Username + Password";
}
else{
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
}
if(empty($err))
{
  $sql = "SELECT id , username,password FROM users WHERE username = ?";
  $stmt = mysqli_prepare($con,$sql);
  mysqli_stmt_bind_param($stmt ,  "s" , $param_username);
  $param_username = $username;
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){
     mysqli_stmt_bind_result($stmt,$id,$username,$hashed_password);
     if(mysqli_stmt_fetch($stmt))
          {
            if(password_verify($password, $hashed_password))
            {
              session_start();
              $_SESSION["username"] = $username; 
              $_SESSION["id"] = $id;
              $_SESSION["loggedin"] = true; 

              header('location:index.php');
            }
          }
    }
  }
}

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
    <title>Login - SMS</title>

  </head>
  <body>
      <div class="container mt-4">
       <h3>Please Login Here:</h3>
       <hr>
       <form action="" method="post">
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" name="username"  placeholder="Username">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <a href="register.php" class="btn btn-primary">Register</a>
</form>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>