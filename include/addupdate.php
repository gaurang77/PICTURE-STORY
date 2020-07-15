<?php session_start();
    include("databaseconn.php");
    $u=$_SESSION['user_name'];
    $sql = "SELECT * FROM register WHERE user_name='$u' ";
    $result= $conn->query($sql);
    $row = $result->fetch_assoc();
    $pro_img=$row['profi_img'];
    $name= $row['name'];
    $email = $row['email'];
?>
<?php if(isset($_SESSION['name'])): ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Profile</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style5.css">
    </head>
<?php
if(isset($_GET['msg'])){
    switch($_GET['msg']){
      case 'empty':
        $msg="<p class='bg-danger'> title and image upload cant be empty!!! </p>";
      break;
      case 'too_big':
        $msg="<p class='bg-danger'> image size should be less than 1mb!!! </p>";
      break;
      case 'error':
        $msg="<p class='bg-danger'>error occured while processing !!!</p>";
      break;
      case 'wrong_file':
        $msg="<p class='bg-danger'>please only upload jpg,jpeg or png!!!</p>";
      break;
    }
  }

?>    
    <?php 
        if(isset($_POST['submit'])){
            $file=$_FILES['file'];
            $filename = $file['name'];
            $fileExt = (explode('.',$filename));
           // echo ($fileExt[1]);
            $allowed = array('jpg','jpeg','png','pdf');

            if(in_array(strtolower($fileExt[1]),$allowed)){
            if($file['error'] == 0){
                if($file['size']<100000){
                    $fileNewName = uniqid('',true).".".$fileExt[1];
                    $fileDestination = "../store/profi_img/".$fileNewName;
                    move_uploaded_file($file['tmp_name'],$fileDestination);
                    $fd= "store/profi_img/".$fileNewName;
                    $us=$_SESSION['user_name'];
                    $nname=$_POST['name'];
                    $nemail=$_POST['email'];
                    $sql ="UPDATE register SET profi_img='$fd',
                    name='$nname',
                    email='$nemail'
                    WHERE user_name='$us'";
                    $conn->query($sql);
                    echo $conn->error;
                    header("location:addupdate.php");
                    
                }else{
                    header('location: addupdate.php?msg=too_big');
                }
            }else{
                header('location: addupdate.php?msg=error');
            }
        }else{
            header('location: addupdate.php?msg=wrong_file');
        }
    }
    ?>
<body>
<nav class="navbar-nav sticky-top">
    <div class="container-fluid bg-secondary">
      <ul class="nav ">
        <li class ="nav-item my-auto px-2">
         <a href="../home.php" class="nav-link px-1 font-weight-bold 
         btn btn-info">
         HOME </a>  
        </li>
        <li class = "nav-item px-2 ml-auto s">
         <a href="../logout.php" class="nav-link">
         <button class="btn btn-danger">LOGOUT</button>  
         </a>
        </li>
      </ul>
    </div>
</nav>

<div class="main5">
<br>
<?php if(isset($_GET['msg'])){ echo $msg;}?>
    <img 
    src="<?php echo "../".$pro_img; ?>"
    class="rounded-circle proimg"
    alt="">
    <h3>Update profile pic</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
    enctype="multipart/form-data">
        <input type="file" name="file" class="inp">
        <br> <br>
        Name: <input type="text" name="name" 
        value="<?php echo $name;?>"> 
        Email: <input type="email" name="email"
        value="<?php echo $email;?>">
        <br> <br>
        <button type="submit" name="submit" class="inp1" >upload & submit</button>
    </form>
    
    
    
<script src="../js/j.js"></script>    
</div>
</body>
</html>
<?php endif; ?>    