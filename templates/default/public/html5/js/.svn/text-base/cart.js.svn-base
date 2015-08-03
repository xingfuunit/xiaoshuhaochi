$(function(){ 
	$('body').append('<div id="addload" style="position: absolute; z-index: 1000; left: 30%; top: 30%; opacity: 1; display: none; height: 15px;width: 15px;border-radius: 15px;line-height: 12px;overflow:hidden; background: #ea5413;"></div>'); 
});

//加购物车动画
function cartimg(obj){
	     $("#addload").show(); 
        var pos =$(obj).offset();
       var topval = pos.top;
       $("#addload").css("top", topval + "px"); 
       $("#addload").css("left", pos.left + "px");
        $("#addload").css({'width':'15px','height':'15px'}); 
       var target_ob = $('#buy-DishCaiCount').offset();
       var target_top = Number(target_ob.top);
       var target_left = Number(target_ob.left);
       $("#addload").animate({top:target_top,left:target_left, 'width':'0px','height':'0px'});  
       $(obj).find('.listnumber').eq(0).css({width:'30px',height:'30px'});
       var shuliang = Number($(obj).find('.listnumber').eq(0).find('span').eq(0).text())+1;
       $(obj).find('.listnumber').eq(0).find('span').eq(0).text(shuliang);
       if($('.hv').find('.qipao').eq(0).html() != undefined){
       	  var othershu = Number($('.hv').find('.qipao').eq(0).text())+1;
       	  $('.hv').find('.qipao').eq(0).text(othershu);
       }else{ 
          $('.hv').append('<div class="qipao" style="position: absolute; top: 8px; right: 5px; width: 16px; height: 16px; line-height: 13px; text-align: center; color: rgb(255, 255, 255); background-image: url(/upload/images/qipao.png); background-size: 16px; background-position: 0px 0px; background-repeat: no-repeat no-repeat;">1</div>');
       }
       $('#buy-DishCaiCount').text(Number($('#buy-DishCaiCount').text())+1);
	    	$('#buy-paycount').text(Number($('#buy-paycount').text())+Number($(obj).attr('data-price')));
	    	if(Number($('#buy-paycount').text()) > Number(shoplimitcost)){
	          		 $('#shoplimitcost').text('');
	          	}else{
	          	        var checkcost = Number(shoplimitcost)-Number($('#buy-paycount').text());
	          	        $('#shoplimitcost').text('差'+checkcost+'起送');
	          	        
	          	}
} 
function addonedish(gid,tshopid,num,obj){   
	var url= siteurl+'/index.php?controller=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
    	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       if($('#addShopping').html() != undefined){
	   	 	   cartimg($('#gid_'+gid));  
	   	   }else{// $('#loading').hide();
	   	    	 freshcart();
	   	   }
	    }else{
	    	 Tmsg(bk.content);  
	    } 
	    $('#loading').hide();
}
function uponedish(gid,tshopid,num){ 
	var url= siteurl+'/index.php?controller=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
    	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	Tmsg(bk.content);  
	    }
}
	
function delshopcart(){
	if(confirm('确认清空购物车')){
	var url= siteurl+'/index.php?controller=site&action=clearcart&shopid='+shopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	Tmsg(bk.content);
	    }
  }
  return false;
}

function removeonedish(gid,tshopid,num){ 
	   $('#loading').show();
	   url = siteurl+'/index.php?controller=site&action=downcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
	  	 url = url.replace('@random@', 1+Math.round(Math.random()*1000));
    	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	Tmsg(bk.content);
	    }
	  $('#loading').hide();
}
 
//删除商品
function removesupplierdish(gid,tshopid){
 
	url = siteurl+'/index.php?controller=site&action=delcartgoods&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
	url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	Tmsg(bk.content);
	    }
}
//修改购物车数量
function modifycart(gid,oldnum,tshopid){  
	var nowgscount = 	$('#cart_count'+gid).val();
	url = siteurl+'/index.php?controller=site&action=modifycart&goods_id='+gid+'&shopid='+tshopid+'&num='+nowgscount+'&datatype=json&random=@random@';
	url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	$('#cart_count'+gid).val(oldnum);
	    	Tmsg(bk.content);
	    }
} 
function freshcart(){
	url = siteurl+'/index.php?controller=html5&action=cart&shopid='+shopid+'&datatype=json&random=@random@';
	url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,''); 
	 freshcartdata(bk);
}
function freshcartdata(datas){ 
	  if(datas.flag == false){    
	     if($('#addShopping').html() != undefined){
	      
	     	//检索  画  图案
	     	 $.each(datas.content.list, function(i,val){   
	     	 	 
	     	 	 if($('#gid_'+val.id).html() != undefined){  
	     	 	 	  $('#gid_'+val.id).find('.listnumber').eq(0).css({width:'30px',height:'30px'});
              var shuliang = Number($('#gid_'+val.id).find('.listnumber').eq(0).find('span').eq(0).text())+Number(val.count);
              $('#gid_'+val.id).find('.listnumber').eq(0).find('span').eq(0).text(shuliang); 
              if($('#cp_'+val.typeid).html() != undefined){
                   if($('#cp_'+val.typeid).find('.qipao').eq(0).html() != undefined){
                  	  var othershu = Number($('#cp_'+val.typeid).find('.qipao').eq(0).text())+Number(val.count);
       	              $('#cp_'+val.typeid).find('.qipao').eq(0).text(othershu);
                   }else{ 
                      $('#cp_'+val.typeid).append('<div class="qipao" style="position: absolute; top: 8px; right: 5px; width: 16px; height: 16px; line-height: 13px; text-align: center; color: rgb(255, 255, 255); background-image: url(/upload/images/qipao.png); background-size: 16px; background-position: 0px 0px; background-repeat: no-repeat no-repeat;">'+val.count+'</div>');
                    }
              }
              
              
	     	 	 } 
	      	}); 
	      	$('#buy-DishCaiCount').text(datas.content.sumcount);
	      	$('#buy-paycount').text(datas.content.sum);
	      	if(Number($('#buy-paycount').text()) > Number(shoplimitcost)){
	          		 $('#shoplimitcost').text('');
	          	}else{
	          	        var checkcost = Number(shoplimitcost)-Number($('#buy-paycount').text());
	          	        $('#shoplimitcost').text('差'+checkcost+'起送');
	          	        
	          	}
    	 }else{
    	  	$('.listcontent').remove();
    	 	  $.each(datas.content.list, function(i,val){    
    	 	 	  var htmls = template.render('cartlist', {list:val});
    	 	 	  $('.list').append(htmls);
    	    }); 
    	    $('.colgreen').remove();//移除促销
    	     //重画促销 
    	    $.each(datas.content.gzdata, function(i,val){    
    	    	  $('#test').after('<p  class="colgreen">'+val+' </p>');
    	    });
    	    cartbagcost = datas.content.bagcost;
    	    cxcost =  datas.content.downcost;
          cartsum = datas.content.sum;
          cartpscost = datas.content.pscost;
          carttj();
          if(datas.content.canps != 1){
             Tmsg('你选择的配送区域未在店铺配送范围内，请重新选择');
          }
     	 }
    }else{
  		  if($('#addShopping').html() != undefined){
      	}else{
      		$('.listcontent').remove();
      		$('.colgreen').remove();//移除促销
      		cartbagcost =0;
             cartpscost = 0;
             cartsum = 0;
             cxcost = 0;
              carttj();
      	}
    }
}

function carttj(){
	//alert(cartsum);
	$('#packagingFee').text(cartbagcost);
	$('#fixedDeliveryFee').text(cartpscost);
	var totalFee =Number(cartbagcost)+Number(cartpscost)+Number(cartsum)-Number(cxcost);
	$('#totalFee').text(totalFee);
} 

function  orderSubmit(){ 
	if($('#username').val() == ''){
	   Tmsg('请录入联系人名');
	}
	if($('#mobile').val() == ''){
	   Tmsg('请录入联系电话');
	}
	
	if($('#addressdet').val()  == $('#addressdet').attr('data')){
	  Tmsg('请录入具体地址');
	  return false;
	}
	
	
	
	$('#loading').show();
	  url = siteurl+'/index.php?controller=html5&action=makeorder&datatype=json&random=@random@';
	  url = url.replace('@random@', 1+Math.round(Math.random()*1000));
   $.ajax({         //script定义
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
            dataType: "json",
            async:true,
            data:{shopid:shopid,'remark':$('#remark').val(),'username':$('#username').val(),'mobile':$('#mobile').val(),'addressdet':$('#addressdet').val(),'minit':$("#DeliveryTime").find("option:selected").val()},
            success:function(content) { 
            	if(content.error ==  false){
            		window.location.href=  siteurl+'/index.php?controller=html5&action=subshow&orderid='+content.msg ;//.html?orderid='+datas.data;
            	}else{
            		Tmsg(content.msg);
            	}
             	$('#loading').toggle();
            
            },
            error:function(){
             $('#loading').toggle();
            }
   });     
}
function showorder(datas){
	//
  window.location.href='subshow.html?orderid='+datas.data;//alert(datas);
}
 
 


