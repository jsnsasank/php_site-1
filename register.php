<!DOCTYPE HTML>
<html>

<head>
  <title>PlanetTrees - Register</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <?php include "header.php" ;?>
    <div id="content_header"></div>
    <div id="site_content">
      <?php include "sidebar.php" ;?>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Join Planet Trees</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui.</p>
   


	<form class="anil-form  anil-form-aligned">
       <fieldset>
               <div class="pure-control-group">
            <label for="username">Username* : </label>
            <input id="username" type="text" placeholder="Username">
        </div>
                <div class="pure-control-group">
            <label for="password">Password* : </label>
            <input id="password" type="text" placeholder="Password">
        </div>
        <div class="pure-control-group">
            <label for="name">First Name* : </label>
            <input id="fname" type="text" placeholder="First Name">
        </div>
        <div class="pure-control-group">
            <label for="name">Last Name* : </label>
            <input id="lname" type="text" placeholder="Last Name">
        </div>
                <div class="pure-control-group">
            <label for="dob">Date of Birth* : </label>
            <input id="dob" type="text" placeholder="Date of Birth">
        </div>
         <div class="pure-control-group">
            <label for="phone">Phone* : </label>
            <input id="phone" type="text" placeholder="Phone">
        </div>

        <div class="pure-control-group">
            <label for="Address">Address Line1 : </label>
            <input id="addrlin1" type="text" placeholder="Street">
        </div>
		
		<div class="pure-control-group">
            <label for="Address">Address Line2 : </label>
            <input id="addrlin2" type="text" placeholder="Apt num">
        </div>
		
		<div class="pure-control-group">
            <label for="City">City : </label>
            <input id="city" type="text" placeholder="City">
        </div>
		
		<div class="pure-control-group">
            <label for="state">State : </label>
            <input id="state" type="text" placeholder="State">
        </div>
		
		<div class="pure-control-group">
            <label for="country">City : </label>
            <input id="country" type="text" placeholder="Country">
        </div>
        	<div class="pure-control-group">
            <label for="zip">Zip Code : </label>
            <input id="zip" type="text" placeholder="Zip Code">
        </div>

        <div class="pure-control-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" placeholder="Email Address">
        </div>

      
        <div class="pure-controls">
            <label for="cb" class="anil-checkbox">
                <input id="cb" type="checkbox"> I've read the terms and conditions
            </label>
			<button type="reset" class="anil-button anil-button-primary">Reset</button>
            <button type="submit" class="anil-button anil-button-primary">Submit</button>
            
        </div>
    </fieldset>
   </form>
   		</div>
       </div>
    </div>
    <div id="content_footer"></div>
    <?php include "footer.php" ;?>
  </div>
</body>
</html>
