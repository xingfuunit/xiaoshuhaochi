<?php
/*
*   method 方法  包含所有会员相关操作
    管理员/会员  添加/删除/编辑/用户登陆
    用户日志其他相关连的通过  memberclass关联
*/
class method   extends baseclass
{
        function codemark () {
            echo ICookie::get('codemark');

        }

	 function index(){
             $id =IFilter::act(IReq::get('id'));
          /*
             if (!$id) {
                   $link = IUrl::creatUrl('wxsite&action=index&id=27');
                     header("Location:".$link);
                }*/


	  	if($id > 0){

	 	     $checkinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id=".$id."  ");

	 	     if(empty($checkinfo)){
	 	          	$link = IUrl::creatUrl('wxsite/index');
	    	            $this->message('',$link);

	 	     }
	 	     $checkinfo2 =  $this->mysql->select_one("select id,name,parent_id from ".Mysite::$app->config['tablepre']."area where parent_id=".$id."  ");
	 	     if(empty($checkinfo2)){
	 	            ICookie::set('lng',$checkinfo['lng'],2592000);
	                    ICookie::set('lat',$checkinfo['lat'],2592000);
	    	            ICookie::set('mapname',$checkinfo['name'],2592000);
	    	            ICookie::set('myaddress',$checkinfo['id'],2592000);
	    	            $cookmalist = ICookie::get('cookmalist');
	    	            $cooklnglist = ICookie::get('cooklnglist');
	    	            $cooklatlist = ICookie::get('cooklatlist');

	    	            $link = IUrl::creatUrl('wxsite/shoplist');
	    	            $this->message('',$link);
	       }


	    }

	 }

          function choice(){
	   	$id =IFilter::act(IReq::get('id'));
	 	  if($id > 0){

	 	     $checkinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id=".$id."  ");

	 	     if(empty($checkinfo)){
	 	          	$link = IUrl::creatUrl('html5/choice');
	    	            $this->message('',$link);

	 	     }
	 	     $checkinfo2 =  $this->mysql->select_one("select id,name,parent_id from ".Mysite::$app->config['tablepre']."area where parent_id=".$id."  ");
	 	     if(empty($checkinfo2)){
	 	                ICookie::set('lng',$checkinfo['lng'],2592000);
	                	ICookie::set('lat',$checkinfo['lat'],2592000);
	    	            ICookie::set('mapname',$checkinfo['name'],2592000);
	    	            ICookie::set('myaddress',$checkinfo['id'],2592000);
	    	            $cookmalist = ICookie::get('cookmalist');
	    	            $cooklnglist = ICookie::get('cooklnglist');
	    	            $cooklatlist = ICookie::get('cooklatlist');
	    	            $link = IUrl::creatUrl('wxsite/shoplist');
	    	            $this->message('',$link);
	       }


	    }

	 }
	 function shoplist(){
	     $nowID= intval(ICookie::get('myaddress'));
	     if(empty($nowID)){
	 	     $link = IUrl::creatUrl('wxsite/index');
	       $this->message('',$link);
	     }
	 	  $templist = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = 0 and parent_id = 0 and is_search = 1 and type ='checkbox'  order by orderid asc limit 0,1000");
		  $data['caipin'] = array();
	    if(!empty($templist)){
		 	  $data['caipin']  = $this->mysql->getarr("select id,name from ".Mysite::$app->config['tablepre']."shoptype where parent_id='".$templist['id']."'  ");
		  }
		  $shopsearch = IFilter::act(IReq::get('search_input'));
		  $data['search_input'] = $shopsearch;




		  Mysite::$app->setdata($data);
	 }
	 function shoplistdata(){
	 	 $where = '';
	   $shopsearch = IFilter::act(IReq::get('search_input'));
	   $shopsearch = urldecode($shopsearch);
	   if(!empty($shopsearch)) $where=" and b.shopname like '%".$shopsearch."%' ";
	   $areaid=  ICookie::get('myaddress');
	   $catid = intval(IReq::get('catid'));
	   $order = intval(IReq::get('order'));
	   $order = in_array($order,array(1,2))? $order:0;
	   //构造菜品查询
	   $where2 = '';

	   if($catid > 0) $where2 = 'where sh.second_id = '.$catid;
	   $checkareaid = $areaid;
	   if($checkareaid > 0) $where2 = empty($where2) ?' where  ard.areaid = '.$checkareaid:$where2.' and  ard.areaid = '.$checkareaid;

	   $where = empty($where2)? $where:$where." and b.id in(select ard.shopid from ".Mysite::$app->config['tablepre']."areashop as ard left join ".Mysite::$app->config['tablepre']."shopsearch  as sh  on ard.shopid = sh.shopid   ".$where2."  group by shopid  ) ";

      //计算距离远近的方法
	   //   where  2  公里
	   $psset = Mysite::$app->config['psset'];
	   $locationtype = 0;
	   if(!empty($psset)){
	      	 $psinfo = unserialize($psset);
	      	 $locationtype = $psinfo['locationtype'];
	   }
	    if($locationtype == 1){
	         $lng = 0;
	         $lat = 0;
	         if($checkareaid > 0){
	              $areainfo =    $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id=".$checkareaid."  ");
	              if(!empty($areainfo)){
	                $lng = $areainfo['lng'];
	                $lat = $areainfo['lat'];

	              }
	         }
	           $bili = intval(Mysite::$app->config['servery']/1000);
		          $bili = $bili*0.009;
	         $where = empty($where)?'and   SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) < '.$bili.' ': $where.' and SQRT ((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) < '.$bili.'';
           //构造排序条件
           //echo $where;
          // exit;//where  SQRT ((`lat` -34.805885) * (`lat` -34.805885 ) + (`lng` -113.664233 ) * (`lng` -113.664233 )) < 0.045
           $orderarray = array(
           '0'=>' (`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' ) ASC  ',
           '1'=>'limitcost desc',
           '2'=>'limitcost asc'
           );
      }else{
      	$orderarray = array(
           '0'=>' b.sort asc ',
           '1'=>'limitcost desc',
           '2'=>'limitcost asc'
           );
      }

	     $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = 1 and parent_id = 0 and is_main =1  order by orderid asc limit 0,1000");
			 $attra['input'] = 0;
			 $attra['img'] = 0;
			 $attra['checkbox'] = 0;
			 foreach($templist as $key=>$value){
			 	  if($value['type'] == 'input'){
			 	   $attra['input'] =  $attra['input'] > 0?$attra['input']:$value['id'];
			 	  }elseif($value['type'] == 'img'){
			 	  	 $attra['img'] =  $attra['img'] > 0?$attra['img']:$value['id'];
			 	  }elseif($value['type'] == 'checkbox'){
			 	  	$attra['checkbox'] =  $attra['checkbox'] > 0?$attra['checkbox']:$value['id'];
			 	  }
			 }
			 /*获取店铺*/
		  $pageinfo = new page();
		  $pageinfo->setpage(intval(IReq::get('page')));
	    $list = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where  b.is_pass = 1 ".$where."    order by ".$orderarray[$order]." limit ".$pageinfo->startnum().", ".$pageinfo->getsize()."");

			$nowhour = date('H:i:s',time());
      $nowhour = strtotime($nowhour);
      $templist = array();
       $cxclass = new sellrule();
      if(is_array($list)){
			    foreach($list as $keys=>$values){

			    		if($values['id'] > 0){
			    			$values['shoplogo'] = empty($values['shoplogo'])? Mysite::$app->config['siteurl'].Mysite::$app->config['shoplogo']:Mysite::$app->config['siteurl'].$values['shoplogo'];
			          $checkinfo = $this->shopIsopen($values['is_open'],$values['starttime'],$values['is_orderbefore'],$nowhour);
			          $values['opentype'] = $checkinfo['opentype'];
			          $values['newstartime']  =  $checkinfo['newstartime'];
			          $attrdet = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr where  cattype = 1 and shopid = ".$values['id']."");
			          $cxclass->setdata($values['id'],1000,$values['shoptype']);
			          $checkps = 	 $this->pscost($values,1);
			          $values['pscost'] = $checkps['pscost'];
                                  $sendset = unserialize($values['sendset']);
                                  $values['pay_type'] = $sendset['pstype'];
                                  $values['full_pay'] = $sendset['psvalue1'];

			          $cxinfo = $cxclass->getdata();
			          $values['gzdata']='';
			          if(isset($cxinfo['gzdata'])){
			          	foreach($cxinfo['gzdata'] as $km=>$vk){
			          	  $values['gzdata'] = $vk;
			          	}
			          }
			          $values['attrdet'] = array();
			          foreach($attrdet as $k=>$v){
			          	   if($v['firstattr'] == $attra['input']){
			          	   	$values['attrdet']['input'] = $v['value'];
			          	   }elseif($v['firstattr'] == $attra['img']){
			          	   	$values['attrdet']['img'][] = $v['value'];
			          	   }elseif($v['firstattr'] == $attra['checkbox']){
			          	   	 	$values['attrdet']['checkbox'][] = $v['value'];
			          	   }
			          }
			          $templist[] = $values;
			     }
	       }
	    }

	    $data  = $templist;
	    $this->success($data);
	 }
	 function shopshow(){//店铺详情
             //手动写的cookie
                            $cookmalist = ICookie::get('cookmalist');
	    	            $cooklnglist = ICookie::get('cooklnglist');
	    	            $cooklatlist = ICookie::get('cooklatlist');
                            if (!$cookmalist||!$cooklnglist||!$cooklatlist) {
                       $checkinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id=27");
	 	            ICookie::set('lng',$checkinfo['lng'],2592000);
	                    ICookie::set('lat',$checkinfo['lat'],2592000);
	    	            ICookie::set('mapname',$checkinfo['name'],2592000);
	    	            ICookie::set('myaddress',$checkinfo['id'],2592000);

                            }


	 	 $id = intval(IReq::get('id'));
	 	 $data['id'] = $id;

	 	 $shopinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where id='".$id."' ");   //店铺基本信息
	 	 if(empty($shopinfo)){
	 	 	//需要进行跳转
	 	 	 $link = IUrl::creatUrl('wxsite/index');
	     $this->message('',$link);
	 	 }
	 	 $nowID= intval(ICookie::get('myaddress'));

	    if(empty($nowID)){
	 	    // $link = IUrl::creatUrl('wxsite/index');
	      // $this->message('',$link);
	     }
	 	 $shopdet = array();
	 	 if(empty($shopinfo['shoptype'])){
	 	 	 $shopdet = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast where shopid='".$id."' and is_waimai = 1");
	 	 }elseif($shopinfo['shoptype'] == 1){
	 	 	 $shopdet = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket where shopid='".$id."' ");
	 	 }
	 	 $nowhour = date('H:i:s',time());
	 	 $data['openinfo'] = $this->shopIsopen($shopinfo['is_open'],$shopinfo['starttime'],$shopdet['is_orderbefore'],$nowhour);


	 	 $data['shopinfo'] = $shopinfo;
	 	 $data['shopdet'] = $shopdet;
	 	  $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodstype where shopid='".$id."' ");
	 	  $data['goodstype'] = array();
                  $dayofnow = strtotime(date("Y-m-d"));

	 	 foreach($templist as $key=>$value){
	 	 	//$value['det']
                   $det = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goods where shopid='".$id."' and typeid =".$value['id']." ");

                     $count = count($det);
                     for ($i=0;$i<$count;$i++) {
                        $stock = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."daystock where day =".$dayofnow." and goods_id = ".$det[$i]['id']." ");
                     if ($det[$i]['id']) {
                         $number = $stock["stock"];
                     }else{
                         $number ="0";
                     }
                       $det[$i]['stock']=$number;
                     }


                   $value['det'] = $det;
                   if ($value['is_goshop']==0) {
                        $data['goodstype'][]  = $value;
                   }
	 	 


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
              $userinfo_cookie1=ICookie::get('myaddress');
               $userinfo_cookie2=ICookie::get('membername');
                $userinfo_cookie3=ICookie::get('memberpwd');
                if (!$userinfo_cookie1||!$userinfo_cookie2||!$userinfo_cookie3) {
                    $data['gust_serch'] = 0;
                } else {
                    $data['gust_serch'] = 1;
                }

	 	 Mysite::$app->setdata($data);
   }
   function shopgoodslist(){//点菜
   	 	$nowID= intval(ICookie::get('myaddress'));
	     if(empty($nowID)){
	 	     $link = IUrl::creatUrl('wxsite/index');
	       $this->message('',$link);
	     }
	 	 $id = IFilter::act(IReq::get('id'));
   	 $shopinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where id='".$id."' ");
   	 $data['shopinfo'] = $shopinfo;
   	 if(empty($shopinfo)){
	 	 	//需要进行跳转
	 	 	 $link = IUrl::creatUrl('wxsite/index');
	     $this->message('',$link);
	 	 }
	 	 $data['goodstype'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodstype where shopid='".$id."' ");
	 	 $data['goodslist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goods where shopid='".$id."' ");
   	 Mysite::$app->setdata($data);
   }
   function shopcart(){//购物车
         $id = IFilter::act(IReq::get('id'));
       if ($this->member['uid']==0) {
           $link = IUrl::creatUrl('wxsite/login&shopid='.$id);
	       $this->message('为了方便配送员联系您请先登陆后再操作',$link);
       }
   	$nowID= intval(ICookie::get('myaddress'));
	     if(empty($nowID)){
	 	     $link = IUrl::creatUrl('wxsite/index');
	       $this->message('',$link);
	     }
   	 

   	$data['scoretocost'] = Mysite::$app->config['scoretocost'];
   	//	id	card 优惠劵卡号	card_password 优惠劵密码	status 状态，0未使用，1已绑定，2已使用，3无效	creattime 制造时间	cost 优惠金额	limitcost 购物车限制金额下限	endtime 失效时间	uid 用户ID	username 用户名	usetime 使用时间	name
   	$data['juanlist'] =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan  where uid='".$this->member['uid']."' and endtime > ".time()." and status = 1   ");



                           $data['shoptime'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where  id='".$id."' ");

   	$shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where shopid = ".$id."   ");
         // $data['shopinfo'] =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$id."'    ");
                //计算时间间隔

                $morning_offer = $shopinfo['morning_offer']?$shopinfo['morning_offer']:"";
                $afternoon_offer = $shopinfo['afternoon_offer']?$shopinfo['afternoon_offer']:"";

               if($morning_offer) $morninginfo = explode("-", $morning_offer);$data['morning'] = $morninginfo;
               if(isset($afternoon_offer)) {
                 $afternooninfo = explode("-", $afternoon_offer);$data['afternoon'] = $afternooninfo;
               }else{
                $afternooninfo="";
               }
               $interval = $shopinfo['interval'];//送餐间隔时间
             // $fulldate = IFilter::act(IReq::get('fulldate'));

               // $restime = $this->timecount($morninginfo, $afternooninfo, $interval, $fulldate);//通过timecount方法计算时间段
               // $data['restime'] = $restime;


                if (!$morning_offer && !$afternoon_offer) {
                    $support_time = $shopinfo['starttime'];
                }
                //
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

   	$data['deaddress'] =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."address  where userid = ".$this->member['uid']." and `default`=1   ");

   	 $checkareaid = $nowID;
	    $dataareaids = array();
	    $areadata = array();
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
	  	     $areadata[] = $temp_check['name'];
	    }
	    $areadata = array_reverse($areadata);
	    $data['areainfo'] = join('',$areadata);
            //$data['gustinfo'] = unserialize(ICookie::get('gustAddress'));
            if (isset($_COOKIE['gustAddress'])) {
               $data['gustinfo'] = unserialize($_COOKIE['gustAddress']);
            }else{
                $data['gustinfo']="";
            }
            $now_time=time();

            if ($now_time>=strtotime($shopinfo['asoftime'].":00")) {
                $now_time = strtotime("+1 day");
            }

             $data['now_time'] = $now_time;

   	Mysite::$app->setdata($data);
   }
   function member(){//用户中心

   	 $data['juanshu'] = $this->mysql->counts("select *  from ".Mysite::$app->config['tablepre']."juan where uid='".$this->member['uid']."'  and status = 1 order by id asc limit 0,50");
        $username = intval(ICookie::get('regphone'));
        if (empty($username)) {
           $username = $this->mysql->select_one("select phone  from ".Mysite::$app->config['tablepre']."member where uid='".$this->member['uid']."'");
        }
   if(is_array($username)) {
       $username = $username['phone'];
   }
            $url_back=IFilter::act(IReq::get('shopid'));
            if (!$url_back) {
                $url_back = 190;
            }
           $data['url_back']=$url_back;
           $data['username'] = $username;

   	Mysite::$app->setdata($data);

   }
   function address(){
   	$link = IUrl::creatUrl('wxsite/index');
	  if($this->member['uid'] == 0)  $this->message('',$link);
	  $tarelist = $this->mysql->getarr("select id,phone,address,areaid1,areaid2,areaid3,contactname,`default`  from ".Mysite::$app->config['tablepre']."address where userid='".$this->member['uid']."'   order by id asc limit 0,50");
	  $arelist = array();
	  $areaid=array();
	  foreach($tarelist as $key=>$value){
	     $areaid[] = $value['areaid1'];
	     $areaid[] = $value['areaid3'];
	     $areaid[] = $value['areaid2'];
	  }
	  if(count($areaid) > 0){
	     $areaarr = $this->mysql->getarr("select id,name from ".Mysite::$app->config['tablepre']."area  where id in(".join(',',$areaid).")  order by id asc limit 0,1000");
	     foreach($areaarr as $key=>$value){
	  	    $arelist[$value['id']] = $value['name'];
	     }
	  }
	  $data['arealist'] = $tarelist;
	  $data['areaarr'] = $arelist;



	  Mysite::$app->setdata($data);
   }
   function editaddress(){
    	$link = IUrl::creatUrl('wxsite/index');
	   if($this->member['uid'] == 0)  $this->message('',$link);
   }
   /*
   function order(){
   		$link = IUrl::creatUrl('wxsite/index');
	    if($this->member['uid'] == 0)  $this->message('',$link);
   }*/

   function userorder(){
			$link = IUrl::creatUrl('wxsite/index');
	 if($this->member['uid'] == 0)  $this->message('',$link);
	  $pageinfo = new page();
	  $pageinfo->setpage(intval(IReq::get('page')),20);
	  //
		$datalist = $this->mysql->getarr("select id,shopname,allcost,addtime,status,is_ping,shoptype,is_goshop from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' order by id desc limit ".$pageinfo->startnum().", ".$pageinfo->getsize()."");
	  $temparray = array('0'=>'外卖','1'=>'超市','2'=>'其他');
	  $backdata = array();
	  foreach($datalist as $key=>$value){
				$listdet = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."orderdet where order_id='".$value['id']."'");
				$value['det'] = '';
				foreach($listdet as $k=>$v){
					$value['det'] .= $v['goodsname'].',';
				}
				$value['shoptype'] = $temparray[$value['shoptype']];
				$value['addtime'] = date('m-d H:i',$value['addtime']);
				$backdata[] =$value;
		}
		$this->success($backdata);
	}
	function ordershow(){
		 	$link = IUrl::creatUrl('wxsite/login');
	 if($this->member['uid'] == 0)  $this->message('未登陆',$link);
	  $orderid = intval(IReq::get('orderid'));
	  if(!empty($orderid)){

	     	$order = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' and id = ".$orderid."");

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

                 $order['basestatus'] = $order['status'];
                 $order['basepaytype'] = $order['paytype'];
                 $order['basepaystatus'] = $order['paystatus'];

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
	/*评价订单*/
	function commentorder(){
	  	$link = IUrl::creatUrl('wxsite/index');
	    if($this->member['uid'] == 0)  $this->message('未登陆',$link);
	    $link = IUrl::creatUrl('wxsite/order');
	    $orderid = intval(IReq::get('orderid'));
	    if(!empty($orderid)){

	     	 $order = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' and id = ".$orderid."");

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
	//积分操作
	function gift(){
	  	$link = IUrl::creatUrl('wxsite/index');
	    if($this->member['uid'] == 0)  $this->message('未登陆',$link);
	}
	//积分记录
	function giftlog(){
		$data['logstat'] = array('0'=>'待处理','1'=>'已处理，配送中','2'=>'已发货','3'=>'兑换成功','4'=>'已取消兑换');
		 Mysite::$app->setdata($data);
	}
	//兑换产品列表
	function giftlist(){
	}
	function juan(){
		$wjuan = array('shuliang'=>0,'list'=>array());
		$ujuan = array('shuliang'=>0,'list'=>array());
		$ojuan = array('shuliang'=>0,'list'=>array());
		$nowtime = time();
		$wjuan['shuliang'] =  $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."juan    where uid = ".$this->member['uid']." and endtime > ".$nowtime." and status = 1 ");
		$wjuan['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan where uid = ".$this->member['uid']." and endtime > ".$nowtime." and status = 1 ");
		$ujuan['shuliang'] =  $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."juan    where uid = ".$this->member['uid']."  and status = 2 ");
		$ujuan['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan where uid = ".$this->member['uid']."   and status = 2 ");

		$ojuan['shuliang'] =  $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."juan    where uid = ".$this->member['uid']." and endtime < ".$nowtime." and (status = 1 or status =3)");
		$ojuan['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan where uid = ".$this->member['uid']." and endtime < ".$nowtime." and (status = 1 or status =3)  ");

		$data['wjuan'] = $wjuan;
		$data['ujuan'] = $ujuan;
		$data['ojuan'] = $ojuan;
		Mysite::$app->setdata($data);
	}
	function cart(){
     $Cart = new smCart;
     //
      $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
     $carinfo = $Cart->getMyCart();

     $shopid = intval(IReq::get('shopid'));
     $day = strtotime(IReq::get('day'))? strtotime(IReq::get('day')) : 0;
     $backdata = array();
     if($shopid  > 0){
        if(isset($carinfo['list'][$shopid]['data'])){
        	      $backdata['list'] = $carinfo['list'][$shopid]['data'];
        	      $backdata['sumcount'] =$carinfo['list'][$shopid]['count'];
        	    //  $backdata['sum'] =$carinfo['list'][$shopid]['sum'];
                      $backdata['sum'] = number_format($carinfo['list'][$shopid]['sum'],2,'.','');
        	      $backdata['bagcost'] =$carinfo['list'][$shopid]['bagcost'];
        	      //获取促销
        	        $cxclass = new sellrule();
        	      if($carinfo['list'][$shopid]['shopinfo']['shoptype'] ==1){
	   	                    $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$shopid."'    ");
	               }else{
	                    $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$shopid."'    ");
	              }


                $cxclass->setdata($shopid,$backdata['sum'],$carinfo['list'][$shopid]['shopinfo']['shoptype'], $day);
        	      $cxinfo = $cxclass->getdata();

        	      $backdata['surecost'] = $cxinfo['surecost'];
        	      $backdata['downcost'] = $cxinfo['downcost'];
        	      $backdata['gzdata'] = isset($cxinfo['gzdata'])?$cxinfo['gzdata']:array();
                $tempinfo =   $this->pscost($shopcheckinfo,$backdata['sumcount']);
                $backdata['pstype'] = $tempinfo['pstype'];
                $backdata['pscost'] = $cxinfo['nops'] == true?0:$tempinfo['pscost'];

                $sendset = unserialize($shopcheckinfo['sendset']);
                      if ($sendset['pstype'] == 6) {
                          $full_pay = $sendset['psvalue1'];
                          $need_pay = $sendset['psvalue2'];
                          if ($backdata['sum'] < $full_pay = $sendset['psvalue2']) $backdata['pscost'] = $need_pay;
                          else $backdata['pscost'] = 0;
                      }

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
	function makeorder(){
		 $info['shopid'] = intval(IReq::get('shopid'));//店铺ID
		 $info['remark'] = IFilter::act(IReq::get('remark'));//备注
		 $info['paytype'] = IFilter::act(IReq::get('paytype'));//支付方式


		 $info['dikou'] =  intval(IReq::get('dikou'));//抵扣金额
	 	 $info['username'] = IFilter::act(IReq::get('username'));
		 $info['mobile'] = IFilter::act(IReq::get('mobile'));
		 $info['addressdet'] = IFilter::act(IReq::get('addressdet'));
		 $info['senddate'] = IFilter::act(IReq::get('senddate'));
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
		 $checkps = 	 $this->pscost($shopinfo,$carinfo['list'][$info['shopid']]['count']);
		 if($checkps['canps'] != 1) $this->message('该店铺不在配送范围内');
		 $info['cattype'] = 0;//
		 if(empty($info['username'])) 		  $this->message('联系人不能为空');
	  	if(!IValidate::suremobi($info['mobile']))   $this->message('请输入正确的手机号');
		 if(empty($info['addressdet'])) $this->message('详细地址为空');

	   $info['userid'] = !isset($this->member['score'])?'0':$this->member['uid'];
	    if(Mysite::$app->config['allowedguestbuy'] != 1){
	     if($info['userid']==0) $this->message('禁止游客下单');
	   }

       //判断库存
     $senddate = $info['senddate'];
     $minit = $info['minit'];
     $nowpost = strtotime($senddate.' '.$minit);

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
	   $nowID= intval(ICookie::get('myaddress'));
	  if(empty($nowID)) $this->message('未选择配送区域');
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
		 //$data['shopcost'] = $carinfo['list'][$info['shopid']]['sum'];
                 $data['shopcost'] = number_format($carinfo['list'][$info['shopid']]['sum'],2,'.','');
		 $data['shopps'] = $checkps['pscost'];
		 $data['bagcost'] =  $carinfo['list'][$info['shopid']]['bagcost'];
		 //支付方式检测
		 $data['paytype'] = $info["paytype"];

		 $paytype = $info['paytype'];
		 if($paytype != 'outpay'){
			 if($paytype == 'open_acout'){
		/*     if(Mysite::$app->config['open_acout'] != 1 || $userid == 0){
		  	    $data['paytype'] = 'outpay';
		     }*/
	     }else{
	    	 $paylist = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."paylist where loginname='".$paytype."'  order by id desc  ");
	    //	 if($paylist < 1){
	    //		 $data['paytype'] = 'outpay';
	    //	 }
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
		    $sellrule->setdata($info['shopid'],$data['shopcost'],$shopinfo['shoptype'], $day);
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
		$data['pstype'] = $checkps['pstype'] ;
		$data['shoptype'] = $shopinfo['shoptype'];
		//检测店铺

	  	    $settime = time() - (600);
	  	    if($settime > $nowpost)  $this->message('提交配送时间和服务器时间相差超过10分钟下单失败');
	  	    $temp = strtotime($minit.':00');
	  	    $is_orderbefore = $shopinfo['is_orderbefore'] == 0?0:$shopinfo['befortime'];
	  	    $tempinfo = $this->checkshopopentime($is_orderbefore,$nowpost,$shopinfo['starttime']);
	  	    //if(!$tempinfo) $this->message('配送时间不在有效配送时间范围');
	  	    if($shopinfo['is_open'] != 1) $this->message('店铺暂停营业');
	  	    if($shopinfo['limitcost'] >$allcost ) $this->message('商品总价低于最小起送价'.$shopinfo['limitcost']);
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
	 	  $data['is_make'] = Mysite::$app->config['allowed_is_make'] == 1?0:1;
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
      //$day = strtotime(date('Y-m-d',$nowpost));
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
        //减少库存pinkky
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
	  	    $datadet['shopid'] = $checkshopid;
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
	        $addata['userid'] = $this->member['uid'];
	        $addata['username'] = $this->member['username'];
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
   function subshow(){
	  $orderid = intval(IReq::get('orderid'));
		$userid = empty($this->member['uid'])?0:$this->member['uid'];
		$orderid = intval(IReq::get('orderid'));
		if(empty($orderid)) $this->message('订单获取失败');
		if($userid == 0){
			$neworderid = ICookie::get('orderid');
			if($orderid != $neworderid) $this->message('订单无查看权限');
		}
	  if($orderid < 1){
	  	 $this->message('订单获取失败');
	  }
		$order = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."' and id = ".$orderid."");
		$order['ps'] = $order['shopps'];
		// 超市商品总价	 超市配送配送	shopcost 店铺商品总价	shopps 店铺配送费	pstype 配送方式 0：平台1：个人	bagc
	  if(empty($order)){
	  	 $this->message('订单获取失败');
	  }
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
		$paytypelist = array('outpay'=>'货到支付','open_acout'=>'账号余额支付','alipay'=>'支付宝支付','weixin'=>'微信支付');
		$paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
		if(is_array($paylist)){
		  foreach($paylist as $key=>$value){
			    $paytypelist[$value['loginname']] = $value['logindesc'];
		  }
	  }
		$paytypearr = $paytypelist;
		$order['surestatus'] = $order['status'];
		$order['status'] = $buyerstatus[$order['status']];
                $paytype = $order['paytype'];
		$order['paytype'] = $paytypearr[$order['paytype']];

		$order['paystatus'] = $order['paystatus']==1?'已支付':'未支付';
		$order['addtime'] = date('Y-m-d H:i:s',$order['addtime']);
		$order['posttime'] = date('Y-m-d H:i:s',$order['posttime']);
		$data['order'] = $order;
	    $data['orderdet'] = $orderdet;



        if ($paytype=='outpay') {
           Mysite::$app->setdata($data);
        }else{
            $link = IUrl::creatUrl('wxsite/gotopay&orderid='.$orderid);
            $this->message('订单生成成功',$link);
        }
        //fastcgi_finish_request();

	}

    function gotopay(){

		$orderid = intval(IReq::get('orderid'));

		if(empty($orderid)) $this->error('订单获取失败');
		$userid = empty($this->member['uid'])?0:$this->member['uid'];

		if($userid == 0){
			$neworderid = ICookie::get('orderid');
			if($orderid != $neworderid) $this->error('订单无查看权限');
		}
		$orderinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id=".$orderid."  ");  //获取主单

		if(empty($orderinfo)) $this->error('订单数据获取失败');
		if($userid > 0){
			if($orderinfo['buyeruid'] !=  $userid) $this->error('无查看权限');
		}
		if($orderinfo['paytype'] == 'outpay'){
		    $this->message('此订单是货到支付订单不可操作');
		}
		if($orderinfo['status']  > 2){
			$this->message('此订单已发货或者其他状态不可操作');
		}
		$paytypelist = array('open_acout');
		$paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
		if(is_array($paylist)){
		  foreach($paylist as $key=>$value){
			   $paytypelist[] =$value['loginname'];
		  }
	  }

		if(!in_array($orderinfo['paytype'],$paytypelist)){
		  $this->message('未定义的支付方式');
		}
		if($orderinfo['paystatus'] == 1){
		 $this->message('此订单已支付');
		}
		$paytype = $orderinfo['paytype'];
        if ($orderinfo['paytype'] == "alipay") {
            $paytype = "alipay/html5";
        }
        /*if ($orderinfo['paytype'] == "weixin") {
             $paytype = "weixin/wxsite";
        }*/
		$paydir = hopedir.'/plug/pay/'.$paytype;
	 	if(!file_exists($paydir.'/pay.php'))
    {
      	$this->message('支付方式文件不存在');
    }
    $dopaydata = array('type'=>'order','upid'=>$orderid,'cost'=>$orderinfo['allcost']);//支付数据
    if ($orderinfo['paytype'] == "weixin") {

    	include_once($paydir.'/wxsite/pay.php');
        exit;
    } else {
    	include_once($paydir.'/pay.php');
        exit;
    }
    //调用方式  直接调用支付方式
	}

	function shop(){
			$link = IUrl::creatUrl('wxsite/index');
	    if($this->member['uid'] == 0)  $this->message('未登陆',$link);
	    	$nowdata = date('Y-m-d',time());
	  $mintime = strtotime($nowdata);
	  $maxtime = strtotime($nowdata.' 23:59:59');
	  $where = ' and  posttime > '.$mintime.' and posttime < '.$maxtime;//发货时间

	   $tjlist = $this->mysql->getarr("select count(id) as shuliang,status from ".Mysite::$app->config['tablepre']."order where shopuid=".$this->member['uid']." ".$where."  group by status order by id asc limit 0,50");
	  $data['tj'] = array();
	  foreach($tjlist as $key=>$value){
	    $data['tj'][$value['status']] = $value['shuliang'];
	  }
	   Mysite::$app->setdata($data);
	}
	function shopordert(){
	   //shopuid

	}
	function shopordertoday(){
		$nowdata = date('Y-m-d',time());
	  $mintime = strtotime($nowdata);
	  $maxtime = strtotime($nowdata.' 23:59:59');
	  $where = '  posttime > '.$mintime.' and posttime < '.$maxtime;//发货时间
	  $status  = intval(IFilter::act(IReq::get('status')));
	  $status  =  in_array($status,array(1,2,3))? $status:1;
	  $where .=' and status ='.$status;
	  $where .=' and shopuid ='.$this->member['uid'];
	  $buyerstatus= array(
		'0'=>'等待处理',
		'1'=>'等待发货',
		'2'=>'已发货，待完成',
		'3'=>'订单完成',
		'4'=>'订单已取消',
		'5'=>'订单已取消'
		);
		$data['buyerstatus'] = $buyerstatus;
		$data['where'] = $where;
		$arraystatus = array(
		'1'=>'今日待发货订单',
		'2'=>'今日已发货订单',
		'3'=>'今日完成订单'
		);
		$data['orderbt'] = $arraystatus[$status];
	  Mysite::$app->setdata($data);
	}
	function shopshoworder(){
		$link = IUrl::creatUrl('wxsite/index');
	 if($this->member['uid'] == 0)  $this->message('未登陆',$link);
	  $orderid = intval(IReq::get('id'));
	  if(!empty($orderid)){

	     	$order = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where shopuid='".$this->member['uid']."' and id = ".$orderid."");

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
		'1'=>'等待发货',
		'2'=>'已发货，待完成',
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
	function shopcontrol(){
		$this->checkmemberlogin();
		$controlname =trim(IFilter::act(IReq::get('controlname')));
		$orderid = intval(IReq::get('orderid'));
		$ordertempinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id = ".$orderid."");
		if($ordertempinfo['shopuid'] != $this->member['uid']) $this->message('您不能操作此订单');
		$shopid = $ordertempinfo['shopid'];
		$shopinfo = $this->mysql->select_one("select uid from ".Mysite::$app->config['tablepre']."shop where id = ".$shopid."");
		switch($controlname)
		{
			case 'unorder':

	     $reason = trim(IFilter::act(IReq::get('reason')));
	     if(empty($reason)) $this->message('关闭理由不能为空');
	   	 $ordercontrol = new ordercontrol($orderid);
	   	 if($ordercontrol->sellerunorder($shopinfo['uid'],$reason))
	   	 {
				 $this->success('操作成功');
	     }else{
				  $this->message($ordercontrol->Error());
		   }
			break;
			case 'sendorder':
		  $ordercontrol = new ordercontrol($orderid);
		  if($ordercontrol->sendorder($shopinfo['uid']))
		  {
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
			case 'domake':
			if($ordertempinfo['status'] != 1){
			  $this->message('订单状态不可操作是否制作');
			}
			if(!empty($ordertempinfo['is_make'])){
				 $this->message('订单已设置过是否制作，如要取消 请联系网站客服');
			}
			$newdata['is_make'] = 1;
			$this->mysql->update(Mysite::$app->config['tablepre'].'order',$newdata,"id='".$orderid."'");
			$this->success('操作成功');
			break;
			case 'unmake':
			if($ordertempinfo['status'] != 1){
			  $this->message('订单状态不可操作是否制作');
			}
			if(!empty($ordertempinfo['is_make'])){
				 $this->message('订单已设置过是否制作，如要取消 请联系网站客服');
			}
			$newdata['is_make'] = 2;
			$this->mysql->update(Mysite::$app->config['tablepre'].'order',$newdata,"id='".$orderid."'");
			$this->success('操作成功');
			break;
			default:
			$this->message('未定义的操作');
			break;
		}



	}
        function saveGustAddress () {
           $username = trim(IFilter::act(IReq::get('username')));
           $mobile = intval(IFilter::act(IReq::get('mobile')));
           $addressdet = trim(IFilter::act(IReq::get('addressdet')));

           if (!IValidate::suremobi($mobile)) {
                echo json_encode(array('success'=>'error','msg'=>'请输入正确的手机号'));exit;

           }
           $value = serialize(array("username"=>$username,"mobile"=>$mobile,"addressdet"=>$addressdet));
           $res = setcookie("gustAddress", $value, time()+31536000);

           if (!empty($this->member['uid'])) {//有UID更新 没有UID就是游客
               
              $res = $this->mysql->update(Mysite::$app->config['tablepre'].'member',array('address'=>$addressdet),"uid='".$this->member['uid']."'");
              
           }else {
              
                   $regest = $this->regesterTem($email="",$mobile,$group="5",$userlogo='',$addressdet,$cost=0,$score=0);
                   
           }

          
            if ($res) {
                echo json_encode(array('success'=>'yes','msg'=>'保存成功'));exit;
            }else {
                echo json_encode(array('success'=>'no','msg'=>'保存失败'));exit;
            }
               
           

        }
        function pagedetail () {
                            $cookmalist = ICookie::get('cookmalist');
	    	            $cooklnglist = ICookie::get('cooklnglist');
	    	            $cooklatlist = ICookie::get('cooklatlist');
                            if (!$cookmalist||!$cooklnglist||!$cooklatlist) {
                       $checkinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id=27");
	 	            ICookie::set('lng',$checkinfo['lng'],2592000);
	                    ICookie::set('lat',$checkinfo['lat'],2592000);
	    	            ICookie::set('mapname',$checkinfo['name'],2592000);
	    	            ICookie::set('myaddress',$checkinfo['id'],2592000);

                            }





            $goods_id = trim(IFilter::act(IReq::get('goods_id')));

            if (!$goods_id) {
                     $this->message('操作失败');
                     $link = IUrl::creatUrl('wxsite&action=index');
                     header("Location:".$link);
                     exit;
                }
            $date_now = strtotime(date("Y-m-d"));
            $detail = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goods as a left join ".Mysite::$app->config['tablepre']."shop as b on a.shopid=b.id  where a.id='".$goods_id."'  ");
           // $stock = $this->mysql->getarr("select stock from ".Mysite::$app->config['tablepre']."goods as a left join ".Mysite::$app->config['tablepre']."shop as b on a.shopid=b.id  where a.id='".$goods_id."'  ");

             $data['detail'] = $detail[0];

             $data['goods_id'] = $goods_id;
             $shopid = $detail[0]['id'];
             $shoplimitcost = $this->mysql->getarr("select limitcost from ".Mysite::$app->config['tablepre']."shopfast where shopid='".$shopid."' ");
            $data["limitcost"] = $shoplimitcost[0]['limitcost'];
               Mysite::$app->setdata($data);

        }
        	function order(){
	    $link = IUrl::creatUrl('wxsite/login');
	    if($this->member['uid'] == 0)  $this->message('',$link);
	}
        function login(){
            $shopid = IFilter::act(IReq::get('shopid'));
            if (!$shopid) {
                $shopid = 190;
            }
		  $link = IUrl::creatUrl('wxsite/member&shopid='.$shopid);
                  $data['shopid'] = $shopid;
                  Mysite::$app->setdata($data);
	    if($this->member['uid'] > 0)  $this->message('',$link);
	}
        function loginout(){
             $shopid = IFilter::act(IReq::get('shopid'));
		  $this->memberCls->loginout();
                  if ($shopid) {
                      $link = IUrl::creatUrl('wxsite/shopshow&id='.$shopid);
                  }else{
                       $link = IUrl::creatUrl('wxsite/index');
                  }

      $this->refunction('',$link);
	}
        function modifypwd(){
			$link = IUrl::creatUrl('wxsite/login');
	  if($this->member['uid'] == 0)  $this->message('',$link);
	}
        function reg(){
            $link = IUrl::creatUrl('wxsite/member');
	    if($this->member['uid'] > 0)  $this->message('',$link);
	}
        function regesterTem($email="",$mobile,$group="5",$userlogo='',$addressdet,$cost=0,$score=0) {

    if(!empty($mobile)){

     	$userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where phone='".$mobile."' ");
        if(!empty($userinfo))
      {
            	return false;
      }

    }
     $password='xiaozu'.rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
     $arr['username'] = $mobile;
     $arr['phone'] = $mobile;
     $arr['address'] = $addressdet;
     $arr['password'] = md5($password);
     $arr['email'] = $email;
     $arr['creattime'] = time();
     $arr['score']  = $score == 0?Mysite::$app->config['regesterscore']:$score;
     $arr['logintime'] = time();
     $arr['logo'] = $userlogo;
     $arr['loginip'] = IClient::getIp();
     $arr['group'] = $group;
     $arr['cost'] = $cost;
     $arr['parent_id'] = intval(ICookie::get('logincode'));
     $this->mysql->insert(Mysite::$app->config['tablepre'].'member',$arr);
     $this->uid = $this->mysql->insertid();
     if($arr['score'] > 0){
        $this->addlog($this->uid,1,1,$arr['score'],'注册送积分','注册送积分'.$arr['score'],$arr['score']);
     }

     $logintype = ICookie::get('adlogintype');
	 	 $token = ICookie::get('adtoken');
	 	 $openid = ICookie::get('adopenid');
	 	 if(!empty($logintype)){
	 	 	   $apiinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."otherlogin where loginname='".$logintype."'  ");
	 	 	   if(!empty($apiinfo)){
	 	 	   	//更新
	 	 	   	  $tempuid = $this->uid;
	 	 	   	  $this->mysql->update(Mysite::$app->config['tablepre'].'oauth',array('uid'=>$tempuid),"openid='".$openid."' and type = '".$logintype."'");
	          ICookie::set('logintype',$logintype,31536000);
	 	 	   }
	 	 }
	 	 if(Mysite::$app->config['regester_juan'] ==1){
	 	   //注册送优惠券
	 	   $nowtime = time();
	 	   $endtime = $nowtime+Mysite::$app->config['regester_juanday']*24*60*60;
	 	   $juandata['card'] = $nowtime.rand(100,999);
       $juandata['card_password'] =  substr(md5($juandata['card']),0,5);
       $juandata['status'] = 1;// 状态，0未使用，1已绑定，2已使用，3无效
       $juandata['creattime'] = $nowtime;// 制造时间
       $juandata['cost'] = Mysite::$app->config['regester_juancost'];// 优惠金额
       $juandata['limitcost'] =  Mysite::$app->config['regester_juanlimit'];// 购物车限制金额下限
       $juandata['endtime'] = $endtime;// 失效时间
       $juandata['uid'] = $this->uid;// 用户ID
       $juandata['username'] = $arr['username'];// 用户名
       $juandata['name'] = '注册账号赠送优惠券';//  优惠券名称
       $res =  $this->mysql->insert(Mysite::$app->config['tablepre'].'juan',$juandata);



	 	 }

	ICookie::set('memberpwd',$password,86400*365);
        ICookie::set('membername',$mobile,86400*365);
        ICookie::set('uid',$this->uid,86400*365);


  	return true;

        }
        	function addlog($userid,$inputype=1,$addtype=1,$result=0,$logtitle='',$logcontent='',$allcost=0){
		if(empty($userid)){
		  $this->error('用户ID不能为空');
		  return false;
		}
		$data['userid'] =  $userid;
		$data['type'] = $inputype;
		$data['addtype'] = $addtype;
		$data['result'] = $result;
		$data['addtime'] = time();
		$data['title'] = $logtitle;
		$data['content'] = $logcontent;
		$data['acount'] = $allcost;
		$this->mysql->insert(Mysite::$app->config['tablepre'].'memberlog',$data);
		return true;
		//id userid   type                result     addtime
	}
        function forgot(){
		  $link = IUrl::creatUrl('wxsite/member');
	    if($this->member['uid'] > 0)  $this->message('',$link);
	}

        function timecount ($morninginfo, $afternooninfo=null, $interval, $fulldate="") {
            $first1 = $fulldate." ".$morninginfo[0];
            $first2 = $fulldate." ".$morninginfo[1];


            $first_count = floor((strtotime($first2)-strtotime($first1))/($interval*60));

            $first_str = strtotime($first1);
            if ($afternooninfo) {

            }else{
                if(strtotime($first2) - time()<=1800) {
                    $first_str = strtotime($first1)+86400;
                }
            }


                //echo  strtotime($first2) - time();exit;
            //获取上午时间
            for ($i=0; $i<=$first_count; $i++) {

               if ($first_str - time() >= 1800) {
                   $arr[] = date("H:i", $first_str);

               }
               $first_str += $interval*60;
           }

           //获取下午时间
            if ($afternooninfo) {
             $second1 = $afternooninfo[0];
             $second2 = $afternooninfo[1];
             $second_count = floor((strtotime($second2)-strtotime($second1))/($interval*60));
             $second_str = strtotime($second1);
             for ($i=0; $i<=$second_count; $i++) {
               if ($second_str - time() >= 1800) {
                   $arr[] = date("H:i", $second_str);
               }
               //$arr[] = date("H:i", $second_str);
               $second_str += $interval*60;
                 }
            }
             return $arr;

        }

        function shopcarttime () {
            $fulldate = IFilter::act(IReq::get('fulldate'));
            $shopid = IFilter::act(IReq::get('shopid'));
            $choose = IFilter::act(IReq::get('choose'));
            $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where shopid = ".$shopid."   ");
         // $data['shopinfo'] =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$id."'    ");
                //计算时间间隔

                $morning_offer = $shopinfo['morning_offer'];
                $afternoon_offer = $shopinfo['afternoon_offer'];
                $interval = $shopinfo['interval'];
             if ($choose==1) {
                  $morning_offer = $shopinfo['morning_inshop'];
                $afternoon_offer = $shopinfo['afternoon_inshop'];
                  $interval = $shopinfo['interval_inshop'];

              }
               if($morning_offer) $morninginfo = explode("-", $morning_offer);$data['morning'] = $morninginfo;
               if(!empty($afternoon_offer)){
                   $afternooninfo = explode("-", $afternoon_offer);$data['afternoon'] = $afternooninfo;

               } else {

                   $afternooninfo =null;
               }

               //送餐间隔时间

                $restime = $this->timecount($morninginfo, $afternooninfo, $interval, $fulldate);

                echo json_encode($restime);exit;
        }

        //
        public function plateshow( )
    {
        $shop = trim( IFilter::act( IReq::get( "id" ) ) );
        $shop = 190; //临时ID


        $where = 0 < intval( $shop ) ? " where a.shopid = ".$shop : "where shortname='".$shop."'";
        $shopinfo = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where." and is_goshop = 1  " );
        if ( empty( $shopinfo ) )
        {
            $link = IUrl::creaturl( "wxsite/index" );
            $this->message( "获取店铺信息失败", $link );
        }
        if ( $shopinfo['endtime'] < time( ) )
        {
            $link = IUrl::creaturl( "site/index" );
            $this->message( "店铺已关门", $link );
        }
        $nowhour = date( "H:i:s", time( ) );
        $nowhour = strtotime( $nowhour );

        $data['shopinfo'] = $shopinfo;

        $data['shopopeninfo'] = $this->shopIsopen( $shopinfo['is_open'], $shopinfo['starttime'], $shopinfo['is_orderbefore_inshop'], $nowhour );
        $data['com_goods'] = $this->mysql->getarr( "select *  from ".Mysite::$app->config['tablepre']."goods where shopid = ".$shopinfo['id']." and is_com = 1   " );
        $goodstype = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."goodstype where shopid = ".$shopinfo['id']." and cattype = ".$shopinfo['shoptype']." order by orderid asc" );
        $data['goodstype'] = array( );
        $tempids = array( );
        foreach ( $goodstype as $key => $value )
        {
            $value['det'] = $this->mysql->getarr( "select *  from ".Mysite::$app->config['tablepre']."goods where typeid = ".$value['id']." and shopid=".$shopinfo['id']." and is_goshop=1" );
            $tempids[] = $value['id'];

            if ($value['is_goshop']=="1") {
                $data['goodstype'][] = $value;
            }


        }

        $data['mainattr'] = array( );
        $templist = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = ".$shopinfo['shoptype']." and parent_id = 0 and is_main =1  order by orderid asc limit 0,1000" );
        foreach ( $templist as $key => $value )
        {
            $value['det'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20" );
            $data['mainattr'][] = $value;
        }
        $data['shopattr'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shopattr  where  cattype = ".$shopinfo['shoptype']." and shopid = '".$shopinfo['id']."'  order by firstattr asc limit 0,1000" );
        $data['goodsattr'] = array( );
        $goodsattr = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."goodssign  where  type = 'goods'  order by id asc limit 0,1000" );
        foreach ( $goodsattr as $key => $value )
        {
            $data['goodsattr'][$value['id']] = $value['imgurl'];
        }
        $data['psinfo'] = $this->pscost( $shopinfo, 1 );
        $sellrule = new sellrule( );
        $sellrule->setdata( $shopinfo['shopid'], 1000, $shopinfo['shoptype'] );
        $ruleinfo = $sellrule->getdata( );
        $data['ruledata'] = array( );
        if (isset($ruleinfo['cxids']) && $ruleinfo['cxids'])
        {
            $data['ruledata'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."rule  where  id in(".$ruleinfo['cxids'].")  order by id asc limit 0,1000" );
        }
        $cximglist = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."goodssign  where  type = 'cx'  order by id asc limit 0,1000" );
        $data['ruleimg'] = array( );
        foreach ( $cximglist as $key => $value )
        {
            $data['ruleimg'][$value['id']] = $value['imgurl'];
        }
        $data['cxlist'] = $ruleinfo;
        $data['scoretocost'] = Mysite::$app->config['scoretocost'];
        $data['collect'] = array( );
        if ( !empty( $this->memberinfo ) )
        {
            $data['collect'] = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."collect where collectid=".$shopinfo['id']." and collecttype = 0 and uid=".$this->member['uid']." " );
        }
        $bzinfo = Mysite::$app->config['orderbz'];
        $data['bzlist'] = array( );
        if ( !empty( $bzinfo ) )
        {
            $data['bzlist'] = unserialize( $bzinfo );
        }
        $addresslist = array( );
        if ( 0 < $this->member['uid'] )
        {
            $addresslist = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."address where userid=".$this->member['uid']."  " );
        }
        $data['addresslist'] = $addresslist;
        $data['paylist'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."paylist   order by id desc  " );
        $data['juanlist'] = array( );
        if ( !empty( $this->member['uid'] ) )
        {
            $data['juanlist'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."juan  where uid ='".$this->member['uid']."'  and status = 1 and endtime > ".time( )."  order by id desc limit 0,20" );
        }
        Mysite::$app->setdata( $data );
    }

    public function plateorder( )
    {
        $mobie_code = IFilter::act(IReq::get('mobile_code'));
        $mobie_number = IFilter::act( IReq::get( "mobile" ) );
        if (!$mobie_code) $this->message ("验证码不能为空");
        $checkcodenum = $this->checkcodenum($mobie_code,$mobie_number);
        $personcount = IFilter::act( IReq::get( "personcount" ) );
        //$subtype = intval( IReq::get( "subtype" ) );
        $subtype = 2;//1订桌 2点餐
        $info['shopid'] = intval( IReq::get( "shopid" ) );
        $info['remark'] = IFilter::act( IReq::get( "content" ) );
        $info['paytype'] = IFilter::act( IReq::get( "paytype" ) );
        $info['username'] = IFilter::act( IReq::get( "contactname" ) );
        $info['mobile'] = IFilter::act( IReq::get( "mobile" ) );
        $info['addressdet'] = IFilter::act( IReq::get( "addressdet" ) );
        $info['senddate'] = IFilter::act( IReq::get( "senddate" ) );
        $info['minit'] = IFilter::act( IReq::get( "minit" ) );
        $info['juanid'] = intval( IReq::get( "juanid" ) );
        $info['ordertype'] = 1;
        $peopleNum = IFilter::act( IReq::get( "personcount" ) );
        $info['othercontent'] = empty( $peopleNum ) ? "" : serialize( array(
            "人数" => $peopleNum
        ) );
        $info['userid'] = !isset( $this->member['score'] ) ? "0" : $this->member['uid'];
        if ( Mysite::$app->config['allowedguestbuy'] != 1 && $info['userid'] == 0 )
        {
            $this->message( "member_nologin" );
        }
        $shopinfo = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$info['shopid']."'    " );       if ($personcount>$shopinfo["personcount"]) {
            $this->message("超过最大可预订人数");
        }
        if ( empty( $shopinfo ) )
        {
            $this->message( "店铺不存在" );
        }
        $checksend = Mysite::$app->config['ordercheckphone'];
        if ( $checksend == 1 && empty( $this->member['uid'] ) )
        {
            $checkphone = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."mobile where phone ='".$info['mobile']."'   order by addtime desc limit 0,50" );
            if ( empty( $checkphone ) )
            {
                $this->message( "member_emailyan" );
            }
            if ( empty( $checkphone['is_send'] ) )
            {
                $mycode = IFilter::act( IReq::get( "phonecode" ) );
                if ( $mycode == $checkphone['code'] )
                {
                    $this->mysql->update( Mysite::$app->config['tablepre']."mobile", array( "is_send" => 1 ), "phone='".$info['mobile']."'" );
                }
                else
                {
                    $this->message( "member_emailyan" );
                }
            }
        }
        if ( empty( $info['username'] ) )
        {
            $this->message( "emptycontact" );
        }
        if ( !IValidate::suremobi( $info['mobile'] ) )
        {
            $this->message( "errphone" );
        }
        $info['ipaddress'] = "";
        $ip_l = new iplocation( );
        $ipaddress = $ip_l->getaddress( $ip_l->getIP( ) );
        if ( isset( $ipaddress['area1'] ) )
        {
            $info['ipaddress'] = $ipaddress['ip'].mb_convert_encoding( $ipaddress['area1'], "UTF-8", "GB2312" );
        }
        $info['cattype'] = 0;
        $senddate = $info['senddate'];
        $minit = $info['minit'];
        $nowpost = strtotime( $senddate." ".$minit.":00" );
        $settime = time( ) - 600;
        if ( $nowpost < $settime )
        {
            $this->message( "提交配送时间和服务器时间相差超过10分钟下单失败" );
        }
        $temp = strtotime( $minit.":00" );
        $is_orderbefore = $shopinfo['befortime_inshop'] == 0 ? 0 : $shopinfo['befortime_inshop'];
        $tempinfo = $this->shopopentime( $is_orderbefore, $nowpost, $shopinfo['starttime'] );
        if ( !$tempinfo )
        {
            $this->message( "配送时间不在有效配送时间范围" );
        }
        if ( $shopinfo['is_open'] != 1 )
        {
            $this->message( "店铺暂停营业" );
        }

      //  $info['paytype'] = $info['paytype'] == 1 ? 1 : 0;
        $info['areaids'] = "";
        $info['shopinfo'] = $shopinfo;
        if ( $subtype == 1 )
        {
            $info['allcost'] = 0;
            $info['bagcost'] = 0;
            $info['allcount'] = 0;
            $info['goodslist'] = array( );
        }
        else
        {
            if ( empty( $info['shopid'] ) )
            {
                $this->message( "shop_noexit" );
            }
            $Cart = new smCart( );
            $Cart->cartName = 'platesmcart';

            $carinfo = $Cart->getMyCart( );
            if ( !isset( $carinfo['list'][$info['shopid']]['data'] ) )
            {
                $this->message( "shop_emptycart" );
            }
            $info['allcost'] = $carinfo['list'][$info['shopid']]['sum'];
            $info['goodslist'] = $carinfo['list'][$info['shopid']]['data'];
            $info['bagcost'] = 0;
            $info['allcount'] = 0;
        }

        $info['shopps'] = 0;
        $info['pstype'] = 0;
        $info['cattype'] = 1;
        $info['is_goshop'] = 1;
        $info['subtype'] = $subtype;
        $info['sendtime'] = $nowpost;

        $orderclass = new orderclass($this->mysql);

       // error_log(print_r('第一步/n',1),3,__FILE__.'.log');
        $orderclass->orderyuding( $info );//明天排查。

        $orderid = $orderclass->getorder( );
        if ( $info['userid'] == 0 )
        {
            ICookie::set( "orderid", $orderid, 86400 );
        }
        if ( $subtype == 2 )
        {
            $Cart->delshop( $info['shopid'] );
        }

        $this->success( $orderid );
        exit( );
    }

    public static function shopopentime( $is_orderbefore, $posttime, $starttime )
    {
        $maxnowdaytime = strtotime( date( "Y-m-d", time( ) ) );
        $daynottime = 86399;
        $findpostime = FALSE;
        $i = 0;
        for ( ; $i <= $is_orderbefore; ++$i )
        {
            if ( !$findpostime )
            {
                $miniday = $maxnowdaytime + $daynottime * $i;
                $maxday = $miniday + $daynottime;
                $tempinfo = explode( "|", $starttime );
                foreach ( $tempinfo as $key => $value )
                {
                    if ( empty( $value ) )
                    {
                        continue;
                    }
                    $temp2 = explode( "-", $value );
                    if ( !( 1 < count( $temp2 ) ) )
                    {
                        continue;
                    }
                    $minbijiaotime = date( "Y-m-d", $miniday );
                    $minbijiaotime = strtotime( $minbijiaotime." ".$temp2[0].":00" );
                    $maxbijiaotime = date( "Y-m-d", $maxday );
                    $maxbijiaotime = strtotime( $maxbijiaotime." ".$temp2[1].":00" );
                    if ( !( $minbijiaotime < $posttime ) && !( $posttime < $maxbijiaotime ) )
                    {
                        continue;
                    }
                    $findpostime = TRUE;
                    break;
                }
            }
        }
        return $findpostime;
    }
     public function smallcatding( )
    {
        $shopid = intval( IReq::get( "shopid" ) );
        $Cart = new smCart();
        $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
        $carinfo = $Cart->getMyCart();
        $data['cartinfo'] = $carinfo;
        $cxclass = new sellrule( );
        $showtype = trim( IReq::get( "showtype" ) );
        $cxtemp = array( );
        foreach ( $carinfo['list'] as $key => $value )
        {
            if ( $value['shopinfo']['shoptype'] == 1 )
            {
                $shopcheckinfo = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    " );
            }
            else
            {
                $shopcheckinfo = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    " );
            }
            if ( $key == $shopid )
            {
                $cxclass->setdata( $key, $value['sum'], $value['shopinfo']['shoptype'] );
                $cxinfo = $cxclass->getdata( );
                $cxtemp = $cxinfo;
            }
        }
        $data['cxdata'] = $cxtemp;
        $data['shopid'] = $shopid;
        Mysite::$app->setdata( $data );
    }

    function addcart()
	{
                $shopid = intval(IReq::get('shopid'));
		$goods_id = intval(IReq::get('goods_id'));
		$num = intval(IReq::get('num'));
		if($shopid < 0) $this->message('店铺获取失败');
		if($goods_id < 0) $this->message('获取商品失败');
		if($num <  1)$this->message('商品数量失败');
		$carinfo = JSON::decode(str_replace(array('&','$'),array('"',','),ICookie::get('shoppingsmcart')));

	    $Cart = new smCart;
	    $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
    $carinfo = $Cart->getMyCart();

    $checkinfo = $Cart->add($goods_id,$num,$shopid);
    if($checkinfo == false)
    {
   	   $this->message($Cart->getError());
    }
    $this->success($goods_id);
	}

        function downcart()
	{
		$shopid = intval(IReq::get('shopid'));
		$goods_id = intval(IReq::get('goods_id'));
		$num = intval(IReq::get('num'));
		if($shopid < 0) $this->message('店铺获取失败');
		if($goods_id < 0) $this->message('获取商品失败');
		if($num <  1)$this->message('商品数量失败');
	   $Cart = new smCart;
	    $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
    $carinfo = $Cart->getMyCart();
    if(!isset($carinfo['list'][$shopid]['data'][$goods_id]['count'])){
    	 $this->message('此商品未添加到购物车');
    }
    if($carinfo['list'][$shopid]['data'][$goods_id]['count'] ==  $num)
    {
    	$checkinfo = $Cart->del($goods_id,$shopid);
    	$this->success('操作成功');
    }else{
       $num = $num*(-1);
       $checkinfo = $Cart->add($goods_id,$num,$shopid);
    }
    if($checkinfo == false)
    {
   	   $this->message($Cart->getError());
    }
    $this->success('操作成功');
	}
	//减少购物车数量
         public function wxsmallcatding( )
    {
        $shopid = intval( IReq::get( "shopid" ) );
        $Cart = new smCart();
        $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
        $carinfo = $Cart->getMyCart();
        $data['cartinfo'] = $carinfo;
        $cxclass = new sellrule( );
        $showtype = trim( IReq::get( "showtype" ) );
        $cxtemp = array( );
        foreach ( $carinfo['list'] as $key => $value )
        {
            if ( $value['shopinfo']['shoptype'] == 1 )
            {
                $shopcheckinfo = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    " );
            }
            else
            {
                $shopcheckinfo = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    " );
            }
            if ( $key == $shopid )
            {
                $cxclass->setdata( $key, $value['sum'], $value['shopinfo']['shoptype'] );
                $cxinfo = $cxclass->getdata( );
                $cxtemp = $cxinfo;
            }
        }
        $data['cxdata'] = $cxtemp;
        $data['shopid'] = $shopid;
        Mysite::$app->setdata( $data );
    }
    function waitpay(){
    	$userid = empty($this->member['uid'])?0:$this->member['uid'];
		$orderid = intval(IReq::get('orderid'));
		if(empty($orderid)) $this->error('订单获取失败');
		if($userid == 0){
			//ICookie::get('Captcha')
			$neworderid = ICookie::get('orderid');

			if($orderid != $neworderid) $this->message('订单无查看权限wx');
		}
		$data['orderinfo'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."order where id=".$orderid."  ");  //获取主单
		if(empty($data['orderinfo'])) $this->message('订单数据获取失败');
		if($userid > 0 && $this->admin['uid'] ==  0){
			if($data['orderinfo']['buyeruid'] !=  $userid) $this->message('无查看权限2');
		}
		$data['orderdetlist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."orderdet where order_id=".$orderid."  order by id asc limit 0,50");//获取子单
		$paytypelist = array('outpay'=>'货到支付','open_acout'=>'账号余额支付');
		$paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
		if(is_array($paylist)){
		   foreach($paylist as $key=>$value){
			   $paytypelist[$value['loginname']] = $value['logindesc'];
		  }
	  }
		$data['paytypearr'] = $paytypelist;
		$data['buyerstatus'] = array(
		'0'=>'等待处理',
		'1'=>'订单处理中',
		'2'=>'订单已发货',
		'3'=>'订单完成',
		'4'=>'订单已取消',
		'5'=>'订单已取消'
		);

     Mysite::$app->setdata($data);

   }

    public function plateindex( )
    {
        $desk = intval( IFilter::act( IReq::get( "desk" ) ) );
        $desk = in_array( $desk, array( 0, 1, 2, 3, 4 ) ) ? $desk : 0;
        $data['desk'] = $desk;
        $areaids = intval( IFilter::act( IReq::get( "areaids" ) ) );
        $data['areaids'] = $areaids;
        $areaid = intval( IFilter::act( IReq::get( "areaid" ) ) );
        $data['areaid'] = $areaid;
        $locationtype = 1;//Mysite::$app->config['locationtype'];
        $data['goodstypedoid'] = array( );
        $attrshop = array( );
        $data['attrinfo'] = array( );
        $where = " where is_goshop = 1 ";
        $tempwhere = array( );
        $templist = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = 0 and parent_id = 0 and is_search =1  order by orderid asc limit 0,1000" );
        foreach ( $templist as $key => $value )
        {
            $value['det'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20" );
            $value['is_now'] = isset( $seardata[$value['id']] ) ? $seardata[$value['id']] : 0;
            $data['attrinfo'][] = $value;
            $doid = intval( IFilter::act( IReq::get( "goodstype_".$value['id'] ) ) );
            if ( 0 < $doid )
            {
                $data['goodstypedoid'][$value['id']] = $doid;
                $tempwhere[] = $doid;
            }
        }

        $personarr = array( "0" => "", "1" => " and a.personcount > 0 and a.personcount < 5 ", "2" => " and a.personcount > 4 and a.personcount < 9 ", "3" => " and a.personcount > 8 and a.personcount < 13 ", "4" => " and a.personcount > 12" );
        $where .= $personarr[$desk];
        if ( 0 < count( $tempwhere ) )
        {
            $where .= " and a.shopid in (select shopid from ".Mysite::$app->config['tablepre']."shopsearch where second_id in(".join( $tempwhere ).")  ) ";
        }
        if ( 0 < $areaids )
        {
            if ( 0 < $areaid )
            {
                $where .= " and a.shopid in (select shopid from ".Mysite::$app->config['tablepre']."areashop where areaid = ".$areaid." )";
            }
            else
            {
                $where .= " and a.shopid in (select shopid from ".Mysite::$app->config['tablepre']."areashop where areaid = ".$areaids." )";
            }
        }
        $data['searchgoodstype'] = $templist;
        $data['mainattr'] = array( );
        $templist = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = 0 and parent_id = 0 and is_main =1 and type!='input' order by orderid asc limit 0,1000" );
        foreach ( $templist as $key => $value )
        {
            $value['det'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20" );
            $data['mainattr'][] = $value;
        }
        $data['arealist'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."area where parent_id = 0  order by id asc limit 0,1000" );
        $data['areadet'] = array( );
        if ( 0 < $areaids )
        {
            $data['areadet'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."area where parent_id = ".$areaids." order by id asc limit 0,1000" );
        }
        $shopsearch = IFilter::act( IReq::get( "shopsearch" ) );
        $data['shopsearch'] = $shopsearch;
        $list = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."    order by sort asc limit 0,100" );
        $nowhour = date( "H:i:s", time( ) );
        $nowhour = strtotime( $nowhour );
        $templist = array( );
        if ( is_array( $list ) )
        {
            foreach ( $list as $key => $value )
            {
                if ( 0 < $value['id'] )
                {
                    $checkinfo = $this->shopIsopen( $value['is_open'], $value['starttime'], $value['is_orderbefore'], $nowhour );
                    $value['opentype'] = $checkinfo['opentype'];
                    $value['newstartime'] = $checkinfo['newstartime'];
                    $ps = $this->pscost( $value, 10 );
                    $value['pscost'] = $ps['pscost'];
                    $value['attrdet'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shopattr where  cattype = 0 and shopid = '".$value['id']."' " );
                    $tempinfo = array( );
                    foreach ( $value['attrdet'] as $keys => $valx )
                    {
                        $tempinfo[] = $valx['attrid'];
                    }
                    $value['servertype'] = join( ",", $tempinfo );
                    $templist[] = $value;
                }
            }
        }
        $data['shoplist'] = $templist;
        Mysite::$app->setdata( $data );
    }

       function platecart(){//购物车

   	$nowID= intval(ICookie::get('myaddress'));
	     if(empty($nowID)){
	 	     $link = IUrl::creatUrl('wxsite/index');
	       $this->message('',$link);
	     }
   	 $id = IFilter::act(IReq::get('id'));

   	$data['scoretocost'] = Mysite::$app->config['scoretocost'];
   	//	id	card 优惠劵卡号	card_password 优惠劵密码	status 状态，0未使用，1已绑定，2已使用，3无效	creattime 制造时间	cost 优惠金额	limitcost 购物车限制金额下限	endtime 失效时间	uid 用户ID	username 用户名	usetime 使用时间	name
   	$data['juanlist'] =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan  where uid='".$this->member['uid']."' and endtime > ".time()." and status = 1   ");



                           $data['shoptime'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where  id='".$id."' ");

   	$shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where shopid = ".$id."   ");
         // $data['shopinfo'] =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$id."'    ");
          $data['shopinfo'] = $shopinfo;
                //计算时间间隔

                $morning_offer = $shopinfo['morning_offer']?$shopinfo['morning_offer']:"";
                $afternoon_offer = $shopinfo['afternoon_offer']?$shopinfo['afternoon_offer']:"";

               if($morning_offer) $morninginfo = explode("-", $morning_offer);$data['morning'] = $morninginfo;
               if(isset($afternoon_offer)) {
                 $afternooninfo = explode("-", $afternoon_offer);$data['afternoon'] = $afternooninfo;
               }else{
                $afternooninfo="";
               }
               $interval = $shopinfo['interval'];//送餐间隔时间
             // $fulldate = IFilter::act(IReq::get('fulldate'));

               // $restime = $this->timecount($morninginfo, $afternooninfo, $interval, $fulldate);//通过timecount方法计算时间段
               // $data['restime'] = $restime;


                if (!$morning_offer && !$afternoon_offer) {
                    $support_time = $shopinfo['starttime'];
                }
                //
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

   	$data['deaddress'] =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."address  where userid = ".$this->member['uid']." and `default`=1   ");

   	 $checkareaid = $nowID;
	    $dataareaids = array();
	    $areadata = array();
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
	  	     $areadata[] = $temp_check['name'];
	    }
	    $areadata = array_reverse($areadata);
	    $data['areainfo'] = join('',$areadata);
            //$data['gustinfo'] = unserialize(ICookie::get('gustAddress'));
            if (isset($_COOKIE['gustAddress'])) {
               $data['gustinfo'] = unserialize($_COOKIE['gustAddress']);
            }else{
                $data['gustinfo']="";
            }
            $now_time=time();

            if ($now_time>=strtotime($shopinfo['asoftime'].":00")) {
                $now_time = strtotime("+1 day");
            }

             $data['now_time'] = $now_time;

   	Mysite::$app->setdata($data);
   }
    //验证码验证
   function checkcodenum ($code="", $phone="") {

             $code_check = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."mobile where code=".$code."  ");
             if (!$code_check) {
                 $this->message('无效的验证码');
             }
             $click_time = time() - 600;
             if (empty($code_check)) {
                 $this->message('无效的验证码');

             }
           else if ($code_check['addtime'] < $click_time && $phone==$code_check['phone']) {
                 $this->message('验证码已经超时');
             }
           else if ($code_check['addtime'] > $click_time && $phone==$code_check['phone']) {
                 return 1;
           }else{
               $this->message('验证码验证失败');
           }

         }
         /*
          *  1.生成orderid
          *  2.将ID传给gotopay
          */
         function selfpayment () {
             
                 $data['shopid'] = intval(IReq::get('shopid'));//店铺ID
		 $data['content'] = '到店自助付款';//备注
		 $data['paytype'] = IFilter::act(IReq::get('paytype'));//支付方式           
                 $data['dno'] = time().rand(1000,9999);//订单编号               
                 $shopinfo=   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where id = '".$data['shopid']."'    ");
                  $data['shopuid'] = $shopinfo['uid'];
              
                  $data['shopaddress'] = $shopinfo['address'];
                  $data['shopphone'] = $shopinfo['phone'];
                  $data['shopname'] = $shopinfo['shopname'];
                  $data['buycode'] = substr(md5(time()),9,6);
                  $minitime = strtotime(date('Y-m-d',time()));           
                  $tj = $this->mysql->select_one("select count(id) as shuliang from ".Mysite::$app->config['tablepre']."order where shopid='".$data['shopid']."' and addtime > ".$minitime." limit 0,1000");
	          $data['daycode'] = $tj['shuliang']+1;
                  $data['buyeraddress'] = "in_shop";//到店支付
                  $panduan = Mysite::$app->config['man_ispass'];
                  $data['status'] = $panduan == 1?'0':1;
                  $data['paystatus'] = 0;
                  $data['ordertype'] = 5;//订单类型
                  $data['cxcost'] = 0;
                  $data['yhjcost'] = 0;
                   
                      $ip_l=new iplocation();
     $ipaddress=$ip_l->getaddress($ip_l->getIP());
     if(isset($ipaddress["area1"])){
     $info_ipaddress  = $ipaddress['ip'].mb_convert_encoding($ipaddress["area1"],'UTF-8','GB2312');//('GB2312','ansi',);
     $data['ipaddress'] = $info_ipaddress; 
     
     }
      
                   $data['shopcost'] = IReq::get('shopcost');//
                   $data['allcost'] = $data['shopcost'];
                   $this->mysql->insert(Mysite::$app->config['tablepre'].'order',$data);  //写主订单
	           $orderid = $this->mysql->insertid();
           
                $cmd['order_id'] = $orderid;
	        $cmd['goodsid'] = '-1';
	        $cmd['goodsname'] = '到店自助付款';
	        $cmd['goodscost'] = $data['shopcost'];
	  	$cmd['goodscount'] = 1;
	  	$cmd['shopid'] = $data['shopid'];
	  	$cmd['status'] = 0;
	  	$cmd['is_send'] = 0;
                $this->mysql->insert(Mysite::$app->config['tablepre'].'orderdet',$cmd);
                ICookie::set('orderid',$orderid,86400);
          
               echo json_encode(array('success'=>'yes','msg'=>$orderid));exit;
                   
         } 
         public function error()
	{
		return $this->err;
	}
}



?>
