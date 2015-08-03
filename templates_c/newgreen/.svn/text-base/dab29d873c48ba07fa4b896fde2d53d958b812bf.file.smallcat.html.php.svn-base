<?php /* Smarty version Smarty-3.1.10, created on 2015-05-21 14:03:20
         compiled from "/data/www/xshc/wmr/templates/newgreen/site/smallcat.html" */ ?>
<?php /*%%SmartyHeaderCode:687336363555d75281c8bd8-39780434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dab29d873c48ba07fa4b896fde2d53d958b812bf' => 
    array (
      0 => '/data/www/xshc/wmr/templates/newgreen/site/smallcat.html',
      1 => 1407549576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '687336363555d75281c8bd8-39780434',
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
    'tempcost' => 0,
    'allcost' => 0,
    'limitcost' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555d7528271b16_89665984',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d7528271b16_89665984')) {function content_555d7528271b16_89665984($_smarty_tpl) {?>

                   	
               

	<div class="new_cart_show new_cart_top">
                   		 <div class="new_cart_goodsname">商品[<font style="color:#f60;cursor: pointer;" onclick="delshopcart();">清空</font>]</div> 
                   	   <div class="new_cart_goodscount">数量</div>	
                   		 <div class="new_cart_goodscost">单价</div>
  </div>
  <?php $_smarty_tpl->tpl_vars['allcost'] = new Smarty_variable(0, null, 0);?> 
  <?php $_smarty_tpl->tpl_vars['tempcost'] = new Smarty_variable(0, null, 0);?> 
 <?php $_smarty_tpl->tpl_vars['limitcost'] = new Smarty_variable(0, null, 0);?> 
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
		   
		   <div class="new_cart_show" id="cartli_<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
"> 
                   	   <div class="new_cart_goodsname"><div class="left_cat_gd"><?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>
</div><div class="left_cat_cls"><span onclick="removesupplierdish(<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['itv']->value['shopid'];?>
);">×</span></div></div> 
                   	   <div class="new_cart_goodscount">
                   	   	<div class="goodscount_bk">
                   	   	<span class="jian" onclick="removeonedish(<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['itv']->value['shopid'];?>
,1);">-</span><input type="text" id="cart_count<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" onblur="modifycart(<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['itv']->value['count'];?>
,<?php echo $_smarty_tpl->tpl_vars['itv']->value['shopid'];?>
);" value="<?php echo $_smarty_tpl->tpl_vars['itv']->value['count'];?>
" data="<?php echo $_smarty_tpl->tpl_vars['itv']->value['count'];?>
" class="goodsnum_show" value="1"><span class="jia"  onclick="uponedish(<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['itv']->value['shopid'];?>
,1);">+</span>
                   	    </div>
                   	   	
                   	   	</div>	
                   		 <div class="new_cart_goodscost">￥<?php echo $_smarty_tpl->tpl_vars['itv']->value['cost'];?>
</div>
       	</div>
		   
		    
		    
		    	    <?php $_smarty_tpl->tpl_vars['tempcost'] = new Smarty_variable($_smarty_tpl->tpl_vars['tempcost']->value+$_smarty_tpl->tpl_vars['itv']->value['cost']*$_smarty_tpl->tpl_vars['itv']->value['count'], null, 0);?> 
		    
		   <?php } ?> 
		  <?php if (is_array($_smarty_tpl->tpl_vars['items']->value['cx']['zid'])){?> 
      <?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['cx']['zid']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?>
			 
		   <?php } ?> 
      <?php }?> 
		 
      <?php $_smarty_tpl->tpl_vars['allcost'] = new Smarty_variable($_smarty_tpl->tpl_vars['items']->value['pscost']+$_smarty_tpl->tpl_vars['items']->value['bagcost']+$_smarty_tpl->tpl_vars['items']->value['cx']['surecost'], null, 0);?> 
		
    <?php $_smarty_tpl->tpl_vars['allcost'] = new Smarty_variable($_smarty_tpl->tpl_vars['allcost']->value, null, 0);?>
    
    <?php $_smarty_tpl->tpl_vars['limitcost'] = new Smarty_variable($_smarty_tpl->tpl_vars['items']->value['limitcost'], null, 0);?>
 <?php }?>
  
 
  
<?php } ?>
<input type="hidden" id="caipincost"  value="<?php echo $_smarty_tpl->tpl_vars['tempcost']->value;?>
">
<input type="hidden" id="cartallcost"  value="<?php echo $_smarty_tpl->tpl_vars['allcost']->value;?>
">
 

<div class="new_cart_bottom" id="new_cat_bottom">
	<?php if ($_smarty_tpl->tpl_vars['limitcost']->value<=$_smarty_tpl->tpl_vars['tempcost']->value){?>
	      <div onclick="ajaxdoorder();" class="ajaxorder">去下单</div>
	<?php }else{ ?>
	<div  class="showlimit">差<?php echo $_smarty_tpl->tpl_vars['limitcost']->value-$_smarty_tpl->tpl_vars['tempcost']->value;?>
元起送</div>
	<?php }?>
	</div>

  
    

 
<?php }} ?>