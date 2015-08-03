<?php  

$incFile = fopen($logindir."/".$idtype."/tenpay_config.php","w+") or die("请设置plug\pay\tenpay\tenpay_config.php的权限为777");
$notify_url = Mysite::$app->config['siteurl'].'/plug/pay/tenpay/notify_url.php';
$return_url = Mysite::$app->config['siteurl'].'/plug/pay/tenpay/return_url.php'; 
$setting .= "<?php  \r\n";
$setting .=" \$appid		= '".IReq::get('appid')."';\r\n";
$setting .=" \$key		= '".IReq::get('key')."';\r\n"; 
$setting .= " \$notify_url= '".$notify_url."';\r\n";
$setting .= " \$return_url= '".$return_url."';\r\n"; 
$setting .= "?>";
$savedata['appid']=IReq::get('appid');
$savedata['key']=IReq::get('key'); 
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