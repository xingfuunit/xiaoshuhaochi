<?php
/*
*   method 方法  包含所有会员相关操作
    管理员/会员  添加/删除/编辑/用户登陆
    用户日志其他相关连的通过  memberclass关联
*/
class method   extends baseclass
{
	/*
	  保存APP通知百度信息
	  参数
	  uid  用户UID
	  pwd 用户密码
	  channelid  百度地图ID
	  userid  百度地图生成的userid
	  公共代码  保存百度 账号绑定信息
	*/
  function appbaidu(){
    $backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$channelid = trim(IFilter::act(IReq::get('channelid')));
  	$userid = trim(IFilter::act(IReq::get('userid')));
  	if(empty($userid)) $this->message('获取失败');
  	if(empty($channelid)) $this->message('changlid获取失败');
  	 $checkmid =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."applogin where uid='".$backinfo['uid']."' ");
  		if(empty($checkmid)){
  		      $Mdata['channelid'] = $channelid;
  		       $Mdata['userid'] = $userid;
	          $Mdata['uid']=$backinfo['uid'];
	          $Mdata['addtime'] = time();
	          $this->mysql->delete(Mysite::$app->config['tablepre']."applogin"," channelid='".$channelid."' and  userid = '".$userid."'"); //删除设备历史记录
            $this->mysql->insert(Mysite::$app->config['tablepre'].'applogin',$Mdata);  //插入新数据
  		}else{
  			 if($checkmid['channelid'] != $channelid ||  $checkmid['userid'] != $userid){
  			 	     $this->mysql->delete(Mysite::$app->config['tablepre']."applogin"," uid='".$backinfo['uid']."'  "); //删除数据库用户
	             $this->mysql->delete(Mysite::$app->config['tablepre']."applogin"," channelid='".$channelid."' and userid = '".$userid."' "); //删除历史相同设备ID
	           $Mdata['channelid'] = $channelid;
  		       $Mdata['userid'] = $userid;
	           $Mdata['uid']=$backinfo['uid'];
	           $Mdata['addtime'] = time();
	            $this->mysql->insert(Mysite::$app->config['tablepre'].'applogin',$Mdata);  //插入新数据
  			 }
  		}

  	$this->success('操作成功');


  }
   /*
  *  检测商家是否登陆
  */
  function checkapp(){
  	$uid = trim(IFilter::act(IReq::get('uid')));
  	$pwd = trim(IFilter::act(IReq::get('pwd')));
  	$member= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$uid."' ");
  	$backarr = array('uid'=>0);
  	if(!empty($member)){
  		if($member['password'] == md5($pwd)){
  			$backarr = $member;
  		}

  	}
  	return $backarr;
  }
  /*
  *  获取商家订单
  */
  function apporder(){
  	$statusarr = array('0'=>'新订单','1'=>'待发货','2'=>'待完成','3'=>'完成','4'=>'关闭','5'=>'关闭');
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	//
  	$gettype = trim(IFilter::act(IReq::get('gettype')));
  	$gettype = !in_array($gettype,array('wait','waitsend','is_send')) ?'wait':$gettype;
  	$newwherearray =array(
  	 'wait'=> ' status > 0 and status < 2 and is_make = 0',
  	 'waitsend'=>' status = 1 and is_make = 1',
  	 'is_send'=>' status > 1 '
  	 );

    $todatay = strtotime(date('Y-m-d',time()));
    $endtime = strtotime(date('Y-m-d',time()).' 23:59:59');
    $orderlist =  $this->mysql->getarr("select id,addtime,posttime,dno,allcost,status,is_make,daycode from ".Mysite::$app->config['tablepre']."order where shopuid = ".$backinfo['uid']." and ".$newwherearray[$gettype]."  and posttime > ".$todatay." and posttime < ".$endtime."");
    $backdatalist = array();
    foreach($orderlist as $key=>$value){
    	$value['showstatus'] = $statusarr[$value['status']];
    	$value['addtime'] = date('H:i:s',$value['addtime']);
       if($value['status'] ==  1){
       	  if($value['is_make'] == 0){
       	    $value['showstatus'] = '新订单';
       	  }elseif($value['status'] !=1){
       	  	$value['showstatus'] = '取消制作';

       	  }
      }
      $backdatalist[] = $value;
    }
    $this->success($backdatalist);
  }
  /*
  * 商家获取信息
  */
  function appshop(){
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
    //获取店铺
    $shopinfo= $this->mysql->select_one("select is_open as shopopentype,starttime as opentime,shopname,id,address as shopaddress,phone as shopphone from ".Mysite::$app->config['tablepre']."shop where uid='".$backinfo['uid']."' ");
    if(empty($shopinfo)) $this->message('获取店铺资料失败');
    $shopinfo['opentime'] = str_replace("|", ",", $shopinfo['opentime']);
    $this->success($shopinfo);
  }
  /*
  * 商家获取商品分类
  */
  function goodstype(){
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
    $shopinfo= $this->mysql->select_one("select is_open as shopopentype,starttime as opentime,shopname,id,address as shopaddress,phone as shopphone from ".Mysite::$app->config['tablepre']."shop where uid='".$backinfo['uid']."' ");
  	if(empty($shopinfo)) $this->message('获取店铺资料失败');
  	$shoptype =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodstype where shopid='".$shopinfo['id']."' order by orderid desc");
  	$this->success($shoptype);
  }
  /*
  * 商家删除商品分类
  */
  function delgoostype(){
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$shopinfo= $this->mysql->select_one("select is_open as shopopentype,starttime as opentime,shopname,id,address as shopaddress,phone as shopphone from ".Mysite::$app->config['tablepre']."shop where uid='".$backinfo['uid']."' ");
  	if(empty($shopinfo)) $this->message('获取店铺资料失败');
  	$id = intval(IFilter::act(IReq::get('id')));
  	if(empty($id)) $this->message('删除ID获取失败');
  	//增加个check  判断是否
  	$checkdata =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."goods where shopid='".$shopinfo['id']."' and typeid=".$id." order by id desc");
  	if(!empty($checkdata)) $this->message('该分类下有商品，删除失败');
  	$this->mysql->delete(Mysite::$app->config['tablepre']."goodstype"," shopid='".$shopinfo['id']."' and id=".$id." ");
  	$shoptype =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodstype where shopid='".$shopinfo['id']."' order by orderid desc");
  	$this->success($shoptype);

  }
  /*
  * 商家添加商品分类
  */
  function addgoostype(){
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$shopinfo= $this->mysql->select_one("select is_open as shopopentype,starttime as opentime,shopname,id,address as shopaddress,phone as shopphone from ".Mysite::$app->config['tablepre']."shop where uid='".$backinfo['uid']."' ");
  	if(empty($shopinfo)) $this->message('获取店铺资料失败');
  	$id = intval(IFilter::act(IReq::get('id')));
  	$name = trim(IFilter::act(IReq::get('name')));
  	$orderid = intval(IFilter::act(IReq::get('orderid')));
  	//	id	shopid 店铺ID	name 分类名称	orderid	cattype 1外卖 2订台
  	if(empty($name)) $this->message('分类名称不能为空');
  	$newdata['shopid'] = $shopinfo['id'];
  	$newdata['name'] = $name;
  	$newdata['orderid'] = $orderid;
  	$newdata['cattype'] = $shopinfo['shoptype'];
  	if(empty($id)){
  	  //新增
  	  $this->mysql->insert(Mysite::$app->config['tablepre']."goodstype",$newdata);
  	}else{
  	   //编辑
  	   $this->mysql->update(Mysite::$app->config['tablepre'].'goodstype',$newdata,"id='".$id."'");
  	}
  	$shoptype =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodstype where shopid='".$shopinfo['id']."' order by orderid desc");
  	$this->success($shoptype);


  }
  /*
  * 商家获取商品
  */
  function goodslist(){
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$shopinfo= $this->mysql->select_one("select is_open as shopopentype,starttime as opentime,shopname,id,address as shopaddress,phone as shopphone from ".Mysite::$app->config['tablepre']."shop where uid='".$backinfo['uid']."' ");
  	if(empty($shopinfo)) $this->message('获取店铺资料失败');
  	$typeid = intval(IFilter::act(IReq::get('typeid')));
  	$goodslist =  $this->mysql->getarr("select id,typeid,name,count,cost,bagcost from ".Mysite::$app->config['tablepre']."goods where shopid='".$shopinfo['id']."' and typeid = ".$typeid." order by id desc");
  	$this->success($goodslist);
  }
  /*
  *  商家删除商品
  */
  function delgoos(){
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$shopinfo= $this->mysql->select_one("select is_open as shopopentype,starttime as opentime,shopname,id,address as shopaddress,phone as shopphone from ".Mysite::$app->config['tablepre']."shop where uid='".$backinfo['uid']."' ");
  	if(empty($shopinfo)) $this->message('获取店铺资料失败');
  		$id = intval(IFilter::act(IReq::get('id')));
  	if(empty($id)) $this->message('删除ID获取失败');
  	$this->mysql->delete(Mysite::$app->config['tablepre']."goods"," shopid='".$shopinfo['id']."' and id=".$id." ");
  	$typeid = intval(IFilter::act(IReq::get('typeid')));
    $goodslist =  $this->mysql->getarr("select id,typeid,name,count,cost,bagcost from ".Mysite::$app->config['tablepre']."goods where shopid='".$shopinfo['id']."' and typeid = ".$typeid." order by id desc");
  	$this->success($goodslist);
  }
  /*
  *  商家添加商品
  */
  function addgoos(){
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$shopinfo= $this->mysql->select_one("select is_open as shopopentype,starttime as opentime,shopname,id,address as shopaddress,phone as shopphone from ".Mysite::$app->config['tablepre']."shop where uid='".$backinfo['uid']."' ");
  	if(empty($shopinfo)) $this->message('获取店铺资料失败');
  	$id = intval(IFilter::act(IReq::get('id')));
  	$name = trim(IFilter::act(IReq::get('name')));
  	$count = intval(IFilter::act(IReq::get('count')));
  	$cost = trim(IFilter::act(IReq::get('cost')));
  	$cost = intval($cost*100);
  	$cost = $cost/100;
  	$typeid = intval(IFilter::act(IReq::get('typeid')));

  	//	id	shopid 店铺ID	name 分类名称	orderid	cattype 1外卖 2订台
  	if(empty($name)) $this->message('商品名称不能为空');
  	$newdata['shopid'] = $shopinfo['id'];
  	$newdata['name'] = $name;
  	$newdata['count'] = $count;
  	$newdata['cost'] = $cost;
  	$newdata['typeid'] = $typeid;

  	if(empty($id)){
  	  //新增
  	  //sellcount 销售数量	shopid 店铺ID	uid  daycount  shoptype
  	  $newdata['sellcount'] = 0;
  	  $newdata['shopid'] = $shopinfo['id'];
  	  $newdata['uid'] =$backinfo['uid'];
  	  $newdata['shoptype'] =  $shopinfo['shoptype'];
  	  $newdata['daycount'] = $count;
  	  $this->mysql->insert(Mysite::$app->config['tablepre']."goods",$newdata);
  	}else{
  	   //编辑
  	   $this->mysql->update(Mysite::$app->config['tablepre'].'goods',$newdata,"id='".$id."' and shopid='".$shopinfo['id']."' ");
  	}
  	$goodslist =  $this->mysql->getarr("select id,typeid,name,count,cost,bagcost from ".Mysite::$app->config['tablepre']."goods where shopid='".$shopinfo['id']."' and typeid = ".$typeid." order by id desc");
  	$this->success($goodslist);
  }
  function editshop(){
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$typename = trim(IFilter::act(IReq::get('typename')));
  	$typevalue = trim(IFilter::act(IReq::get('typevalue')));
  	//   opentime
  	if(!in_array($typename,array('opentype','opentime','shopphone'))) $this->message('未定义的操作');
  	if($typename == 'opentype'){
  		$data['is_open'] = intval($typevalue);
  	}elseif($typename == 'opentime'){
  		$bakcdata = str_replace(",", "|", $typevalue);
  		$data['starttime'] = $bakcdata;
  	}elseif($typename == 'shopphone'){
  		if(!(IValidate::phone($typevalue))) $this->message('正录入正确的订餐电话');
  		$data['phone'] = $typevalue;
  	}
  	$this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"uid='".$backinfo['uid']."'");
  	//shopphone
  	//
    //获取店铺

    $this->success('ok');
  }


  /*
  * 商家获取单个订单
  */
  function appone(){
  	$statusarr = array('0'=>'新订单','1'=>'待发货','2'=>'待完成','3'=>'完成','4'=>'关闭','5'=>'关闭');
  	$paytypelist = array('outpay'=>'货到支付','open_acout'=>'账号余额支付');
  	$shoptypearr = array(
	     '0'=>'外卖',
	     '1'=>'超市',
	     '2'=>'其他',
	     );
		   $paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
		   if(is_array($paylist)){
		     foreach($paylist as $key=>$value){
		   	    $paytypelist[$value['loginname']] = $value['logindesc'];
		     }
	     }
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$orderid = trim(IFilter::act(IReq::get('orderid')));
  	if(empty($orderid)){
  	  $this->message('订单不存在或者不属于您');
  	}
  	 $order= $this->mysql->select_one("select id,dno,addtime,daycode,shopname,shopuid,paytype,paystatus,daycode,ipaddress,allcost,buyername,buyeraddress,buyerphone,posttime,status,is_make,pstype,shopps,shoptype,cxcost,yhjcost,scoredown,bagcost,content from ".Mysite::$app->config['tablepre']."order where id='".$orderid."' "); //cxids 促销规则ID集	cxcost  yhjcost  bagcost
    if(empty($order)){
  	    $this->message('订单不存在');
    }
    if($order['shopuid'] != $backinfo['uid']) $this->message('您不是订单所有者');
    $order['showstatus'] = $statusarr[$order['status']];
    if($order['status'] ==  1){
       	  if($order['is_make'] == 0){
       	    $order['showstatus'] = '新订单';
       	  }elseif($order['status'] !=1){
       	  	$order['showstatus'] = '取消制作';
       	  }
     }
     //cxcost,yhjcost,scoredown,
    $scoretocost =Mysite::$app->config['scoretocost'];
    $scorcost = $order['scoredown'] > 0? intval($order['scoredown']/$scoretocost):0;
    $order['allcx'] = $order['cxcost']+$order['yhjcost']+$scorcost;
    $order['shoptype'] = $shoptypearr[$order['shoptype']];
    $order['paytype'] = $paytypelist[$order['paytype']];
    $order['paystatustype'] =  empty($order['paystatus'])?'未支付':'已支付';
    $order['addtime'] = date('H:i:s',$order['addtime']);
    $order['posttime'] = date('Y-m-d H:i:s',$order['posttime']);
  	$templist =   $this->mysql->getarr("select id,order_id,goodsname,goodscost,goodscount from ".Mysite::$app->config['tablepre']."orderdet where order_id='".$orderid."' ");
  	$newdatalist = array();
  	$shuliang = 0;
  	foreach($templist as $key=>$value){
  		  $value['goodscost'] = $value['goodscost'].'(份)';
  	    $newdatalist[] = $value;

  	    $shuliang += $value['goodscount'];
  	}
  	$newgoods = array('id'=>'0','order_id'=>$orderid,'goodsname'=>'总价','goodscount'=>$shuliang,'goodscost'=>$order['allcost']);
  	$newdatalist[] = $newgoods;

  	$order['det'] = $newdatalist;

    $this->success($order);
  }
  /*
     商家订单处理
   */
  function ordercontrol(){
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
     $orderid = trim(IFilter::act(IReq::get('orderid')));
     $dostring = trim(IFilter::act(IReq::get('dostring')));
     if(empty($orderid)) $this->message('订单获取失败');
     if(!in_array($dostring,array('domake','unmake','send','over'))) $this->message('未定义的操作');
     $order= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id='".$orderid."' ");
     if(empty($order)) $this->message('订单获取失败');
     if($order['shopuid'] != $backinfo['uid']) $this->message('您不是订单所有者');

     if($dostring == 'domake'){
       //制作订单
       if($order['status'] != 1) $this->message('订单状态已发货或者其他状态不可操作');
       if(!empty($order['is_make'])) $this->message('订单制作状态已处理');
       $udata['is_make'] = 1;
        $this->mysql->update(Mysite::$app->config['tablepre'].'order',$udata,"id='".$orderid."'");
     }elseif($dostring == 'unmake'){
     	   //http://192.168.0.105/index.php?controller=member&action=ordercontrol&uid=13&pwd=kkk&=&orderid=76&datatype=json
       //不制作该订单
       if($order['status'] != 1) $this->message('订单状态已发货或者其他状态不可操作');
       if(!empty($order['is_make'])) $this->message('订单制作状态已处理');
        $udata['is_make'] = 2;
        $this->mysql->update(Mysite::$app->config['tablepre'].'order',$udata,"id='".$orderid."'");
     }elseif($dostring == 'send'){
     	//对订单发货
     	  if($order['status'] != 1) $this->message('订单状态已发货或者其他状态不可操作');
     	  $udata['status'] = 2;
        $this->mysql->update(Mysite::$app->config['tablepre'].'order',$udata,"id='".$orderid."'");

     }elseif($dostring == 'over'){
     	if($order['status'] != 2) $this->message('订单状态已发货或者其他状态不可操作');
     	  $udata['status'] = 3;
     	  $this->mysql->update(Mysite::$app->config['tablepre'].'order',$udata,"id='".$orderid."'");
     }else{
       $this->message('未定义的操作');
     }
     $this->success('操作成功');
  }
  /*
  *   商家登陆
  */
  function applogin(){
  	 $uname = trim(IFilter::act(IReq::get('uname')));
  	 $pwd = trim(IFilter::act(IReq::get('pwd')));
  	  $mDeviceID =  trim(IFilter::act(IReq::get('mDeviceID')));
  	 if(empty($uname)) $this->message('用户名为空');
  	 if(empty($pwd)) $this->message('密码为空');

     if(!$this->memberCls->login($uname,$pwd)){
	    	    $this->message($this->memberCls->ero());
	   }
	   $uid = $this->memberCls->getuid();
	   $member= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$uid."' ");
	   unset($member['password']);
	   $this->success($member);
  }
  /*
  * 普通用户登陆
  */
  function appMemlogin(){
  	 $uname = trim(IFilter::act(IReq::get('uname')));
  	 $pwd = trim(IFilter::act(IReq::get('pwd')));
  	  $mDeviceID =  trim(IFilter::act(IReq::get('mDeviceID')));
  	 if(empty($uname)) $this->message('用户名为空');
  	 if(empty($pwd)) $this->message('密码为空');

     if(!$this->memberCls->login($uname,$pwd)){
	    	    $this->message($this->memberCls->ero());
	   }
	   $uid = $this->memberCls->getuid();
	   $member= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$uid."' ");
	       $channelid = trim(IFilter::act(IReq::get('channelid')));
         $userid = trim(IFilter::act(IReq::get('userid')));
         if(!empty($channelid) && !empty($userid)){
         	  $checkmid =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."appbuyerlogin where uid='".$uid."' ");
  		      if(empty($checkmid)){
  		            $Mdata['channelid'] = $channelid;
  		             $Mdata['userid'] = $userid;
	                $Mdata['uid']=$uid;
	                $Mdata['addtime'] = time();
	                $this->mysql->delete(Mysite::$app->config['tablepre']."appbuyerlogin"," channelid='".$channelid."' and  userid = '".$userid."'"); //删除设备历史记录
                  $this->mysql->insert(Mysite::$app->config['tablepre'].'appbuyerlogin',$Mdata);  //插入新数据
  		      }else{
  		      	 if($checkmid['channelid'] != $channelid ||  $checkmid['userid'] != $userid){
  		      	 	     $this->mysql->delete(Mysite::$app->config['tablepre']."appbuyerlogin"," uid='".$uid."'  "); //删除数据库用户
	                   $this->mysql->delete(Mysite::$app->config['tablepre']."appbuyerlogin"," channelid='".$channelid."' and userid = '".$uid."' "); //删除历史相同设备ID
	                 $Mdata['channelid'] = $channelid;
  		             $Mdata['userid'] = $userid;
	                 $Mdata['uid']=$uid;
	                 $Mdata['addtime'] = time();
	                  $this->mysql->insert(Mysite::$app->config['tablepre'].'appbuyerlogin',$Mdata);  //插入新数据
  		      	 }
  		      }
	       }
	   unset($member['password']);
	   $this->success($member);
  }
  /*
  *   检测普通用户登录
  */
  function checkappMem(){
  	$uid = trim(IFilter::act(IReq::get('uid')));
  	$pwd = trim(IFilter::act(IReq::get('pwd')));
  	$mapname = trim(IFilter::act(IReq::get('mapname')));


  	$uid = empty($uid)?ICookie::get('appuid'):$uid;
  	$pwd = empty($pwd)?ICookie::get('apppwd'):$pwd;

  	     $member= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$uid."' ");
  	     $backarr = array('uid'=>0);
  	     if(!empty($member)){
  	     	if($member['password'] == md5($pwd)){
  	     		 $backarr = $member;


  	     		   ICookie::set('appuid',$member['uid'],86400);
                ICookie::set('apppwd',$pwd,86400);

              ICookie::set('appmapname',$mapname,86400);
  	     	}

  	     }

  	return $backarr;
  }
  /*
  * 普通用户注册
  */
  function reg(){
     $tname = IFilter::act(IReq::get('tname'));
     $password = IFilter::act(IReq::get('pwd'));
     $phone = IFilter::act(IReq::get('phone'));
	   $password2 = IFilter::act(IReq::get('pwd2'));
	   if($password2 != $password){
		     $this->message('2次密码不一致');
		 }
		 if($this->memberCls->regester($email,$tname,$password,$phone,5)){
		 	   $this->memberCls->login($tname,$password);
		 	   $uid = $this->memberCls->getuid();
	       $member= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$uid."' ");
	       unset($member['password']);


	       $channelid = trim(IFilter::act(IReq::get('channelid')));
         $userid = trim(IFilter::act(IReq::get('userid')));
         if(!empty($channelid) && !empty($userid)){
         	  $checkmid =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."appbuyerlogin where uid='".$uid."' ");
  		      if(empty($checkmid)){
  		            $Mdata['channelid'] = $channelid;
  		             $Mdata['userid'] = $userid;
	                $Mdata['uid']=$uid;
	                $Mdata['addtime'] = time();
	                $this->mysql->delete(Mysite::$app->config['tablepre']."appbuyerlogin"," channelid='".$channelid."' and  userid = '".$userid."'"); //删除设备历史记录
                  $this->mysql->insert(Mysite::$app->config['tablepre'].'appbuyerlogin',$Mdata);  //插入新数据
  		      }else{
  		      	 if($checkmid['channelid'] != $channelid ||  $checkmid['userid'] != $userid){
  		      	 	     $this->mysql->delete(Mysite::$app->config['tablepre']."appbuyerlogin"," uid='".$uid."'  "); //删除数据库用户
	                   $this->mysql->delete(Mysite::$app->config['tablepre']."appbuyerlogin"," channelid='".$channelid."' and userid = '".$uid."' "); //删除历史相同设备ID
	                 $Mdata['channelid'] = $channelid;
  		             $Mdata['userid'] = $userid;
	                 $Mdata['uid']=$uid;
	                 $Mdata['addtime'] = time();
	                  $this->mysql->insert(Mysite::$app->config['tablepre'].'appbuyerlogin',$Mdata);  //插入新数据
  		      	 }
  		      }
	       }








	       $this->success($member);
		 }else{
		 	 $this->message($this->memberCls->ero());
		 }

  }
  function appuserinfo(){
  	$backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	unset($backinfo['password']);
  	$this->success($backinfo);
  }
  function modify(){
  	$backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$oldpwd = IFilter::act(IReq::get('oldpwd'));
  	$newpwd = IFilter::act(IReq::get('newpwd'));
  	$surepwd = IFilter::act(IReq::get('surepwd'));
  	if(empty($oldpwd)){
  	  $this->message('旧密码不能为空');
  	}
  	if(empty($newpwd)){
  	   $this->message('新密码不能为空');
  	}
  	if($newpwd != $surepwd){
  	  $this->message('新密码和确认密码不一致');
  	}
  	if($backinfo['password'] != md5($oldpwd)){
  	  $this->message('旧密码错误');
  	}
  	$newdata['password'] = md5($newpwd);
  	 $this->mysql->update(Mysite::$app->config['tablepre'].'member',$newdata,"uid='".$backinfo['uid']."'");

    unset($backinfo['password']);
  	$this->success($backinfo);
  }
  /*
  * 获取店铺列表
  暂无判断  坐标所在店铺
  */
  function shop(){
     /*
      参数说明:  距离   价格
      showtype :排序类型  juli   cost  is_cost
      lng: lng坐标
      lat: lat坐标
      uid pwd
      推荐
      */
      /*
    $backinfo = $this->checkappMem();
     $appuid = ICookie::get('appuid');
  	if(empty($backinfo['uid'])){
  		 if(empty($appuid)){
  	      $this->message('nologin');
  	   }
  	}  */
  	//lat  lng
  	//and  SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) < `pradius` '.$bili.'    //lat  lng   pradius
  	$lat = IFilter::act(IReq::get('lat'));
  	$lng = IFilter::act(IReq::get('lng'));
  	$showtype = IFilter::act(IReq::get('showtype'));
  	$orderby = in_array($showtype,array('juli','cost','is_com'))?$showtype:'juli';
  	$orderarray = array(
  	'juli'=>' order by  SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) asc ',
  	'cost'=>' order by a.limitcost asc ',
  	'is_com'=>' order by a.is_com asc '
  	);
  	$areaid = intval(IFilter::act(IReq::get('areaid')));

     $where = ' where endtime > '.time().' and  SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) < `pradius` ';
     if(!empty($areaid)){
       $where = " where b.id in(select shopid from ".Mysite::$app->config['tablepre']."areashop where areaid = ".$areaid." ) ";
       $orderarray = array(
  	'juli'=>' order by id asc ',
  	'cost'=>' order by a.limitcost asc ',
  	'is_com'=>' order by a.is_com asc '
  	);
     }else{
         if(empty($lat)){
           $this->success(array());
         }
     }
     $where = $showtype == 'is_com'? $where.' and a.is_com = 1 ':$where;

     $this->pageCls->setpage(intval(IReq::get('page')),20);
     $list = $this->mysql->getarr("select a.shopid,b.id,b.shopname,b.is_open,b.starttime,b.pointcount as sellcount,lat,lng,a.is_orderbefore,a.limitcost,b.shoplogo,a.personcost,a.is_hot,a.is_com,a.is_new,a.sendset,a.maketime,a.pradius,b.lat,b.lng from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."   ".$orderarray[$orderby]."   limit ".$this->pageCls->startnum().", ".$this->pageCls->getsize()."");
     $shopdata = array();
     $nowhour = date('H:i:s',time());
		    $nowhour = strtotime($nowhour);
     foreach($list as $key=>$value){
        $value['juli'] =  $this->GetDistance($lat, $lng, $value['lat'], $value['lng']).'米';//'未测距';
        $value['opentype'] = '1';//1营业  0未营业
        $imgurl = empty($value['shoplogo'])? Mysite::$app->config['shoplogo']:$value['shoplogo'];
        $checkinfo = $this->shopIsopen($value['is_open'],$value['starttime'],$value['is_orderbefore'],$nowhour);

        if($checkinfo['opentype'] != 2 && $checkinfo['opentype'] != 3){
          $value['opentype'] = '0';
        }

        //$items['opentype'] != 2 && $items['opentype'] != 3

        $value['shopimg'] = Mysite::$app->config['siteurl'].$imgurl;
          unset($value['sendset']);
        $shopdata[] = $value;
     }
     $this->success($shopdata);
  }
  function appbuyorder(){
  	$statusarr = array('0'=>'新订单','1'=>'待发货','2'=>'待评价','3'=>'已完成','4'=>'关闭','5'=>'关闭');
  	$backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	//
  	$gettype = trim(IFilter::act(IReq::get('gettype')));
  	$gettype = !in_array($gettype,array('wait','waitsend','is_send')) ?'wait':$gettype;
  	$newwherearray =array(
  	 'wait'=> ' status > 0 and status < 2 and is_make = 0',
  	 'waitsend'=>' status = 1 and is_make = 1',
  	 'is_send'=>' status > 1 '
  	 );

    $todatay = strtotime(date('Y-m-d',time()));
    $todatay = $todatay - 604800;//最近一周订单

    $orderlist =  $this->mysql->getarr("select id,addtime,posttime,dno,allcost,status,is_make,daycode,shopname,is_ping from ".Mysite::$app->config['tablepre']."order where buyeruid = ".$backinfo['uid']."   and addtime > ".$todatay." order by id desc  "); //and ".$newwherearray[$gettype]."
    $backdatalist = array();
    foreach($orderlist as $key=>$value){
    	$value['showstatus'] = $statusarr[$value['status']];
    	$value['addtime'] = date('Y-m-d H:i:s',$value['addtime']);
       if($value['status'] ==  1){
       	  if($value['is_make'] == 0){
       	    $value['showstatus'] = '等待审核';
       	  }elseif($value['is_make'] ==2){
       	  	$value['showstatus'] = '无效订单';
       	  	$value['status'] = 4;

       	  }
      }elseif($value['status'] == 3){
      	if(empty($value['is_ping'])){
      		 $value['showstatus'] ='待评价';
      	}

      }

      $backdatalist[] = $value;
    }
    $this->success($backdatalist);
  }

  function shopshow(){
     $id = intval(IFilter::act(IReq::get('id')));
     $backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$shopinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where id='".$id."' ");   //店铺基本信息
	 	 if(empty($shopinfo)){
	 	 	//需要进行跳转
	 	 	  echo '店铺获取失败';
	 	 	  exit;
	 	 }
	 	 $shopdet = array();
	 	 if(empty($shopinfo['shoptype'])){
	 	 	 $shopdet = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast where shopid='".$id."' ");
	 	 }elseif($shopinfo['shoptype'] == 1){
	 	 	 $shopdet = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket where shopid='".$id."' ");
	 	 }
	 	 $nowhour = date('H:i:s',time());
	 	 $data['openinfo'] = $this->shopIsopen($shopinfo['is_open'],$shopinfo['starttime'],$shopdet['is_orderbefore'],$nowhour);


	 	 $data['shopinfo'] = $shopinfo;
	 	 $data['shopdet'] = $shopdet;
	 	  $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodstype where shopid='".$id."' ");
	 	  $data['goodstype'] = array();
	 	 foreach($templist as $key=>$value){
	 	 	$value['det'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goods where shopid='".$id."' and typeid =".$value['id']." ");
	 	  $data['goodstype'][]  = $value;
	 	 }
	 	 $shopdet['id'] = $id;
	 	 $shopdet['shoptype']=1;
	 	 $tempinfo =   $this->pscost($shopdet,1);
                $backdata['pstype'] = $tempinfo['pstype'];
                $backdata['pscost'] = $tempinfo['pscost'];
     $data['psinfo'] = $backdata;
     $data['mainattr'] = array();
     $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = ".$shopinfo['shoptype']." and parent_id = 0 and is_main =1  order by orderid asc limit 0,1000");
		 foreach($templist as $key=>$value){
	  	 $value['det'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20");
	  	 $data['mainattr'][] = $value;
	 	 }
	 	 $data['shopattr'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr  where  cattype = ".$shopinfo['shoptype']." and shopid = '".$shopinfo['id']."'  order by firstattr asc limit 0,1000");
	 	 $data['cxinfo'] = array();
	 	 $sellrule =new sellrule();
		 $sellrule->setdata($id,10000,$shopinfo['shoptype']);
		 $ruleinfo = $sellrule->getdata();
	 	 if(isset($ruleinfo['gzdata'])){
	 	   $data['cxinfo'] = $ruleinfo['gzdata'];
	 	 }
	   Mysite::$app->setdata($data);
  }
  function cart(){
		 $Cart = new smCart;
     $carinfo = $Cart->getMyCart();
     $shopid = intval(IReq::get('shopid'));
     $backdata = array();
     if($shopid  > 0){
        if(isset($carinfo['list'][$shopid]['data'])){
        	      $backdata['list'] = $carinfo['list'][$shopid]['data'];
        	      $backdata['sumcount'] =$carinfo['list'][$shopid]['count'];
        	      $backdata['sum'] =$carinfo['list'][$shopid]['sum'];
        	      $backdata['bagcost'] =$carinfo['list'][$shopid]['bagcost'];
        	      //获取促销
        	        $cxclass = new sellrule();
        	      if($carinfo['list'][$shopid]['shopinfo']['shoptype'] ==1){
	   	                    $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$shopid."'    ");
	               }else{
	                    $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$shopid."'    ");
	              }
                $cxclass->setdata($shopid,$backdata['sum'],$carinfo['list'][$shopid]['shopinfo']['shoptype']);
        	      $cxinfo = $cxclass->getdata();
        	      $backdata['surecost'] = $cxinfo['surecost'];
        	      $backdata['downcost'] = $cxinfo['downcost'];
        	      $backdata['gzdata'] = isset($cxinfo['gzdata'])?$cxinfo['gzdata']:array();



                $tempinfo =   $this->pscost($shopcheckinfo,$backdata['sumcount']);
                $backdata['pstype'] = $tempinfo['pstype'];
                $backdata['pscost'] = $cxinfo['nops'] == true?0:$tempinfo['pscost'];
                $backdata['canps'] = $tempinfo['canps'];
        }else{
        	$this->message(array());
        //  $this->hjson(array('error'=>true,'data'=>array()));
        }

     }else{
        $this->message(array());//$backdata = $carinfo;
     }
     $this->success($backdata);
	}
	function shopcart(){//购物车
		 $backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
   	 $id = IFilter::act(IReq::get('id'));
   	$data['scoretocost'] = Mysite::$app->config['scoretocost'];
   	//	id	card 优惠劵卡号	card_password 优惠劵密码	status 状态，0未使用，1已绑定，2已使用，3无效	creattime 制造时间	cost 优惠金额	limitcost 购物车限制金额下限	endtime 失效时间	uid 用户ID	username 用户名	usetime 使用时间	name
   	$data['juanlist'] =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan  where uid='".$backinfo['uid']."' and endtime > ".time()." and status = 1   ");




   	 $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where shopid = ".$id."   ");
		 if(empty($shopinfo)){
		 	 $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where shopid = ".$id."   ");
		 }
	   $nowtime = time();
		 $timelist = array();
		 $info = explode('|',$shopinfo['starttime']);
		 $info = is_array($info)?$info:array($info);
		 $data['is_open'] = 0;
		 $dototime = time()+$shopinfo['maketime']*60;
		 foreach($info as $key=>$value){
		   if(!empty($value)){
		     $temptime = explode('-',$value);
		     if(count($temptime) == 2){ //开始转换

		     	   $btime = strtotime($temptime[0].':00');
		     	   $etime = strtotime($temptime[1].':00');
		     	   $whtime = $btime;
		     	  	while ($whtime < $etime){
		     	  		  if($whtime < $etime && $whtime >= $nowtime && $whtime > $dototime ){
                  $timelist[] = date('H:i',$whtime);
                  $data['is_open'] = 1;
                  }
                  $whtime +=900;
              }

		     }
		   }
		 }
     if($shopinfo['is_open'] == 0  || $shopinfo['is_pass'] == 0){
		 	  $data['is_open'] = 0;
		 }
	   $data['timelist'] =$timelist;
   	 $data['deaddress'] =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."address  where userid = ".$backinfo['uid']." and `default`=1   ");
   	 $data['appmapname'] = ICookie::get('appmapname');


   	$data['domember'] = $backinfo;


   	Mysite::$app->setdata($data);
  }
  function makeorder(){
  	$backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
		 $info['shopid'] = intval(IReq::get('shopid'));//店铺ID
		 $info['remark'] = IFilter::act(IReq::get('remark'));//备注
		 $info['paytype'] =  'outpay';//支付方式IFilter::act(IReq::get('paytype'));//支付方式
		 $info['dikou'] =  intval(IReq::get('dikou'));//抵扣金额
	 	 $info['username'] = IFilter::act(IReq::get('username'));
		 $info['mobile'] = IFilter::act(IReq::get('mobile'));
		 $info['addressdet'] = IFilter::act(IReq::get('addressdet'));
		 $info['senddate'] = date('Y-m-d',time());// IFilter::act(IReq::get('senddate'));
		 $info['minit'] = IFilter::act(IReq::get('minit'));
		 $info['juanid']  =  intval(IReq::get('juanid'));//优惠劵ID
		 $info['ordertype'] = 5;//订单类型
		 $peopleNum = IFilter::act(IReq::get('peopleNum'));
		 $info['othercontent'] ='';//empty($peopleNum)?'':serialize(array('人数'=>$peopleNum));

		 if(empty($info['shopid'])) $this->message('店铺ID错误');
		 $Cart = new smCart;
	   $carinfo = $Cart->getMyCart();
		 if(!isset($carinfo['list'][$info['shopid']]['data'])) $this->message('对应店铺购物车商品为空');
		 if($carinfo['list'][$info['shopid']]['shopinfo']['shoptype'] == 1){
		 	 $shopinfo=   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$info['shopid']."'    ");
	   }else{
	      $shopinfo=   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$info['shopid']."'    ");
	   }


		 if(empty($shopinfo))   $this->message('店铺获取失败');

	//	 $checkps = 	 $this->pscost($shopinfo,$carinfo['list'][$info['shopid']]['count']);
	//	 if($checkps['canps'] != 1) $this->message('该店铺不在配送范围内');
		 $info['cattype'] = 0;//
		 if(empty($info['username'])) 		  $this->message('联系人不能为空');
	  	if(!IValidate::suremobi($info['mobile']))   $this->message('请输入正确的手机号');
		 if(empty($info['addressdet'])) $this->message('详细地址为空');

	   $info['userid'] = !isset($backinfo['score'])?'0':$backinfo['uid'];


     //判断库存
     $senddate = $info['senddate'];
     $minit = $info['minit'];
     $nowpost = strtotime($senddate.' '.$minit.':00');
     $day = strtotime(date('Y-m-d',$nowpost));
     $goods_id_list = [];
     foreach($carinfo['list'][$info['shopid']]['data'] as $key=>$value){
        $goods_id_list[] = $value['id'];
     }
     $goods_ids = implode(',', $goods_id_list);
     $stock_info_list = $this->mysql->getarr("SELECT goods_id,stock FROM ".Mysite::$app->config['tablepre']."daystock WHERE goods_id in ($goods_ids) AND day=$day");
     $stock_list = [];
     foreach ($stock_info_list as $key => $value) {
        $stock_list[$value['goods_id']] = $value['stock'];
     }
     foreach($carinfo['list'][$info['shopid']]['data'] as $key=>$value){
         if ($value['daycount'] - $stock_list[$value['id']] - $value['count'] < 0) {
            $this->message($valeu['name'].'库存不足');
            exit;
         }
     }


	   $ip_l=new iplocation();
     $ipaddress=$ip_l->getaddress($ip_l->getIP());
     if(isset($ipaddress["area1"])){
		   $info['ipaddress']  = $ipaddress['ip'].mb_convert_encoding($ipaddress["area1"],'UTF-8','GB2312');//('GB2312','ansi',);
	   }
	  //area1 二级地址名称	area2 三级地址名称	area3

	  $data['areaids'] = '';
	  /*
	  $checksend = Mysite::$app->config['ordercheckphone'];
    if($checksend == 1){
    	  if(empty($this->member['uid'])){
    	  	  $checkphone = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."mobile where phone ='".$info['mobile']."'   order by addtime desc limit 0,50");
    	  	  if(empty($checkphone)) $this->message('短信验证码不能为空');
    	  	  if(empty($checkphone['is_send'])){
    	  	    $mycode = IFilter::act(IReq::get('phonecode'));
    	  	    if($mycode == $checkphone['code']){
    	  	       $this->mysql->update(Mysite::$app->config['tablepre'].'mobile',array('is_send'=>1),"phone='".$info['mobile']."'");
    	  	    }else{
    	  	       $this->message('验证码不一致');
    	  	    }
    	  	  }
    	  }
    }*/





		 $data['shopcost'] = 0;//:店铺商品总价
		 $data['shopps'] = 0;//店铺配送费

		 $data['bagcost']=0;//:打包费
		 //获取店铺商品总价  获取超市商品总价
		 $data['shopcost'] = $carinfo['list'][$info['shopid']]['sum'];
		 $data['shopps'] = 0;//$checkps['pscost'];
		 $data['bagcost'] =  $carinfo['list'][$info['shopid']]['bagcost'];
		 //支付方式检测
		 $data['paytype'] = $info['paytype'];
		 $paytype = $info['paytype'];
		 if($paytype != 'outpay'){
			 if($paytype == 'open_acout'){
		     if(Mysite::$app->config['open_acout'] != 1 || $userid == 0){
		  	    $data['paytype'] = 'outpay';
		     }
	     }else{
	    	 $paylist = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."paylist where loginname='".$paytype."'  order by id desc  ");
	    	 if($paylist < 1){
	    		 $data['paytype'] = 'outpay';
	    	 }
	     }
		 }
		//判断促销
		$data['cxids'] = '';
		$data['cxcost'] = 0;
		$zpin = array();
		$cattype = $info['cattype'];
		if($data['shopcost'] > 0){
		    $sellrule =new sellrule();
		    $cxtypeid = $cattype+1;
		    $sellrule->setdata($info['shopid'],$data['shopcost'],$shopinfo['shoptype']);
		    $ruleinfo = $sellrule->getdata();
	      $data['cxcost'] = $ruleinfo['downcost'];
	      $data['cxids'] = $ruleinfo['cxids'];
	      $zpin = $ruleinfo['zid'];//赠品
	      $data['shopps'] = $ruleinfo['nops'] == true?0:$data['shopps'];
	  }
	  //判断优惠劵
	  $allcost = $data['shopcost'];
	  $data['yhjcost'] = 0;
		$data['yhjids'] = '';
		$juanid = $info['juanid'];
		$userid = $info['userid'];
	   if($juanid > 0 && $userid > 0){
	      $juaninfo = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."juan  where id= '".$juanid."' and uid='".$userid."'  and status = 1 and endtime > ".time()." ");
	   	  if(!empty($juaninfo)){
	   	  	 if($allcost >= $juaninfo['limitcost']){
	   	  	 	$data['yhjcost'] =  $juaninfo['cost'];
	   	  	 	$juandata['status'] = 2;
	   	  	 	$juandata['usetime'] =  time();
	   	  	 	 $this->mysql->update(Mysite::$app->config['tablepre'].'juan',$juandata,"id='".$juanid."'");
	   	  	 	$data['yhjids'] = $juanid;
	   	  	 }
	   	  }
	   }
	  //积分抵扣
	  $allcost = $allcost - $data['cxcost'] - $data['yhjcost'];
	  $data['scoredown'] = 0;
	  $dikou = $info['dikou'];
	  if(!empty($userid) && $dikou > 0 && Mysite::$app->config['scoretocost'] > 0 && $allcost > $dikou){
	    	 $checkuser= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$userid."'  ");
	    	 if(is_array($checkuser)){
	    	     $checkscore = $dikou*(intval(Mysite::$app->config['scoretocost']));
	    	    if($checkuser['score']  >= $checkscore){
	    	   	  $data['scoredown'] =  $checkscore;
	    	 	    $this->mysql->update(Mysite::$app->config['tablepre'].'member','`score`=`score`-'.$checkscore,"uid ='".$userid."' ");
	    	    }
	    	 }
	  }
	  $dikou = $data['scoredown'] > 0?$dikou:0;
	  $allcost = $allcost-$dikou;
	  $data['allcost'] = $allcost+$data['shopps']+$data['bagcost']; //订单应收费用

	  $data['shopuid'] = 0;// 店铺UID
		$data['shopid'] = 0; //店铺ID
		$data['shopname'] = '商城'; //店铺名称
		$data['shopphone'] =  Mysite::$app->config['marketphone']; //店铺电话
		$data['shopaddress'] = '';// 店铺地址
		$data['pstype'] = 0;//$checkps['pstype'] ;
		$data['shoptype'] = $shopinfo['shoptype'];
		//检测店铺
		//$senddate = $info['senddate'];
		//$minit = $info['minit'];
	  //$nowpost = strtotime($senddate.' '.$minit.':00');

	  	    $settime = time() - (10*60);
	  	    if($settime > $nowpost)  $this->message('提交配送时间和服务器时间相差超过10分钟下单失败');
	  	    $temp = strtotime($minit.':00');
	  	    $is_orderbefore = $shopinfo['is_orderbefore'] == 0?0:$shopinfo['befortime'];
	  	    $tempinfo = $this->checkshopopentime($is_orderbefore,$nowpost,$shopinfo['starttime']);
	  	    if(!$tempinfo) $this->message('配送时间不在有效配送时间范围');
	  	    $checkcost = $allcost + $data['yhjcost'];
	  	    if($shopinfo['is_open'] != 1) $this->message('店铺暂停营业');
	  	    if($shopinfo['limitcost'] >$checkcost ) $this->message('商品总价低于最小起送价'.$shopinfo['limitcost']);
	  	    $data['shopuid'] = $shopinfo['uid'];// 店铺UID
		      $data['shopid'] = $shopinfo['id']; //店铺ID
		      $data['shopname'] = $shopinfo['shopname']; //店铺名称
		      $data['shopphone'] =  $shopinfo['phone']; //店铺电话
		      $data['shopaddress'] = $shopinfo['address'];// 店铺地址
	  $data['buyeraddress'] = $info['addressdet'];
	  $data['ordertype'] = $info['ordertype'];//来源方式;
	  $data['buyeruid'] = $userid;// 购买用户ID，0未注册用户
		$data['buyername'] =  $info['username'];//购买热名称
		$data['buyerphone'] = $info['mobile'];// 联系电话
		$panduan = Mysite::$app->config['man_ispass'];
	  $data['status'] = $panduan == 1?'0':1;
	  $data['paystatus'] = 0;// 支付状态1已支付
		$data['content'] = $info['remark'];// 订单备注

		//  daycode 当天订单序号
	  $data['ipaddress'] = $info['ipaddress'];
		$data['is_ping'] = 0;// 是否评价字段 1已评完 0未评
		$data['addtime'] = time();
	  $data['posttime'] = $nowpost;//: 配送时间
	  $data['othertext'] = $info['othercontent'];//其他说明
	  //  :审核时间
	  $data['passtime'] = time();
	  if($data['status']  == 1){
	  	$data['passtime'] == 0;
	  }
	  $data['buycode'] = substr(md5(time()),9,6);
	  $data['dno'] = time().rand(1000,9999);
	   $minitime = strtotime(date('Y-m-d',time()));
    $tj = $this->mysql->select_one("select count(id) as shuliang from ".Mysite::$app->config['tablepre']."order where shopid='".$info['shopid']."' and addtime > ".$minitime." limit 0,1000");
	  $data['daycode'] = $tj['shuliang']+1;
	  $this->mysql->insert(Mysite::$app->config['tablepre'].'order',$data);  //写主订单
	  $orderid = $this->mysql->insertid();
	  $this->orderid = $orderid;
	  foreach($carinfo['list'][$info['shopid']]['data'] as $key=>$value){
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
      //$this->mysql->update(Mysite::$app->config['tablepre'].'goods','`count`=`count`-'.$cmd['goodscount'].' ,`sellcount`=`sellcount`+'.$cmd['goodscount'],"id='".$cmd['goodsid']."'");
        $this->mysql->update(Mysite::$app->config['tablepre'].'goods','`sellcount`=`sellcount`+'.$cmd['goodscount'],"id='".$cmd['goodsid']."'");
	  }
	  if(is_array($zpin)){
	     foreach($zpin as $key=>$value){
	  		  $datadet['order_id'] = $orderid;
	  	    $datadet['goodsid'] = $key;
	  	    $datadet['goodsname'] = $value['presenttitle'];
	  	    $datadet['goodscost'] = 0;
	  	    $datadet['goodscount'] = 1;
	  	    $datadet['shopid'] = $shopinfo['id'];
	  	    $datadet['status'] = 0;
	  	    $datadet['is_send'] = 1;
	  	    //更新促销规则中 此赠品的数量
	  	    $this->mysql->insert(Mysite::$app->config['tablepre'].'orderdet',$datadet);
	  	  	$this->mysql->update(Mysite::$app->config['tablepre'].'rule','`controlcontent`=`controlcontent`-1',"id='".$key."'");
	    }
	  }
	  $checkbuyer = Mysite::$app->config['allowedsendbuyer'];
	 	if(Mysite::$app->config['man_ispass']  != 1)
	 	{
	 		  $orderCLs = new orderclass($this->mysql);
        $orderCLs->sendmess($orderid);
	  }
	  if($userid ==  0){
	  	   ICookie::set('orderid',$orderid,86400);
	  }else{
	      //保持地址数据
	    $checkinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."address where userid='".$userid."'  ");
	    if(empty($checkinfo)){
	        $addata['userid'] = $backinfo['uid'];
	        $addata['username'] = $backinfo['username'];
	        $addata['address'] = $data['buyeraddress'];
	        $addata['phone'] = $data['buyerphone'];
	        $addata['contactname'] = $data['buyername'];
	        $addata['default'] = 1;
	         $this->mysql->insert(Mysite::$app->config['tablepre'].'address',$addata);
	    }

	  }

	  $Cart->delshop($info['shopid']);
		$this->success($orderid);
	}
	public static function checkshopopentime($is_orderbefore,$posttime,$starttime){
  	$maxnowdaytime = strtotime(date('Y-m-d',time()));
  	$daynottime = 24*60*60 -1;
  	$findpostime = false;
  	for($i=0;$i <= $is_orderbefore;$i++){
  		if($findpostime == false){
  		   $miniday = $maxnowdaytime+$daynottime*$i;
  		   $maxday = $miniday+$daynottime;
  		   $tempinfo = explode('|',$starttime);
  		   foreach($tempinfo as $key=>$value){
  		   	  if(!empty($value)){
  		   	    $temp2 = explode('-',$value);
  		   	    if(count($temp2) > 1){
  		   	    	$minbijiaotime = date('Y-m-d',$miniday);
  		   	    	$minbijiaotime = strtotime($minbijiaotime.' '.$temp2[0].':00');

  		   	    	$maxbijiaotime = date('Y-m-d',$maxday);
  		   	    	$maxbijiaotime = strtotime($maxbijiaotime.' '.$temp2[1].':00');

  		   	    	if($posttime > $minbijiaotime && $posttime < $maxbijiaotime){
  		   	    		$findpostime = true;
  		   	    		break;
  		   	    	}
  		   	    }
  		   	  }
  		   }

  	  }

  	}
    return $findpostime;
  }
  function showorder(){
  	$orderid = intval(IFilter::act(IReq::get('orderid')));
  	$backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}else{
  		if($this->member['uid'] == 0){


  	   ICookie::set('email',$backinfo['email'],86400);
        ICookie::set('memberpwd',ICookie::get('apppwd'),86400);
        ICookie::set('membername',$backinfo['username'],86400);
        ICookie::set('uid',$backinfo['uid'],86400);
  	 }
  	}
  	//order="++"&uid="+account+"&pwd="+password+"&mapname="+m.getMapname()+"&lat="+m.getLat()+"&lng="+m.getLng()
	  if(!empty($orderid)){

	     	$order = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$backinfo['uid']."' and id = ".$orderid."");

	     	if(empty($order)){
	     		$data['order'] = '';
	     		Mysite::$app->setdata($data);
	     	}else{
	     	     $order['ps'] = $order['shopps'];
	     	     // 超市商品总价	 超市配送配送	shopcost 店铺商品总价	shopps 店铺配送费	pstype 配送方式 0：平台1：个人	bagcost
       	     $orderdet = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."orderdet where order_id='".$order['id']."'");
	            $order['cp'] = count($orderdet);
	            $buyerstatus= array(
	     	     '0'=>'等待处理',
	     	     '1'=>'订餐成功处理中',
	     	     '2'=>'订单已发货',
	     	     '3'=>'订单完成',
	     	     '4'=>'订单已取消',
	     	     '5'=>'订单已取消'
	     	     );
	     	     $paytypelist = array('outpay'=>'货到支付','open_acout'=>'账号余额支付');
	     	     $paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
	     	     if(is_array($paylist)){
	     	       foreach($paylist as $key=>$value){
	     	     	    $paytypelist[$value['loginname']] = $value['logindesc'];
	     	       }
	            }
	     	     $paytypearr = $paytypelist;
	     	      $order['surestatus'] = $order['status'];
	     	     $order['status'] = $buyerstatus[$order['status']];
	     	     $order['paytype'] = $paytypearr[$order['paytype']];
	     	     $order['paystatus'] = $order['paystatus']==1?'已支付':'未支付';
	     	     $order['addtime'] = date('Y-m-d H:i:s',$order['addtime']);
	     	     $order['posttime'] = date('Y-m-d H:i:s',$order['posttime']);


	     	     $data['order'] = $order;
	           $data['orderdet'] = $orderdet;

	           Mysite::$app->setdata($data);

	       }
	  }else{
	  	$data['order'] = '';
	  	Mysite::$app->setdata($data);
	  }


  }
  function commentorder(){

  	$backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
    }else{
  		if($this->member['uid'] == 0){


  	   ICookie::set('email',$backinfo['email'],86400);
        ICookie::set('memberpwd',ICookie::get('apppwd'),86400);
        ICookie::set('membername',$backinfo['username'],86400);
        ICookie::set('uid',$backinfo['uid'],86400);
  	 }
  	}


	    $orderid = intval(IReq::get('orderid'));
	    if(!empty($orderid)){

	     	 $order = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$backinfo['uid']."' and id = ".$orderid."");

	     	if(empty($order)){
	     		$data['order'] = '';
	     		Mysite::$app->setdata($data);
	     	}else{
	     	     $data['order'] =$order;
       	     $orderdet = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."orderdet where order_id='".$order['id']."'");
	           $data['orderdet'] = $orderdet;
	           $tempcoment = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."comment where orderid='".$order['id']."'");
	           $data['comment'] = array();
	           foreach($tempcoment as $key=>$value){
	             $data['comment'][$value['orderdetid']] = $value;
	           }
	           //  id		orderdetid	shopid	goodsid	uid	content	addtime	replycontent	replytime	 评分	is_show 0展示，1不展示
	           Mysite::$app->setdata($data);

	       }
	    }else{
	  	  $data['order'] = '';
	  	  Mysite::$app->setdata($data);
	    }

	}
  function address(){
  	//
  	$backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}else{
  		if($this->member['uid'] == 0){
  	   ICookie::set('email',$backinfo['email'],86400);
        ICookie::set('memberpwd',ICookie::get('apppwd'),86400);
        ICookie::set('membername',$backinfo['username'],86400);
        ICookie::set('uid',$backinfo['uid'],86400);
  	 }
  	}
    $tarelist = $this->mysql->getarr("select *  from ".Mysite::$app->config['tablepre']."address where userid='".$backinfo['uid']."'   order by id asc limit 0,50");
	  $arelist = array();
	  $data['arealist'] = $tarelist;
	  $data['areaarr'] = $arelist;
	  Mysite::$app->setdata($data);

  }
  function giftlog(){
    $backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}else{
  		if($this->member['uid'] == 0){
  	   ICookie::set('email',$backinfo['email'],86400);
        ICookie::set('memberpwd',ICookie::get('apppwd'),86400);
        ICookie::set('membername',$backinfo['username'],86400);
        ICookie::set('uid',$backinfo['uid'],86400);
  	 }
  	}
  	echo '获取礼品记录';
  	exit;
  }
  function gift(){
  	 $backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	echo '获取所有礼品';
  	exit;
  }
  function juan(){
    $backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$wjuan = array('shuliang'=>0,'list'=>array());
		$ujuan = array('shuliang'=>0,'list'=>array());
		$ojuan = array('shuliang'=>0,'list'=>array());
		$nowtime = time();
		$wjuan['shuliang'] =  $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."juan    where uid = ".$backinfo['uid']." and endtime > ".$nowtime." and status = 1 ");
		$wjuan['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan where uid = ".$backinfo['uid']." and endtime > ".$nowtime." and status = 1 ");
		$ujuan['shuliang'] =  $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."juan    where uid = ".$backinfo['uid']."  and status = 2 ");
		$ujuan['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan where uid = ".$backinfo['uid']."   and status = 2 ");

		$ojuan['shuliang'] =  $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."juan    where uid = ".$backinfo['uid']." and endtime < ".$nowtime." and (status = 1 or status =3)");
		$ojuan['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan where uid = ".$backinfo['uid']." and endtime < ".$nowtime." and (status = 1 or status =3)  ");

		$data['wjuan'] = $wjuan;
		$data['ujuan'] = $ujuan;
		$data['ojuan'] = $ojuan;
		Mysite::$app->setdata($data);
  }
  function appbuybaidu(){
    $backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$channelid = trim(IFilter::act(IReq::get('channelid')));
  	$userid = trim(IFilter::act(IReq::get('userid')));
  	if(empty($userid)) $this->message('获取失败');
  	if(empty($channelid)) $this->message('changlid获取失败');
  	 $checkmid =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."appbuyerlogin where uid='".$backinfo['uid']."' ");
  		if(empty($checkmid)){
  		      $Mdata['channelid'] = $channelid;
  		       $Mdata['userid'] = $userid;
	          $Mdata['uid']=$backinfo['uid'];
	          $Mdata['addtime'] = time();
	          $this->mysql->delete(Mysite::$app->config['tablepre']."appbuyerlogin"," channelid='".$channelid."' and  userid = '".$userid."'"); //删除设备历史记录
            $this->mysql->insert(Mysite::$app->config['tablepre'].'appbuyerlogin',$Mdata);  //插入新数据
  		}else{
  			 if($checkmid['channelid'] != $channelid ||  $checkmid['userid'] != $userid){
  			 	     $this->mysql->delete(Mysite::$app->config['tablepre']."appbuyerlogin"," uid='".$backinfo['uid']."'  "); //删除数据库用户
	             $this->mysql->delete(Mysite::$app->config['tablepre']."appbuyerlogin"," channelid='".$channelid."' and userid = '".$userid."' "); //删除历史相同设备ID
	           $Mdata['channelid'] = $channelid;
  		       $Mdata['userid'] = $userid;
	           $Mdata['uid']=$backinfo['uid'];
	           $Mdata['addtime'] = time();
	            $this->mysql->insert(Mysite::$app->config['tablepre'].'appbuyerlogin',$Mdata);  //插入新数据
  			 }
  		}

  	$this->success('操作成功');


  }
  function dologin(){
  	 $this->memberCls->login($tname,$password);

  }
  function appbuyerone(){
  	$backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$statusarr = array('0'=>'取消订单','1'=>'待发货','2'=>'待完成','3'=>'已完成','4'=>'关闭','5'=>'关闭');
  	$paytypelist = array('outpay'=>'货到支付','open_acout'=>'账号余额支付');
  	$shoptypearr = array(
	     '0'=>'外卖',
	     '1'=>'超市',
	     '2'=>'其他',
	     );
		   $paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
		   if(is_array($paylist)){
		     foreach($paylist as $key=>$value){
		   	    $paytypelist[$value['loginname']] = $value['logindesc'];
		     }
	     }
  	$backinfo = $this->checkapp();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$orderid = trim(IFilter::act(IReq::get('orderid')));
  	if(empty($orderid)){
  	  $this->message('订单不存在或者不属于您');
  	}
  	 $order= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id='".$orderid."' "); //cxids 促销规则ID集	cxcost  yhjcost  bagcost
    if(empty($order)){
  	    $this->message('订单不存在');
    }
    if($order['buyeruid'] != $backinfo['uid']) $this->message('您不是订单所有者');

    $backdata['dno'] = $order['dno'];
    $backdata['addtime'] = date('Y-m-d H:i:s',$order['addtime']);
    $backdata['id'] = $order['id'];
    $backdata['allcost'] = $order['allcost'];
    $backdata['shopcost'] = $order['shopcost'];
    $backdata['shopname'] = $order['shopname'];




    $backdata['showstatus'] = $statusarr[$order['status']];
    if($order['status'] ==  1){
       	  if($order['is_make'] == 0){
       	    $backdata['showstatus'] = '取消订单';
       	  }elseif($order['is_make'] ==2){
       	  	$backdata['showstatus'] = '无效订单';
       	  	$backdata['status'] = 4;

       	  }
      }elseif($order['status'] == 3){
      	if(empty($order['is_ping'])){
      		 $backdata['showstatus'] ='待评价';
      	}
      }
    $backdata['is_ping'] = $order['is_ping'];
    $backdata['is_make'] = $order['is_make'];
    $backdata['status'] = $order['status'];
    $temlist = array();
    $dotem =   empty($order['paystatus'])?'未支付':'已支付';
    $templist[]['mytext'] = '订单编号：'.$order['dno'];
    $templist[]['mytext'] = '买家地址：'.$order['buyeraddress'];
    $templist[]['mytext'] = '联系电话：'.$order['buyerphone'];
    $templist[]['mytext'] = '配送时间：'.date('Y-m-d H:i:s',$order['posttime']);
    $templist[]['mytext'] = '支付类型：'.$paytypelist[$order['paytype']];
    $templist[]['mytext'] = '支付状态：'.$dotem;
    $templist[]['mytext'] = '备注：'.$order['content'];

    $backdata['itemlist'] = $templist;
    /*
    if($order['status'] ==  1){
       	  if($order['is_make'] == 0){
       	    $order['showstatus'] = '新订单';
       	  }elseif($order['status'] !=1){
       	  	$order['showstatus'] = '取消制作';
       	  }



      }

    }
     //cxcost,yhjcost,scoredown,
    $scoretocost =Mysite::$app->config['scoretocost'];
    $scorcost = $order['scoredown'] > 0? intval($order['scoredown']/$scoretocost):0;
    $order['allcx'] = $order['cxcost']+$order['yhjcost']+$scorcost;
    $order['shoptype'] = $shoptypearr[$order['shoptype']];
    $order['paytype'] = $paytypelist[$order['paytype']];
    $order['paystatustype'] =  empty($order['paystatus'])?'未支付':'已支付';
    $order['addtime'] = date('H:i:s',$order['addtime']);
    $order['posttime'] = date('Y-m-d H:i:s',$order['posttime']);
    */
  	$templist =   $this->mysql->getarr("select id,order_id,goodsname,goodscost,goodscount from ".Mysite::$app->config['tablepre']."orderdet where order_id='".$orderid."' ");
  	$newdatalist = array();
  	$shuliang = 0;
  	foreach($templist as $key=>$value){
  		  $value['goodscost'] = $value['goodscost'];
  	    $newdatalist[] = $value;

  	    $shuliang += $value['goodscount'];
  	}
  	//$newgoods = array('id'=>'0','order_id'=>$orderid,'goodsname'=>'总价','goodscount'=>$shuliang,'goodscost'=>$order['allcost']);
  	//$newdatalist[] = $newgoods;

  	$backdata['det'] = $newdatalist;

    $this->success($backdata);
  }
  function appbuyerclose(){
  	$backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}
  	$orderid = trim(IFilter::act(IReq::get('orderid')));
  	if(empty($orderid)){
  	  $this->message('订单不存在或者不属于您');
  	}
  	 $order= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id='".$orderid."' "); //cxids 促销规则ID集	cxcost  yhjcost  bagcost
    if(empty($order)){
  	    $this->message('订单不存在');
    }
     if($order['buyeruid'] != $backinfo['uid']) $this->message('您不是订单所有者');
     if(empty($order['status']) || $order['status'] == 1){
     	   if($order['status'] == 1){
     	     if(!empty($order['is_make'])){
     	        $this->message('订单状态不可取消');
     	     }
     	   }
     	   if($order['paystatus'] == 1){
     	      $this->message('订单已支付请登录网站申请退款');
     	   }
     	   $orderdata['status'] = 5;
	   	       $this->mysql->update(Mysite::$app->config['tablepre'].'order',$orderdata,"id='".$orderid."'");
     	   if(!empty($order['buyeruid']))
	   	      {
	   	      	   $detail = '';
	   	      	   $memberinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$order['buyeruid']."'   ");
		             if($orderinfo['scoredown']> 0){
		             	 $this->mysql->update(Mysite::$app->config['tablepre'].'member','`score`=`score`+'.$order['scoredown'],"uid ='".$order['buyeruid']."' ");
		             	 $memberscs = $memberinfo['score']+$order['scoredown'];
		                $this->memberCls->addlog($order['buyeruid'],1,1,$order['scoredown'],'取消订单','用户关闭订单'.$order['dno'].'抵扣积分'.$order['scoredown'].'返回帐号',$memberscs);
		             }
	   	      }

     	   $this->success('操作成功');

     }else{
       $this->message('订单状态不可取消');
     }
  }
  function appallarea(){
  	/*
  	$backinfo = $this->checkappMem();
  	if(empty($backinfo['uid'])){
  	   $this->message('nologin');
  	}*/
  	 $arealist= $this->mysql->getarr("select id,name,parent_id from ".Mysite::$app->config['tablepre']."area  limit 0,1000 ");


  	 $this->success($arealist);

  }
  function appprint(){
     $orderid = trim(IFilter::act(IReq::get('orderid')));
     if(empty($orderid)) $this->message('订单ID错误');
     $ordercode = trim(IFilter::act(IReq::get('ordercode')));
     $cfkey = trim(IFilter::act(IReq::get('cfkey')));
     $cfcode = trim(IFilter::act(IReq::get('cfcode')));
     $qtkey = trim(IFilter::act(IReq::get('qtkey')));
     $qtcode = trim(IFilter::act(IReq::get('qtcode')));


     $orderinfo =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."order  where id= '".$orderid."'   ");
     if(empty($orderinfo)) $this->message('订单信息为空');

	     $orderdet =  $this->mysql->getarr("select *  from ".Mysite::$app->config['tablepre']."orderdet  where order_id= '".$orderid."'   ");
	     $shopinfo =  $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."shop  where id= '".$orderinfo['shopid']."'   ");
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
	     $backdata = array('print_1'=>5,'print_2'=>5);
      if(!empty($cfcode)&&!empty($cfkey)){
	      $backdata['print_1'] =  $this->dosengprint($msg,$cfcode,$cfkey);
	    }
	     if(!empty($qtcode)&&!empty($qtkey)){
	      $backdata['print_2'] =  $this->dosengprint($msg,$qtcode,$qtkey);
	    }
	    /*
	    cfcode  0 发送成功 ,1发送到队列  2没找到MAC地址,403错误，,4链接出错
	    */
     $this->success($backdata);

     //
  }



}



?>
