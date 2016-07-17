<?php
require 'DBcontrol.php';

$name 	  = $_POST['name'];
$date 	  = $_POST['date'];
$time 	  = $_POST['time'];
$location = $_POST['location'];
$desc	  = $_POST['desc'];
$lead_uid = $_POST['lead'];
$leadname = $_POST['leadname'];

$sql  = "INSERT INTO upcoming_events (EventName,EventDate,EventTime,Location,Description,lead) VALUES ('$name','$date','$time','$location','$desc','$leadname')" ;
$sql2 = "UPDATE users SET UserRole='lead' WHERE UserID='$lead_uid' ";
if(mysqli_query($conn, $sql)){
	if(mysqli_query($conn, $sql2)) {
	  echo "successful";
	}
} else {
	echo "Error : " . mysqli_errno($conn);
}

?>