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
		 </div>
        <div id="site_content">
                 
        <!-- insert the page content here -->
        <div id='w'>
       <div id="userphoto"><img src="images/avatar.png" alt="default avatar"></div>
        <h1>Welcome <?php echo " - $usr" ?></h1>
       <div id="profiletabs">
       <ul id="profiletabsul" class="clearfix">
        <li><a href='updateprofile.php'>Edit Profile</a></li>
        <li><a href='#bio'>Events</a></li>
        <li><a href='#'>DashBoard</a></li>
       </ul>
     </div>
     
       <section id="bio">
        <p>Various content snippets courtesy .</p>
        
        <p>Can't a guy call his mother pretty without it seeming strange? Amen. I think that's one of Mom's little fibs, you know, like I'll sacrifice anything for my children.</p>
        
        <p>She's always got to wedge herself in the middle of us so that she can control everything. Yeah. Mom's awesome. I run a pretty tight ship around here. With a pool table.</p>
      </section>
      <section id="settings" class="hidden">
        <p>Edit your user settings:</p>
        
        <p class="setting"><span>E-mail Address <img src="images/edit.png" alt="*Edit*"></span> lolno@gmail.com</p>
        
        <p class="setting"><span>Language <img src="images/edit.png" alt="*Edit*"></span> English(US)</p>
        
        <p class="setting"><span>Profile Status <img src="images/edit.png" alt="*Edit*"></span> Public</p>
        
        <p class="setting"><span>Update Frequency <img src="images/edit.png" alt="*Edit*"></span> Weekly</p>
        
        <p class="setting"><span>Connected Accounts <img src="images/edit.png" alt="*Edit*"></span> None</p>
      </section>
       
        </div>
        <!-- End of the page content -->
         
    </div>
      
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
   </div>
</body>
</html>
