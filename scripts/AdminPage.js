// Java script for admin page..

$(function(){
  	
	var path = window.location.pathname;
	var page = path.split("/").pop();
	
    switch (page){
    case 'AdminDashBoard.php':
    	$('#ajx_dash').addClass('sel');
    	break;
    case 'adminprofile.php':
    	$('#ajx_edit').addClass('sel');
        break;
    case 'events.php':
    	$('#ajx_event').addClass('sel');
        break;
    case 'reports.php':
    	$('#ajx_report').addClass('sel');
        break;
    case 'users.php':
    	$('#ajx_user').addClass('sel');
        break;
    	
    }
    
});

//edit user profile. Inline edits
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
	
});
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validatePhone(phone) {
	  var re = /^[0-9()-]+$/;
	  return re.test(phone);
	}
$(document).ready(function() {
	  showReqTable("ALL");
	   $('#req').change( function() {

	    status = $('#req option:selected').text();
	    showReqTable(status)
	    });
});

function showReqTable(status){
	$.ajax({
		url: "scripts/getreqs.php",
		type: "POST",
		data: {'status':status},
		success:function(data){
			
			$('#req_result').html(data);
		},
		  error: function(xhr,desc,err){
			  console.log("failed with error : " + xhr + "\n"+err);
		  }
	}) //Ajax
	
}

$(document).ready(function() {
	$("#freetrees").on("click", function(e){
		$.ajax({
			url: "scripts/freetrees.php",
			type: "POST",
			success:function(data){
				$('#freetree_result').html(data);
			},
			  error: function(xhr,desc,err){
				  console.log("failed with error : " + xhr + "\n"+err);
			  }
		}) //Ajax
		
		
	}); // click 

});

$(document).ready(function() {

	$("#saveEvent").on("click", function(e){
		
	$('#eventerror').text('');
	var ename 	  = $('#Eventname').val();
	var edate 	  = $('#Eventdate').val();
	var etime 	  = $('#Eventtime').val();
	var elocation = $('#Eventlocation').val();
	var edesc 	  = $('#Description').val();
	var elead     = $('#lead').val();
	var eleadname = $("#lead option:selected").text();
	
	if(ename.length == 0){
	  $('#eventerror').text("Please Fill the event name");
	  return false;
	}
	if(edate.length == 0){
	  $('#eventerror').text("Please Fill the event Date");
	  return false;
	}
	if(etime.length == 0) {
	  $('#eventerror').text("Please Fill the event Time");
	  return false;
	}
	if(elocation.length == 0){
	  $('#eventerror').text("Please Fill the event Location");
	  return false;
	}
	
	var lead_reg = /^\d+$/;
	if(!lead_reg.exec(elead)){
		$('#eventerror').text("Please Select a Lead Volunteer.");
		return false;
	}
	e.preventDefault();
	
	$.ajax({
		url: "scripts/addEvent.php",
		type: "POST",
		data: {'name':ename,'date':edate,'time': etime,'location':elocation,'desc':edesc,'lead':elead,'leadname':eleadname},
		success:function(json){
			$.each(json,function(i,item){
				if(item == "successful"){
					$('#eventstatus').text("New event Succssfully created and Uniq Trees are allocated; Lead Volunteer is : "+eleadname);
					$('#neweventform').find('input:text').val(''); 
				}else{
					$('#eventstatus').html("<span style='color:red'>DB Error: "+item+"</span>");
				}
			
			})
		},
		error: function(xhr,desc,err){
		  console.log("failed with error : " + xhr + "\n"+err);
		}
	}) //ajax
		
		
	}); // click 
});
