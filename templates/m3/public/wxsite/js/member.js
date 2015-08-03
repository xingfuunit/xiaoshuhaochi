$(function(){ 
 	   if(is_open == true){
 	     	getuser();
 	   }
 	   $('#loading').hide(); 
 }); 
function getuser(){
	  //检测拥护 是否登陆  &openid='.$this->obj->FromUserName.'&='.$time.'&sign='.$tempstr
	  var openid= Request('openid');
	  var actime = Request('actime');
	   var sign = Request('sign'); 
	   var url = siteurl+'/index.php?ctrl=html5&action=getmember&openid='+openid+'&actime='+actime+'&sign='+sign+'&random=@random@'; 
 	   url = url.replace('@random@', 1+Math.round(Math.random()*1000));   
 	   $.getScript(url, function() {
           checklocation();
     });
}