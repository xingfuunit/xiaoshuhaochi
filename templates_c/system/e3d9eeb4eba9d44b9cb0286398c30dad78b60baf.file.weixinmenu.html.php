<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 12:26:41
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/weixin/weixinmenu.html" */ ?>
<?php /*%%SmartyHeaderCode:13110114095594a4e99744b3-16436545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3d9eeb4eba9d44b9cb0286398c30dad78b60baf' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/weixin/weixinmenu.html',
      1 => 1435809760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13110114095594a4e99744b3-16436545',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5594a4e99aec43_62763376',
  'variables' => 
  array (
    'urlshort' => 0,
    'siteurl' => 0,
    'tempdir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5594a4e99aec43_62763376')) {function content_5594a4e99aec43_62763376($_smarty_tpl) {?> <ul class="waimaiset">
      <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/wxset"),$_smarty_tpl);?>
');" class="jbset <?php if ($_smarty_tpl->tpl_vars['urlshort']->value=='weixin/wxset'){?> onset<?php }?>">
        <img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/jbBg.png">
        <span>基本设置</span>
      </li>
      <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/wxmenu"),$_smarty_tpl);?>
');" class="jbset <?php if ($_smarty_tpl->tpl_vars['urlshort']->value=='weixin/wxmenu'){?> onset<?php }?>">
        <img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/wmset.png">
        <span>微信菜单</span>
      </li>
      <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/wxback"),$_smarty_tpl);?>
');" class="jbset <?php if ($_smarty_tpl->tpl_vars['urlshort']->value=='weixin/wxback'){?> onset<?php }?>">
        <img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/dianpujieshao.png">
        <span>自动回复</span>
      </li>
      <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/wxuser"),$_smarty_tpl);?>
');" class="jbset <?php if ($_smarty_tpl->tpl_vars['urlshort']->value=='weixin/wxuser'){?> onset<?php }?>">
        <img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/gonggao.png">
        <span>微信用户</span>
      </li>
</ul>

<!--<script>
				$(function(){
					$(".waimaiset .jbset").click(function(){
						$(this).css('background','#ec7501').siblings().css('background','');

					});

				});
 </script>-->


<?php }} ?>