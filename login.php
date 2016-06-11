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
 	
 	$sql = "SELECT * FROM users WHERE UserName='$username' LIMIT 1";
 	$result = mysqli_query($conn, $sql);
 	$row = mysqli_fetch_array($result);
 	$id = $row['UserID'];
 	$db_password = $row['Password'];
 	if($password == $db_password){
 		$_SESSION['username'] = $username;
 		$_SESSION['id'] = $id;
 		header("Location: UserDashBoard.php");
 		
 	}else {
 		$msg = "Invalid username and password";
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
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="login" name="login_page" class="anil-form  anil-form-aligned" onsubmit="return login_validate(this)">
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
        	<button type="reset" class="anil-button anil-button-primary">Reset</button>

           <button type="submit" name="login" class="anil-button anil-button-primary">Submit</button>
        </div><br>

    </fieldset>
     </form> 
        <p><br /><br />Not Registred yet ? Please register here.</p>
     
      </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
