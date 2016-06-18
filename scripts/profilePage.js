// javascript for User Dashbaord page

// function for change the class variable to hide / show the section.
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#w section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});

// edit user profile. Inline edits
$(document).ready(function(){
	$(".editlink").on("click", function(e){
	  e.preventDefault();
		var dataset = $(this).prev(".datainfo");
		var savebtn = $(this).next(".savebtn");
		var theid   = dataset.attr("id");
		var newid   = theid+"-form";
		var currval = dataset.text();
		dataset.empty();
		
		$('<input type="text" name="'+newid+'" id="'+newid+'" value="'+currval+'" class="hlite">').appendTo(dataset);
		
		$(this).css("display", "none");
		savebtn.css("display", "block");
	});
	$(".savebtn").on("click", function(e){
		e.preventDefault();
		var container = $('#updatestatus');
		$(container).html(" ");
		var elink   = $(this).prev(".editlink");
		var dataset = elink.prev(".datainfo");
		var newid   = dataset.attr("id");
		
		
		var cinput  = "#"+newid+"-form";
		var einput  = $(cinput);
		var newval  = einput.val();
		console.log(newid);
		
		if(newid == "Email"){
			if(!validateEmail(newval)){
				$(container).html("<span style='color:red'>Invalid Email Format</span>");
				return false;
			}
		}
		
		if(newid == "Phone"){
			if(!validatePhone(newval)){
				$(container).html("<span style='color:red'>Invalid Phone Number</span>");
				return false;
			}
		}
		
		$(this).css("display", "none");
		einput.remove();
		$.ajax({
			url: "scripts/update_account.php",
			type: "POST",
			data: {'column':newid,'dbval':newval,'uid': uid},
			success:function(data){
				if(data == "successful"){
					dataset.html(newval);
					$(container).html("<span style='color:green'>Update Succssfull</span>");
				}else{
					$(container).html("<span style='color:red'>"+data+"</span>");
				}
							
				elink.css("display", "block");
							
			},
			  error: function(xhr,desc,err){
				  console.log("failed with error : " + xhr + "\n"+err);
			  }
			
		})//Ajax
		
	});
});

$(document).ready(function(){
	$('.enlink').on("click", function(e){
	   e.preventDefault();
	   var cline = $(this).parent().prev('.hidden');
	   var ctd = $(this).parent();
	   var eventID = cline.text();
	   console.log(ctd);
		$.ajax({
			url: "scripts/evt_enroll.php",
			type: "POST",
			data: {'EventID':eventID,'uid': uid},
			success:function(data){
				if(data == "Registered"){
					ctd.html("<span style='color:red'>You are already volunteered</span>");
				}
				if(data == "successful"){
					ctd.html("<span style='color:green'>Done. Thank you!</span>");
					//$(container).html("<span style='color:green'>Update Succssfull</span>");
				}else{
					//$(container).html("<span style='color:red'>"+data+"</span>");
				}	
											
			},
			  error: function(xhr,desc,err){
				  console.log("failed with error : " + xhr + "\n"+err);
			  }
			
		})//Ajax
	   
		
	});
	
});

$(document).ready(function(){
	$("#req-button").on("click", function(e){
	e.preventDefault();
	var req_status = $('#req-status');
	req_status.html("");
	var loc = $('#req-location').val();
	var species = $('#species').val();
	var quant = $('#quantity').val();
	var comments = $('#req-comments').val();
	
	if(loc.length == 0){
		req_status.html("<span style='color:red'>Location can not be empty.</span>");
		return false;
	}
	
	if(species.length == 0){
		req_status.html("<span style='color:red'>Please select species.</span>");
		return false;
		
	}
	
	if(quant.length == 0 ){
		req_status.html("<span style='color:red'>Please Enter quantity</span>");
		return false;
	}
	
	if(comments.length == 0){
		req_status.html("<span style='color:red'>Please enter comments</span>");
		return false;
		
	}
	
	var qexp = /^[0-9]$/;
	
	if(!qexp.test(quant)){
		req_status.html("<span style='color:red'>Only Numbers are allowed</span>");
		return false;
	}
	
	if(quant < 0){
		req_status.html("<span style='color:red'>Can not be a negative number</span>");
		return false;
	}
	
	$.ajax({
		url: "scripts/add_req.php",
		type: "POST",
		data: {'loc':loc,'species':species,'quant':quant,'uid': uid,'comments':comments},
		success:function(json){
			$.each(json,function(i,item){
				if(i == "rspcode"){
					$('#reqcode').html("<span style='color:green'>Your Request Received.Pls Note down confirmation # "+item+"</style>");
				}else{
					$('#reqcode').html("<span style='color:red'>Error: "+item+"<br>contact administrator</style>");
				}
				
			}) // loop
										
		},
		  error: function(xhr,desc,err){
			  console.log("failed with error : " + xhr + "\n"+err);
		  }
		
	})//Ajax
	
	
		
		
	});
});

$(document).ready(function(){
	$("#rqimage").on("click", function(e){
		e.preventDefault();
		var search_span = $('#searchspan');
		search_span.text('');
		var treeid = $('#rqsearch').val();
		if(treeid.length == 0){
			search_span.text('Pls Enter tree Identifier');
			return false;
		}
		var rexp = /^[RQ][0-9A-Z]+$/;
		if(!rexp.test(treeid)){
			search_span.text('Request confirmation starts with : RQ');
			return false;
		}
		$.ajax({
			url: "scripts/search_treeid.php",
			type: "POST",
			data: {'treeid':treeid,'uid':uid},
			success:function(data){
				$('#rqresult').html(data);
											
			},
			  error: function(xhr,desc,err){
				  console.log("failed with error : " + xhr + "\n"+err);
			  }
			
		})//Ajax
		
	});
});
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validatePhone(phone) {
	  var re = /^[0-9()-]+$/;
	  return re.test(phone);
	}