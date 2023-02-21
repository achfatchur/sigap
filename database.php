<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'sigap2';
$con = mysqli_connect($host, $user, $pass, $db);

// Check connection
 if (mysqli_connect_errno($con))
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
?>