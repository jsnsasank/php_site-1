// java script for donations page
// Author : Anil Kumar Goud..

// This script does basic validations for fields entered in the donations page.

var name="";
var addr1="";
var city="";
var state="";
var country="";
var email="";
var redmaple=0;
var sugarmaple=0;
var riverbirch=0;
var catalpa=0;
var totalAmount=0;
var totalPlants=0;
var RM_PRICE=50;
var SM_PRICE=65;
var RB_PRICE=25;
var CT_PRICE=35;

function start(){
  document.getElementById("payment").addEventListener("click",function(event){ validate(event)},false);
}

function validate(e){

name = document.getElementById("name").value;
addr1 = document.getElementById("addrline1").value;
city = document.getElementById("city").value;
state = document.getElementById("state").value;
country = document.getElementById("country").value;
email = document.getElementById("email").value;
redmaple = document.getElementById("cbRM").value;
sugarmaple = document.getElementById("cbSM").value;
riverbirch = document.getElementById("cbRB").value;
catalpa = document.getElementById("cbCT").value;
document.getElementById("Addr_result").innerHTML = "";
document.getElementById("plant_result").innerHTML = "";


console.log(redmaple,sugarmaple,riverbirch,catalpa);

if(name.trim() == "" || addr1.trim() == "" || city.trim() == "" || state.trim() == "" || country.trim() == ""){
   document.getElementById("Addr_result").innerHTML = "<span style='color:red'>Please Fill all the details</span>";
   e.preventDefault();
   return false;
 
 }else if(!validateEmail(email)){
  document.getElementById("Addr_result").innerHTML = "<span style='color:red'>Invalid Email Address</span>";
  e.preventDefault();
  return false;
	
}else if(redmaple == "" && sugarmaple == "" && riverbirch == "" && catalpa == "" ){
 document.getElementById("plant_result").innerHTML = "<span style='color:red'>Please select atleast one plant type</span>";
 e.preventDefault();
 console.log("nan if")
 return false;
}else if( isNaN(redmaple) || isNaN(sugarmaple) || isNaN(riverbirch) || isNaN(catalpa)){
  document.getElementById("plant_result").innerHTML = "<span style='color:red'>Please Enter a Number</span>";
  console.log("less than zero if");
  e.preventDefault();
  return false;
	
}else if( redmaple < 0 || sugarmaple < 0 || riverbirch < 0 || catalpa < 0  ){
  document.getElementById("plant_result").innerHTML = "<span style='color:red'>Quantity can not be a Negitive number</span>";
  console.log("less than zero if");
  e.preventDefault();
  return false;
}else {
	totalPlants = redmaple + sugarmaple + riverbirch + catalpa;
	if( totalPlants == 0){
	document.getElementById("plant_result").innerHTML = "<span style='color:red'>Please select one plant atleast</span>";
    e.preventDefault();
    return false;	
	}else {
	  calAmount();
    }
}

}

function calAmount(){
 alert("sent");
 }

 function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


window.addEventListener("load",start,false);