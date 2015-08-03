 
$('#toolbar .sele>li').live("click", function() {   
	  $('#toolbar .sele>b').removeClass('se');
   $(this).addClass('se').siblings().removeClass('se');
   $(this).find('b').addClass('se');
    $('#toolbar .sub').addClass('sh');
     var cc = $('#toolbar .sele').find('li').index(this); 
     $('#toolbar .lizd').eq(cc).show().siblings().hide();//('sh'); 
  // alert(cc);
});
$('#arealist li').live("click",function(){
   $(this).addClass('xz').siblings().removeClass('xz');
	 var cc = $('#arealist').find('li').index(this); 
	 if($('#reginlist').html() == undefined){
	 	  $('#toolbar').find('.se').removeClass('se');
      $('#toolbar').find('.sh').removeClass('sh'); 
	    $('#toolbar').find('li').eq(1).html('<a>'+$(this).text()+'<b class=""></b></a>');
	    areaid = $(this).attr('areaid'); 
	    $('#supplierlist').html('');
      page = 1;
   	  can_show = true; 
	    shopdata(); 
	 }else{
	    $('#reginlist').find('ul').eq(cc).show().siblings().hide();
	 }
	 //alert('xxx');
});
$('#sorts li').live("click",function(){
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
$('.lizd li').live("hover",function(){
	$(this).addClass('tapclass').siblings().removeClass('tapclass');
});
$('#cuisien li').live('click',function(){
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
$('#reginlist li').live('click',function(){
	 $('#reginlist li').removeClass('xz');
	 $(this).addClass('xz');
	 $('#toolbar').find('.se').removeClass('se');
   $('#toolbar').find('.sh').removeClass('sh'); 
	 $('#toolbar').find('li').eq(1).html('<a>'+$(this).text()+'<b class=""></b></a>');
	 areaid = $(this).attr('childid'); 
	  $('#supplierlist').html('');
   page = 1;
   	can_show = true; 
	 shopdata(); 
})
function initshopshoplit(datas){ 
  if(datas.error == false){
  	//构造菜品菜单 
  	 if(datas.data.caipin.length > 0){
  	 	  $.each(datas.data.caipin, function(i,val){ 
  	 	  	$('#cuisien').append('<li id="'+val.id+'"><a>'+val.name+'</a></li>');
  	 	  });
  	 }
  	 if(datas.data.farea.length > 0){
  	 	   $.each(datas.data.farea, function(i,val){ 
  	 	   	  
  	 	   	  $('#arealist>ul').append('<li areaid="'+val.id+'" class="">'+val.name+'</li>'); 
  	 	   	   if(datas.data.area_grade  > 2){ 
  	 	   	   	if(i == 0){ 
  	 	   	   	  $('#reginlist').append('<ul style="display:block;"><li childid="" class="xz">全部</li></ul>');
  	 	   	   	}else{
  	 	   	   		$('#reginlist').append('<ul style="display:none;"></ul>');
  	 	   	   	}
  	 	   	   	  for(var j=0;j< datas.data.sarea.length;j++){
  	 	   	   	  	if(val.id == datas.data.sarea[j].parent_id){
  	 	   	   	  	    $('#reginlist').find('ul').eq(i).append('<li childid="'+datas.data.sarea[j].id+'">'+datas.data.sarea[j].name+'</li>');
  	 	   	   	     }
  	 	   	   	  	
  	 	   	   	  } 
  	 	   	   }  
  	 	   });
  	 }
  	 if(datas.data.area_grade  < 3){ 
  	 	   $('#reginlist').remove();
  	 } 
  	
  	
  }else{  	
  	Tmsg(datas); 
  }	
}