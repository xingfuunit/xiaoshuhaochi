$(function(){ 
	$('body').append('<div id="addload" style="position: absolute; z-index: 1000; left: 30%; top: 30%; opacity: 1; display: none; width: 16px;height: 16px;background-position: -431px -20px;line-height: 12px;overflow:hidden;"></div>'); 
	/**菜谱样式切换**/
	$('.changelisttype span').bind("click", function() {   
		   var Nowclassname= $(this).attr('class');
		   if(Nowclassname == 'wordli'){
		   	$(this).removeClass('wordli').addClass('wordlion');
		   	$('.imglion').addClass('imgli').removeClass('imglion');
		   	changegoodslist('goodslistimgtype','goodslisttype');
		   }else if(Nowclassname == 'wordlion'){
		   }else if(Nowclassname == 'imglion'){
		   }else if(Nowclassname == 'imgli'){
		   	$(this).removeClass('imgli').addClass('imglion');
		   	$('.wordlion').addClass('wordli').removeClass('wordlion');
		   	changegoodslist('goodslisttype','goodslistimgtype');
		   } 
  });
  /***滚动js***/
  $(window).scroll(function(){
  	gundong(this); 
	});
	freshcart();
	$('.onsell').bind("click", function() {   
		addonedish($(this).attr('goodsid'),$(this).attr('shopid'),1,$(this)); 
	}); 
	$('.Menubox_01 li').bind("click", function() {   
		$('.shopshow_content').find('.goods_div').eq($(this).index()).show().siblings().hide();
		$('.shopshow_cart').show(); 
		$(this).addClass('hover').siblings().removeClass('hover');
	});
	getPingjia(0);
	getliuyan(0);
	
});
//获取评价
function getPingjia(page)
{
	///$('#Comloading').show();
 
  	 $('#det_commm').html('');
  	 var url = siteurl+"/index.php?ctrl=order&action=commentshop"; 
	   $.post(url, {'id':shopid,'type':'shop','page':page},function (data, textStatus){ 
	  
		$('#det_commm').append(data); 
	 
	  }, 'html');
  
}
//获取留言
function getliuyan(page)
{
	 
  	$('#showaskid').html('');
  	 var url = siteurl+"/index.php?ctrl=ask&action=newshopask";
 
	   $.post(url, {'id':shopid,'showtype':'shop','page':page},function (data, textStatus){  
		$('#showaskid').html(data); 
		if(data == null || data=='')
		{ 
		 }  
		
	  }, 'html');
  
}
function InFocus(obj)
{
	if($(obj).val() == $(obj).attr('data'))
	{
		$(obj).val('');
	} 
}
function outF(obj){
  if($(obj).val() == ''){
   $(obj).val($(obj).attr('data'));
  }
}
//鍙戝竷鐣欒█
function AddMessage()
{
	if($('#MContent').val() == $('#MContent').attr('data')|| $('#MContent').val()=='')
	{
		 diaerror('留言内容不能为空'); 
	}else{
	  var url = siteurl+'/index.php?ctrl=ask&action=saveask&datatype=json'; 
    var backinfo = ajaxback(url,{'shopid':shopid,'content':$('#MContent').val(),'type':'0'}); 
    if(backinfo.flag == false){ 
    	 $('#Msgloading').show();
	  		 $('#Msgnon').hide();
	  		 $('#MContent').val($('#MContent').attr('data'));
       $('#Msgul').html(''); 
       $('#liuyanpage').val(1);
       getliuyan();
     }else{ 
     	 diaerror(backinfo.content); 
    }
  }  
}
/*切换样式*/ 
function changegoodslist(nowclass,toclass){
	$('.'+nowclass).css({'opacity':'0'});
	$('.'+nowclass).removeClass(nowclass).addClass(toclass);
	$('.'+toclass).css({'opacity':'0'});
	$("."+toclass).animate({'opacity':'1'},1000);   
}
//购物车动画
function cartimg(obj){
	     $("#addload").show(); 
        var pos =$(obj).offset();
       var topval = pos.top;
       var leftval = Number(pos.left)+39;
       $("#addload").css("top", topval + "px"); 
       $("#addload").css("left", leftval + "px");
       $("#addload").css({'width':'16px','height':'16px','margin-top':'0px','opacity':'1'});  
       $("#addload").animate({'opacity':'0','margin-top':'-30px'},"slow",function(){
           freshcart();
       }); 
} 
//添加购物车
function addonedish(gid,tshopid,num,obj){   
	var url= siteurl+'/index.php?ctrl=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
   var bk = ajaxback(url,'');
   if(bk.flag == false){  
	       cartimg(obj); 
   }else{
	    	diaerror(bk.content);
	 } 
}
//增加商品数量
function uponedish(gid,tshopid,num){ 
	var url= siteurl+'/index.php?ctrl=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
    	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	diaerror(bk.content);
	    }
}
//清空购物车
function delshopcart(){
	if(confirm('确认清空购物车')){
	var url= siteurl+'/index.php?ctrl=site&action=clearcart&shopid='+shopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	diaerror(bk.content);
	    }
  }
  return false;
}
//删除已道菜品
function removeonedish(gid,tshopid,num){ 
	 $('#loading').show();
	 url = siteurl+'/index.php?ctrl=site&action=downcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
	  	 url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	diaerror(bk.content);
	    }
	  
} 
//删除商品
function removesupplierdish(gid,tshopid){
 
	url = siteurl+'/index.php?ctrl=site&action=delcartgoods&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
	url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	diaerror(bk.content);
	    }
} 
//刷新购物车
function freshcart(){  
	    url = siteurl+'/index.php?ctrl=site&action=smallcatding&shopid='+shopid+'&random=@random@';
	    url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
	    $.get(url, function(result){  
        $(".shopshow_cart").html(result); 
      }); 
}
//滚动变化
function gundong(obj){
 if($(obj).scrollTop() > 270){
   $('.goodsnav').css({'position':'fixed','top':'0px'});
  $('.shopshow_cart').css({'margin-top':$(obj).scrollTop()-270});
 }else{
 	$('.goodsnav').css({'position':''});
 	$('.shopshow_cart').css({'margin-top':0});
 }
}
function scollto(obj){
 $('html,body').animate({scrollTop: $(obj).offset().top-$(obj).height()}, 1000);
}
//订座位弹出层
function outdiv_position(){
	$('body').append('<div id="cat_zhe" class="cart_zhe"></div>');
	$('body').append('<div id="goosshow" class="cart_position"></div>'); 
	$('#goosshow').html(cartouthtml); 
	$('#goosshow').find('.title').eq(0).text('预订桌位');
	maketimenenu();
	$('#paytypeshow').hide();
	$('#uphone').bind("blur", function() {   
   	 	     gophone();    
    }); 
    $('input[name="subtype"]').val(1);
	gophone();   
}
function close_pop(divid){
   if($('#cfbtn').attr('disabled')=='disabled'){
   	diaerror('数据提交中..');
    	return false;
   }
	 
	$('#'+divid).remove();
	$('#cat_zhe').remove();
}
function outdiv_cart(){
	if($('.cartgoodslist').find('li').length < 1){
	  diaerror('购物车内暂无商品');
	  return false;
	}
		$('body').append('<div id="cat_zhe" class="cart_zhe"></div>');
	$('body').append('<div id="goosshow" class="cart_posicart"></div>'); 
	$('#goosshow').html(cartouthtml); 
	$('#goosshow').find('.title').eq(0).text('点单预订');
	$("#goosshow").find('.goodsshow').eq(0).html($('.shopshow_cart').html());
	
	maketimenenu();
	gophone();   
	$('input[name="subtype"]').val(2);
}
function maketimenenu(){
	var selectdate = $("select[name='senddate']").find("option:selected").val(); 
  $('#orderTime').html(''); 
  var dotime = ''; 
  	dotime = starttime.split('|'); 
  for(var i=0;i<dotime.length;i++){ 
  		var splittime = dotime[i].split('-');
  		if(splittime.length > 0){
  			//开始时间  结束时间
  			var begindtime = selectdate+' '+splittime[0]+':00';
  			var endtime = selectdate+' '+splittime[1]+':00'; 
  			addhtml(begindtime,endtime);
  		}
  }   
}
function addhtml(begindtime,endtime){ 
	var begindate = new Date(begindtime.replace(/-/g,'/'));
	var enddate = new Date(endtime.replace(/-/g,'/'));
	var bkdate = new Date(nowtime.replace(/-/g,'/'));
	var begindates = Number(begindate.getTime());
	var enddates = Number(enddate.getTime());
	var bkdates = Number(bkdate.getTime());
	var makenewtime =  new Date(maketime.replace(/-/g,'/'));
	
	if(bkdates > begindates && bkdates > enddates){ 
		 
  }else{  
  	var setptime = 15*60*1000; 
       for(var i=begindates;i<enddates;i=i+setptime){
       	 if(i > bkdates && i>makenewtime){ 
       	   var d = new Date()
            d.setTime(i);
            var nowhour = d.getHours();
            var timesee =  Number(nowhour) < 10?'0'+nowhour:nowhour;
            var nowminit = d.getMinutes();
            timesee += Number(nowminit) < 10?':0'+nowminit:':'+nowminit;
            $('#orderTime').append('<option value="'+timesee+'">'+timesee+'</option>'); 
         }
	     }
	} 
}
/*验证码*/
function gophone(){
	            var tempurl = siteurl+'/index.php?ctrl=site&action=phonecode&random=@random@&phone=@phone@';
   	 	         tempurl = tempurl.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@phone@',$('#phone').val());
	            $.getScript(tempurl);  
}
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
function onGo(){
  //alert('提交数据');
  //dosubmit
  $('#cfbtn').attr('disabled',true);
  $('#cfbtn').addClass('diabled');
  $.ajax({
       type: 'POST',
       async:false,
       url: submithtml.replace('@random@', 1+Math.round(Math.random()*1000)),
       data: $('#dosubmit').serialize(),
      dataType: 'json',success: function(content) { 
      	if(content.error == false)
      	{
      		$('#cfbtn').attr('disabled',false);
      		var newurl = orderhtml.replace('@orderid@', content.msg);
      	  	window.location.href=newurl; 
      	}else if(content.error == true)
      	{ 
      	 	diaerror(content.msg);
      	  $('#cfbtn').attr('disabled',false);
	         $('#cfbtn').removeClass('diabled');
      	   //$('#showsubmit').hide();
      	}else{
      		diaerror(content);
      	   $('#cfbtn').attr('disabled',false);
	        $('#cfbtn').removeClass('diabled');
      	   //$('#showsubmit').hide();
      	}
      	
		  },
      error: function(content) { 
      	diaerror('数据提交失败');
      	 $('#cfbtn').attr('disabled',false);
	        $('#cfbtn').removeClass('diabled');
      	//$('#showsubmit').hide();
	   }
  });
}