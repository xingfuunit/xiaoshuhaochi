<?php /* Smarty version Smarty-3.1.10, created on 2015-06-29 17:57:30
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/order/adminpage/ordertoday.html" */ ?>
<?php /*%%SmartyHeaderCode:21456378435591168a722c89-51060319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd62742528910b1ab7f9dfaa79b13bade13498826' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/order/adminpage/ordertoday.html',
      1 => 1434531488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21456378435591168a722c89-51060319',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'siteurl' => 0,
    'tempdir' => 0,
    'arealist' => 0,
    'items' => 0,
    'frinput' => 0,
    'playwave' => 0,
    'statustype' => 0,
    'dno' => 0,
    'showdet' => 0,
    'list' => 0,
    'paytypearr' => 0,
    'backarray' => 0,
    'buyerstatus' => 0,
    'value' => 0,
    'scoretocost' => 0,
    'toplink' => 0,
    'sitename' => 0,
    'beian' => 0,
    'footerdata' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5591168a98fe88_29926542',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5591168a98fe88_29926542')) {function content_5591168a98fe88_29926542($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商家自助管理后台</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/css/commom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/css/shangjiaAdmin.css" />
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/allj.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/artDialog.js?skin=blue"></script>
<script> 
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
"; 
</script>
</head>
<body>
	<div style="position: fixed;top: 0;left: 0;right: 0;bottom: 0;z-index: -1;background:url(<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/background.png);"></div>
<!---header start--->
<div class="header" style=" height:50px;">
  <div class="top" style=" height:50px;">
   
   
    <div class="topRight fr">  <span style=" height:50px; line-height:50px;cursor: pointer;" class="username" onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/orderlist"),$_smarty_tpl);?>
');">返回后台管理<img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/usernameBg.png" /></span> </div>
    <div class="cl"></div>
    <div class="shangjiaTop" style=" top:-22px; background:none;margin-left:-150px;">
      <div class="sjglaa"> </div>
    </div>
  </div>
</div>

<!---header end---> 
	
	
<div class="main">
	
	<div class="main_titile">
	<div class="main_tl">
		<div class="qhaddress fl">
			<select name="firstarea" onchange="dofirch(this);">
      		 		<option value="">选择区域</option> 
      		        <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arealist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>  
                               <option value="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['items']->value['id']==$_smarty_tpl->tpl_vars['frinput']->value){?>selected<?php }?>>
                               	   <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['one'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['one']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['name'] = 'one';
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['items']->value['space']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['one']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['one']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['one']['total']);
?> 
                               	   &nbsp;&nbsp;
                                  <?php endfor; endif; ?>  <?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
 
                               </option>
                                  
                         <?php } ?> 
      		  
      		  </select>
		</div>
		<div  class="auto_time fl">
			<span id="showztai" style="color:#666;"  data="20"> 0 </span>秒
		</div>
		<div class=" shoushua fl" onclick="gorefresh();" style="cursor: pointer;">
			手动刷新
		</div>
		  <div class="closeVoi fl">
        <input type="checkbox" name="playwave" id="playwave" value="1" <?php if ($_smarty_tpl->tpl_vars['playwave']->value!=2){?>checked<?php }?> style="cursor: pointer;">
          播放铃声</div>
	</div>	 
		 <div class="dingdanGl fl">
		 
			<ul>
				<li <?php if (empty($_smarty_tpl->tpl_vars['statustype']->value)){?>class="on"<?php }?> style="cursor: pointer;"  data="0"><span>所有</span> </li>
				<li <?php if ($_smarty_tpl->tpl_vars['statustype']->value==1){?>class="on"<?php }?> style="cursor: pointer;" data="1"><span>待审核订单</span> </li>
				<li <?php if ($_smarty_tpl->tpl_vars['statustype']->value==2){?>class="on"<?php }?> style="cursor: pointer;" data="2"><span>待发货订单</span> </li>
				<li <?php if ($_smarty_tpl->tpl_vars['statustype']->value==3){?>class="on"<?php }?> style="cursor: pointer;" data="3"><span>已发货订单</span> </li>
				<li <?php if ($_smarty_tpl->tpl_vars['statustype']->value==4){?>class="on"<?php }?> style="cursor: pointer;" data="4"><span>退款处理</span> </li>
			</ul>
			<div class="cl"></div>
		 </div>
		
		
	</div>
	<div class="cl"></div>
	
	
	<div class="main_ord_list">
		<div style="margin-bottom:15px;">
		<div class="chaxun fl">
		
			<input class="chainp" placeholder="输入订单号" type="text" name="dno" id="dno" value="<?php echo $_smarty_tpl->tpl_vars['dno']->value;?>
" />
			<input class="chaxunhBg" type="button" name="" value="" onclick="gorefresh();" style="cursor: pointer;">
			<div class="cl"></div>
		</div>
		
		<div class="ycOrd fr">
			 
		  
		  <label>
					<input type="checkbox" name="showdet" id="showdet" value="1" <?php if ($_smarty_tpl->tpl_vars['showdet']->value!=1){?>checked<?php }?>>
					  隐藏订单详情
			</label>
			
		</div>
			<div class="cl"></div>
		
		</div>
		
		
		
		
		<div class="order_list_show">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#544e48">
	<th>联系人</th>
	<th>联系电话</th>
	  <th>地址</th>
    <th>IP地址</th>
    <th>下单次数</th>
    <th>订单价格</th>
    <th>操作</th>
  </tr>
 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
	  <tr class="orLiheight" align="center" bgcolor="#6596a6">
		<td><?php echo $_smarty_tpl->tpl_vars['items']->value['buyername'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['items']->value['buyerphone'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['items']->value['buyeraddress'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['items']->value['ipaddress'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['items']->value['maijiagoumaishu'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['items']->value['allcost'];?>
</td>
		
		<td style=" color:#bceafe;  font-weight:bold;" class="buttd">
		  	<?php if ($_smarty_tpl->tpl_vars['items']->value['status']==0){?> 
		  	<a class="passorder curbtn" onclick="return remind(this);" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/ordercontrol/id/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."/type/pass/datatype/json"),$_smarty_tpl);?>
">
				   审核
				</a>
				
	     <a class=" curbtn"  onclick="unorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['items']->value['dno'];?>
);" href="#">
	   	     取消
	     	</a>
	     	<?php }elseif($_smarty_tpl->tpl_vars['items']->value['status']==1){?>
	     	    <?php if ($_smarty_tpl->tpl_vars['items']->value['is_make']==0){?>
	     	    <span>
                  待商家确认
  	         </span>
  	         
	     	    <?php }elseif($_smarty_tpl->tpl_vars['items']->value['is_make']==1){?> 
	     	   	 <a class="sendorder curbtn"  onclick="return remind(this);" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/ordercontrol/id/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."/type/send/datatype/json"),$_smarty_tpl);?>
">
                  发货
  	         </a> 
  	         <?php }else{ ?>
  	          商品不制作该订单
	     	   <?php }?> 
	     	   <a class="sendorder curbtn"  onclick="unorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['items']->value['dno'];?>
);" href="#">
                 取消
  	         </a>
	     	 <?php }elseif($_smarty_tpl->tpl_vars['items']->value['status']==2){?>
	     	     <a class="sendorder curbtn" onclick="return remind(this);" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/ordercontrol/id/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."/type/over/datatype/json"),$_smarty_tpl);?>
">
                 完成
  	         </a>
  	         <a class="sendorder curbtn"  onclick="unorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['items']->value['dno'];?>
);" href="#">
                 取消
  	         </a>
  	      <?php }elseif($_smarty_tpl->tpl_vars['items']->value['status']==3){?>
  	          
  	     <?php }else{ ?>
  	        <a class="sendorder curbtn" onclick="return remind(this);" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/ordercontrol/id/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."/type/del/datatype/json"),$_smarty_tpl);?>
">
                 删除
  	         </a>
	     	<?php }?>
	     	 
	    
	   	
		              
		              
	   	
	   	  <span class="chakan curbtn" data="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">查看</span>	</td>
	  </tr>
	  <tr> 
	  <td colspan=7">
		<table class="xqOrderlist showdet_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"  width="100%" align="center" border="" cellpadding="0" cellspacing="0" bordercolor="#6596a9" >
            <tr align="center">
              <td><div><span  style=" color:#bceafe; font-size:14px; ">支付方式: </span><span><?php echo $_smarty_tpl->tpl_vars['paytypearr']->value[$_smarty_tpl->tpl_vars['items']->value['paytype']];?>
(<?php if ($_smarty_tpl->tpl_vars['items']->value['paystatus']==1){?>已付<?php }else{ ?>未付<?php }?>)<font color=red><?php echo $_smarty_tpl->tpl_vars['backarray']->value[$_smarty_tpl->tpl_vars['items']->value['is_reback']];?>
</font></span></div></td>
              <td><div><span  style=" color:#bceafe; font-size:14px; ">订单状态: </span><span><?php echo $_smarty_tpl->tpl_vars['buyerstatus']->value[$_smarty_tpl->tpl_vars['items']->value['status']];?>
</span></div></td>
              <td colspan="2"><div><span  style=" color:#bceafe; font-size:14px; ">配送时间:</span> <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['posttime'],"%Y-%m-%d %H:%M:%S");?>
</span></div></td>
              
            </tr>
            <tr>
                <td ><div><span  style=" color:#bceafe; font-size:14px; ">店铺: </span><span><?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
</span></div></td>
			         <td colspan="3"><div><span  style=" color:#bceafe; font-size:14px; ">店铺联系电话: </span><span><?php echo $_smarty_tpl->tpl_vars['items']->value['shopphone'];?>
</span></div></td>
            </tr>
            <tr>
                <td ><div><span  style=" color:#bceafe; font-size:14px; ">订单备注: </span><span><?php echo $_smarty_tpl->tpl_vars['items']->value['content'];?>
</span></div></td>
			         <td colspan="3"><div><span  style=" color:#bceafe; font-size:14px; ">配送: </span><span><?php if ($_smarty_tpl->tpl_vars['items']->value['pstype']==0){?>网站<?php }else{ ?>店铺<?php }?></span></div></td>
            </tr>
             
		         	<tr><td colspan="4" style="height:20px;"></td></tr>
		         	<tr>
                <td style=" color:#bceafe; font-size:14px; font-weight:bold;">美食篮子</td>
                <td style=" font-size:14px; color:#ffffff;font-family:'微软雅黑';"  align="center">单价</td>
                  <td style=" font-size:14px; color:#ffffff; font-family:'微软雅黑';"  align="center" align="center">
                数量
                  </td>
                  <td style=" font-size:14px; color:#ffffff; font-family:'微软雅黑';"  align="center" align="center">
                总价
                  </td>
              </tr>
              <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['detlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>   
              <tr>
                  <td  style=" color:#bceafe; font-size:14px; font-weight:bold;" ><?php echo $_smarty_tpl->tpl_vars['value']->value['goodsname'];?>
<?php if ($_smarty_tpl->tpl_vars['value']->value['is_send']==1){?><font color=red>[赠品]</font><?php }?></td>
                  <td style=" font-size:14px; color:#ffffff;  "  align="center"><?php echo $_smarty_tpl->tpl_vars['value']->value['goodscost'];?>
</td>
                  <td style=" font-size:14px; color:#ffffff;  "  align="center" align="center"> <?php echo $_smarty_tpl->tpl_vars['value']->value['goodscount'];?>
 </td>
                  <td style=" font-size:14px; color:#ffffff; "  align="center" align="center">  <?php echo $_smarty_tpl->tpl_vars['value']->value['goodscost']*$_smarty_tpl->tpl_vars['value']->value['goodscount'];?>
  </td>
              </tr> 
             <?php } ?>    
              <tr>
                <td  colspan=" 4" >
                	
                	 <?php if ($_smarty_tpl->tpl_vars['items']->value['shopcost']>0){?>
		            		   	<span style=" color:#bceafe; font-size:14px; font-weight:bold;" >商品总价：</span> <?php echo $_smarty_tpl->tpl_vars['items']->value['shopcost'];?>
   &nbsp;&nbsp;&nbsp;   
		            		 		<?php }?>
		            		 		 <?php if ($_smarty_tpl->tpl_vars['items']->value['shopps']>0){?>
		            		   	<span style=" color:#bceafe; font-size:14px; font-weight:bold;" > 配送费：</span><?php echo $_smarty_tpl->tpl_vars['items']->value['shopps'];?>
  &nbsp;&nbsp;&nbsp;   
		            		 		<?php }?> 
		            		 		<?php if ($_smarty_tpl->tpl_vars['items']->value['scoredown']>0){?>
		            		   	<span style=" color:#bceafe; font-size:14px; font-weight:bold;" >积分低扣：</span>-<?php echo $_smarty_tpl->tpl_vars['items']->value['scoredown']/$_smarty_tpl->tpl_vars['scoretocost']->value;?>
&nbsp;&nbsp;&nbsp; 
		            		 		<?php }?>
		            		 		<?php if ($_smarty_tpl->tpl_vars['items']->value['yhjcost']>0){?>
		            		   	<span style=" color:#bceafe; font-size:14px; font-weight:bold;" >优惠券低扣：</span>-<?php echo $_smarty_tpl->tpl_vars['items']->value['yhjcost'];?>
&nbsp;&nbsp;&nbsp; 
		            		 		<?php }?>
		            		 		<?php if ($_smarty_tpl->tpl_vars['items']->value['cxcost']>0){?>
		            		   	<span style=" color:#bceafe; font-size:14px; font-weight:bold;" >店铺促销：</span>-<?php echo $_smarty_tpl->tpl_vars['items']->value['cxcost'];?>
&nbsp;&nbsp;&nbsp;
		            		 		<?php }?>
		            		 		<?php if ($_smarty_tpl->tpl_vars['items']->value['bagcost']>0){?>
		            		   	<span style=" color:#bceafe; font-size:14px; font-weight:bold;" >打包费：</span><?php echo $_smarty_tpl->tpl_vars['items']->value['bagcost'];?>
&nbsp;&nbsp;&nbsp;
		            		 		<?php }?>
                	      <span style=" color:#bceafe; font-size:14px; font-weight:bold;" >应收金额：</span><?php echo $_smarty_tpl->tpl_vars['items']->value['allcost'];?>
</td> 
              </tr> 
          </table>
		 </td>
	  </tr>
	  <tr class="noord"><td colspan="7"></td></tr>
	 <?php } ?> 
   </table>
		
		</div>
	
		
		
		
		
		
		
	</div>
	
	
		
		
</div>
	
	
	
	
	
	
	
	
	  <div id="palywave" style="display:none;"></div>
<!------以下是公共的底部部分------->
    <div class="footer">
    	<div class="foot1">
        <center>
        	<div class="db">
        	   <?php if (!empty($_smarty_tpl->tpl_vars['toplink']->value)){?>
	 	      <?php $_smarty_tpl->tpl_vars['toplink'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['toplink']->value), null, 0);?>
		  	  <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['toplink']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?> 
			         <a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['typeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['typename'];?>
</a> | 
			    <?php } ?>
			<?php }?> 
         
            </div></center>
            <div class="cl"></div>
        </div>
        <div class="foot2">
        	<p>@2008-2012 <?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['beian']->value;?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['footerdata']->value);?>
</p>
        </div>
    </div>
 <script>
   
 	<?php if ($_smarty_tpl->tpl_vars['showdet']->value!=1){?>
 	   $('.xqOrderlist').hide();
 	<?php }?>
 	<?php if ($_smarty_tpl->tpl_vars['playwave']->value!=2){?> 
 	var playwave = true;  	
 	<?php }else{ ?>
 		var playwave = false;  	
 	<?php }?>
		$(function(){
			//$(document.body).height()
			 var newiheight = Number($(window).height())- 300;
			$('.main').css('min-height',newiheight+'px');
			 $("input[name='playwave']").click(function(){
			 	   if($(this).is(':checked') == true){
			 	   	   playwave =   true;
						  ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/wavecontrol/type/openwave/datatype/json"),$_smarty_tpl);?>
',''); 
			 	   }else{
			 	   		  playwave = false;
					    	ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/wavecontrol/type/closewave/datatype/json"),$_smarty_tpl);?>
',''); 
			 	   } 
						
				});	 
			$(".chakan").click(function(){
			
				$(".showdet_"+$(this).attr('data')).toggle();
			});
			$("input[name='showdet']").click(function(){
				   if($(this).is(':checked') == true){
				   	$('.xqOrderlist').hide();
				  }else{
				  	$('.xqOrderlist').show();
				  }
			});
			$('.dingdanGl li').click(function(){
				   $(this).addClass('on').siblings().removeClass('on');
				   gorefresh();
			});
		});
	function gorefresh(){
		var statustype = $('.dingdanGl').find('.on').eq(0).attr('data');
		var dno = $('#dno').val();
		var showdet =   $("input[name='showdet']").is(':checked') == true?0:1;
		var firstarea =$("select[name='firstarea']").find("option:selected").val();
		var oplink = siteurl+'/index.php?controller=adminpage&action=order&module=ordertoday&statustype='+statustype+'&dno='+dno+'&showdet='+showdet+'&firstarea='+firstarea;
	    window.location.href=oplink;
	}
		 
 </script>
 <script type="text/javascript">
   function colorred(obj){
   	$(obj).css('background','#eee'); 
   }
   function tcolorred(obj){
   	$(obj).css('background','');
   }
    function unorder(orderid,dno)
	 { 
	 	   var htmls = '<div class="replayask">';
	 	   htmls +='<table border=0 width="250">';
        htmls +='<tbody>';
        htmls +='<tr> ';
        htmls +='<td style="border:none;text-align:left;"><textarea style="width:100%;height:100px;color:#ddd;" name="reason" id="reason" placeholder="关闭理由">关闭理由</textarea></td> </tr> '; 
       htmls +='<tr>   <td style="border:none;"><input type="checkbox" value="1" name="suresend" id="suresend">发送关闭理由给买家手机</td></tr>';
        htmls +='<tr>   <td style="border:none;"><a href="#" class="button fr saveImgInfo" style="margin-right:10px;" onclick="sureclose('+orderid+');">提交关闭</a></td>';
        htmls +='  </tr>  </tbody> </table> </div> '; 

	 	   
	 	   var dialog =  art.dialog({
	 	   	id:'coslid',
        title:'取消订单'+dno,
           content: htmls
        });
	 }
	  $('#reason').live("click", function() {   
 	 var checka = $(this).attr('placeholder');
 	 var checkb = $(this).val();
 	 if(checka == checkb){
 	    $(this).val('');
 	    $(this).css('color','#333');
 	 }
 });
 $('#reason').blur(function(){
 	     var checka = $(this).attr('placeholder');
 	    var checkb = $(this).val();
 	    if(checka == checkb){
 	      $(this).css('color','#ddd');
 	    }else{
 	       if(checkb == ''){
 	          $(this).val(checka);
 	           $(this).css('color','#ddd');
 	       }else{
 	       	$(this).css('color','#333');
 	      }
 	    }
 	    
  });

	 function sureclose(orderid)
	 {
	 	  var reasons = $('#reason').val();
	 	  var suresend = $("input[name='suresend']:checked").val();
	 	  if(reasons == undefined || reasons == '')
	 	  {
	 	  	alert('关闭理由不能为空');
	 	  	return false;
	 	  } 
	 	  if(reasons == $('#reason').attr('placeholder')){
	 	     alert('录入关闭理由');
	 	     return false;
	 	  }
	 	    var url = siteurl+'/index.php?controller=adminpage&action=order&module=ordercontrol&type=un&id='+orderid+'&reasons='+reasons+'&suresend='+suresend+'&datatype=json&random=@random@';
	 	    $.ajax({
     type: 'get',
     async:false, 
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {  
     	if(content.error == false){
     		diasucces('操作成功','');
     	}else{
     		if(content.error == true)
     		{
     			diaerror(content.msg); 
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) { 
    	diaerror('数据获取失败'); 
	  }
   });   
	 	  
	 } 
 </script>
<script>
function openlink(newlinkes){
					window.location.href=newlinkes;
}
function dofirch(obj){
	gorefresh(); 
}
  
 
</script> 
<!--加载声音-->
<script>
	$(function(){
	setTimeout("get_status()",1000); 	
 
});
function get_status(){//<span id="timeshow" data="20" style="color:#666;"></div>
	//alert('xxx');
	//firstarea
	//secarea
	
	var timeaction =  $('#showztai').attr('data');
	if(timeaction == 0){  
      $.ajax({
     type: 'get',
     async:false,
     data:{firstarea:'<?php echo $_smarty_tpl->tpl_vars['frinput']->value;?>
'},
     url: '<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/ajaxcheckorder/datatype/json"),$_smarty_tpl);?>
', 
     dataType: 'json',success: function(content) {  
     	  if(content.error == false){
     		  //  播放声音 文件 diasucces('操作成功','');
     		  	palywav();
     	  }else{ 
     			// location.reload();  
     			$('#showztai').attr('data',20); 
     			setTimeout("get_status()",1000); 	
       	}
		  },
      error: function(content) { 
     	  //location.reload();  
     	  $('#showztai').attr('data',20);
     	  setTimeout("get_status()",1000); 	
	    }
     }); 		
      	 
  }else{
 	var nowtime = Number(timeaction)-1;
 	$('#showztai').attr('data',nowtime);
 	$('#showztai').text(''+nowtime+'');
 	setTimeout("get_status()",1000); 	
 	
  }
}
function palywav(){
	if(playwave == true){
if(navigator.userAgent.indexOf("Chrome") > -1){  
$('#palywave').html('<audio src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/upload/wave.mp3" type="audio/mp3" autoplay=”autoplay” hidden="true"></audio>');
}else if(navigator.userAgent.indexOf("Firefox")!=-1){  
$('#palywave').html('<embed src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/upload/wave.mp3" type="audio/mp3" hidden="true" loop="false" mastersound></embed>');
}else if(navigator.appName.indexOf("Microsoft Internet Explorer")!=-1 && document.all){ 
$('#palywave').html('<object classid="clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95"><param name="AutoStart" value="1" /><param name="Src" value="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/upload/wave.mp3" /></object>');
}else if(navigator.appName.indexOf("Opera")!=-1){ 
$('#palywave').html('<embed src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/upload/wave.mp3" type="audio/mpeg" loop="false"></embed>');
}else{ 
$('#palywave').html('<embed src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/upload/wave.mp3" type="audio/mp3" hidden="true" loop="false" mastersound></embed>'); 
} 
}

  // $('#palywave').html('<embed id=cct src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/wave.wav" loop="0" autostart="true" hidden="true"></embed>'); 
   setTimeout("playon()",3000); 	
}
function playon(){
	 
 	location.reload();  
}
</script>

</body>

</html><?php }} ?>