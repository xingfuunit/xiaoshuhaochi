$(function(){ 
	 $('#serverdiv li').hover(function(){
	     $(this).addClass('nav_hover'); 
    });
   $('#serverdiv li').mouseleave(function(){
	    $(this).removeClass('nav_hover'); 
    });
    $('#close_img').click(function(){
    	$('#serverdiv').hide();
    	$('#open_img_bg').show();
    });
    $('#open_img').click(function(){
    	 $('#serverdiv').show();
    	 $('#open_img_bg').hide();
    });
    $('#a_backtop').click(function(){
    	$('body,html').animate({scrollTop:0},400);
    });
	$('#bdshare a').click(function(){
		  var myclass = $(this).attr('class');
		  var stetitlename = encodeURIComponent($('title').eq(0).text());
		  var sitedourl =   encodeURIComponent(window.location.href);
		  var dolink = '';
		  switch(myclass)
		  {
		      case 'bds_qzone'://qq空间 
		        dolink = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+sitedourl+'&title='+stetitlename+'&desc=&summary=&site=';
		      break;
		      case 'bds_tsina'://新浪微博
		        dolink = 'http://service.weibo.com/share/share.php?url='+sitedourl+'&title='+stetitlename+'&appkey=';
		      break;
		       case 'bds_baidu'://百度搜藏
		       dolink = 'http://cang.baidu.com/do/add?iu='+sitedourl+'&it='+stetitlename+'&linkid=';
		      break;
		       case 'bds_kaixin001'://开心网
		        dolink = 'http://s.share.baidu.com/?click=1&url='+sitedourl+'&uid=&to=kaixin001&type=text&pic=&title='+stetitlename+'&key=&desc=&comment=&relateUid=&searchPic=0&sign=on&linkid=&firstime=';
		      break;
		       case 'bds_renren'://人人网
		       dolink = 'http://widget.renren.com/dialog/share?resourceUrl='+sitedourl+'&srcUrl='+sitedourl+'&title='+stetitlename+'&description=';
		      break;
		       case 'bds_tqf'://腾讯朋友
		       dolink = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?to=pengyou&url='+sitedourl+'&title='+stetitlename+'&desc=&summary=';
		      break;
		       case 'bds_hi'://百度空间
		       dolink = 'http://hi.baidu.com/pub/show/share?url='+sitedourl+'&title='+stetitlename+'&content=&linkid=';
		      break;
		       case 'bds_douban'://豆瓣网
		       dolink = 'http://www.douban.com/share/service?href='+sitedourl+'&name='+stetitlename+'';
		      break;
		       case 'bds_tsohu'://搜狐微博
		       dolink = 'http://s.share.baidu.com/?click=1&url='+sitedourl+'&uid=&to=tsohu&type=text&pic=&title='+stetitlename+'&key=&desc=&comment=&relateUid=&searchPic=0&sign=on&linkid=&firstime=';
		      break;
		       case 'bds_qq'://QQ收藏
		       dolink = 'http://shuqian.qq.com/post?from=3&uri='+sitedourl+'&title='+stetitlename+'';
		      break;
		       case 'bds_taobao'://我的淘宝
		       dolink = 'http://share.jianghu.taobao.com/share/addShare.htm?url='+sitedourl+'&title='+stetitlename+'';
		      break;
		       case 'bds_t163'://网易微博
		       dolink = 'http://s.share.baidu.com/?click=1&url='+sitedourl+'&uid=&to=t163&type=text&pic=&title='+stetitlename+'&key=&desc=&comment=&relateUid=&searchPic=0&sign=on&linkid=&firstime=';
		      break;
		      default:
		      alert('未定义的操作');
		      break;
		 }
		 if(dolink !=''){
    	  window.open(dolink);   
     }
    });
});
	 
//http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=http%3A%2F%2Fshare.baidu.com%2Fcode%230-qzone-1-74129-d020d2d2a4e8d1a374a433f596ad1440&title=xxx&desc=&summary=%E4%BD%A0%E5%A5%BD%E5%95%8A&site=fdsafdsa