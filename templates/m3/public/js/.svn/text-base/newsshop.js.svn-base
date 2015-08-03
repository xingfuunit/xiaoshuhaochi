       
//添加店铺收藏
function myFavorite2()
{ 
  var url = siteurl+'/index.php?ctrl=shop&action=addcollect&datatype=json&collectid='+shopid+'&type=0'; 
  var backinfo = ajaxback(url,{});
  if(backinfo.flag == false){ 
     		$('#AddFavShop').hide(); 
     		$('#CancelFavShop').show();
   }else{ 
   	diaerror(backinfo.content); 
  }  
}  
//删除店铺收藏
function delFav()
{ 
	var url = siteurl+'/index.php?ctrl=shop&action=delcollect&datatype=json&collectid='+shopid+'&type=0'; 
  var backinfo = ajaxback(url,{});
  if(backinfo.flag == false){ 
      $('#AddFavShop').show(); 
      $('#CancelFavShop').hide();
   }else{ 
   	 diaerror(backinfo.content); 
  }  
}	   
function subcart()
{
	$('#cfm_addArea').attr('disabled',true);
	$('#cfm_addArea').text('提交中.....'); 
	var goodlistobj = $('#CartList .incart');
	var goodsids=new Array();
	var goodscount = new Array();
	for(var i=0;i<$(goodlistobj).length;i++){
	  	var gid = $(goodlistobj).eq(i).attr('data'); 
	  	goodsids.push(gid);
	  	 goodscount.push($('#cart_count'+gid).val());
	}
  var area1 = $("select[name='area1']").find("option:selected").val(); 
  var area2 = $("select[name='area2']").find("option:selected").val(); 
  var area3 = $("select[name='area3']").find("option:selected").val(); 
	var senddate = $("select[name='senddate']").find("option:selected").val();
	var sendtime =$("#orderTime").find("option:selected").val();
	var paytype = $("input[name='checkway']:checked").val();
	var juanid = $("input[name='buyjuan']:checked").val();
	var dikou = $("select[name='jfdk']").find("option:selected").val();
	var remark = $('#beizhu').val();
	var phonecode = $('#phonecode').val();
	$.ajax({
       type: 'POST',
       async:false,
       url: submithtml.replace('@random@', 1+Math.round(Math.random()*1000)),
       data: {'shopid':shopid,'goodsids':goodsids,'goodscount':goodscount,'phonecode':phonecode,'remark':remark,'paytype':paytype,'dikou':dikou,'username':$('#uname').val(),'area1':area1,'area2':area2,'area3':area3,'mobile':$('#uphone').val(),'addressdet':$('#uaddress').val(),'senddate':senddate,'minit':sendtime,'juanid':juanid},
      dataType: 'json',success: function(content) { 
      	if(content.error == false)
      	{
      		$('#cfm_addArea').attr('disabled',false);
      		var newurl = orderhtml.replace('@orderid@', content.message);
      		window.location.href=newurl; 
      	}else if(content.error == true)
      	{
      		 
      		 $('#cfm_addArea').attr('disabled',false);
	         $('#cfm_addArea').text('提交订单'); 
      	   //$('#showsubmit').hide();
      	}else{
      		alert(content);
      	   $('#cfm_addArea').attr('disabled',false);
	         $('#cfm_addArea').text('提交订单'); 
      	   //$('#showsubmit').hide();
      	}
      	
		  },
      error: function(content) { 
      	alert('数据提交失败');
      	 $('#cfm_addArea').attr('disabled',false);
	         $('#cfm_addArea').text('提交订单'); 
      	//$('#showsubmit').hide();
	   }
  });
} 
/*购物车购买效果*/
/*
$('.AddOrder').live("click", function() {   
	  var gid = $(this).attr('data');
	  var goodstitle = $('#goodsname_'+gid).text();
	  var shopdata = $(this).attr('shopdata');
	  var goodscost = $(this).attr('costdata');
	  var stockdata = $(this).attr('stockdata'); 
	  var goodsshopid = $(this).attr('shopid');
	  var goodsbag = $(this).attr('bagcost');
	  var adto=true;
	  if($('#cartli_'+gid).html() == undefined){ 
	     goodstitle =  shopdata == '0'?goodstitle+'[便利店]':goodstitle;
	    var htmles = '<li class="incart" id="cartli_'+gid+'" stockdata="'+stockdata+'" data="'+gid+'" cost="'+goodscost+'" shopid="'+goodsshopid+'" bagcost="'+goodsbag+'"><div class="SCName">'+goodstitle+'</div> <div class="SCNum"><span><input type="text" id="cart_count'+gid+'" onblur="downcart(\''+gid+'\')" value="1" data="1" maxlength="2" class="cart_num"></span></div>';
        htmles += '<div class="SCSubtotal">'+goodscost+'</div><div class="SCOperate"><a href="javascript:;" onclick="delcart(\''+gid+'\')"></a></div>';
        htmles += '<div style="clear:both;"></div>';
        htmles += '</li>';
         $('#CartList').append(htmles);
    }else{
    	var checkcku = Number($('#cartli_'+gid).attr('stockdata'));
    	var nowshu = Number($('#cart_count'+gid).val())+1;
    	if(nowshu > checkcku){
    	  alert('仓存不足');
    	  adto = false;
    	}else{
    	$('#cart_count'+gid).val(nowshu);
      }
    } 
	  if(adto ==  true)
	  {
	     $("#addload").show();
	     var pos =$(this).offset(); 
       $("#addload").css({'position':'absolute','top':pos.top,'left':pos.left,'opacity':'1'});  
       var target_ob = $('#ShopCart').offset(); 
       $("#addload").animate({'top':target_ob.top,'left':target_ob.left, 'opacity':'0'});  
   }
    freshcart(); 
})*/

//切换商品分类导航条
function change_shop_list(showid,obj) 
{
	//siblings
	$(obj).addClass('DChover').siblings().removeClass('DChover');
	 if(showid == 0) {
		$('.MealsCategory').show();
		$('.MealsList').show();
		$('.MealsImgList').show();
	}
	else
	{
		$('.MealsCategory').hide();
		$('.MealsList').hide();
		$('.MealsImgList').hide();
		$('#Food'+showid).show();
		$('#FoodList'+showid).show();
		$('#ImgFoodList'+showid).show();
	} 
}
$(".Menubox_01 li").live("click", function() {   
	$(this).addClass('hover').siblings().removeClass('hover');
	var mm = $(".Menubox_01 li").length;
	var nowdiv = $(".Menubox_01 li").index(this);
  for(var i=0;i<mm;i++)
  {
  	$('#con_one_'+i).hide();
  }
  $('#con_one_'+nowdiv).show(); 
  getshowdata(nowdiv);
});
//判断展示数据获取是否隐藏
function getshowdata(nowdiv){
	 var obj = $('#con_one_'+nowdiv); 
	 var panduan = $(obj).attr('data');
	 if(panduan != 'none')
	 {
	 	  if(panduan == 'pjia')
	 	  {
	 	  	getPingjia(0);
	 	  }else{
	 	  	if(panduan == 'liuyan'){
	 	  		getliuyan(0);
	 	  	}
	 	  }
	 }
}
function getPingjia(page)
{
	///$('#Comloading').show();
 
  	 $('#det_commm').html('');
  	 var url = siteurl+"/index.php?ctrl=order&action=commentshop"; 
	   $.post(url, {'id':shopid,'type':'shop','page':page},function (data, textStatus){ 
	  
		$('#det_commm').append(data); 
	 
	  }, 'html');
  
}
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
/***数据到底判断***/
function uiIsPageBottom() {     
    var scrollTop = 0;     
    var clientHeight = 0;     
    var scrollHeight = 0;     
    if (document.documentElement && document.documentElement.scrollTop) {   
        scrollTop = document.documentElement.scrollTop;  
    } else if (document.body) {     
        scrollTop = document.body.scrollTop;     
    }     
    if (document.body.clientHeight && document.documentElement.clientHeight) {     
        clientHeight = (document.body.clientHeight < document.documentElement.clientHeight) ? document.body.clientHeight: document.documentElement.clientHeight;   
    } else {     
        clientHeight = (document.body.clientHeight > document.documentElement.clientHeight) ? document.body.clientHeight: document.documentElement.clientHeight;     
    }     
    scrollHeight = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);     
    if (scrollTop + clientHeight == scrollHeight) {    
        return true;  
    } else {     
        return false;    
    }   
} 
//展示更多
function showmessmore()
{
	if (uiIsPageBottom()) {//素标已经滚动到最下边 
		var mm = $(".Menubox_01 li").length; 
		for(var i=0;i<mm;i++)
    {
    	if($("#con_one_"+i).is(":hidden")) 
     { 
    	 
    	}else{
    	      getshowdata(i);
    	      break;
    	}
  	   // $('#con_one_'+i).hide();
    }
	}
	///alert('xxx');
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
//发布留言
function AddMessage()
{
	if($('#MContent').val() == $('#MContent').attr('data')|| $('#MContent').val()=='')
	{
		 diaerror('请录入留言内容'); 
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
 
 

 