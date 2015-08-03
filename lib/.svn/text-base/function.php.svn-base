<?php
//注册函数
 function FUNC_function($params,$smarty)
{ 
	  global $config;
	  $siteconfig = include($config);
	  $returndata = '';
	  switch($params['type'])
	  {
	  	 case 'url'://构造方式  /link/data
	  	   if(empty($params['link'])){
	  	   	$returndata = $siteconfig['siteurl']; 
	  	   }else{   
	  	   	   if($siteconfig['is_static'] == 1){//全静态
	  	   	 	       $returndata=$siteconfig['siteurl'].$params['link'];
	  	   	   }elseif($siteconfig['is_static'] == 2){//半静态
	  	   	   	    $returndata=$siteconfig['siteurl'].'/index.php'.$params['link'];
	  	   	   }else{//全动态
	  	   	   	   $dolink = explode('/',$params['link']);
	  	   	   	   $findkey = 0;
	  	   	 	    foreach($dolink as $key=>$value){ 
	  	   	 	  	 if(!empty($value)){
	  	   	 	  	 	  if($findkey == 0){
	  	   	 	  	 	  	$returndata=$siteconfig['siteurl'].'/index.php?controller='.$value;
	  	   	 	  	 	  }elseif($findkey == 1){
	  	   	 	  	 	  	$returndata .='&action='.$value;
	  	   	 	  	 	  }else{
	  	   	 	  	 	  	$returndata .= $findkey%2==0?'&'.$value:'='.$value;
	  	   	 	  	 	  }
	  	   	 	  	 	  $findkey++; 
	  	   	 	    	} 
	  	   	 	    } 
	  	   	 	
	  	   	   }
	  	   	 
	  	   }
	  	 break;
	  	 default:
	  	   $returndata = '调用你参数不足';
	  	 break;
	  	 
	  } 
		return $returndata;
}
//$smarty->registerPlugin("function","OFUC", "FUNC_function");
//$smarty->registerPlugin("block","OBLC", "FUNC_block");
//注册函数
function FUNC_block($params, $content, $smarty, &$repeat, $template)
{
		if (isset($content)) {   
			 $lang = $params["lang"];    
			 // do some translation with $content   
	      return $translation;
	  }
} 
function is_mobile_request()   
{   
  $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';   
   
  if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))   
  {
  	return true;
  }
  if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false)) {
    return true;
  } 
  
  if(isset($_SERVER['HTTP_X_WAP_PROFILE']))  
  {
  	return true;
  }  
  if(isset($_SERVER['HTTP_PROFILE']))   
  {
  	return true;
  }
  $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));   
  $mobile_agents = array(   
        'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',   
        'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',   
        'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',   
        'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',   
        'newt','noki','oper','palm','pana','pant','phil','play','port','prox',   
        'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',   
        'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',   
        'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',   
        'wapr','webc','winw','winw','xda','xda-'  
        );   
  if(in_array($mobile_ua, $mobile_agents))   
  {
  	return true;
  }
    
  if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)   
  {
  	return true;
  }
  if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)  {
  return true;
  }
  return false;
} 
function error($type,$msg){
	if($type == 'sql'){
		logwrite($msg); 
  }
}
function logwrite($msg){
	/*写日志*/
	//时间   操作内容
	$nowdate = date('Y-m-d',time());
	if(!file_exists(hopedir.'log/'.$nowdate.'.txt'))//创建文件
  { 
  	if(!is_dir(hopedir.'log')){
  		 mkdir(hopedir.'log', 0777);
  	}
  	$fp = @fopen(hopedir.'log/'.$nowdate.'.php', 'w');
  	@fclose($fp); 
  }
  $file=fopen(hopedir.'log/'.$nowdate.'.php',"a+");
  $linsk = $_SERVER['REQUEST_URI'];
  $content = "时间:".date('Y-m-d H:i:s',time()).",".$linsk."描述:".$msg."\r\n";
  fwrite($file, $content); 
  fclose($file);
}
?>