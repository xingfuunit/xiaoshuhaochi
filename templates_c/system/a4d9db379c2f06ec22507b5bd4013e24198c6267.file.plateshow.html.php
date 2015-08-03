<?php /* Smarty version Smarty-3.1.10, created on 2015-06-30 11:00:46
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/plateshow.html" */ ?>
<?php /*%%SmartyHeaderCode:213321082255891b566f0205-33823089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4d9db379c2f06ec22507b5bd4013e24198c6267' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/plateshow.html',
      1 => 1435633215,
      2 => 'file',
    ),
    'deb5544bf2aa036a3feb877ac215d97370a69382' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/site.html',
      1 => 1435553916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213321082255891b566f0205-33823089',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_55891b569e7414_98225120',
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
<?php if ($_valid && !is_callable('content_55891b569e7414_98225120')) {function content_55891b569e7414_98225120($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html> 
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title><?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
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
/public/css/platshow.css">

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
/public/wxsite/js/plateshop.js"></script> 
<script>
     var shopid = '<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['id'];?>
';
     $(function(){
            $(".member_center").on("click",function(){
           
                  window.location.href = siteurl+'/index.php?controller=wxsite&action=login&shopid='+shopid;
                         
          })
         $(".myorder").on("click",function(){
              window.location.href = siteurl+'/index.php?controller=wxsite&action=order';
          })
          $(".right_l_btn_right").on("click",function(){
               addonedish($(this).attr('data-id'),$(this).attr('data-shopid'),1,this);
          })
          $(".right_l_btn_left").on("click",function(){
               removeonedish($(this).attr('data-id'),$(this).attr('data-shopid'),1,this);
          })
     })
   
         
</script>


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
	 	 	
 <div class="top1_shop">
 	 <div style="width:50px;float:left;"><a href="#"><img  class="lazy"  src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/upload/shop/grey.gif" data-original="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shopinfo']->value['shoplogo'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['shoplogo']->value : $tmp);?>
" width="50px" height="50px"></a></div>
 	 <div style="padding-left:30px;float:left;height:50px;">
 	 	  <div class="topshopname">  <?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
</div>
 	 	  <div>
 	 	  	   <div class="MIL2Left" style="height:20px;line-height:20px;width:110px;">      
 	 	  	   	 <span class="Star_g " original-title="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['point'];?>
" style="margin:0px 0px 0px 0px;">
                             <span class="Star_y" style="width:<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['point']*20;?>
%;"></span>
             </span>
             <a href="javascript:;" style="line-height:15px;font-weight:normal;padding:0 2px;"><?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['point'];?>
.0</a>
             40
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
                        <li id="one4" class="" original-title="暂未开放，敬请期待！"><a href="javascript:;">店铺介绍</a></li>
                    </ul>
          </div>
 </div>

	 	   
	 	 </div>
	 </div>
</div> 
  -->
<div class="mmbg" <?php if (!empty($_smarty_tpl->tpl_vars['sitebk']->value)){?>style="background:url(<?php echo $_smarty_tpl->tpl_vars['sitebk']->value;?>
) repeat;"<?php }?>></div> 

  
<div class="hc_content">

	<div style="display:none;" class="basicinfo">
    <div class="b-img ">
             <img width="198" height="150" src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shopinfo']->value['shoplogo'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['shoplogo']->value : $tmp);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
">
   </div>
<div class="b-info "  >
<h2><?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
</h2>
<dl>
<dt>	<?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
?>
									  <?php if ($_smarty_tpl->tpl_vars['itat']->value['id']=='51'){?> 
									   
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
									            <?php echo $_smarty_tpl->tpl_vars['itdd']->value['name'];?>
,
									            <?php }?>
									          <?php } ?> 
									      <?php } ?> 
									  <?php }?>     
									<?php } ?> 
									
									<span class="rate">
<span class="">

<div class="hc_xinxin_div" > <span class="Star_g " original-title="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['point']*20;?>
" style="margin:0px 0px 0px 0px;"> <span class="Star_y" style="width:<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['point']*20;?>
%;"></span> </span> </div>

</span>
</span>
<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['point'];?>
.0分
									</dt>
									
									<dd class="rate-con">
</dd>

<dd class="rate-con">
<span class="rate">
<span class="rate-inner" style="width:0px"></span>
</span>
</dd>
</dl>
<dl style="margin-top:15px;">
<dt><i class="icon icon-time"></i>营业时间:&nbsp;</dt>
<dd>
<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['starttime'];?>

 
	<?php if ($_smarty_tpl->tpl_vars['shopopeninfo']->value['opentype']==3){?> 				                  
	<strong class="doing">接受预订</strong>
	<?php }elseif($_smarty_tpl->tpl_vars['shopopeninfo']->value['opentype']==2){?>
	<strong class="doing">[营业中]</strong>
	<?php }else{ ?>
	<strong class="doing">已打烊</strong>
	<?php }?>

</dd>
</dl>
<dl>
<dt><i class="icon icon-address"></i>商户地址:&nbsp;</dt>
<dd>
<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['address'];?>

</dd>
</dl>


</div>



</div>
<div style="clear:both;"></div>
 


	 
<div class="shopshow_content">
 <div class="goods_div">
	 <div style="display:none;" class="goodsh1"> 菜单<div class="changelisttype"><span class="wordli">&nbsp;&nbsp;</span><span class="imglion">&nbsp;&nbsp;</span></div>
	  </div>
<div class="pageheader">
	<ul>
		<li><a onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/shopshow/id/".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])),$_smarty_tpl);?>
');">外卖</a></li>
		<li><a onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/plateshow/id/".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id'])),$_smarty_tpl);?>
');">订位</a></li>
	</ul>
</div>
    
<div class="move_up">
     
</div>
  <ul class="goodsnav">
		  	   <!--<a href="#" class="on">所有</a>-->
    <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['goodstype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>  
   
  
       <li onclick="scollto('#typeid_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
')"><i></i><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</li>
     
   <?php } ?>  
  </ul>
  <ul class="goodslistimgtype" id="goodslist">
  	 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['cid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goodstype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['cid']->value = $_smarty_tpl->tpl_vars['items']->key;
?> 
  	  <li>
	  	   <h3 class="goodstypetitle" id="typeid_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</h3>
  	   <div class="goodstypelist">
  	   	  <ul>
  	   	  		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['mykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['mykey']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                            
		 <li id="gidli_<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['mykey']->value%3==1){?>middle<?php }?>">
		 <dl>
 	  <dt class="goodsimg">
 	     <img class="lazy" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/upload/shop/grey.gif" data-original="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['value']->value['img'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['shoplogo']->value : $tmp);?>
">
      </dt>
      <dd>
    <div class="goodsname"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</div>
    <div class="goodscost"><?php echo $_smarty_tpl->tpl_vars['value']->value['cost'];?>
元/份</div>
    <div style="display:none;" class="goodsbiaotian">&nbsp;
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
"/>
<?php }?> 
<?php } ?> 

	  	    </div>
	  	    <div style="display:none;" class="goodsscore">
<span class="Star_g " original-title="<?php echo $_smarty_tpl->tpl_vars['value']->value['point'];?>
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
   
<div style="display:none;" class="goodstj">
售<font class="fontbold"><?php echo $_smarty_tpl->tpl_vars['value']->value['sellcount'];?>
</font>份,<font class="fontbold"><?php echo $_smarty_tpl->tpl_vars['value']->value['point'];?>
</font>点评
</div>
<ul class="goodsbtn righ_l_b_btn_moren" id="gid_<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
     <?php if ($_smarty_tpl->tpl_vars['value']->value['count']<1){?>
     <li class="sellout">已售完</li>
     <?php }else{ ?>
     <li class="onsell" shopid="<?php echo $_smarty_tpl->tpl_vars['value']->value['shopid'];?>
" goodsid="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">+</li>
     <?php }?>
</ul>
 <ul class="righ_l_b_btn_hover" style="display:none;">
    <li class="right_l_btn_left"   data-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" data-shopid="<?php echo $_smarty_tpl->tpl_vars['value']->value['shopid'];?>
">-</li>
    <li class="right_l_btn_nub" id="gshu_<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">0</li>
    <li class="right_l_btn_right"  id="gid_<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['value']->value['cost'];?>
" typeid="<?php echo $_smarty_tpl->tpl_vars['value']->value['typeid'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" data-shopid="<?php echo $_smarty_tpl->tpl_vars['value']->value['shopid'];?>
">+</li>
  </ul>
</dd>
</dl>
</li>
	   	  	 	<?php } ?>
	   	  	 	 
	   	  	</ul>
  	  	   </div>
		 	  	  	   <div style="clear:both;"></div> 
		 	  </li>	  
		 	  	  <?php } ?>  
		 	  	  
		 	  </ul>
		 </div> 
		<div class="goods_div" style="display:none;" >
		    <div class="pingjialist" id="det_commm">
		    </div>
	   </div>
		 <div class="goods_div" style="display:none;"  >
			     <div class="Message">
                                <form action="" id="mform" name="mform" method="POST">
                                <input type="hidden" name="msid" id="msid" value="40">
						                      	<ul>
                                	<li>
                                    	<div class="MInput">
                                        	<div class="MITop"><textarea id="MContent" name="mcon" onclick="InFocus(this);" onblur="outF(this);" style="color:rgb(92, 91, 91);" data="您的留言对其他会员都是很重要的参考">您的留言对其他会员都是很重要的参考</textarea></div>
                                            <div class="MIBottom"><a href="javascript:;" onclick="AddMessage()" id="msgbtn">提交留言</a> <span class="ImpNum">最多200个字符</span></div>
                                        </div>
                                    </li>
                                </ul>
                                </form>
                            </div>
            <div id="showaskid">
            	
            </div>
            <div style="clear:both;"></div>
	   </div>
	   <div class="goods_div" style="display:none;">
	   	  <div class="showshop_instr">
	   		<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['shopinfo']->value['intr_info']);?>
&nbsp;
	   	 </div>
	   </div>
<!--到店付款-->
<div class="pay_inshop">
    <div id="pay_prince"></div>
    <div id="hide_block" style="display:none">
        <input type="text" name="order_price" placeholder="请输入金额" id="order_price"/>
        <input type="button" value="去付款"/>
    </div>
    <ul id="pay_cover">
      <li><h3>请选择支付方式:</h3><span class="delete"></span></li>
      <li>
        <label>
        	<input type=radio name="order_way" checked="checked" value="wechat"/><span>微信支付</span>
        </label>
      </li>
      <li>
        <label>
        	<input type=radio name="order_way" value="alipay"/><span>支付宝</span>
        </label>
      </li><!--
      <li><span>请输入金额:</span><input type="text" name="order_price" id="order_price"/></li>-->
      <li><button id="go_to_pay"  onclick="pay_prince();">确认付款</button></li>
    </ul>
</div>
		 <!--  购物车-->
   	 <div style="display:none;" class="shopshow_cart">
   	 	    <div class="cart_title"><i></i>我的菜篮子</div>
   	 	    <div class="cartgoodslist">
   	 	    	 <ul>
   	 	    	 	<li>
   	 	    	 	  <div class="cart_one"><div class="cart_goodsname">商品名称范德萨减肥的了撒娇范德萨</div><i></i></div>
   	 	    	 	  <div class="cart_tow">
   	 	    	 	      <span class="cp_pre">-</span>
   	 	    	 	      <input type="text" readonly="readonly" class="cinput" value="4">
   	 	    	 	      <span class="cp_next">+</span>
   	 	    	 	      <span class="cp_much">￥255</span>
   	 	    	 	  </div>	
   	 	    	 	</li>
   	 	    	 	 
   	 	    	</ul>
   	 	    </div>
   	 	    <div class="cart_bottom">
   	 	    	  <div class="cart_tj">
   	 	    	  	 <div class="cart_sum"><label>商品总价</label><span>100.00元</span></div>
   	 	    	  	
   	 	    	  	</div>
   	 	    	   <input type="button" class="next bg" value="下一步" onclick="outdiv_cart()">
   	 	    </div>
	   </div>
	  <!--购物车-->
	  <div style="clear:both;"></div> 
	</div>
	
<div class="mealList_foot footer1" id="footer">
	
	 <!--   <a href="#" onclick="delshopcart()" class="b">清空</a> -->
	 <div>
	   <a class="member_center" shop_id="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['id'];?>
"><i class="nav_icon-user"></i>个人中心</a>
	   <a class="myorder" ><i class="nav_icon-menu"></i>我的订单</a>
	   <a class='a' onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/platecart/id/".((string)$_smarty_tpl->tpl_vars['id']->value)),$_smarty_tpl);?>
');"><i class="nav_icon-shopingcar"></i>购物车
	    <span class="total_count">0</span>
	   </a> 
	 </div> 
	 <div>
	   <span><i class="nav_icon-shopingcar"></i><big class="total_count"> 0 </big>
	   <a href="#" onclick="delshopcart()" class="b">清空</a>
	    </span>
	   <span>共计: ￥ <big id="total_money">0</big>元</span>
	   <span id="showlimit"></span>
	   <span onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/platecart/id/".((string)$_smarty_tpl->tpl_vars['id']->value)),$_smarty_tpl);?>
');">选好了</span>
	</div>    
</div>
	
	
	
	 <div style="clear:both;"></div>
	
	
	
	
</div> 
<script>
	
	var cartouthtml = '';
	cartouthtml +='<form id="dosubmit"><div class="position_top"><span class="title">点单预订</span><i class="close" onclick="close_pop(\'goosshow\')"></i></div>';
	cartouthtml +='<div class="goodsshow" ></div>';
  cartouthtml +='<div class="position_middel">';
	cartouthtml +='<div class="line_class"><label>消费时间:</label><select name="senddate" onchange="maketimenenu();">';
	<?php if ($_smarty_tpl->tpl_vars['shopinfo']->value['befortime']>0){?>
								   	    <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(time(), null, 0);?>   
								   	    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['shopinfo']->value['befortime']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>   
						cartouthtml +='<option value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['shownow']->value,"%Y-%m-%d");?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['shownow']->value,"%Y-%m-%d");?>
</option>'; 
								            <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable($_smarty_tpl->tpl_vars['shownow']->value+86400, null, 0);?>  
                          <?php endfor; endif; ?>  
								   	 <?php }else{ ?>
						cartouthtml +='<option value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
"><?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
</option>';
								   	  <?php }?> 
  var tempcontent = '';
  for(var i=1;i<11;i++){
  	tempcontent += '<option value="'+i+'">'+i+'人</option>';
  }
	cartouthtml+='</select><select id="orderTime" name="orderTime"></select></div>';
	cartouthtml +='<div class="line_class"><label>消费人数:</label><select name="personcount">'+tempcontent+'</select> </div>';
	cartouthtml +='<div class="line_class"><label>联系人:</label><input type="text" name="contactname" value="" placeholder="联系人姓名"> </div>';
	cartouthtml +='<div class="line_class"><label>联系电话:</label><input type="text" name="phone" id="phone" value="" ><span class="hc_order_lists_span" id="uphone" ></span> </div>';
  cartouthtml +='<div class="line_class" id="paytypeshow"><label>支付方式:</label><input type="radio" name="paytype" value="outpay" checked><span style="display:block;float:left;width:60px;">货到支付</span><input type="radio" name="paytype" value="weixin" ><span style="display:block;float:left;width:60px;">微信支付</span><input type="radio" name="paytype" value="alipy" ><span style="display:block;float:left;width:60px;">支付宝</span><span class="hc_order_lists_span" ></span> </div>';
	cartouthtml +='<div class="mutile_class"><label>备注</label><textarea name="content" placeholder="备注"></textarea></div>';
	cartouthtml +='<div class="line_class">  <input type="hidden" name="shopid" value="<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['id'];?>
"><input type="hidden" name="subtype" value=""><input type="button" class="next bg" value="确认预订" id="cfbtn" onclick="onGo()"></div>';
	cartouthtml +='</div> </form>';
  		 var starttime = '<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['starttime'];?>
'; 
	 var is_orderbefore=<?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['is_orderbefore'];?>
;
	 var nowdate = '<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
';
	 var nowtime = '<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %H:%M:%S");?>
';
	 	var submithtml = '<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/plateorder/datatype/json/random/@random@"),$_smarty_tpl);?>
';
	  var orderhtml = '<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/waitpay/orderid/@orderid@"),$_smarty_tpl);?>
';
	  <?php $_smarty_tpl->tpl_vars['yanchitime'] = new Smarty_variable(time()+$_smarty_tpl->tpl_vars['shopinfo']->value['maketime']*60, null, 0);?> 
	  var maketime = '<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['yanchitime']->value,"%Y-%m-%d %H:%M:%S");?>
';
	   	var submithtml = '<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/plateorder/datatype/json/random/@random@"),$_smarty_tpl);?>
';
	  var orderhtml = '<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/waitpay/orderid/@orderid@"),$_smarty_tpl);?>
';


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