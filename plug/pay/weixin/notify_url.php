<?php
/**
 * 通用通知接口demo
 * ====================================================
 * 支付完成后，微信会把相关支付和用户信息发送到商户设定的通知URL，
 * 商户接收回调信息后，根据需要设定相应的处理流程。
 *
 * 这里举例使用log文件形式记录回调信息。
*/

function dosengprint($msg,$machine_code,$mKey){
    $xmlData = '<xml>
 <mKey><![CDATA['.$mKey.']]></mKey >
<machine_code><![CDATA['.$machine_code.']]></machine_code >
<Content><![CDATA['.$msg.']]></Content >
</xml>';

//第一种发送方式，也是推荐的方式：
$url = 'http://app.hehe.com/print.php';  //接收xml数据的文件
$header[] = "Content-type: text/xml";        //定义content-type为xml,注意是数组
$ch = curl_init ($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
$response = curl_exec($ch);
if(curl_errno($ch)){
    print curl_error($ch);
}
curl_close($ch);

  }
	include_once("log_.php");
	include_once("WxPayPubHelper/WxPayPubHelper.php");

    //使用通用通知接口

	$notify = new Notify_pub();

	//存储微信的回调
	$xml = $GLOBALS['HTTP_RAW_POST_DATA'];
	$notify->saveData($xml);

	//验证签名，并回应微信。
	//对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
	//微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
	//尽可能提高通知的成功率，但微信不保证通知最终能成功。
	if($notify->checkSign() == FALSE){
		$notify->setReturnParameter("return_code","FAIL");//返回状态码
		$notify->setReturnParameter("return_msg","签名失败");//返回信息
	}else{
		$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
	}
	$returnXml = $notify->returnXml();
	echo $returnXml;

	//==商户根据实际情况设置相应的处理流程，此处仅作举例=======

	//以log文件形式记录回调信息
	$log_ = new Log_();
	$log_name="./notify_url.log";//log文件路径
	$log_->log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");

	if($notify->checkSign() == TRUE)
	{
	/*
	$notify = new Notify_pub();
	$xml = '<xml><appid><![CDATA[wx6b841dfdf70941ae]]></appid>
<bank_type><![CDATA[ICBC_DEBIT]]></bank_type>
<fee_type><![CDATA[CNY]]></fee_type>
<is_subscribe><![CDATA[Y]]></is_subscribe>
<mch_id><![CDATA[10018540]]></mch_id>
<nonce_str><![CDATA[4p5ama9d2jrjgwmutiw7qcm69ru5l3zx]]></nonce_str>
<openid><![CDATA[oW7Z1tyBJECU23nL4RwBjJxdI0xE]]></openid>
<out_trade_no><![CDATA[130]]></out_trade_no>
<result_code><![CDATA[SUCCESS]]></result_code>
<return_code><![CDATA[SUCCESS]]></return_code>
<sign><![CDATA[B07CD69A3E2EC5DB41B2E8D0141CFB08]]></sign>
<sub_mch_id><![CDATA[10018540]]></sub_mch_id>
<time_end><![CDATA[20141004184931]]></time_end>
<total_fee>43</total_fee>
<trade_type><![CDATA[NATIVE]]></trade_type>
<transaction_id><![CDATA[1001600748201410040005260157]]></transaction_id>
</xml>';
$notify->saveData($xml);
   //  $notify = simplexml_load_string($xml, 'SimpleXMLElement');
   $log_ = new Log_();
 	$log_name="./notify_url.log";


	   print_r($notify->data["out_trade_no"]);*/

		if ($notify->data["return_code"] == "FAIL") {
			//此处应该更新一下订单状态，商户自行增删操作
			$log_->log_result($log_name,"【通信出错】:\n".$xml."\n");
		}
		elseif($notify->data["result_code"] == "FAIL"){
			//此处应该更新一下订单状态，商户自行增删操作
			$log_->log_result($log_name,"【业务出错】:\n".$xml."\n");
		}
		else{
			//此处应该更新一下订单状态，商户自行增删操作
			$log_->log_result($log_name,"【支付成功】:\n".$xml."\n");
			$hopedir = '../../../';
      $config = $hopedir."config/hopeconfig.php";
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
      $info =  mysql_query("SELECT * from `".$cfg['tablepre']."onlinelog` where id = ".$notify->data["out_trade_no"]." ");
   $backinfog = mysql_fetch_assoc($info);
   if(!empty($backinfog)){
            if($backinfog['status'] == 0 && $backinfog['cost']*100 == $notify->data["total_fee"]){
                 if($backinfog['type'] == 'order'){
                    //更新此状态为1
                    //更新订单
                     mysql_query("UPDATE  `".$cfg['tablepre']."onlinelog` SET  `status` =  1 where `id`=".$notify->data["out_trade_no"]." ");
                     mysql_query("UPDATE  `".$cfg['tablepre']."order` SET  `paystatus` =  1 where `id`=".$backinfog['upid']."");
               }elseif($backinfog['type'] == 'acount'){
                 mysql_query("UPDATE  `".$cfg['tablepre']."onlinelog` SET  `status` =  1 where `id`=".$notify->data["out_trade_no"]." ");
                 mysql_query("UPDATE  `".$cfg['tablepre']."member` SET  `cost` =  `cost`+".$backinfog['cost']." where `uid`=".$backinfog['upid']."");
                  $info =  mysql_query("SELECT * from `".$cfg['tablepre']."member` where uid = ".$backinfog['upid']." ");
              $memberinfo = mysql_fetch_assoc($info);
              $dotime = time();
                    mysql_query("INSERT INTO `".$cfg['tablepre']."memberlog` (`id` ,`userid` ,`type` ,`addtype` ,`result` ,`addtime` ,`content` ,`title` ,`acount` )VALUES (NULL , '".$memberinfo['uid']."', '2', '1', '".$backinfog['cost']."', '".$dotime."', '在线充值', '使用支付宝在线充值".$backinfog['cost']."元', '".$memberinfo['cost']."');");
           }
           //logwrite('支付成功'.$txn_id);
            }else{
                //logwrite('金额不一致,返回ID'.$txn_id);
            }
   }else{
       //logwrite('获取待支付ID失败,返回ID'.$txn_id);
   }
      mysql_close($lnk);
}

      /***数据库连接完成***/
      /*$info =  mysql_query("SELECT * from `".$cfg['tablepre']."order` where id = '".$notify->data["out_trade_no"]."' ");
      $orderinfo = mysql_fetch_assoc($info);
      if(!empty($orderinfo)){//当订单存在时
        if($notify->data["total_fee"] == intval($orderinfo['allcost'])){//支付总金额和回调总金额一直
        	 	   mysql_query("UPDATE  `".$cfg['tablepre']."order` SET  `paystatus` =  1,`paytype` =  'weixin',`status` =  1  where `id`=".$orderinfo['id']."");
        	 	   $temporder = mysql_query("SELECT * from `".$cfg['tablepre']."orderdet`   where order_id ='".$orderinfo['id']."'  ");
 	             $orderdet = array();
               while($rs=mysql_fetch_assoc($temporder)){
  	            $orderdet[] = $rs;
	             }

	            $temporder = mysql_query("SELECT * from `".$cfg['tablepre']."shop` where id = ".$orderinfo['shopid']." ");
              $shopinfo = mysql_fetch_assoc($temporder);
              $temp_content = '';
	     	      foreach($orderdet as $km=>$vc){
                $temp_content .= $vc['goodsname'].'('.$vc['goodscount'].'份) \n ';
	            }
              $msg = '商家:'.$shopinfo['shopname'].'
              订餐热线:'.$cfg['litel'].'
              订单状态：微信支付，已付
              姓名：'.$orderinfo['buyername'].'
              电话：'.$orderinfo['buyerphone'].'
              地址：'.$orderinfo['buyeraddress'].'
              下单时间：'.date('m-d H:i',$orderinfo['addtime']).'
              配送时间:'.date('m-d H:i',$orderinfo['posttime']).'
              *******************************
              '.$temp_content.'
              *******************************

              配送费：'.$orderinfo['shopps'].'元
              合计：'.$orderinfo['allcost'].'元
              ※※※※※※※※※※※※※※
              谢谢惠顾，欢迎下次光临
              订单编号'.$orderinfo['dno'].'
              备注'.$orderinfo['content'].'
              ';
              if(!empty($shopinfo['machine_code'])){
                dosengprint($msg,$shopinfo['machine_code'],$shopinfo['mKey']);
              }//发送打印机
              include_once("wx_s.php");
              $wx_s = new wx_s();
              $wx_s->sendmsg('订单'.$orderinfo['dno'].'，微信支付成功',$notify->data["openid"]);





    			 	 $checknotice =  isset($shopinfo['noticetype'])? explode(',',$shopinfo['noticetype']):array();//判断通知方式
    			 	 $payarrr = array('outpay'=>'到付','open_acout'=>'余额支付');
	           $orderpastatus = $orderinfo['paystatus'] == 1?'已支付':'未支付';
	           $orderpaytype = isset($payarrr[$orderinfo['paytype']])?$payarrr[$orderinfo['paytype']]:'在线支付';
    			 	 //APP通知
    			 	  if(in_array(3,$checknotice))
		          {
		          	$temporder = mysql_query("SELECT * from `".$cfg['tablepre']."applogin` where uid = ".$orderinfo['shopuid']." ");
                  $appcheck = mysql_fetch_assoc($temporder);
	                   if(!empty($appcheck)){
	                   	 $notime = time();
	                   	 $sign = md5(md5($cfg['appuser'].$notime).$cfg['appsecret']);
	                   	 $msg = $cfg['sitename'].'订单提醒';
	                     $links = 'http://app.waimairen.com/app.php?user='.$cfg['appuser'].'&sign='.$sign.'&actime='.$notime.'&userID='.$appcheck['userid'].'&channelid='.$appcheck['channelid'].'&message='.$msg.'&othermsg=您有新的订单,单号:'.$orderinfo['dno'].'&messagetype=1';
	        	           $temd = file_get_contents($links);
	                   }
	            }
    			 	 //调用邮件类
    			 	 //调用APP类
    			 	 //http://app.waimairen.com/app.php?

    			 	 //手机通知
    			 	  if(in_array(1,$checknotice)){
  	             if($cfg['allowedsendshop'] == 1 &&preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{9}$|14[0-9]{9}$/",$orderinfo['shopphone'])){
    			 	         $shopphonecontent = '【外卖人】'.$orderinfo['buyername'].'订单总价'.$orderinfo['allcost'].'元('.$orderpaytype.','.$orderpastatus.')';
	       	 	         $shopphonecontent .='订单详情:';
	       	 	         foreach($orderdet as $key=>$value){
	       	 		          $shopphonecontent .= $value['goodsname'].'('.$value['goodscount'].')份';
	       	 	         }
	       	 	         $shopphonecontent .='联系电话'.$orderinfo['buyerphone'].',联系地址:'.$orderinfo['buyeraddress'].',备注'.$orderinfo['content'];

	       	 	         $contents= mb_convert_encoding($shopphonecontent,'GBK','UTF-8');
	        	         $APIServer = 'http://221.179.180.158:9007/QxtSms/QxtFirewall?';
	                   $weblink = $APIServer.'OperID='.trim($cfg['sms86ac']).'&OperPass='.trim($cfg['sms86pd']).'&DesMobile='.$orderinfo['shopphone'].'&Content='.urlencode($contents).'&ContentType=8';
	        	         $contentcccc =  file_get_contents($weblink);

	        	     }
	        	  }
	          if($cfg['allowedsendbuyer'] == 1 &&preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{9}$|14[0-9]{9}$/",$orderinfo['buyerphone']))
		       {
	       	 	    $shopphonecontent = '【外卖人】'.$orderinfo['buyername'].'订单总价'.$orderinfo['allcost'].'元('.$orderpaytype.','.$orderpastatus.')';
	       	 	    $shopphonecontent .='联系电话'.$orderinfo['buyerphone'].',联系地址:'.$orderinfo['buyeraddress'].',备注'.$orderinfo['content'];
	       	 	    $contents= mb_convert_encoding($shopphonecontent,'GBK','UTF-8');
	        	    $APIServer = 'http://221.179.180.158:9007/QxtSms/QxtFirewall?';

	              $weblink = $APIServer.'OperID='.trim($cfg['sms86ac']).'&OperPass='.trim($cfg['sms86pd']).'&DesMobile='.$orderinfo['buyerphone'].'&Content='.urlencode($contents).'&ContentType=8';
	        	    $contentcccc =  file_get_contents($weblink);
	           }

    			 	 include($hopedir.'lib/core/extend/smtp_class.php');
    			 	 $smtp = new ISmtp($cfg['smpt'],25,$cfg['emailname'],$cfg['emailpwd'],false);
    			 	 if(in_array(2,$checknotice)&&preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)+$/i',$shopinfo['email'])){
    			 	 	  $tempcontent = '<table align="center" width="100%"><tbody><tr> <td colspan="2" align="center"><h1><strong>'.$cfg['sitename'].'订单信息</strong></h1><hr></td></tr>';
	        	    $tempcontent .= '<tr><td width="100"><strong>订单编号：</strong></td><td>'.$orderinfo['dno'].'</td></tr><tr><td><strong>店铺名称：</strong></td><td>'.$orderinfo['shopname'].'</td></tr>';
	        	    $tempcontent .= '<tr><td><strong>联系姓名：</strong></td><td>'.$orderinfo['buyername'].'</td></tr><tr><td><strong>联系电话：</strong></td><td>'.$orderinfo['buyerphone'].'</td></tr>';
	        	    $tempcontent .= '<tr><td valign="top"><strong>配送地址：</strong></td><td>'.$orderinfo['buyeraddress'].'</td></tr><tr><td><strong>下单时间：</strong></td><td>'.date('Y-m-d H:i:s',$orderinfo['addtime']).'</td></tr>';
                foreach($orderdet as $key=>$value){
                	$tempre = $key == 0?'<strong> 订单详情：</strong>':'';
     	            $tempcontent .= '<tr><td>'.$tempre.'</td><td>'.$value['goodsname'].','.$value['goodscount'].'份,'.$value['goodscost'].'元/份</td></tr>';
                }
 	        	    $tempcontent .= '<tr><td valign="top"><strong>备注：</strong></td><td>'.$orderinfo['content'].'</td></tr>';
 	        	    $tempcontent .= '<tr><td valign="top"><strong>配送时间：</strong></td><td>'.date('Y-m-d H:i:s',$orderinfo['posttime']).'</td></tr>';
	        	    $tempcontent .= '<tr><td><strong>总金额：</strong></td><td><span class="price">'.$orderinfo['allcost'].'元</span>'.$orderpaytype.',('.$orderpastatus.')</td></tr>';
	        	    $tempcontent .= '</tbody></table>';
	        	    $title = '您有一笔'.$cfg['sitename'].'新订单';

                $info = $smtp->send($shopinfo['email'], $cfg['emailname'],$title,$tempcontent, "" , "HTML" , "" , "");
    			    }



        }
      }

  // echo mysql_error();
      mysql_close($lnk);
		}*/

		//商户自行增加处理流程,
		//例如：更新订单状态
		//例如：数据库操作
		//例如：推送支付完成信息

	}
?>
