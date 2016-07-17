<?php
require 'DBcontrol.php';

$data2		= "";

$query = "SELECT TreeName,COUNT(*) AS Count FROM treeids GROUP by TreeName";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
	
	while($row = mysqli_fetch_assoc($result)) {
		$data2 .= "<tr><td>" . $row['TreeName'] . "</td>" ."<td>". $row['Count']."</td></tr>";
	}
	
	echo "<table><tr><th>Tree Name</th><th>No.of Trees Availalbe</th></tr>" . $data2 . "</table>" ;

}else {
	echo "<h1>Database Error, Please contact administrator</h1>";
}

?>