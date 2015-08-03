<?php
//获取支付内容
if(empty($dopaydata)){
   $this->message('支付数据为空');
}
//写在线支付数据
 if(is_mobile_request()){
	  $paydir .='/wxsite';
  include_once($paydir.'/pay.php');
  exit;
}

$order = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where `id`=".$dopaydata['upid']);
$pay_info = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."onlinelog where `upid`=".$dopaydata['upid']." order by id desc limit 1");
if ($order && $order['paystatus'] != 1) {
	if (!$pay_info || (time() - $pay_info['addtime'] > 900)) {
		$dopaydata['status'] = 0;
		$dopaydata['addtime'] = time();
		$this->mysql->insert(Mysite::$app->config['tablepre'].'onlinelog',$dopaydata);  //id type upid  cost  status addtime
		$newid = $this->mysql->insertid();
		$out_trade_no = $newid;
	} else {
		$out_trade_no = $pay_info['id'];
	}
	$total_fee = $dopaydata['cost'];
	require_once($paydir.'/WxPayPubHelper/WxPayPubHelper.php');
	$unifiedOrder = new UnifiedOrder_pub();

	//$unifiedOrder->setParameter("openid","$openid");//商品描述
	$unifiedOrder->setParameter("body",$dopaydata['type'] == 'order'?'支付订单':'在线充值');//商品描述
	$unifiedOrder->setParameter("out_trade_no","$out_trade_no");//商户订单号
	$unifiedOrder->setParameter("total_fee",100*$total_fee);//总金额
	$unifiedOrder->setParameter("notify_url",WxPayConf_pub::NOTIFY_URL);//通知地址
	$unifiedOrder->setParameter("trade_type","NATIVE");//交易类型

	//获取统一支付接口结果
	$unifiedOrderResult = $unifiedOrder->getResult();

	$code_url = $unifiedOrderResult["code_url"];
	include('templates/qrcode.php');
	exit;
} else {
	$this->message('微信支付成功');
}

