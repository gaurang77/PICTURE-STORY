<?php 
require("include/databaseconn.php");
if(!isset($_GET['msg'])){
  
}else{
  $msg = $_GET['msg'];
  switch($msg){
    case "empty": 
      $error = "<h4 class='bg-warning text-center py-2'>please fill in all the details </h4>";
    break;
    case "usertaken":
      $error = "<h4 class='bg-warning text-center py-2'>please select a different username </h4>";
    break;
    case "sql_error":
      $error = "<h4 class='bg-warning text-center py-2'>something went wrong </h4>";
    break;
    case "user_added":
      $error = "<h4 class='bg-success text-center py-2'>user added succesfully </h4>";
      $ad = 1;
    break;
  } 
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" >
    <!--<link rel="stylesheet" href="css/style2.css">-->
    <title>Register</title>
</head>
<body> 
     <br>
    <h3 class="display-3 text-center">Enter your info</h3>
    <!-- <div class="container-fluid mx-auto">
        <form method="post">
        <input type="text" class="form-control" placeholder="enter name">
        </form>
        echo $goToHome? "home.php" : "register.php";
       //echo isset($_POST['name'])? $_POST['name'] : "";
    </div> -->
  <form class="container" method="POST" action="regcheck.php">
   <?php
  if(isset($error)){
    echo $error;
    if(isset($ad)){
    echo '<a class="btn btn-block btn-info "href="login.php">
    Go TO LOGIN PAGE</a>';
    }
  }
  ?>   
    <div class="form-group">
      <label for="exampleInputName">Name</label>
      <input type="text" class="form-control" id="exampleInputName" name="name"
      value="">
    </div>  
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email"
      value="">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputUserName">User Name</label>
      <input type="text" class="form-control" id="exampleInputUserName" name="u_name"
      value="">
      <small id="emailHelp" class="form-text text-muted">please choose a unique username.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="pass"
      value="">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
<script src="js/jquery.js"></script>
<script src="js/j.js"></script>
</body>
</html>