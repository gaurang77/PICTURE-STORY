<?php 
session_start();

if(isset($_SESSION['name'])){
    session_unset();
    session_destroy();
    //header('Refresh:1','URL = login.php');
    header('location: login.php');
    exit();
}
?>