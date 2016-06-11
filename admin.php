<?php
session_start();
?>
<html>
<head>
  <title>login page</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
    <script type="text/javascript" src="scripts/login_validation.js"></script>
</head>

<body>
  <div id="main">
    <?php require 'header.php' ;?>
    <div id="content_header"></div>
    <div id="site_content">
     <?php include "sidebar.php" ;?>
      <div id="content">
      
      <h1>Admin</h1>
      <p>Admin Page</p>
        </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>