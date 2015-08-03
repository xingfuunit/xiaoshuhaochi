<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 16:40:57
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/template/useredit.html" */ ?>
<?php /*%%SmartyHeaderCode:2089820596558d0455b0dd05-94490284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a521445a7feda0e98f33d23c3a3fd66b3b29db8e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/template/useredit.html',
      1 => 1435744389,
      2 => 'file',
    ),
    '34c497866c78dbc09af78ddce0b250002f0d2e80' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/shopcenter.html',
      1 => 1435819148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2089820596558d0455b0dd05-94490284',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558d0455d70467_47017420',
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
<?php if ($_valid && !is_callable('content_558d0455d70467_47017420')) {function content_558d0455d70467_47017420($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
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
  <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/template.min.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/ajaxfileupload.js"> </script>
  <script>
  	var mynomenu='baseset';
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


  <div class="conWaiSet">
        <!--    <div class="shopSetTop">
            	<span>店铺设置</span>
            </div> -->
            	  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tempdir']->value)."/shop/usereditmenu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

             
                <form id="loginForm" method="post" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/shopcenter/savebase"),$_smarty_tpl);?>
">
                 <ul class="jutiSet"><!--  class="jutiSet" -->
    		     	<li class="serxuanze">
                    		<div class="xuanze_left">
                        	<span>店铺名字:</span>
                        </div>
                        <div class="dianpu_right">
                        	<input type="text" id="shopname" name="shopname" value="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
"    />

                        </div>
                        
                    </li>
                    <li class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>接单电话:</span>
                        </div>
                        <div class="dianpu_right">
                        	<input type="text"  id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['phone'];?>
"     />
                        </div>
                    </li>
                    <li class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>店铺负责人电话:</span>
                        </div>
                        <div class="dianpu_right">
                        	<input type="text" id="maphone" name="maphone" value="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['maphone'];?>
"  />
                        </div>
                    </li>
                    <li class="upimg">
                    	<div class="file_img">
                        	 <img src="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shoplogo'];?>
" id="imgshow" <?php if (empty($_smarty_tpl->tpl_vars['shopinfo']->value['shoplogo'])){?> style="display:none;"<?php }?>>
                        </div>
                        <div class="file_xxiang">
                        	<input type="hidden" name="shoplogo" id="shoplogo" value="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shoplogo'];?>
" class="skey">
                     <div id="div-headpicUpload">
		                  <form id="form1" name="form1" method="post"  enctype="multipart/form-data" target="ifr-headpic-upload" onsubmit="return checkImagetype('1');">
		                  	<div class="">
		               		<input name="head" type="file" id="imgFile" name="imgFile" onchange="$('#input1').val($(this).val())"  class="curbtn">
		               		<input id="submitImg" type="button" value="上传" class="ss_sc curbtn">
		               	</div>
		               </form>
		             </div>
                        </div>
                    </li>
                    <li class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>店铺地址:</span>
                        </div>
                        <div class="dianpu_right">
                        	<input type="text" id="address" name="address" value="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['address'];?>
" />
                        </div>
                    </li>
                    <li class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>店铺访问地址:</span>
                        </div>
                        <div class="dianpu_right">
                        	<input type="text" id="shortname" name="shortname" value="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shortname'];?>
"  />
                        </div>
                    </li>
                    <li class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>百度坐标:</span>
                        </div>
                        <div class="dianpu_right">
                        	<input type="text" name="baidumap" value="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['lng'];?>
,<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['lat'];?>
"  />
                            <button class="geiquAdd curbtn fr" onclick="biaoji();">给取地址</button>
                        </div>
                     <!--   <div class="geiquAdd curbtn fr" onclick="biaoji();" >
                        	给取地址
                        </div>-->
                    </li>
                    <li class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>邮箱地址:</span>
                        </div>
                        <div class="dianpu_right">
                        	<input type="text" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['email'];?>
" />
                        </div> 
                    </li>
                    <li class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>无线打印机IMEI号:</span>
                        </div>
                        <div class="dianpu_right">
                        	<input type="text" id="IMEI" name="IMEI" value="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['IMEI'];?>
" />
                        </div>
                        
                    </li>
                      <!---->
                    <li class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>营业时间:</span>
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
					       <span>早<input type="text" name="dotime[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['newtimedata']->value[0])===null||$tmp==='' ? '' : $tmp);?>
" />
                            :<input type="text" name="dotime[]"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['newtimedata']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"/>
                            ---<input type="text" name="dotime[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['newtimedata']->value[2])===null||$tmp==='' ? '' : $tmp);?>
"/>
                            :<input type="text" name="dotime[]"   value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['newtimedata']->value[3])===null||$tmp==='' ? '' : $tmp);?>
"  />
                         </span>
                           <span>晚<input type="text" name="dotime[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['newtimedata']->value[4])===null||$tmp==='' ? '' : $tmp);?>
" />
                            :<input type="text" name="dotime[]"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['newtimedata']->value[5])===null||$tmp==='' ? '' : $tmp);?>
"/>
                            ---<input type="text" name="dotime[]"   value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['newtimedata']->value[6])===null||$tmp==='' ? '' : $tmp);?>
" />
                            :<input type="text" name="dotime[]"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['newtimedata']->value[7])===null||$tmp==='' ? '' : $tmp);?>
"/></span>
                          </div>
                        </div>
                    </li>
                     <li class="serxuanze">
                    	<div class="xuanze_left">
                        	<span>是否营业:</span>
                        </div>
                        <div class="xuanze_right">
                        	<input type="radio"   name="is_open"   value="1" <?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['is_open']==1){?>checked<?php }?>/>是 <input type="radio"  name="is_open"   value="0" <?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['is_open']==0){?>checked<?php }?>/>否
                        </div>
                    </li>
                  	 <li class="settijiao">
                          <div class="xuanze_right hc_login_btn_div">点击提交</div>
                    </li>
       			 </ul>
              </form>
        </div>
        <!--content right end-->



 <!---content right start-->
<script type="text/javascript">
var areagrade ='0';// ;
var defaultid = '';

</script>
<script type="text/javascript">
	$('.hc_login_btn_div').click(function(){
		var shopname = $('input[name="shopname"]').val();
		var phone = $('input[name="phone"]').val();
		var address = $('input[name="address"]').val();
		var shortname = $('input[name="shortname"]').val();
		var email =$('input[name="email"]').val();

		 var IMEI = $('input[name="IMEI"]').val();
		var is_open =  $("input[name='is_open']:checked").val();

		var stobj = new Array();

	  $("input[name='dotime[]']").each(function(){
	  	if($(this).val() != ''){
	      	stobj.push($(this).val());
	     }
     })
     var starttime = stobj.join(',');

     var otherlink = $('input[name="otherlink"]').val();
     var baidumap = $('input[name="baidumap"]').val();

	//	 showop('保存配送区域信息');
	var backinfo = ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/useredit/datatype/json"),$_smarty_tpl);?>
',{'shopname':shopname,'IMEI':IMEI,'phone':phone,'address':address,'shortname':shortname,'email':email,'is_open':is_open,'starttime':starttime,'otherlink':otherlink,'baidumap':baidumap});
	if(backinfo.flag == true)
	{
	//	hideop();
		diaerror(backinfo.content);
	}else{
	//	hideop();
		 artsucces('保存成功');
		location.reload();
	}


		//$('#loginForm').submit();

	});
	$(".hc_login_input").change(function(j){
		var v=$(this).val();
		var p=$(this).attr("shopname");
		switch(p){
		case "shopname":	if(v == '' ||v == null){
			  alert('用户名不能为空');
			}
		break;
		case "shortname":
		 	var patrn=/[u4e00-u9fa5]/;
			if(v == '' ||v == null){
			  alert('店铺CODE不能为空');
			}
		break;
		case "phone":
		   if(v == '' ||v == null){
			  alert('联系电话不能为空');
			}
		break;
		case "address":
		   if(v == '' ||v == null){
			  alert('联系地址不能为空');
			}
		break;
		case "pwd":
			var patrn=/(.){4,16}/;
			if(!patrn.exec(v)){
				 alert('密码是4-16位的字母、数字,区分大小写');
			 }
		break;
		}
	});
	$('#submitImg').click(function(){
		ajaxFileUpload();
	});
	function ajaxFileUpload()
	{
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload
		(
			{
				url:'<?php echo FUNC_function(array('type'=>'url','link'=>"/other/userupload/type/shoplogo/datatype/json"),$_smarty_tpl);?>
',
				secureuri:false,
				fileElementId:'imgFile',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error == false)
						{

							$('#img').val(data.msg);
 	           $('#imgshow').attr('src',data.msg);
 	                $('#imgshow').show();
						}else
						{
							alert(data.msg);
						}
					}else{
					  alert(data);
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)

		return false;

	}
	var dialogs ;
 function uploads(){
 	  dialogs = art.dialog.open('<?php echo FUNC_function(array('type'=>'url','link'=>"/other/userupload/func/uploadsucess/type/shoplogo"),$_smarty_tpl);?>
');
 	  dialogs.title('上传图片');
 }
 function uploadsucess(linkurl){
 	dialogs.close();
 	$('#img').val(linkurl);
 	$('#imgshow').attr('src',linkurl);
 	$('#imgshow').show();
}
function uploaderror(msg){
	 alert(msg);
		dialogs.close();
		uploads();
}


var ditulog;
function biaoji(){
    	mydialog = art.dialog.open(siteurl+'/index.php?controller=area&action=shopbaidumap',{height:'550px',width:'850px'},false);
    	//http://www.hanwoba.com/index.php?controller=admin&action=baidumap&id=2#
	 	 mydialog.title('设置标记百度地址位置');
	 	 mydialog.height('500px');
 }
 function closemydilog(){
 	mydialog.close();
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