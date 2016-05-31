<!DOCTYPE HTML>
<html>

<head>
  <title>login page</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
    <script type="text/javascript" src="scripts/login.js"></script>
</head>

<body>
  <div id="main">
    <?php require 'header.php' ;?>
    <div id="content_header"></div>
    <div id="site_content">
     <?php include "sidebar.php" ;?>
      <div id="content">
<br>
       <fieldset>
        <h1>Login</h1>
        <p>Please enter your username and password</p>       
       <form class="anil-form  anil-form-aligned">
              

               <div class="pure-control-group">
            <label for="username"><strong>Username* : </strong></label>
            <input id="username" type="text" placeholder="Username">
        </div> <br>
                <div class="pure-control-group">
            <label for="password"><strong>Password* : </strong></label>
            <input id="password" type="text" placeholder="Password">
        </div>
      <br>
        <div class="pure-controls">
        	<button type="reset" class="anil-button anil-button-primary">Reset</button>
            <button type="submit" class="anil-button anil-button-primary">Submit</button>
            
        </div><br>
    </fieldset>
   
   </form> 
        <p><br /><br />NOTE: A contact form such as this would require some way of emailing the input to an email address.</p>
     
      </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
