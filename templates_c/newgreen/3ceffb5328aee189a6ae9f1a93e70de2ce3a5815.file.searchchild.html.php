<?php /* Smarty version Smarty-3.1.10, created on 2015-05-21 13:49:20
         compiled from "/data/www/xshc/wmr/templates/newgreen/site/searchchild.html" */ ?>
<?php /*%%SmartyHeaderCode:781424766555d71e07af5c7-17622492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ceffb5328aee189a6ae9f1a93e70de2ce3a5815' => 
    array (
      0 => '/data/www/xshc/wmr/templates/newgreen/site/searchchild.html',
      1 => 1406794480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '781424766555d71e07af5c7-17622492',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'pinglist' => 0,
    'items' => 0,
    'list' => 0,
    'myid' => 0,
    'parent_ids' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555d71e0850687_75899849',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d71e0850687_75899849')) {function content_555d71e0850687_75899849($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/data/www/xshc/wmr/lib/Smarty/libs/plugins/function.load_data.php';
?> 
<div class="hc_login_pupopsBox_content_index">
	<div class="hc_login_pupopsBox_content_index_div">
		<ul>
			<li class="hc_login_pupopsBox_content_index_div_li_hover">
				<a class="hc_pchoose hc_login_pupopsBox_content_index_div_li_a_hover sel_fa_dsc" href="javascript:void(0)">全部</a>
			</li>
			 <?php echo smarty_function_load_data(array('assign'=>"pinglist",'table'=>"area",'fileds'=>"pin",'limit'=>"100",'where'=>"parent_id = ".((string)$_smarty_tpl->tpl_vars['id']->value)." GROUP BY pin",'orderby'=>" orderid asc"),$_smarty_tpl);?>
 
			 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pinglist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?> 
							<li><a class="hc_pchoose sel_fa_dsc" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['items']->value['pin'];?>
</a></li>
	    <?php } ?>
						 
			
			</ul>
		</div>
</div>
 

<div class="hc_PupopsLists">
	<div class="hc_PupopsLists_div" style="overflow-y: auto;">
		<ul id="item_list_ul_dsc">
			<?php echo smarty_function_load_data(array('assign'=>"list",'table'=>"area",'fileds'=>"*",'limit'=>"100",'where'=>"parent_id = ".((string)$_smarty_tpl->tpl_vars['id']->value),'orderby'=>" orderid asc"),$_smarty_tpl);?>
 
			<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
				 <li <?php if ($_smarty_tpl->tpl_vars['myid']->value%4==3){?>style="border-right: 0; width:130px;"<?php }?>> <a <?php if ($_smarty_tpl->tpl_vars['myid']->value%4==3){?>style="border-right: 0; width:130px;"<?php }?> class="pos_dsc_li" <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?> href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/setlocationlink/areaid/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])),$_smarty_tpl);?>
" <?php }else{ ?> href="javascript:void(0)"<?php }?>  dsc_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" fa="<?php echo $_smarty_tpl->tpl_vars['items']->value['pin'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</a></li>
		  <?php } ?> 
													 
		</ul>

	</div>

	<ul id="item_list_ul_dsc_data" class="hidden">
							<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
				        <li <?php if ($_smarty_tpl->tpl_vars['myid']->value%4==3){?>style="border-right: 0; width:130px;"<?php }?>> 
				          <a <?php if ($_smarty_tpl->tpl_vars['myid']->value%4==3){?>style="border-right: 0; width:130px;"<?php }?> class="pos_dsc_li"  <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?> href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/setlocationlink/areaid/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])),$_smarty_tpl);?>
" <?php }else{ ?> href="javascript:void(0)"<?php }?>  dsc_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" fa="<?php echo $_smarty_tpl->tpl_vars['items']->value['pin'];?>
">
				          	<?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>

				          </a>
				        </li>
		          <?php } ?>
  </ul>
</div> <?php }} ?>