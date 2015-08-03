<?php
  //reading raw POST data from input stream. reading pot data from $_POST may cause serialization issues since POST data may contain arrays
 
$hopedir = '../../../';
define('hopedir', $hopedir);  
$config = $hopedir."config/hopeconfig.php";   
$cfg = include($config); 
$mmc = include('paypal.config.php');
include($hopedir.'/lib/function.php');
  $raw_post_data = file_get_contents('php://input');
  $raw_post_array = explode('&', $raw_post_data);
  $myPost = array();
  foreach ($raw_post_array as $keyval)
  {
      $keyval = explode ('=', $keyval);
      if (count($keyval) == 2)
         $myPost[$keyval[0]] = urldecode($keyval[1]);
  }
  // read the post from PayPal system and add 'cmd'
  $req = 'cmd=_notify-validate';
  if(function_exists('get_magic_quotes_gpc'))
  {
       $get_magic_quotes_exits = true;
  } 
  foreach ($myPost as $key => $value)
  {        
       if($get_magic_quotes_exits == true && get_magic_quotes_gpc() == 1)
       { 
            $value = urlencode(stripslashes($value)); 
       }
       else
       {
            $value = urlencode($value);
       }
       $req .= "&$key=$value";
  }

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: www.paypal.com'));
// In wamp like environment where the root authority certificate doesn't comes in the bundle, you need
// to download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path 
// of the certificate as shown below.
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
$res = curl_exec($ch);
curl_close($ch);

/*
file_put_contents(dirname(__FILE__) . '/payresp/rc_req.txt', print_r($req, true));
file_put_contents(dirname(__FILE__) . '/payresp/rc_resp.txt', print_r($res, true));
file_put_contents(dirname(__FILE__) . '/payresp/rc_post.txt', print_r($_POST, true));
*/

// assign posted variables to local variables
$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
$invoice = $_POST['invoice'];

if (strcmp ($res, "VERIFIED") == 0) {
	// check the payment_status is Completed
	// check that txn_id has not been previously processed
	// check that receiver_email is your Primary PayPal email
	// check that payment_amount/payment_currency are correct
	// process payment
	
	if($payment_status != 'Completed'){
		 logwrite($receiver_email.'状态:'.$payment_status.',返回ID'.$txn_id);  
		 exit;
	}
   if($receiver_email  !=  $alipay_config['business']	){
     logwrite($receiver_email.'和设置不一致 ,返回ID'.$txn_id);
     exit;
  }
	// payment_amount   invoice
	 
	
	 $lnk = mysql_connect($cfg['dbhost'], $cfg['dbuser'], $cfg['dbpw']) or die ('Not connected : ' . mysql_error()); 
   $version = mysql_get_server_info(); 
   if($version > '4.1' && $cfg['dbcharset']) {
				mysql_query("SET NAMES '".$cfg['dbcharset']."'");
   } 
   if($version > '5.0') {
				mysql_query("SET sql_mode=''");
   } 
   if(!@mysql_select_db($cfg['dbname'])){ 
				if(@mysql_error()) {
					echo '数据库连接失败';exit;
				} else {
					mysql_select_db($cfg['dbname']);
	      }
   }
   $info =  mysql_query("SELECT * from `".$cfg['tablepre']."onlinelog` where id = ".$invoice." ");
   $backinfog = mysql_fetch_assoc($info);
   if(!empty($backinfog)){
    		if($backinfog['status'] == 0 && $backinfog['cost'] == $mc_gross){
    			 if($backinfog['type'] == 'order'){
    			 	//更新此状态为1
    			 	//更新订单
    			 	 mysql_query("UPDATE  `".$cfg['tablepre']."onlinelog` SET  `status` =  1 where `id`=".$invoice." ");  
    			 	 mysql_query("UPDATE  `".$cfg['tablepre']."order` SET  `paystatus` =  1 where `id`=".$backinfog['upid']."");  
    		   }elseif($backinfog['type'] == 'acount'){
    		  	 mysql_query("UPDATE  `".$cfg['tablepre']."onlinelog` SET  `status` =  1 where `id`=".$invoice." ");  
    		  	 mysql_query("UPDATE  `".$cfg['tablepre']."member` SET  `cost` =  `cost`+".$backinfog['cost']." where `uid`=".$backinfog['upid']."");  
    		  	  $info =  mysql_query("SELECT * from `".$cfg['tablepre']."member` where uid = ".$backinfog['upid']." ");
              $memberinfo = mysql_fetch_assoc($info);
              $dotime = time(); 
    		  		mysql_query("INSERT INTO `".$cfg['tablepre']."memberlog` (`id` ,`userid` ,`type` ,`addtype` ,`result` ,`addtime` ,`content` ,`title` ,`acount` )VALUES (NULL , '".$memberinfo['uid']."', '2', '1', '".$backinfog['cost']."', '".$dotime."', '在线充值', '使用支付宝在线充值".$backinfog['cost']."元', '".$memberinfo['cost']."');");
           }
           logwrite('支付成功'.$txn_id);
    		}else{
    			logwrite('金额不一致,返回ID'.$txn_id);
    		}
   }else{
       logwrite('获取待支付ID失败,返回ID'.$txn_id);
   } 
      mysql_close($lnk);       
}
else if (strcmp ($res, "INVALID") == 0) {
	// log for manual investigation
	logwrite('支付失败');
}
?>