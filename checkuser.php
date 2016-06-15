<?php require ("scripts/DBcontrol.php"); ?>
<?php 
session_start();
$uname = $_POST['username'];

$uname = mysqli_real_escape_string($conn, $uname);

$check = "SELECT username FROM users where username='$uname'";
$run = mysqli_query($conn, $check);
/*
if($uname==NULL){
echo "Choose a username";
}else if(strlen($uname)<6){
echo "Username cannot be less than 6 characters";
} */

if(empty($uname)){
echo "Choose a username";
}elseif (mysqli_num_rows($run)==0){
echo '<font color="green">Available !! </font>';
}elseif(mysqli_num_rows($run)>0){
echo '<font color="red"> Username already exists, choose other</font>';
}

?>