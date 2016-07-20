<script type="text/javascript" src="scripts/jquery.min.js"> </script>  
<script type="text/javascript" src="scripts/treeid.js"></script>

<div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
            <h3>UpComing Events</h3>
            <h4>New Website Launched</h4>
            <h5>June 6th, 2016</h5>
            <marquee direction="up" width="250" height="200" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start()">
<ul id="up_events">
<li>Friday, June 10 09:00 AM<br/>
Planting Trees at Lee's Summit<br>
 Campus</li><br/><br/>
<li>Thursday, July 5 05:30 PM<br />
Nature Awareness Program</li><br><br>
<li>Saturday, July 15  09:00 AM<br />
Tree Planting for a <br />
Climate-Ready Future </li><br><br>
<li>Friday, April 17 12:00 AM<br />
Grand Finale Tree Planting</li><br><br>
</ul>

			</marquee>
    		<p><a href="upcomingevents.php">Read more</a></p>
          </div>
          <div class="sidebar_base"></div>
        </div>
        
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert sidebar items here -->
            <h3><font color='green'><strong>Click Below to Contribute</strong></font></h3>
<form action="donate.php" method="post">
 <input type="image" src="style/Donate.png"  name="submit" alt="Secured payment gateway">
</form> 
          </div>
          <div class="sidebar_base"></div>
        </div>
        
		 <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Search Plant</h3>
            <div id="search_form">
              <p>
                <input id="searchinput" class="search" type="text" name="search_field" placeholder="Enter Tree identifier...." />
                <input id="searchtree" name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
              </p>
              <span id="iderror" style="color:red"></span>
            </div>
       <div class="messagepop pop">
        <div id="searchResult"></div>
        <br>
       <button class="close">Close</button>
 
      </div>
          </div>
          <div class="sidebar_base"></div>
        </div>
		
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Useful Links</h3>
            <ul>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="donate.php">Contribute</a></li>
              <li><a href="gallery.php">Gallery</a></li>
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
     </div>
     