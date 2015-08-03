<?php  
//获取支付内容 
if(empty($dopaydata)){
   $this->message('支付数据为空');
}
//写在线支付数据 
 
$dopaydata['status'] = 0;
$dopaydata['addtime'] = time();
 $this->mysql->insert(Mysite::$app->config['tablepre'].'onlinelog',$dopaydata);  //id type upid  cost  status addtime
$newid = $this->mysql->insertid();
require_once($paydir."/paypal.config.php"); 
$payment_type = "1";
$out_trade_no = $newid;
$subject = $dopaydata['type'] == 'order'?'支付订单':'在线充值';
$total_fee = $dopaydata['cost'];
$body = $_POST['WIDbody'];
$show_url = $_POST['WIDshow_url'];
$anti_phishing_key = "";
$exter_invoke_ip = ""; 
 
?> 
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="paypal">   
    <input type="hidden" name="cmd" value="_xclick">   
  <input type="hidden" name="business" value="<?php  echo $alipay_config['business']?>">  
    <input type="hidden" name="item_name" value="<?php  echo $dopaydata['type']?>">   
    <input type="hidden" name="amount" value="<?php echo $total_fee?>">   
    <input type="hidden" name="currency_code" value="<?php  echo $alipay_config['currency_code']?>">   
    <input type="hidden" name="return" value="<?php echo $return_url?>">   
    <input type="hidden" name="invoice" value="<?php echo $out_trade_no?>">   
    <input type="hidden" name="charset" value="utf-8">   
  
    <input type="hidden" name="no_shipping" value="1">   
    <input type="hidden" name="no_note" value="">   
    <input type="hidden" name="notify_url" value="<?php echo  $notify_url?>">   
    <input type="hidden" name="rm" value="<?php echo $out_trade_no?>">   
    <input type="hidden" name="cancel_return"value="<?php echo $cancel_return?>">   
    <input type="submit" value="submit">   
</form> 
<script>
	 window.onload=dosubmit();  
	function dosubmit(){
	 document.getElementById('paypal').submit();
	}
</script>
<?php
exit; 
?>