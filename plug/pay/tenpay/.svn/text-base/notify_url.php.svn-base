<?php

//---------------------------------------------------------
//支付成功回调接收,财付通后台调用此地址
//---------------------------------------------------------
$hopedir = '../../../';
$config = $hopedir."config/hopeconfig.php";   
$cfg = include($config);  
	
require_once("alipay.config.php");
require_once ("../classes/PayResponse.class.php");
require_once ("tenpay_config.php");


/* 创建支付结果反馈响应对象：支付跳转接口为异步返回，用户在财付通完成支付后，财付通通过回调return_url和notify_url向财付通APP反馈支付结果。 */
$resHandler = new PayResponse($key);
//获取通知id:支付结果通知id，支付成功返回通知id，要获取订单详细情况需用此ID调用通知验证接口。
echo $resHandler->getNotifyId();

// 告知财付通通知发送成功，如不加上下行代码会导致财付通不停里通知财付通app，即不停里调用财付通app的notify_url进行通知
$resHandler->acknowledgeSuccess();
// 开始通知验证，具体方法请参考notify_query.php的介绍

require_once ("../classes/NotifyQueryRequest.class.php"); 

/* 初始化通知验证请求:财付通APP接收到财付通的支付成功通知后，通过此接口查询订单的详细情况，以确保通知是从财付通发起的，没有被篡改过。 */
// 设置在沙箱中运行:正式环境请设置为false
$noqHandler = new NotifyQueryRequest($key);

// 设置在沙箱中运行，正式环境请设置为false
$noqHandler->setInSandBox(true);
//----------------------------------------
//以下请求业务参数名称参考开放平台sdk文档-PHP
//----------------------------------------
// 设置财付通App-id: 财付通App注册时，由财付通分配
$noqHandler->setAppid($appid);	

// 设置通知id:支付结果通知id，支付成功返回通知id，要获取订单详细情况需用此ID调用通知验证接口。
$noqHandler->setParameter("notify_id", "GamplMcX9Zl0E6shwd8p5c548DHnJWh7ZKkwCocL40j3Qwj6QkJZiOq5H-Ll2tYNRmP2K-NUga4=");          
// ************************************end*******************************

// 发送请求，并获取返回对象
$Response = $noqHandler->send();

// ********************以下返回业务参数名称参考开放平台sdk文档-PHP*************************
if($Response->isPayed()) {// 已经支付
	
	
	$out_trade_no = $Response->getParameter("out_trade_no");
	$total_fee = $Response->getParameter("total_fee")
	
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
   $info =  mysql_query("SELECT * from `".$cfg['tablepre']."onlinelog` where id = ".$out_trade_no." ");
   $backinfog = mysql_fetch_assoc($info);
   
   if(!empty($backinfog)){
    		if($backinfog['status'] == 0){
    			$checkcost = $backinfog['cost']*100;
    			if($checkcost == $total_fee){
    			 if($backinfog['type'] == 'order'){
    			 	//更新此状态为1
    			 	//更新订单
    			 	 mysql_query("UPDATE  `".$cfg['tablepre']."onlinelog` SET  `status` =  1 where `id`=".$out_trade_no." ");  
    			 	 mysql_query("UPDATE  `".$cfg['tablepre']."order` SET  `paystatus` =  1 where `id`=".$backinfog['upid']."");  
    		   }elseif($backinfog['type'] == 'acount'){
    		  	 mysql_query("UPDATE  `".$cfg['tablepre']."onlinelog` SET  `status` =  1 where `id`=".$out_trade_no." ");  
    		  	 mysql_query("UPDATE  `".$cfg['tablepre']."member` SET  `cost` =  `cost`+".$backinfog['cost']." where `uid`=".$backinfog['upid']."");  
    		  	  $info =  mysql_query("SELECT * from `".$cfg['tablepre']."member` where uid = ".$backinfog['upid']." ");
              $memberinfo = mysql_fetch_assoc($info);
              $dotime = time(); 
    		  		mysql_query("INSERT INTO `".$cfg['tablepre']."memberlog` (`id` ,`userid` ,`type` ,`addtype` ,`result` ,`addtime` ,`content` ,`title` ,`acount` )VALUES (NULL , '".$memberinfo['uid']."', '2', '1', '".$backinfog['cost']."', '".$dotime."', '在线充值', '使用支付宝在线充值".$backinfog['cost']."元', '".$memberinfo['cost']."');");


    			 }
    			}
    		}
    		// id  type  upid  cost  status  addtime 
   }
   mysql_close($lnk);   
   
   
   
	/*
	// 已经支付财付通app订单号
	echo "支付成功，应用订单号：" . $Response->getParameter("out_trade_no") . "<br/>";
	// 财付通app订单号对应的财付通订单号
	echo "财付通订单号:" . $Response->getParameter("transaction_id") . "<br/>";
	// 支付金额，单位：分
	echo "支付金额:" . $Response->getParameter("total_fee") . "<br/>";
	// 支付完成时间,格式为yyyymmddhhmmss,如20091227091010
	echo "支付完成时间:" . $Response->getParameter("time_end") . "<br/>";
	*/
	
	
	
}else {// 未正常支付，或者调用异常，如调用超时、网络异常
	
	
	//echo "支付状态说明:" . $Response->getPayInfo() . "<br/>";
}



?>