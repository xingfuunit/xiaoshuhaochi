<?php /* Smarty version Smarty-3.1.10, created on 2015-05-20 16:32:42
         compiled from "D:\wmr\module\area\adminpage\adminarealist.html" */ ?>
<?php /*%%SmartyHeaderCode:13077555c46aa3cfb69-64812955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '698d0ed4d4b4bb099b6b12ec923b298f7aefd3bb' => 
    array (
      0 => 'D:\\wmr\\module\\area\\adminpage\\adminarealist.html',
      1 => 1409540850,
      2 => 'file',
    ),
    '3efda54965e3e8765657da369806285d301a1ec3' => 
    array (
      0 => 'D:\\wmr\\templates\\adminpage\\public\\admin.html',
      1 => 1411697363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13077555c46aa3cfb69-64812955',
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
  'unifunc' => 'content_555c46aa50f2e4_60632781',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555c46aa50f2e4_60632781')) {function content_555c46aa50f2e4_60632781($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\wmr\\lib\\Smarty\\libs\\plugins\\modifier.date_format.php';
?> <html xmlns="http://www.w3.org/1999/xhtml"><head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta http-equiv="Content-Language" content="zh-CN"> 
<meta content="all" name="robots"> 
<meta name="description" content=""> 
<meta content="" name="keywords"> 
<title>后台管理中心 </title>  
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
	if(screen.width > 1359){
		
		$('.newtop').css('width',screen.width);
		$('.newmain').css('width',screen.width);
		$('.newfoot').css('width',screen.width);
	}  
</script> 
</head> 
<body> 
<div id="cat_zhe" class="cart_zhe" style="display:none;"></div>
<div id="cat_tj" class="cart_out_cat" style="display:none;"> 数据提交中..</div>
<div class="newtop">
	  <div class="newadddiv">
	  <div class="newlogo">
	  	  <div class="imglogo"><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/admin/logo.png"> </a></div>
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
	<!-- 提示导航-->
   <div class="top_nav">
	    <div class="nav2 datainfo">
	    	<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
  
	    </div>
	    <div class="nav2 positioninfo" id="positionname2">
	    	网站首页
	    </div>
	    <div class="nav2 orderinfo">
	    	您有今天有0 个订单待审核
	    </div>
   </div>
   <!-- 主内容区-->
   <div class="newmain_all">
   	 <!-- 主内左区-->
   	 <div class="left_content">
   	 	   <!-- 主内左区用户信息-->
   	 	   <div class="userinfo">
   	 	   	   <div class="user_area">
   	 	   	   	      <div class="user_name">
   	 	   	   	      	<?php echo $_smarty_tpl->tpl_vars['admininfo']->value['username'];?>

   	 	   	   	      </div>
   	 	   	   	      <div class="content_url">
   	 	   	   	      	 <a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/member/adminloginout"),$_smarty_tpl);?>
" class="out">退出</a> 
   	 	   	   	      	 <a onClick="modifypwd();" href="#">修改密码</a>
   	 	   	   	      </div>
   	 	   	  </div>
   	 	   	  <div class="now_name" id="nowactioninfo">
   	 	   	    	网站首页
   	 	   	    </div>
   	 	   </div>
   	 	   <!-- 主内左区导航条-->
   	 	    <div class="left_nav">
   	 	    	  <ul> 
   	 	    	  	
   	 	    	  	
   	 	    	  	 <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tempdir']->value)."/public/admin_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   	 	    	 
   	 	    	     <li style="text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
" style="color:#0076cf;" target="_blank">返回网站首页</a></li>
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
   	        	 <div class="show_content_m_ti">
   	        	 	   <div class="showtop_t" id="positionname">区域列表</div>
   	        	 </div>
   	        	 <div class="show_content_m_t2">
   	        	 	
   	        	 	

   <div style="width:98%;overflow-y:auto;white-space:nowrap;"> 
           <div class="tags"> 
          <div id="tagscontent"> 
            <div id="con_one_1"> 
              <div class="table_td" style="margin-top:10px;"> 
              <form method="post" action="" onsubmit="return remind();"> 
                  <table border="0" cellspacing="2" cellpadding="4" class="list" name="table" id="table" width="100%"> 
                    <thead> 
                      <tr> 
                        <th align="center">区域名称</th>  
                        <th align="center">首字母</th> 
                        <th align="center">排序ID</th> 
                       <?php if (!empty($_smarty_tpl->tpl_vars['psset']->value)){?> 	
                         	<?php $_smarty_tpl->tpl_vars['pssetinfo'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['psset']->value), null, 0);?>
                         	<?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['locationtype']==1){?>
                         	<th align="center">标记地图位置</th>
                        <?php }?>
                        <?php }?>
                        <th align="center">操作</th> 
                      </tr> 
                    </thead>  
                     <tbody>
                     	   
                            
                    
                   <?php if (empty($_smarty_tpl->tpl_vars['psset']->value)){?> 	
                     	  请先网站配送设置
                   <?php }else{ ?>
                        	<?php $_smarty_tpl->tpl_vars['pssetinfo'] = new Smarty_variable(unserialize($_smarty_tpl->tpl_vars['psset']->value), null, 0);?>
                        	<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arealist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
                     	  <tr class="s_out" onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff" id="tr_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">  
                              <td align="left">
                              	  <div style="padding-left:<?php echo $_smarty_tpl->tpl_vars['items']->value['space']*30;?>
px;">
                              	  	<?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>

                              	  	 <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['pstype']==2){?>
                              	  	  <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?>
                              	      配送费:<input type="text" data="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" onchange="doupsetarea(this);" name="areain_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['areacost']->value[$_smarty_tpl->tpl_vars['items']->value['id']])===null||$tmp==='' ? 0 : $tmp);?>
" style="width:50px;">元 
                              	      <?php }?>
                                    	<?php }?> 
                                  </div>
                              </td> 
                              <td align="center"> <?php echo $_smarty_tpl->tpl_vars['items']->value['pin'];?>
 </td>  
                              <td align="center"><?php echo $_smarty_tpl->tpl_vars['items']->value['orderid'];?>
</td>   
                              <?php if ($_smarty_tpl->tpl_vars['pssetinfo']->value['locationtype']==1){?>
                         	        <td align="center"><a href="javascript:void(0);" onclick="biaoji(<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
);"><?php if ($_smarty_tpl->tpl_vars['items']->value['lng']==0){?>标记位置<?php }else{ ?>编辑位置<?php }?></a> <input type="checkbox" data="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" name="checkshow" <?php if ($_smarty_tpl->tpl_vars['items']->value['show']==1){?> checked<?php }?> value="1" onclick="doshowmap(this);">勾选后百度地图内查找</td>  
                              <?php }?>
                              <td align="center"><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/area/module/addarealist/id/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/admin/edit.jpg"></a>
                              	 <a onclick="return remind(this);" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/area/module/delarea/id/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])."/datatype/json"),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/admin/del.jpg"></a></td> 
                        </tr>
                    <?php } ?>  
                     	
                   <?php }?>
                    

                    </tbody> 

                  </table>

                <div class="blank20"></div> 

                </form>

                 
                <div class="blank20"></div>

              </div>

            </div>

          </div>

        </div>

        
  </div>
  <script> 
  	 
 </script>
 
</div> 
<script>
	function dosetarea(obj){
		 var panduan = $(obj).attr('checked');
	   var areaid = $(obj).attr('data');
	   if(panduan == true){
	   	var backmes = doupdata({'areaid':areaid,'type':'add'});
	   	if(backmes == true){
	   	 $('#showno_'+areaid).hide();
	   	 $('#showyes_'+areaid).show();
	   	}
	   	$(obj).attr('checked',false);
	   }else{
	   	var backmes = doupdata({'areaid':areaid,'type':'del'});
	   	if(backmes == true){
	   	  $('#showno_'+areaid).show();
	   	  $('#showyes_'+areaid).hide();
	   	}
	   	$(obj).attr('checked',true);
	   }
	}
	function doupsetarea(obj){
		 var areaid = $(obj).attr('data');
		doupdata({'areaid':areaid,'type':'updat','cost':$(obj).val()});
	}
	function doupdata(datas){
		var getinfo = true;
   	$.ajax({
     type: 'post',
     async:false,
     data:datas,
     url: '<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/area/module/adminareacost/datatype/json"),$_smarty_tpl);?>
', 
     dataType: 'json',success: function(content) {   
     	if(content.error == false){
     		artsucces('更新成功');
     	}else{
     		 getinfo = false;
     		if(content.error == true)
     		{
     			diaerror(content.msg); 
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) { 
    	getinfo = false;
    	diaerror('提交数据失败'); 
	    }
    });  
    return getinfo;
  } 
  	var mydialog;
	function biaoji(areaid){
    	mydialog = art.dialog.open(siteurl+'/index.php?controller=adminpage&action=area&module=baidumap&id='+areaid,{height:'550px',width:'850px'},false);
    	//http://www.hanwoba.com/index.php?controller=admin&action=baidumap&id=2#
	 	  mydialog.title('设置标记百度地址位置'); 
 }
 function closemydilog(){
    	mydialog.close();
 }
 function doshowmap(obj){
 	var types = 2;
 	if($(obj).attr("checked")==true)types = 1; 
  $.ajax({
     type: 'post',
     async:false,
     data:{'id':$(obj).attr('data'),'type':types},
     url: '<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/area/module/setshow/datatype/json"),$_smarty_tpl);?>
', 
     dataType: 'json',success: function(content) {   
     	if(content.error == false){
     		artsucces('更新成功');
     	}else{ 
     		if(content.error == true)
     		{
     			diaerror(content.msg); 
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) {  
    	diaerror('提交数据失败'); 
	    }
    });
  
 }
</script>
<!--newmain 结束-->

   	        	 	
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
 $('.show_page a').wrap('<li></li>');
 $('.show_page').find('.current').eq(0).parent().css({'background':'#f60'}); 
});
   
</script>
</body>
</html>





<?php }} ?>