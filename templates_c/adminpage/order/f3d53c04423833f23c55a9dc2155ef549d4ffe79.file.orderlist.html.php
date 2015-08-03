<?php /* Smarty version Smarty-3.1.10, created on 2015-06-29 17:08:50
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/order/adminpage/orderlist.html" */ ?>
<?php /*%%SmartyHeaderCode:352098929558ccd4d9a9f34-41543883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3d53c04423833f23c55a9dc2155ef549d4ffe79' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/order/adminpage/orderlist.html',
      1 => 1435117699,
      2 => 'file',
    ),
    'e454e1ef514aa19f42b90368588b225ec4c320aa' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/adminpage/public/admin.html',
      1 => 1435568735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '352098929558ccd4d9a9f34-41543883',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558ccd4dcbd4c7_79133919',
  'variables' => 
  array (
    'tempdir' => 0,
    'siteurl' => 0,
    'is_static' => 0,
    'admininfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558ccd4dcbd4c7_79133919')) {function content_558ccd4dcbd4c7_79133919($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE HTML>
<html>
<head> 
<meta charset="utf-8"/> 
<meta http-equiv="Content-Language" content="zh-CN"> 
<meta content="all" name="robots"> 
<meta name="description" content=""> 
<meta content="" name="keywords"> 
<title>小树好吃后台管理中心</title>  
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/admin1.css"> 
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/public.js" type="text/javascript" language="javascript"></script>
 <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/artDialog.js?skin=blue"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/template.min.js" type="text/javascript" language="javascript"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.PrintArea.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/datepicker/WdatePicker.js" type="text/javascript" language="javascript"></script>

<script>
	var menu = null;
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
	/*if(screen.width > 1359){
		
		$('.newtop').css('width',screen.width);
		$('.newmain').css('width',screen.width);
		$('.newfoot').css('width',screen.width);
	} */
</script> 
</head> 
<body> 
<div id="cat_zhe" class="cart_zhe" style="display:none;"></div>
<div id="cat_tj" class="cart_out_cat" style="display:none;"> 数据提交中..</div>
<div class="newtop">
	  <div class="newadddiv">
	  <div class="newlogo">
	  	  <div class="imglogo"><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
" target="_blank"><!--<img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/admin/logo.png">-->小树好吃后台管理系统</a></div>
	  </div>
	  <div class="newtopnav">
	  	 <ul>
	  	  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tempdir']->value)."/public/admin_module.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
	  	 	<ul>
	  	
	  </div>
	</div>
</div> 
<div style="clear:both;"></div>
<div class="newmain">
	<!-- 提示导航--
   <div class="top_nav">
	    <div class="nav2 datainfo">
	    	<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
  
	    </div>
	    <div class="nav2 positioninfo" id="positionname2">
	    	网站首页
	    </div>
	    <div class="nav2 orderinfo">
	    	您有今天有 0 个订单待审核
	    </div>
   </div> -->
   <!-- 主内容区-->
   <div class="newmain_all">
   	 <!-- 主内左区-->
   	 <div class="left_content">
   	 	   <!-- 主内左区用户信息-->
   	 	   <div class="userinfo">
   	 	   	   <div class="user_area">
   	 	   	   	     用户名: <div class="user_name">
   	 	   	   	      	<?php echo $_smarty_tpl->tpl_vars['admininfo']->value['username'];?>

   	 	   	   	      </div>
   	 	   	   	      
   	 	   	  </div>
   	 	   	<!--  <div class="now_name" id="nowactioninfo">
   	 	   	    	网站首页
   	 	   	    </div> -->
                   <!--提示导航 Begin-->
                   <ul class="top_nav">
                      <li>日期:
                        <span class="nav2 datainfo">
                          <?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>

                        </span>  
                      </li>
                      <!--<li>位置:
                        <span class="nav2 positioninfo" id="positionname2">网站首页</span>
                      </li>-->
                      <li class="nav2 orderinfo">
                        您有今天有 0 个订单待审核
                      </li>
                  </ul>
                  <!--提示导航 End-->
                  <div class="content_url">
                               <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/adminloginout"),$_smarty_tpl);?>
" class="out">退出登录</a> 
                               <a onClick="modifypwd();" href="#">修改密码</a>
                           </div>
   	 	   </div>
   	 	   <!-- 主内左区导航条-->
   	 	    <div class="left_nav">
   	 	    	  <ul> 
   	 	    	  	
   	 	    	  	
   	 	    	  	 <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tempdir']->value)."/public/admin_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   	 	    	 
   	 	    	     <li><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
" target="_blank">返回网站首页</a></li>
   	 	    	  </ul>
   	 	    </div>

   	 	    <div class="left_navend">
   	 	    </div>
   	 	    <!-- 主内左区天气预报-->
   	 	    <div class="weather" id="weatherinfo" style="display:none;">
   	 	    	 <div class="todayweacher">
   	 	    	      <div class="weacher_left">
   	 	    	      	 <div id="wtoday_img"> </div>
   	 	    	      	 <div><span id="wcity" style="padding-right:5px;"></span><span id="wqihou"></span></div>
   	 	    	      </div>
   	 	    	      <div class="weacher_right" id="wwendu">
   	 	    	      	 
   	 	    	      </div>	 
   	 	    	 </div>
   	 	    	 <div style="clear:both;">
   	 	    	 	   <div class="tom">
   	 	    	 	   	    <div id="tom_1" class="tom_img"></div>
   	 	    	 	   	    <div class="tom_wendu" id="tom_day"></div>
   	 	    	 	   	    <div class="tom_wendu" id="tom_wendu"></div>
   	 	    	 	   	
   	 	    	 	   	</div>
   	 	    	 	   <div class="tom">
   	 	    	 	   	    <div id="tom_tom" class="tom_img"></div>
   	 	    	 	   	    <div class="tom_wendu" id="tom_tday"></div>
   	 	    	 	   	    <div class="tom_wendu" id="tom_twendu"></div>
   	 	    	 	   	</div>
   	 	    	 </div>
   	 	    </div>
   	 	     
   	  </div>
   	  
 
 
  
 
 
 <div class="right_content">
	<div class="show_content_m">
   	        <!--	 <div class="show_content_m_ti">
   	        	 	   <div class="showtop_t" id="positionname">所有订单</div>
   	        	 </div>  -->
   	        	 <div class="show_content_m_t2">
   	        	 	
   	        	 	
     <div style="width:100%;margin-top:-10px;">

      	<div class="search">


            <div class="search_content">

            	 <form method="post" name="form1" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/orderlist"),$_smarty_tpl);?>
">
            	  <label>查询类型：</label>
            	  <select name="querytype">
            	  	<option value="0">未选择</option>
            	  	<option value="mb.username"  <?php if ($_smarty_tpl->tpl_vars['querytype']->value=='mb.username'){?>selected<?php }?>>会员名</option>
            	  	<option value="ord.shopname"  <?php if ($_smarty_tpl->tpl_vars['querytype']->value=='ord.shopname'){?>selected<?php }?>>店铺名称</option>
            	  	<option value="ord.buyername"  <?php if ($_smarty_tpl->tpl_vars['querytype']->value=='ord.buyername'){?>selected<?php }?>>买家联系人</option>
            	  	<option value="ord.buyerphone"  <?php if ($_smarty_tpl->tpl_vars['querytype']->value=='ord.buyerphone'){?>selected<?php }?>>买家联系电话</option>
            	  	<option value="ord.dno"  <?php if ($_smarty_tpl->tpl_vars['querytype']->value=='ord.dno'){?>selected<?php }?>>订单编号</option>
            	  </select>
            	  <label>查询条件：</label>
            	   <input type="text" name="searchvalue" value="<?php echo $_smarty_tpl->tpl_vars['searchvalue']->value;?>
">

            	   <select name="orderstatus">
            	   	  <option value="all">选择订单状态</option>
			   		 	  	  <option value="1" <?php if ($_smarty_tpl->tpl_vars['orderstatus']->value=='1'){?>selected<?php }?>>未处理</option>
			   		 	  	  <option value="2" <?php if ($_smarty_tpl->tpl_vars['orderstatus']->value=='2'){?>selected<?php }?>>已审核订单</option>
			   		 	      <option value="3" <?php if ($_smarty_tpl->tpl_vars['orderstatus']->value=='3'){?>selected<?php }?>>已发货</option>
			   		 	  	  <option value="4" <?php if ($_smarty_tpl->tpl_vars['orderstatus']->value=='4'){?>selected<?php }?>>已完成</option>
			   		 	  	  <option value="5" <?php if ($_smarty_tpl->tpl_vars['orderstatus']->value=='5'){?>selected<?php }?>>已关闭</option>
            	  </select>

            	   从<input class="Wdate datefmt" type="text" name="starttime" id="starttime" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['starttime']->value,"%Y-%m-%d");?>
"  onFocus="WdatePicker({isShowClear:false,readOnly:true});" />
			   		 	  到<input class="Wdate datefmt" type="text" name="endtime" id="endtime" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['endtime']->value,"%Y-%m-%d");?>
"  onFocus="WdatePicker({isShowClear:false,readOnly:true});" />


            	    <input type="submit" value="提交查询" class="button">
            	    <input type="button" value="手动清理完成订单" class="button" onclick="doautodel();">
            	 </form>
            </div>

      	</div>



           <div class="tags">



          <div id="tagscontent">

            <div id="con_one_1">

              <div class="table_td">

              <form method="post" action="" onsubmit="return remind();">
                <?php if (empty($_smarty_tpl->tpl_vars['list']->value)){?>
                暂无数据
                <?php }?>
                  <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>

			   		 <table class="table table-bordered" width=95% style="font-size:12px;margin-top:5px;text-align:left;margin-left:20px;" id="order_area_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" onMouseover="colorred(this);" onMouseout="tcolorred(this);">
                    <?php if ($_smarty_tpl->tpl_vars['items']->value['is_goshop']==1){?>
                     <tr>
                        <td colspan="2" style="text-align:left;">单号：<?php echo $_smarty_tpl->tpl_vars['items']->value['dno'];?>
<font color=red>预订<?php if ($_smarty_tpl->tpl_vars['items']->value['allcost']==0){?>座位<?php }else{ ?>座位和菜品<?php }?></font></td>
                        <td colspan="2" style="text-align:left;">创建时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
                        <td colspan="2" style="text-align:left;">订单状态: <font color=blue><?php echo $_smarty_tpl->tpl_vars['buyerstatus']->value[$_smarty_tpl->tpl_vars['items']->value['status']];?>
</font></td>
                    </tr>
                     <tr style="height:20px;line-height:20px;">
                        <td colspan="2" style="text-align:left;">店铺名称：<?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
</td>
                        <td colspan="2" style="text-align:left;">店铺地址：<?php echo $_smarty_tpl->tpl_vars['items']->value['shopaddress'];?>
</td>
                        <td colspan="2" style="text-align:left;">店铺电话: <?php echo $_smarty_tpl->tpl_vars['items']->value['shopphone'];?>
</td>
                    </tr>
                    <tr style="height:20px;line-height:20px;">
                        <td colspan="2" style="text-align:left;">消费时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['posttime'],"%Y-%m-%d %H:%M:%S");?>
</td>
                        <td colspan="2" style="text-align:left;">支付状态：<font color=red><?php echo (($tmp = @$_smarty_tpl->tpl_vars['paytypearr']->value[$_smarty_tpl->tpl_vars['items']->value['paytype']])===null||$tmp==='' ? '未定义' : $tmp);?>
</font><?php if ($_smarty_tpl->tpl_vars['items']->value['paystatus']==1){?>已付<?php }else{ ?>未付<?php }?><font color=red><?php echo $_smarty_tpl->tpl_vars['backarray']->value[$_smarty_tpl->tpl_vars['items']->value['is_reback']];?>
</font></td>
                        <td colspan="2" style="text-align:left;">下单来源: <?php echo $_smarty_tpl->tpl_vars['ordertypearr']->value[$_smarty_tpl->tpl_vars['items']->value['ordertype']];?>
<?php echo $_smarty_tpl->tpl_vars['items']->value['ipaddress'];?>
</td>
                    </tr>
                    <tr style="height:20px;line-height:20px;">
                        <td colspan="2" style="text-align:left;">配送时间：</td>
                        <td colspan="2" style="text-align:left;">订单类型：预订</td>
                        <td colspan="2" style="text-align:left;">ip信息：<?php echo $_smarty_tpl->tpl_vars['items']->value['ipaddress'];?>
</td>
                    </tr>
                <tr style="height:20px;line-height:20px;">
                        <td colspan="2" style="text-align:left;">联系人：<?php echo $_smarty_tpl->tpl_vars['items']->value['buyername'];?>
[<?php if (empty($_smarty_tpl->tpl_vars['items']->value['acountname'])){?>游客<?php }else{ ?>帐号:<?php echo $_smarty_tpl->tpl_vars['items']->value['acountname'];?>
<?php }?>]</td>
                        <td colspan="2" style="text-align:left;">联系电话：<?php echo $_smarty_tpl->tpl_vars['items']->value['buyerphone'];?>
</td>
                        <td colspan="2" style="text-align:left;"> <?php $_smarty_tpl->tpl_vars['showother'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['items']->value['othertext']), null, 0);?>
                                         <?php  $_smarty_tpl->tpl_vars['itc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itc']->_loop = false;
 $_smarty_tpl->tpl_vars['mytest'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['showother']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itc']->key => $_smarty_tpl->tpl_vars['itc']->value){
$_smarty_tpl->tpl_vars['itc']->_loop = true;
 $_smarty_tpl->tpl_vars['mytest']->value = $_smarty_tpl->tpl_vars['itc']->key;
?>
                                        <font color=red> <?php echo $_smarty_tpl->tpl_vars['mytest']->value;?>
</blue>:<?php echo $_smarty_tpl->tpl_vars['itc']->value;?>
 </font>
                                         <?php } ?></td>
                    </tr>
                    <?php }else{ ?>
		             <tr>
		             	<td colspan="2" style="text-align:left;">单号：<?php echo $_smarty_tpl->tpl_vars['items']->value['dno'];?>
<font color=red><?php echo $_smarty_tpl->tpl_vars['shoptype']->value[$_smarty_tpl->tpl_vars['items']->value['shoptype']];?>
</font></td>
		             	<td colspan="2" style="text-align:left;">创建时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
		             	<td colspan="2" style="text-align:left;">订单状态: <font color=blue><?php echo $_smarty_tpl->tpl_vars['buyerstatus']->value[$_smarty_tpl->tpl_vars['items']->value['status']];?>
</font></td>
		            </tr>
		             <tr style="height:20px;line-height:20px;">
		             	<td colspan="2" style="text-align:left;">店铺名称：<?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
</td>
		             	<td colspan="2" style="text-align:left;">店铺地址：<?php echo $_smarty_tpl->tpl_vars['items']->value['shopaddress'];?>
</td>
		             	<td colspan="2" style="text-align:left;">店铺电话: <?php echo $_smarty_tpl->tpl_vars['items']->value['shopphone'];?>
</td>
		            </tr>
		            <tr style="height:20px;line-height:20px;">
		             	<td colspan="2" style="text-align:left;">支付方式：<?php echo $_smarty_tpl->tpl_vars['paytypearr']->value[$_smarty_tpl->tpl_vars['items']->value['paytype']];?>
</td>
		             	<td colspan="2" style="text-align:left;">支付状态：<?php if ($_smarty_tpl->tpl_vars['items']->value['paystatus']==1){?>已付<?php }else{ ?>未付<?php }?><font color=red><?php echo $_smarty_tpl->tpl_vars['backarray']->value[$_smarty_tpl->tpl_vars['items']->value['is_reback']];?>
</font></td>
		             	<td colspan="2" style="text-align:left;">下单来源: <?php echo $_smarty_tpl->tpl_vars['ordertypearr']->value[$_smarty_tpl->tpl_vars['items']->value['ordertype']];?>
</td>
		            </tr>
		            <tr style="height:20px;line-height:20px;">
		             	<td colspan="2" style="text-align:left;">配送时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['posttime'],"%Y-%m-%d %H:%M:%S");?>
</td>
		             	<td colspan="2" style="text-align:left;">订单类型：<?php echo $_smarty_tpl->tpl_vars['shoptype']->value[$_smarty_tpl->tpl_vars['items']->value['shoptype']];?>
</td>
		             	<td colspan="2" style="text-align:left;">ip信息：<?php echo $_smarty_tpl->tpl_vars['items']->value['ipaddress'];?>
</td>
		            </tr>
                <tr style="height:20px;line-height:20px;">
		             	<td colspan="2" style="text-align:left;">联系人：<?php echo $_smarty_tpl->tpl_vars['items']->value['buyername'];?>
[<?php if (empty($_smarty_tpl->tpl_vars['items']->value['acountname'])){?>游客<?php }else{ ?>帐号:<?php echo $_smarty_tpl->tpl_vars['items']->value['acountname'];?>
<?php }?>]</td>
		             	<td colspan="2" style="text-align:left;">消费地址：<?php echo $_smarty_tpl->tpl_vars['items']->value['buyeraddress'];?>
</td>
		             	<td colspan="2" style="text-align:left;">联系电话：<?php echo $_smarty_tpl->tpl_vars['items']->value['buyerphone'];?>
</td>
		            </tr>
		            <?php }?>
		            <tr>
		            </tr>
		            <tr style="height:20px;line-height:20px;">
		            	<td colspan="3" width="50%" valign=top>
		            		<table style="margin:0px;padding:0px;font-size:12px;" width="100%">
		            			<tr style="height:20px;line-height:20px;">
		            				<td style="border:none;padding:0px;color:gray;text-align:left;" width="60%">名称</td>
		            				<td style="border:none;padding:0px;color:gray;" width="15%">价格</td>
		            				<td style="border:none;padding:0px;color:gray;">数量</td>
		            			</tr>
		            			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['detlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
		            			<tr style="height:20px;line-height:20px;"><td style="border:none;padding:0px;color:gray;text-align:left;"><?php echo $_smarty_tpl->tpl_vars['value']->value['goodsname'];?>
<?php if ($_smarty_tpl->tpl_vars['value']->value['is_send']==1){?><font color=red>[赠品]</font><?php }?></td>
		            				  <td style="border:none;padding:0px;color:gray;"><?php echo $_smarty_tpl->tpl_vars['value']->value['goodscost'];?>
元</td>
		            				  <td style="border:none;padding:0px;color:gray;"><?php echo $_smarty_tpl->tpl_vars['value']->value['goodscount'];?>
份</td>
		            				  </tr>
		            				<?php } ?>



		            		 </table>
		            	</td>
		            	<td colspan="3" style="text-align:left;color:gray;" valign=top>
		            		 <table style="margin:0px;padding:0px;font-size:12px;text-align:left;" width="100%">
		            		    <?php if ($_smarty_tpl->tpl_vars['items']->value['shopcost']>0){?>
		            		   	<tr style="height:20px;line-height:20px;">
		            		 		  <td style="border:none;padding:0px;color:gray;" width="100px;">店铺商品总价</td>
		            		 		  <td style="border:none;padding:0px;color:gray;"><font color=red><?php echo $_smarty_tpl->tpl_vars['items']->value['shopcost'];?>
</font>元</td>
		            		 		   </tr>
		            		 		<?php }?>
		            		 		 <?php if ($_smarty_tpl->tpl_vars['items']->value['shopps']>0){?>
		            		   	<tr style="height:20px;line-height:20px;">
		            		 		  <td style="border:none;padding:0px;color:gray;" width="100px;">店铺配送费</td>
		            		 		  <td style="border:none;padding:0px;color:gray;"><font color=red><?php echo $_smarty_tpl->tpl_vars['items']->value['shopps'];?>
</font>元</td>
		            		 		   </tr>
		            		 		<?php }?>

		            		 		<?php if ($_smarty_tpl->tpl_vars['items']->value['scoredown']>0){?>
		            		   	<tr style="height:20px;line-height:20px;">
		            		 		  <td style="border:none;padding:0px;color:gray;" width="100px;">积分低扣</td>
		            		 		  <td style="border:none;padding:0px;color:gray;"><font color=red>-<?php echo $_smarty_tpl->tpl_vars['items']->value['scoredown']/$_smarty_tpl->tpl_vars['scoretocost']->value;?>
</font>元,<?php echo $_smarty_tpl->tpl_vars['items']->value['scoredown'];?>
积分,比例：<?php echo $_smarty_tpl->tpl_vars['scoretocost']->value;?>
:1</td>
		            		 		   </tr>
		            		 		<?php }?>
		            		 		<?php if ($_smarty_tpl->tpl_vars['items']->value['yhjcost']>0){?>
		            		   	<tr style="height:20px;line-height:20px;">
		            		 		  <td style="border:none;padding:0px;color:gray;" width="100px;">优惠券低扣</td>
		            		 		  <td style="border:none;padding:0px;color:gray;"><font color=red>-<?php echo $_smarty_tpl->tpl_vars['items']->value['yhjcost'];?>
</font>元</td>
		            		 		   </tr>
		            		 		<?php }?>
		            		 		<?php if ($_smarty_tpl->tpl_vars['items']->value['cxcost']>0){?>
		            		   	<tr style="height:20px;line-height:20px;">
		            		 		  <td style="border:none;padding:0px;color:gray;" width="100px;">店铺促销减金额</td>
		            		 		  <td style="border:none;padding:0px;color:gray;"><font color=red>-<?php echo $_smarty_tpl->tpl_vars['items']->value['cxcost'];?>
</font>元</td>
		            		 		   </tr>
		            		 		<?php }?>
		            		 		<?php if ($_smarty_tpl->tpl_vars['items']->value['bagcost']>0){?>
		            		   	<tr style="height:20px;line-height:20px;">
		            		 		  <td style="border:none;padding:0px;color:gray;" width="100px;">打包费</td>
		            		 		  <td style="border:none;padding:0px;color:gray;"><font color=red><?php echo $_smarty_tpl->tpl_vars['items']->value['bagcost'];?>
</font>元</td>
		            		 		   </tr>

		            		 		<?php }?>
		            		 		<tr style="height:20px;line-height:20px;">
		            		 		  <td style="border:none;padding:0px;color:gray;" width="100px;">应收</td>
		            		 		  <td style="border:none;padding:0px;color:gray;"><font color=red><?php echo $_smarty_tpl->tpl_vars['items']->value['allcost'];?>
</font>元 </td>
		            		 	   </tr>
		            		 	   <?php if (!empty($_smarty_tpl->tpl_vars['items']->value['content'])){?>
		            		 		<tr style="height:20px;line-height:20px;">
		            		 		  <td style="border:none;padding:0px;color:gray;" width="100px;">备注</td>
		            		 		  <td style="border:none;padding:0px;color:gray;"><?php echo $_smarty_tpl->tpl_vars['items']->value['content'];?>
</td>
		            		 	   </tr>
		            		 	   <?php }?>
		            		 	   <?php if (!empty($_smarty_tpl->tpl_vars['items']->value['othertext'])){?>
		            		 		<tr style="height:20px;line-height:20px;" valign=top>
		            		 		  <td style="border:none;padding:0px;color:gray;" width="100px;">其他说明</td>
		            		 		  <td style="border:none;padding:0px;color:gray;">
		            		 		  	<?php $_smarty_tpl->tpl_vars['showother'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['items']->value['othertext']), null, 0);?>
		            		 		  	 <?php  $_smarty_tpl->tpl_vars['itc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itc']->_loop = false;
 $_smarty_tpl->tpl_vars['mytest'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['showother']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itc']->key => $_smarty_tpl->tpl_vars['itc']->value){
$_smarty_tpl->tpl_vars['itc']->_loop = true;
 $_smarty_tpl->tpl_vars['mytest']->value = $_smarty_tpl->tpl_vars['itc']->key;
?>
		            		 		  	  <?php echo $_smarty_tpl->tpl_vars['mytest']->value;?>
:<?php echo $_smarty_tpl->tpl_vars['itc']->value;?>
，
		            		 		  	 <?php } ?>
		            		 		  	</td>
		            		 	   </tr>
		            		 	   <?php }?>
		            		 </table>

		            		</td>
		            </tr>

		            <tr >
		              <td colspan="6" style="text-align:left;" class="order_control">
		              	<?php if ($_smarty_tpl->tpl_vars['items']->value['status']==0){?>
		              	<a onclick="unorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['items']->value['dno'];?>
);" href="#">关闭订单</a>
		              	<a onclick="return remind(this);" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/ordercontrol/id/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."/type/pass/datatype/json"),$_smarty_tpl);?>
">通过审核</a>
		              	<?php }?>
		              	<?php if ($_smarty_tpl->tpl_vars['items']->value['status']==1){?>
		              	 	<a onclick="unorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['items']->value['dno'];?>
);" href="javascript:void(0);">关闭订单</a>
		              	    <a onclick="return remind(this);" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/ordercontrol/id/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."/type/send/datatype/json"),$_smarty_tpl);?>
">配送发货</a>
		              	<?php }?>
		              	<?php if ($_smarty_tpl->tpl_vars['items']->value['status']==2){?>
		              	  	<a onclick="unorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['items']->value['dno'];?>
);" href="javascript:void(0);">关闭订单</a>
		              	    <a onclick="return remind(this);" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/ordercontrol/id/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."/type/over/datatype/json"),$_smarty_tpl);?>
">完成订单</a>
		              	<?php }?>
		              	<?php if ($_smarty_tpl->tpl_vars['items']->value['status']==4||$_smarty_tpl->tpl_vars['items']->value['status']==5){?>
		              	 <a onclick="return remind(this);" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/ordercontrol/id/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."/type/del/datatype/json"),$_smarty_tpl);?>
">删除</a>
		              	<?php }?>
		              	<a href="javascript:void(0);"  onclick="printorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
);">打印订单</a>
		              	<?php if ($_smarty_tpl->tpl_vars['items']->value['wxstatus']==1){?>
		              	商家已确认订单
		              	<?php }elseif($_smarty_tpl->tpl_vars['items']->value['wxstatus']==2){?>
		              	商家需要取消此订单
		              	<?php }?>

		              	   下单IP：<?php echo $_smarty_tpl->tpl_vars['items']->value['ipaddress'];?>
  <?php if ($_smarty_tpl->tpl_vars['items']->value['is_print']==1){?>店铺已打印<?php }?>  <?php if (empty($_smarty_tpl->tpl_vars['items']->value['is_make'])){?>商家未确认是否制作<?php }elseif($_smarty_tpl->tpl_vars['items']->value['is_make']==1){?>商家确认制作<?php }else{ ?>商家不制作，请取消此订单<?php }?>
		              	</td>
		            </tr>
		            </table>
		          <?php } ?>




                <div class="blank20"></div>

                </form>

                <div class="page_newc">

                       <div class="show_page"><ul><?php echo $_smarty_tpl->tpl_vars['pagecontent']->value;?>
</ul></div>
                 </div>
                <div class="blank20"></div>

              </div>

            </div>

          </div>

        </div>


  </div>
  <div id="print_area" style="display:none;font-size:40px;"></div>
 </div>
<script type="text/javascript">
   function colorred(obj){
   	$(obj).css('background','#eee');
   }
   function tcolorred(obj){
   	$(obj).css('background','');
   }
   function unorder(orderid,dno)
	 {
	 	   var dialog =  art.dialog({
	 	   	id:'coslid',
        title:'取消订单'+dno,
           content: '<div>关闭订单理由</div> <div><textarea name="reason" id="reason" style="height:40px;"></textarea></div><div class="btn_wuxiao hc_listfoods_menus_foods hcl_food_lists_cont_div_order2 hcl_food_lists_cont_div_order4 hc_listfoods_menus_foods2" style="width:65px;float:left;" onclick="sureclose('+orderid+');">提交关闭</div>'
        });
	 }

	 function sureclose(orderid)
	 {
	 	  var reasons = $('#reason').val();
	 	  if(reasons == undefined || reasons == '')
	 	  {
	 	  	alert('关闭理由不能为空');
	 	  }else{ //{'orderid':orderid,'reason':reasons}
	 	    var url = siteurl+'/index.php?controller=adminpage&action=order&module=ordercontrol&type=un&id='+orderid+'&reasons='+reasons+'&datatype=json&random=@random@';
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
	 }

  function printorder(orderid)
	{
		$('#print_area').html('');
	 $('#order_area_'+orderid).clone().appendTo($('#print_area'));
	 $("#print_area").find('.order_control').remove();
	  $("#print_area").printArea();
  }
  function print_all_area()
  {
  	$('#print_area').html($('#all_area').html());
	  $("#print_area").find('.order_control').remove();
	  $("#print_area").printArea();
  }
  function doautodel(){
  	 if(confirm('确认手动操作?\n 操作后将删除待审核和已关闭订单,\n 也将根据设置的自动发货天数自动发货和完成')){
  	 	var dourl = '<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/order/module/autodel"),$_smarty_tpl);?>
';
  	 	window.location.href= dourl;

  	}
  }
 </script>

   	        	 </div>	
               <div class="show_content_m_t3">
   	        	 
   	        	 </div>
   	       </div>
   	       <!-- show_content_m结束-->


   	  </div>
   	  <!-- right_content 结束-->
   	  
   </div>
   <!-- newmain_all 结束-->
</div>	
	
<!--newmain 结束-->
















<div style="clear:both;"></div>
<div class="newfoot">
	
	  &#20851;&#27880;&#22909;&#36164;&#28304;&#20851;&#27880;&#25105;&#20204;&#65306;&#119;&#119;&#119;&#46;&#77;&#120;&#56;&#48;&#48;&#46;&#99;&#111;&#109;
</div>	
<script>
$(function(){ 
  
var height = $('.left_content').height();
 $('.right_content').height(height);

$('#con_one_1 .table_td').removeAttr('style');
$('#tagscontent td:last-child a img').hide();
$('#tagscontent td:last-child a:nth-child(1) img').parent('a').addClass('first');
$('#tagscontent td:last-child a:nth-child(2) img').parent('a').addClass('after');
 $('.show_page a').wrap('<li></li>');
 $('.show_page').find('.current').eq(0).parent().css({'background':'#f60'}); 
});
   
</script>
</body>
</html>





<?php }} ?>