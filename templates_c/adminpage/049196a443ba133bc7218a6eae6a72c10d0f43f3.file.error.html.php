<?php /* Smarty version Smarty-3.1.10, created on 2015-06-26 14:46:34
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/adminpage/public/error.html" */ ?>
<?php /*%%SmartyHeaderCode:745154738558cf54aceac34-88566933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '049196a443ba133bc7218a6eae6a72c10d0f43f3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/adminpage/public/error.html',
      1 => 1434531579,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '745154738558cf54aceac34-88566933',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'siteurl' => 0,
    'tempdir' => 0,
    'is_static' => 0,
    'sitetitle' => 0,
    'msg' => 0,
    'errorlink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558cf54ad4cf44_18008837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558cf54ad4cf44_18008837')) {function content_558cf54ad4cf44_18008837($_smarty_tpl) {?>  <html xmlns="http://www.w3.org/1999/xhtml"><head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta http-equiv="Content-Language" content="zh-CN"> 
<meta content="all" name="robots"> 
<meta name="description" content=""> 
<meta content="" name="keywords"> 
<title>后台管理中心 </title>  
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/admin1.css"> 
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/public.js" type="text/javascript" language="javascript"></script>
 <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/artDialog.js?skin=blue"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/template.min.js" type="text/javascript" language="javascript"></script>
 <script>
	var menu = null;
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
	if(screen.width > 1359){
		
		$('.newtop').css('width',screen.width);
		$('.newmain').css('width',screen.width);
		$('.newfoot').css('width',screen.width);
	}  
	
</script> 
<style>
  #content{left:50%;top:30%;position:absolute;width:400px;margin-left:-200px;height:300px;margin-top:-150px;background-color:#ffffff;}
  .newfoot{bottom:0px;position:absolute;}
  .hc_login_head{height:40px;line-height:40px;background-color:#0076cf;color:#ffffff;font-weight:bold;padding-left:30px;}
  .hc_login_content{padding-top:30px;padding-left:30px;}
  .hc_login_div_span{color:#dddddd;font-weight:bold;}

</style>
</head> 
<body> 
<div id="content">
	<form id="loginForm" method="post">
<div class="hc_content">
		<div class="hc_login">
			<div class="hc_login_head"><span class="hc_login_head_span"><?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
</span></div>
			<div class="hc_login_content">
					<div class="findPassWordDiv">
						<div style="float:left;margin-right: 10px;">
							<p style="padding-bottom:30px;"><span class="hc_login_div_span">错误提示信息：</span> <font style="color:#000000"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</font></p>
							<p class="tip" style="margin-left:50px;"><a href="<?php echo $_smarty_tpl->tpl_vars['errorlink']->value;?>
">返回上一页</a>  <span style="margin-left:100px;"><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
">返回首页</a></span></p>
						</div>
						 
						<div class="clear"></div>
					</div>
				<div class="clear"></div>
			</div>

		</div>



	</div>
</form>

<script type="text/javascript">
$('.login-button').click(function(){
	$('#loginForm').submit();
})

</script></div> 



<div style="clear:both;"></div>
<div class="newfoot">
	
	  版权所有@外卖人网上订餐系统
</div>	
<script>
$(function(){ 
 $('.show_page a').wrap('<li></li>');
 $('.show_page').find('.current').eq(0).parent().css({'background':'#f60'}); 
});
   
</script>
</body>
</html>
 <?php }} ?>