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

/*
function myajax(url,info)
{
	$.ajax({
       type: 'POST',
       async:false,
       url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
       data: info,
      dataType: 'json',success: function(content) { 
      	if(content.error == true)
      	{
      		alert(content.msg);
      	}else if(content.error == false)
      	{
      		location.reload();  
      	}else{
      	alert(content);
      	}
      	
		  },
      error: function(content) { 
      	alert(content);
	   }
   });  
}
//够物车操作控制
function cartjson(shopid,goods_id,num,controltype,showdo,obj){//shopid,goods_id num control type;
	$.ajax({
       type: 'POST',
       async:false,
       url: siteurl+'/index.php?controller='+controltype+'&action=action',
       data: {'shopid':shopid,'goods_id':goods_id,'num':num},
        dataType: 'json',success: function(content) { 
      	if(content.error == true)
      	{
      		alert(content.message);
      	}else if(content.error == false)
      	{
      		 if(content.message == 'ok'){
      		 	//cartids 更新显示
      		 	var allobj = $('.show_ok');//当存在此表示已点此商品
      		 	if(allobj != undefined){
      		 		 $('.show_ok').hide();
      		 		 for(var i=0;i<content.cartids.length;i++){
      		 		 	  $('#show_ok_'+content.cartids[i]).show(); 
      		 		 } 
      		 	} 
      		  
      		 	if(showdo == 0){
      		 	 
      		 	var selectobj = $('#selectgc'+$(obj).attr('gdata'));
      		 	var allcost = Number($(selectobj).find("option:selected").val())*Number($(selectobj).attr('gcost'));
      		 		cartallcost(allcost);
      		 		$('#showdetcart'+$(obj).attr('gdata')).remove();
      		 	   
      		 	} 
      		 }else{
      		 	alert('购物车有其他店铺商品，请清空后继续添加');
      		 }
      	}else{
      	  alert(content);
      	}
      	
		  },
      error: function(content) { 
      	alert(content);
	   }
   }); 
}
function modifycart(obj){
		var findvalue = $(obj).find("option:selected").val(); 
	  $.ajax({
       type: 'POST',
       async:false,
       url: siteurl+'/index.php?controller=modifycart&action=action',
       data: {'shopid':$(obj).attr('sdata'),'goods_id':$(obj).attr('gdata'),'num':findvalue},
        dataType: 'json',success: function(content) { 
      	if(content.error == true)
      	{
      		alert(content.mes);
      	}else if(content.error == false)
      	{
      		 if(content.message == 'ok'){ 
      		 	 var bianhuancost = (Number($(obj).attr('olddata'))-Number(findvalue))*Number($(obj).attr('gcost'));
      		 	 //计算总价
      		 	 cartallcost(bianhuancost);
      		 	 $(obj).attr('olddata',findvalue);
      		 }else{
      		 	alert('购物车有其他店铺商品，请清空后继续添加');
      		 }
      	}else{
      	  alert(content);
      	} 
		  },
      error: function(content) { 
      	alert(content);
	   }
   });  
}
function cartallcost(changecost){
	var newNumb  = $('#cartallcost').text(); 
	var findcost = Number(newNumb) -Number(changecost);
	 $('#cartallcost').text(findcost); 
}
//刷新购物车
function freshcart(){
	$('#mycart').html('');
		 $.post(carlink, {},function (data, textStatus){ 
			  $('#mycart').html(data); 
			  $("#mycart").listview();
	}, 'html');
}
function myajax2(url,info)
{
	$.ajax({
       type: 'POST',
       async:false,
       url: url,
       data: info,
      dataType: 'json',success: function(content) { 
      	if(content.err == true)
      	{
      		alert(content.mes);
      	}else if(content.err == false)
      	{
      		location.reload();  
      	}else{
      	alert(content);
      	}
      	
		  },
      error: function(content) { 
      	alert(content);
	   }
   });  
}
*/