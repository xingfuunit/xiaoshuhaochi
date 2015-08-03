<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 12:49:24
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/weixin/template/wxmenu.html" */ ?>
<?php /*%%SmartyHeaderCode:284177385594b6cd69d765-15847801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2b1a32796c13f1e128bdf83c7648005f7afdca4' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/weixin/template/wxmenu.html',
      1 => 1435812562,
      2 => 'file',
    ),
    '34c497866c78dbc09af78ddce0b250002f0d2e80' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/shopcenter.html',
      1 => 1435811851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '284177385594b6cd69d765-15847801',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5594b6cd864884_87559784',
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
<?php if ($_valid && !is_callable('content_5594b6cd864884_87559784')) {function content_5594b6cd864884_87559784($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
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
/public/js/template.min.js" type="text/javascript" language="javascript"></script>
 <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/plugins/iframeTools.js"></script>

<script>
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
    $(function(){

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





           

 <!---content right start-->
  <div class="conWaiSet fr">
    <div class="shopSetTop"> <span>微信管理</span> </div>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tempdir']->value)."/weixin/weixinmenu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="cl"></div>

  <form method="post" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/updatewxmenu/datatype/json"),$_smarty_tpl);?>
" onsubmit="return subform('<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/wxmenu"),$_smarty_tpl);?>
',this);">
    <div class="caidanSet">
      <table border="0" cellspacing="0" cellpadding="10" class="list" name="table" id="table" width="100%">
        <thead>
          <tr>
            <td align="center">导航名</td>
            <td align="center">菜单类型</td>
            <td align="center">内容</td>
            <td align="center">排序</td>
            <td align="center">操作</td>
          </tr>
        </thead>
        <tbody id="type">
        </tbody>
      </table>
      <div class="blank20"></div>
      <ul>
        <li>
          <input type="submit" name="button" id="button" value="上传菜单数据" class='button'> 
        </li>
        <li>
          <input type="button" name="button" id="typebutton" value="添加菜单" onclick="addwxmenu();" class="button"/>
        </li>
        <li>
          说明：如果菜单为1级菜时并且包含二级菜单 ，此菜单定义的操作将失效;
        </li>
      </ul>
      <!--<input type="submit" name="button" id="button" value="上传菜单数据" class='button'>
      <input type="button" name="button" id="typebutton" value="添加菜单" onclick="addwxmenu();" class="button" /><span style="color:#fff;margin-left:30px">说明：如果菜单为1级菜时并且包含二级菜单 ，此菜单定义的操作将失效;</span>-->
    </div>
  </form>
</div>



<script>
  var wxmenu = <?php echo json_encode($_smarty_tpl->tpl_vars['wxmenu']->value);?>
;
  var dialogs ;
  $(function(){
     $.each(wxmenu, function(i,val){
        if(val.parent_id == 0){
           var htmls = template.render('shoplist', {list:val});
           $('#type').append(htmls);
            $.each(wxmenu, function(k,cal){
              if(val.id == cal.parent_id){
                 var htmls = template.render('shoplist', {list:cal});
                $('#type').append(htmls);
               }
            });
        }
     });
  });
  function addwxmenu(){
    var htmls = template.render('addwx', {list:'',menulist:wxmenu});
    dialogs = art.dialog({
       id: 'fdstestid',
       title:'添加菜单',
       content:htmls
    });
     //设置显示与否
     var checkvalue = $("input[name='types']:checked").val();
     if(checkvalue == 'click'){
        $('#valuestr').hide();
        $('#textareatr').show();
     }
  }
  $('input[name="types"]').live("click", function() {
       var checkvalue = $("input[name='types']:checked").val();
      if(checkvalue == 'click'){
        $('#valuestr').hide();
        $('#textareatr').show();
       }else{
       $('#valuestr').show();
        $('#textareatr').hide();
       }
  });
  $('input[name="msgtype"]').live("click", function() {
     var checkvalue = $("input[name='msgtype']:checked").val();
    //tx_input  news_input
     if(checkvalue == '1'){
         $('#tw_nb').hide();
         $('#tw_wb').show();
         $('#tw_btn').hide();
      }else{
         $('#tw_nb').show();
         $('#tw_wb').hide();
         $('#tw_btn').show();
      }
  });
  function editmenu(datas){
    var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/getwxmen/datatype/json/random/@random@"),$_smarty_tpl);?>
';
    $.ajax({
     type: 'post',//2个参数间是用,分割
     async:false,//如果是true将不能作为返回值使用
     data:{id:datas},//表单序列化  也可以{'username':'admin',password:'password1'},
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
     dataType: 'json',success: function(content) {   //datatype 可以是json html   data 3种
          //  content;//是返回的数据内容
          if(content.error ==  false){
             var htmls = template.render('addwx', {list:content.msg,menulist:wxmenu});
    dialogs = art.dialog({
       id: 'fdstestid',
       title:'编辑菜单',
       content:htmls
    });
          }else{
            alert(content.msg);
          }
     },
    error: function(content) {
          // 提交失败
          alert('获取失败');
    }
    });
  }
  function editinfo(datas){
    var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/getwxmen/datatype/json/random/@random@"),$_smarty_tpl);?>
';
    $.ajax({
     type: 'post',//2个参数间是用,分割
     async:false,//如果是true将不能作为返回值使用
     data:{id:datas},//表单序列化  也可以{'username':'admin',password:'password1'},
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)),
     dataType: 'json',success: function(content) {   //datatype 可以是json html   data 3种
          //  content;//是返回的数据内容
          if(content.error ==  false){

              if(content.msg.type=='view'){
               var htmls = template.render('editcinfo', {list:content.msg,menulist:wxmenu});
               dialogs = art.dialog({
                  id: 'fdstestid',
                  title:'编辑超连接地址',
                  content:htmls
                });
              }else{//
                var htmls = template.render('editotherc', {list:content.msg,menulist:wxmenu});
               dialogs = art.dialog({
                  id: 'fdstestid',
                  title:'编辑内容',
                  content:htmls
                });
              }
          }else{
            alert(content.msg);
          }
     },
    error: function(content) {
          // 提交失败
          alert('获取失败');
    }
    });
  }
  function addtwnr(){

      var htmls = template.render('tw_nblist_s', {});
       $('#tw_nblist').append(htmls);
    }
  function trremove(obj){
    $(obj).parent().parent().parent().remove();
  }
</script>

<script id="tw_nblist_s" type="text/html">
 <table style="border-top:1px solid #c4d9e9;border-bottom:1px solid #c4d9e9;width:300px;"">
         <tr><td style="height:30px;width:30%;"> 标题 </td><td> <input type="text" name="biaoti[]" value="" class="skey" style="width:150px;">  </td>          </tr>
        <tr><td> 描述 </td><td> <textarea name="miaoshu[]"  style="width:200px;height:100px;"></textarea>  </td>          </tr>
         <tr><td> 图片 </td><td> <input type="text" name="tupian[]" value="" class="skey" style="width:150px;">   <input type="button" name="shangc" value="上传" onclick="uploads(this);" > </td>       </tr>
        <tr><td style="height:30px;"> 连接 </td><td> <input type="text" name="lianjie[]" value="" class="skey" style="width:150px;">  <a href="javascript:void(0);" onclick="trremove(this);" >移除</a> </td>        </tr>
       </table>
 </script>




<script id="shoplist" type="text/html">
  <tr class="s_out">
                        <td align="center" style="padding-left:10px;">
                        <^%if(list.parent_id > 0){%^>&nbsp;&nbsp;&nbsp;&nbsp; <^%}%^> <^%=list.name%^>
                        </td>
                        <td align="center" style="padding-left:10px;">
                            <^%if(list.type=='view') {%^>跳转连接<^%}else{%^>回复信息<^%}%^>
                        </td>
                        <td align="center" style="padding-left:10px;">
                              <^%if(list.type=='view') {%^>  <a onclick="editinfo(<^%=list.id%^>);" href="javascript:void(0);">编辑连接</a><^%}else{%^>  <a  onclick="editinfo(<^%=list.id%^>);" href="javascript:void(0);">编辑内容</a><^%}%^>
                        </td>
                         <td align="center" style="padding-left:10px;">
                          <^%=list.sort%^>
                        </td>
                        <td align="center">
                          <a onclick="editmenu(<^%=list.id%^>);" href="javascript:;">编辑</a>
                          <a onclick="return remind(this);" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/delwxmenu/id/<^%=list.id%^>/datatype/json"),$_smarty_tpl);?>
">删除</a>
                        </td>
     </tr>
</script>
<script id="addwx" type="text/html">
<form method="post" id="doshwoform" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/savewxmenu/datatype/json"),$_smarty_tpl);?>
" onsubmit="return subform('',this);" style="text-align:center;width:300px;">
    <table width=300px>
       <tr>
          <td style="width:30%;height:30px;">导航名:</td>
          <td style="width:80%">
              <input type="text" name="name" value="<^%=list.name%^>" class="skey" style="width:150px;">
          </td>
      </tr>
       <tr>
          <td style="width:30%;height:30px;">code:</td>
          <td style="width:80%">
              <input type="text" name="code" value="<^%=list.code%^>" class="skey" style="width:150px;">
          </td>
      </tr>
       <tr>
         <td style="width:30%;height:30px;">所在分类</td>
         <td>
            <select name="parent_id">
                <option value="0">顶级分类</option>
               <^%for(var i=0;i<menulist.length;i++){%^>
                   <^% if(menulist[i].parent_id == 0){%^>
                        <^%if(list.id != menulist[i].id){ %^>
                         <option value="<^%=menulist[i].id%^>"  <^%if(list.parent_id == menulist[i].id){ %^> selected <^%}%^> ><^%=menulist[i].name%^></option>
                           <^%}%^>
                  <^%}%^>
              <^%}%^>
            </select>
         </td>
       </tr>
      <tr>
         <td style="width:30%;height:30px;">类型</td>
         <td>
             <input type="radio" name="types" value="view" checked>跳转连接  <input type="radio" name="types" value="click" <^%if(list.type == 'click'){ %^> checked <^%}%^> >自定义信息
         </td>
     </tr>
      <tr>
         <td>排序ID</td>
         <td>
           <input type="text" name="sort" value="<^%=list.sort%^>" class="skey" style="width:30px;">
         </td>
       </tr>
       <tr><td style="width:30%;height:30px;">&nbsp; </td>
       <input type="hidden" name="id" value="<^%=list.id%^>">
       <td><input type="submit" value="确认提交" class="button"></td>
       </tr>
    </talbe>

</form>
</script>
<script id="editcinfo" type="text/html">
<form method="post" id="doshwoform" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/savewxmenucontent/datatype/json"),$_smarty_tpl);?>
" onsubmit="return subform('',this);" style="text-align:center;width:300px;">
 <table width=300px>
 <tr>
 <td style="width:30%;">
      地址： <input type="hidden" name="msgtype" value="0">
       </td>
   <td style="width:70%;"><input type="text" name="values" value="<^%=list.msglist.lj_link%^>" class="skey" style="width:200px;"> </td>
       </tr>
 <tr>
 <tr>
        <td style="width:30%;">连接描述:</td>
      <td style="width:70%;"><input type="text" name="miaoshu" value="<^%=list.msglist.lj_title%^>" class="skey" style="width:200px;"> </td>
       </tr>
 <tr>
  <td style="width:30%;">&nbsp;</td>
       <input type="hidden" name="id" value="<^%=list.id%^>">
       <td style="width:70%;"><input type="submit" value="确认提交" class="button"></td>
       </tr>
 </talbe>
</form>
</script>
<script id="editotherc" type="text/html">
<form method="post" id="doshwoform" action="<?php echo FUNC_function(array('type'=>'url','link'=>"/weixin/savewxmenucontent/datatype/json"),$_smarty_tpl);?>
" onsubmit="return subform('',this);" style="text-align:center;width:300px;">
 <table width=300px>
 <tr>
       <td >消息类型</td>
       <td><input type="radio" name="msgtype" value="1" checked>文本<input type="radio" name="msgtype" value="2" <^%if(list.msgtype ==2){ %^> checked <^%}%^>>图文</td>
       </tr>
<tr id="tw_wb" <^%if(list.msgtype !=1){ %^> style="display:none;" <^%}%^>>
   <td >文本内容</td>
    <td><textarea name="wb_content" style="width:200px;height:100px;"><^%if(list.msgtype ==1){ %^><^%=list.values%^>  <^%}%^> </textarea></td>
 </tr>
 <tr id="tw_nb" <^%if(list.msgtype ==1){ %^> style="display:none;" <^%}%^>>
   <td colspan="2" id="tw_nblist">
   <^%if(list.msgtype ==2){ %^>
         <^% var imglist = list.msglist%^>
          <^%for(i = 0; i < imglist.length; i ++) {%^>
       <table style="border-top:1px solid #c4d9e9;border-bottom:1px solid #c4d9e9;width:300px;"">
         <tr><td style="height:30px;width:30%;"> 标题 </td><td> <input type="text" name="biaoti[]" value="<^%=imglist[i].biaoti%^>" class="skey" style="width:150px;">  </td>          </tr>
        <tr><td> 描述 </td><td> <textarea name="miaoshu[]"  style="width:200px;height:100px;"> <^%=imglist[i].miaoshu%^> </textarea>  </td>          </tr>
         <tr><td> 图片 </td><td> <input type="text" name="tupian[]" value="<^%=imglist[i].tupian%^>" class="skey" style="width:150px;"> <input type="button" name="shangc" value="上传" onclick="uploads(this);" ></td>          </tr>
        <tr><td style="height:30px;"> 连接 </td><td> <input type="text" name="lianjie[]" value="<^%=imglist[i].lianjie%^>" class="skey" style="width:150px;"> <a href="javascript:void(0);" onclick="trremove(this);" >移除</a></td>          </tr>
       </table>
          <^%}%^>
    <^%}%^>
    </td>
 </tr>



 <tr id="tw_btn" <^%if(list.msgtype ==1){ %^> style="display:none;" <^%}%^>>
       <td >&nbsp;</td>
       <td style="height:40px;"><input type="button" name="name" value="添加图文组" onclick="addtwnr();" > </td>
       </tr>
 <tr><td style="width:30%;height:30px;">&nbsp; </td>
       <input type="hidden" name="id" value="<^%=list.id%^>">
       <td><input type="submit" value="确认提交" class="button"></td>
       </tr>
 </talbe>
</form>
</script>

<script>
  var updilog ;
 function uploads(obj){
    var findobj = $('input[name="shangc"]').index($(obj));
    findobj = Number(findobj)+1;
    var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/adminpage/other/module/adminupload/func/uploadsucess/obj/@obj@/randowm/@random@"),$_smarty_tpl);?>
';
    url = url.replace('@random@', 1+Math.round(Math.random()*1000)).replace('@obj@',findobj);
    updilog = art.dialog.open(url);
    updilog.title('上传图片');
 }
  function uploadsucess(flag,obj,linkurl){
   if(flag == false){
    var findobj = Number(obj)-1;
      var nwlink = siteurl+linkurl;
    $('input[name="tupian[]"]').eq(findobj).val(nwlink);
      updilog.close();
   }else{
     alert(linkurl);
   }
 }
 /*
 function uploadsucess(objdata,inkurl){
  var findobj = Number(objdata)-1;
  var nwlink = siteurl+inkurl;
  $('input[name="tupian[]"]').eq(findobj).val(nwlink);
  updilog.close();
}*/
function uploaderror(msg){
   alert(msg);
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