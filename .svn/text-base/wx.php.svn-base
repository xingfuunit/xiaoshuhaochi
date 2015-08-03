<?php
define('hopedir', dirname(__FILE__).DIRECTORY_SEPARATOR);
//global
$Mconfig = include(hopedir."config/hopeconfig.php");   //网站配置
date_default_timezone_set("Asia/Hong_Kong");
//header("Content-Type:text/html;charset=utf-8");
include(hopedir."wx/mysql_class.php");
include(hopedir.'/lib/function.php');
 logwrite('startsend');

if(array_key_exists('shopid', $_GET)) {
  $mysql = new mysql_class();
  $wx_info = $mysql->select_one("select token from ".$Mconfig['tablepre']."shop_wechat where shopid='".(int)$_GET['shopid']."'");
  define("TOKEN",$wx_info['token']);
  define("ISSHOP",(int)$_GET['shopid']);
} else {
  define("TOKEN",$Mconfig['wxtoken']);
  define("ISSHOP",0);
}
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
   //
}
class wechatCallbackapiTest
{
	 //  private $mysql; //定义数据库
	  private $wxback;

	  public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }
    public function responseMsg()
    {
    	 if($this->checkSignature()){
	        	//get post data, May be due to the different environments
	    $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                logwrite('postStr:'.$postStr);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);

                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);

                $time = time();
              //  logwrite('myclass:'.$postObj->MsgType);
                $condo = trim($postObj->MsgType);


                if (ISSHOP != 0) {
                  include(hopedir."wx/wx_b_shop.php");
                  $this->wxback = new wx_b_shop($postObj, ISSHOP);
                } else {
                  include(hopedir."wx/wx_b.php");
                  $this->wxback = new wx_b($postObj);
                }
	     	         call_user_func(array($this->wxback,$condo));
	     	         exit;
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "Welcome to wechat world!";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
     }
     echo '';
     exit;
   }

	private function checkSignature()
	{
		return true;
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>
