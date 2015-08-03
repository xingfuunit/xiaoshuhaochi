<?php
/*微信
  转化内容
*/
class wx_b{
	private $obj;
	private $mysql; //定义数据库
	private $tablepre;
	private $result;
	function __construct($wxobj){
	  global $Mconfig;
	  $this->tablepre =  $Mconfig['tablepre'];
		$this->mysql = new mysql_class();
		$this->obj = $wxobj;
    //logwrite('初始化函数结束');
	}
	function text(){
		global $Mconfig;
		$controller = $this->obj->Content;
		//logwrite('调用文本');
		$tempinfo = explode('##',$controller);
		if(count($tempinfo) == 2){
			//修改密码
			 $wxuser = $this->mysql->select_one("select * from ".$this->tablepre."wxuser where openid='".$this->obj->FromUserName."'");
			 if(empty($wxuser)) $this->Rtext('未关注我们，不可绑定帐号');
			 if($wxuser['is_bang'] == 1) $this->Rtext('已绑订帐号不可重复绑定');
			 if(empty($tempinfo[0])) $this->Rtext('绑定帐号失败,帐号为空');
			 if(empty($tempinfo[1])) $this->Rtext('绑定帐号失败,帐号为空');
			 $info =  $this->mysql->select_one("select * from ".$this->tablepre."member where (email='".$tempinfo[0]."' or username='".$tempinfo[0]."') ");
			 if(empty($info)) $this->Rtext('绑定帐号失败,帐号未查找到');
			 if(!empty($info['is_bang'])) $this->Rtext('帐号已绑定其他帐号');
			 if($info['password'] != md5($tempinfo[1])) $this->Rtext('帐号绑订失败,密码错误');//怎么样绑订定微信号
			 $data['uid'] = $info['uid'];
			 $data['is_bang'] = 1;
			 $this->mysql->update($this->tablepre.'wxuser',$data,"openid='".$this->obj->FromUserName."'");
			 //删除默认绑定帐号
			 $temuser  = $this->mysql->select_one("select * from ".$this->tablepre."member where uid='".$wxuser['uid']."' ");
			 $all['score'] = $temuser['score']+$info['score'];
			 $all['cost'] =  $temuser['cost'] +$info['cost'];
			 $all['is_bang'] = 1;
			 $this->mysql->update($this->tablepre.'member',$all,"uid='".$info['uid']."'");
			 //合并积分
			 $this->mysql->delete($this->tablepre.'member',"uid ='".$wxuser['uid']."'");
			 $this->Rtext('绑定帐号成功');
		}elseif($controller == 'j'){
			 $this->showjf();
		}elseif($controller == 'c'){
		   $this->showorder();
		}elseif($controller == 'test'){
			  $newlink = $this->Mlink($Mconfig['siteurl'].'/index.php?controller=wxsite&action=order');
			  $string .= '<a href="'.$newlink.'">查看历史订单</a>';
			  $this->Rtext($string);
		}else{
			//获取自动回答操作
			//xiaozu_wxback
			if(!empty($controller) && strlen($controller) <  10){

			     $backinfo= $this->mysql->select_one("select * from ".$this->tablepre."wxback where code = '".$controller."' ");
			     if(!empty($backinfo)){
			     	 //logwrite('调用自动回复');
			        $this->trmsg($backinfo['msgtype'],$backinfo['values']);
			     }

		  }


			echo '';
			exit;
		}

	}
	function showorder(){
		global $Mconfig;
	     $buyerstatus = array(
		       '0'=>'待处理订单',
	        	'1'=>'审核通过,待发货',
	        	'2'=>'订单已发货',
	        	'3'=>'订单完成',
		      '4'=>'买家取消订单',
		      '5'=>'卖家取消订单',
              '18'=>'系统取消订单'
		     );
		    $paytypelist = array('outpay'=>'货到支付','open_acout'=>'账号余额支付');
	      $paylist = $this->mysql->getarr("select * from ".$this->tablepre."paylist   order by id asc limit 0,50");
		    if(is_array($paylist)){
		         foreach($paylist as $key=>$value){
		        	    $paytypelist[$value['loginname']] = $value['logindesc'];
		         }
	      }
	      $payarr = array('0'=>'未支付','1'=>'已支付');
		  	$userinfo = $this->userinfo();
			  $nowtime = strtotime(date('Y-m-d',time()));
			  $orderlist= $this->mysql->getarr("select * from ".$this->tablepre."order where   addtime > ".$nowtime." and buyeruid = '".$userinfo['uid']."'  ");

			  if(empty($orderlist)){
			    $this->Rtext('您今天未下单');
			  }
			  $string = '';
			  foreach($orderlist as $key=>$value){
			  	$string .='单号:'.$value['dno'];
			  	$string .="\n";
			  	$string .='店铺:'.$value['shopname'];
			  	$string .="\n";
			  	$string .='店铺电话:'.$value['shopphone'];
			  	$string .="\n";
			  	$string .='订单状态:'.$buyerstatus[$value['status']];
			  	$string .="\n";
			  	$string .= $paytypelist[$value['paytype']].',('.$payarr[$value['paystatus']].')';
			  	$string .="\n";
			  	$string .='配送时间:'.date('Y-m-d H:i:s',$value['posttime']);
			  	$string .="\n";
			  	$string .=',订单总价'.$value['allcost'];
			  	$string .="\n";
			    $orderdet= $this->mysql->getarr("select * from ".$this->tablepre."orderdet where order_id = '".$value['id']."' ");
			    foreach($orderdet as $k=>$v){
			    	$string .= $v['goodsname'].'('.$v['goodscount'].'*'.$v['goodscost'].')';
			    	$string .="\n";
			    }
			    $string .="\n";
			  }

			  $newlink = $this->Mlink($Mconfig['siteurl'].'/index.php?controller=wxsite&action=order');
			  $string .= '<a href="'.$newlink.'">查看历史订单</a>';
			  $this->Rtext($string);
	}
	function  showjf(){
	      $userinfo = $this->userinfo();
			  $acountstr = '';
			  if($userinfo['is_bang'] == 0){
			  	$acountstr = '帐号积分'.$userinfo['score'];
			  }else{
			  	$acountstr = '已绑定'.$userinfo['username'].',帐号积分:'.$userinfo['score'];
			  }
			  $this->Rtext($acountstr);
	}

	function image(){
		echo  '';
		exit;
		$this->Rtext('你发的是图片');
	}

	function  voice(){
				echo  '';
		exit;
		$this->Rtext('你发的是声音');
	}
	function   video(){
				echo  '';
		exit;
		$this->Rtext('你发的是图象');

	}
	function location(){
		global $Mconfig;
		    $userinfo = $this->userinfo();
        if(!empty($userinfo)){
             $shopinfo= $this->mysql->select_one("select * from ".$this->tablepre."shop where uid = '".$userinfo['uid']."' ");
             if(!empty($shopinfo)){
                $data['lat']  = $this->obj->Location_X;
                $data['lng'] = $this->obj->Location_Y;//lat 地图左坐标	lng
                $this->mysql->update($this->tablepre.'shop',$data,"id='".$shopinfo['id']."'");
                $this->Rtext('您已经绑定店铺，发送定位是绑定商家位置');
             }else{
             	//获取最近 10个店铺
             	//
             	$lat =  trim($this->obj->Location_X);
             	$lng =  trim($this->obj->Location_Y);
             	 $shoplist =   $this->mysql->getarr("select id,shopname,lat,lng,shoplogo from ".$this->tablepre."shop  where is_open = 1 and is_pass =1 and  SQRT((`lat` -".$lat.") * (`lat` -".$lat." ) + (`lng` -".$lng." ) * (`lng` -".$lng." )) < (`pradiusa`*0.0015)      ORDER BY  (`lat` -".$lat.") * (`lat` -".$lat." ) + (`lng` -".$lng." ) * (`lng` -".$lng." ) ASC limit 0,100");
             	 $contents = '';
             	 if(is_array($shoplist)){
             	 	  $contents = '获取离您最近的10个店铺';
             	 	  $tempinfo = array();
             	 	  foreach($shoplist  as $key=>$value){
             	 	  	/*
             	 	  	$contents .="\n";
             	 	  	$newlink = $this->Mlink($Mconfig['siteurl'].'/html5/goodslist.html?id='.$value['id']);
			              $linkstring = '<a href="'.$newlink.'">'.$value['shopname'].'</a>';
             	 	  	$mi = $this->GetDistance($lat,$lng,$value['lat'],$value['lng'],1);
             	 	  	logwrite('店铺'.$value['shopname'].'lat:'.$value['lat'].',lng:'.$value['lng'].'结果：'.$mi);
             	 	  	$mi = $mi > 1000? round($mi/1000,2).'公里':$mi.'米';
             	 	    $contents .= $linkstring.',距离您'.$mi;*/
             	 	    $temc = array();
             	 	    $temc['biaoti'] = $value['shopname'];
             	 	  // 	$mi = $this->GetDistance($lat,$lng,$value['lat'],$value['lng'],1);
             	 	  // 	$mi = $mi > 1000? round($mi/1000,2).'公里':$mi.'米';
             	 	  //  $temc['miaoshu'] = $value['shopname'].'距离您'.$mi;
             	 	   // $temc['biaoti'] = $value['shopname'].'距离您'.$mi;
             	 	    $temc['miaoshu'] = $value['shopname'];
             	 	    $tupian = empty($value['shoplogo'])? $Mconfig['shoplogo']:$value['shoplogo'];
             	 	    if(count(explode('://',$tupian))>1){
             	 	    	$temc['tupian'] = $tupian;
             	 	    }else{
             	 	    	$temc['tupian'] = $Mconfig['siteurl'].$tupian;
             	 	    }
             	 	    $temc['lianjie'] = $Mconfig['siteurl'].'/index.php?controller=wxsite&action=shopshow&id='.$value['id'];
             	 	    $tempinfo[] = $temc;
             	 	  }
             	 	  if(count($tempinfo) > 0){
             	 	     $this->trmsg(3,serialize($tempinfo));
             	 	  }
             	 }
             }

        }
        echo  '';
        exit;
		$this->Rtext('您在定位');
	}
	function link(){
				echo  '';
		exit;
		$this->Rtext('您在发送的是连接');
	}
  function GetDistance($lat1, $lng1, $lat2, $lng2, $len_type = 1, $decimal = 2)
  {
    	 define('EARTH_RADIUS', 6378.137);//地球半径，假设地球是规则的球体
       define('PI', 3.1415926);
    	 $earth = 6378.137;
    	 $pi = 3.1415926;
       $radLat1 = $lat1 * PI ()/ 180.0;   //PI()圆周率
       $radLat2 = $lat2 * PI() / 180.0;
       $a = $radLat1 - $radLat2;
       $b = ($lng1 * PI() / 180.0) - ($lng2 * PI() / 180.0);
       $s = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1) * cos($radLat2) * pow(sin($b/2),2)));
       $s = $s * EARTH_RADIUS;
       $s = round($s * 1000);
       if ($len_type > 1)
       {
           $s /= 1000;
       }
       //logwrite('jisuan:'.$s);
       return round($s, $decimal);
  }
	function event(){
		 global $Mconfig;
		$controller = $this->obj->Event;
		switch($controller){
		   case 'subscribe': //关注
		   $arr['username'] = $this->obj->FromUserName;
       $arr['phone'] = '';
       $arr['address'] = '';
       $arr['password'] = md5($this->obj->FromUserName);
       $arr['email'] = '';
       $arr['creattime'] = time();

       $arr['score']  =0;
       $arr['logintime'] = time();
       $arr['logo'] = '';
       $arr['loginip'] ='';
       $arr['group'] = 10;
       $ehckinfo = $this->mysql->select_one("select * from ".$this->tablepre."wxuser where openid='".$this->obj->FromUserName."'");
       if(empty($ehckinfo)){
          $this->mysql->insert($this->tablepre.'member',$arr);
          $uid = $this->mysql->insertid();
          $data['uid'] = $uid;
          $data['openid'] = $this->obj->FromUserName;
          $data['is_bang'] = 0;
		      $this->mysql->insert($this->tablepre.'wxuser',$data);
		      //logwrite('写用户信息');
		      if($Mconfig['wx_juan'] ==1){
	 	   //注册送优惠券
	 	   $nowtime = time();
	 	   $endtime = $nowtime+$Mconfig['wx_juanday']*24*60*60;
	 	   $juandata['card'] = $nowtime.rand(100,999);
       $juandata['card_password'] =  substr(md5($juandata['card']),0,5);
       $juandata['status'] = 1;// 状态，0未使用，1已绑定，2已使用，3无效
       $juandata['creattime'] = $nowtime;// 制造时间
       $juandata['cost'] = $Mconfig['wx_juancost'];// 优惠金额
       $juandata['limitcost'] =  $Mconfig['wx_juanlimit'];// 购物车限制金额下限
       $juandata['endtime'] = $endtime;// 失效时间
       $juandata['uid'] = $uid;// 用户ID
       $juandata['username'] = '微信用户';// 用户名
       $juandata['name'] = '关注微信息赠送优惠券';//  优惠券名称
	 	   $this->mysql->insert($this->tablepre.'juan',$juandata);

	 	         }
		   }else{
		   	$this->Rtext('欢迎回来');
		   }

		   $backinfo= $this->mysql->select_one("select * from ".$this->tablepre."wxback where code = '".$controller."' ");
			 if(!empty($backinfo)){
			     	 //logwrite('调用自动回复');
			        $this->trmsg($backinfo['msgtype'],$backinfo['values']);
		   }else{
		         $this->Rtext('欢迎关注微信息');
		   }
		   break;
		   case 'unsubscribe': //取消关注
		   /*
		   $tempinfo = $this->mysql->select_one("select * from ".$this->tablepre."wxuser where openid='".$this->obj->FromUserName."'");
		   if(empty($tempinfo)){
		     echo '';
		     exit;
		   }
		   $this->mysql->delete($this->tablepre.'wxuser',"openid ='".$this->obj->FromUserName."'");
		   if(empty($tempinfo['is_bang'])){
		   	 $this->mysql->delete($this->tablepre.'member',"uid ='".$tempinfo['uid']."'");
		   }else{
		    //已绑定帐号 取消已绑订帐号标志
		     $bang['is_bang'] =  0;
			   $this->mysql->update($this->tablepre.'member',$bang,"uid='".$tempinfo['uid']."'");
		   }*/
		    //logwrite('取消关注');
		   echo '';
		   exit;
		   break;
		   case 'CLICK':
		   $code = $this->obj->EventKey;
		   if(empty($code)){
		   	echo '';
		   	exit;
		   }elseif($code == 'j'){
		   	 $this->showjf();
		   }elseif($code == 'c'){
		     $this->showorder();
		   }else{
		   	  $backinfo= $this->mysql->select_one("select * from ".$this->tablepre."wxmenu where code = '".$code."' ");
			     if(!empty($backinfo)){
			     	 //logwrite('调用自动回复');
			     	 $msgtype = $backinfo['msgtype']+1;
			        $this->trmsg($msgtype,$backinfo['values']);
			     }else{
			      echo '';
			      exit;
			    }
		   }

		   		echo  '';
		exit;

		   $this->Rtext('您点了菜单'.$caozuoma);
		   break;
		   case 'VIEW':
		   		echo  '';
		exit;
		    $this->Rtext('您点了带超连接的菜单');
		   break;
		   case 'SCAN':
		   		echo  '';
		exit;
		    $this->Rtext('你进行扫描进入');
		   break;
		   case 'LOCATION':
		    //<Latitude>23.137466</Latitude>
        //<Longitude>113.352425</Longitude>

        $userinfo = $this->userinfo();
        if(!empty($userinfo)){

        	   $memberdata['wxlat'] = $this->obj->Latitude;
          	 $memberdata['wxlng'] = $this->obj->Longitude;
        	  $this->mysql->update($this->tablepre.'wxuser',$memberdata,"uid='".$userinfo['uid']."'");
             $shopinfo= $this->mysql->select_one("select * from ".$this->tablepre."shop where uid = '".$userinfo['uid']."' ");
             /*
             if(!empty($shopinfo)){
             	  $this->Rtext('定位');

                $data['lat']  = $this->obj->Latitude;
                $data['lng'] = $this->obj->Longitude;
                $this->mysql->update($this->tablepre.'shop',$data,"uid='".$userinfo['uid']."'");
                $this->Rtext('您已绑定店铺，标记店铺位置成功');
             }else{ */
             	//获取最近 10个店铺
             	//
             	$lat =  $this->obj->Latitude;
             	$lng =  $this->obj->Longitude;
             	/*
             	 $shoplist =   $this->mysql->getarr("select shopname,lat,lng from ".$this->tablepre."shop  where is_open = 1  ORDER BY  (`lat` -".$lat.") * (`lat` -".$lat." ) + (`lng` -".$lng." ) * (`lng` -".$lng." ) ASC limit 0,10");
             	 $contents = '';
             	 if(is_array($shoplist)){
             	 	  $contents = '获取离您最近的10个店铺';
             	 	  foreach($shoplist  as $key=>$value){
             	 	  	$contents .="\n";
             	 	  	$contents .= $value['shopname'];
             	 	  }
             	 }
             	 if(!empty($contents)){
             	   $this->Rtext($contents);
             	 }*/

            // }

        }else{
         $this->Rtext('定位');
        }
        echo  '';
        exit;
		   break;
		   default:
		    $this->Rtext('未定义的事件');
		   break;
		}
	}
	function error(){
		return '';
	}
	function userinfo(){
	   $info = $this->mysql->select_one("select * from ".$this->tablepre."wxuser as a left join ".$this->tablepre."member as b on a.uid = b.uid   where a.openid='".$this->obj->FromUserName."' ");
	    return $info;
	}
	//回复信息函数
	function trmsg($msgtype,$msgcontent){//msgtype == 1 表示 连接  2 表示内容  3表示图文
		if($msgtype ==  1){
			 if(!empty($msgcontent)){

			      $newcontent = unserialize($msgcontent);
			      if(isset($newcontent['lj_link'] ) && isset($msgcontent['lj_title'])){
			        $links = $this->Mlink($newcontent['lj_link']);
			        $string = '<a href="'.$links.'">'.$newcontent['lj_title'].'</a>';
			        $this->Rtext($string);
			     }
			 }

		}elseif($msgtype == 2){
		   if(!empty($msgcontent)){
		     $this->Rtext($msgcontent);
		   }
		}elseif($msgtype == 3){
			if(!empty($msgcontent)){
			     $newcontent =  unserialize($msgcontent);//biaoti miaoshu
			     if(is_array($newcontent)){
			     	   $newsTplBody = "<item>
                <Title><![CDATA[%s]]></Title>
                <Description><![CDATA[%s]]></Description>
                <PicUrl><![CDATA[%s]]></PicUrl>
                <Url><![CDATA[%s]]></Url>
                </item>";
                $string = '';
			     	  foreach($newcontent  as $key=>$value){
			     	    $links = $this->Mlink($value['lianjie']);
			     	  	$stringtemp = sprintf($newsTplBody, $value['biaoti'], $value['miaoshu'], $value['tupian'],$links);
			     	  	$string .= $stringtemp;
			     	  }
			        if(!empty($string)){
			        $this->Rnews($string,count($newcontent));
			        }
			     }
			}
		}
		echo '';
		exit;
	}
	function Rtext($msg){
		$msgType = 'text';

		$textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
	  $time = time();
	  $resultStr = sprintf($textTpl, $this->obj->FromUserName, $this->obj->ToUserName, $time, $msgType, $msg);
	  logwrite($resultStr);
	  echo $resultStr;
	  exit;
	}
	function Rnews($msg,$shuliang){
		   $msgType = 'news';
		   $time = time();
	     $newsTplHead = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[%s]]></MsgType>
                <ArticleCount>%s</ArticleCount>
                <Articles>%s</Articles>
                <FuncFlag>0</FuncFlag>
                </xml>";
         $resultStr = sprintf($newsTplHead, $this->obj->FromUserName, $this->obj->ToUserName, $time, $msgType,$shuliang, $msg);
	         logwrite($resultStr);
	       echo $resultStr;
	     //  logwrite($resultStr);
	        exit;
	}
	function Mlink($link){
		/*global $Mconfig;
		$time = time();
		$tempstr = md5(TOKEN.$time);
		$tempstr = substr($tempstr,3,15);
		$mynewstr = '';
		if(!empty($link)){
			$dolink = $link;
		  for($i=0;$i<strlen($dolink);$i++){
	         $mynewstr .= ord($dolink[$i]).',';
      }
    }
		$linkstr =  $Mconfig['siteurl'].'/index.php?controller=wxsite&action=index&openid='.$this->obj->FromUserName.'&actime='.$time.'&sign='.$tempstr.'&backinfo='.$mynewstr;
		 return $linkstr;*/
         return $link;
		/*
		$checkstr = explode('?',$link);
		$linkstr = $link;
		if(count($checkstr) ==1){
			$linkstr .='?';
		}else{
		   $linkstr .='&';
		}

		$time = time();
		$tempstr = md5(TOKEN.$time);
		$tempstr = substr($tempstr,3,15);
		$linkstr .='openid='.$this->obj->FromUserName.'&actime='.$time.'&sign='.$tempstr; ///wxsite?openid=oVHwxt2rUkvhUGalipqpUrByqtp8&actime=1404542066&sign=4f624470b3e5e03
	  return $linkstr;
	  */
	}
	function result(){
	   return $this->result;
	}

	public function __call($name, $arguments) {
        // Note: value of $name is case sensitive.
        logwrite("Calling object method".$name." ");
       $this->Rtext('未定义的操作');
  }

}

?>
