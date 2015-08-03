$(function(){ 
   if($('#cataloglist').html() != undefined){ 
   	  url = siteurl+'/index.php?ctrl=site&action=catalog&random=@random@';
	  url = url.replace('@random@', 1+Math.round(Math.random()*1000)); 
	  $.get(url, function(result){
        $("#cataloglist").html(result);
		
  			$('.n_marketbox .one').hover(function() {
				$(this).addClass('n_navon');
				trancertcatalog($(this).attr('data'),0);
				},function(){	
				$(this).removeClass("n_navon");
			});
			
			$('.n_snavidem li').hover(function() {
                $(this).addClass('n_selected');
				var cpinid =  $('#cataloglist .n_navon').eq(0).attr('data');
                var cddata = $(this).attr('data');
                trancertcatalog(cpinid,cddata);
				},function(){	
			        	$(this).removeClass("n_selected");
            }); 
        }); 
   } 
	
});
function closeNev(ids){
	$('.n_navon').removeClass('n_navon');
}
function trancertcatalog(cpid,areaid){
  var  shopurl = siteurl+"/index.php?ctrl=site&action=changeshop&id=@id@";
	//var  trancertcatalog
	var checkhtml = $('#one_'+cpid).find('.shopshowid').eq(0).html(); 
	if(checkhtml == ''){ 
	     $.each(catalogdata, function(i,val){   
	     	  var fengwei_id = val.cpids.split(','); 
          if(in_array(cpid,fengwei_id)){ 
          	 var tempurl =  shopurl.replace('@id@', val.id);
          	var htmls = '<li shop_id="" data="'+val.areaids+'"  >	<a target="_blank"   href="'+tempurl+'">'+val.shopname+'</a> </li> ';
          	$('#one_'+cpid).find('.shopshowid').eq(0).append(htmls);
          	
          }
	     	    
       })
	}
	if(areaid == 0){
	   //	$('#one_'+cpid+' .shopshowid').find('li').show();
	     
	}else{
			$('#one_'+cpid+' .shopshowid').find('li').hide();
		  var obj = $('#one_'+cpid+' .shopshowid').find('li');
		  $.each(obj, function(i,objc){   
		  	 var fengwei_id = $(objc).attr('data'); 
		    	fengwei_id = fengwei_id.split(',');
		  	  if(in_array(areaid,fengwei_id)){  
            	$(objc).show();
          }
		  });
		
	}
	//shopshowid
}

function in_array(e,arr)
{
	   for(i=0;i<arr.length;i++)
	   {
	   	if(arr[i] == e)
	   	return true;
	   }
	   return false;
}
/*
 
*/