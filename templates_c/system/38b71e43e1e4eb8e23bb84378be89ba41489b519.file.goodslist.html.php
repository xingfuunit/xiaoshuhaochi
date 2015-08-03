<?php /* Smarty version Smarty-3.1.10, created on 2015-07-02 14:54:21
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/template/goodslist.html" */ ?>
<?php /*%%SmartyHeaderCode:792444488558d045fa75f32-66403194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38b71e43e1e4eb8e23bb84378be89ba41489b519' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/shop/template/goodslist.html',
      1 => 1435815665,
      2 => 'file',
    ),
    '34c497866c78dbc09af78ddce0b250002f0d2e80' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/shopcenter.html',
      1 => 1435819148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '792444488558d045fa75f32-66403194',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_558d045fc56221_97575332',
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
<?php if ($_valid && !is_callable('content_558d045fc56221_97575332')) {function content_558d045fc56221_97575332($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/lib/Smarty/libs/plugins/function.load_data.php';
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
  	var mynomenu='basemenu';
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

            <div class="shopSetTop">
            	<span>菜单设置</span>
            </div>
            <div class="waimaiset">
              <div class="jbset <?php if ($_smarty_tpl->tpl_vars['is_goshop']->value==0){?>onset<?php }?>" onclick="javascript:window.location.href='<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/goodslist/"),$_smarty_tpl);?>
'">外卖</div>
              <div class="jbset <?php if ($_smarty_tpl->tpl_vars['is_goshop']->value==1){?>onset<?php }?>" onclick="javascript:window.location.href='<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/goodslist/is_goshop/1"),$_smarty_tpl);?>
'">堂吃</div>
            </div>
            <div class="orderset">
            	<ul class="addFenlei">
                <li>
                	<input type="text" id="shoptypename" name="shoptypename" value="" placeholder="请输入分类名称" />
                  <input type="hidden" id="is_goshop" name="is_goshop" value="<?php echo $_smarty_tpl->tpl_vars['is_goshop']->value;?>
" />
                </li>
                <li>
                 <input type="button" class="addButton curbtn" value="确定"  id="add_FoodType"/>
                </li>
              </ul>

                  <div class="cl"></div>
            </div>




             <div class="cl"></div>

                <form action="" method="post">
                 <div class="caidanSet">

                    <div class="caidanTitle">
                	<ul>
                		<?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
                    	<li  data="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"  dataname="<?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
" dataorder="<?php echo $_smarty_tpl->tpl_vars['items']->value['orderid'];?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</li>
                     <?php } ?>
                    </ul>
                    <div class="editGtype" id="editGtype">
                         <div class="delGDtype curbtn" ></div>
                         <div class="editGDtype curbtn"></div>

                    </div>
                </div>

                	<div class="div_orderList">

                        <div class="div_orderList_show">

                        <div class="orderList_show_goodli">
                            <div class="ord_goodname">
                                <span>食品名称</span>
                            </div>
                            <div class="ord_prime">
                               <span>原价（元）</span>
                            </div>
                            <div class="ord_price">
                                 <span>价格（元）</span>
                            </div>
                            <div class="ord_dbf">
                                 <span>打包费（元）</span>
                            </div>
                            <div class="ord_day_num">
                                 <span>每日数量</span>
                            </div>
                             <div class="order_caozuo">
                                 <span>操作</span>
                            </div>
                        </div>

                        <div class="cl"></div>

                      <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?>
                      <?php  $_smarty_tpl->tpl_vars['ite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['det']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ite']->key => $_smarty_tpl->tpl_vars['ite']->value){
$_smarty_tpl->tpl_vars['ite']->_loop = true;
?>
                    	<div class="order_list	listgoodsdet goodsdiv_<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" data="<?php echo $_smarty_tpl->tpl_vars['ite']->value['id'];?>
" id="goodstr_<?php echo $_smarty_tpl->tpl_vars['ite']->value['id'];?>
" >
                       		 <div class="order_goodlist">
                                <div class="cd_name">
                                    <p class="name"><?php echo $_smarty_tpl->tpl_vars['ite']->value['name'];?>
</p>
                                </div>
                                <div class="cd_prime">
                                    <p class="prime_cost"><?php echo $_smarty_tpl->tpl_vars['ite']->value['prime_cost'];?>
</p>
                                </div>
                                <div class="cd_price">
                                    <p class="cost"><?php echo $_smarty_tpl->tpl_vars['ite']->value['cost'];?>
</p>
                                </div>
                                <div class="cd_dbf">
                                     <p class="bagcost"><?php echo $_smarty_tpl->tpl_vars['ite']->value['bagcost'];?>
</p>
                                </div>
                                <div class="cd_dayNum">
                                     <p class="count"><?php echo $_smarty_tpl->tpl_vars['ite']->value['count'];?>
</p>
                                </div>
                                 <div class="cd_caozuo">
                                     <span style=" background:#27a9e3; padding:8px 5px; color:#fff;" class="curbtn" onclick="editgoods('<?php echo $_smarty_tpl->tpl_vars['ite']->value['id'];?>
');">编辑</span>
                                      <span style=" background:#ec7501; padding:8px 5px;color:#fff;" class="curbtn" onclick="delgoods('<?php echo $_smarty_tpl->tpl_vars['ite']->value['id'];?>
');">删除</span>
                                      <span style=" background:red; padding:8px 5px;color:#fff;" class="curbtn" onclick="showgoodsStock('<?php echo $_smarty_tpl->tpl_vars['ite']->value['id'];?>
');">库存</span>
                                </div>
                           </div>
                        </div>
                       <?php } ?>
                      <?php } ?>

                      <div class="order_list"  id="additem" style="display:none;">
                      	    <input type="hidden" name="adgoodstypeid" value="">
                       		 <div class="order_goodlist">
                                <div class="cd_name">
                                    <input style="width:50%;" type="text" value="" name="adgoodname" placeholder="商品名称"/>
                                </div>
                                <div class="cd_prime">
                                   <input  style="width:50%;" type="text" value="" name="adgoodprimecost" placeholder="商品原价"/>
                                </div>
                                <div class="cd_price">
                                   <input  style="width:50%;" type="text" value="" name="adgoodcost" placeholder="商品单价"/>
                                </div>
                                <div class="cd_dbf">
                                    <input  style="width:50%;" type="text" value="" name="adgoodbagcost" placeholder="打包费"/>
                                </div>
                                <div class="cd_dayNum">
                                    <input  style="width:50%;" type="text" value="" name="adgoodcount" placeholder="商品数量"/>
                                </div>
                                 <div class="cd_caozuo">
                                     <span style=" background:#27a9e3; padding:8px; color:#fff;" class="curbtn" id="saveaddgoods">保存</span>

                                </div>
                           </div>
                      </div>
                      <div class="order_list" style="background:#303337;">
                       		 <div class="order_goodlist">
                              <div class="cd_name" style=" border:none;">
                                  <span style=" background:#27a9e3; padding:10px; color:#fff;" class="curbtn" id="addgoods">添加菜品</span>
                              </div>

                           </div>

                      </div>

                        <div class="cl"></div>


                     </div>




                    </div>

       			 </div>


              </form>


        </div>
        <div class="cl"></div>





        <!---content right end--->













 <script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/artdialog/plugins/iframeTools.js"></script>
<script>
$(function(){
//删除分类
var checkisexti =  $('.caidanTitle').find('li').length;
if(checkisexti == 0){

  $('.caidanSet').hide();
}
$('.delGDtype').live('click',function(){
	if(confirm('确定删除商品操作吗？删除后将同时删除该分类下的所有商品')){
		var allobj = $(".caidanSet").find('li');
		var typeid = 0;
		for(var i=0;i< $(allobj).length;i++){
		   if($(allobj).eq(i).hasClass("cur") ==  true){
		      typeid = $(allobj).eq(i).attr('data');
		    }
		}

    myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/delgoodstype/datatype/json"),$_smarty_tpl);?>
',{'addressid':typeid});
  }
});
//编辑分类
$('.editGDtype').live('click',function(){
	var allobj = $(".caidanSet").find('li');
		var typeid = 0;
		var typename = '';
		var typeorder = '';
		for(var i=0;i< $(allobj).length;i++){
		   if($(allobj).eq(i).hasClass("cur") ==  true){
		      typeid = $(allobj).eq(i).attr('data');
		      typename = $(allobj).eq(i).attr('dataname');
		      typeorder = $(allobj).eq(i).attr('dataorder');
		    }
		}
	var	htmls = '<form method="post" id="doshwoform" action="#" style="text-align:center;"><table>';
	htmls += '<tbody><tr>';
	htmls += '<td height="50px">分类名称:</td>';
	htmls += '<td> <input type="text" name="newtypename" value="'+typename+'" style="width:100px;"></td></tr>';
	htmls +='<tr><td height="50px">排序ID:</td><td style="text-align:left;"> <input type="text" name="newtypeorderid" value="'+typeorder+'" style="width:50px;"></td></tr>'
	htmls += '</tbody></table> ';
  htmls += '<input type="hidden" value="'+typeid+'" name="newtypeid"> ';
	htmls += '<input type="button" value="确认提交" class="button" id="updategoodstype" ></form>';
  art.dialog({
    id: 'testID3',
    title:'保存店铺分类',
    content: htmls
  });


});
//保持编辑分类
$('#updategoodstype').live('click',function(){

	  showop('保存商品分类信息');
	   myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/editgoodstype/datatype/json"),$_smarty_tpl);?>
',{'what':'allinfo','name':$('input[name="newtypename"]').val(),'orderid':$('input[name="newtypeorderid"]').val(),'addressid':$('input[name="newtypeid"]').val()});
});

//添加商品分类
$("#add_FoodType").live("click", function() {
	if($('#shoptypename').val() == ''||$('#shoptypename').val() ==null){
		diaerror('分类不能空');
	}else{
		var mm = $('#shoptypename').val();
    var is_goshop = $('#is_goshop').val();
		$('#shoptypename').val('')
	   myajax('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/savegoodstype/datatype/json"),$_smarty_tpl);?>
',{'name':mm,'orderid':$(".caidanSet").find('li').length, 'is_goshop':is_goshop});
  }
});


//导航条切换
$(".caidanSet ul li").click(function(){
						$(this).addClass('cur').siblings().removeClass('cur');
					   var tempid = $(this).attr('data');
					   $('.listgoodsdet').hide();
					  $('.goodsdiv_'+tempid).show();
					  $('input[name="adgoodstypeid"]').val(tempid);
					  $('#additem').hide();
					  //获取坐标
				//
				var fleft = $('.caidanSet').offset().left;
				var zleft = $(this).offset().left;
				var resulte = Number(zleft) -Number(fleft);
				$('#editGtype').css('margin-left',resulte);



});
$(".caidanSet").find("li").eq(0).trigger("click");//设置默认第一个

//快捷编辑商品
$(".listgoodsdet p").live("click", function() {
	var is_save = $(this).hasClass('now_edit');
	var typename = $(this).attr('class');
	var doc = $(this).text();
	 if(is_save){

	 }else{
	 	$(this).addClass('now_edit');
	 	var goodsid = $(this).parent().parent().parent().attr('data');

	 	 $(this).html('<input style="width:60%;" type="text" value="'+doc+'" id="'+typename+goodsid+'" \/> <span class="curbtn" onclick="savegoodtxt(\''+goodsid+'\',\''+typename+'\');">保存<\/span>');
	 }
});

//显示添加商品
$('#addgoods').live('click',function(){
	$('#additem').show();
});
//提交添加商品
$('#saveaddgoods').live('click',function(){
	var typeid =   $('input[name="adgoodstypeid"]').val();
	var data1 = $('input[name="adgoodname"]').val();
	var data2 = $('input[name="adgoodcost"]').val();
	var data3 = $('input[name="adgoodbagcost"]').val();
	var data4 = $('input[name="adgoodcount"]').val();
  var data5 = $('input[name="adgoodprimecost"]').val();
  var data6 = $('#is_goshop').val();
	if(typeid == ''){
	 alert('请选择商品类型');
	 return false;
	}
	if(data1 == ''){
	  alert('请录入商品名称');
	  return false;
	}
		if(confirm('确定操作吗？')){
			 showop('保存商品信息');
	    var backinfo = ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/addgoods/datatype/json"),$_smarty_tpl);?>
',{'name':data1,'typeid':typeid,'prime_cost':data5,'cost':data2,'bagcost':data3,'count':data4, 'is_goshop':data6});
	    if(backinfo.flag == true)
	    {
		      hideop();
		     diaerror(backinfo.content);
	     }else{
	  	    hideop();
	  	    var htmldata = '<div class="order_list	listgoodsdet goodsdiv_'+backinfo.content.typeid+'" data="'+backinfo.content.id+'" id="goodstr_'+backinfo.content.id+'" >';
              htmldata += ' <div class="order_goodlist">';
              htmldata += '       <div class="cd_name">';
              htmldata += '          <p class="name">'+backinfo.content.name+'</p>';
              htmldata += '       </div>';
              htmldata += '      <div class="cd_prime">';
              htmldata += '          <p class="prime_cost">'+backinfo.content.prime_cost+'</p>  ';
              htmldata += '     </div>';
              htmldata += '      <div class="cd_price">';
              htmldata += '          <p class="cost">'+backinfo.content.cost+'</p>  ';
              htmldata += '     </div>';
              htmldata += '     <div class="cd_dbf">';
              htmldata += '          <p class="bagcost">'+backinfo.content.bagcost+'</p>  ';
              htmldata += '      </div>';
              htmldata += '      <div class="cd_dayNum">';
              htmldata += '           <p class="count">'+backinfo.content.count+'</p>   ';
              htmldata += '      </div>';
              htmldata += '       <div class="cd_caozuo">';
              htmldata += '          <span style=" background:#27a9e3; padding:8px; color:#fff;" class="curbtn" onclick="editgoods(\''+backinfo.content.id+'\');">编辑</span>';
              htmldata += '            <span style=" background:#ec7501; padding:8px; color:#fff;" class="curbtn" onclick="delgoods(\''+backinfo.content.id+'\');">删除</span>';
              htmldata += '            <span style="background:red; padding:8px 5px;color:#fff;" class="curbtn" onclick="showgoodsStock(\''+backinfo.content.id+'\');">库存</span>';
              htmldata += '      </div>';
              htmldata += '  </div> ';
              htmldata += '</div>';
          $('#additem').before(htmldata);
          $('input[name="adgoodname"]').val('');
	           $('input[name="adgoodcost"]').val('');
             $('input[name="adgoodprimecost"]').val('');
	             $('input[name="adgoodbagcost"]').val('');
	           $('input[name="adgoodcount"]').val('');
	            $('#additem').hide();
	  	    artsucces('保存成功');

	     }
		}

});
//删除商品




});

function savegoodtxt(goodsid,typename){
  	var values = $('#'+typename+goodsid).val();
	   showop('保存商品信息');
	  var backinfo = ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/updategoods/datatype/json"),$_smarty_tpl);?>
',{'controlname':typename,'goodsid':goodsid,'values':values});
	  if(backinfo.flag == true)
	  {
		  hideop();
		  diaerror(backinfo.content);
	  }else{
	  	 hideop();
	  	 $('#goodstr_'+goodsid).find('.'+typename).text(values);
	  	 $('#goodstr_'+goodsid).find('.'+typename).removeClass('now_edit');
	  	 artsucces('保存成功');
	 }
}

function delgoods(gid){
   if(confirm('确定删除该商品操作吗？')){
	var backinfo = ajaxback('<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/delgoods/datatype/json"),$_smarty_tpl);?>
',{'id':gid});
	    if(backinfo.flag == true)
	    {
		    hideop();
		  diaerror(backinfo.content);
	     }else{
	  	    hideop();
	  	    $('#goodstr_'+gid).remove();
	  	    artsucces('删除成功');
	     }
	}
}
var dialogs ;
function editgoods(gid){
		 dialogs = art.dialog.open(siteurl+'/index.php?controller=shop&action=goodsone&gid='+gid,{height:'500px',width:'700px'},false);
	 	 dialogs.title('编辑商品');
}
function refreshgoods(info){
	 dialogs.close();
	 $('#goodstr_'+info.id).remove();

	var htmldata = '<div class="order_list	listgoodsdet goodsdiv_'+info.typeid+'" data="'+info.id+'" id="goodstr_'+info.id+'" >';
              htmldata += ' <div class="order_goodlist">';
              htmldata += '       <div class="cd_name">';
              htmldata += '          <p class="name">'+info.name+'</p>';
              htmldata += '       </div>';
              htmldata += '      <div class="cd_prime">';
              htmldata += '          <p class="prime_cost">'+info.prime_cost+'</p>  ';
              htmldata += '     </div>';
              htmldata += '      <div class="cd_price">';
              htmldata += '          <p class="cost">'+info.cost+'</p>  ';
              htmldata += '     </div>';
              htmldata += '     <div class="cd_dbf">';
              htmldata += '          <p class="bagcost">'+info.bagcost+'</p>  ';
              htmldata += '      </div>';
              htmldata += '      <div class="cd_dayNum">';
              htmldata += '           <p class="count">'+info.count+'</p>   ';
              htmldata += '      </div>';
              htmldata += '       <div class="cd_caozuo">';
              htmldata += '          <span style=" background:#27a9e3; padding:8px; color:#fff;" class="curbtn" onclick="editgoods(\''+info.id+'\');">编辑</span>';
              htmldata += '            <span style=" background:#ec7501; padding:8px; color:#fff;" class="curbtn" onclick="delgoods(\''+info.id+'\');">删除</span>';
              htmldata += '      </div>';
              htmldata += '  </div> ';
              htmldata += '</div>';
          $('#additem').before(htmldata);
	var allobj = $(".caidanSet").find('li');
		var typeid = 0;
		for(var i=0;i< $(allobj).length;i++){
		   if($(allobj).eq(i).hasClass("cur") ==  true){
		      typeid = $(allobj).eq(i).attr('data');
		    }
		}
		if(typeid != info.typeid){
			$('#goodstr_'+info.id).hide();
		}



}
function showgoodsStock(gid){
    dialogs = art.dialog.open(siteurl+'/index.php?controller=shop&action=goodsstock&gid='+gid,{height:'500px',width:'700px'},false);
     dialogs.title('查看库存');
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