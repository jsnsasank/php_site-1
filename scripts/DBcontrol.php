<?php
$host = "localhost";
$user = "root";
$password = "welcome";
$database = "pasha_asp";

try{
  $conn = mysqli_connect($host,$user,$password,$database);
}catch(Exception $e){
  die("Connection failed:" . $e->getMessage());
}

?>