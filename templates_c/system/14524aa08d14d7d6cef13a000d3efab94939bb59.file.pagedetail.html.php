<?php /* Smarty version Smarty-3.1.10, created on 2015-06-30 11:30:36
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/pagedetail.html" */ ?>
<?php /*%%SmartyHeaderCode:12789571805582659fac7605-87555804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14524aa08d14d7d6cef13a000d3efab94939bb59' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/pagedetail.html',
      1 => 1434531487,
      2 => 'file',
    ),
    '172a78fbc96ceadf7e270433684a27900a1292ec' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/wxsite.html',
      1 => 1435553895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12789571805582659fac7605-87555804',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5582659fbd1039_73530406',
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
<?php if ($_valid && !is_callable('content_5582659fbd1039_73530406')) {function content_5582659fbd1039_73530406($_smarty_tpl) {?><!DOCTYPE html>
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
/public/wxsite/css/shop.css">

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
/public/wxsite/js/cart.js"></script> 
<script>
    function back_history() {
        history.back();
    }
    $(function() {
        
       var shopid = <?php echo $_smarty_tpl->tpl_vars['detail']->value['shopid'];?>
;
       var id = <?php echo $_smarty_tpl->tpl_vars['goods_id']->value;?>
;
       url = '<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/index.php?controller=wxsite&action=cart&shopid='+shopid+'&datatype=json&random=@random@';
        url = url.replace('@random@', 1+Math.round(Math.random()*1000));
        var bk = ajaxback(url,''); 
         var shoplimitcost = <?php echo $_smarty_tpl->tpl_vars['limitcost']->value;?>
;
     
        
           
        $(".cart_count").text(bk.content.sumcount);
        $(".go_to_pay").click(function(){
        })
      
       
        $('#header span').html("商品详情页");
   	 var shopid = <?php echo $_smarty_tpl->tpl_vars['detail']->value['shopid'];?>
;
     var checknext = false;
   
   	 $('.righ_l_b_btn_moren').click(function(){
                 addonedish(id,shopid,1,this);  
                  //  $(".righ_l_b_btn_hover").show();
                 //   $(".righ_l_b_btn_moren").hide();
   var flyElm = $('<div></div>');                      
     flyElm.css({
     'z-index': 9000,
      'position': 'absolute',
      'top': $(this).offset().top  +'px',
      'left': $(this).offset().left  +'px',
      'width': 40+'px',
      'height': 40 +'px',
      'border-radius':40+'px',
      'background':'#ff6000',
      'opacity':1
     })
    $('body').append(flyElm);
  flyElm.animate({
  	  opacity:0.3,
      top:$('.cart_count').offset().top*1.2,  
      left:$('.cart_count').offset().left,
      width:1+'px',
      height:1+'px',
    });
  
  setTimeout(function(){$(flyElm).remove();},1000);
        });
    $('.detail_list li').click(function(){
    	$(this).addClass('active').siblings().removeClass('active');
    	if($(this).index() == 0)
    	{
    		$('.detail_dish').fadeIn('slow');
    		$('.detail_info').fadeOut('fast');
    	}
    	if($(this).index() == 1){
    		$('.detail_info').fadeIn('slow');
    		$('.detail_dish').fadeOut('fast');
    	}
    });

 $(".right_l_btn_right").click(function(){
     addonedish(id,shopid,1,this);  
 })
 
  $(".right_l_btn_left").click(function(){
     removeonedish(id,shopid,1,this);  
     
     
 })
$("#gotopay").click(function(){
        url = '<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/index.php?controller=wxsite&action=cart&shopid='+shopid+'&datatype=json&random=@random@';
        url = url.replace('@random@', 1+Math.round(Math.random()*1000));
        var bk = ajaxback(url,''); 
        if (!bk.content.sum) {
            bk.content.sum = 0;
        }
         if(Number(bk.content.sum) < Number(shoplimitcost)){
                alert("还差"+(shoplimitcost-bk.content.sum)+"元满足起送价");
              }else{
                  
           window.location.href=  siteurl+'/index.php?controller=wxsite&action=shopcart&id='+shopid 
              }
      
     })
       });
 
  function initshop () {
        var shopid = <?php echo $_smarty_tpl->tpl_vars['detail']->value['shopid'];?>
;
        $(".cart_count").text("0");
        url = '<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/index.php?controller=wxsite&action=cart&shopid='+shopid+'&datatype=json&random=@random@';
        url = url.replace('@random@', 1+Math.round(Math.random()*1000));
        var bk = ajaxback(url,''); 
        $(".cart_count").text(bk.content.sumcount);
        $(".right_l_btn_nub").text(bk.content.sumcount);
        if (!bk.content.sumcount) {
            $(".righ_l_b_btn_hover").hide();
            $(".righ_l_b_btn_moren").show();
        }
       
         
  };
  function myyanchi(){
      
        checknext = false;
    };
    

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
	
	
	 
        <div class="detail"> 
         <dl>
	   <dt>
	   	 <img src="<?php echo $_smarty_tpl->tpl_vars['detail']->value['img'];?>
" alt="主菜"/>
	   </dt>
	   <dd>
	   	 <h3><?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
</h3>
	   	 <p style="display:none;"><span>供应日期:</span><span>4/5/5/2015-8/5/2015</span></p>
	   	 <p>
        
        <span>¥ <big> <?php echo $_smarty_tpl->tpl_vars['detail']->value['cost'];?>
</big> 元/份</span>
        <del class="prime_cost">
        <?php if ($_smarty_tpl->tpl_vars['detail']->value['prime_cost']!=='0.00'){?>
                原价<?php echo $_smarty_tpl->tpl_vars['detail']->value['prime_cost'];?>
   
        <?php }?>
        </del>
       <span class="itv_count">剩余<?php echo $_smarty_tpl->tpl_vars['detail']->value['count'];?>
份</span>
	   	 <button class="righ_l_b_btn_moren" data-id="<?php echo $_smarty_tpl->tpl_vars['goods_id']->value;?>
" data-shopid="<?php echo $_smarty_tpl->tpl_vars['detail']->value['shopid'];?>
"  data-price="<?php echo $_smarty_tpl->tpl_vars['detail']->value['cost'];?>
" typeid="<?php echo $_smarty_tpl->tpl_vars['detail']->value['typeid'];?>
">点餐</button>
	   	 <div class="righ_l_b_btn_hover" style="display:none;"><span class="right_l_btn_left"   data-id="<?php echo $_smarty_tpl->tpl_vars['detail']->value['id'];?>
" data-shopid="<?php echo $_smarty_tpl->tpl_vars['detail']->value['shopid'];?>
"></span><span class="right_l_btn_nub" id="gshu_<?php echo $_smarty_tpl->tpl_vars['detail']->value['id'];?>
">0</span><span class="right_l_btn_right" id="gid_<?php echo $_smarty_tpl->tpl_vars['detail']->value['id'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['detail']->value['cost'];?>
" typeid="<?php echo $_smarty_tpl->tpl_vars['detail']->value['typeid'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['detail']->value['id'];?>
" data-shopid="<?php echo $_smarty_tpl->tpl_vars['detail']->value['shopid'];?>
"></span></div>
	   	 </p>       
	   </dd>
	</dl>
	<ul class="detail_list">
		<li class="active">菜品</li>
		<li>商家</li>
	</ul>
	<div class="detail_dish"><?php echo $_smarty_tpl->tpl_vars['detail']->value["instro"];?>
</div>
	<div class="detail_info"><?php echo $_smarty_tpl->tpl_vars['detail']->value["intr_info"];?>
</div>
	<div class="detail_cart">
		<ul>
			<li id="gotopay"><i></i><span class="cart_count"></span></li>
                                      
			<li class="return" onclick='back_history();'><i></i></li>
		</ul>
	</div>           
    <!--     <?php echo print_r($_smarty_tpl->tpl_vars['detail']->value);?>
  -->
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