<?php
require 'DBcontrol.php';

$treeid = $_POST['treeid'];
$data   = "";


$sql     = "select ce.EventName,ce.EventDate,ce.Location from completed_events ce,alloted_trees_for_events ate where ce.eventid=ate.eventid and ate.identifier='$treeid' limit 1";
$result  = mysqli_query($conn, $sql);
$count   = mysqli_num_rows($result);
$sql2    = "select * from treeids where Identifier='$treeid' ";
$result2 = mysqli_query($conn, $sql2);
$count2  = mysqli_num_rows($result2);

if($count != 0 ){
	$data  = "<h2>You Tree has been Planted in the following Event</h2><hr/>";
	$data .= "<table><tr><th>Event Name</th><th>Event Date</th><th>Event Location</th></tr>";
	while($row = mysqli_fetch_array($result)){
		$data .= "<tr><td>".$row['EventName']. "</td><td>".$row['EventDate']."</td><td>".$row['Location']."</td></tr>";
	}
	
	echo $data;
} elseif ($count2 == 0) {
	echo "<h2>Invalid Tree Identifier, Please verify!!</h2>";
}else {
	echo "<h2>You Tree is not yet planted</h2>";
}

?>
