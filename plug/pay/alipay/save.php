<?php

//保存支付宝手机支付
$incFilehtml = fopen($logindir."/".$idtype."/html5/alipay.config.php","w+") or die("请设置plug\pay\alipay\html5\alipay.config.php的权限为777");
$htmlnotify_url = Mysite::$app->config['siteurl'].'/plug/pay/alipay/html5/notify_url.php';
$htmlreturn_url = Mysite::$app->config['siteurl'].'/plug/pay/alipay/html5/call_back_url.php';
$htmlerror = Mysite::$app->config['siteurl'].'/plug/pay/alipay/html5/error.php';

$htmlesett = "<?php  \r\n";
$htmlesett .="\$alipay_config['partner']		= '".IReq::get('partner')."'; \r\n";
$htmlesett .="\$alipay_config['key']			= '".IReq::get('key')."'; \r\n";
$htmlesett .="\$alipay_config['private_key_path']	= '".$logindir."/".$idtype."/html5/key/rsa_private_key.pem';\r\n";
$htmlesett .="\$alipay_config['ali_public_key_path']= '".$logindir."/".$idtype."/html5/key/alipay_public_key.pem';\r\n";
$htmlesett .="\$alipay_config['sign_type']    = 'MD5';\r\n";
$htmlesett .="\$alipay_config['input_charset']= 'utf-8'; \r\n";
$htmlesett .="\$alipay_config['cacert']    = getcwd().'\\\\cacert.pem';\r\n";
$htmlesett .="\$alipay_config['transport']    = 'http';\r\n";
$htmlesett .="\$alipay_config['notify_url'] = '".$htmlnotify_url."';\r\n";
$htmlesett .="\$alipay_config['return_url'] = '".$htmlreturn_url."';\r\n";
$htmlesett .="\$alipay_config['error_url'] = '".$htmlerror."';\r\n";
$htmlesett .="\$alipay_config['seller_email'] = '".IReq::get('seller_email')."';\r\n";
$htmlesett .= "?>";
fwrite($incFilehtml, $htmlesett);

$incFile = fopen($logindir."/".$idtype."/alipay.config.php","w+") or die("请设置plug\pay\alipay\alipay.config.php的权限为777");
$notify_url = Mysite::$app->config['siteurl'].'/plug/pay/alipay/notify_url.php';
$return_url = Mysite::$app->config['siteurl'].'/plug/pay/alipay/return_url.php';
$setting .= "<?php  \r\n";
$setting .=" \$alipay_config['partner']		= '".IReq::get('partner')."';\r\n";
$setting .=" \$alipay_config['key']			= '".IReq::get('key')."';\r\n";
$setting .=" \$alipay_config['sign_type']    = strtoupper('MD5');\r\n";
$setting .=" \$alipay_config['input_charset']= strtolower('utf-8');\r\n";
$setting .= " \$alipay_config['transport'] = 'http';\r\n";
$setting .= " \$alipay_config['cacert']    = getcwd().'\\\\cacert.pem';\r\n";
$setting .= " \$notify_url= '".$notify_url."';\r\n";
$setting .= " \$return_url= '".$return_url."';\r\n";
$setting .= " \$seller_email= '".IReq::get('seller_email')."';\r\n";
$setting .= "?>";
$savedata['partner']=IReq::get('partner');
$savedata['key']=IReq::get('key');
$savedata['seller_email']=IReq::get('seller_email');
 if(fwrite($incFile, $setting)){

        $taskinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."paylist where loginname='".$idtype."'  ");

        	  include_once($logindir.'/'.$idtype.'/set.php');
        	  $ssdata['loginname'] = $idtype;
        	  $ssdata['logindesc'] = $setinfo['name'];
        	  $ssdata['logourl'] = Mysite::$app->config['siteurl'].'/plug/pay/'.$idtype.'/images/'.$setinfo['logourl'];
        	  $ssdata['temp'] = json_encode($savedata);

        	  if(empty($taskinfo))
        {

  	      	$this->mysql->insert(Mysite::$app->config['tablepre'].'paylist',$ssdata);  //写消息表
        }	else{
        	   unset($ssdata['loginname']);
        	 	 $this->mysql->update(Mysite::$app->config['tablepre'].'paylist',$ssdata,"loginname='".$idtype."'");
        }
        echo "<meta charset='utf-8' />";
         echo "<script>parent.uploadsucess('配置成功');</script>";
         exit;

  }else{
        echo "Error";
  }

?>
