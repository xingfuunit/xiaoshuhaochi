<?php
session_start(); 
$sinaconfig = include(plugdir."/login/sina/config/config.php");  
define( "WB_AKEY" , $sinaconfig['appid']);
define( "WB_SKEY" , $sinaconfig['appkey']);
define( "WB_CALLBACK_URL" , $sinaconfig['callback']); 
require_once(plugdir."/login/sina/saetv2.ex.class.php");
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	try {
		$token = $o->getAccessToken( 'code', $keys ) ;
	} catch (OAuthException $e) {
		$this->error($logintype.'登录'.$e.'请联系管理员');
	}
}
$uid = '';
$user_message = '';
if ($token) {
	$_SESSION['token'] = $token;
	setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token'] );
  $ms  = $c->home_timeline(); // done
  $uid_get = $c->get_uid();
  $uid = $uid_get['uid'];
  $user_message = $c->show_user_by_id($uid);//根据ID获取用户等基本信息
  
}else {
   $this->error($logintype.'登陆回掉信息获取失败，请联系管理员');
   exit;
}
$opid = $uid;
$acs = $token['access_token']; 

 
$uname = $user_message['screen_name'];
$uemail = $uid.'@sina.com';
$ulogo = $user_message['profile_image_url'];
 

$nowtime = time()-26784400;
$oauthinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."oauth where openid='".$opid."' and addtime > ".$nowtime." and type = '".$logintype."' ");
$link = IUrl::creatUrl('member/bandaout');
$uid = ICookie::get('uid'); 
if(empty($oauthinfo)){
	$data['uid'] = empty($this->memberinfo)?0:$this->memberinfo['uid'];
	$data['token'] = $acs;
	$data['openid'] = $opid;
	$data['type'] = $logintype;
	$data['addtime'] = time();
	$this->mysql->insert(Mysite::$app->config['tablepre'].'oauth',$data);  
	if(!empty($this->memberinfo)){
		$link = IUrl::creatUrl('member/base');
	}else{  
	  ICookie::set('adlogintype',$logintype,86400); 
	  ICookie::set('adtoken',$acs,86400); 
	  ICookie::set('adopenid',$opid,86400); 
	  ICookie::set('nickname',$opid,86400); 
	  
	  ICookie::set('apiuname',$uname,86400); 
	  ICookie::set('apiemail',$uemail,86400); 
	  ICookie::set('apilogo',$ulogo,86400);  
	  
  }
	/***设置session**/ 
}else{
	if($oauthinfo['uid'] == 0){ 
	  /***设置session**/
	  if(!empty($this->memberinfo)){
	  	$this->mysql->update(Mysite::$app->config['tablepre'].'oauth',array('uid'=>$this->memberinfo['uid']),"openid='".$opid."' and type = '".$oauthinfo['type']."'");
	  	$link = IUrl::creatUrl('member/base');
	  }else{
	    ICookie::set('adlogintype',$logintype,86400); 
	    ICookie::set('adtoken',$acs,86400); 
	    ICookie::set('adopenid',$opid,86400);
	    ICookie::set('nickname',$opid,86400); 
	    
	    ICookie::set('apiuname',$uname,86400); 
	  ICookie::set('apiemail',$uemail,86400); 
	  ICookie::set('apilogo',$ulogo,86400);  
	  }
	}else{   
	  if($uid > 0){
	  	   $link = IUrl::creatUrl('member/base');/*跳转到用户中心*/ 
	  }else{  
	  	$userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where  uid  = '".$oauthinfo['uid']."'"); 
	  	if(empty($userinfo)){
	  		$this->error('账号未查找到,关联账号是否被删除');
	  	}
	    $data['loginip'] = IClient::getIp();
	    $data['logintime'] = time();
	    $checktime = date('Y-m-d',time());
	    $checktime = strtotime($checktime);
	    if($userinfo['logintime'] < $checktime)
	    {
	   	   if(Mysite::$app->config['loginscore'] > 0)
	   	   {
	   	      $data['score'] = $userinfo['score']+Mysite::$app->config['loginscore'];
	   	      $mess['userid'] = $userinfo['uid'];
	          $mess['username']  ='';
	          $mess['content'] = '用户登陆赠送积分'.Mysite::$app->config['loginscore'].'总积分'.$data['score'];
	          $mess['addtime'] = $data['logintime']; 
            $this->mysql->insert(Mysite::$app->config['tablepre']."message",$mess);  
	       }
	    }
	   $this->mysql->update(Mysite::$app->config['tablepre'].'member',$data,"uid='".$userinfo['uid']."'");	 
	   ICookie::set('logintype',$logintype,86400);
     ICookie::set('uid',$userinfo['uid'],86400); 
     $link = IUrl::creatUrl('member/base');/*跳转到用户中心*/
	  } 
	}
}
$this->refunction('',$link); 
?>