<?php
if(isset($_POST['submit']))
{
  if( empty($_POST['name']) || empty($_POST['email']) ||
    empty($_POST['u_name']) || empty($_POST['pass']))
  {
    header("Location: register.php?msg=empty");
    //echo "heelyo";
    exit();
  }else{
    include_once("include/databaseconn.php");
    $n = "'".($_POST['name'])."'";
    $e = "'".($_POST['email'])."'";
    $u = "'".($_POST['u_name'])."'";
    $p = "'".($_POST['pass'])."'";
    $profi_img = " 'store/profi_img/default.jpg '";

    $sql = " SELECT * FROM register where user_name=$u";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      header('location: register.php?msg=usertaken');
      exit();
    }else{
      $sql = " INSERT INTO register (name,email,user_name,password,profi_img)
      VALUES($n,$e,$u,$p,$profi_img) ";
      if($conn->query($sql)===true){
        header('location: register.php?msg=user_added');
        exit();
      }else{
        header('location: register.php?msg=sql_error');
      }     
    }
  }
}
/*
    if($conn->query($sql)===TRUE){
      header("location : register.php?msg=success");
      exit();
    }

    else{
      echo "Error: " . $sql . " " . $conn->error;
    }*/
?>

