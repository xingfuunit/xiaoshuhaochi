//向下滑动 转换

$(function(){
	 
  //导航条切换
  $('#tabList li').live("click", function() {  
  	var nowindex = $('#tabList').find('li').index($(this));
  	$(this).addClass('hover listSprit').siblings().removeClass('hover listSprit');
  	 $('#tabList').find('strong').removeClass('listSprit');
  	 $(this).find('strong').addClass('listSprit');
  	 $('#leftMenu').find('.listCont').hide();
  	 $('#leftMenu').find('.listCont').eq(nowindex).show();
  	//alert(nowindex);
  });
   
   //构造时间
  //  maketimenenu();
   //积分抵扣展示
  if(Number($('#activeJifen2').attr('data')) > 0){
  	  $('#jifendkou').show();
  } 
   
  //购买物车部分
  //鼠标移动商品 
  $('#menuWrap li').live('mouseover',function(){
  	$('#menuWrap li').removeClass('ordering_list_hover');
  	$(this).addClass('ordering_list_hover');
  }); 
  $('#menuWrap li').live('mouseout',function(){
  	$(this).removeClass('ordering_list_hover');
  }); 
   
  $('.imgInfo a').live('click',function(){ 
  	if($('#mytestdiv').html() !=undefined){
  	  $('#mytestdiv').remove();
  	}
  	 var imgs = $(this).parent().find('img').eq(0).attr('src');
  	 $('body').append('<div id="mytestdiv" style="height:340px;width:450px;position: absolute"><img src="'+imgs+'" height=340px width=450px></div>');
  	  $("#mytestdiv").css({'top':'30%','left':'30%'});  
  });
  $('#mytestdiv').live('click',function(){
  	$(this).remove();
  });
  $('.next_btn').live('click',function(){
  	//.trigger("click"); 
  	 
  	if(!Is_Chuname($('#uname').val())){
  		alert('请录入中文姓名');
  		return false;
  	}else if(!Is_phone($('#uphone').val())){
  		alert('请录入手机号');
  	   return false;
  	}//else if($('#uaddress').val() == '' ||$('#uaddress').val().length < 3 ){
  	  //alert('录入地址长度大于3');
  	  //return false;
  	//}
	else{
  		//检测下单时间是否过期
  	  donext();
  	}
    
  });
      
});
//'<{$value['id']}>','<{$value['title']}>','<{$value['score']}>','<{$value['stock']}>','<{$value['market_cost']}>
function selPrizeItem(gid,gtitle,gscore,gstock,gmcost){ 

	//total  if(
 if(memberscore < 1)
 {
	alert('用户积分不足,不可兑换');
 }else{
      var checkck = $('#'+gid+'_Amount').val();
      var allowed = false;
      if(checkck == undefined){
      	 if(gstock < 1){
      	   allowed = true;
      	 }
      }else{
      	 var checkNum = Number(checkck)+1;
      	 if(checkNum > gstock){
      	 	 allowed = true;
      	}
      }
      if(allowed == false){
	       if(checkallsroce(gscore)){ 
	         var tracert = {'gid':gid,'gtitle':gtitle,'gscore':gscore,'gstock':gstock,'gmcost':gmcost};
	         var checkobj = $('#tr_'+tracert.gid);  
	         if($(checkobj).html() == undefined){
	         var htmls = template.render('trgoodlist', tracert);
	            $('#t_lipin').append(htmls); 
	            carttongji();
           }else{
  	          $('#'+tracert.gid+'_Amount_add').trigger('click'); 
           } 
         }
      }else{
      	 alert('库存不足');
      }
 
 }
}
function checkallsroce(gscore){
 var allscore = Number($('#total').attr('data'))+Number(gscore); 
 if(allscore > memberscore){
    alert('兑换需要积分超过账号积分数量');
    return false;
 }else{
 	  return true;
 } 
}
function king_tijiaodingdan(){
	$('#btn').hide();
	$('#showsubmit').html('数据提交中.....');
	$('#showsubmit').show();
	var goodlistobj = $('.ordered').eq(0).find('.orderPart1');
	var goodsids=new Array();
	var goodscount = new Array();
	for(var i=0;i<$(goodlistobj).length;i++){
	  	var gid = $(goodlistobj).eq(i).attr('gid'); 
	  	goodsids.push(gid);
	  	 goodscount.push($('#'+gid+'_Amount').val());
	}
	/**
  var area1 = $("select[name='area1']").find("option:selected").val(); 
  var area2 = $("select[name='area2']").find("option:selected").val(); 
  var area3 = $("select[name='area3']").find("option:selected").val();  */
	var remark = $('#unRemark').val();
	$.ajax({
       type: 'POST',
       async:false,
       url: submithtml.replace('@random@', 1+Math.round(Math.random()*1000)),
       data: {'goodsids':goodsids,'goodscount':goodscount,'remark':remark,'username':$('#uname').val(),'mobile':$('#uphone').val()},
      dataType: 'json',success: function(content) { 
	        
      	if(content.error == false)
      	{
			alert('兑换成功');
      		backandmodify();
      		
      	}else if(content.error == true)
      	{
      		 $('#showsubmit').html('订单提交失败：'+content.err);
      		 $('#btn').show();
      	   //$('#showsubmit').hide();
      	}else{
      	   $('#showsubmit').html('订单提交失败：'+content);
      	   $('#btn').show();
      	   //$('#showsubmit').hide();
      	}
      	
		  },
      error: function(content) { 
      	$('#showsubmit').html('提交数据失败'); 
      	$('#btn').show();
      	//$('#showsubmit').hide();
	   }
   });
}
function donext(){ 
	var goodlistobj = $('.ordered').find('.orderPart1');
	if($(goodlistobj).length > 0){
	//	$('#gift').hide(); 
	//  $('#fade').show();
	  $('.js_MASK').show();
	  $('#success-list').show();
	 
	  for(var i=0;i<$(goodlistobj).length;i++){
	  	var gid = $(goodlistobj).eq(i).attr('gid');
	  	if(i == 0){
	  	$('#updivmidle').prepend('<tr class="tr3">  <td class="cp">'+$(goodlistobj).eq(i).find('.menuname').text()+'</td><td class="jg">'+$(goodlistobj).eq(i).attr('gcost')+'</td><td class="sl">'+$('#'+gid+'_Amount').val()+'份</td><td class="xj">'+$('#'+gid+'_stPrice').text()+'</td><td class="bz" rowspan="3">'+'</td></tr>');
		//$('#unRemark').val()
	    }else{
	    	$('#updivmidle').append('<tr class="tr3"><td class="cp">'+$(goodlistobj).eq(i).find('.menuname').text()+'</td><td class="jg">'+$(goodlistobj).eq(i).attr('gcost')+'</td><td class="sl">'+$('#'+gid+'_Amount').val()+'份</td><td class="xj">'+$('#'+gid+'_stPrice').text()+'</td></tr>');
	    }
	  }
	  var orderPrice = Number($('#orderPrice').attr('data'));
	  var ServicePrice = Number($('#ServicePrice').attr('data'));
	  var bianlidianPrice = Number($('#bianlidianPrice').attr('data'));
	  var bianlidianPeisongfei = Number($('#bianlidianPeisongfei').attr('data'));
	  var allpeisong = 0;
	  allpeisong = orderPrice> 0?ServicePrice:0;
	  allpeisong += bianlidianPrice> 0?bianlidianPeisongfei:0;
	  var allgoodscost = orderPrice+bianlidianPrice;
	  
	  var downcost =  $("select[name='jfdk']").find("option:selected").val();
	   downcost = downcost == undefined?0:downcost;
	   var bottomobj  = $('#success-list .bottom');
	  
	  $(bottomobj).append('<tr class="tr4"><td class="psfy"><span>&nbsp;</span><span class="tdmoney">&nbsp;</span></td><td class="cpxj" colspan="3"><span>&nbsp;</span><span class="tdmoney">&nbsp;</span></td><td class="ddzj"><span>总积分：</span><span class="tdmoney">'+$('#total').text()+'</span></td></tr>');
	  //
	  // $("input[name='checkway']:checked").val()
	   $(bottomobj).append('<tr class="tr5"><td>客户姓名：'+$('#uname').val()+'</td><td colspan="4">手机号码：'+$('#uphone').val()+'</td></tr><tr class="tr5"></tr>');
	   var area1 = $("select[name='area1']").find("option:selected").val();
	   area1 = area1 != undefined? $("select[name='area1']").find("option:selected").text():'';
	   var area2 = $("select[name='area2']").find("option:selected").val();
	    area2 = area2 != undefined? $("select[name='area2']").find("option:selected").text():'';
	     var area3 = $("select[name='area3']").find("option:selected").val();
	    area3 = area3 != undefined? $("select[name='area3']").find("option:selected").text():'';
	   $(bottomobj).append('<tr class="tr6"><td colspan="5">配送地址：'+area1+area2+area3+$('#uaddress').val()+'</td></tr>');
	   //<td colspan="5">配送地址：'+area1+area2+area3+$('#uaddress').val()+'</td>

	}else{
		alert('请添加商品到购物车');
	} 
}
function backandmodify(){
	$('#gift').show();
	 $('#updivmidle').find('.tr3').remove();
	 $('#success-list .bottom').find('tr').remove();
	//$('#fade').hide();
	$('.js_MASK').hide();
	$('#success-list').hide();
}
//构造时间 菜单选择项目 
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
 
//增加数量
function addOrReduceAmount(gid,shuliang)
{ 
	if(checkallsroce($('#tr_'+gid).attr('gcost'))){
	  var defaults = $('#'+gid+'_Amount').val();
	  var allshu = Number(defaults)+Number(shuliang);
	      $('#'+gid+'_Amount').val(allshu);
	      $('#'+gid+'_id').find('.ordering_add').text(allshu);
	      carttongji();
  }
}
function carttongji(){ 
	if($('.ordered').find('.orderPart1').length  > 0){
		$('.ordered').show();
		$('#p_nothingBuy').hide();
		if($('#table_canpin').find('.orderPart1').length > 0){
			 $('#table_canpin').show();
			 $('#t_heji').show();
		}else{
			 $('#table_canpin').hide();
			  $('#t_heji').hide();
		}
		if($('#table_bianlidian').find('.orderPart1').length > 0){
			$('#table_bianlidian').show();
		}else{
		  $('#table_bianlidian').hide();
		}
		//界面数据
		tongjidata();
	}else{
		$('#p_nothingBuy').show();
		$('.ordered').hide();
	} 
}
function delOrReduceAmount(gid,shuliang){
	var defaults = $('#'+gid+'_Amount').val();
	var allshu = Number(defaults)-Number(shuliang);
	if(allshu > 0){
		$('#'+gid+'_Amount').val(allshu);
	$('#'+gid+'_id').find('.ordering_add').text(allshu);
	    carttongji();
	}else{
		$('#tr_'+gid).remove(); 
		carttongji();
	}
}
function tongjidata(){
	var shopobj = $('#table_canpin').find('.orderPart1');
	var marketobj = $('#table_bianlidian').find('.orderPart1');
	var shopallcost = 0;
	var marketallcost   = 0;
	var allbagcost =0;
	for(var i=0;i<$(shopobj).length;i++){
		var gid = $(shopobj).eq(i).attr('gid');
		var gcost = $(shopobj).eq(i).attr('gcost');
		var gshu = $('#'+gid+'_Amount').val();
		var gacost = parseFloat(Number(gcost)*Number(gshu));
		var abagcost =  $(shopobj).eq(i).attr('bagcost');
		allbagcost  = parseFloat(allbagcost)+ parseFloat(Number(abagcost)*Number(gshu)); 
		$('#'+gid+'_stPrice').text(''+gacost); 
		shopallcost += gacost; 
	}
	allbagcost = allbagcost.toFixed(2);
	shopallcost = shopallcost.toFixed(2);
	if(allbagcost > 0){
	   $('#bagcost').text('￥'+allbagcost);
	   $('#bagcostshow').show();
	   $('#bagcost').attr('data',allbagcost);
  }else{
     $('#bagcostshow').hide();
     $('#bagcost').attr('data',0);
  }
	$('#totalScore').text(''+shopallcost);
	$('#total').attr('data',shopallcost);
	$('#total').text(''+shopallcost);
}
 
function gettotal(){
	var shopcost = Number($('#orderPrice').attr('data'));
	 
	var bagcost = Number($('#bagcost').attr('data'));
	var ServicePrice = Number($('#ServicePrice').attr('data'));
	var bianlidianPrice = Number($('#bianlidianPrice').attr('data'));
	var bianlidianPeisongfei = Number($('#bianlidianPeisongfei').attr('data'));
	var cxrulelist = Number($('#cxrulelist').attr('data'));
	var total = 0;
	if(shopcost > 0){
	  total = shopcost+bagcost+ServicePrice;
	  total = total - cxrulelist;
	}
	if(bianlidianPrice > 0){
		total += bianlidianPeisongfei+bianlidianPrice;
	}
	$('#total').attr('data',total); 
	jifenduihuan();
}
function jifenduihuan(){
	if($("#jifendkou").is(":hidden")){
	}else{
		var myjifen = Number($('#activeJifen2').attr('data'));
		var jifenbili = Number($('#activeJifen2').attr('jfendata'));
		var rslt = Number(myjifen)/Number(jifenbili); //除 
	  var canduihuan = rslt - Math.floor(rslt) > 0?Math.floor(rslt):Math.floor(rslt);//总页面数量
	  var shopcost = Number($('#orderPrice').attr('data')) -  Number($('#cxrulelist').attr('data'));
	  var cancost = Math.ceil(shopcost) > canduihuan ? canduihuan:Math.ceil(shopcost); 
	  var htmlbottom = '';
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
	}
	jisuanjf();
}
function jisuanjf(){
  var alltotal = Number($('#total').attr('data'));
	var downcost =  $("select[name='jfdk']").find("option:selected").val();
	downcost = downcost == undefined?0:downcost;
	alltotal = alltotal - Number(downcost);
	$('#total').text('￥'+alltotal);
}
 
function strToJson(str){ 
return JSON.parse(str); 
} 
$(window).scroll(function(){
		if($(this).scrollTop()!=0){		
			 scrollmenu($(this).scrollTop());
			 
		}else{
			 
		} 
});
function scrollmenu(scheight){
	 if($('#menuid').attr('data') != undefined){ 
	 	    if(scheight > Number($('#menuid').attr('data'))){
	 	    	$('#menuid').css({'position':'fixed','top':'0'});
	 	    }else{
	 	    	$('#menuid').css({'position':'','top':''});
	 	    }
	 	    
	 } /* 
	 if($('.ordering_navRight').eq(1).attr('data') !=undefined){
	 	    if(scheight > Number($('.ordering_navRight').eq(1).attr('data'))){
	 	    	$('.ordering_navRight').eq(1).css({'position':'fixed','top':'0'});
	 	    }else{
	 	    	$('.ordering_navRight').eq(1).css({'position':'','top':''});
	 	    }
	 } */
}

//li滚动
$(function(){
	var gunobj = $('#sclidiv');
	if(gunobj != undefined){
	var timer=null;
	var timer2=null;
	var  count = $(gunobj).find('li').length;//总个数
	var pagecount = 4;//每页数量
	var rslt = Number(count)/Number(pagecount); //除 
	var  pagenum = rslt - Math.floor(rslt) > 0?Math.floor(rslt)+1:Math.floor(rslt);//总页面数量
	var ipage=0;
	var prive=0; 
	var iNow2=0;
	
	function change(){
		clearInterval(timer);
		timer=setInterval(function(){
			prive=ipage;
			if(ipage==pagenum-1){
				ipage=0;
			}else{
				ipage++;
			}
			a(ipage);
		},5000);
	}
	function a(page){ 
		clearInterval(timer2);
		//图片一个个切换
		timer2 = setInterval(function(){
			if(iNow2==pagecount){
				clearInterval( timer2 );
				iNow2 = 0;
			}else{
				picChange(iNow2 ,page,prive);
				iNow2++;
			}
		},80);
	} 
	function picChange(index,page,pre){  
    var startcount = page*pagecount; 
		var hidecount = pre;
		    hidecount = hidecount*pagecount;
		   // alert(startcount);
	  var upeq = index+hidecount;
	  var noweq = startcount+index;
	   if(upeq < count){
	   	
	   	  $(gunobj).find('li').eq(upeq).css({'opacity':'0','display':'none'});
				$(gunobj).find('li').eq(upeq).animate({'opacity':0},600);
				$(gunobj).find('li').eq(upeq).css({'display':'none'});
		 }
		 //alert(upeq+':'+noweq);
			if(noweq < count){
				 
				 $(gunobj).find('li').eq(noweq).css({'opacity':'1','display':'block'});
			   $(gunobj).find('li').eq(noweq).animate({'opacity':'1'},600);
			   $(gunobj).find('li').eq(noweq).css({'display':'block'});
		  } 
	}
	$(gunobj).find('.scleft').live("click", function() {  
		 clearInterval(timer); 
     	prive=ipage;
     	var cpage = ipage-1;
     	ipage = cpage >= 0?cpage:pagenum-1;
     	a(ipage);  
			change(); 
	})
	$(gunobj).find('.scright').live("click", function() {  
		 clearInterval(timer); 
     	prive=ipage;
     	var cpage = ipage+1;
     	ipage = cpage >= pagenum?0:cpage;
     	a(ipage);  
			change(); 
	})
	change();
	//构造页面数量
}
	
});


