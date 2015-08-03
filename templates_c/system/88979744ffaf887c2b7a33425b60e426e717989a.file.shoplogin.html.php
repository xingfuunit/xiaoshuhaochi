<?php /* Smarty version Smarty-3.1.10, created on 2015-07-01 10:44:24
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/member/template/shoplogin.html" */ ?>
<?php /*%%SmartyHeaderCode:66023620255934bd4e8ff10-16840304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88979744ffaf887c2b7a33425b60e426e717989a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/member/template/shoplogin.html',
      1 => 1435718662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66023620255934bd4e8ff10-16840304',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_55934bd504ff28_22101429',
  'variables' => 
  array (
    'sitename' => 0,
    'keywords' => 0,
    'description' => 0,
    'metadata' => 0,
    'siteurl' => 0,
    'tempdir' => 0,
    'is_static' => 0,
    'controlname' => 0,
    'allowedcode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55934bd504ff28_22101429')) {function content_55934bd504ff28_22101429($_smarty_tpl) {?>﻿<!DOCTYPE html>
<html>
<head>
<title>商家登陆-<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<?php echo stripslashes($_smarty_tpl->tpl_vars['metadata']->value);?>

<meta charset="utf-8" />
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/favicon.ico" /> 
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/shangjialogin.css"> 
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
  <script> 
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
	var controllername= '<?php echo $_smarty_tpl->tpl_vars['controlname']->value;?>
';
</script>
<script>
	$(function(){
		var cilentHeight = document.documentElement.clientHeight;
		var topheight = cilentHeight-50;
		$("#sjfooter").css("top",topheight+"px");

       $('#sjloginin').click(function(){
	    subform('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/useredit"),$_smarty_tpl);?>
',$('#loginForm'));
	})
	});
</script>
</head>
<body>
<!--
<div id="sjtop">

</div>

<div id="sjloginBg">	</div>-->
<div id="sjlogin">
	<h3>商家管理后台登陆系统</h3>
<!--	<div class="sj_cont">
		<div class="sj_cont_left">
			<div class="sj_cont_title">
				<span><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/sjzizhuloginBg1.png" /></span>
			</div>
			<div class="sj_cont_bot">
				<span>
					<img width="30" height="30" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/welcome.png" />
				</span>
				<span>欢迎使用商家自助管理系统后台，请在右边输入用户名和密码登入系统，如账号遇见问题，请联系管理员。</span>
				<div style="clear:both;"></div>
			</div>
		</div>
		
		<div class="sj_cont_right">-->
		<form id="loginForm" method="post" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/shoploginin/datatype/json"),$_smarty_tpl);?>
">
		  <ul>
			<li>
			  <input class="unameinput" placeholder="请输入用户名" type="text" name="uname" id="uname" value="" />
			</li>
			<li>
			 <input class="upasinput" placeholder="请输入密码"  type="password" name="pwd" id="pwd" value="" />
			</li>
			  <?php if ($_smarty_tpl->tpl_vars['allowedcode']->value==1){?>
				<li>
					<input name="Captcha" placeholder="验证码" type="text" name="" value="" />
					<div> <img title="点击可更换验证码" onclick="javascript:freshcode();" src="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/getCaptcha"),$_smarty_tpl);?>
" id="captchaimg" style=" width:80px;height:38px;line-height:38px;">
					<a href="javascript:freshcode();" >刷新图片</a> </div>
					<div style="clear:both;"></div>
					<br>
				</li>
			<?php }?>
		 	<li>
		 	  <label>
		 	  	<input type="checkbox" value="" name="" checked="checked" />
				<span class="remme">记住用户名和密码</span> 
		 	  </label>
			</li>
			<li>
			   <input id="sjloginin" type="button" value="登录">
				<!--<img id="sjloginin" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/sj_login_bg.png" /> -->
			</li>
		  </ul>	
		</form>
	</div>
 <!-- </div>	
		
	

<div id="sjfooter" >
	
</div>
<div id="sjzztop">
	<span class="topfont"><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</a></span>
</div>
<div id="sjzzdibu">
<div style="height:20px;"></div>
	<center><span class="footerfont" style="">@2008-2014 <?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
版权所有
</span></center>
</div>-->
</body>
</html>
<?php }} ?>