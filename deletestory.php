<?php session_start();
include_once('include/databaseconn.php');
// echo "<pre>";
// print_r($_SESSION); 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name']; ?></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
</head>
<?php if(isset($_SESSION['name'])): ?>
<?php
  $tbname = $_SESSION['user_name'];
  $sql="SELECT profi_img FROM register WHERE user_name='$tbname'";
  $result=$conn->query($sql);
  $r = $result->fetch_assoc();
  $img = $r['profi_img']; 
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
         <a class="btn btn-outline-danger btn-block mt-3" href="include/addupdate.php"> 
         UPDATE PROFILE </a> 
        </div>
      </div>
      <!-- STORY BAR-->
      <div class="col-md-9 col-sm-12 right">
        <?php
        $tbname=$_SESSION['user_name'];
        $sql = "SELECT * FROM $tbname";
        $result = $conn->query($sql);
        ?>
      <?php if(!$conn->error): ?>
        <?php if ($result->num_rows > 0): ?>
        <div class="container mt-3">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">DATE</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">DELETE</th>
                    </tr>
                </thead>
                <tbody>
            <?php $i=1; ?>     
          <?php while($row = $result->fetch_assoc()): ?>         
                <tr>
                <td scope="row"><?= $i++ ?></td>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["reg_date"]; ?></td>
                <td><img src="<?php echo $row["file_loc"]; ?>" 
                class="img-thumbnail imageDel"
                 alt="<?php echo $row["file_nam"]; ?>" /></td>
                <td>  
                <h4 class="alert alert-danger text-center delete" 
                id ="<?= $row['id'] ?>">
                DELETE</h4>
                <div class="delete-box">
                 <button class="btn btn-danger">YES</button>
                 <button class="btn btn-warning">NO</button>
                </div>
                </td> 
                </tr>        
          <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <h3>No stories to display</h3>
        <?php endif; ?>
      <?php endif; ?>
    </div>
</div>  
<script src="js/j.js"></script>
</body>
<?php else:
 header('location:login.php');
?>
<?php endif; ?>
</html>
