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
     <?php include "sidebar.php" ;?>
      <div id="content">
      <h5 id="login_valid"></h5>
<br>
  <form method="POST" id="login" name="login_page" class="anil-form  anil-form-aligned" onsubmit="return login_validate(this)">
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
