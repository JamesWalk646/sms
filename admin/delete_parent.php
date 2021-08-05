<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true ){
header('location: login.php');
}
include 'navbar.php';
include 'sidebar.php';
$con = mysqli_connect("localhost","root","","php_auth_api");
?>