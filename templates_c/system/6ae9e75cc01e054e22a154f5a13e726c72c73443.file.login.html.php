<?php /* Smarty version Smarty-3.1.10, created on 2015-06-24 16:53:49
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/login.html" */ ?>
<?php /*%%SmartyHeaderCode:1255806320558a6f8bba4d87-11926074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ae9e75cc01e054e22a154f5a13e726c72c73443' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/login.html',
      1 => 1435136027,
      2 => 'file',
    ),
    '94c15e72c0d75a0e7a643019ff901b09d8719615' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/weixin.html',
      1 => 1434531620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1255806320558a6f8bba4d87-11926074',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558a6f8bc74742_47359820',
  'variables' => 
  array (
    'tempdir' => 0,
    'siteurl' => 0,
    'is_static' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558a6f8bc74742_47359820')) {function content_558a6f8bc74742_47359820($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title> 
	 
	<link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/css/public.css">   
  <link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/css/index.css">   
 
<link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/css/member.css">   


	<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/js/jquery.js"></script> 
  <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/js/public.js"></script>  
   <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/js/swipe.js"></script> 
  
 <script>
 
 	$(function(){
          var shopid = <?php echo $_smarty_tpl->tpl_vars['shopid']->value;?>
;
 $('.login_list li').click(function(){
  $(this).addClass('active').siblings().removeClass('active');
  $('.login_wrap > li').eq($(this).index()).fadeIn('slow').siblings().fadeOut('fast');
 });


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

 	$('#logSubmit').click(function(){ 
            var shopid = <?php echo $_smarty_tpl->tpl_vars['shopid']->value;?>
;
           
 		var checkuname = $('#logEmailOrPhone').val();
 		if(checkuname != ''){
 		  
  	 	$('#loading').toggle(); 
  	  	var info = {'uname':$('#logEmailOrPhone').val(),'pwd':$('#logPassword').val(),'logintype':'html5'}; 
  	 	  var  url = siteurl+'/index.php?controller=member&action=login&datatype=json&random=@random@' 
  	 	   $.ajax({ 
             url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
            dataType: "json", 
            data:info, 
            success:function(content) {  
            	$('#loading').toggle(); 
            	if(content.msg ==  false){
            		 window.location.href= siteurl+'/index.php?controller=wxsite&action=member&shoid='+shopid;
            	}else{ 
            	   Tmsg(content.msg);
              }
            	
            }, 
            error:function(){ 
            	$('#loading').toggle();

            } 
         });  
    }else{
    	Tmsg('用户帐号不能为空');
    }
		  
	 }); 
     
	});
  
    var regestercode = '1';
    //
     function loginbyode () {
         var shopid = <?php echo $_smarty_tpl->tpl_vars['shopid']->value;?>
;
         
         var phone = $("#phone").val();
         var code = $("#login_code").val();
         
         var info = {'uname':phone,'code':code,'logintype':'html5'}; 
  	 	  var  url = siteurl+'/index.php?controller=member&action=loginbycode&datatype=json&random=@random@' 
  	 	   $.ajax({ 
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
            dataType: "json", 
            data:info, 
            success:function(content) {  
            	$('#loading').toggle(); 
            	if(content.msg ==  false){
            		 window.location.href= siteurl+'/index.php?controller=wxsite&action=member&shoid='+shopid;
            	}else{ 
            	   Tmsg(content.msg);
                   $("#loading").hide();
              }
            	
            }, 
            error:function(){ 
            	$('#loading').toggle();

            } 
         }); 
       
     }
 </script>
   <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/regestercode.js"></script> 

<script> 
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
</script>
 <script type="text/javascript" name="baidu-tc-cerfication" src="http://apps.bdimg.com/cloudaapi/lightapp.js#eb0a315369c4f60074e72f7079c87fb8"></script><script type="text/javascript">window.bd && bd._qdc && bd._qdc.init({app_id: 'fb7bfde77727fd99a32117ab'});</script>
</head>
<body> 
	<div id="loading" style="display: block;"><div class="loadingbox"><section class="ffffbox"><div class="loadingpice"></div></section></div></div>
	 
 <div id="hallist">

  	<header><div class="return"></div>用户登陆</header>  
      <ul class="login_list">
        <li class="active">普通登录</li>
        <li>验证码登录</li>
      </ul>  
 <ul class="login_wrap">     
  <li class="container"> 
    
	    <div class="wrap"> 

	    	<section class="muli" style="display: block;">

	    		<div class="colfff">

	    			<div class="widCen warp01">

	    				<input type="text" class="inputInp" placeholder="请输入您注册时的手机号码" id="logEmailOrPhone" name="emailOrPhone">

	    				<input type="password" class="inputInp" placeholder="请输入密码" id="logPassword" name="password" autocomplete="off" required="required">

	    			</div>

	    		</div>
          
	    		<div class="borBm01"><input type="BUTTON" class="inputBtn" value="登录" id="logSubmit"></div></section> 

	  </div> 

	    <div class="login_r">
         <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/reg"),$_smarty_tpl);?>
">立即注册</a>
        <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/forgot"),$_smarty_tpl);?>
">忘记密码？</a>  
         </div> 
<!--<div class="login_forget"></div>

<li style="display:none;">
        <a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/index.php?controller=order&action=guestorder">未登录用户查询订单</a>
        </li>
-->
      
</li>  

<li class="container"> 
    
      <div class="wrap"> 

        <section class="muli" style="display: block;">

          <div class="colfff">

            <ul class="widCen warp01">
              <li>
              <input type="text" class="inputInp" placeholder="请输入您的手机号码" id="phone" name="emailOrPhone">
              </li>
              <li>
              <input type="text" class="code inputInp" id="login_code" placeholder="验证码" onclick="code_login();"/>
              <input type="button" id="send_code" value="发送验证码" class="cursor_pointer send_code" onclick="clickyanzheng(regestercode);"/>
               </li>
            </ul>

          </div>
          
          <div class="borBm01"><input type="BUTTON" class="inputBtn" value="验证码登录" id="logSubmit" onclick="loginbyode()"></div></section> 

    </div> 
</li>       
  </ul>        
</div>

   
  	<footer>
  		<nav>
  			<ul>
  				<li id="homeindex"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/index"),$_smarty_tpl);?>
">首页</a></li>
  	    	<li id="footerorderlist"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/order"),$_smarty_tpl);?>
">订单</a></li>
  	    	<li id="favorate"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/collect"),$_smarty_tpl);?>
">收藏</a></li>
  	    	<li id="opinion"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/ask"),$_smarty_tpl);?>
">意见反馈</a></li>
  	    </ul>
  	  </nav>
  	  <p>Copyright © 2011-2014 Powered by <font id="sitetitle"></font></p>
  	</footer>
  	
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