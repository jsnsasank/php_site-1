<?php
header("content-type:application/json");
require 'DBcontrol.php';

$name 	  = $_POST['name'];
$date 	  = $_POST['date'];
$time 	  = $_POST['time'];
$location = $_POST['location'];
$desc	  = $_POST['desc'];
$lead_uid = $_POST['lead'];
$leadname = $_POST['leadname'];
$RSPCODE  = array();


$sql  = "INSERT INTO upcoming_events (EventName,EventDate,EventTime,Location,Description,lead) VALUES ('$name','$date','$time','$location','$desc','$leadname') ;" ;
$sql1  = "UPDATE users SET UserRole='lead' WHERE UserID='$lead_uid' ;";

$tree_query = "select Identifier from treeids  where Identifier NOT IN ( select Identifier from alloted_trees_for_events) Order by RAND() Limit 2";
$tree_result = mysqli_query($conn, $tree_query);
$eid = "SELECT EventID from upcoming_events where EventName='$name' and EventDate='$date' and lead='$leadname' limit 1";

if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)){
	
	if($result = mysqli_query($conn, $eid)){
		
		$eventresult = mysqli_fetch_array($result);
	
		while ($row = mysqli_fetch_array($tree_result)){
			
			$id   = $eventresult['EventID'];
			$tree = $row['Identifier'];
			$sql2 = "INSERT into alloted_trees_for_events (Eventid,Identifier,status) VALUES ('$id','$tree','pending')";
			
			if(mysqli_query($conn, $sql2)){
				$RSPCODE['Result'] = "successful";
			} else {
				$RSPCODE['Error'] = "Tree id allocation failed for this event";
			}
			
		} # While ends
		
	}else {
		$RSPCODE['Error'] = "Unable to get the Event ID for this new Event";
	}
}else {
	$RSPCODE['Error'] = "Unable to update events";
}

	echo json_encode($RSPCODE);


?>