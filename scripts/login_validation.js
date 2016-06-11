// Javascript for Login page
// This scripts does validations for username and password of all the users
//Author: Anil

function login_validate() {
	var uname = document.getElementById('username').value;
	var pass = document.getElementById('password').value;
	var spans = document.getElementById('erruserid');
	var spanpass = document.getElementById('errpass');
		
// Below first two 'if' conditions uses setAttribute to change css property for validations		
if(uname.length == 0) {
	spans.setAttribute("style","visibility:visible");
	return false;
} else {  
	spans.setAttribute("style","visibility:hidden");
}
var namecheck = /^[a-zA-Z0-9 \s]+$/;
if(!namecheck.test(uname)){
  document.getElementById("erruserid").innerHTML = "<span style='color:red'>Invalid Username. Enter only letters.</span>";
  return false;
 }
if(pass.length == 0) {
	spanpass.setAttribute("style","visibility:visible");
	return false;
}else{
	spanpass.setAttribute("style","visibility:hidden");
}


 	
return true;
}
	