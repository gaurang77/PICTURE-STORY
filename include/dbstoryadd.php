<?php 
session_start(); 
if(isset($_SESSION['user_name']) && isset($_POST['submit'])) {
 $file=$_FILES['file'];
 $timestamp = "'".date("Y-m-d H:i:s")."'";
 $title = "'".$_POST['title']."'";
 $content = "'".$_POST['content']."'";
    
 if(empty($file['name']) || empty($title)) {
    header('location: addstory.php?msg=empty');
 }else{
    $fileName=$file['name']; 
    $fileExt = (explode('.',$fileName));
    $allowed = array('jpg','jpeg','png');
    if(in_array(strtolower($fileExt[1]),$allowed)){
        if($file['error'] == 0){
            if($file['size']<100000){
                $fileNewName = uniqid('',true).".".$fileExt[1];
                $directory="../store/".$_SESSION['user_name'];
                if(!is_dir($directory)){
                    mkdir($directory, 0755, true);
                }
                $fileDestination = 
                "../store/".$_SESSION['user_name']."/".$fileNewName;
                move_uploaded_file($file['tmp_name'],$fileDestination);
                //database connection and creation section
                include_once('databaseconn.php');
                $tbname = $_SESSION['user_name'];
                // $sqlcheck = "DESCRIBE $tbname";
                // $conn->query($sqlcheck); 
                // echo "<br>";   
                // echo $conn->error;
                $fileDestination="store/".$_SESSION['user_name']."/".$fileNewName;
                $f="'".$fileNewName."'";
                $f_loc="'".$fileDestination."'";

                $sql="INSERT INTO $tbname
                (title,content,file_nam,file_loc,reg_date) 
                VALUES($title,$content,$f,$f_loc,$timestamp)";

                $conn->query($sql);
                echo "<br> Error:".$conn->error;
                header('location: ../home.php');
            

            }else{
                //echo "<br> Your file is too big!";
                header('location: addstory.php?msg=too_big');
            }
        }else{
            //echo "<br>there was an error while uploading the file!";
            header('location: addstory.php?msg=error');
        }
    }else{
        //echo "<br> you cant upload file of this type !";
        header('location: addstory.php?msg=wrong_file');
    }
 }
}
else{
    header('location:../home.php');
}
