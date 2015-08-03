$(function(){    
    if(regestercode ==  1){
    	$('#showgetcode').show();
    	$('#showinputcode').show();
    	$('#imgcode').hide();
    	clickyanzheng();
    }
}); 
//获取手机验证码
function clickyanzheng(){ 
	if($('#phone').html() == undefined){
		     var tempurl = siteurl+'/index.php?ctrl=member&action=regesteremail&random=@random@&email=@email@';
   	 	     tempurl = tempurl.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@email@',$('#email').val());
	         $.getScript(tempurl);    
	}else{
        var tempurl = siteurl+'/index.php?ctrl=member&action=regesterphone&random=@random@&phone=@phone@';
   	 	     tempurl = tempurl.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@phone@',$('#phone').val());
	         $.getScript(tempurl);    
	} 
}
function showsend(phone,time){  
  	    $('input[name="phone"]').val(phone);
        $('#dosendbtn').attr('time',time);
        setTimeout("btntime()",1000);   
}
function showsendemail(email,time){
	 $('input[name="email"]').val(email);
   $('#dosendbtn').attr('time',time);
   setTimeout("btntime()",1000);  
}

function noshow(msg){  
    	alert(msg);
}
function  btntime(){
	//dosendbtn
	if($('#phone').html() == undefined){
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
	   	 $('#dosendbtn').attr('value','发送邮箱验证码');
     }
		
	}else{
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
}