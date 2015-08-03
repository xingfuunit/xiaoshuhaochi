<?php /* Smarty version Smarty-3.1.10, created on 2015-06-30 12:46:28
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/adminpage/setnotice.html" */ ?>
<?php /*%%SmartyHeaderCode:55286586555921f24cdc512-86133506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abc38120ee5aeb821605b52f528b77481e43b15e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/adminpage/setnotice.html',
      1 => 1434531488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55286586555921f24cdc512-86133506',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'siteurl' => 0,
    'tempdir' => 0,
    'noticetype' => 0,
    'IMEI' => 0,
    'mKey' => 0,
    'machine_code' => 0,
    'shopid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_55921f24d54ec2_30720478',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55921f24d54ec2_30720478')) {function content_55921f24d54ec2_30720478($_smarty_tpl) {?><html xmlns="http://www.w3.org/1999/xhtml"><head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta http-equiv="Content-Language" content="zh-CN"> 
<meta content="all" name="robots"> 
<meta name="description" content=""> 
<meta content="" name="keywords"> 
<title>店铺佣金比例</title> 
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/admin.css">
 
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.js" type="text/javascript" language="javascript"></script>  
 <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/artDialog.js?skin=blue"></script>
</head>
<body style="background:none;height:350px;">
	 <form  method="post" name="upform" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/shop/module/saveshoppnotice"),$_smarty_tpl);?>
" style="text-align:center;">  
	 	<table>
	 		
	 		<tr>
	 			<td  ><input type="checkbox" name="pstype[]" value="1" <?php if (in_array('1',$_smarty_tpl->tpl_vars['noticetype']->value)){?>checked<?php }?>> 短信<input type="checkbox" name="pstype[]" value="2"  <?php if (in_array('2',$_smarty_tpl->tpl_vars['noticetype']->value)){?>checked<?php }?>>邮箱 <input type="checkbox" name="pstype[]" value="3"  <?php if (in_array('3',$_smarty_tpl->tpl_vars['noticetype']->value)){?>checked<?php }?>>微信</td>
	 		</tr>
	 		<tr>
	 			<td>打印机IMEI号<input type="text" name="IMEI" value="<?php echo $_smarty_tpl->tpl_vars['IMEI']->value;?>
" </td></tr>
	 				<tr>
	 			<td></td></tr>
	 				<tr>
	 			<td>打印机2密钥<input type="text" name="mKey" value="<?php echo $_smarty_tpl->tpl_vars['mKey']->value;?>
" </td></tr>
	 				<tr>
	 			<td></td></tr>
	 				<tr>
	 			<td>打印机2编码<input type="text" name="machine_code" value="<?php echo $_smarty_tpl->tpl_vars['machine_code']->value;?>
" </td></tr>
	 				<tr>
	 			<td></td></tr>
	 		</table>     
  
   	说明：当网站没设置 对应的方式，  即使在店铺设置后，也不启效
	  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['shopid']->value;?>
" name="shopid"> 
	 	<input type="submit" value="确认提交" class="button">  
	
	 	
	 	
  </form>
  <script>
  	 
  	</script>
</body>
</html><?php }} ?>