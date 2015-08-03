<?php /* Smarty version Smarty-3.1.10, created on 2015-06-30 13:36:50
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/shopshow.html" */ ?>
<?php /*%%SmartyHeaderCode:2902099355822647cd5011-90896676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb872fa3da6f72178202aca0a04fe10ab4c308a7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/shopshow.html',
      1 => 1435642602,
      2 => 'file',
    ),
    '172a78fbc96ceadf7e270433684a27900a1292ec' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/wxsite.html',
      1 => 1435553895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2902099355822647cd5011-90896676',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_55822647f06aa7_27233462',
  'variables' => 
  array (
    'tempdir' => 0,
    'shopinfo' => 0,
    'siteurl' => 0,
    'is_static' => 0,
    'Taction' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55822647f06aa7_27233462')) {function content_55822647f06aa7_27233462($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!--<title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>--> 
	<title><?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
</title> 
	 
	<link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/css/public.css">    
 
<link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/css/shopshow.css">   

	<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/jquery.js"></script> 
  <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/public.js"></script>  
   <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/swipe.js"></script> 
    <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/iscroll.js"></script> 
  
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/jquery-1.11.2.min.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/wxshop.js"></script>  
   <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/cart.js"></script> 
   <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/goodsdetail.js"></script> 
                <!--  jquery-mobile  Begin -->
 <!--  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/css/jquery.mobile-1.3.2.min.css">

<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/jquery.mobile-1.3.2.min.js"></script> -->
                <!--  jquery-mobile  End -->
<script>
     var shopid = <?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['id'];?>
;
     var checknext = false;
     var shoplimitcost = '<?php echo $_smarty_tpl->tpl_vars['shopdet']->value['limitcost'];?>
';
      $(function(){ 
  
      $('#addload').remove();
       
         freshcart();
         $('.righ_l_b_btn_moren').on("click", function() {  
              if(checknext ==  false){ 
                checknext = true;
                 addonedish($(this).attr('data-id'),$(this).attr('data-shopid'),1,this);
                 setTimeout("myyanchi()", 500 );
                 $(this).hide();
                 $(this).next(".righ_l_b_btn_hover").show();
              }
             flyelem($(this),$('#footer'));//飞入购物车
          }); 

           $('.right_l_btn_left').on("click", function() {   
              if(checknext ==  false){ 
                  checknext = true;
                 removeonedish($(this).attr('data-id'),$(this).attr('data-shopid'),1,this);
                 setTimeout("myyanchi()", 500 );
              }
          
          }); 
/*
//  Begin

window.onload=function()
{
//alert('“你刷新了页面！”');
$.mobile.changePage($('.right_list_box:nth-child(1)'),{transition:'',reverse:true});
} 
  $('.right_list_box').each(function(){
  $(this).on({
    'swipeleft':function(){
      if($(this).next().index() < $(this).parent().children().length-1){
       $.mobile.changePage($(this).next(),{transition:''});
       $('.sortitemclick').eq($(this).index()+1).addClass('active');
       $('.sortitemclick').eq($(this).index()+1).siblings().removeClass('active');
      }
    },
    'swiperight':function(){
      if($(this).prev().index() >= 0){
        $.mobile.changePage($(this).prev(),{transition:'',reverse:true});
        $('.sortitemclick').eq($(this).index()-1).addClass('active');
       $('.sortitemclick').eq($(this).index()-1).siblings().removeClass('active');
      }
    }
  });
});

 $('.sortitemclick:nth-child(1)').addClass('active');
           $('.sortitemclick').click(function(){
              $(this).addClass('active');
              $(this).siblings().removeClass('active');
              $.mobile.changePage($('.right_list_box').eq($(this).index()));
            });
 //  End

   */

 //头部导航切换  
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
   $( '.pageheader ul' ).children().eq(0).addClass('active');
  $( '.pageheader ul' ).children().click(function(){
    $(this).addClass('active').siblings().removeClass('active');
  });
     
     $('.sortitemclick').click(function(){
        //$(this).addClass('active').siblings().removeClass('active');
        $('body,html').animate({
          scrollTop: $('.right_list_box').eq($(this).index()).offset().top 
        },500);
       // $.mobile.changePage($('.right_list_box').eq($(this).index()));

      });
 $('.sortitemclick').eq(0).css('border-top','none').addClass('active').siblings().removeClass('active');
$('.right_list_box').children('div:last-child').addClass('right_list_box_body_active');

setInterval(function(){
  scroll();//页面滚动，选项卡切换
  showlimit();//底部导航起送价和下单页面切换
  //move_up();//回到顶部
},100);
payinshop();
$('#pay_cover .delete').click(function(){
  $('#pay_cover').hide();
});
$('.move_up').click(function(){
            //$(window).scrollTop(0);
            $('body,html').animate({scrollTop:0},500);
          });


      $('.right_l_btn_right').on("click", function() {   
           if(checknext ==  false){ 
               checknext = true;
               addonedish($(this).attr('data-id'),$(this).attr('data-shopid'),1,this);
               setTimeout("myyanchi()", 500 );
            }
            flyelem($(this),$('#footer'));//飞入购物车
          }); 

          $(".member_center").on("click",function(){
           var shopid=$(this).attr("shop_id");
           window.location.href = siteurl+'/index.php?controller=wxsite&action=login&shopid='+shopid;
              
          });

         $(".myorder").on("click",function(){
              window.location.href = siteurl+'/index.php?controller=wxsite&action=order';
          });
      /*   
         footer1.hide();
         footer2.show();
            */
    });
/* var footer1 = $('#footer').children('div').eq(0);
 var footer2 = $('#footer').children('div').eq(1);*/
   function showfooter1(){
        $('#footer').children('div').eq(0).fadeIn('slow').siblings().fadeOut('fast');
      };
      function showfooter2(){
        $('#footer').children('div').eq(1).fadeIn('slow').siblings().fadeOut('fast');
      }
      
    function myyanchi(){
      
        checknext = false;
    };

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
    
   
    
/*    function sortitdemclick(doid){  
      // var scroptop= $('#listto_'+doid).offset().top-40;// checktype == '1'?Number($("#sort_sh_"+doid).offset().top)-81:Number($("#sort_sh_"+doid).offset().top)-162;
     // alert(doid);
      //right_list
      var defaultheight = 0;
      var listobj = $('.right_list_box');
      for(var i=0;i<$(listobj).length;i++){
       
        if($(listobj).eq(i).attr('data') == doid){
         
           break;
        }else{
           defaultheight = Number(defaultheight)+Number($(listobj).eq(i).height());
         }
      }
     
      scroll2.scrollTo(0,Number(defaultheight)*-1,200,false); 
      scroll2.refresh();
     //  myScroll.scrollToElement(doid,500);
      // $("html,body").animate({scrollTop:scroptop},2000); 
      // alert($('.dish_type_w').offset().top); 
    } */
  
    
      </script>

<script> 
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
	var taction = "<?php echo $_smarty_tpl->tpl_vars['Taction']->value;?>
"; 
</script>

<script>
//飞入购物车  Begin
function flyelem(begin,end){
  var flyElm = $('<div></div>');                      
     flyElm.css({
     'z-index': 9000,
      'position': 'absolute',
      'top':begin.parent().offset().top  +'px',
      'left': begin.parent().offset().left  +'px',
      'width': 35+'px',
      'height': 35 +'px',
      'border-radius':35+'px',
      'background':'#ff6000',
      'opacity':1
     })
    $('body').append(flyElm);
        flyElm.animate({
          opacity:0,
          top:end.offset().top,  
          left:end.offset().left,
          width:0,
          height:0,
        });
  setTimeout(function(){$(flyElm).remove();},300);  
};
//飞入购物车  End

//滚动页面时左侧导航切换  Begin
function scroll(){
    var length = $('#transition .right_list').children().length;
    var lengthLi = $('.sortitemclick').length;
    var children = $('#transition .right_list').children();
    var scrolltop = $(window).scrollTop();
    var offsettop = [];
    var item = [];
    var height = $('#transition .right_list').children().children('h3').height();
   
    for( var i=0;i<length;i++ ){
      offsettop.push( children.eq(i).offset().top );
      item.push( children.eq(i).children('h3').clone() );

      if( $('#transition .right_list').children(i).height() == height ){
        $('#transition .right_list > div:nth-of-type(1)').eq(i).html(''+$('#goodslist > li').eq(i).children('h3').text()+'添加中，敬请期待...');
        $('#transition .right_list > div:nth-of-type(1)').eq(i).css({
          'text-align':'center',
          'color':'#ff6000',
          'font-size':'16px'
        });
        $('#transition .right_list').children(i).css({
        'min-height':$(window).height()
        });
      }
      else{
        $('#goodslist').children(i).css({
        'min-height':$('#goodslist').children(i).height()
        });
      }
    }

    $('#transition .right_list').children().eq(length-1).css({
    'min-height':$(window).height()
    });
    
    if( lengthLi % 2 == 0 ){
      $('.sortitemclick:even').css({
        'border':'none'
      });
    }
    else{
      $('.sortitemclick:odd').css({
        'border':'none'
      });
    }

    for( var i=0;i<length;i++ ){
     if( scrolltop >= offsettop[i] ){
       $('.right_list_box_h3_fixed').hide();
       $('.right_list_box_h3_fixed').eq(i).show();
       item[i].appendTo( children.eq(i) );
       if (item[i].length > 1) { item[i].remove(); }
        item[i].addClass('right_list_box_h3_fixed');
        $('.sortitemclick').eq(i).addClass('active').siblings().removeClass('active');
       }
    }
};
//滚动页面时左侧导航切换  End

//回到顶部  Begin
function move_up(){
  if($(window).scrollTop() > 200){
          $('.move_up').fadeIn();
        }
        else{
          $('.move_up').fadeOut();
        }  
};
//回到顶部  End

//底部导航起送价和选好了切换   Begin
function showlimit(){
  if( !isNaN($('#showlimit').html()) ){
            $('#showlimit').fadeOut('fast');
            $('#footer div:nth-of-type(1) input').fadeIn('slow');
         }
         else{
          $('#showlimit').fadeIn('fast');
          $('#footer div:nth-of-type(1) input').hide();
         }

        if($('#total_count').html() != 0){
            showfooter2();
           // $('#footer').addClass('footer2').removeClass('footer1');
          }
          else{
            showfooter1();
           // $('#footer').addClass('footer1').removeClass('footer2');
          }
};
//底部导航起送价和选好了切换 End
var scroll1, scroll2,scroll3;
function loaded() {
  //scroll1 = new iScroll('standard',{hScrollbar:false, vScrollbar:false,bounce:false});
//  scroll2 = new iScroll('transition', {hScroll:false,hScrollbar:false, vScrollbar:false,bounce:false});
  //scroll3 = new iScroll('shopdeinfo',{hScrollbar:false, vScrollbar:false,bounce:false});
}
var gundong = 0;
function show_btn(shownow,hidenow,nowobj){
     
       var obj =  $(window).width();
       $(nowobj).addClass('redli').siblings().removeClass('redli');
       $('#'+shownow).addClass('redli');
       $('#'+hidenow).removeClass('redli');
      if(shownow == 'shopinfo'){ 
          $('#shopdeinfo').show();
          $('#standard').hide();
          $('#transition').hide();
          scroll3.refresh();
      }else{ 
        $('#shopdeinfo').hide();
        $('#standard').show();
          $('#transition').show();
           
      }   
     }
//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', loaded, false);


</script>



 

 
</head>
<body> 
<div id="loading" style="display: none;"><div class="loadingbox"><section class="ffffbox"><div class="loadingpice"></div></section></div></div> 
<div id="hallist"> 
	
	
	 
<!--
<div style="display:none;" class="changetop" id="header"> 
  <ul class="box_inline"> 
    <li class="liwd50 redli" onclick="show_btn('goodslistidv','shopinfo',this);">
       菜单分类
    </li>
    <li class="liwd50" onclick="show_btn('shopinfo','goodslistidv',this);">
       店铺详情
    </li> 
  </ul> 
</div> -->
<div class="pageheader">
  <ul>
    <li><a onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/shopshow/id/".((string)$_smarty_tpl->tpl_vars['id']->value)),$_smarty_tpl);?>
');">外卖</a></li>
    <?php if ($_smarty_tpl->tpl_vars['shopdet']->value['is_goshop']==1){?>
    <li><a onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/plateshow/id/".((string)$_smarty_tpl->tpl_vars['id']->value)),$_smarty_tpl);?>
');">订位</a></li>
    <?php }?>
  </ul>
</div>
<div id="standard">
   <div class="scroller">
     <ul>
      <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['goodstype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
         <li class="sortitemclick" data="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
           <i></i><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>

         </li>
      <?php } ?> 
    </ul>
  </div>
</div>
 
<div id="transition">
   <ul class="scroller right_list">
      <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['goodstype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
         <li class="right_list_box" id="listto_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" data="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"><!-- data-role="page"data-ajax="false"-->
            <h3><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</h3>
            <?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?>
            <div class="right_list_box_body" id="gidli_<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" typeid="<?php echo $_smarty_tpl->tpl_vars['itv']->value['typeid'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['itv']->value['cost'];?>
">
                <input type="hidden" name="hiddesc" value="2302">
                <img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['itv']->value['img'])===null||$tmp==='' ? '../upload/shop/grey.gif' : $tmp);?>
" class="right_list_box_img scrollLoading" onclick="gotoDtail('<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
');"/>
                <div class="right_bottom_wrap">
                <h4><?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>
</h4>
                <p>
                  ¥ <lable> <?php echo $_smarty_tpl->tpl_vars['itv']->value['cost'];?>
</lable>
                   <del><?php if ($_smarty_tpl->tpl_vars['itv']->value['prime_cost']!=='0.00'){?>
                  原价
                  <?php echo $_smarty_tpl->tpl_vars['itv']->value['prime_cost'];?>
  
                 <?php }?></del>
                  <span class="itv_count">剩余 <?php echo $_smarty_tpl->tpl_vars['itv']->value['daycount']-$_smarty_tpl->tpl_vars['itv']->value['stock'];?>
 份</span>
                </p>
                
          <div class="righ_l_b_btn">
            <big class="righ_l_b_btn_moren" data-id="<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" data-shopid="<?php echo $_smarty_tpl->tpl_vars['itv']->value['shopid'];?>
" id="gid_<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['itv']->value['cost'];?>
" typeid="<?php echo $_smarty_tpl->tpl_vars['itv']->value['typeid'];?>
">+</big>
            <ul class="righ_l_b_btn_hover" style="display:none;">
               <li class="right_l_btn_left" data-id="<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" data-shopid="<?php echo $_smarty_tpl->tpl_vars['itv']->value['shopid'];?>
">-</li>
               <li class="right_l_btn_nub" id="gshu_<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
">0</li>
               <li class="right_l_btn_right" id="gid_<?php echo $_smarty_tpl->tpl_vars['itv']->value['goods_id'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['itv']->value['cost'];?>
" typeid="<?php echo $_smarty_tpl->tpl_vars['itv']->value['typeid'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" data-shopid="<?php echo $_smarty_tpl->tpl_vars['itv']->value['shopid'];?>
">+</li>
            </ul>
          </div>
          </div>
            </div>
            
            <?php } ?>

       <!--      <div class="clear"></div> -->
         </li>
           <?php } ?>

   </ul>
     <div class="move_up">
  <!--   <span>回到顶部</span>  -->
     </div>
     <div class="pay_inshop">
    <div id="pay_prince"></div>
    <div id="hide_block" style="display:none">
        <input type="text" name="order_price" placeholder="请输入金额" id="order_price"/>
        <input type="button" value="直接付款"/>
    </div>
    <ul id="pay_cover">
      <li><h3>请选择支付方式:</h3><span class="delete"></span></li>
      <li>
        <label>
          <input type=radio name="order_way" checked="checked" value="wechat"/><span>微信支付</span>
        </label>
      </li>
      <li>
        <label>
          <input type=radio name="order_way" value="alipay"/><span>支付宝</span>
        </label>
      </li><!--
      <li><span>请输入金额:</span><input type="text" name="order_price" id="order_price"/></li>-->
      <li><button id="go_to_pay"  onclick="pay_prince();">确认付款</button></li>
    </ul>
</div>
</div>
<div id="shopdeinfo">
     <div class="scroller">
      <!--店铺--> 
      <div id="shopinfo">
      <div class="shopyuan">
           <div class="box_inline">
              <div class="box_left"><img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shopinfo']->value['shoplogo'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['shoplogo']->value : $tmp);?>
"></div>
              <div class="box_right">
               <div><?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
 [<?php if ($_smarty_tpl->tpl_vars['openinfo']->value['opentype']!=2&&$_smarty_tpl->tpl_vars['openinfo']->value['opentype']!=3){?>打烊<?php }else{ ?>营业<?php }?>] </div>
               <div><?php if ($_smarty_tpl->tpl_vars['psinfo']->value['pstype']==1){?>店铺配送<?php }else{ ?>网站配送<?php }?></div>  
                <div> 
                  <i class="glyphicon glyphicon-star <?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['point']>0){?>on<?php }else{ ?>off<?php }?>"></i>
                  <i class="glyphicon glyphicon-star <?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['point']>1){?>on<?php }else{ ?>off<?php }?>"></i>
                  <i class="glyphicon glyphicon-star <?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['point']>2){?>on<?php }else{ ?>off<?php }?>"></i>
                  <i class="glyphicon glyphicon-star <?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['point']>3){?>on<?php }else{ ?>off<?php }?>"></i>
                  <i class="glyphicon glyphicon-star <?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['point']>4){?>on<?php }else{ ?>off<?php }?>"></i> <?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['point'];?>
.0                <span>(<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['pointcount'];?>
)</span>&nbsp;&nbsp;&nbsp;
               </div> 
              </div> 
           </div>
           <div class="box_inline">
                 <div class="sendMessage" onclick="sendMessage();">
                    <div>&nbsp;
                      <?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['itat']->value['type']=='input'){?>
                                   <?php  $_smarty_tpl->tpl_vars['itcc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itcc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['itat']->value['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itcc']->key => $_smarty_tpl->tpl_vars['itcc']->value){
$_smarty_tpl->tpl_vars['itcc']->_loop = true;
?>
                                     
                                        <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shopattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
                                           <?php if ($_smarty_tpl->tpl_vars['itcc']->value['parent_id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']){?>
                                               <?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>

                                           <?php }?>
                                        <?php } ?>
                                   <?php } ?>
                                <?php }?>     
                        <?php } ?> </div>
                    <div>送达</div> 
                 </div>
                 <div class="sendMessage">
                   <div><?php echo $_smarty_tpl->tpl_vars['shopdet']->value['limitcost'];?>
</div>
                    <div>起送价/元</div>  
 
                 </div>
                 <div class="sendMessage">
                  <div><?php echo $_smarty_tpl->tpl_vars['psinfo']->value['pscost'];?>
</div>
                    <div>配送费/元</div>    
                  
                 </div>
           </div>
      </div>
      <div class="shopyuan">
            <div class="box_header">
              营业时间
            </div>
            <div class="box_header">
              <?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['starttime'];?>

            </div>
      </div>
       <div class="shopyuan">
            <div class="box_header">
              店铺地址
            </div>
            <div class="box_header">
              <?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['address'];?>

            </div>
      </div>
      <div class="shopyuan">
            <div class="box_header">
              店铺评价
            </div>
            <div class="box_header">
                <ul class="liststyle1">
            <?php echo smarty_function_load_data(array('assign'=>"comentlist",'table'=>"comment",'fileds'=>"*",'limit'=>"10",'orderby'=>" id desc",'where'=>"is_show=0"),$_smarty_tpl);?>
  
            <?php if (count($_smarty_tpl->tpl_vars['comentlist']->value['list'])>0){?>
              <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['mykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comentlist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['mykey']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
               <li class="touchend"  >
                  <div class="liwd50"><?php echo $_smarty_tpl->tpl_vars['items']->value['content'];?>
</div>
                  <div class="liwd50">
                        <div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</div>
                        <div> <i class="glyphicon glyphicon-star <?php if ($_smarty_tpl->tpl_vars['items']->value['point']>0){?>on<?php }else{ ?>off<?php }?>"></i>
                    <i class="glyphicon glyphicon-star <?php if ($_smarty_tpl->tpl_vars['items']->value['point']>1){?>on<?php }else{ ?>off<?php }?>"></i>
                    <i class="glyphicon glyphicon-star <?php if ($_smarty_tpl->tpl_vars['items']->value['point']>2){?>on<?php }else{ ?>off<?php }?>"></i>
                    <i class="glyphicon glyphicon-star <?php if ($_smarty_tpl->tpl_vars['items']->value['point']>3){?>on<?php }else{ ?>off<?php }?>"></i>
                    <i class="glyphicon glyphicon-star <?php if ($_smarty_tpl->tpl_vars['items']->value['point']>4){?>on<?php }else{ ?>off<?php }?>"></i></div>
                   </div> 
               </li>
             <?php } ?>
            <?php }else{ ?>
          <li class="touchend">
               <div>暂无评价</div>
          </li>
           <?php }?>
         
        </ul> 
            </div>
      </div>
       
   </div>
   
      <!--店铺-->
    
    </div>
</div>
<div class="mealList_foot" id="footer">
     <!--   <a href="#" onclick="delshopcart()" class="b">清空</a> -->
     <div>
       <a class="member_center" shop_id="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['id'];?>
"><i class="nav_icon-user"></i>个人中心</a>
       <a class="myorder" ><i class="nav_icon-menu"></i>我的订单</a>
       <a class='a' onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/shopcart/id/".((string)$_smarty_tpl->tpl_vars['id']->value)),$_smarty_tpl);?>
');"><i class="nav_icon-shopingcar"></i>购物车
        <span class="total_count" id="total_count">0</span>
       </a> 
     </div> 
     <div>
       <span><i class="nav_icon-shopingcar"></i><big id="total_count2"> 0 </big>
       <a href="#" onclick="delshopcart()" class="b">清空</a>
        </span>
       <span>共计: ￥ <big id="total_money">0</big>元</span>
       <span id="showlimit"></span>
       <span onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/shopcart/id/".((string)$_smarty_tpl->tpl_vars['id']->value)),$_smarty_tpl);?>
');">选好了</span>
    </div>    
</div>
 
  
  
</div>
 <script>
 	$(function(){  
 	   $('#loading').hide(); 
  });
  </script>
</body>
</html>
 <?php }} ?>