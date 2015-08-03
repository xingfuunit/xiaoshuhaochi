<?php /* Smarty version Smarty-3.1.10, created on 2015-05-21 14:03:43
         compiled from "/data/www/xshc/wmr/templates/newgreen/site/showcatax.html" */ ?>
<?php /*%%SmartyHeaderCode:771967734555d753faea3d2-93075324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55b70593d762237847c5f7cf6ba19039b17445bd' => 
    array (
      0 => '/data/www/xshc/wmr/templates/newgreen/site/showcatax.html',
      1 => 1407555140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '771967734555d753faea3d2-93075324',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'siteurl' => 0,
    'tempdir' => 0,
    'showtype' => 0,
    'shopinfo' => 0,
    'yanchitime' => 0,
    'cartinfo' => 0,
    'shopid' => 0,
    'ckkey' => 0,
    'items' => 0,
    'itv' => 0,
    'ivalue' => 0,
    'member' => 0,
    'juanlist' => 0,
    'itemm' => 0,
    'areacost' => 0,
    'bagcost' => 0,
    'downcost' => 0,
    'surecost' => 0,
    'myaddressslist' => 0,
    'areainfo' => 0,
    'locationtype' => 0,
    'shownow' => 0,
    'open_acout' => 0,
    'paylist' => 0,
    'itk' => 0,
    'scoretocost' => 0,
    'orderbz' => 0,
    'jisuancost' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555d753fc9eac7_77322967',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d753fc9eac7_77322967')) {function content_555d753fc9eac7_77322967($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/www/xshc/wmr/lib/Smarty/libs/plugins/modifier.date_format.php';
?> <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquerynew.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/allj.js" type="text/javascript" language="javascript"></script>
 <?php if ($_smarty_tpl->tpl_vars['showtype']->value=='market'){?>
  <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/marketcart.js" type="text/javascript" language="javascript"></script> 
 <?php }else{ ?>
  <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/cart.js" type="text/javascript" language="javascript"></script> 
 <?php }?>
  
  
   <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/phonecheck.js" type="text/javascript" language="javascript"></script> 
   <script>
   		 var starttime = '<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['starttime'];?>
'; 
	 var is_orderbefore=<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['is_orderbefore'];?>
;
	 var nowdate = '<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
';
	 var nowtime = '<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %H:%M:%S");?>
';
	 	var submithtml = '<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/makeorder/datatype/json/random/@random@"),$_smarty_tpl);?>
';
	  var orderhtml = '<?php echo FUNC_function(array('type'=>'url','link'=>"/site/waitpay/orderid/@orderid@"),$_smarty_tpl);?>
';
	  <?php $_smarty_tpl->tpl_vars['yanchitime'] = new Smarty_variable(time()+$_smarty_tpl->tpl_vars['shopinfo']->value['maketime']*60, null, 0);?>
	  var maketime = '<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['yanchitime']->value,"%Y-%m-%d %H:%M:%S");?>
';
 $(function(){ 	
	maketimenenu();
	var yanse = $('.remark_li').find('li');
	 $.each(yanse, function(i,val){    
	  if(i%4 == 0){
	  	 $(val).css('background-color','#51cef7');
	  }else if(i%4 == 1){
	  	$(val).css('background-color','#e46ecc');
	  }else if(i%4 == 2){
	  		$(val).css('background-color','#ffb644');
	  }else if(i%4 == 3){
	  	$(val).css('background-color','#70c305');
	  }
  });
	
});
$('#remark_li li').click(function(){
	var value = $('#remark').val()+$(this).text() + ',';
	$('#remark').val(value);
})
	  </script>
      <?php $_smarty_tpl->tpl_vars['allcost'] = new Smarty_variable(0, null, 0);?> 
      <?php $_smarty_tpl->tpl_vars['truecost'] = new Smarty_variable(0, null, 0);?>  
      <?php $_smarty_tpl->tpl_vars['areacost'] = new Smarty_variable(0, null, 0);?> 
      <?php $_smarty_tpl->tpl_vars['bagcost'] = new Smarty_variable(0, null, 0);?> 
      <?php $_smarty_tpl->tpl_vars['downcost'] = new Smarty_variable(0, null, 0);?> 
      <?php $_smarty_tpl->tpl_vars['surecost'] = new Smarty_variable(0, null, 0);?> 
 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['ckkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cartinfo']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['ckkey']->value = $_smarty_tpl->tpl_vars['items']->key;
?>  
       <?php if ($_smarty_tpl->tpl_vars['shopid']->value==$_smarty_tpl->tpl_vars['ckkey']->value){?>   
<div class="ajaxcart_top" id="checktj_newcart">
	  <div class="left_title">提交订单</div>
	  <div class="right_title" onclick="close_ajaxcart();">×</div>
</div> 
<div class="ajaxcart_middle">
	<table border="0" cellspacing="0" cellpadding="0"  style="width:788px;border:1px solid #ddd;" align="center">
		<tr>
		<th class="tr1">商品名称</th>
		<th class="tr2">单价<font style="font-size:10px;">(元/份)</font></th>
		<th class="tr3">打包费<font style="font-size:10px;">(元/份)</font></th>
		<th class="tr4">数量<font style="font-size:10px;">(份)</th>
		<th class="tr5">小计<font style="font-size:10px;">(元)</th>
  	</tr>
  	 <?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?> 
  	<tr>
		<td class="tr1">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>
</td>
		<td class="tr2"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['itv']->value['cost'])===null||$tmp==='' ? '0' : $tmp);?>
</td>
		<td class="tr3"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['itv']->value['bagcost'])===null||$tmp==='' ? '0' : $tmp);?>
</td>
		<td class="tr4"><?php echo $_smarty_tpl->tpl_vars['itv']->value['count'];?>
<?php if ($_smarty_tpl->tpl_vars['itv']->value['store_num']<$_smarty_tpl->tpl_vars['itv']->value['count']){?><font color=red>库存不足</font><?php }?></td>
		<td class="tr5"><?php echo $_smarty_tpl->tpl_vars['itv']->value['cost']*$_smarty_tpl->tpl_vars['itv']->value['count']+$_smarty_tpl->tpl_vars['itv']->value['bagcost']*$_smarty_tpl->tpl_vars['itv']->value['count'];?>
</td>
  	</tr>
		<?php } ?>
		<?php if (isset($_smarty_tpl->tpl_vars['items']->value['cx']['gzdata'])&&count($_smarty_tpl->tpl_vars['items']->value['cx']['gzdata'])>0){?> 
       	<?php  $_smarty_tpl->tpl_vars['ivalue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ivalue']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['cx']['gzdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ivalue']->key => $_smarty_tpl->tpl_vars['ivalue']->value){
$_smarty_tpl->tpl_vars['ivalue']->_loop = true;
?>
    <tr>
		   <td class="tr1" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['ivalue']->value;?>
(<font style="color:red;font-size:10px;">满足的促销活动</font>)</td> 
  	</tr>
      <?php } ?> 
    <?php }?> 
    
  
    
      <?php if ($_smarty_tpl->tpl_vars['member']->value['uid']>0){?>
       <tr>
		        <td class="tr1" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;假如你有优惠劵,<a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/base"),$_smarty_tpl);?>
">进入会员中心绑定</a></td> 
  	  </tr>
       <?php  $_smarty_tpl->tpl_vars['itemm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['juanlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemm']->key => $_smarty_tpl->tpl_vars['itemm']->value){
$_smarty_tpl->tpl_vars['itemm']->_loop = true;
?> 
        				   	
     <tr>
		      <td class="tr1" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="buyjuan" <?php if ($_smarty_tpl->tpl_vars['items']->value['sum']<$_smarty_tpl->tpl_vars['itemm']->value['limitcost']){?> disabled <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['itemm']->value['id'];?>
" data="<?php echo $_smarty_tpl->tpl_vars['itemm']->value['cost'];?>
" data2="<?php echo $_smarty_tpl->tpl_vars['itemm']->value['limitcost'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemm']->value['name'];?>
(说明：优惠<?php echo $_smarty_tpl->tpl_vars['itemm']->value['cost'];?>
元),注意：订单最低金额<?php echo $_smarty_tpl->tpl_vars['itemm']->value['limitcost'];?>
元,截止时间:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['itemm']->value['endtime'],"%Y-%m-%d");?>
</td> 
  	  </tr>    				   	
        				   	
       
        				   	<?php } ?> 
        				  <?php }else{ ?>
      <tr>
		      <td class="tr1" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;假如你有优惠劵,请先登录在使用优惠劵<a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/login"),$_smarty_tpl);?>
">点击登录</a></td> 
  	  </tr>
         
      <?php }?>
    
     <?php $_smarty_tpl->tpl_vars['allcost'] = new Smarty_variable($_smarty_tpl->tpl_vars['items']->value['sum'], null, 0);?> 
		    <?php $_smarty_tpl->tpl_vars['areacost'] = new Smarty_variable($_smarty_tpl->tpl_vars['areacost']->value+$_smarty_tpl->tpl_vars['items']->value['pscost'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['bagcost'] = new Smarty_variable($_smarty_tpl->tpl_vars['bagcost']->value+$_smarty_tpl->tpl_vars['items']->value['bagcost'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['downcost'] = new Smarty_variable($_smarty_tpl->tpl_vars['downcost']->value+$_smarty_tpl->tpl_vars['items']->value['cx']['downcost'], null, 0);?> 
       <?php $_smarty_tpl->tpl_vars['surecost'] = new Smarty_variable($_smarty_tpl->tpl_vars['surecost']->value+$_smarty_tpl->tpl_vars['items']->value['cx']['surecost'], null, 0);?>
	</table>
	
	<div class="cart_out_show"> 
		<label >地址详情:</label>
	<input type="text" id="addrestemp" name="addrestemp" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['myaddressslist']->value['address'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['areainfo']->value : $tmp);?>
" data="<?php if ($_smarty_tpl->tpl_vars['locationtype']->value!=1){?><?php echo $_smarty_tpl->tpl_vars['areainfo']->value;?>
<?php }?>"  size="50">
		 <span class="hc_order_lists_span_color"> * </span>
	</div>
	<div class="cart_out_show"> 
		<label >联系电话:</label>
		<input type="text" id="phone" name="phone" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['myaddressslist']->value['phone'])===null||$tmp==='' ? '' : $tmp);?>
"  size="15">
	 
   	<span class="hc_order_lists_span" id="uphone" >外卖到时将以该电话通知您</span>
	</div>
	<div class="cart_out_show"> 
		<label >联 系 人:</label>
		<input type="text" id="recieve_name" name="recieve_name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['myaddressslist']->value['contactname'])===null||$tmp==='' ? '' : $tmp);?>
"  size="15">
		 <span class="hc_order_lists_span_color"> * </span>
	</div>
	<div class="cart_out_show"> 
		<label >配送方式:</label> 
		 <span style="line-height:30px;"> <?php if ($_smarty_tpl->tpl_vars['items']->value['pstype']==1){?>网站配送<?php }else{ ?>店铺配送<?php }?> </span>
	</div>
	<div class="cart_out_show"> 
		<label >配送时间:</label>
		 <select name="senddate"  style="width: 232px;margin:0px; height:30px; border-radius: 4px 4px 4px 4px;" onchange="maketimenenu();">
								   	 <?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['befortime']>0){?>
								   	    <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(time(), null, 0);?>   
								   	    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['shopinfo']->value['befortime']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								            <option value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['shownow']->value,"%Y-%m-%d");?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['shownow']->value,"%Y-%m-%d");?>
</option>
								          
								            <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable($_smarty_tpl->tpl_vars['shownow']->value+86400, null, 0);?>  
                          <?php endfor; endif; ?>  
								   	 <?php }else{ ?>
								   	  <option value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
"><?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
</option>
								   	  <?php }?> 
								  </select> 
							 
							  	<select id="orderTime"  style="width: 232px;margin:0px; height:30px; border-radius: 4px 4px 4px 4px;"> 
								  </select>  
	</div>
	
	<div class="cart_out_show"> 
		<label >支付方式:</label> 
		 <div class="cart_pay_l"> <input type="radio" name="paytype" value="outpay" checked>货到支付</div>
							              <?php if ($_smarty_tpl->tpl_vars['open_acout']->value==1){?>
							              <?php if ($_smarty_tpl->tpl_vars['open_acout']->value==1&&!empty($_smarty_tpl->tpl_vars['member']->value)){?>
			<div class="cart_pay_l">				              <input type="radio" name="paytype" value="open_acout" >账户余额支付(我的余额<?php echo (($tmp = @$_smarty_tpl->tpl_vars['member']->value['cost'])===null||$tmp==='' ? '0' : $tmp);?>
元) </div>
							              <?php }?>
							              <?php if (isset($_smarty_tpl->tpl_vars['paylist']->value)&&is_array($_smarty_tpl->tpl_vars['paylist']->value)){?>
							              <?php  $_smarty_tpl->tpl_vars['itk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itk']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itk']->key => $_smarty_tpl->tpl_vars['itk']->value){
$_smarty_tpl->tpl_vars['itk']->_loop = true;
?>  
			<div class="cart_pay_l">				              <input type="radio" name="paytype" value="<?php echo $_smarty_tpl->tpl_vars['itk']->value['loginname'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['itk']->value['logourl'];?>
">  </div>
							              <?php } ?>
							              <?php }?>
							              <?php }?>
	</div>
	<div class="cart_out_show" id="jifendkou" jfendata="<?php echo $_smarty_tpl->tpl_vars['scoretocost']->value;?>
" data="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['member']->value['score'])===null||$tmp==='' ? 0 : $tmp);?>
" <?php if ($_smarty_tpl->tpl_vars['member']->value['uid']<1){?>style="display:none;"<?php }?>> 
		<label> 积分抵扣:</label> 
		<span id="activeJifenselect"></span>
		<span class="hc_order_lists_span_color" style="float:left;"> 抵扣比例：<?php echo $_smarty_tpl->tpl_vars['scoretocost']->value;?>
积分抵扣1元  </span>
	</div>
 <div class="cart_out_show"> 
		<label > 备 注 &nbsp; :</label> 
		<textarea name="remark" id="remark" style="width:200px;height:60px;float:left;"></textarea>
		<div  class="remark_li" id="remark_li">
			<ul>
						<?php if (isset($_smarty_tpl->tpl_vars['orderbz']->value)&&!empty($_smarty_tpl->tpl_vars['orderbz']->value)){?>
						<?php $_smarty_tpl->tpl_vars['orderbz'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['orderbz']->value), null, 0);?>
						 <?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orderbz']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?>
						  <?php if (!empty($_smarty_tpl->tpl_vars['itv']->value)){?>
						<li><?php echo $_smarty_tpl->tpl_vars['itv']->value;?>
</li>
						 <?php }?>
						<?php } ?> 					
						<?php }?>		 
		  </ul>
		</div>
	</div>
	
	
	
</div>
<div class="ajaxcart_bottom" style="clear:both;">
	<div style="height:10px;"></div>
	 <table border="0" cellspacing="0" cellpadding="0"  style="width:780px;" align="center">
	 	<tr>
	 		 <td class="td1"> 配送费</td>
	 		 <td class="td1">打包费</td>
	 		 <td  class="td1">积分抵扣</td>
	 			<td class="td1">优惠卷</td>
	 			<td class="td1">优惠</td>
	 			<td class="td1">商品总价</td>
	 			<td class="td1">订单实价</td>
	 			<td rowspan="2" style="width:120px;text-align:center;"><div class="new_cart_onsub" onclick="orderSubmit();" id="showtj">提交订单</div>
	 				<div class="new_cart_onsub"   id="showtj2" style="display:none;">处理中..</div></td>
	 			<td rowspan="2" style="width:100px;text-align:center;"><div class="new_cart_oncls" onclick="close_ajaxcart();">继续下单</div></td>
	 	</tr>
	 	<tr>
	 		<td class="td1"> ￥<?php echo $_smarty_tpl->tpl_vars['items']->value['pscost'];?>
</td>
	 		<td class="td1">￥<?php echo $_smarty_tpl->tpl_vars['items']->value['bagcost'];?>
</td>
	 		<td class="td1">￥<font id="jfcost">0</font></td>
	 			<td class="td1">￥<font id="yhjcost">0</font></td>
	 			<td class="td1">￥<?php echo $_smarty_tpl->tpl_vars['items']->value['cx']['downcost'];?>
</td>
	 			<td class="td1">￥<?php echo $_smarty_tpl->tpl_vars['items']->value['sum'];?>
</td>
	 			<?php $_smarty_tpl->tpl_vars['jisuancost'] = new Smarty_variable($_smarty_tpl->tpl_vars['surecost']->value+$_smarty_tpl->tpl_vars['bagcost']->value+$_smarty_tpl->tpl_vars['areacost']->value, null, 0);?>
	 			<td class="td1" id="surecost" data="<?php echo $_smarty_tpl->tpl_vars['surecost']->value;?>
"  bagcost="<?php echo $_smarty_tpl->tpl_vars['bagcost']->value;?>
" areacost="<?php echo $_smarty_tpl->tpl_vars['areacost']->value;?>
" alldata="<?php echo $_smarty_tpl->tpl_vars['jisuancost']->value;?>
">￥<?php echo $_smarty_tpl->tpl_vars['jisuancost']->value;?>
</td>
	 		 
	 	</tr>
	</table>
	
</div>
 <?php }?>
 <?php } ?> 

     <?php }} ?>