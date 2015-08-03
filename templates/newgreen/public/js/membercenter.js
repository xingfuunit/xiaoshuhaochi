$(function(){ 
   autosize();
});
function autosize()
{
	var leftheight = document.getElementById("left_id").clientHeight;
var rightheight = document.getElementById("right_id").clientHeight;
var setheight = leftheight > rightheight?leftheight:rightheight;
 $('#left_id').css('height',setheight);
 $('#right_id').css('height',setheight); 
}
 
function autoaddheight(adheight)
{
	 var backsize =  $('.hc_userinfo_content_div').eq(0).css('height');
	  backsize = backsize.split('px');
	          backsize = backsize[0];
 	 var newsize = Number(adheight)+Number(backsize);
	 var rightheight =  $('#right_id').css('height');
	     rightheight = rightheight.split('px');
	     rightheight = rightheight[0];
	     rightheight = Number(rightheight)+Number(adheight);
	 var leftheight = document.getElementById("left_id").clientHeight;
	      leftheight = Number(leftheight)+Number(adheight);
	      /*
	 if(newsize > 570)
	 {
	 	 $('.hc_userinfo_content_div').eq(0).css('height',newsize+'px');  //°×É«¿ò 
	 }else{
	 	  $('.hc_userinfo_content_div').eq(0).css('height','570px'); 
	 }*/
	// alert(rightheight);
	 if(rightheight > 608)
	 {
	   $('#left_id').css('height',rightheight+'px');
     $('#right_id').css('height',rightheight+'px');
     var jieguo = Number(rightheight) - 608;
         jieguo =Number(jieguo)+572;
     $('.hc_userinfo_content_div').eq(0).css('height',jieguo+'px'); 
     
   }else{
   	$('#left_id').css('height','608px');
     $('#right_id').css('height','608px');
     $('.hc_userinfo_content_div').eq(0).css('height','572px'); 
   }
	  
}