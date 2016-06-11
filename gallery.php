<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>PlanetTrees - Gallery</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <style>
  div.img {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.img:hover {
    border: 1px solid #777;
background-color: pink;

}

div.img img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}</style>
  
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
        
        <div class="img">
  <a target="_blank" href="style/image-gal/img1.jpg">
    <img src="style/image-gal/img1.jpg" alt="Trolltunga Norway" width="300" height="200">
  </a>
  <div class="desc">@Event at Warrensburgs Campus</div>
</div>

<div class="img">
  <a target="_blank" href="style/image-gal/img2.jpg">
    <img src="style/image-gal/img2.jpg" alt="Forest" width="600" height="400">
  </a>
  <div class="desc">@Event at Warrensburgs Campus</div>
</div>
<div class="img">
  <a target="_blank" href="style/image-gal/img3.jpg">
    <img src="style/image-gal/img3.jpg" alt="@ Warrensburg Campus" width="600" height="400">
  </a>
  <div class="desc">@Event at Warrensburgs Campus</div>
</div>
<div class="img">
  <a target="_blank" href="style/image-gal/img6.jpg">
    <img src="style/image-gal/img6.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">@Event at Lee's Summit Campus</div>
</div>
<div class="img">
  <a target="_blank" href="style/image-gal/img7.jpg">
    <img src="style/image-gal/img7.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">@Event at Warrensburgs Campus</div>
</div>

<div class="img">
  <a target="_blank" href="style/image-gal/img8.jpg">
    <img src="style/image-gal/img8.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">@Event at Warrensburgs Campus</div>
</div>
<div class="img">
  <a target="_blank" href="style/image-gal/img9.jpg">
    <img src="style/image-gal/img9.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">@Event at Lee's Summit Campus</div>
</div>
<div class="img">
  <a target="_blank" href="style/image-gal/img10.jpg">
    <img src="style/image-gal/img10.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">@Event at Lee's Summit Campus</div>
</div>
<div class="img">
  <a target="_blank" href="style/image-gal/img11.jpg">
    <img src="style/image-gal/img11.jpg" alt="Northern Lights" width="600" height="400">
  </a>
  <div class="desc">@Event at Lee's Summit Campus</div>
</div>
<div class="img">
  <a target="_blank" href="style/image-gal/img5.jpg">
    <img src="style/image-gal/img5.jpg" alt="Mountains" width="600" height="400">
  </a>
  <div class="desc">@Event at Lee's Summit Campus</div>
</div>

      </div>
    </div>
    <div id="content_footer"></div>
  <?php include "footer.php" ;?>
  </div>
</body>
</html>
