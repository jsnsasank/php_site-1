<?php 
session_start();
unset($_SESSION['username']);
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <title>user logout</title>
</head>
<body>
<h1>Your successfully logged out. Redirecting to login page</h1>
<meta http-equiv="refresh" content="1;url=login.php">
</body>
</html>