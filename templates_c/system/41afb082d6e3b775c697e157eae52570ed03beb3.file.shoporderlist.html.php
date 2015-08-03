<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 16:32:48
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/order/template/shoporderlist.html" */ ?>
<?php /*%%SmartyHeaderCode:988148255558d046712aba9-33346426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41afb082d6e3b775c697e157eae52570ed03beb3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/order/template/shoporderlist.html',
      1 => 1435825966,
      2 => 'file',
    ),
    '34c497866c78dbc09af78ddce0b250002f0d2e80' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/shopcenter.html',
      1 => 1435819148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '988148255558d046712aba9-33346426',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558d04674a46b5_46092910',
  'variables' => 
  array (
    'tempdir' => 0,
    'sitename' => 0,
    'keywords' => 0,
    'description' => 0,
    'siteurl' => 0,
    'adminshopid' => 0,
    'shopinfo' => 0,
    'toplink' => 0,
    'items' => 0,
    'beian' => 0,
    'footerdata' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558d04674a46b5_46092910')) {function content_558d04674a46b5_46092910($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>商家管理中心-<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/css/commom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/css/shangjiaAdmin.css" />

<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquerynew.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/allj.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/artDialog.js?skin=blue"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.PrintArea.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/datepicker/WdatePicker.js" type="text/javascript" language="javascript"></script>
   <script>
  	var mynomenu='baseorder';
  	</script>
 
<script>
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
    $(function(){
      
      $('.conWaiSet').height( $('.conleft').height() );
        $('.header ul li').click(function(){
            $(this).addClass('li_active').siblings().removeClass('li_active');
        });
   
        $('.waimaiset').children().children('img').remove();

        $('.shopSetTop').remove();
        $('.waimaiset li').click(function(){
            $(this).addClass('li_active').siblings().removeClass('li_active');
        });
         

        
    });
</script>
<!--[if lte IE 6]>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, input , a');
        $('#footer').css('display','none');
    </script>
<![endif]-->
</head>
<body>
<?php echo smarty_function_load_data(array('assign'=>"shopinfo",'table'=>"shop",'where'=>"`id`=".((string)$_smarty_tpl->tpl_vars['adminshopid']->value),'type'=>"one"),$_smarty_tpl);?>

<!---<div style="position: fixed;top: 0;left: 0;right: 0;bottom: 0;z-index: -1;background:url(<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/background.png);"></div>
header start-->
	<div class="header">
    	<ul>
        	<li class="li_active">
               <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/useredit"),$_smarty_tpl);?>
">店铺管理</a>
            </li>
            <li>
               <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shoporderlist"),$_smarty_tpl);?>
">订单管理</a>
            </li>
            <li>
              <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/order/fastfood"),$_smarty_tpl);?>
">快速下单</a>
            </li>
            <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/single/singlelist"),$_smarty_tpl);?>
');">
                内容管理
            </li>
            <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/member/base"),$_smarty_tpl);?>
');">
                会员中心
            </li>
            <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/member/loginout"),$_smarty_tpl);?>
');">
                退出
            </li>
        </ul>
                 <div class="cl"></div>
</div>
        <!--    <div class="topRight fr">
                <span onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/single/singlelist"),$_smarty_tpl);?>
');" class="curbtn">内容管理</span>
                    <span  onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/member/base"),$_smarty_tpl);?>
');" class="curbtn">会员中心 </span>
                    <span class="username curbtn" onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/member/loginout"),$_smarty_tpl);?>
');">退出</span>

            </div>
            <div class="cl"></div>


            <div class="shangjiaTop">
            	<div class="sjgl">

                </div>

            </div>
        </div>

    </div>-->
    <!---header end
    <script>
	$(function(){
		var clientWidth = document.body.clientWidth;
		/*alert(clientWidth);*/
	/*	if( clientWidth<=1347 ){

			$(".content").css("width","1240px");
			$(".conleft").removeClass("content_left");

		}*/
	});
</script>
 以上是公共的头部部分-->

  <!---content start-->
	<div class="content">
   	 	<!---content left start-->
		<div class="conleft"><!-- content_left -->
        	<div class="nav">
            	<ul>
                	<li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/useredit"),$_smarty_tpl);?>
');" data="baseset"><div class="navimg"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/dpsz.png" /></div><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/useredit"),$_smarty_tpl);?>
">店铺设置</a></li>
                    <li onclick="openlink('<?php if (empty($_smarty_tpl->tpl_vars['shopinfo']->value['shoptype'])){?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/goodslist"),$_smarty_tpl);?>
<?php }else{ ?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/marketgoodslist"),$_smarty_tpl);?>
<?php }?>');" data="basemenu"><div class="navimg"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/cdgl.png" /></div><a href="<?php if (empty($_smarty_tpl->tpl_vars['shopinfo']->value['shoptype'])){?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/goodslist"),$_smarty_tpl);?>
<?php }else{ ?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/marketgoodslist"),$_smarty_tpl);?>
<?php }?>">菜单管理</a></li>
                    <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shoporderlist"),$_smarty_tpl);?>
');" data="baseorder"><div class="navimg"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/ddgl.png" /></div><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shoporderlist"),$_smarty_tpl);?>
">订单管理</a></li>
                    <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shoptotal"),$_smarty_tpl);?>
');" data="baseordertj"><div class="navimg"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/ddtj.png" /></div><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shoptotal"),$_smarty_tpl);?>
">订单统计</a></li>
                    <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/area/setshoparea"),$_smarty_tpl);?>
');" data="basearea"><div class="navimg"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/psqy.png" /></div><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/area/setshoparea"),$_smarty_tpl);?>
">配送区域</a></li>
                    <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/cxrule"),$_smarty_tpl);?>
');"  data="basecx"><div class="navimg"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/xxgz.png" /></div><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/cxrule"),$_smarty_tpl);?>
">促销规则</a></li>
                    <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/ask/shopask"),$_smarty_tpl);?>
');" data="baseask"><div class="navimg"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/lygl.png" /></div><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/ask/shopask"),$_smarty_tpl);?>
">留言评价</a></li>
                    <li onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/wxset"),$_smarty_tpl);?>
');" data="baseask"><div class="navimg"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/wechat.png" /></div><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/wxset"),$_smarty_tpl);?>
">微信管理</a></li>

                </ul>

            </div>
        </div>
       <!---content left end-->





           


  <!---content right start-->
  <div class="conWaiSet fr">
    <div class="shopSetTop"> <span>订单查询</span> </div>
    <div class="selOrder">
      <div class="autoRe" id="showztai" udata="<?php echo $_smarty_tpl->tpl_vars['hidecount']->value;?>
"  data="20" > 自动刷新倒计时<span>0</span>秒 </div>
      <div class="refresh_set">
        <div  class="refset" onclick="refreshorder();"> <img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/sdsx.png" /><span>手动刷新</span> </div>
        <div class="refset" onclick="palywav();"> <img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/lstx.png" /><span>铃声提醒</span> </div>
        <div class="refset" id="startwave" 	 > <img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/start.png"  /><span>开启</span> </div>
        <div class="refset"  id="closetwave"  > <img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/close.png"/><span>关闭</span> </div>

      </div>
      <div class="cl"></div>
    </div>
    <div class="cl"></div>
  <!--  <script>

				$(function(){
					$(".waimaiset .jbset").click(function(){
						$(this).css('background','#19b4ea').siblings().css('background','');

					});

				});
                </script>-->
    <form action="<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shoporderlist"),$_smarty_tpl);?>
" method="post">
      <div class="order_search" style="background:transparent;">
        <label class="chaxun">查询类型：</label>
        <label>
          <input type="radio" value="1" name="orderSource" <?php if ($_smarty_tpl->tpl_vars['orderSource']->value==1){?>checked<?php }?>  />
          网站订单</label>
        <label>
          <input type="radio" value="2" name="orderSource" <?php if ($_smarty_tpl->tpl_vars['orderSource']->value==2){?>checked<?php }?>  />
          电话订单</label>
        <label>
          <input type="radio" value="3" name="orderSource" <?php if ($_smarty_tpl->tpl_vars['orderSource']->value==3){?>checked<?php }?>  />
          待确认订单</label>
        <label>
          <input type="radio" value="4" name="orderSource" <?php if ($_smarty_tpl->tpl_vars['orderSource']->value==4){?>checked<?php }?>   />
          待发货订单</label>
        <label>
          <input type="radio" value="5" name="orderSource" <?php if ($_smarty_tpl->tpl_vars['orderSource']->value==5){?>checked<?php }?>   />
          已发货订单</label>
        <label>选择日期
          <input class="xzrq" type="text" name="starttime" id="starttime" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['starttime']->value,"%Y-%m-%d");?>
"  onFocus="WdatePicker({isShowClear:false,readOnly:true});" />
        </label>
        <label>
          <input class="searchBg" type="submit" name="" value="" />
        </label>
        
      </div>
    </form>
    <div class="orderList">

      <div class="orderspan"> 共计<span class="numOrder"><?php echo $_smarty_tpl->tpl_vars['tongji']->value['shuliang'];?>
</span>张订单，成功订单金额<span class="seccost"><?php echo $_smarty_tpl->tpl_vars['tongji']->value['allcost'];?>
</span>元 </div>

      <div id="all_area">
      	<!--订单循环-->
       <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
      <div class="singleOrder" id="order_area_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
        <div class="singleOrder_title">
          <div class="orderNum"> <span><?php echo $_smarty_tpl->tpl_vars['items']->value['daycode'];?>
</span> </div>
          <div class="order_xx"> <span style=" margin-left:26px;"><span class="oxx">订单号</span>：<?php echo $_smarty_tpl->tpl_vars['items']->value['dno'];?>
<span style="color:red"><?php if ($_smarty_tpl->tpl_vars['items']->value['is_goshop']==1){?>（订座）<?php }else{ ?>（外卖）<?php }?></span></span> <span style=" margin-left:30px;"><span class="oxx">下单时间</span>：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</span><span style=" margin-left:30px;"><span class="oxx">状态</span>：
              <?php if ($_smarty_tpl->tpl_vars['items']->value['is_make']==0){?>
                待确认制作
               <?php }elseif($_smarty_tpl->tpl_vars['items']->value['is_make']==1){?>
                 <?php echo $_smarty_tpl->tpl_vars['buyerstatus']->value[$_smarty_tpl->tpl_vars['items']->value['status']];?>

                <?php }else{ ?>
                   取消制作
                <?php }?>




          	</span> </div>
          <div class="showorderdet curbtn" onclick="showdet('<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
',this);">＋</div>
        </div>
        <div class="order_details" id="order_det<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
          <table class="order_listli" style="font-size: 14px; margin-top: 5px; text-align: left; margin-left: 20px;" width="898" align="center" border="" cellpadding="0" cellspacing="0" bordercolor="#6596a9" >
            <tr>
              <td><div>支付方式: <span><?php echo $_smarty_tpl->tpl_vars['paytypearr']->value[$_smarty_tpl->tpl_vars['items']->value['paytype']];?>
(<?php if ($_smarty_tpl->tpl_vars['items']->value['paystatus']==1){?>已付<?php }else{ ?>未付<?php }?>) <font color=red><?php echo $_smarty_tpl->tpl_vars['backarray']->value[$_smarty_tpl->tpl_vars['items']->value['is_reback']];?>
</font></span></div></td>
              <td><div>订单状态: <span><?php echo $_smarty_tpl->tpl_vars['buyerstatus']->value[$_smarty_tpl->tpl_vars['items']->value['status']];?>
</span></div></td>
              <td><div><?php if ($_smarty_tpl->tpl_vars['items']->value['is_goshop']==1){?>消费时间<?php }else{ ?>配送时间<?php }?>: <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['posttime'],"%Y-%m-%d %H:%M:%S");?>
</span></div></td>
              <td><div>配送: <span><?php if ($_smarty_tpl->tpl_vars['items']->value['pstype']==1){?>店铺<?php }else{ ?>网站<?php }?></span></div></td>
            </tr>
            <tr>
              <td><div>顾客电话: <span><?php echo $_smarty_tpl->tpl_vars['items']->value['buyerphone'];?>
</span></div></td>
              <td><div>顾客地址: <span><?php echo $_smarty_tpl->tpl_vars['items']->value['buyeraddress'];?>
</span></div></td>
              <?php if ($_smarty_tpl->tpl_vars['items']->value['is_goshop']==1){?>
              <td><div>联系人: <span><?php echo $_smarty_tpl->tpl_vars['items']->value['buyername'];?>
</span></div></td>
              <td><div> <?php $_smarty_tpl->tpl_vars['showother'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['items']->value['othertext']), null, 0);?>
                             <?php  $_smarty_tpl->tpl_vars['itc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itc']->_loop = false;
 $_smarty_tpl->tpl_vars['mytest'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['showother']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itc']->key => $_smarty_tpl->tpl_vars['itc']->value){
$_smarty_tpl->tpl_vars['itc']->_loop = true;
 $_smarty_tpl->tpl_vars['mytest']->value = $_smarty_tpl->tpl_vars['itc']->key;
?>
                            <font color=red> <?php echo $_smarty_tpl->tpl_vars['mytest']->value;?>
:<?php echo $_smarty_tpl->tpl_vars['itc']->value;?>
 </font>
                             <?php } ?></td></div></td>
              <?php }else{ ?>
              <td colspan="2"><div>联系人: <span><?php echo $_smarty_tpl->tpl_vars['items']->value['buyername'];?>
</span></div></td>
              <?php }?>
            </tr>
            <tr>
              <td colspan="4"><div>订单备注: <span><?php echo $_smarty_tpl->tpl_vars['items']->value['content'];?>
</span></div></td>
            </tr>
            <tr>
              <td  colspan="1"><div>审核参考: <span> <?php if (empty($_smarty_tpl->tpl_vars['items']->value['buyeruid'])){?>游客<?php }else{ ?>成交次数:<?php echo $_smarty_tpl->tpl_vars['items']->value['maijiagoumaishu'];?>
<?php }?></span></div></td>
              <td colspan="3"><div>下单IP: <span><?php echo $_smarty_tpl->tpl_vars['items']->value['ipaddress'];?>
</span></div></td>
            </tr>
          </table>
          <div class="order_alllist">
            <table style="font-size: 14px; margin-top: 5px; text-align: left; margin-left: 20px;" width="898" align="center" border="1" cellpadding="0" cellspacing="0" bordercolor="#6596a9" >
              <tr>
                  <td style=" font-weight:bold;" width="55%">美食篮子</td>
                  <td style=" font-size:14px; color:#ffffff; font-weight:bold; font-family:"微软雅黑";"  align="center">单价</td>
                  <td style=" font-size:14px; color:#ffffff; font-weight:bold; font-family:"微软雅黑";"  align="center" align="center"> 数量 </td>
                  <td style=" font-size:14px; color:#ffffff; font-weight:bold; font-family:"微软雅黑";"  align="center" align="center">总价  </td>
              </tr>
               <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['detlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
              <tr>
                <td style=" font-weight:bold;"  width="55%"><?php echo $_smarty_tpl->tpl_vars['value']->value['goodsname'];?>
<?php if ($_smarty_tpl->tpl_vars['value']->value['is_send']==1){?><font color=red>[赠品]</font><?php }?><?php if ($_smarty_tpl->tpl_vars['value']->value['shopid']==0){?><font color=blue>[商城]</font><?php }?></td>
                <td style=" font-size:14px; color:#ffffff; font-weight:bold; font-family:"微软雅黑";"  align="center"><?php echo $_smarty_tpl->tpl_vars['value']->value['goodscost'];?>
</td>
                  <td style=" font-size:14px; color:#ffffff; font-weight:bold; font-family:"微软雅黑";"  align="center" align="center"><?php echo $_smarty_tpl->tpl_vars['value']->value['goodscount'];?>
</td>
                  <td style=" font-size:14px; color:#ffffff; font-weight:bold; font-family:"微软雅黑";"  align="center" align="center"><?php echo $_smarty_tpl->tpl_vars['value']->value['goodscount']*$_smarty_tpl->tpl_vars['value']->value['goodscost'];?>
  </td>
              </tr>
               <?php } ?>
              <tr>
                <td style=" font-weight:bold;" colspan="4">
                	<?php if ($_smarty_tpl->tpl_vars['items']->value['scoredown']>0){?> <span class="info_name">积分：<font color=red><?php echo $_smarty_tpl->tpl_vars['items']->value['scoredown'];?>
</font>个</span><?php }?>
                               	  <span class="info_name">配送费：<font color=red><?php echo $_smarty_tpl->tpl_vars['items']->value['shopps'];?>
</font>元</span>
                               	 <?php if ($_smarty_tpl->tpl_vars['items']->value['yhjcost']>0){?><span class="info_name ml20">优惠券金额：<font color=red><?php echo $_smarty_tpl->tpl_vars['items']->value['yhjcost'];?>
</font>元</span><?php }?>
                               	<?php if ($_smarty_tpl->tpl_vars['items']->value['cxcost']>0){?> <span class="info_name ml20">促销优惠：<font color=red><?php echo $_smarty_tpl->tpl_vars['items']->value['cxcost'];?>
</font>元</span><?php }?>
                               	 <?php if ($_smarty_tpl->tpl_vars['items']->value['bagcost']>0){?><span class="info_name ml20">打包费：<font color=red><?php echo $_smarty_tpl->tpl_vars['items']->value['bagcost'];?>
</font>元</span><?php }?>
                               	 <span class="info_name ml20">应收金额：<font color=red><?php echo $_smarty_tpl->tpl_vars['items']->value['allcost'];?>
</font>元</span>
                </td>
              </tr>
            </table>
            <div class="order_bottom"  id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
            		<?php if ($_smarty_tpl->tpl_vars['items']->value['status']==1){?>
       		              	   <?php if ($_smarty_tpl->tpl_vars['items']->value['is_make']==0){?>
                                  	<span onclick="unmakeorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
);" class="curbtn"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/buzhizuo.png" /></span>

                              	<span  onclick="makeorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
);" class="curbtn"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/zhizuodingdan.png" /></span>
                              	 <?php }elseif($_smarty_tpl->tpl_vars['items']->value['is_make']==1){?>
                              	 <span onclick="sendorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
);" class="curbtn"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/peisongfahuo.png" /></span>
                               	<?php }elseif($_smarty_tpl->tpl_vars['items']->value['is_make']==2){?>
       		              	       订单取消制作
       		              	   <?php }?>
       		      <?php }?>

            	<span onclick="printorder(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
);" class="curbtn"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/dayindingdan.png" /></span>
            	<?php if ($_smarty_tpl->tpl_vars['items']->value['status']==2){?>
            	   <span class="curbtn" onclick="wancheng(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
);"  ><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/wanchengdingdan.png" /></span>
            	<?php }?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <!---订单循环-->
    </div>

    </div>
  </div>
  <div class="cl"></div>

  <!---content right end--->







<div id="print_area" style="display:none;"></div>
<div id="palywave" style="display:none;"></div>
 <script>
 	<?php if ($_smarty_tpl->tpl_vars['playwave']->value!=2){?>
 	var playwave = true;
 	<?php }else{ ?>
 		var playwave = false;
 	<?php }?>
				$(function(){
					 if(playwave == true){
					 	$('#startwave').css('background','#ec7501');
					}else{
						$('#closetwave').css('background','#ec7501');
					}
					$("#startwave").click(function(){
						$(this).css('background','#ec7501');//.siblings().css('background','');
						$('#closetwave').css('background','');
						playwave =   true;
						ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/wavecontrol/type/openwave/datatype/json"),$_smarty_tpl);?>
','');
					});
					$("#closetwave").click(function(){
						$(this).css('background','#ec7501');//.siblings().css('background','');
							$('#startwave').css('background','');
								playwave = false;
					    	ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/wavecontrol/type/closewave/datatype/json"),$_smarty_tpl);?>
','');

					});

				});
function refreshorder(){
	window.location.reload();
}
</script>
<script type="text/javascript">
	 function showdet(order,obj){
	 	var checkobj = $('#order_det'+order).is(":hidden");
	 	if(checkobj ==  false){
	 		 $(obj).text('＋');
	 		 $('#order_det'+order).hide();
	 	}else{
	 		$(obj).text('－');
	 		$('#order_det'+order).show();
	 	}

	}
	 function unorder(orderid,dno)
	 {
	 	   var dialog =  art.dialog({
	 	   	id:'coslid',
        title:'取消订单'+dno,
           content: '<div>关闭订单理由</div><div><textarea name="reason" id="reason" style="height:40px;"></textarea></div><div class="btn_wuxiao hc_listfoods_menus_foods hcl_food_lists_cont_div_order2 hcl_food_lists_cont_div_order4 hc_listfoods_menus_foods2" style="width:65px;float:left;" onclick="sureclose('+orderid+');">提交关闭</div>'
        });
	 }
	 function sureclose(orderid)
	 {
	 	  var reasons = $('#reason').val();
	 	  if(reasons == undefined || reasons == '')
	 	  {
	 	  	alert('关闭理由不能为空');
	 	  }else{
	 	    myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shopcontrol/controlname/unorder/datatype/json"),$_smarty_tpl);?>
',{'orderid':orderid,'reason':reasons});
	 	 }
	 }
	 function makeorder(orderid){

	 	  if(confirm('订单已审核通过，确认制作吗？')){
		        myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shopcontrol/controlname/makeorder/datatype/json"),$_smarty_tpl);?>
',{'orderid':orderid});
		  }



	 }
	 function wancheng(orderid){
	 	 if(confirm('订单操作确认完成该订单吗？')){
		        myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shopcontrol/controlname/wancheng/datatype/json"),$_smarty_tpl);?>
',{'orderid':orderid});
		  }
	}
	 function unmakeorder(orderid){

	 	  if(confirm('订单已审核通过，取消不制作吗？')){
		       myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shopcontrol/controlname/unmakeorder/datatype/json"),$_smarty_tpl);?>
',{'orderid':orderid});
		  }

	 }
	 function sendorder(orderid)
	{
		if(confirm('订单已审核通过，确认发货吗？')){
		   myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shopcontrol/controlname/sendorder/datatype/json"),$_smarty_tpl);?>
',{'orderid':orderid});
		}
	}
	function shenhe(orderid)
	{
		if(confirm('通过审核，此订单将生效吗？')){
		   myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shopcontrol/controlname/shenhe/datatype/json"),$_smarty_tpl);?>
',{'orderid':orderid});
		}
	}
	function delorder(orderid)
	{
		if(confirm('彻底删除订单吗？')){
		   myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shopcontrol/controlname/delorder/datatype/json"),$_smarty_tpl);?>
',{'orderid':orderid});
		}
	}
	function printorder(orderid)
	{
		$('#print_area').html('');
	 $('#order_area_'+orderid).clone().appendTo($('#print_area'));
	 $("#print_area").find('.order_bottom').remove();
	  $("#print_area").printArea();
	//	$('#print_area').html($('#order_area_'+orderid).html());
    //	 $("#print_area").find('.print_noshow').remove();
  }
  function print_all_area()
  {
  	$('#print_area').html($('#all_area').html());
	  $("#print_area").find('.order_bottom').remove();
	  $("#print_area").printArea();
  }
</script>
<script>

$(function(){
	setTimeout("get_status()",1000);
});
function get_status(){//<span id="timeshow" data="20" style="color:#666;"></div>
	//alert('xxx');
	var timeaction =  $('#showztai').attr('data');


	if(timeaction == 0){
	$('#showztai').text('检测订单..');
	 var url = siteurl+'/index.php?controller=order&action=ajaxcheckshoporder&datatype=json&random=@random@';
	 $.ajax({
       type: 'POST',
       async:false,
       url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
       data: {},
      dataType: 'json',success: function(content) {
      	if(content.error == true)
      	{
      		$('#showztai').text('未获取到新订单');
      		$('#showztai').attr('data','20');

      		setTimeout("get_status()",1000);
      	}else if(content.error == false)
      	{
      		  var checkNum = Number($('#showztai').attr('udata'));
      		  var ccNumber = Number(content.msg);
      		  if(ccNumber > checkNum){
      		  	palywav();
      		  }else{
      		  	 $('#showztai').text('未获取到新订单');
      	     	$('#showztai').attr('data','20');

      	      	setTimeout("get_status()",1000);
      		  }

      	}else{
      	 $('#showztai').text('未获取到新订单');
      		$('#showztai').attr('data','20');

      		setTimeout("get_status()",1000);
      	}

		  },
      error: function(content) {
      $('#showztai').text('未获取到新订单');
      		$('#showztai').attr('data','20');

      		setTimeout("get_status()",1000);
	   }
   });
 }else{
 	var nowtime = Number(timeaction)-1;
 	$('#showztai').attr('data',nowtime);
 	$('#showztai').html('自动刷新倒计时<span>'+nowtime+'</span>秒');
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
	//$('#cct').load("<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/upload/wave.mp3");

 	location.reload();
}
</script>
 







       </div>




<!--以下是公共的底部部分-->

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

				$(function(){

			  	if("undefined" != typeof mynomenu){
					   var allobj = $('.nav').find('li');
					  $.each(allobj, function(i, newobj) {
					  	if($(this).attr('data') == mynomenu){
					  	   $(this).addClass('on').siblings().removeClass('on');
					  	 }
					  	//alert($(this).attr('data'));

					  });
				 	}
					$(".nav ul li").click(function(){
					    	$(this).addClass('on').siblings().removeClass('on');

					});
				});
				function openlink(newlinkes){
					window.location.href=newlinkes;
				}
</script>

</body>
</html>
<?php }} ?>