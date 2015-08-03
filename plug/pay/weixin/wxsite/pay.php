<?php
//获取支付内容
if(empty($dopaydata)){
   $this->message('支付数据为空');
}

require_once($paydir.'/WxPayPubHelper/WxPayPubHelper.php');
//=========步骤1：网页授权获取用户openid============
//使用jsapi接口

$jsApi = new JsApi_pub();
if (!isset($_GET['code']))
{
    //触发微信返回code码
    $url = $jsApi->createOauthUrlForCode(urlencode(WxPayConf_pub::JS_API_CALL_URL.'&orderid='.$dopaydata['upid']));
    header("Location: $url");
    exit;
}else{
    //获取code码，以获取openid
    $code = $_GET['code'];
    $jsApi->setCode($code);
    $openid = $jsApi->getOpenId();
}

$order = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where `id`=".$dopaydata['upid']);
$dopaydata['status'] = 0;
$dopaydata['addtime'] = time();
$this->mysql->insert(Mysite::$app->config['tablepre'].'onlinelog',$dopaydata);  //id type upid  cost  status addtime
$newid = $this->mysql->insertid();
$out_trade_no = $newid;
$total_fee = $dopaydata['cost'];
//=========步骤2：使用统一支付接口，获取prepay_id============
//使用统一支付接口
$unifiedOrder = new UnifiedOrder_pub();
$unifiedOrder->setParameter("openid","$openid");//商品描述
$unifiedOrder->setParameter("body",$dopaydata['type'] == 'order'?'支付订单':'在线充值');//商品描述
$unifiedOrder->setParameter("out_trade_no","$out_trade_no");//商户订单号
$unifiedOrder->setParameter("total_fee",100*$total_fee);//总金额
$unifiedOrder->setParameter("notify_url",WxPayConf_pub::NOTIFY_URL);//通知地址
$unifiedOrder->setParameter("trade_type","JSAPI");//交易类型

$prepay_id = $unifiedOrder->getPrepayId();
//=========步骤3：使用jsapi调起支付============
$jsApi->setPrepayId($prepay_id);
$jsApiParameters = $jsApi->getParameters();
//$return_url = 'index.php?controller=wxsite&action=ordershow&orderid='.$backinfog['upid'].'&random=@random@';
$return_url = "/index.php?controller=wxsite&action=ordershow&orderid=".$dopaydata['upid'];
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>微信安全支付</title>

    <script type="text/javascript">

        //调用微信JS api 支付
        function jsApiCall()
        {

            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                <?php echo $jsApiParameters; ?>,
                function(res){
                    window.location.href='<?php echo $return_url;?>';
                }
            );
        }

        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }
        callpay()
    </script>
</head>
<body>

</body>
</html>

