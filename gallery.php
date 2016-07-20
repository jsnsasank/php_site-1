<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>PlanetTrees - Gallery</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <script type="text/javascript" src="scripts/jquery.min.js"> </script>  
  <style>
.imgclass {
    display: inline-block;
    width: 300px;
    height: 300px;
}
</style>
  
</head>

<body>
  <div id="main">
   <?php include "header.php" ;?>
    <div id="content_header"></div>
    <div id="site_content">
        <?php include "sidebar.php" ;?>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Image Gallery</h1>
        <p> Below images are taken at various planting events </p>
 <!-- Gallery  start -->
 <div class="gal">

 <img width="200" height="200" class="imgclass" src="style/image-gal/img2.jpg" alt="" />
 <img width="200" height="200" class="imgclass" src="style/image-gal/img3.jpg" alt="" />
 <img width="200" height="200" class="imgclass" src="style/image-gal/img6.jpg" alt="" />
 <img width="200" height="200" class="imgclass" src="style/image-gal/img7.jpg" alt="" />
 <img width="200" height="200" class="imgclass" src="style/image-gal/img8.jpg" alt="" />
 <img width="200" height="200" class="imgclass" src="style/image-gal/img9.jpg" alt="" />
 <img width="200" height="200" class="imgclass" src="style/image-gal/img10.jpg" alt="" />
 <img width="200" height="200" class="imgclass" src="style/image-gal/img1.jpg" alt="" />
 <img width="200" height="200" class="imgclass" src="style/image-gal/img11.jpg" alt="" />
 <img width="200" height="200" class="imgclass" src="style/image-gal/img13.jpg" alt="" />
 <img width="200" height="200" class="imgclass" src="style/image-gal/img14.jpg" alt="" />
   
</div>
  
  
  <!-- Gallery end -->

      </div>
    </div>
    <div id="content_footer"></div>
  <?php include "footer.php" ;?>
  </div>
</body>
</html>
