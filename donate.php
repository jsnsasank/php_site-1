
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>

  <title>PlanetTrees</title>
  <meta name="description" content="CIS5690 - Advances systems Project" />
  <meta name="keywords" content="cis5690,palnts,donate,trees,ucmo,cis" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />      
 
 <div id="main">
   <?php include "header.php" ;?>
	<div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>   
   
</head>

<body>

     <script>
var err_uname = 0;
var err_email = 0;
var err_upass = 0;
var err_conf_upass = 0;
var target = $('err_ele');
var fx = new Fx.Morph(target, {duration: 600, wait: false});


var fill_msg=target.innerHTML;
if(target.innerHTML!='')
{
/*	fx.start({
		 'margin-top':[0]
	});
	setTimeout(slidOut,4000);*/
	target.innerHTML=fill_msg+'';
	slidIn();
}

function slidIn()
{
	//alert("Slidin");
	fx.start({
		 'margin-top':[80]
	});
	setTimeout(slidOut,16000000);
	
}

function slidOut()
{
	fx.start({
		 'margin-top':[-200]
	});

}

</script>

<!-- <div class="middle_container_form"> 
<div class="middle_middle">
<div class="text_container">
	<div class="dashboard_contain_top"></div>
            <form name="donatefrm" method="post" action="https://www.giveisha.org/index.php?option=com_fundpage&task=savedonate&page_id=2" class="form-validate"   enctype="multipart/form-data">
					<div class="left_container_form">
                                                                 
                        
                       <div class="form_container">
							<div class="form_left_contain">
							  <div class="form_full">  -->
                                   
                                
                                <script>
								
         function valDonateForm()
		{ 
		

				 if(document.donatefrm.Nationality.value=='')
				  {
				  alert('Please Select your Nationality!');
				  document.donatefrm.Nationality.focus();
				  return false;
				  }
				  
				  if(document.donatefrm.fname.value=='')
				  {
				  alert('Please fill The Valid Firstname');
				  document.donatefrm.fname.focus();
				  return false;
				  }
				   if(document.donatefrm.lname.value=='')
				  {
				  alert('Please fill The Lastname');
				  document.donatefrm.lname.focus();
				  return false;
				  }
				
				   if(document.getElementById('address').value=='')
				  {
				  alert('Please fill The Address');
				  document.getElementById('address').focus();
				  return false;
				  }
				  if(document.getElementById('address').value!='')
				  {
				  var str = document.getElementById('address').value;
				  var n = str.length;
				  	if(n<10)
					{
					   alert('Please fill Valide Address');
				  	   document.getElementById('address').focus();
					   return false;
					}					  
				  }
				  
				   if(document.donatefrm.zip.value=='')
				  {
				  alert('Please fill The zip/Pin');
				  document.donatefrm.zip.focus();
				  return false;
				  }
				   if(document.donatefrm.city.value=='')
				  {
				  alert('Please fill The City');
				  document.donatefrm.city.focus();
				  return false;
				  }
				   if(document.donatefrm.state.value=='')
				  {
				  alert('Please fill The State');
				  document.donatefrm.state.focus();
				  return false;
				  }
				   if(document.donatefrm.country.value=='0')
				  {
				  alert('Please Select The Country');
				  document.donatefrm.country.focus();
				  return false;
				  }
				   if(document.donatefrm.email.value=='')
				  {
				  alert('Please fill The Email');
				  document.donatefrm.email.focus();
				  return false;
				  }
				   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				   var email =  document.donatefrm.email.value;
				  if(reg.test(email) == false)
				  {
				 alert('Invalid Email Address');
				 document.donatefrm.email.focus();
				 return false;
				  }
				   if(document.donatefrm.phone.value=='')
				  {
				  alert('Please fill The Phone');
				  document.donatefrm.phone.focus();
				  return false;
				  }
				  
				   var x = document.donatefrm.phone.value;
				   if(isNaN(x)||x.indexOf(" ")!=-1)
				   {
					  alert("Invalid phone number");
					  document.donatefrm.phone.focus();
					  return false;
				   }
				   var numbers = /^[0-9]+$/;  
      if(x.match(numbers))  
      {        
      return true;  
      }  
      else  
      {  
      alert('Please input numeric characters only');  
      document.donatefrm.phone.focus();  
      return false;  
      }  
					
					if(document.donatefrm.project_id.value==1 && (!document.donatefrm.aya_amt[0].checked && !document.donatefrm.aya_amt[1].checked && !document.donatefrm.aya_amt[2].checked && !document.donatefrm.aya_amt[3].checked && !document.donatefrm.aya_amt[4].checked)) 
					{
						  alert('Select the amount');
						  document.donatefrm.aya_amt[0].focus();
						  return false;
					} 
					//Thomas - Added amount validation for DTC 
					if(document.donatefrm.project_id.value==5 && (!document.donatefrm.dtc_amt[0].checked && !document.donatefrm.dtc_amt[1].checked && !document.donatefrm.dtc_amt[2].checked && !document.donatefrm.dtc_amt[3].checked && !document.donatefrm.dtc_amt[4].checked && !document.donatefrm.dtc_amt[5].checked)) 
					{
						  alert('Select the amount');
						  document.donatefrm.dtc_amt[0].focus();
						  return false;
					} 
					
					//Aeon - Added amount validation for PGH - 22-May-2012
				  if(document.donatefrm.project_id.value==2 && (!document.donatefrm.pgh[0].checked && !document.donatefrm.pgh[1].checked && !document.donatefrm.pgh[2].checked && !document.donatefrm.pgh[3].checked && !document.donatefrm.pgh[4].checked && !document.donatefrm.pgh[5].checked)) 
					{
						  alert('Select the amount');
						  document.donatefrm.pgh[0].focus();
						  return false;
					} 
				  //Aeon - Changes End
				  
				  	//Thomas - Added amount validation for GSAP - 15-6-2012
				  if(document.donatefrm.project_id.value==4 && (!document.donatefrm.gsap[0].checked && !document.donatefrm.gsap[1].checked && !document.donatefrm.gsap[2].checked && !document.donatefrm.gsap[3].checked && !document.donatefrm.gsap[4].checked && !document.donatefrm.gsap[5].checked)) 
					{
						  alert('Select the amount');
						  document.donatefrm.gsap[0].focus();
						  return false;
					} 
				  //Thomas - Changes End
				  
					if((document.donatefrm.project_id.value!=1 && document.donatefrm.project_id.value!=2 && document.donatefrm.project_id.value!=4 && document.donatefrm.project_id.value!=5) || (document.donatefrm.project_id.value==1 && document.donatefrm.aya_amt[4].checked) || (document.donatefrm.project_id.value==2 && document.donatefrm.pgh[5].checked) || (document.donatefrm.project_id.value==4 && document.donatefrm.gsap[5].checked) || (document.donatefrm.project_id.value==5 && document.donatefrm.dtc_amt[5].checked))  //Aeon & thomas - Added validation for PGH & gsap
					{
					
							  if(document.donatefrm.amount.value=='')
							  {
								  alert('Please fill The Amount');
								  document.donatefrm.amount.focus();
								  return false;
							  }
							  else
							  {
							  
										   var y = document.donatefrm.amount.value;
										  if(isNaN(y)||y.indexOf(" ")!=-1)
										   {
											  alert('Invalid  Amount');
											  return false;
																											  
										   }
										   
							 }		   
				  }		   	   
				   
				  if(!document.donatefrm.terms.checked)
				  { 
					  alert('Please Select The Agreement');
					  document.donatefrm.terms.focus();
					  return false;
				  }
				  
				 
				  if(document.donatefrm.Annadhanam.value!='')
					{
							 if(document.donatefrm.honor.value=='')
							{
							  alert("Enter Annadhanam Honor of ");
							  document.getElementById('honor').focus();
							  return false;
							}
							 if(document.donatefrm.Occasion.value=='')
							{
							 alert("Enter Occasion of");
							  document.getElementById('Occasion').focus();
							  return false;
							}
							 if(document.donatefrm.dtc_Date.value=='')
							{
							  alert("Enter Annadhanam Date");
							   document.getElementById('dtc_Date').focus();
							  return false;
							}
					}
				   
 if(document.donatefrm.project_id.value==5)
				  {
				     if(dtc_tamount()==1)
					 {
					 return false;
					 }
					 
				   
				  }
				   
				   return true;

	}
	
	
	 function getConversion()
	 {
		
		var convamt="";
		//var y = document.getElementById('conam').value;
		//var type = document.getElementById('con').value;
		
		var y = document.donatefrm.conam.value;
		var type = document.donatefrm.con.value;
								
		
				if(y!="" && y!=null && y!=" ")
				{
					 document.getElementById('loading').style.display='block';
		             document.getElementById('usdiv').style.display='none';
					  if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  		xmlhttp=new XMLHttpRequest();
					  }
					  else
					  {// code for IE6, IE5
					  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					
						
					xmlhttp.onreadystatechange=function()
					  {
					
								if (xmlhttp.readyState==4)
								{
										
								
									     res=xmlhttp.responseText;
										 						 
										 convamt=res;
																			 
										 document.getElementById('usdiv').innerHTML='Result: Rs.'+convamt;										 
										 document.donatefrm.amount.value=convamt;
										 document.getElementById('usdiv').style.display='block';
										 document.getElementById('loading').style.display='none';
										
																			
								}
					  }
														 
					   xmlhttp.open("GET","yahoo.php?type="+type+"&amount="+y,true);
					   xmlhttp.send();
				
				}
				else
				{
					alert('Please Fill The Amount');
				}
				
				
	}
	
	function clearAmt(amt)
	{
	
			if(amt!="others")
			{
				document.donatefrm.amount.value="";
				
			
			}
	}
	
	function addamount(amt)
	{
	
			if(amt!="others")
			{  
				document.donatefrm.amount.value="";		
				document.getElementById('sqamount').value=amt;		
			}
			else if(amt=="others")
			{
			   document.getElementById('sqamount').value=0;	
			}
	}
	
	
	 function chkey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	

	function isAmount(e)
		{
			var isIE = document.all?true:false;
			var isNS = document.layers?true:false;
			var _ret = true;
			if (isIE) {
				if (window.event.keyCode < 46 || window.event.keyCode > 57 || window.event.keyCode == 46 ) {
				window.event.keyCode = 0;
				_ret = false;
				}
			}
			else if (isNS) {
					if (e.which < 46 || e.which > 57 || e.which == 46) {
					e.which = 0;
					_ret = false;
					}
				}
			else
			{
			
				if (e.which!=8 && e.which!=0) 
				{
				
					if (e.which < 46 || e.which > 57  ||  e.which == 46) {
						e.returnValue=false;
						_ret = false;
					}
					
			 }		
				
			}
				
				
				return (_ret);
		}


function india(a)
{
   var code = a;
   if(code == 99)
   {
     document.getElementById('india').style.display='none';
	 document.getElementById('amount').value='';
   }
   else
   {
    document.getElementById('india').style.display='block';
   }
}
		</script>

          <table width="90%" border="0" cellspacing="5">

              <tr>
                <td><span class="left_form">Nationality <span class="err">*</span></span></td>
                <td><select class=""  style="width:185px;" onchange="india(this.value);"	 name="Nationality"  id="Nationality" tabindex=10>
               		  <option value="" selected="selected">Select</option>                      
                      <option value="Indian">Indian</option>
                      <option value="Others">Others</option>
                      </select></td>
                <td width="46%" rowspan="12" valign="top"><table style="z-index:1500" width="100%" border="0" cellspacing="5">
                  <tr>
                    <td width="35%"><span class="left_form">Last name <span class="err">*</span></span></td>
                        <td width="65%"><span class="right_form">
                          <input class="textbox_form" tabindex=2 type="text" name="lname" id="lname" style="width:240px;" value="" />
                        </span></td>
                      </tr>
                  <tr>
                    <td><span class="left_form" style="font-size:14px;">Upload your Image :</span></td>
                        <td><span class="left_form">
                          <input type="file"  tabindex=15  src="https://www.giveisha.org/templates/fund_page_templates/Isha/images/browse-button.jpg" name="giver_img" />
                        </span></td>
                      </tr>
                  <tr>
                    <td><span class="left_form">Email <span class="err">*</span></span></td>
                        <td><span class="right_form">
                          <input  class="textbox_form" tabindex="9" type="text" name="email" id="email" style="width:240px;" value="" />
                        </span></td>
                      </tr>
                  <tr>
                    <td><span class="left_form">Phone <span class="err">*</span></span></td>
                        <td><span class="right_form_pass">
                          <input class="textbox_form" tabindex="10" type="text" name="phone" style="width:240px;" value="" id="phone"  />
                        </span></td>
                      </tr>
                  <tr>
                    <td><span class="left_form">Comments</span></td>
                        <td><textarea class="textbox_form" tabindex=11 name="comments" style="width:240px; height:100px;" id="comments" rows="3" 
									columns="80"></textarea>                    </td>
                      </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                                  </table></td>
              </tr>
              <tr>
              <td width="10%"><span class="left_form">First name <span class="err">*</span></span></td>
              <td width="44%"><span class="right_form">
                <input class="textbox_form" tabindex=1 type="text" name="fname" id="fname" value=""/>
                <input name="project_id" type="hidden" value="2" />
              </span></td>
              </tr>
            <tr>
              <td><span class="left_form"> Billing Address1 <span class="err">*</span></span></td>
              <td><input  class="textbox_form" tabindex=3 type="text" name="address" id="address" value="" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><span class="left_form"> Billing Address2&nbsp;&nbsp;&nbsp;</span></td>
              <td><span class="right_form">
                <input  class="textbox_form" tabindex=4 type="text" name="address1" id="address" value="" />
              </span></td>
              <td>&nbsp;</td>
            </tr>
           
            <tr>
              <td><span class="left_form">City <span class="err">*</span></span></td>
              <td><span class="right_form">
                <input  class="textbox_form" tabindex=5 type="text" name="city" id="city" value="" />
              </span></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><span class="left_form">State <span class="err">*</span></span></td>
              <td><span class="right_form">
                <input  class="textbox_form" tabindex="6" type="text" name="state" id="state" value="" />
                <span class="right_form_pass">
                <input type="hidden" name="currency_rate" value="67.0385" id="currency_rate" />
                </span></span></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><span class="left_form">Country <span class="err">*</span></span></td>
              <td>                  <div class="right_form">
                    <select class=""  style="width:185px;" onchange="india(this.value);"	 name="country"  id="country" tabindex=7>
                      <option value="0">Select</option>
                                            <option value="1" >
                      Afghanistan                      </option>
                                            <option value="2" >
                      Albania                      </option>
                                            <option value="3" >
                      Algeria                      </option>
                                            <option value="4" >
                      American Samoa                      </option>
                                            <option value="5" >
                      Andorra                      </option>
                                            <option value="6" >
                      Angola                      </option>
                                            <option value="7" >
                      Anguilla                      </option>
                                            <option value="8" >
                      Antarctica                      </option>
                     <option value="239" >
                      Zimbabwe                      </option>
                                          </select>
                </div></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
              <td><span class="left_form">Zip /Pin <span class="err">*</span></span></td>
              <td><span class="right_form">
                <input  class="textbox_form" tabindex="8" type="text" name="zip" id="zip" value="" />
              </span></td>
              <td>&nbsp;</td>
            </tr>
            
                        <!-- Aeon - Added radio buttons for PGH - 22-05-12-->
                                <script type="text/javascript">
                    function pgh_check(a)
                    {
					 am=parseInt(a);
					 if(am<100)
					 {
					  alert("Amount should be more than 100!");
					  document.getElementById("amount").value='';
					 }
                    }</script>
            <tr>
              <td height="24" class="left_form">Amount <span class="err">*</span></td>
              <td><table width="100%" border="0" cellspacing="6">
                  <tr>
                    <td><input type="radio" name="pgh" id="pgh" tabindex="13"  value="100000"  onclick="javascript:clearAmt(this.value);" />
                        <strong>1,000 Trees<br />
                        (USD 2,000 /  Rs. 100,000)</strong><br /></td>
                  </tr>
                  <tr>
                    <td><input type="radio" name="pgh" id="pgh" tabindex="12"  value="50000"  onclick="javascript:clearAmt(this.value);" />
                        <strong>500 Trees<br />
                          (USD 1,000 / Rs. 50,000)</strong><br /></td>
                  </tr>
                  <tr>
                    <td><input type="radio" name="pgh" tabindex="11" id="pgh"  value="25000"  onclick="javascript:clearAmt(this.value);" />
                        <strong>250 Trees<br />
                          (USD 500 / Rs. 25,000)</strong><br /></td>
                  </tr>
                  <tr>
                    <td><input type="radio" name="pgh" tabindex="10" id="pgh"  value="10000" onclick="javascript:clearAmt(this.value);" />
                        <strong>100 Trees <br />
                          (USD 200 / Rs. 10,000)</strong><br /></td>
                  </tr>
                  <tr>
                    <td><input type="radio" name="pgh" tabindex="9" id="pgh" value="1000" onclick="javascript:clearAmt(this.value);" />
                        <strong>10 Trees<br />
                        (USD 20 / Rs. 1,000)</strong><br/>                    </td>
                  </tr>
                  <tr>
                    <td><input type="radio" name="pgh" id="pgh" tabindex="8" value="others" onclick="javascript:clearAmt(this.value);" />
                      Other Amount
                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input class='textbox_form' tabindex="7" type='text' name='amount' onblur="pgh_check(this.value)" id='amount' onkeypress="javascript:return isAmount(event);" />
            </p></td>
                  </tr>
              </table></td>
              <td></td>
            </tr>
                        <!--CODE END-->
            <!-- Thomas - Added radio buttons for GSAP - 15-06-12-->
                        <!--Thomas add CODE END-->
                        
            <tr>
              <td colspan="3">             </td>
            </tr>
            <tr>
              <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="54%">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left"><input type="checkbox" tabindex="17"  name="anon" id="anon" value="yes"/>
                    I would like to donate anonymously</td>
                  <td colspan="2"><span style=" color:#FF0000;">
                  </td>
                </tr>
                <tr>
                  <td align="left"><input type="checkbox" tabindex="20" checked="checked" name="terms" id="terms" value="Y"/>
                    I've read and accepted the <a href="https://www.giveisha.org/index.php?option=com_profile&amp;task=sterms" target="_blank">terms of service</a>*</td>
                  <td colspan="2" style="">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td colspan="2" style=" color:#FF0000;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left"><span style=" color:#FF0000;"><img src="/templates/isha/images/cardlogo.gif" alt="" width="214" height="37" title="Visa, Master, Dinners and Discover cards only accepted" /></span></td>
                  <td colspan="2" style=" color:#FF0000; height:80px;"><input type="submit" name="submit2" onclick="return valDonateForm();" value="" class="payment-gateway"/></td>
                </tr>
                  </table></td>
            </tr>
          </table>
                                    
							
            </div></div></div>                
<div class="form_left_contain_one">
        	<div class="check_full">
        		<div class="check_left"></div>
       	  </div></div></div></div>
	</form> </body>
</div></div></div>



			
	  </div>
 	</div>
</div>


		
			<div class="footer_content">
			 <?php include "footer.php" ;?>
		</div>
<script type="text/javascript" >
	/*window.addEvent('domready', function() {
		$$('.submit').each(function(ele,i){	ele.addEvent('click',validation);});

	});*/

    function unhide(divID) {
      var item = document.getElementById(divID);
      if (item) {
        item.className=(item.className=='hidden_box')?'unhidden_box':'hidden_box';
      }
    }
    function popitup(url)
    {
        newwindow = window.open(url,'popupwindow','height=500,width=500,left=250,top=100,scrollbars=yes');
        if (window.focus) {newwindow.focus()}
            return false;

        return false;
    }
</script>
</div>
</body>
</html>
