$(function(){ 
	
	//切换显示项目
 $('.tit03 a').click(function(){ 
	    $(this).addClass('a1').siblings().removeClass('a1');
	   var check =  $('.tit03 a').index(this);
	   if(check == 0){
	   	     $('.leftlist').show();
	   	      $('.leftlist').show().eq(3).hide();
				$(".leftlistlist").hide();
	   	     $('#left_cale2').show();
	   	      $('#goodlista').show();
	   	     $('.leftlist').css('margin-top','0px');
	   }else{
	   	 $('.leftlist').eq(check).show().siblings().hide();
	   	 $('.leftlist').eq(0).show();
	   	 $('#left_cale2').hide();
	   	 $('#goodlista').hide();
	   	 $('.leftlist').eq(check).css('margin-top','-20px');
	   }
	    
  });
  /*加载评价*/
  getPingjia(0); 
  //构造下单时间
  maketimenenu();
  
  /*
  $('.ordering_pic_orange').click(function(){
  	//$(window).scrollTop()
  	var outtop =  $(window).scrollTop();
  	if($('#conWarpclose').html() == undefined){
  	  $('body').append('<div id="conWarpclose" style="top: 0px; left: 0px; display: none;z-index:10000;"></div>');
  	   $('#conWarpclose').bind("click", function() {   
               	$('#conWarpclose').hide();
             	$('#conWarp').remove();
         });
  	}
  	var windheight = $(window).height();
  	var centerpoint = Number(windheight/2)+Number(outtop);
  	var centerheight = Number($(window).width()/2);
   
  	$('#conWarpclose').css('top',Number(centerpoint)-Number(175));  
  	$('#conWarpclose').css('left',Number(centerheight)-Number(135));     
  	$('body').append('<div id="conWarp" style="width: 330px;   height: 254px; opacity: 1;"><img id="oImage" src="'+$(this).attr('bigsrc')+'" style="width:320px;height:240px;"></div>');
  	$('#conWarp').css('top',Number(centerpoint)-160);
  	$('#conWarp').css('left',Number(centerheight)-120); 
  	$('#conWarpclose').show();
  	 $('#conWarp').bind("click", function() {   
       	$('#conWarpclose').hide();
  	   $('#conWarp').remove();
     });
  });
 
 
 
*/  
/* 查看菜单大图 */
(function($){     
	$.fn.extend({     
		showBigPic:function(opt,callback){   
			
			//默认的参数
			var defaults = {    
					_src: 'BigSrc',   	  //图片地址
					type:'click', //事件
					content:'添加你的图片说明',	  //显示的内容
					error:function(){}    //图片引用出错执行函数
				};   

  			var opts = $.extend( defaults, opt );   
			
			//添加事件
			$( this ) [ opts.type ] ( function(ev){
				//阻止默认事件
				ev.preventDefault();
				ev.stopPropagation();
				$('div').remove('#conWarp');
				$('div').remove('#conWarpclose');
				
				
				//$('#conWarp').html('');
				var _this = $(this);
				
				//创建图片对象
				var img = new Image();
				img.id='oImage';
				
				//图片加载完成执行
				img.onload = function(){
					$('body').append('<div id="conWarp"></div><div id="conWarpclose"></div>');	
					var ww = $(window).innerWidth();  //可视区的宽度
					var wh = $(window).innerHeight(); //可视区的高度

					//填充内容
					
					var content = ''
					switch(typeof opts.content){
						case 'function' :
							content = opts.content(_this);
						break;
						case 'string':
							content = opts.content;
						break;
					}

					$('#conWarp').append(img);//.append(content);
					
					var w = cw = parseInt($(img).attr('width')) || parseInt($('#conWarp').outerWidth());
					var h = ch = parseInt($(img).attr('height')) || parseInt($('#conWarp').outerHeight());
					
					var title = _this.attr('title');
					/*//文字层内容
					if($('.txt').length > 0){
						$('.txt').css({
						'width':'100%'	
						}).html(title)	
					}*/
		
					
					
					var sw = 1;
					var sh = 1;

					//宽度大于可视区 高度小于可视区 以宽度基点
					if(w > ww && h < wh){  
						sw = (ww - 40)/w;
						w=ww-40;
					}
				
					//高度大于可视区 宽度小于可视区 高度基点
					if(h >= wh && w <= ww){
						sh = (wh-40)/h;
						h=wh-40;
					}
				
					//宽高都大于可视区
					if( h>=wh && w>=ww ){
						//高度差大于宽度差 以高为基点
						if( h-wh > w-ww ){
							sh = (wh-40)/h;
							h=wh-40;	
						}else{
							//宽度差大于高度差 以宽为基点
							sw = (ww - 40)/w;
							w=ww-40;
						}
					}
					//重新改变弹出层大小
					w*= sh;
					h*= sw;

					//文字层高度
					/*var txtH = $('.txt')[0] ? parseInt($('.txt').css('height')):0;*/
					var sl = _this.offset().left; //初始化的左边距
					var st = _this.offset().top;  //初始化的上边距
					var iScrollTop = $(window).scrollTop();
					
					//初始化时候的样式
					$('#conWarp').css({
						width:0,
						left:sl,
						top:st
					}).animate({
						width:w,
						height:h,
						left:(ww-w)/2,
						top:(wh-(h))/2+iScrollTop,
						opacity:1
					},200,function(){
						
						$('#conWarpclose').css({
							'top':(wh-(h))/2+iScrollTop-15,
							'left':(ww-w)/2-15,
							'display':'block'
						})
						callback && callback();
						
					});
					
					
					//close关闭事件
					$('#conWarp,#conWarpclose').live('click',function(){
						
						$('#conWarpclose').css('display','none');
						$('#conWarp').animate({
							left:sl,
							top:st,
							width:0,
							height:0,
							opacity:0	
						},100,function(){
							$('div').remove('#conWarp');
						})	
					});
				}
				img.onerror = function(){
					//alert(2);
					defaults.error(this);
				}

				var sHref = $(this).attr(opts._src);
				
				//图片src赋值一定要在onload后面 不然IE6 下图片不会出现
				img.src = sHref//$(this).attr(opts.src);
			});
			
			return $(this);
		}     
	})     
})(jQuery); 

});
function maketimenenu(){
	var selectdate = $("select[name='senddate']").find("option:selected").val(); 
  $('#orderTime').html(''); 
  var dotime = ''; 
  	dotime = starttime.split('|'); 
  for(var i=0;i<dotime.length;i++){ 
  		var splittime = dotime[i].split('-');
  		if(splittime.length > 0){
  			//开始时间  结束时间
  			var begindtime = selectdate+' '+splittime[0]+':00';
  			var endtime = selectdate+' '+splittime[1]+':00'; 
  			addhtml(begindtime,endtime);
  		}
  } 
}
function addhtml(begindtime,endtime){ 
	var begindate = new Date(begindtime.replace(/-/g,'/'));
	var enddate = new Date(endtime.replace(/-/g,'/'));
	var bkdate = new Date(nowtime.replace(/-/g,'/'));
	var begindates = Number(begindate.getTime());
	var enddates = Number(enddate.getTime());
	var bkdates = Number(bkdate.getTime());
	
	if(bkdates > begindates && bkdates > enddates){ 
		 
  }else{  
  	var setptime = 15*60*1000; 
       for(var i=begindates;i<enddates;i=i+setptime){
       	 if(i > bkdates){ 
       	   var d = new Date()
            d.setTime(i);
            var nowhour = d.getHours();
            var timesee =  Number(nowhour) < 10?'0'+nowhour:nowhour;
            var nowminit = d.getMinutes();
            timesee += Number(nowminit) < 10?':0'+nowminit:':'+nowminit;
            $('#orderTime').append('<option value="'+timesee+'">'+timesee+'</option>'); 
         }
	     }
	} 
}
function getPingjia(pagenum)
{  
  	 var url = siteurl+"/index.php?ctrl=order&action=commentshop&random=@random@"; 
  	 url = url.replace('@random@', 1+Math.round(Math.random()*1000));
	   $.post(url, {'shopid':shopid,'type':'shop','page':pagenum},function (data, textStatus){  
	          	$('#pingjialist').html(data);  
	  }, 'html');  
}
//商品分类切换
function change_shop_list(ids,obj){
	if(ids == 0){
	  $('.lisul').show();
	  $(obj).addClass('current').siblings().removeClass('current');
	}else{
		$('.lisul').hide();
		 $(obj).addClass('current').siblings().removeClass('current');
		 $('.'+ids+'_mid').show(); 
	}
}
//商品价格 切换
function change_shop_cost(statcost,endcost,obj){
	$(obj).addClass('current').siblings().removeClass('current');
	if(statcost == endcost){
	   //显示所有的
	   $('.goodsli').show();
	}else{
		 var findobj = $('.goodsli');
		 $(findobj).hide();
		  $.each(findobj, function(i,nboj){ 
		  	  var datacost =  Number($(nboj).attr('cdata'));
		  	  if(datacost > statcost && datacost < endcost){
		  	      $(nboj).show();
		  	   }
		  	
		  });
	} 
}

 
 
 

 