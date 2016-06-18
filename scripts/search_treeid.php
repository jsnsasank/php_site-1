<?php
require 'DBcontrol.php';

$treeid 	= test_input($_POST['treeid']);
$uid 		= test_input($_POST['uid']);
$data2 		= "";

$query = "SELECT * from plant_tree_req WHERE reqUID = '$uid' and reqID = '$treeid'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
	
	while($row = mysqli_fetch_assoc($result)) {
		$data2 .= "<tr><td>" . $row['reqID'] . "</td>" ."<td>". $row['reqDate']."</td>" ."<td>".$row['status']."</td></tr>";
	}
	
	echo "<table><tr><th>Req ID</th><th>Requested Date</th><th>Status</th></tr>" . $data2 . "</table>" ;

}else {
	echo "<h1>Req: ".$treeid." Not Found</h1>";
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>