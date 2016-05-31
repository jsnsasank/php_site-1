<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
 session_start();
 require ("scripts/DBcontrol.php");
  
$sql = "select * from donations";
$result = mysqli_query($conn, $sql);

$name = test_input($_POST["name"]);
$addr1 = test_input($_POST["addr1"]);

if(!empty($_POST["addr2"])){
  $addr2 = test_input($_POST["addr2"]);
}
$city = test_input($_POST["city"]);
$state = test_input($_POST["state"]);
$country = test_input($_POST["country"]);
$email = test_input($_POST["email"]);
$zip = test_input($_POST["zip"]);
define('RM_PRICE', 50);
define('SM_PRICE', 65);
define('RB_PRICE', 25);
define('CT_PRICE', 35);
$_SESSION["username"] = $name;
$rm_plants = $sm_plants = $rb_plants = $ct_plants = 0;
if($_POST["cbRM"] > 0 ){
  $rm_plants = $_POST["cbRM"];
}
if($_POST["cbSM"] > 0 ){
  $sm_plants = $_POST["cbRM"];
}
if($_POST["cbRB"] > 0 ){
  $rb_plants = $_POST["cbRM"];
}
if($_POST["cbCT"] > 0 ){
  $ct_plants = $_POST["cbRM"];
}

$amount = (($rm_plants * RM_PRICE) + ($sm_plants * SM_PRICE) + ($rb_plants * RB_PRICE));
	
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<html>

<head>
  <title>Planet Trees</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <?php include "header.php" ;?>
    <div id="content_header"></div>
    <div id="site_content">
      <?php include "sidebar.php" ;?>
      <div id="content">
	
	  <?php echo "<h2>" . $name . " - Contribution</h2>"; 
	  echo "<table style='width:100%; border-spacing:0;'>";
	  echo "<tr><th>Contributed Plant</th><th>Price</th><th>No.f Trees</th></tr>";
	  if($rm_plants > 0){ 
	   echo "<tr><td>Red Maple</td><td>$".RM_PRICE."</td> <td>". $rm_plants."</tr>";
	  }
	   if($sm_plants > 0){ 
	   echo "<tr><td>Sugar Maple</td><td>$".SM_PRICE."</td> <td>". $sm_plants."</tr>";
	  }
	   if($rb_plants > 0){ 
	   echo "<tr><td>River Birch</td><td>$".RB_PRICE."</td> <td>". $rb_plants."</tr>";
	  }
	   if($ct_plants > 0){
	   echo "<tr><td>Catalpa</td><td>$".CT_PRICE."</td> <td>". $ct_plants."</tr>";
	  }
	  
	  echo "<tr><th>Total Amount : </th><th>$". $amount."</th></tr>";
	 echo "</table>";
	  	    		
	?>
	<form method="POST" action="processPayment.php" class="anil-form  anil-form-stacked">
       <fieldset>
	    <legend>Enter credit card details</legend>
        <div class="pure-control-group">
            <label for="name">Contributor Name : </label>form
            <input id="name" name="name" type="text" placeholder="Name" required>
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
            <label for="country">Country : </label>
            <input id="country" name="country" type="text" placeholder="Country" required>
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