<?php /* Smarty version Smarty-3.1.10, created on 2015-05-21 13:49:23
         compiled from "/data/www/xshc/wmr/templates/newgreen/site/searchdet.html" */ ?>
<?php /*%%SmartyHeaderCode:1361182229555d71e3543a87-91610154%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e41495011bd6a81dc06f4266f006323872892c6' => 
    array (
      0 => '/data/www/xshc/wmr/templates/newgreen/site/searchdet.html',
      1 => 1406794522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1361182229555d71e3543a87-91610154',
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
  'unifunc' => 'content_555d71e35d7665_87979277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d71e35d7665_87979277')) {function content_555d71e35d7665_87979277($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/data/www/xshc/wmr/lib/Smarty/libs/plugins/function.load_data.php';
?> 
<div class="hc_login_pupopsBox_content_index">
	<div class="hc_login_pupopsBox_content_index_div">
		<ul>
			<li class="hc_login_pupopsBox_content_index_div_li_hover">
				<a class="hc_pchoose hc_login_pupopsBox_content_index_div_li_a_hover sel_fa_lm" href="javascript:void(0)">全部</a>
			</li>
		
		  <?php echo smarty_function_load_data(array('assign'=>"pinglist",'table'=>"area",'fileds'=>"pin",'limit'=>"100",'where'=>"parent_id = ".((string)$_smarty_tpl->tpl_vars['id']->value)." GROUP BY pin",'orderby'=>" orderid asc"),$_smarty_tpl);?>
 
			<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pinglist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?> 
							<li><a class="hc_pchoose sel_fa_lm" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['items']->value['pin'];?>
</a></li>
	   <?php } ?>		
			<div class="clear"></div>
			</ul>
		</div>
	</div>


<div class="hc_PupopsLists">
	<div class="hc_PupopsLists_div" style="overflow-y: auto;">
		<ul id="item_list_ul_lm">
				 
	   <?php echo smarty_function_load_data(array('assign'=>"list",'table'=>"area",'fileds'=>"*",'limit'=>"100",'where'=>"parent_id = ".((string)$_smarty_tpl->tpl_vars['id']->value),'orderby'=>" orderid asc"),$_smarty_tpl);?>
 
			<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
				 <li <?php if ($_smarty_tpl->tpl_vars['myid']->value%4==3){?>style="border-right: 0; width:130px;"<?php }?>> <a <?php if ($_smarty_tpl->tpl_vars['myid']->value%4==3){?>style="border-right: 0; width:130px;"<?php }?> class="pos_lmc_li"  <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?> href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/setlocationlink/areaid/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])),$_smarty_tpl);?>
" <?php }else{ ?> href="javascript:void(0)"<?php }?> lm_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" fa="<?php echo $_smarty_tpl->tpl_vars['items']->value['pin'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</a></li>
		  <?php } ?>
	  </ul>

	</div>

		<ul id="item_list_ul_lm_data" class="hidden">
			
				<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
				        <li <?php if ($_smarty_tpl->tpl_vars['myid']->value%4==3){?>style="border-right: 0; width:130px;"<?php }?>> 
				          <a <?php if ($_smarty_tpl->tpl_vars['myid']->value%4==3){?>style="border-right: 0; width:130px;"<?php }?> class="pos_lmc_li" <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?> href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/setlocationlink/areaid/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])),$_smarty_tpl);?>
" <?php }else{ ?> href="javascript:void(0)"<?php }?> fa="<?php echo $_smarty_tpl->tpl_vars['items']->value['pin'];?>
">
				          	<?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>

				          </a>
				        </li>
		          <?php } ?>
	  </ul>
</div>


 <?php }} ?>