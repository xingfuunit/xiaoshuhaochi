  var is_open = false; 
 $(function(){  
 	  $('.return').bind("click", function() {    
	    history.back();
   });
 });
 
 

/*
obj  显示对象
msg  说明信息
*/
function  error(obj,msg){
	var contents = '<section class="nocontent"> <img width="74" src="'+siteurl+'/upload/images/nocontent.png" alt="">  <p>'+msg+'</p>  </section>    ';
	$(obj).html(contents);
} 
//获取连接参数
function Request(name)
{ 
     new RegExp("(^|&)"+name+"=([^&]*)").exec(window.location.search.substr(1)); 
     return RegExp.$2; 
}
function strToJson(str){ 
  return JSON.parse(str); 
}
function call_login(){ 
   window.location = siteurl+'/index.php?controller=html5&action=login';
}
function set_user(datas){ //设置用户信息 
	$('body').append('<input type="hidden" name="uid" value="'+datas.data.uid+'">'); 
	$('body').append('<input type="hidden" name="username" value="'+datas.data.username+'">');
	$('body').append('<input type="hidden" name="userlogo" value="'+datas.data.userlogo+'">'); 
}
function setcityname(datas){
	$('#cityname').text(datas.cityname);
	$('body').append('<input type="hidden" name="city" value="'+datas.cityid+'">'); 
	if(datas.cityid == 0){
	    window.location.href = 'choice.html';
	}
}

//根据连接传数据
function ajaxback(url,info)
{
	var backmessage = {'flag':true,'content':''};
	$.ajax({
       type: 'POST',
       async:false,
       url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
       data: info,
      dataType: 'json',success: function(content) { 
      	if(content.error == false)
      	{
      	 
      	   backmessage['flag'] = false;
      	   backmessage['content'] = content.msg;
      	  // alert(backmessage['flag']);
      	}else{
      		if(content.error == true)
      	  { 
      	  	backmessage['content'] = content.msg;
      	  }else{
      	   backmessage['content'] = content;
      	  }
        }
      	
		  },
      error: function(content) { 
      backmessage['content'] = '提交数据失败';
	   }
   });  
   return backmessage;
}
//弹出层 信息
function Tmsg(msg){
	$('body').append('<div id="mask" style="" ></div>'); //创建遮照层
	$('body').append('<div class="popup w580" style="display:none;"><div class="popup-hd"><a id="closex" title="关闭" class="closex closegb" href="javascript:void(0);"><span>关闭</span></a></div><h3>提示</h3><p id="alertbox-msg" class="position02">'+msg+'</p><div class="bgPray"><input id="alertbox-OK" class="inputBtn05 closegb" type="button" value="确定"></div></div>');
  $('.popup').slideToggle();
}
$('.closegb').live("click", function() {   
	 $('.popup').slideToggle('slow',function(){$('#mask').remove();$('.popup').remove();}); 
});

function dolink(url){ 
  window.location.href=url;
}

 