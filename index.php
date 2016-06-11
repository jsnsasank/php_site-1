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
        <h1>Welcome to the Planet Tree System</h1>
        <p> is a non-profit organization which promotes the planting of trees throughout the region. Currently serving Missouri, the organization looks forward to nationwide expansion. PlanetTree
works with municipal governments, state agencies and, in some cases, private land owners to place
trees. All trees are funded through donations and are planted by volunteers</p>
       
        <h2>Learn About more PlantTree <a href="AboutPlanetTree.php">..more</a>.</h2>
         <h2>Browser Compatibility</h2>
        <p>This template has been tested in the following browsers:</p>
        <ul>
          <li>Internet Explorer 9</li>
          <li>FireFox 25</li>
          <li>Google Chrome 31</li>
        </ul>
      </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
