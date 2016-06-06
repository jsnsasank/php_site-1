// Javascript for Login page

// validating registration form fields
// Author: Anil Goud

alert('in regist_validations.js');
var user_name="";
var password="";
var name="";

var phone=0;
var addr="";

var city="";
var state="";
var zip=0;
var country="";
var email="";


function register_validate()
{

user_name = document.getElementById("username").value;
password = document.getElementById("password").value;
name = document.getElementById("name").value;

phone = document.getElementById("phone").value;

zip = document.getElementById("zip").value;

document.getElementById("register_valid").innerHTML="";

if(user_name.length == 0)
	{
  document.getElementById("register_valid").innerHTML = "<span style='color:red'>Please username</span>";
return false;
	}
/*if(user_name.trim() == "" || password.trim() == "" || fname.trim() == "" || lname.trim() == "" || addr1.trim() == "" || city.trim() == "" || state.trim() == "" || country.trim() == "" || zip.trim() == ""){
  document.getElementById("register_valid").innerHTML = "<span style='color:red'>Please Fill all the details</span>";
  //e.preventDefault();
  return false;
 }*/
 if(name.length == 0)
	{
  document.getElementById("register_valid").innerHTML = "<span style='color:red'>Please Name</span>";
return false;
	}
 if(user_name.length<6 || password.length<6)
	{
  document.getElementById("register_valid").innerHTML = "<span style='color:red'>Username and password cannot be lessthan 6 letters	.</span>";
  return false;
 	}
 if( isNaN(phone) || isNaN(zip) )
 	{
  document.getElementById("register_valid").innerHTML = "<span style='color:red'>Please Enter a Number for Phone and Zip</span>";
  
   return false;
 	}
 if(phone.length<10 || phone.lenght>10 )
 	{
 	document.getElementById("register_valid").innerHTML = "<span style='color:red'>Phone number must be equal to 10 digits</span>";
 	return false;
 	}	
 var zipexp = /^[0-9]{5}$/;
if(!zipexp.exec(zip)){
  document.getElementById("register_valid").innerHTML = "<span style='color:red'>Invalid ZIP code.Enter 5 digit zip code.</span>";
  return false;
 }	
 var emailre = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 if (!emailre.test(eamil))
 	{
 document.getElementById("register_valid").innerHTML = "<span style='color:red'>Please Enter a valid email id</span>";
  
   return false;
 	}
return true;
}



