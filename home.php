<?php
session_start();
include('include/databaseconn.php');
?>
<?php if(isset($_SESSION['name'])): ?>
<?php
 $tname = $_SESSION['user_name'];
 $tbname = "'".$_SESSION['user_name']."'";
 $sqlcheck="DESCRIBE $tname";
 $res =  $conn->query($sqlcheck);

 if($conn->error == "Table 'video.".$tname."' doesn't exist"){
  $sql="CREATE TABLE $tname (
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          title VARCHAR(80) NOT NULL,
          content TEXT NOT NULL,
          file_nam VARCHAR(256) NOT NULL,
          file_loc VARCHAR(500) NOT NULL,
          reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          )";
  $conn->query($sql);
  //echo $conn->error;
}
 $sql="SELECT profi_img FROM register WHERE user_name=$tbname";
  //echo "<br>".$sql."<br>";
  $result=$conn->query($sql);
  $r = $result->fetch_assoc();
  $img = $r['profi_img'];
  echo $conn->error;
  
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
    <title><?php echo $_SESSION['name']; ?></title>
</head>
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
  <div class="container-fluid">
    <div class="row">
    <!-- SIDE BAR-->
      <div class=" backp col-md-3 col-sm-12 ">
        <img src="<?php echo $img; ?>" 
         class="rounded-circle mr-auto img-profile"
         alt="profile-pic">
        <p class="display-4 text-center">
        <?php echo $_SESSION['name']; ?>
        </p>
        <p class="blockquote text-center">
        <?php echo $_SESSION['email']; ?>
        </p>
        <div class="btns">
         <a class="btn btn-dark btn-block" href="include/addstory.php">
          ADD STORIES </a> 
         <a class="btn btn-outline-success btn-block mt-3" href="include/addupdate.php"> 
         UPDATE PROFILE </a>
         <a class="btn btn-danger btn-block mt-3" href="deletestory.php"> 
         DELETE STORIES </a> 
        </div>
      </div>
      <!-- STORY BAR-->
      <div class="col-md-9 col-sm-12 right">
        <!-- <h3 class="display-5 text-center bg-info he3">
          STORIES
        </h3> <br> -->
        <?php
        $tbname=$_SESSION['user_name'];
        $sql = "SELECT * FROM $tbname";
        $result = $conn->query($sql);
        ?>
      <?php if(!$conn->error): ?>
        <?php if ($result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <div class="bd3">
              <div class="title3">
                <h3><?php echo $row["title"]; ?></h3>
                <p><?php echo $row["reg_date"]; ?></p>
              </div>
              <div class="img3">
                <img src="<?php echo $row["file_loc"]; ?>" 
                class="cover3" alt="<?php echo $row["file_nam"]; ?>" />
              </div>
              <div class="content3">
                <p><?php $row["content"]; ?></p>
              </div>
              <div class="bcn3">
                <a href="viewstory.php?show=<?php echo $row['id']; ?>"
                class="btn btn-success " > Read More</a>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
        <h3>No stories to display</h3>
        <?php endif; ?>
      <?php endif; ?>
      </div>
    </div>
  </div>  
</body>
</html>
<?php else:
 header('location:login.php');    
?>

<?php endif; ?>


