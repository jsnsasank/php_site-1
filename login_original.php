<?php 
session_start();
if(isset($_SESSION['id'])){
	header("Location: UserDashBoard.php");
}
 if(isset($_POST['login'])){
 	require ("scripts/DBcontrol.php");
 	$username = strip_tags($_POST['username']);
 	$password = strip_tags($_POST['password']);
 	
 	$username = stripslashes($username);
 	$password = stripslashes($password);
 	
 	$username = mysqli_real_escape_string($conn, $username);
 	$password = mysqli_real_escape_string($conn, $password);
 	$password  = md5($password);
 	
 	$result = 0;
 	$sql = "SELECT * FROM users WHERE UserName='$username' LIMIT 1";
 	$result = mysqli_query($conn, $sql);
 	if($result === FALSE) {
 		$msg = "Database error. Pls contact administrator";
 	}else {
 	$num_rows = mysqli_num_rows($result);
 	if( $num_rows != 0 ){
 	$row = mysqli_fetch_array($result);
 	$id = $row['UserID'];
 	$db_password = $row['Password'];
 	if($password == $db_password){
 		$_SESSION['username'] 	= $username;
 		$_SESSION['id'] 		= $id;
 		$_SESSION['FullName'] 	= $row['FullName'];
 		$_SESSION['Email'] 		= $row['Email'];
 		$_SESSION['Phone'] 		= $row['Phone'];
 		$_SESSION['Address'] 	= $row['Address'];
 		$_SESSION['UserRole'] 	= $row['UserRole'];
 		header("Location: UserDashBoard.php");
 		
 	}else {
 		$msg = "Invalid username and password";
 	}
 	
 }else {
 	$msg = "User Not found";
 	
 }
 }
 }

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
     <?php include "sidebar.php" ;
     ?>
     <div id="content">
      
<br>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="login" name="login_page" class="pasha-form  pasha-form-aligned" onsubmit="return login_validate(this)">
       <fieldset>
        <h1>Login</h1>
        <p>Please enter your username and password</p>       
       <div class="pure-control-group">
            <label for="username"><strong>Username* : </strong></label>
          <span id="uerror">  <input id="username" name="username" type="text" placeholder="Username"> </span>
            <span id="erruserid" class="loginerror"> Please enter the username</span>
        </div> <br>
                <div class="pure-control-group">
            <label for="password"><strong>Password* : </strong></label>
            <input id="password" name="password" type="password" placeholder="Password">
            <span id="errpass" class="loginerror"> Please enter the password</span>
        </div>
      <br>
        <div class="pure-controls">
        	<button type="reset" class="pasha-button pasha-button-primary">Reset</button>

           <button type="submit" name="login" class="pasha-button pasha-button-primary">Submit</button>
        </div><br>

    </fieldset>
    <?php 
    if(!empty($msg)){
    echo "<span style='color:red'> $msg </span>" ; 
	}
	?>
     </form> 
        <p><br /><br />Not Registred yet ? Please <a href="register.php"> register here.</a></p>
     
      </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
