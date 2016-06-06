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
$cart = array();
$rm_plants = $sm_plants = $rb_plants = $ct_plants = 0;
if($_POST["cbRM"] > 0 ){
  $rm_plants = $_POST["cbRM"];
  $cart['rm_plants'] = $_POST["cbRM"]; 
}
if($_POST["cbSM"] > 0 ){
  $sm_plants = $_POST["cbSM"];
  $cart['sm_plants'] = $_POST["cbSM"]; 
}
if($_POST["cbRB"] > 0 ){
  $rb_plants = $_POST["cbRB"];
  $cart['rb_plants'] = $_POST["cbRB"];
}
if($_POST["cbCT"] > 0 ){
  $ct_plants = $_POST["cbCT"];
  $cart['ct_plants'] = $_POST["cbCT"];
}

$amount = (($rm_plants * RM_PRICE) + ($sm_plants * SM_PRICE) + ($rb_plants * RB_PRICE) + ($ct_plants * CT_PRICE));

$cart['total'] = $amount;
$js_array = json_encode($cart);
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
  <script>
  <?php 
  echo "var js_cart = " . $js_array . ";\n";
  ?>
   </script>
  <script type="text/javascript" src="scripts/creditcard.js"> </script>
  <script type="text/javascript" src="scripts/jquery.min.js"> </script>  
</head>

<body>
  <div id="main">
    <?php include "header.php" ;?>
    <div id="content_header"></div>
    <div id="site_content">
      <?php include "sidebar.php" ;?>
      <div id="content">

	  <?php
	  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	  echo "<h2>" . $name . " - Contribution</h2>"; 
	  echo "<table style='width:100%; border-spacing:0;'>";
	  echo "<tr><th>Contributed Plant</th><th>Price</th><th>No.f Trees</th></tr>";
	  if($rm_plants > 0){ 
	   echo "<tr><td>Red Maple</td><td>$".RM_PRICE."</td> <td id='rm_plnt_count'>". $rm_plants . "</td></tr>";
	  }
	   if($sm_plants > 0){ 
	   echo "<tr><td>Sugar Maple</td><td>$".SM_PRICE."</td> <td id='sm_plnt_count'>". $sm_plants . "</td></tr>";
	  }
	   if($rb_plants > 0){ 
	   echo "<tr><td>River Birch</td><td>$".RB_PRICE."</td> <td id='rb_plnt_count'>". $rb_plants . "</td></tr>";
	  }
	   if($ct_plants > 0){
	   echo "<tr><td>Catalpa</td><td>$".CT_PRICE."</td> <td id='ct_plnt_count'>". $ct_plants . "</tr>";
	  }
	  
	  echo "<tr><th>Total Amount : </th><th>$". $amount."</th></tr>";
	 echo "</table>";
	 	  	    		
	?>
	 <h2>Payment Details</h2>
	<h4> Billing Address :</h4>
	<div id="bill_name"><?php echo $name ; ?> </div> 
	<div id="bill_addr"><?php echo $addr1 ;?> </div>
	<?php echo $city.", ".$state."<br>". $country ;?>
	<div id="bill_zip"><?php echo $zip ;?> </div>
    
    <br />
    <h5 id="ccerror"> </h5>
    <!-- 
	<form onsubmit = "return checkCreditCard(this)">
	 -->
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
     for ($i = 17; $i <= 23; ++$i) {
     printf('<option value="%02s">%02s</option>',$i,$i);
  	 }
     ?>
     </select>
    </p><br />
	<p>
      <input id="ccnnum" type="text" class="checkout-input checkout-card" placeholder="4111 1111 1111 1111">
      <input id="cc_cvc" type="text" class="checkout-input checkout-cvc" placeholder="CVC">
    </p>
    <br><br>
    <p>
	<span>*By clicking this button your card will be charged</span><br> 
      <input id="ccpay" type="button" value="Complete Donation" class="anil-button anil-button-primary">
      </p>
    <!--  </form> -->
    <p class="showprogress" id="paymentinprogress">
     </p>
           
	  <?php }else{
	    echo "<h1>Please check our make donation page.</h1>";  	
	  } ?>
	   <p class="showprogress" id="confirmationpage">
     </p> 
	   <div id="treeids">
     
     </div>
	
	</div>
    </div>
    <div id="content_footer"></div>
    
    <?php  include "footer.php" ;?>
  </div>
</body>
</html>