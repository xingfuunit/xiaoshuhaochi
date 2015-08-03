<?php
class method   extends adminbaseclass
{
	function index(){
	 	    	 $link = IUrl::creatUrl('adminpage/order/module/orderlist');
           $this->refunction('',$link);
	}
	//快速下单
	 function adminfastfoods(){
   	    $data['shoplist'] = $this->mysql->getarr("select id,shopname  from ".Mysite::$app->config['tablepre']."shop where is_open = 1 and is_pass=1 and endtime > ".time()." order by id limit 0,1000");
   	    // 营业时间	is_open 是否营业	is_pass 是否通过审核	is_recom 是否是推荐店铺 endtime

   	     Mysite::$app->setdata($data);

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
   function orderlist(){
        $this->setstatus();
	    	$querytype = IReq::get('querytype');
	    	$searchvalue = IReq::get('searchvalue');
	    	$orderstatus = intval(IReq::get('orderstatus'));
	    	$starttime = IReq::get('starttime');
	    	$endtime = IReq::get('endtime');
	    	$nowday = date('Y-m-d',time());
	    	$starttime = empty($starttime)? $nowday:$starttime;
	    	$endtime = empty($endtime)? $nowday:$endtime;
	      $where = '  where ord.addtime > '.strtotime($starttime.' 00:00:00').' and ord.addtime < '.strtotime($endtime.' 23:59:59');
	    	$data['starttime'] = $starttime;
	    	$data['endtime'] = $endtime;
	    	$newlink = '/starttime/'.$starttime.'/endtime/'.$endtime;
	    	 $data['searchvalue'] ='';
	    	 $data['querytype'] ='';
	    	if(!empty($querytype))
	    	{
	    		if(!empty($searchvalue)){
	    			 $data['searchvalue'] = $searchvalue;
	       	   $where .= ' and '.$querytype.' LIKE \'%'.$searchvalue.'%\' ';
	       	   $newlink .= '/searchvalue/'.$searchvalue.'/querytype/'.$querytype;
	       	   $data['querytype'] = $querytype;
	    		}//IUrl::creatUrl('admin/asklist/commentlist
	    	}
	     $data['orderstatus'] = '';

	    	if($orderstatus > 0)
	    	{
	    	   if($orderstatus  > 4)
	          {
	          	$where .= empty($where)?' where ord.status > 3 ':' and ord.status > 3 ';
	          }else{
	          	$newstatus = $orderstatus -1;
	          	$where .= empty($where)?' where ord.status ='.$newstatus:' and ord.status = '.$newstatus;
	          }
	          $data['orderstatus'] = $orderstatus;
	          $newlink .= '/orderstatus/'.$orderstatus;
	    	}
	    	$link = IUrl::creatUrl('/adminpage/order/module/orderlist'.$newlink);
	    	$pageshow = new page();
	    	$pageshow->setpage(IReq::get('page'),5);
	    	 //order: id  dno 订单编号 shopuid 店铺UID shopid 店铺ID shopname 店铺名称 shopphone 店铺电话 shopaddress 店铺地址 buyeruid 购买用户ID，0未注册用户 buyername
	    	 //
	    	$orderlist = $this->mysql->getarr("select ord.*,mb.username as acountname from ".Mysite::$app->config['tablepre']."order as ord left join  ".Mysite::$app->config['tablepre']."member as mb on mb.uid = ord.buyeruid   ".$where." order by ord.id desc limit ".$pageshow->startnum().", ".$pageshow->getsize()."");
	    	$shuliang  = $this->mysql->counts("select ord.*,mb.username as acountname from ".Mysite::$app->config['tablepre']."order as ord left join  ".Mysite::$app->config['tablepre']."member as mb on mb.uid = ord.buyeruid   ".$where." ");
	    	$pageshow->setnum($shuliang);
	    	$data['pagecontent'] = $pageshow->getpagebar($link);
	    	$data['list'] = array();
	      if($orderlist)
	      {
	    	foreach($orderlist as $key=>$value)
	    	{
	    		$value['detlist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."orderdet where   order_id = ".$value['id']." order by id desc ");
	    		$data['list'][] = $value;
	    	}
	     }
	     $data['scoretocost'] =Mysite::$app->config['scoretocost'];
	     Mysite::$app->setdata($data);
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
	function ordertoday(){
		$firstareain = IReq::get('firstarea');
		$secareain = IReq::get('secarea');
		$statustype =  intval(IReq::get('statustype'));
		$dno = IReq::get('dno');
		$data['dno'] = $dno;
		$data['statustype'] = $statustype;

		$statustype = in_array($statustype,array(1,2,3,4,5))?$statustype:0;
		$statustypearr = array(
		'0'=>'',
		'1'=>' and ord.status = 0 ',
		'2'=>' and ord.status = 1  ',
		'3'=>' and ord.status > 1 and ord.status < 4 ',
		'4'=>' and ord.is_reback in(1,2)  ',
		);

		///statustype  1   待审核
//statustype  2   待发货
//statustype  3   已发货
//statustype  4   退款处理

		$data['frinput'] = $firstareain;

		$this->setstatus();
		$nowday = date('Y-m-d',time());
	  $where = '  where ord.posttime > '.strtotime($nowday.' 00:00:00').' and ord.posttime < '.strtotime($nowday.' 23:59:59');
		//查询当天所有订单数据

	 //	$where .= ' and ord.status = 0 ';
	  if(!empty($firstareain)){
	      $where .= " and FIND_IN_SET('".$firstareain."',`areaids`)";
	  }
	  $where .= $statustypearr[$statustype];
		//$where .= ' and ord.status = 0 ';
	  $where .= empty($dno)?'':' and ord.dno =\''.$dno.'\'';

		$orderlist = $this->mysql->getarr("select ord.*,mb.username as acountname from ".Mysite::$app->config['tablepre']."order as ord left join  ".Mysite::$app->config['tablepre']."member as mb on mb.uid = ord.buyeruid   ".$where." order by ord.id desc limit 0,1000");
		$shuliang  = $this->mysql->counts("select ord.*,mb.username as acountname from ".Mysite::$app->config['tablepre']."order as ord left join  ".Mysite::$app->config['tablepre']."member as mb on mb.uid = ord.buyeruid   ".$where." ");
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
	  /*构造城市*/


	  $areainfo = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area   order by orderid asc");
	   $this->getgodigui($areainfo,0,0);
	 	 $data['arealist'] = $this->digui;


	 	 $data['showdet'] = intval(IReq::get('showdet'));
	 	 $data['playwave'] = ICookie::get('playwave'); //shoporderlist
		 Mysite::$app->setdata($data);
	}
	function ordertotal()
	{
		$data['buyerstatus'] = array(
		'0'=>'待处理订单',
		'1'=>'审核通过,待发货',
		'2'=>'订单已发货',
		'3'=>'订单完成',
		'4'=>'买家取消订单',
		'5'=>'卖家取消订单',
		'18' => '系统取消订单'
		);
		$querytype = IReq::get('querytype');
		$searchvalue = IReq::get('searchvalue');
		$orderstatus = intval(IReq::get('orderstatus'));
		$starttime = IReq::get('starttime');
		$endtime = IReq::get('endtime');
		$nowday = date('Y-m-d',time());
		$starttime = empty($starttime)? $nowday:$starttime;
		$endtime = empty($endtime)? $nowday:$endtime;
	  $where = '  where ord.posttime > '.strtotime($starttime.' 00:00:00').' and ord.posttime < '.strtotime($endtime.' 23:59:59');
		$data['starttime'] = $starttime;
		$data['endtime'] = $endtime;
		$data['querytype'] = '';
		$data['searchvalue'] = '';
		if(!empty($querytype))
		{
			if(!empty($searchvalue)){
				 $data['searchvalue'] = $searchvalue;
	   	   $where .= ' and '.$querytype.' =\''.$searchvalue.'\' ';
	   	   $data['querytype'] = $querytype;
			}
		}

		$data['list'] = $this->mysql->getarr("select count(ord.id) as shuliang,ord.status,sum(allcost) as allcost,sum(scoredown) as scorecost from ".Mysite::$app->config['tablepre']."order as ord left join  ".Mysite::$app->config['tablepre']."member as mb on mb.uid = ord.buyeruid   ".$where." group by ord.status order by ord.id desc limit 0, 10");

		Mysite::$app->setdata($data);
	}
	function orderyjin()
	{
		$searchvalue = IReq::get('searchvalue');
		$starttime = trim(IReq::get('starttime'));
		$endtime = trim(IReq::get('endtime'));
		$newlink = '';
		$where= '';
		$where2 = '';
		$data['searchvalue'] = '';
		if(!empty($searchvalue))
		{
			   $data['searchvalue'] = $searchvalue;
	   	   $where .= ' where shopname = \''.$searchvalue.'\' ';
	   	   $newlink .= '/searchvalue/'.$searchvalue;
		}
		$data['starttime'] = '';
		if(!empty($starttime))
		{
			 $data['starttime'] = $starttime;
			 $where2 .= ' and  posttime > '.strtotime($starttime.' 00:00:01').' ';
	   	 $newlink .= '/starttime/'.$starttime;
		}
		$data['endtime'] = '';
		if(!empty($endtime))
		{
			 $data['endtime'] = $endtime;
			 $where2 .= ' and  posttime < '.strtotime($endtime.' 23:59:59').' ';
	   	 $newlink .= '/endtime/'.$endtime;
		}
		$link = IUrl::creatUrl('adminpage/order/module/orderyjin'.$newlink);
	  $data['outlink'] =IUrl::creatUrl('adminpage/order/module/outtjorder/outtype/query'.$newlink);
	  $data['outlinkch'] =IUrl::creatUrl('adminpage/order/module/outtjorder'.$newlink);
		$pageinfo = new page();
		$pageinfo->setpage(IReq::get('page'));
		$shoplist = $this->mysql->getarr("select id,shopname,yjin,shoptype from ".Mysite::$app->config['tablepre']."shop ".$where."   order by id asc  limit ".$pageinfo->startnum().", ".$pageinfo->getsize()."");
		$list = array();
		if(is_array($shoplist))
		{
	     foreach($shoplist as $key=>$value)
	     {
	     	  //判断店铺配送类型
	     	  if($value['shoptype'] ==0){
	     	     $sendtype = $this->mysql->value(Mysite::$app->config['tablepre']."shopfast","sendtype","shopid = '".$value['id']."'");//$table,$row,$where=""
	     	  }elseif($value['shoptype'] ==  1){
	     	     $sendtype = $this->mysql->value(Mysite::$app->config['tablepre']."shopmarket","sendtype","shopid = '".$value['id']."'");//$table,$row,$where=""
	     	  }

	     	   $value['sendtype'] = empty($sendtype)?'网站配送':'自送';
	         $shoptj=  $this->mysql->select_one("select  count(id) as shuliang,sum(cxcost) as cxcost,sum(yhjcost) as yhcost, sum(shopcost) as shopcost,sum(scoredown) as score, sum(shopps)as pscost, sum(bagcost) as bagcost from ".Mysite::$app->config['tablepre']."order  where shopid = '".$value['id']."' and paytype ='outpay' and shopcost > 0 and status = 3 ".$where2." order by id asc  limit 0,1000");
	         $line= $this->mysql->select_one("select count(id) as shuliang,sum(cxcost) as cxcost,sum(yhjcost) as yhcost,sum(shopcost) as shopcost, sum(scoredown) as score, sum(shopps)as pscost, sum(bagcost) as bagcost from ".Mysite::$app->config['tablepre']."order  where shopid = '".$value['id']."' and paytype !='outpay'  and paystatus =1 and shopcost > 0 and status = 3 ".$where2."   order by id asc  limit 0,1000");

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
	         $value['goodscost'] = $line['shopcost'] +$shoptj['shopcost'];
	          $yjinb = empty($value['yjin'])?Mysite::$app->config['yjin']:$value['yjin'];
		       $value['yb'] = $yjinb * 0.01;
		       $value['yje'] = $value['yb']*$value['allcost'];
		       $value['outdetail'] =IUrl::creatUrl('adminpage/order/module/outdetail/outtype/query/shopid/'.$value['id'].$newlink);
		       $list[] = $value;
		   }
		}

		$data['list'] =$list;

		$shuliang  = $this->mysql->counts("select id from ".Mysite::$app->config['tablepre']."shop ".$where."  ");
		$pageinfo->setnum($shuliang);
		$data['pagecontent'] = $pageinfo->getpagebar($link);
		Mysite::$app->setdata($data);
	}
	function ordercontrol()
	{
		 $id = intval(IReq::get('id'));
		 $type = IReq::get('type');
		 if(empty($id)) $this->message('订单ID错误');
		 $orderinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id='".$id."'  ");
		 if(empty($orderinfo)) $this->message('订单获取失败');
		  switch($type)
	   {
	   	  case 'un'://关闭订单
	   	      $reasons = IReq::get('reasons');
	   	      $suresend =  IReq::get('suresend');

	   	      if(empty($reasons)) $this->message('关闭理由不能为空');
	   	      if($orderinfo['status'] > 2)  $this->message('订单状态不可关闭');
	   	      //更新订单


	   	       //写消息给买家
	   	      if(!empty($orderinfo['buyeruid']))
	   	      {
	   	      	   $detail = '';
	   	      	   $memberinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$orderinfo['buyeruid']."'   ");
		             if($orderinfo['paystatus'] == 1&& $orderinfo['paytype'] != 'outpay'){
		 	            //将订单还给买家账号
		 	              /*
		 	              if(!empty($memberinfo)){
		 	               $this->mysql->update(Mysite::$app->config['tablepre'].'member','`cost`=`cost`+'.$orderinfo['allcost'].',`score`=`score`+'.$orderinfo['scoredown'],"uid ='".$orderinfo['buyeruid']."' ");
		 	                $detail = '，账号余额增加'.$orderinfo['allcost'].'元';
		 	              }
		 	              $membersc = $memberinfo['score']+$orderinfo['allcost'];
		 	              $this->memberCls->addlog($orderinfo['buyeruid'],2,1,$orderinfo['allcost'],'取消订单','管理员关闭订单'.$orderinfo['dno'].'已支付金额'.$orderinfo['allcost'].'返回帐号',$membersc);
		 	              */
		 	              $this->message('订单已支付，请在退款处理中关闭该订单');
		 	              if($orderinfo['scoredown'] > 0){
		 	              	$memberscs = $memberinfo['score']+$orderinfo['scoredown'];
		                   $this->memberCls->addlog($orderinfo['buyeruid'],1,1,$orderinfo['scoredown'],'取消订单','管理员关闭订单'.$orderinfo['dno'].'抵扣积分'.$orderinfo['scoredown'].'返回帐号',$memberscs);
		                }
		             }elseif($orderinfo['scoredown']> 0){
		             	 $this->mysql->update(Mysite::$app->config['tablepre'].'member','`score`=`score`+'.$orderinfo['scoredown'],"uid ='".$orderinfo['buyeruid']."' ");
		             	 $memberscs = $memberinfo['score']+$orderinfo['scoredown'];
		                $this->memberCls->addlog($orderinfo['buyeruid'],1,1,$orderinfo['scoredown'],'取消订单','管理员关闭订单'.$orderinfo['dno'].'抵扣积分'.$orderinfo['scoredown'].'返回帐号',$memberscs);
		             }
	   	      }
	   	      $orderdata['status'] = 5;
	   	       $this->mysql->update(Mysite::$app->config['tablepre'].'order',$orderdata,"id='".$id."'");
	   	      //还库存
	   	      $ordetinfo = $this->mysql->getarr("select ort.goodscount,go.id,go.sellcount,go.count as stroe from ".Mysite::$app->config['tablepre']."orderdet as ort left join  ".Mysite::$app->config['tablepre']."goods as go on go.id = ort.goodsid   where ort.order_id='".$id."' and  go.id > 0 ");
	   	      $day = strtotime(date('Y-m-d',$orderinfo['posttime']));
	          foreach($ordetinfo as $key=>$value)
		        {
			            //$newdata['count'] = $value['stroe']+	$value['goodscount'];
			            $newdata['sellcount'] = $value['sellcount'] - $value['goodscount'];
			            //$this->mysql->update(Mysite::$app->config['tablepre']."goods",$newdata,"id='".$value['id']."'");
			            //modified by pinkky
			            $this->mysql->update(Mysite::$app->config['tablepre']."goods",$newdata,"id='".$value['id']."'");

			            $this->mysql->update(Mysite::$app->config['tablepre']."daystock", '`stock`=`stock`-'.$value['goodscount'], "goods_id=".$value['id']." and day=".$day);
		        }
		        if($suresend == 1){
		        	//短信发送
		        	   $ordCls = new orderclass($this->mysql);
	               $ordCls->noticeclose($id,$reasons);
	          }
	   	  break;
	   	  case 'pass':
	   	     if($orderinfo['status'] != 0)  $this->message('订单状态不可通过审核');
	   	     if($orderinfo['is_reback'] > 0 && $orderinfo['is_reback'] < 3) $this->message('订单退款中不可操作');
	   	       $checkstr = Mysite::$app->config['auto_send'];
	   	       if($checkstr == 1){
	   	           $orderdata['status'] = 2;
	   	       }else{
	   	       	   $orderdata['status'] = 1;
	   	       }
	   	        $this->mysql->update(Mysite::$app->config['tablepre'].'order',$orderdata,"id='".$id."'");

	          if(Mysite::$app->config['man_ispass']  == 1)
	          {
	          	  $ordCls = new orderclass($this->mysql);
	               $ordCls->sendmess($id);
	          }
	   	  break;
	   	  case 'send':
	   	   if($orderinfo['is_reback'] > 0 && $orderinfo['is_reback'] < 3) $this->message('订单退款中不可操作');
	   	      if($orderinfo['status'] != 1)  $this->message('订单状态不可发货');
	   	      $orderdata['status'] = 2;
	   	      $this->mysql->update(Mysite::$app->config['tablepre'].'order',$orderdata,"id='".$id."'");
	   	      $ordCls = new orderclass($this->mysql);
	               $ordCls->noticesend($id);
	   	  break;
	   	  case 'over':
	   	      if($orderinfo['is_reback'] > 0 && $orderinfo['is_reback'] < 3) $this->message('订单退款中不可操作');
	   	       if($orderinfo['status'] != 2)  $this->message('订单状态不可完成');
	   	      $orderdata['status'] = 3;
	   	      //写用户数据
	   	       $this->mysql->update(Mysite::$app->config['tablepre'].'order',$orderdata,"id='".$id."'");
	   	       //更新用户成长值
	   	       if(!empty($orderinfo['buyeruid']))
	   	       {
	   	      	   $memberinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid='".$orderinfo['buyeruid']."'   ");
		             if(!empty($memberinfo)){
		             	 $this->mysql->update(Mysite::$app->config['tablepre'].'member','`total`=`total`+'.$orderinfo['allcost'],"uid ='".$orderinfo['buyeruid']."' ");
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





	   	  break;
	   	  case 'del':
	   	      if($orderinfo['status'] < 4)  $this->message('订单状态不可删除');
	   	      $this->mysql->delete(Mysite::$app->config['tablepre'].'order',"id = '$id'");
	   	  break;
	   	  case 'drawback'://退款成功
	   	      //获取退款记录
	   	       $drawbacklog = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."drawbacklog where orderid=".$id." order by  id desc  limit 0,2");
	   	       if(empty($drawbacklog)) $this->message('退款记录为空');
	   	       if($drawbacklog['status'] != 0) $this->message('退款记录状态不可操作');
	   	       if($orderinfo['status'] > 2) $this->message('订单状态'.$orderinfo['status'].'不可操作退款');
	   	       $arr['is_reback'] = 2;//订单状态
	   	       $arr['status'] = 4;
	   	        $this->mysql->update(Mysite::$app->config['tablepre'].'order',$arr,"id='".$id."'");
	   	       $data['bkcontent'] = IReq::get('reasons');
	   	       $data['status'] = 1;//
	   	       $this->mysql->update(Mysite::$app->config['tablepre'].'drawbacklog',$data,"id='".$drawbacklog['id']."'");
	   	       $ordCls = new orderclass($this->mysql);
	               $ordCls->noticeback($id);
	   	  break;
	   	  case 'undrawback'://退款不成功
	   	       $drawbacklog = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."drawbacklog where orderid=".$id." order by  id desc  limit 0,2");
	   	       if(empty($drawbacklog)) $this->message('退款记录为空');
	   	       if($drawbacklog['status'] !=  0) $this->message('退款记录状态不可操作');
	   	       if($orderinfo['status'] > 2) $this->message('订单状态不可操作退款');
	   	       $arr['is_reback'] = 3;//订单状态
	   	        $this->mysql->update(Mysite::$app->config['tablepre'].'order',$arr,"id='".$id."'");
	   	       $data['bkcontent'] = IReq::get('reasons');
	   	       $data['status'] = 2;//
	   	       $this->mysql->update(Mysite::$app->config['tablepre'].'drawbacklog',$data,"id='".$drawbacklog['id']."'");
	   	       $ordCls = new orderclass($this->mysql);
	               $ordCls->noticeunback($id);

	   	  break;
	   	  default:
	   	  $this->message('未定义的操作');
	   	  break;
	   	}

		 $this->success('操作成功');
		//返回json_code;
	}
	function ajaxcheckorder(){
	  $data = array();
		$nowday = date('Y-m-d',time());

	  $where = '  where ord.addtime > '.strtotime($nowday).' and ord.addtime < '.strtotime($nowday.' 23:59:59');
		 //order: id  dno 订单编号 shopuid 店铺UID shopid 店铺ID shopname 店铺名称 shopphone 店铺电话 shopaddress 店铺地址 buyeruid 购买用户ID，0未注册用户 buyername
		$where .= ' and ord.status = 0 ';

		$firstarea = intval(IReq::get('firstarea'));


		if(!empty($firstareain)){
	      $where .= " and FIND_IN_SET('".$firstareain."',`areaids`)";
	  }
		$shuliang  = $this->mysql->counts("select ord.* from ".Mysite::$app->config['tablepre']."order as ord   ".$where." ");
		if($shuliang > 0){
			$this->success('操作成功');
		}else{
			$this->message('操作成功');
		}
	}
	function outorderlimit(){
		$outtype = IReq::get('outtype');
		if(!in_array($outtype,array('query','ids')))
		{
		  	header("Content-Type: text/html; charset=UTF-8");
			 echo '查询条件错误';
			 exit;
		}
		$where = '';
		if($outtype == 'ids')
		{
			  $id = trim(IReq::get('id'));
			  if(empty($id))
			  {
			  	 header("Content-Type: text/html; charset=UTF-8");
			  	 echo '查询条件不能为空';
			  	 exit;
			  }
			   $doid = explode('-',$id);
			  $id = join(',',$doid);
			  $where .= ' where ord.id in('.$id.') ';
		}else{
		   $starttime = intval(IReq::get('starttime'));
		   $endtime = intval(IReq::get('endtime'));
		   $status = intval(IReq::get('status'));
		   $where .= '  where ord.posttime > '.$starttime.' and ord.posttime < '.$endtime;
		   if(!empty($status))
		   {
		   	 $where .= ' and ord.status ='.$status.'';
		    }else{
		     $where .= ' and ord.status > 1  and ord.status < 4 ';
		   }

		}

		$orderlist = $this->mysql->getarr("select ord.*,mb.username as acountname from ".Mysite::$app->config['tablepre']."order as ord left join  ".Mysite::$app->config['tablepre']."member as mb on mb.uid = ord.buyeruid   ".$where." order by ord.id desc limit 0,1000");

	  $print_rdata = array();
	  if($orderlist)
	  {
		  foreach($orderlist as $key=>$value)
		  {
			    $detlist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."orderdet where   order_id = ".$value['id']." order by order_id desc ");
			    //id  dno 订单编号 shopuid 店铺UID shopid 店铺ID shopname 店铺名称 shopphone 店铺电话 shopaddress 店铺地址 buyeruid 购买用户ID，0未注册用户 buyername 购买热名称 buyeraddress 联系地址  联系电话 buyertemphone 备用电话 sendtime 配送时间要求 sendcost 配送费用 cost 总价 addtime 制造时间 status 状态 paytype 支付类型outpay货到支付，open_acout账户余额支付，other调用paylist paystatus 支付状态1已支付 content 订单备注 allcost
			    if(is_array($detlist)){
			       foreach($detlist as $keys=>$val){
			         // id  order_id  goodsid  goodsname      status  shopid  is_send 是否是赠品 1赠品
			           $newdata = array();
			    	     $newdata['dno'] = $value['dno'];
			    	     $newdata['shopname'] = $value['shopname'];
			    	     $newdata['area1'] = $value['area1'];
			    	     $newdata['area2'] = $value['area2'];
			    	     $newdata['goodsname'] = $val['goodsname'];
			    	     $newdata['goodscount'] = $val['goodscount'];
			    	     $newdata['goodscost'] = $val['goodscost'];
			    	     $newdata['buyerphone'] = $value['buyerphone'];
			    	     $newdata['sendtime'] = $value['sendtime'];
			    	     $newdata['buyeraddress'] = $value['buyeraddress'];
			    	     $newdata['buyername'] = $value['buyername'];
			    	      $newdata['content'] = $value['content'];
			    	     $print_rdata[] = $newdata;
			      }
			    }

		  }
	  }


	 // array('下单用户','店铺名','地址1','地址2','订单详情','商品数量','单价','联系电话','送餐时间','详细地址','备注');


		 $outexcel = new phptoexcel();
		 $titledata = array('订单编号','下单用户','店铺名','地址1','地址2','商品名称','商品数量','单价','联系电话','送餐时间','详细地址','备注');
		 $titlelabel = array('dno','buyername','shopname','area1','area2','goodsname','goodscount','goodscost','buyerphone','sendtime','buyeraddress','content');


		// $datalist = $this->mysql->getarr("select card,card_password,cost from ".Mysite::$app->config['tablepre']."card where id > 0 ".$where."   order by id desc  limit 0,2000 ");
		 $outexcel->out($titledata,$titlelabel,$print_rdata,'','订单导出');

	}
	function outtjorder()
	{
		$outtype = IReq::get('outtype');
		if(!in_array($outtype,array('query','ids')))
		{
		  	header("Content-Type: text/html; charset=UTF-8");
			 echo '查询条件错误';
			 exit;
		}
		$where = '';
		$where2 = '';
		if($outtype == 'ids')
		{
			  $id = trim(IReq::get('id'));
			  if(empty($id))
			  {
			  	 header("Content-Type: text/html; charset=UTF-8");
			  	 echo '查询条件不能为空';
			  	 exit;
			  }
			   $doid = explode('-',$id);
			  $id = join(',',$doid);
			  $where .= ' where id in('.$id.') ';

			  $searchvalue = trim(IReq::get('searchvalue'));
			  $where .= !empty($searchvalue)? ' and shopname = \''.$searchvalue.'\'':'';
		 //   $data['searchvalue'] = $searchvalue;
	   //	   $where .= ' where shopname = \''.$searchvalue.'\' ';

		   $starttime = trim(IReq::get('starttime'));
		   $where2 .= !empty($starttime)? ' and  posttime > '.strtotime($starttime.' 00:00:01').' ':'';

		   $endtime = trim(IReq::get('endtime'));
		   $where2 .= !empty($endtime)? ' and  posttime < '.strtotime($endtime.' 23:59:59').' ':'';

		}else{
		   $searchvalue = trim(IReq::get('searchvalue'));
		   $where .= !empty($searchvalue)? ' where shopname = \''.$searchvalue.'\'':'';
		 //   $data['searchvalue'] = $searchvalue;
	   //	   $where .= ' where shopname = \''.$searchvalue.'\' ';

		   $starttime = trim(IReq::get('starttime'));
		   $where2 .= !empty($starttime)? ' and  posttime > '.strtotime($starttime.' 00:00:01').' ':'';

		   $endtime = trim(IReq::get('endtime'));
		   $where2 .= !empty($endtime)? ' and  posttime < '.strtotime($endtime.' 23:59:59').' ':'';
		}
		$shoplist = $this->mysql->getarr("select id,shopname,yjin from ".Mysite::$app->config['tablepre']."shop ".$where."   order by id asc  limit 0,2000");
		$list = array();
		if(is_array($shoplist))
		{
	     foreach($shoplist as $key=>$value)
	     {



	     	    $sendtype = $this->mysql->value(Mysite::$app->config['tablepre']."shopfast","sendtype","shopid = '".$value['id']."'");//$table,$row,$where=""

	     	   $value['sendtype'] = empty($value['sendtype'])?'网站配送':'自送';

	         $shoptj=  $this->mysql->select_one("select  count(id) as shuliang,sum(cxcost) as cxcost,sum(yhjcost) as yhcost, sum(shopcost) as shopcost,sum(scoredown) as score, sum(shopps)as pscost, sum(bagcost) as bagcost from ".Mysite::$app->config['tablepre']."order  where shopid = '".$value['id']."' and paytype ='outpay' and shopcost > 0 and status = 3 ".$where2." order by id asc  limit 0,1000");
	         $line= $this->mysql->select_one("select count(id) as shuliang,sum(cxcost) as cxcost,sum(yhjcost) as yhcost,sum(shopcost) as shopcost, sum(scoredown) as score, sum(shopps)as pscost, sum(bagcost) as bagcost from ".Mysite::$app->config['tablepre']."order  where shopid = '".$value['id']."' and paytype !='outpay'  and paystatus =1 and shopcost > 0 and status = 3 ".$where2."   order by id asc  limit 0,1000");


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
	         $value['goodscost'] = $line['shopcost'] +$shoptj['shopcost'];
	          $yjinb = empty($value['yjin'])?Mysite::$app->config['yjin']:$value['yjin'];
		       $value['yb'] = $yjinb * 0.01;
		       $value['yje'] = $value['yb']*$value['allcost'];


		       $list[] = $value;
		      // $list[] = $value1;
		   }
		}
		 $outexcel = new phptoexcel();
		 $titledata = array('店铺名称','配送方式','订单数量','线上支付','线下支付','优惠券','店铺促销','积分低扣金额','配送费','商品总价','打包费','佣金');
		 $titlelabel = array('shopname','sendtype','orderNum','online','unline','yhjcost','cxcost','score','pscost','goodscost','bagcost','yje');
		// $datalist = $this->mysql->getarr("select card,card_password,cost from ".Mysite::$app->config['tablepre']."card where id > 0 ".$where."   order by id desc  limit 0,2000 ");
		 $outexcel->out($titledata,$titlelabel,$list,'','商家结算');
	}
	//导出商家结算详情
	function outdetail()
	{
		// 订单号    时间    订单内容    配送费用  总价
		   $shopid =  intval(IReq::get('shopid'));

		   if(empty($shopid))
		   {
		   	  header("Content-Type: text/html; charset=UTF-8");
			  	 echo '店铺获取失败';
			  	 exit;
		   }
		   $shoplist = $this->mysql->select_one("select id,shopname,yjin,shoptype from ".Mysite::$app->config['tablepre']."shop  where id='".$shopid."'   order by id asc  limit 0,2000");
		   if(empty($shoplist))
		   {
		   	  header("Content-Type: text/html; charset=UTF-8");
			  	 echo '店铺获取失败';
			  	 exit;
		   }
		   //dno
		   $where = '';
		   $where2 = '';
		   $starttime = trim(IReq::get('starttime'));
		   $where2 .= !empty($starttime)? ' and  posttime > '.strtotime($starttime.' 00:00:01').' ':'';

		   $endtime = trim(IReq::get('endtime'));
		   $where2 .= !empty($endtime)? ' and  posttime < '.strtotime($endtime.' 23:59:59').' ':'';

		   $orderlist = $this->mysql->getarr("select id,dno,allcost,bagcost,shopps,shopcost,addtime,posttime,pstype ,paytype,paystatus from ".Mysite::$app->config['tablepre']."order where shopid = '".$shopid."' and  status = 3 ".$where2." order by id asc  limit 0,2000");
		   $list = array();
		   if(is_array($orderlist))
		   {
		      foreach($orderlist as $key=>$value)
		      {
		   	     $detlist = $this->mysql->getarr("select goodsname,goodscount as shuliang from ".Mysite::$app->config['tablepre']."orderdet  where order_id = '".$value['id']."' and shopid > 0  order by id asc  limit 0,5");
		   	     $detinfo = '';
		   	     if(is_array($detlist))
		         {
		         	   foreach($detlist as $keys=>$val)
		         	   {

		         	   	  $detinfo .= $val['goodsname'].'/'.$val['shuliang'].'份,';
		         	   }
		         }

		         $value['content'] = $detinfo;
		         $value['payname'] = $value['paytype'] == 'outpay'?'货到支付':'在线支付';
		         $value['dotime'] = date('Y-m-d H:i:s',$value['addtime']);
		         $value['posttime'] = date('Y-m-d H:i:s',$value['posttime']);
		         $value['pstype'] = $value['pstype'] == 0?'平台':'自送';
		         $list[] = $value;

		   	  }
		   }
		   // 超市商品总价 marketps 超市配送配送  店铺商品总价 shopps 店铺配送费 pstype 配送方式 0：平台1：个人
		 $outexcel = new phptoexcel();
		 $titledata = array('订单编号','订单总价','配送类型','店铺商品总价','店铺配送费','打包费','订单详情','支付方式','下单时间','配送时间');
		 $titlelabel = array('dno','allcost','pstype','shopcost','shopps','bagcost','content','payname','dotime','posttime');
		 $outexcel->out($titledata,$titlelabel,$list,'','商家结算详情'.$shoplist['shopname']);
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
	 function saveorderbz(){
	 	 $this->checkadminlogin();
	 		$arrtypename = IReq::get('typename');
			$arrtypename = is_array($arrtypename) ? $arrtypename:array($arrtypename);
		  $siteinfo['orderbz'] =   serialize($arrtypename);
		  $config = new config('hopeconfig.php',hopedir);
	    $config->write($siteinfo);
	    $this->success('操作成功');
	 }
	function ordercomment(){
	   $searchvalue = IReq::get('searchvalue');
	   $querytype = IReq::get('querytype');
	   $newlink = '';
	   $where = '';
	   $data['searchvalue'] = '';
	   $data['querytype'] = '';
	   if(!empty($querytype))
	   {
	   	 if(!empty($searchvalue))
	   	 {
	   	   $data['searchvalue'] = $searchvalue;
	   	   $where .= ' where '.$querytype.' LIKE \'%'.$searchvalue.'%\' ';
	   	   $newlink = IUrl::creatUrl('adminpage/order/module/ordercomment/'.$searchvalue.'/querytype/'.$querytype);
	   	   $data['querytype'] = $querytype;
	   	 }
	   }
	  $pageinfo = new page();
    $pageinfo->setpage(IReq::get('page'));
    //comment:  id  orderid  orderdetid  shopid  goodsid  uid  content  addtime  replycontent  replytime  point 评分 is_show
    //orderdet: id  order_id  goodsid  goodsname  goodscost  goodscount  status  shopid
		$data['list'] = $this->mysql->getarr("select com.*,sh.shopname,b.username,ort.goodsname from ".Mysite::$app->config['tablepre']."comment  as com left join ".Mysite::$app->config['tablepre']."member as b on com.uid = b.uid left join ".Mysite::$app->config['tablepre']."shop as sh on sh.id = com.shopid left join ".Mysite::$app->config['tablepre']."orderdet as ort on ort.id = com.orderdetid ".$where." order by com.id desc  limit ".$pageinfo->startnum().", ".$pageinfo->getsize()." ");
		$shuliang  = $this->mysql->counts("select com.*,sh.shopname,b.username,ort.goodsname from ".Mysite::$app->config['tablepre']."comment  as com left join ".Mysite::$app->config['tablepre']."member as b on com.uid = b.uid left join ".Mysite::$app->config['tablepre']."shop as sh on sh.id = com.shopid left join ".Mysite::$app->config['tablepre']."orderdet as ort on ort.id = com.orderdetid ".$where);
		$pageinfo->setnum($shuliang);
		$data['pagecontent'] = $pageinfo->getpagebar($newlink);
		 Mysite::$app->setdata($data);
	}
  function autodel(){
      $dayminitime = time();
      $this->mysql->delete(Mysite::$app->config['tablepre'].'orderdet',"order_id in(select id from  ".Mysite::$app->config['tablepre']."order where status in(0,4,5) and paystatus != 1   and posttime < ".$dayminitime." order by id desc )");
      $this->mysql->delete(Mysite::$app->config['tablepre'].'order',"status in(0,4,5) and paystatus != 1 and  posttime < ".$dayminitime);
      $this->mysql->update(Mysite::$app->config['tablepre'].'order','`status`=2'," is_reback < 1 and is_reback> 2 and status = 1 and posttime < ".$dayminitime."");
      $this->mysql->update(Mysite::$app->config['tablepre'].'order','`status`=3,`suretime`='.time().''," is_reback < 1 and is_reback> 2 and  status = 2 and posttime < ".$dayminitime."");
      $link = IUrl::creatUrl('adminpage/order/module/orderlist');//sendtime 发货时间
	 	  $this->message('',$link);
	}

  function drawbacklog(){
  	 $pageinfo = new page();
     $pageinfo->setpage(IReq::get('page'));
		 $data['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."drawbacklog  order by  id desc  limit ".$pageinfo->startnum().", ".$pageinfo->getsize()." ");
		 $shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."drawbacklog  order by  id desc");
		 $pageinfo->setnum($shuliang);
		 $data['pagecontent'] = $pageinfo->getpagebar();
		 Mysite::$app->setdata($data);
  }
  function showdrawbacklog(){
     $id = IFilter::act(IReq::get('id'));
     $link = IUrl::creatUrl('adminpage/order/module/drawbacklog');
     if(empty($id)) $this->message('id获取失败',$link);
     $drawbacklog = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."drawbacklog where id=".$id." order by  id desc  limit 0,2");
     if(empty($drawbacklog)) $this->message('退款申请获取失败',$link);
     $data['oderinfo'] =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id=".$drawbacklog['orderid']." order by  id desc  limit 0,2");
     $data['orderdet'] =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."orderdet where order_id=".$drawbacklog['orderid']." order by  id desc  limit 0,2");
     $this->setstatus();
     $data['drawbacklog'] = $drawbacklog;
     Mysite::$app->setdata($data);
  }
  function showcommlist(){
	  $id = IReq::get('id');
		if(empty($id)) $this->message('提交ID不能为空');
		$checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."comment where id='".$id."'  ");
		if(empty($checkinfo)) $this->message('评价获取失败');
		$data['is_show'] = $checkinfo['is_show'] == 1?0:1;
		$this->mysql->update(Mysite::$app->config['tablepre'].'comment',$data,"id='".$id."'");
		$this->success('操作成功');
	}

}



?>
