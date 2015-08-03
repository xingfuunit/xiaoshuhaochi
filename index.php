<?php
define('hopedir', dirname(__FILE__).DIRECTORY_SEPARATOR);  
define('plugdir', dirname(__FILE__).'/plug');  
define('M_SC', 'mysite');  
date_default_timezone_set("Asia/Hong_Kong"); //时间区域
header("Content-Type:text/html;charset=utf-8"); //输出格式
if(!file_exists(hopedir.'config/hopeconfig.php'))
{
	
	echo '未安装程序<a href="/install/index.php">进入安装页面</a>';
	exit;
}

include(hopedir.'/lib/function.php');  
$config = hopedir."/config/hopeconfig.php";  
$Mysite = hopedir."/lib/core/Mysite.php"; 
require($Mysite);   
Mysite::createWebApp($config)->run();    
?>