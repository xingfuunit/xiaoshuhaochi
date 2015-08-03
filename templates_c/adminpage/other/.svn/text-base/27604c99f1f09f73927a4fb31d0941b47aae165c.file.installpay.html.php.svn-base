<?php /* Smarty version Smarty-3.1.10, created on 2015-05-21 13:50:10
         compiled from "/data/www/xshc/wmr/module/other/adminpage/installpay.html" */ ?>
<?php /*%%SmartyHeaderCode:1590075056555d7212a56246-11340190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27604c99f1f09f73927a4fb31d0941b47aae165c' => 
    array (
      0 => '/data/www/xshc/wmr/module/other/adminpage/installpay.html',
      1 => 1408849408,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1590075056555d7212a56246-11340190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'siteurl' => 0,
    'tempdir' => 0,
    'idtype' => 0,
    'info' => 0,
    'items' => 0,
    'setinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555d7212ab8670_18745578',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d7212ab8670_18745578')) {function content_555d7212ab8670_18745578($_smarty_tpl) {?><html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-CN">
<meta content="all" name="robots">
<meta name="description" content="">
<meta content="" name="keywords">
<title>上传图片</title>
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
<body style="background:none;height:200px;width:400px;">
	 <form enctype="multipart/form-data" method="post" name="upform" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/other/module/savepay"),$_smarty_tpl);?>
" >
	 	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idtype']->value;?>
" name="idtype">
	 	<?php if (!is_array('info')){?>
	 	<table>
	 	<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
	 	 <tr><td width=120px height=35px><?php echo $_smarty_tpl->tpl_vars['items']->value['title'];?>
</td><td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['setinfo']->value[$_smarty_tpl->tpl_vars['items']->value['name']];?>
" name="<?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['desc'];?>
</td></tr>

	 	  <?php } ?>

	 	  </table>
	 	   <input type="submit" value="提交保存" class="button">
	 	   <?php }else{ ?>
	 	   不存在接口文件
	 	 <?php }?>




  </form>
  <script>

  	</script>
</body>
</html><?php }} ?>