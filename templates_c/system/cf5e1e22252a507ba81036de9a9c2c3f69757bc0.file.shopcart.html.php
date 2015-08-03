<?php /* Smarty version Smarty-3.1.10, created on 2015-06-25 18:08:42
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/shopcart.html" */ ?>
<?php /*%%SmartyHeaderCode:243175280558286ee487906-30280436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf5e1e22252a507ba81036de9a9c2c3f69757bc0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/shopcart.html',
      1 => 1435048595,
      2 => 'file',
    ),
    '172a78fbc96ceadf7e270433684a27900a1292ec' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/wxsite.html',
      1 => 1434531620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243175280558286ee487906-30280436',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558286ee62f103_24460793',
  'variables' => 
  array (
    'tempdir' => 0,
    'shopinfo' => 0,
    'siteurl' => 0,
    'is_static' => 0,
    'Taction' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558286ee62f103_24460793')) {function content_558286ee62f103_24460793($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">  
    
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<!--<title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>--> 
	<title><?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
</title> 
	 
	<link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/css/public.css">    

<link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/css/shopshow.css">

	<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/jquery.js"></script> 
  <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/public.js"></script>  
   <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/swipe.js"></script> 
    <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/iscroll.js"></script> 

  <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/wxshop.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/template.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/cart.js"></script>
<script>
    
    var starttime = "<?php echo $_smarty_tpl->tpl_vars['shoptime']->value['starttime'];?>
";
     var nowdate = '<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
';
	 var nowtime = '<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %H:%M:%S");?>
';

    var shopid = <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
;
    var cartbagcost =0;
    var cartpscost = 0;
    var  cartsum = 0;
    var cxcost = 0;
    var surecost = 0;
    var juanlist = <?php echo json_encode($_smarty_tpl->tpl_vars['juanlist']->value);?>
;
    var checknext = false;
    $(function(){
        getTimemenenu();
        $("#change_time").change(function(){
            maketimenenu();
            getTimemenenu();
        })
        maketimenenu();
            $(".back").click(function (){
           history.back();
    })
   
           if ("<?php echo $_smarty_tpl->tpl_vars['gustinfo']->value;?>
") {
            $(".save_button").hide();
            $("#username").attr("disabled", "disabled");
            $("#mobile").attr("disabled", "disabled");
            $("#addressdet").attr("disabled", "disabled");
        }
        $(".order_addnew").click(function(){
             $(".save_button").toggle();
             if ($(".save_button").is(":hidden")) {
            $("#username").attr("disabled", "disabled");
            $("#mobile").attr("disabled", "disabled");
            $("#addressdet").attr("disabled", "disabled");
             } else {
                    $("#username").attr("disabled", "");
            $("#mobile").attr("disabled", "");
            $("#addressdet").attr("disabled", "");
             }
        })
    	 freshcart();

    });
    function myyanchi(){

  		  checknext = false;
  	}
 </script>
  <script id="cartlist" type="text/html">
	  	  		 <li>
		 	     <img src="<^%=list.img%^>" class="order_img">
		 	     <h4><^%=list.name%^></h4>
		 	     <p class="order_jiage">¥<lable><^%=list.cost%^></lable></p>
		       <div class="order_btn">   <span class="order_btn_left"   data-id="<^%=list.id%^>" data-shopid="<^%=list.shopid%^>"></span> <span class="order_btn_nub"><^%=list.count%^></span><span class="order_btn_right"   data-id="<^%=list.id%^>" data-shopid="<^%=list.shopid%^>"></span> </div><div class="clear"></div></li>
 </script>

<script> 
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
	var taction = "<?php echo $_smarty_tpl->tpl_vars['Taction']->value;?>
"; 
</script>

<script>


/*	var myScroll;
function loaded() {
	myScroll = new iScroll('wrapper', {
		useTransform: false,
		bounce:false,
		onBeforeScrollStart: function (e) {
			var target = e.target;
			while (target.nodeType != 1) target = target.parentNode;

			if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
				e.preventDefault();
		}
	});
}*/
//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
//document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
</script>

 

 
</head>
<body> 
<div id="loading" style="display: none;"><div class="loadingbox"><section class="ffffbox"><div class="loadingpice"></div></section></div></div> 
<div id="hallist"> 
	
	
	


<section style="display:none;" class="cartchangetop" id="header">
  			<ul class="box_inline">
  				<li class="liwd50 redli" onclick="delbackshop('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/shopshow/id/".((string)$_smarty_tpl->tpl_vars['id']->value)),$_smarty_tpl);?>
');">
  					 重新点餐
  			  </li>
  				<li class="liwd50" onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/shopshow/id/".((string)$_smarty_tpl->tpl_vars['id']->value)),$_smarty_tpl);?>
');">
  					 再加点
  			  </li>
  			</ul>
 </section>
 <ul class="order_top">
   <li class="back"><span></span>返回</li>
   <li>提交订单</li>
 </ul>

	 <div id="wrapper">
	<div id="scroller">

	<!--菜品列表-->
  <div class="order">
  <h3 class="order_header">
      <span class="header_1"></span>我的订单
      <a href="#" onclick="delshopcart()" class="b">清空购物车</a>
   <!-- <select name="DeliveryTime" id="DeliveryTime" class="mFlex1">
          <option value="0">选择用餐时间</option>
            <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['timelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['items']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value;?>
</option>
            <?php } ?>
    </select> -->

  </h3>

	<ul class="order_list" id="shocart">
		<!--
		 <li id="2302">
		 	     <img src="http://www.weitaotong.cn/Content/piclibrary/UserImg_916/840120140611170732040.jpg" class="order_img">
		 	     <h4>胡萝卜</h4>
		 	     <p class="order_jiage">¥<lable>1.5(3份起送)</lable></p>
		       <div class="order_btn">   <span class="order_btn_left"></span> <span class="order_btn_nub">1</span><span class="order_btn_right"></span> </div><div class="clear"></div></li>    -->
	</ul>
  <ul class="order_list" id="promotion">
  </ul>
		     	<p class="order_text">
            共 <label><big id="cart_count">0</big></label> 份，
            原价: ¥ <label><big id="cart_total">0</big>元</label>
            <!--,打包：￥<font id="bagcost">0</font>--><br/> 
            <span id="reel_cost_show" style="display:none;"> 优惠: ¥ <big id="cxcost">0</big>元 ，
            </span>运费: ¥ <big id="carriage">0</big>元，  
            应付: ¥ <big id="realcost">0</big>元
          </p>
  </div>
	<!--菜品结束-->
	<!--用户录入信息-->
  <div class="order_gap"></div>
  <div class="order">
  <h3 class="order_header"><span class="header_2"></span>配送地址<div class="order_addnew">+ 修改</div></h3>
	
  <ul class="order_feedback">
            <li><span>姓 名:</span><input  type="text"  name="username" id="username" <?php if (($_smarty_tpl->tpl_vars['gustinfo']->value)){?> value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['gustinfo']->value['username'])===null||$tmp==='' ? '' : $tmp);?>
"  <?php }else{ ?>value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['deaddress']->value['contactname'])===null||$tmp==='' ? '' : $tmp);?>
"  <?php }?> >
         <p id="errname" style=" display:none;">请输入姓名</p>
       </li>

       <li><span>电 话:</span><input type="text" name="mobile" id="mobile" <?php if (($_smarty_tpl->tpl_vars['gustinfo']->value)){?> value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['gustinfo']->value['mobile'])===null||$tmp==='' ? '' : $tmp);?>
" <?php }else{ ?> value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['deaddress']->value['phone'])===null||$tmp==='' ? '' : $tmp);?>
" <?php }?>>
         <p id="errphone" style=" display:none;">请输入联系电话</p>
       </li>
       <li><span>地 址:</span><input type="text"  name="addressdet" id="addressdet" <?php if (($_smarty_tpl->tpl_vars['gustinfo']->value)){?> value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['gustinfo']->value['addressdet'])===null||$tmp==='' ? '' : $tmp);?>
" <?php }else{ ?> value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['deaddress']->value['address'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['areainfo']->value : $tmp);?>
" <?php }?>  data="<?php echo $_smarty_tpl->tpl_vars['areainfo']->value;?>
">
         <p id="errsend2place" style=" display:none;">请输入收货地址/店内位置号</p>
       </li>

       <li class="save_button">
         <input type="submit" id='save_user_info' value="保 存" onclick="save_gust_address();">
       </li>

       <li style="display:none;">
       	<input type="hidden" name="jifen" id="jifen" value="0">
  			  	 <font id="jifenshuoming">未选择</font><span id="jifenchoice" onclick="doselectjifen('<?php echo $_smarty_tpl->tpl_vars['scoretocost']->value;?>
','<?php echo (($tmp = @$_smarty_tpl->tpl_vars['member']->value['score'])===null||$tmp==='' ? 0 : $tmp);?>
');">选择金额</span>
       </li>
       <li style="display:none;"><input type="hidden" name="juanid" id="juanid" value="0"><input type="hidden" name="juancost" id="juancost" value="0">
  			  	 <font id="juanshuoming">未选择</font><span id="youhuichoice" onclick="doselectjuan();">选择优惠券</span>
       </li>
       </ul>
    </div>
    <div class="order_gap"></div>
    <div class="order">
       <h3 class="order_header"><span class="header_2_2"></span>配送时间</h3>
       <div>
       请选择用餐时间:
          <select id="change_time" name="senddate">
                  <?php if ($_smarty_tpl->tpl_vars['shoptime']->value['befortime']>0){?>
                  <?php $_smarty_tpl->tpl_vars['shownow'] = new Smarty_variable(time(), null, 0);?>
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['shoptime']->value['befortime']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                  <option value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['now_time']->value,"%Y-%m-%d");?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['now_time']->value,"%Y-%m-%d");?>
</option>

                        <?php $_smarty_tpl->tpl_vars['now_time'] = new Smarty_variable($_smarty_tpl->tpl_vars['now_time']->value+86400, null, 0);?>
                      <?php endfor; endif; ?>
                 <?php }else{ ?>

                  <option value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['now_time']->value,"%Y-%m-%d");?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['now_time']->value,"%Y-%m-%d");?>
</option>


                  <?php }?>
          </select>
               <!-- <span id="orderTime" data="11:30:00">11:30-12:00</span>-->
                <select id="ordertime">                      
                 	<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['restime']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
  		    	<option style="display:none;" value="<?php echo $_smarty_tpl->tpl_vars['items']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value;?>
</option>
  		    	<?php } ?>   
                      </select>
              </div>
            <div><span>备 注:</span><input type="text" name="remark" id="remark"  onfocus="if(this.value==&quot;&quot;){this.value=&quot;&quot;};" onblur="if(this.value==&quot;&quot;){this.value=&quot;&quot;;};"/> </div>
    </div>
    <div class="order_gap"></div>
    <div class="order">
       <h3 class="order_header"><span class="header_3"></span>支付方式</h3>
       <ul class="order_pay">
  <!--     <li style="display:none;">
       <input style="display:none;" name="paytype" type="radio" value="outpay"></li>  -->

        <li>
          <label>
            <input name="paytype" type="radio" value="weixin" checked='checked'>微信支付
          </label>
        </li>

        <li>
          <label>
            <input name="paytype" type="radio" value="alipay">支付宝
          </label>
        </li>
        <!--<li>
          <label>
            <input name="paytype" type="radio" value="open_acout">账户余额支付
          </label>
        </li>-->
     <li>
        <?php if ($_smarty_tpl->tpl_vars['is_open']->value==1){?>
         <input class="next_btn" onclick="orderSubmit();" type="submit" value="确认下单" />
         <?php }else{ ?>
         <input class="next_btn" type="submit" value="停止下单" />
          <?php }?>
     </li>
   <!--    <li style="display:none;">
       	<select name="DeliveryTime" id="DeliveryTime" class="mFlex1">
       		<option value="0">选择送货时间</option>
  		    	<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['timelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
  		    	<option value="<?php echo $_smarty_tpl->tpl_vars['items']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value;?>
</option>
  		    	<?php } ?>
  		    	</select>
      </li>  -->
    </ul>
  </div>
</div>
</div>
   <!--用户录入信息结束-->



 <!--
 <div id="mask1">
	  </div>
	  <div id="popup1" class="popup1">
	  	 <div class="popu1top"><div style="margin-right:5px;text-align:right;"><span onclick="closeout();">×关闭</span></div></div>
	  	 <div class="popcontent" id="popcontent">



	  	 </div>
	  </div>

 </div>
</div>
<!--区域信息--

 <div id="footer" class="box_inline">
      <div class="home " onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/shoplist"),$_smarty_tpl);?>
');" href="#"><p>首页</p></div><div class="recommend " onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/index"),$_smarty_tpl);?>
');" href="#"><p>区域</p></div><div class="mine "  onclick="dolink('<?php echo FUNC_function(array('type'=>'url','link'=>"/wxsite/member/id/".((string)$_smarty_tpl->tpl_vars['id']->value)),$_smarty_tpl);?>
');" href="#"><p>我的</p></div>
</div>

 -->

 
  
  
</div>
 <script>
 	$(function(){  
 	   $('#loading').hide(); 
  });
  </script>
</body>
</html>
 <?php }} ?>