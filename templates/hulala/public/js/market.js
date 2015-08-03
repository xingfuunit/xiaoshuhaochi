$(function(){ 
	var menus = $('.first-class'); 
	if(menus != undefined){
		 $(menus).find("li:odd").addClass('double'); 
	}
	var menupos =$('#marketNavWarp').offset();
  var topval = menupos.top;
  $('#marketNavWarp').attr('data',topval);
	initcart();
	 $('.goodsClassWarp li').hover(function(){
	 	 $(this).find('h4').addClass('active hover'); 
	      var suoyin = $(this).parent().find('li').index(this);
	  
	      $(this).find('.second-class').css('top',Number(suoyin)*30);
	     $(this).find('.second-class').show();
	     $(this).find('h4').find('span').css('border-color','rgb(255, 255, 255)');
	 });
	 $('.marketClassTitle').hover(function(){
	 	   $(this).addClass('hover');
	 	   $(this).parent().find('ul').show();
	 });
	 $('.goodsClassWarp').mouseleave(function(){
	 	 $('.marketClassTitle').removeClass('hover');
	    	$('#market_navWarp .first-class').hide();
	 });
	 $('.goodsClassWarp li').mouseleave(function(){
    	var objc =  $(this).find('h4').eq(0).attr('data');
    	if(objc != undefined && objc ==1){
    		   
    	}else{
    		 $(this).find('h4').removeClass('active hover'); 
	      $(this).find('.second-class').hide();
    	} 
    });
    $('.list-goods li').hover(function(){
	 	 $(this).find('h4').addClass('active'); 
	   $(this).removeClass('double');
	     $(this).find('h4').find('span').css('border-color','rgb(255, 255, 255)');
	 });
	 $('.list-goods li').mouseleave(function(){
    	var objc =  $(this).find('h4').eq(0).attr('data');
    	if(objc != undefined && objc ==1){
    		   
    	}else{
    		 $(this).find('h4').removeClass('active');  
    	} 
    });
	 
	 $('.good-item').hover(function(){
	     $(this).addClass('active'); 
    });
    $('.good-item').mouseleave(function(){
	    $(this).removeClass('active'); 
	    
    });
    $('#shopCartWarp').hover(function(){ 
    	$('.shopCartContent').show();
    });
    $('#shopCartWarp').mouseleave(function(){
    	$('.shopCartContent').hide();
    });
	  $('.addgoods').click(function(){ 
	     $("#addload").html($('#listgoodimg'+$(this).attr('item-id')).html());
	  	 $("#addload").show(); 
	     var pos =$(this).parent().parent().parent().offset();
       var topval = pos.top;
       $("#addload").css("top", topval + "px"); 
       $("#addload").css("left", pos.left + "px");
        $("#addload").css({'width':'181px','height':'207px'}); 
       var target_ob = $('#shopCartWarp').offset();
       var target_top = Number(target_ob.top);
       var target_left = Number(target_ob.left);
       $("#addload").animate({top:target_top,left:target_left, 'width':'0px','height':'0px'});  
       var gid = $(this).attr('item-id');
       addcart(gid);
       //delcart(gid); 
	  });
	  $('#shopCart-goodslist .add').live("click", function() {  
	  	 var inputobj = $(this).parent().find('input').eq(0);
	  	 var objshu = Number($(inputobj).val())+1;
	  	 var alls = Number($(this).attr('udata'));
	  	 if(objshu > alls){
	  	 	 diaerror('商品库存不足添加失败'); 
	  	 }else{
	  	 addcart($(this).attr('data'));
	  	 }
	  });
	  $('#shopCart-goodslist .Reduce').live("click", function() {  
	  	 downcart($(this).attr('data'));
	  });
	   $('#shopCart-goodslist .del').live("click", function() {  
	  	 delcart($(this).attr('data'));
	  });
	  $('#goAccounts').live("click", function(){  
	  	window.location.href=marketlink;
	  });
	  
});
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
     creatjiemian(); 
     //写界面  <{ofunc type=url link="/market/getcook/random/@random@"}>
  }else{
  	$('#goodsSums').text('0');
  	 $('#goodSum').text('0');
  	 var checkdata = $('#fees').attr('udata');
  	 if(checkdata == 1){
  	 $('#fees').text('0');
  	 }else{
  	 	$('#fees').text('未指定配送区域(下单时计算)');
  	 }
  	 $('#sumPrice').text('0');
  }
}
function creatjiemian(){
	  var newlink = marketcook.replace('@random@', 1+Math.round(Math.random()*1000));
	  $('#shopCart-goodslist').html('');  
	  $('#shopCart-goodslist').css('height','0px');
	  $('#shopCart-goodslist').parent().css('height','0px');
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
              	  	 $('#shopCart-goodslist').append(htmls);
              	  	 goodSum += Number(content.message[i].sum);
              	  }
              	  var defulatheight = Number(content.message.length)*61;
              	  $('#shopCart-goodslist').css('height',defulatheight+'px');
              	  $('#shopCart-goodslist').parent().css('height',defulatheight+'px');
              	  $('#goodSum').text(goodSum);
              	  var checkdata = $('#fees').attr('udata');
  	              if(checkdata == 1){
  	                  fees = Number(goodSum) > 0? Number($('#fees').attr('data')):0;
  	                  $('#fees').text(fees);
  	              }else{
  	 	               $('#fees').text('未指定配送区域(下单时计算)');
  	              }
  	              sumPrice = goodSum+fees;
  	              $('#sumPrice').text(sumPrice);
  	               
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

 
 
 