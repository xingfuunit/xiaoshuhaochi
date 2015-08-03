<?php 
/*
app消息通知类
*/
 
class appbuyclass
{
	 private $gwUrl = 'http://app.waimairen.com/app.php?';//访问地址
   private $user;//用户名
   private $secret;//密匙
   private $actime;//时间搓
   private $sign;//签名 
   private $otherlink; 
	 
	  function __construct(){ 	  
	  	$this->secret =  Mysite::$app->config['appsecret2'];
	  	$this->user =  Mysite::$app->config['appuser2'];  
	  	$this->actime = time();
	  	$checksign = md5(md5($this->user.$this->actime).$this->secret);
	  	$this->sign = $checksign; 
	  	$this->otherlink = '';
    }
    
   function bklink(){ 
   	  $weblink = $this->gwUrl.'user='.$this->user.'&sign='.$this->sign.'&actime='.$this->actime.$this->otherlink;  
    	$contentcccc =  file_get_contents($weblink);   
    	return $contentcccc;
   }
   /*
   $userID       用户ID
   $channelid  设备ID
   $message  用户通知显示信息
   $othermsg='' //其他  可以为空
   */
	  
   function sendmsg($userID,$channelid,$message,$othermsg='',$messagetype=1)
   {   
   	  $this->otherlink = '&userID='.$userID.'&channelid='.$channelid.'&message='.$message.'&othermsg='.$othermsg.'&messagetype='.$messagetype; 
	    $code = $this->bklink();
	    return $this->checkcode($code);  
   } 
	 function checkcode($code)
	 {
	 	  if($code == 'ok'){
	 	     return 'ok';//发送信息成功
	 	   
	 	  }else{
	 	    return $code;//其他错误
	 	  } 
	 } 

}
?>