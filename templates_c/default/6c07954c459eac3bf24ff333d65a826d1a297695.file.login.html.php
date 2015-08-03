<?php /* Smarty version Smarty-3.1.10, created on 2015-05-20 16:41:55
         compiled from "D:\wmr\templates\default\member\login.html" */ ?>
<?php /*%%SmartyHeaderCode:21595555c48d35aa9d6-98013415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c07954c459eac3bf24ff333d65a826d1a297695' => 
    array (
      0 => 'D:\\wmr\\templates\\default\\member\\login.html',
      1 => 1399441602,
      2 => 'file',
    ),
    '5881bdf429d2ff2990f97b6e60f780b4e3cc17de' => 
    array (
      0 => 'D:\\wmr\\templates\\default\\public\\site.html',
      1 => 1400295582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21595555c48d35aa9d6-98013415',
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
    'sitelogo' => 0,
    'footlink' => 0,
    'items' => 0,
    'cartcount' => 0,
    'member' => 0,
    'mapname' => 0,
    'shopsearch' => 0,
    'sitebk' => 0,
    'toplink' => 0,
    'beian' => 0,
    'footerdata' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555c48d37cc149_52096112',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555c48d37cc149_52096112')) {function content_555c48d37cc149_52096112($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include 'D:\\wmr\\lib\\Smarty\\libs\\plugins\\function.load_data.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> 
  用户登陆
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


 <script> 
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
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
	 <div class="top1">
	 	 <div class="top1_show">
	 	  <div class="top1_logo"><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['sitelogo']->value;?>
"></a></div>
	 	  <div class="top1_menu">
	 	     <ul>
	 	     	<?php if (!empty($_smarty_tpl->tpl_vars['footlink']->value)){?>
	 	     	<?php $_smarty_tpl->tpl_vars['footlink'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['footlink']->value), null, 0);?>
	 	     		<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['footlink']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?> 
			          <li class="active_li"><a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['typeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['typename'];?>
</a> </li>
			      <?php } ?>
	 	     <?php }?>
	 	     	</ul>	
	 	  	
	 	  </div>
	 	  <div class="top1_other">
	 	  	
	 	  	<ul>
						<li style="display:none;"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/cart"),$_smarty_tpl);?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/shopping.png"></a></li>
						<li style="display:none;"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/cart"),$_smarty_tpl);?>
"><span class="hc_padding">美食篮子<span id="lanzi" data="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['cartcount']->value)===null||$tmp==='' ? 0 : $tmp);?>
">(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['cartcount']->value)===null||$tmp==='' ? 0 : $tmp);?>
)</span></span></a><span class="hc_head_spans">|</span></li>
						
				 <?php if (!empty($_smarty_tpl->tpl_vars['member']->value['uid'])&&$_smarty_tpl->tpl_vars['member']->value['group']!='admin'){?> 
           <li style="">
           	  <div>
           		 <a href="javascript:dropdown();"><span class="hc_padding" style="text-overflow: ellipsis; width: 50px;"><?php echo $_smarty_tpl->tpl_vars['member']->value['username'];?>
</span></a>
           		 <span class="hc_head_spans">|</span>
           	  </div>
	            <div class="dropdown_div hide"> 
	             <ul class="dropdown_div_ul">
	  	            <li><a style="padding: 3px 5px;" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/index"),$_smarty_tpl);?>
">个人中心</a></li>
		              <li><a style="padding: 3px 5px;" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/collect"),$_smarty_tpl);?>
">我的收藏</a></li>
		              <li><a style="padding: 3px 5px;" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/area/useraddress"),$_smarty_tpl);?>
">我的地址</a></li>
		              <li><a style="padding: 3px 5px;" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/edituser/showaction/pwdmx"),$_smarty_tpl);?>
">修改密码</a></li> 
		             <li><a style="padding: 3px 5px;" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/loginout"),$_smarty_tpl);?>
">退出登录</a></li>
		         <div class="clear"></div>
	           </ul>
	          </div>
          </li>
           <li><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/loginout"),$_smarty_tpl);?>
">退出 </a></li>
		    <?php }else{ ?>
		     <li><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/login"),$_smarty_tpl);?>
">登陆 </a></li>
		     <li><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/regester"),$_smarty_tpl);?>
">注册 </a></li>
		     <?php }?> 
		    
<script type="text/javascript">
	
	function dropdown(){
		if($('.dropdown_div').hasClass('show'))
		{
			$('.dropdown_div').removeClass('show');
			$('.dropdown_div').addClass('hide');
		}
		else if($('.dropdown_div').hasClass('hide'))
		{
			$('.dropdown_div').removeClass('hide');
			$('.dropdown_div').addClass('show');
		}else{
			$('.dropdown_div').removeClass('hide');
			$('.dropdown_div').addClass('show');
		}
	}

	$(document).ready(function(){
		$(document).click(function(){
			if($('.dropdown_div').hasClass('show'))
			{
				$('.dropdown_div').removeClass('show');
				$('.dropdown_div').addClass('hide');
			}
			});
	});
</script>					</ul>
	 	  	
	 	  	</div>
	 	 </div>
	 </div>
	 
	  <div class="top2">
	  	 <div class="top2_content">
	  	 	  <div class="hc_addr">
					   <div class="hc_addr_change"><span class="hc_change"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/guide"),$_smarty_tpl);?>
">[更改地址]</a> </span><span class="hc_address">地址：<a style="color:#777;" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['mapname']->value)===null||$tmp==='' ? '' : $tmp);?>
</a></span></div>
				  </div>
				  <div class="hc_search">
					<div class="hc_search_left"></div>
					<div class="hc_search_midd"><input id="search_input" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shopsearch']->value)===null||$tmp==='' ? '搜索餐厅、美食' : $tmp);?>
" text="搜索餐厅、美食" onfocus="cls(this)" onblur="res(this)"   onkeyprese="pre(this)" type="text6" onkeydown="if(event.keyCode==13)search();" style="padding:0;margin-bottom:0;margin-top:1px;width: 209px;height: 26px;line-height:26px; outline:none;border:0;"  ></div>
					<div class="hc_searching"></div>
					<div class="clear"></div>
					<script type="text/javascript">
						$('.hc_searching').click(function(){
							search();
						})
						
						function search()
						{
							var name = $('#search_input').val();
							if(name != '' && name != $('#search_input').attr('text')) 
							{
								var url = siteurl+'/index.php?controller=site&action=index&shopsearch='+name; 
								location.href=url;
							}
						}
						function cls(obj)
						{
							if($(obj).attr('text') == $(obj).val())
							{
								$(obj).val('');
								$('#search_input').css('color','#000');
							}  
						}
						function res(obj)
						{
							if($(obj).val() == '')
							{
								$('#search_input').css('color','#666');
								$(obj).val($(obj).attr('text'));
							}
						}
						$(document).ready(function(){
							$('#search_input').css('color','#666');
						});
					</script>
				</div>
				  
	  	 	</div>
	 </div>
	 
</div> 

<div class="mmbg" <?php if (!empty($_smarty_tpl->tpl_vars['sitebk']->value)){?>style="background:url(<?php echo $_smarty_tpl->tpl_vars['sitebk']->value;?>
)"<?php }?>></div> 
	
 
 	<div id="content">
 	<form id="loginForm" method="post" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/login"),$_smarty_tpl);?>
">
  <div class="hc_content">
		
		<div class="hc_login">
			<div class="hc_login_head"><span class="hc_login_head_span">用户登录</span></div>
			<div class="hc_login_content">
				<div class="hc_login_content_left">
					<div style="height:132px;"></div>
					<div class="hc_login_div">
						<span class="hc_login_div_span">账 号 ：</span>
						<input onkeydown="" class="hc_login_input" style="line-height: 38px; padding: 0 5px; margin: 0; border: 0; width: 252px; height: 38px; outline: none;" type="text" placeholder="请输入用户名" name="uname" value="">
						<p class="tip"></p>
					</div>
					<div class="hc_login_div">
						<span class="hc_login_div_span">密 码 ：</span>
						<input onkeydown="" class="hc_login_input" style="line-height: 38px; padding: 0 5px; margin: 0; border: 0; width: 252px; height: 38px; outline: none;" type="password" placeholder="请输入密码" name="pwd" value="">
						<p class="tip"></p>
					</div>
          <?php if ($_smarty_tpl->tpl_vars['allowedcode']->value==1){?>
          <div class="hc_login_div">
						<span class="hc_login_div_span">验证码：</span>
						<input   style="line-height: 38px; padding: 0 5px; margin: 0; border: 1; width: 102px; height: 38px; outline: none;" type="text" placeholder="验证码" name="Captcha" value=""><img src="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/getCaptcha"),$_smarty_tpl);?>
" id="captchaimg"><a href="javascript:freshcode();" >刷新图片</a>
						<p class="tip"></p>
					</div>
          <?php }?>
          
          
					<div class="hc_password"><input name="LoginForm[rememberMe]" value="1" style="margin:0; margin-right:5px; padding: 0;" type="checkbox" checked="">三十天内自动登录</div>
					<div class="hc_login_btn">
						<input type="hidden" value="do" name="tijiao">
						<div id="te_login_btn" class="login-button hc_login_btn_div ">登 录</div>
						<div class="hc_login_btn_pwd"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/findpwd"),$_smarty_tpl);?>
">找回密码?</a></div>
						<div class="clear"></div>
					</div>
					 <?php echo smarty_function_load_data(array('assign'=>"apiloginlist",'table'=>"otherlogin",'fileds'=>"*"),$_smarty_tpl);?>
 
					 <?php if (count($_smarty_tpl->tpl_vars['apiloginlist']->value['list'])>0){?>
					<div class="hc_login_btn"> 
						
						<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['apiloginlist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
						     <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/linktest/logintype/".((string)$_smarty_tpl->tpl_vars['items']->value['loginname'])),$_smarty_tpl);?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['items']->value['logourl'];?>
"></a> 
						<?php } ?>
					 </div> 
					 <?php }?>
				</div>    
				<div class="hc_login_content_right">
					<div class="hc_login_content_right_div">
						<div class="hc_login_content_h_div"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/zhuce02.png" alt="注册<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
账号"></div>
						<div class="hc_login_content_p">现在免费注册成为<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
用户，便能建立属于你的定制菜单和开饭行踪, 分享你的饮食经验，随时收藏你的最爱餐厅，以便随时随地查阅。</div>
						<div class="hc_login_content_btn"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/regester"),$_smarty_tpl);?>
">现在注册</a></div>

					</div>

				</div>
				<div class="clear"></div>
			</div>

		</div>



	</div>
</form>
<script type="text/javascript">
	$('.login-button').click(function(){
		$('#loginForm').submit();
	})
</script>
</div> 
 

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
<div id="serverdiv">
    	<ul>
    	  <li><a href="#" id="a_product" class="nav_a">快速导航</a>
    	  	 
    	  	</li>
    	  <li >
    	  	 <a id="a_serve" herf="javascript:void(0)" class="nav_a" >在线客服</a> 
    	      <div class="outserdiv">
    	  	 	    <table id="serve_list" style="">
    	  	 	    	<tbody> 
    	  	 	    		 
    	  	 	    		  <tr style="display: table-row;"><td>
    	  	 	    					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=18707554858&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:18707554858:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
    	  	 	    					</td>
    	  	 	    			</tr>
    	  	 	    			 
    	  	 	    			</tbody>
    	  	 	    	</table>
    	  	 	</div>	
    	  </li>	
    	  <li><a id="a_share" herf="javascript:void(0)" class="nav_a">分享到</a> 
    	  	<div class="outserdiv">
    	  	 <table id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" style="background-color: rgb(255, 255, 255); border: 1px solid rgb(144, 218, 148);">
    	  	 	<tbody>
    	  	 		<tr><td colspan="2" style="height:3px;">&nbsp;</td></tr>
    	  	 		<tr><td height=23px><a class="bds_qzone" href="#">QQ空间</a></td><td><a class="bds_tsina" href="#">新浪微博</a></td></tr>
    	  	 		<tr><td height=23px><a class="bds_tqq" href="#">腾讯微博</a></td><td><a class="bds_renren" href="#">人人网</a></td></tr>
    	  	 		<tr><td height=23px><a class="bds_baidu" href="#">百度搜藏</a></td><td><a class="bds_kaixin001" href="#">开心网</a></td></tr>
    	  	 		<tr><td height=23px><a class="bds_tqf" href="#">腾讯朋友</a></td><td><a class="bds_hi" href="#">百度空间</a></td></tr>
    	  	 		<tr><td height=23px><a class="bds_douban" href="#">豆瓣网</a></td><td><a class="bds_tsohu" href="#">搜狐微博</a></td></tr>
    	  	 		<tr><td height=23px><a class="bds_qq" href="#">QQ收藏</a></td><td><a class="bds_taobao" href="#">我的淘宝</a></td></tr>
    	  	 		<tr><td height=23px><a class="bds_t163" href="#">网易微博</a></td><td><span class="bds_more">更多</span></td></tr>
    	  	 		<tr><td colspan="2" style="padding:2px;">&nbsp;<div id="to_baidu_index" style="background-color: rgb(144, 218, 148); background-position: initial initial; background-repeat: initial initial;"><img src="http://x.xnit.net/js/../images/tobaidu.png" width="156" height="25"></div><div class="bdaddtocitebtn bdaddtocitebtn-small" style="display:none;"></div></td></tr><tr><td colspan="2"></td></tr></tbody></table>
 
    	  	</div>
    	  	 </li>	
    	  <li><a id="a_backtop" herf="javascript:void(0)" class="nav_a" >回到顶部</a> </li>	
    	  <li><a id="a_qrcode" herf="javascript:void(0)" class="nav_a" >下载APP</a>
    	  	<div class="outserdiv" style="width:150px;background-color:#fff;display:none;">
    	  		<div><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/chart.png" style="width:150px;height:150px;"></div>
    	  		<div style="padding-bottom:10px;"><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/waimairen.apk" style="color:blue;">手动下载</a></div>
    	  	</div>
    	  	
    	  	</li>	
    	  <li id="close_all"><div id="close_img_bg" style="background-color: rgb(144, 218, 148); background-position: initial initial; background-repeat: initial initial;"><div id="close_img" title="点击收起"></div></div> </li>	
    	</ul>
</div>
<div id="open_img_bg" style="display:none;">
	<div id="open_img" title="点击展开" style=""></div>
</div>
 
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/sharea.js" type="text/javascript" language="javascript"></script>



</body>
</html>





<?php }} ?>