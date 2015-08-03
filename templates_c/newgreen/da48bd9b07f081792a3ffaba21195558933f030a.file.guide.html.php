<?php /* Smarty version Smarty-3.1.10, created on 2015-05-21 09:56:15
         compiled from "D:\wmr\templates\newgreen\site\guide.html" */ ?>
<?php /*%%SmartyHeaderCode:19465555d3b3f2ab049-55987887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da48bd9b07f081792a3ffaba21195558933f030a' => 
    array (
      0 => 'D:\\wmr\\templates\\newgreen\\site\\guide.html',
      1 => 1407806594,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19465555d3b3f2ab049-55987887',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sitename' => 0,
    'keywords' => 0,
    'description' => 0,
    'siteurl' => 0,
    'tempdir' => 0,
    'list' => 0,
    'items' => 0,
    'parent_ids' => 0,
    'cityname' => 0,
    'newaddress' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555d3b3f3cb7a9_92980480',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555d3b3f3cb7a9_92980480')) {function content_555d3b3f3cb7a9_92980480($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_data')) include 'D:\\wmr\\lib\\Smarty\\libs\\plugins\\function.load_data.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> 选择区域-<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" /> 
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/login_index.css" />
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquerynew.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/bootstrap.min.js" type="text/javascript" language="javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/jquery.cookie.js" type="text/javascript" language="javascript"></script>
 <script>
 	var siteurl = '<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
';
 	</script>
 	<!--[if lte IE 6]>
<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, input , a'); 
    </script>
 
<![endif]--> 
</head>
<body>
<div class="hc_index_login">
	<div class="hc_index_login_up">
		<div class="hc_index_login_cont  hc_index_login_cont_animate">
			<div style="height:1px;"></div>
			<div class="hc_index_login_logo">
				<div class="hc_index_login_logo_newImg"></div>
				<div class="hc_index_login_logo_newFont">
				
				</div>

 



			</div>

		</div>



	</div>

	<div class="hc_bg_line"></div>

	<div class="hc_index_login_down">

		<div class="hc_index_login_cont">

			<div class="hc_city_change">

				<div class="hc_city_change_div">

				
				<ul>
				
					 <?php echo smarty_function_load_data(array('assign'=>"list",'table'=>"area",'fileds'=>"*",'where'=>"parent_id = 0",'limit'=>100),$_smarty_tpl);?>
   
					 <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?> 
					<li class="li_area" area_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
">
             
            <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?><a href="<?php echo FUNC_function(array('type'=>'url','link'=>"/site/setlocationlink/areaid/".((string)$_smarty_tpl->tpl_vars['items']->value['id'])),$_smarty_tpl);?>
"><?php }?> 
						<div rel="tooltip" data-placement="bottom" data-original-title="即将开放" class="hc_city_change_div_yuan">

							<div class="hc_city_change_div_yuan_img" style="background: url('<?php echo $_smarty_tpl->tpl_vars['items']->value['imgurl'];?>
') no-repeat;"></div>

							<div class="hc_city_change_div_yuan_span area_name"><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</div>

						</div>
                <?php if (!in_array($_smarty_tpl->tpl_vars['items']->value['id'],$_smarty_tpl->tpl_vars['parent_ids']->value)){?></a><?php }?>
					</li>
					 <?php } ?> 
					 

					<div class="clear"></div>

				</ul>

				</div>

			</div>

		</div>
<script>
$(function(){

	var guidelength = $(".hc_index_login_cont .hc_city_change_div li").length;
	$(".hc_index_login_cont").css('width',Number(guidelength)*233);
	
});

</script>
		<div class="hc_login_inputs">

			<div class="hc_login_inputs_serch">

				<div class="dropup" style="position: relative;">

						<ul id="search_result_list" class="dropdown-menu" role="menu" aria-labelledby="dLabel">

						    

					  	</ul>

					</div>

				<div class="hc_login_inputs_serch_box">

					<input type="text2" class="gsearch_input" placeholder="输入写字楼查找" onkeydown="if(event.keyCode==13)beginSearch()" />

				</div>

				<div class="hc_login_inputs_serch_btn"></div>

				<div class="clear"></div>

			</div>

			


			<div class="hc_login_inputs_info">

				<div class="hc_login_inputs_login"></div>

				<div class="hc_login_inputs_addrs"></div>

			</div>

			
		</div>

	</div>



</div>



	<div class="hc_index_login_pupops_box hidden" id="popup_box_1">

		<div class="hc_index_login_pupops_box_top">

			<div class="hc_index_login_pupops_box_top_div">

				<div class="hc_login_pupops_head hc_login_pupops_head_left"><span class="city_n1 rt_2_city"><?php echo $_smarty_tpl->tpl_vars['cityname']->value;?>
</span></div>

				<div class="hc_login_pupops_head_img"></div>

				<div class="hc_login_pupops_head hc_login_pupops_head_left2"><span class="area_n1 hc_login_pupops_head_color"></span></div>

				

				<div class="hc_login_pupops_daX" id="rt2_city_area"></div>

				<div class="clear"></div>

			</div>

		</div>

		<div class="hc_index_login_pupops_box_midd">

			<div class="hc_login_pupopsBox_content" id="hc_login_pupopsBox_content1">

				<div class="hc_login_pupopsBox_content_index">

					<div class="hc_login_pupopsBox_content_index_div">

						<ul>
   
							<li class="hc_login_pupopsBox_content_index_div_li_hover"><a class="hc_pchoose hc_login_pupopsBox_content_index_div_li_a_hover" href="">全部</a></li>
							<li><a class="hc_pchoose" href="">A</a></li>
							<li><a class="hc_pchoose" href="">B</a></li>
							<div class="clear"></div>

						</ul>

					</div>
				</div>

				<div class="hc_PupopsLists">
					<div class="hc_PupopsLists_div" style="overflow-y: auto;">
						<ul>
							<div class="clear"></div>
						</ul>
					</div>
				</div>
			</div>

		</div>

		<div class="hc_index_login_pupops_box_btm"></div>

	</div>



	<div class="hc_index_login_pupops_box hidden" id="popup_box_2">

		<div class="hc_index_login_pupops_box_top">

			<div class="hc_index_login_pupops_box_top_div">

				<div class="hc_login_pupops_head hc_login_pupops_head_left"><span class="city_n1 rt_2_city"><?php echo $_smarty_tpl->tpl_vars['cityname']->value;?>
</span></div>

				<div class="hc_login_pupops_head_img"></div>

				<div class="hc_login_pupops_head hc_login_pupops_head_left2"><span class="area_n1 rt_2_area"></span></div>

				<div class="hc_login_pupops_head_img"></div>

				<div class="hc_login_pupops_head hc_login_pupops_head_left2"><span class="build_n1 hc_login_pupops_head_color"></span></div>

				<div class="hc_login_pupops_daX" id="rt2_box_dsc"></div>

				<div class="clear"></div>

			</div>

		</div>

		<div class="hc_index_login_pupops_box_midd">

			<div class="hc_login_pupopsBox_content" id="hc_login_pupopsBox_content2">

				<div class="hc_PupopsLists">

					<div class="hc_PupopsLists_div" style="overflow-y: auto;">

						<ul>

			

							<li style="border-right: 0; width:130px;"><a href="">莲花一村</a></li>



							<div class="clear"></div>



						</ul>



					</div>

				</div>



			</div>

		</div>

		<div class="hc_index_login_pupops_box_btm"></div>
	</div>

	<div class="hc_index_login_pupops_box hidden" id="popup_box_3">
		<div class="hc_index_login_pupops_box_top">
			<div class="hc_index_login_pupops_box_top_div">
				<div class="hc_login_pupops_head hc_login_pupops_head_left hc_login_pupops_head_color">我的地址</div>
				<div class="hc_login_pupops_daX" id="rt3_box_dsc"></div>
				<div class="clear"></div>
			</div>
		</div>

		<div class="hc_index_login_pupops_box_midd">

			<div class="hc_login_pupopsBox_content">

				<div class="hc_PupopsLists">

					<div class="hc_PupopsLists_div" style="overflow-y: auto;">

						<ul id="my_addr_list">

						</ul>
					</div>

				</div>
			</div>
		</div>

		<div class="hc_index_login_pupops_box_btm"></div>
	</div>
	
	<div class="loading_c hidden">
		<img alt="loading" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/loading43.gif" border="0" width="37px" height="37px" />
	</div>

	<ul class="hidden">
		<li id="loading_rt_li" style="margin-left:5px;"><img alt="loading" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/loading18.gif" width="16px" height="16px" />查找中，请稍候</li>
	</ul>

	<div class="mingshows">
		<div class="mingshows_a2" style="display:none;"></div>
		<div class="mingshows_t2" style="display:none;"></div>
	</div>
 
<script>
var $isFirstGuide = 0;
</script>


<script>

var returnFromIndex = 1;
function showText1(){
	$(".hc_index_login_logo_clouds").fadeIn("slow");
}

function showPrmoto1()
{
	$(".hc_index_login_logo_arrow").fadeIn("slow", showText1);
}

function showText2(){
	$(".mingshows_t2").fadeIn("slow");
}


function showPrmoto2()
{
	if ($isFirstGuide != 1)
	{
		return;
	}
	$(".mingshows_a2").fadeIn("slow", showText2);
}


$(document).ready(function(){
	if (document.all)
	{
		$(".hc_index_login_logo_clouds").css("background", "");
		$(".hc_index_login_logo_arrow").css("background", "");

		$(".mingshows_t2").css("background", "");
		$(".mingshows_a2").css("background", "");

	   
		
	}
	 showPrmoto1();
});


function HookFirstCharSel_Landmark()

{

	$(".sel_fa_lm").click(function(){

		var fchar = $(this).html();

		

		$(".lm_fa_active").removeClass("lm_fa_active");

		$(this).addClass("lm_fa_active");



		$("#item_list_ul_lm").html("");



		if (fchar == "全部")
		{
			$("#item_list_ul_lm").html( $("#item_list_ul_lm_data").html());
		}
		else
		{
			var index = 1;
			$("#item_list_ul_lm_data .pos_lmc_li").each(function(){
				if ($(this).attr("fa") == fchar)
				{
					var liv = $(this).closest("li").clone();
					if (index % 4 == 0) {
						liv.css("border-right", "0");

						liv.css("width", "130px");

					}

					else {

						liv.removeAttr("style");

					}

					index += 1;

					$("#item_list_ul_lm").append( liv );

				}

			});

		}

                 HookLanmarkMouseEvent();
	});
}

function HookFirstCharSel() 
{ 
	$(".sel_fa_dsc").click(function(){ 
		var fchar = $(this).html(); 
		$(".dsc_fa_active").removeClass("dsc_fa_active"); 
		$(this).addClass("dsc_fa_active"); 
		$("#item_list_ul_dsc").html(""); 
		if (fchar == "全部") 
		{ 
			$("#item_list_ul_dsc").html( $("#item_list_ul_dsc_data").html()); 
		} 
		else 
		{ 
			var index = 1; 
			$("#item_list_ul_dsc_data .pos_dsc_li").each(function(){ 
				if ($(this).attr("fa") == fchar) 
				{ 
					var liv = $(this).closest("li").clone(); 
					if (index % 4 == 0) { 
						liv.css("border-right", "0"); 
						liv.css("width", "130px"); 
					} 
					else { 
						liv.removeAttr("style"); 
					} 
					index += 1; 
					$("#item_list_ul_dsc").append( liv ); 
				} 
			}); 
		} 
		HookDscMouseEvent(); 
	});

} 
function beginSearch(){
	$(".gsearch_input").trigger("change");
}

$(".hc_index_login").click(function(){ 
	$(".dropup").removeClass("open"); 
});



$(".hc_login_inputs_serch_btn").click(function(){ 
	$(".gsearch_input").trigger("change"); 
	return false; 
});



$(".gsearch_input").change(function(){ 
	var s = $(this).val(); 
	if (s == "")
	{
		return;
	} 
	$(".dropup").addClass("open"); 
	$('#search_result_list').html(""); 
	var li_loading = $("#loading_rt_li").clone(); 
	$('#search_result_list').append(li_loading); 
	var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/site/searchposition"),$_smarty_tpl);?>
'; 
	$.post(url, {'position':s},function (data, textStatus){ 
			$('#search_result_list').html(data); 
		}, 'html');

});



$("#rt2_city_area").click(function(){
clearDiscId();
	$(".dropup").removeClass("open");  
	$('#popup_box_1').fadeOut(); 
	$('body').attr('class',''); 
	$('.modal-backdrop.fade.in').remove();
	$(".mingshows").css("display", "none"); 
	$(".li_area").removeClass('area_nclc'); 
	$(".li_area").removeClass('area_clc'); 
	$(".li_area").removeAttr('style');

});



$("#rt2_box_dsc").click(function(){ 
	clearDiscId();
	$('#popup_box_2').fadeOut(); 
	$('#popup_box_1').fadeIn(); 
});



$("#rt3_box_dsc").click(function(){

clearDiscId();
	$('#popup_box_3').fadeOut();

	$('body').attr('class','');

	$('.modal-backdrop.fade.in').remove();

	

});







function HookLanmarkMouseEvent()
{
    $(".pos_lmc_li").unbind();
	$(".pos_lmc_li").click(function(){

		var lm_id = $(this).attr('lm_id');

		var lm_name = $(this).html();

			$(".build_n1").html($(this).html()); 
		$('#popup_box_1').fadeOut(); 
		$('#popup_box_2').fadeIn();
		showPrmoto2(); 
		
		var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/site/searchdet"),$_smarty_tpl);?>
'; 
		var did = lm_id; 
		setDicId(did);  
		$('#popup_box_2 .hc_login_pupopsBox_content').html(""); 
		var loadingBox = $(".loading_c").clone(); 
		loadingBox.removeClass("hidden"); 
		$('#popup_box_2 .hc_login_pupopsBox_content').append(loadingBox); 
		$.post(url, {'id':did},function (data, textStatus){  
		  	 document.getElementById('hc_login_pupopsBox_content2').innerHTML=data; 
		  	  HookFirstCharSel_Landmark(); 
			  	HookLanmarkMouseEvent(); 
			}, 'html');

	});

}

function HookDscMouseEvent()
{

	$(".pos_dsc_li").unbind();

	$(".pos_dsc_li").click(function(){
 
     
		$(".build_n1").html($(this).html()); 
		$('#popup_box_1').fadeOut(); 
		$('#popup_box_2').fadeIn();
		showPrmoto2(); 
		
		var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/site/searchdet"),$_smarty_tpl);?>
'; 
		var did = $(this).attr('dsc_id'); 
		setDicId(did);  
		$('#popup_box_2 .hc_login_pupopsBox_content').html(""); 
		var loadingBox = $(".loading_c").clone(); 
		loadingBox.removeClass("hidden"); 
		$('#popup_box_2 .hc_login_pupopsBox_content').append(loadingBox); 
		$.post(url, {'id':did},function (data, textStatus){  
		  	 document.getElementById('hc_login_pupopsBox_content2').innerHTML=data; 
		  	  HookFirstCharSel_Landmark(); 
			  	HookLanmarkMouseEvent(); 
			}, 'html');

	});

}



function showPopupBox_Dsc()

{



}



$(".li_area").click(function(){
 
	var aid = $(this).attr('area_id'); 
	$(".area_n1").html($(this).find(".area_name").html()); 
	var pt = $(this).position();
	var mleft = pt.left;
	$(this).addClass("area_clc");
	//$(".li_area").removeClass("area_op");
	$(".li_area").addClass('area_nclc');
	$(this).removeClass("area_nclc");
	$(this).css("left", mleft.toString() + "px");
	$(".area_nclc").fadeOut();
	// animate end

	$(this).animate({left:"237.5px"},'normal' , function(){

	$('#popup_box_1').fadeIn();
	$('body').append('<div class="modal-backdrop fade in"></div>').attr('class','modal-open');
	var url = '<?php echo FUNC_function(array('type'=>'url','link'=>"/site/searchchild"),$_smarty_tpl);?>
'; 
	$('#popup_box_1 .hc_login_pupopsBox_content').html("");

	var loadingBox = $(".loading_c").clone();
	loadingBox.removeClass("hidden");

	$('#popup_box_1 .hc_login_pupopsBox_content').append(loadingBox);
	$.post(url, {'id':aid},function (data, textStatus){
		document.getElementById('hc_login_pupopsBox_content1').innerHTML=data;
		HookFirstCharSel();
		HookDscMouseEvent();

		if (returnFromIndex == 1)
		{
			var lastDscId = getDisId();
			if (lastDscId != -1)
			{
			 
				$('.pos_dsc_li').each(function(){
						if ($(this).attr('dsc_id') == lastDscId)
						{
							 
							$(this).trigger('click');
						}
					});
				 
			}
		}

	}, 'html');
}); 
 

});



$(".cityli").mouseout(function(){

	if (!bClicked)

	{

		$(this).addClass("city_op");

	}

	

});



$(".area_pic_fr").mouseenter(function(){

	$(this).find(".area_img_on").css("top", "0");

});



$(".area_pic_fr").mouseleave(function(){

	$(this).find(".area_img_on").css("top", "111px");

});

function clearDiscId()
{
	$.cookie('his_disc', null);
}

function setDicId(id)
{   
	$.cookie('his_disc', id, {expires:90});
}

function getDisId()
{
	var id = $.cookie('his_disc');  
	if (id != null && id !='null' && id != undefined)
	{
		return id;
	}
	else
	{ 
		return -1;
	}
}

function addHisttoryAddress(name, id){

	var newAddr = name.toString() + ":" + id.toString();

	var addrs = $.cookie('his_addrs');

	if (addrs != null) {

		var ar = addrs.split("|");

		ar.push(newAddr);

	}

	else {

		var ar = new Array();

		ar.push(newAddr);

	}



	var ss = ar.join("|");



	while (ar.length >  16) {

		ar.shift();

	}

	$.cookie('his_addrs', ss, {expires:90});
}



function getHistoryAddress(){

	$("#my_addr_list").html("");

	var arr = new Array();

	var addrs = $.cookie('his_addrs');

	if (addrs != null) {

		var ar = addrs.split("|");

		var index = 1;

		for(var i in ar){

    		var info = ar[i].split(":");

    		var addr_name = info[0];

    		var addr_id = info[1];



    		var a1 = $("<a></a>");

    		a1.html(addr_name);

    		var url = "/index.php?r=pos/set&lm_id="+addr_id.toString();

    		a1.attr("href", url);



    		var li1 = $("<li></li>");

    		li1.append(a1);



    		if (index % 4 == 0) {

					li1.css("border-right", "0");

					li1.css("width", "130px");

			}

			else {

					li1.removeAttr("style");

			}

			index += 1;



    		$("#my_addr_list").append(li1);

		}

	}

	

}



$(".hc_login_inputs_addrs").click(function(){

	$('#popup_box_3').fadeIn();

	$('body').append('<div class="modal-backdrop fade in"></div>').attr('class','modal-open');



	getHistoryAddress();

});



$(".hc_login_inputs_info_addrs_div").click(function(){

	$('#popup_box_3').fadeIn();

	$('body').append('<div class="modal-backdrop fade in"></div>').attr('class','modal-open');;



	getHistoryAddress();

});



$(".hc_login_inputs_login").click(function(){

	window.location.href = '<?php echo FUNC_function(array('type'=>'url','link'=>"/member/login"),$_smarty_tpl);?>
';  

}); 



$(".rt_2_city").click(function(){

	$('#popup_box_2').fadeOut();

	clearDiscId();
	$("#rt2_city_area").trigger("click");

});



$(".rt_2_area").click(function(){

	clearDiscId();
	$("#rt2_box_dsc").trigger("click");

});

</script>







<script type="text/javascript">



$(document).ready(function()

{

	var body_height = $(window).height(); //浏览器当前窗口可视区域高度

	if(body_height<=590){

		$('.hc_index_login_logo').css('margin-top','5px');

		$('.hc_index_login_logo').css('padding-bottom','25px');

	

	}else if(590<body_height&& body_height<= 640){

		$('.hc_index_login_logo').css('margin-top','15px');

		$('.hc_index_login_logo').css('padding-bottom','25px');

	}else if(640 < body_height && body_height <= 720){

		$('.hc_index_login_logo').css('margin-top','40px')

		$('.hc_index_login_logo').css('padding-bottom','45px');

	

	}else if(720 < body_height && body_height <= 840){

		$('.hc_index_login_logo').css('margin-top','80px');

	

	}else if(body_height>840){

		$('.hc_index_login_logo').css('margin-top','160px');

	

	}



})

</script>



<script type="text/javascript">
	$('.hc_city_change_div_yuan').click(function(){ 
		$('.hc_city_change_div_yuan').addClass('hc_city_change_div_yuan_filter');

	},function(){
		$('hc_city_change_div_yuan').removeClass('hc_city_change_div_yuan_filter');
	})
</script>

<script type="text/javascript">
//placeholder IE8
var _placeholderSupport = function() {
    var t = document.createElement("input");
    t.type = "text";
    return (typeof t.placeholder !== "undefined");
}();

window.onload = function() {
    var arrInputs = document.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var curInput = arrInputs[i];
        if (!curInput.type || curInput.type == "" || curInput.type == "text")
            HandlePlaceholder(curInput);
    }
};
 
function HandlePlaceholder(oTextbox) {
    if (!_placeholderSupport) {
        var curPlaceholder = oTextbox.getAttribute("placeholder");
        if (curPlaceholder && curPlaceholder.length > 0) {
            oTextbox.value = curPlaceholder;
            oTextbox.setAttribute("old_color", oTextbox.style.color);
            oTextbox.style.color = "#c0c0c0";
            oTextbox.onfocus = function() {
                this.style.color = this.getAttribute("old_color");
                if (this.value === curPlaceholder)
                    this.value = "";
            };
            oTextbox.onblur = function() {
                if (this.value === "") {
                    this.style.color = "#c0c0c0";
                    this.value = curPlaceholder;
                }
            }
        }
    }
}

$(document).ready(function(){
	if (returnFromIndex == 1)
	{
		var lastDscId = getDisId(); 
		if (lastDscId != -1)
		{
			/****  ***/
			for(var i=0;i<$('.li_area').length;i++)
			{
				 /*
				if($('.li_area').eq(i).attr('area_id')== "<?php echo $_smarty_tpl->tpl_vars['newaddress']->value['parent_id'];?>
")
				{
					$(".li_area").eq(i).trigger('click');
					break;
				} */
			}
			
		}
	}

	$(".hc_city_change_div_yuan").mouseenter(function(){
		 //$(this).tooltip('show');
		});

});
</script>




</body>

</html><?php }} ?>