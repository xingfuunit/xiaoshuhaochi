<?php 
session_start();  
$sinaconfig = include(plugdir."/login/sina/config/config.php");  
define( "WB_AKEY" , $sinaconfig['appid']);
define( "WB_SKEY" , $sinaconfig['appkey']);
define( "WB_CALLBACK_URL" , $sinaconfig['callback']); 
require_once(plugdir."/login/sina/saetv2.ex.class.php");
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY ); 
$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL ); 
$this->refunction('',$code_url); 
exit;
 
?>