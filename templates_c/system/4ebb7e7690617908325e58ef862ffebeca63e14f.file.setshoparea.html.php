<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 15:39:03
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/area/template/setshoparea.html" */ ?>
<?php /*%%SmartyHeaderCode:12496415105593b97b5c6f40-82883307%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ebb7e7690617908325e58ef862ffebeca63e14f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/area/template/setshoparea.html',
      1 => 1435822741,
      2 => 'file',
    ),
    '34c497866c78dbc09af78ddce0b250002f0d2e80' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/shopcenter.html',
      1 => 1435819148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12496415105593b97b5c6f40-82883307',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5593b97bae2445_64899946',
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
<?php if ($_valid && !is_callable('content_5593b97bae2445_64899946')) {function content_5593b97bae2445_64899946($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
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





           
 
 
 <!--content right start-->
  <div class="conWaiSet">
    <div class="shopSetTop"> <span>配送设置</span> </div>
  
     <?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['shoptype']==0){?>
       		  	<?php echo smarty_function_load_data(array('assign'=>"shopfast",'table'=>"shopfast",'where'=>"`shopid`='".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])."'",'type'=>"one"),$_smarty_tpl);?>
  
       		 	  <?php if (!empty($_smarty_tpl->tpl_vars['shopfast']->value)){?>  
       		 	  
       		 	        <?php $_smarty_tpl->tpl_vars['showcost'] = new Smarty_variable(0, null, 0);?> 
       		 	     <?php if ($_smarty_tpl->tpl_vars['shopfast']->value['sendtype']==0){?> 
       		 	       <?php $_smarty_tpl->tpl_vars['pssetinfo'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['psset']->value), null, 0);?>
       		 	       <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==2){?>
       		 	            <?php $_smarty_tpl->tpl_vars['showcost'] = new Smarty_variable(1, null, 0);?>
       		 	       <?php }?> 
       		       <?php }else{ ?>
       		         <?php $_smarty_tpl->tpl_vars['pssetinfo'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['shopfast']->value['sendset']), null, 0);?>
       		 	       <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==2){?>
       		 	            <?php $_smarty_tpl->tpl_vars['showcost'] = new Smarty_variable(2, null, 0);?>
       		 	       <?php }?> 
       		       <?php }?>
    <div class="order_search">
      <span>定位配送费设置:<!--app和使用地图定位使用以下配送费--></span>
  </div>
  <div class="peisongList">   
      <div class="peisongSet"> 
        <table width="100%" border="1"> 
                 	  <?php $_smarty_tpl->tpl_vars['tempaapcost'] = new Smarty_variable(array(), null, 0);?>
        	                  <?php if (!empty($_smarty_tpl->tpl_vars['shopfast']->value['pradiusvalue'])){?>
                        		<?php $_smarty_tpl->tpl_vars['tempaapcost'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['shopfast']->value['pradiusvalue']), null, 0);?>
                        		<?php }?>
                 	  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['shopfast']->value['pradius']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                 	   <tr>
                        <td>&nbsp; 
                        	  <?php $_smarty_tpl->tpl_vars['tempgongli'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']+1, null, 0);?>
                        	     <?php echo $_smarty_tpl->tpl_vars['tempgongli']->value;?>
 公里内配送费
                        	 
                        	</td>
                          <td>	
                        	     <input type="text" name="appcost<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>
" id="appcost<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>
"   value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['tempaapcost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']])===null||$tmp==='' ? 0 : $tmp);?>
"  onchange="modifyappdo('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>
',this);" class="myinputon" maxlength="3">元
                        	 </td>
                       
                      </tr> 
                  <?php endfor; endif; ?> 
               </table>
      </div>
  </div>
 
<div class="order_search">
    <span><?php if ($_smarty_tpl->tpl_vars['shopfast']->value['sendtype']==0){?> 网站配送, 
   	计价方式：
   	<?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==1){?>统一配送费:<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
<?php }?>
   	<?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==2){?>不同区域不同配送费<?php }?>
   	<?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==3){?>不计算配送费<?php }?>
      <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==4){?>百度地图测算配送费（1公里内:<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
,3公里内<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue2'];?>
,6公里内<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue3'];?>
 <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==4){?> 根据菜品数计算配送费:（起送费<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
,增加一菜品增加<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue2'];?>
 <?php }?>
     
   	<?php }else{ ?>店铺自行设置配送费,请设置配送区域 ,
   	 	<?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==1){?>统一配送费:<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
<?php }?>
   	  <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==2){?>不同区域不同配送费<?php }?>
   	  <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==3){?>不计算配送费<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==4){?>百度地图测算配送费（1公里内:<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
,3公里内<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue2'];?>
,6公里内<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue3'];?>
 <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==4){?> 根据菜品数计算配送费:（起送费<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
,增加一菜品增加<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue2'];?>
 <?php }?> 
   	<?php if ($_smarty_tpl->tpl_vars['showcost']->value==2){?>，并设置对应配送费<?php }?><?php }?>   
   	 </span>
</div>
       		            		       
<div class="peisongList">   
      <div class="peisongSet"> 
 		      <table width="100%"  > 
 		      	 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arealist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
           	 <tr>
          <td colspan="3">&nbsp;  
          	<div>
          	    <?php if ($_smarty_tpl->tpl_vars['shopfast']->value['sendtype']==1){?>
          	    <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?>
          	    <?php echo smarty_function_load_data(array('assign'=>"shopareacheck",'table'=>"areashop",'type'=>"one",'where'=>"areaid='".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."' and shopid = ".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id']),'fileds'=>"shopid"),$_smarty_tpl);?>
 
          	       <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" name="areaid[]" class="mycheckbox" onclick="changinput(this);" <?php if (!empty($_smarty_tpl->tpl_vars['shopareacheck']->value)){?>checked<?php }?>/>
          	    <?php }?>
          	    <?php }?>
          	    <?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
 
          	    <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?>
          	    
          	     <?php if ($_smarty_tpl->tpl_vars['showcost']->value==1){?>
          	      
     	    	     	 	    <?php echo smarty_function_load_data(array('assign'=>"shoparea",'table'=>"areatoadd",'type'=>"one",'where'=>"areaid='".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."' and shopid = 0",'fileds'=>"cost"),$_smarty_tpl);?>
 
     	    	     	 	     <big><?php echo $_smarty_tpl->tpl_vars['shoparea']->value['cost'];?>
元</big>
     	    	    <?php }elseif($_smarty_tpl->tpl_vars['showcost']->value==2){?>
     	    	        
     	    	     	 	    <?php echo smarty_function_load_data(array('assign'=>"shoparea",'table'=>"areatoadd",'type'=>"one",'where'=>"areaid='".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."'  and shopid = '".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])."'",'fileds'=>"cost"),$_smarty_tpl);?>
 
     	    	     	 	    <input type="text" name="areacost<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" id="areacost<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"   value="<?php echo $_smarty_tpl->tpl_vars['shoparea']->value['cost'];?>
"  onchange="modifydo('<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
',this);" class="myinputon" maxlength=3  <?php if (empty($_smarty_tpl->tpl_vars['shopareacheck']->value)){?> style="display:none;"<?php }?> />
              </div>
     	    	        
     	    	      <?php }?>
     	    	       <?php }?>
          	 </td>   
            </tr> 
           	<?php } ?> 
         </table>
      </div>
</div>
       <?php }else{ ?>
<div class="order_search"><span>未启用外卖店铺不需要设置配送区域</span></div>

               <?php }?>
      <?php }elseif($_smarty_tpl->tpl_vars['shopinfo']->value['shoptype']==1){?>     
      
               <?php echo smarty_function_load_data(array('assign'=>"shopfast",'table'=>"shopmarket",'where'=>"`shopid`='".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])."'",'type'=>"one"),$_smarty_tpl);?>
  
       		 	  <?php if (!empty($_smarty_tpl->tpl_vars['shopfast']->value)){?>   
       		 	        <?php $_smarty_tpl->tpl_vars['showcost'] = new Smarty_variable(0, null, 0);?> 
       		 	     <?php if ($_smarty_tpl->tpl_vars['shopfast']->value['sendtype']==0){?> 
       		 	       <?php $_smarty_tpl->tpl_vars['pssetinfo'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['psset']->value), null, 0);?>
       		 	       <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==2){?>
       		 	            <?php $_smarty_tpl->tpl_vars['showcost'] = new Smarty_variable(1, null, 0);?>
       		 	       <?php }?> 
       		       <?php }else{ ?>
       		         <?php $_smarty_tpl->tpl_vars['pssetinfo'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['shopfast']->value['sendset']), null, 0);?>
       		 	       <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==2){?>
       		 	            <?php $_smarty_tpl->tpl_vars['showcost'] = new Smarty_variable(2, null, 0);?>
       		 	       <?php }?> 
       		       <?php }?>
       		        <div class="order_search">
                  <span>  定位配送费设置:app和使用地图定位使用以下配送费 
                 	 </span>
                </div>
  <div class="peisongList">   
      <div class="peisongSet">  
        <table width="100%" border="1" bordercolor="#c6c5c5"> 
        	                  <?php $_smarty_tpl->tpl_vars['tempaapcost'] = new Smarty_variable(array(), null, 0);?>
        	                  <?php if (!empty($_smarty_tpl->tpl_vars['shopfast']->value['pradiusvalue'])){?>
                        		<?php $_smarty_tpl->tpl_vars['tempaapcost'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['shopfast']->value['pradiusvalue']), null, 0);?>
                        		<?php }?>
                 	  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['shopfast']->value['pradius']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                 	   <tr>
                        <td>&nbsp; 
                        	<div>
                        	  <?php $_smarty_tpl->tpl_vars['tempgongli'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']+1, null, 0);?>
                        	     <?php echo $_smarty_tpl->tpl_vars['tempgongli']->value;?>
 公里内配送费
                        	    </div>
                        	 </td>
                       
                     
                        <td>
                        	     <input type="text" name="appcost<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>
" id="appcost<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>
"   value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['tempaapcost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']])===null||$tmp==='' ? 0 : $tmp);?>
"  onchange="modifyappdo('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>
',this);" class="myinputon" maxlength="3"/>元
                        	 </td>
                       
                      </tr> 
                  <?php endfor; endif; ?> 
               </table> 

      </div>
    </div>
	          <div class="order_search">
                  <span><?php if ($_smarty_tpl->tpl_vars['shopfast']->value['sendtype']==0){?> 网站配送 ,
                 	计价方式：
                 	<?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==1){?>统一配送费:<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
<?php }?>
                 	<?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==2){?>不同区域不同配送费<?php }?>
                 	<?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==3){?>不计算配送费<?php }?>
	 	              <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==4){?>百度地图测算配送费（1公里内:<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
,3公里内<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue2'];?>
,6公里内<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue3'];?>
 <?php }?>
	 	              <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==4){?> 根据菜品数计算配送费:（起送费<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
,增加一菜品增加<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue2'];?>
 <?php }?>
	 	             
                 	
                 	<?php }else{ ?>店铺自行设置配送费,请设置配送区域,
                 	 	<?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==1){?>统一配送费:<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
<?php }?>
                 	  <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==2){?>不同区域不同配送费<?php }?>
                 	  <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==3){?>不计算配送费<?php }?>
	 	                <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==4){?>百度地图测算配送费（1公里内:<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
,3公里内<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue2'];?>
,6公里内<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue3'];?>
 <?php }?>
	 	                <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==4){?> 根据菜品数计算配送费:（起送费<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue1'];?>
,增加一菜品增加<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['psvalue2'];?>
 <?php }?> 
                 	<?php if ($_smarty_tpl->tpl_vars['showcost']->value==2){?>，并设置对应配送费<?php }?><?php }?></span>
             </div>
  <div class="peisongList">   
      <div class="peisongSet">
       		      <table width="100%" border="1" bordercolor="#c6c5c5"> 
                 	 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arealist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?> 
                 	 <tr>
                        <td colspan="3">&nbsp; 
                        	<div>
                        	    <?php if ($_smarty_tpl->tpl_vars['shopfast']->value['sendtype']==1){?>
                        	    <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?>
                        	     <?php echo smarty_function_load_data(array('assign'=>"shopareacheck",'table'=>"areamarket",'type'=>"one",'where'=>"areaid='".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."' and shopid = ".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id']),'fileds'=>"shopid"),$_smarty_tpl);?>
 
                        	       <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" name="areaid[]" class="mycheckbox" onclick="changinput(this);" <?php if (!empty($_smarty_tpl->tpl_vars['shopareacheck']->value)){?>checked<?php }?>>
                        	    <?php }?>
                        	    <?php }?>
                        	    <?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
 
                        	     <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?>
                        	     <?php if ($_smarty_tpl->tpl_vars['showcost']->value==1){?>
                        	      
                   	    	     	 	    <?php echo smarty_function_load_data(array('assign'=>"shoparea",'table'=>"areatomar",'type'=>"one",'where'=>"areaid='".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."' and shopid = 0",'fileds'=>"cost"),$_smarty_tpl);?>
 
                   	    	     	 	     <big><?php echo $_smarty_tpl->tpl_vars['shoparea']->value['cost'];?>
元</big>
                   	    	    <?php }elseif($_smarty_tpl->tpl_vars['showcost']->value==2){?>
                   	    	       
                   	    	     	 	    <?php echo smarty_function_load_data(array('assign'=>"shoparea",'table'=>"areatomar",'type'=>"one",'where'=>"areaid='".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."'  and shopid = '".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])."'",'fileds'=>"cost"),$_smarty_tpl);?>
 
                   	    	     	 	    <input type="text" name="areacost<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" id="areacost<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"   value="<?php echo $_smarty_tpl->tpl_vars['shoparea']->value['cost'];?>
"  onchange="modifydo('<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
',this);" class="myinputon" maxlength=3  <?php if (empty($_smarty_tpl->tpl_vars['shopareacheck']->value)){?> style="display:none;"<?php }?> >
                              </div>
                   	    	        
                   	    	      <?php }?>
                   	    	       <?php }?>
                        	 </td>
                        
                      </tr> 
                 	<?php } ?> 
               </table>
                 </div>
    </div>
               <?php }else{ ?>
<div class="order_search">
        <span> 未启用超市店铺不需要设置配送区域!</span>
</div>
               <?php }?>
      
      
          
      <?php }?>
</div>
  <div class="cl"></div>
  
  <!--content right end--> 
 
 
 
  
<script>
	//选择地址
	var showcost = '<?php echo $_smarty_tpl->tpl_vars['showcost']->value;?>
';
 function changinput(obj){
 	if($(obj).is(':checked')){ 
 		//配送区域指定
 		shopidtoad($(obj).val(),'add');
 		if(showcost == 2){
 			$('#areacost'+$(obj).val()).show();
	  }
 	}else{ 
 		shopidtoad($(obj).val(),'del');
 		if(showcost == 2){
 			$('#areacost'+$(obj).val()).hide();
	  }
 	}
 }
function selall(obj){
	var findobj = $('#checkboxdiv'+$(obj).val()).find("[name='areaid[]']");
	var findobj2 = $('#checkboxdiv'+$(obj).val()).find("[type='text']");
	if($(obj).is(':checked')){  
		 $(findobj).attr('checked',true);
		 $(findobj2).removeClass('myinput').addClass('myinputon');
		 $(findobj2).attr('disabled',false); 
		 $(findobj2).attr('value',$('#sendcost').val());
		 shopidtoad(2,$(obj).val(),$('#sendcost').val(),1);
	}else{
		$(findobj).attr('checked',false);
		 $(findobj2).removeClass('myinputon').addClass('myinput');
		 $(findobj2).attr('disabled',true);
		 $(findobj2).attr('value','');
		 shopidtoad(2,$(obj).val(),$('#areacost'+$(obj).val()).val(),2);
	}
}
 
function modifydo(areaid,obj)
{
	 var backinfo = ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/area/shoptoadcost/datatype/json"),$_smarty_tpl);?>
',{'areaid':areaid,'cost':$(obj).val()});
	if(backinfo.flag == true)
	{ 
		diaerror(backinfo.content); 
	}else{
	  
		artsucces('保存成功');
	}
} 
function modifyappdo(gongli,obj){
	var backinfo = ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/area/shoptoappcost/datatype/json"),$_smarty_tpl);?>
',{'gongli':gongli,'cost':$(obj).val()});
	if(backinfo.flag == true)
	{ 
		diaerror(backinfo.content); 
	}else{
	  
		artsucces('保存成功');
	}
}
function setdefault(obj){ 
	/*
	showop('店铺默认配送费用修改保存中');
	var backinfo = ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/shopcenter/setdefaultsend"),$_smarty_tpl);?>
',{'sendcost':$(obj).val()});
	if(backinfo.flag == true)
	{
		hideop();
		diaerror(backinfo.content); 
	}else{
		hideop();
		artsucces('保存成功');
	}*/
}
//店铺ID到地址ID关联保存
function shopidtoad(areaid,types)
{ 
	  
	var backinfo = ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/area/shopidtoad/datatype/json"),$_smarty_tpl);?>
',{'areaid':areaid,'types':types});
	if(backinfo.flag == true)
	{
		 
		diaerror(backinfo.content); 
	}else{
	  
		artsucces('保存成功');
	}
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