<?php  

$incFile = fopen($logindir."/".$idtype."/paypal.config.php","w+") or die("请设置plug\pay\alipay\alipay.config.php的权限为777");
$notify_url = Mysite::$app->config['siteurl'].'/plug/pay/paypal/notify_url.php';
$return_url = Mysite::$app->config['siteurl'].'/plug/pay/paypal/return_url.php';
$cancel_return =  Mysite::$app->config['siteurl'].'/plug/pay/paypal/cancel_return.php';
$setting .= "<?php  \r\n";
$setting .=" \$alipay_config['business']		= '".IReq::get('business')."';\r\n";
$setting .=" \$alipay_config['currency_code']			= '".IReq::get('currency_code')."';\r\n"; 
$setting .=" \$alipay_config['input_charset']= strtolower('utf-8');\r\n"; 
$setting .= " \$alipay_config['transport'] = 'http';\r\n";
$setting .= " \$alipay_config['cacert']    = getcwd().'\\\\cacert.pem';\r\n";
$setting .= " \$notify_url= '".$notify_url."';\r\n";
$setting .= " \$return_url= '".$return_url."';\r\n";
$setting .= " \$cancel_return= '".$cancel_return."';\r\n"; 
$setting .= "?>";
$savedata['business']=IReq::get('business');
$savedata['currency_code']=IReq::get('currency_code'); 
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