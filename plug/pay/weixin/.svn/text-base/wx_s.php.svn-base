<?php

/**
 * @class wx_s  微信menu 和客服信管理类
 */
class wx_s
{
	 private $wxtoken;//微信自定义 token
   private $wxappid; //微信  appid
   private $wxsecret;//微信  secret
   public $access_token; //操作令牌
   private $errId; //错误号
   private $menulist;//菜单信息
	 private $ticket;
	 private $userlist;
	 private $lookuser;
	 private $proxypassword = false;
	 private $sessionKey = '123456';//登录后所持有的SESSION KEY，即可通过login方法时创建
	 private $client;
	 private $mydir;
	 private  $errorcode = array(
	 '-1'=>'系统繁忙',
   '0'=>'请求成功',
   '40001'=>'获取access_token时AppSecret错误，或者access_token无效',
   '40002'=>'不合法的凭证类型',
   '40003'=>'不合法的OpenID',
   '40004'=>'不合法的媒体文件类型',
   '40005'=>'不合法的文件类型',
   '40006'=>'不合法的文件大小',
   '40007'=>'不合法的媒体文件id',
   '40008'=>'不合法的消息类型',
   '40009'=>'不合法的图片文件大小',
   '40010'=>'不合法的语音文件大小',
   '40011'=>'不合法的视频文件大小',
   '40012'=>'不合法的缩略图文件大小',
   '40013'=>'不合法的APPID',
   '40014'=>'不合法的access_token',
   '40015'=>'不合法的菜单类型',
   '40016'=>'不合法的按钮个数',
   '40017'=>'不合法的按钮个数',
   '40018'=>'不合法的按钮名字长度',
   '40019'=>'不合法的按钮KEY长度',
   '40020'=>'不合法的按钮URL长度',
   '40021'=>'不合法的菜单版本号',
   '40022'=>'不合法的子菜单级数',
   '40023'=>'不合法的子菜单按钮个数',
   '40024'=>'不合法的子菜单按钮类型',
   '40025'=>'不合法的子菜单按钮名字长度',
   '40026'=>'不合法的子菜单按钮KEY长度',
   '40027'=>'不合法的子菜单按钮URL长度',
   '40028'=>'不合法的自定义菜单使用用户',
   '40029'=>'不合法的oauth_code',
   '40030'=>'不合法的refresh_token',
   '40031'=>'不合法的openid列表',
   '40032'=>'不合法的openid列表长度',
   '40033'=>'不合法的请求字符，不能包含\uxxxx格式的字符',
   '40035'=>'不合法的参数',
   '40038'=>'不合法的请求格式',
   '40039'=>'不合法的URL长度',
   '40050'=>'不合法的分组id',
   '40051'=>'分组名字不合法',
   '41001'=>'缺少access_token参数',
   '41002'=>'缺少appid参数',
   '41003'=>'缺少refresh_token参数',
   '41004'=>'缺少secret参数',
   '41005'=>'缺少多媒体文件数据',
   '41006'=>'缺少media_id参数',
   '41007'=>'缺少子菜单数据',
   '41008'=>'缺少oauthcode',
   '41009'=>'缺少openid',
   '42001'=>'access_token超时',
   '42002'=>'refresh_token超时',
   '42003'=>'oauth_code超时',
   '43001'=>'需要GET请求',
   '43002'=>'需要POST请求',
   '43003'=>'需要HTTPS请求',
   '43004'=>'需要接收者关注',
   '43005'=>'需要好友关系',
   '44001'=>'多媒体文件为空',
   '44002'=>'POST的数据包为空',
   '44003'=>'图文消息内容为空',
   '44004'=>'文本消息内容为空',
   '45001'=>'多媒体文件大小超过限制',
   '45002'=>'消息内容超过限制',
   '45003'=>'标题字段超过限制',
   '45004'=>'描述字段超过限制',
   '45005'=>'链接字段超过限制',
   '45006'=>'图片链接字段超过限制',
   '45007'=>'语音播放时间超过限制',
   '45008'=>'图文消息超过限制',
   '45009'=>'接口调用超过限制',
   '45010'=>'创建菜单个数超过限制',
   '45015'=>'回复时间超过限制',
   '45016'=>'系统分组，不允许修改',
   '45017'=>'分组名字过长',
   '45018'=>'分组数量超过上限',
   '46001'=>'不存在媒体数据',
   '46002'=>'不存在的菜单版本',
   '46003'=>'不存在的菜单数据',
   '46004'=>'不存在的用户',
   '47001'=>'解析JSON/XML内容错误',
   '48001'=>'api功能未授权',
   '50001'=>'用户未授权该api');
	 //  微信access_token  服务令牌
	 //https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=ACCESS_TOKEN  微信发送信息  body
	 //https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN  微信 创建菜单
	 //https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=ACCESS_TOKEN  微信  删除菜单
	 //  返回信息
	 //  成功    {"errcode":0,"errmsg":"ok"}
	 //  失败     {"errcode":40018,"errmsg":"invalid button name size"}
	  function __construct(){
	  	global $cfg;
	  	global $hopedir;
	  	$this->wxtoken =  $cfg['wxtoken'];
	  	$this->wxappid =  $cfg['wxappid'];
	  	$this->wxsecret = $cfg['wxsecret'];
	  	$this->mydir = $hopedir;
    }
    //获取token
   function checktoken(){
     	$config =   $this->mydir."config/autorun.php";
      $tempinfo = include($config);
	  // 	$tempinfo = $config->getInfo();

	   	if(isset($tempinfo['access_token']) && isset($tempinfo['wx_time'])){
	   		 $btime = time() - $tempinfo['wx_time'];
	   		 if($btime < 7000){
	   		 	 $this->access_token = $tempinfo['access_token'];
	   		 	 return true;
	   		}

	   	}
	   	//通过post方法获取  当前token;
	   	$info = $this->vpost('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->wxappid.'&secret='.$this->wxsecret);

	   	$info = json_decode($info,true);

	   	if(isset($info['access_token'])){
	   		$test['access_token'] = $info['access_token'];
	   		$this->access_token = $info['access_token'];
	   		$test['wx_time'] = time();
	   		 $configStr = "<?php return {$test}?>";
      $fp = fopen($this->mydir.'config/autorun.php', 'w');
	      fwrite($fp, $configStr);
        fclose($fp);
	   		return true;
	   	}else{
	   		$this->errId=$info['errcode'];
	   	   return false;
	   	}
   }
   function gettoken(){
   	   if($this->checktoken()){
   	     return  $this->access_token;
   	   }else{
   	      return '获取失败';
   	   }
   }
   function menu(){
   	 if($this->checktoken()){
   	 	 $info = $this->vpost('https://api.weixin.qq.com/cgi-bin/menu/get?access_token='.$this->access_token);

   	 	 $info = json_decode($info,true);
   	 	 if(isset($info['errcode'])){

   	 	    if($info['errcode'] == 0){
   	 	    	return true;
   	 	    }else{
   	 	    	 $this->errId = $info['errcode'];
   	 	        return false;
   	 	    }
   	 	 }

   	 	 $this->menulist = $info;
   	 	 return true;
     }
     return false;
   }
   function savemenu($info){
      	if($this->checktoken()){
      	//	$data['body'] = json_encode($info);
      	//	echo $str;
      	/*
      	   $strpost = json_encode($info);
      	   logwrite($strpost);
      	   $strpost= preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))", $strpost);
          */
          //logwrite($info);
      	   $info = $this->vpost('https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->access_token,$info);

      	   $info = json_decode($info,true);
      	   if(isset($info['errcode'])){
      	     if($info['errcode'] == 0){
      	 	    	return true;
      	 	     }else{
      	 	     	 $this->errId = $info['errcode'];
      	 	        return false;
      	 	    }
      	  }
      	  $this->errId('-1');
      	  return false;
      }else{
      	  return false;
      }
   }
   function  tickets(){

   		if($this->checktoken()){

   			 $posttr = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": 123}}}';

   				$info = $this->vpost('https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$this->access_token,$posttr);

	       	$info = json_decode($info,true);

	        if(isset($info['errcode'])){
      	      if($info['errcode'] == 0){
      	 	    	return false;
      	 	     }else{
      	 	     	 $this->errId = $info['errcode'];
      	 	      return false;
      	 	    }
      	  }
      	  $this->ticket = $info['ticket'];
      	  return true;

      }else{

      	return false;
      }
   }
   function get_img(){
   	 if($this->tickets()){

   		  return 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.UrlEncode($this->ticket);

   	 }else{
   	    return '';
   	 }
   }
   function get_user($newxid = ''){

     if($this->checktoken()){

   				$info = $this->vpost('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->access_token.'&next_openid='.$newxid);
	       	$info = json_decode($info,true);
	        if(isset($info['errcode'])){
      	     if($info['errcode'] == 0){
      	 	    	return false;
      	 	     }else{
      	 	     	 $this->errId = $info['errcode'];
      	 	        return false;
      	 	    }
      	  }
      	  $this->userlist = $info;
      	  return true;

      }else{
      	return false;
      }
   }
   function showuserinfo($openid){
   	  if($this->checktoken()){
           $info = $this->vpost('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->access_token.'&openid='.$openid.'&lang=zh_CN');  //=OPENID&lang=zh_CN
           $info = json_decode($info,true);

	        if(isset($info['errcode'])){
      	     if($info['errcode'] == 0){
      	 	    	return true;
      	 	    }else{
      	 	     	 $this->errId = $info['errcode'];
      	 	        return false;
      	 	    }
      	  }else{
             $this->lookuser =$info;
             return true;
          }

     }else{
        return false;
     }
   }
   function getone(){
      return  $this->lookuser;
   }
   function userlist(){
     	return  $this->userlist;
   }
   //{"ticket":"gQG28DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL0FuWC1DNmZuVEhvMVp4NDNMRnNRAAIEesLvUQMECAcAAA==","expire_seconds":1800}
   function returnmenu(){

      return $this->menulist;
   }
   function sendmsg($msg,$useropenid){
      if($this->checktoken()){
      	  $poststr = '{"touser":"'.$useropenid.'","msgtype":"text","text":{"content":"'.$msg.'"}}';
   				$info = $this->vpost('https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$this->access_token,$poststr);

	       	$info = json_decode($info,true);
	        if(isset($info['errcode'])){
      	     if($info['errcode'] == 0){
      	 	    	return true;
      	 	     }else{
      	 	     	 $this->errId = $info['errcode'];
      	 	        return false;
      	 	    }
      	  }

      	  return true;

      }else{
      	return false;
      }
   }
   function err(){

      return  $this->errorcode[$this->errId];
   }
   //post提交数据
   //$post_string = "app=request&version=beta";
   function vpost($url,$data='',$cookie=''){ // 模拟提交数据函数
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
   // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    curl_setopt($curl, CURLOPT_REFERER,'');// 设置Referer
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    if (curl_errno($curl)) {
       echo 'Errno'.curl_error($curl);//捕抓异常
    }
    curl_close($curl); // 关闭CURL会话
    return $tmpInfo; // 返回数据
 }



}


?>
