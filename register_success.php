<?php
session_start();
?>
<html>

<head>
  <title>PlanetTrees</title>
  
  <meta name="description" content="CIS5690 - Advances systems Project" />
  <meta name="keywords" content="cis5690,palnts,donate,trees,ucmo,cis" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>

  <div id="main">
   <?php include "header.php" ;?>
	<div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
	   <?php include "sidebar.php" ;?>
      <div id="content">
        <!-- insert the page content here -->
        <h1>You are Successfully Registered. <a href="login.php"> Click here</a> to Login</h1>
         
      </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
