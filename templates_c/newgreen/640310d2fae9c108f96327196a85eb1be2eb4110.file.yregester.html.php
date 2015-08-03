<?php /* Smarty version Smarty-3.1.10, created on 2015-06-30 17:20:11
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/member/yregester.html" */ ?>
<?php /*%%SmartyHeaderCode:929925721559240b53c2ea4-27236104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '640310d2fae9c108f96327196a85eb1be2eb4110' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/member/yregester.html',
      1 => 1435656008,
      2 => 'file',
    ),
    'deb5544bf2aa036a3feb877ac215d97370a69382' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/site.html',
      1 => 1435553916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '929925721559240b53c2ea4-27236104',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_559240b557eec9_62185988',
  'variables' => 
  array (
    'tempdir' => 0,
    'sitename' => 0,
    'keywords' => 0,
    'description' => 0,
    'metadata' => 0,
    'siteurl' => 0,
    'member' => 0,
    'is_static' => 0,
    'controlname' => 0,
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559240b557eec9_62185988')) {function content_559240b557eec9_62185988($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
?><!DOCTYPE html>
<html> 
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>用户注册-<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
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
/public/css/memberlogin.css">
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
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/regestercode.js"></script>
 <script>
     var regestercode=0;
 	$(function() { 
  $("img").lazyload({ 
  effect : "fadeIn" 
  }); 
 //Header二维码显示与隐藏  Begin
 $('.views_main_header ul > li:nth-of-type(5) span:nth-child(1)').on({
 	'mouseover':function(){
 	$('.views_main_header ul > li:nth-of-type(5) span:nth-child(3)').fadeIn();
 },
 'mouseout':function(){
 	$('.views_main_header ul > li:nth-of-type(5) span:nth-child(3)').fadeOut();
 }
});
 //Header二维码显示与隐藏  End  


//Header点击添加高亮  Begin
$('.views_main_header ul > li:nth-of-type(4) ol li:nth-of-type(1)').addClass('active');

 $('.views_main_header ul > li:nth-of-type(2) span').click(function(){
    $(this).parent().addClass('active');
    $(this).parent().siblings().children().children().removeClass('active');
 });

 $('.views_main_header ul > li:nth-of-type(4) ol li').click(function(){
    $(this).addClass('active').siblings().removeClass('active');
    $(this).parent().parent().siblings().removeClass('active');
    $('#cover').fadeOut();
    $('.views_main_login_sign_wrap').removeClass('views_main_login_sign_one_transition');
 });
//Header点击添加高亮  End

//用户登录后，显示当前用户的信息列表 Begin
 if($('.person_content').children('span').eq(0).text().length != 0){
    $('.person_content').on({  
    	'mouseover':function(){
    		$(this).children('span').eq(1).fadeIn();
        $('.person_name').text($(this).children('span').eq(0).text());
          $(this).children('span').eq(2).fadeIn('slow');
    	},
    	'mouseleave':function(){
    		$(this).children('span').eq(1).fadeOut();
        $(this).children('span').eq(2).fadeOut('fast');
    	}
    });
  }
//用户登录后，显示当前用户的信息列表 End

//用户未登录，显示登录注册也面 Begin
  else{
      var uid = <?php echo $_smarty_tpl->tpl_vars['member']->value['uid'];?>

      if (uid > 0) {
            $('.person_content').children('span').eq(0).text('个人中心');
            $(".person_content").on("click",function(){
         window.location.href=siteurl+'/index.php?controller=member&action=base';  
            })
      }else{
          
           $('.person_content').children('span').eq(0).text('登录 注册');
        $('.person_content').on( 
      'click',function(){
        $('.views_main_login_sign_wrap').addClass('views_main_login_sign_one_transition');
        $('.views_main_login_sign_one').show();
        $('.views_main_login_sign_two').hide();
        $('.views_main_login_sign_three').hide();
        $('#cover').fadeIn();
      }
    );
    
      }
    
  }
//用户未登录，显示登录注册也面 End

//用户未登录，登录注册页面切换 Begin
$('.views_main_header ul > li:nth-child(2) ol li:nth-child(1)').click(function() {
      var value=$("#mobile_check").val();
      var order_check=$("#order_check").val();
      if(value==1||order_check!=="no"){
         location.href= "http://shop.xiaoshuhaochi.com/member/index";
      }else{
        $('.views_main_login_sign_one').fadeIn();
      $('#cover').fadeIn();
      }
    });
    $('#sign_now,.sign_now').click(function() {
        $('.views_main_login_sign_two').fadeIn();
        $('.views_main_login_sign_one').fadeOut();
        $('.views_main_login_sign_three').fadeOut();
    });
    $("#fogot_password").click(function(){
      
         $('.views_main_login_sign_one').fadeOut();
         $(".views_main_login_sign_three").fadeIn();
    })
    $('#login_now').click(function() {
        $('.views_main_login_sign_one').fadeIn();
        $('.views_main_login_sign_two').fadeOut();
    });
    $('#fogetpass').click(function() {
        $('.views_main_login_sign_three').fadeIn();
        $('.views_main_login_sign_one').fadeOut();
    });
//用户未登录，登录注册页面切换 End


//点击❌退出当前页面  Begin
    $('.delete').click(function() {
        $('.views_main_detail').fadeOut();
        $('#cover').fadeOut();
        $('.views_main_login_sign_wrap').removeClass('views_main_login_sign_one_transition');
        $('.general_notice').fadeOut();
    });
//点击❌退出当前页面  End



//点击发送验证码倒计时 Begin
var count = 60;
var timer;
var reg = /^[0-9]*$/;
$('#send_code').click(function(){
  if($('#phone').val().length == 11 && reg.test($('#phone').val()) ){
    timer = setInterval(countDownaaaa,1000); 
  }
});
//验证码
function countDownaaaa(){
  count --;
  if(count == 0 ){
    $('#send_code').css({
      'background':'#ff6000',
      'color':'#fff'
    }); 
   $('#send_code').val('获取验证码').removeAttr('disabled');
    clearInterval(timer);
    count = 60;
    
  }
  else{
    $('#send_code').css({
      'background':'#ccc',
      'color':'#999'
    });
  $('#send_code').attr('disabled',true);
  $('#send_code').val('('+count+')'+'重新发送');
  }
};
//点击发送验证码倒计时 End


}); 

//登录
 function login_btn () {
         var url = siteurl+'/index.php?controller=member&action=login';
         var uname = $("#login_cell").val();
         var pwd = $("#login_password").val();
         var info = {'uname':uname,'pwd':pwd,'logintype':'html5'}; 
         var  url = siteurl+'/index.php?controller=member&action=login&datatype=json&random=@random@' 
        $.ajax({ 
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
            dataType: "json", 
            data:info, 
            success:function(content) {  
            	$('#loading').toggle(); 
            	if(content.msg ==  false){
                        alert("登陆成功");
            		 window.location.href= siteurl+'/index.php?controller=site&action=index&shoid='+shopid;
            	}else{ 
            	   alert(content.msg);
                   $("#cover").hide();
              }
            	
            }, 
            error:function(){ 
            	$('#loading').toggle();

            } 
         });  
 }
  //注册
  function savepwd(){  

		   $('#loading').show();
      var info = {'tname':$('.mobile_email_reg').val(),'phone':$('.mobile_email_reg').val(),'pwd':$('.password_reg').val(),'pwd2':$('.repassword_reg').val(),'checklogin':'html5','phoneyan':$('.code').val(),'regestercode':'1'};
               
		  var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/member/saveregester/random/@random@/datatype/json"),$_smarty_tpl);?>
'; 
		  var backdata = ajaxback(url,info); 
		  if(backdata.flag == false){ 
		      window.location.href = siteurl+'/index.php?controller=site&action=member';
		  }else{
		  	$('#loading').hide();
		     alert(backdata.content);
		  }
		  
	}
        //忘记密码
        function changepwd(){  
            
	
         var phone = $("#mobile_email").val();
         var code = $("#code").val();
         var newpwd = $("#password").val();
         var newpwd2 = $("#repassword").val();
         var info = {'phone':phone,'code':code,'newpwd':newpwd,'newpwd2':newpwd2}
  	 	  var  url = siteurl+'/index.php?controller=member&action=saveuser&controlname=repwd&datatype=json&random=@random@' 
  	 	   $.ajax({ 
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
            dataType: "json", 
            data:info, 
            success:function(content) {  
            alert("修改成功");
             window.location.href= siteurl+'/index.php?controller=site&action=index';
            	if(content.msg ==  false){
            		 window.location.href= siteurl+'/index.php?controller=wxsite&action=member&shoid='+shopid;
            	}else{ 
            	   alert(content.msg);
                  // $("#loading").hide();
              }
            	
            }, 
            error:function(){ 
            	//$('#loading').toggle();

            } 
         });
		  
	}
</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/regestercode.js" type="text/javascript" language="javascript"></script> 

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



<!--
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
			          <li class="active_li" data="<?php echo $_smarty_tpl->tpl_vars['items']->value['typeurl'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['items']->value['typeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['typename'];?>
</a> </li>
			      <?php } ?>
	 	     <?php }?>
	 	     	</ul>	
	 	  	
	 	  </div>
	 	   
	 	   
	 	   
	 	 </div>
	 </div>
</div> 
  -->
<div class="mmbg" style="background:url(../upload/images/regesterbk.jpg) no-repeat;"></div> 

 
 <div class="new_regester">
   <h3 class="regester_top">用户注册</h3>
   <div class="regester_middle">
   	  <div class="rm_li">
   	     <ul>
   	     	  <li>
                 <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/regester"),$_smarty_tpl);?>
">手机号注册</a> 	
              </li>
   	     	  <li  class="active">
                 <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/yregester"),$_smarty_tpl);?>
">邮箱注册</a> 	
              </li> 
              <li class="rm_rt">
                已有帐号？<a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/login"),$_smarty_tpl);?>
">马上登陆</a>|<a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/findpwd"),$_smarty_tpl);?>
">找回密码</a>
               </li>
   	     	</ul> 	
   	  </div>
   	 <!-- <div class="rm_rt">已有帐号？<a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/login"),$_smarty_tpl);?>
">马上登陆</a>|<a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/findpwd"),$_smarty_tpl);?>
">找回密码</a></div> -->
   </div>
   <div class="regester_bottomss">
   	  <div class="rbm_l_p">
   	  	<form id="regForm" method="post" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/saveregester/datatype/json"),$_smarty_tpl);?>
">
         <ul>
   	  	   <li>
   	  	   	<!--  <label><font color=red>*</font>邮箱：</label>  -->
   	  	   	  <input type="text" name="email" id="email" placeholder="请输入邮箱账号">
   	  	   	  <span id="email_tips"></span>
   	  	   </li>
   	  	   
   	  	   <!--   <li  id="showgetcode">
   	  	 	  <label>&nbsp;</label> 
   	  	   	  <input type="button" value="发送验证码" name="inputgetcheck" onclick="clickyanzheng();" class="inputgetcheck" id="dosendbtn" time="0"> 
   	  	   </li> -->
   	  	   
   	  	    <li id="showinputcode">
   	  	   <!--	  <label><font color=red>*</font>验证码：</label>  -->
   	  	   	  <input type="text" name="phoneyan" id="phoneyan"placeholder="请输入邮箱验证码">
                 <input type="button" value="发送验证码" name="inputgetcheck" onclick="clickyanzheng();" class="inputgetcheck" id="dosendbtn" time="0"> 
   	  	   	  <span id="phoneyan_tips"></span>
   	  	   </li>
   	  	   
   	  	   
   	  	<!--  <div class="mem_regester_inputdiv">
   	  	   	  <label><font color=red>*</font>帐号：</label>  
   	  	   	  <input type="text" name="tname" id="tname" style="width:200px;">
   	  	   	  <span id="tname_tips"></span>
   	  	   </div>  -->
   	  	   
   	  	    <li>
   	  	  <!-- 	  <label><font color=red>*</font>登陆密码：</label>  -->
   	  	   	  <input type="password" name="pwd" id="pwd" placeholder="请输入密码">
   	  	   	  <span id="pwd_tips"></span>
   	  	   </li>
   	  	   
   	  	   
   	  	    <li>
   	  	  <!-- 	  <label><font color=red>*</font>确认密码：</label>  -->
   	  	   	  <input type="password" name="pwd2" id="pwd2" placeholder="请再次输入密码">
   	  	   	  <span id="pwd2_tips"></span>
   	  	   </li>
   	  	   <?php if ($_smarty_tpl->tpl_vars['allowedcode']->value==1){?>
   	  	    <li id="imgcode">
   	  	   	  <label><font color=red>*</font>验证码：</label>
   	  	   	  <input type="text"  name="Captcha" id="Captcha" style="width:100px;"><img src="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/getCaptcha"),$_smarty_tpl);?>
" id="captchaimg" style="height:30px;"><a href="javascript:freshcode();" >刷新图片</a>
   	  	   	  <span id="Captcha_tips"></span>
   	  	   </li> 
   	  	   <?php }?>
   	  	   <li>
   	  	  <!-- 	  <label>&nbsp;</label>  -->
   	  	      	<input name="reg[agree]" type="checkbox" checked="" disabled> 我接受<a target="_blank" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/single/show/xieyi"),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
服务条款和协议</a>
   	  	   </li>
   	  	   
   	  	    <li>
   	  	<!--   	  <label>&nbsp;</label>  -->
   	  	      <div class="button_new_regester login-button login-button">同意协议并注册</div>
   	  	   </li>
            </ul>
   	  	</form>
   	  </div> 
   </div>
    <ul class="right_btm_re">
   	   	
   	   	  <li class="apilogin">  
   	   	  	  <?php echo smarty_function_load_data(array('assign'=>"apiloginlist",'table'=>"otherlogin",'fileds'=>"*",'limit'=>"10"),$_smarty_tpl);?>
 
					    <?php if (count($_smarty_tpl->tpl_vars['apiloginlist']->value['list'])>0){?>
				 
						   <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['apiloginlist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
                      <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/linktest/logintype/".((string)$_smarty_tpl->tpl_vars['items']->value['loginname'])),$_smarty_tpl);?>
" target="_blank">
                         <img src="/upload/images/<?php echo $_smarty_tpl->tpl_vars['items']->value['loginname'];?>
.jpg">
                      </a> 
						   <?php } ?>
				 
					    <?php }?>
   	   	  	
   	     	</li>
   	     	<li class="apibottom">
   	     		已有帐户<a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/login"),$_smarty_tpl);?>
">立即登陆</a>
   	     	</li>
   	  </ul>
  
 </div>
 

 
 
 
 	 
 	<script>
   	     		 $('.rm_li li').hover(function(){
   	     		 	$(this).addClass('hover').siblings().removeClass('hover');
 	           });
   	     		</script>
<script type="text/javascript">
var regestercode = '<?php echo $_smarty_tpl->tpl_vars['regestercode']->value;?>
';
$('.login-button').click(function(){ 
	subform('<?php echo FUNC_function(array('type'=>'url','link'=>"/member/base"),$_smarty_tpl);?>
',$('#regForm'));
})
$(".hc_login_input").change(function(j){
		var v=$(this).val();
		var p=$(this).attr("name"); 
		switch(p){
		case "email":
			var patrn= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!patrn.exec(v)){ 
				 alert('邮箱格式错误'); 
			}else{ 
				$.ajax({
				type: "POST",
				url: "<?php echo FUNC_function(array('type'=>'url','link'=>"/member/checkemail/datatype/json"),$_smarty_tpl);?>
",
				dataType: "json",
				data: "uname=" + v,
				success: function(msg){     
					if(msg.error ==true){ 
						$('[name="email"]').val('');
						alert(msg.msg);
					 } 
					}
				});			
			}
		break;
		case "tname":
		 	var patrn=/[u4e00-u9fa5]/;  
			if(v == '' ||v == null){
			  alert('用户名不能为空'); 
			}else{
				$.ajax({
				type: "POST",
				url: "<?php echo FUNC_function(array('type'=>'url','link'=>"/member/checkname/datatype/json"),$_smarty_tpl);?>
",
				dataType: "json",
				data: "uname=" + v,
				success: function(msg){ 
					if(msg.error==true){ 
						$('[name="tname"]').val('');
						alert(msg.msg);
					  //alert('此用户名已注册过'); 
					 }
					}
				});	
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

</script> 
 

<div id="footer" style="display:none;">
	
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
</html><?php }} ?>