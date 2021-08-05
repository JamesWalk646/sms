<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ){
header('location: login.php');
}
include 'navbar.php';
include 'sidebar.php';
$con = mysqli_connect("localhost","root","","php_auth_api");
if(isset($_GET['delete_student'])){
    $delete = $_GET['delete_student'];
    $sql = "DELETE FROM  students WHERE id = '$delete' ";
    $run =  mysqli_query($con,$sql);
    if($run){
        echo "<script>window.open('view_student.php','_self')</script>";
    }else{
        echo "<script>window.open('delete_student.php','_self')</script>";
}
}

?>