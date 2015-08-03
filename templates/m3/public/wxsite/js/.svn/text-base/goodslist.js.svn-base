$(function(){ 
 	   if(is_open == true){
 	     	$.getScript(siteurl+'/index.php?ctrl=html5&action=getshop&shopid='+shopid);   
 	   }
 	   $('#loading').hide(); 
 }); 
function shopset(datas){ 
	 if(datas.error == false)
   	{ 
   		/*
        var htmls = template.render('shopinfo_t', {list:datas.data});
        $('#shopinfo').append(htmls);  */
        $('#shopname').text(datas.data.shopname);
        /*
        if(datas.data.collect > 0){
        	$('#favor').removeClass('scno');
        }*/
        //获取店铺信息
        gooodsdata();
   }else{ 
   	   is_open = false;
       error($('.wm-container'),datas);
   }  
}
$('#favor').live("click", function() {  
	if($(this).hasClass('scno') == true){
		 $.getScript(siteurl+'/index.php?ctrl=html5&action=addcollect&collectid='+shopid);
	}else{
		 
		 $.getScript(siteurl+'/index.php?ctrl=html5&action=delcollect&collectid='+shopid);
	}
	    
});
function collectfresh(){
	if($('#favor').hasClass('scno') == true){
		$('#favor').removeClass('scno');
	}else{
		$('#favor').addClass('scno');
	}
}
function gooodsdata(){
	$.getScript(siteurl+'/index.php?ctrl=html5&action=getgoods&shopid='+shopid);   
}
function setgooddata(datas){ 
	  if(datas.error == false)
   	{ 
  	   $.each(datas.data.typelist, function(i,val){     //常用JSON数据 返回
   		   	  $('.sortbox>ul').append('<li id="cp_'+val.id+'" dataid="'+val.id+'">'+val.name+'</li>');
       })
          $.each(datas.data.goodslist, function(i,val){     //常用JSON数据 返回
   		   	   var htmls = template.render('goodshow', {list:val});
   		   	   $('#scrollLoading>ul').append(htmls);
         })
         // $("input").trigger("select");
 $('.sortbox li').bind("click", function() {   
	  $(this).addClass('hv').siblings().removeClass('hv');
	  var typeid = $(this).attr('dataid');
	  if(typeid !== undefined){ 
	      $.each($('#scrollLoading').find('li'), function(i,val){  
	      	if($(val).attr('data-categoryid') == typeid){
	      	   $(val).show();
	      	}else{
	      	   $(val).hide();
	      	} 
        });   
	  }
});
$('.clkitm').bind("click", function() {   
	$('#loading').show();
	     var gid = $(this).attr('data-supplierdishid'); 
	     var url = siteurl+'/index.php?ctrl=html5&action=addcart&goods_id='+gid+'&shopid='+shopid+'&num=1&random=@random@';
	      url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	     $.getScript(url);
	   
});
         $('.sortbox').find('li').eq(0).trigger("click");
          $.getScript(siteurl+'/index.php?ctrl=html5&action=cart&shopid='+shopid);
   }else{ 
   	   //is_open = false;
       // error($('.wm-container'),datas);
   }   
}
//菜单切换

$('#addShopping').click(function(){ 
	window.location.href='cart.html?shopid='+shopid;
});