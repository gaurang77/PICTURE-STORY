<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login screen</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>
  <!--data-vide-bg="store/COSTA"-->
  <body data-vide-bg="store/COSTA">
    <div class="login-form">
      <h2>Sign In</h2>
      <form method="post" action="logcheck.php">
      <?php
        if(isset($_GET['msg'])){
          $error='<div class="form-input">
          username or password invalid 
        </div>';
        echo $error;
        }
      ?>
        <div class="form-input">
          <input type="text" name="uname" placeholder="username" />
        </div>
        <div class="form-input">
          <input type="password" name="pword" placeholder="password" />
        </div>
        <div class="form-input">
          <input type="submit" name="submit" value="Login" />
        </div>
        <a href="register.php" class="forget">Not a user register here</a>
      </form>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.vide.js"></script>
  </body>
</html>

<?php /*
if (isset($_POST['submit'])){
  if(!empty($_POST['uname'] && !empty($_POST['pword']))){
    $user = $_POST['uname'];
    // check($user);
  $sql = "SELECT id FROM register WHERE name='{$user}'";
    $result = $conn->query($sql);
    /*while ($row = $result->fetch_assoc()) {
    echo $row['id']."<br>";
    }
    /* if($conn->query($sql)===TRUE){
    echo "true";
    } else{
    echo "Error: " . $sql . " " . $conn->error;
    }
    if($result->num_rows > 0){
    $error = "everything ok" ." ". $result->num_rows;
    }else{
    $error = "invalid username or password";
    }
    /* $pword = $_POST['pword'];
    check($pword);
  }
  else{
    $error = "Please fill all the fields";
  }
echo $error;
}*/
?>