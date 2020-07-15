<?php
$servername = "localhost";
$username = "lenovo";
$password = "lenovo";
$dbname = "video";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//echo $conn->client_info;
// Check connection
if ($conn->connect_error){ 
    die("Connection failed: " . $conn->connect_error); 
}
else {
    //echo "connection to database established" ;
}

?>