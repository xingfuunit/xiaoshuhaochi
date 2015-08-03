<?php
$incFile = fopen($logindir."/".$idtype."/WxPayPubHelper/WxPay.pub.config.php","w+") or die("请设置".$logindir."/".$idtype."/WxPayPubHelper/WxPay.pub.config.php的权限为777");
$notify_url = Mysite::$app->config['siteurl'].'/plug/pay/'.$idtype.'/notify_url.php';
$return_url = Mysite::$app->config['siteurl'].'/plug/pay/'.$idtype.'/return_url.php';
$token_url =  Mysite::$app->config['siteurl'].'/index.php?controller=wxsite&action=gotopay';
$setting .= "<?php  \r\n";
$setting .= "class WxPayConf_pub { \r\n";
$setting .= " const APPID = '".IReq::get('appid')."';\r\n";
$setting .=" const MCHID = '".IReq::get('mchid')."';\r\n";
$setting .=" const KEY   = '".IReq::get('key')."';\r\n";
$setting .=" const APPSECRET = '".IReq::get('appsecret')."';\r\n";
$setting .= " const SSLCERT_PATH = '/plug/pay/weixin/WxPayPubHelper/cacert/apiclient_cert.pem';\r\n";
$setting .= " const SSLKEY_PATH    = '/plug/pay/weixin/WxPayPubHelper/cacert/apiclient_key.pem';\r\n";
$setting .= " const NOTIFY_URL = '".$notify_url."';\r\n";
$setting .= " const JS_API_CALL_URL = '".$token_url."';\r\n";
$setting .= " const CURL_TIMEOUT = 30;\r\n";
$setting .= " }\r\n";
$setting .= "?>";
$savedata['appid']=IReq::get('appid');
$savedata['mchid']=IReq::get('mchid');
$savedata['key']=IReq::get('key');
$savedata['appsecret']=IReq::get('appsecret');
//$savedata['mchid']=IReq::get('mchid');
if(fwrite($incFile, $setting)){
  //print_r($savedata);exit;
          $taskinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."paylist where loginname='".$idtype."'  ");
        	  include_once($logindir.'/'.$idtype.'/set.php');
        	  $ssdata['loginname'] = $idtype;
        	  $ssdata['logindesc'] = $setinfo['name'];
        	  $ssdata['logourl'] = Mysite::$app->config['siteurl'].'/plug/pay/'.$idtype.'/images/'.$setinfo['logourl'];
        	  $ssdata['temp'] = json_encode($savedata);
        	  //$ssdata['type'] = 2;
            //print_r($taskinfo);exit;
        	  if(empty($taskinfo))
        {
          //echo 5555;exit;
  	      	$this->mysql->insert(Mysite::$app->config['tablepre'].'paylist',$ssdata);  //写消息表
        }	else{
        	   unset($ssdata['loginname']);
        	 	 $this->mysql->update(Mysite::$app->config['tablepre'].'paylist',$ssdata,"loginname='".$idtype."'");
        }
        echo "<meta charset='utf-8' />";
         echo "<script>parent.uploadsucess('配置成功');</script>";
         exit;
}



?>
