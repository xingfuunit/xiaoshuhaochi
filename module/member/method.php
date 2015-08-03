<?php
/*
*   method 方法  包含所有会员相关操作
    管理员/会员  添加/删除/编辑/用户登陆
    用户日志其他相关连的通过  memberclass关联
*/

class method   extends baseclass
{ 
	 function index(){ 
	 	    
	 	    	if(empty($this->member['uid'])){
	 	    		 $link = IUrl::creatUrl('member/login');
           $this->refunction('',$link); 
	 	    	}else{
	 	    	 $link = IUrl::creatUrl('member/base');
           $this->refunction('',$link); 
          }
	 	    
	 }
	function base(){
	  $this->checkmemberlogin();
	   $temparea =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area   ");
	   $areatoname = array();   
	   foreach($temparea as $key=>$value){
	   	$areatoname[$value['id']] = $value['name'];
	   }
	   $areatoname[0] = '';
	   $data['areatoname'] = $areatoname; 
	     $nowday = date('Y-m-d',time()); 
	 //   $where = '  and posttime > '.strtotime($nowday.' 00:00:00').' and posttime < '.strtotime($nowday.' 23:59:59');  
	    $where = ' and status < 3';
		  $data['temp'] =  $this->mysql->select_one("select count(id) as shuliang from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."'  ".$where."  and shoptype=1 order by id desc  limit 0,6"); //商城订单
	 
		  $data['temp2'] =  $this->mysql->select_one("select count(id) as shuliang from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."'  ".$where."  and shoptype=0 order by id desc  limit 0,6"); 
		 
		 $data['temp3'] =  $this->mysql->select_one("select count(id) as shuliang from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."'  ".$where."   and shoptype=0 order by id desc  limit 0,6"); 
		 $data['temp4'] =  $this->mysql->select_one("select count(id) as shuliang from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' and status = 3 and is_ping =0 order by id desc  limit 0,6");  
	   
		 Mysite::$app->setdata($data);
	}
	  
	  
	  
	  
   
	 //后台管理员登陆
	 function adminlogin(){
	 	   $signup_name =  IFilter::act(IReq::get('signup_name'));   
  	   $signup_password =  IFilter::act(IReq::get('signup_password'));   
  	   if(!empty($signup_name)){
  	       	$userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."admin where username ='".$signup_name."'"); 
  	     	  if(empty($signup_password))
  	        {
  	            $this->message('signup_password_tip'); 	 
  	        }
  	        if($userinfo['password'] != md5($signup_password))
  	       {
  	            $this->message('signup_password_tip'); 	  
  	        }
  	        $data['loginip'] = IClient::getIp();
  	        $data['logintime'] = time();
  	       $this->mysql->update(Mysite::$app->config['tablepre'].'admin',$data,"uid='".$userinfo['uid']."'");	
         	 ICookie::set('adminname',$userinfo['username'],86400);
           ICookie::set('adminpwd',$signup_password,86400);
           ICookie::set('adminuid',$userinfo['uid'],86400);  
  	   	   $this->success('操作成功'); 
  	   } 
	 }
	 //后台管理员登出
	 function adminloginout(){
	 	 ICookie::clear('adminname'); 
	    ICookie::clear('adminpwd');  
	    ICookie::clear('adminuid');  
	    ICookie::clear('adminshopid'); 
      $link = IUrl::creatUrl('member/adminlogin');
      $this->refunction('',$link); 
	 }
	 function login(){ 
	    $uname = IFilter::act(IReq::get('uname')); 
	    $pwd = IFilter::act(IReq::get('pwd')); 
	    $link = IUrl::creatUrl('member/login'); 
	    $logincode = intval(IFilter::act(IReq::get('logincode'))); 
	    if(!empty($logincode)){
	    	ICookie::set('logincode',$logincode,86400);
	    }
	    if(!empty($uname)){
		    if(empty($uname)) $this->message('帐号不能为空',$link);
		    if(empty($pwd)) $this->message('密码不能为空',$link);  
		    $logintype = IFilter::act(IReq::get('logintype')); 
		    if($logintype != 'html5'){
		      if(Mysite::$app->config['allowedcode'] == 1)
		      { 
		 	       $Captcha = IFilter::act(IReq::get('Captcha'));
		 	       if($Captcha != ICookie::get('Captcha')) 	$this->message('验证码错误',$link); 
		      }  
		    }
	      if(!$this->memberCls->login($uname,$pwd,$code=false)){
	    	    $this->message($this->memberCls->ero(),$link); 
	      }  
        $link = IUrl::creatUrl('member/base');
        $this->success('',$link);
      }
	 }
         function codelogin () {

                   $regphonecode = ICookie::get('regphonecode');
	 	   $regphone = ICookie::get('regphone');
                  
         }
         
	 function loginout(){
	    $this->memberCls->loginout(); 
      $link = IUrl::creatUrl('site/index');
      $this->refunction('',$link);  
	 }
	 function payoncard(){
	 	  $this->checkmemberlogin();
	 }
	 
	 function paylog(){
	 	  $this->checkmemberlogin();
  	 	$data['sitetitle'] = '资金变换记录'; 
  		$data['nowdate'] = date('Y-m-d',(time() - 30*24*60*60));
  		
  		$status = intval(IFilter::act(IReq::get('status')));
  		$starttime =  IFilter::act(IReq::get('starttime'));
  		$endtime =  IFilter::act(IReq::get('endtime'));
  		$starttime = empty($starttime)?  time() - 30*24*60*60:strtotime($starttime.' 00:00:01');
  		$endtime = empty($endtime)? time():strtotime($endtime.' 23:59:59');
  		
  		$statusarr = array(1=>'',2=>' and addtype != 1 ',3=>' and addtype = 1'); 
  		$where = in_array($status,array(1,2,3)) ? $statusarr[$status]:'';
  		$where .= ' and addtime > '.$starttime.' and '.$endtime;
  		$data['where'] = ' userid = '.$this->member['uid'].' and type=2 '.$where;
  		Mysite::$app->setdata($data);
   }
   
   
   
   function jifenlog(){
   	 $this->checkmemberlogin();
  	 $data['sitetitle'] = '积分记录表'; 
  	  $what = trim(IFilter::act(IReq::get('what'))); 
  	  $query = array('out'=>' and addtype != 1','in'=>' and addtype = 1');
  	  $where = in_array($what,array('out','in'))? $query[$what]:'';
  	  $data['what'] = in_array($what,array('out','in'))? $what:'';
  	  $link = in_array($what,array('out','in'))? '/member/jifenlog/what/'.$what.'/page/@page@':'/membercenter/jifenlog/page/@page@';
      $data['where'] = ' userid =\''.$this->member['uid'].'\' and type=1 '.$where;
       Mysite::$app->setdata($data); 
	 }
	 
	 function safepwd(){
		//'oldpaypwd':$('#oldpaypwd').val(),'newpaypwd':$('#newpaypwd').val(),'verifynewpaypwd':$('#').val()
		$this->checkmemberlogin();
		$oldpaypwd = trim(IFilter::act(IReq::get('oldpaypwd')));
		$newpaypwd = trim(IFilter::act(IReq::get('newpaypwd')));
		$verifynewpaypwd = trim(IFilter::act(IReq::get('verifynewpaypwd')));
		if($this->member['safepwd'] != ''){
	    if(md5($oldpaypwd) != $this->member['safepwd']) $this->message('旧密码和设置密码不一致,修改失败');
		}
		if(empty($newpaypwd)) $this->message('新密码不能设置为空');
		if($newpaypwd !=  $verifynewpaypwd) $this->message('新密码和确认密码不一致');
		$data['safepwd'] = md5($newpaypwd);
		$this->mysql->update(Mysite::$app->config['tablepre'].'member',$data,"uid ='".$this->member['uid']."' ");	
		 $this->success('操作成功'); 
	 }
	 function edituser(){
	 	$this->checkmemberlogin();
	  $data['showaction'] = IFilter::act(IReq::get('showaction'));  
		$data['sitetitle'] = '修改密码';
		 Mysite::$app->setdata($data);
	 }
	 function saveuser(){ 
	 	 //$this->checkmemberlogin();
	 	  $controlname = IFilter::act(IReq::get('controlname')); 
 	     switch($controlname)
 	     {
 	     	  case 'username':
 	     	    $arra['username'] = trim(IFilter::act(IReq::get('obj')));  
 	     	    if(!(IValidate::len($arra['username'],2,20)))$this->message('联系人名长度不能小于2个大于20个');  
 	     	    $checkinfo = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."member where username='".$arra['username']."'");  
 	     	    if($checkinfo > 0) $this->message('用户名已存在修改失败');
 	     	    $this->mysql->update(Mysite::$app->config['tablepre'].'member',$arra,'uid = '.$this->member['uid'].' ');  
 	     	     $this->success('操作成功'); 
 	     	  break;
 	     	  case 'email':
 	     	    $arra['email'] = trim(IFilter::act(IReq::get('obj')));  
 	     	     if(!empty($this->member['email'])) $this->message('邮箱已录入不可修改');
 	     	    if(!(IValidate::email($arra['email'])))$this->message('请录入正确的邮箱格式');  
 	     	    $checkinfo = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."member where email='".$arra['email']."'");  
 	     	    if($checkinfo > 0) $this->message('邮箱已存在修改失败');
 	     	    $this->mysql->update(Mysite::$app->config['tablepre'].'member',$arra,'uid = '.$this->member['uid'].' ');  
 	     	     $this->success('操作成功'); 
 	     	  break;
 	     	  case 'mobile':
 	     	    $arra['phone'] = trim(IFilter::act(IReq::get('obj')));  
 	     	    if(!empty($this->member['phone'])) $this->message('手机号已录入不可修改');
 	     	    if(!(IValidate::suremobi($arra['phone'])))$this->message('请录入正确的手机号码');  
 	     	     $checkinfo = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."member where phone='".$arra['phone']."'");   
 	     	    if($checkinfo > 0) $this->message('手机号已存在修改失败');
 	     	    $checkinfo = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."member where phone='".$arra['phone']."'");  
 	     	    $this->mysql->update(Mysite::$app->config['tablepre'].'member',$arra,'uid = '.$this->member['uid'].' ');  
 	     	     $this->success('操作成功'); 
 	     	  break;
 	     	  case 'pwd':
 	     	  $pwd =  IFilter::act(IReq::get('pwd')); 
           	  $newpwd = IFilter::act(IReq::get('newpwd'));  
	          $newpwd2 = IFilter::act(IReq::get('newpwd2'));  
	          if(empty($pwd))$this->message('原始密码不能为空'); 
	          $checkpass = md5($pwd); 
	          if($checkpass != $this->member['password']) $this->message('原密码和帐号密码不一致');  
	          if(empty($newpwd))$this->message('新密码不能为空'); 
	          if($newpwd != $newpwd2)$this->message('新密码和确认密码不一致');  
	          $arr['password'] = md5($newpwd);  
            $this->mysql->update(Mysite::$app->config['tablepre'].'member',$arr,"uid='".$this->member['uid']."'"); 
            $this->memberCls->loginout();
	        $this->success('操作成功'); 
                break;
                  case 'repwd':      
                  $phone =  IFilter::act(IReq::get('phone')); 
                  $shoid=IFilter::act(IReq::get('shopid'));
                  $phone = IFilter::act(IReq::get('phone'));  
                  $newpwd = IFilter::act(IReq::get('newpwd'));  
	          $newpwd2 = IFilter::act(IReq::get('newpwd2'));  
                  $code = IFilter::act(IReq::get('code'));  
                  $regphonecode = ICookie::get('regphonecode');
                  if (empty($phone)) $this->message ("手机号不能为空");
                  if(empty($code))$this->message('验证码不能为空'); 
                  if(empty($newpwd))$this->message('新密码不能为空'); 
                  if($newpwd != $newpwd2)$this->message('新密码和确认密码不一致'); 
                  
                   if($code != $regphonecode)$this->message('验证码错误'); 
                    $arr['password'] = md5($newpwd);  
                  
                 if(!(IValidate::suremobi($phone))) $this->message('联系手机格式错误');
                 $this->mysql->update(Mysite::$app->config['tablepre'].'member',$arr,"phone='".$phone."'");
 	         $link = IUrl::creatUrl('wxsite/login');
                 $this->success('操作成功',$link); 
                       
                    
                 default:
 	     	  $this->message('未定义的操作');
 	     	  break;
 	     	  
 	     } 
	 }
	 function linktest(){
	 	  $logintype = IFilter::act(IReq::get('logintype')); 
	 	  if(empty($logintype)){
	 		   $this->message('登录接口不存在'); 
	 	  }  
	 	  $logindir = hopedir.'/plug/login/'.$logintype;
	 	  if(!file_exists($logindir.'/login.php'))
      { 
      	$this->message('登录接口不存在');
      }  
      $apiinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."otherlogin where loginname='".$logintype."'  ");
	 	   if(empty($apiinfo)){
	 	   	     $this->message('接口未安装');
	 	   } 
      include_once($logindir.'/login.php');  
	 }
	 function otherlogin(){
	  
	 	  $logintype = IFilter::act(IReq::get('logintype')); 
	 	  if(empty($logintype)){
	 		    $this->message('登录接口不存在'); 
	 	  } 
	 	  $logindir = hopedir.'/plug/login/'.$logintype;
	 	  if(!file_exists($logindir.'/back.php'))
      { 
      	$this->error('登录接口不存在');
       } 
       $apiinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."otherlogin where loginname='".$logintype."'  ");
	 	   if(empty($apiinfo)){
	 	   	     $this->message('接口未安装');
	 	   }
	 	   include_once($logindir.'/back.php');  
	 }
	 function bandaout(){
	 	   $logintype = ICookie::get('adlogintype');
	 	   $token = ICookie::get('adtoken');
	 	   $openid = ICookie::get('adopenid'); 
	 	   if(empty($logintype)){
	 	   	   $this->message('未获取到接口信息');
	 	   }
	 	   if(!empty($this->member['uid'])){ 
	 	   	  $this->message('已登录不可操作'); 
	 	   } 
	 	   $apiinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."otherlogin where loginname='".$logintype."'  ");
	 	   if(empty($apiinfo)){
	 	   	     $this->message('接口未安装');
	 	   }
	 	   $data['apiinfo'] = $apiinfo;
	 	   $data['uid'] = $this->member['uid'];
	 	   $data['allowedcode'] =  Mysite::$app->config['allowedcode']; 
	 	   $data['apiuname'] = ICookie::get('apiuname');
	 	   $data['apiemail'] = ICookie::get('apiemail');
	 	   $data['apilogo'] = ICookie::get('apilogo');
	 	   
	 	   Mysite::$app->setdata($data); 
	 }
	 function saveregester()
	 {
	 	 if(!empty($this->member['uid']))
	 	 {
	 		 $this->message('已登陆不可注册');
	 	 }
	 	 $tname = IFilter::act(IReq::get('tname'));  
           $password = IFilter::act(IReq::get('pwd')); 
           $email = IFilter::act(IReq::get('email'));  
           $phone = IFilter::act(IReq::get('phone')); 
	   $password2 = IFilter::act(IReq::get('pwd2'));  
	   $phoneyan =  IFilter::act(IReq::get('phoneyan')); 
	   $checklogin =  IFilter::act(IReq::get('checklogin'));
           $regestercode =  IFilter::act(IReq::get('regestercode'));       
           if (empty($password)) $this->message('密码不能为空');
	   if($password2 != $password){
		     $this->message('2次密码不一致');
		 }
		 if($checklogin !=  ''){
                
		    if(Mysite::$app->config['regestercode'] == 1 || $regestercode == 1)
		    {
                       
		    	   if(empty($phoneyan)) $this->message('验证码不能为空');
		    	   if(!empty($phone)){
		    	   	    $checkcode =    ICookie::get('regphonecode');
		    	   	    if($phoneyan != $checkcode) $this->message('手机验证码错误');
		    	   }elseif(!empty($email)){
		    	   	   $checkcode =    ICookie::get('regemailcode');
		    	   	   if($phoneyan != $checkcode) $this->message('邮箱验证码错误');
		    	   }
		    }else{
         if(Mysite::$app->config['allowedcode'] == 1)
		     {
		    	   $Captcha = IFilter::act(IReq::get('Captcha'));
		    	  if($Captcha != ICookie::get('Captcha')) 	$this->member('验证码错误'); 
		     }
		   }
	  }
		  
		 //code check 外面
		 
		 if($this->memberCls->regester($email,$tname,$password,$phone,5)){ 
		 	   $this->memberCls->login($tname,$password);
		 	   $this->success('操作成功');
		 }else{
		 	 $this->message($this->memberCls->ero());
		 } 
	 }
	 
	 function checkemail()
	 { 
	     $uname = IFilter::act(IReq::get('uname'));   
	    if($this->memberCls->checkemail($uname)){ 
	    	$this->success('error');
	     
	    }else{  
	      $this->message('true');
	    } 
	 }
	 function checkname()
	 {
	    $uname = IFilter::act(IReq::get('uname'));    
	    if($this->memberCls->checkname($uname)){
	    	$this->success('error');
	    }else{
	    	 $this->message($this->memberCls->ero());
	    } 
	 }
	function savefind(){ 
	 	  $uname =IFilter::act(IReq::get('uname'));  
	 	 if($this->memberCls->findpwd($uname)){
	 	 	  $this->success('操作成功');
	 	 }else{ 
	 	 	$this->message($this->memberCls->ero());
	 	 } 
	}
	function payonline(){
		//在线支付
		$this->checkmemberlogin();
		$paytype='alipay';
	 	$cost = intval(IReq::get('cost'));
	 	if($cost < 10) $this->message('充值金额不能少于10元');
	 	$paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
		if(is_array($paylist)){
		  foreach($paylist as $key=>$value){
			   $paytypelist[] =$value['loginname'];		 
		  }
	  }
		if(!in_array($paytype,$paytypelist)){
		  $this->message('未定义的支付方式');
		} 
		$paydir = hopedir.'/plug/pay/'.$paytype;
	 	if(!file_exists($paydir.'/pay.php'))
    { 
      	$this->message('支付方式文件不存在');
    } 
	 	$dopaydata = array('type'=>'acount','upid'=>$this->member['uid'],'cost'=>$cost);//支付数据
    include_once($paydir.'/pay.php');  
	}
	 
	//发送邮箱验证码
	function regesteremail(){
		  $regestercode = Mysite::$app->config['regestercode'];
		   $checkcode =    ICookie::get('regemailcode');
		   $checkphone =   ICookie::get('regemail');
		   $checktime =   ICookie::get('regtime'); 
      if(empty($regestercode)){
    	 	echo 'noshow(\'不需要验证CODE\')';
    	 	exit;
    	} 
      if(!empty($checkcode)){
      	  $backtime = $checktime-time();
		  	 if($backtime > 0){ 
		  	   echo 'showsendemail(\''.$checkphone.'\','.$backtime.')';
		  	   exit;
		  	 }
		  } 
    	if(!empty($this->member['uid'])){
    	  echo 'noshow(\'已登陆\')';
    	  exit;
    	} 
      $email = IFilter::act(IReq::get('email')); 
      if(!(IValidate::email($email))){
      		echo '';
      		exit;
      }
      $userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where email='".$email."' ");
      if(!empty($userinfo))
      {
        	 echo 'noshow(\'邮箱已注册\')';
        	 exit;
      } 
       
      
       $makecode =  mt_rand(10000,99999);
       $title =Mysite::$app->config['sitename'].'注册验证码';
       $smtp = new ISmtp(Mysite::$app->config['smpt'],25,Mysite::$app->config['emailname'],Mysite::$app->config['emailpwd'],false); 
       $content = '欢迎注册'.Mysite::$app->config['sitename'].'会员,注册验证码为:'.$makecode;
       $info = $smtp->send($email, Mysite::$app->config['emailname'],$title,$content , "" , "HTML" , "" , "");  
      ICookie::set('regemailcode',$makecode,600);
      ICookie::set('regemail',$email,600);
      $longtime = time()+60;
      ICookie::set('regtime',$longtime,60);
      echo 'showsendemail(\''.$email.'\',60)';
      exit; 
	}
	//发送手机验证码
	function regesterphone(){
          
		   $regestercode = Mysite::$app->config['regestercode'];
		   $checkcode =    ICookie::get('regphonecode');
		   $checkphone =   ICookie::get('regphone');
		   $checktime =   ICookie::get('regtime'); 
                   $code_back = IReq::get('code_back');
            
  
      if(!empty($checkcode)){
      	  $backtime = $checktime-time();
		  	 if($backtime > 0){ 
		  	   echo 'showsend(\''.$checkphone.'\','.$backtime.')';
		  	   exit;
		  	 }
		  } 
    	if(!empty($this->member['uid'])){
    	  echo 'noshow(\'已登陆\')';
    	  exit;
    	} 
      $phone = IFilter::act(IReq::get('phone')); 
      if(!(IValidate::suremobi($phone))){
      		 echo 'noshow(\'手机号码格式不正确\')';
      		exit;
      }
      $userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where phone='".$phone."' ");
      
      if(!empty($userinfo)&&$code_back=="0")
      {
        	 echo 'noshow(\'手机号码已注册\')';
        	 exit;
      } 
      $makecode =  mt_rand(1000,9999);

      $sendmobile = new mobile(); 
     
	     $contents =  '【小树好吃】您的验证码是：' . $makecode; 
	     if(Mysite::$app->config['smstype'] == 2){//139邮箱转发短信
	        	          	//使用sms10086cn发送/
	        	       $APIServer = 'http://www.sms-10086.cn/Service.asmx/sendsms?'; 
	                       $weblink = $APIServer.'zh='.trim(Mysite::$app->config['sms86ac']).'&mm='.trim(Mysite::$app->config['sms86pd']).'&hm='.$phone.'&nr='.urlencode($contents).'&dxlbid=27'; 
	        	             $contentcccc =  file_get_contents($weblink);  
	        	             logwrite('验证短信发送:'.$contentcccc); 
	     }else{
	         //使用sms10086cn发送/
	         $phoneids = array();
	         $phoneids[] =$phone; 
                 
	         $chekcinfo = $sendmobile->sendsms($phoneids,$contents); 
                if ($chekcinfo) { 
               $data=array("phone"=>$phone, "addtime"=>time(), "code"=>$makecode, "is_send"=>$chekcinfo);
               $this->mysql->insert(Mysite::$app->config['tablepre'].'mobile',$data); 
                }
                 
	         logwrite('验证短信发送:'.$chekcinfo);  
	    }   
      
      ICookie::set('regphonecode',$makecode,600);
      ICookie::set('regphone',$phone,600);
      $longtime = time()+60;
      ICookie::set('regtime',$longtime,60);
      echo 'showsend(\''.$phone.'\',60)';
      exit; 
	}
        function checkcodenum ($code="", $phone="", $password) {
                    
             $code_check = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."mobile where code=".$code." ");
             $click_time = time() - 600;
             if (empty($code_check)) {
                 $this->message('无效的验证码');
             } 
           else if ($code_check['addtime'] < $click_time && $phone==$code_check['phone']) {
                 $this->message('验证码已经超时');
             }
           else if ($code_check['addtime'] > $click_time && $phone==$code_check['phone']) {
                 $this->changepwd();
           }
             
         } 
        
        function changepwd () {
            $res =  $this->mysql->update(Mysite::$app->config['tablepre'].'order',$udata,"id='".$orderinfo['id']."'");
            if ($res) $this->success ("修改成功 ");
        }
        
	function shoploginin(){
		
		  $uname = IFilter::act(IReq::get('uname')); 
	    $pwd = IFilter::act(IReq::get('pwd'));  
	   if(empty($uname)) $this->message('帐号不能为空');
		 if(empty($pwd)) $this->message('密码不能为空');  
		 if(Mysite::$app->config['allowedcode'] == 1)
	   {
		 	     $Captcha = IFilter::act(IReq::get('Captcha'));
		 	     if($Captcha != ICookie::get('Captcha')) 	$this->message('验证码错误'); 
	   }  
	   
	   if(!$this->memberCls->login($uname,$pwd)){ 
	       $this->message($this->memberCls->ero()); 
	   }   
	   $checkuid = $this->memberCls->getuid();
	   $userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where    is_pass=1 and uid=".$checkuid." ");
     if(empty($userinfo)) $this->message('未开店或者店铺审核未通过'); 
	    ICookie::set('adminshopid',$userinfo['id'],86400); 
	    $this->success('操作成功');
	}
	 
	   function resetpwd()
	 {
	 	 if(!empty($this->member['uid']))
	 	 {
	 		 $link = IUrl::creatUrl('member/base');
       $this->message('',$link); 
	 	 }
	 	 $username = trim(IFilter::act(IReq::get('username'))); 
     $sign = trim(IFilter::act(IReq::get('sign')));
     $uid = intval(IFilter::act(IReq::get('uid')));
     $link = IUrl::creatUrl('member/findpwd');
     $newpwd = trim(IFilter::act(IReq::get('newpwd'))); 
     $newpwd2 = trim(IFilter::act(IReq::get('newpwd2')));  
     $data['error'] = '';
     if(!empty($newpwd)){
     if($this->memberCls->resetpwd($username,$sign,$uid,$newpwd,$newpwd2)){
     	if($this->memberCls->ero() == 'ok'){
     		 $link = IUrl::creatUrl('member/login');
            $this->message('重置密码成功',$link); 
     	}else{
      	$data['error'] = $this->memberCls->ero();
     	} 
     	
     }else{
     //$data['error'] = $this->memberCls->ero();
     	$link = IUrl::creatUrl('member/findpwd');
      $this->message($this->memberCls->ero(),$link); 
     }
     }
     $data['sitetitle'] = '重置密码';
     $data['actionlink'] = '/index.php/member/resetpwd/uid/'.$uid.'/username/'.$username.'/sign/'.$sign;
    Mysite::$app->setdata($data); 
	 }
	   
  function drawbacklog(){
  	 if(empty($this->member['uid']))
	 	 {
	 		 $link = IUrl::creatUrl('member/login');
       $this->message('',$link); 
	 	 }
   
  }
  //保存退款申请
  function savedrawbacklog(){
  	if(empty($this->member['uid']))
	 	 {
	 		  $this->message('未登陆');
	 	 }
	 	 
  	 $dno = trim(IFilter::act(IReq::get('dno'))); 
  	 $data['reason'] = trim(IFilter::act(IReq::get('reason'))); 
  	 $data['content'] = trim(IFilter::act(IReq::get('content'))); 
  	 $data['phone'] = trim(IFilter::act(IReq::get('phone'))); 
  	 $data['contactname'] = trim(IFilter::act(IReq::get('contactname')));  
  	 if(empty($dno)) $this->message('订单编号错误');
  	 if(empty($data['reason'])) $this->message('请录入退款原因');
  	 if(empty($data['content'])) $this->message('请录入收款信息'); 
  	 if(!(IValidate::suremobi($data['phone']))) $this->message('联系手机格式错误');
  	 if(empty($data['contactname'])) $this->message('联系人不能为空');
  	 $orderinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where dno='".$dno."' "); 
  	 if(empty($orderinfo)) $this->message('订单获取失败');
  	 if($orderinfo['buyeruid'] != $this->member['uid']) $this->message('订单不属于您');
  	 if($orderinfo['paystatus'] != 1) $this->message('订单未支付');
  	 if($orderinfo['status'] < 1 && $orderinfo['status'] < 3)$this->message('订单状态不可操作');
  	 if($orderinfo['paytype'] == 'outpay') $this->message('货到支付订单不可申请退款');
  	 if(!empty($orderinfo['is_reback'])) $this->message('订单已申请过退款，不可重复提交');
  	 $checklog = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."drawbacklog where orderid='".$orderinfo['id']."' "); 
  	 if(!empty($checklog)) $this->message('订单已受理记录，不可再提交');
  	 $data['orderid'] = $orderinfo['id'];
  	 $data['uid'] = $this->member['uid'];
  	 $data['username'] = $this->member['username'];
  	 $data['status'] = 0;
  	 $data['addtime'] = time();
  	 $data['cost'] = $orderinfo['allcost'];
  	  $this->mysql->insert(Mysite::$app->config['tablepre'].'drawbacklog',$data);   
  	  $udata['is_reback'] = 1;
  	  $this->mysql->update(Mysite::$app->config['tablepre'].'order',$udata,"id='".$orderinfo['id']."'"); 
  	  $this->success('操作成功'); 
  }
   
   
    function loginbycode () {
            $uname = IFilter::act(IReq::get('uname')); 
            $code = IFilter::act(IReq::get('code'));
            
	    $link = IUrl::creatUrl('member/login'); 
	    $logincode = intval(IFilter::act(IReq::get('logincode'))); 
	    if(!empty($logincode)){
	    	ICookie::set('logincode',$logincode,86400*365);
	    }
	
                    if(empty($uname)){
                        $this->message('手机不能为空',$link);exit;
                    } 
                    if(empty($code)){
                        $this->message('验证码不能为空',$link);exit;
                    } 
		    $logintype = IFilter::act(IReq::get('logintype')); 
		  
		      if(!(IValidate::suremobi($uname))) $this->message('联系手机格式错误');
		 	//$checkcode =    ICookie::get('regphonecode');
                         $res = $this->mobilecodecheck($uname, $code);
                         if ($res['success']=='no') {
                             $this->message($res['msg']);
                         }
		    	    //if($code != $checkcode) $this->message('手机验证码错误');
		       
		    
	      if (!$this->memberCls->login($uname,$pwd="",$code=true)) {
	    	    $this->message($this->memberCls->ero(),$link); 
	      }  
        $link = IUrl::creatUrl('member/base');
        $this->success('',$link);
      
        }
        /*
         * 验证码检查
         * $prams $uname:手机号
         * $code 验证码
         */
  
  function mobilecodecheck ($uname, $code) {
    
      $check = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."mobile where phone='".$uname."' order by id desc limit 1"); 
                   
                        if (!$check) {
                             $res = array ("success" => "no", "msg" => "该手机号码不存在"); 
                        }
                        $checkcode = $check['code'];
                        $tbltime = $check['addtime'];
                        $now_time = time(); 
                        if ($now_time-$tbltime>600 && $code == $check['code']) {
                            $res = array ("success" => "no", "msg" => "验证码已经过期");
                        }
                       else if ($now_time-$tbltime<600 && $code !== $check['code']) {
                            $res = array ("success" => "no", "msg" => "验证码错误");
                        }
                       else if ($now_time-$tbltime<600 && $code == $check['code']) {
                            $res = array ("success" => "yes", "msg" => "验证成功");
                        }
                        else {
                             $res = array ("success" => "no", "msg" => "验证错误");
                        }
                             return $res;
                             exit;   
                    }
}



?>