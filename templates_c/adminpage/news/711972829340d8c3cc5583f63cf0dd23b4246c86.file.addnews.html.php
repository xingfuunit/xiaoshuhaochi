<?php /* Smarty version Smarty-3.1.10, created on 2015-06-29 15:27:01
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/news/adminpage/addnews.html" */ ?>
<?php /*%%SmartyHeaderCode:9232904185590e65155ac11-62546447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '711972829340d8c3cc5583f63cf0dd23b4246c86' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/news/adminpage/addnews.html',
      1 => 1435559851,
      2 => 'file',
    ),
    'e454e1ef514aa19f42b90368588b225ec4c320aa' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/adminpage/public/admin.html',
      1 => 1435562794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9232904185590e65155ac11-62546447',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5590e6516638a9_43036656',
  'variables' => 
  array (
    'tempdir' => 0,
    'siteurl' => 0,
    'is_static' => 0,
    'admininfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5590e6516638a9_43036656')) {function content_5590e6516638a9_43036656($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/modifier.date_format.php';
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

   <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/js/kindeditor/kindeditor.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/datepicker/WdatePicker.js" type="text/javascript" language="javascript"></script>
  
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
   	        	 	   <div class="showtop_t" id="positionname">编辑/添加新闻 </div>
   	        	 </div>  -->
   	        	 <div class="show_content_m_t2">
   	        	 	
   	        	 	


       <div style="width:98%;overflow-y:auto;white-space:nowrap;height:660px;">

          <div class="tags">

          <div id="tagscontent">
            <form method="post" name="form1" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/news/module/savenews"),$_smarty_tpl);?>
">
              <div>
                <table border="0" cellspacing="0" cellpadding="0" class="list" name="table" id="table" width="100%">
                  <tbody>

                  	<tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="ffffff" id="selecttrstart">
                      <td class="left">新闻标题</td>
                      <td><input type="text" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
" class="skey" style="width:150px;" ></td>
                    </tr>
                   <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="ffffff" id="selecttrstart">
                      <td class="left">seo关键字</td>
                      <td><input type="text" name="seo_key" id="seo_key" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['seo_key'];?>
" class="skey" style="width:150px;" ></td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="ffffff" id="selecttrstart">
                      <td class="left">seo描述</td>
                      <td><textarea name="seo_content"><?php echo $_smarty_tpl->tpl_vars['info']->value['seo_content'];?>
</textarea></td>
                    </tr>

                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff" id="selecttrend">
                      <td class="left">发布时间</td>
                      <td>
                       <input class="Wdate datefmt" type="text" name="addtime" id="addtime" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['addtime'],"%Y-%m-%d");?>
"  onFocus="WdatePicker({isShowClear:false,readOnly:true});" />

                        </td>
                    </tr>
                    <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="ffffff" id="selecttrstart">
                      <td class="left">排序</td>
                      <td><input type="text" name="orderid" id="orderid" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['orderid'];?>
" class="skey" style="width:50px;" ></td>
                    </tr>

                   <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="#ffffff">
                      <td class="left">新闻详细内容</td>
                      <td>
                      <div class='nop'><script>KE.show({id:'content',allowFileManager : true,imageUploadJson:'<?php echo FUNC_function(array('type'=>'url','link'=>"/other/saveupload"),$_smarty_tpl);?>
',fileManagerJson:'<?php echo FUNC_function(array('type'=>'url','link'=>"/other/saveupload"),$_smarty_tpl);?>
',items:['source','|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', '|', 'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold','italic', 'underline', 'removeformat', '|', 'image', 'advtable', 'hr','link', 'unlink']});</script><textarea name="content" id="content" style='width:100%; height:260px;'><?php echo $_smarty_tpl->tpl_vars['info']->value['content'];?>
</textarea></div>                      </td>

                    </tr>

                    <input type="hidden" name="uid" id="uid" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
" class="skey" style="width:150px;">
                    <input type="hidden" name="typeid" id="typeid" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['typeid'];?>
" class="skey" style="width:150px;">
                  </tbody>
                </table>
              </div>
              <div class="blank20"></div>
               <input type="submit" value="确认提交" class="button">
            </form>
          </div>
        </div>
        <div class="blank20"></div>

      </div>
      <div class="clear"></div>
    </div>
</div>
<script id="trgoodlist" type="text/html">
 <tr onmouseover="this.bgColor='#F5F5F5';" onmouseout="this.bgColor='ffffff';" bgcolor="ffffff" id="trtypeid<^%=typeid%^>">
     <td class="left"><^%=typeid%^>级分类</td>
     <td>
       <select name="typeid<^%=parent_id%^>" data="<^%=parent_id%^>" typeid="<^%=typeid%^>" onchange="onchangeselect(this);">
       <^%for(i = 0; i < list.length; i ++) {%^>
		      <^%if(list[i].parent_id == parent_id){%^>
                   <option value="<^%=list[i].id%^>" data="<^%=list[i].id%^>" pdata="<^%=list[i].parent_id%^>" ddata="<^%=list[i].type%^>"


                    <^%for(k = 0; k < selectid.length; k ++) {%^>
                    	<^%if(list[i].id  == selectid[k]){%^>
                    		selected
                    		<^%}%^>
                    <^%}%^>
                    >
                          <^%=list[i].name%^>
                   </option>
          <^%}%^>

       <^%}%^>
       </select>
    </td>
</tr>
</script>
<!--newmain 结束-->
<script>
	var typelist = <?php echo json_encode($_smarty_tpl->tpl_vars['typlist']->value);?>
;//所有分类信息
	var allids = <?php echo json_encode($_smarty_tpl->tpl_vars['allids']->value);?>
;
	$(function(){
		       makehtml(0,allids,1);
	});
	//selecttrend  selecttrstart
	function makehtml(parent_id,selectid,typeid){//构造一级分类
		  var vac = {list:typelist,parent_id:parent_id,selectid:selectid,typeid:typeid};
		  var htmls = template.render('trgoodlist', vac);
		  $('#selecttrend').before(htmls);
		  $("select[name='typeid"+parent_id+"']").find("option:selected").trigger('change');
		  //typeid<^%=parent_id%^>
	}
	function onchangeselect(obj){
		//构造下级typeid
		var typeid = Number($(obj).attr('typeid'))+1;
		removetr(typeid);//移除 已存在的tr
		//判断是否构造下级select
		var c = $(obj).find("option:selected").attr('ddata');
		if(c == 2){
			//$("#sel").attr("value",'-sel3');
			makehtml($(obj).find("option:selected").val(),allids,typeid);
		}else{
			//设置默认值
			$('#typeid').val($(obj).val());
		}
	}
	function removetr(typeid){
		if($('#trtypeid'+typeid).html() != undefined){
			 var c = Number(typeid)+1;
			  $('#trtypeid'+typeid).remove();
			 removetr(c);
		}
	}
</script>

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

$('#tagscontent td:last-child a img').click(function(){
  alert($(this).html());
});

 $('.show_page a').wrap('<li></li>');
 $('.show_page').find('.current').eq(0).parent().css({'background':'#f60'}); 
});
   
</script>
</body>
</html>





<?php }} ?>