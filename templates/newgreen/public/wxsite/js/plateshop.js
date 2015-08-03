$(function(){

$('.righ_l_b_btn_moren').show();
$('.righ_l_b_btn_hover').hide();
$('.righ_l_b_btn_moren').click(function(){
  $(this).hide();
  $(this).next().show();
  $('#footer').show();
  $('#hide_block').hide();
});
$('.right_l_btn_right').click(function(){
  $('#footer').show();
  $('#hide_block').hide();
  flyItem($(this),$('#footer'));
});
//头部导航切换 Begin
var pageLength = $('.pageheader ul > li').length;
     if( pageLength % 2 == 0 ){
       $( '.pageheader ul' ).children().css({
        'width':'50%',
        'float':'left'
      });
     }
     else{
      $( '.pageheader ul' ).children().width('100%');
     }
   $( '.pageheader ul' ).children().eq(1).addClass('active');
  $( '.pageheader ul' ).children().click(function(){
    $(this).addClass('active').siblings().removeClass('active');
  });
//头部导航切换 End

//点击发送验证码倒计时 Begin
var count = 60;
var timer;
var reg = /^[0-9]*$/;
$('#send_code').click(function(){
  if($('#phone').val().length == 11 && reg.test($('#phone').val()) ){
    timer = setInterval(countDownaaaa,1000); 
  }
});
//验证码
function countDownaaaa(){
  count --;
  if(count == 0 ){
    $('#send_code').css({
      'background':'#ff6000',
      'color':'#fff'
    }); 
   $('#send_code').val('获取验证码').removeAttr('disabled');
    clearInterval(timer);
    count = 60;
    
  }
  else{
    $('#send_code').css({
      'background':'#ccc',
      'color':'#999'
    });
  $('#send_code').attr('disabled',true);
  $('#send_code').val('('+count+')'+'重新发送');
  }
};
//点击发送验证码倒计时 End

 payinshop();
//底部导航切换   Begin
      
     setInterval(function(){
     
          if( !isNaN($('#showlimit').html()) ){
            $('#showlimit').fadeOut('fast');
            $('#footer div:nth-of-type(1) input').fadeIn('slow');
         }
         else{
          $('#showlimit').fadeIn('fast');
          $('#footer div:nth-of-type(1) input').hide();
         }   
   
        if($('.total_count').html() != 0){
            showfooter2();
            //$('#footer').addClass('footer2').removeClass('footer1');
          }
          else{
            showfooter1();
            //$('#footer').addClass('footer1').removeClass('footer2');
          }
          scroll();
        //  move_up();
      },100);  
//底部导航切换   End     
   $('.move_up').click(function(){
            //$(window).scrollTop(0);
            $('body,html').animate({scrollTop:0},500);
          });  
//左侧导航单边框  Begin
  var lengthLi = $('.goodsnav').children().length;
  if( lengthLi % 2 == 0 ){
      $('.goodsnav li:even').css({
        'border':'none'
      });
    }
    else{
      $('.goodsnav li:odd').css({
        'border':'none'
      });
    }
//左侧导航单边框  End

//左侧导航显示默认样式   Begin
  $('.goodsnav li').eq(0).addClass('active').siblings().removeClass('active');
  $('.goodsnav li').eq(0).css('border-top','none');
  $('.goodsnav li').click(function(){
    $('.goodsnav li').eq($(this).index()).addClass('active').siblings().removeClass('active');
  });
//左侧导航显示默认样式   End

//右侧商品列表最后一个取消margin值  Begin
$('.goodslistimgtype ul').children('li:last-child').css({
  'margin-bottom':0
});
//右侧商品列表最后一个取消margin值  End

$('#pay_cover .delete').click(function(){
  $('#pay_cover').hide();
});

    $('body').append('<div id="addload" style="position: absolute; z-index: 1000; left: 30%; top: 30%; opacity: 1; display: none; width: 16px;height: 16px;background-position: -431px -20px;line-height: 12px;overflow:hidden;"></div>');
    /**菜谱样式切换**/
    $('.changelisttype span').bind("click", function() {
           var Nowclassname= $(this).attr('class');
           if(Nowclassname == 'wordli'){
            $(this).removeClass('wordli').addClass('wordlion');
            $('.imglion').addClass('imgli').removeClass('imglion');
            changegoodslist('goodslistimgtype','goodslisttype');
           }else if(Nowclassname == 'wordlion'){
           }else if(Nowclassname == 'imglion'){
           }else if(Nowclassname == 'imgli'){
            $(this).removeClass('imgli').addClass('imglion');
            $('.wordlion').addClass('wordli').removeClass('wordlion');
            changegoodslist('goodslisttype','goodslistimgtype');
           }
  });
  /***滚动js***/
  $(window).scroll(function(){
    gundong(this);
    });
    freshcart();
    $('.onsell').bind("click", function() {
        addonedish($(this).attr('goodsid'),$(this).attr('shopid'),1,$(this));
        initshop();
        $('#footer').show();
        flyItem($(this),$('#footer'));
        
    });
    $('.Menubox_01 li').bind("click", function() {
        $('.shopshow_content').find('.goods_div').eq($(this).index()).show().siblings().hide();
        $('.shopshow_cart').show();
        $(this).addClass('hover').siblings().removeClass('hover');
    });
    getPingjia(0);
    getliuyan(0);
});

function payinshop(){
  $('#pay_prince').click(function(){
    $('#hide_block').fadeToggle();
    $('#footer').fadeToggle();
    $('#hide_block').height( $('#footer').height() );
  }); 

  $('#hide_block input[type="button"]').click(function(){
     $('#pay_cover').show();
  });
};

//飞入购物车  Begin
function flyItem(begin,end){
  var flyItem = $('<div></div>');
  flyItem.css({
    'width':'35px',
    'height':'35px',
    'border-radius':'35px',
    'background':'#f60',
    'z-index':999,
    'position':'absolute',
    'top':begin.offset().top + 'px',
    'left':begin.offset().left*0.9 + 'px',
    'opacity':1
  });
  flyItem.appendTo($('body'));
  flyItem.animate({
    width:'10px',
    height:'10px',
    top:end.offset().top + 'px',
    left:end.offset().left*1.2 + 'px',
    opacity:1
  },'slow');
  setTimeout(function(){ flyItem.remove() },500);
};
//飞入购物车  End

//页面滚动时左侧导航切换  Begin
function scroll(){
    var length = $('#goodslist').children().length;
    var lengthLi = $('.goodsnav > li').length;
    var children = $('#goodslist > li');
    var scrolltop = $(window).scrollTop()+40;
    var offsettop = [];
    var item = [];
    var height = $('#goodslist > li').children('h3').height();

    for( var i=0;i<length;i++ ){
      offsettop.push( children.eq(i).offset().top );
      item.push( children.eq(i).children('h3').clone() );

      if( $('#goodslist > li').eq(i).height() == height ){
        $('#goodslist > li >div:nth-of-type(1)').eq(i).html(''+$('#goodslist > li').eq(i).children('h3').text()+'添加中，敬请期待...');
        $('#goodslist > li >div:nth-of-type(1)').eq(i).css({
          'text-align':'center',
          'color':'#ff6000',
          'font-size':'16px'
        });
        $('#goodslist > li').eq(i).css({
        'min-height':$(window).height()
        });
      }
      else{
        $('#goodslist > li').eq(i).css({
        'min-height':$('#goodslist > li').eq(i).height()
        });
      }
      
    }

    $('#goodslist > li').eq(length-1).css({
    'min-height':$(window).height()
    });

    for( var i=0;i<length;i++ ){
     if( scrolltop >= offsettop[i] ){
       $('.fixed').hide();
       $('.fixed').eq(i).show();
       item[i].appendTo( children.eq(i) );
       if (item[i].length > 1) { item[i].remove(); }
        item[i].addClass('fixed');
        $('.goodsnav li').eq(i).addClass('active').siblings().removeClass('active');
       }
    }
};
//页面滚动时左侧导航切换  End

//定义底部导航样式  Begin
 //var footer1 = $('#footer').children('div').eq(0);
// var footer2 = $('#footer').children('div').eq(1);
 function showfooter1(){
      $('#footer').children('div').eq(0).fadeIn('slow').siblings().fadeOut('fast');
    }; 
    function showfooter2(){
      $('#footer').children('div').eq(1).fadeIn('slow').siblings().fadeOut('fast');
    };
//定义底部导航样式  End

//回到顶部  Begin
/*function move_up(){
  if($(window).scrollTop() > 200){
          $('.move_up').fadeIn();
        }
        else{
          $('.move_up').fadeOut();
        }  
};*/
//回到顶部  End


//获取评价
function getPingjia(page)
{
    ///$('#Comloading').show();

     $('#det_commm').html('');
     var url = siteurl+"/index.php?controller=order&action=commentshop";
       $.post(url, {'id':shopid,'type':'shop','page':page},function (data, textStatus){

        $('#det_commm').append(data);

      }, 'html');

}
//获取留言
function getliuyan(page)
{

    $('#showaskid').html('');
     var url = siteurl+"/index.php?controller=ask&action=newshopask";

       $.post(url, {'id':shopid,'showtype':'shop','page':page},function (data, textStatus){
        $('#showaskid').html(data);
        if(data == null || data=='')
        {
         }

      }, 'html');

}
function InFocus(obj)
{
    if($(obj).val() == $(obj).attr('data'))
    {
        $(obj).val('');
    }
}
function outF(obj){
  if($(obj).val() == ''){
   $(obj).val($(obj).attr('data'));
  }
}
//鍙戝竷鐣欒█
function AddMessage()
{
    if($('#MContent').val() == $('#MContent').attr('data')|| $('#MContent').val()=='')
    {
         diaerror('留言内容不能为空');
    }else{
      var url = siteurl+'/index.php?controller=ask&action=saveask&datatype=json';
    var backinfo = ajaxback(url,{'shopid':shopid,'content':$('#MContent').val(),'type':'0'});
    if(backinfo.flag == false){
         $('#Msgloading').show();
             $('#Msgnon').hide();
             $('#MContent').val($('#MContent').attr('data'));
       $('#Msgul').html('');
       $('#liuyanpage').val(1);
       getliuyan();
     }else{
         diaerror(backinfo.content);
    }
  }
}
/*切换样式*/
function changegoodslist(nowclass,toclass){
    $('.'+nowclass).css({'opacity':'0'});
    $('.'+nowclass).removeClass(nowclass).addClass(toclass);
    $('.'+toclass).css({'opacity':'0'});
    $("."+toclass).animate({'opacity':'1'},1000);
}
//购物车动画
function cartimg(obj){
         $("#addload").show();
        var pos =$(obj).offset();
       var topval = pos.top;
       var leftval = Number(pos.left)+39;
       $("#addload").css("top", topval + "px");
       $("#addload").css("left", leftval + "px");
       $("#addload").css({'width':'16px','height':'16px','margin-top':'0px','opacity':'1'});
       $("#addload").animate({'opacity':'0','margin-top':'-30px'},"slow",function(){
           freshcart();
       });
}
//添加购物车
function addonedish(gid,tshopid,num,obj){
    var url= siteurl+'/index.php?controller=wxsite&action=addcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&plate=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000));
   var bk = ajaxback(url,'');
   if(bk.flag == false){
           cartimg(obj);
   }else{
            diaerror(bk.content);
     }
}
//增加商品数量
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
//清空购物车
function delshopcart(){
    if(confirm('确认清空购物车')){
    var url= siteurl+'/index.php?controller=site&action=clearcart&shopid='+shopid+'&num=1&plate=1&datatype=json&random=@random@';
      url = url.replace('@random@', 1+Math.round(Math.random()*1000));
    var bk = ajaxback(url,'');
        if(bk.flag == false){
           freshcart();
        }else{
            alert(bk.content);
        }
  }
  return false;
}
//删除已道菜品
function removeonedish(gid,tshopid,num){
     $('#loading').show();
    
     url = siteurl+'/index.php?controller=wxsite&action=downcart&goods_id='+gid+'&shopid='+tshopid+'&num=1&plate=1&datatype=json&random=@random@';
    url = url.replace('@random@', 1+Math.round(Math.random()*1000));
    var bk = ajaxback(url,'');
        if(bk.flag == false){
           freshcart();
           $("#loading").hide();
        }else{
            alert(bk.content);
        }

}
//删除商品
function removesupplierdish(gid,tshopid){

    url = siteurl+'/index.php?controller=site&action=delcartgoods&goods_id='+gid+'&shopid='+tshopid+'&num=1&plate=1&datatype=json&random=@random@';
    url = url.replace('@random@', 1+Math.round(Math.random()*1000));
    var bk = ajaxback(url,'');
        if(bk.flag == false){
           freshcart();
        }else{
            diaerror(bk.content);
        }
}
//刷新购物车
/*
function freshcart(){
        url = siteurl+'/index.php?controller=wxsite&action=smallcatding&shopid='+shopid+'&plate=1&random=@random@';
        url = url.replace('@random@', 1+Math.round(Math.random()*1000));
        $.get(url, function(result){ 
       // $(".shopshow_cart").html(result);
      });
}*/
//滚动变化
function gundong(obj){
 if($(obj).scrollTop() > 270){
   //$('.goodsnav').css({'position':'fixed','top':'40px'});
  //$('.shopshow_cart').css({'margin-top':$(obj).scrollTop()-270});
 }else{
   // $('.goodsnav').css({'position':''});
   // $('.shopshow_cart').css({'margin-top':0});
 }
}
function scollto(obj){
 $('html,body').animate({scrollTop: $(obj).offset().top}, 100);
}
//订座位弹出层
function outdiv_position(){
    $('body').append('<div id="cat_zhe" class="cart_zhe"></div>');
    $('body').append('<div id="goosshow" class="cart_position"></div>');
    $('#goosshow').html(cartouthtml);
    $('#goosshow').find('.title').eq(0).text('预订桌位');
    maketimenenu();
    $('#paytypeshow').hide();
    $('#uphone').bind("blur", function() {
             gophone();
    });
    $('input[name="subtype"]').val(1);
    gophone();
}
function close_pop(divid){
   if($('#cfbtn').attr('disabled')=='disabled'){
    diaerror('数据提交中..');
        return false;
   }

    $('#'+divid).remove();
    $('#cat_zhe').remove();
}
function outdiv_cart(){
    if($('.cartgoodslist').find('li').length < 1){
      diaerror('购物车内暂无商品');
      return false;
    }
        $('body').append('<div id="cat_zhe" class="cart_zhe"></div>');
    $('body').append('<div id="goosshow" class="cart_posicart"></div>');
    $('#goosshow').html(cartouthtml);
    $('#goosshow').find('.title').eq(0).text('点单预订');
    $("#goosshow").find('.goodsshow').eq(0).html($('.shopshow_cart').html());

    maketimenenu();
    gophone();
    $('input[name="subtype"]').val(2);
}
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
            $('#orderTime').append('<option value="'+timesee+'">'+timesee+'</option>');
         }
         }
    }
}
/*验证码*/
function gophone(){
                var tempurl = siteurl+'/index.php?controller=site&action=phonecode&random=@random@&phone=@phone@';
                 tempurl = tempurl.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@phone@',$('#phone').val());
                $.getScript(tempurl);
}
function showsend(phone,time){
    if($('#showcode').html() == undefined){
    $('#uphone').html('<input type="button" value="发送手机验证码" id="dosendbtn" time="'+time+'" style="float:left;">');
    $('#uphone').parent().after('<div class="cart_out_show" id="showcode"><label > 验 证 码：</label><input id="phonecode" class="hc_order_input_box" type="text" value="" size="10" name="phonecode"><span class="hc_order_lists_span_color"> * </span><span class="hc_order_lists_span"></span></div>');
     if($('#uphone').val() == ''){
         $('#uphone').val(phone);
     }
     $('#dosendbtn').bind("click", function() {
         var tempurl = siteurl+'/index.php?controller=site&action=setphone&random=@random@&phone=@phone@';
             tempurl = tempurl.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@phone@',$('#phone').val());
             $.getScript(tempurl);
    });
     $('#dosendbtn').attr('time',time);
      setTimeout("btntime()",1000);
  }else{
     if($('#uphone').val() == ''){
         $('#uphone').val(phone);
     }
     $('#dosendbtn').attr('time',time);
     setTimeout("btntime()",1000);
  }
}

function removesend(){
    //setTimeout
    $('#dosendbtn').remove();
    $('#showcode').remove();
}
function  btntime(){
    //dosendbtn
    var nowtime = Number($('#dosendbtn').attr('time'));
    if(nowtime > 0){
       $('#dosendbtn').attr('disabled',true);
       var c = Number(nowtime)-1;
        $('#dosendbtn').attr('time',c);
        var  mx = 120-(120 - Number(c));
         $('#dosendbtn').attr('value','验证码还有'+mx+'秒失效');
          setTimeout("btntime()",1000);
    }else{
         $('#dosendbtn').attr('disabled',false);
         $('#dosendbtn').attr('value','发送手机验证码');
  }
}
function onGo(){
  //alert('提交数据');
  //dosubmit
  $('#cfbtn').attr('disabled',true);
  $('#cfbtn').addClass('diabled');
  $.ajax({
       type: 'POST',
       async:false,
       url: submithtml.replace('@random@', 1+Math.round(Math.random()*1000)),
       data: $('#dosubmit').serialize(),
      dataType: 'json',success: function(content) {
        if(content.error == false)
        {
            $('#cfbtn').attr('disabled',false);
            var newurl = orderhtml.replace('@orderid@', content.msg);
            window.location.href=newurl;
        }else if(content.error == true)
        {
            diaerror(content.msg);
          $('#cfbtn').attr('disabled',false);
             $('#cfbtn').removeClass('diabled');
           //$('#showsubmit').hide();
        }else{
            diaerror(content);
           $('#cfbtn').attr('disabled',false);
            $('#cfbtn').removeClass('diabled');
           //$('#showsubmit').hide();
        }

          },
      error: function(content) {
        diaerror('数据提交失败');
         $('#cfbtn').attr('disabled',false);
            $('#cfbtn').removeClass('diabled');
        //$('#showsubmit').hide();
       }
  });
}
   function dolink(url){ 
  window.location.href=url;
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
             var url= siteurl+'/index.php?controller=wxsite&action=shopcarttime&choose=1';
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
    
  function freshcart(tshopid){

      if (tshopid) {
          shopid=tshopid;
      }
      //var day = $('#change_time').val();
            url = siteurl+'/index.php?controller=wxsite&action=cart&shopid='+shopid+'&plate=1&datatype=json&random=@random@';    

	//url = siteurl+'/index.php?controller=wxsite&action=cart&shopid='+shopid+'&day='+day+'&datatype=json&random=@random@';
	url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,'');
     
                     $('.total_count').text(bk.content.sumcount);
	if($('#shocart').html() == undefined){
                $('.total_count').text(0);
             $('#total_money').text(0);      
             $('.total_count').text(bk.content.sumcount);
              $('#total_money').text(bk.content.sum);  
              $(".right_l_btn_nub").text(0);
              
        if (bk.content.list) {
            $.each(bk.content.list,function(i,val){
          
               $("#gid_"+val.id).hide();
               $("#gid_"+val.id).next(".righ_l_b_btn_hover").show();
                $("#gid_"+val.id).next(".righ_l_b_btn_hover").find(".right_l_btn_nub").text(val.count);
               
              })
            
        }
           $(".right_l_btn_nub").each(function(){
               if($(this).text()==0) {
                   $(this).parent(".righ_l_b_btn_hover").hide();
                   $(this).parent(".righ_l_b_btn_hover").prev(".righ_l_b_btn_moren").show();
               }
           })
          
          
          //initshop();
	}else{
            if (!bk.content.sumcount) {
                $("#cart_count").text("0");
                $("#cart_total").text("0");
            }

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
            $("#realcost").text((datas.content.sum-datas.content.downcost+datas.content.pscost).toFixed(2));
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
  function initshop(){ 
             
      url = siteurl+'/index.php?controller=wxsite&action=cart&shopid='+shopid+'&plate=1&datatype=json&random=@random@';  
      url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	var bk = ajaxback(url,'');
        
             $('.total_count').text(0);
             $('#total_money').text(0);      
             $('.total_count').text(bk.content.sumcount);
              $('#total_money').text(bk.content.sum);   
               
               $.each(bk.content.list, function(i,val){   
         
               if($('#gidli_'+val.id).html() != undefined){  
                  var typeid = $('#gidli_'+val.id).attr('typeid');
                //  $('#typelist'+typeid).show();
                   $('#typelist'+typeid).text(Number($('#typelist'+typeid).text())+Number(val.count)); 
                   $('#gidli_'+val.id).addClass('onselect');
                   
                   $('#gshu_'+val.id).text(val.count); 
                  $('#gidli_'+val.id).find('.righ_l_b_btn_moren').hide();
                  $('#gidli_'+val.id).find('.righ_l_b_btn_hover').show();
               } 
              }); 
           
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
       
       
	$('#loading').show();
	  url = siteurl+'/index.php?controller=wxsite&action=plateorder&datatype=json&random=@random@';
	  url = url.replace('@random@', 1+Math.round(Math.random()*1000));
   $.ajax({         //script定义
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
            dataType: "json",
            async:true,
            
            data:{shopid:shopid,'remark':$('#remark').val(),'contactname':$('#contactname').val(),'mobile':$('#phone').val(),'addressdet':$('#addressdet').val(),'senddate':$("select[name='senddate']").find("option:selected").val(),'minit':$("#ordertime").find("option:selected").val(),'dikou':$('#jifen').val(),'juanid':$('#juanid').val(),'paytype':$("input[name='paytype']:checked").val(),'personcount':$("#personcount").val(),'mobile_code':$("#mobile_code").val()},
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