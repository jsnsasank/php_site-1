<?php
header("content-type:application/json");
require 'DBcontrol.php';

$eventid = $_POST['eventid'];
$reqids  = $_POST['reqs'];
$RSPCODE = array();


$sql1 = "INSERT INTO completed_events (SELECT * FROM upcoming_events where EventID='$eventid')";
$sql2 = "DELETE FROM upcoming_events where EventID='$eventid'";
$sql3 = "UPDATE alloted_trees_for_events SET status='completed' WHERE Eventid='$eventid'";


if(mysqli_query($conn, $sql1)){
	if(mysqli_query($conn, $sql2)){
		foreach ($reqids as $id){
			$query  = "INSERT INTO alloted_reqs_for_events (Eventid,reqID) VALUES ('$eventid', '$id')";
			$query1 = "UPDATE plant_tree_req SET status='completed' WHERE reqID='$id'";
			if(mysqli_query($conn, $query) && mysqli_query($conn, $query1)){
				$RSPCODE['Result'] = "successful";
			}else{
				$RSPCODE['Error'] = "unable to update in alloted Request table";
			}
		}
		
	}else {
		$RSPCODE['Error'] = "Unable to Delete it from upcoming events";
	}
	
	if(! mysqli_query($conn, $sql3)){
		$RSPCODE['Error'] = "Unable to update tree id status";
	}
	
}else {
	$RSPCODE['Error'] = "Unable to update the event in completed events";
}

echo json_encode($RSPCODE);

?>