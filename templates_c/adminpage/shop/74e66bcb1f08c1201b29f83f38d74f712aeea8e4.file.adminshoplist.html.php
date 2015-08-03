<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 13:25:54
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/adminpage/adminshoplist.html" */ ?>
<?php /*%%SmartyHeaderCode:2010158978558cccd933b528-56571439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74e66bcb1f08c1201b29f83f38d74f712aeea8e4' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/adminpage/adminshoplist.html',
      1 => 1435304656,
      2 => 'file',
    ),
    'e454e1ef514aa19f42b90368588b225ec4c320aa' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/adminpage/public/admin.html',
      1 => 1435814546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2010158978558cccd933b528-56571439',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558cccd94b4165_96290765',
  'variables' => 
  array (
    'tempdir' => 0,
    'siteurl' => 0,
    'is_static' => 0,
    'admininfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558cccd94b4165_96290765')) {function content_558cccd94b4165_96290765($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
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
   	        	 	   <div class="showtop_t" id="positionname">店铺列表</div>
   	        	 </div>  -->
   	        	 <div class="show_content_m_t2">
   	        	 	
   	        	 	

      <div style="width:auto;overflow-x:hidden;overflow-y:auto">  
      	 
      	<div class="search">
      		 
            
            <div class="search_content">
            	 
            	 <form method="get" name="form1" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/shop/module/adminshoplist"),$_smarty_tpl);?>
">
            	   <input type="hidden" name="controller" value="adminpage">
            	   <input type="hidden" name="action" value="module">
            	   <input type="hidden" name="module" value="adminshoplist">
            	   <label>店铺名:</label>
            	   <input type="text" name="shopname" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['shopname']->value)===null||$tmp==='' ? '' : $tmp);?>
"> 
            	   <label>用户名:</label>
            	   <input type="text" name="username" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['username']->value)===null||$tmp==='' ? '' : $tmp);?>
">                 
                  <label>手机:</label>
            	   <input type="text" name="phone" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['phone']->value)===null||$tmp==='' ? '' : $tmp);?>
">    
            	  
            	    <input type="submit" value="查询" class="button">  
            	 </form>
            </div>       
        
      	</div>
      	
      	
           <div class="tags">

      	  
          <div id="tagscontent">

            <div id="con_one_1">

              <div class="table_td" style="margin-top:10px;">

              <form method="post" action="" onsubmit="return remind();"  id="delform">

                  <table border="0" cellspacing="0" cellpadding="0" class="list" name="table" id="table" width="100%">

                    <thead>

                      <tr>

                        <th width="60px"><input type="checkbox" id="chkall" name="chkall" onclick="checkall()"></th>

                        <th align="center">店铺名称</th>

                        <th align="center">会员名称</th> 

                        <th align="center">设置店铺标签</th> 
                        <th align="center">是否营业</th>
                       
                        <th align="center">佣金</th>
                        <th align="center">排序</th>
                        <th align="center">有效时间</th>
                        <th align="center">操作</th>

                      </tr>

                    </thead> 

                     <tbody>

                     <?php echo smarty_function_load_data(array('assign'=>"list",'table'=>"shop",'showpage'=>"true",'where'=>"is_pass='1' ".((string)$_smarty_tpl->tpl_vars['where']->value)),$_smarty_tpl);?>
 
                      <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?> 
                      <tr class="s_out" onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff"> 
                        <td align="center" ><input type="checkbox" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"></td> 
                        <td align="center"><?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
[<font color=red><?php echo $_smarty_tpl->tpl_vars['shoptype']->value[$_smarty_tpl->tpl_vars['items']->value['shoptype']];?>
</font>]</td> 
                        <td align="center"> 
                        	<?php echo smarty_function_load_data(array('assign'=>"userinfo",'table'=>"member",'type'=>"one",'where'=>"uid='".((string)$_smarty_tpl->tpl_vars['items']->value['uid'])."'",'fileds'=>"username"),$_smarty_tpl);?>
 
                          	<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['username'];?>
  
                        	</td> 
                        <td align="center">
                        <a onclick="starttask('<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
');" href="#">设置</a> &nbsp;&nbsp;<a onclick="setps('<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
');" href="#">通知方式</a></td>  
                        <td align="center"><?php if ($_smarty_tpl->tpl_vars['items']->value['is_open']==1){?>是<?php }else{ ?>否<?php }?></td> 
                   
                         <td align="center"><?php if ($_smarty_tpl->tpl_vars['items']->value['yjin']=='0'){?>默认比例<?php echo $_smarty_tpl->tpl_vars['yjin']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['items']->value['yjin'];?>
<?php }?><a onclick="setyjin('<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
','<?php echo $_smarty_tpl->tpl_vars['items']->value['yjin'];?>
','<?php echo $_smarty_tpl->tpl_vars['yjin']->value;?>
');" href="#">设置</a></td>
                        <td align="center"><input type="text" name="pxinput" data="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['items']->value['sort'];?>
" style="width:30px;padding:0px;"></td>
                        <td align="center"><a href="#" onclick="doshow('<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
','<?php echo intval(($_smarty_tpl->tpl_vars['items']->value['endtime']-time())/86400);?>
');"> <?php if ($_smarty_tpl->tpl_vars['items']->value['endtime']>0){?>    <?php echo intval(($_smarty_tpl->tpl_vars['items']->value['endtime']-time())/86400);?>
    <?php }else{ ?>设置 <?php }?></a></td>
                         <td align="center"><a class="join" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/shop/module/resetdefualt/shopid/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])),$_smarty_tpl);?>
" target="_blank">进入商家后台<!--<img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/admin/but.png">--></a></td> 
                      </tr> 
                       <?php } ?> 

                    </tbody> 

                  </table>

                <div class="blank20"></div>

                 
                </form>

                <div class="page_newc">
                 	     <div class="select_page">
                 	      
                 	     	
                 	     	
                 	     	</div>
                       <div class="show_page"><ul><?php echo $_smarty_tpl->tpl_vars['list']->value['pagecontent'];?>
</ul></div>
                 </div>

                <div class="blank20"></div>

              </div>

            </div>

          </div>

        </div>

        
  </div>
  
  
  
  
  
 
</div>  
<script>
	 	var dialogs ;
	 function starttask(shopid,shopname)
	 {
	 	 dialogs = art.dialog.open(siteurl+'/index.php?controller=adminpage&action=shop&module=shopbiaoqian&id='+shopid,{height:'300px',width:'500px'},false);
	 	 dialogs.title('编辑店铺'+shopname+'展示标签'); 
	 }
	 
function uploadsucess(linkurl){
 	dialogs.close(); 
 	window.location.reload(); 
}
function uploaderror(msg){
	 alert(msg); 
}
function setyjin(shopid,shopname,myongjin,defaultyj)
{
	var mytj = myongjin==0?defaultyj:myongjin;
  var	htmls = '<form method="post" id="subyj" action="#" style="text-align:center;"><table>';
	htmls += '<tbody><tr>';
	htmls += '<td height="50px">佣金比例:</td>';
	htmls += '<td> <input type="text" name="yjin" value="'+mytj+'" style="width:100px;"></td></tr>';
	htmls += '</tbody></table> ';
  htmls += '<input type="hidden" value="'+shopid+'" name="shopid"> ';
	htmls += '<input type="button" value="确认提交" class="button" id="buttonsubyj" ></form>';
  art.dialog({
    id: 'testID4',
    title:'设置'+shopname+'佣金',
    content: htmls
  });
} 
$('#buttonsubyj').live('click',function(){ 
	$.post('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/shop/module/savesetshopyjin/datatype/json"),$_smarty_tpl);?>
', $('#subyj').serialize() ,function (data, textStatus){  
			if(data.error == false){
     	  	diasucces('操作成功','');
     	}else{
     		if(data.error == true)
     		{
     			diaerror(data.msg); 
     		}else{
     			diaerror(data); 
     		}
     	} 
	 }, 'json'); 
});
$("input[name='pxinput']").live("change", function() {   
	$.post('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/shop/module/adminshoppx/datatype/json"),$_smarty_tpl);?>
', {'id':$(this).attr('data'),'pxid':$(this).val()},function (data, textStatus){  
			if(data.error == false){
     		diasucces('操作成功',newurl);
     	}else{
     		if(data.error == true)
     		{
     			diaerror(data.msg); 
     		}else{
     			diaerror(data); 
     		}
     	} 
	 }, 'json'); 
});
function doshow(shopid,shoptian){
var	htmls = '<form method="post" id="doshwoform" action="#" style="text-align:center;"><table>';
	htmls += '<tbody><tr>';
	htmls += '<td height="50px">有效天数:</td>';
	htmls += '<td> <input type="text" name="mysetclosetime" value="'+shoptian+'" style="width:100px;"></td></tr>';
	htmls += '</tbody></table> ';
  htmls += '<input type="hidden" value="'+shopid+'" name="shopid"> ';
	htmls += '<input type="button" value="确认提交" class="button" id="dosetclosetime" ></form>';
  art.dialog({
    id: 'testID3',
    title:'设置开店有效时间',
    content: htmls
  });
}
$('#dosetclosetime').live('click',function(){ 
	$.post('<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/shop/module/shopactivetime/datatype/json"),$_smarty_tpl);?>
', $('#doshwoform').serialize() ,function (data, textStatus){  
			if(data.error == false){
     		diasucces('操作成功','');
     	}else{
     		if(data.error == true)
     		{
     			diaerror(data.msg); 
     		}else{
     			diaerror(data); 
     		}
     	} 
	 }, 'json'); 
});
function setps(shopid,shopname)
{
	 	 dialogs = art.dialog.open(siteurl+'/index.php?controller=adminpage&action=shop&module=setnotice&shopid='+shopid);
	 	 dialogs.title('设置店铺'+shopname+'配送方式'); 
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