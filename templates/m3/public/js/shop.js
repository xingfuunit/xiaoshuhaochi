$(function(){ 
	autosize();
	canorder();
		freshgoods();
	//modifycollect();
});
//自动调整高度
function autosize()
{
	$('.hc_list_right').css('height',$('.hc_list_left').height()-23);
}
//是否可以订餐
function canorder()
{
	var checkid= $('#canorder').val();
	if(checkid != 1)
	{
		//alert('can');
		$('.jia').text('已打烊');
	}
}
  
/*刷新商品界面中的 显示*/
function freshgoods()
{
	if(cartids != undefined){
	$.each(cartids,function(i,field){ 
	  var kk = $('#hcl_food_lists_contents_'+field);
	  if($(kk).html() != undefined)
	  { 
	  	$(kk).find('.hcl_food_lists_cont_dagou_box').addClass('hcl_food_lists_cont_dagou_box_hover');
	  	$(kk).find('.hc_listfoods_menus_foods').addClass('hc_listfoods_menus_foods_addborder');
	  }
   //$('#idss').appedn(field.value+",");
 })
}
 
}
 
//排序  hc_listBoxDiv
$(".hcl_food_lists_head_btns_div").live("click", function() {  
	$(this).addClass('hcl_food_lists_head_btns_div_hover').siblings().removeClass('hcl_food_lists_head_btns_div_hover');
  var objfind = $(this).find('.hcl_food_lists_head_btns_div_div').eq(0);
  var is_comment = $(objfind).hasClass("hcl_food_lists_head_btns_div_down_comment");
  var is_down  =  $(objfind).hasClass("hcl_food_lists_head_btns_div_down_comment_hover");
  $('.hcl_food_lists_head_btns_div_div').removeClass('hcl_food_lists_head_btns_div_down_comment_hover');
	$('.hcl_food_lists_head_btns_div_div').removeClass('hcl_food_lists_head_btns_div_up_price_hover'); 
	if(is_comment){//存在普通
	 if(is_down){//存选择
	 	//转换样式
	 	$(objfind).removeClass('hcl_food_lists_head_btns_div_down_comment hcl_food_lists_head_btns_div_down_comment_hover'); 
	 	$(objfind).addClass('hcl_food_lists_head_btns_div_up_price hcl_food_lists_head_btns_div_up_price_hover'); 
	  }else{
	  	$(objfind).removeClass('hcl_food_lists_head_btns_div_up_price hcl_food_lists_head_btns_div_up_price_hover'); 
	 	 $(objfind).addClass('hcl_food_lists_head_btns_div_down_comment hcl_food_lists_head_btns_div_down_comment_hover'); 
	  }
	}else{//存在其他
		if(is_down){//存选择
	 	//转换样式
	 	$(objfind).removeClass('hcl_food_lists_head_btns_div_down_comment hcl_food_lists_head_btns_div_down_comment_hover'); 
	 	$(objfind).addClass('hcl_food_lists_head_btns_div_up_price hcl_food_lists_head_btns_div_up_price_hover'); 
	  }else{
	  	
	 	$(objfind).removeClass('hcl_food_lists_head_btns_div_up_price hcl_food_lists_head_btns_div_up_price_hover'); 
	 	$(objfind).addClass('hcl_food_lists_head_btns_div_down_comment hcl_food_lists_head_btns_div_down_comment_hover'); 
	  } 
	} 
	var newobj = $(this).find('.hcl_food_lists_head_btns_div_div').eq(0);
  var is_comment = $(newobj).hasClass("hcl_food_lists_head_btns_div_down_comment");
   
  var typestr  = $(this).attr('soretype'); 
  var  finddiv = $('.menufood_div');
  
  for(var i=0;i<$(finddiv).length;i++)
  {
  	var newidsArray = new Array();
  	var json = {};
  	var objdiv = $(finddiv).eq(i).find('.hcl_food_lists_contents');
  	$(finddiv).eq(i).find('.hcl_food_lists_contents').remove();
  	for(var k=0;k<$(objdiv).length;k++)
  	{
  		 var shu = Number($(objdiv).eq(k).attr(typestr));
  		 if(!json[shu]){
  		 	newidsArray.push(shu); 
  		 	json[shu] = 1;
  		 }
  	}
  	newidsArray.sort(function(a,b){return a>b?1:-1});//从小到大排序
  	if(is_comment)
    {
    	newidsArray.sort(function(a,b){return a<b?1:-1}); ////从大到小排序 降序
    }
    for(var m=0;m<newidsArray.length;m++)
    {
    	for(var k=0;k<$(objdiv).length;k++)
  	  {
  		 var shu = Number($(objdiv).eq(k).attr(typestr));
  		 if(shu == newidsArray[m])
  		 { 
  		 	  $(objdiv).eq(k).clone().appendTo($(finddiv).eq(i));
  		 }
  	  } 
    } 
  } 
 })
 
 function foodListHover(obj)
{
	$(obj).find('.addFav').show();
	if($(obj).hasClass('hcl_food_lists_contents_div_selected'))
	{
		return;
	}
	else
	{
		$(obj).addClass('hcl_food_lists_contents_div_hover');
	}
} 
function foodListHoverOut(obj)
{
	$(obj).find('.addFav').hide();
	if($(obj).hasClass('hcl_food_lists_contents_div_selected'))
	{
		//$(obj).find('.addFav').show();
		return;
	}
	else
	{
		$(obj).removeClass('hcl_food_lists_contents_div_hover');
	}
}


//hc_listBoxDiv
$('.hc_listBoxDiv').live("mouseover", function() {  
	 var finobj = $(this).find('.hc_listBoxDiv_img').eq(0); 
	 if($(finobj).attr('type')=='b')
	 {
	 	 $(finobj).addClass('hc_listBoxDiv_adhover_img');
	 }
})
$('.hc_listBoxDiv').live("mouseout", function() {  
	 var finobj = $(this).find('.hc_listBoxDiv_img').eq(0);
	 if($(finobj).attr('type')=='b')
	 {
	 	 $(finobj).removeClass('hc_listBoxDiv_adhover_img');
	 }
})


function myFavoriteFood(obj)
{
	var url = siteurl+'/index.php?ctrl=site&action=addcollect&collectid='+$(obj).attr('data')+'&type=1'+'&@random@'; 
	$.ajax({
     type: 'post',
     async:false, 
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	if(content.error == false){
     		//alert('修改属性');
     		$(obj).after('<div food_id="'+$(obj).attr('data')+'" class="hcl_collection_btn_div hcl_collection_btn hcl_collection_btn_hover"></div>');
     		$(obj).remove();
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
    	diaerror('数据获取失败'); 
	  }
   });    
}
function myFavorite2(obj)
{
 
	var url = siteurl+'/index.php?ctrl=site&action=addcollect&collectid='+$(obj).attr('data')+'&type=0'+'&@random@'; 
	$.ajax({
     type: 'post',
     async:false, 
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	if(content.error == false){
     		//alert('修改属性');
     		$(obj).after('<div class="addFav11 hc_listBoxDiv_img hc_listBoxDiv_adhover_img" onclick="delFav(this);" data="'+$(obj).attr('data')+'" type="a"></div>');
     		$(obj).remove();
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
    	diaerror('数据获取失败'); 
	  }
   });     
}
function delFav(obj){
//	alert('删除');
	var url = siteurl+'/index.php?contrller=site&action=delcollect&collectid='+$(obj).attr('data')+'&type=0'+'&@random@'; 
	$.ajax({
     type: 'post',
     async:true, 
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	if(content.error == false){ 
       $(obj).after('<a class="addFav11" href="javascript:void(0);" onclick="myFavorite2(this);" data="'+$(obj).attr('data')+'" type="b"></a>');
      	 $(obj).remove();
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
    	diaerror('数据获取失败'); 
	  }
   });    
}
$(".hcl_collection_btn_div").live("click", function() {   
	 
	 var obj = $(this);
		var url = siteurl+'/index.php?ctrl=site&action=delcollect&collectid='+$(this).attr('food_id')+'&type=1'+'&@random@'; 
	$.ajax({
     type: 'post',
     async:true, 
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	if(content.error == false){ 
       $(obj).after('<a class="addFav hcl_collection_btn hcl_collection_btn_hover" onclick="myFavoriteFood(this);" href="javascript:void(0);" data="'+$(obj).attr('food_id')+'" style="display: none;"></a>');
      	 $(obj).remove();
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
    	diaerror('数据获取失败'); 
	  }
   });    
	//alert('掉用删除');
});

 function showBottom()
{
	if($('.hcl_btm_box_cont').hasClass('show'))
	{
		$('.showBottomCart').html('查看');
		$('.lanziDiv').removeClass('lanziDiv2').addClass('lanziDiv1');
		$('.hcl_btm_box_cont').removeClass('show').hide();
	}
	else
	{
		$('.showBottomCart').html('收起');
		$('.lanziDiv').removeClass('lanziDiv1').addClass('lanziDiv2');
		$('.hcl_btm_box_cont').addClass('show').show();
	}
}

function change_shop_list(menu_id) {
	if(menu_id == 0) {
		$('.menufood_div').show();
		$('.menufood_div').attr('isShow',1);
	}
	else
	{
		$('.menufood_div').hide();
		$('.menufood_div').attr('isShow',0);
		$('#menufood_div_'+menu_id).show();
		$('#menufood_div_'+menu_id).attr('isShow',1);
	}
	autosize();
}


function refreshBottomCart() {
	var manH = $(".hc_content").height();

	var scrollTop = $(document).scrollTop();
	
	var header = 125;
	var clientHeight = $(window).height();

	if ((scrollTop == 0 && manH >= clientHeight - 170) || scrollTop  + clientHeight < manH +170) {
		$('.hcl_btm_boxs').removeClass('hcl_btm_boxs_position');
		$(".hcl_btm_boxs").css("position", "fixed");
		$(".hcl_btm_boxs").addClass('navbar-fixed-bottom');
		
	}
	else {
		$('.hcl_btm_boxs').removeClass('navbar-fixed-bottom');
		$(".hcl_btm_boxs").css("position", "absolute");
		$('.hcl_btm_boxs').addClass('hcl_btm_boxs_position');
	}
}

 

function bubbleSort(arr,sortType,sort)
{
	alert(sortType);
	for (var i = arr.length - 1; i > 0; --i) 
	{ 
		for (var j = 0; j < i; ++j) 
		{ 
			var value1 = parseInt(arr[j].attr(sortType));
			var value2 = parseInt(arr[j+1].attr(sortType));

			if (sort == 1) {
				if (value1 < value2) {
					var temp = arr[j];
					arr[j] = arr[j+1];
					arr[j+1] = temp;
				};
			}
			else if (sort == 0) {
				if (value1 > value2){
					var temp = arr[j];
					arr[j] = arr[j+1];
					arr[j+1] = temp;
				}
			}
		} 
	} 
	return arr;
}

function getLiuyan(page)
{
	$('.hc_list_content').hide();
	$('.hc_list_content:eq(2)').show();
	$('.hc_changes_menu_div_active').removeClass('hc_changes_menu_div_active_hover');
	$('.hc_changes_menu_div_active:eq(2)').addClass('hc_changes_menu_div_active_hover');

	$('.hc_list_cont_div3 .hc_list_cont_div_loading3').show();
	var loading = $('.hc_list_cont_div3 .hc_list_cont_div_loading3');
	var url = siteurl+"/index.php?ctrl=ask&action=shopask";
	$.post(url, {'shopid':$('#nowshopid').val(),'type':'shop','page':page},function (data, textStatus){
		$('.hc_list_cont_div3 .hc_list_cont_div_loading3').hide();
		$('.hc_list_cont_div3').html(data);//hc_list_cont_div3
		$('.hc_list_cont_div3').append($(loading)); 
			autosize();
	}, 'html');

}

function getPingjia(page)
{
	$('.hc_list_content').hide();
	$('.hc_list_content:eq(1)').show();
	$('.hc_changes_menu_div_active').removeClass('hc_changes_menu_div_active_hover');
	$('.hc_changes_menu_div_active:eq(1)').addClass('hc_changes_menu_div_active_hover');

	$('.hc_list_cont_div2 .hc_list_cont_div_loading2').show();
	var loading = $('.hc_list_cont_div2 .hc_list_cont_div_loading2');
	var url = siteurl+"/index.php?ctrl=shop&action=showping";
	$.post(url, {'shopid':$('#nowshopid').val(),'type':'shop','page':page},function (data, textStatus){
		$('.hc_list_cont_div2 .hc_list_cont_div_loading2').hide();
		$('.hc_list_cont_div2').html(data);
		$('.hc_list_cont_div2').append($(loading));
		$('.hc_list_right').css('height',$('.hc_list_left').height()-23);
	}, 'html');
	autosize();
}

function getCaidan()
{
	$('.hc_list_content').hide();
	$('.hc_list_content:eq(0)').show();
	$('.hc_changes_menu_div_active').removeClass('hc_changes_menu_div_active_hover');
	$('.hc_changes_menu_div_active:eq(0)').addClass('hc_changes_menu_div_active_hover');
	autosize();
}

function getCuxiao()
{
	$('.hc_list_content').hide();
	$('.hc_list_content:eq(3)').show();
	$('.hc_changes_menu_div_active').removeClass('hc_changes_menu_div_active_hover');
	$('.hc_changes_menu_div_active:eq(3)').addClass('hc_changes_menu_div_active_hover');
	autosize();
}