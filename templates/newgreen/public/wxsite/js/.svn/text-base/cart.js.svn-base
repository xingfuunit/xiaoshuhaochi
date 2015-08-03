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
       var totleMoney=Number($('#total_money').text())+Number($(obj).attr('data-price'));
	    	$('#total_money').text(totleMoney.toFixed(2));

	    	if(Number($('#total_money').text()) > Number(shoplimitcost)){
	          		 $('#showlimit').text('');
	          	}else{ 
	          	        var checkcost = Number(shoplimitcost)-Number($('#total_money').text());
	          	        $('#showlimit').text('差'+checkcost+'起送');

	          	}


	    	//$('#gidli_'+gid).find('.righ_l_b_btn_moren').hide();
	    	//$('#gidli_'+gid).find('.righ_l_b_btn_hover').show();
	  //    var typeid = $(obj).attr('typeid');
	  //    $('#typelist'+typeid).show();
	 //     $('#typelist'+typeid).text(Number($('#typelist'+typeid).text())+1);
	      $('#gidli_'+gid).addClass('onselect');
	      $('#gshu_'+gid).text(Number($('#gshu_'+gid).text())+1);
	    	//if($(valse).is(':checked') == true)
}
function addonedish(gid,tshopid,num,obj){
   
	    $('#loading').show();
    	var url= siteurl+'/index.php?controller=site&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000));
    	var bk = ajaxback(url,'');
	    if(bk.flag == false){
	       if($('#total_money').html() != undefined){

	   	 	   cartimg($('#gid_'+gid),gid);


	   	   }else{// $('#loading').hide();

	   	    	  freshcart(tshopid);

	   	   }
	    }else{
	    	 Tmsg(bk.content);

	    }
            freshcart();
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
      $(".sortitemclick").val(0);
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
	var url= siteurl+'/index.php?controller=site&action=clearcart&shopid='+shopid+'&num=1&datatype=json&random=@random@';
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
	   url = siteurl+'/index.php?controller=site&action=downcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&datatype=json&random=@random@';
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
	          $('#total_money').text(notypenum.toFixed(2));
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
            freshcart();
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
function freshcart(tshopid){
       
      if (tshopid) {
          shopid=tshopid;
      }
      var day = $('#change_time').val();
	url = siteurl+'/index.php?controller=wxsite&action=cart&shopid='+shopid+'&day='+day+'&datatype=json&random=@random@';
	url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,'');
         initshop();
         
	if($('#shocart').html() == undefined){

//		/initshop();
	}else{
             initshop();
            /*
            if (!bk.content.sumcount) {
                $("#cart_count").text("0");
                $("#cart_total").text("0");
            }
        */

	 freshcartdata(bk);
        
	}
}
function freshcartdata(datas){
	 $('#shocart').html('');
     $('#promotion').html('');
	  if(datas.flag == false){
    	   //	$('.listcontent').remove();

    	 	$.each(datas.content.list, function(i,val){
    	 	 	  var htmls = template.render('cartlist', {list:val});
    	 	 	  $('#shocart').append(htmls);
    	    });
                
            var ss = '';
            for(var i in datas.content.gzdata) {
                ss += '<li>'+datas.content.gzdata[i]+'(<font>满足的促销活动</font>)</li>';
            }
            $('#promotion').append(ss);
            //$.each(datas.content.gzdata, function(i,val){
                  //var htmls = template.render('promotionlist',datas.content.gzdata);
                  //$('#promotion').append(htmls);
            //});


            $('#cart_count').html(datas.content.sumcount);
    	    $('#cart_total').text(datas.content.sum);
    	    $('#bagcost').text(datas.content.bagcost);
    	    $('#cxcost').text(datas.content.downcost.toFixed(2));
            var realcost = parseFloat(datas.content.sum)-parseFloat(datas.content.downcost)+parseFloat(datas.content.pscost);          
            $("#realcost").text(realcost.toFixed(2));
            if (datas.content.pscost>0) {
                $("#carriage").text(datas.content.pscost);
            }
            if (datas.content.downcost>0) {
                $("#reel_cost_show").show();
            }
    	    cartbagcost = datas.content.bagcost;
    	    cxcost =  datas.content.downcost;
          cartsum = datas.content.sum;
          cartpscost = datas.content.pscost;
          surecost = datas.content.surecost;
           $('.order_btn_right').bind("click", function() {
      	    	if(checknext ==  false){
      	    		checknext = true;
      	     	   addonedish($(this).attr('data-id'),$(this).attr('data-shopid'),1,this);
      	     	   setTimeout("myyanchi()", 500 );
           	  }

          });
           $('.order_btn_left').bind("click", function() {
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
          $('.cart_gojs').hide();
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
	      	htmlbottom = '<div class="jifenshow"><ul>'+htmlbottom+'</ul></div>  <div style="clear:both;height:20px;"></div>';
	      	$('#popcontent').html(htmlbottom);
	  	 	  $('#mask1').show();
	         $('#popup1').show();
	      }else{
	      	 Tmsg('积分不超过'+bili+'，不能抵扣');
	      }



	  }else{
	    Tmsg('积分不超过'+bili+'，不能抵扣');
	  }
}
function selectjifen(dikoujin,names){
  $('#jifen').val(dikoujin);
  $('#jifenshuoming').text(names);
   $('#mask1').hide();
	$('#popup1').hide();
}
function selectjuan(juanid,juancost,juanname){
 $('#juanid').val(juanid);
 $('#juancost').val(juancost);
 $('#juanshuoming').text(juanname);
  $('#mask1').hide();
	$('#popup1').hide();
}
function doselectjuan(){
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
			 htmle = '<div class="juanshow"><ul>'+htmle+'</ul></div>  <div style="clear:both;height:20px;"></div>';
	      	$('#popcontent').html(htmle);
	  	 	  $('#mask1').show();
	         $('#popup1').show();
		}
	}else{
	  Tmsg('您未绑定优惠券');
	  $('#mask1').hide();
	  $('#popup1').hide();
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
	if($('#username').val() == ''){
	   Tmsg('请录入联系人');
	   return false;
	}
	if($('#mobile').val() == ''){
	   Tmsg('请录入联系人');
	   return false;
	}
	if($('#addressdet').val()  == $('#addressdet').attr('data')){
	  Tmsg('请录入具体地址');
	  return false;
	}
	if($('#orderTime').find("option:selected").val() == 0){
	    Tmsg('请录入联送货时间');
	   return false;
	}

	$('#loading').show();
	  url = siteurl+'/index.php?controller=wxsite&action=makeorder&datatype=json&random=@random@';
	  url = url.replace('@random@', 1+Math.round(Math.random()*1000));
   $.ajax({         //script定义
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
            dataType: "json",
            async:true,

            data:{shopid:shopid,'remark':$('#remark').val(),'username':$('#username').val(),'mobile':$('#mobile').val(),'addressdet':$('#addressdet').val(),'senddate':$("select[name='senddate']").find("option:selected").val(),'minit':$("#ordertime").find("option:selected").val(),'dikou':$('#jifen').val(),'juanid':$('#juanid').val(),'paytype':$("input[name='paytype']:checked").val()},
            success:function(content) {
            	if(content.error ==  false){
            		window.location.href=  siteurl+'/index.php?controller=wxsite&action=subshow&orderid='+content.msg ;//.html?orderid='+datas.data;
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
function save_gust_address () {
    if($('#username').val() == ''){
	   Tmsg('请录入联系人');
	   return false;
	}
	if($('#mobile').val() == ''){
	   Tmsg('请录入联系人手机号');
	   return false;
	}
	if($('#addressdet').val()  == $('#addressdet').attr('data')){
	  Tmsg('请录入具体地址');
	  return false;
	}
   	 url = siteurl+'/index.php?controller=wxsite&action=saveGustAddress';
        var submitData={
             username:$('#username').val(),
             mobile:$('#mobile').val(),
             addressdet:$('#addressdet').val()
         }
         $.post(url, submitData, function (data) {
             if (data.success=='yes') {
                 alert(data.msg);
                 window.location.reload();
             } else {
                   alert(data.msg);
             }

         }, "json");
}



function maketimenenu(){
	var selectdate = $("select[name='senddate']").find("option:selected").val();
  //$('#orderTime').html('');
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
  freshcart();
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
          //  $('#orderTime').append('<option value="'+timesee+'">'+timesee+'</option>');
         }
	     }
	}
}

       function getTimemenenu () {
           
           var myDate = new Date();
           var day = myDate.getDate();  
           var month = myDate.getMonth()+1;
           var year = myDate.getFullYear();
           var now_date = year+"-"+month+"-"+day;
           var hours = myDate.getHours(); 
           var minutes = myDate.getMinutes(); 
           if(minutes<10) {
               minutes = "0"+minutes;
           }
           var now_time = hours+":"+minutes+":00";
        
           var frist_option = $("#change_time").find("option:selected").val();
          
           var selected_time = frist_option;
           //frist_option  = frist_option.replace("-","");
           //frist_option  = frist_option.replace("-","");
    
          var ordertime = $("#ordertime").find("option:selected").val();
          //alert(now_date);alert(now_time);
          var now_timestr = js_strto_time(now_date+" "+now_time);

       
                
                   $('#ordertime').find("option ").remove(); 
             var url= siteurl+'/index.php?controller=wxsite&action=shopcarttime';
             var fulldate= $("#change_time").find("option:selected").val();
         
               var submitData = {"shopid":shopid,"fulldate":fulldate}
               $.post(url,submitData,function(data){
                  
                   var myobj=eval(data); 
                 
                for(var i=0;i<myobj.length;i++){  
                   
                      $('#ordertime').append('<option value="'+myobj[i]+'">'+myobj[i]+'</option>');
                    }  
  
               },"json");
               /*
                 for(var i=begindates;i<enddates;i=i+setptime){
            $('#orderTime').find("option ").remove();        
            $('#orderTime').append('<option value="'+timesee+'">'+timesee+'</option>');
     
	     }*/
                  $("#ordertime").find("option:eq(0)").attr("selected","selected");
                   $("#ordertime").children("option").show();
                    $("#ordertime").children("option").attr("disabled","");
             
           }
           
           
   function js_strto_time(str_time){
  var new_str = str_time.replace(/:/g,"-");
  new_str = new_str.replace(/ /g,"-");
  var arr = new_str.split("-");
  var datum = new Date(Date.UTC(arr[0],arr[1]-1,arr[2],arr[3]-8,arr[4],arr[5]));
  return strtotime = datum.getTime()/1000;

}
       
  function initshop(){ 
       url = siteurl+'/index.php?controller=wxsite&action=cart&shopid='+shopid+'&datatype=json&random=@random@';
        url = url.replace('@random@', 1+Math.round(Math.random()*1000));
        var datas = ajaxback(url,'');
       $('.onselect').removeClass('onselect');
             $('.righ_l_b_btn_moren').show();
             $('.righ_l_b_btn_hover').hide();
             $('.right_l_btn_nub').text(0);
             $('#total_count').text(0);
             $('#total_money').text(0);
        if(datas.flag == false){    
           if($('#total_money').html() != undefined){ 
                   $(".sortitemclick").val("0");
             $.each(datas.content.list, function(i,val){   
             
              // var count_typeid=val.type)id+count_typeid;
              $(".sortitemclick[data="+val.typeid+"]").val(parseInt($(".sortitemclick[data="+val.typeid+"]").val())+parseInt(val.count));
               if($('#gidli_'+val.id).html() != undefined){  
                  var typeid = $('#gidli_'+val.id).attr('typeid');
                //  $('#typelist'+typeid).show();
                //   $('#typelist'+typeid).text(Number($('#typelist'+typeid).text())+Number(val.count));   
                   $('#gidli_'+val.id).addClass('onselect');
                   
                    $('#typelist'+typeid).text(Number($('#typelist'+typeid).text())+Number(val.count)); 
                 
                   
                  
                   
                   $('#gshu_'+val.id).text(val.count); 
                  $('#gidli_'+val.id).find('.righ_l_b_btn_moren').hide();
                  $('#gidli_'+val.id).find('.righ_l_b_btn_hover').show();
               } 
              }); 
              $('#total_count,#total_count2').text(datas.content.sumcount);
              $('#total_money').text(datas.content.sum);
     
              if(Number(datas.content.sum) > Number(shoplimitcost)){
                 $('#showlimit').text('');
              }else{
                      var checkcost = Number(shoplimitcost)-Number(datas.content.sum);
                      $('#showlimit').text('差'+checkcost+'起送');
                      
              }
           }else{
           }
        }
    }
function pay_prince() {
    $("#pay_prince").hide();
    $("#hide_block").show();
    var num = /^[0-9]+(.[0-9]{0,3})?$/;
    if (!num.test($('#order_price').val())) {
        alert('请输入正确的金额数字');return false;
    }
    var url = siteurl+'/index.php?controller=wxsite&action=selfpayment&random=@random@';
        url = url.replace('@random@', 1+Math.round(Math.random()*1000));
    var dataSubmit = {
        'shopcost':$("#order_price").val(),
        'paytype':$("input[name='order_way']:checked").val(), 
        'shopid':shopid
    }
    $.post(url,dataSubmit,function(data){
        if (data.success=='yes') {         
            window.location.href=  siteurl+'/index.php?controller=wxsite&action=subshow&orderid='+data.msg ;
        }else {
            alert('订单生成失败请重新下单');
        }
    },'json');
}