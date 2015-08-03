<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 16:28:42
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/ask/template/shopask.html" */ ?>
<?php /*%%SmartyHeaderCode:15375917135594b278c4f707-40616019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6aa0377e494ab76909225e594fe337f01e974f2a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/ask/template/shopask.html',
      1 => 1435825702,
      2 => 'file',
    ),
    '34c497866c78dbc09af78ddce0b250002f0d2e80' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/shopcenter.html',
      1 => 1435819148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15375917135594b278c4f707-40616019',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5594b278ee8c55_99109705',
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
<?php if ($_valid && !is_callable('content_5594b278ee8c55_99109705')) {function content_5594b278ee8c55_99109705($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
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

 <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/plugins/iframeTools.js"></script>
  <script>
  	  var mynomenu='baseask';
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





           
  <!--content right start-->
  <div class="conWaiSet fr">
    <div class="shopSetTop"> <span>留言/评价管理</span> </div>
    <div class="messageset">
      <div class="message_btn">
        <div class="liuyanGl messageCur fl" onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/ask/shopask"),$_smarty_tpl);?>
');"><span >留言管理</span></div>
        <div class="pingjiaGl fl" onclick="openlink('<?php echo FUNC_function(array('type'=>'url','link'=>"/order/comment"),$_smarty_tpl);?>
');"> <span >评价管理</span> </div>
      </div>
     
      <div class="cl"></div>
    </div>
    <div class="cl"></div>
    <div class="caidanSet"> 
      
      <!--留言管理-->
    
        <div class="mes_box" style="display:block;" id="liuyan">        
            <table cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <th width="40%"> 留言内容 </th>
                  <th width="20%"> 留言者/时间 </th>
                  <th width="20%"> 留言者/时间 </th>
                  <th width="20%"> 回复 </th>
                </tr>
                <?php echo smarty_function_load_data(array('assign'=>"list",'table'=>"ask",'showpage'=>"true",'where'=>"shopid = ".((string)$_smarty_tpl->tpl_vars['shopinfo']->value['id']),'orderby'=>"id desc"),$_smarty_tpl);?>
 
			           <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
		            	<?php echo smarty_function_load_data(array('assign'=>"userinfo",'table'=>"member",'type'=>"one",'where'=>"uid='".((string)$_smarty_tpl->tpl_vars['items']->value['uid'])."'",'fileds'=>"username"),$_smarty_tpl);?>
  
                
                <tr id="fav_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
                  <td><?php echo $_smarty_tpl->tpl_vars['items']->value['content'];?>
</td>
                  <td><?php if ($_smarty_tpl->tpl_vars['items']->value['uid']==0){?>游客<?php }else{ ?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['userinfo']->value['username'])===null||$tmp==='' ? '游客' : $tmp);?>
<?php }?><br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['addtime'],"%Y-%m-%d");?>
</td>
                  <td id="showreplya_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"> <?php if (!empty($_smarty_tpl->tpl_vars['items']->value['replycontent'])){?><?php echo $_smarty_tpl->tpl_vars['items']->value['replycontent'];?>
<br><?php echo $_smarty_tpl->tpl_vars['items']->value['replyname'];?>
:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['items']->value['replytime'],"%Y-%m-%d");?>

		                  	  <?php }else{ ?>未回复<?php }?>  </td>
                  <td id="reload<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
                  <?php if (empty($_smarty_tpl->tpl_vars['items']->value['replycontent'])){?> 	<span><a href="#reload<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" class="button hui" onclick="replay(this);" data="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">回复</a></span> <?php }?>
                  	<span> <a  onclick="javascript:;" data="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" class="button delask">删除</a></span></td>
                </tr> 
                 <?php } ?>
                 <tr>
                	<td align="right" colspan="4"><div class="show_page"><ul><?php echo $_smarty_tpl->tpl_vars['list']->value['pagecontent'];?>
</ul></div></td>
                </tr>
              </tbody>
            </table>
         
        </div>
        
        
        
        
   
    </div>
  </div>
  <div class="cl"></div>
  
  <!--content right end--> 
 
       	
       	
       	
       	
       
       	
       	
       	
 <input type="hidden" name="pageshow" id="pageshow" value="1" data="1">  
<script type="text/javascript">
 
$(".delask").live("click", function() {  
	if(confirm('确定操作吗？')){ 
	    var backinfo = ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/ask/delask/datatype/json"),$_smarty_tpl);?>
',{'id':$(this).attr('data')});
	  if(backinfo.flag == true)
	  { 
		  diaerror(backinfo.content); 
	  }else{
	  	 
	  	 $('#fav_'+$(this).attr('data')).remove();
	  	 artsucces('删除成功');  //delask
	 }  
	}
});
	 function replay(obj){
	 	var showcontent ='<div class="replayask" >';
        showcontent +='<table border=0 width="200">';
        showcontent +='<tbody>';
        showcontent +='<tr> ';
        showcontent +='<td style="border:none;text-align:left;"><textarea style="width:100%;height:100px;color:#ddd;" name="replycontent" id="replycontent" placeholder="回复内容">回复内容</textarea></td> </tr> '; 

        showcontent +='<tr>   <td style="border:none;"><a href="#reload'+$(obj).attr('data')+'" class="button fr saveImgInfo" style="margin-right:10px;" onclick="reply();">提交回复</a></td>';
        showcontent +='<input type="hidden" name="askid" id="askid" value="'+$(obj).attr('data')+'"> </tr>  </tbody> </table> </div> '; 
	 	art.dialog({
		id:'showchangdia',
		title:'回复客户咨询', 
    content:showcontent
  });  
}
 $('#replycontent').live("click", function() {   
 	 var checka = $(this).attr('placeholder');
 	 var checkb = $(this).val();
 	 if(checka == checkb){
 	    $(this).val('');
 	    $(this).css('color','#333');
 	 }
 });
 $('#replycontent').blur(function(){
 	     var checka = $(this).attr('placeholder');
 	    var checkb = $(this).val();
 	    if(checka == checkb){
 	      $(this).css('color','#ddd');
 	    }else{
 	       if(checkb == ''){
 	          $(this).val(checka);
 	           $(this).css('color','#ddd');
 	       }else{
 	       	$(this).css('color','#333');
 	      }
 	    }
 	    
  });

function reply(){ 
	var checka = $('#replycontent').val();
	var checkb = $('#replycontent').attr('placeholder');
	if(checka == checkb){
	   alert('请录入回复内容');
	   return false;
	}
  var backinfo = ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/ask/backask/datatype/json"),$_smarty_tpl);?>
',{'askbackid':$('#askid').val(),'askback':$('#replycontent').val()});
	  if(backinfo.flag == true)
	  { 
		 alert(backinfo.content);
	  }else{
	   
	  	 $('#showreplya_'+$('#askid').val()).html($('#replycontent').val());
	  	 $('#fav_'+$('#askid').val()).find('.hui').remove();
	  	 closeart();
	  	// artsucces('回复成功');  
	 }  
}



function closeart()
{
	art.dialog({id: 'showchangdia'}).close(); 
}
  
  
</script>
<script>
$(function(){ 
 $('.show_page a').wrap('<li></li>');
 $('.show_page').find('.current').eq(0).parent().css({'background':'#f60'}); 
});
   
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