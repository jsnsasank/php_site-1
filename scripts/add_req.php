<?php
header("content-type:application/json");
require 'DBcontrol.php';

$loc 		= test_input($_POST['loc']);
$species 	= test_input($_POST['species']);
$quant 		= (int)test_input($_POST['quant']);
$comments 	= test_input($_POST['comments']);
$uid 		= test_input($_POST['uid']);
$reqid		= "RQ" . myrand() . myrandchar();
$reqid		= (string) $reqid;
$RSPCODE 	= 	array();


$sql = "INSERT INTO plant_tree_req (reqID,reqUID,Location,species,quantity,comments) VALUES ('$reqid','$uid','$loc','$species','$quant','$comments')" ;
if(mysqli_query($conn, $sql)){
	$RSPCODE['rspcode'] = $reqid;
	echo json_encode($RSPCODE);
} else {
	$RSPCODE['Error'] = mysqli_errno($conn);
	echo json_encode($RSPCODE);
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
function myrand($digits = 6){
	return rand(pow(10, $digits-1), pow(10, $digits)-1);
}
function myrandchar($length = 2) {
	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
?>