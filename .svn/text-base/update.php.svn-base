<?php
//第一步 更新配置文件
define('hopedir', dirname(__FILE__).DIRECTORY_SEPARATOR);   
@$step = intval($_GET['step']);
$step = empty($step)?'a':$step;
switch($step){
 case 'a':
  echo '<a href="/update.php?step=1">更新程序,以下全手动点击下一步更新配置文件</a>';
  
 break;
 case 1:
 include(hopedir.'update/step1.php');
 echo '<a href="/update.php?step=2">配置文件更新完成，下一步备份数据库</a>';
 break;
 case 2:
 include(hopedir.'update/step2.php');
 echo '<a href="/update.php?step=3">数据结构处理完成，下一步更新数据</a>';
 break;
 case 3:
 include(hopedir.'update/step3.php');
 echo '<a href="/update.php?step=3">复制数据库数据到新表中</a>';
 break;
 case 4:
 include(hopedir.'update/step4.php');
 echo '数据库更新成功，更新完成后请删除根目录下的update.php和update文件夹';
 break;
}


 




?>