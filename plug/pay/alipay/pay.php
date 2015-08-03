<?php  
//获取支付内容 
if(empty($dopaydata)){
   $this->message('支付数据为空');
}
//写在线支付数据 
 if(is_mobile_request()){    
	  $paydir .='/html5';
  include_once($paydir.'/pay.php');   
  exit;
}
$dopaydata['status'] = 0;
$dopaydata['addtime'] = time();
 $this->mysql->insert(Mysite::$app->config['tablepre'].'onlinelog',$dopaydata);  //id type upid  cost  status addtime
$newid = $this->mysql->insertid();
require_once($paydir."/alipay.config.php");
require_once($paydir."/lib/alipay_submit.class.php");
$payment_type = "1";
$out_trade_no = $newid;
$subject = $dopaydata['type'] == 'order'?'支付订单':'在线充值';
$total_fee = $dopaydata['cost'];
$body = $_POST['WIDbody'];
$show_url = $_POST['WIDshow_url'];
$anti_phishing_key = "";
$exter_invoke_ip = "";
//非局域网的外网IP地址，如：221.0.0.1
 

/************************************************************/

//构造要请求的参数数组，无需改动
$parameter = array(
		"service" => "create_direct_pay_by_user",
		"partner" => trim($alipay_config['partner']),
		"payment_type"	=> $payment_type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"show_url"	=> $show_url,
		"anti_phishing_key"	=> $anti_phishing_key,
		"exter_invoke_ip"	=> $exter_invoke_ip,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);
 
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;
 
?>