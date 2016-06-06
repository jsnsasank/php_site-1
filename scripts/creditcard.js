//Java script for credit card num validation.
// Author : Anil kumar goud. 
// CIS5690
var ccErrorNo = 0;
var ccErrors = [];

ccErrors[0] = "Unknown card type";
ccErrors[1] = "No card number provided";
ccErrors[2] = "Credit card number is in invalid format";
ccErrors[3] = "Credit card number is invalid";
ccErrors[4] = "Credit card number has an inappropriate number of digits";
ccErrors[5] = "Please Enter CVC number";
ccErrors[6] = "CVC Number Not valid";
ccErrors[7] = "Month Not valid";
ccErrors[8] = "Year Not valid";
ccErrors[9] = "Enter name on the card";
ccErrors[10] = "Not a Valid Name";
var cc_num;
var ccmm;
var ccyy;
var cc_cvc;
var cc_name;
var bill_name;

function start(){
	document.getElementById("ccpay").addEventListener("click", function(event){checkCreditCard(event)}, true);
}

function checkCreditCard(e){
document.getElementById("ccerror").innerHTML = "";
cc_name = document.getElementById("ccname").value;
cc_num = document.getElementById("ccnnum").value;
ccmm = document.getElementById("ccmm").value;
ccyy = document.getElementById("ccyy").value;
cc_cvc = document.getElementById("cc_cvc").value;
 
if(cc_num.length == 0) {
	ccErrorNo = 1;
	disp(ccErrorNo);
	return false;
}

// Remove spaces from the cc number ;
cc_num = cc_num.replace(/\s/g,"");

var cardNo = cc_num;
var cardexp = /^[0-9]{16}$/;

if(!cardexp.exec(cardNo)){
	ccErrorNo = 2;
	disp();
	return false
}

if(!check_luhn_algo(cc_num)){
	ccErrorNo = 3;
	disp();
	return false;
}

if(cc_cvc.length == 0){
	ccErrorNo = 5;
	disp();
	return false;
}
var cvcnum = cc_cvc;
var ccexp = /^[0-9]{3}$/;
if(!ccexp.exec(cvcnum)){
	ccErrorNo = 6;
	disp();
	return false;
}
if(cc_name.length ==0){
	ccErrorNo = 9;
	disp();
	return false;
}

var namexp = (/^([a-zA-Z]+\s)*[a-zA-Z]+$/g);
if(!namexp.exec(cc_name)){
	ccErrorNo = 10;
	disp();
	return false;
}

var mmexp = (/[0-9]{2}$/);
if(!mmexp.exec(ccmm)){
	ccErrorNo = 7;
	disp();
	return false;
}
var yyexp = (/[0-9]{2}$/);
if(!yyexp.exec(ccyy)){
	ccErrorNo = 8;
	disp();
	return false;
}
// The payment validation done in Jquery to reduce the no.of lines..
e.preventDefault();

var container = $('#paymentinprogress');
var container2 = $('#confirmationpage');
$(container).html( "<img src='style/loader.gif'>");
cc_addr = $('#bill_addr').text();
cc_zip = parseInt($('#bill_zip').text());
cc_num = parseInt(cc_num);

$.ajax({
  url : 'scripts/ccEmulator.php',
  type: 'post',
  data: {'cc_name': cc_name,'cc_num': cc_num,'cc_cvv': cc_cvc,'cc_addr': cc_addr, 'cc_zip': cc_zip},
  success: function(json){
	  $.each(json, function(i, item){
		  console.log("Data : "+item);
	     if(item == 987654){
	    	 $(container).html("<h3>Your payment has been approved.<br>Please wait while we update your details.<?php $PAYMENT='APPROVED'?></h3>");
	    	 $(container2).html( "<img src='style/loader.gif'>");
	    	 setTimeout(function() { updatePayment(); }, 2000);
	     }else if(item == "A"){
	    	 $(container).html("<h3>ZIP code not matched with your card information</h3>");
	     }else if(item == "X"){
	    	 $(container).html("<h3>CVV not matched with your card information</h3>");
	     }else if(item == "Z"){
	    	 $(container).html("<h3>Address Not mathed with bank records</h3>");
	     }
	  }) // end $.each loop;
	  //$(container).html("<p></p>");
  },
  error: function(xhr,desc,err){
	  console.log("failed with error : " + xhr + "\n"+err);
  }
})//Ajax call

}

function updatePayment(){
	var container2 = $('#confirmationpage');
	var dbname = $('#bill_name').text();
	var dbcc = String(cc_num);
	var last4 = dbcc.substring(dbcc.length - 4);
	var dbaddr = cc_addr + "\n" + cc_zip;
	var output = " ";
	//Generate Tree identifiers for each tree
	$.ajax({
		  url : 'scripts/addDonations.php',
		  type: 'post',
		  data: {'js_cart': js_cart, 'name': dbname, 'last4': last4, 'addr':dbaddr},
		  success: function(json){
			  $.each(json, function(i, item){
				  console.log("Data : "+item);
			     if(item != "DB_ERROR"){
			    	 output += item + "<br>";
			     }
			  }) // end $.each loop;
			  $(container2).html( "<h3>Your details are updated in database.Please notedown your tree identifiers</h3>"+output);
			},
		  error: function(xhr,desc,err){
			  console.log("failed with error : " + xhr + "\n"+err);
		  }
		})//Ajax call
}



function check_luhn_algo(cc){
	if(/[^0-9]/.test(cc)) return false;
	var checksum = 0;
	var Digit = 0;
	var bool_even = false;
	
	for (var i = cc.length - 1; i >= 0; i--){
	  var each_digit = cc.charAt(i);
	    Digit = parseInt(each_digit, 10);
	  if(bool_even){
		  if((Digit *= 2) > 9) Digit -= 9;
		  
	  }
	  checksum += Digit;
	  bool_even = !bool_even;
	}
	
	return (checksum % 10) == 0;
	
}

function disp(){
	console.log(ccErrorNo);
	document.getElementById("ccerror").innerHTML = "<span style='color:red'>" + ccErrors[ccErrorNo] +"</span>";
}

window.addEventListener("load", start, false);





