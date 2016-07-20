<?php
session_start();

?>
<!DOCTYPE HTML>
<html>

<head>
  <title>PlanetTrees - contact us</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
     <script type="text/javascript" src="scripts/jquery.min.js"> </script>
       <script type="text/javascript" >
    $(document).ready(function(){
    	$('#cform').on('submit', function(e) {

      e.preventDefault();
      var name  = $('#custname').val().trim();
      var email = $('#custemail').val().trim();
      var mesg  = $('#custmesg').val().trim();
      console.log(mesg);
      if(name.length == 0 || email.length == 0 || mesg.length == 0 ){
         $('#disp').html("<sapn style='color:red'>Please Fill All the Details</span>");
         return false;
      }else{
		$('#disp').html("Thank You : <span style='color:green'>"+name+" </span>For the Feedback!!");
          }
     }); 
   	});
     </script>
</head>

<body>
  <div id="main">
    <?php include 'header.php' ;?>
    <div id="content_header"></div>
    <div id="site_content">
     <?php include "sidebar.php" ;?>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Contact Us</h1>
        <p>Please feel free to contact us for further information or questions</p>       
         <form method="post" class="anil-form  anil-form-aligned" id="cform">
       <fieldset>
      
        <div class="pure-control-group">
            <label>Name : </label>
            <input id="custname" name="custname" type="text" placeholder="Your Name" required>
        </div>

        <div class="pure-control-group">
            <label>Email : </label>
            <input id="custemail" name="custemail" type="text" placeholder="somone@ucmo.edu" required>
        </div>
		

        <div class="pure-control-group">
            <label>Message :</label>
            <textarea id="custmesg" name="custmsg" rows='12' cols="42" placeholder="Please type the message.." required ></textarea>
        </div>
		 
	  <button id="saveEvent" name="contact_form_submit" type="submit" class="anil-button anil-button-primary">Submit Comments</button>
	  </fieldset>
	  </form>     
	<br/>
        <h3 id="disp"> </h3>
      </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
