<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 10:26:44
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/member/adminpage/addadmin.html" */ ?>
<?php /*%%SmartyHeaderCode:5857723935594a1640b5bc9-02230846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89a4640dfe0a2a037dda28b4bbc84e2e92715fba' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/member/adminpage/addadmin.html',
      1 => 1434531487,
      2 => 'file',
    ),
    'e454e1ef514aa19f42b90368588b225ec4c320aa' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/adminpage/public/admin.html',
      1 => 1435640042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5857723935594a1640b5bc9-02230846',
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
  'unifunc' => 'content_5594a1641ac138_13516653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5594a1641ac138_13516653')) {function content_5594a1641ac138_13516653($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
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
   	        	 	   <div class="showtop_t" id="positionname">添加管理员</div>
   	        	 </div>  -->
   	        	 <div class="show_content_m_t2">
   	        	 	
   	        	 	
   <div style="width:auto;overflow-x:hidden;overflow-y:auto"> 
          <div class="tags">
           <?php echo smarty_function_load_data(array('assign'=>"info",'table'=>"admin",'where'=>"`uid`=".((string)$_smarty_tpl->tpl_vars['id']->value),'type'=>"one"),$_smarty_tpl);?>
 
          <div id="tagscontent">
            <form method="post" name="form1" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/member/module/saveadmin/datatype/json"),$_smarty_tpl);?>
" onsubmit="return subform('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/member/module/adminlist"),$_smarty_tpl);?>
',this);">
              <div>
                <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%">
                  <tbody>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="ffffff">
                      <td class="left">管理员名称</td>
                      <td><input type="text" name="username" id="username" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['username'])===null||$tmp==='' ? '' : $tmp);?>
" class="skey" style="width:150px;" <?php if (!empty($_smarty_tpl->tpl_vars['info']->value)){?> readonly<?php }?>></td>
                    </tr>
                    
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="ffffff">
                      <td class="left">新密码</td>
                      <td><input type="password" name="password" id="password" value="" class="skey" style="width:250px;"></td>
                    </tr>
                    
                     <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="ffffff">
                      <td class="left" valign="top">所在用户分组</td>
                      <td>  
                      <select name="groupid">
                      	 <?php echo smarty_function_load_data(array('assign'=>"grouplist",'table'=>"group",'fileds'=>"*",'limit'=>"10"),$_smarty_tpl);?>
  
                      	<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['grouplist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>  
                      	<?php if ($_smarty_tpl->tpl_vars['items']->value['type']=='admin'){?>
                      	   <option value="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['info']->value['groupid']==$_smarty_tpl->tpl_vars['items']->value['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</option>
                      	<?php }?>
                      	<?php } ?> 
                      </select>
                      	</td>
                    </tr>
                    <input type="hidden" name="uid" id="uid" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['uid'];?>
" class="skey" style="width:150px;">
                   
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
        <div class="blank20"></div> 
      
      </div>
      <div class="clear"></div>
    </div>
   
   
    </div> 
<script>	 
function checkword(flag)
{ 
	 
	$("input[name='limit[]']").attr("checked",flag); 
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

$('#tagscontent table').attr({
  'cellpadding':'0',
  'cellspacing':'0'
});


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