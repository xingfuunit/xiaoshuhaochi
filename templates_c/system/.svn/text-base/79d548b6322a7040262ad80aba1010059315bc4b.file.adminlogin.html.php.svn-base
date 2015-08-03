<?php /* Smarty version Smarty-3.1.10, created on 2015-05-21 13:49:03
         compiled from "/data/www/xshc/wmr/module/member/template/adminlogin.html" */ ?>
<?php /*%%SmartyHeaderCode:419246858555d71cf7ca153-31856854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79d548b6322a7040262ad80aba1010059315bc4b' => 
    array (
      0 => '/data/www/xshc/wmr/module/member/template/adminlogin.html',
      1 => 1408851250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '419246858555d71cf7ca153-31856854',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'siteurl' => 0,
    'tempdir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555d71cf80c353_85525171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d71cf80c353_85525171')) {function content_555d71cf80c353_85525171($_smarty_tpl) {?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理登录</title>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.js" type="text/javascript" language="javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/register.css"> 
</head>
<body>



<div class='signup_container'>

    <h1 class='signup_title'>用户登陆</h1>
    <img src='<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/people.png' id='admin'/>
    <div id="signup_forms" class="signup_forms clearfix">
            <form class="signup_form_form" id="signup_form" method="post" action="" >
                    <div class="form_row first_row">
                        <label for="signup_email">请输入用户名</label><div  id="signup_name_tip"></div>
                        <input type="text" name="signup_name" placeholder="请输入用户名" id="signup_name" data-required="required">
                    </div>
                    <div class="form_row">
                        <label for="signup_password">请输入密码</label><div  id="signup_password_tip"></div>
                        <input type="password" name="signup_password" placeholder="请输入密码" id="signup_password" data-required="required">
                    </div>
                    
           </form>
    </div>

    <div class="login-btn-set"><div class='rem'>记住我</div> <a href='javascript:loginin();' class='login-btn'></a></div>
    <p class='copyright'>版权所有 外卖科技有限公司 </p>
</div>

</body>

<script type="text/javascript">

$(function(){

    $('.rem').click(function(){
        $(this).toggleClass('selected');
    })
    $('#signup_name').focus(function(){
    	$('#signup_name_tip').removeClass();
     })
     $('#signup_password').focus(function(){
    	$('#signup_password_tip').removeClass();
     })
    $('#signup_select').click(function(){
        $('.form_row ul').show();
        event.cancelBubble = true;
    })

    $('#d').click(function(){
        $('.form_row ul').toggle();
        event.cancelBubble = true;
    })

    $('body').click(function(){
        $('.form_row ul').hide();
    })

    $('.form_row li').click(function(){
        var v  = $(this).text();
        $('#signup_select').val(v);
        $('.form_row ul').hide();
    })  
})
function loginin()
{
	var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/member/adminlogin/datatype/json"),$_smarty_tpl);?>
'; 
	 $.ajax({
     type: 'post',
     async:false,
     data:$('#signup_form').serialize(),
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	//alert(content.msg);
     	//signup_name_tip
     	if(content.error == false){ 
     		 window.location.href='<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/system/module/index"),$_smarty_tpl);?>
';
     		//diasucces('操作成功','');
     	}else{
     		if(content.error == true)
     		{
     			$('#'+content.msg).addClass('tip error'); 
     		}else{
     			alert(content); 
     		}
     	}
      // alert(content); 
		},
    error: function(content) {  
    	diaerror('数据获取失败'); 
	  }
   });  
}
</script>

</html><?php }} ?>