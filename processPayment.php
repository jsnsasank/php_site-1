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
  $sm_plants = $_POST["cbSM"];
}
if($_POST["cbRB"] > 0 ){
  $rb_plants = $_POST["cbRB"];
}
if($_POST["cbCT"] > 0 ){
  $ct_plants = $_POST["cbCT"];
}

$amount = (($rm_plants * RM_PRICE) + ($sm_plants * SM_PRICE) + ($rb_plants * RB_PRICE) + ($ct_plants * CT_PRICE));
	
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
  <script type="text/javascript" src="scripts/creditcard.js"> </script> 
</head>

<body>
  <div id="main">
    <?php include "header.php" ;?>
    <div id="content_header"></div>
    <div id="site_content">
      <?php include "sidebar.php" ;?>
      <div id="content">
	
	  <?php
	  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
	  echo "<h2>" . $name . " - Contribution</h2>"; 
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
	 <h2>Payment Details</h2>
	<h4> Billing Address :</h4>
    <?php echo $name ."<br>" . $addr1 . "<br>". $city.", " . $zip. "<br>". $state.", ".$country. "<br>" ?>
    <br />
    <h5 id="ccerror"> </h5>
	<form action="#" onsubmit = "return checkCreditCard()">
	<p>
      <input id="ccname" type="text" class="checkout-input checkout-name" placeholder="Your name" autofocus>
      <select id="ccmm" name="month" class="checkout-input checkout-exp"> 
      <option value="" disabled selected>MM</option>
     <?php
     for ($i = 1; $i <= 12; ++$i) {
     printf('<option value="%02s">%02s</option>',$i,$i);
  	 }
     ?>
     </select>
      <select id="ccyy" name="year" class="checkout-input checkout-exp">
      <option value="" disabled selected>YY</option>
      <?php
     for ($i = 17; $i <= 30; ++$i) {
     printf('<option value="%02s">%02s</option>',$i,$i);
  	 }
     ?>
     </select>
    </p><br />
	<p>
      <input id="ccnnum" type="text" class="checkout-input checkout-card" placeholder="4111 1111 1111 1111">
      <input id="cc_cvc" type="text" class="checkout-input checkout-cvc" placeholder="CVC">
    </p>
    <br />
    
      <input id="ccpay" type="submit" value="Purchase" class="anil-button anil-button-primary">
    </form>
    
	  <?php }else{
	    echo "<h1>Please check our make donation page.</h1>";  	
	  } ?>
	</div>
    </div>
    <div id="content_footer"></div>
    
    <?php  include "footer.php" ;?>
  </div>
</body>
</html>