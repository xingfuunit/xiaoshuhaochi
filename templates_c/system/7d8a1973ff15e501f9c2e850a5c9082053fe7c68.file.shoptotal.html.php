<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 14:40:12
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/order/template/shoptotal.html" */ ?>
<?php /*%%SmartyHeaderCode:234965695558d046ad956b5-33019564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d8a1973ff15e501f9c2e850a5c9082053fe7c68' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/order/template/shoptotal.html',
      1 => 1434531488,
      2 => 'file',
    ),
    '34c497866c78dbc09af78ddce0b250002f0d2e80' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/shopcenter.html',
      1 => 1435819148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '234965695558d046ad956b5-33019564',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558d046b02aeb7_01954411',
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
<?php if ($_valid && !is_callable('content_558d046b02aeb7_01954411')) {function content_558d046b02aeb7_01954411($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
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
  	var mynomenu='baseordertj';
  	</script>
 
<script>
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
    $(function(){
      
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
</script>
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





           
 <!---content right start--->
  <div class="conWaiSet fr">
    <div class="shopSetTop"> <span>订单统计</span> </div>
    <div class="orderTongji">
      <div class="sjser" style="font-weight:none;">商家订单统计查询</div>
      <form action="<?php echo FUNC_function(array('type'=>'url','link'=>"/order/shoptotal"),$_smarty_tpl);?>
" method="post" id="chafrom">  
      <div style="background:#311f16;">
      <span>年份 :
      <select name="year" onchange="selectyear();">
      	<option selected="selected" value="0">所有</option>
      	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['startyear']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = (int)10;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max']);
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
      	<option value="<?php echo $_smarty_tpl->tpl_vars['startyear']->value-$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>
"><?php echo $_smarty_tpl->tpl_vars['startyear']->value-$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>
</option>
        <?php endfor; endif; ?>
      	 
      </select>
      
      </span>
      <span id="showmonth"> 
      	
      	<!-- 月份：
      <select name="month" onchange="selectmonth">
      	<option selected="selected" value="">全年</option>
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
        <option value="">4</option>
      </select>  -->
      </span>
      <span id="showday">
      	<!--日：
      <select name="day">
      	<option selected="selected" value="">全年</option>
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
        <option value="">4</option>
      </select>
      -->
      </span>
      <span>订单数：<span class="ddnum"><?php echo $_smarty_tpl->tpl_vars['allnum']->value;?>
单</span></span>
       <span>交易额：<span class="ddnum"><?php echo $_smarty_tpl->tpl_vars['allsum']->value;?>
元</span></span>
       <span class="tingjiSer curbtn" id="dosubmit"></span>
       
       </div>
       </form>  
      <div class="cl"></div>
    </div>
    <div class="cl"></div>
    <div class="caidanSet"> 
      	
      <!---留言管理----->
    
        <div class="mes_box" style="display:block;" id="liuyan">        
            <table cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                 <th width="10%">时  间</th>
                 <th width="10%">订单数量</th>
                  <th width="10%">在线付款</th>
                   <th width="10%">线下支付</th>
                    <th width="10%">使用优惠券</th>
                     <th width="10%">店铺优惠</th>
                      <th width="10%">使用积分</th>
                       <th width="10%">打包费</th>
                        <th width="10%">配送费</th>
                         <th width="10%">商品总价</th>
                         
                </tr>
                <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</td>
                  <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['orderNum'])===null||$tmp==='' ? '0' : $tmp);?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['items']->value['online'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['items']->value['unline'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['items']->value['yhjcost'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['items']->value['cxcost'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['items']->value['score'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['items']->value['bagcost'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['items']->value['pscost'];?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['items']->value['goodscost'];?>
</td>
                </tr>
                <?php } ?>
             
              </tbody>
            </table>
         
        </div>
        
        
       
   
    </div>
  </div>
  <div class="cl"></div>
  
  <!---content right end---> 
 
 <script>
 	var nowyear = '<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
';
 	var nowmonth = '<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
'; 
$(function(){
 	 	$('#dosubmit').click(function(){
 	 		$('#chafrom').submit();
    });
    $("select[name='year']").val(nowyear);//find("option[text='"+nowyear+"']").attr("selected",true);
    selectyear();
}); 

function selectyear(){
   var nowyear = $("select[name='year']").find("option:selected").val(); 
   if(nowyear == 0){
      $('#showmonth').html('');
      $('#showday').html('');
   }else{
   	  var htmls='月份: <select name="month" > <option selected="selected" value="0">全年</option>';
   	  for(var i=1;i< 13;i++){
   	  	htmls+='<option value="'+i+'">'+i+'</option>';
   	  } 
      htmls+='</select>';
      $('#showmonth').html(htmls);
       $("select[name='month']").val(nowmonth);
     //  selectmonth();
   }
} 
function getDays(nowyear,nowmonth){ 
var y = nowyear;
var m = nowmonth;
if(m == 2){
return y % 4 == 0 ? 29 : 28;
}else if(m == 1 || m == 3 || m == 5 || m == 7 || m == 8 || m == 10 || m == 12){
return 31;
}else{
return 30;
}
}
 	</script>
 
 
 
 







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