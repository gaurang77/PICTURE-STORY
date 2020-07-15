<?php 
require("include/databaseconn.php");
echo "<br>";
$user= "'".$_POST['uname']."'";
$pass = "'".$_POST['pword']."'";

//echo "<br>".$user." ".$pass;

$sql = "SELECT * FROM register WHERE 
    user_name=$user AND password=$pass";
//echo $sql;


$result = $conn->query($sql);

if($result->num_rows>0){
    $row = $result-> fetch_assoc();
    session_start();
    $_SESSION['name'] = htmlentities($row['name']);
    $_SESSION['email'] = htmlentities($row['email']);
    $_SESSION['user_name']=htmlentities($row['user_name']);
    header('location: home.php');
    exit();
}
else{
    header('Location: login.php?msg=error');
}
?>