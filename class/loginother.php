<?php 

/**
 * @第三方登录处理方案
 * @ install 函数第三方 安装程序
 *  otherlogin 表 第三方数据库已经安装表
    id 第三方登录ID名
    loginname 登录名称
    logindesc 描述; 
 * @列表文件夹名称
 * @login.php 登录文件处理
 * @ back.php  回调函数 
 * @描述文件 
 
 */
class loginother
{
	 private $gwUrl = 'http://sdkhttp.eucp.b2m.cn/sdk/SDKService?wsdl';//网关地址
   private $serialNumber; //序列号,请通过亿美销售人员获取 0SDK-EMY-0130-JBQMR
   private $password;//密码销售人员获取
   private $connectTimeOut = 2; //连接超时时间，单位为秒 
   private $readTimeOut = 10; //远程信息读取超时时间，单位为秒
   private $proxyhost = false;
	 private $proxyport = false;
	 private $proxyusername = false;
	 private $proxypassword = false; 
	 private $sessionKey = '123456';//登录后所持有的SESSION KEY，即可通过login方法时创建 
	 private $client;
	 
	  function __construct(){ 	 
	  	//php 检测文件是否存在
	    
   }
   //安装 接口
   function  install(){ 
   	
	 } 

}
?>