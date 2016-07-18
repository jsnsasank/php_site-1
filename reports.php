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
    <h1>Planet Tree System - Reports</h1>
<?php require 'scripts/DBcontrol.php';
    $funds_query  = "select sum(Amount) as TOTAL  from donations";
    $funds_reuslt = mysqli_query($conn, $funds_query);
    
    while($row = mysqli_fetch_array( $funds_reuslt )) {
      echo '<h3> Current Available Funds : $'.$row['TOTAL'] . '</h3>';
    }
    echo '<h2> Planted Tree Reports with Event Details </h2>';
    
    $tree_query  = "select ae.Identifier,t.Treename, ae.Eventid,ae.status,ce.EventName,ce.EventDate,ce.EventTime,ce.Location,ce.Description from alloted_trees_for_events ae, treeids t, completed_events ce where ae.Identifier=t.Identifier and ce.EventID=ae.Eventid;";
    $tree_result = mysqli_query($conn, $tree_query);
    echo "<table border='1' cellpadding='10'>";
    
    echo '<tr> <th>Tree Id</th> <th>Tree Name</th> <th>Event Name</th> <th>EventDate</th> <th>Location</th><th>Description</th><th>Status</th></tr>';
			
    while ($trow = mysqli_fetch_array($tree_result)){
      echo "<tr>";
      
      echo '<td>' . $trow['Identifier'] . '</td>';
      echo '<td>' . $trow['Treename'] . '</td>';
      echo '<td>' . $trow['EventName'] . '</td>';
      echo '<td>' . $trow['EventDate'] . '</td>';
      echo '<td>' . $trow['Location'] . '</td>';
      echo '<td>' . $trow['Description'] . '</td>';
      echo '<td>' . $trow['status'] . '</td>';
      
      echo  "</tr>";
    	
    }
    
    echo "</table>";
    
    echo '<h2> Contributor and Donations Report </h2>';
    $donations_query  = "select Name,TransactionDate,Amount from donations;";
    $donations_result = mysqli_query($conn, $donations_query);
    
    echo "<table border='1' cellpadding='10'>";
    echo '<tr> <th>Contributor Name</th> <th>TransactionDate</th> <th>Amount</th></tr>';
    
    while ($drow = mysqli_fetch_array($donations_result)){
      echo "<tr>";
      echo '<td>' . $drow['Name'] . '</td>';
      echo '<td>' . $drow['TransactionDate'] . '</td>';
      echo '<td>' . $drow['Amount'] . '</td>';
      echo "</tr>";
    }
    
    echo "</table>";
    
    
?>
    
    
    
      
      
       
       </div>
        <!-- End of the page content -->
         
    </div>
      
    <div id="content_footer">
    <?php include "footer.php" ;?>
    </div>
    
   </div>
</body>
</html>