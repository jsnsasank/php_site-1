<?php
require 'DBcontrol.php';

$uid 		= 	$_POST['uid'];

$sql = "DELETE FROM users WHERE UserID = '$uid'";

if(mysqli_query($conn, $sql)){
	echo "successful";
} else {
	echo "Error : " . mysqli_errno($conn);
}

?>