 $(function(){ 
 	//初始化遮照层 位置
 		var pos =$('.run-mapSearchH2').offset();
 		var temp_height = $('.headerAcMain').height();
	 $('.zhezhao').css('top',temp_height);
   $('.zhezhao').css('left',0);
  //初始化城市列表位置
   
   $('.citylist').css('top',temp_height+60);
   $('.citylist').css('margin-left','80px');//'Number(pos.left));
   $('.citylist2').css('top',temp_height+60);
   $('.citylist2').css('margin-left','80px');
    $('.search_result').css('top',temp_height+60);
   $('.search_result').css('margin-left','80px');
   $('.searhistory').css('top',temp_height+20);
   $('.searhistory').css('right',60);
   
});
 
 $('#citychoice').live("click", function() {   
 	//弹出层
	//遮照层
	 $('.zhezhao').show();
	 $('.citylist').show();
	 $('.citylist2').hide();
	 $('.search_result').hide();
	 $('#mysetdiv').hide();
});

$('#citylistshow li').live("mouseover", function() {  
	 $(this).addClass('on').siblings().removeClass('on'); 
})
$('#citylistshow li').live("mouseout", function() {  
	$(this).removeClass('on');  
})
$('#citylistshow li').live("click", function() {   
	$('#citydet_tit_l').text($('#citychoice').text());
	$('#citydet_tit_r').hide();
	$('#colse_det').show();
	var areaidt =  $(this).attr('data');
	$('#citydet_tit_r').attr('data',areaidt);
	var showdata = $(this).attr('showdata');
	if(showdata == 1){
		//切换城市
		//移动地图中心点   并转换城市名称
		var newpoint = new BMap.Point($(this).attr('lng'), $(this).attr('lat'));  
		 map.centerAndZoom(newpoint,map.getZoom());
		 $('#citychoice').text($(this).text());
		 $('#citychoice').attr('data',$(this).attr('data'));
		 $('#cityname').val($(this).text());
		 $('.zhezhao').hide();
	 $('.citylist').hide();
	}else{
		$('#citydet_tit_l').text($(this).text());	 
	  $('.citylist').fadeOut(300,function(){
	 	   $('.citylist2').show(); 
	      ajaxareadata(areaidt,0);	 	 
	  });
	}
});
$('#mysetdiv .close').live("click", function() {   
	$('#mysetdiv').hide();
});

$('#citydet li').live("mouseover", function() {  
	 $(this).addClass('on').siblings().removeClass('on'); 
})
$('#citydet li').live("mouseout", function() {  
	$(this).removeClass('on');  
})
$('#citydet li').live("click", function() {   
	$('#citydet_tit_r').show();
	$('#colse_det').hide();
	var areaidt =  $(this).attr('data');
	var typeid = $(this).attr('typedata');
	if(typeid ==  1){
		/*
		$('#citydet_tit_l').text($(this).text());
		$('#citydet_tit_r').text('返回'); 
		$('.citylist').fadeOut(300,function(){
	 	 $('.citylist2').show(); 
	    ajaxareadata(areaidt,typeid);	 	 
	  });*/
	   var linkurl = siteurl+'/index.php?ctrl=site&action=setlocationlink&areaid='+areaidt; 
		window.location.href=linkurl;   
	}else{ 
	  var linkurl = siteurl+'/index.php?ctrl=site&action=setlocationlink&areaid='+areaidt; 
		window.location.href=linkurl;   
	} 
});
$('#colse_det').live("click",function(){
	$('.citylist2').hide();
});
$('#citydet_tit_r').live("click", function() {   
	var checkid = $(this).attr('data');
	$('#citydet_tit_r').hide();
	$('#colse_det').show();
	if(checkid != undefined){
		 if(checkid > 0){ 
	     $('#citydet_tit_l').text($('.citychoice').text());
		   $('#citydet_tit_r').text(''); 
		    ajaxareadata(checkid,0);	 	 
		 }
	}
});
function ajaxareadata(areaid,typeid){
	$('#citydet ul').html('');
		
  var url = siteurl+'/index.php?contrller=site&action=ajaxareadata&areaid='+areaid+'&typeid='+typeid+'&random=@random@&datatype=json';
  var typeids =  Number(typeid)+1;
	$.ajax({
     type: 'post',
     async:true, 
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	if(content.error == false){ 
      // 
       
       $.each(content.msg, function(i,val){     //常用JSON数据 返回
            $('#citydet ul').append('<li data="'+val.id+'" typedata="'+typeids+'">'+val.name+'</li>');
       	
       })
      
     	}else{
     		if(content.error == true)
     		{
     		 //
     		}else{
     		 //
     		}
     	} 
		},
    error: function(content) { 
     //
	  }
   });    
}


function dosearchmap(pagenum){
	if($('#run-searchAddress').val() == $('#run-searchAddress').attr('tip') || $('#run-searchAddress').val() == ''){
	  alert('请录入查询条件');
	}else{ 
	   //调用搜索
	   map.clearOverlays();
	   $('.search_result').show();
	   var  tempurlss = siteurl+'/index.php?ctrl=site&action=ajaxbaidu&random=@random@';  //  searchvalue  cityname
	   var searchvalue = $('#run-searchAddress').val();
	   var cityname = $('#cityname').val();
	 //  tempurlss = tempurlss.replace('@searchvalue@', searchvalue).replace('@cityname@', cityname).replace('@pagenum@', pagenum).replace('@random@', 1+Math.round(Math.random()*1000));
	     //ajaxbaidu
	  //   alert(tempurlss);
	  //  $.getScript(tempurlss);  
	  $.ajax({
     type: 'post',
     async:false,
     data:{'searchvalue':searchvalue,'cityname':cityname,'pagenum':pagenum},
     url: tempurlss.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'script',success: function(content) {    
		 },
      error: function(content) { 
       	diaerror('选择的城市不满足百度地图搜索条件'); 
	    }
     });   
	   
  }
  return false;
}
function searchbackdata(datas){  
 
	if(datas.status == 0){
	      miaodian(datas.results);
	      makedivpage(datas.total,datas.pagenum);
	}
 // alert(datas.length);
}
 