<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 16:41:11
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/template/usershopfast.html" */ ?>
<?php /*%%SmartyHeaderCode:1889358499558d04866e1c05-59286070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6624401ac4395d9fa7fce0d83d87ae99a7ea5d53' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/template/usershopfast.html',
      1 => 1435743857,
      2 => 'file',
    ),
    '34c497866c78dbc09af78ddce0b250002f0d2e80' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/shopcenter.html',
      1 => 1435819148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1889358499558d04866e1c05-59286070',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558d0486acef82_57677554',
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
<?php if ($_valid && !is_callable('content_558d0486acef82_57677554')) {function content_558d0486acef82_57677554($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
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

 <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/plugins/iframeTools.js"></script>
   <script> 
  	var mynomenu='baseset';
        $(function(){
              hide_div();
            $("input[name='is_goshop']").click(function(){
               hide_div();
            })
        })
        function hide_div(){
             if ( $("input[name='is_goshop']").attr("checked")=="checked") {
                    $(".in_shop").show();
                }else{
                    $(".in_shop").hide();
                }
        }
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





           

   <div class="conWaiSet">

            <div class="shopSetTop">
            	<span>店铺设置</span>
            </div>
            	  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tempdir']->value)."/shop/usereditmenu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

             <div class="cl"></div>

                <form id="loginForm" method="post" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/savefastfood"),$_smarty_tpl);?>
">
                 <div class="jutiSet">
                     
                      <div class="serxuanze">
                        <div class="xuanze_left">
                            <span>业务类型:</span>
                        </div>
                        <div class="xuanze_right">
                           <input type="checkbox"<?php if (!isset($_smarty_tpl->tpl_vars['shopfast']) || !is_array($_smarty_tpl->tpl_vars['shopfast']->value)) $_smarty_tpl->createLocalArrayVariable('shopfast');
if ($_smarty_tpl->tpl_vars['shopfast']->value['is_waimai'] = 1){?>checked<?php }?> value="1" name="is_waimai"> 外卖
                           <input type="checkbox"<?php if ($_smarty_tpl->tpl_vars['shopfast']->value['is_goshop']==1){?>checked<?php }?> value="1" name="is_goshop">点菜订位
                        </div>
                        <div class="cl"></div>
                    </div>
                    
                     <!---->
                     
                      <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attrlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
                       <div class="serxuanze">
                    	<div class="xuanze_left">
                        	<span><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</span>
                        </div>
                        <div class="xuanze_right">
                        	<?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?>
                        	      <?php if ($_smarty_tpl->tpl_vars['items']->value['type']=='input'){?>
                        	         <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(($_smarty_tpl->tpl_vars['items']->value['id']).('-0'), null, 0);?>
                        	         <input type="input" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['myattr']->value[$_smarty_tpl->tpl_vars['shownow']->value])===null||$tmp==='' ? '' : $tmp);?>
" name="mydata<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" class="text">分钟
                        	      <?php }elseif($_smarty_tpl->tpl_vars['items']->value['type']=='img'){?>
                        	        <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(($_smarty_tpl->tpl_vars['items']->value['id']).('-'), null, 0);?>
                        	         <?php $_smarty_tpl->tpl_vars['shownow1'] = new Smarty_variable(($_smarty_tpl->tpl_vars['shownow']->value).($_smarty_tpl->tpl_vars['itv']->value['id']), null, 0);?>
                        	       <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" name="mydata<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
[]"  <?php if (isset($_smarty_tpl->tpl_vars['myattr']->value[$_smarty_tpl->tpl_vars['shownow1']->value])){?>checked<?php }?> ><img src="<?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>
" width=30px>
                        	      <?php }elseif($_smarty_tpl->tpl_vars['items']->value['type']=='checkbox'){?>
                        	         <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(($_smarty_tpl->tpl_vars['items']->value['id']).('-'), null, 0);?>
                        	         <?php $_smarty_tpl->tpl_vars['shownow1'] = new Smarty_variable(($_smarty_tpl->tpl_vars['shownow']->value).($_smarty_tpl->tpl_vars['itv']->value['id']), null, 0);?>
                        	         <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" name="mydata<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
[]" <?php if (isset($_smarty_tpl->tpl_vars['myattr']->value[$_smarty_tpl->tpl_vars['shownow1']->value])){?>checked<?php }?> ><?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>

                        	      <?php }elseif($_smarty_tpl->tpl_vars['items']->value['type']=='radio'){?>
                        	           <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(($_smarty_tpl->tpl_vars['items']->value['id']).('-'), null, 0);?>
                        	         <?php $_smarty_tpl->tpl_vars['shownow1'] = new Smarty_variable(($_smarty_tpl->tpl_vars['shownow']->value).($_smarty_tpl->tpl_vars['itv']->value['id']), null, 0);?>
                        	           <input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['itv']->value['id'];?>
" name="mydata<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['myattr']->value[$_smarty_tpl->tpl_vars['shownow1']->value])){?>checked<?php }?>><?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>

                        	      <?php }?>

                        	<?php } ?>
                        	 </div>
                           
                           
                        <div class="cl"></div>
                    </div>
                      <?php } ?>

                       <!---->
                   
                      <div class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>是否支持预定(外卖)</span>
                        </div>
                        <div class="xuanze_right">
                        <input type="radio"<?php if ($_smarty_tpl->tpl_vars['shopfast']->value['is_orderbefore']==1){?> checked<?php }?> name="is_orderbefore" id="" value="1" />是 <input type="radio" name="is_orderbefore" id="" value="0" <?php if ($_smarty_tpl->tpl_vars['shopfast']->value['is_orderbefore']==0){?> checked<?php }?>/>否 <span id="befortime" <?php if ($_smarty_tpl->tpl_vars['shopfast']->value['is_orderbefore']==1){?>style="display:inline-block;" <?php }else{ ?>style="display:none;"<?php }?>>,可预定天数<input type="text"  name="befortime" value="<?php echo $_smarty_tpl->tpl_vars['shopfast']->value['befortime'];?>
" class="ttext">0表示只支持当天</span>
                        </div>
                        <div class="cl"></div>
                    </div>
                     <!---->
                      <div class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>制作时间(外卖)</span>
                        </div>
                        <div class="xuanze_right">
                        	<input type="text" name="maketime" value="<?php echo $_smarty_tpl->tpl_vars['shopfast']->value['maketime'];?>
"  />分钟
                        </div>
                        <div class="cl"></div>
                    </div>

                        <!---->
                         <div class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>人均消费(外卖)</span>
                        </div>
                        <div class="xuanze_right">
                        	<input type="text" name="personcost" value="<?php echo $_smarty_tpl->tpl_vars['shopfast']->value['personcost'];?>
"  />元
                        </div>
                        <div class="cl"></div>
                    </div>
                       
                    
                          <!---->

                    <div class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>起送价(外卖)</span>
                        </div>
                        <div class="xuanze_right">
                        	<input type="text"name="limitcost" value="<?php echo $_smarty_tpl->tpl_vars['shopfast']->value['limitcost'];?>
" />元起
                        </div>
                        <div class="cl"></div>
                    </div>


                    <div class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>起送说明(外卖)</span>
                        </div>
                        <div class="dianpu_right">
                        	<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopfast']->value['limitstro'];?>
"  name="limitstro" />

                        </div>
                        <div class="cl"></div>
                    </div>
                        <!---->
                    <div class="serxuanze">
                    	<div class="xuanze_left">
                       <span>配送时间段(外卖)</span>
                        </div>
                        <div class="xuanze_right">
                        	<div>

                        		 <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_variable(explode("|",$_smarty_tpl->tpl_vars['shopinfo']->value['starttime']), null, 0);?>
                        	 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['foo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
                        	 <?php if (!empty($_smarty_tpl->tpl_vars['items']->value)){?>
                        	     <?php $_smarty_tpl->tpl_vars['newtime'] = new Smarty_variable(explode("-",$_smarty_tpl->tpl_vars['items']->value), null, 0);?>

                        	     <?php if (!empty($_smarty_tpl->tpl_vars['newtime']->value[0])){?>
                        	         <?php $_smarty_tpl->tpl_vars['dettime'] = new Smarty_variable(explode(":",$_smarty_tpl->tpl_vars['newtime']->value[0]), null, 0);?>
                        	         <?php $_smarty_tpl->createLocalArrayVariable('newtimedata', null, 0);
$_smarty_tpl->tpl_vars['newtimedata']->value[] = $_smarty_tpl->tpl_vars['dettime']->value[0];?>
                        	         <?php $_smarty_tpl->createLocalArrayVariable('newtimedata', null, 0);
$_smarty_tpl->tpl_vars['newtimedata']->value[] = $_smarty_tpl->tpl_vars['dettime']->value[1];?>
                        	     <?php }?>
                        	     <?php if (!empty($_smarty_tpl->tpl_vars['newtime']->value[1])){?>
                        	         <?php $_smarty_tpl->tpl_vars['dettime'] = new Smarty_variable(explode(":",$_smarty_tpl->tpl_vars['newtime']->value[1]), null, 0);?>
                        	         <?php $_smarty_tpl->createLocalArrayVariable('newtimedata', null, 0);
$_smarty_tpl->tpl_vars['newtimedata']->value[] = $_smarty_tpl->tpl_vars['dettime']->value[0];?>
                        	         <?php $_smarty_tpl->createLocalArrayVariable('newtimedata', null, 0);
$_smarty_tpl->tpl_vars['newtimedata']->value[] = $_smarty_tpl->tpl_vars['dettime']->value[1];?>
                        	     <?php }?>
                        	   <?php }?>
                        	  <?php } ?>
					               	<span>上午
					               	<input type="text" name="dotime[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['morning_offer1']->value[0])===null||$tmp==='' ? '' : $tmp);?>
" /> : <input type="text" name="dotime[]"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['morning_offer1']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"/>
                            ---<input type="text" name="dotime[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['morning_offer2']->value[0])===null||$tmp==='' ? '' : $tmp);?>
"/> : <input type="text" name="dotime[]"   value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['morning_offer2']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"  />
                         </span><span>
                            下午<input type="text" name="dotime[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['afternoon_offer1']->value[0])===null||$tmp==='' ? '' : $tmp);?>
" /> : <input type="text" name="dotime[]"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['afternoon_offer1']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"/>
                            ---<input type="text" name="dotime[]"   value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['afternoon_offer2']->value[0])===null||$tmp==='' ? '' : $tmp);?>
" /> : <input type="text" name="dotime[]"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['afternoon_offer2']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"/></span>
                          </div>
                        </div>
                        <div class="cl"></div>
                     </div>
                        <!---->
                        <!---->
                         <div class="serxuanze">
                        <div class="xuanze_left">
                            <span>配送时间间隔(外卖)</span>
                        </div>

                        <div class="xuanze_right">
                            <input type="text" name="interval" value="<?php echo $_smarty_tpl->tpl_vars['shopfast']->value['interval'];?>
"  />默认为30分钟
                        </div>
                        <!---->
                        <div class="cl"></div>
                    </div>
                   
                    <div class="serxuanze">
                        <div class="xuanze_left">
                            <span>当天下单截至时间(外卖)</span>
                        </div>

                        <div class="xuanze_right">
                            <input type="text" class="times" name="asoftime" value="<?php echo $_smarty_tpl->tpl_vars['shopfast']->value['asoftime'];?>
"/>格式(09:00)
                        </div>
                        <div class="cl"></div>
                      </div>
                        <!---->
                       
                     <div class="serxuanze" id="pssset">
                    	<div class="xuanze_left">
                        	<span>配送方式(外卖)</span>
                        </div>
                        <div class="xuanze_right">
                        	
                            <label for="pssset1">
                               <?php if ($_smarty_tpl->tpl_vars['opensitesend']->value==1){?>
                                <input id="pssset1" type="radio" value="0" name="sendtype" <?php if (empty($_smarty_tpl->tpl_vars['shopfast']->value['sendtype'])){?> checked<?php }?>>网站配送 <?php }?>
                            </label>
                            <label for="pssset2">
                                <?php if ($_smarty_tpl->tpl_vars['openshopsend']->value==1){?> <input id="pssset2" type="radio" value="1" name="sendtype" <?php if ($_smarty_tpl->tpl_vars['shopfast']->value['sendtype']==1){?> checked<?php }?>>店铺自行配送  <?php }?>
                            </label>
                        	          
                        </div>
                        <div class="cl"></div>
                    </div>
                        <!---->
                          
                    <div class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>定位最大半径</span>
                        </div>
                        <div class="xuanze_right">
                        	<input type="text" name="pradius" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shopfast']->value['pradius'])===null||$tmp==='' ? 1 : $tmp);?>
"  />千米 用户位置和商家距离小于最大定位半径则显示
                        </div>
                        <div class="cl"></div>
                    </div>
                        <!---->
                        
                            <!---->
                          <div class="serxuanze in_shop">
                    	<div class="xuanze_left">
                        	<span>是否支持预定(堂食)</span>
                        </div>
                        <div class="xuanze_right">
                        <input type="radio"<?php if ($_smarty_tpl->tpl_vars['shopfast']->value['is_orderbefore_inshop']==1){?> checked<?php }?> name="is_orderbefore_inshop" id="" value="1" />是 <input type="radio" name="is_orderbefore_inshop" id="" value="0" <?php if ($_smarty_tpl->tpl_vars['shopfast']->value['is_orderbefore_inshop']==0){?> checked<?php }?>/>否 <span id="befortime_inshop" <?php if ($_smarty_tpl->tpl_vars['shopfast']->value['is_orderbefore_inshop']==1){?>style="display:inline-block;" <?php }else{ ?>style="display:none;"<?php }?>>,可预定天数<input type="text"  name="befortime_inshop" value="<?php echo $_smarty_tpl->tpl_vars['shopfast']->value['befortime_inshop'];?>
" class="ttext">0表示只支持当天</span>
                        </div>
                        <div class="cl"></div>
                    </div>
                          <!---->
                     <!---->
                      <div class="serxuanze in_shop">
                        <div class="xuanze_left">
                            <span>桌位最大座位数:</span>
                        </div>
                        <div class="xuanze_right">
                           <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['shopfast']->value['personcount'];?>
" name="personcount"> 人

                        </div>
                        <div class="cl"></div>
                    </div>
                     <!---->
        			 
                    <div class="serxuanze in_shop">
                    	<div class="xuanze_left">
                       <span>到店消费时间段</span>
                        </div>
                        <div class="xuanze_right">
                        	<div>

                        		 <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_variable(explode("|",$_smarty_tpl->tpl_vars['shopinfo']->value['starttime']), null, 0);?>
                        	 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['foo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
                        	 <?php if (!empty($_smarty_tpl->tpl_vars['items']->value)){?>
                        	     <?php $_smarty_tpl->tpl_vars['newtime'] = new Smarty_variable(explode("-",$_smarty_tpl->tpl_vars['items']->value), null, 0);?>

                        	     <?php if (!empty($_smarty_tpl->tpl_vars['newtime']->value[0])){?>
                        	         <?php $_smarty_tpl->tpl_vars['dettime'] = new Smarty_variable(explode(":",$_smarty_tpl->tpl_vars['newtime']->value[0]), null, 0);?>
                        	         <?php $_smarty_tpl->createLocalArrayVariable('newtimedata', null, 0);
$_smarty_tpl->tpl_vars['newtimedata']->value[] = $_smarty_tpl->tpl_vars['dettime']->value[0];?>
                        	         <?php $_smarty_tpl->createLocalArrayVariable('newtimedata', null, 0);
$_smarty_tpl->tpl_vars['newtimedata']->value[] = $_smarty_tpl->tpl_vars['dettime']->value[1];?>
                        	     <?php }?>
                        	     <?php if (!empty($_smarty_tpl->tpl_vars['newtime']->value[1])){?>
                        	         <?php $_smarty_tpl->tpl_vars['dettime'] = new Smarty_variable(explode(":",$_smarty_tpl->tpl_vars['newtime']->value[1]), null, 0);?>
                        	         <?php $_smarty_tpl->createLocalArrayVariable('newtimedata', null, 0);
$_smarty_tpl->tpl_vars['newtimedata']->value[] = $_smarty_tpl->tpl_vars['dettime']->value[0];?>
                        	         <?php $_smarty_tpl->createLocalArrayVariable('newtimedata', null, 0);
$_smarty_tpl->tpl_vars['newtimedata']->value[] = $_smarty_tpl->tpl_vars['dettime']->value[1];?>
                        	     <?php }?>
                        	   <?php }?>
                        	  <?php } ?>
					              <span>上午
					               	<input type="text" name="dotime2[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['morning_inshop1']->value[0])===null||$tmp==='' ? '' : $tmp);?>
" /> : <input type="text" name="dotime2[]"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['morning_inshop1']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"/>
                            ---<input type="text" name="dotime2[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['morning_inshop2']->value[0])===null||$tmp==='' ? '' : $tmp);?>
"/> : <input type="text" name="dotime2[]"   value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['morning_inshop2']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"  />
                         </span><span>
                            下午<input type="text" name="dotime2[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['afternoon_inshop1']->value[0])===null||$tmp==='' ? '' : $tmp);?>
" /> : <input type="text" name="dotime2[]"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['afternoon_inshop1']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"/>
                            ---<input type="text" name="dotime2[]"   value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['afternoon_inshop2']->value[0])===null||$tmp==='' ? '' : $tmp);?>
" /> : <input type="text" name="dotime2[]"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['afternoon_inshop2']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"/></span>
                          </div>
                        </div>
                        <div class="cl"></div>
                     </div>
                        <!---->
                    <div class="serxuanze in_shop">
                        <div class="xuanze_left">
                            <span>到店消费间隔</span>
                        </div>

                        <div class="xuanze_right">
                            <input type="text" name="interval_inshop" value="<?php echo $_smarty_tpl->tpl_vars['shopfast']->value['interval_inshop'];?>
"  />默认30分钟
                        </div>
                        <div class="cl"></div>
                      </div>
                       <div class="settijiao">


                        	<input class="xuanze_right" type="submit" name=""  value="点击提交" />

                        <div class="cl"></div>
                    </div>


       			 </div>
              </form>


        </div>
        <div class="cl"></div>


</div>

<div class="cl"></div>
<script type="text/javascript">
	         <?php $_smarty_tpl->tpl_vars['shoppsset'] = new Smarty_variable($_smarty_tpl->tpl_vars['defaultset']->value, null, 0);?>
           <?php if (!empty($_smarty_tpl->tpl_vars['shopfast']->value['sendset'])){?>
	 	           <?php $_smarty_tpl->tpl_vars['shoppsset'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['shopfast']->value['sendset']), null, 0);?>
                           
	 	       <?php }?>
 $(function(){



 	 var myset=  $("input[name='sendtype']:checked").val();
 	 if(myset ==  1){
 	 	    showhtml();
            $('#pstype').css({
                'height':'70px'
            });

            $('#pstype').children().eq(0).css({
                'line-height':'70px'
            });
            $('#pstype').children().eq(0).children('span').css({
                'line-height':'75px',
                'font-size':'16px'
            });
            
            $('#pstype').children().eq(1).css({
                'padding-left':'20px'
            });
            $('#pstype').children().css({
                'height':'100%',
                'line-height':'30px',
                'text-align':'left'
            });
           $('<br/>').insertBefore( $('#pstype').children('.xuanze_right').children("input").eq(3) );
            //alert( $('#pstype').children('.xuanze_right').children("input[value='3']").next() );
 	 }

 });
 function showhtml(){
 	 <?php $_smarty_tpl->tpl_vars['pssetinfo'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['psset']->value), null, 0);?>;
 	 var locationtype = '<?php echo $_smarty_tpl->tpl_vars['pssetinfo']->value['locationtype'];?>
';
 	 if(locationtype == 1){
 	 	var otherhtml = '';
 	 	  <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['mykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pestypearr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['mykey']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
 	 	  <?php if ($_smarty_tpl->tpl_vars['mykey']->value!=2){?>
 	 	     otherhtml += '<input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['mykey']->value;?>
"  <?php if ($_smarty_tpl->tpl_vars['shoppsset']->value['pstype']==$_smarty_tpl->tpl_vars['mykey']->value){?>checked<?php }?> name="pstype"> <?php echo $_smarty_tpl->tpl_vars['items']->value;?>
';
 	 	   <?php }?>
 	 	  <?php } ?>
 	 	  //<div class="serxuanze" id="pstype"><div class="xuanze_left"> <span>计费方式</span> </div> <div class="xuanze_right">  </div> <div class="cl"></div>  </div>
 	 	  $('#pssset').after('<div class="serxuanze" id="pstype"><div class="xuanze_left"> <span>计费方式</span> </div> <div class="xuanze_right"> '+otherhtml+' </div> <div class="cl"></div>  </div>');
 	 }else{
 	 	 var otherhtml = '';
 	 	 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['mykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pestypearr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['mykey']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
 	 	  <?php if ($_smarty_tpl->tpl_vars['mykey']->value!=4){?>   
 	 	     otherhtml += '<input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['mykey']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['shoppsset']->value['pstype']==$_smarty_tpl->tpl_vars['mykey']->value){?>checked<?php }?>  name="pstype"> <?php echo $_smarty_tpl->tpl_vars['items']->value;?>
';
 	 	   <?php }?> 
 	 	  <?php } ?> 
 	 	  $('#pssset').after('<div class="serxuanze" id="pstype"><div class="xuanze_left"> <span>计费方式(外卖)</span> </div> <div class="xuanze_right"> '+otherhtml+' </div> <div class="cl"></div>  </div>');
 	 }
 	 $('input:radio[name="pstype"]:checked').trigger("click");
 }
 $("input[name='pstype']").live("click", function() {
 	   $('.feetr').remove();
  	 var myset=  $("input[name='pstype']:checked").val();
  	 var otherhtml = '';
 	   if(myset ==  1){//店铺统一配送费






 	       otherhtml ='<div class="serxuanze feetr active"><div class="xuanze_left"><span>配送费</span></div><div class="xuanze_right" style="width:400px;"> <input type="text" name="psvalue1" value="<?php echo $_smarty_tpl->tpl_vars['shoppsset']->value['psvalue1'];?>
"  />元  </div> <div class="cl"></div>  </div>';

 	   }else if(myset == 2){//店铺区域设置配送费

 	   }else if(myset == 3){//不计算配送费
 	   }
 	   else if(myset == 4){//百度地图测算配送费
 	   	otherhtml ='';
 	   }else if(myset == 5){
 	    otherhtml ='<div class="serxuanze feetr active"><div class="xuanze_left"><span>基础配送费</span></div><div class="xuanze_right" style="width:400px;"> <input type="text" name="psvalue1" value="<?php echo $_smarty_tpl->tpl_vars['shoppsset']->value['psvalue1'];?>
"  />元  </div> <div class="cl"></div>  </div>';
 	    otherhtml +=' <div class="serxuanze feetr active"><div class="xuanze_left"><span>自增费</span></div><div class="xuanze_right" style="width:400px;"> <input type="text" name="psvalue2" value="<?php echo $_smarty_tpl->tpl_vars['shoppsset']->value['psvalue2'];?>
"  />元  </div> <div class="cl"></div>  </div>';
 	   }else if (myset == 6) {
              otherhtml ='<div class="serxuanze feetr active"><div class="xuanze_left"><span>未满</span></div><div class="xuanze_right" style="width:400px;"> <input type="text" name="psvalue1" value="<?php echo $_smarty_tpl->tpl_vars['shoppsset']->value['psvalue1'];?>
"  />元  </div> <div class="cl"></div>  </div>';
 	    otherhtml +=' <div class="serxuanze feetr active"><div class="xuanze_left"><span>需付</span></div><div class="xuanze_right" style="width:400px;"> <input type="text" name="psvalue2" value="<?php echo $_smarty_tpl->tpl_vars['shoppsset']->value['psvalue2'];?>
"  />元  </div> <div class="cl"></div>  </div>';
        
        }
 	   $('#pstype').after(otherhtml);
       $('.feetr').css({
        'margin-left':$('#pstype').children().eq(0).width()+'px'
       });
       $('.feetr .xuanze_right').width( $('#pstype').children().eq(1).width() - $('.feetr').children().eq(0).width() );
  });

  $("input[name='sendtype']").live("click", function() {
  	 var myset=  $("input[name='sendtype']:checked").val();
 	   if(myset ==  1){
 	 	    showhtml();

 	  }else{
 	    $('.feetr').remove();
 	    $('#pstype').remove();
 	  }
  });
	function openfast(){
	  if(confirm('确定开启外卖操作吗？')){
	  	$("input[name='openshopfast']").attr("checked",false);
	  	myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/startshop/datatype/json"),$_smarty_tpl);?>
',{opentype:'shopfast'});
	   }else{
	   	$("input[name='openshopfast']").attr("checked",false);
	  }
	}
	function closefast(){
		if(confirm('确定关闭外卖操作吗？\n 对应商品数据将会清空')){
	  	$("input[name='openshopfast']").attr("checked",true);
	  	myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/closeshop/datatype/json"),$_smarty_tpl);?>
',{opentype:'shopfast'})
	   }else{
	   	$("input[name='openshopfast']").attr("checked",true);
	  }
	}
	$("input[name='is_orderbefore']").click(function(){
		  var checkid =  $("input[name='is_orderbefore']:checked").val();
		 //befortime
		 if(checkid == 1){
		 	$('#befortime').show();
		 }else{
		 	 $('#befortime').hide();
		 	 $("input[name='befortime']").val('0');
		 }

	});
        $("input[name='is_orderbefore_inshop']").click(function(){
		  var checkid =  $("input[name='is_orderbefore_inshop']:checked").val();
		 //befortime
		 if(checkid == 1){
		 	$('#befortime_inshop').show();
		 }else{
		 	 $('#befortime_inshop').hide();
		 	 $("input[name='befortime_inshop']").val('0');
		 }

	});
	$('.hc_login_btn_div').click(function(){
		$('#loginForm').submit();
	})
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