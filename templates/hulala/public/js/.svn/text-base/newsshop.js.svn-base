$(function(){ 
	//autosize();
	//canorder();
  //freshgoods();
	//modifycollect();
//	setback();
	 maketimenenu();
	maxheighttoul();
	if(Number($('#activeJifen2').attr('data')) > 0){
  	  $('#jifendkou').show();
  } 
});
$('.hc_order_foods_select_li_span').click(function(){ 
	$('#beizhu').val($('#beizhu').val()+$(this).text());
});
function jifenduihuan(){
	if($("#jifendkou").is(":hidden")){
	}else{
		var myjifen = Number($('#activeJifen2').attr('data'));
		var jifenbili = Number($('#activeJifen2').attr('jfendata'));
		var rslt = Number(myjifen)/Number(jifenbili); //除 
	  var canduihuan = rslt - Math.floor(rslt) > 0?Math.floor(rslt):Math.floor(rslt);//总页面数量
	  var shopcost = Number($('#shopallcost').val()) -  Number($('#cxcost').val());
	  var cancost = Math.ceil(shopcost) > canduihuan ? canduihuan:Math.ceil(shopcost); 
	  var htmlbottom = '';
	  if(jifenbili > 0){
	      for(var i=1;i<cancost;i++){
	      	var jifenall = Number(i)*jifenbili;
	      	htmlbottom += '<option value="'+i+'">使用'+jifenall+'积分抵扣'+i+'元</option>';
	      }
	      if(htmlbottom != ''){
	      	$('#activeJifenselect').html('<select name="jfdk" onchange="jisuanjf();"><option value="0">不使用积分抵扣</option>'+htmlbottom+'</select>');
	      	$('#jifenPromotion2').show();
	      }else{
	      	$('#activeJifenselect').html('');
	      	$('#jifenPromotion2').hide();
	      }  
	  }else{
	  	$('#jifenPromotion2').hide();
	  }
	}
	jisuanjf();
}
function jisuanjf(){
  var alltotal = Number($('#total').attr('data'));
	var downcost =  $("select[name='jfdk']").find("option:selected").val();
	downcost = downcost == undefined?0:downcost;
	$('#dikoujin').val(downcost);
 gettotal();
}
//计算有图片ul高度
function maxheighttoul(){
	var numshopul = $('.MealsImgList');
	 
	$.each(numshopul,function(i,field){ 
		var numshopli = $(field).find('li').length; 
		numa = Math.ceil(numshopli/3);
		$(field).find('ul').css('height',Number(numa)*271); 
	});
 
}
function maketimenenu(){
	var selectdate = $("select[name='senddate']").find("option:selected").val(); 
  $('#orderTime').html(''); 
  var dotime = starttime.split('|');
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
	
	if(bkdates > begindates && bkdates > enddates){ 
		 
  }else{  
  	var setptime = 15*60*1000; 
       for(var i=begindates;i<enddates;i=i+setptime){
       	 if(i > bkdates){ 
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
//自动调整高度
function autosize()
{
	$('.hc_list_right').css('height',$('.hc_list_left').height()-23);
}
//是否可以订餐
function canorder()
{
	var checkid= $('#canorder').val();
	if(checkid != 1)
	{
		//alert('can');
		$('.jia').text('已打烊');
	}
}
//设置背景图片
 function setback(){
 	if(shopbacklogo != null && shopbacklogo!='')
 	{
 		 $('.mmbg').css("background", "url("+shopbacklogo+") repeat-x"); 
 	 }
 } 
/*刷新商品界面中的 显示*/
function freshgoods()
{
	if(cartids != undefined){
	$.each(cartids,function(i,field){ 
	  var kk = $('#hcl_food_lists_contents_'+field);
	  if($(kk).html() != undefined)
	  { 
	  	$(kk).find('.hcl_food_lists_cont_dagou_box').addClass('hcl_food_lists_cont_dagou_box_hover');
	  	$(kk).find('.hc_listfoods_menus_foods').addClass('hc_listfoods_menus_foods_addborder');
	  }
   //$('#idss').appedn(field.value+",");
   })
  } 
}
//if($("#elem_id").is(":hidden")) { } 


//添加店铺收藏
function myFavorite2()
{ 
  var url = siteurl+'/index.php?controller=site&action=addcollect&collectid='+shopid+'&type=0'; 
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
	var url = siteurl+'/index.php?controller=site&action=delcollect&collectid='+shopid+'&type=0'; 
  var backinfo = ajaxback(url,{});
  if(backinfo.flag == false){ 
      $('#AddFavShop').show(); 
      $('#CancelFavShop').hide();
   }else{ 
   	 diaerror(backinfo.content); 
  }  
}	
/*
//添加购物车
function addcart(goods_id,types,is_true){  
	var  returnstr = false;
	var doshopid = is_true ==1?0:shopid;
	var url =siteurl+'/index.php?controller=site&action=addcart'; 
	
	
	
	
	var backinfo = ajaxback(url,{'shopid':doshopid,'goods_id':goods_id,'num':1,'type':types});
	if(backinfo.content == 'ok')
  {
     		returnstr = true;
   }else{
    if(backinfo.content == 'no')//购物车店铺和当前店铺不一致
    {
     			$('#Modal_col').modal('show');
    }else{
     			diaerror(backinfo.content); 
    }
  } 
	return returnstr; 
}*/

$('.Waimai').click(function(){ 
	//移动购物车到 显示切换中
	var carobj = $('#CartList .incart');
	if(carobj.length < 1){
	  alert('无产品在购物车');
	}else{
		$('#outcart .showgs').remove();
		var maketcost=0;
		var shopcost = 0;
		var bagallcost = 0;
		for(var i=0;i<$(carobj).length;i++){
			  var goodstitle = $(carobj).eq(i).find('.SCName').eq(0).text();
			   var goodsdancost = $(carobj).eq(i).attr('cost'); 
			  var shuliang = $(carobj).eq(i).find('.cart_num').eq(0).val();
			  var allcost = $(carobj).eq(i).find('.SCSubtotal').eq(0).text();
	    	$('#outcart').append('<tr  class="showgs"><td>'+goodstitle+'</td><td>'+goodsdancost+'</td><td>'+shuliang+'</td><td>'+allcost+'</td></tr>');
	    	var gsshopid = $(carobj).eq(i).attr('shopid');
	    	if(gsshopid > 0){
	    			shopcost += Number(allcost);
	    	}else{
	    		maketcost += Number(allcost);
	    	}
	    	bagallcost += Number($(carobj).eq(i).attr('bagcost')); 
	    
	  }
	  $('#shopallcost').val(shopcost);
	  $('#marketallcost').val(maketcost);
	  $('#allbagcost').val(bagallcost);
	  junshow(shopcost,maketcost);
	  getcx(shopcost,maketcost);
	  jifenduihuan();
	  gettotal();
	  $('#Modal_col').modal('show');
	}
	
});
function junshow(shopcost,maketcost){
	$('#juancost').val('0');
	var allcost = Number(shopcost)+Number(maketcost);
	var allboj = $('input[name="buyjuan"]');
	for(var i=0;i<allboj.length;i++){
		var nowcost = Number($(allboj).eq(i).attr('data2'));
		if(allcost > nowcost){
		   $(allboj).eq(i).attr('disabled',false);
		   $(allboj).eq(i).attr('checked',false);
		}else{
			$(allboj).eq(i).attr('disabled',true);
		   $(allboj).eq(i).attr('checked',false);
		}
		//data="<{$itemm['cost']}>" ="<{$itemm['limitcost']}>"
	}
}
$('input[name="buyjuan"]').live("click", function() {   
	$('#juancost').val($(this).attr('data')); 
	 gettotal();
});
function getcx(shopallcost,marketallcost){//// 
	$('#cxcost').val('0');
	 $.ajax({
       type: 'POST',
       async:false,
       url: getcxinfo.replace('@random@', 1+Math.round(Math.random()*1000)),
       data: {'shopid':shopid,'shopallcost':shopallcost,'marketallcost':marketallcost},
      dataType: 'json',success: function(content) { 
      	if(content.error == false)
      	{
      		var showdata = content.message.gzdata;
      		if(content.message.cxids.length > 0){
      			 $('#cxrulelist').text('促销优惠:');
      			var info = content.message.cxids.split(',');
      			var presentlist = content.message.zid;
      			for(var i=0;i<info.length;i++){
      				$('#outcart').append('<tr class="showgs"><td colspan=4><font style="color:#f60;">'+showdata[info[i]]+'</font></td></tr>');
      			 
      			}
      			$('#cxcost').val(content.message.inputcost);
      		 
      		}   
      	}else if(content.err == true)
      	{ 
      	}else{ 
      	}
      	
		  },
      error: function(content) { 
      	alert('获取促销规则数据失败');
	   }
    });  
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
	$.ajax({
       type: 'POST',
       async:false,
       url: submithtml.replace('@random@', 1+Math.round(Math.random()*1000)),
       data: {'shopid':shopid,'goodsids':goodsids,'goodscount':goodscount,'remark':remark,'paytype':paytype,'dikou':dikou,'username':$('#uname').val(),'area1':area1,'area2':area2,'area3':area3,'mobile':$('#uphone').val(),'addressdet':$('#uaddress').val(),'senddate':senddate,'minit':sendtime,'juanid':juanid},
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
//刷新购物车
function freshcart()
{
	  var cartobj = $('#CartList').find('.incart');
	  var allcost = 0;
	  for(var i=0;i<cartobj.length;i++){
	  	  var gid = cartobj.eq(i).attr('data');
	  	  var gcost = cartobj.eq(i).attr('cost');
	  	  var dcost = parseFloat(Number(gcost)*Number($('#cart_count'+gid).val()));
	  	  dcost  = dcost.toFixed(2);
	  	 $(cartobj.eq(i)).find('.SCSubtotal').eq(0).text(dcost);
	  	 allcost += Number(dcost);
	      
	  	
	  } 
	  allcost  = allcost.toFixed(2);
	  $('#CMoney').text(allcost);
		$('#waimaibtn').text(allcost);
			//alert($('#').html());
}
//删除商品
function delcart(goods_id)
{
	 $('#cartli_'+goods_id).remove();
	 freshcart();
}
//downcart 更新购物车 商品数量
function downcart(goods_id)
{ 
	var goodsshu = Number($('#cart_count'+goods_id).val());
	var stockdata = Number($('#cartli_'+goods_id).attr('stockdata'));
	if(goodsshu > stockdata){
	  alert('商品库存不足');
	  $('#cart_count'+goods_id).val(1);
	}
	freshcart(); 
	 //check
}
//清空购物车

/*购物车 跟随滚动*/
function refreshBottomCart() {
	var manH = $(".Restaurant").height(); 
	var scrollTop = $(document).scrollTop();   
	var header = 380;
	var clientHeight = $(window).height();//  
	if(scrollTop > 380)
	{
	
		$("#ShopCart").css("position", "fixed");
		$("#ShopCart").css("top", 0);
	 }else{
	 	$("#ShopCart").css("position", "static");
		$("#ShopCart").css("top", '380');
	 	
	 } 
}
/*购物车购买效果*/
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
})

//切换商品分类导航条
function change_shop_list(showid,obj) 
{
	//siblings
	$(obj).addClass('DChover').siblings().removeClass('DChover');
	 if(showid == 0) {
		$('.MealsCategory').show();
		$('.MealsList').show();
	}
	else
	{
		$('.MealsCategory').hide();
		$('.MealsList').hide();
		$('#Food'+showid).show();
		$('#FoodList'+showid).show();
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
	 	  	getPingjia();
	 	  }else{
	 	  	if(panduan == 'liuyan'){
	 	  		getliuyan();
	 	  	}
	 	  }
	 }
}
function getPingjia()
{
	///$('#Comloading').show();
	if($("#Comnon").is(":hidden")) 
  { 
  	 var url = siteurl+"/index.php?controller=shop&action=shownewping";
  	 var page = $('#pjiapage').val();
  	 $('#pjiapage').val(Number(page)+1);
	   $.post(url, {'shopid':shopid,'type':'shop','page':page},function (data, textStatus){ 
	   	
		$('#Comcon').append(data); 
		if(data == null || data=='')
		{
			 
			 $('#Comloading').hide();
			 $('#Comnon').show();
		 }  
		
	  }, 'html');
  } 
}
function getliuyan()
{
	//
	if($("#Msgnon").is(":hidden")) 
  { 
  	 var url = siteurl+"/index.php?controller=ask&action=newshopask";
  	 var page = $('#liuyanpage').val();
  	 $('#liuyanpage').val(Number(page)+1);
	   $.post(url, {'shopid':shopid,'showtype':'shop','page':page},function (data, textStatus){  
		$('#Msgul').append(data); 
		if(data == null || data=='')
		{
			 
			 $('#Msgloading').hide();
			 $('#Msgnon').show();
		 }  
		
	  }, 'html');
  } 
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
	  var url = siteurl+'/index.php?controller=ask&action=saveask'; 
    var backinfo = ajaxback(url,{'shopid':shopid,'content':$('#MContent').val(),'type':'shop'}); 
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
 
 

 