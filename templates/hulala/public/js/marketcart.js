$(function(){ 
	  initcart();
	   maketimenenu();
	  $('.first .add').live("click", function() {  
	  	 var inputobj = $(this).parent().find('input').eq(0);
	  	 var objshu = Number($(inputobj).val())+1;
	  	 var alls = Number($(this).attr('udata'));
	  	 if(objshu > alls){
	  	 	 diaerror('商品库存不足添加失败'); 
	  	 }else{
	  	 addcart($(this).attr('data'));
	  	 }
	  });
	  $('.first .Reduce').live("click", function() {  
	  	 downcart($(this).attr('data'));
	  });
	   $('.first .del').live("click", function() {  
	  	 delcart($(this).attr('data'));
	  });
	  $('#selectText').live("click", function() {  
	  	$('#timesSel').show();
	  });
	  $('#selectBtn').live("click", function() {  
	  	if($('#timesSel').is(':visible')){
	  	  $('#timesSel').hide();
	  	}else{
	  		$('#timesSel').show();
	  	}
	  });
	   
	  $('#timesSel li').live("hover", function() {  
	  $(this).addClass('on').siblings().removeClass('on'); 
	  });
	   $('#timesSel li').live("click", function() {  
	      $('#selectText').text($(this).text());
	    $("input[name='sendchoicetime']").val($(this).attr('data'));
	  });
	  $('#selectDate').live("click", function() {  
	  	if($('#dataSel').is(':visible')){
	  	  $('#dataSel').hide();
	  	}else{
	  		$('#dataSel').show();
	  	}
	  });
	   $('#dataSel li').live("hover", function() {  
	     $(this).addClass('on').siblings().removeClass('on'); 
	  });
	   $('#dataSel li').live("click", function() {  
	      $('#dateShow').text($(this).text());
	       $("input[name='senddate']").val($(this).attr('data')); 
	       maketimenenu();
	  });
	  $('#subData').live("click", function() {  
	  	$('.error').text(''); 
	  	   $('.error').removeClass('error');
	  	   $('.default').removeClass('default');
	  	   
	      	if(!Is_Chuname($('#uname').val())){
  	    	    $('#unametip').addClass('tip default error');
  	    	    $('#unametip').text('请录入中文姓名');  
  	            	return false;
  	      }else if(!Is_phone($('#uphone').val())){
  	           $('#uphonetip').addClass('tip default error');
  	           $('#uphonetip').text('请录入手机号');   
  	          return false;
  	      }else if($('#unaddress').val() == '' ||$('#unaddress').val().length < 3 ){
  	      	 $('#unaddresstip').addClass('tip default error');
  	      	 $('#unaddresstip').text('录入地址长度大于3'); 
  	         return false;
  	      }else if($("input[name='senddate']").val() == ''){
  	      	$('#checktimetip').text('请选择日期');
  	      	$('#checktimetip').addClass('tip default error');
  	          
  	          return false;
  	      }else if($("input[name='sendchoicetime']").val() == ''){
  	      	$('#checktimetip').addClass('tip default error');
  	         $('#checktimetip').text('请选择时间段'); 
  	           return false;
  	      }else if($("input[name='checkway']").val() == ''){
  	      	 $('#checkwaytip').addClass('tip default error');
  	    	   $('#checkwaytip').text('请选择支付方式');
  	    	    return false;
  	     }else{
  	    	//检测下单时间是否过期
  	        donext();
  	     }
	  });
	  $('#uname').live('blur',function(){
	  	if(!Is_Chuname($('#uname').val())){
  	    	    $('#unametip').addClass('tip default error');
  	    	    $('#unametip').text('请录入中文姓名');  
  	          
  	  }else{
  	  	    $('#unametip').removeClass('tip default error');
  	  	    $('#unametip').addClass('tip');
  	    	    $('#unametip').text('');  
  	  }
	  });
	  $('#uphone').live('blur',function(){
	  	if(!Is_phone($('#uphone').val())){
  	           $('#uphonetip').addClass('tip default error');
  	           $('#uphonetip').text('请录入手机号');   
       }else{
       	 $('#uphonetip').removeClass('tip default error');
       	 $('#uphonetip').addClass('tip');
       	 $('#uphonetip').text('');   
  	   }
	  	
	  })
	  $('#unaddress').live('blur',function(){
	  	if($('#unaddress').val() == '' ||$('#unaddress').val().length < 3 ){
  	      	 $('#unaddresstip').addClass('tip default error');
  	      	 $('#unaddresstip').text('录入地址长度大于3'); 
  	  }else{
  	  	 $('#unaddresstip').removeClass('tip default error');
       	 $('#unaddresstip').addClass('tip');
       	 $('#unaddresstip').text('');   
  	   }
	  });
	  $('#market-cart-payment li').live("click", function() {  
	  	$("input[name='checkway']").val($(this).attr('t'));
	  	$(this).addClass('active').siblings().removeClass('active'); 
	  	
	  });
	   
});
function donext(){
	//
	$('#subData').attr('disabled',true);
	var goodlistobj = $('#listData').find('li.first');
	var goodsids=new Array();
	var goodscount = new Array();
	for(var i=0;i<$(goodlistobj).length;i++){
	  	var gid = $(goodlistobj).eq(i).attr('item-id');  
	  	goodsids.push(gid);
	  	 goodscount.push($('#'+gid+'_amout').val());
	}
	 var area1 = $("select[name='area1']").find("option:selected").val(); 
  var area2 = $("select[name='area2']").find("option:selected").val(); 
  var area3 = $("select[name='area3']").find("option:selected").val(); 
	var senddate = $("input[name='senddate']").val();
	var sendtime =$("input[name='sendchoicetime']").val();
	var paytype = $("input[name='checkway']").val();
	var dikou = $('#dikoujin').val();
	var juanid = $("input[name='buyjuan']:checked").val();
	var remark = $('#unRemark').val();
	$.ajax({
       type: 'POST',
       async:false,
       url: submithtml.replace('@random@', 1+Math.round(Math.random()*1000)),
       data: {'shopid':0,'goodsids':goodsids,'goodscount':goodscount,'remark':remark,'paytype':paytype,'dikou':dikou,'username':$('#uname').val(),'area1':area1,'area2':area2,'area3':area3,'mobile':$('#uphone').val(),'addressdet':$('#unaddress').val(),'senddate':senddate,'minit':sendtime,'juanid':juanid},
      dataType: 'json',success: function(content) { 
      	if(content.error == false)
      	{
      		$('#subData').attr('disabled',false);
      		 	var newurl = orderhtml.replace('@orderid@', content.message);
      		window.location.href=newurl; 
      	}else if(content.error == true)
      	{
      		$('#subData').attr('disabled',false);
      		 alert(content.err);
      	   //$('#showsubmit').hide();
      	}else{
      		$('#subData').attr('disabled',false);
      	  alert(content);
      	   //$('#showsubmit').hide();
      	}
      	
		  },
      error: function(content) { 
      	$('#subData').attr('disabled',false);
      	alert('提交数据失败'); 
      	//$('#showsubmit').hide();
	   }
   });
	 
}
function maketimenenu(){
 
	var selectdate = $("input[name='senddate']").val(); 
  $('#timesSel').html('<li data="">请选择</li>'); 
  
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
  $('#timesSel li').eq(0).trigger('click');
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
            $('#timesSel').append('<li data="'+timesee+'">'+timesee+'</li>'); 
         }
	     }
	}
	
	
}
function gettotal(){
	var goodscost =  $('#sumPrice').attr('data'); 
	var costdata = $('#fees').attr('data');
	if(goodscost > 0){
		var allcost = Number(goodscost)+Number(costdata);
		allcost = allcost-Number($('#dikoujin').val())-Number($('#juancost').val());
		$('#sumPrice').text(allcost);
		$('#pscost').text(costdata);
		 
	}else{
		$('#sumPrice').text('0');
	}
	
}
function junshow(){
	$('#juancost').val('0');
	var allcost = Number($('#shopcost').val());
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
function jifenduihuan(){ 
	if($("#jifendkou").is(":hidden")){
	}else{
		var myjifen = Number($('#activeJifen2').attr('data'));
		var jifenbili = Number($('#activeJifen2').attr('jfendata'));
		var rslt = Number(myjifen)/Number(jifenbili); //除 
	  var canduihuan = rslt - Math.floor(rslt) > 0?Math.floor(rslt):Math.floor(rslt);//总页面数量
	  var shopcost = $('#shopcost').val();
	  var cancost = Math.ceil(shopcost) > canduihuan ? canduihuan:Math.ceil(shopcost); 
	  var htmlbottom = '';
	  if(jifenbili > 0){
	      for(var i=1;i<cancost;i++){
	      	var jifenall = Number(i)*jifenbili;
	      	htmlbottom += '<option value="'+i+'">使用'+jifenall+'积分抵扣'+i+'元</option>';
	      }
	      if(htmlbottom != ''){
	      	$('#activeJifenselect').html('<select name="jfdk" onchange="jisuanjf();" style="height:30px;"><option value="0">不使用积分抵扣</option>'+htmlbottom+'</select>');
	      	$('#jifenPromotion2').show();
	      }else{
	      	$('#activeJifenselect').html('');
	      	$('#jifenPromotion2').hide();
	      }  
	  }else{
	  	$('#jifenPromotion2').hide();
	  }
	}
	junshow(); 
}
function jisuanjf(){
  var alltotal = Number($('#total').attr('data'));
	var downcost =  $("select[name='jfdk']").find("option:selected").val();
	downcost = downcost == undefined?0:downcost;
	$('#dikoujin').val(downcost);
 gettotal();
}
function initcart(){
	var carttemp = $.cookie('market_id'); 
	var cartcount =  $.cookie('market_count');  
	if(carttemp == undefined){
		$.cookie('market_id', '');
	}
	if(cartcount == undefined){
		$.cookie('market_count', '');
	}
	if(carttemp != null && carttemp != '' && carttemp != undefined && cartcount != undefined && cartcount!=null && cartcount!=''){
     var maketid = carttemp.split(',');
     var marketcount = cartcount.split(',');
     var allcount = 0;
     var temparray = new Array();
     var temparray1 = new Array();
     for(var i=0;i < maketid.length;i++){ 
      
     	 if(maketid[i] != null && maketid[i] != '' && maketid[i] !='null'){
     	     allcount += Number(marketcount[i]); 
     	     temparray.push(maketid[i]);
     	     temparray1.push(marketcount[i]);
       }
     // alert(marketcount[i]);
     }  
    
     $('#goodsSums').text(allcount); 
      $('#dikoujin').val(0);
  	 $('#juancost').val(0);
     creatjiemian(); 
     //写界面  <{ofunc type=url link="/market/getcook/random/@random@"}>
  }else{
  	$('#goodsSums').text('0');
  	 $('#goodSum').text('0');
  	 $('#shopcost').val('0');
  	 $('#dikoujin').val(0);
  	 $('#juancost').val(0);
  	 
  	 var checkdata = $('#fees').attr('udata');
  	 if(checkdata == 1){
  	 $('#fees').text('0');
  	 }else{
  	 	$('#fees').text('未指定配送区域(下单时计算)');
  	 }
  	 $('#sumPrice').text('0');
  }
  jifenduihuan();
}
function creatjiemian(){
	  var newlink = marketcook.replace('@random@', 1+Math.round(Math.random()*1000));
	  $('#listData .first').remove();  
	 
	   $.ajax({
        type: 'post',
        async:false,
        data:{'ids':''},
        url: newlink, 
        dataType: 'json',success: function(content) {   
              if(content.error == false){
              	  var goodSum = 0;
              	  var fees = 0;
              	  var sumPrice = 0; 
              	  for(var i=0;i< content.message.length;i++){ 
              	  	 var htmls = template.render('trgoodlist', content.message[i]); 
              	  	 $('#listData').find('.tHead').after(htmls);
              	  	 goodSum += Number(content.message[i].sum);
              	  }
              	  var defulatheight = Number(content.message.length)*61;
              	 $('#sumPrice').attr('data',goodSum);
              	  $('#shopcost').val(goodSum);
  	               gettotal();
     	        }else{
     	          alert(content);
     	        }
		   },
       error: function(content) { 
    	     diaerror('数据商城购物车失败'); 
	     }
   }); 
}
function addcart(goodid){
	var carttemp = $.cookie('market_id'); 
	var cartcounttemp =  $.cookie('market_count');  
	var cartids = new Array();
	var cartcount = new Array();
	var gids = 0;
  cartids = carttemp == null || carttemp==''?cartids:carttemp.split(',');
  cartcount = cartcounttemp == null || cartcounttemp==''?cartcount:cartcounttemp.split(',');
	if($.inArray(goodid, cartids) == -1){
		cartids.push(goodid);
		cartcount.push(1);
		gids = 0;
	}else{
		var cc = $.inArray(goodid, cartids);
		cartcount[cc] = Number(cartcount[cc])+1;
		gids = Number(cartcount[cc])+1;
	}
	if(checkkc(goodid,gids)){
	    savecart(cartids,cartcount); 
  }else{
  	  diaerror('商品库存不足添加失败'); 
  }
}
//检测库存
function checkkc(gid,gids){
	var cuc = Number($('#listgoodimg'+gid).attr('data'));
	if(Number(gids) > cuc){
		return false;
	}else{
		return true;
	}
}
function downcart(goodid){
	var carttemp = $.cookie('market_id'); 
	var cartcounttemp =  $.cookie('market_count');  
	var cartids = new Array();
	var cartcount = new Array();
  cartids = carttemp == null || carttemp==''?cartids:carttemp.split(',');
  cartcount = cartcounttemp == null || cartcounttemp==''?cartcount:cartcounttemp.split(',');
	if($.inArray(goodid, cartids) != -1){ 
		var cc = $.inArray(goodid, cartids);
		var bb= Number(cartcount[cc])-1;
		if(bb < 1){
			delcart(goodid);
		}else{
			cartcount[cc] = bb;
			savecart(cartids,cartcount); 
		} 
	}  
	
}
function savecart(gids,shuliangs){ 
  var idsm = gids.length > 0?gids.join(","):null;
  var idsms = shuliangs.length > 0?shuliangs.join(','):null;
  $.cookie('market_id',idsm,{path:"/"}); 
  $.cookie('market_count',idsms,{path:"/"}); 
  initcart();
}
function delcart(goodid){
	var carttemp = $.cookie('market_id'); 
	var cartcounttemp =  $.cookie('market_count');  
	var cartids = new Array();
	var cartcount = new Array();
  cartids = carttemp == null || carttemp==''?cartids:carttemp.split(',');
  cartcount = cartcounttemp == null || cartcounttemp==''?cartcount:cartcounttemp.split(',');
	if($.inArray(goodid, cartids) != -1){ 
		var cc = $.inArray(goodid, cartids);
		cartids.remove(cc);
		cartcount.remove(cc);//[cc] = Number(cartcount[cc])+1;
	} 
	savecart(cartids,cartcount); 
}
Array.prototype.remove = function (dx) {  
    if (isNaN(dx) || dx > this.length) {  
        return false;  
    }  
    for (var i = 0, n = 0; i < this.length; i++) {  
        if (this[i] != this[dx]) {  
            this[n++] = this[i];  
        }  
    }  
    this.length -= 1;  
}; 
$(window).scroll(function(){
		if($(this).scrollTop()!=0){		
			 scrollmenu($(this).scrollTop());
			 
		}else{
			 
		} 
});
function scrollmenu(scheight){
	 if($('#marketNavWarp').attr('data') != undefined){ 
	  
	 	    if(scheight > Number($('#marketNavWarp').attr('data'))){
	 	    	$('#marketNavWarp').css({'position':'fixed','top':'0'});
	 	    }else{
	 	    	$('#marketNavWarp').css({'position':'','top':''});
	 	    }
	 	    
	 }  
}



 
/*
$.cookie('the_cookie'); // 获得cookie 
$.cookie('the_cookie', 'the_value'); // 设置cookie 
$.cookie('the_cookie', 'the_value', { expires: 7 }); //设置带时间的cookie 
$.cookie('the_cookie', '', { expires: -1 }); // 删除 
$.cookie('the_cookie', null); // 删除 cookie 
*/

 
 
 