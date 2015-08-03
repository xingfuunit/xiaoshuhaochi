$(function(){ 
	 $('body').append('<div id="addload" style="position: absolute; z-index: 1000; left: 30%; top: 30%; opacity: 1; display: none; height: 30px;width: 30px;border-radius: 15px;line-height: 12px;overflow:hidden; background: #ea5413;"></div>'); 
   freshcart();
   
});
function loginjs(){
    var url = siteurl+"/index.php?ctrl=member&action=ajaxlogin&random=@random@";  
  	 url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	   $.post(url, {},function (data, textStatus){  
	   	 art.dialog({
       id: 'testID1232',
       lock: true,
       background: '#666', // 鑳屾櫙鑹�
       opacity: 0.87,	// 閫忔槑搴�
       title:'用户登录',
       content: data
       }); 	 
	  }, 'html');  
 
}
function ajaxlogin(){
		 var url= siteurl+'/index.php?ctrl=member&action=login&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
    	var bk = ajaxback(url,$('#loginForm').serialize());
    	if(bk.flag == false){ 
    		window.location.reload();
    	}else{
    		diaerror(bk.content);
    	}
    	
	
}
//加购物车动画
function cartimg(obj){
	     $("#addload").show(); 
        var pos =$(obj).offset();
       var topval = pos.top;
       $("#addload").css("top", topval + "px"); 
       $("#addload").css("left", pos.left + "px");
        $("#addload").css({'width':'30px','height':'30px'}); 
       var target_ob = $('#cartlist').offset();
       var target_top = Number(target_ob.top);
       var target_left = Number(target_ob.left);
       /*
       var middletop = topval-100;
       var middleleft =pos.left+(target_left-Number(pos.left))/2;*/
        
       /*

        $("#addload").animate({top:middletop,left:middleleft},function(){ */
         $("#addload").animate({top:target_top,left:target_left, 'width':'0px','height':'0px'},"slow",function(){
           freshcart();
          });   
          /*
       }); */
} 
 
//添加购物车
function addonedish(gid,tshopid,num,obj){  
	if(locationfalse ==  true){
		artopen();
		retrun;
	}
	if(allowedguestbuy !=  1){
	  if(memberid == 0){
		   loginjs();
		   return;
   	}
  }
	
 
   	var url= siteurl+'/index.php?ctrl=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
    	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	    ///	if($('#ShopCart').html() != undefined){
	       cartimg(obj);
	  ///     }else{
	   //    	freshcart();
	   //    }
	    }else{
	    	diaerror(bk.content);
	    }
	 
}
function uponedish(gid,tshopid,num){ 

	if(allowedguestbuy !=  1){
	  if(memberid == 0){
		   loginjs();
		   return;
   	}
  }
	var url= siteurl+'/index.php?ctrl=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
    	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	diaerror(bk.content);
	    }
}
	
function delshopcart(){
	if(allowedguestbuy !=  1){
	  if(memberid == 0){
		   loginjs();
		   return;
   	}
  }
	if(confirm('确认清空购物车')){
	var url= siteurl+'/index.php?ctrl=site&action=clearcart&shopid='+shopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	diaerror(bk.content);
	    }
  }
  return false;
}

function removeonedish(gid,tshopid,num){ 
	if(allowedguestbuy !=  1){
	  if(memberid == 0){
		   loginjs();
		   return;
   	}
  }
	 $('#loading').show();
	 url = siteurl+'/index.php?ctrl=site&action=downcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
	  	 url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	diaerror(bk.content);
	    }
	  
}
 
//删除商品
function removesupplierdish(gid,tshopid){
 if(allowedguestbuy !=  1){
	  if(memberid == 0){
		   loginjs();
		   return;
   	}
  }
	url = siteurl+'/index.php?ctrl=site&action=delcartgoods&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
	url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,'');
	    if(bk.flag == false){ 
	       freshcart();
	    }else{
	    	diaerror(bk.content);
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
	    	diaerror(bk.content);
	    }
}

//刷新购物车
function freshcart(){ 
 
	if($('#checktj_newcart').html() == undefined){
	    url = siteurl+'/index.php?ctrl=site&action=smallcat&shopid='+shopid+'&random=@random@';
	    url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
	    $.get(url, function(result){ 
	   
        $("#cartlist").html(result);
         freachperson();
         jifenduihuan();  
       //  $('.new_cart_show').bind("hover", function() {   
      //   	  $(this).addClass('hoveron').siblings().removeClass('hoveron');
      //   });
    //    $('#CMoney').text(allcost);
     //   $('#waimaibtn').text(allcost);
      });
   }else{ 
   	//调用  自动刷新购物车  
   	/*
      url = siteurl+'/index.php?ctrl=site&action=smallcat2&shopid='+shopid+'&random=@random@';
	    url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
	    $.get(url, function(result){  
        $("#cartshow_c").html(result);  
         if(Number($('#jifendkou').attr('data')) > 0){
  	        $('#jifendkou').show();
         } 
          jifenduihuan();  
      }); 
      */
     
   }  
}
function ajaxdoorder(){
	/*创建遮照层*/
	$('body').append('<div id="cat_zhe" class="cart_zhe"></div>');
	$('body').append('<div id="goosshow" class="cart_out_cat"></div>'); 
	var  urlnew = siteurl+'/index.php?ctrl=site&action=showcatax&random=@random@';
	    urlnew = urlnew.replace('@random@', 1+Math.round(Math.random()*1000)); 
		 $.post(urlnew, {shopid:shopid},function (data, textStatus){ 
			 	 $('#goosshow').append(data); 
			 	 jifenduihuan();  
			}, 'html');
}
function close_ajaxcart(){
	if($("#showtj2").is(":hidden")){
	  $('#goosshow').remove();
	  $('#cat_zhe').remove();
  }else{
    alert('订单提交中请捎后关闭');
  }
}
function freachperson(){
	 var allcost =   $('input[name="allcost"]').val();
    var persongnum = $('#person_num').val();
  var meiren = Number(allcost)/Number(persongnum);
   
     var  aNew = Math.round(meiren*10)/10;
      $('#personcost').text(aNew);
}
function addperson(num){
	$('#person_num').val(Number($('#person_num').val())+1);
	freachperson();
}
function downperson(num){
	var checknum = Number($('#person_num').val());
	if(checknum > 1){
	  	$('#person_num').val(Number($('#person_num').val())-1);
	}else{
		$('#person_num').val(1);
	}
	freachperson();
}
function modifyperson(){
  var checknum =	$('#person_num').val();
  if(checknum > 0){
  }else{
     $('#person_num').val(1);
  }
  freachperson();
}
function jifenduihuan(){

	if($("#jifendkou").is(":hidden")){
	}else{ 
		 
		var myjifen = Number($('#jifendkou').attr('data'));
		var jifenbili = Number($('#jifendkou').attr('jfendata'));
		var rslt = Number(myjifen)/Number(jifenbili); //除 
	  var canduihuan = rslt - Math.floor(rslt) > 0?Math.floor(rslt):Math.floor(rslt);//总页面数量
	  var shopcost = Number($('input[name="surecost"]').val());//('data'));
	  
	  var cancost = Math.ceil(shopcost) > canduihuan ? canduihuan:Math.ceil(shopcost);  
	  var htmlbottom = '';
	  if(jifenbili > 0){ 
	      for(var i=1;i<=cancost;i++){
	      	var jifenall = Number(i)*jifenbili;
	      	htmlbottom += '<option value="'+i+'">使用'+jifenall+'积分抵扣'+i+'元</option>';
	      }
	      if(htmlbottom != ''){ 
	      	$('#activeJifenselect').html('<select name="jfdk" onchange="jisuanjf();" style="height:30px; border-radius: 4px 4px 4px 4px;"><option value="0">不使用积分抵扣</option>'+htmlbottom+'</select>');
	      	 
	      }else{
	      	$('#activeJifenselect').html('我的积分'+myjifen+'个');
	      	 
	      }  
	  }else{
	  	$('#jifenPromotion2').hide();
	  }
	}
	//jisuanjf();
	makejuan();
}
function  makejuan(){
	var tempdo = juanlist;
	var htmls = '';
	var dikoujin = $("select[name='jfdk']").find("option:selected").val();
	dikoujin = dikoujin=='undefined'?0:dikoujin;
	var surecost = Number($('input[name="surecost"]').val())
	if(tempdo.length > 0){
		 htmls = '<option value="0" data="0">选择优惠券</option>';
		for(var i=0;i<tempdo.length;i++){ 
			if(tempdo[i].limitcost < surecost){
			    htmls +='<option value="'+tempdo[i].id+'" data="'+tempdo[i].cost+'">'+tempdo[i].name+'</option>';
			}
		}
	}else{
	  htmls = '<option value="0" data="0">暂无优惠券</option>';
	}
	$('#ddlmyticket').html(htmls);
}
function jisuanjf(){
	 var surecost = Number($('input[name="surecost"]').val());
  var juancost = Number($('#ddlmyticket').find("option:selected").attr('data'));// $('#surecost').attr('data');
  var dikou = $("select[name='jfdk']").find("option:selected").val();  
  dikou = dikou == undefined?0:dikou;
    
  var checkcost = Number(dikou)+Number(juancost);
  if(checkcost > surecost){
  	  var result = Number($('input[name="bagcost"]').val())+Number($('input[name="pscost"]').val());
  	  var mycost = Number(surecost) - Number(result);
  	  $('#alldbcost').text(mycost);
     $('#total').text(result);
     $('input[name="allcost"]').val(result);
  }else{ 
  	  var result = Number(surecost)-Number(checkcost)+Number($('input[name="bagcost"]').val())+Number($('input[name="pscost"]').val());
  	    var mycost = Number(surecost) - Number(result);
  	  $('#alldbcost').text(mycost);
     $('#total').text(result);
     $('input[name="allcost"]').val(result);
  }
  
  
  freachperson();
   
}
 
$('input[name="buyjuan"]').live("click", function() {    
	 jisuanjf();
});
 
function strToJson(str){ 
  return JSON.parse(str); 
}
 
function makezhezhao(){
$('body').append('<div id="myzhezhao" class="cart_zhe"><div class="zhezhaojindu"><img src="/upload/images/shop/loading.gif">订单提交中........</div></div>');
}
function closezhezhao(){
  $('#myzhezhao').remove();
}

function  orderSubmit(){
	//  url = siteurl+'/index.php?ctrl=shop&action=order&random=@random@';
	 makezhezhao();
	  url = submithtml.replace('@random@', 1+Math.round(Math.random()*1000));
   $.ajax({         //script定义
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
            dataType: "json",
            async:true,
             data:{shopid:$('input[name="shopid"]').val(),'remark':$('#unRemark').val(),'username':$('#uname').val(),'mobile':$('#uphone').val(),'addressdet':$('#uaddress').val(),'senddate':$("select[name='senddate']").find("option:selected").val(),'minit':$("#orderTime").find("option:selected").val(),'paytype':$("select[name='checkway']").find("option:selected").val(),'dikou':$("select[name='jfdk']").find("option:selected").val(),'juanid':$("#ddlmyticket").find("option:selected").val()},
            success:function(content) { 
            //	$('#loading').toggle();
             if(content.error == true){ 
                closezhezhao();
	              alert(content.msg);
             }else{
             
	             window.location.href= orderhtml.replace('@orderid@', content.msg);
             }
            },
            error:function(){
            	closezhezhao();
            	alert('数据提交失败');
            }
   });     
}
function showorder(datas){
	//
  window.location.href='subshow.html?orderid='+datas.data;//alert(datas);
}
//构造送货日期和送货时间
/*
function maketimenenu(){
	var selectdate = $("select[name='senddate']").find("option:selected").val(); 
  $('#orderTime').html(''); 
  var dotime = ''; 
  	dotime = starttime.split('|'); 
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
}*/
 


