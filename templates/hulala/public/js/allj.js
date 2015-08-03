///$("body").append($("p:first").clone(true)); 复制节点包含属性






$(document).ready(function(){ 
 

	$(window).scroll(function(){
		if($(this).scrollTop()!=0){			
			if($('.hc_content').html() != undefined){
			var offset = $('.hc_content').offset();						
			$('#toTop').css('left',offset.left+1001);
			$('#toTop').fadeIn();
		 }
		}else{
			if($('.hc_content').html() != undefined){
			$('#toTop').fadeOut();
		}
		} 
	});
	
	$('#toTop').click(function(){
		//back to top
		$('body,html').animate({scrollTop:0},400);
	});
   
}) 
 
function freshcode()
{ 	
	var radom = 1+Math.round(Math.random()*1000); 
	$('#captchaimg').attr('src',siteurl+'/index.php?controller=site&action=getCaptcha&random='+radom); 
}
function outputphp(info)
{
	alert(info);
}
function myajax(url,info)
{
	$.ajax({
       type: 'POST',
       async:false,
       url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
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
      	   backmessage['content'] = content.message;
      	  // alert(backmessage['flag']);
      	}else{
      		if(content.error == true)
      	  { 
      	  	backmessage['content'] = content.message;
      	  }else{
      	   backmessage['content'] = content;
      	  }
        }
      	
		  },
      error: function(content) { 
      backmessage['content'] = '数据获取失败';
	   }
   });  
   return backmessage;
}
function subform(newurl,obj)
{
	var url = $(obj).attr('action'); 
	$.ajax({
     type: 'post',
     async:false,
     data:$(obj).serialize(),
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	if(content.error == false){
     		diasucces('操作成功',newurl);
     	}else{
     		if(content.error == true)
     		{
     			diaerror(content.msg); 
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) { 
    	diaerror('数据获取失败'); 
	  }
   });   
   
	return false;
}
function diaerror(msg)
{
	var dialog =  art.dialog({
    time: 2,
    content: msg
  });
}
function artsucces(msg)
{
	var dialog =  art.dialog({
    time: 1,
    content: msg
  });
}
function showop(msg)
{
	$('#tipInfo').show();
}
function hideop()
{
	$('#tipInfo').hide();
}
function diasucces(msg,linkurl)
{
	    alert(msg);
    	if(linkurl == null || linkurl== '' || linkurl == undefined)
	    { 
	    	window.location.reload();
	    }else{
	    	 
	    	window.location.href=linkurl;
	    } 
} 
function remind(obj){
  if(confirm('确定操作吗？')){
    var url = $(obj).attr('href'); 
	 $.ajax({
     type: 'get',
     async:false,
     data:$(obj).serialize(),
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {  
     	if(content.error == false){
     		diasucces('操作成功','');
     	}else{
     		if(content.error == true)
     		{
     			diaerror(content.msg); 
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) { 
    	diaerror('数据获取失败'); 
	  }
   });   
  }
  return false;
}
function collect(obj){
	 var url = $(obj).attr('href'); 
	 $.ajax({
     type: 'get',
     async:false, 
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {  
     	if(content.error == false){
     		if(content.type == null|| content.type=='' ||content.type=='0')
     		{
     		   freshshopcllect();
     		}
     		//diasucces('操作成功','');
     	}else{
     		if(content.error == true)
     		{
     			diaerror(content.msg); 
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) { 
    	diaerror('数据获取失败'); 
	  }
   }); 
     
   return false;
}
function freshshopcllect()
{
	var checkob = $('#collectlist');
	if(checkob != undefined)
	{
		var newurl = siteurl+"/index.php?controller=site&action=collect";
     			$.get(newurl,function(data){
        	$('#collectlist').html(data);
           },'html');
   }
}
function delcollect(obj)
{
	 var url = siteurl+'/index.php?controller=site&action=delcollect&@random@'; 
	 $.ajax({
     type: 'post',
     async:false,
     data:{'collectid':$(obj).attr('shop_id'),'type':$(obj).attr('typeid')},
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {  
     	if(content.error == false){
     		if(content.type == null|| content.type=='' ||content.type=='0')
     		{
     		   freshshopcllect();
     		}
     		//diasucces('操作成功','');
     	}else{
     		if(content.error == true)
     		{
     			diaerror(content.msg); 
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) { 
    	diaerror('数据获取失败'); 
	  }
   }); 
     
   return false;
}
function Is_Chuname(str){
	 var reg = /[^\u4e00-\u9fa5]/;
    if(str.length < 1){
     return false;
    }else{
	    if (reg.test(str))
	    {
	  	 return false;
	    }else{
	   return true;
	   }
	} 
}
function Is_phone(str){
var reg = /^1+(3|5|8)+\d{9}$/;
return reg.test(str);
}