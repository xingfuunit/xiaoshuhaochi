<?php 
//说明网站支付设置接口
//if(!defined('IN_WaiMai')) {
//	exit('Access Denied');
//}
 $setinfo = array(
        'name'=>'支付宝手机支付',
        'apiname'=>'alimobile',
        'logourl'=>'',
        'forpay'=>2,
  ); 
 $plugsdata = array(
  	'0'=> array('title'=>'合作者ID',	'name'=>'partner',	'desc'=>''),
  	'1'=> array('title'=>'安全检验码key',	'name'=>'key',	'desc'=>''),
  	'2'=> array('title'=>'支付宝账号',	'name'=>'seller_email',	'desc'=>'') 
 ); 
  
?>