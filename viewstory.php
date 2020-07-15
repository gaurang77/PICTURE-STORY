<?php session_start();
include_once('include/databaseconn.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name']; ?></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style5.css">
</head>
<?php 
if(isset($_GET['show'])){
    $id=$_GET['show'];
    $tbname = $_SESSION['user_name'];
    $sql="SELECT * FROM  $tbname WHERE id= $id ";
    $result = $conn->query($sql);  
}
?>
<body>
<nav class="navbar-nav sticky-top">
    <div class="container-fluid bg-secondary">
      <ul class="nav ">
        <li class ="nav-item my-auto px-2">
         <a href="home.php" class="nav-link px-1 font-weight-bold 
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
<?php if($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
    <div class="main5">
        <h1><?php echo $row['title']; ?></h1>
      <div class="img5">
        <img src="<?php echo $row['file_loc']; ?>"
        alt="<?php echo $row['file_nam']; ?>">
      </div>
      <div class="content5">
        <p><?php echo $row['content']; ?></p>
      </div>
    </div>
    <?php endwhile; ?>
<?php endif; ?>    
</body>
</html>