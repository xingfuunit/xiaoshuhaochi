<?php
 
header("Content-Type:text/html;charset=utf-8"); 
define('hopedir', dirname(__FILE__).DIRECTORY_SEPARATOR);  
$config = hopedir."config/hopeconfig.php";   
$cfg = include($config); 
 
$lnk = mysql_connect($cfg['dbhost'], $cfg['dbuser'], $cfg['dbpw']) or die ('Not connected : ' . mysql_error()); 
$version = mysql_get_server_info(); 
if($version > '4.1' && $cfg['dbcharset']) {
				mysql_query("SET NAMES '".$cfg['dbcharset']."'");
} 
if($version > '5.0') {
				mysql_query("SET sql_mode=''");
}
												
if(!@mysql_select_db($cfg['dbname'])){ 
				if(@mysql_error()) {
					echo '数据库连接失败';exit;
				} else {
					mysql_select_db($cfg['dbname']);
				}
} 
 

   	 $temporder = mysql_query("SELECT * from `".$cfg['tablepre']."orderdet`   where order_id =1054  "); 
     while($rs=mysql_fetch_assoc($temporder)){
  	    $getarr[] = $rs;
  	    print_r($rs);
	   }
  
  
  
  
  
  
 
 // mysql_query("ALTER TABLE  `xiaozu_wxuser` ADD  `wxlat` VARCHAR( 255 ) NULL ,ADD  `wxlng` VARCHAR( 255 ) NULL ;;");
 
// mysql_query(" ALTER TABLE  `xiaozu_shopmarket` ADD  `pradiusvalue` TEXT NULL ;");
 
 
 
  #   mysql_query("UPDATE  `xiaozu_admin` SET  `password` = MD5('admin') WHERE  `xiaozu_admin`.`uid` =1 LIMIT 1;");
  
echo mysql_error();
mysql_close($lnk);		 
echo 'ok';
exit;		
?>