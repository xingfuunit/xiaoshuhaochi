<?php /* Smarty version Smarty-3.1.10, created on 2015-06-18 10:00:27
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/index.html" */ ?>
<?php /*%%SmartyHeaderCode:14106487625582263b0f4279-53371028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ce74236113e0bc1164bdf31b166ebd5e1d91ee5' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/index.html',
      1 => 1434531487,
      2 => 'file',
    ),
    '94c15e72c0d75a0e7a643019ff901b09d8719615' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/weixin.html',
      1 => 1434531620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14106487625582263b0f4279-53371028',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tempdir' => 0,
    'siteurl' => 0,
    'is_static' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5582263b1ba839_06581225',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582263b1ba839_06581225')) {function content_5582263b1ba839_06581225($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
?><!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title> 
	 
	<link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/css/public.css">   
  <link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/css/index.css">   
 

	<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/js/jquery.js"></script> 
  <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/js/public.js"></script>  
   <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/js/swipe.js"></script> 
 
 <script>
 	$(function(){ 
 	      var bullets = document.getElementById('abdcd').getElementsByTagName('span');
 	      var slider =  Swipe(document.getElementById('slider'), {
           auto: 3000,
           continuous: true,
           callback: function(pos) { 
              var i = bullets.length;
              while (i--) {
                bullets[i].className = ' ';
              }
              bullets[pos].className = 'on'; 
           }
        });  
}); 
</script>

<script> 
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
</script>
 <script type="text/javascript" name="baidu-tc-cerfication" src="http://apps.bdimg.com/cloudaapi/lightapp.js#eb0a315369c4f60074e72f7079c87fb8"></script><script type="text/javascript">window.bd && bd._qdc && bd._qdc.init({app_id: 'fb7bfde77727fd99a32117ab'});</script>
</head>
<body> 
	<div id="loading" style="display: block;"><div class="loadingbox"><section class="ffffbox"><div class="loadingpice"></div></section></div></div>
	 
<div id="index">
  	 <header><img src="<?php echo $_smarty_tpl->tpl_vars['html5logo']->value;?>
" style="height:25px;margin-top: 5px;" id="sitelogo"></header>
  	<div class="container">
  		<section> 
  			<section id="slider" class="swipe" style="visibility: visible;">
  				<div class="swipe-wrap">
  				  <?php echo smarty_function_load_data(array('assign'=>"list",'table'=>"adv",'fileds'=>"*",'limit'=>"5",'where'=>"advtype='html5lunbo'"),$_smarty_tpl);?>
 
  				  <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
  				   <div class="wrap" ><img src="<?php echo $_smarty_tpl->tpl_vars['items']->value['img'];?>
" width="100%" alt=""></div>
  				  <?php } ?>
  				</div>
  			 <div class="bgboxgo">
  						<div class="botton-box mBxCm" id="abdcd">
  							 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
  							    <span class="on"></span>
  							 <?php } ?>
  					 </div>
  				</div>
  			</section>
  			
  			<section class="search mShadowBm">
  				<div class="cont">
  					<a id="cityname" class="select"></a>
  					<form id="searchForm" action="search.html">
  						<div class="inputPp">
  							<input type="text" id="supplierName" name="supplierName" class="inp" placeholder="输入小区名/楼宇名/餐厅名">
  						</div>
  				  </form>
  				</div>
  			</section>
  			
  			<nav class="clearfix">
  				<ul>
  					<li class="n1 clkitm" id="waiMai"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite&action=index&id=27"),$_smarty_tpl);?>
"><strong>叫外卖</strong><p>周边美食大全</p></a></li>
  					<li class="n2 clkitm" id="tangShi"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/member"),$_smarty_tpl);?>
"><strong>我的</strong><p>我的帐号信息</p></a></li>
  					<li class="n3 clkitm" id="dingTai"> <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/market"),$_smarty_tpl);?>
"><strong>买零食</strong><p>周边小卖铺</p></a></li>
  					<li class="n4 clkitm" id="paiDui"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/choice"),$_smarty_tpl);?>
"><strong>选择</strong><p>选择地区</p></a></li> 
  				</ul>
  			</nav>
  	</section>

   
  	<footer>
  		<nav>
  			<ul>
  				<li id="homeindex"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/index"),$_smarty_tpl);?>
">首页</a></li>
  	    	<li id="footerorderlist"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/order"),$_smarty_tpl);?>
">订单</a></li>
  	    	<li id="favorate"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/collect"),$_smarty_tpl);?>
">收藏</a></li>
  	    	<li id="opinion"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/ask"),$_smarty_tpl);?>
">意见反馈</a></li>
  	    </ul>
  	  </nav>
  	  <p>Copyright © 2011-2014 Powered by <font id="sitetitle"></font></p>
  	</footer>
  	
  </div>
   
</div> 
 <script>
 	$(function(){  
 	   $('#loading').hide(); 
  });
  </script>
</body>
</html>
 <?php }} ?>