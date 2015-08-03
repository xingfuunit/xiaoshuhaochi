$(document).bind("mobileinit", function(){
	//Ë¢ÐÂ¹ºÎï³µ
	$( document ).on( "click", "#show_cart", function( e ) {
		
	    $('#mycart').html('');
		 $.post(carlink, {},function (data, textStatus){ 
			  $('#mycart').html(data);
			 
			  $("#mycart").listview();
			}, 'html');
			 
	});
}); 