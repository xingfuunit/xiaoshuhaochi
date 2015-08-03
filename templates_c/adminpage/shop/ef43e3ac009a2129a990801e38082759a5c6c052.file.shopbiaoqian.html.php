<?php /* Smarty version Smarty-3.1.10, created on 2015-06-30 12:46:33
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/adminpage/shopbiaoqian.html" */ ?>
<?php /*%%SmartyHeaderCode:114116740755921f299f1582-62663254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef43e3ac009a2129a990801e38082759a5c6c052' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/adminpage/shopbiaoqian.html',
      1 => 1434531488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114116740755921f299f1582-62663254',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'siteurl' => 0,
    'tempdir' => 0,
    'shopinfo' => 0,
    'fastfood' => 0,
    'attrlist' => 0,
    'items' => 0,
    'shownow' => 0,
    'myattr' => 0,
    'itv' => 0,
    'shownow1' => 0,
    'shopid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_55921f29b2d8e5_82973939',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55921f29b2d8e5_82973939')) {function content_55921f29b2d8e5_82973939($_smarty_tpl) {?><html xmlns="http://www.w3.org/1999/xhtml"><head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta http-equiv="Content-Language" content="zh-CN"> 
<meta content="all" name="robots"> 
<meta name="description" content=""> 
<meta content="" name="keywords"> 
<title>店铺标签选择</title> 
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
<body style="background:none;height:450px;overflow:scroll;width:400px;">
	 <form  method="post" name="upform" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/shop/module/saveshopbq"),$_smarty_tpl);?>
" > 
	  	<div > <input type="checkbox" name="is_recom" value="1" <?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['is_recom']==1){?>checked<?php }?>>首页推荐(调用shop表里的is_recom)</div>
	 	 
	 	 		<?php if (isset($_smarty_tpl->tpl_vars['fastfood']->value)&&isset($_smarty_tpl->tpl_vars['fastfood']->value['is_com'])){?>
	 	 <div >
	 	  	<font>外卖设置(调用fastfood)表</font>
	     <div style="padding-left:20px;">
	   	<div>
	   	
	       <input type="checkbox" name="fis_com" value="1" <?php if ($_smarty_tpl->tpl_vars['fastfood']->value['is_com']==1){?>checked<?php }?>>推荐(is_com) 
	       <input type="checkbox" name="fis_hot" value="1" <?php if ($_smarty_tpl->tpl_vars['fastfood']->value['is_hot']==1){?>checked<?php }?>>热卖 (is_hot)
	       <input type="checkbox" name="fis_new" value="1" <?php if ($_smarty_tpl->tpl_vars['fastfood']->value['is_new']==1){?>checked<?php }?>>新品(is_new)
	      
	    </div>  
	     <?php }?>
	   	 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attrlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?> 
	   	    <div >  <?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>

	   	    <?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?> 
                        	      <?php if ($_smarty_tpl->tpl_vars['items']->value['type']=='input'){?>
                        	         <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(($_smarty_tpl->tpl_vars['items']->value['id']).('-0'), null, 0);?>   
                        <input type="input" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['myattr']->value[$_smarty_tpl->tpl_vars['shownow']->value])===null||$tmp==='' ? '' : $tmp);?>
" name="mydata<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" class="ttext">  
                        	      <?php }elseif($_smarty_tpl->tpl_vars['items']->value['type']=='img'){?>
                        	        <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(($_smarty_tpl->tpl_vars['items']->value['id']).('-'), null, 0);?>   
                        	         <?php $_smarty_tpl->tpl_vars['shownow1'] = new Smarty_variable(($_smarty_tpl->tpl_vars['shownow']->value).($_smarty_tpl->tpl_vars['itv']->value['id']), null, 0);?>  
                        <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" name="mydata<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
[]"  <?php if (isset($_smarty_tpl->tpl_vars['myattr']->value[$_smarty_tpl->tpl_vars['shownow1']->value])){?>checked<?php }?> ><img src="<?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>
" width=30px>  
                        	      <?php }elseif($_smarty_tpl->tpl_vars['items']->value['type']=='checkbox'){?>
                        	         <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(($_smarty_tpl->tpl_vars['items']->value['id']).('-'), null, 0);?>   
                        	         <?php $_smarty_tpl->tpl_vars['shownow1'] = new Smarty_variable(($_smarty_tpl->tpl_vars['shownow']->value).($_smarty_tpl->tpl_vars['itv']->value['id']), null, 0);?>
                      <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" name="mydata<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
[]" <?php if (isset($_smarty_tpl->tpl_vars['myattr']->value[$_smarty_tpl->tpl_vars['shownow1']->value])){?>checked<?php }?> ><?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>
  
                        	      <?php }elseif($_smarty_tpl->tpl_vars['items']->value['type']=='radio'){?>
                        	           <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(($_smarty_tpl->tpl_vars['items']->value['id']).('-'), null, 0);?>   
                        	         <?php $_smarty_tpl->tpl_vars['shownow1'] = new Smarty_variable(($_smarty_tpl->tpl_vars['shownow']->value).($_smarty_tpl->tpl_vars['itv']->value['id']), null, 0);?>  
                      <input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" name="mydata<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['myattr']->value[$_smarty_tpl->tpl_vars['shownow1']->value])){?>checked<?php }?>><?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['shownow1']->value;?>
  
                        	      <?php }?>
                        	      
                        	<?php } ?> 
                        	</div> 
        <?php } ?>
      </div>
     </div>
	 	
	  
	 	<br>
	 	   
	  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['shopid']->value;?>
" name="shopid"> 
	 	<input type="submit" value="确认提交" class="button">  
	 	
	 	
  </form>
  <script>
  	 
  	</script>
</body>
</html><?php }} ?>