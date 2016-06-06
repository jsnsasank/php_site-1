// Javascript for Login page
// This scripts does validations for username and password of all the users
//Author: Anil

	function login_validate() 
{
		var uname = document.getElementById('username').value;
		var pass = document.getElementById('password').value;
		var spans = document.getElementById('erruserid');
		var spanpass = document.getElementById('errpass');
		
// Below first two 'if' conditions uses setAttribute to change css property for validations		
if(uname.length == 0)
	{
	spans.setAttribute("style","visibility:visible");
	return false;
	}
	else 
	spans.setAttribute("style","visibility:hidden");
if(pass.length == 0) 
	{
	spanpass.setAttribute("style","visibility:visible");
		return false;
	}
// Validations using innerHTML
var namecheck = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;
if(!namecheck.test(uname))
	{
  document.getElementById("login_valid").innerHTML = "<span style='color:red'>Invalid Username. Enter only letters.</span>";
  return false;
 	}
 	
if(uname.length<6 || pass.length<6)
	{
  document.getElementById("login_valid").innerHTML = "<span style='color:red'>Username and password cannot be lessthan 6 letters	.</span>";
  return false;
 	}
 	
 	return true;
}
	