$(function(){
	 $('body').append('<div id="addload" style="position: absolute; z-index: 1000; left: 30%; top: 30%; opacity: 1; display: none; height: 30px;width: 30px;border-radius: 15px;line-height: 12px;overflow:hidden; background: #ea5413;"></div>');

   freshcart();
});
function gettotlesum () {
        url = siteurl+'/index.php?controller=site&action=gettotlesum&shopid='+shopid+'&datatype=json&random=@random@';
        url = url.replace('@random@', 1+Math.round(Math.random()*1000));
        $.post(url,"",function(data){
            $("#cart_sum").html( data.msg.sumcount);
            $(".totle_num_index").html(data.msg.sumcount);
            $('.cart_sum').html(data.msg.sumcount);
            $(".totle_price_index").html(data.msg.sum);
           if (!data.msg.sumcount) {
               $(".cart_sum").html(0);
           }
        },"json");

      // alert(bk.sum);
       // $("#cart_sum").html(bk.sum);
}
//加购物车动画
function cartimg(obj){
	     $("#addload").show();
        var pos =$(obj).offset();
       var topval = pos.top;
       $("#addload").css("top", topval -20+ "px");
       $("#addload").css("z-index", 999);
       $("#addload").css("left", pos.left + "px");
        $("#addload").css({'width':'30px','height':'30px'});
       var target_ob = $('.new_cart_logo').offset();
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
	}else{
	var url= siteurl+'/index.php?controller=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
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
}
function uponedish(gid,tshopid,num){
	var url= siteurl+'/index.php?controller=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000));
    	var bk = ajaxback(url,'');
	    if(bk.flag == false){
	      freshcart();
	    }else{
	    	diaerror(bk.content);
	    }
}

function delshopcart(){
	if(confirm('确认清空购物车')){
	var url= siteurl+'/index.php?controller=site&action=clearcart&shopid='+shopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,'');
	    if(bk.flag == false){
	       freshcart();
                  $('.cart_sum').html(0);
	    }else{
	    	diaerror(bk.content);
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
	    	diaerror(bk.content);
	    }

}

//删除商品
function removesupplierdish(gid,tshopid){

	url = siteurl+'/index.php?controller=site&action=delcartgoods&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
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
	url = siteurl+'/index.php?controller=site&action=modifycart&goods_id='+gid+'&shopid='+tshopid+'&num='+nowgscount+'&datatype=json&random=@random@';
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
	    url = siteurl+'/index.php?controller=site&action=smallcat&shopid='+shopid+'&random=@random@';
	    url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	    $.get(url, function(result){

        $("#newcart").html(result);
         freachperson();
         $('.new_cart_show').bind("hover", function() {
         	  $(this).addClass('hoveron').siblings().removeClass('hoveron');
         });

         //caipincost    alert('xxx');
    //    $('#CMoney').text(allcost);
     //   $('#waimaibtn').text(allcost);
      });
   }else{

   	//调用  自动刷新购物车
   	/*
      url = siteurl+'/index.php?controller=site&action=smallcat2&shopid='+shopid+'&random=@random@';
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

   gettotlesum();
}
function ajaxdoorder(){
	/*创建遮照层*/
	$('body').append('<div id="cat_zhe" class="cart_zhe"></div>');
	$('body').append('<div id="goosshow" class="cart_out_cat"></div>');
	//需要保持的 数据  username ,
	var  urlnew = siteurl+'/index.php?controller=site&action=showcatax&random=@random@';
	    urlnew = urlnew.replace('@random@', 1+Math.round(Math.random()*1000));
		 $.post(urlnew, {shopid:shopid},function (data, textStatus){
			 	 $('#goosshow').append(data);
			 	 jifenduihuan();

			 	 if($('body').attr('addrestemp') != undefined && $('body').attr('addrestemp') != '' && $('body').attr('addrestemp') != null){
			 	 	  $('#addrestemp').val($('body').attr('addrestemp'));
			 	 }
			 	 if($('body').attr('phone') != undefined && $('body').attr('phone') != '' && $('body').attr('phone') != null){
			 	 	  $('#phone').val($('body').attr('phone'));
			 	 }
			 	 if($('body').attr('recieve_name') != undefined && $('body').attr('recieve_name') != '' && $('body').attr('recieve_name') != null){
			 	 	  $('#recieve_name').val($('body').attr('recieve_name'));
			 	 }

			}, 'html');
}
function close_ajaxcart(){
	//addrestemp phone  recieve_name
	$('body').attr('addrestemp',$('#addrestemp').val());
	$('body').attr('phone',$('#phone').val());
	$('body').attr('recieve_name',$('#recieve_name').val());
	if($("#showtj2").is(":hidden")){
	  $('#goosshow').remove();
	  $('#cat_zhe').remove();
  }else{
    alert('订单提交中请捎后关闭');
  }
}
function freachperson(){
	 var allcost = $('#caipincost').val();// $('input[name="allcost"]').val();
    var persongnum = $('#cartallcost').val();
    $('#CMoney').text(allcost);
   $('#waimaibtn').text(persongnum);
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
	  var shopcost = Number($('#surecost').attr('data'));

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
	jisuanjf();
}
function jisuanjf(){
  var nowcost = $('#surecost').attr('alldata');
  var hcost = $('#surecost').attr('data');
  var dikou = $("select[name='jfdk']").find("option:selected").val();
  dikou = dikou == undefined?0:dikou;
  var juanid = $("input[name='buyjuan']:checked").val();//data
  var juancost  = 0;
  if(juanid != undefined){
    	juancost = $("input[name='buyjuan']:checked").attr('data');
  }
  //返填数据
  $('#jfcost').text(''+dikou);
  $('#yhjcost').text(''+juancost);
  var checkcost = Number(dikou)+Number(juancost);
  if(checkcost > hcost){
  	  var result = Number(nowcost)-Number(hcost);
     $('#surecost').text(result);
  }else{
  	  var result = Number(nowcost)-Number(checkcost);
     $('#surecost').text(result);
  }

}

$('input[name="buyjuan"]').live("click", function() {
	 jisuanjf();
});

function strToJson(str){
  return JSON.parse(str);
}



function  orderSubmit(){
    
	//  url = siteurl+'/index.php?controller=shop&action=order&random=@random@';
	if($('#recieve_name').val() == ''){
	  alert('请录入联系人');
	  return false;
	}
	if($('#mobile').val() == ''){
	   alert('请录入联系电话');
	   return false;
	}
	if($('#addrestemp').val()  == $('#addrestemp').attr('data')){
	  alert('请录入具体地址');
	  return false;
	}

	 $('#showtj').hide();
	 $('#showtj2').show();

	  url = submithtml.replace('@random@', 1+Math.round(Math.random()*1000));
   $.ajax({         //script定义
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
            dataType: "json",
            async:true,
            data:{'phonecode':$('#phonecode').val(),shopid:shopid,'remark':$('#remark').val(),'username':$('#recieve_name').val(),'mobile':$('#mobile').val(),'addressdet':$('#addrestemp').val(),'areaid1':$("#areaid1").find("option:selected").val(),'areaid2':$("#areaid2").find("option:selected").val(),'areaid3':$("#areaid3").find("option:selected").val(),'senddate':$("select[name='senddate']").find("option:selected").val(),'minit':$("#orderTime").attr('data'),'paytype':$("input[name='paytype']:checked").val(),'dikou':$("select[name='jfdk']").find("option:selected").val(),'juanid':$("input[name='buyjuan']:checked").val()},
            success:function(content) {
            //	$('#loading').toggle();
             if(content.error == true){
                $('#showtj2').hide();
	              $('#showtj').show();
	              alert(content.msg);
             }else{

	             window.location.href= orderhtml.replace('@orderid@', content.msg);
             }
            },
            error:function(){
            	 $('#showtj2').hide();
	              $('#showtj').show();
            	//$('#loading').toggle();
            	alert('数据提交失败');
            }
   });
}
function showorder(datas){
	//
  window.location.href='subshow.html?orderid='+datas.data;//alert(datas);
}
//构造送货日期和送货时间
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
  var showtype = $("#showtype").val();
  var shopid = $("#shop_id").val();
  var url = siteurl+'/index.php?controller=site&action=ajaxcatax';
  $.ajax({
     url: url,
     dataType: "text",
     async:true,
     data:'shopid='+shopid+'&posttime='+selectdate+'&showtype='+showtype,
     success:function(res){
        //alert(res);
        var result = eval("("+res+")");
        if (result.cx.gzdata) {
            $('.promotion').remove();
            for(var i in result.cx.gzdata) {
                $('<tr class="promotion"><td colspan="5">'+result.cx.gzdata[i]+'(<font>满足的促销活动</font>)</td></tr>').insertBefore($('.ajaxcart_middle .cart_table tbody tr:last-child'));
            }
            $('#surecost').text('￥'+result.cx.surecost);
        }
     },
     error:function(){
        alert("请求出错");
     }
  });
}
function addhtml(begindtime,endtime){
	var begindate = new Date(begindtime.replace(/-/g,'/'));
	var enddate = new Date(endtime.replace(/-/g,'/'));
	var bkdate = new Date(nowtime.replace(/-/g,'/'));
	var begindates = Number(begindate.getTime());
	var enddates = Number(enddate.getTime());
	var bkdates = Number(bkdate.getTime());
	var makenewtime =  new Date(maketime.replace(/-/g,'/'));
	if(bkdates > begindates && bkdates > enddates){

  }else{
  	var setptime = 15*60*1000;
       for(var i=begindates;i<enddates;i=i+setptime){
       	 if(i > bkdates && i>makenewtime){
       	   var d = new Date()
            d.setTime(i);
            var nowhour = d.getHours();
            var timesee =  Number(nowhour) < 10?'0'+nowhour:nowhour;
            var nowminit = d.getMinutes();
            timesee += Number(nowminit) < 10?':0'+nowminit:':'+nowminit;
           // $('#orderTime').append('<option value="'+timesee+'">'+timesee+'</option>');
         }
	     }
	}
}



