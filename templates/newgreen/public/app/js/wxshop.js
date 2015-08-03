$(function(){ 
	//出始化数据
	/*出始化 菜单*/
	var bottommenu = $('.listshopfoot').find('.footico');
	$.each(bottommenu,function(i,field){  
		  var nowdata = $(field).attr('data');
		  var nowattr = $(field).attr('data1');
		  if(nowdata ==  taction){
		  	 $(field).addClass(nowattr);
		  }else{
		  	$(field).addClass(nowattr+'gray');
		  } 
	});
});