<?php
if(!function_exists("curl_init")){
    echo "<h1>请先开启curl支持</h1>";
    echo "
        开启php curl函数库的步骤(for windows)<br />
        1).去掉windows/php.ini 文件里;extension=php_curl.dll前面的; /*用 echo phpinfo();查看php.ini的路径*/<br />
        2).把php5/libeay32.dll，ssleay32.dll复制到系统目录windows/下<br />
        3).重启apache<br />
        ";
    exit();
}
if($_POST){
    foreach($_POST as $k => $val){
        if(empty($val)){
            die("请填写$k");
        }
    }
    $_POST['storageType'] = "file";
    $_POST['host'] = "localhost";
    $_POST['user'] = "root";
    $_POST['password'] = "root";
    $_POST['database'] = "test";
    $_POST['scope'] = implode(",",$_POST['scope']);
    $_POST['errorReport'] = (boolean) $_POST['errorReport'];
    $setting = json_encode($_POST);
    $setting = str_replace("\/", "/",$setting);
    $incFile = fopen("../API/comm/inc.php","w+") or die("请设置API\comm\inc.php的权限为777");
    if(fwrite($incFile, $setting)){
        echo "<meta charset='utf-8' />";
        echo "配置成功,<a href='../example/'>查看example</a>";
    }else{
        echo "Error";
    }
}else{
    require_once("install.html");
}
