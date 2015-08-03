<?php
class method   extends adminbaseclass
{

	 public function adminupload()
	 {
	 	 $func = IFilter::act(IReq::get('func'));
		 $obj = IReq::get('obj');
		 $uploaddir =IFilter::act(IReq::get('dir'));
	   if(is_array($_FILES)&& isset($_FILES['imgFile']))
	   {
	   	 $uploaddir = empty($uploaddir)?'goods':$uploaddir;
	  	 $json = new Services_JSON();
       $uploadpath = 'upload/'.$uploaddir.'/';
		   $filepath = '/upload/'.$uploaddir.'/';
       $upload = new upload($uploadpath,array('gif','jpg','jpge','doc','png'));//upload 自动生成压缩图片
       $file = $upload->getfile();
       if($upload->errno!=15&&$upload->errno!=0){
		     echo "<script>parent.".$func."(true,'".$obj."','".json_encode($upload->errmsg())."');</script>";
		   }else{
		      echo "<script>parent.".$func."(false,'".$obj."','".$filepath.$file[0]['saveName']."');</script>";

		   }
		   exit;
	   }
	   $data['obj'] = $obj;
	   $data['uploaddir'] = $uploaddir;
	   $data['func'] = $func;
	   Mysite::$app->setdata($data);
	 }
	 public function saveupload()
	 {
		  $json = new Services_JSON();
      $uploadpath = 'upload/goods/';
		  $filepath = '/upload/goods/';
      $upload = new upload($uploadpath,array('gif','jpg','jpge','png'));//upload
      $file = $upload->getfile();
     if($upload->errno!=15&&$upload->errno!=0) {
			$msg = $json->encode(array('error' => 1, 'message' => $upload->errmsg()));

		  }else{
			$msg = $json->encode(array('error' => 0, 'url' => $filepath.$file[0][saveName], 'trueurl' => $upload->returninfo['name']));
		 }
		 echo $msg;
		 exit;
	 }

	 function paylist(){
         
		//获取所有已安装接口
		/**获取登录接口文件夹下的所有接口说明文件**/
	     $logindir = plugdir.'/pay';
   
            $dirArray[]=NULL;
       
    
       if (false != ($handle = opendir ( $logindir ))) {
       
         $i=0;
         while ( false !== ($file = readdir ( $handle ))) {
             //去掉"“.”、“..”以及带“.xxx”后缀的文件
            
             if ($file != "." && $file != ".."&&!strpos($file,".")) {
               
                 if(file_exists($logindir.'/'.$file.'/set.php'))
                 {
                           
                 	  require_once($logindir.'/'.$file.'/set.php');
                          
                 	  $dirArray[$i]['data'] = $setinfo;
                       
                 	  $dirArray[$i]['filename'] =$file;
                        
                    $i++;
                 }
               
             }

         }


         //关闭句柄
         //if(!file_exists(hopedir.'/templates/'.$templtepach))//判断文件是否存在  判断配置文件是否存在
         closedir ( $handle );
        
    }

    $data['apilist'] = $dirArray;
    //paylist 支付接口表 id,name
    $exlist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist    order by id desc  limit 0, 50 ");
    $mlist = array();
    if(is_array($exlist))
    {
      foreach($exlist as $key=>$value)
      {          
    	  if(!empty($value['logindesc']))
    	  {       
    		  $mlist[] = $value['logindesc'];
    	  }
      }
    }
    $data['installlist'] = $mlist;
 
    Mysite::$app->setdata($data);
	 }


	 function installpay(){
	 	   $idtype = IReq::get('idtype');//$_GET['idtype'];
		  $logindir = plugdir.'/pay';

		  if(!file_exists($logindir.'/'.$idtype.'/set.php'))
      {
      	 //不存在配置文件
      	 $data['info'] = '安装文件不存在';
      }else{
      	//不存在配置文件
      	include_once($logindir.'/'.$idtype.'/set.php');
      	if($idtype == 'alipay'){
      		$data['info'] = alipayplugsdata();
      	}elseif($idtype == 'paypal'){
      		$data['info'] = paypalplugsdata();
      	} elseif($idtype == 'weixin') {
            $data['info'] = weixinplugsdata();
        }

        //$data['setinfo'] = plugsget($logindir,$idtype);
      }
      $getinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."paylist where loginname='".$idtype."'  ");
      $data['setinfo'] = json_decode($getinfo['temp'],true);

      $data['idtype']=$idtype;
        Mysite::$app->setdata($data);
	}
	function savepay()
	{
		  $idtype = IReq::get('idtype');
		  $logindir = plugdir.'/pay';

		  if(!file_exists($logindir.'/'.$idtype.'/save.php'))
      {
      	 //不存在配置文件
      	 $data['info'] = '设置文件不存在';
      }else{
      	//不存在配置文件

      	 $appid = IReq::get('appid');
      // echo $appid;
      	include_once($logindir.'/'.$idtype.'/save.php');
      }
      exit;
		// include_once($logindir.'/'.$file.'/save.php');
	}
	function delpay()
	{
		 $idtype = IReq::get('idtype');
		 if(empty($idtype))  $this->message('接口名称不能为空');
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'paylist',"loginname = '$idtype'");
	   $this->success('操作成功！ ');
	}
	function loginlist(){
		 $logindir = plugdir.'/login';
       $dirArray[]=NULL;
       if (false != ($handle = opendir ( $logindir ))) {
         $i=0;
         while ( false !== ($file = readdir ( $handle )) ) {
             //去掉"“.”、“..”以及带“.xxx”后缀的文件
             if ($file != "." && $file != ".."&&!strpos($file,".")) {
                 if(file_exists($logindir.'/'.$file.'/set.php'))
                 {
                 	  require_once($logindir.'/'.$file.'/set.php');
                 	  $dirArray[$i]['data'] = $setinfo;
                 	  $dirArray[$i]['filename'] =$file;

                    $i++;
                 }
             }

         }
         //关闭句柄
         //if(!file_exists(hopedir.'/templates/'.$templtepach))//判断文件是否存在  判断配置文件是否存在
         closedir ( $handle );

    }
    $data['apilist'] = $dirArray;
    $exlist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."otherlogin    order by id desc  limit 0, 50 ");
    $mlist = array();
    if(is_array($exlist))
    {
      foreach($exlist as $key=>$value)
      {
    	  if(!empty($value['logindesc']))
    	  {
    		  $mlist[] = $value['logindesc'];
    	  }
      }
    }
    $data['installlist'] = $mlist;
     Mysite::$app->setdata($data);
	}
	function installlogin(){
		 $idtype = IReq::get('idtype');//$_GET['idtype'];
		  $logindir = plugdir.'/login';
		  if(!file_exists($logindir.'/'.$idtype.'/set.php'))
      {
      	 //不存在配置文件
      	 $data['info'] = '安装文件不存在';
      }else{
      	//不存在配置文件
      	include_once($logindir.'/'.$idtype.'/set.php');
      	$data['info'] = $mkdata;
        //$data['setinfo'] = plugsget($logindir,$idtype);
      }
      $getinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."otherlogin where loginname='".$idtype."'  ");
      $data['setinfo'] = json_decode($getinfo['temp'],true);

      $data['idtype']=$idtype;
      Mysite::$app->setdata($data);
	}
	function dellogin()
	{
		  $idtype = IReq::get('idtype');
		  if(empty($idtype))  $this->message('接口名称不能为空');
	    $this->mysql->delete(Mysite::$app->config['tablepre'].'otherlogin',"loginname = '$idtype'");
	    $this->sucess('操作成功！ ');
	 }
	function savelogin(){
		 $idtype = IReq::get('idtype');
		  $logindir = plugdir.'/login';
		  if(!file_exists($logindir.'/'.$idtype.'/save.php'))
      {
      	 //不存在配置文件
      	 $data['info'] = '设置文件不存在';
      }else{
      	//不存在配置文件
      	 $appid = IReq::get('appid');
      // echo $appid;
      	include_once($logindir.'/'.$idtype.'/save.php');
      }
      exit;
	}
   function othertpl(){
    $default_tpl = new config('tplset.php',hopedir);
	 	$data['info'] = $default_tpl->getInfo();

	 	$data['allowedsendshop'] = Mysite::$app->config['allowedsendshop'];
	 	$data['allowedsendbuyer'] = Mysite::$app->config['allowedsendbuyer'];
	 	$data['ordercheckphone'] = Mysite::$app->config['ordercheckphone'];
	 	$list = array(
	 	               'emailfindtpl'=>'找回密码邮箱模板',
	 	                'shopphonetpl'=>'下单通知商家模版',
	 	                'userbuytpl'=>'下单通知用户模版',
	 	                'usercodetpl'=>'用户验证码模版',
	 	                'emailorder'=>'商家邮件模版',
	 	                'phoneunorder'=>'后台关闭订单短信通知模板',
	 	                'noticeunback'=>'退款失败通知',
	 	                'noticeback'=>'退款成功通知',
	 	                'noticemake'=>'商家制作订单通知',
	 	                'noticeunmake'=>'商家不制作订单通知',
	 	                'noticesend'=>'发货通知',
	 	             );
	 	if($data['allowedsendshop'] != 1){
	 		unset($list['shopphonetpl']);
	 	}
	 	if($data['allowedsendbuyer'] != 1){
	 		unset($list['userbuytpl']);
	 	}
	 	if($data['ordercheckphone'] != 1){
	 		unset($list['usercodetpl']);
	 	}
	  $data['list'] = $list;
	   Mysite::$app->setdata($data);
  }
  function edittpl(){
		$tplname = IReq::get('tplname');
		$default_tpl = new config('tplset.php',hopedir);
	 	$tpllist = $default_tpl->getInfo();
	 	$list = array( 'emailfindtpl'=>'找回密码邮箱模板',
	 	                'shopphonetpl'=>'下单通知商家模版',
	 	                'userbuytpl'=>'下单通知用户模版',
	 	                'usercodetpl'=>'用户验证码模版',
	 	                'emailorder'=>'商家邮件模版',
	 	                'phoneunorder'=>'后台关闭订单短信通知模板',
	 	                'usercodetpl'=>'用户验证码模版',
	 	                 'noticeunback'=>'退款失败通知',
	 	                'noticeback'=>'退款成功通知',
	 	                'noticemake'=>'商家制作订单通知',
	 	                'noticeunmake'=>'商家不制作订单通知',
	 	                'noticesend'=>'发货通知',
	 	                );
	 	$info = array_keys($list);
	 	if(!in_array($tplname,$info))
	 	{
	 		 header("Content-Type:text/html;charset=utf-8");
	 		echo '编辑模板错误';
	 		exit;
	 	}
	 	$data['tplname'] = $tplname;
	 	if(isset($tpllist[$tplname])){
	 		$data['tplcontent'] = htmlspecialchars_decode($tpllist[$tplname]);
	 	}
	 	 Mysite::$app->setdata($data);
	}
	function savetpl(){
		$tplname = trim(IReq::get('tplname'));
		$tplcontent = trim(IReq::get('tplcontent'));
		$list = array('emailfindtpl'=>'找回密码邮箱模板',
	 	                'shopphonetpl'=>'下单通知商家模版',
	 	                'userbuytpl'=>'下单通知用户模版',
	 	                'usercodetpl'=>'用户验证码模版',
	 	                'emailorder'=>'商家邮件模版',
	 	                'phoneunorder'=>'后台关闭订单短信通知模板',
	 	               'usercodetpl'=>'用户验证码模版',
	 	                'noticeunback'=>'退款失败通知',
	 	                'noticeback'=>'退款成功通知',
	 	                'noticemake'=>'商家制作订单通知',
	 	                'noticeunmake'=>'商家不制作订单通知',
	 	                'noticesend'=>'发货通知',
	 	                );
	 	$info = array_keys($list);
	 	if(!in_array($tplname,$info)){
	 		echo "不在操作模板内";
	 		exit;
	 	}

	 	$siteinfo[$tplname] = stripslashes($tplcontent);
		 $default_tpl = new config('tplset.php',hopedir);
	   $default_tpl->write($siteinfo);

		 echo "<meta charset='utf-8' />";
     echo "<script>parent.uploadsucess('设置成功');</script>";
     exit;
	}

	function cleartpl(){
		IFile::clearDir('templates_c');
		$link = IUrl::creatUrl('/adminpage/system/module/index');
		$this->refunction('清除缓存文件成功',$link);
	}
	function emailsetsave()
	{
		$start_smtp = IReq::get('start_smtp');
		if($start_smtp ==1)
		{
	    $siteinfo['smpt'] = IReq::get('smpt');
	    $siteinfo['emailname'] = IReq::get('emailname');
	    $siteinfo['emailpwd'] = IReq::get('emailpwd');
	  }else{
	  	 $siteinfo['smpt'] = '';
	    $siteinfo['emailname'] = '';
	    $siteinfo['emailpwd'] = '';
	  }
	  $config = new config('hopeconfig.php',hopedir);
	  $config->write($siteinfo);
	   $this->success('操作成功！ ');
	}
	function smssetsave()
	{
	    $config = new config('hopeconfig.php',hopedir);
	    $siteinfo['smstype'] = IReq::get('smstype');
	    if($siteinfo['smstype'] == 1){
	    	  $siteinfo['smkey'] = IReq::get('smkey');
	        $siteinfo['smpassword'] = IReq::get('smpassword');
	        $siteinfo['smacount'] = IReq::get('smacount');

	        $siteinfo['smeName'] = IReq::get('smeName');
	          $siteinfo['smlinkMan'] = IReq::get('smlinkMan');
	        $siteinfo['smphoneNum'] = IReq::get('smphoneNum');
	        $siteinfo['smmobile'] = IReq::get('smmobile');
	          $siteinfo['smemail'] = IReq::get('smemail');
	          $siteinfo['smfax'] = IReq::get('smfax');
	      $siteinfo['smaddress'] = IReq::get('smaddress');
	        $siteinfo['smpostcode'] = IReq::get('smpostcode');
	       if(empty($siteinfo['smkey'])) $this->message('账号不能为空');
	       if(empty($siteinfo['smpassword'])) $this->message('密码不能为空');
	       if(empty($siteinfo['smacount'])) $this->message('KEY不能为空');
	       if(empty($siteinfo['smeName'])) $this->message('公司名称不能为空');
	       if(empty($siteinfo['smlinkMan'])) $this->message('联系人不能为空');
	       if(empty($siteinfo['smphoneNum'])) $this->message('联系电话不能为空');
	       if(empty($siteinfo['smmobile'])) $this->message('联系手机不能为空');
	       if(empty($siteinfo['smemail'])) $this->message('联系人邮箱不能为空');
	       if(empty($siteinfo['smfax'])) $this->message('传真号不能为空');
	       if(empty($siteinfo['smaddress'])) $this->message('联系地址不能为空');
	       if(empty($siteinfo['smpostcode'])) $this->message('邮政编码不能空');
	       $docheck['smkey'] = $siteinfo['smkey'];
	       $docheck['smpassword'] = $siteinfo['smpassword'];
	       $docheck['smacount'] = $siteinfo['smacount'];
	       $config->write($docheck);
	       $sendmobile = new mobile();
	       $checkinfo = $sendmobile->login();
	       if($checkinfo != 'ok'){
	    	   $this->message($checkinfo);
	       }
	        $checkinfo = $sendmobile->registDetailInfo($siteinfo);
	       if($checkinfo !='ok'){
	    	  $this->message($checkinfo);
	        }
	    }else{
	    	$siteinfo['sms86ac'] =IReq::get('sms86ac');
		    $siteinfo['sms86pd'] = IReq::get('sms86pd');
		    $siteinfo['smstype'] = IReq::get('smstype');
	    	if(empty($siteinfo['sms86ac'])) $this->message('账号不能为空');
	    	if(empty($siteinfo['sms86pd'])) $this->message('密码不能为空');

	    }
	    $config->write($siteinfo);
	    $this->success('操作成功！ ');
	}
	//获取余额
	function smgetbalance(){
		 $sendmobile = new mobile();
		 $info = $sendmobile->getBalance();
		 echo $info;
		 exit;
	}
	function smtopay(){
		$smcard = trim(IReq::get('smcard'));
		$smpwd = trim(IReq::get('smpwd'));
		if(empty($smcard)) $this->message('卡号不能空');
		if(empty($smpwd)) $this->message('密码不能为空');
		$sendmobile = new mobile();
	  $checkinfo = $sendmobile->chargeUp($smcard,$smpwd);
	  if($checkinfo !='ok'){
	    	 $this->message($checkinfo);
	  }
	  $this->success('操作成功！ ');
	}
	function basedata(){
			$data['dirname']=time();
     	$data['list'] =	$this->mysql->gettales();
   	  Mysite::$app->setdata($data);
	}
	function savesqldata(){
			$tabelname = IReq::get('tabelname');
		$dirname = IReq::get('dirname');
		//创建文件夹
		IFile::mkdir(hopedir.'/dbbak/'.$dirname);
		/***获取数据***/

			$info = $this->mysql->getarr("show create table `$tabelname`");

		$sqldata[] = $info['0']['Create Table'];


		$list = $this->mysql->getarr("select * from ".$tabelname."      limit 0, 20000 ");
		if(is_array($list)){
       foreach($list as $key=>$value){
    	 $keys = array_keys($value);
    	 $key = array_map('addslashes', $keys);
       $key = join('`,`', $key);
       $keys = "`" . $key . "`";
       $vals = array_values($value);
       $vals = array_map('addslashes', $vals);
       $vals = join("','", $vals);
       $vals = "'" . $vals . "'";
       $sqldata[]= "INSERT INTO `$tabelname`($keys) VALUES($vals)";
      }
    }
     $configData = var_export($sqldata,true);
	  $configStr = "<?php return {$configData}?>";
    $fp = fopen(hopedir.'/dbbak/'.$dirname.'/'.$tabelname.'.php', 'w');
    fputs($fp, $configStr);
    fclose($fp); //保存 建表语句
    $this->success('操作成功！ ');
	}
	function rebkdata(){
		$list = array();
		$handler = opendir(hopedir.'/dbbak');
	  while( ($filename = readdir($handler)) !== false )
    {
      if($filename != '.' && $filename != '..'){
         $list[]=$filename;
      }
    }
    closedir($handler);
    $data['list'] = $list;
    $data['tablist'] =	$this->mysql->gettales(); //tablist
    $detfault = array_values($data['tablist']);
    $data['deftb'] = $detfault[0];
      Mysite::$app->setdata($data);
	}
	function savebkdata(){
			$tabelname = IReq::get('tabelname');
		if(empty($tabelname)) $this->message('表名为空，跳过执行');
		$dirname = IReq::get('dirname');
		if(empty($dirname)) $this->message('文件夹名为空，跳过执行');
		if(!file_exists(hopedir.'/dbbak/'.$dirname))$this->message('文件夹不存在');
		if(!file_exists(hopedir.'/dbbak/'.$dirname.'/'.$tabelname.'.php')) $this->message('未找到'.$tabelname.'备份文件跳过');

		 $this->mysql->query('DROP TABLE  `'.$tabelname.'`');
		 $infos = include(hopedir.'/dbbak/'.$dirname.'/'.$tabelname.'.php');
		if(is_array($infos)){
		 foreach($infos as $key=>$value){
		 	$this->mysql->query($value);
		 }
		}

		$this->success('还原'.$tabelname.'表成功');

	}
	function debkfile(){
			$dirname = IReq::get('dirname');
		if(empty($dirname)) $this->message('文件名为空');
		IFile::clearDir(hopedir.'/dbbak/'.$dirname);
		IFile::rmdir(hopedir.'/dbbak/'.$dirname);
	  $this->success('操作成功！ ');
	}
	function errlog(){
   	  $list = array();
	  	$handler = opendir(hopedir.'/log');
	    while( ($filename = readdir($handler)) !== false )
      {
        if($filename != '.' && $filename != '..'){
         $list[]=$filename;
        }
      }
      closedir($handler);
      $data['list'] = $list;
   	  Mysite::$app->setdata($data);
   }
   function delerrlog(){
		  $dirname = IReq::get('dirname');
	  	if(empty($dirname)) $this->message('文件名为空');
	  	IFile::unlink(hopedir.'/log/'.$dirname);
	   $this->success('操作成功！ ');
   }
   function download(){
  		$dirname = IReq::get('dirname');
  		if(empty($dirname)){
  		 echo '文件不存在';
  		 exit;
  		}
  		if(!file_exists(hopedir.'log/'.$dirname))//创建文件
      {
      	 echo '文件不存在';
  		   exit;
      }
     $file = fopen(hopedir.'/log/'.$dirname,"r"); // 打开文件
     Header("Content-type: application/octet-stream");
     Header("Accept-Ranges: bytes");
     Header("Accept-Length: ".filesize(hopedir.'/log/'.$dirname));
     Header("Content-Disposition: attachment; filename=" . $dirname);
     echo fread($file,filesize(hopedir.'/log/'.$dirname));
     fclose($file);
     exit();
   }

}



?>
