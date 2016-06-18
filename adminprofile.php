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
       <section id="editprofile">
        <h2>Edit your user settings:</h2>
                       
        <div class="gear">
			<label>Primary E-Mail:</label>
			<span id="Email" class="datainfo"><?php echo $c_email;?></span>
			<a href="#" class="editlink">Edit Info</a>
			<a class="savebtn">Save</a>
		</div>
		<div class="gear">
		  <label>Full Name:</label>
		  <span id="FullName" class="datainfo"><?php echo $c_name;?></span>
		  <a href="#" class="editlink">Edit Info</a>
		  <a class="savebtn">Save</a>
		</div>
		<div class="gear">
		  <label>Phone:</label>
		  <span id="Phone" class="datainfo"><?php echo $c_phone;?></span>
		  <a href="#" class="editlink">Edit Info</a>
		  <a class="savebtn">Save</a>
		</div>
				
		<div class="gear">
		  <label>Address:</label>
		  <span id="Address" class="datainfo"><?php echo $c_address;?></span>
		  <a href="#" class="editlink">Edit Info</a>
		  <a class="savebtn">Save</a>
		</div>
		<br>
		<div class='para1'> 
		<p id='updatestatus'></p>
		<p>Please review and update your personal details.</p>
		<p>If you would like to change your password, You can change <a>here</a></p>
		<p>Make sure that your email address is in the correct format.</p>
		<p>To update the profile picture. Please click on the image.</p>
		</div>
      </section>
      
      
       
       </div>
        <!-- End of the page content -->
         
    </div>
      
    <div id="content_footer">
    <?php include "footer.php" ;?>
    </div>
    
   </div>
</body>
</html>