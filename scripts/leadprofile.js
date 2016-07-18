// leadprofile.js
// for lead volunteer task
$(document).ready(function(){
	 var reqArray;
	 var _eventID;
	$('.leadevent').on("click", function(e){
	   e.preventDefault(); 
	   $('#neweventform').fadeOut();
	   $('#neweventform').fadeIn(2000);
	    _eventID   = $(this).attr('href');
	   var _eventname = $(this).parent().prevAll().eq(3).text();
	   
	   $('#eventid').val(_eventID);
	   $('#eventname').val(_eventname);
	   $('#requl').empty();
	   reqArray = [];
	
		function addReq(reqid)
		{
		  var ul       = $('#requl');
		  var li_list  = ul.find('li');
		  var found    = false;
		  
		  if(li_list.length != 0 ){
			  $.each(li_list,function(i,item){
				  var x = $(item).text()
				  if(x == reqid){
					  found = true;
					  return false;
				  }
			  }) // loop
			 
			 if(!found) {
				 ul.append('<li>' + reqid + '</li>');
				 reqArray.push(reqid);
			 }
			   
		  } else{
			  ul.append('<li>' + reqid + '</li>');
				reqArray.push(reqid);  
		  }
		
		}
		
	  
	   $('#requestid').change( function() {
		    reqid = $('#requestid option:selected').val();
		    addReq(reqid)
		});
	   
		
	});

  $("#saveEvent").on("click", function(e){
		e.preventDefault();
		console.log(reqArray);
		  
		$.ajax({
		    url: "scripts/leadeventmgmt.php",
		    type: "POST",
			data: {'eventid': _eventID, 'reqs': reqArray},
			success:function(json){
			  $.each(json,function(i,item){
				  if(item == "successful"){
					  alert('Event has been Updated');
					  location.reload();
				  }else {
					 $('#evterror').html("FAIED with error:<br>"+item);
				  }
			  })//loop
			 },
			error: function(xhr,desc,err){
			console.log("failed with error : " + xhr + "\n"+err);
			}
				
			})//Ajax
			
		});
	
});