<?php

# This script acts as credit card emulator.
# validate the given details and retunr a code back to the ajax caller;
# 
header("content-type:application/json");
require 'DBcontrol.php';

// get the data from POST
$cust_cc 	= $_POST['cc_num'];
$cust_add 	= $_POST['cc_addr'];
$cust_zip 	= $_POST['cc_zip'];
$cust_cvv 	= $_POST['cc_cvv'];
$cust_name  = $_POST['cc_name'];

$RSPCODE = array('AVS' => "", 'CVV' => "");


$sql = "select * from bank where creditcard = '$cust_cc' limit 1";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

if( $num_rows != 0 ){
$row = mysqli_fetch_assoc($result);

# BLANK if some info is missing
if( empty($cust_add) || empty($cust_zip) || empty($cust_cc) || empty($cust_name) || empty($cust_cvv) ){
	$RSPCODE['AVS'] = "BLANK";
	$RSPCODE['CVV'] = "BLANK";
}
#A: Address matches, zip code does not.
similar_text($cust_add, $row['address'],$percent);
$percent = round($percent);

if( $percent >= 75 && $cust_zip != $row['zip']){
	$RSPCODE['AVS'] = "A";
}

if( $percent < 75  && $cust_zip != $row['zip'] ){
	$RSPCODE['AVS'] = "N";
}
if( $cust_zip == $row['zip'] && $percent < 75 ){
	$RSPCODE['AVS'] = "Z";
}
if( $percent >= 75  && $cust_zip == $row['zip'] ){
	$RSPCODE['AVS'] = "X";
}

if( $cust_cvv == $row['cvv'] ){
	$RSPCODE['CVV'] = "M";
}else{
	$RSPCODE['CVV'] = "N";
}

if( $RSPCODE['AVS'] == "X" && $RSPCODE['CVV'] == "M" ){
	$retval = array("AVS" => 987654);
	echo json_encode($retval);
}else{
	echo json_encode($RSPCODE);
}

} else {
	echo "Card Not Found";
}
?>