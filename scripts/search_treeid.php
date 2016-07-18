<?php
require 'DBcontrol.php';

$reqid 		= test_input($_POST['treeid']);
$uid 		= test_input($_POST['uid']);
$data2 		= "";
$data3		= "";

$query  = "SELECT * from plant_tree_req WHERE reqID = '$reqid'";
$query2 = "select ce.EventName,ce.EventDate,ce.Location,ce.lead from alloted_reqs_for_events a, completed_events ce  where a.Eventid=ce.EventID and a.reqID='$reqid' ";

$result  = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
$count   = mysqli_num_rows($result2);

if (mysqli_num_rows($result) > 0) {
	
	while($row = mysqli_fetch_assoc($result)) {
		$data2 .= "<tr><td>" . $row['reqID'] . "</td>" ."<td>". $row['reqDate']."</td>" ."<td>".$row['status']."</td></tr>";
	}
	if($count > 0) {
		$data3 .= "<h2>Your Request Completed in the following event</h2><table><tr><th>Event Name</th><th>Date</th><th>Location</th><th>Lead BY</th>";
		while($row1 = mysqli_fetch_assoc($result2)){
			$data3 .= "<tr><td>". $row1['EventName'] . "</td><td>" . $row1['EventDate']. "</td><td>".$row1['Location']."</td><td>".$row1['lead']."</td></tr>";
		}
		$data3 .= "</table>";
	}
	echo "<table><tr><th>Req ID</th><th>Requested Date</th><th>Status</th></tr>" . $data2 . "</table>".$data3." " ;

}else {
	echo "<h1>Req: ".$reqid." Not Found </h1>";
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>