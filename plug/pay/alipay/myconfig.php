<?php  
 $alipay_config['partner']		= 'partner';
 $alipay_config['key']			= 'key';
 $alipay_config['sign_type']    = strtoupper('MD5');
 $alipay_config['input_charset']= strtolower('utf-8');
 $alipay_config['transport'] = 'http';
 $alipay_config['cacert']    = getcwd().'\\cacert.pem';
 $notify_url= 'http://127.0.0.1/plug/pay/alipay/notify_url.php';
 $return_url= 'http://127.0.0.1/plug/pay/alipay/return_url.php';
 $seller_email= 'test@qq.com';
?>