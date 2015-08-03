<?php /* Smarty version Smarty-3.1.10, created on 2015-06-19 11:17:37
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/shoplist.html" */ ?>
<?php /*%%SmartyHeaderCode:103281320055822642bc3076-64548984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae0211183e6f513761ff8d7f34a68fb8c28a4534' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/module/wxsite/template/shoplist.html',
      1 => 1434616602,
      2 => 'file',
    ),
    '172a78fbc96ceadf7e270433684a27900a1292ec' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/wmr_new/templates/newgreen/public/wxsite.html',
      1 => 1434531620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103281320055822642bc3076-64548984',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_55822642c9b510_19783021',
  'variables' => 
  array (
    'tempdir' => 0,
    'shopinfo' => 0,
    'siteurl' => 0,
    'is_static' => 0,
    'Taction' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55822642c9b510_19783021')) {function content_55822642c9b510_19783021($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">  
    
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<!--<title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>--> 
	<title><?php echo $_smarty_tpl->tpl_vars['shopinfo']->value['shopname'];?>
</title> 
	 
	<link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/css/public.css">    
 
 <link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/css/shoplist.css">   

	<script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/jquery.js"></script> 
  <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/public.js"></script>  
   <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/swipe.js"></script> 
    <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/iscroll.js"></script> 
 
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/wxsite/js/template.min.js"></script>     
 <script>
var can_show = true;
var page = 1;
var catid = 0;
var order = 0;
var myaddress = '<?php echo $_smarty_tpl->tpl_vars['myaddress']->value;?>
';
var search_input = '<?php echo $_smarty_tpl->tpl_vars['search_input']->value;?>
';
$(function(){ 
	if(myaddress == ''){
		 Tmsg('你选择的区域获取超市失败，请选择区域');
		  window.location.href=siteurl+"/index.php?controller=wxsite&action=index";
	}
 		$('#toolbar .sele>li').bind("click", function() {   
	    $('#toolbar .sele>b').removeClass('se');
     $(this).addClass('se').siblings().removeClass('se');
     $(this).find('b').addClass('se');
      $('#toolbar .sub').addClass('sh');
       var cc = $('#toolbar .sele').find('li').index(this); 
       $('#toolbar .lizd').eq(cc).show().siblings().hide();//('sh'); 
   
      });

 	$('#sorts li').bind("click",function(){
	  $(this).addClass('xz').siblings().removeClass('xz');
	    $('#toolbar').find('.se').removeClass('se');
      $('#toolbar').find('.sh').removeClass('sh'); 
	    $('#toolbar').find('li').eq(2).html('<a>'+$(this).text()+'<b class=""></b></a>');
	    order = $(this).attr('value');
	   $('#supplierlist').html('');
      page = 1;
   	  can_show = true; 
	    shopdata(); 
  });
  $('.lizd li').bind("hover",function(){
	   $(this).addClass('tapclass').siblings().removeClass('tapclass');
  });
  $('#cuisien li').bind('click',function(){
	   $(this).addClass('xz').siblings().removeClass('xz');
	   $('#toolbar').find('.se').removeClass('se');
	   $('#toolbar').find('.sh').removeClass('sh');
	   $('#supplierlist').html('');
	   $('#toolbar').find('li').eq(0).html('<a>'+$(this).text()+'<b class=""></b></a>');
	   catid = $(this).attr('id');//alert(this).
	   can_show = true; 
	   page = 1;
	   shopdata(); 
   });
  
   shopdata();
});
function shopdata(){ 
	   $('#loading').show();
 	   $(".mBxCr").show(); 
 	   var url = siteurl+'/index.php?controller=wxsite&action=shoplistdata&datatype=json&random=@random@';  
 	    $.ajax({ 
      dataType: "json", 
      data:{page:page,search_input:search_input,order:order,catid:catid}, 
       url: url.replace('@random@', 1+Math.round(Math.random()*1000)),  
       success: function(content) {    
       	 if(content.error == false) 
      	{ 

      		  if(content.msg.length > 0){

      		  		var cc = $('.clkitm').length;

      		     $.each(content.msg, function(i,val){     
 		             //   var htmls = template.render('shoplist', {list:val}); 
 		                var htmls = trancertdata(val);
                   $('#supplierlist').append(htmls); 
                   $('.clkitm').eq(Number(i)+Number(cc)).fadeIn(); 
               });  
               page = Number(page+1);  
               $(".mBxCr").hide(); 
               $('#loading').hide();
      		  }else{ 
      		      can_show ==  false; 
      		      if(page == 1){ 
      		      	 error($('#supplierlist'),'未查找到满足条件的数据'); 
      		      	 $(".mBxCr").hide(); 
      		      }else{ 
      		        $('#loadtip').text('数据加载完毕'); 
      		      }
      		      $('#loading').hide();

      		  }

      	}else{ 
      			 can_show ==  false; 
    	       error($('#supplierlist'),content.msg); 
    	       $('#loading').hide();
      	}  
      	 
	     }, 
       error: function(content) {  
        	can_show ==  false; 
    	    error($('#supplierlist'),'店铺数据为空'); 
    	    $('#loading').hide();
	     }

     });   

}
function trancertdata(datas){
	var backdata = '';
	var tempdata = 'red';
	var tempdata2 = '营业中';
	    if(datas.opentype != 2 && datas.opentype !=3){
	    	tempdata = '#ccc';
	    	tempdata2 = '已打烊';
	    } 
       backdata ='<li class="clkitm " data-supplierid="'+datas.id+'" style="display:none;"  > ';
      if(datas.opentype != 2 && datas.opentype !=3){
	    	backdata += '<a href="#">';
	    }else{
	    		backdata += '<a href="'+siteurl+'/index.php?controller=wxsite&action=shopshow&id='+datas.id+'">';
	    }
      backdata +='<img class="scrollLoading"  src="'+datas.shoplogo+'" alt="" >';
      backdata +='<h3><strong>'+datas.shopname+'</strong></h3>';
      backdata +='<div class="qisong">';
      if (datas.pay_type == "6") {
      backdata +='<p>未满'+datas.full_pay+'元&nbsp;</p>';
      backdata +='<p>送餐费&nbsp;'+datas.pscost+'&nbsp;元</p>'; 
      }else{
      backdata +='<p>'+datas.limitcost+'元起送&nbsp;</p>';
      backdata +='<p>送餐费&nbsp;'+datas.pscost+'&nbsp;元</p>'; 
      }
     
      
      backdata +='</div>';
      backdata +='<div class="address">配送时间:'+datas.starttime+'</div> ';
      if(datas.gzdata  != ''){
           backdata +='<div class="shanbqs"> '+datas.gzdata+' </div>';
      }
      backdata +='</a> ';
      backdata +=' <div style="position:absolute;position: absolute;background-color: '+tempdata+';height: 20px;width: 50px;right: 20px;margin-top: -60px;color: #ffffff;text-align: center;line-height: 20px;">'+tempdata2+'</div></li> ';
      return backdata;
}
$(window).scroll(function(){   //滚动获取数据 
	if(can_show == true && $(".mBxCr").is(":hidden") == true){ 
    if ($(document).height() - $(this).scrollTop() - $(this).height()<50) shopdata();   
  } 
});

</script>
<script id="shoplist" type="text/html">    
 	 <li class="clkitm <^%if(list.opentype != 2&&list.opentype !=3){%^>disabled<^%}%^>" data-supplierid="<^%=list.id%^>" style="display:none;"  > 
 <^%if(list.opentype != 2&&list.opentype !=3){%^>
 	 <a href="#">
 	<^%}else{%^>
 	   <a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/index.php?controller=wxsite&action=shopshow&id=<^%=list.id%^>">
 <^%}%^>
        <img class="scrollLoading"  src="<^%=list.shoplogo%^>" alt="" >

        <h3><strong><^%=list.shopname%^></strong></h3> 
        <div class="qisong">
                <p><^%=list.limitcost%^>&nbsp;元起送</p>
                <p>送餐费&nbsp;<^%=list.pscost%^>&nbsp;元</p> 
        </div>

        <div class="address">配送时间:<^%=list.starttime%^></div> 
        
        
         <^%if(list.gzdata != ''){%^>
        <div class="shanbqs"> <^%=list.gzdata%^> </div>
        <^%}%^>
       </a>

    </li> 

</script>
<script>
	var startX = 0, startY = 0;
 
	function touchSatrtFunc(evt) {
                try
                {
                    //evt.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等

                    var touch = evt.touches[0]; //获取第一个触点
                    var x = Number(touch.pageX); //页面触点X坐标
                    var y = Number(touch.pageY); //页面触点Y坐标
                    //记录触点初始位置
                    startX = x;
                    startY = y; 
                 //  var text = 'TouchStart事件触发：（' + x + ', ' + y + '）';
                 //  document.getElementById("result").innerHTML = text;
                }
                catch (e) {
                   // alert('touchSatrtFunc：' + e.message);
                }
  }
	function touchMoveFunc(evt,targetname) {
    try{
                    //evt.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等
                    var touch = evt.touches[0]; //获取第一个触点
                    var x = Number(touch.pageX); //页面触点X坐标
                    var y = Number(touch.pageY); //页面触点Y坐标
                    //alert($(evt).html());

                  //  var text = 'TouchMove事件触发：（' + x + ', ' + y + '）';

                    //判断滑动方向
                    if (x - startX != 0) {
                        // text += '<br/>左右滑动';
                        // -的时候为向左滑动  +  向右滑动
                        var mudi = x - startX;
                     //   text += '<br/>'+mudi;
                        var oldpostion = parseInt($('#'+targetname).css('left'));
                        var nowposition = Number(oldpostion) + Number(mudi);
                        var zongchang = parseInt($('#'+targetname).css('width'));
                     //   text += '<br/>新位置'+nowposition;
                        if(nowposition > 0){
                        	$('#'+targetname).css({left:0});  
                        }else{ 
                        	var checkchang = Number(zongchang)+Number(nowposition);
                        	if(checkchang > 0){
                          $('#'+targetname).css({left:nowposition});  
                          }else{
                          	 var dochang = 200 - Number(zongchang);
                            $('#'+targetname).css({left:dochang});   
                          }
                        }
                      
                    }
                    if (y - startY != 0) {
                      //  text += '<br/>上下滑动';
                    }

                  //  document.getElementById("result").innerHTML = text;
     }catch (e) {
                  //  alert('touchMoveFunc：' + e.message);
    }
  }
  function touchEndFunc(evt) {
                try {
                    //evt.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等

                 //   var text = 'TouchEnd事件触发';
                //    document.getElementById("result").innerHTML = text;
                }
                catch (e) {
                  //  alert('touchEndFunc：' + e.message);
                }
  }
	function bindEvent() {
         document.getElementById('cuisien').addEventListener('touchstart', touchSatrtFunc, false); 
         document.getElementById('cuisien').addEventListener('touchmove', function(e) { touchMoveFunc(e,'cuisien'); } , false);
         document.addEventListener('touchend', touchEndFunc, false); 
  } 
	function isTouchDevice() { 
      try {
         document.createEvent("TouchEvent"); 
         bindEvent(); //绑定事件
      }
      catch (e) { 
      }
  } 
  window.onload = isTouchDevice;
 </script>

<script> 
	var siteurl = "<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
";
	var is_static ="<?php echo $_smarty_tpl->tpl_vars['is_static']->value;?>
";
	var taction = "<?php echo $_smarty_tpl->tpl_vars['Taction']->value;?>
"; 
</script>

<script>
		var myScroll, pullDownEl, pullDownOffset,
	pullUpEl, pullUpOffset,
	generatedCount = 0;

function pullDownAction () {
	/*
	setTimeout(function () {	// <-- Simulate network congestion, remove setTimeout from production!
		var el, li, i;
		el = document.getElementById('thelist');

		for (i=0; i<3; i++) {
			li = document.createElement('li');
			li.innerText = 'Generated row ' + (++generatedCount);
			el.insertBefore(li, el.childNodes[0]);
		}
		
		myScroll.refresh();		// Remember to refresh when contents are loaded (ie: on ajax completion)
	}, 1000);	// <-- Simulate network congestion, remove setTimeout from production!
	*/
}

function pullUpAction () {
	setTimeout(function () {	// <-- Simulate network congestion, remove setTimeout from production!
		if(can_show == true && $(".mBxCr").is(":hidden") == true){  
        shopdata();   
    } 
		myScroll.refresh();		// Remember to refresh when contents are loaded (ie: on ajax completion)
	}, 1000);	// <-- Simulate network congestion, remove setTimeout from production!
}

function loaded() {
	pullDownEl = document.getElementById('pullDown');
	pullDownOffset = pullDownEl.offsetHeight;
	pullUpEl = document.getElementById('pullUp');	
	pullUpOffset = pullUpEl.offsetHeight;
	
	myScroll = new iScroll('wrapper', {
		hScrollbar:false, 
		vScrollbar:false,
		useTransition: true,
		topOffset: pullDownOffset,
		onRefresh: function () {
			if (pullDownEl.className.match('loading')) {
				pullDownEl.className = '';
				pullDownEl.querySelector('.pullDownLabel').innerHTML = 'Pull down to refresh...';
			} else if (pullUpEl.className.match('loading')) {
				pullUpEl.className = '';
				pullUpEl.querySelector('.pullUpLabel').innerHTML = 'Pull up to load more...';
			}
		},
		onScrollMove: function () {
			if (this.y > 5 && !pullDownEl.className.match('flip')) {
				pullDownEl.className = 'flip';
				pullDownEl.querySelector('.pullDownLabel').innerHTML = 'Release to refresh...';
				this.minScrollY = 0;
			} else if (this.y < 5 && pullDownEl.className.match('flip')) {
				pullDownEl.className = '';
				pullDownEl.querySelector('.pullDownLabel').innerHTML = 'Pull down to refresh...';
				this.minScrollY = -pullDownOffset;
			} else if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
				pullUpEl.className = 'flip';
				pullUpEl.querySelector('.pullUpLabel').innerHTML = 'Release to refresh...';
				this.maxScrollY = this.maxScrollY;
			} else if (this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
				pullUpEl.className = '';
				pullUpEl.querySelector('.pullUpLabel').innerHTML = 'Pull up to load more...';
				this.maxScrollY = pullUpOffset;
			}
		},
		onScrollEnd: function () {
			if (pullDownEl.className.match('flip')) {
				pullDownEl.className = 'loading';
				pullDownEl.querySelector('.pullDownLabel').innerHTML = 'Loading...';				
				pullDownAction();	// Execute custom function (ajax call?)
			} else if (pullUpEl.className.match('flip')) {
				pullUpEl.className = 'loading';
				pullUpEl.querySelector('.pullUpLabel').innerHTML = 'Loading...';				
				pullUpAction();	// Execute custom function (ajax call?)
			}
		}
	});
	
	setTimeout(function () { document.getElementById('wrapper').style.left = '0'; }, 800);
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);


</script>


 

 
</head>
<body> 
<div id="loading" style="display: none;"><div class="loadingbox"><section class="ffffbox"><div class="loadingpice"></div></section></div></div> 
<div id="hallist"> 
	<header id="header"><div class="return"></div> <?php echo $_smarty_tpl->tpl_vars['mapname']->value;?>
&nbsp;·&nbsp;商户列表  </header>
	
	 
 <div class="caipinglist float_top" id="ucsss">  
   	<section>
    		<ul id="cuisien" class="lizd"> 
    			    <li id="0" class="xz"><a>全部菜系</a></li>  
    			    <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['caipin']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
    			     <li id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
"><a><?php echo $_smarty_tpl->tpl_vars['items']->value['name'];?>
</a></li>
    			     <?php } ?>
    	 </ul> 
    </section>
    </div>
 <div id="wrapper">
	<div id="scroller">
		
		<div id="pullDown" style="display:none;">
			<span class="pullDownIcon"></span><span class="pullDownLabel">Pull down to refresh...</span>
		</div>
		
   

  <div id="result"></div>

  <div class="container" id="relist">

  	<section>

  		<ul id="supplierlist" class="branch-list">  

  			 

     </ul>

     <div class="mBxCr" style="display: hidden;"><span class="more" id="loadtip">加载更多</span></div>

    </section>
  </div>
   
   <div id="pullUp" style="display:none;">
			<span class="pullUpIcon"></span><span class="pullUpLabel">Pull up to refresh...</span>
		</div>
   
   
   
</div>
</div>
 
  
  
</div>
 <script>
 	$(function(){  
 	   $('#loading').hide(); 
  });
  </script>
</body>
</html>
 <?php }} ?>