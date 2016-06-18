<?php
session_start();
if(!isset($_SESSION['username'])){
	echo "<h1>Sorry You dont have access to this page..</h1>";
	die('Unauthorized access');
	
} elseif(isset($_SESSION['UserRole']) && $_SESSION['UserRole'] == "Admin" ){
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
      <script type="text/javascript" src="scripts/profilePage.js"></script>
</head>

<body>

  <div id="main">
   <?php include "header.php" ;?>
   
	<div id="content_header">
		 </div>
        <div id="site_content">
                 
        <!-- insert the page content here -->
        <div id='w'>
       <div id="userphoto"><img src="images/avatar.png" alt="default avatar"></div>
        <h1><?php echo "$usr" ?> - Profile </h1>
       <div id="profiletabs">
       <ul id="profiletabsul" class="clearfix">
       <li><a href='#dash' class="sel">DashBoard</a></li>
        <li><a href='#editprofile'>Edit Profile</a></li>
        <li><a href='#event'>Events</a></li>
        <li><a href='#req'>Requests</a></li>
        
       </ul>
     </div>
       <section id="dash">
       <h2>Hello, <?php echo $usr ?> .  welcome to your dash board.</h2> <br/>
       <div class="para1">
       <p> YOU can make a difference today-- by joining our team of our volunteers. We have a vision of a greener USA, but to get there, we rely on volunteers like you to help transform our region into a healthy urban ecosystem, one community at a time.

    Volunteering with Planet Tree team is fun and rewarding. It is also unlike typical volunteer experiences in that we empower YOU with the support, training and tools you need to be an engine of change
    Volunteering with TreePeople does not end with urban forestry and mountain restoration. We have a number of different ways for you to help us while you build skills in public speaking, office administration, park maintenance, and photography
       </p>
       
       <p>Volunteers play an important role in tree planting and tree care projects in communities across the United States.
    
      From the planet trees organization  in Warens burg, Missouri, to the neighborhood associations in Kansas City and St.Louis, Chicago
      they are the heart and soul of tree planting in America.
       </p>
    <p>You can get involved, too! Whether you are organizing a tree planting project or looking to volunteer at a tree planting or any other event. 
you can take pride in helping to transform our urban landscapes.
</p><br>
       </div>
       <h4>Your Previous Contributions :</h4>
       <p class="para1">This organizatons runs on donations from volunteers</p>
       <?php echo "<p class='para1'>No contribiutons found.</p>"?>
       <p class="para1">would like to donate more, Please visit our <a href="donate.php">donations</a> page</p>
       
       <p class="para1">
       Search by tree identifier -- In progress
       </p>
       
       
       <h4>Participated Events :</h4>
       <p class="para1">Please check your particiated events. Please visit our 
       <a href="gallery.php">gallery</a> page for the pictures of the events
       </p>
       <?php echo "<p class='para1'>Not events found.</p>"?>
       </section>
     
       <section id="event" class="hidden">
        <h2>Upcoming Planting events.</h2>
        <p class="para1">
        We offer a variety of volunteer opportunities to plant and care for trees, restore our local mountains and to take care of our nursery and park. To get started, take a look at our volunteer calendar of events and register for an event that suits your interest and schedule.
        Volunteer opportunities are available for all ages with a few restrictions. Volunteers under the age of 18 not accompanied by their parent or guardian must provide a parental consent form at the event 
        </p>
        
        <p class="para1">
        Registration is required for all events. We have to limit volunteer participation to ensure that we have enough tools, equipment and work for all volunteers. Please pre-register so that we  know how many people to expect and can plan accordingly. If you plan on bringing friends and family, please check that everyone has pre-registered for the event online
        </p>
        <?php
        require 'scripts/DBcontrol.php';
        $query = 'SELECT * FROM upcoming_events';
        $result = mysqli_query($conn, $query);
        $numrows = mysqli_num_rows($result);
        
        if($numrows != 0 ){
        echo "<table>";
        echo "<tr><th>EventName</th><th>Date</th><th>Location</th><th>Volunteer</th></tr>" ;
        
        while ($row = mysqli_fetch_assoc($result)){
        	echo "<tr><td>". $row['EventName'] . "</td><td>". $row['EventDate']." ".$row['EventTime']."</td><td>".$row['Location'] ."</td><td id='evtid' class='hidden'>".$row['EventID']."</td><td><a href='#' class='enlink'>Enroll</a></td></tr>";        	
        }
        echo "</table>";
        
        }
        
        ?>
        <div>
        Please check our recent events. 
        </div>
                
      </section>
      
      <section id="editprofile" class="hidden">
        <h2>Edit your user settings:</h2>
                       
        <div class="gear">
			<label>Primary E-Mail:</label>
			<span id="Email" class="datainfo"><?php echo $c_email;?></span>
			<a href="#" class="editlink">Edit Info</a>
			<a class="savebtn">Save</a>
		</div>
		<div class="gear">
		  <label>Full Name:</label>
		  <span id="FullName" class="datainfo"><?php echo $c_name;?></span>
		  <a href="#" class="editlink">Edit Info</a>
		  <a class="savebtn">Save</a>
		</div>
		<div class="gear">
		  <label>Phone:</label>
		  <span id="Phone" class="datainfo"><?php echo $c_phone;?></span>
		  <a href="#" class="editlink">Edit Info</a>
		  <a class="savebtn">Save</a>
		</div>
				
		<div class="gear">
		  <label>Address:</label>
		  <span id="Address" class="datainfo"><?php echo $c_address;?></span>
		  <a href="#" class="editlink">Edit Info</a>
		  <a class="savebtn">Save</a>
		</div>
		<br>
		<div class='para1'> 
		<p id='updatestatus'></p>
		<p>Please review and update your personal details.</p>
		<p>If you would like to change your password, You can change <a>here</a></p>
		<p>Make sure that your email address is in the correct format.</p>
		<p>To update the profile picture. Please click on the image.</p>
		</div>
      </section>
      
      <section id="req" class="hidden">
      <h2>Check Status</h2> 
      <p class='para1'>If you have requested for a planting tree previously. You can check the status of your request with confirmation number.
      The Request confirmation starts with RQ and contains only numbers and upper case letters 
      </p>
      <form class="anil-form  anil-form-aligned" >  
       <div class="pure-control-group">
          <label>Search Previous Requests : </label>
	     <input id="rqsearch" type="text"  name="search_field" placeholder="Enter Tree identifier...." >
	     <input id="rqimage" name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
	     <span id="searchspan" style='color:red'></span>
		</div>
	 </form>
	 <div id="rqresult">
	 </div>
      
     
      <h2>Make a new Request for tree planting</h2>
      <p class='para1'>You can request for trees to be planted in a particular location.Please submit the following form</p>
      <form class="anil-form  anil-form-aligned" >
       <fieldset>
       <p id="req-status"></p>
        <div class="pure-control-group">
            <label>Location : </label>
            <textarea id="req-location" rows="4" placeholder="Location with longitute/latitude details" required></textarea>
        </div>
		<div class="pure-control-group">
		   <label for="species">Species : </label>
			 <select id="species" required>
			 	<option>Red Maple	</option>
			 	<option>Sugar Maple	</option>
			 	<option>River Birch	</option>
			 	<option>Catalpa		</option>
			 </select> 
		  </div>
		  
		  <div class="pure-control-group">
		   <label>Quantity : </label>
			 <input id="quantity" type="number" autocomplete="off"  min="1"> 
		  </div>
		  <div class="pure-control-group">
		   <label>Reason : </label>
			<textarea id="req-comments" rows="4" placeholder="Reason/comments for this request" required></textarea>
		  </div>
		 		 
	  </fieldset>
	  <button id="req-button" class="anil-button anil-button-primary"> Submit Request </button>
	  </form>
      </section>
       <h3 id="reqcode"> </h3>
        </div>
        <!-- End of the page content -->
         
    </div>
      
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
   </div>
</body>
</html>

