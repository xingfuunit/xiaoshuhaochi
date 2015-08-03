<?php /* Smarty version Smarty-3.1.10, created on 2015-05-21 14:04:05
         compiled from "/data/www/xshc/wmr/module/order/template/commentshop.html" */ ?>
<?php /*%%SmartyHeaderCode:825015646555d7555be4064-04032094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b0b211c12936a1ff68d7449b3b3676a032c93df' => 
    array (
      0 => '/data/www/xshc/wmr/module/order/template/commentshop.html',
      1 => 1408870792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '825015646555d7555be4064-04032094',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'items' => 0,
    'userlogo' => 0,
    'siteurl' => 0,
    'tempdir' => 0,
    'pagecontent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555d7555c493e9_81358129',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d7555c493e9_81358129')) {function content_555d7555c493e9_81358129($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_spacify')) include '/data/www/xshc/wmr/lib/Smarty/libs/plugins/modifier.spacify.php';
if (!is_callable('smarty_modifier_truncate')) include '/data/www/xshc/wmr/lib/Smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/data/www/xshc/wmr/lib/Smarty/libs/plugins/modifier.date_format.php';
?> 
 <?php if (count($_smarty_tpl->tpl_vars['list']->value)>0){?>
  <ul id="Comcon" scrollpagination="enabled">
<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>   
<li id="Com_203">
       <div class="COBLeft"><a href="#"><img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['logo'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['userlogo']->value : $tmp);?>
" width="50" height="50"></a></div>
        <div class="COBRight">
          <div class="COTitle"><a href="#"><?php echo smarty_modifier_truncate(smarty_modifier_spacify(mb_strtolower($_smarty_tpl->tpl_vars['items']->value['username'], 'UTF-8')),30,". . .");?>
</a>  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
 </div>
           <div class="COLevel"><span class="Level8"></span>评分： <i><?php echo $_smarty_tpl->tpl_vars['items']->value['point'];?>
</i><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
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
												    <div class="star_div" style="float:left;width:15px;"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/xinxin01.png" width="13" height="13"></div>
												    <?php endfor; endif; ?> </div>
           <div class="COLevel"><span class="Level8"></span>菜品：<em><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</em></div>
           <div class="COInfo"><?php echo $_smarty_tpl->tpl_vars['items']->value['content'];?>
</div>
         </div><div style="clear:both;"></div>
</li>
<?php } ?>		
 </ul>		
  <div class="ajaxpage">
  	<?php echo $_smarty_tpl->tpl_vars['pagecontent']->value;?>

  </div>
  <?php }else{ ?>
  暂无评价
   
  <?php }?><?php }} ?>