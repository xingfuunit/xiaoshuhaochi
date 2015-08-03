$(function(){    
   	     var tempurl = siteurl+'/index.php?ctrl=site&action=phonecode&random=@random@&phone=@phone@';
   	 	   tempurl = tempurl.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@phone@',$('#phone').val());
	       $.getScript(tempurl);  
   	     $('#uphone').bind("blur", function() {   
   	 	       var tempurl = siteurl+'/index.php?ctrl=site&action=phonecode&random=@random@&phone=@phone@';
   	 	         tempurl = tempurl.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@phone@',$('#phone').val());
	            $.getScript(tempurl);      
         }); 
}); 
function showsend(phone,time){
	if($('#showcode').html() == undefined){
    $('#uphone').html('<input type="button" value="发送手机验证码" id="dosendbtn" time="'+time+'" style="float:left;">'); 
    $('#uphone').parent().after('<div class="cart_out_show" id="showcode"><label > 验 证 码：</label><input id="phonecode" class="hc_order_input_box" type="text" value="" size="10" name="phonecode"><span class="hc_order_lists_span_color"> * </span><span class="hc_order_lists_span"></span></div>');        
     if($('#uphone').val() == ''){
    	 $('#uphone').val(phone);
     }
     $('#dosendbtn').bind("click", function() {    
   	 	 var tempurl = siteurl+'/index.php?ctrl=site&action=setphone&random=@random@&phone=@phone@';
   	 	     tempurl = tempurl.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@phone@',$('#phone').val());
	         $.getScript(tempurl);      
    });
     $('#dosendbtn').attr('time',time);
      setTimeout("btntime()",1000);
  }else{
  	 if($('#uphone').val() == ''){
  	     $('#uphone').val(phone);
     }
     $('#dosendbtn').attr('time',time);
     setTimeout("btntime()",1000); 
  }
}

function removesend(){
	//setTimeout
	$('#dosendbtn').remove();
	$('#showcode').remove();
}
function  btntime(){
	//dosendbtn
	var nowtime = Number($('#dosendbtn').attr('time'));
	if(nowtime > 0){
	   $('#dosendbtn').attr('disabled',true);
	   var c = Number(nowtime)-1;
	    $('#dosendbtn').attr('time',c);
	    var  mx = 120-(120 - Number(c));
	     $('#dosendbtn').attr('value','验证码还有'+mx+'秒失效');
	      setTimeout("btntime()",1000);
	}else{
		 $('#dosendbtn').attr('disabled',false);
		 $('#dosendbtn').attr('value','发送手机验证码');
  }
}