<?php /* Smarty version Smarty-3.1.10, created on 2015-05-20 16:45:33
         compiled from "D:\wmr\templates\newgreen\shop\index.html" */ ?>
<?php /*%%SmartyHeaderCode:3539555c49ad6a18c4-48439883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ca75c589e05e1bd2e8abbdab180eb07f70e0497' => 
    array (
      0 => 'D:\\wmr\\templates\\newgreen\\shop\\index.html',
      1 => 1407569198,
      2 => 'file',
    ),
    '6635e949b13ac0ccb4b805de0e82e81be1230351' => 
    array (
      0 => 'D:\\wmr\\templates\\newgreen\\public\\site.html',
      1 => 1407569152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3539555c49ad6a18c4-48439883',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tempdir' => 0,
    'sitename' => 0,
    'keywords' => 0,
    'description' => 0,
    'metadata' => 0,
    'siteurl' => 0,
    'is_static' => 0,
    'controlname' => 0,
    'member' => 0,
    'sitelogo' => 0,
    'footlink' => 0,
    'items' => 0,
    'sitebk' => 0,
    'mapname' => 0,
    'shopsearch' => 0,
    'toplink' => 0,
    'beian' => 0,
    'footerdata' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555c49ad9c6d65_20265516',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555c49ad9c6d65_20265516')) {function content_555c49ad9c6d65_20265516($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> <?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
-<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<?php echo stripslashes($_smarty_tpl->tpl_vars['metadata']->value);?>

<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/favicon.ico" /> 
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/common.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/server.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/shop.css">
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
/public/js/template.min.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.lazyload.min.js" type="text/javascript" language="javascript"></script>
 <script>
 	$(function() { 
$("img").lazyload({ 
effect : "fadeIn" 
}); 
}); 

 	</script>
 
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/phonecheck.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/bootstrap.min.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/newsshop.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/cart.js" type="text/javascript" language="javascript"></script>


 <script> 
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
	var controllername= '<?php echo $_smarty_tpl->tpl_vars['controlname']->value;?>
';
</script>

<!--[if lte IE 6]>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, input , a'); 
    </script>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/ie6.js" type="text/javascript"></script>
<![endif]--> 
</head> 
<body> 
<div id="toTop" style="left: 1212.5px; display: none;"></div>




<div class="top">
	 <div class="top_a">
	 	  <div class="top_a_show">
	 	  	<div class="top_a_show_l">
	 	  		  <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/index"),$_smarty_tpl);?>
" class=""><span class="topmcbck"></span> <div style="padding-left:25px;">欢迎光临<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</div></a>
	 	  	</div>
	 	  	<div class="top_a_show_r">
	 	  		<?php if (empty($_smarty_tpl->tpl_vars['member']->value['uid'])){?>
	 	  		 <div class="top_a_show_span"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/regester"),$_smarty_tpl);?>
">注册</a></div>
	 	  		 <div class="top_a_show_span">|</div>
	 	  		 <div class="top_a_show_span"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/login"),$_smarty_tpl);?>
">登陆</a></div>
	 	  		 <div class="top_a_show_span">|</div>
	 	  		 	 <a href="#">  <div class="sina"></div> </a>
	 	  		 <a href="#">  <div class="qq"></div> </a>
	 	  		 <?php }else{ ?>
	 	  		  <div class="top_a_show_span"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/loginout"),$_smarty_tpl);?>
">退出登陆</a></div>
	 	  		 <div class="top_a_show_span">|</div>
	 	  		  <div class="top_a_show_span"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/order/usersorder"),$_smarty_tpl);?>
">个人中心</a></div>
	 	  		 <div class="top_a_show_span">|</div>
	 	  		  <div class="top_a_show_span"><?php echo $_smarty_tpl->tpl_vars['member']->value['username'];?>
</div> 
	 	  		 <?php }?>
	 	  	
	 	  		
	 	  		 
	 	  		 
	 	  	</div>
	 	  </div>
  </div>
	 <div class="top1">
	 	 <div class="top1_show">
	 	 	
 <div class="top1_shop">
 	 <div style="width:50px;float:left;"><a href="#"><img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shopinfo']->value['shoplogo'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['shoplogo']->value : $tmp);?>
" width="50px" height="50px"></a></div>
 	 <div style="padding-left:30px;float:left;height:50px;">
 	 	  <div class="topshopname">  <?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
</div>
 	 	  <div>
 	 	  	   <div class="MIL2Left" style="height:20px;line-height:20px;width:110px;">      
 	 	  	   	 <span class="Star_g tips" original-title="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['point'];?>
" style="margin:0px 0px 0px 0px;">
                             <span class="Star_y" style="width:<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['point']*20;?>
%;"></span>
             </span>
             <a href="javascript:;" style="line-height:15px;font-weight:normal;padding:0 2px;"><?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['point'];?>
.0</a>
             
            </div>
            <?php if ($_smarty_tpl->tpl_vars['shopopeninfo']->value['opentype']==2||$_smarty_tpl->tpl_vars['shopopeninfo']->value['opentype']==3){?> <span class="yingye">营业中</span><?php }else{ ?><span class="xiuxi">休息中</span><?php }?>
           
      </div>
  	</div>
 	</div>
 <div class="top1_shopmenu">
	 	  <div class="Menubox_01">
                    <ul>
                        <li class="hover"><a href="javascript:;">菜单</a></li> 
                        <li><a href="javascript:;" >餐后点评</a></li>
                        <li><a href="javascript:;" >用户留言</a></li>
                        <li id="one4" class="tips" original-title="暂未开放，敬请期待！"><a href="javascript:;">店铺介绍</a></li>
                    </ul>
          </div>
 </div>

	 	   
	 	 </div>
	 </div>
	
</div> 

<div class="mmbg" <?php if (!empty($_smarty_tpl->tpl_vars['sitebk']->value)){?>style="background:url(<?php echo $_smarty_tpl->tpl_vars['sitebk']->value;?>
) repeat;"<?php }?>></div> 

  
<div style="height:20px;"></div>
<div class="Restaurant hc_content">
 
        <div id="Tab1_01"> 
           
            <div class="RMenu">
                <div class="RMLeft">
                    <div class="Contentbox_01">
                    	  <div id="con_one_0" class="hover" data="none">
                            <div class="MealsNav" id="FCMenu">
                                <div class="DishesClass">
                                	<a class="DChover" ind="0" href="javascript:;" onclick="change_shop_list(0,this)">全部</a>
                                	<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['goodstype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>  
			                			       <a href="javascript:;" onclick="change_shop_list(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
,this)"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</a>
			                            <?php } ?>  
                                </div>
                            </div> 
                            
                            <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['cid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goodstype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['cid']->value = $_smarty_tpl->tpl_vars['items']->key;
?> 
                            <div class="MealsCategory" id="Food<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</div>
                            
                            
                            <div class="MealsImgList" id="ImgFoodList<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
                                <ul>
                                	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                	<?php if (!empty($_smarty_tpl->tpl_vars['value']->value['img'])){?> 
                                    <li>
                                        <div class="MILPic"><img style="height:177px;width:224px;" src="<?php echo $_smarty_tpl->tpl_vars['value']->value['img'];?>
"></div>
                                        <div class="MIL1">
                                            <div class="MIL1Left" id="goodsname_<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</div>
                                            <div class="MIL1Right"><?php echo $_smarty_tpl->tpl_vars['value']->value['cost'];?>
元</div>
                                        </div>
                                        <div class="MIL2">
                                            <div class="MIL2Left"> 
                                                <span class="Star_g tips" original-title="<?php echo $_smarty_tpl->tpl_vars['value']->value['point'];?>
分">
                                                            	<?php if ($_smarty_tpl->tpl_vars['value']->value['point']!=0){?> 
                                                            	<?php $_smarty_tpl->tpl_vars['long'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value['point']*20, null, 0);?>
                                                            	<?php }else{ ?> 
                                                            	<?php $_smarty_tpl->tpl_vars['long'] = new Smarty_variable("100", null, 0);?>
                                                            	<?php }?> 
                                                                <span class="Star_y" style="width:<?php echo $_smarty_tpl->tpl_vars['long']->value;?>
%;"></span>
                                                </span>
                                                <a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['value']->value['point'];?>
点评</a>
                                            </div>
                                            <div class="MIL2Right">售<?php echo $_smarty_tpl->tpl_vars['value']->value['sellcount'];?>
份</div>
                                        </div>
                                        <div class="MIL3">
                                            <div class="MIL3Left">
                                                <div class="DishesStatus">
                                                       <?php $_smarty_tpl->tpl_vars['goodssignlist'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['value']->value['signid']), null, 0);?>  
                                                            	      <?php  $_smarty_tpl->tpl_vars['goodssi'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['goodssi']->_loop = false;
 $_smarty_tpl->tpl_vars['mytestid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goodssignlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['goodssi']->key => $_smarty_tpl->tpl_vars['goodssi']->value){
$_smarty_tpl->tpl_vars['goodssi']->_loop = true;
 $_smarty_tpl->tpl_vars['mytestid']->value = $_smarty_tpl->tpl_vars['goodssi']->key;
?>
                                                            	         <?php if ($_smarty_tpl->tpl_vars['mytestid']->value<5&&!empty($_smarty_tpl->tpl_vars['goodssi']->value)&&isset($_smarty_tpl->tpl_vars['goodsattr']->value[$_smarty_tpl->tpl_vars['goodssi']->value])){?> 
                                                            	           <img src="<?php echo $_smarty_tpl->tpl_vars['goodsattr']->value[$_smarty_tpl->tpl_vars['goodssi']->value];?>
">
                                                            	            <?php }?> 
                                                            	      <?php } ?> 
                                                </div>
                                            </div>
                                            <div class="MIL3Right">
                                                  
                                                   <?php if ($_smarty_tpl->tpl_vars['value']->value['count']<1){?>
                                                        <div class="DishesOrderout"><a   class="AddOrders"  href="javascript:;">售完</a></div>
                                                        <?php }else{ ?>
                                                        <div class="DishesOrder"><a  class="AddOrder"  onclick="addonedish(<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['value']->value['shopid'];?>
,1,this);"  href="javascript:void(0);">订一份</a></div>
                                                        <?php }?>
                                           
                                           
                                           
                                            </div>
                                        </div>
                                    </li>
                                    <?php }?>
                                   
                                    
                                    <?php } ?>  
                                    <div style="clear:both;"></div>
                                   
                                </ul>
                            </div>
                              <div style="clear:both;"></div>
                            
                            <div class="MealsList" id="FoodList<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
                                <ul> 
                                	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                	<?php if (empty($_smarty_tpl->tpl_vars['value']->value['img'])){?>
                                    <li>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                                <td><div class="MLTop"></div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="MLMiddle">
                                                        <div class="DishesName"><a href="javascript:;" id="goodsname_<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</a><span class="CocaCola"></span></div>
                                                        <div class="DishesService">
                                                            <div class="DishesStatus"> 
                                                            	      <?php $_smarty_tpl->tpl_vars['goodssignlist'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['value']->value['signid']), null, 0);?>  
                                                            	      <?php  $_smarty_tpl->tpl_vars['goodssi'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['goodssi']->_loop = false;
 $_smarty_tpl->tpl_vars['mytestid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goodssignlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['goodssi']->key => $_smarty_tpl->tpl_vars['goodssi']->value){
$_smarty_tpl->tpl_vars['goodssi']->_loop = true;
 $_smarty_tpl->tpl_vars['mytestid']->value = $_smarty_tpl->tpl_vars['goodssi']->key;
?>
                                                            	         <?php if ($_smarty_tpl->tpl_vars['mytestid']->value<5&&!empty($_smarty_tpl->tpl_vars['goodssi']->value)&&isset($_smarty_tpl->tpl_vars['goodsattr']->value[$_smarty_tpl->tpl_vars['goodssi']->value])){?> 
                                                            	           <img src="<?php echo $_smarty_tpl->tpl_vars['goodsattr']->value[$_smarty_tpl->tpl_vars['goodssi']->value];?>
">
                                                            	            <?php }?> 
                                                            	      <?php } ?>  
                                                            </div>
                                                        </div>
                                                        <div class="DishesPrice"><span>¥<?php echo $_smarty_tpl->tpl_vars['value']->value['cost'];?>
</span></div>
                                                        <?php if ($_smarty_tpl->tpl_vars['value']->value['count']<1){?>
                                                        <div class="DishesOrderout"><a   class="AddOrders"   href="javascript:;"   >已售完</a></div>
                                                        <?php }else{ ?>
                                                        <div class="DishesOrder"><a  class="AddOrder" onclick="addonedish(<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['value']->value['shopid'];?>
,1,this);"  href="javascript:void(0);" >订一份</a></div>
                                                        <?php }?>
                                                       
                                                        <div class="DishesScore">
                                                            <span class="Star_g tips" original-title="<?php echo $_smarty_tpl->tpl_vars['value']->value['point'];?>
分">
                                                            	<?php if ($_smarty_tpl->tpl_vars['value']->value['point']!=0){?> 
                                                            	<?php $_smarty_tpl->tpl_vars['long'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value['point']*20, null, 0);?>
                                                            	<?php }else{ ?> 
                                                            	<?php $_smarty_tpl->tpl_vars['long'] = new Smarty_variable("100", null, 0);?>
                                                            	<?php }?> 
                                                                <span class="Star_y" style="width:<?php echo $_smarty_tpl->tpl_vars['long']->value;?>
%;"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="MLBottom">
                                                        <div class="MLIntro"><?php echo $_smarty_tpl->tpl_vars['value']->value['instro'];?>
</div>
                                                         <div class="DishesSales">售<?php echo $_smarty_tpl->tpl_vars['value']->value['sellcount'];?>
份</div>
                                                        <div class="MLReviews"><?php echo $_smarty_tpl->tpl_vars['value']->value['pointcount'];?>
点评</div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </li> 
                                    <?php }?>
                                    <?php } ?>  
                                </ul>
                            </div>
                            <?php } ?>  
                             
                            
                        </div>
                        
                        <!---用户点评-->
                        <div id="con_one_1" style="display:none;" data="pjia">
                        	
                           <div class="CommentOn">
                                <div class="COBottom" id="det_commm">
                                  
                                </div>
                                 
                                
                            </div> 
                            
                        </div>
                         <!--用户点评结束-->
                         <div id="con_one_2" style="display:none;" data="liuyan">
                         	<!--用户留言-->
                         	 
                            <div class="Message">
                                <form action="" id="mform" name="mform" method="POST">
                                <input type="hidden" name="msid" id="msid" value="40">
						                      	<ul>
                                	<li>
                                    	<div class="MInput">
                                        	<div class="MITop"><textarea id="MContent" name="mcon" onclick="InFocus(this);" onblur="outF(this);" style="color:rgb(92, 91, 91);"  data="您的留言对其他会员都是很重要的参考">您的留言对其他会员都是很重要的参考</textarea></div>
                                            <div class="MIBottom"><a href="javascript:;" onclick="AddMessage()" id="msgbtn">提交留言</a> <span class="ImpNum">最多200个字符</span></div>
                                        </div>
                                    </li>
                                </ul>
                                </form>
                            </div>
                            <div class="Message" id="showaskid">
								              
							              </div>  
                            <div class="CommentOn">
                             
                            </div>
                         
                         	<!--用户留言-->
                         	 
                         </div>
                         
                         
                          <!---店铺介绍-->
                         <div id="con_one_3" style="display:none;" data="none">
                         	 
                         	<div style="margin-top:-35px;width:650px;word-wrap:break-word;float:left;margin-left:20px;margin-top:5px;"> 
                                	<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['shopinfo']->value['intr_info']);?>

                         	 </div>
                         </div>
                         <!---店铺介绍-->
                       
                    </div>
                </div>
                
                <div class="RMRight">
                    <div class="right_shop_info">
                    	  <div class="shop_info_a">
                    	    	<div class="shopw_a_time">
                    	  		 <?php $_smarty_tpl->tpl_vars['newshowtime'] = new Smarty_variable(explode("|",$_smarty_tpl->tpl_vars['shopinfo']->value['starttime']), null, 0);?>
					                    	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newshowtime']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
						                     <div class="shopw_a_time_d"> <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
 </div>
					                    	<?php } ?>
					                  </div>
                    	  	  <div class="shopw_a_sendtime">
                    	  	  	<?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
?>
								             	  <?php if ($_smarty_tpl->tpl_vars['itat']->value['type']=='input'){?>
								             	     <?php  $_smarty_tpl->tpl_vars['itcc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itcc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['itat']->value['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itcc']->key => $_smarty_tpl->tpl_vars['itcc']->value){
$_smarty_tpl->tpl_vars['itcc']->_loop = true;
?>
								             	       
								             	          <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shopattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
								             	             <?php if ($_smarty_tpl->tpl_vars['itcc']->value['parent_id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']){?>
								             	                 <?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>

								             	             <?php }?>
								             	          <?php } ?>
								             	     <?php } ?>
								             	  <?php }?>     
								             	<?php } ?> 
									         </div>
									           <div class="shopw_a_sendcost">
									           	  <?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['limitcost'];?>
元起送
									          </div>
                    	  	 <div class="shopw_a_juli" id="juli">
									           	 未启用地图
									          </div>
									          
                    	  </div>
                    	  <div class="shop_info_b">
                    	  	  <div class="shop_b_notice_t">
                    	  	  	<div class="b_notice_t_c">餐厅公告</div>
                    	  	  </div>
                    	  	  <div class="shop_b_notice_c">
                    	  	  	<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['shopinfo']->value['notice_info']);?>

                    	  	  </div> 
                    	  </div>
                    	   
                    	  <?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
?>
									  <?php if ($_smarty_tpl->tpl_vars['itat']->value['type']=='img'){?> 
									      <?php  $_smarty_tpl->tpl_vars['itdd'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itdd']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['itat']->value['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itdd']->key => $_smarty_tpl->tpl_vars['itdd']->value){
$_smarty_tpl->tpl_vars['itdd']->_loop = true;
?>
									          <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shopattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
									             <?php if ($_smarty_tpl->tpl_vars['itdd']->value['id']==$_smarty_tpl->tpl_vars['itaa']->value['attrid']){?> 
									                <div class="shop_info_c">
                    	  	 <div class="backps" style="background:url(<?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>
) no-repeat;"><?php echo $_smarty_tpl->tpl_vars['itdd']->value['instro'];?>
</div> 
                    	  </div>   
									             <?php }?>
									          <?php } ?> 
									      <?php } ?> 
									  <?php }?>     
									<?php } ?> 
									
									   <?php  $_smarty_tpl->tpl_vars['itv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ruledata']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itv']->key => $_smarty_tpl->tpl_vars['itv']->value){
$_smarty_tpl->tpl_vars['itv']->_loop = true;
?>
									    <div class="shop_info_c">
                    	  	 <div class="backps" style="background:url(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['ruleimg']->value[$_smarty_tpl->tpl_vars['itv']->value['signid']])===null||$tmp==='' ? '' : $tmp);?>
) no-repeat;"><?php echo $_smarty_tpl->tpl_vars['itv']->value['name'];?>
</div> 
                    	  </div> 
									   
									   
									   <?php } ?>
									
									
                    	
                    </div>
                    
                    
                    
                      
  
                   <div class="new_cart" id="newcart">
                    
                   	 
                   	 
                   	
                   	
                  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
                                <div class="ShopCartOn" style="display:none;">
                                 <div class="SCOTop">
                                     <div class="ShopCart" id="ShopCart" style="position: static; top: 380px;">
                                         <div class="CartTop">
                                         <span class="tips" original-title="平均送餐时间：分钟">分钟</span>我的餐盒</div>
                                         <div class="SCBottom">
                                             <div class="SCTitle">
                                                 <div class="SCName">商品</div>
                                                 <div class="SCNum">份数</div>
                                                 <div class="SCSubtotal">小计</div>
                                                 <div class="SCOperate">操作</div>
                                             </div>
                                             <div id="SCartCon" class="SCInfo" style="display: block;">
                                                 <ul id="CartList">
                                                 
                                                 </ul>
                                             </div>                                    
                                         </div>
                                     </div>
                                 </div>
                                 <div class="SCOBottom">
                                     <div class="TotalPrice">
                                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                             <tbody><tr>
                                                 <td width="80">&nbsp;菜 &nbsp;&nbsp;&nbsp;&nbsp;品：</td>
                                                 <td width="10">&nbsp;</td>
                                                 <td><i>￥</i><span id="CMoney">0</span><input type="hidden" id="MainMoney" value="111"><input type="hidden" id="OtherMoney" value="0"></td>
                                                 <td>&nbsp;</td>
                                                 <td width="60"><a href="javascript:;" onclick="delshopcart()" class="EmptyDishes">清空菜品</a></td>
                                             </tr>
                                         </tbody></table>
                                     </div>
                                     
                                     <div class="OrderWay">
                                         <div class="OWBtn">
                                             <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/showcart/shopid/".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])),$_smarty_tpl);?>
" class="Waimai tips" onmousedown="this.className='Waimai Waimaidown'" onmouseout="this.className='Waimai'" original-title=""><p>外卖送餐 <i>￥</i><span id="waimaibtn">0</span></p>
                                             	<span id="spri"><?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['sendtype']==0){?>网站配送<?php }else{ ?>店铺自配<?php }?></span></a>
                                               <a href="javascript:;" class="NotAvailable"><p>支持<br>到店用餐</p></a> 
                                         </div>
                                     </div>
                                     <div class="DTips" id="npdiv" style="display:none;"></div>
                                     <div class="DContact">客服热线：<span><?php echo $_smarty_tpl->tpl_vars['litel']->value;?>
</span></div>
                                 </div>
                             </div> 


                </div>
                
                
                
                
                <div style="clear:both;"></div>
            </div>
            <!--餐厅菜单-->
        </div>
        <!--------------右侧返回首页   start  ------------------------->
		
	<div class="fpcity_bg" id="fpcity_bg">
              <div class="shopsritop"></div>
              <div class="shopsrimid">
                 <div class="detail_recommenlist" id="glideDiv1" style="">
                   <ul>
                     <li><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
">返回首页</a></li>
                                         </ul>
                   <a href="#back_top"><p class="back_top">回顶部</p></a>
                 </div>
              </div>
              <div class="shopsribot"></div>     
          </div> 

 <style>
.fpcity_bg {
height: 139px;
width: 69px;
position: fixed;
_position: absolute;
top: 409px;
margin-left:1120px;
_margin-top: 190px;
_top: expression(eval(document.documentElement.scrollTop)-46);
float: right;
}
.fpcity_bg .shopsritop {
background: url(<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/shopritop.png) 0 0 no-repeat;
_background: none;

width: 69px;
height: 50px;
}
.fpcity_bg .shopsrimid {
background: #36a7ef;
width: 69px;
overflow: hidden;
zoom: 1;
}
.fpcity_bg .detail_recommenlist {
text-align: center;
width: 69px;
}
.fpcity_bg .detail_recommenlist ul {
overflow: hidden;
zoom: 1;
padding-top: 1px;
width: 60px;
margin-left: 5px;
_margin-left: 2px;
background: #FFF;
}
.fpcity_bg .detail_recommenlist ul li {
line-height: 28px;
height: 28px;
overflow: hidden;
}
.fpcity_bg .detail_recommenlist ul li a {
color: #757575;
display: block;
}
.fpcity_bg .detail_recommenlist p.back_top {
background: url(<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/back_top.jpg) 0 0 no-repeat;
width: 48px;
margin: 8px 13px 2px;
height: 32px;
cursor: pointer;
padding-top: 34px;
color: #ffffff;
}
.fpcity_bg .shopsribot {
background: url(<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/shopribot.png) 0 0 no-repeat;
_background: none;

width: 69px;
height: 7px;
}
</style>	
 	<script>
	 $('.back_top').click(function(){
    $('body,html').animate({scrollTop:0},500)
   });
	</script>
<!--------------右侧返回首页  end   --------------->




        
    </div>

</div>
<div id="temdiv_id" style="display:none;">
	 <div id="temd_id1">
     <div>  	您距<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
超过<?php echo $_smarty_tpl->tpl_vars['servery']->value;?>
米，如需配送请致电<?php echo $_smarty_tpl->tpl_vars['litel']->value;?>
， </div>
     <div>我们的客服会为您提供解决方案。</div>
     <div id="btntu_div" style="margin-top:20px;">  <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/guide/shopid/".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])),$_smarty_tpl);?>
" class="y"><< 重新定位</a>  <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/index"),$_smarty_tpl);?>
" class="n"> 查看附近商家</a>  <a href="javascript:void();" onclick="closetout();" class="n"> 继续看看 >></a> </div>
	 </div>
	<div id="temd_id2">
	   <div> <font style="font-weight:bold;">您还未定位，我们无法为您提供准确服务…</font></div>
     <div>   您需要先定位，确定您与所选商家的距离  </div>
     <div id="btntu_div" style="margin-top:20px;">  <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/guide/shopid/".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])),$_smarty_tpl);?>
" class="y"><< 定位确定您的位置</a>  <a href="javascript:void();" onclick="closetout();" class="n"> 留在本页面先看看 >></a> </div>
  </div>
</div>
 <style>
 	#btntu_div a.y{
 		padding:5px 5px 5px 5px;
 		background-color:#fca500;
 		height:30px;
 		color:#fff;
 		font-weight:bold;
 	}
 	#btntu_div a.n{
 		padding:5px 5px 5px 5px;
 		background-color:#5ec3cd;
 		height:30px;
 		color:#fff;
 		font-weight:bold;
 	}
 	#btntu_div a:hover{
 		text-decoration:none;
 		color:#fff;
 		
 	}
</style>
  
 <script type="text/javascript"> 
 $(".MealsList li:nth-child(even)").addClass('odd');//css({'border-left':'3px solid #f60','background-color':'#fffae7'});
 
 var shopid = <?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['id'];?>
;   
 var locationfalse  = false; 
 
   <?php $_smarty_tpl->tpl_vars['pssetinfo'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['psset']->value), null, 0);?>
 	  <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['locationtype']==1){?> 
 	      <?php if (empty($_smarty_tpl->tpl_vars['lng']->value)){?>
	      
	       $('#temd_id1').remove();
	     
    	<?php }else{ ?>
		        $('#temd_id2').remove();
     	<?php }?> 
 	     $.get("<?php echo FUNC_function(array('type'=>'url','link'=>"/site/ceju/lat/".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['lat'])."/lng/".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['lng'])."/dlng/".((string)$_smarty_tpl->tpl_vars['lng']->value)."/dlat/".((string)$_smarty_tpl->tpl_vars['lat']->value)."/datatype/json"),$_smarty_tpl);?>
", function(result){
 	     	   $("#juli").text(result.msg);
 	        	if(result.error ==  false){
                locationfalse = false;    
           }else{
           	 locationfalse = true;
           	   artopen();
           }
       },'json'); 
 	  <?php }else{ ?>
 	   
 	  	$(function(){
		       var myaddressid = '<?php echo $_smarty_tpl->tpl_vars['myaddress']->value;?>
';
		      if(myaddressid == null|| myaddressid==''){
			           window.location.href= '<?php echo FUNC_function(array('type'=>'url','link'=>"/site/guide"),$_smarty_tpl);?>
';
	    	   }
	    }); 
 	  <?php }?> 
 
	
 
  function artopen(){ 
    art.dialog({
       id: 'testID3',
       lock: true,
       background: '#666', // 背景色
       opacity: 0.87,	// 透明度
       title:'定位提示',
       content: $('#temdiv_id').html()
    });  
  }
	function closetout(){ 
	  art.dialog({id: 'testID3'}).close();
	}
</script>
<script>
 


</script>
<div style="text-align:center;"></div>
 
 
 

<div id="footer">
	
<div class="hc_btm_div">
		<div class="hc_btm_contact">
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

		</div>
		<div class="hc_btm_info">@2008-2012 <?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['beian']->value;?>
<?php echo stripslashes($_smarty_tpl->tpl_vars['footerdata']->value);?>
</div>
	</div>	
	
	
 </div> 
<div style="position: absolute; top: -1970px; left: -1970px;"> 
</div>  
</body>
</html>





<?php }} ?>