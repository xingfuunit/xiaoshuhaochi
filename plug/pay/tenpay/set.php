<?php 
//说明财富通配置接口文件
 $setinfo = array(
        'name'=>'tenpay',
        'apiname'=>'tenpay',
        'logourl'=>'caifutong.png',
  ); 
  
  function tenpayplugsdata()
  {
  	$mkdata = array(
  	'0'=> array('title'=>'财付通App-id',	'name'=>'appid',	'desc'=>''),
  	'1'=> array('title'=>'签名密钥',	'name'=>'key',	'desc'=>'')
  	);
  	return $mkdata;
  }
  
 
?>