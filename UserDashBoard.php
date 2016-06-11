<?php
session_start();
if(!isset($_SESSION['username'])){
	echo "<h1>Sorry You dont have access to this page..</h1>";
	die('Unauthorized access');
	
} else {
	$usr = $_SESSION['username'];
	$uid = $_SESSION['id'];
}
?>
<html>

<head>
  <title>Welcome <?php echo " - $usr" ?></title>
      <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>

  <div id="main">
   <?php include "header.php" ;?>
	<div id="content_header">
	 <ul>
        <li><a href='#'>Edit Profile</a></li>
        <li><a href='#'>Events</a></li>
        <li><a href='#'>DashBoard</a></li>
        </ul>
        </div>
        <div id="site_content">
        
        <div id="content">
        <!-- insert the page content here -->
       <h1>Welcome</h1>
       
        
        <!-- End of the page content -->
    
      </div>
      
    </div>
      
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
