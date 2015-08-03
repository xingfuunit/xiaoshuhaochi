<?php /* Smarty version Smarty-3.1.10, created on 2015-06-29 15:06:26
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/site/index.html" */ ?>
<?php /*%%SmartyHeaderCode:523342182558225e931a3c3-18232162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f47ce5f54bc2ae7159e3ae51e9559e96a52e7e55' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/site/index.html',
      1 => 1435211869,
      2 => 'file',
    ),
    'deb5544bf2aa036a3feb877ac215d97370a69382' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/site.html',
      1 => 1435553916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '523342182558225e931a3c3-18232162',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558225e9865954_24971845',
  'variables' => 
  array (
    'tempdir' => 0,
    'sitename' => 0,
    'keywords' => 0,
    'description' => 0,
    'metadata' => 0,
    'siteurl' => 0,
    'member' => 0,
    'is_static' => 0,
    'controlname' => 0,
    'sitelogo' => 0,
    'footlink' => 0,
    'items' => 0,
    'sitebk' => 0,
    'mapname' => 0,
    'shopsearch' => 0,
    'toplink' => 0,
    'beian' => 0,
    'footerdata' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558225e9865954_24971845')) {function content_558225e9865954_24971845($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
?><!DOCTYPE html>
<html> 
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title><?php echo $_smarty_tpl->tpl_vars['mapname']->value;?>
-附近商家列表-<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<?php echo stripslashes($_smarty_tpl->tpl_vars['metadata']->value);?>

<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/favicon.ico" /> 
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/common.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/server.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/shouye.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/food_menu.css"> 
 


 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquerynew.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/allj.js" type="text/javascript" language="javascript"></script>
 <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/artDialog.js?skin=blue"></script> 
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/template.min.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.lazyload.min.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/regestercode.js"></script>
 <script>
     var regestercode=0;
 	$(function() { 
  $("img").lazyload({ 
  effect : "fadeIn" 
  }); 
 //Header二维码显示与隐藏  Begin
 $('.views_main_header ul > li:nth-of-type(5) span:nth-child(1)').on({
 	'mouseover':function(){
 	$('.views_main_header ul > li:nth-of-type(5) span:nth-child(3)').fadeIn();
 },
 'mouseout':function(){
 	$('.views_main_header ul > li:nth-of-type(5) span:nth-child(3)').fadeOut();
 }
});
 //Header二维码显示与隐藏  End  


//Header点击添加高亮  Begin
$('.views_main_header ul > li:nth-of-type(4) ol li:nth-of-type(1)').addClass('active');

 $('.views_main_header ul > li:nth-of-type(2) span').click(function(){
    $(this).parent().addClass('active');
    $(this).parent().siblings().children().children().removeClass('active');
 });

 $('.views_main_header ul > li:nth-of-type(4) ol li').click(function(){
    $(this).addClass('active').siblings().removeClass('active');
    $(this).parent().parent().siblings().removeClass('active');
    $('#cover').fadeOut();
    $('.views_main_login_sign_wrap').removeClass('views_main_login_sign_one_transition');
 });
//Header点击添加高亮  End

//用户登录后，显示当前用户的信息列表 Begin
 if($('.person_content').children('span').eq(0).text().length != 0){
    $('.person_content').on({  
    	'mouseover':function(){
    		$(this).children('span').eq(1).fadeIn();
        $('.person_name').text($(this).children('span').eq(0).text());
          $(this).children('span').eq(2).fadeIn('slow');
    	},
    	'mouseleave':function(){
    		$(this).children('span').eq(1).fadeOut();
        $(this).children('span').eq(2).fadeOut('fast');
    	}
    });
  }
//用户登录后，显示当前用户的信息列表 End

//用户未登录，显示登录注册也面 Begin
  else{
      var uid = <?php echo $_smarty_tpl->tpl_vars['member']->value['uid'];?>

      if (uid > 0) {
            $('.person_content').children('span').eq(0).text('个人中心');
            $(".person_content").on("click",function(){
         window.location.href=siteurl+'/index.php?controller=member&action=base';  
            })
      }else{
          
           $('.person_content').children('span').eq(0).text('登录 注册');
        $('.person_content').on( 
      'click',function(){
        $('.views_main_login_sign_wrap').addClass('views_main_login_sign_one_transition');
        $('.views_main_login_sign_one').show();
        $('.views_main_login_sign_two').hide();
        $('.views_main_login_sign_three').hide();
        $('#cover').fadeIn();
      }
    );
    
      }
    
  }
//用户未登录，显示登录注册也面 End

//用户未登录，登录注册页面切换 Begin
$('.views_main_header ul > li:nth-child(2) ol li:nth-child(1)').click(function() {
      var value=$("#mobile_check").val();
      var order_check=$("#order_check").val();
      if(value==1||order_check!=="no"){
         location.href= "http://shop.xiaoshuhaochi.com/member/index";
      }else{
        $('.views_main_login_sign_one').fadeIn();
      $('#cover').fadeIn();
      }
    });
    $('#sign_now,.sign_now').click(function() {
        $('.views_main_login_sign_two').fadeIn();
        $('.views_main_login_sign_one').fadeOut();
        $('.views_main_login_sign_three').fadeOut();
    });
    $("#fogot_password").click(function(){
      
         $('.views_main_login_sign_one').fadeOut();
         $(".views_main_login_sign_three").fadeIn();
    })
    $('#login_now').click(function() {
        $('.views_main_login_sign_one').fadeIn();
        $('.views_main_login_sign_two').fadeOut();
    });
    $('#fogetpass').click(function() {
        $('.views_main_login_sign_three').fadeIn();
        $('.views_main_login_sign_one').fadeOut();
    });
//用户未登录，登录注册页面切换 End


//点击❌退出当前页面  Begin
    $('.delete').click(function() {
        $('.views_main_detail').fadeOut();
        $('#cover').fadeOut();
        $('.views_main_login_sign_wrap').removeClass('views_main_login_sign_one_transition');
        $('.general_notice').fadeOut();
    });
//点击❌退出当前页面  End



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


}); 

//登录
 function login_btn () {
         var url = siteurl+'/index.php?controller=member&action=login';
         var uname = $("#login_cell").val();
         var pwd = $("#login_password").val();
         var info = {'uname':uname,'pwd':pwd,'logintype':'html5'}; 
         var  url = siteurl+'/index.php?controller=member&action=login&datatype=json&random=@random@' 
        $.ajax({ 
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
            dataType: "json", 
            data:info, 
            success:function(content) {  
            	$('#loading').toggle(); 
            	if(content.msg ==  false){
                        alert("登陆成功");
            		 window.location.href= siteurl+'/index.php?controller=site&action=index&shoid='+shopid;
            	}else{ 
            	   alert(content.msg);
                   $("#cover").hide();
              }
            	
            }, 
            error:function(){ 
            	$('#loading').toggle();

            } 
         });  
 }
  //注册
  function savepwd(){  

		   $('#loading').show();
      var info = {'tname':$('.mobile_email_reg').val(),'phone':$('.mobile_email_reg').val(),'pwd':$('.password_reg').val(),'pwd2':$('.repassword_reg').val(),'checklogin':'html5','phoneyan':$('.code').val(),'regestercode':'1'};
               
		  var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/member/saveregester/random/@random@/datatype/json"),$_smarty_tpl);?>
'; 
		  var backdata = ajaxback(url,info); 
		  if(backdata.flag == false){ 
		      window.location.href = siteurl+'/index.php?controller=site&action=member';
		  }else{
		  	$('#loading').hide();
		     alert(backdata.content);
		  }
		  
	}
        //忘记密码
        function changepwd(){  
            
	
         var phone = $("#mobile_email").val();
         var code = $("#code").val();
         var newpwd = $("#password").val();
         var newpwd2 = $("#repassword").val();
         var info = {'phone':phone,'code':code,'newpwd':newpwd,'newpwd2':newpwd2}
  	 	  var  url = siteurl+'/index.php?controller=member&action=saveuser&controlname=repwd&datatype=json&random=@random@' 
  	 	   $.ajax({ 
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
            dataType: "json", 
            data:info, 
            success:function(content) {  
            alert("修改成功");
             window.location.href= siteurl+'/index.php?controller=site&action=index';
            	if(content.msg ==  false){
            		 window.location.href= siteurl+'/index.php?controller=wxsite&action=member&shoid='+shopid;
            	}else{ 
            	   alert(content.msg);
                  // $("#loading").hide();
              }
            	
            }, 
            error:function(){ 
            	//$('#loading').toggle();

            } 
         });
		  
	}
</script>

 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.cookie.js" type="text/javascript" language="javascript"></script> 
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/cart.js" type="text/javascript" language="javascript"></script>
 <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/slides.jquery.js"> </script>
 <script>
     
     var shopid = "<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['id'];?>
"; 
     
     function cartInOut(){
        $('.new_cart_logo').addClass('new_cart_logo_active');//购物车图标弹出
     	//2s后购物车详情弹出  Begin
     	setTimeout(function(){
     		$('.new_cart_up').addClass('new_cart_transition');
     	},700);
     	setTimeout(function(){
     		$('.new_cart_logo  ul li:last-of-type i').addClass('active');
     	},1500);
     	//2s后购物车详情弹出  End
     }; 
     function cartIn(){
     	$('.new_cart').addClass('new_cart_logo_active');
     };
     function cartOut(){
     	$('.new_cart').removeClass('new_cart_logo_active');
     };

	$(function(){
$('.new_cart_pic').on(
	'mouseover',function(){
		cartIn();
});
$('.new_cart').on('mouseleave',function(){
	cartOut();
});
//鼠标放在购物车图标上时，购物车弹出或弹入 End

//点击商品图片弹出商品详情页  Begin
$('.MILPic').click(function() {
	$('.views_main_detail').fadeIn();
	$('#cover').fadeIn();
});
//点击商品图片弹出商品详情页  End

//鼠标移过商品图片时，显现下阴影效果 Begin
     $('.MealsTitle ul li').click(function(){
     	$(this).addClass('active').siblings().removeClass('active');
     });
//鼠标移过商品图片时，显现下阴影效果 End

		//$('.left_cat_cls').('title','删除');
			$('#bannerBox').slides({
				preload: true,
				preloadImage: '/upload/images/shop/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				generatePagination:true,
				paginationClass:'mypagination'
			});
		});
                var locationfalse = false;
                function  synchro_cart() {
                    
                }
                
                function getdetail (goodsid) {    
                var submitData={
                goodsid:goodsid
                 }
              var url= siteurl+'/index.php?controller=site&action=goodsDetail';
                $.post(url,submitData,function(data){
                    if (data) {
                          var detail = data.msg;
                         $(".detail_supplier").html(detail.shopname);
                         $("#detail_supplier_address").html(detail.address);
		         $("#detail_good_desc").html(detail.img);
                         $("#detail_price").html(detail.cost);
                    //     $("#detail_img1").attr("src", );
                    }
                    
                },"json")
                }
</script>


 <script> 
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
	var controllername= '<?php echo $_smarty_tpl->tpl_vars['controlname']->value;?>
';
</script>

<!--[if lte IE 6]>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, input , a'); 
    </script>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/ie6.js" type="text/javascript"></script>
<![endif]--> 
</head> 
<body> 
<div id="toTop" style="left: 1212.5px; display: none;"></div>



<!--
<div class="top">
	 <div class="top_a">
	 	  <div class="top_a_show">
	 	  	<div class="top_a_show_l">
	 	  		  <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/index"),$_smarty_tpl);?>
" class=""><span class="topmcbck"></span> <div style="padding-left:25px;">欢迎光临<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</div></a>
	 	  	</div>
	 	  	<div class="top_a_show_r">
	 	  		<?php if (empty($_smarty_tpl->tpl_vars['member']->value['uid'])){?>
	 	  		 <div class="top_a_show_span"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/regester"),$_smarty_tpl);?>
">注册</a></div>
	 	  		 <div class="top_a_show_span">|</div>
	 	  		 <div class="top_a_show_span"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/login"),$_smarty_tpl);?>
">登陆</a></div>
	 	  		 <div class="top_a_show_span">|</div>
	 	  		 	 <a href="#">  <div class="sina"></div> </a>
	 	  		 <a href="#">  <div class="qq"></div> </a>
	 	  		 <?php }else{ ?>
	 	  		  <div class="top_a_show_span"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/loginout"),$_smarty_tpl);?>
">退出登陆</a></div>
	 	  		 <div class="top_a_show_span">|</div>
	 	  		  <div class="top_a_show_span"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/order/usersorder"),$_smarty_tpl);?>
">个人中心</a></div>
	 	  		 <div class="top_a_show_span">|</div>
	 	  		  <div class="top_a_show_span"><?php echo $_smarty_tpl->tpl_vars['member']->value['username'];?>
</div> 
	 	  		 <?php }?>
	 	  	
	 	  		
	 	  		 
	 	  		 
	 	  	</div>
	 	  </div>
  </div>
	 <div class="top1">
	 	 <div class="top1_show">
	 	 	
	 	  <div class="top1_logo"><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['sitelogo']->value;?>
"></a></div>
	 	  <div class="top1_menu">
	 	     <ul>
	 	     	<?php if (!empty($_smarty_tpl->tpl_vars['footlink']->value)){?>
	 	     	<?php $_smarty_tpl->tpl_vars['footlink'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['footlink']->value), null, 0);?>
	 	     		<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['footlink']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?> 
			          <li class="active_li" data="<?php echo $_smarty_tpl->tpl_vars['items']->value['typeurl'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['typeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['typename'];?>
</a> </li>
			      <?php } ?>
	 	     <?php }?>
	 	     	</ul>	
	 	  	
	 	  </div>
	 	   
	 	   
	 	   
	 	 </div>
	 </div>
</div> 
  -->
<div class="mmbg" <?php if (!empty($_smarty_tpl->tpl_vars['sitebk']->value)){?>style="background:url(<?php echo $_smarty_tpl->tpl_vars['sitebk']->value;?>
) repeat;"<?php }?>></div> 

  <div class="top2">
	  	 <div class="top2_content">
	  	 	  <div class="hc_addr">
					 <!--  <div class="hc_addr_change"><span class="hc_change"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/guide"),$_smarty_tpl);?>
">[更改地址]</a> </span><span class="hc_address">地址：<a style="color:#000;" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['mapname']->value)===null||$tmp==='' ? '' : $tmp);?>
</a></span></div>-->
				  </div>
				  <div class="hc_search">
					<div class="hc_search_left"></div>
					<div class="hc_search_midd"><input id="search_input" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shopsearch']->value)===null||$tmp==='' ? '搜索餐厅、美食' : $tmp);?>
" text="搜索餐厅、美食" onfocus="cls(this)" onblur="res(this)"   onkeyprese="pre(this)" type="text6" onkeydown="if(event.keyCode==13)search();" style="padding:0;padding-left:30px;;margin-bottom:0;margin-top:1px;width: 280px;height: 47px;line-height:47px; outline:none;border:0;"  ></div>
					<div class="hc_searching"></div>
					<div class="clear"></div>
					<script type="text/javascript">
						$('.hc_searching').click(function(){
							search();
						})
						
						function search()
						{
							var name = $('#search_input').val();
							if(name != '' && name != $('#search_input').attr('text')) 
							{
								var url = siteurl+'/index.php?controller=site&action=index&shopsearch='+name; 
								location.href=url;
							}
						}
						function cls(obj)
						{
							if($(obj).attr('text') == $(obj).val())
							{
								$(obj).val('');
								$('#search_input').css('color','#000');
							}  
						}
						function res(obj)
						{
							if($(obj).val() == '')
							{
								$('#search_input').css('color','#666');
								$(obj).val($(obj).attr('text'));
							}
						}
						$(document).ready(function(){
							$('#search_input').css('color','#666');
						});
					</script>
				</div>
				  
	  	 	</div>
	 </div>


 						 <!-- 头部 End -->
<div class="views_main_header">
    <ul>
      <li class="waimairenPic-logo" onclick="location.href='/main/index'"></li>
      <li class="person_content">
         <span></span>
         <span class="waimairenPic-deteile_rihjt"></span>
         <span class="person_info">
          <ol style="display:none;">
            <li class="person_name"><span></span></li>
            <li>基本信息</li>
            <li>配送地址</li>
            <li>密码管理</li>
            <li>我的订单</li>
            <li>优惠券</li>
            <li>我的账户</li>
            <li>积分</li>
            <li>退出</li>
          </ol>
      </span>
      </li>
      
      <li>
        <ol>
          <li><span class="mainPic-chose"></span>选择用餐时间与品类</li>
          <li id='this_week' class="this_week"><span></span><span>本周 </span><span> <<?php ?>?php echo $weeks_contorl[0][0]."-".$weeks_contorl[0][1];?<?php ?>></span></li>
          <li id='next_week' class="next_week"><span></span><span>下周 </span><span> <<?php ?>?php echo $weeks_contorl[1][0]."-".$weeks_contorl[1][1];?<?php ?>></span></li>
          <li><span class="mainPic-rice" title="午餐"></span><span class="mainPic-drink" title="饮品"></span><span class="mainPic-fruit" title="水果"></span><span class="mainPic-bun" title="甜点"></span></li>
        </ol>
      </li>
      <li>
        <ol>
          <li><span class="waimairenPic-order_icon"></span>点餐</li>
          <li><span class="waimairenPic-seat_icon"></span>订餐位</li>
          <li><span class="waimairenPic-dinner_icon"></span>约饭</li>
          <li><span class="waimairenPic-about_icon"></span>关于</li>
        </ol>
      </li>
      <li><span class="waimairenPic-weiChat"></span><span class="waimairenPic-weiBo"></span><span class="waimairenPic-code"></span></li>
     </ul>
 </div>
 <!-- 遮罩 Begin -->
  <!-- <div id="cover"></div>-->
 <!-- 遮罩 End -->
 <!-- 注册登录 Begin -->
<div class="views_main_login_sign_wrap">
 <div class="views_main_login_sign_one">
   <span class="delete">
      
   </span>
   <div class="views_main_login">
    <h3>登录</h3>
    <!--<form method="post" enctype="multipart/form-data" action=http://dev.xiaoshuhaochi.com/main/user_login>-->
     <ul>
       <li><input id="login_cell" type="text" placeholder="手机号码"/></li>
       <li><input id="login_password" type="password" placeholder="密码"/></li>
       <li>
         <label>
           <input id="remember_password" type="checkbox" checked="checked" /> 记住密码
         </label>
         <a id="fogot_password">忘记密码 ？</a>
       </li>
       <li><button id="login_btn" onclick="login_btn();">立即登录</button></li>
       <!--<li>你也可以通过以下方式登录</li>
       <li><span></span><span></span></li>-->
     </ul>
   <!--  </form>-->
   </div>
   <div class="views_main_sign">
     <h3 id="reg">注册</h3>
     <p id="show_login_btn">我已有<a>小树好吃</a>账号</p>
     <p>登录后，享受会员专属待遇</p>
     <button id="sign_now" >立即注册</button>
   </div>
 </div>

 <div class="views_main_login_sign_two">
   <span class="delete">
      
   </span>
   
   <div class="views_main_login">
    <h3>注册</h3>

     <ul>
       <li><input type="text" id="phone" class="mobile_email_reg" placeholder="手机号码"/></li>
       <li>
          <input type="text" class="code" placeholder="验证码" />
          <input type="button" id="send_code" class="cursor_pointer send_code" onclick="clickyanzheng(regestercode=0);" value="发送验证码"/>
           <span class="cursor_pointer send_div" style="display:none;"></span>
       </li>
       <li><input type="password" class="password_reg"  placeholder="密码"/></li>
       <li><input type="password" class="repassword_reg" placeholder="重复密码"/></li>
       <li>
         <input type="checkbox" checked>
         我已阅读并同意<a href="javascript:;">用户协议</a>
       </li>
       <li><button class="userRister" onclick="savepwd();">立即注册</button></li>
     </ul>

   </div>
   <div class="views_main_sign">
     <h3>登录</h3>
     <p>我已有<a>小树好吃</a>账号</p>
     <p>登录后，享受会员专属待遇</p>
     <ul>
         <li><button id="login_now">立即登录</button></li>
       <!--<li>你也可以通过以下方式登录</li>
       <li><span></span><span></span></li>-->
     </ul>
   </div>
 </div>

 <div class="views_main_login_sign_three">
   <span class="delete">
      
   </span>
   <div class="views_main_login">
    <h3>忘记密码</h3>
     <ul>
         <li><input type="text" id="phone" placeholder="手机号码"/></li>
       <li>
          <input type="text" id="code" placeholder="验证码">

          <input type="button" id="send_code" class="send_sms" onclick="clickyanzheng(regestercode=3);" value="发送验证码"/>
          <span id="send_div" class="cursor_pointer" style="display:none;"></span>
       </li>
       <li><input type="password" id="password" placeholder="密码"/></li>
       <li><input type="password" id="repassword" placeholder="重复密码"/></li>
       <li><button id="changpass" onclick="changepwd();">确认修改</button></li>
     </ul>
   </div>
   <div class="views_main_sign">
     <h3>注册</h3>
     <p>我已有<a>小树好吃</a>账号</p>
     <p>登录后，享受会员专属待遇</p>
     <button class="sign_now">立即注册</button>
   </div>
 </div>
 </div>

 <!-- 注册登录 End -->
                                          <!-- 头部 End -->
 
<div id="content">
	<div class="hc_content">   
		
  <div class="hc_advertising">
     <div id="bannerBox">
					 <div  class="slides_container" style="height:175px;">
					 	 <?php echo smarty_function_load_data(array('assign'=>"lunbo",'table'=>"adv",'fileds'=>"*",'limit'=>"5",'where'=>"advtype='lunbo' and module='".((string)$_smarty_tpl->tpl_vars['sitetemp']->value)."'"),$_smarty_tpl);?>
  
							<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lunbo']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
			        	   <a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['linkurl'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['items']->value['img'];?>
" width="1100" height="175"></a> 
				      <?php } ?> 
				    </div>
       
					 
		 </div> 
	</div>
            <!--小树好吃-->
<div class="MealsTitle">
	<ul>
		<li class="active">全部<i></i></li>
		<li>饮品<i></i></li>
		<li>水果沙拉<i></i></li>
		<li>甜点<i></i></li>
		<li>午餐</li>
	</ul>
	<div class="clear"></div>
</div>
<div class="MealsImgList" >
<ul>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['index_goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
  
	<?php if (!empty($_smarty_tpl->tpl_vars['value']->value['img'])){?> 
    <li>
        <div class="MILPic" onclick="getdetail(<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
);"><img src="<?php echo $_smarty_tpl->tpl_vars['value']->value['img'];?>
"></div>
<div class="MIL_wrap">
        <div class="MIL1">
            <div class="MIL1Left" id="goodsname_<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</div>
            <div class="MIL1Right"><big class="prime_big"><?php echo $_smarty_tpl->tpl_vars['value']->value['cost'];?>
 </big>元
            <del class="prime_cost"><?php if ($_smarty_tpl->tpl_vars['value']->value['prime_cost']!=='0.00'){?>
                原价
                <?php echo $_smarty_tpl->tpl_vars['value']->value['prime_cost'];?>
   
               <?php }?></del>
               <span class="prime_count">
               剩余
                <?php echo $_smarty_tpl->tpl_vars['value']->value['count'];?>

                份</span>
            </div>
             <div class="MIL3Right">
	<?php if ($_smarty_tpl->tpl_vars['value']->value['count']<1){?>
	<!--	<div class="DishesOrderout"> -->
			<a class="AddOrders"  href="javascript:;">售完</a>
	<!--	</div>  -->
		<?php }else{ ?>
 <!--    <div class="DishesOrder">   -->
	<a  class="AddOrder" onclick="addonedish(<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['value']->value['shopid'];?>
,1,this);"  href="javascript:void(0);"><span>+</span>点餐</a>
<!--  </div>  -->
	<?php }?>
                                            </div>
        </div>
<div class="MIL2">
        <div class="MIL2Left"> 
            <span class="Star_g tips" original-title="<?php echo $_smarty_tpl->tpl_vars['value']->value['point'];?>
分">
                        	<?php if ($_smarty_tpl->tpl_vars['value']->value['point']!=0){?> 
                        	<?php $_smarty_tpl->tpl_vars['long'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value['point']*20, null, 0);?>
                        	<?php }else{ ?> 
                        	<?php $_smarty_tpl->tpl_vars['long'] = new Smarty_variable("100", null, 0);?>
                        	<?php }?> 
                            <span class="Star_y" style="width:<?php echo $_smarty_tpl->tpl_vars['long']->value;?>
%;"></span>
            </span>
            <a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['value']->value['point'];?>
点评</a>
        </div>
        <div class="MIL2Right">售<?php echo $_smarty_tpl->tpl_vars['value']->value['sellcount'];?>
份</div>
</div>
            <div class="MIL3">
                <div class="MIL3Left">
                    <div class="DishesStatus">
                           <?php $_smarty_tpl->tpl_vars['goodssignlist'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['value']->value['signid']), null, 0);?>  
                    </div>
                </div>

                                        </div>
                                     </div>
                                    </li>
                                    <?php }?>
                
                
                                    
                                    <?php } ?>  
                                    <div style="clear:both;"></div>
                                   
                                </ul>
                            </div>
  
            <!--小树好吃-->


 <div class="new_shoplist">
     <div class="new_list_l">店铺筛选</div>
    <div class="new_list_m">
       	<ul>
			<li>
				<div id="all" class="hc_changes_menu_div_active hc_changes_menu_div_active_hover">

					<span class="hc_changes_menu_div_active_span">全部</span>
				</div>
			</li> 
		    <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attrinfo']->value[0]['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?> 
	       <li>
		       <div class="menu-xuanze-img hc_changes_menu_div_active" style_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
			       <span class="hc_changes_menu_div_active_span"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</span>
		       </div>
	       </li>
	       <?php } ?>		 
	    </ul>
		 <div class="clear"></div>
    </div>
    <div class="new_list_r">
		 <div id="qisongjia" qisongjia_val="4" class="hc_shop_frist">起送价</div>
			<div class="hc_shop_scale">
					<div class="hc_shop_scale_span" style="margin-left:0px;">
					<div qisongjia_val="4" class="qisongjia_click hc_shop_scale_price hc_shop_scale_img_margin hc_shop_scale_price_hover">全</div>
					<div qisongjia_val="10" class="qisongjia_click hc_shop_scale_price hc_shop_scale_img_margin">10</div>
					<div qisongjia_val="20" class="qisongjia_click hc_shop_scale_price hc_shop_scale_img_margin">20</div>
					<div qisongjia_val="30" class="qisongjia_click hc_shop_scale_price">30</div>
					<div class="clear"></div>
				</div>
				<div class="hc_shop_scale_up">
					<div qisongjia_val="4" class="qisongjia_click hc_shop_scale_img hc_shop_scale_img_margin hc_shop_scale_images"></div>
					<div qisongjia_val="10" class="qisongjia_click hc_shop_scale_img hc_shop_scale_img_margin"></div>
					<div qisongjia_val="20" class="qisongjia_click hc_shop_scale_img hc_shop_scale_img_margin"></div>
					<div qisongjia_val="30" class="qisongjia_click hc_shop_scale_img"></div>
					<div class="clear"></div>
				</div>
			</div>
	</div>
	<div class="clear"></div>
 </div>
 
 <div class="hc_shop_list">
			<div class="hc_shop_list_div">
				<ul id="shopList">
					
						<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shoplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>  
						 
						   <?php if ($_smarty_tpl->tpl_vars['items']->value['opentype']==2){?>      
						 
					 <li  qisongjia="<?php echo $_smarty_tpl->tpl_vars['items']->value['limitcost'];?>
" fengwei_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['servertype'];?>
" isyingye="<?php echo $_smarty_tpl->tpl_vars['items']->value['is_open'];?>
" id="menu-list-box_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" shop_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" class="menu-list-box hc_collection_div_border_right_bottom">
						<div class="hc_shop_list_box">
							<div class="hc_shop_list_box_left">
                            
                  <!--  <?php if ($_smarty_tpl->tpl_vars['items']->value['opentype']==2||$_smarty_tpl->tpl_vars['items']->value['opentype']==3){?>   -->       
                            
                            <a href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp1),$_smarty_tpl);?>
"><div style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/zaixiandingdan.png);"></div></a>
                 <!--     <?php }else{ ?> 
                     
                     
                            <a href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp2=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp2),$_smarty_tpl);?>
"><div style="position: absolute; background-image: url(<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/order_masker_closed.png); height: 83px; width: 99px; z-index:999; right:7px;top:7px;"></div></a>
                            
                  <?php }?>  -->
                            
                            
								<div class="hc_shop_list_box_img">
								  <div class="hc_shop_list_box_img_div" shop_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" >
									   <a target="_blank" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp3=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp3),$_smarty_tpl);?>
"><img atl="<?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
" src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shoplogo'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['shoplogo']->value : $tmp);?>
"></a>
								  </div>
								</div>
								<a target="_blank" class="a1" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp4=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp4),$_smarty_tpl);?>
"><!--<div class="hc_shop_list_box_span">
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
 $_from = $_smarty_tpl->tpl_vars['items']->value['attrdet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
									             <?php if ($_smarty_tpl->tpl_vars['itcc']->value['parent_id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']){?>
									                 <?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>

									             <?php }?>
									          <?php } ?>
									     <?php } ?>
									  <?php }?>     
									<?php } ?> 
                                    
									</div>--></a>
							</div>
                            
                            <div class="hc_shop_list_box_right">
								<div class="hc_list_box_head" >
								    <a target="_blank" class="hc_list_box_head_a_hover" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp5=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp5),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
</a>
								</div>
                                
                                <div class="hc_list_box_add" >
								    <a target="_blank" class="hc_list_box_head_a_hover" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp6=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp6),$_smarty_tpl);?>
">
									
									
									<?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['limitcost'])===null||$tmp==='' ? 0 : $tmp);?>
元起送
									
									<?php if ($_smarty_tpl->tpl_vars['items']->value['pscost']==0){?>
										免配送费
									<?php }else{ ?>
										<?php echo $_smarty_tpl->tpl_vars['items']->value['pscost'];?>
元配送费
									<?php }?>
									</a>
								</div>
								
								 <div class="hc_list_box_add" >
								    <a target="_blank" class="hc_list_box_head_a_hover" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp7=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp7),$_smarty_tpl);?>
">
									
									<div class="hc_action">
              	<?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
?>
									  <?php if ($_smarty_tpl->tpl_vars['itat']->value['type']=='img'){?> 
									          <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['attrdet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
									             <?php if ($_smarty_tpl->tpl_vars['itat']->value['id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']){?> 
									                 <img alt="<?php echo $_smarty_tpl->tpl_vars['itat']->value['name'];?>
" class="hc_action_img" src="<?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['itat']->value['instro'];?>
">  
									             <?php }?>
									          <?php } ?> 
									  <?php }?>     
									<?php } ?>
              </div> 
									</a>
								</div>
								
								<!--<a target="_blank" class="a1" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp8=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp8),$_smarty_tpl);?>
"> 
							  <div class="hc_xinxin">
								  <div class="hc_xinxin_div"> 
									   <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['items']->value['point']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?> 
                  	 <div class="hc_xinxin_div_float"><img alt="star" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/xinxin01.png"></div>
                     <?php endfor; endif; ?> 
                     <div class="clear"></div>
								  </div>
								<div class="hc_comment"> 
									<div class="hc_xinxin_div_float"><img alt="评论" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/comment.png"></div>
									<div class="hc_xinxin_div_float"><span style="margin-left:3px;"><?php echo $_smarty_tpl->tpl_vars['items']->value['pointcount'];?>
</span></div> 
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							
							
              <div class="hc_action">
              	<?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
?>
									  <?php if ($_smarty_tpl->tpl_vars['itat']->value['type']=='img'){?> 
									          <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['attrdet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
									             <?php if ($_smarty_tpl->tpl_vars['itat']->value['id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']){?> 
									                 <img alt="<?php echo $_smarty_tpl->tpl_vars['itat']->value['name'];?>
" class="hc_action_img" src="<?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['itat']->value['instro'];?>
">  
									             <?php }?>
									          <?php } ?> 
									  <?php }?>     
									<?php } ?>
              </div> 
               
              <div class="hc_order"> 
              <?php if ($_smarty_tpl->tpl_vars['items']->value['opentype']==1){?>
                    <span class="gray_font" title="店铺已过营业时间，打烊中">已打烊</span>
              <?php }elseif($_smarty_tpl->tpl_vars['items']->value['opentype']==2){?>
               <span class="hc_order_box" title="接受预定中。">营业中</span>
                <span class="">
              	<?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_smarty_tpl->tpl_vars['mykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
 $_smarty_tpl->tpl_vars['mykey']->value = $_smarty_tpl->tpl_vars['itat']->key;
?>
              
									   <?php if ($_smarty_tpl->tpl_vars['itat']->value['type']=='checkbox'){?>
									   <?php $_smarty_tpl->tpl_vars['ckey'] = new Smarty_variable("0", null, 0);?>   
									          <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_smarty_tpl->tpl_vars['ckey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value['attrdet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
 $_smarty_tpl->tpl_vars['ckey']->value = $_smarty_tpl->tpl_vars['itaa']->key;
?>
									             <?php if ($_smarty_tpl->tpl_vars['itat']->value['id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']&&$_smarty_tpl->tpl_vars['ckey']->value<1){?> 
									                 <?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>

									             <?php }?>
									          <?php } ?> 
									    <?php }?>     
									<?php } ?>
						     </span>
              <?php }elseif($_smarty_tpl->tpl_vars['items']->value['opentype']==3){?>
                        <span class="hc_order_box" title="接受预定中。">接受预定</span>
              	         <span class="hc_order_span"><?php echo $_smarty_tpl->tpl_vars['items']->value['newstartime'];?>
开送</span>
              <?php }elseif($_smarty_tpl->tpl_vars['items']->value['opentype']==4){?>
                 <span class="gray_font" title="店铺已过营业时间，打烊中">停止营业</span>
              <?php }else{ ?>
                   <span class="gray_font" title="店铺已过营业时间，打烊中">已打烊</span>
              <?php }?> 
              
              	 
              </div>					 </a>-->
							<div class="fav_font_div" style="display: none;"> </div>
					
					</div>
                            
				  <div class="clear"></div>
				 
				  </div>
		  </li> 
				 <?php }?>
				 
			  
					<div class="shopview_div" id="shopview_div_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" style="display: none;">
                 		<div class="loading"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/loading43.gif" width="38" height="38"></div>
          	</div> 
        
           
          	<?php } ?>
          
					<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shoplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>  
				 
				  <?php if ($_smarty_tpl->tpl_vars['items']->value['opentype']==3){?>      
						 
					 <li  qisongjia="<?php echo $_smarty_tpl->tpl_vars['items']->value['limitcost'];?>
" fengwei_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['servertype'];?>
" isyingye="<?php echo $_smarty_tpl->tpl_vars['items']->value['is_open'];?>
" id="menu-list-box_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" shop_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" class="menu-list-box hc_collection_div_border_right_bottom">
						<div class="hc_shop_list_box">
							
							
							
							<div class="hc_shop_list_box_left">
                            
                            
                            
                            <a href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp9=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp9),$_smarty_tpl);?>
"><div style="position: absolute; background-image: url(<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/zaixianyuding.png); height: 83px; width: 99px; z-index:999; right:7px;top:7px;"></div></a>
                  
                            
                            
								<div class="hc_shop_list_box_img">
								  <div class="hc_shop_list_box_img_div" shop_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" >
									   <a target="_blank" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp10=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp10),$_smarty_tpl);?>
"><img style="margin-right:6px;" width="205" height="159" atl="<?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
" src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shoplogo'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['shoplogo']->value : $tmp);?>
"></a>
								  </div>
								</div>
								<a target="_blank" class="a1" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp11=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp11),$_smarty_tpl);?>
"></a>
							</div>
                            
                            <div class="hc_shop_list_box_right">
								<div class="hc_list_box_head" >
								    <a target="_blank" class="hc_list_box_head_a_hover" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp12=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp12),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
<?php echo $_smarty_tpl->tpl_vars['items']->value['opentype'];?>
</a>
								</div>
                                
                                <div class="hc_list_box_add" >
								    <a target="_blank" class="hc_list_box_head_a_hover" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp13=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp13),$_smarty_tpl);?>
">
									
									
									<?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['limitcost'])===null||$tmp==='' ? 0 : $tmp);?>
元起送
									
									<?php if ($_smarty_tpl->tpl_vars['items']->value['pscost']==0){?>
										免配送费
									<?php }else{ ?>
										<?php echo $_smarty_tpl->tpl_vars['items']->value['pscost'];?>
元配送费
									<?php }?>
									</a>
								</div>
								
								 <div class="hc_list_box_add" >
								    <a target="_blank" class="hc_list_box_head_a_hover" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp14=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp14),$_smarty_tpl);?>
">
									
									<div class="hc_action">
              	<?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
?>
									  <?php if ($_smarty_tpl->tpl_vars['itat']->value['type']=='img'){?> 
									          <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['attrdet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
									             <?php if ($_smarty_tpl->tpl_vars['itat']->value['id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']){?> 
									                 <img width="20" height="20" alt="<?php echo $_smarty_tpl->tpl_vars['itat']->value['name'];?>
" class="hc_action_img" src="<?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['itat']->value['instro'];?>
">  
									             <?php }?>
									          <?php } ?> 
									  <?php }?>     
									<?php } ?>
              </div> 
									
									
									</a>
								</div>
							
							<div class="fav_font_div" style="display: none;"> </div>
					
					</div>
                            
				  <div class="clear"></div>
				 
				  </div>
		  </li> 
				 <?php }?>
				 
				 
				
				 <?php } ?>

						<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shoplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>  
				 
				  <?php if ($_smarty_tpl->tpl_vars['items']->value['opentype']!=2&&$_smarty_tpl->tpl_vars['items']->value['opentype']!=3){?>      
						 
					 <li  qisongjia="<?php echo $_smarty_tpl->tpl_vars['items']->value['limitcost'];?>
" fengwei_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['servertype'];?>
" isyingye="<?php echo $_smarty_tpl->tpl_vars['items']->value['is_open'];?>
" id="menu-list-box_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" shop_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" class="menu-list-box hc_collection_div_border_right_bottom">
						<div class="hc_shop_list_box">
							
							
							
							<div class="hc_shop_list_box_left">
                            
                            <a href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp15=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp15),$_smarty_tpl);?>
"><div style="position: absolute; background-image: url(<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/order_masker_closed.png); height: 83px; width: 99px; z-index:999; right:7px;top:7px;"></div></a>
               
                            
								<div class="hc_shop_list_box_img">
								  <div class="hc_shop_list_box_img_div" shop_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" >
									   <a target="_blank" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp16=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp16),$_smarty_tpl);?>
"><img style="margin-right:6px;" width="205" height="159" atl="<?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
" src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shoplogo'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['shoplogo']->value : $tmp);?>
"></a>
								  </div>
								</div>
								<a target="_blank" class="a1" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp17=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp17),$_smarty_tpl);?>
"></a>
							</div>
                            
                            <div class="hc_shop_list_box_right">
								<div class="hc_list_box_head" >
								    <a target="_blank" class="hc_list_box_head_a_hover" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp18=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp18),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
<?php echo $_smarty_tpl->tpl_vars['items']->value['opentype'];?>
</a>
								</div>
                                
                                <div class="hc_list_box_add" >
								    <a target="_blank" class="hc_list_box_head_a_hover" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp19=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp19),$_smarty_tpl);?>
">
									
									
									<?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['limitcost'])===null||$tmp==='' ? 0 : $tmp);?>
元起送
									
									<?php if ($_smarty_tpl->tpl_vars['items']->value['pscost']==0){?>
										免配送费
									<?php }else{ ?>
										<?php echo $_smarty_tpl->tpl_vars['items']->value['pscost'];?>
元配送费
									<?php }?>
									</a>
								</div>
								
								 <div class="hc_list_box_add" >
								    <a target="_blank" class="hc_list_box_head_a_hover" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp20=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp20),$_smarty_tpl);?>
">
									
									<div class="hc_action">
              	<?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
?>
									  <?php if ($_smarty_tpl->tpl_vars['itat']->value['type']=='img'){?> 
									          <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['attrdet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
									             <?php if ($_smarty_tpl->tpl_vars['itat']->value['id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']){?> 
									                 <img width="20" height="20" alt="<?php echo $_smarty_tpl->tpl_vars['itat']->value['name'];?>
" class="hc_action_img" src="<?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['itat']->value['instro'];?>
">  
									             <?php }?>
									          <?php } ?> 
									  <?php }?>     
									<?php } ?>
              </div> 
									
									
									</a>
								</div>
							
							<div class="fav_font_div" style="display: none;"> </div>
					
					</div>
                            
				  <div class="clear"></div>
				 
				  </div>
		  </li> 
				 <?php }?>
				 
				 
				
				 <?php } ?>
				<div class="clear"></div> 
				 </ul>
 
			</div>
</div>

<div class="new_cart" id="newcart"></div>
<div class="new_cart_pic">
     <span class="cart_sum">0</span>
</div>
       
              
<div class="hc_app">
	<ul>
		
	 <?php echo smarty_function_load_data(array('assign'=>"advlist",'table'=>"adv",'fileds'=>"*",'where'=>"advtype='other1' and module='".((string)$_smarty_tpl->tpl_vars['sitetemp']->value)."'",'limit'=>"5"),$_smarty_tpl);?>
  
	 <?php if (count($_smarty_tpl->tpl_vars['advlist']->value['list'])>0){?>
	   <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['advlist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
		  <li style="height:330px;width:220px">
		     <a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['linkurl'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['items']->value['img'];?>
" width="220px" height="330px"></a>
	    </li>
	  <?php } ?>
		<?php }?>
		
		
	</ul>
	<div class="clear"></div>
</div>

<div id="hc_shop_list2" class="hc_shop_list" style="display:none;">
			<div class="hc_shop_head">
				<div class="hc_shop_head_left">
					<div class="hc_shop_h">更多店铺</div>
					<div class="clear"></div>
				</div>
				<div class="hc_shop_head_right"></div>
				<div class="clear"></div>
				<div class="hc_changes_menu_div">
				</div>
			</div>

			<div class="hc_shop_list_div">
				<ul id="shopList2">
					 
				</ul>
			</div>

</div> 
	
                                        <!-- 详情 Begin 
   <div class="views_main_detail">
     <span class="delete"><img src="<<?php ?>?=$static_url?<?php ?>>/icon/delete.png" alt="" /></span>
     <dl>
        <dt>
          <ul>
              <li><img id="detail_img1" src="" alt="主菜"></li>
              
            <li><h3></h3><span id="detail_name"></span></li>
            <li>
                        <img class="detail_img_pd" id="detail_img1_1"  alt="" style="display:none"/>
			<img class="detail_img_pd"  id="detail_img2"   alt="" style="display:none"/>
			<img class="detail_img_pd" id="detail_img3"   alt="" style="display:none"/>
			<img class="detail_img_pd" id="detail_img4"  alt="" style="display:none"/>
			<img class="detail_img_pd" id="detail_img5"   alt="" style="display:none"/>
			
            </li>
          </ul>
        </dt>
        <dd>
        <ul>
          <li>
             <h3 class="name_of_cai"></h3>
          </li>
          <li>
            <ol>
              <li><span>餐厅: </span><span class="detail_supplier"></span></li>
              <!--
			  <li>
                  <span>用餐时间:</span>
                  <span class="views_main_content_week" id="detail_server_week"></span>
                  <span class="views_main_content_date" id="detail_server_day">4/5/2015</span>
              </li>
			  

            </ol>
          </li>
          <li>
             <span id="detail_good_desc" class="detail_desc"></span>
          </li>
          <li>
            <span><small>¥</small ><a id="detail_price"></a></span>
            <button class="views_main_plus_button plus_good_main AddOrder" onclick="addonedish(<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['value']->value['shopid'];?>
,1,this);">点餐</button>
          </li>
        </ul>
       </dd>
      </dl>
      <div>
        <img id="detail_image" src="../images/index_menu02.png"  alt="餐厅图片" />
        <div>
          <h5 class="detail_supplier"></h5>
          <span id="detail_supplier_address"></span>
		      <p id="descr" class="p"></p>
        </div>

      </div>
   </div>
    详情 End -->

   <!-- notice Begin 
   
   <<?php ?>?php if (!$notice) {?<?php ?>>
<div class="general_notice">
     <span class="delete"><img src="<<?php ?>?=$static_url?<?php ?>>/icon/delete.png" alt="" /></span>
     <ul>
       <li>为了您能准时收到您订购的美味，<br/>请您在需要的用餐日期前或当天<big>10:00</big>前进行预订。</li>
       <li>我们的配送时间为：<big>11:00AM</big> - <big>12:00AM</big>!</li>
       <li>您可以提前预订本周和下周的美食!</li>
     </ul>
   </div>
   <<?php ?>?php }?<?php ?>>

    notice End -->	
		
<script type="text/javascript">
 $(function(){

 	var top = Math.ceil($('.new_cart_pic').offset().top);
 	var left = Math.ceil($('.new_cart_pic').offset().left);
 	var value = <?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
;
 	var value_shop = <?php echo $_smarty_tpl->tpl_vars['value']->value['shopid'];?>
;
 	value = top;
 	value_shop = left; 
 	//alert(value_shop);
 	//alert(left);
 	//<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.replace(['id'],top);
 	//alert(value);
 // alert(Math.ceil($('.new_cart_logo').offset().top));
 //	alert(<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
);
		var myaddressid = '<?php echo $_smarty_tpl->tpl_vars['myaddress']->value;?>
';
		if(myaddressid == null|| myaddressid==''){
			 window.location.href= '<?php echo FUNC_function(array('type'=>'url','link'=>"/site/guide"),$_smarty_tpl);?>
';
		}


	});
$(document).ready(function(){
	var newCell = $('#shopList').html();
	$('#shopList2').append($(newCell));
	$('#shopList2 .menu-list-box').mouseenter(function(){
		$(this).find('.hc_shop_list_box').addClass('hc_shop_list_box_hover');
		$(this).find('.fav_font_div').show();
		$(".cuSelBox2").removeClass("cuSelBox2");
		$(this).addClass("cuSelBox2");
		$(this).find('.hc_shop_list_box .hcl_collection_btn').find('.hcl_collection_btn').addClass('hcl_collection_btn_hover');
		var item = $(this);
		setTimeout(function(){show_shop_view2(item);},500);
	});
	$('#shopList2 .menu-list-box').mouseleave(function(){	
		$(this).removeClass("cuSelBox2");	
		$(this).find('.hc_shop_list_box').removeClass('hc_shop_list_box_hover');
		$(this).find('.fav_font_div').hide();
		$(this).find('.hc_shop_list_box .hcl_collection_btn').find('.hcl_collection_btn').removeClass('hcl_collection_btn_hover');
		hide_shop_view2($(this));
	});

	//shopheight();
})
/*function shopheight(){
	var numshopli = $('#shopList li').length;
	var numa = Math.ceil(numshopli/4); 
	$('#shopList').css('height',Number(numa)*262);
	numshopli = $('#shopList2 li').length;
	 numa = Math.ceil(numshopli/4);
	$('#shopList2').css('height',Number(numa)*262);
}*/
/*
$('#shopList .menu-list-box').mouseenter(function(){
	$(this).find('.hc_shop_list_box').addClass('hc_shop_list_box_hover');
	$(this).find('.fav_font_div').show();
	$(this).find('.hc_shop_list_box .hcl_collection_btn').addClass('hcl_collection_btn_hover');
	$(".cuSelBox").removeClass("cuSelBox");
	$(this).addClass("cuSelBox");
	var item = $(this);
	setTimeout(function(){show_shop_view1(item);},500);
});


$('#shopList .menu-list-box').mouseleave(function(){
	$(this).removeClass("cuSelBox");
	$(this).find('.hc_shop_list_box').removeClass('hc_shop_list_box_hover');
	$(this).find('.fav_font_div').hide();
	$(this).find('.hc_shop_list_box .hcl_collection_btn').removeClass('hcl_collection_btn_hover');
	hide_shop_view1($(this));
});
*/
$('#shopList .menu-list-box .hc_shop_list_box_img_div').mouseenter(function(){ 
	var doobj = $('#menu-list-box_'+$(this).attr('shop_id'));
	/*$(doobj).find('.hc_shop_list_box').addClass('hc_shop_list_box_hover');*/
	$(doobj).find('.fav_font_div').show();
	$(doobj).find('.hc_shop_list_box .hcl_collection_btn').addClass('hcl_collection_btn_hover');
	$(".cuSelBox").removeClass("cuSelBox");
	$(doobj).addClass("cuSelBox");
	var item=$(this);
		setTimeout(function(){show_shop_view1(item);},500);
});
$('#shopList .menu-list-box .hc_shop_list_box_img_div').mouseleave(function(){
		var doobj = $('#menu-list-box_'+$(this).attr('shop_id'));
	$(doobj).removeClass("cuSelBox");
	$(doobj).find('.hc_shop_list_box').removeClass('hc_shop_list_box_hover');
	$(doobj).find('.fav_font_div').hide();
	$(doobj).find('.hc_shop_list_box .hcl_collection_btn').removeClass('hcl_collection_btn_hover');
	hide_shop_view1($(doobj));
});
$('#shopList .hc_shop_list_div').mouseleave(function(){
	$('#shopList .hc_shop_list_div .shopview_div').hide();
});

$('#shopList2 .hc_shop_list_div').mouseleave(function(){
	$('#shopList2 .hc_shop_list_div .shopview_div').hide();
});
function show_shop_view1(obj) {	
	var shop_id = $(obj).attr('shop_id');
	var cur_shop_id = $(".cuSelBox").attr('shop_id'); 
	if (shop_id != cur_shop_id) {
		return;
	}
	 
	var offset = $(obj).offset();
	//$(obj).addClass('blurborder');
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	var shopviewHeight = $('#shopList #shopview_div_'+shop_id).height();

	 $('#shopList .shopview_div').hide();
	 $('#shopList .shopview_div .hc_popups_sanjiao').removeClass('hc_popups_sanjiao_left').removeClass('hc_popups_sanjiao_right').addClass('hc_popups_sanjiao_top'); 
	 if(windowWidth-offset.left > 600)
	 {
		 $('#shopList #shopview_div_'+shop_id+' .hc_popups_sanjiao').addClass('hc_popups_sanjiao_left');
		 $('#shopList #shopview_div_'+shop_id).css('top',offset.top).css('left',offset.left+210);

		 if(windowHeight - offset.top < shopviewHeight)
		 {
			 $('#shopList #shopview_div_'+shop_id+' .hc_popups_sanjiao').removeClass('hc_popups_sanjiao_top').addClass('hc_popups_sanjiao_bottom');
			 $('#shopList #shopview_div_'+shop_id).css('top',offset.bottom - shopviewHeight + 0 );
		 }
	 }
	 else
	 {
		 $('#shopList #shopview_div_'+shop_id+' .hc_popups_sanjiao').addClass('hc_popups_sanjiao_right');
		 $('#shopList #shopview_div_'+shop_id).css('top',offset.top).css('left',offset.left-350);

		 if(windowHeight - offset.top < shopviewHeight)
		 {
			 $('#shopList #shopview_div_'+shop_id+' .hc_popups_sanjiao').removeClass('hc_popups_sanjiao_top').addClass('hc_popups_sanjiao_bottom');
			 $('#shopList #shopview_div_'+shop_id).css('top',offset.bottom - shopviewHeight + 0);
		 }
	 } 

	 $('#shopList #shopview_div_'+shop_id).show();
	
	if($('#shopList #ShopView_'+shop_id).length == 0) {
	 
		 var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/site/ajaxshopinfo"),$_smarty_tpl);?>
'; 
		 $('#shopList .loading').show();
		 $.post(url, {shop_id:shop_id},function (data, textStatus){ 
			 if($('#shopList #ShopView_'+shop_id).length == 0) {
				 $('#shopList .loading').hide();
			 	 $('#shopList #shopview_div_'+shop_id).append(data);
			 	show_shop_view1(obj);
			 }
			}, 'html');
			 
	}
}

function hide_shop_view1(obj) {
	$('#shopList .shopview_div').hide();
	var shop_id = $(obj).attr('shopid');
	$('#shopList #shopview_div_'+shop_id).hide();
}

$('.menu-xuanze-img').click(function(){
	fenweiChange($(this));
});

function fenweiChange(obj){
	$('.menu-xuanze-img').removeClass('hc_changes_menu_div_active_hover');

	$(obj).addClass('hc_changes_menu_div_active_hover');

	updateFengwei();
}

function updateFengwei()
{
	$('#all').removeClass('hc_changes_menu_div_active_hover');
	
	$('#shopList .menu-list-box').each(function(i){
		$(this).hide();
	});

	var qisongjia = $('#qisongjia').attr('qisongjia_val');
	
	var bool = false;

	var selected_style_id = '';

	$('.menu-xuanze-img').each(function(i){
		var style_id = $(this).attr('style_id');
		
		if($(this).hasClass('hc_changes_menu_div_active_hover'))
		{
			selected_style_id = style_id;
			bool = true;
			
			$('#shopList .menu-list-box').each(function(j){
				var fengwei_id = $(this).attr('fengwei_id').split(',');
				var my_qisongjia = $(this).attr('qisongjia');
				
				if(in_array(style_id,fengwei_id))
				{
					if(qisongjia == 4){
						$(this).show();
					}
					else
					{
						if(parseInt(my_qisongjia)<=qisongjia)
						{
							$(this).show();
						}
						else
						{
							$(this).hide();
						}
					}
				}
			})
		}
		else
		{
			$('#shopList .menu-list-box').each(function(j){
				var fengwei_id = $(this).attr('fengwei_id').split(',');
				if(!in_array(selected_style_id,fengwei_id))
				{
					$(this).hide();
				}
			})
		}
	})
	if(bool==false)
	{
		allChange($("#all"));
	}
	showOtherArea();
}

function in_array(e,arr)
{
	for(i=0;i<arr.length;i++)
	{
		if(arr[i] == e)
		return true;
	}
	return false;
}

function showOtherArea()
{
	var ids = new Array();
	 
	$('#shopList .menu-list-box').each(function(i){
		if($(this).is(":hidden")){
			ids.push($(this).attr('id'));
		}
	});
	/*var allnum = $('#shopList li').length;//总数量
	var downnum = ids.length;//下移数量
	var numshopli = Number(allnum) - Number(downnum);
	var numa = Math.ceil(numshopli/4); 
	$('#shopList').css('height',Number(numa)*262); 
	 numa = Math.ceil(downnum/4);
	$('#shopList2').css('height',Number(numa)*262);
	*/ 
	if(ids.length > 0)
	{
		$('#hc_shop_list2').hide();
		$('#shopList2 .menu-list-box').hide();
		for(var j=0;j<ids.length;j++){
			$('#shopList2 #'+ids[j]).show();
		}
	}
	else
	{
		$('#hc_shop_list2').hide();
	}
	/***自动计算高度***/
}

$("#all").click(function(){
	allChange($(this));
});

function allChange(obj)
{
	if(!$(obj).hasClass('hc_changes_menu_div_active_hover'))
	{
		$(obj).addClass('hc_changes_menu_div_active_hover');
	}
	$(".menu-xuanze-img").removeClass('hc_changes_menu_div_active_hover');
		
		var qisongjia = $('#qisongjia').attr('qisongjia_val');
		$('#shopList .menu-list-box').each(function(i){
			var my_qisongjia = $(this).attr('qisongjia');
			
			if(qisongjia == 4){
				$(this).show();
			}
			else
			{
				if(parseInt(my_qisongjia)<=qisongjia)
				{
					$(this).show();
				}
				else
				{
					$(this).hide();
				}
			}
				
		});
	showOtherArea();
}

function getNowData()
{
	if($('#all').hasClass('hc_changes_menu_div_active_hover'))
	{
		return '2';
	}
	else
	{
		return '3';
	}
}

$('.qisongjia_click').click(function(){
	var qisongjia = $(this).attr('qisongjia_val');
	$('#qisongjia').attr('qisongjia_val',qisongjia);
	
	$('.hc_shop_scale_img').removeClass('hc_shop_scale_images');
	$('.hc_shop_scale_price').removeClass('hc_shop_scale_price_hover');

	$('.hc_shop_scale_img').each(function(){
		if($(this).attr('qisongjia_val')==qisongjia)
		{
			$(this).addClass('hc_shop_scale_images');
		}
	})
	$('.hc_shop_scale_price').each(function(){
		if($(this).attr('qisongjia_val')==qisongjia)
		{
			$(this).addClass('hc_shop_scale_price_hover');
		}
	})

	var type = getNowData();
	if(type=='2')
	{
		allChange($('#all'));
	}
	else
	{
		updateFengwei();
	}
})

function show_shop_view2(obj) {
	var shop_id = $(obj).attr('shop_id');
	var cur_shop_id = $(".cuSelBox2").attr('shop_id');
	if (shop_id != cur_shop_id) {
		return;
	}
	var offset = $('#shopList2 #menu-list-box_'+shop_id).offset();
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	var shopviewHeight = $('#shopList2 #shopview_div_'+shop_id).height();

	 $('#shopList2 .shopview_div').hide();
	 $('#shopList2 .shopview_div .hc_popups_sanjiao').removeClass('hc_popups_sanjiao_left').removeClass('hc_popups_sanjiao_right').addClass('hc_popups_sanjiao_top');

	 if(windowWidth-offset.left > 600)
	 {
		 $('#shopList2 #shopview_div_'+shop_id+' .hc_popups_sanjiao').addClass('hc_popups_sanjiao_left');
		 $('#shopList2 #shopview_div_'+shop_id).css('top',offset.top).css('left',offset.left+$('#shopList2 #menu-list-box_'+shop_id).width());

		 if(windowHeight - offset.top < shopviewHeight)
		 {
			 $('#shopList2 #shopview_div_'+shop_id+' .hc_popups_sanjiao').removeClass('hc_popups_sanjiao_top').addClass('hc_popups_sanjiao_bottom');
			 $('#shopList2 #shopview_div_'+shop_id).css('top',offset.top - shopviewHeight + 100);
		 }
	 }
	 else
	 {
		 $('#shopList2 #shopview_div_'+shop_id+' .hc_popups_sanjiao').addClass('hc_popups_sanjiao_right');
		 $('#shopList2 #shopview_div_'+shop_id).css('top',offset.top).css('left',offset.left-350);

		 if(windowHeight - offset.top < shopviewHeight)
		 {
			 $('#shopList2 #shopview_div_'+shop_id+' .hc_popups_sanjiao').removeClass('hc_popups_sanjiao_top').addClass('hc_popups_sanjiao_bottom');
			 $('#shopList2 #shopview_div_'+shop_id).css('top',offset.top - shopviewHeight + 100);
		 }
	 }

	 $('#shopList2 #shopview_div_'+shop_id).show();
	
	if($('#shopList2 #ShopView_'+shop_id).length == 0) {
		 var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/site/ajaxshopinfo"),$_smarty_tpl);?>
';  
		 $('#shopList2 .loading').show();
		 $.post(url, {shop_id:shop_id},function (data, textStatus){
			 if($('#shopList2 #ShopView_'+shop_id).length == 0) {
				 $('#shopList2 .loading').hide();
			 	 $('#shopList2 #shopview_div_'+shop_id).append(data);
			 	show_shop_view2(obj);
			 }
			}, 'html');
	}
}

function hide_shop_view2(obj) {
	$('#shopList2 .shopview_div').hide();
	var shop_id = $(obj).attr('shopid');
	$('#shopList2 #shopview_div_'+shop_id).hide();
} 
</script>




</div>
	
</div>
</div>
</div>
 

<div id="footer" style="display:none;">
	
<div class="hc_btm_div">
		<div class="hc_btm_contact">
		   <?php if (!empty($_smarty_tpl->tpl_vars['toplink']->value)){?>
	 	      <?php $_smarty_tpl->tpl_vars['toplink'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['toplink']->value), null, 0);?>
		  	  <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['toplink']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?> 
			         <a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['typeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['typename'];?>
</a> | 
			    <?php } ?>
			<?php }?>

		</div>
		<div class="hc_btm_info">@2008-2012 <?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['beian']->value;?>
<?php echo stripslashes($_smarty_tpl->tpl_vars['footerdata']->value);?>
</div>
	</div>	
	
	
 </div> 
<div style="position: absolute; top: -1970px; left: -1970px;"> 
</div>  
</body>
</html><?php }} ?>