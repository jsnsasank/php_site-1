<?php
require 'DBcontrol.php';

$status 	= test_input($_POST['status']);
$data2		= "";

$query = "select reqID, reqDate, Location, species, quantity, comments,status,reqUID,u.UserName from plant_tree_req p,users u where p.reqUID=u.userID order by reqdate";
if ($status == "completed"){
	$query = "select reqID, reqDate, Location, species, quantity, comments,status,reqUID,u.UserName from plant_tree_req p,users u where p.reqUID=u.userID and status='completed' order by reqdate";
}
if ($status == "unscheduled"){ 
	$query = "select reqID, reqDate, Location, species, quantity, comments,status,reqUID,u.UserName from plant_tree_req p,users u where p.reqUID=u.userID and status='unscheduled' order by reqdate";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
	
	while($row = mysqli_fetch_assoc($result)) {
		$data2 .= "<tr><td>" . $row['reqID'] . "</td>" ."<td>". $row['reqDate']."</td>" ."<td>".$row['Location']."</td>"."<td>".$row['species']."</td>"."<td>".$row['quantity']."</td>"."<td>".$row['comments']."</td>"."<td>".$row['status']."</td>"."<td>".$row['UserName']."</td></tr>";
	}
	
	echo "<table><tr><th>Req ID</th><th>Requested Date</th><th>Location</th><th>Species</th><th>Quantity</th><th>comments</th><th>status</th><th>Requestor Name</th></tr>" . $data2 . "</table>" ;

}else {
	echo "<h1>No Results Found</h1>";
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

