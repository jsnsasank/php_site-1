<script type="text/javascript">
function dynamicClass() {
	var path = window.location.pathname;
	var page = path.split("/").pop();
	
	switch (page){
	  case "index.php":
		document.getElementById('indexpage').setAttribute("class", "selected");
		break;
	  case "volunteers.php":
		document.getElementById("volunteers_page").setAttribute("class", "selected");
		break;
	  case "gallery.php":
		document.getElementById("gallery_page").setAttribute("class", "selected");
		break;
	  case "register.php":
		document.getElementById("register_page").setAttribute("class", "selected");
		break;
	  case "contact.php":
		document.getElementById("contact_page").setAttribute("class", "selected");
		break;
	  case "login.php":
		document.getElementById("login_page").setAttribute("class", "selected");
		break;
	}
}
window.addEventListener("load",dynamicClass,false);
</script>
 <div id="header">
      <div id="logo">
	    <div id="logo_text">
		 <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.php">Planet<span class="logo_colour">Trees</span></a></h1>
          <h2>Plant Trees. Change lives.</h2>
		</div>
 	 </div>
	  
	  <?php if(!empty($_SESSION["username"])){
		   echo "<h6 class='userloggedin'>" . $_SESSION['username']."</h6>";
		  }
	  ?>
	        <div id="menubar">
        <ul id="menu">
		 <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li id="indexpage"> <a href="index.php">Home</a> </li>
          <li id="volunteers_page"><a href="volunteers.php">Volunteers</a></li>
          <li id="gallery_page"><a href="gallery.php">Gallery</a></li>
          <li id="register_page"><a href="register.php">Register</a></li>
          <li id="contact_page"><a href="contact.php">Contact Us</a></li>
		  <li id="login_page"><a href="login.php">Login</a></li>
		  
        </ul>
		
      </div>
	  
    </div>