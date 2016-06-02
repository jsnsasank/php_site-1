<!DOCTYPE HTML>
<html>

<head>
  <title>PlanetTrees - Gallery</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <script type="text/javascript" src="scripts/donatation.js"> </script>
</head>

<body>
  <div id="main">
   <?php include "header.php" ;?>
    <div id="content_header"></div>
    <div id="site_content">
        <?php include "sidebar.php" ;?>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Make A Contribution</h1>
		<h5 id="Addr_result"></h5>
		 <h4>Please Enter your name and Billing Address</h4>
        <form method="POST" action="processPayment.php" class="anil-form  anil-form-aligned" onsubmit = "return validate(this)">
       <fieldset>
        <div class="pure-control-group">
            <label for="name">Contributor Name : </label>
            <input id="cust_name" name="name" type="text" placeholder="Name" required>
        </div>

        <div class="pure-control-group">
            <label for="Address">Address Line1 : </label>
            <input id="addrline1" name="addr1" type="text" placeholder="Street" required>
        </div>
		
		<div class="pure-control-group">
            <label for="Address">Address Line2 : </label>
            <input id="addrlin2" name="addr2" type="text" placeholder="Apt num">
        </div>
		
		<div class="pure-control-group">
            <label for="City">City : </label>
            <input id="city" name="city" type="text" placeholder="City" required>
        </div>
		
		<div class="pure-control-group">
            <label for="state">State : </label>
            <input id="state" name="state" type="text" placeholder="State" required>
        </div>
		<div class="pure-control-group">
            <label for="zip">ZIP code : </label>
            <input id="zip" name="zip" type="number" placeholder="ZIP code" required>
        </div>
		
		<div class="pure-control-group">
            <label for="country">Country : </label>
            <input id="country" name="country" type="text" placeholder="Country" required>
        </div>

        <div class="pure-control-group">
            <label for="email">Email Address :</label>
            <input id="email" name="email" type="email" placeholder="Email Address" required>
        </div>
                   
         <h3>Contributions will be by species and quantity of tree:</h3>
		 <h5 id="plant_result"></h5>
		 <h4>Please select the plant type with quantity</h4>
		 <div class="pure-control-group">
		   <label for="cbRM">Red Maple ($50) : </label>
			 <input id="cbRM" name="cbRM" type="number" min="1"> 
		  </div>
		  <div class="pure-control-group">
		   <label for="cbSM">Sugar Maple ($65) : </label>
			 <input id="cbSM" name="cbSM" type="number" min="1"> 
		  </div>
		  <div class="pure-control-group">
		   <label for="cbRB">River Birch ($25) : </label>
			 <input id="cbRB" name="cbRB" type="number" min="1"> 
		  </div>
		  <div class="pure-control-group">
		   <label for="cbCT">Catalpa ($35) : </label>
			 <input id="cbCT" name="cbCT" type="number" min="1"> 
		  </div>
		 
	  <button id="payment" name="submit" type="submit" class="anil-button anil-button-primary">Proceed to Payment</button>
	  </fieldset>
	  </form>
	  </div>
    </div>
    <div id="content_footer"></div>
  <?php include "footer.php" ;?>
  </div>
</body>
</html>