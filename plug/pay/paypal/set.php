<?php 
//说明支付宝配置接口文件
 $setinfo = array(
        'name'=>'paypal',
        'apiname'=>'paypal',
        'logourl'=>'btn_buynowCC_LG.gif',
  ); 
  
  function paypalplugsdata()
  {
  	$mkdata = array(
  	'0'=> array('title'=>'paypalbusinessemail',	'name'=>'business',	'desc'=>''),
  	'1'=> array('title'=>'currency_code',	'name'=>'currency_code',	'desc'=>'') 
  	);
  	return $mkdata;
  }
  
 
?>