<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 11:43:03
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/shop/usereditmenu.html" */ ?>
<?php /*%%SmartyHeaderCode:672953720558d0455e6aae9-68184286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '214c3f23719964abdd3e92c170423c9dede8e1c2' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/shop/usereditmenu.html',
      1 => 1435807919,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '672953720558d0455e6aae9-68184286',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558d0455ec1d21_37442046',
  'variables' => 
  array (
    'urlshort' => 0,
    'siteurl' => 0,
    'tempdir' => 0,
    'shopinfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558d0455ec1d21_37442046')) {function content_558d0455ec1d21_37442046($_smarty_tpl) {?> <ul class="waimaiset"> 
	<li class="<?php if ($_smarty_tpl->tpl_vars['urlshort']->value=='shop/useredit'){?> onset<?php }?>" onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/useredit"),$_smarty_tpl);?>
');">
    	<img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/jbBg.png" /><span>基本设置</span>
    </li>
    <?php if (empty($_smarty_tpl->tpl_vars['shopinfo']->value['shoptype'])){?>
    <li  class="<?php if ($_smarty_tpl->tpl_vars['urlshort']->value=='shop/usershopfast'){?> onset<?php }?>" onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/usershopfast"),$_smarty_tpl);?>
');" >
    	<img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/wmset.png" /><span>业务设置</span>
    </li>
    <?php }else{ ?>
    <li  class="<?php if ($_smarty_tpl->tpl_vars['urlshort']->value=='shop/usershopmarket'){?> onset<?php }?>"   onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/usershopmarket"),$_smarty_tpl);?>
')">
    	<img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/wmset.png" /><span>超市市场</span>
    </li>
    
    <?php }?> 
    <li class="<?php if ($_smarty_tpl->tpl_vars['urlshort']->value=='shop/usershopinstro'){?> onset<?php }?>" onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/usershopinstro"),$_smarty_tpl);?>
');">
    	<img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/dianpujieshao.png" /><span>店铺介绍</span>
    </li>
    <li class="<?php if ($_smarty_tpl->tpl_vars['urlshort']->value=='shop/usershopnotice'){?> onset<?php }?>" onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/usershopnotice"),$_smarty_tpl);?>
');">
    	<img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/gonggao.png" /><span>店铺公告</span>
    </li>
</ul>

<!--
<script>       	
			$(function(){
					$(".waimaiset .jbset").click(function(){
						$(this).css('background','#ec7501').siblings().css('background','');
						
					});	
					
				});
 </script>
       	 -->
       		 <?php }} ?>