
<?php 
session_start(); 
?>

<?php
require ("scripts/DBcontrol.php");
if(isset($_POST['register'])){

$uname = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);

$uname = stripslashes($uname);
$password = stripslashes($password);

$uname = mysqli_real_escape_string($conn, $uname);
$password = mysqli_real_escape_string($conn, $password);
$password = md5($password);

$check_uname = "SELECT username FROM users where username='$uname'";
$run = mysqli_query($conn, $check_uname);
if(mysqli_num_rows($run)>0){
$msg =  "Username : ". $uname ." - already exists, Please choose other";
}
else {
$query =  "INSERT INTO users (username, password) VALUES('$uname','$password')";
if(mysqli_query($conn, $query)){
$msg = "You are successfully registered..!!";
}
}
mysqli_close($conn);
}

?>
<!DOCTYPE HTML>
<html>

<head>
  <title>PlanetTrees - Register</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <script type="text/javascript" src="scripts/jquery.min.js"></script>
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
        <h1>Join Planet Trees</h1>
        <p>By Joining the Planet Tree Organization, you can participate in various events like planting trees, environmental awareness programs, nature protection and so on. </p>
         <?php
  if(isset($_SESSION['username'])){
  	echo "<span style=color:blue>".$_SESSION['username']." - Currenltly logged in. Please log off to access registration</span>";
  	echo "
		<script>
		$(document).ready(function(){
			$('#regbtn').attr('disabled','disabled');
			$('#username').attr('disabled','disabled');
			$('#password').attr('disabled','disabled');
			$('#confpassword').attr('disabled','disabled');
		});
		</script>
		" ;
  }
  ?>
   
<h5 id="register_valid"> </h5><br>

	<form name="register_form" class="pasha-form  pasha-form-aligned" onsubmit="return register_validate(this)" method="post" action="">
       <fieldset>
               <div class="pure-control-group">
            <label for="username">Username* : </label>
            <input id="username" name="username" type="text" placeholder="Username" required>&nbsp;&nbsp;<span id="checkuname"> </span>
        </div>
                <div class="pure-control-group">
            <label for="password">Password* : </label>
            <input id="password" name="password" type="password" placeholder="Password" required>
        </div>
        
           <div class="pure-control-group">
            <label for="password">Confirm Password* : </label>
            <input id="confpassword" name="confpassword" type="password" placeholder="Confirm Password" required>
        </div>
        
          <div class="pure-controls">
       
			<button type="reset" class="pasha-button pasha-button-primary">Reset</button>
            <button id="regbtn" type="submit" name="register" class="pasha-button pasha-button-primary">Register</button>
            
        </div>
   <br> <div class="pure-control-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Already member?<a href="login.php"><strong> Login here</strong></a></div>
    </fieldset>
    <?php if(!empty($msg)){
    	echo "<span style='color:red'>" . $msg . "</span>";
    }
    	?>
   </form>
   		</div>
       </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
