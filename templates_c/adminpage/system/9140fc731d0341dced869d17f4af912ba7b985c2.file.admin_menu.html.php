<?php /* Smarty version Smarty-3.1.10, created on 2015-05-21 13:49:28
         compiled from "/data/www/xshc/wmr/templates/adminpage/public/admin_menu.html" */ ?>
<?php /*%%SmartyHeaderCode:820507743555d71e8ebf566-09826181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9140fc731d0341dced869d17f4af912ba7b985c2' => 
    array (
      0 => '/data/www/xshc/wmr/templates/adminpage/public/admin_menu.html',
      1 => 1411638900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '820507743555d71e8ebf566-09826181',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'moduleparent' => 0,
    'moduleall' => 0,
    'itv' => 0,
    'admininfo' => 0,
    'menulist' => 0,
    'items' => 0,
    'Taction' => 0,
    'tmodule' => 0,
    'moduleid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555d71e8f33bf1_53771899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d71e8f33bf1_53771899')) {function content_555d71e8f33bf1_53771899($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/data/www/xshc/wmr/lib/Smarty/libs/plugins/function.load_data.php';
?>  
    <?php if ($_smarty_tpl->tpl_vars['moduleparent']->value>0){?> 
           <?php echo smarty_function_load_data(array('assign'=>"moduleall",'table'=>"module",'limit'=>"20",'orderby'=>"id asc",'where'=>"id ='".((string)$_smarty_tpl->tpl_vars['moduleparent']->value)."' or parent_id = '".((string)$_smarty_tpl->tpl_vars['moduleparent']->value)."'"),$_smarty_tpl);?>
 
          <?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['moduleall']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?>  
          
                <?php echo smarty_function_load_data(array('assign'=>"menulist",'table'=>"menu",'limit'=>"20",'orderby'=>"id asc",'where'=>"moduleid ='".((string)$_smarty_tpl->tpl_vars['itv']->value['id'])."' and `group` = ".((string)$_smarty_tpl->tpl_vars['admininfo']->value['group'])),$_smarty_tpl);?>
 
                 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>   
   	 	    	            	<li><div class="leftarrow"></div><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/".((string)$_smarty_tpl->tpl_vars['itv']->value['name'])."/module/".((string)$_smarty_tpl->tpl_vars['items']->value['name'])),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['Taction']->value==$_smarty_tpl->tpl_vars['itv']->value['name']&&$_smarty_tpl->tpl_vars['items']->value['name']==$_smarty_tpl->tpl_vars['tmodule']->value){?>class="on"<?php }?>><?php echo $_smarty_tpl->tpl_vars['items']->value['cnname'];?>
</a></li>
                 <?php } ?>
          <?php } ?> 
    <?php }else{ ?> 
        <?php echo smarty_function_load_data(array('assign'=>"moduleall",'table'=>"module",'limit'=>"20",'orderby'=>"id asc",'where'=>"id ='".((string)$_smarty_tpl->tpl_vars['moduleid']->value)."' or parent_id = '".((string)$_smarty_tpl->tpl_vars['moduleid']->value)."'"),$_smarty_tpl);?>
 
          <?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['moduleall']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?>  
                <?php echo smarty_function_load_data(array('assign'=>"menulist",'table'=>"menu",'limit'=>"20",'orderby'=>"id asc",'where'=>"moduleid ='".((string)$_smarty_tpl->tpl_vars['itv']->value['id'])."' and `group` = ".((string)$_smarty_tpl->tpl_vars['admininfo']->value['group'])),$_smarty_tpl);?>
 
                 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>   
   	 	    	            	<li><div class="leftarrow"></div><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/".((string)$_smarty_tpl->tpl_vars['itv']->value['name'])."/module/".((string)$_smarty_tpl->tpl_vars['items']->value['name'])),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['Taction']->value==$_smarty_tpl->tpl_vars['itv']->value['name']&&$_smarty_tpl->tpl_vars['items']->value['name']==$_smarty_tpl->tpl_vars['tmodule']->value){?>class="on"<?php }?>><?php echo $_smarty_tpl->tpl_vars['items']->value['cnname'];?>
</a></li>
                 <?php } ?>
          <?php } ?> 
    <?php }?>
    
    
    
  
 <?php }} ?>