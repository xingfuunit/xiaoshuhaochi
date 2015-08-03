<?php /* Smarty version Smarty-3.1.10, created on 2015-06-30 12:00:38
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/system/adminpage/siteset.html" */ ?>
<?php /*%%SmartyHeaderCode:9255968955921466add8a7-29610618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abfb511794e9cd83d60d074a9b15a66d3299256c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/system/adminpage/siteset.html',
      1 => 1434531487,
      2 => 'file',
    ),
    'e454e1ef514aa19f42b90368588b225ec4c320aa' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/adminpage/public/admin.html',
      1 => 1435568735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9255968955921466add8a7-29610618',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tempdir' => 0,
    'siteurl' => 0,
    'is_static' => 0,
    'admininfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_55921466c150c9_14629707',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55921466c150c9_14629707')) {function content_55921466c150c9_14629707($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
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

<script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/plugins/iframeTools.js"></script>
 
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
   	        	 	   <div class="showtop_t" id="positionname">网站设置</div>
   	        	 </div>  -->
   	        	 <div class="show_content_m_t2">
   	        	 	
   	        	 	 
	
	  <div style="width:auto;overflow-x:hidden;overflow-y:auto;">   
          <div id="tagscontent">
            <form method="post" name="form1" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/system/module/saveset/datatype/json"),$_smarty_tpl);?>
" onsubmit="return subform('',this);">
              <div>
                <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
                  <tbody>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="ffffff">
                      <td class="left">网站名称</td>
                      <td><input type="text" name="sitename" id="sitename" value="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
" class="skey" style="width:150px;"></td>
                    </tr>
                    
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="ffffff">
                      <td class="left">网站SEO描述</td>
                      <td><input type="text" name="description" id="description" value="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" class="skey" style="width:250px;"></td>
                    </tr>
                     <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">网站SEO关键字</td>
                      <td><input type="text" name="keywords" id="keywords" value="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" class="skey" style="width:250px;"></td>
                    </tr>
                     
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">备案号</td>
                      <td><input type="text" name="beian" id="beian" value="<?php echo $_smarty_tpl->tpl_vars['beian']->value;?>
" class="skey" style="width:250px;"></td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">客服电话</td>
                      <td><input type="text" name="litel" id="litel" value="<?php echo $_smarty_tpl->tpl_vars['litel']->value;?>
" class="skey" style="width:250px;"></td>
                    </tr>
                    
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff" >
                      <td class="left">佣金比例</td>
                      <td><input type="text" name="yjin" id="yjin" value="<?php echo $_smarty_tpl->tpl_vars['yjin']->value;?>
" class="skey" style="width:50px;">整数,例如：5 表示佣金比例为订单总金额的5%</td>
                    </tr>
                     <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">网站默认城市</td>
                      <td><input type="text" name="cityname" id="cityname" value="<?php echo $_smarty_tpl->tpl_vars['cityname']->value;?>
" class="skey" style="width:100px;"></td>
                    </tr>
                   
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">网站公告</td>
                      <td><textarea name="notice"><?php echo $_smarty_tpl->tpl_vars['notice']->value;?>
</textarea></td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">默认用户头像</td>
                      <td>
                      	<input type="hidden" name="userlogo" id="userlogo" value="<?php echo $_smarty_tpl->tpl_vars['userlogo']->value;?>
" class="skey" style="width:100px;">
                      	<img src="<?php echo $_smarty_tpl->tpl_vars['userlogo']->value;?>
" width=50px height=50px id="imgshow" <?php if (empty($_smarty_tpl->tpl_vars['userlogo']->value)){?> style="display:none;"<?php }?>> 
                      	<span onclick="uploads();">上传图片</span> 
                      </td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">默认店铺头像</td>
                      <td>
                      	<input type="hidden" name="shoplogo" id="shoplogo" value="<?php echo $_smarty_tpl->tpl_vars['shoplogo']->value;?>
" class="skey" style="width:100px;"> 
                      	<img src="<?php echo $_smarty_tpl->tpl_vars['shoplogo']->value;?>
" width=50px height=50px id="imgshows" <?php if (empty($_smarty_tpl->tpl_vars['shoplogo']->value)){?> style="display:none;"<?php }?>> 
                      	<span onclick="uploadm();">上传图片</span> 
                      </td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">网站logo</td>
                      <td>
                      	<input type="hidden" name="sitelogo" id="sitelogo" value="<?php echo $_smarty_tpl->tpl_vars['sitelogo']->value;?>
" class="skey" style="width:100px;"> 
                      	<img src="<?php echo $_smarty_tpl->tpl_vars['sitelogo']->value;?>
" width=50px height=50px id="imgshowc" <?php if (empty($_smarty_tpl->tpl_vars['sitelogo']->value)){?> style="display:none;"<?php }?>> 
                      	<span onclick="uploadc();">上传图片</span> 
                      </td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">手机站LOGO</td>
                      <td>
                      	<input type="hidden" name="html5logo" id="html5logo" value="<?php echo $_smarty_tpl->tpl_vars['html5logo']->value;?>
" class="skey" style="width:100px;"> 
                      	<img src="<?php echo $_smarty_tpl->tpl_vars['html5logo']->value;?>
" width=50px height=50px id="html5logoshow" <?php if (empty($_smarty_tpl->tpl_vars['html5logo']->value)){?> style="display:none;"<?php }?>> 
                      	<span onclick="uploadk();">上传图片</span> 
                      </td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">网站meta数据</td>
                      <td><textarea name="metadata"><?php echo stripslashes($_smarty_tpl->tpl_vars['metadata']->value);?>
</textarea></td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">统计代码</td>
                      <td><textarea name="footerdata"><?php echo stripslashes($_smarty_tpl->tpl_vars['footerdata']->value);?>
</textarea></td>
                    </tr>
                     <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">百度key</td>
                      <td><input type="text" name="baidumapkey" id="baidumapkey" value="<?php echo $_smarty_tpl->tpl_vars['baidumapkey']->value;?>
" class="skey" style="width:100px;"></td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">百度secret</td>
                      <td><input type="text" name="baidumapsecret" id="baidumapsecret" value="<?php echo $_smarty_tpl->tpl_vars['baidumapsecret']->value;?>
" class="skey" style="width:100px;"></td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">选择地址样式</td>
                      <td>	<input type="radio" name="guidetype" id="guidetype" value="1"  checked>样式1(弹出窗)
                      	<input type="radio" name="guidetype" id="guidetype" value="2"   <?php if ($_smarty_tpl->tpl_vars['guidetype']->value==2){?>checked<?php }?>>样式2（滚动）
                      </td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">百度LNG默认城市坐标</td>
                      <td>	  
                      	<input type="text" name="baidulng" id="baidulng" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['baidulng']->value)===null||$tmp==='' ? '0' : $tmp);?>
" class="skey" style="width:100px;"> 
                      </td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">百度lat默认城市坐标</td>
                      <td>	 
                      	<input type="text" name="baidulat" id="baidulat" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['baidulat']->value)===null||$tmp==='' ? '0' : $tmp);?>
" class="skey" style="width:100px;"> 
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="blank20"></div>
              <input type="hidden" name="tijiao" id="tijiao" value="do" class="skey" style="width:250px;">
              <input type="hidden" name="saction" id="saction" value="siteset" class="skey" style="width:250px;">
               <input type="submit" value="确认提交" class="button">  
            </form>
          </div>
         
           
         </div>
      
    

          </div> 
<script>
	var dialogs ;
 function uploads(){  
 	  dialogs = art.dialog.open('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/other/module/adminupload/func/uploadsucess"),$_smarty_tpl);?>
');
 	  dialogs.title('上传图片'); 
 }
 function uploadsucess(flag,obj,linkurl){
 	 if(flag == true){
 		alert(linkurl);
		dialogs.close();
		uploads();
 	 }else{ 
 		dialogs.close();
 	 $('#userlogo').val(linkurl);
   	$('#imgshow').attr('src',linkurl);
 	  $('#imgshow').show();
   }
 }  
 function uploadm(){  
 	  dialogs = art.dialog.open('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/other/module/adminupload/func/uploadsucessm"),$_smarty_tpl);?>
');
 	  dialogs.title('上传图片'); 
 }
 function uploadsucessm(flag,obj,linkurl){
 	 if(flag == true){
 		alert(linkurl);
		dialogs.close();
		uploadm();
 	 }else{ 
 		dialogs.close();
 	 $('#shoplogo').val(linkurl);
 	$('#imgshows').attr('src',linkurl);
 	$('#imgshows').show(); 
   }
 }   
function uploadc(){  
 	  dialogs = art.dialog.open('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/other/module/adminupload/func/uploadsucessc"),$_smarty_tpl);?>
');
 	  dialogs.title('上传图片'); 
 }
 function uploadsucessc(flag,obj,linkurl){
 	 if(flag == true){
 		alert(linkurl);
		dialogs.close();
		uploadc();
 	 }else{ 
 		dialogs.close();
 	 	$('#sitelogo').val(linkurl);
 	  $('#imgshowc').attr('src',linkurl);
 	  $('#imgshowc').show(); 
   }
 } 
 function uploadk(){
 	 dialogs = art.dialog.open('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/other/module/adminupload/func/uploadsucessk"),$_smarty_tpl);?>
');
 	  dialogs.title('上传图片'); 
}
function uploadsucessk(flag,obj,linkurl){
 	 if(flag == true){
 		alert(linkurl);
		dialogs.close();
		uploadk();
 	 }else{ 
 		dialogs.close();
 	 	$('#html5logo').val(linkurl);
 	  $('#html5logoshow').attr('src',linkurl);
 	  $('#html5logoshow').show(); 
   }
 } 
 
</script>    
<!--newmain 结束-->
 
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