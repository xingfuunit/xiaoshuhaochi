<?php /* Smarty version Smarty-3.1.10, created on 2015-06-24 16:57:31
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/reg.html" */ ?>
<?php /*%%SmartyHeaderCode:266884230558a70fb61b251-10452553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3146c0fc10acffbee4a699149c8ca182523a1af' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/reg.html',
      1 => 1435136241,
      2 => 'file',
    ),
    '94c15e72c0d75a0e7a643019ff901b09d8719615' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/weixin.html',
      1 => 1434531620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '266884230558a70fb61b251-10452553',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tempdir' => 0,
    'siteurl' => 0,
    'is_static' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558a70fb6c0978_92858143',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558a70fb6c0978_92858143')) {function content_558a70fb6c0978_92858143($_smarty_tpl) {?><!DOCTYPE html>
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
 

      <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/regestercode.js"></script> 
      <script>
    var regestercode = '0';
    $(function(){
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
      </script>

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
  	<header><div class="return"></div>用户注册</header> 
  <div class="container" style="padding-top:0px;background:none;margin-top:0px;">

  	 

<section class="muli" style="display: block" id="first">
	<ul class="w300">
	<!--   <li>
		<input type="text" class="inputInp" placeholder="用户名（必填）" id="uname" name="uname" required="required">
		</li>  -->
		<li>
        <input type="text" class="inputInp" placeholder="手机号码（必填）" id="phone" name="phone" required="required">
        </li>
<!--<input type="text" class="inputInp" placeholder="输邮箱地址（必填）" id="email" name="email">-->
        <li>
        <input type="text" class="inputInp code" placeholder="请输入验证码（必填）" id="code" name="code">
        <input id="send_code" type="button" value="发送验证码" onclick="clickyanzheng(regestercode);"/>
        </li>
        <li>
		 <input type="password" class="inputInp" placeholder="登陆密码" id="pwd" name="pwd" required="required">
         </li>
         <li>
	 	<input type="password" class="inputInp" placeholder="确认登陆密码" id="spwd" name="spwd" required="required">
	 	</li>
	 	<li>
        <input type="checkbox" checked="checked"/>我已阅读并同意<a href="javascript:;">用户协议</a>
        </li>
  </ul>
  <div class="btnAdd">
      <input type="BUTTON" class="inputBtn" value="提交注册" id="regSubmit" onclick="savepwd();">
  </div>
</section>
 	 
<script> 
	function savepwd(){  

		   $('#loading').show();
      var info = {'tname':$('#uname').val(),'phone':$('#phone').val(),'pwd':$('#pwd').val(),'pwd2':$('#spwd').val(),'checklogin':'html5','phoneyan':$('#code').val()};
		  var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/member/saveregester/random/@random@/datatype/json"),$_smarty_tpl);?>
'; 
		  var backdata = ajaxback(url,info); 
		  if(backdata.flag == false){ 
		      window.location.href = siteurl+'/index.php?controller=wxsite&action=member';
		  }else{
		  	$('#loading').hide();
		     Tmsg(backdata.content);
		  }
		  
	}
</script>


   
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