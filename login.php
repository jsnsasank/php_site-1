<!DOCTYPE HTML>
<html>

<head>
  <title>login page</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <?php require 'header.php' ;?>
    <div id="content_header"></div>
    <div id="site_content">
     <?php include "sidebar.php" ;?>
      <div id="content">
        <!-- insert the page content here -->
        <table>
        <h1>Login</h1>
        <p>Please enter your username and password</p>       
          <div class="form_settings">
        <tr>    <p><span>Username</span><input class="username" type="text" name="username" value="" /></p></tr>
         <tr>   <p><span>Password</span><input class="password" type="password" name="password" value="" /></p></tr>
        <tr>    <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="reset" name="login_reset" value="Reset" />
          <span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="Submit" /></p>
          </tr>
          </div>       
        <p><br /><br />NOTE: A contact form such as this would require some way of emailing the input to an email address.</p>
     </table>
      </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
