<?php
/* *
 * 功能：支付宝服务器异步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。


 *************************页面功能说明*************************
 * 创建该页面文件时，请留心该页面文件中无任何HTML代码及空格。
 * 该页面不能在本机电脑测试，请到服务器上做测试。请确保外部可以访问该页面。
 * 该页面调试工具请使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyNotify
 * 如果没有收到该页面返回的 success 信息，支付宝会在24小时内按一定的时间策略重发通知
 */
$hopedir = '../../../../';
$config = $hopedir."config/hopeconfig.php";
$cfg = include($config);

require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");

//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();

if($verify_result) {//验证成功
    $doc = new DOMDocument();
    if ($alipay_config['sign_type'] == 'MD5') {
        $doc->loadXML($_POST['notify_data']);
    }

    if ($alipay_config['sign_type'] == '0001') {
        $doc->loadXML($alipayNotify->decrypt($_POST['notify_data']));
    }

    if( ! empty($doc->getElementsByTagName( "notify" )->item(0)->nodeValue) ) {
        //商户订单号
        $out_trade_no = $doc->getElementsByTagName( "out_trade_no" )->item(0)->nodeValue;
        //支付宝交易号
        $trade_no = $doc->getElementsByTagName( "trade_no" )->item(0)->nodeValue;
        //交易状态
        $trade_status = $doc->getElementsByTagName( "trade_status" )->item(0)->nodeValue;

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
       $info =  mysql_query("SELECT * from `".$cfg['tablepre']."onlinelog` where id = ".$out_trade_no." ");
       $backinfog = mysql_fetch_assoc($info);
       if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS') {
            if(!empty($backinfog)){
                if($backinfog['status'] == 0){
                    if($backinfog['type'] == 'order'){
                        //更新此状态为1
                        //更新订单
                        mysql_query("UPDATE  `".$cfg['tablepre']."onlinelog` SET  `status` =  1 where `id`=".$out_trade_no." ");
                        mysql_query("UPDATE  `".$cfg['tablepre']."order` SET  `paystatus` =  1 where `id`=".$backinfog['upid']."");
                    }elseif($backinfog['type'] == 'acount'){
                        mysql_query("UPDATE  `".$cfg['tablepre']."onlinelog` SET  `status` =  1 where `id`=".$out_trade_no." ");
                        mysql_query("UPDATE  `".$cfg['tablepre']."member` SET  `cost` =  `cost`+".$backinfog['cost']." where `uid`=".$backinfog['upid']."");
                        $info =  mysql_query("SELECT * from `".$cfg['tablepre']."member` where uid = ".$backinfog['upid']." ");
                        $memberinfo = mysql_fetch_assoc($info);
                        $dotime = time();
                        mysql_query("INSERT INTO `".$cfg['tablepre']."memberlog` (`id` ,`userid` ,`type` ,`addtype` ,`result` ,`addtime` ,`content` ,`title` ,`acount` )VALUES (NULL , '".$memberinfo['uid']."', '2', '1', '".$backinfog['cost']."', '".$dotime."', '在线充值', '使用支付宝在线充值".$backinfog['cost']."元', '".$memberinfo['cost']."');");
                    }
                }
                echo "success";     //请不要修改或删除
            }
        }
    }

    //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    echo "fail";

    //调试用，写文本函数记录程序运行情况是否正常
    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
}
?>
