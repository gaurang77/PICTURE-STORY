<?php session_start();?>
<?php if(isset($_SESSION['name'])): ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name']." "."add_story " ?> </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style4.css">
</head>
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
         <a href="logout.php" class="nav-link">
         <button class="btn btn-danger">LOGOUT</button>  
         </a>
        </li>
      </ul>
    </div>
  </nav>
<br>
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

 <div class="container-fluid main4">
   <h3 class="disply-2 text-center bg-dark text-light">CREATE PIC-STORY</h3>
   <br>
   <?php if(isset($_GET['msg'])){
      echo $msg; 
    }
    ?>
    <form action="dbstoryadd.php" method="POST" enctype="multipart/form-data">
      <h4 class="text-center" >Title of Story:</h4>
      <input type="text" name="title" id="title" class="ip4">
      <h4 class="text-center">Picture of the story: </h4>
      <input type="file" name="file" id="file" class="ip3"> 
      <h4 class="text-center"> Content: </h4> 
      <textarea name="content" id="content" class="ip5"></textarea>
      <button type="submit" name="submit" class="btn btn-success mt-2">Submit Story</button>
    </form>
  </div>
</body>
</html> 
  <?php else: header('location:home.php'); ?>   
<?php endif; ?>
