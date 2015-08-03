<?php
class method   extends baseclass
{
	function index(){

	 	      if(empty($this->member['uid'])){
	 	    		 $link = IUrl::creatUrl('order/guestorder');
             $this->refunction('',$link);
	 	    	}elseif(!empty($this->member['uid'])){
	 	    	 $link = IUrl::creatUrl('order/usersorder');
           $this->refunction('',$link);
          }
	}
	function fastfood(){
			$this->checkshoplogin();
	    $shopid = ICookie::get('adminshopid');
		  if(empty($shopid)) $this->message('COOK失效，请重新登陆');

	}
	function printbyshop(){
	   $shopid =   intval(IFilter::act(IReq::get('shopid')));
	   if(empty($shopid)){
	     echo '店铺ID错误';
	     exit;
	   }
	   $shopinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where id = ".$shopid."   ");
	   if(empty($shopinfo)){
	     echo '店铺信息获取失败';
	     exit;
	   }
	   $data['contactname'] =  trim(IFilter::act(IReq::get('contactname')));
	   $data['phone'] = trim(IFilter::act(IReq::get('phone')));
	   $data['address'] = trim(IFilter::act(IReq::get('address')));
	   $data['shopinfo'] = $shopinfo;
	   $ids = IFilter::act(IReq::get('ids'));
	   if(empty($ids)){
	     echo '商品ID错误';
	     exit;
	   }
	   $num = IFilter::act(IReq::get('nums'));
	   if(empty($num)){
	     echo '商品数量错误';
	     exit;
	   }
	   $tempids = explode(',',$ids);
	   $tempnum = explode(',',$num);
	   if(count($tempids) != count($tempnum)){
	     echo '商品数量和商品ID不一致';
	   }
	   $newid = array();
	   $idtonum = array();
	   foreach($tempids as $key=>$value){
	   	  if(!empty($value)){
	   	       $check1 = intval($value);
	   	       $check2 = intval($tempnum[$key]);
	   	       if($check1 > 0 && $check2 > 0){
	   	           $newid[] = $value;
	   	           $idtonum[$value] = $check2;
	   	       }
	   	  }
	   }
	   $whereid = join(',',$newid);
	   if(empty($whereid)){
	   	  echo '数据错误';
	   	  exit;
	   }

	   	$orderlist = $this->mysql->getarr("select id,name,cost,bagcost from ".Mysite::$app->config['tablepre']."goods where shopid =".$shopid." and id in(".$whereid.") ");
	   	$data['goodslist'] = array();
	   	$sumcost = 0;
	   	$bagcost = 0;
	   	foreach($orderlist as $key=>$value){
	   	   $value['shuliang'] = $idtonum[$value['id']];
	   	   $sumcost += $value['cost']*intval($idtonum[$value['id']]);
	   	   $value['xiaoij'] = $value['cost']*intval($idtonum[$value['id']]);
	   	   $bagcost += $value['bagcost']*intval($idtonum[$value['id']]);
	   	   $data['goodslist'][] = $value;
	   	}
	   	$data['bagcost'] = $bagcost;
	   	$data['sumcost'] = $sumcost;

	   Mysite::$app->setdata($data);
	}

   //快速下单获取店铺数据
   function fastfoodshop(){
   	 $id = IFilter::act(IReq::get('shopid'));
   	 $shopinfo =  $this->mysql->select_one("select id,shopname,starttime,shoptype,address,phone from ".Mysite::$app->config['tablepre']."shop  where   id = ".$id." order by id desc ");
   	 if(empty($shopinfo)){
   	   echo '店铺数据为空';
   	   exit;
   	 }
   	 if($shopinfo['shoptype'] == 0){
   	 		$shoptype = $this->mysql->getarr("select id,name from ".Mysite::$app->config['tablepre']."goodstype where shopid='".$id."' order by orderid asc ");
   	 		$data['shopdet'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast where shopid='".$id."' ");
   	 }else{
   	 	  $shoptype = $this->mysql->getarr("select id,name from ".Mysite::$app->config['tablepre']."marketcate where shopid = '".$id."' and parent_id != 0 order by orderid asc  ");
   	 	  $data['shopdet'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket where shopid='".$id."' ");
   	 }
   	 if(empty($data['shopdet'])){
   	 	echo '店铺未设置商品详情';
   	 	exit;
   	 }
   	 $goodslist = $this->mysql->getarr("select id,name,cost,bagcost,count,typeid from ".Mysite::$app->config['tablepre']."goods where   shopid=".$id." order by id asc limit 0,1000  ");
   	 $data['shop'] = $shopinfo;
   	 $data['goodstype'] = $shoptype;
   	 $data['goods'] = $goodslist;
   	 Mysite::$app->setdata($data);
   }
   //快速选择地址
   function areashow(){
   	  $shopid = intval(IFilter::act(IReq::get('shopid')));

   	  //获取店铺所有地址
   	  $shoptype = 'shop';
   	  $shopset = $this->mysql->select_one("select shopid,sendset from ".Mysite::$app->config['tablepre']."shopfast  where shopid=".$shopid."");
   	  if(empty($shopset)){
   	  	  $shoptype = 'market';
   	      $shopset = $this->mysql->select_one("select shopid,sendset from ".Mysite::$app->config['tablepre']."shopmarket  where shopid=".$shopid."");
   	   }
   	   if(empty($shopset)){
   	     echo '店铺配置数据为空';
   	     exit;
   	   }
   	  if($shoptype == 'shop'){
   	    $shoparea =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."areashop  where shopid=".$shopid."");
   	  }else{
   	  	$shoparea =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."areamarket  where shopid=".$shopid."");
   	  }
   	  if(empty($shoparea)){
   	    echo '店铺区域数据不存在';
   	    exit;
   	  }
   	  $where = '';
   	  $tempids = array();
   	  foreach($shoparea as $key=>$value){
   	      $tempids[] = $value['areaid'];
   	  }
   	  $where = join(',',$tempids);
   	  if(empty($where)){
   	     echo '店铺区域ID值获取失败';
   	     exit;
   	  }


   	  $id =IFilter::act(IReq::get('id'));
   	  $parent_id = 0;
	  	if($id > 0){
	 	     $checkinfo2 =  $this->mysql->select_one("select id,name,parent_id from ".Mysite::$app->config['tablepre']."area where parent_id=".$id."  and id in(".$where.") ");
	 	     if(empty($checkinfo2)){
	 	     	  //构造返回数据
	 	     	  $areainfo = '';
	 	     	  $areaid = $id;
	 	     	  for($i=0;$i<10;$i++){
	 	     	      $getarea = $this->mysql->select_one("select id,name,parent_id from ".Mysite::$app->config['tablepre']."area where id=".$id." limit 0,1");
	 	     	      if(empty($getarea)){
	 	     	        break;
	 	     	      }
	 	     	      $areainfo = $getarea['name'].$areainfo;
	 	     	      if($getarea['parent_id']==0){
	 	     	         break;
	 	     	      }
	 	     	      $id = $getarea['parent_id'];

	 	     	  }
	 	     	  echo "<script>parent.setarea('".$areainfo."','".$areaid."');</script>";

	 	              exit;
	       }
	       $check1 =  $this->mysql->select_one("select id,name,parent_id from ".Mysite::$app->config['tablepre']."area where  id=".$id);

	       $parent_id = $check1['parent_id'];
	    }

	    $data['parent_id'] = $parent_id;
	    $data['id'] = empty($id)?'0':$id;
	    $data['where'] = $where;
	    $data['shopid'] = $shopid;
      Mysite::$app->setdata($data);
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
   //快劫下单提交
   function makeorder(){
   	 $info['shopid'] = intval(IReq::get('shopid'));//店铺ID
		 $info['remark'] = IFilter::act(IReq::get('remark'));//备注
		 $info['paytype'] = 'outpay';//默认调用货到支付
		  $info['dikou'] = 0;//不计算抵扣
	 	 $info['username'] = IFilter::act(IReq::get('contactname')); //
		 $info['mobile'] = IFilter::act(IReq::get('phone'));
		 $info['addressdet'] = IFilter::act(IReq::get('address'));//
		 $info['senddate'] =  IFilter::act(IReq::get('senddate'));//
		 $info['minit'] = IFilter::act(IReq::get('minit')); //
		 $info['juanid']  = 0;//优惠劵ID 不计算优惠券
		 $info['ordertype'] = 2;//订单类型
		 //http://localhost/index.php?controller=order&action=makeorder&ids=349,351,352,230&nums=1,1,1,1&shopid=9&contactname=fdsa&phone=13540907240&address=%E6%A0%AA%E6%B4%B2%E6%96%B0%E7%8E%9B%E7%89%B9%E8%B4%AD%E7%89%A9%E5%B9%BF%E5%9C%BAfdsafdsa&areaid=9&senddate=2014-8-7%2018:15

		 $ids = IFilter::act(IReq::get('ids'));
		 if(empty($ids)) $this->message('商品ID错误');
	   $num = IFilter::act(IReq::get('nums'));
	   if(empty($num)) $this->message('商品数量错误');
	   $tempids = explode(',',$ids);
	   $tempnum = explode(',',$num);
	   if(count($tempids) != count($tempnum)) $this->message('商品数量和商品ID不一致');
	   $newid = array();
	   $idtonum = array();
	   foreach($tempids as $key=>$value){
	   	  if(!empty($value)){
	   	       $check1 = intval($value);
	   	       $check2 = intval($tempnum[$key]);
	   	       if($check1 > 0 && $check2 > 0){
	   	           $newid[] = $value;
	   	           $idtonum[$value] = $check2;
	   	       }
	   	  }
	   }
	   $whereid = join(',',$newid);
	   if(empty($whereid))  $this->message('数据错误');
	   $goodslist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goods where shopid =".$info['shopid']." and id in(".$whereid.") ");


       //判断库存
     $senddate = $info['senddate'];
     $nowpost = strtotime($senddate);
     $day = strtotime(date('Y-m-d',$nowpost));
     $stock_info_list = $this->mysql->getarr("SELECT goods_id,stock FROM ".Mysite::$app->config['tablepre']."daystock WHERE goods_id in ($whereid) AND day=$day");
     $stock_list = [];
     foreach ($stock_info_list as $key => $value) {
        $stock_list[$value['goods_id']] = $value['stock'];
     }
     foreach($goodslist as $key=>$value){
         if ($value['daycount'] - $stock_list[$value['id']] - $idtonum[$value['id']] < 0) {
            $this->message($valeu['name'].'库存不足');
            exit;
         }
     }


	   	$goodsdata= array();
	   	$bagsum = 0;
	   	$goodssum = 0;
	   	$goodsnum = 0;

	   	foreach($goodslist as $key=>$value){
	   	   $value['shuliang'] = $idtonum[$value['id']];

	   	   $goodssum += $value['cost']*intval($idtonum[$value['id']]);
	   	   $value['xiaoij'] = $value['cost']*intval($idtonum[$value['id']]);
	   	   $bagsum += $value['bagcost']*intval($idtonum[$value['id']]);
	   	   $goodsnum += $value['shuliang'];
	   	   $goodsdata[] = $value;
	   	}


		  $shop = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where id = ".$info['shopid']."   ");

		 if(empty($info['shopid'])) $this->message('店铺ID错误');

		 if($shop['shoptype'] == 1){
		 	    $shopinfo=   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$info['shopid']."'    ");
	   }else{
	  		 $shopinfo=   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$info['shopid']."'    ");
	 	 }


	   $nowID= intval(IFilter::act(IReq::get('areaid')));//$areaid intval(ICookie::get('myaddress'));
	  if(empty($nowID)) $this->message('未选择配送区域');
		 if(empty($shopinfo))   $this->message('店铺获取失败');
		 $checkps = 	 $this->pscost($shopinfo,$goodsnum,$nowID);
		 if($checkps['canps'] != 1) $this->message('该店铺不在配送范围内');
		 $info['cattype'] = 0;//
		  if(empty($info['username'])) 		  $this->message('联系人不能为空');
		 if(empty($info['addressdet'])) $this->message('详细地址为空');
	   $info['userid'] = 0;
	    $info['ipaddress'] = '管理员快捷下单';
	  //area1 二级地址名称	area2 三级地址名称	area3

	  $checkareaid = $nowID;
	  $dataareaids = array();
	  while($checkareaid > 0){

	  	 $temp_check =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id ='".$checkareaid."'   order by id desc limit 0,50");
	  	 if(empty($temp_check)){
	  	   break;
	  	 }
	  	 if(in_array($checkareaid,$dataareaids)){
	  	   break;
	  	 }
	  	 $dataareaids[] = $checkareaid;
	  	 $checkareaid = $temp_check['parent_id'];

	  }
	  $data['areaids'] = join(',',$dataareaids);

		 $data['shopcost'] = 0;//:店铺商品总价
		 $data['shopps'] = 0;//店铺配送费
		 $data['shoptype'] = 0;//: 0:普通订单，1订台订单
		 $data['bagcost']=0;//:打包费
		 //获取店铺商品总价  获取超市商品总价
		 $data['shopcost'] = $goodssum;
		 $data['shopps'] = $checkps['pscost'];
		 $data['bagcost'] =  $bagsum;
		 //支付方式检测
		 $userid = $info['userid'];
		 $data['paytype'] = $info['paytype'];

		//判断促销
		$data['cxids'] = '';
		$data['cxcost'] = 0;
		$zpin = array();
		$cattype = $info['cattype'];
		if($data['shopcost'] > 0){
		    $sellrule =new sellrule();
		    $sellrule->setdata($info['shopid'],$data['shopcost'],$shop['shoptype'], $day);
		    $ruleinfo = $sellrule->getdata();
	      $data['cxcost'] = $ruleinfo['downcost'];
	      $data['cxids'] = $ruleinfo['cxids'];
	      $data['shopps'] = $ruleinfo['nops'] == true?0:$data['shopps'];
	      $zpin = $ruleinfo['zid'];//赠品
	  }
	  //判断优惠劵
	  $allcost = $data['shopcost'];
	  $data['yhjcost'] = 0;
		$data['yhjids'] = '';

	  //积分抵扣
	  $allcost = $allcost - $data['cxcost'] - $data['yhjcost'];
	  $data['scoredown'] = 0;

	  $dikou = $data['scoredown'] > 0?$dikou:0;
	  $allcost = $allcost-$dikou;
	  $data['allcost'] = $allcost+$data['shopps']+$data['bagcost']; //订单应收费用

	  $data['shopuid'] = 0;// 店铺UID
		$data['shopid'] = 0; //店铺ID
		$data['shopname'] = '商城'; //店铺名称
		$data['shopphone'] =  Mysite::$app->config['marketphone']; //店铺电话
		$data['shopaddress'] = '';// 店铺地址
		$data['pstype'] = $checkps['pstype'] ;
		$data['shoptype'] = $shopinfo['shoptype'];
		//检测店铺

	  	    $settime = time() - (10*60);
	  	    if($settime > $nowpost)  $this->message('提交配送时间和服务器时间相差超过10分钟下单失败');

	  	    $is_orderbefore = $shopinfo['is_orderbefore'] == 0?0:$shopinfo['befortime'];
	  	    $tempinfo = $this->checkshopopentime($is_orderbefore,$nowpost,$shop['starttime']);
	  	    if(!$tempinfo) $this->message('配送时间不在有效配送时间范围');
	  	    if($shop['is_open'] != 1) $this->message('店铺暂停营业');
	  	    if($allcost < $shopinfo['limitcost']) $this->message('商品总价低于最小起送价'.$shopinfo['limitcost']);
	  	    $data['shopuid'] = $shop['uid'];// 店铺UID
		      $data['shopid'] = $shop['id']; //店铺ID
		      $data['shopname'] = $shop['shopname']; //店铺名称
		      $data['shopphone'] =  $shop['phone']; //店铺电话
		      $data['shopaddress'] = $shop['address'];// 店铺地址
	  $data['buyeraddress'] = $info['addressdet'];
	  $data['ordertype'] = $info['ordertype'];//来源方式;
	  $data['buyeruid'] = $userid;// 购买用户ID，0未注册用户
		$data['buyername'] =  $info['username'];//购买热名称
		$data['buyerphone'] = $info['mobile'];// 联系电话
		$panduan = Mysite::$app->config['man_ispass'];
	  $data['status'] = $panduan == 1?'0':1;
	  $data['paystatus'] = 0;// 支付状态1已支付
		$data['content'] = $info['remark'];// 订单备注
	  $data['is_make'] = Mysite::$app->config['allowed_is_make'] == 1?0:1;
		//  daycode 当天订单序号
	  $data['ipaddress'] = $info['ipaddress'];
		$data['is_ping'] = 0;// 是否评价字段 1已评完 0未评
		$data['addtime'] = time();
	  $data['posttime'] = $nowpost;//: 配送时间
	  $data['othertext'] = '';//其他说明
	  //  :审核时间
	  $data['passtime'] = time();
	  if($data['status']  == 1){
	  	$data['passtime'] == 0;
	  }
	  $data['buycode'] = substr(md5(time()),9,6);
	  $data['dno'] = time().rand(1000,9999);
	  $minitime = strtotime(date('Y-m-d',time()));
    $tj = $this->mysql->select_one("select count(id) as shuliang from ".Mysite::$app->config['tablepre']."order where shopid='".$info['shopid']."' and addtime > ".$minitime."  limit 0,1000");
	  $data['daycode'] = $tj['shuliang']+1;
	  $this->mysql->insert(Mysite::$app->config['tablepre'].'order',$data);  //写主订单
	  $orderid = $this->mysql->insertid();
	  $this->orderid = $orderid;
	  foreach($goodsdata as $key=>$value){
	    $cmd['order_id'] = $orderid;
	    $cmd['goodsid'] = $value['id'];
	    $cmd['goodsname'] = $value['name'];
	    $cmd['goodscost'] = $value['cost'];
	  	$cmd['goodscount'] = $value['shuliang'];
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

	  $checkbuyer = Mysite::$app->config['allowedsendbuyer'];
	  $checksend = Mysite::$app->config['man_ispass'];
	 	if($checksend != 1)
	 	{

	 		  $orderCLs = new orderclass($this->mysql);
        $orderCLs->sendmess($orderid);
	  }
	 if($userid ==  0){
	  	   ICookie::set('orderid',$orderid,86400);
	  }
	  //http://localhost///orderid/865
	  	$link = IUrl::creatUrl('site/waitpay/orderid/'.$orderid);
	  $this->message('',$link);

   }
   function wavecontrol(){
     $type =  IReq::get('type');
     if($type == 'closewave'){
        //关闭声音
         ICookie::set('playwave',2,2592000);
     }else{
        //开启声音
         ICookie::set('playwave',0,2592000);
     }
     $this->success('成功');
   }

	 function getgodigui($arraylist,$nowid,$nowkey){
	 	   if(count($arraylist) > 0){
	 	      foreach($arraylist as $key=>$value){
	 	         if($value['parent_id'] == $nowid){
	 	             $value['space'] = $nowkey;
	 	             $donextkey = $nowkey+1;
	 	             $donextid = $value['id'];
	 	             $this->digui[] = $value;
	 	              $this->getgodigui($arraylist,$donextid,$donextkey);
	 	         }
	 	      }

	 	   }
	 }
   function setstatus(){
		   $data['buyerstatus'] = array(
		   '0'=>'待处理订单',
		   '1'=>'待发货',
		   '2'=>'订单已发货',
		   '3'=>'订单完成',
		   '4'=>'买家取消订单',
		   '5'=>'卖家取消订单',
           '18'=>'系统取消订单'
		   );
		   $paytypelist = array('outpay'=>'货到支付','open_acout'=>'账号余额支付');
		   $paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
		   if(is_array($paylist)){
		     foreach($paylist as $key=>$value){
		   	    $paytypelist[$value['loginname']] = $value['logindesc'];
		     }
	     }
	     $data['shoptype'] = array(
	     '0'=>'外卖',
	     '1'=>'超市',
	     '2'=>'其他',
	     );
	     $data['ordertypearr'] = array(
		   '0'=>'网站',
		   '1'=>'网站',
		   '2'=>'电话',
		   '3'=>'微信',
		   '4'=>'APP',
		   '5'=>'手机网站',
		   '6'=>'卖家取消订单'
		   );
		   $data['backarray'] = array(
		   '0'=>'',
		   '1'=>'退款中..',
		   '2'=>'退款成功',
		   '3'=>''
		   );
	    $data['paytypearr'] = $paytypelist;
	  	Mysite::$app->setdata($data);
	}


	/************商家订单处理部分***************/
	function shoporderlist(){
		$this->checkshoplogin();
	  $shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$starttime = trim(IFilter::act(IReq::get('starttime')));
		$orderSource = intval(IReq::get('orderSource'));
		$nowday = date('Y-m-d',time());
		$starttime = empty($starttime)? $nowday:$starttime;
		$endtime = empty($endtime)? $nowday:$endtime;
		$where = '';
	  $where = '  and posttime > '.strtotime($starttime.' 00:00:00').' and posttime < '.strtotime($starttime.' 23:59:59');

		$data['orderSource'] = $orderSource;
		$data['starttime'] = $starttime;
		$this->setstatus();
	  //获取订单的方式是所有 有效订单  status > 0 and < 4 and (paytype == 'outpay' or paytype='open_acout or (paystatus=1)  //
	  $orderSourcetoarray = array(
	  '0'=>' and status > 0 and status < 4 and ( paytype = \'outpay\' or  paytype=\'open_acout\' or  paystatus=1) ',
	  '1'=>' and ordertype !=2 and status > 0 and status < 4 and ( paytype = \'outpay\' or  paytype=\'open_acout\' or  paystatus=1)',
	  '2'=>' and ordertype =2 and status > 0 and status < 4 and ( paytype = \'outpay\' or  paytype=\'open_acout\' or  paystatus=1)',
	  '3'=>' and is_make = 0 and status > 0 and status < 3 and ( paytype = \'outpay\' or  paytype=\'open_acout\' or  paystatus=1)',
	  '4'=>' and status = 1 and is_make = 1 and ( paytype = \'outpay\' or  paytype=\'open_acout\' or  paystatus=1)',
	  '5'=>' and status > 1 and status < 4  and ( paytype = \'outpay\' or  paytype=\'open_acout\' or  paystatus=1)'
	  );

      if (Mysite::$app->config['nopay_isshow'] == 1) {
            $orderSourcetoarray = array(
              '0'=>' and status > 0 and status < 4 ',
              '1'=>' and ordertype !=2 and status > 0 and status < 4 ',
              '2'=>' and ordertype =2 and status > 0 and status < 4 ',
              '3'=>' and is_make = 0 and status > 0 and status < 3 ',
              '4'=>' and status = 1 and is_make = 1 ',
              '5'=>' and status > 1 and status < 4'
              );
      }

	 if(isset($orderSourcetoarray[$orderSource])){

	   	$where .= ''.$orderSourcetoarray[$orderSource];
	 }




		$orderlist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."order where shopid='".$shopid."'  ".$where." order by id desc limit 0,1000");
		$shuliang  = $this->mysql->select_one("select count(id) as shuliang,sum(allcost) as allcost from ".Mysite::$app->config['tablepre']."order where shopid='".$shopid."' ".$where." limit 0,1000");
	  $data['tongji'] = $shuliang;
	   $data['list'] = array();
	  if($orderlist)
	   {
		  foreach($orderlist as $key=>$value)
		  {
			  $value['detlist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."orderdet where   order_id = ".$value['id']." order by id desc ");
			  $value['maijiagoumaishu'] = 0;
			    if($value['buyeruid'] > 0)
			    {
			    	$value['maijiagoumaishu'] =$this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$value['buyeruid']."' and  status = 3 order by id desc");
			    }
			  $data['list'][] = $value;
		  }
	  }
	  $daymintime = strtotime(date('Y-m-d',time()));
	  $tempshu =  $this->mysql->select_one("select count(id) as shuliang  from ".Mysite::$app->config['tablepre']."order where shopid='".$shopid."' and  status > 0  and  status <  4 and posttime > ".$daymintime." limit 0,1000");
	 //统计当天订单
	  $data['hidecount'] = $tempshu['shuliang'];
	  $data['playwave'] = ICookie::get('playwave'); //shoporderlist
	  Mysite::$app->setdata($data);
	}
	function shopcontrol(){
		$this->checkshoplogin();
		$controlname =trim(IFilter::act(IReq::get('controlname')));
		$orderid = intval(IReq::get('orderid'));
		$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$shopinfo = $this->mysql->select_one("select uid from ".Mysite::$app->config['tablepre']."shop where id = ".$shopid."");
		switch($controlname)
		{
			case 'unorder':
			  if($orderinfo['is_reback'] > 0 && $orderinfo['is_reback'] < 3) $this->message('订单退款中不可操作');
	     $reason = trim(IFilter::act(IReq::get('reason')));
	     if(empty($reason)) $this->message('关闭理由不能为空');
	   	 $ordercontrol = new ordercontrol($orderid);
	   	 if($ordercontrol->sellerunorder($shopinfo['uid'],$reason))
	   	 {
	   	 	$ordCls = new orderclass($this->mysql);
	               $ordCls->noticeclose($orderid,$reason);
				 $this->success('操作成功');
	     }else{
				  $this->message($ordercontrol->Error());
		   }
			break;
			case 'makeorder':
			//制作该订单

			   $checkorderinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id = ".$orderid." and shopid=".$shopid." ");
			   if(empty($checkorderinfo)){
			        $this->message('订单不存在');
			   }
			   if($checkorderinfo['status'] != 1){
			        $this->message('不可操作');
			   }
			   if(!empty($checkorderinfo['is_make'])){
			       $this->message('不可操作');
			   }
			    if($checkorderinfo['is_reback'] > 0 &&  $checkorderinfo['is_reback'] < 3) $this->message('订单退款中不可操作');
			   $udata['is_make'] = 1;
         $this->mysql->update(Mysite::$app->config['tablepre'].'order',$udata,"id='".$orderid."'");
         	$ordCls = new orderclass($this->mysql);
	               $ordCls->noticemake($orderid);
			   $this->success('操作成功');
			break;
			case 'unmakeorder':
			//不制作该订单

		    	$checkorderinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id = ".$orderid." and shopid=".$shopid." ");
			   if(empty($checkorderinfo)){
			        $this->message('订单不存在');
			   }
			    if($checkorderinfo['is_reback'] > 0 &&  $checkorderinfo['is_reback'] < 3) $this->message('订单退款中不可操作');
			   if($checkorderinfo['status'] != 1){
			        $this->message('不可操作');
			   }
			   if(!empty($checkorderinfo['is_make'])){
			       $this->message('不可操作');
			   }
			   $udata['is_make'] = 2;
         $this->mysql->update(Mysite::$app->config['tablepre'].'order',$udata,"id='".$orderid."'");
         $ordCls = new orderclass($this->mysql);
	               $ordCls->noticeunmake($orderid);
         $this->success('操作成功');


			break;
			case 'sendorder':
		  $ordercontrol = new ordercontrol($orderid);
		  if($ordercontrol->sendorder($shopinfo['uid']))
		  {
		  	$ordCls = new orderclass($this->mysql);
	               $ordCls->noticesend($orderid);
				$this->success('操作成功');
		  }else{
				 $this->message($ordercontrol->Error());
		  }
			break;
			case 'shenhe':
		  $ordercontrol = new ordercontrol($orderid);
		  if($ordercontrol->shenhe($shopinfo['uid']))
		  {
					$this->success('操作成功');
		  }else{
				 $this->message($ordercontrol->Error());
		  }
			break;
			case 'delorder':
			$ordercontrol = new ordercontrol($orderid);
		  if($ordercontrol->sellerdelorder($shopinfo['uid']))
		  {
				$this->success('操作成功');
		  }else{
			   $this->message($ordercontrol->Error());
		  }
			break;
			case 'wancheng':
			 $checkorderinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id = ".$orderid." and shopid=".$shopid." ");


			 if($checkorderinfo['is_reback'] > 0 && $checkorderinfo['is_reback'] < 3) $this->message('订单退款中不可操作');
	   	       if($checkorderinfo['status'] != 2)  $this->message('订单状态不可完成');
	   	      $orderdata['status'] = 3;
	   	      //写用户数据
	   	       $this->mysql->update(Mysite::$app->config['tablepre'].'order',$orderdata,"id='".$orderid."'");
	   	       //更新用户成长值
	   	       if(!empty($orderinfo['buyeruid']))
	   	       {
	   	      	   $memberinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$checkorderinfo['buyeruid']."'   ");
		             if(!empty($memberinfo)){
		             	 $this->mysql->update(Mysite::$app->config['tablepre'].'member','`total`=`total`+'.$checkorderinfo['allcost'],"uid ='".$checkorderinfo['buyeruid']."' ");
		              }
		              /*
		               // 写优惠券
		              */
		              if($memberinfo['parent_id'] > 0){

		                 $upuser = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$memberinfo['parent_id']."'   ");
		                 if(!empty($upuser)){
		                 	 if(Mysite::$app->config['tui_juan'] ==1){
		                  $nowtime = time();
	 	   $endtime = $nowtime+Mysite::$app->config['tui_juanday']*24*60*60;
	 	   $juandata['card'] = $nowtime.rand(100,999);
       $juandata['card_password'] =  substr(md5($juandata['card']),0,5);
       $juandata['status'] = 1;// 状态，0未使用，1已绑定，2已使用，3无效
       $juandata['creattime'] = $nowtime;// 制造时间
       $juandata['cost'] = Mysite::$app->config['tui_juancost'];// 优惠金额
       $juandata['limitcost'] =  Mysite::$app->config['tui_juanlimit'];// 购物车限制金额下限
       $juandata['endtime'] = $endtime;// 失效时间
       $juandata['uid'] = $upuser['uid'];// 用户ID
       $juandata['username'] = $upuser['username'];// 用户名
       $juandata['name'] = '推荐送优惠券';//  优惠券名称
	 	   $this->mysql->insert(Mysite::$app->config['tablepre'].'juan',$juandata);
	 	    $this->mysql->update(Mysite::$app->config['tablepre'].'member','`parent_id`=0',"uid ='".$checkorderinfo['buyeruid']."' ");
	 	    $logdata['uid'] = $upuser['uid'];
	 	    $logdata['childusername'] = $memberinfo['username'];
	 	    $logdata['titile'] = '推荐送优惠券';
	 	    $logdata['addtime'] = time();
	 	    $logdata['content'] = '被推荐下单完成';
	 	    $this->mysql->insert(Mysite::$app->config['tablepre'].'sharealog',$logdata);
	 	                     }
	 	                 }




		              }
	   	       }
			 $this->success('操作成功');
			break;
			default:
			$this->message('未定义的操作');
			break;
		}



	}
	function shoptotal(){
		$this->checkshoplogin();
		$this->setstatus();
		$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
	  //	$date("Y-m-d",strtotime("+10 year"))

	  $year = IFilter::act(IReq::get('year'));
	  $year = empty($year)? date('Y',time()):$year;
	  $month = IFilter::act(IReq::get('month'));



    $timelist = array();
	 // $firstday = date('Y-m-01', strtotime($date));
	  if(!empty($year)){
	  	  if(empty($month)){
	  	  	  $checknowtime = time();
	  	  	  for($i=1;$i<13;$i++){
	  	  	    $starttime = strtotime($year.'-'.$i.'-01');
	  	  	    $endtime = strtotime("$year-$i-01 +1 month -1 day")+86400;
	  	  	    if($starttime < $checknowtime){
	  	  	       $tempdata['name'] = $year.'-'.$i;
	  		         $tempdata['starttime'] = $starttime;
	  		         $tempdata['endtime'] = $endtime;
	  		         $timelist[] = $tempdata;
	  	  	    }
	  	  	  }
	  	  }else{
	  	     $stime = strtotime($year.'-'.$month.'-01');
	  	     $etime = 	strtotime("$year-$month-01 +1 month -1 day")+86400;
	  	      $checknowtime = time();

	  	        while($stime < $etime&&$stime< $checknowtime)
	  	       {
	  	       	  $tempdata['name'] = date('Y-m-d',$stime);
	  		        $tempdata['starttime'] = $stime;
	  	     	    $stime = $stime+86400;
	  	     	    $tempdata['endtime'] = $stime;
	  		        $timelist[] = $tempdata;


	  	       }
	  	  }
	  }else{
	  	/*转换为时间格式*/
	  	//当年到默念
	  	$nowyear = date('Y',time());
	  	$nowyear = $nowyear+1;
	  	for($i=10;$i>0;$i--){
	  		  $tempdata['name'] = $nowyear-$i;
	  		  $tempdata['starttime'] = strtotime($nowyear-$i.'-01-01');
	  		  $tempdata['endtime'] = strtotime($nowyear-$i.'-12-31')+86400;
	  		  $timelist[] = $tempdata;

	  	}

	  }

	  $data['year'] = $year;
	  $data['month'] = empty($month)?'0':$month;
	  $data['startyear'] = date('Y',time());




		$list = array();
		$data['allsum'] = 0;
		$data['allnum'] = 0;
		if(is_array($timelist))
		{
			foreach($timelist as $key=>$value){
				   $where2 = 'and posttime > '.$value['starttime'].' and posttime < '.$value['endtime'];
	         $shoptj=  $this->mysql->select_one("select  count(id) as shuliang,sum(cxcost) as cxcost,sum(yhjcost) as yhcost, sum(shopcost) as shopcost,sum(scoredown) as score, sum(shopps)as pscost, sum(bagcost) as bagcost from ".Mysite::$app->config['tablepre']."order  where shopid = '".$shopid."' and paytype ='outpay' and shopcost > 0 and status = 3 ".$where2." order by id asc  limit 0,1000");
	         $line= $this->mysql->select_one("select count(id) as shuliang,sum(cxcost) as cxcost,sum(yhjcost) as yhcost,sum(shopcost) as shopcost, sum(scoredown) as score, sum(shopps)as pscost, sum(bagcost) as bagcost from ".Mysite::$app->config['tablepre']."order  where shopid = '".$shopid."' and paytype !='outpay'  and paystatus =1 and shopcost > 0 and status = 3 ".$where2."   order by id asc  limit 0,1000");
	         //月 份	订单数量	在线付款	线下支付	使用优惠券	店铺优惠	使用积分	打包费	配送费	商品总价
	         $value['orderNum'] =  $shoptj['shuliang']+$line['shuliang'];//订单总个数
	         $scordedown = !empty(Mysite::$app->config['scoretocost']) ? $line['score']/Mysite::$app->config['scoretocost']:0;
	         $value['onlinescore'] = $scordedown;
	         $value['online'] = $line['shopcost']+$line['pscost']+$line['bagcost'] -$line['cxcost'] - $line['yhcost']-$scordedown;//在线支付总金额
	         $scordedown = !empty(Mysite::$app->config['scoretocost']) ? $shoptj['score']/Mysite::$app->config['scoretocost']:0;
	         $value['unlinescore'] = $scordedown;
	         $value['unline'] = $shoptj['shopcost']+$shoptj['pscost']+$shoptj['bagcost'] -$shoptj['cxcost'] - $shoptj['yhcost']-$scordedown;
	         $value['yhjcost'] = $line['yhcost'] +$shoptj['yhcost'];//使用优惠券
	         $value['cxcost'] = $line['cxcost'] +$shoptj['cxcost'];// 店铺优惠
	         $value['score'] = $value['unlinescore'] +$value['onlinescore']; //  使用积分
	         $value['bagcost'] = $line['bagcost'] +$shoptj['bagcost'];//   打包费
	         $value['pscost'] = $line['pscost'] +$shoptj['pscost'];//   配送费
	         $value['allcost'] = $line['shopcost'] +$shoptj['shopcost'] - $value['cxcost'];
	         $data['allsum'] += $value['allcost'];
	         $data['allnum'] += $value['orderNum'];
	         $value['goodscost'] = $line['shopcost'] +$shoptj['shopcost'];
	          $yjinb = empty($value['yjin'])?Mysite::$app->config['yjin']:$value['yjin'];
		       $value['yb'] = $yjinb * 0.01;
		       $value['yje'] = $value['yb']*$value['allcost'];

		       $list[] = $value;

		  }

		}
		$data['list'] =$list;
    Mysite::$app->setdata($data);
	}

 function ajaxcheckshoporder(){
 	  $this->checkshoplogin();
 	  $shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		 $daymintime = strtotime(date('Y-m-d',time()));
	   $tempshu =  $this->mysql->select_one("select count(id) as shuliang  from ".Mysite::$app->config['tablepre']."order where shopid='".$shopid."' and  status > 0  and  status <  4 and posttime > ".$daymintime." limit 0,1000");
	   $hidecount = $tempshu['shuliang'];
	   $this->success($hidecount);
	}
	/**********商家订单处理部分结束***************/


	/************用户订单部分**************/
	function usersorder(){
		$this->checkmemberlogin();
	  $data['actiondo'] = 'order';
		$orderdatediff = intval(IReq::get('orderdatediff'));
		$stime = IFilter::act(IReq::get('stime'));
		$etime = IFilter::act(IReq::get('etime'));
		$status = intval(IReq::get('status'));
		$where = '';
		if($orderdatediff == 1){
			$etime = time() - 2592000;
			$stime = time() - 2592000*3;
		}else{
			$stime = empty($stime)? time() - 2592000:strtotime($stime.' 00:01');
			$etime = empty($etime)? time(): strtotime($etime.' 23:59');
		}
		if($status == 1){
			$where .= ' and status > 0 and status < 4';
		}elseif($status == 2){
			$where .= ' and status = 3 and is_ping = 1';
		}

		$oldtime = time() - 2592000;
		$where .= ' and  addtime  > '.$stime.' and addtime < '.$etime;
		//$this->setdata(array('sitetitle'=>'一个月前订单'));
		$this->setstatus();
		$pageinfo = new page();
		$pageinfo->setpage(intval(IReq::get('page')),8);
		$data['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' and shoptype=0 ".$where." order by id desc limit ".$pageinfo->startnum().", ".$pageinfo->getsize()."");
		$shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' and shoptype=0   ".$where." ");
		$pageinfo->setnum($shuliang);
		$data['pagecontent'] = $pageinfo->getpagebar();
		$data['pageall'] = $pageinfo->totalpage();
		$data['pagenow']  = intval(IReq::get('page')) == 0?1:intval(IReq::get('page')) ;
		$data['allcount'] = $shuliang;
		$data['nowtime'] = time();
		$data['stime'] = $stime;
		$data['etime'] = $etime;
		$data['status'] = $status;
		$data['orderdatediff'] = $orderdatediff;
		$status = empty($status)?5:$status;
		$link = IUrl::creatUrl('member/order/status/'.$status.'/stime/'.date('Y-m-d',$stime).'/etime/'.date('Y-m-d',$etime).'/orderdatediff/'.$orderdatediff.'/page/@page@');

		$data['pagelink'] = $link;
	  Mysite::$app->setdata($data);
	}
	function userorderdet(){
		$this->checkmemberlogin();
  	$orderid = intval(IReq::get('orderid'));
		if(empty($orderid)) $this->message('订单获取失败');
		$orderinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id='".$orderid."'  ");
		if(empty($orderinfo)) $this->message('获取订单失败');
		$orderinfo['addtime'] = date('Y-m-d H:i:s',$orderinfo['addtime']);
		$orderinfo['posttime'] =  date('Y-m-d H:i:s',$orderinfo['posttime']);
		$orderinfo['suretime'] = $orderinfo['suretime'] < 1?'--': date('Y-m-d H:i:s',$orderinfo['suretime']);
		$orderinfo['pscost'] = $orderinfo['shopps'] ;
		$orderinfo['goodscost'] = $orderinfo['shopcost'];
		$orderinfo['excontent'] = $orderinfo['content'];
		$statusarray = array('0'=>'预定中','1'=>'已预定','2'=>'配送','3'=>'完成','4'=>'取消','5'=>'取消');
		$orderinfo['status'] = $statusarray[$orderinfo['status']];
		if(!empty($orderinfo['othertext'])){
			$tempinfo = unserialize($orderinfo['othertext']);
			$orderinfo['excontent'].=',其他要求：';
			foreach($tempinfo as $key=>$value){
				$orderinfo['excontent'] .= $key.':'.$value.',';
			}
		}
		$orderdetinfo = $this->mysql->getarr("select *,goodscount*goodscost as sum from ".Mysite::$app->config['tablepre']."orderdet    where  order_id='".$orderid."'  ");
		$backinfo['order'] = $orderinfo;
		$backinfo['orderdet'] = $orderdetinfo;
		$this->success($backinfo);
	}

	function usermorder(){
		$this->checkmemberlogin();
		$orderdatediff = intval(IReq::get('orderdatediff'));
		$stime = IFilter::act(IReq::get('stime'));
		$etime = IFilter::act(IReq::get('etime'));
		$status = intval(IReq::get('status'));
		$where = '';
		if($orderdatediff == 1){
			$etime = time() - 2592000;
			$stime = time() - 2592000*3;
		}else{
			$stime = empty($stime)? time() - 2592000:strtotime($stime.' 00:01');
			$etime = empty($etime)? time(): strtotime($etime.' 23:59');
		}
		if($status == 1){
			$where .= ' and status > 0 and status < 4';
		}elseif($status == 2){
			$where .= ' and status = 3 and is_ping = 1';
		}

		$oldtime = time() - 2592000;
		$where .= ' and  addtime  > '.$stime.' and addtime < '.$etime;
		//$this->setdata(array('sitetitle'=>'一个月前订单'));
		$pageinfo = new page();
		$this->setstatus();
		$pageinfo->setpage(intval(IReq::get('page')),8);
		$data['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' and shoptype=1 ".$where." order by id desc limit ".$pageinfo->startnum().", ".$pageinfo->getsize()."");
		$shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' and  shoptype=1   ".$where." ");
		$pageinfo->setnum($shuliang);
		$data['pagecontent'] = $pageinfo->getpagebar();
		$data['pageall'] = $pageinfo->totalpage();
		$data['pagenow']  = intval(IReq::get('page')) == 0?1:intval(IReq::get('page')) ;
		$data['allcount'] = $shuliang;
		$data['nowtime'] = time();
		$data['stime'] = $stime;
		$data['etime'] = $etime;
		$data['status'] = $status;
		$data['orderdatediff'] = $orderdatediff;
			$status = empty($status)?5:$status;
		$link = IUrl::creatUrl('order/usermorder/status/'.$status.'/stime/'.date('Y-m-d',$stime).'/etime/'.date('Y-m-d',$etime).'/orderdatediff/'.$orderdatediff.'/page/@page@');
	  $data['actiondo'] = 'ordermarket';
		$data['pagelink'] = $link;
		 Mysite::$app->setdata($data);

	}
	function userunorder(){
		$this->checkmemberlogin();
		$orderid = intval(IReq::get('orderid'));
		$ordercontrol = new ordercontrol($orderid);
		if(empty($this->member['uid'])) $this->message('未登陆');
		if($ordercontrol->buyerunorder($this->member['uid']))
		{
				$this->success('操作成功');
		}else{
				$this->message($ordercontrol->Error());
		}
	}
	function userdelorder(){
		$this->checkmemberlogin();
		$orderid = intval(IReq::get('orderid'));
		$ordercontrol = new ordercontrol($orderid);
		if(empty($this->member['uid'])) $this->message('未登陆');
		if($ordercontrol->buyerdelorder($this->member['uid']))
		{
				$this->success('操作成功');
		}else{
				$this->message($ordercontrol->Error());
		}
	}
	function waitpiont()
	{
		$this->checkmemberlogin();
		$this->setstatus();
		$pageinfo = new page();
		$pageinfo->setpage(intval(IReq::get('page')));
			$showtime = time()-7*24*60*60;
		$where = ' and   (status = 3 or status =2) and is_ping = 0 and posttime >'.$showtime;
		$data['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."'  ".$where." order by id desc limit ".$pageinfo->startnum().", ".$pageinfo->getsize()."");
		$shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' ".$where." ");
		$pageinfo->setnum($shuliang);
		$data['pagecontent'] = $pageinfo->getpagebar();
		$data['pageall'] = $pageinfo->totalpage();
		$data['pagenow']  = intval(IReq::get('page')) == 0?1:intval(IReq::get('page')) ;
		$data['allcount'] = $shuliang;
		 Mysite::$app->setdata($data);
	}
	//我已点评订单
	function overpiont(){
		//id	orderid	orderdetid	shopid	goodsid	uid	content	addtime	replycontent	replytime	point 评分	is_show
		$this->checkmemberlogin();
		$this->setstatus();
		$pageinfo = new page();
		$pageinfo->setpage(intval(IReq::get('page')));
			$showtime = time()-7*24*60*60;
		if(empty($this->member['uid'])) $this->message('未登陆');
		$where = ' and   status = 3 and is_ping = 1 and posttime >'.$showtime;
		$data['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."'  ".$where." order by id desc limit ".$pageinfo->startnum().", ".$pageinfo->getsize()."");
		$shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' ".$where." ");
		$pageinfo->setnum($shuliang);
		$data['pagecontent'] = $pageinfo->getpagebar();
		$data['pageall'] = $pageinfo->totalpage();
		$data['pagenow']  = intval(IReq::get('page')) == 0?1:intval(IReq::get('page')) ;
		$data['allcount'] = $shuliang;
		 Mysite::$app->setdata($data);
	}


	 function ordercomdet(){
	 	$this->checkmemberlogin();
		$orderid = intval(IReq::get('orderid'));
		if(empty($orderid)) $this->message('订单获取失败');
		$orderinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id='".$orderid."' and buyeruid = '".$this->member['uid']."' ");
		if(empty($orderinfo)) $this->message('获取订单失败');
		if(!in_array($orderinfo['status'],array(2,3))) $this->message('订单不可查看评价');
		$orderinfo['addtime'] = date('Y-m-d H:i:s',$orderinfo['addtime']);
		$orderinfo['posttime'] =  date('Y-m-d H:i:s',$orderinfo['posttime']);
		$orderinfo['suretime'] = $orderinfo['suretime'] < 1?'--': date('Y-m-d H:i:s',$orderinfo['suretime']);
		$orderinfo['pscost'] = $orderinfo['shopps'];
		$orderinfo['goodscost'] = $orderinfo['shopcost'];
		$orderinfo['excontent'] = $orderinfo['content'];
		$statusarray = array('0'=>'预定中','1'=>'已预定','2'=>'配送','3'=>'完成','4'=>'取消','5'=>'取消');
		$orderinfo['status'] = $statusarray[$orderinfo['status']];
		if(!empty($orderinfo['othertext'])){
			$tempinfo = unserialize($orderinfo['othertext']);
			$orderinfo['excontent'].=',其他要求：';
			foreach($tempinfo as $key=>$value){
				$orderinfo['excontent'] .= $key.':'.$value.',';
			}
		}
		$orderdetinfo = $this->mysql->getarr("select *,goodscount*goodscost as sum from ".Mysite::$app->config['tablepre']."orderdet    where  order_id='".$orderid."'  ");
		$temparray = array();
		foreach($orderdetinfo as $key=>$value){
			   $value['comment'] =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."comment where orderid='".$orderid."' and orderdetid = '".$value['id']."' ");
			   $temparray[] = $value;
		}
		$backinfo['order'] = $orderinfo;
		$backinfo['orderdet'] = $temparray;
		$this->success($backinfo);// $this->json(array('error'=>false,'message'=>$));
	}
	function saveping(){
		$this->checkmemberlogin();
		$orderdetid = intval(IReq::get('orderdetid'));
	  $point = intval(IReq::get('point'));
	  $pointcontent = trim(IFilter::act(IReq::get('pointcontent')));
	  $data['point'] = in_array($point,array(1,2,3,4,5))?$point:5;
	  $orderdet = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."orderdet where id='".$orderdetid."'  ");
	  if(empty($orderdet)) $this->message('订单不存在aaa');
	  if($orderdet['status'] == 1) $this->message('该记录已评价');
	  $orderinfo  = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id='".$orderdet['order_id']."' and buyeruid = '".$this->member['uid']."'  and (status = 2 or status = 3) ");//
	  if(empty($orderinfo))$this->message('订单不存在评价状态');
	  if($orderinfo['is_ping'] == 1) $this->message('订单已评价完毕');
	  if($orderinfo['status'] == 2){//更新订单标志
	  	$udata['status'] = 3;
	  	$this->mysql->update(Mysite::$app->config['tablepre'].'order',$udata,"id='".$orderinfo['id']."'");
	  	//更新帐号成长值
	  	if(!empty($orderinfo['buyeruid']))
	    {
	   	      	   $memberinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$orderinfo['buyeruid']."'   ");
		             if(!empty($memberinfo)){
		             	 $this->mysql->update(Mysite::$app->config['tablepre'].'member','`total`=`total`+'.$orderinfo['allcost'],"uid ='".$orderinfo['buyeruid']."' ");
		              }
		              if($memberinfo['parent_id'] > 0){

		                 $upuser = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$memberinfo['parent_id']."'   ");
		                 if(!empty($upuser)){
		                 	 if(Mysite::$app->config['tui_juan'] ==1){
		                  $nowtime = time();
	 	   $endtime = $nowtime+Mysite::$app->config['tui_juanday']*24*60*60;
	 	   $juandata['card'] = $nowtime.rand(100,999);
       $juandata['card_password'] =  substr(md5($juandata['card']),0,5);
       $juandata['status'] = 1;// 状态，0未使用，1已绑定，2已使用，3无效
       $juandata['creattime'] = $nowtime;// 制造时间
       $juandata['cost'] = Mysite::$app->config['tui_juancost'];// 优惠金额
       $juandata['limitcost'] =  Mysite::$app->config['tui_juanlimit'];// 购物车限制金额下限
       $juandata['endtime'] = $endtime;// 失效时间
       $juandata['uid'] = $upuser['uid'];// 用户ID
       $juandata['username'] = $upuser['username'];// 用户名
       $juandata['name'] = '推荐送优惠券';//  优惠券名称
	 	   $this->mysql->insert(Mysite::$app->config['tablepre'].'juan',$juandata);
	 	    $this->mysql->update(Mysite::$app->config['tablepre'].'member','`parent_id`=0',"uid ='".$orderinfo['buyeruid']."' ");

	 	    $logdata['uid'] = $upuser['uid'];
	 	    $logdata['childusername'] = $memberinfo['username'];
	 	    $logdata['titile'] = '推荐送优惠券';
	 	    $logdata['addtime'] = time();
	 	    $logdata['content'] = '被推荐下单完成';

	 	     $this->mysql->insert(Mysite::$app->config['tablepre'].'sharealog',$logdata);



	 	                     }
	 	                 }




		              }
	     }
	  }

	  $data['orderid'] = $orderinfo['id'];
	  $data['orderdetid'] = $orderdetid;
	  $data['shopid'] = $orderinfo['shopid'];
	  $data['goodsid'] = $orderdet['goodsid'];
	  $data['uid'] = $this->member['uid'];
	  $data['content'] = $pointcontent;
	  $data['point'] = $point;
	  $data['addtime'] = time();
	  //更新订单详情表数据
	  $udata['status'] = 1;
	  $this->mysql->update(Mysite::$app->config['tablepre'].'orderdet',$udata,"id='".$orderdetid."'");
	  //将评数据写到 数据表中/
	  $this->mysql->insert(Mysite::$app->config['tablepre'].'comment',$data);
	  /*写日志*/
	  $issong = 1;
	  if(intval(Mysite::$app->config['commentday']) > 0){//检测是否赠送积分
	     	   $uptime = Mysite::$app->config['commentday']*24*60*60;
	     	   $uptime = $orderinfo['addtime'] +$uptime;
	     	   if($uptime > time()){
	     	      $issong = 1;
	     	   }else{
	     	      $issong = 0;
	     	   }
	  }
	  $fscoreadd = 0;
	  if(intval(Mysite::$app->config['commenttype']) > 0 && $issong == 1)
	  { //赠送积分 大于0赠送积分到用户帐号  赠送基础积分
	    $scoreadd = Mysite::$app->config['commenttype'];
	    $checktime = date('Y-m-d',time());
	    $checktime = strtotime($checktime);
	    $checklog = $this->mysql->select_one("select sum(result) as jieguo from ".Mysite::$app->config['tablepre']."memberlog where type = 1 and   userid = ".$this->member['uid']." and addtype =1 and  addtime > ".$checktime);
	    if(Mysite::$app->config['maxdayscore'] > 0){
	    	$checkguo = $checklog['jieguo']+$scoreadd;
	    	if($checkguo < Mysite::$app->config['maxdayscore']){
	    		//最大值小于当前和
	    	}elseif(Mysite::$app->config['maxdayscore'] > $checklog['jieguo']){
	    		//最大指 大于 已增指
	    		$scoreadd = Mysite::$app->config['maxdayscore'] - $checklog['jieguo'];
	    	}else{
	    		$scoreadd = 0;
	    	}
	    }
	    if($scoreadd > 0){
	  	   $this->mysql->update(Mysite::$app->config['tablepre'].'member','`score`=`score`+'.$scoreadd,"uid='".$this->member['uid']."'");
	  	   $fscoreadd =$scoreadd;
         $memberallcost = $this->member['score']+$scoreadd;
         $this->memberCls->addlog($this->member['uid'],1,1,$scoreadd,'评价商品','评价商品'.$orderdet['goodsname'].'获得'.$scoreadd.'积分',$memberallcost);
      }
	  }
	  // 查询子订单是否所有的状态都为 1，  是的话更新订单标志
	  $shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."orderdet where order_id='".$orderinfo['id']."' and status = 0");
	  if($shuliang < 1)//订单已评价完毕
	  {
	     $this->mysql->update(Mysite::$app->config['tablepre'].'order','`is_ping`=1',"id='".$orderinfo['id']."'");

	     if(intval(Mysite::$app->config['commentscore']) > 0 && $issong ==  1){//扩张积分 大于0
	     	   $scoreadd = intval(Mysite::$app->config['commentscore'])*$orderinfo['allcost'];
	     	   $checktime = date('Y-m-d',time());
	         $checktime = strtotime($checktime);
	         $checklog = $this->mysql->select_one("select sum(result) as jieguo from ".Mysite::$app->config['tablepre']."memberlog where type = 1 and   userid = ".$this->member['uid']." and addtype =1 and  addtime > ".$checktime);
	         if(Mysite::$app->config['maxdayscore'] > 0){
	    	       $checkguo = $checklog['jieguo']+$scoreadd;
	    	       if($checkguo < Mysite::$app->config['maxdayscore']){
	    	           	//最大值小于当前和
	    	       }elseif(Mysite::$app->config['maxdayscore'] > $checklog['jieguo']){
	    		        //最大指 大于 已增指
	    		      $scoreadd = Mysite::$app->config['maxdayscore'] - $checklog['jieguo'];
	    	       }else{
	    	         	$scoreadd = 0;
	    	       }
	         }
	         if($scoreadd > 0){
	         	   $this->mysql->update(Mysite::$app->config['tablepre'].'member','`score`=`score`+'.$scoreadd,"uid='".$this->member['uid']."'");
	  	         $memberallcost = $this->member['score']+$scoreadd+$fscoreadd;
               $this->memberCls->addlog($this->member['uid'],1,1,$scoreadd,'评价完订单','评价完订单'.$orderinfo['dno'].'奖励，'.$scoreadd.'积分',$memberallcost);
	         }
	     }
	  }
	  //店铺平分
	  $newpoint['point'] = 5;
	  $shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."comment where shopid='".$orderinfo['shopid']."' ");
	  $scorall = $this->mysql->select_one("select sum(point) as allpoint from ".Mysite::$app->config['tablepre']."comment where shopid='".$orderinfo['shopid']."' ");
	  if($shuliang > 0)
	  {
	  	$newpoint['point'] = intval($scorall['allpoint']/$shuliang);
	  }
	  $newpoint['pointcount'] = $shuliang;
	  $this->mysql->update(Mysite::$app->config['tablepre'].'shop',$newpoint,"id='".$orderinfo['shopid']."'");
	  //商品评分
	  $newpoint['point'] = 5;
	  $shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."comment where goodsid='".$orderdet['goodsid']."' ");
	  $scorall = $this->mysql->select_one("select sum(point) as allpoint from ".Mysite::$app->config['tablepre']."comment where goodsid='".$orderdet['goodsid']."' ");
	  if($shuliang > 0)
	  {
	  	$newpoint['point'] = intval($scorall['allpoint']/$shuliang);
	  }
	  $newpoint['pointcount'] = $shuliang;
	  //pointcount `$key`
	  $this->mysql->update(Mysite::$app->config['tablepre'].'goods',$newpoint,"id='".$orderdet['goodsid']."'");
	  $this->success('操作成功');
	}
	function showcommlist(){
		$this->checkshoplogin();
	  $id = IReq::get('id');
		if(empty($id)) $this->message('提交ID不能为空');
		$checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."comment where id='".$id."'  ");
		if(empty($checkinfo)) $this->message('评价获取失败');
		$data['is_show'] = $checkinfo['is_show'] == 1?0:1;
		$this->mysql->update(Mysite::$app->config['tablepre'].'comment',$data,"id='".$id."'");
		$this->success('操作成功');
	}
	function delcommlist()
	{
		$this->checkshoplogin();
		 $id = IReq::get('id');
		 if(empty($id))  $this->message('评价ID不能为空');
		 $ids = is_array($id)? join(',',$id):$id;
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'comment'," id in($ids) ");
	  	$this->success('操作成功');
	}

  function guestorderlist(){
  	   $this->setstatus();
  	    $phone = IFilter::act(IReq::get('phone'));
  	    $link = IUrl::creatUrl('order/guestorder');
  	    $Captcha = IFilter::act(IReq::get('Captcha'));
  	     $type = IFilter::act(IReq::get('type'));
		    if(Mysite::$app->config['allowedcode'] == 1)
		    {
		 	     if($Captcha != ICookie::get('Captcha')) 	$this->message('验证码错误',$link);
		    }
		    if(!(IValidate::suremobi($phone)))$this->message('请录入正确的手机号码');
		    $data['phone'] = $phone;
		    $data['Captcha'] = $Captcha;
		    $data['where'] = ' buyerphone = \''.$phone.'\'';
		    $data['where'] .= empty($type)?' and shoptype=0':' and shoptype=1';
		    $data['type'] = $type;
  	    Mysite::$app->setdata($data);
  }
  function comment(){
   $this->checkshoplogin();
  }
  function commentshop(){
    $shopid = intval(IFilter::act(IReq::get('id')));
    $type = trim(IFilter::act(IReq::get('type')));
    $data['list'] = array();
    if($type == 'shop'){
       	$this->pageCls->setpage(intval(IReq::get('page')),10);
                 $data['list'] = $this->mysql->getarr("select a.*,b.username,b.logo,c.name from ".Mysite::$app->config['tablepre']."comment as a left join  ".Mysite::$app->config['tablepre']."member as b on a.uid = b.uid left join ".Mysite::$app->config['tablepre']."goods as c on a.goodsid = c.id  where a.shopid=".$shopid." and a.is_show  =0 order by a.id desc   limit ".$this->pageCls->startnum().", ".$this->pageCls->getsize()."");
             $shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."comment   where shopid=".$shopid."  and is_show  =0 ");
                  $this->pageCls->setnum($shuliang);
              $data['pagecontent'] = $this->pageCls->ajaxbar('getPingjia');
    }
    Mysite::$app->setdata($data);
  }

}



?>
