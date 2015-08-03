<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 17:08:50
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/order/template/fastfood.html" */ ?>
<?php /*%%SmartyHeaderCode:875689155558d047261d096-84815425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e73602699b94bcab19bffa9801d01fe9ef62ab7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/order/template/fastfood.html',
      1 => 1435828127,
      2 => 'file',
    ),
    '34c497866c78dbc09af78ddce0b250002f0d2e80' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/shopcenter.html',
      1 => 1435827317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '875689155558d047261d096-84815425',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558d04728093f4_11113521',
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
<?php if ($_valid && !is_callable('content_558d04728093f4_11113521')) {function content_558d04728093f4_11113521($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
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
  	 
  	</script>
 
<script>
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
    $(function(){

      $('.conRight').height( $('.conleft').height() );
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
</script>ad
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
        <div class="conRight">
        	<!--账单明细 start--> 
        	<div class="menu fl">
            	<div class="menuTitle">
                	<span>账单明细</span>
                </div>
              
                    <div class="goodshow" >
                    
                        <div class="goodli">
                            <div class="xh"> 
                                <span>数量</span>
                            </div>
                            <div class="cm">
                                 <span>菜名</span>
                            </div>
                            <div class="dj">
                                 <span>单价</span>
                            </div>
                            <div class="je">
                                 <span>金额</span>
                            </div>
                        </div>
                        
                        <div class="cl"></div>
                    	<div class="menugoodlist" id="cartshow">
                    		
                    		
                    		
                    		<!---
                       		 <div class="goodlist">
                            <div class="goodnum">
                               <div class="btniput">
                               <span class="right_l_btn_left" data-id="109" data-shopid="30"></span>
                               <span class="right_l_btn_nub" id="gshu_109">1</span>
                               <span class="right_l_btn_right" id="gid_109" data-price="5.00" typeid="34" data-id="109" data-shopid="30"></span>	
                               </div> 
                            </div>
                            <div class="goodname">
                                 <span>揽锅菜</span>
                            </div>
                            <div class="goodcost">
                                 <span>15</span>
                            </div>
                            <div class="goodallcost">
                                 <span>15</span>
                            </div>
                        </div>
                        -->
                        
                     
                        
                        
                        
                        </div>
                        <div class="cl"></div>
                        
                        <div class="cdjs">
                        	<span class="span1">打包费:<font color="#ec7501" size="2" style="font-weight:bold;">¥<font id="bagcost">0</font></font></span>
                            <span class="span2">小计：<font color="#ec7501" size="2" style="font-weight:bold;">¥<font id="sumcost">0</font></font></span>
                        </div>
                    </div>
               
                
                
                <div class="xxqq">
                	<form>
                    	<div class="xiangqing" id="contactname">
                        	<div class="xingming fl">姓名</div>
                            <div class="inputtext fl"><input type="text" name="contactname" value="" /></div>
                        </div>
                        <div class="xiangqing" id="phone">
                        	<div class="xingming fl">电话</div>
                            <div class="inputtext fl"><input type="text" name="phone" value="" /></div>
                        </div>
                        <div class="xiangqing" id="address">
                        	<div class="xingming fl">地址</div>
                            <div class="inputtext fl"><input type="text" name="address" value="" /></div>
                        </div>
                        
                    </form>
                    
                </div>
                <div class="leftBot">
                <div class="fl curbtn" onclick="dayindata();">
                	<img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/dayin.png" />
                 </div>
                  <div class="fr curbtn" onclick="clearcart();">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/shopcenter/images/qingkong.png" />
                    
                  </div>
                  <div class="cl"></div>
                </div>
                
            </div>
             <!---账单明细 end--> 
             
             
             <!---账单列表 start--> 
        	<div class="conList fl">
            	<div class="listTitle">
                	<ul>
                    
                       <li  class="cur curbtn" data="a">点餐</li> 
                       <li class="curbtn" data="b">结账</li> 
                    </ul>
                  
                </div>
                
                <div class="fenlei">
                	 
                    <div class="new_caidan" id="caidanlist">
                    	<ul>
                    		<li class="on" onclick="showtype(0,this);">全部</li>
                    		<?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['shoptype']==0){?>
                    		 <?php echo smarty_function_load_data(array('assign'=>"menutype",'table'=>"goodstype",'where'=>"shopid='".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])."'",'fileds'=>"*",'limit'=>"20"),$_smarty_tpl);?>
 
                    		 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menutype']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
                        	<li onclick="showtype('<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
',this);"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</li>
                        	<?php } ?>
                        	<?php }else{ ?> 
                        	 <?php echo smarty_function_load_data(array('assign'=>"menutype",'table'=>"marketcate",'where'=>"shopid='".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])."' and parent_id != 0",'fileds'=>"*",'limit'=>"20"),$_smarty_tpl);?>
 
                    		 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menutype']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
                        	<li onclick="showtype('<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
',this);"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</li>
                        	<?php } ?>
                        	<?php }?>
                            
                        </ul>
                        <div class="cl"> </div>
                    </div>
                    <div class="cl"> </div>
                </div>
                
                <div class="caidanList">
                	<div class="mealsList" id="goodslist">
                    	<ul>
                    		 <?php echo smarty_function_load_data(array('assign'=>"menulist",'table'=>"goods",'where'=>"shopid='".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])."'",'fileds'=>"id,name,cost,count,shopid,typeid,bagcost",'limit'=>"1000"),$_smarty_tpl);?>
 
                    		  <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
                        	<li <?php if ($_smarty_tpl->tpl_vars['items']->value['count']<1){?>style=" background:#b5b4b4;"<?php }else{ ?> onclick="addtocart('<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['items']->value['cost'];?>
','<?php echo $_smarty_tpl->tpl_vars['items']->value['bagcost'];?>
','<?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
');" <?php }?>class="litype<?php echo $_smarty_tpl->tpl_vars['items']->value['typeid'];?>
" id="goodsid_det<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
                            	<p class="danjia">¥<span><?php echo $_smarty_tpl->tpl_vars['items']->value['cost'];?>
</span></p>
                                <p class="caidanName"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</p>
                                <div class="mealsok "></div> 
                            </li>
                         <?php } ?>    
                        </ul>
                  <script>
				  
                    $(function(){
						//菜单列表自动适应的最小高度
						var num = $('.fenlei li').length ;						
						var fenleiHeight = Math.ceil(num/7)*43+10;
						
			/*			//菜单列表背景自动适应的高度
						var caidanListHeight = 830 - 42 - fenleiHeight - 50;
						$(".caidanList").css('min-height',Number(caidanListHeight));
						
											
						
						//菜单列表超出最小的高度后自动适应的高度
						var cou = $('.caidanList li').length ;
						var caidanHeight = Math.ceil(cou/7)*97;
						$(".caidanList").css('height',Number(caidanHeight));*/
						
						
						//右边内容自动适应的高度
					/*	var conRightHeight = caidanHeight + fenleiHeight +50 +42 ;
						$(".conRight").css('height',Number(conRightHeight));*/
					
					
				});
                </script>
                        <div class="cl"></div>
                    </div>
                </div>
                
            </div>
             <!---账单列表 end--> 
              <div class="cl"></div>
        </div>
        <div class="cl"></div>
        
        <!---content right end--> 
 <script>
  function showtype(typeid,obj){
  	if(typeid == 0){
  	  $('#goodslist').find('li').show();
  	  
  	}else{
  	    $('#goodslist').find('li').hide();
  	    $('#goodslist').find('.litype'+typeid).show();
  	}
  	$(obj).addClass('on').siblings().removeClass('on');
  }
  var sumcost = 0;//总价等于0
  var bagcost = 0;
  var checkuser = true;
   
  function addtocart(goodsid,goodscost,bagcost,goodsname){
  	var checkhtml = $('#cart_id'+goodsid).html();
  	if(checkhtml == undefined){
  		var newzongjiage = Number(goodscost)*1;
  		var htmls = '<div class="goodlist" id="cart_id'+goodsid+'" data="'+goodsid+'">';
          htmls += '          <div class="goodnum">';
          htmls += '             <div class="btniput">';
          htmls += '            <span class="right_l_btn_left" onclick="deltocart(\''+goodsid+'\',\''+goodscost+'\',\''+bagcost+'\')"></span>';
         htmls += '            <span class="right_l_btn_nub" id="gshu_'+goodsid+'">1</span>';
          htmls += '            <span class="right_l_btn_right" onclick="addtocart(\''+goodsid+'\',\''+goodscost+'\',\''+bagcost+'\')"></span>	';
          htmls += '           </div> ';
         htmls += '         </div>';
         htmls += '          <div class="goodname">';
         htmls += '              <span>'+goodsname+'</span>';
         htmls += '        </div>';
         htmls += '        <div class="goodcost">';
         htmls += '              <span >'+goodscost+'</span>';
         htmls += '         </div>';
         htmls += '         <div class="goodallcost">';
         htmls += '              <span id="gzj_'+goodsid+'">'+newzongjiage+'</span>';
         htmls += '          </div>';
         htmls += '    </div>'; 
         $('#cartshow').append(htmls); 
         $('#goodsid_det'+goodsid).find('.mealsok').show();
  	}else{
  		$('#gshu_'+goodsid).text(Number($('#gshu_'+goodsid).text())+1); 
  		$('#gzj_'+goodsid).text(Number($('#gzj_'+goodsid).text())+Number(goodscost)); 
  	} 
  	var tempcost = Number(goodscost)+Number(bagcost);
  	bagcost = Number(bagcost)+Number(bagcost);
  	$('#bagcost').text(bagcost);
  	sumcost = Number(sumcost)+Number(tempcost.toFixed(2));
  	$('#sumcost').text(sumcost);
  }
  function deltocart(goodsid,goodscost,bagcost){
  	var checkhtml = $('#cart_id'+goodsid).html();
  	if(checkhtml != undefined){
  		  var shangpinzongshu = $('#gshu_'+goodsid).text(); 
  		  if(shangpinzongshu == 1){
  		     $('#cart_id'+goodsid).remove();
  		     $('#goodsid_det'+goodsid).find('.mealsok').hide();
  		  }else{
  		      $('#gshu_'+goodsid).text(Number($('#gshu_'+goodsid).text())-1); 
  		      $('#gzj_'+goodsid).text(Number($('#gzj_'+goodsid).text())-Number(goodscost)); 
  		  }
  	    var tempcost = Number(goodscost)+Number(bagcost);
  	bagcost = Number(bagcost)-Number(bagcost);
  	$('#bagcost').text(bagcost);
  	sumcost = Number(sumcost)-Number(tempcost.toFixed(2));
  	$('#sumcost').text(sumcost);
  	}
  }
  function clearcart(){
     sumcost = 0;
     bagcost = 0;
     $('#bagcost').text(0);
     $('#sumcost').text(0);
     $('#cartshow').html('');
     $('.mealsok').hide();
  }
  $(function(){
					$(".listTitle ul li").click(function(){
						    $(this).addClass('cur').siblings().removeClass('cur');
						    clearcart();
						    var checkdata = $(this).attr('data');
						     $('input[name="contactname"]').val('');
						       $('input[name="phone"]').val('');
						       $('input[name="address"]').val('');
						    if(checkdata == 'a'){
						       checkuser = true;
						        $('#contactname').show();
						       $('#phone').show();
						       $('#address').show();
						    }else{
						       checkuser = false;
						       $('#contactname').hide();
						       $('#phone').hide();
						       $('#address').hide();
						      
						    }
						
					});	 
 });
 function dayindata(){
   //在新仓库中打开网页
   var shopid = '<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['id'];?>
';
   var allobj = $('.goodlist');
   if(allobj.length < 1){
     alert('购物车中无数据');
     return false;
   }
   var contactname =  $('input[name="contactname"]').val();
	 var phone = $('input[name="phone"]').val();
	 var address = $('input[name="address"]').val();
   if(checkuser == true){
       if(contactname == ''){
         alert('联系人部能为空 ');
         return false;
       }
       if(phone == ''){
         alert('联系电话不能为空');
         return false;
       }
       if(address == ''){
         alert('联系地址不能为空');
         return false;
       }
       
   }
   var newids = new Array();//存放ID
   var newnum = new Array();//存放数量
   for(var i=0;i<$(allobj).length;i++){
   	var goodsid = $(allobj).eq(i).attr('data'); 
      newids.push(goodsid);
      newnum.push($('#gshu_'+goodsid).text()); 
   }
   //构造参数量
   var checklingk = '<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/index.php?controller=order&action=printbyshop';
   var idsm = newids.join(",");
   var num = newnum.join(",");
   checklingk +='&ids='+idsm+'&nums='+num+'&shopid='+shopid+'&contactname='+contactname+'&phone='+phone+'&address='+address; 
	   window.open(checklingk);  
 
}
   //cartshow   alert($('#goodlist').html());
   //	var num=22.127456; alert( num.toFixed(2));
</script> 
   <!---
                       		 <div class="goodlist">
                            <div class="goodnum">
                               <div class="btniput">
                               <span class="right_l_btn_left" data-id="109" data-shopid="30"></span>
                               <span class="right_l_btn_nub" id="gshu_109">1</span>
                               <span class="right_l_btn_right" id="gid_109" data-price="5.00" typeid="34" data-id="109" data-shopid="30"></span>	
                               </div> 
                            </div>
                            <div class="goodname">
                                 <span>揽锅菜</span>
                            </div>
                            <div class="goodcost">
                                 <span>15</span>
                            </div>
                            <div class="goodallcost">
                                 <span>15</span>
                            </div>
                        </div>
                        -->
                        
 







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