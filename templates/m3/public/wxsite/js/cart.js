$(function(){ 
	$('body').append('<div id="addload" style="position: absolute; z-index: 1000; left: 30%; top: 30%; opacity: 1; display: none; height: 15px;width: 15px;border-radius: 15px;line-height: 12px;overflow:hidden; background: #ea5413;"></div>'); 
});

//加购物车动画
function cartimg(obj,gid){
	     $("#addload").show(); 
        var pos =$(obj).offset();
       var topval = pos.top;
       $("#addload").css("top", topval + "px"); 
       $("#addload").css("left", pos.left + "px");
        $("#addload").css({'width':'15px','height':'15px'}); 
       var target_ob = $('#total_money').offset();
       var target_top = Number(target_ob.top);
       var target_left = Number(target_ob.left);
       $("#addload").animate({top:target_top,left:target_left, 'width':'0px','height':'0px'});   
       $('#total_count').text(Number($('#total_count').text())+1);
	    	$('#total_money').text(Number($('#total_money').text())+Number($(obj).attr('data-price'))); 
	    	
	    	if(Number($('#total_money').text()) > Number(shoplimitcost)){
	          		 $('#showlimit').text('');
	          	}else{
	          	        var checkcost = Number(shoplimitcost)-Number($('#total_money').text());
	          	        $('#showlimit').text('差'+checkcost+'起送');
	          	        
	          	}
	    	
	    	
	    	$('#gidli_'+gid).find('.righ_l_b_btn_moren').hide();
	    	$('#gidli_'+gid).find('.righ_l_b_btn_hover').show();
	  //    var typeid = $(obj).attr('typeid');
	  //    $('#typelist'+typeid).show();
	 //     $('#typelist'+typeid).text(Number($('#typelist'+typeid).text())+1);
	      $('#gidli_'+gid).addClass('onselect');
	      $('#gshu_'+gid).text(Number($('#gshu_'+gid).text())+1); 
	    	//if($(valse).is(':checked') == true)
} 
function addonedish(gid,tshopid,num,obj){   
	    $('#loading').show();
    	var url= siteurl+'/index.php?ctrl=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
    	var bk = ajaxback(url,'');
	    if(bk.flag == false){  
	       if($('#total_money').html() != undefined){
	         
	   	 	   cartimg($('#gid_'+gid),gid);  
	   	 	   
	   	   }else{// $('#loading').hide();
	   	   	
	   	    	  freshcart();
	   	   }
	    }else{
	    	 Tmsg(bk.content);  
	    } 
	    $('#loading').hide();
}
function uponedish(gid,tshopid,num){ 
	var url= siteurl+'/index.php?ctrl=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
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
	var url= siteurl+'/index.php?ctrl=site&action=clearcart&shopid='+shopid+'&num=1&datatype=json&random=@random@';
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
function delbackshop(nowlinke){
	var url= siteurl+'/index.php?ctrl=site&action=clearcart&shopid='+shopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	      window.location.href= nowlinke;// freshcart();
	    }else{
	    	Tmsg(bk.content);
	    }
   
}

function removeonedish(gid,tshopid,num){ 
	   $('#loading').show();
	   url = siteurl+'/index.php?ctrl=site&action=downcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
	  	 url = url.replace('@random@', 1+Math.round(Math.random()*1000));
    	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       if($('#total_money').html() != undefined){
	         /*操作分类*/
	         var typeid = $('#gidli_'+gid).attr('typeid'); 
	         var notypenum = Number($('#typelist'+typeid).text()) -1; 
	          $('#typelist'+typeid).text(notypenum);
	         if(notypenum < 1){
	             $('#typelist'+typeid).text(0);
	             $('#typelist'+typeid).hide();
	         } 
	         notypenum = Number($('#total_count').text())-1;
	         $('#total_count').text(notypenum);
	         if(notypenum < 1){
	         	  $('#total_count').text(0);
	         }
	         notypenum = Number($('#total_money').text())-Number($('#gidli_'+gid).attr('data-price')); 
	          $('#total_money').text(notypenum);
	         if(notypenum < 0){
	         	$('#total_money').text(0);
	         }
	         	if(Number($('#total_money').text()) > Number(shoplimitcost)){
	          		 $('#showlimit').text('');
	          	}else{
	          	        var checkcost = Number(shoplimitcost)-Number($('#total_money').text());
	          	        $('#showlimit').text('差'+checkcost+'起送');
	          	        
	          	}
	         notypenum = Number($('#gshu_'+gid).text()) -1;
	          $('#gshu_'+gid).text(notypenum);
	         if(notypenum < 1){
	         	$('#gshu_'+gid).text(0);
	         	$('#gidli_'+gid).removeClass('onselect');
	         	$('#gidli_'+gid).find('.righ_l_b_btn_hover').hide();
	         	$('#gidli_'+gid).find('.righ_l_b_btn_moren').show();
	         	
	         } 
	   	   }else{ 
	   	    	  freshcart();
	   	   }
	    }else{
	    	Tmsg(bk.content);
	    }
	  $('#loading').hide();
}
 
//删除商品
function removesupplierdish(gid,tshopid){
 
	url = siteurl+'/index.php?ctrl=site&action=delcartgoods&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
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
	url = siteurl+'/index.php?ctrl=site&action=modifycart&goods_id='+gid+'&shopid='+tshopid+'&num='+nowgscount+'&datatype=json&random=@random@';
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
	url = siteurl+'/index.php?ctrl=wxsite&action=cart&shopid='+shopid+'&datatype=json&random=@random@';
	url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,''); 
	if($('#shocart').html() == undefined){
		 
		initshop(bk);
	}else{
	 
	 freshcartdata(bk);
	 
	}
}
function freshcartdata(datas){ 
	 $('#shocart').html('');
	  if(datas.flag == false){    
    	   //	$('.listcontent').remove();
    	var temp_htmls = '<li class="box_inline borderbttom" style="line-height:40px;">'
       	  	   	  	   +'<div class="cart_gdtitle">商品</div>'
       	  	   	  	   +'<div class="cart_gdcontent"><div class="cart_inbtn" style="text-align:center;line-height: 30px;">数量</div><div class="shangpinjiage" style="text-align:center;">单价</div></div>'
                       +'</li> ';
          $('#shocart').append(temp_htmls);
    	 	  $.each(datas.content.list, function(i,val){    
    	 	 	  var htmls = template.render('cartlist', {list:val});
    	 	 	  $('#shocart').append(htmls);
    	    }); 
    	    
    	    $('#cartnum').text(datas.content.sumcount);
    	    $('#cartcost').text(datas.content.sum);
    	    
    	    
    	    
    	 //   $('#cart_total').text(datas.content.sum);
    	 //   $('#bagcost').text(datas.content.bagcost);
    	 //   $('#cxcost').text(datas.content.downcost);
    	    
    	    /*
    	     
       	  	   	  */
       	  	    
    	   
    	  temp_htmls = '<li class="box_inline borderbttom">'
       	  	   	  	 +'<div class="cart_gdtitle">打包费</div>'
       	  	   	  	 +'<div class="cart_gdcontent"><div class="shangpinjiage">￥'+datas.content.bagcost+'</div></div>'
       	  	   	    +'</li>'; 
    	    $('#shocart').append(temp_htmls);  
    	    
    	    temp_htmls = '<li class="box_inline borderbttom">'
       	  	   	  	 +'<div class="cart_gdtitle">店铺优惠</div>'
       	  	   	  	 +'<div class="cart_gdcontent"><div class="shangpinjiage">￥'+datas.content.downcost+'</div></div>'
       	  	   	    +'</li>'; 
    	    $('#shocart').append(temp_htmls);
    	    
    	    
    	    cartbagcost = datas.content.bagcost;
    	    cxcost =  datas.content.downcost;
          cartsum = datas.content.sum;
          cartpscost = datas.content.pscost; 
          surecost = datas.content.surecost;
           $('.addbtn').bind("click", function() {   
      	    	if(checknext ==  false){ 
      	    		checknext = true;
      	     	   addonedish($(this).attr('data-id'),$(this).attr('data-shopid'),1,this);
      	     	   setTimeout("myyanchi()", 500 );
           	  }
      	 	
          }); 
           $('.downdbtn').bind("click", function() {   
           	  if(checknext ==  false){ 
           	  		checknext = true;
      	     	   removeonedish($(this).attr('data-id'),$(this).attr('data-shopid'),1,this);
      	     	   setTimeout("myyanchi()", 500 );
           	  }
      	 	
          });
     	  
    }else{
  		   
      	//	$('.listcontent').remove();
      	//	$('.colgreen').remove();//移除促销
      		cartbagcost =0;
          cartpscost = 0;
           cartsum = 0;
          cxcost = 0;
          //    carttj();
           $('#cartnum').text(0);
    	    $('#cartcost').text(0);
          
          $('#nonecart').show();
          $('#cartlist').hide();
          $('#showdet').hide();
          
       
    }
}
function doordershow(){
	var checkid = $('#shocart').find('li').length;
	if(checkid > 0){
		$('#cartcontent').hide();
		$('#makecontent').show();
		$('#jifen').val(0);
		$('#juanid').val(0);
		$('#juancost').val(0);
	}else{
	   Tmsg('购物车无商品');
	}
   
}
function doselectjifen(bili,myscore){
	if(checknext ==  false){ 
    	checknext = true;
      	     	  
      	     	 
           	
	  var oldjifen = Number($('#jifen').val());
	  var myjifen = myscore;
		var jifenbili =bili;
		var rslt = Number(myjifen)/Number(jifenbili); //闄� 
	  var canduihuan = rslt - Math.floor(rslt) > 0?Math.floor(rslt):Math.floor(rslt);//鎬婚〉闈㈡暟閲�
	  var shopcost = surecost;
	 
	  var cancost = Math.ceil(shopcost) > canduihuan ? canduihuan:Math.ceil(shopcost); 
	  
	  var htmlbottom = '';
	  if(jifenbili > 0){ 
	      for(var i=1;i<=cancost;i++){
	      	 var temp_pre = '';
	      	if(oldjifen == i){
	      		temp_pre = 'on';
	      	}
	      	 var jifenall = Number(i)*jifenbili;
	      	 htmlbottom += '<li class="'+temp_pre+'" onclick="selectjifen(\''+i+'\',\'使用'+jifenall+'抵扣'+i+'元\');">抵扣'+i+'元</li>';
	      }
	      if(htmlbottom != ''){
	      	
	      	  htmlbottom = '<li class="" onclick="selectjifen(0,\'不使用积分抵扣\');">不使用积分抵扣</li>'+htmlbottom;
	      	  myScroll.scrollToElement('#jifenposition',100); 
	      //	 myScroll.scrollTo(0,Number(defaultheight)*-1,200,false); 
  	    //  myScroll.refresh();
  	         setTimeout(function () {
	             	loadhtml(htmlbottom,'#jifenposition');
	           }, 100);

	      	
	          
	      }else{
	      	 Tmsg('积分不超过'+bili+'，不能抵扣');
	      }
	      
	      
	      
	  }else{
	    Tmsg('积分不超过'+bili+'，不能抵扣');
	  } 
	    setTimeout("myyanchi()", 500 );
  }
}
function loadhtml(htmlbottom,elmid){
	myScroll.destroy();
	htmlbottom = '<div class="jifenshow" id="outdivshow"><ul>'+htmlbottom+'</ul></div>  ';
	      	 $('#popcontent').html(htmlbottom);
	  	 	  $('#mask1').show();
	        $('#popup1').show();
	        var allheight = $(window).height();
	          // var bottom = $("#jifenposition").offset().bottom;//元素相当于窗口的左边的偏移量
             var top = $(elmid).offset().top;//元素相对于窗口的上边的偏移量 
               allheight = Number(allheight)-100;  
             top = Number(top)+40;
	           $('#popup1').css({'top':top});
	          
	           $('#outdivshow').css({'height':allheight}); 
	          
	          myScroll = new iScroll('outdivshow', {hScrollbar:false, vScrollbar:true,bounce:false});   
	
}
function selectjifen(dikoujin,names){
	if(checknext ==  false){ 
    	checknext = true;
  $('#jifen').val(dikoujin);
  $('#jifenshuoming').text(names);
   $('#mask1').hide();
	$('#popup1').hide();
	 myScroll.destroy();
	 myScroll = new iScroll('wrapper', {
		useTransform: false,
		bounce:false,
		onBeforeScrollStart: function (e) {
			var target = e.target;
			while (target.nodeType != 1) target = target.parentNode;

			if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
				e.preventDefault();
		}
	}); 
	  setTimeout("myyanchi()", 500 );
  }
}
function maketime(){
	if(timelist.length > 0){
	  $('#DeliveryTimesm').text(timelist[0]);
	  $('#DeliveryTime').val(timelist[0]);
	}else{
		$('#DeliveryTimesm').text('店铺不在营业时间');
	}
}
function doselectTime(){
	if(checknext ==  false){ 
    	checknext = true;
	if(timelist.length > 0){
		var htmlbottom = "";
		for(var i=0;i<=timelist.length;i++){ 
	      	 htmlbottom += '<li class="" onclick="selectTime(\''+timelist[i]+'\');">'+timelist[i]+'</li>';
	 } 
	      //	  myScroll.scrollToElement('#Timeposition',100); 
	      //	 myScroll.scrollTo(0,Number(defaultheight)*-1,200,false); 
  	    //  myScroll.refresh();
  	         setTimeout(function () {
	             	loadhtml(htmlbottom,'#Timeposition');
	           }, 100);
		
		
	}else{
		Tmsg('店铺不在营业时间');
	}
	setTimeout("myyanchi()", 500 );
  }
}
//doselectpeople
function doselectpeople(){
	if(checknext ==  false){ 
    	checknext = true;
	 var htmlbottom = "";
		for(var i=1;i<=16;i++){ 
	      	 htmlbottom += '<li class="" onclick="selectPeople(\''+i+'\');">'+i+'人</li>';
	  }  
	   
	      //	  myScroll.scrollToElement('#peopleposition',100); 
	      //	 myScroll.scrollTo(0,Number(defaultheight)*-1,200,false); 
  	    //  myScroll.refresh();
  	         setTimeout(function () {
	             	loadhtml(htmlbottom,'#peopleposition');
	           }, 100);
		
		
	 
	setTimeout("myyanchi()", 500 );
  }
}
function selectPeople(renshu){
	if(checknext ==  false){ 
    	checknext = true;
 $('#people').val(renshu);
 $('#peopleshuoming').text(renshu+'人');
  $('#mask1').hide();
	$('#popup1').hide();
	 myScroll.destroy();
	 myScroll = new iScroll('wrapper', {
		useTransform: false,
		bounce:false,
		onBeforeScrollStart: function (e) {
			var target = e.target;
			while (target.nodeType != 1) target = target.parentNode;

			if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
				e.preventDefault();
		}
	}); 
	setTimeout("myyanchi()", 500 );
}
	
}
function selectTime(timename){ 
	if(checknext ==  false){ 
    	checknext = true;
 $('#DeliveryTime').val(timename);
 $('#DeliveryTimesm').text(timename);
  $('#mask1').hide();
	$('#popup1').hide();
	 myScroll.destroy();
	 myScroll = new iScroll('wrapper', {
		useTransform: false,
		bounce:false,
		onBeforeScrollStart: function (e) {
			var target = e.target;
			while (target.nodeType != 1) target = target.parentNode;

			if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
				e.preventDefault();
		}
	}); 
	setTimeout("myyanchi()", 500 );
 }
}
function selectjuan(juanid,juancost,juanname){
	if(checknext ==  false){ 
    	checknext = true;
 $('#juanid').val(juanid);
 $('#juancost').val(juancost);
 $('#juanshuoming').text(juanname);
  $('#mask1').hide();
	$('#popup1').hide();
	 myScroll.destroy();
	 myScroll = new iScroll('wrapper', {
		useTransform: false,
		bounce:false,
		onBeforeScrollStart: function (e) {
			var target = e.target;
			while (target.nodeType != 1) target = target.parentNode;

			if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
				e.preventDefault();
		}
	}); 
	setTimeout("myyanchi()", 500 );
 }
}
function doselectjuan(){
	if(checknext ==  false){ 
    	checknext = true;
	 var oldjuanid = Number($('#juanid').val());
	if(juanlist.length > 0){
		var htmle = '';
		var checkcost = Number(surecost);
		$.each(juanlist,function(i,field){  
			var juancost = Number(field.limitcost);
			
			   if(checkcost > juancost){
			   	   var temp_pre = oldjuanid == field.id ?'on':'';
			      	htmle +='<li class="'+temp_pre+'" onclick="selectjuan(\''+field.id+'\',\''+field.cost+'\',\''+field.name+'\');">'+field.name+'</li>';
			   	
			   }
		});
		if(htmle == ''){
		  Tmsg('无满足条件的优惠券');
		}else{
			 htmle = '<li class="" onclick="selectjuan(\'0\',\'0\',\'不使用优惠券\');">不使用优惠券</li>'+htmle;
		//	  htmle = '<div class="juanshow" id="outdivshow"><ul>'+htmle+'</ul></div>  <div style="clear:both;height:20px;"></div>';
	       
		  myScroll.scrollToElement('#yhjposition',100); 
	      //	 myScroll.scrollTo(0,Number(defaultheight)*-1,200,false); 
  	    //  myScroll.refresh();
  	         setTimeout(function () {
	             	loadhtml(htmle,'#yhjposition');
	           }, 100);
	           /*
			
	         
	          myScroll.destroy();
	          myScroll = new iScroll('outdivshow', {hScrollbar:false, vScrollbar:false,bounce:false});    */
		} 
		
	}else{
	  Tmsg('您未绑定优惠券');
	  $('#mask1').hide();
	  $('#popup1').hide();
	}
	setTimeout("myyanchi()", 500 );
 }
}
function closeout(){ 
	  $('#mask1').hide();
	  $('#popup1').hide(); 
}

function carttj(){
	//alert(cartsum);
	$('#packagingFee').text(cartbagcost);
	$('#fixedDeliveryFee').text(cartpscost);
	var totalFee =Number(cartbagcost)+Number(cartpscost)+Number(cartsum)-Number(cxcost);
	$('#totalFee').text(totalFee);
} 

function  orderSubmit(){
	 if(checknext ==  false){ 
    	 checknext = true;
     	 if($('#DeliveryTime').val() == ''){
     	    Tmsg('请录入联送货时间');
     	   return false;
     	 } 
     	$('#loading').show();
     	  url = siteurl+'/index.php?ctrl=wxsite&action=makeorder&datatype=json&random=@random@';
     	  url = url.replace('@random@', 1+Math.round(Math.random()*1000));
        $.ajax({         //script定义
                 url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
                 dataType: "json",
                 async:true,
                 data:{shopid:shopid,'remark':$('input[name="remark"]').val(),'minit':$("#DeliveryTime").val(),'dikou':$('#jifen').val(),'juanid':$('#juanid').val(),'paytype':$('input[name="paytype"]').val()},
                 success:function(content) { 
                 	if(content.error ==  false){
                 	    	window.location.href=  siteurl+'/index.php?ctrl=wxsite&action=subshow&orderid='+content.msg ;//.html?orderid='+datas.data;
                 	}else{
                 		Tmsg(content.msg);
                 	}
                  	$('#loading').toggle();
                 
                 },
                 error:function(){
                  $('#loading').toggle();
                 }
        }); 
        setTimeout("myyanchi()", 500 );
   }    
}
function  orderSubmit2(){
	 if(checknext ==  false){ 
    	 checknext = true;
     	 if($('#DeliveryTime').val() == ''){
     	    Tmsg('请录入消费时间');
     	   return false;
     	 } 
     	$('#loading').show();
     	  url = siteurl+'/index.php?ctrl=wxsite&action=makeorder2&datatype=json&random=@random@';
     	  url = url.replace('@random@', 1+Math.round(Math.random()*1000));
        $.ajax({         //script定义
                 url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
                 dataType: "json",
                 async:true,
                 data:{shopid:shopid,'remark':$('input[name="remark"]').val(),'minit':$("#DeliveryTime").val(),'dikou':'0','juanid':'0','paytype':$('input[name="paytype"]').val(),'subtype':subtype,'personcount':$('input[name="people"]').val(),'paytype':$('input[name="paytype"]').val()},
                 success:function(content) { 
                 	if(content.error ==  false){
                 	    	window.location.href=  siteurl+'/index.php?ctrl=wxsite&action=subshow&orderid='+content.msg ;//.html?orderid='+datas.data;
                 	}else{
                 		Tmsg(content.msg);
                 	}
                  	$('#loading').toggle();
                 
                 },
                 error:function(){
                  $('#loading').toggle();
                 }
        }); 
        setTimeout("myyanchi()", 500 );
   }    
}
function dochangpaytype(obj){
  $(obj).addClass('onpaytype').siblings().removeClass('onpaytype');
   $(obj).removeClass('downpaytype').siblings().addClass('downpaytype');
   $('input[name="paytype"]').val($(obj).attr('data'));
}
function ShowChange(){
	$('body').append('<div id="mask" style="" ></div>'); //创建遮照层
	$('body').append('<div class="popup w580" style="display:none;"><div class="popup-hd"><a id="closex" title="关闭" class="closex closegb" href="javascript:void(0);"><span>关闭</span></a></div><p id="alertbox-msg" class="position02">下单前请添加客户信息</p><div class="bgPray" style="display: -webkit-box;display: -moz-box;display: -o-box;display: box;-webkit-box-align: center;-moz-box-align: center;-o-box-align: center;box-align: center;"><div style="width:50%;"><input id="alertbox-OK" class="inputBtn05 dogozuo" type="button" value="返回店铺"></div><div style="width:50%;"><input id="alertbox-OK" class="inputBtn05 goaddress" type="button" value="添加地址"></div></div></div>');
  $('.popup').slideToggle();
  $('.dogozuo').bind("click", function() {   
	 window.location.href = backgoshop;
});
$('.goaddress').bind("click", function() {   
	 window.location.href = backadd;
});
}
function changeaddress(){
	 window.location.href = backadd;
}

function ShowChangezuo(){
	$('body').append('<div id="mask" style="" ></div>'); //创建遮照层
	$('body').append('<div class="popup w580" style="display:none;"><div class="popup-hd"><a id="closex" title="关闭" class="closex closegb" href="javascript:void(0);"><span>关闭</span></a></div><p id="alertbox-msg" class="position02">请选择你是直接预订桌位还是点菜预订</p><div class="bgPray" style="display: -webkit-box;display: -moz-box;display: -o-box;display: box;-webkit-box-align: center;-moz-box-align: center;-o-box-align: center;box-align: center;"><div style="width:50%;"><input id="alertbox-OK" class="inputBtn05 dogozuo" type="button" value="预定桌位"></div><div style="width:50%;"><input id="alertbox-OK" class="inputBtn05 closegb" type="button" value="点菜"></div></div></div>');
  $('.popup').slideToggle();
  $('.dogozuo').bind("click", function() {   
	 window.location.href = zuocart;
   });
}

