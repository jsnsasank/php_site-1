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
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validatePhone(phone) {
	  var re = /^[0-9()-]+$/;
	  return re.test(phone);
	}