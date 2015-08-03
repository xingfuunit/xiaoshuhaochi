$(function(){ 
	var menus = $('.first-class'); 
	if(menus != undefined){
		 $(menus).find("li:odd").addClass('double');
		 $('.first-class li').hover(function(){
	     $(this).find('h4').addClass('active hover'); 
	      var suoyin = $(".first-class li").index(this);
	      $(this).find('.second-class').css('top',Number(suoyin)*30);
	     $(this).find('.second-class').show();
	     $(this).find('h4').find('span').css('border-color','rgb(255, 255, 255)');
    });
    $('.first-class li').mouseleave(function(){
    	var objc =  $(this).find('h4').eq(0).attr('data');
    	if(objc != undefined && objc ==1){
    		   
    	}else{
    		 $(this).find('h4').removeClass('active hover'); 
	      $(this).find('.second-class').hide();
    	} 
    });
	}
	 $('.good-item').hover(function(){
	     $(this).addClass('active'); 
    });
    $('.good-item').mouseleave(function(){
	    $(this).removeClass('active'); 
	    
    });
	  $('.addgoods').click(function(){
	  	  var adto = addcart($(this).attr('item-id'),'goods');
	     if(adto ==  true)
	     {
	  	 $("#addload").show();
	     var pos =$(this).offset();
       var topval = pos.top;
       $("#addload").css("top", topval + "px"); 
       $("#addload").css("left", pos.left + "px"); /*初始化位置*/ 
       var target_ob = $('#lanzi').offset();
       var target_top = Number(target_ob.top);
       var target_left = Number(target_ob.left);
       $("#addload").animate({'opacity':'1'}).animate({top:target_top,left:target_left, 'opacity':'0'}); 
       var lanzis = Number($('#lanzi').attr('data'))+1;
       $('#lanzi').attr('data',lanzis);
       $('#lanzi').text('('+lanzis+')');
      } 
	  });
	// 
});
 
 function addcart(goods_id,types){  
	var  returnstr = false;
	var url =siteurl+'/index.php?controller=site&action=addcart'; 
	var backinfo = ajaxback(url,{'shopid':'0','goods_id':goods_id,'num':1,'type':types});
	if(backinfo.content == 'ok')
  {
     		returnstr = true;
   }else{
    if(backinfo.content == 'no')//购物车店铺和当前店铺不一致
    {
     		diaerror('购物车中存在其他店铺商品请先进行清空再添加到购物车内');
    }else{
     			diaerror(backinfo.content); 
    }
  } 
	return returnstr; 
}