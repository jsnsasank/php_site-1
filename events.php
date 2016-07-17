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
     <h1>Create New Event </h1>
      <span style="color:red" id="eventerror"></span>
     <form method="POST" class="anil-form  anil-form-aligned" id="neweventform">
       <fieldset>
      
        <div class="pure-control-group">
            <label>Event Name : </label>
            <input id="Eventname" name="Eventname" type="text" placeholder="Name of the Event" required>
        </div>

        <div class="pure-control-group">
            <label>Event Date : </label>
            <input id="Eventdate" name="Eventdate" type="date" placeholder="yyyy-mm-dd" required>
        </div>
		
		<div class="pure-control-group">
            <label>Event Time : </label>
            <input id="Eventtime" name="Eventtime" type="text" placeholder="2pm">
        </div>
		
		<div class="pure-control-group">
            <label>Event Location : </label>
            <input id="Eventlocation" name="Eventlocation" type="text" placeholder="UCM,Warrensburg,MO" required>
        </div>
		
        <div class="pure-control-group">
            <label>Description :</label>
            <input id="Description" name="Description" type="text" placeholder="Describe the event" required>
        </div>
        
        <div class="pure-control-group">
            <label>Lead Volunteer :</label>
            <select id="lead" name="lead"  required>
            <option value="" disabled selected>Select Lead Volunteer</option>
            <?php require 'scripts/DBcontrol.php';
            $vol_query = "SELECT UserID,UserName from users where UserRole is null or UserRole != 'Admin'; ";
            $vol_result = mysqli_query($conn, $vol_query);
            while($row = mysqli_fetch_array($vol_result)){
              echo '<option value="'.$row['UserID'].'">'.$row['UserName'] .'</option>';	
            }
            ?>
            </select>
        </div>
		 
	  <button id="saveEvent" name="submit" type="button" class="anil-button anil-button-primary">Save Event</button>
	  </fieldset>
	  </form>
	  <br/>
	  <h4 id="eventstatus"></h4>
	  <hr/>
        <h1>Upcoming Planting events.</h1>
        <?php
        require 'scripts/DBcontrol.php';
        $query = 'SELECT * FROM upcoming_events';
        $result = mysqli_query($conn, $query);
        $numrows = mysqli_num_rows($result);
        
        if($numrows != 0 ){
        echo "<table>";
        echo "<tr><th>EventName</th><th>Date</th><th>Location</th></tr>" ;
        
        while ($row = mysqli_fetch_assoc($result)){
        	echo "<tr><td>". $row['EventName'] . "</td><td>". $row['EventDate']." ".$row['EventTime']."</td><td>".$row['Location'] ."</td></tr>";        	
        }
        echo "</table>";
        
        }
        echo '<h1>List of Completed Events</h1>';
        $query1 = 'SELECT * FROM completed_events';
        $result1 = mysqli_query($conn, $query1);
        $numrows1 = mysqli_num_rows($result1);
        
        if($numrows1 != 0 ){
        	echo "<table>";
        	echo "<tr><th>EventName</th><th>Date</th><th>Location</th></tr>" ;
        
        	while ($row = mysqli_fetch_assoc($result1)){
        		echo "<tr><td>". $row['EventName'] . "</td><td>". $row['EventDate']." ".$row['EventTime']."</td><td>".$row['Location'] ."</td></tr>";
        	}
        	echo "</table>";
        
        }
        
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


