
/*添加购物车*/
$('.jia').live("click", function() { 
	 
	if($(this).text() == '吃一份')
	{
	var returnstr = addcart($(this).attr('shop_id'),$(this).attr('food_id'));
	if(returnstr == true){
	$(this).parent().parent().parent().find('.hcl_food_lists_cont_dagou_box').addClass('hcl_food_lists_cont_dagou_box_hover');
	$(this).addClass('hc_listfoods_menus_foods_addborder');
	$("#add2cartimg").show();
	  var pos =$(this).offset();
    	var topval = pos.top - $(document).scrollTop();
    	$("#add2cartimg").css("top", topval + "px"); 
    	var len = $(window).height() - topval - 100; 
    	$("#add2cartimg").animate({'opacity':'1'}).animate({top:"+=" + len, 'opacity':'0'}); 
    	freshcart($(this).attr('shop_id'));
    }
  }
})
//取消已选择样式
function unchoice(goodsid){
	 var kk = $('#hcl_food_lists_contents_'+goodsid);
	  if($(kk).html() != undefined)
	  { 
	  	$(kk).find('.hcl_food_lists_cont_dagou_box').removeClass('hcl_food_lists_cont_dagou_box_hover');
	  	$(kk).find('.hc_listfoods_menus_foods').removeClass('hc_listfoods_menus_foods_addborder');
	  }
	  if($('#yhxx').html() != undefined){
	  	 freshcxinfo();
	  }
	
}
function addcart(shopid,goods_id){ 
	var  returnstr = false;
	var url = siteurl+'/index.php?controller=site&action=addcart'; 
	$.ajax({
     type: 'post',
     async:false, 
     data:{'shopid':shopid,'goods_id':goods_id,'num':1},
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	
     	if(content == 'ok')
     	{
     		returnstr = true;
     	}else{
     		if(content == 'no')
     		{
     			$('#Modal_col').modal('show');
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) { 
    	diaerror('数据获取失败'); 
	  }
   });
	
	
	return returnstr;
	
}
function delcart(goods_id,types)
{
	var obj = $('#cartfood_id_'+goods_id);
  var cost = $(obj).attr('cost');
  var shuliang = $(obj).val();
  var allcost = parseFloat(cost)*parseFloat(shuliang);
	var url = siteurl+'/index.php?controller=site&action=delcart'; 
	$.ajax({
     type: 'post',
     async:false, 
     data:{'shopid':$(obj).attr('shopid'),'goods_id':goods_id,type:types},
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	if(content == 'ok')
     	{ 
     	 
     		$('#total_quantity_2').text(parseFloat($('#total_quantity_2').text())-Number(shuliang));  
     		$('#total_price_2').text(parseFloat($('#total_price_2').text())-parseFloat(allcost));
     		 $('#shop_sum'+$(obj).attr('shopid')).text(parseFloat($('#shop_sum'+$(obj).attr('shopid')).text())-parseFloat(allcost));
     			$(obj).parent().parent().remove();
     			unchoice(goods_id); 
     		
     	}else{
     		if(content == 'no')
     		{
     			diaerror('店铺ID不一侄'); 
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
//清空购物车
function clearcart()
{
	var url = siteurl+'/index.php?controller=site&action=clearcart'; 
	$.ajax({
     type: 'post',
     async:false,  
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	if(content == 'ok')
     	{  
     		location.reload(); 
     	}else{
     		if(content == 'no')
     		{
     			diaerror('店铺ID不一侄'); 
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
function deleteBtn_moren(obj)
{
	$(obj).addClass('deleteBtn_moren').removeClass('deleteBtn_huaguo');
}
function deleteBtn_huaguo(obj)
{
	$(obj).addClass('deleteBtn_huaguo').removeClass('deleteBtn_moren');
}
function freshcart(shopid)
{
	  var url = siteurl+"/index.php?controller=shop&action=cart&shopid="+shopid; 
		 $.get(url,function (data, textStatus){  
			 $('#cartcontent').html(data);
			}, 'html');
}
function reduce(obj,types){
	var  returnstr = false;
	var goodsid = $(obj).attr('food_id');
	var cost = $(obj).attr('cost');
	var url = siteurl+'/index.php?controller=site&action=downcart'; 
	$.ajax({
     type: 'post',
     async:false, 
     data:{'shopid':$(obj).attr('shopid'),'goods_id':goodsid,'num':1,type:types},
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	
     	if(content == 'ok')
     	{ 
     		var old = $('#cartfood_id_'+goodsid).val(); 
     		var newold = Number(old)-Number(1);
     		$('#cartfood_id_'+$(obj).attr('food_id')).val(Number(newold));  
        $('#shop_sum'+$(obj).attr('shopid')).text(parseFloat($('#shop_sum'+$(obj).attr('shopid')).text())-parseFloat($(obj).attr('cost')));
     		$('#total_quantity_2').text(parseFloat($('#total_quantity_2').text())-1);  
     		$('#total_price_2').text(parseFloat($('#total_price_2').text())-parseFloat($(obj).attr('cost')));
     		if(newold == 0)
     		{
     			$(obj).parent().parent().remove();
     			unchoice(goodsid);
     		}else{
     			 if($('#yhxx').html() != undefined){
	  	         freshcxinfo();
	        }
     		}
     		
     	}else{
     		if(content == 'no')
     		{
     			diaerror('店铺ID不一侄'); 
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
function upadd(obj,types){
	
	var  returnstr = false;
	var goodsid = $(obj).attr('food_id');
	var cost = $(obj).attr('cost');
	var url = siteurl+'/index.php?controller=site&action=addcart'; 
	$.ajax({
     type: 'post',
     async:false, 
     data:{'shopid':$(obj).attr('shopid'),'goods_id':goodsid,'num':1,type:types},
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	
     	if(content == 'ok')
     	{ 
     		var old = $('#cartfood_id_'+goodsid).val(); 
     		var newold = Number(old)+Number(1);
     		$('#cartfood_id_'+$(obj).attr('food_id')).val(Number(newold));  
         $('#shop_sum'+$(obj).attr('shopid')).text(parseFloat($('#shop_sum'+$(obj).attr('shopid')).text())+parseFloat($(obj).attr('cost')));
     		$('#total_quantity_2').text(parseFloat($('#total_quantity_2').text())+1);  
     		$('#total_price_2').text(parseFloat($('#total_price_2').text())+parseFloat($(obj).attr('cost')));
     		 if($('#yhxx').html() != undefined){
	  	        freshcxinfo();
	       }
     		
     	}else{
     		if(content == 'no')
     		{
     			diaerror('店铺ID不一侄'); 
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

function freshcxinfo(){ 
   var url = siteurl+'/index.php?controller=site&action=freshcxinfo'; 
   $('#cxinfo').html('');//
	$.ajax({
     type: 'post',
     async:false, 
     data:{'shopid':cartshopid,'total':$('#total_price_2').text()},
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	if(content.error ==  false){
     		
     		if(content.message.cxids !=null && content.message.cxids !=''){
     			
     			var idj = content.message.cxids.split(',');
     			$('#cxinfo').append(' <div style="color:#000;">满足的优惠活动</div>');
     			for(var i=0;i<idj.length;i++){
     				var htmlzp = '';
     				if(content.message.zid[idj[i]] != undefined){
     					htmlzp = '('+content.message.zid[idj[i]].presenttitle+')';
     				}
     				var htmldata = '<div>'+content.message.gzdata[idj[i]]+htmlzp+'</div>';
     				$('#cxinfo').append(htmldata);
     			}
     			
     			
     		}else{
     			$('#cxinfo').append(' <div style="color:#000;">未找到满足条件的优惠活动</div>');
     		}
     		
     		jsyouj(content.message.surecost);
     		
     	}else{
     		$('#cxinfo').append(' <div style="color:#000;">未找到满足条件的优惠活动</div>');
     		jsyouj($('#total_price_2').text());
     		
     	}  
		},
    error: function(content) { 
    	diaerror('获取促销优惠失败'); 
	  }
   });
}
function jsyouj(jiage){
	//需要计算优惠劵优惠 
	var findobj = $("input[name='buyjuan']");
	var downcost = 0;
	for(var i=0;i<findobj.length;i++){
		if(Number($(findobj).eq(i).attr('data2')) > Number(jiage) ){
			$(findobj).eq(i).attr('disabled',true);
			$(findobj).eq(i).attr("checked",false); 
		 }else{
		 	$(findobj).eq(i).attr('disabled',false); 
		 	 
		 }
	} 
	var docost = $("input[name='buyjuan']:checked").attr('data');
	if(docost == undefined){
		docost = 0;
	 }  
	 var finalcost = Number(jiage)-Number(docost); 
	$('#surecost').text(finalcost); 
}
$("input[name='buyjuan']").live("click", function() { 
	 
   freshcxinfo();
});	


 
 

 