<?php
require 'DBcontrol.php';

$eid = test_input($_POST['EventID']);
$uid = test_input($_POST['uid']);

$query = "SELECT * FROM upcoming_events_reg where UserID = '$uid' AND EventID = '$eid'" ;
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

if ($count == 0) {
	$sql = "INSERT INTO upcoming_events_reg (UserID,EventID) VALUES ('$uid', '$eid')" ;
	if(mysqli_query($conn, $sql)){
		echo "successful";
	} else {
		echo "Error : " . mysqli_errno($conn);
	}

}else {
	echo "Registered";
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>