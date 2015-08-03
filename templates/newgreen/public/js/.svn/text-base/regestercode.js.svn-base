$(function(){    
    if(regestercode ==  1){
    	$('#showgetcode').show();
    	$('#showinputcode').show();
    	$('#imgcode').hide();
    	//clickyanzheng();
    }
}); 
//获取手机验证码
function clickyanzheng(){ 
   
        /* var phone=/^(((13[0-9]{1})|(15[0-9]{1})|(14[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if(!phone.test($("#phone,#mobile_email_reg,.mobile_email_reg").val())) {
            alert("请输入正确的手机号码");
            return false;
        }*/
     
	if($('#phone').html() == undefined && !$('.mobile_email_reg').val() && regestercode !== 4){
		     var tempurl = siteurl+'/index.php?controller=member&action=regesteremail&random=@random@&email=@email@';
   	 	     tempurl = tempurl.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@email@',$('#email').val());
	         $.getScript(tempurl);    
	}else{
            if (regestercode == 0) {
                 var tempurl = siteurl+'/index.php?controller=member&action=regesterphone&code_back=0&random=@random@&phone=@phone@';
            }else if(regestercode == 2){
                var tempurl = siteurl+'/index.php?controller=member&action=regesterphone&code_back=1&random=@random@&phone=@phone@';
            }else if(regestercode == 3){
                var tempurl = siteurl+'/index.php?controller=member&action=regesterphone&random=@random@&phone='+$("#mobile_email").val();
            }else{
                var tempurl = siteurl+'/index.php?controller=member&action=regesterphone&random=@random@&phone=@phone@';
            }
       
   	 	     tempurl = tempurl.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@phone@',$('#phone').val());
	         $.getScript(tempurl);    
	} 
       
}
function showsend(phone,time){ 
   
  	 $('input[name="phone"').val(phone);
        $('#dosendbtn').attr('time',time);
        setTimeout("btntime()",1000);  
    
}
function showsendemail(email,time){
	 $('input[name="email"').val(email);
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
function code_login() {
    var phone = $("#logEmailOrPhone").val();
    var code = $('#login_code').val();
    
}