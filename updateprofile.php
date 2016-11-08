<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>PlanetTrees - Update</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
 <script type="text/javascript" src="scripts/register_validation.js"></script>
</head>

<body>
  <div id="main">
    <?php include "header.php" ;?>
    <div id="content_header"></div>
    <div id="site_content">
      <?php include "sidebar.php" ;?>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Update Profile</h1>
        <p>Please fill in requried details to update</p>
   
<h5 id="register_valid"> </h5><br>

	<form class="pasha-form  pasha-form-aligned" onsubmit="return register_validate(this)">
       <fieldset>
              
        <div class="pure-control-group">
            <label for="name">Name : </label>
            <input id="name" type="text" placeholder="First Name" >
        </div>
         
         <div class="pure-control-group">
            <label for="phone">Phone : </label>
            <input id="phone" type="text" placeholder="Phone" >
        </div>

        <div class="pure-control-group">
            <label for="Address">Address Line : </label>
            <input id="addrlin1" type="text" placeholder="Street">
        </div>
		
		<div class="pure-control-group">
            <label for="City">City : </label>
            <input id="city" type="text" placeholder="City" >
        </div>
		
		<div class="pure-control-group">
            <label for="state">State : </label>
            <input id="state" type="text" placeholder="State" >
        </div>
		
		<div class="pure-control-group">
            <label for="country">Country :</label>
            <input id="country" type="text" placeholder="Country">
        </div>
        	<div class="pure-control-group">
            <label for="zip">Zip Code : </label>
            <input id="zip" type="text" placeholder="Zip Code" >
        </div>

        <div class="pure-control-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" placeholder="Email Address">
        </div>

      
        <div class="pure-controls">
            
			<button type="reset" class="pasha-button pasha-button-primary">Reset</button>
            <button type="submit" class="pasha-button pasha-button-primary">Update</button>
            
        </div>
    </fieldset>
   </form>
   		</div>
       </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
