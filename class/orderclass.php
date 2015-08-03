<?php

/**
 * @class Cart
 * @brief 天气预报
 */
class orderclass
{
    private $error = '';
    private $orderid = '';

     //普通用户登录

    protected $mysql;
    function __construct($mysql)
    {
        $this->mysql = $mysql;
    }
    //关闭订单通知
    function noticeclose($orderid,$reason){
        $orderinfo =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."order  where id= '".$orderid."'   ");
      if(!empty($orderinfo['buyeruid'])){
            $smtp = new ISmtp(Mysite::$app->config['smpt'],25,Mysite::$app->config['emailname'],Mysite::$app->config['emailpwd'],false);
            $wx_s = new wx_s();
            $appCls = new appbuyclass();
            //app信息
            $appcheck =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."appbuyerlogin where uid = '".$orderinfo['buyeruid']."'   ");
            $default_tpl = new config('tplset.php',hopedir);
            $tpllist = $default_tpl->getInfo();
            $orderinfo['reason'] = $reason;
            if(isset($tpllist['noticemake']) && !empty($tpllist['phoneunorder'])){
            $emailcontent = Mysite::$app->statichtml($tpllist['phoneunorder'],$orderinfo);
            if(!empty($appcheck)){

                    $backinfo = $appCls->sendmsg($appcheck['userid'],$appcheck['channelid'],'订单被关闭',$emailcontent,$messagetype=1);
                    logwrite('APP发送:'.$backinfo);
            }
            if(!empty($orderinfo['buyeruid']))
            {
                       $wxbuyer = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."wxuser  where uid= '".$orderinfo['buyeruid']."'   ");
                       if(!empty($wxbuyer)){
                             if($wx_s->sendmsg($emailcontent,$wxbuyer['openid'])){
                              }else{
                             logwrite('微信客服发送错误:'.$wx_s->err());
                             }

                       }
            }
            $memberinfo = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."member where uid = '".$orderinfo['buyeruid']."'   ");
            if(IValidate::email($memberinfo['email'])){
                 $info = $smtp->send($shopinfo['email'], Mysite::$app->config['emailname'],'关闭订单',$emailcontent, "" , "HTML" , "" , "");
            }
          }
      }
    }
    //制作订单通知
    function noticemake($orderid){
        $orderinfo =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."order  where id= '".$orderid."'   ");
      if(!empty($orderinfo['buyeruid'])){
            $smtp = new ISmtp(Mysite::$app->config['smpt'],25,Mysite::$app->config['emailname'],Mysite::$app->config['emailpwd'],false);
            $wx_s = new wx_s();
            $appCls = new appbuyclass();  //appBuyclass
            //app信息
            $appcheck =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."appbuyerlogin where uid = '".$orderinfo['buyeruid']."'   ");
            $default_tpl = new config('tplset.php',hopedir);
            $tpllist = $default_tpl->getInfo();
                     if(isset($tpllist['noticemake']) && !empty($tpllist['noticemake'])){
            $emailcontent = Mysite::$app->statichtml($tpllist['noticemake'],$orderinfo);
            if(!empty($appcheck)){
                    logwrite('APP发送内容:'.$emailcontent);
                    $backinfo = $appCls->sendmsg($appcheck['userid'],$appcheck['channelid'],'商家确认制作该订单',$emailcontent,$messagetype=1);
                    logwrite('APP发送:'.$backinfo);
            }
            if(!empty($orderinfo['buyeruid']))
            {
                       $wxbuyer = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."wxuser  where uid= '".$orderinfo['buyeruid']."'   ");
                       if(!empty($wxbuyer)){
                             if($wx_s->sendmsg($emailcontent,$wxbuyer['openid'])){
                              }else{
                             logwrite('微信客服发送错误:'.$wx_s->err());
                             }

                       }
            }
            $memberinfo = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."member where uid = '".$orderinfo['buyeruid']."'   ");
            if(IValidate::email($memberinfo['email'])){
                 $info = $smtp->send($shopinfo['email'], Mysite::$app->config['emailname'],'订单商家受理通知',$emailcontent, "" , "HTML" , "" , "");
            }
          }
      }
    }
    //不制作订单通知
    function noticeunmake($orderid){
        $orderinfo =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."order  where id= '".$orderid."'   ");
      if(!empty($orderinfo['buyeruid'])){
            $smtp = new ISmtp(Mysite::$app->config['smpt'],25,Mysite::$app->config['emailname'],Mysite::$app->config['emailpwd'],false);
            $wx_s = new wx_s();
            $appCls = new appbuyclass();
            //app信息
            $appcheck =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."appbuyerlogin where uid = '".$orderinfo['buyeruid']."'   ");
            $default_tpl = new config('tplset.php',hopedir);
            $tpllist = $default_tpl->getInfo();
         if(isset($tpllist['noticeunmake']) && !empty($tpllist['noticeunmake'])){
            $emailcontent = Mysite::$app->statichtml($tpllist['noticeunmake'],$orderinfo);
            if(!empty($appcheck)){

                    $backinfo = $appCls->sendmsg($appcheck['userid'],$appcheck['channelid'],'订单取消提示',$emailcontent,$messagetype=1);
                    logwrite('APP发送:'.$backinfo);
            }
            if(!empty($orderinfo['buyeruid']))
            {
                       $wxbuyer = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."wxuser  where uid= '".$orderinfo['buyeruid']."'   ");
                       if(!empty($wxbuyer)){
                             if($wx_s->sendmsg($emailcontent,$wxbuyer['openid'])){
                              }else{
                             logwrite('微信客服发送错误:'.$wx_s->err());
                             }

                       }
            }
            $memberinfo = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."member where uid = '".$orderinfo['buyeruid']."'   ");
            if(IValidate::email($memberinfo['email'])){
                 $info = $smtp->send($shopinfo['email'], Mysite::$app->config['emailname'],'不制作订单通知',$emailcontent, "" , "HTML" , "" , "");
            }
          }
      }
    }
    //退款成功通知
    function noticeback($orderid){
        $orderinfo =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."order  where id= '".$orderid."'   ");
      if(!empty($orderinfo['buyeruid'])){
            $smtp = new ISmtp(Mysite::$app->config['smpt'],25,Mysite::$app->config['emailname'],Mysite::$app->config['emailpwd'],false);
            $wx_s = new wx_s();
            $appCls = new appbuyclass();
            $drawbacklog =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."drawbacklog  where orderid= '".$orderid."'   ");
            $orderinfo['reason'] = $drawbacklog['bkcontent'];
            //app信息
            $appcheck =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."appbuyerlogin where uid = '".$orderinfo['buyeruid']."'   ");
            $default_tpl = new config('tplset.php',hopedir);
            $tpllist = $default_tpl->getInfo();
         if(isset($tpllist['noticeback']) && !empty($tpllist['noticeback'])){
            $emailcontent = Mysite::$app->statichtml($tpllist['noticeback'],$orderinfo);
            if(!empty($appcheck)){

                    $backinfo = $appCls->sendmsg($appcheck['userid'],$appcheck['channelid'],'退款成功',$emailcontent,$messagetype=1);
                    logwrite('APP发送:'.$backinfo);
            }
            if(!empty($orderinfo['buyeruid']))
            {
                       $wxbuyer = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."wxuser  where uid= '".$orderinfo['buyeruid']."'   ");
                       if(!empty($wxbuyer)){
                             if($wx_s->sendmsg($emailcontent,$wxbuyer['openid'])){
                              }else{
                             logwrite('微信客服发送错误:'.$wx_s->err());
                             }

                       }
            }
            $memberinfo = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."member where uid = '".$orderinfo['buyeruid']."'   ");
            if(IValidate::email($memberinfo['email'])){
                 $info = $smtp->send($shopinfo['email'], Mysite::$app->config['emailname'],'退款成功通知',$emailcontent, "" , "HTML" , "" , "");
            }
         }
       }
    }
    //发货通知
    function noticesend($orderid){
        $orderinfo =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."order  where id= '".$orderid."'   ");
      if(!empty($orderinfo['buyeruid'])){
            $smtp = new ISmtp(Mysite::$app->config['smpt'],25,Mysite::$app->config['emailname'],Mysite::$app->config['emailpwd'],false);
            $wx_s = new wx_s();
            $appCls = new appbuyclass();
            $drawbacklog =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."drawbacklog  where orderid= '".$orderid."'   ");
            $orderinfo['reason'] = $drawbacklog['bkcontent'];
            //app信息
            $appcheck =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."appbuyerlogin where uid = '".$orderinfo['buyeruid']."'   ");
            $default_tpl = new config('tplset.php',hopedir);
            $tpllist = $default_tpl->getInfo();
            if(isset($tpllist['noticesend']) && !empty($tpllist['noticesend'])){
                $emailcontent = Mysite::$app->statichtml($tpllist['noticesend'],$orderinfo);
                if(!empty($appcheck)){

                        $backinfo = $appCls->sendmsg($appcheck['userid'],$appcheck['channelid'],"发货提示",$emailcontent,$messagetype=1);
                        logwrite('APP发送:'.$backinfo);
                }
                if(!empty($orderinfo['buyeruid']))
                {
                           $wxbuyer = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."wxuser  where uid= '".$orderinfo['buyeruid']."'   ");
                           if(!empty($wxbuyer)){
                                 if($wx_s->sendmsg($emailcontent,$wxbuyer['openid'])){
                                  }else{
                                 logwrite('微信客服发送错误:'.$wx_s->err());
                                 }

                           }
                }
                $memberinfo = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."member where uid = '".$orderinfo['buyeruid']."'   ");
                if(IValidate::email($memberinfo['email'])){
                     $info = $smtp->send($shopinfo['email'], Mysite::$app->config['emailname'],'发货通知',$emailcontent, "" , "HTML" , "" , "");
                }
            }
       }
    }



    //退款失败通知
    function noticeunback($orderid){
      $orderinfo =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."order  where id= '".$orderid."'   ");
      if(!empty($orderinfo['buyeruid'])){
            $smtp = new ISmtp(Mysite::$app->config['smpt'],25,Mysite::$app->config['emailname'],Mysite::$app->config['emailpwd'],false);
            $wx_s = new wx_s();
            $appCls = new appbuyclass();
            $drawbacklog =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."drawbacklog  where orderid= '".$orderid."'   ");
            $orderinfo['reason'] = $drawbacklog['bkcontent'];
            //app信息
            $appcheck =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."appbuyerlogin where uid = '".$orderinfo['buyeruid']."'   ");
            $default_tpl = new config('tplset.php',hopedir);
             $tpllist = $default_tpl->getInfo();
            $emailcontent = Mysite::$app->statichtml($tpllist['emailorder'],$orderinfo);
            if(!empty($appcheck)){

                    $backinfo = $appCls->sendmsg($appcheck['userid'],$appcheck['channelid'],"退款提示",$emailcontent,$messagetype=1);
                    logwrite('APP发送:'.$backinfo);
            }
            if(!empty($orderinfo['buyeruid']))
            {
                       $wxbuyer = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."wxuser  where uid= '".$orderinfo['buyeruid']."'   ");
                       if(!empty($wxbuyer)){
                             if($wx_s->sendmsg($emailcontent,$wxbuyer['openid'])){
                              }else{
                             logwrite('微信客服发送错误:'.$wx_s->err());
                             }

                       }
            }
            $memberinfo = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."member where uid = '".$orderinfo['buyeruid']."'   ");
            if(IValidate::email($memberinfo['email'])){
                 $info = $smtp->send($shopinfo['email'], Mysite::$app->config['emailname'],'退款失败通知',$emailcontent, "" , "HTML" , "" , "");
            }
       }
    }

    //审核订单通过
    function  sendmess($orderid){

       $smtp = new ISmtp(Mysite::$app->config['smpt'],25,Mysite::$app->config['emailname'],Mysite::$app->config['emailpwd'],false);
       $sendmobile = new mobile();
       $wx_s = new wx_s();
       $orderinfo =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."order  where id= '".$orderid."'   ");
       $orderdet =  $this->mysql->getarr("select *  from ".Mysite::$app->config['tablepre']."orderdet  where order_id= '".$orderid."'   ");
       $shopinfo =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."shop  where id= '".$orderinfo['shopid']."'   ");

       $tempdata = array('orderinfo'=>$orderinfo,'orderdet'=>$orderdet,'sitename'=>Mysite::$app->config['sitename']);
       $contents = '';
       $checknotice =  isset($shopinfo['noticetype'])? explode(',',$shopinfo['noticetype']):array();
       $contents = '';
       $appcheck =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."applogin where uid = '".$orderinfo['shopuid']."'   ");
       if(!empty($appcheck)){
          /* $appCls = new appclass();
           $backinfo = $appCls->sendmsg($appcheck['userid'],$appcheck['channelid'],Mysite::$app->config['sitename'].'订单提醒','您有新的订单,单号:'.$orderinfo['dno'],$messagetype=1);
           logwrite('APP发送:'.$backinfo);*/
       }
       if(in_array(1,$checknotice)){
            if(Mysite::$app->config['allowedsendshop'] == 1){
                if(IValidate::suremobi($orderinfo['shopphone'])){
                    $default_tpl = new config('tplset.php',hopedir);
                    $tpllist = $default_tpl->getInfo();
                    if(!isset($tpllist['shopphonetpl']) || empty($tpllist['shopphonetpl'])){
                         // logwrite('短信发送商家模板加载失败');
                    }else{
                        $contents = Mysite::$app->statichtml($tpllist['shopphonetpl'],$tempdata);
                        if(Mysite::$app->config['smstype'] == 2){//139邮箱转发短信
                            //使用sms10086cn发送/
                            $APIServer = 'http://www.sms-10086.cn/Service.asmx/sendsms?';
                            $weblink = $APIServer.'zh='.trim(Mysite::$app->config['sms86ac']).'&mm='.trim(Mysite::$app->config['sms86pd']).'&hm='.$orderinfo['shopphone'].'&nr='.urlencode($contents).'&dxlbid=27';
                            $contentcccc =  file_get_contents($weblink);
                            logwrite('短信sms10086cn发送结果:'.$contentcccc);
                        }else{
                            //使用sms10086cn发送/
                            $phoneids = array();
                            $phoneids[] =$orderinfo['shopphone'];
                            $chekcinfo = $sendmobile->sendsms($phoneids,$contents);
                            logwrite('亿美短信接口发送结果:'.$chekcinfo);
                        }
                    }
                }else{
                    logwrite('短信发送商家'.$shopinfo['shopname'].'联系电话错误');
                }
            }
        }

        if(in_array(3,$checknotice)){
            $wechat = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop_wechat where shopid=".$orderinfo['shopid']);
            $wx_s = array();
            if (!empty($wechat)) {
                $wx_s = new wx_s($wechat['token'], $wechat['appid'], $wechat['secret'],$orderinfo['shopid']);
            }
            if(!empty($orderinfo['shopuid']) && !empty($wechat)){
                $wechat = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop_wechat where shopid=".$orderinfo['shopid']);
                //if (!empty($wechat)) {
                    //$wx_s = new wx_s($wechat['token'], $wechat['appid'], $wechat['secret'],$orderinfo['shopid']);
                    //找到要发送的商户微信openid
                    $openid_list = $this->mysql->getarr("select openid from ".Mysite::$app->config['tablepre']."shop_wxuser where shopid=".$orderinfo['shopid']." and is_merchant=1");

                    $payarrr = array('outpay'=>'到付','open_acout'=>'余额支付');
                    $orderpastatus = $orderinfo['paystatus'] == 1?'已支付':'未支付';
                    $orderpaytype = isset($payarrr[$orderinfo['paytype']])?$payarrr[$orderinfo['paytype']]:'在线支付';
                    $tempdata = array('orderinfo'=>$orderinfo,'orderdet'=>$orderdet,'sitename'=>Mysite::$app->config['sitename']);
                    $temp_content = $orderinfo['buyername'].'在'.Mysite::$app->config['sitename'].'下单成功'.'\n';
                    $temp_content .='下单时间：'.date('m-d H:i',$orderinfo['addtime']).'\n';
                    $temp_content .='配送时间：'.date('m-d H:i',$orderinfo['posttime']).'\n';
                    $temp_content .='支付方式'.$orderpaytype.','.$orderpastatus.' '.'\n';
                    $temp_content .='收货人:'.$orderinfo['buyername'].'\n';
                    $temp_content .='地址:'.$orderinfo['buyeraddress'].'\n';
                    $temp_content .='联系电话:'.$orderinfo['buyerphone'].'\n';
                    $temp_content .='单号:'.$orderinfo['dno'].'\n';
                    $temp_content .='总价:'.$orderinfo['allcost'].'元,配送费：'.$orderinfo['shopps'].'元\n';
                    $temp_content .='备注:'.$orderinfo['content'].'\n';
                    foreach($orderdet as $km=>$vc){
                        $temp_content .=$vc['goodsname'].'('.$vc['goodscount'].'份)\n';
                    }
                    if (!empty($openid_list)) {
                        if(!empty($temp_content)){
                            foreach ($openid_list as $key => $value) {
                                if($wx_s->sendmsg($temp_content,$value['openid'])){

                                }else{
                                    logwrite('微信客服发送错误:'.$wx_s->err());
                                }
                            }
                        }
                    }
                //}
                   //$wxshop = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."wxuser  where uid= '".$orderinfo['shopuid']."'   ");
                   /*if(!empty($wxshop)){

                       $payarrr = array('outpay'=>'到付','open_acout'=>'余额支付');
                       $orderpastatus = $orderinfo['paystatus'] == 1?'已支付':'未支付';
                       $orderpaytype = isset($payarrr[$orderinfo['paytype']])?$payarrr[$orderinfo['paytype']]:'在线支付';
                       $tempdata = array('orderinfo'=>$orderinfo,'orderdet'=>$orderdet,'sitename'=>Mysite::$app->config['sitename']);
                       $temp_content = $orderinfo['buyername'].'在'.Mysite::$app->config['sitename'].'下单成功'.'\n';
                       $temp_content .='下单时间：'.date('m-d H:i',$orderinfo['addtime']).'\n';
                       $temp_content .='配送时间：'.date('m-d H:i',$orderinfo['posttime']).'\n';
                       $temp_content .='支付方式'.$orderpaytype.','.$orderpastatus.' '.'\n';
                       $temp_content .='收货人:'.$orderinfo['buyername'].'\n';
                       $temp_content .='地址:'.$orderinfo['buyeraddress'].'\n';
                       $temp_content .='联系电话:'.$orderinfo['buyerphone'].'\n';
                       $temp_content .='单号:'.$orderinfo['dno'].'\n';
                       $temp_content .='总价:'.$orderinfo['allcost'].'元,配送费：'.$orderinfo['shopps'].'元\n';
                       $temp_content .='备注:'.$orderinfo['content'].'\n';
                       foreach($orderdet as $km=>$vc){
                         $temp_content .=$vc['goodsname'].'('.$vc['goodscount'].'份)\n';
                       }
                       //增加超连接
                       $time = time();
                     $tempstr = md5(Mysite::$app->config['wxtoken'].$time);
                     $tempstr = substr($tempstr,3,15);
                     $dolink = Mysite::$app->config['siteurl'].'/index.php?controller=wxsite&action=shopshoworder&id='.$orderinfo['id'];
                     $backinfo = '';
                     if(!empty($dolink)){
                                $templink = $dolink;
                             for($i=0;$i<strlen($templink);$i++){
                               $backinfo .= ord($templink[$i]).',';
                         }
                   }

                       $linkstr =  Mysite::$app->config['siteurl'].'/index.php?controller=wxsite&action=index&openid='.$wxshop['openid'].'&actime='.$time.'&sign='.$tempstr.'&backinfo='.$backinfo;
                       $temp_content .= '<a href=\''.trim($linkstr).'\'>查看详情</a>';

                       if(!empty($temp_content)){
                          $wx_s = new wx_s($wechat['token'], $wechat['appid'], $wechat['secret'],$orderinfo['shopid']);
                          if($wx_s->sendmsg($temp_content,$wxshop['openid'])){

                          }else{
                             logwrite('微信客服发送错误:'.$wx_s->err());
                          }

                       }
                   }*/
            }

            if(!empty($orderinfo['buyeruid']) && !empty($wechat)){
            //2015-06-25查不到$shopid把$shopid改成$shopinfo['id']
                   $wxbuyer = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."shop_wxuser where shopid='".$shopinfo['id']."' and uid= '".$orderinfo['buyeruid']."'   ");
                   if(!empty($wxbuyer)){

                       if(empty($contents)){
                           $default_tpl = new config('tplset.php',hopedir);
                       $tpllist = $default_tpl->getInfo();
                          if(!isset($tpllist['shopphonetpl']) || empty($tpllist['shopphonetpl']))
                          {
                          }else{
                             $contents = Mysite::$app->statichtml($tpllist['userbuytpl'],$tempdata);
                          }

                       }
                       if(!empty($contents)){

                         /*$time = time();
                         $tempstr = md5(Mysite::$app->config['wxtoken'].$time);
                         $tempstr = substr($tempstr,3,15);
                         $dolink = Mysite::$app->config['siteurl'].'/index.php?controller=wxsite&action=ordershow&orderid='.$orderinfo['id'];


                         $backinfo = '';
                         if(!empty($dolink)){
                                $templink = $dolink;
                             for($i=0;$i<strlen($templink);$i++){
                               $backinfo .= ord($templink[$i]).',';
                             }
                         }
                       // $backinfo =  str_replace(array('"',',','&'),array('-','^','@'),json_encode($dolink));
                       //shopshoworder
                       $linkstr =  Mysite::$app->config['siteurl'].'/index.php?controller=wxsite&action=index&openid='.$wxbuyer['openid'].'&actime='.$time.'&sign='.$tempstr.'&backinfo='.$backinfo;
                       $contents .= '<a href=\''.trim($linkstr).'\'>查看详情</a>';*/



                         if($wx_s->sendmsg($contents,$wxbuyer['openid'])){
                          }else{
                         logwrite('微信客服发送错误:'.$wx_s->err());
                         }
                       }
                   }
            }
        }


      if(!empty($shopinfo['machine_code'])&&!empty($shopinfo['mKey'])){
              $payarrr = array('outpay'=>'到付','open_acout'=>'余额支付');
              $orderpastatus = $orderinfo['paystatus'] == 1?'已支付':'未支付';
              $orderpaytype = isset($payarrr[$orderinfo['paytype']])?$payarrr[$orderinfo['paytype']]:'在线支付';
              $temp_content = '';
              foreach($orderdet as $km=>$vc){
                $temp_content .= $vc['goodsname'].'('.$vc['goodscount'].'份) \n ';
             }
$msg = '商家:'.$shopinfo['shopname'].'
订餐热线:'.Mysite::$app->config['litel'].'
订单状态：'.$orderpaytype.',('.$orderpastatus.')
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
        $this->dosengprint($msg,$shopinfo['machine_code'],$shopinfo['mKey']);
         }

        if(in_array(2,$checknotice)){//同时使用邮件通知

           if(Mysite::$app->config['noticeshopemail'] == 1){//同时使用邮件通知
             if(IValidate::email($shopinfo['email'])){
                  $default_tpl = new config('tplset.php',hopedir);
                  $tpllist = $default_tpl->getInfo();
                  if(!isset($tpllist['emailorder']) || empty($tpllist['emailorder']))
                  {
                     logwrite('邮件发送商家模板加载失败');
                  }else{
                    //surelink
                    //算方计算
                     $time = time();
                   $tempstr = md5($orderinfo['dno'].$time);
                   $tempstr = substr($tempstr,3,15);
                   $tempstr = md5($orderinfo['shopuid'].$tempstr);
                   $tempstr = substr($tempstr,3,15);

                     $tempdata['surelink'] =  Mysite::$app->config['siteurl'].'/index.php?controller=site&action=makeshow&id='.$orderinfo['id'].'&actime='.$time.'&sign='.$tempstr.'&status=1';
                     $tempdata['closelink'] = Mysite::$app->config['siteurl'].'/index.php?controller=site&action=makeshow&id='.$orderinfo['id'].'&actime='.$time.'&sign='.$tempstr.'&status=2';
                 $emailcontent = Mysite::$app->statichtml($tpllist['emailorder'],$tempdata);
                   $title = '您有一笔'.Mysite::$app->config['sitename'].'新订单，请尽快处理';
                 $info = $smtp->send($shopinfo['email'], Mysite::$app->config['emailname'],$title,$emailcontent, "" , "HTML" , "" , "");
              }
           }else{
            logwrite('商家'.$shopinfo['shopname'].'邮箱地址'.$shopinfo['shopemail'].'错误');
           }
           }
         }
           $contents = '';
           if(Mysite::$app->config['allowedsendbuyer'] == 1)
             {
                 if(IValidate::suremobi($orderinfo['buyerphone']))
             {
                  $default_tpl = new config('tplset.php',hopedir);
              $tpllist = $default_tpl->getInfo();
              if(!isset($tpllist['userbuytpl']) || empty($tpllist['userbuytpl']))
              {
                logwrite('短信发送会员模版失败');
              }else{
                   $contents = Mysite::$app->statichtml($tpllist['userbuytpl'],$tempdata);
                   if(Mysite::$app->config['smstype'] == 2){//139邮箱转发短信
                    //使用sms10086cn发送
                     $APIServer = 'http://www.sms-10086.cn/Service.asmx/sendsms?';
                     $weblink = $APIServer.'zh='.trim(Mysite::$app->config['sms86ac']).'&mm='.trim(Mysite::$app->config['sms86pd']).'&hm='.$orderinfo['buyerphone'].'&nr='.urlencode($contents).'&dxlbid=27';
                     $contentcccc =  file_get_contents($weblink);
                     logwrite('短信sms10086cn发送结果:'.$contentcccc);
                   }else{
                    //使用sms10086cn发送

                     $phoneids = array();
                       $phoneids[] =$orderinfo['buyerphone'];
                     $chekcinfo = $sendmobile->sendsms($phoneids,$contents);
                     logwrite('亿美短信接口发送结果:'.$chekcinfo);
                   }
                 logwrite($contents);
              }
             }

           }

  }

  function request_by_other($remote_server, $post_string){
    $context = array(   'http' => array(
                                  'method' => 'POST',
                                 'header' => 'Content-type: application/x-www-form-urlencoded' .

                                           '\r\n'.'User-Agent : Jimmy\'s POST Example beta' .

                                           '\r\n'.'Content-length:' . strlen($post_string) + 8,
                               'content' => '' . $post_string)
                     );

                       $stream_context = stream_context_create($context);

                       $data = file_get_contents($remote_server, false, $stream_context);

       return $data;
  }
  public function getorder(){
    return $this->orderid;
  }
  public function ero(){
    return $this->error;
  }
   public function dosengprint($msg,$machine_code,$mKey){
    $xmlData = '<xml>
 <mKey><![CDATA['.$mKey.']]></mKey >
<machine_code><![CDATA['.$machine_code.']]></machine_code >
<Content><![CDATA['.$msg.']]></Content >
</xml>';

//第一种发送方式，也是推荐的方式：
$url = 'http://app.waimairen.com/print.php';  //接收xml数据的文件
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

//预订订单
function orderyuding($info){

    //$data['subtype'] = $info['subtype'];
    $data['is_goshop'] = $info['is_goshop'];
    $data['areaids'] = $info['areaids'];
    //$data['admin_id'] = $info['shopinfo']['admin_id'];
    $data['shopcost'] = $info['allcost'];//:店铺商品总价
    $data['shopps'] = 0;//店铺配送费
    $data['shoptype'] = 0;//: 0:普通订单，1订台订单
    $data['bagcost']=0;//:打包费
    //获取店铺商品总价  获取超市商品总价
    $data['paytype'] = $info['paytype'];
    $data['cxids'] = '';
    $data['cxcost'] = 0;
    $data['yhjcost'] = 0;
    $data['yhjids'] = '';
    $data['scoredown'] = 0;
    $data['allcost'] =$info['allcost']; //订单应收费用
    $data['shopuid'] =$info['shopinfo']['uid'];// 店铺UID
    $data['shopid'] =  $info['shopinfo']['id']; //店铺ID
    $data['shopname'] =$info['shopinfo']['shopname']; //店铺名称
    $data['shopphone'] =  $info['shopinfo']['phone']; //店铺电话
    $data['shopaddress'] =$info['shopinfo']['address'];// 店铺地址
    $data['pstype'] = $info['pstype'] ;
    $data['shoptype'] = 0;
    $data['buyeraddress'] = '';
    $data['ordertype'] = $info['ordertype'];//来源方式;
    $data['buyeruid'] = $info['userid'];// 购买用户ID，0未注册用户
    $data['buyername'] =  $info['username'];//购买热名称
    $data['buyerphone'] = $info['mobile'];// 联系电话
    $data['paystatus'] = 0;// 支付状态1已支付
    $data['content'] = $info['remark'];// 订单备注
    //  daycode 当天订单序号
    $data['ipaddress'] = $info['ipaddress'];
    $data['is_ping'] = 0;// 是否评价字段 1已评完 0未评
    $data['addtime'] = time();
    $data['posttime'] = $info['sendtime'];//: 配送时间
    $data['othertext'] = $info['othercontent'];//其他说明
    //  :审核时间
    $data['passtime'] = time();
    $data['buycode'] = substr(md5(time()),9,6);
    $data['dno'] = time().rand(1000,9999);
    $minitime = strtotime(date('Y-m-d',time()));
    $zpin = array();
    $day = strtotime(date('Y-m-d',$data['posttime']));
    if($info['subtype'] == 1){
      // $this->message('订桌位');
       //


    }elseif($info['subtype'] == 2){
        $data['shopcost'] = $data['shopcost'];
        $data['cxids'] = '';
        $data['cxcost'] = 0;
        $cattype = $info['cattype'];
        if($data['shopcost'] > 0){
           $sellrule =new sellrule();
           $sellrule->setdata($info['shopid'],$data['shopcost'],$info['shopinfo']['shoptype'], $data['posttime'],'platesmcart');
           $ruleinfo = $sellrule->getdata();
           $data['cxcost'] = $ruleinfo['downcost'];
           $data['cxids'] = $ruleinfo['cxids'];
           $zpin = $ruleinfo['zid'];//赠品
        }
        $data['allcost'] =   $data['shopcost'] - $data['cxcost'];
     }
     $panduan = Mysite::$app->config['man_ispass'];
     $data['status'] = 0;
     if($panduan != 1 && $data['paytype'] == 0){
        $data['status'] = 1;
     }
     $data['is_make'] = Mysite::$app->config['allowed_is_make'] == 1?0:1;
     $minitime = strtotime(date('Y-m-d',time()));
     $tj = $this->mysql->select_one("select count(id) as shuliang from ".Mysite::$app->config['tablepre']."order where shopid='".$info['shopid']."' and addtime > ".$minitime."  limit 0,1000");
     $data['daycode'] = $tj['shuliang']+1;
     $this->mysql->insert(Mysite::$app->config['tablepre'].'order',$data);  //写主订单
     $orderid = $this->mysql->insertid();

     $this->orderid = $orderid;
     if($info['subtype'] == 2){
  foreach($info['goodslist'] as $key=>$value){
    $cmd['order_id'] = $orderid;
    $cmd['goodsid'] = $value['id'];
    $cmd['goodsname'] = $value['name'];
    $cmd['goodscost'] = $value['cost'];
    $cmd['goodscount'] = $value['count'];
    $cmd['shopid'] = $value['shopid'];
    $cmd['status'] = 0;
    $cmd['is_send'] = 0;
    $this->mysql->insert(Mysite::$app->config['tablepre'].'orderdet',$cmd);
    //减库存pinkky
    $daystock = $this->mysql->select_one("SELECT * FROM ".Mysite::$app->config['tablepre']."daystock WHERE goods_id=".$value['id']." and day=".$day);
    if ($daystock) {
      $this->mysql->update(Mysite::$app->config['tablepre'].'daystock','`stock`=`stock`+1',"id=".$daystock['id']);
    } else {
      $stockdata['goods_id'] = $value['id'];
      $stockdata['day'] = $day;
      $stockdata['stock'] = 1;
      $this->mysql->insert(Mysite::$app->config['tablepre'].'daystock', $stockdata);
    }
    $this->mysql->update(Mysite::$app->config['tablepre'].'goods','`sellcount`=`sellcount`+'.$cmd['goodscount'],"id='".$cmd['goodsid']."'");
  }
  if(is_array($zpin)&& count($zpin) > 0){
    foreach($zpin as $key=>$value){
      $datadet['order_id'] = $orderid;
      $datadet['goodsid'] = $key;
      $datadet['goodsname'] = $value['presenttitle'];
      $datadet['goodscost'] = 0;
      $datadet['goodscount'] = 1;
      $datadet['shopid'] = $info['shopid'];
      $datadet['status'] = 0;
      $datadet['is_send'] = 1;
      //更新促销规则中 此赠品的数量
      $this->mysql->insert(Mysite::$app->config['tablepre'].'orderdet',$datadet);
      $this->mysql->update(Mysite::$app->config['tablepre'].'rule','`controlcontent`=`controlcontent`-1',"id='".$key."'");
    }
  }
}

  $checkbuyer = Mysite::$app->config['allowedsendbuyer'];
  $checksend = Mysite::$app->config['man_ispass'];
  if($checksend != 1){
    if($data['status'] == 1){
      $this->sendmess($orderid);
    }
  }

}

}
