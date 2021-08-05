<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ){
header('location: login.php');
}
include 'navbar.php';
include 'sidebar.php';
$con = mysqli_connect("localhost","root","","php_auth_api");
if(isset($_GET['delete_subject'])){
    $delete = $_GET['delete_subject'];
    $sql = "DELETE FROM teachers WHERE id = '$delete' ";
    $run =  mysqli_query($con,$sql);
    if($run){
        echo "<script>window.open('view_subjects.php','_self')</script>";
    }else{
        echo "<script>window.open('delete_subject.php','_self')</script>";
}
}

?>