$(function(){ 
	 $('body').append('<div id="addload" style="position: absolute; z-index: 1000; left: 30%; top: 30%; opacity: 1; display: none; height: 15px;width: 15px;border-radius: 15px;line-height: 12px;overflow:hidden; background: #ea5413;"></div>'); 
   freshcart();
});

//加购物车动画
function cartimg(obj){
	     $("#addload").show(); 
        var pos =$(obj).offset();
       var topval = pos.top;
       $("#addload").css("top", topval + "px"); 
       $("#addload").css("left", pos.left + "px");
        $("#addload").css({'width':'15px','height':'15px'}); 
       var target_ob = $('#ShopCart').offset();
       var target_top = Number(target_ob.top);
       var target_left = Number(target_ob.left);
       $("#addload").animate({top:target_top,left:target_left, 'width':'0px','height':'0px'},function(){
           freshcart();
       });   
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
 
	if($('#ShopCart').html() != undefined){
	    url = siteurl+'/index.php?controller=site&action=smallcat&shopid='+shopid+'&random=@random@';
	    url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
	    $.get(url, function(result){ 
	   
        $("#CartList").html(result);
         freachperson();
    //    $('#CMoney').text(allcost);
     //   $('#waimaibtn').text(allcost);
      });
   }else{ 
   	//调用  自动刷新购物车 
   	  
      url = siteurl+'/index.php?controller=site&action=smallcat2&shopid='+shopid+'&random=@random@';
	    url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
	    $.get(url, function(result){  
        $("#cartshow_c").html(result);  
         if(Number($('#jifendkou').attr('data')) > 0){
  	        $('#jifendkou').show();
         } 
          jifenduihuan();  
      }); 
     
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
  $('#jfcost').text('￥'+dikou);
  $('#yhjcost').text('￥'+juancost);
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
	 $('#showtj').hide();
	 $('#showtj2').hide();
	  url = submithtml.replace('@random@', 1+Math.round(Math.random()*1000));
   $.ajax({         //script定义
             url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
            dataType: "json",
            async:true,
            data:{'phonecode':$('#phonecode').val(),shopid:shopid,'remark':$('#remark').val(),'username':$('#recieve_name').val(),'mobile':$('#phone').val(),'addressdet':$('#addrestemp').val(),'areaid1':$("#areaid1").find("option:selected").val(),'areaid2':$("#areaid2").find("option:selected").val(),'areaid3':$("#areaid3").find("option:selected").val(),'senddate':$("select[name='senddate']").find("option:selected").val(),'minit':$("#orderTime").find("option:selected").val(),'paytype':$("input[name='paytype']:checked").val(),'dikou':$("select[name='jfdk']").find("option:selected").val(),'juanid':$("input[name='buyjuan']:checked").val()},
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
 


