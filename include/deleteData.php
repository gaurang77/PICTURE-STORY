<?php
if(isset($_POST['deleteId'])){
    include('databaseconn.php');
    session_start();
    $id = $_POST['deleteId'];
    $tableName = $_SESSION['user_name'];
    $sql = "DELETE FROM $tableName WHERE id='$id' ";

    if($conn->query($sql)=== TRUE){
        echo "DELETED";
    }else{
        echo "FAILED";
    }

}
?>