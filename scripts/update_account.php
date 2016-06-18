<?php
require 'DBcontrol.php';

$col = test_input($_POST['column']);
$val = test_input($_POST['dbval']);
$uid = test_input($_POST['uid']);

$sql = "UPDATE users SET $col = '$val' WHERE UserID = '$uid' " ;
if(mysqli_query($conn, $sql)){
	echo "successful";
	session_start();
	unset($_SESSION["$col"]);
	$_SESSION["$col"] = $val;
} else {
	echo "Error : " . mysqli_errno($conn);
}



function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
