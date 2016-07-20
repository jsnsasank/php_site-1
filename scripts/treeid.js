// show tree id status.. 
function deselect(e) {
  $('.pop').slideToggle(function() {
	  e.removeClass('selected');
  });    
}

$(document).ready(function(){ 

$("#searchtree").click(function(e){
	e.preventDefault();
    $('#iderror').text('');
	 var treeid = $('#searchinput').val().replace(/ /g,'');
	 if(treeid.length == 0){
		$('#iderror').text('Please Enter the Treeid');
		return false
	 }
	 if(treeid.length < 9){
		$('#iderror').text('Identifer is a 9 digit alpha numeric string');
		return false 
	 }
	 
	$.ajax({
		url: "scripts/find_tree.php",
		type: "POST",
		data: {'treeid':treeid},
		success:function(htmlresult){
			console.log(htmlresult);
			$('#searchResult').html(htmlresult);
			 if($(this).hasClass('selected')) {
			      deselect($(this));               
			    } else {
			      $(this).addClass('selected');
			      $('.pop').slideToggle();
			    }
											
		},
		error: function(xhr,desc,err){
			console.log("failed with error : " + xhr + "\n"+err);
			$('#searchResult').html('DB ERROR!!');
	    }
			
		})//Ajax

 });
$('.close').on('click', function() {
    deselect($('#searchtree'));
    return false;
  });

}); 