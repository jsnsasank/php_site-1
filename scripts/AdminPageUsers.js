$(document).ready(function(){
	$(".ulink").on("click", function(e){
	  e.preventDefault();
	  var uid = $(this).attr('href');
	  $.ajax({
			url: "scripts/deleteUser.php",
			type: "POST",
			data: {'uid': uid },
			success:function(data){
				if(data == "successful"){
					location.reload();
					$('#dbresult').text("User Delete Succssfully");
					
				}else{
					$('#dbresult').text("DB Error. Pls contact site admin");
					
				}	
			},
			  error: function(xhr,desc,err){
				  console.log("failed with error : " + xhr + "\n"+err);
			  }
			
		})//Ajax
		
	});
});
