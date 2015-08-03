<?php
session_start();  
require_once(plugdir."/login/qq/API/comm/config.php");
 
 
require_once(CLASS_PATH."QC.class.php");
 
 
$qc = new QC();
 
$acs= $qc->qq_callback();
$opid = $qc->get_openid(); 
 
 
$qc = new QC($acs,$opid);
$arr = $qc->get_user_info();   
if(empty($opid)){
    $this->message($logintype.'登录接口获取信息失败noopid，请联系管理员');
}
if(!is_array($arr)){
	$this->message($logintype.'接口获取信息失败noinfo，请联系管理员');
}
 
/**判断信息是否写到数据库中***/

//第三方登录表 结构:oauth   id uid  token openid type addtime   
//31天  *24 * 60 *60  26784400     
$nowtime = time()-26784400;
$oauthinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."oauth where openid='".$opid."' and addtime > ".$nowtime." and type = '".$logintype."' ");
$link = IUrl::creatUrl('member/bandaout');
$uid = ICookie::get('uid'); 
if(empty($oauthinfo)){
	$data['uid'] = $this->member['uid'];
	$data['token'] = $acs;
	$data['openid'] = $opid;
	$data['type'] = $logintype;
	$data['addtime'] = time();
	$this->mysql->insert(Mysite::$app->config['tablepre'].'oauth',$data);  
	if(!empty($this->member['uid'])){
		$link = IUrl::creatUrl('member/base');
	}else{  
	  ICookie::set('adlogintype',$logintype,86400); 
	  ICookie::set('adtoken',$acs,86400); 
	  ICookie::set('adopenid',$opid,86400); 
	  ICookie::set('nickname',$opid,86400); 
	 
  }
	/***设置session**/ 
}else{
	if($oauthinfo['uid'] == 0){ 
	  /***设置session**/
	  if(!empty($this->member['uid'])){
	  	$this->mysql->update(Mysite::$app->config['tablepre'].'oauth',array('uid'=>$this->member['uid']),"openid='".$opid."' and type = '".$oauthinfo['type']."'");
	  	$link = IUrl::creatUrl('member/base');
	  }else{
	    ICookie::set('adlogintype',$logintype,86400); 
	    ICookie::set('adtoken',$acs,86400); 
	    ICookie::set('adopenid',$opid,86400);
	    ICookie::set('nickname',$opid,86400); 
	     
	  }
	}else{   
	  if($uid > 0){
	  	   $link = IUrl::creatUrl('member/base');/*跳转到用户中心*/ 
	  }else{  
	  	$userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where  uid  = '".$oauthinfo['uid']."'"); 
	  	if(empty($userinfo)){
	  		$this->message('账号未查找到,关联账号是否被删除');
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
	      	    
	             $mess['content'] = '用户登陆赠送积分'.Mysite::$app->config['loginscore'].'总积分'.$data['score'];
	           
               $this->memberCls->addlog($userinfo['uid'],1,1,Mysite::$app->config['loginscore'],'每天登陆',$mess['content'],$data['score']);
            // $this->mysql->insert(Mysite::$app->config['tablepre']."message",$mess);  
            
            
            
	       }
	    }
	   $this->mysql->update(Mysite::$app->config['tablepre'].'member',$data,"uid='".$userinfo['uid']."'");	 
	   ICookie::set('logintype',$logintype,86400);
     ICookie::set('uid',$userinfo['uid'],86400); 
     $link = IUrl::creatUrl('member/base');/*跳转到用户中心*/
	  } 
	}
} 
$this->message('',$link); 
?>