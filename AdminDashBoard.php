<?php
session_start();
if(!isset($_SESSION['username'])){
	echo "<h1>Sorry You dont have access to this page..</h1>";
	die('Unauthorized access');
} elseif( isset($_SESSION['UserRole']) && $_SESSION['UserRole'] != "Admin" ){
	echo "<h1>Sorry You dont have access to this page..</h1>";
	die('Unauthorized access');
} else {
	$usr = $_SESSION['username'];
	$uid = $_SESSION['id'];
	$defaultval = "Not Available";
	$c_name = (empty($_SESSION['FullName'])) ? $defaultval : $_SESSION['FullName'];
	$c_email = (empty($_SESSION['Email'])) ? $defaultval : $_SESSION['Email'];
	$c_phone = (empty($_SESSION['Phone'])) ? $defaultval : $_SESSION['Phone'];
	$c_address = (empty($_SESSION['Address'])) ? $defaultval : $_SESSION['Address'];
	$c_role = (empty($_SESSION['UserRole'])) ? $defaultval : $_SESSION['UserRole'];

}
?>
<html>

<head>
  <title>Welcome <?php echo " - $usr" ?></title>
      <link rel="stylesheet" type="text/css" href="style/style.css" />
      <script type="text/javascript" src="scripts/jquery.min.js"> </script>  
      <script> <?php 
  		echo "var uid = " . $uid . ";\n";
  		?></script>
      <script type="text/javascript" src="scripts/AdminPage.js"></script>
</head>

<body>

  <div id="main">
   <?php include "header.php" ;?>
   
	<div id="content_header">
		 </div>
        <div id="site_content">
                 
        <!-- insert the page content here -->
        <!-- <div id='w'> -->
        <h1><?php echo "$usr" ?> - Profile </h1>
       <div id="profiletabs">
     <?php include 'tabs.php';?>
     </div>
<div id='w'>
      <h3>Please review the pending and unscheduled requests.</h3>
      <p>Select the type of requests form the drop down.</p>
     <label>Type</label>
    <select id="req" class="middle"> 
    <option value="" disabled selected>ALL</option>
    <option value="" >pending</option>
    <option value="" >unscheduled</option>
    </select>
       <div id="req_result">
       </div>
     <input id="freetrees" type="button" value="See Availalbe Trees" class="anil-button anil-button-primary" />
      <div id="freetree_result">
       </div>
       
 </div>
        <!-- End of the page content -->
         
    </div>
      
    <div id="content_footer">
    <?php include "footer.php" ;?>
    </div>
    
   </div>
</body>
</html>