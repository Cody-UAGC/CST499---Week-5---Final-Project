<?php 

define('DB_HOST', 'localhost');
define('DB_NAME', 'cst499');
define('DB_USER', 'root');
define('DB_PASS', '');

//Create connection
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
