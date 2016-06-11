<?php
header("content-type:application/json");
require 'DBcontrol.php';

$cart 		= 	$_POST['js_cart'];
$name 		= 	test($_POST['name']);
$last4 		= 	test($_POST['last4']);
$addr 		= 	test($_POST['addr']);
$date 		= 	date("Y-m-d-H-i-s");
$amount 	= 	$cart['total'];
$RSPCODE 	= 	array();
unset($cart['total']);

#echo json_encode($cart['total']);
$transcation = transID();
$sql  = "INSERT INTO donations (Name, Address, TransactionDate,Card,Amount,TranscationID) VALUES ('$name', '$addr','$date','$last4','$amount','$transcation')";
if(mysqli_query($conn, $sql)) {
foreach ($cart as $tree => $count){
	if($tree == "rm_plants"){
		for($i = 0; $i < $count; $i++){
			$treeid = "RM-" . (myrand() + $i);
			$RSPCODE[] = (updateDB($transcation,"Red Maple",$treeid,$conn)) ? $treeid : "DB_ERROR";
		}
	}
	if($tree == "sm_plants"){
		for($i = 0; $i < $count; $i++){
			$treeid = "SM-" . (myrand() + $i);
			$RSPCODE[] = updateDB($transcation,"Sugar Maple",$treeid,$conn) ? $treeid : "DB_ERROR";
		}
	}
	if($tree == "rb_plants"){
		for($i = 0; $i < $count; $i++){
			$treeid = "RB-" . (myrand() + $i);
			$RSPCODE[] = updateDB($transcation,"River Birch",$treeid,$conn) ? $treeid : "DB_ERROR";
		}
	}
	if($tree == "ct_plants"){
		for($i = 0; $i < $count; $i++){
			$treeid = "CT-" . (myrand() + $i);
			$RSPCODE[] = updateDB($transcation,"Catalpa",$treeid,$conn) ? $treeid : "DB_ERROR";
		}
	}
}
$RSPCODE[] = $transcation;
echo json_encode($RSPCODE);
}else{
 echo "DB_ERROR";
}

# update each transcation with treenum
function  updateDB($transid,$tname,$tid,$c){
	$sql2 = "INSERT INTO treeids (TranscationID,TreeName,Identifier) VALUES ('$transid','$tname','$tid')";
	if(mysqli_query($c, $sql2)){
		return  true;
	}else{
		echo "Error :" . mysqli_errno($c);
		return  false;
	}
}

# six digit random number 
function myrand($digits = 6){
  return rand(pow(10, $digits-1), pow(10, $digits)-1);
}


# Generate a 6 digit Alpha Numeric random string 
function transID($length = 6) {
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

#function to remove any special chars. we accept only letters,nums & spaces 
function test($data){
	return preg_replace('/[^a-zA-Z0-9 \s]+/', '', $data);
}

?>