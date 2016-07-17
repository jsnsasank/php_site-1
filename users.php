<?php
session_start();
if(!isset($_SESSION['username'])){
	echo "<h1>Sorry You dont have access to this page..</h1>";
	die('Unauthorized access');
} elseif( isset($_SESSION['UserRole']) && $_SESSION['UserRole'] != "Admin" ){
	echo "<h1>Sorry You dont have access to this page..</h1>";
	die('Unauthorized access');
} else {
	$usr = $_SESSION['username'];
	$uid = $_SESSION['id'];
	$defaultval = "Not Available";
	$c_name = (empty($_SESSION['FullName'])) ? $defaultval : $_SESSION['FullName'];
	$c_email = (empty($_SESSION['Email'])) ? $defaultval : $_SESSION['Email'];
	$c_phone = (empty($_SESSION['Phone'])) ? $defaultval : $_SESSION['Phone'];
	$c_address = (empty($_SESSION['Address'])) ? $defaultval : $_SESSION['Address'];
	$c_role = (empty($_SESSION['UserRole'])) ? $defaultval : $_SESSION['UserRole'];

}

?>
<html>

<head>
  <title>Welcome <?php echo " - $usr" ?></title>
      <link rel="stylesheet" type="text/css" href="style/style.css" />
      <script type="text/javascript" src="scripts/jquery.min.js"> </script>  
      <script> <?php 
  		echo "var uid = " . $uid . ";\n";
  		?></script>
      <script type="text/javascript" src="scripts/AdminPage.js"></script>
      <script type="text/javascript" src="scripts/AdminPageUsers.js"></script>
</head>

<body>

  <div id="main">
   <?php include "header.php" ;?>
   
	<div id="content_header">
		 </div>
        <div id="site_content">
                 
        <!-- insert the page content here -->
        <!-- <div id='w'> -->
        <h1><?php echo "$usr" ?> - Profile </h1>
       <div id="profiletabs">
     <?php include 'tabs.php';?>
     </div>
     <div id='w'>
     <h3> User Administration</h3> 
     <h5>Plesse review and delete user accounts if needed</h5>
     <span id="dbresult" style="color:red"></span>
 
<?php 

require 'scripts/DBcontrol.php';
$user_query = "SELECT * FROM users" ;
$user_result = mysqli_query($conn, $user_query);
?>
<table border='1' cellpadding='10'>

<tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Role</th> <th>Options</th></tr>

<?php while($row = mysqli_fetch_array( $user_result )) { 
	echo "<tr>";
	
	echo '<td>' . $row['UserID'] . '</td>';
	
	echo '<td>' . $row['UserName'] . '</td>';
	
	echo '<td>' . $row['Email'] . '</td>';
	
	echo '<td>' . $row['UserRole'] . '</td>';
?>
	 <td><a href="<?php echo $row['UserID']; ?>" class="ulink" onclick="return confirm('Are You sure?')">Delete</a></td>
	</tr>
<?php }?>
</table>


       
       </div>
        <!-- End of the page content -->
         
    </div>
      
    <div id="content_footer">
    <?php include "footer.php" ;?>
    </div>
    
   </div>
</body>
</html>