<?php /* Smarty version Smarty-3.1.10, created on 2015-06-23 16:39:51
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/smallcatding.html" */ ?>
<?php /*%%SmartyHeaderCode:53522848655891b577c1283-17385019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '800329f3768827335f912d6aa0a4bce923a3a114' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/smallcatding.html',
      1 => 1435039647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53522848655891b577c1283-17385019',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cartinfo' => 0,
    'shopid' => 0,
    'ckkey' => 0,
    'items' => 0,
    'itv' => 0,
    'cxdata' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_55891b578ec791_41666668',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55891b578ec791_41666668')) {function content_55891b578ec791_41666668($_smarty_tpl) {?>   
    
    
       <div class="cart_title"><i></i>我的菜篮子</div>
   	 	    <div class="cartgoodslist">
   	 	    	 <ul>
   	 	    	 	 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['ckkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cartinfo']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['ckkey']->value = $_smarty_tpl->tpl_vars['items']->key;
?>  
   <?php if ($_smarty_tpl->tpl_vars['shopid']->value==$_smarty_tpl->tpl_vars['ckkey']->value){?>  
   	 	    	 	<?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?>
   	 	    	 	<li>
   	 	    	 	  <div class="cart_one"><div class="cart_goodsname"><?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>
</div><i onclick="removesupplierdish(<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['itv']->value['shopid'];?>
);"></i></div>
   	 	    	 	  <div class="cart_tow">
   	 	    	 	      <span class="cp_pre" onclick="removeonedish(<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['itv']->value['shopid'];?>
,1);">-</span>
   	 	    	 	      <input type="text" readonly="readonly" class="cinput" value="<?php echo $_smarty_tpl->tpl_vars['itv']->value['count'];?>
">
   	 	    	 	      <span class="cp_next" onclick="uponedish(<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['itv']->value['shopid'];?>
,1);">+</span>
   	 	    	 	      <span class="cp_much">￥<?php echo $_smarty_tpl->tpl_vars['itv']->value['cost'];?>
</span>
   	 	    	 	  </div>	
   	 	    	 	</li>
   	 	    	 	<?php } ?> 
   	 	    	 	<?php }?>
  <?php } ?>
   	 	    	</ul>
   	 	    </div>
   	 	    <div class="cart_bottom">
   	 	    	  <div class="cart_tj">
   	 	    	  	 <div class="cart_sum"><label>商品总价</label><span><?php echo $_smarty_tpl->tpl_vars['items']->value['sum'];?>
元</span></div>
   	 	    	  	 <?php if (isset($_smarty_tpl->tpl_vars['cxdata']->value['gzdata'])){?>
   	 	    	  	 <?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cxdata']->value['gzdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?>
   	 	    	  	  <div class="cart_cx"><em><?php echo $_smarty_tpl->tpl_vars['itv']->value;?>
</em></div>
   	 	    	  	 <?php } ?> 
   	 	    	  	 <?php }?>
   	 	    	  	
   	 	    	  	</div>
   	 	    	    <input type="button" class="next bg" value="仅订桌位" onclick="outdiv_position()"><input type="button" class="next bg" value="下单订位" onclick="outdiv_cart()">
   	 	    </div> 
<?php }} ?>