<?php /* Smarty version Smarty-3.1.10, created on 2015-06-24 16:58:41
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/forgot.html" */ ?>
<?php /*%%SmartyHeaderCode:2139375783558a70bbc27dc9-89601592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cb7ff3855b9495f8ad1e04ff79e9d672ce6d99a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/forgot.html',
      1 => 1435136311,
      2 => 'file',
    ),
    '94c15e72c0d75a0e7a643019ff901b09d8719615' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/weixin.html',
      1 => 1434531620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2139375783558a70bbc27dc9-89601592',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558a70bbcea250_74885749',
  'variables' => 
  array (
    'tempdir' => 0,
    'siteurl' => 0,
    'is_static' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558a70bbcea250_74885749')) {function content_558a70bbcea250_74885749($_smarty_tpl) {?><!DOCTYPE html>
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
 
 <link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/html5/css/member.css">   


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
     var regestercode=2;
$(function(){

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
     </script>
       <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/regestercode.js"></script>
      

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
	 
 <div id="hallist"> 
  	<header><div class="return"></div>忘记密码</header>

  

    

  

  <div class="container" style="padding:0px;background:none;margin-top:0px;">

  	 
 <ul>
       <li>
       <input type="text" class="mobile_email_reg inputInp" id="phone" placeholder="手机号码"/>
       </li>
       <li>
          <input type="text" class="code inputInp" id="code" placeholder="验证码" />
          <input type="button" value="发送验证码" id="send_code" class="cursor_pointer send_code" onclick="clickyanzheng(regestercode);"/>
           <span class="cursor_pointer send_div" style="display:none;"></span>
           <div class="clear"></div>
       </li>
       <li><input type="password" class="password_reg inputInp"  placeholder="密码"/></li>
       <li><input type="password" class="repassword_reg inputInp" placeholder="重复密码"/></li>
   <!--    <li>
       <input type="checkbox">
         我已阅读并同意<a href="javascript:;">用户协议</a>
       </li>  -->
       <li><button class="userRister inputBtn" onclick="savepwd();">修改密码</button></li>
     </ul>

  	 
<script> 
	function savepwd(){  
	   $('#loading').show();
         var phone = $("#phone").val();
         var code = $("#code").val();
         var newpwd = $(".password_reg").val();
         var newpwd2 = $(".repassword_reg").val();
         var info = {'phone':phone,'code':code,'newpwd':newpwd,'newpwd2':newpwd2}
  	 	  var  url = siteurl+'/index.php?controller=member&action=saveuser&controlname=repwd&datatype=json&random=@random@' 
  	 	   $.ajax({ 
            url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
            dataType: "json", 
            data:info, 
            success:function(content) {  
            
             window.location.href= siteurl+'/index.php?controller=wxsite&action=login';
            	if(content.msg ==  false){
            		 window.location.href= siteurl+'/index.php?controller=wxsite&action=member&shoid='+shopid;
            	}else{ 
            	   Tmsg(content.msg);
                   $("#loading").hide();
              }
            	
            }, 
            error:function(){ 
            	$('#loading').toggle();

            } 
         });
		  
	}

</script>


   
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