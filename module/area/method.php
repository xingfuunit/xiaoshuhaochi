<?php
class method   extends baseclass
{

	 function adminpsset(){
	 	   $data['pestypearr'] = array(
	 	   '1'=>'网站统一配送费',
	 	   '2'=>'根据不同区域统一配送费',
	 	   '3'=>'不计算配送费',
	 	   '4'=>'百度地图根据距离测算配送费',
	 	   '5'=>'根据菜品数计算配送费'
	 	   );
	     Mysite::$app->setdata($data);
	 }

	 //递归转换保存到数据中
	 /*
	 arraylist 数据数据
	 $nowid  当前接点的parent_ID,
	 $nowkey  当前循环次数
	 */
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
	 function shopidtoad(){//添加店铺配送区域
	 	  $this->checkshoplogin();
	 		$areaid = intval(IReq::get('areaid'));//,areaid,cost
	   	$types =  IFilter::act(IReq::get('types'));

	   	$shopid = ICookie::get('adminshopid');
	   	if(!in_array($types,array('add','del'))) $this->message('未定义的操作方式');
	   	$checkarea = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id ='".$areaid."'   ");
	   	if(empty($shopid)) $this->message('未登陆店铺');
	   	if(empty($checkarea)) $this->message('地区ID不存在');
	    $shopinfo =	$this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop  where id = '".$shopid."' ");

	    $areatoaddname = 'areatoadd';
	    $areashopname = 'areashop';
	    if($shopinfo['shoptype'] ==  1){
	    	  $areatoaddname = 'areatomar';
	        $areashopname = 'areamarket';
	    }
	   	if($types == 'add'){
	   		//循环添加 区域店铺表
	   		 $whiledata = $checkarea;
	   		 $tempcheckid = array();
	   		 while(!empty($whiledata)){
	   		 	  $areatocost = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre'].$areatoaddname." where areaid ='".$whiledata['id']."'  and shopid = '".$shopid."' ");
	   		 	  if(empty($areatocost)){//价格区间不存在
	   	  	    $parentinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."areatoadd where areaid ='".$whiledata['id']."'  and shopid = '0' ");
	   	  	    if(!empty($parentinfo)){
	   	  	     	 $parentinfo['shopid'] = $shopid;
			  	       $this->mysql->insert(Mysite::$app->config['tablepre'].$areatoaddname,$parentinfo);
			  	    }
	   	  	  }
	   	  	  $areashop3 = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre'].$areashopname." where areaid ='".$whiledata['id']."'  and shopid = '".$shopid."'  ");
	   	      if(empty($areashop3)){
	   	    	     $parentinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."areashop where areaid ='".$whiledata['id']."'  and shopid = '0' ");
	   	  	       if(!empty($parentinfo)){
	   	  	         $parentinfo['shopid'] = $shopid;
			  	          $this->mysql->insert(Mysite::$app->config['tablepre'].$areashopname,$parentinfo);
			  	       }
	   	      }
	   	      $tempcheckid[] = $whiledata['id'];
	   	  	  if($whiledata['parent_id'] == 0){
	   	  	    break;
	   	  	  }
	   	  	  if(in_array($whiledata['parent_id'],$tempcheckid)){
	   	  	    break;
	   	  	  }
	   	  	  $whiledata = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id ='".$whiledata['parent_id']."'   ");

	   		 }

	   	}else{
	   		  //删除配送地址
	   		  //删除配送价格
	   		  $whiledata = $checkarea;
	   		  $tempcheckid = array();
	   		  while(!empty($whiledata)){
	   		  	     //检测该区域是否被删除
	   		  	     $checkdeldata = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre'].$areatoaddname." where areaid in(select id from ".Mysite::$app->config['tablepre']."area where  parent_id ='".$whiledata['id']."')  and shopid = '".$shopid."' ");
	   		  	     if(!empty($checkdeldata)){
	   		  	       break;
	   		  	     }

	   		          $this->mysql->delete(Mysite::$app->config['tablepre'].$areatoaddname,"areaid ='".$whiledata['id']."' and shopid = '".$shopid."'");
	   		          $this->mysql->delete(Mysite::$app->config['tablepre'].$areashopname,"areaid ='".$whiledata['id']."' and shopid = '".$shopid."'");
	   		          $tempcheckid[] = $whiledata['id'];
	   		          if($whiledata['parent_id'] == 0){
	   	  	             break;
	   	  	        }
	   	  	        if(in_array($whiledata['parent_id'],$tempcheckid)){
	   	  	             break;
	   	  	        }
	   	  	        $whiledata = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id ='".$whiledata['parent_id']."'   ");
	   		 }


	   	}
	  	$this->success('操作成功');
   }
   function shoptoadcost(){
   	$this->checkshoplogin();
     	$areaid = intval(IReq::get('areaid'));//,areaid,cost
	   	$cost =  IFilter::act(IReq::get('cost'));
	   	$cost = intval($cost*10)/10;
	   	if(empty($areaid)) $this->message('区域ID不能为空');
	    $shopid = ICookie::get('adminshopid');
	   	if(empty($shopid)) $this->message('未登陆店铺');
	   	$data['cost'] = $cost;
	     $shopinfo =	$this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop  where id = '".$shopid."' ");
	  if($shopinfo['shoptype'] == 0){
	   	   $this->mysql->update(Mysite::$app->config['tablepre'].'areatoadd',$data,"shopid='".$shopid."' and areaid = '".$areaid."'");
	  }elseif($shopinfo['shoptype'] ==  1){
	  		$this->mysql->update(Mysite::$app->config['tablepre'].'areatomar',$data,"shopid='".$shopid."' and areaid = '".$areaid."'");
	  }
	    $this->success('操作成功');
   }
   function shoptoappcost(){
   	  $this->checkshoplogin();
     	$gongli = intval(IReq::get('gongli'));//,areaid,cost
	   	$cost =  intval(IFilter::act(IReq::get('cost')));


	    $shopid = ICookie::get('adminshopid');
	   	if(empty($shopid)) $this->message('未登陆店铺');

	     $shopinfo =	$this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop  where id = '".$shopid."' ");
	     if($shopinfo['shoptype'] == 0){
	    	//pradius
	    	 $fastfood = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast where shopid=".$shopid."  ");
	    	 $pradius = empty($fastfood['pradius'])?1:intval($fastfood['pradius']);
	    	 $tempdoid = empty($fastfood['pradiusvalue'])?array():unserialize($fastfood['pradiusvalue']);
	    	 $result = array();
	    	 for($i=0;$i< $pradius;$i++){
	    	 	   if($i == $gongli){
	    	 	       $result[$i] = $cost;
	    	 	   }else{
	    	 	       $result[$i]=  isset($tempdoid[$i])? $tempdoid[$i]:0;
	    	 	   }
	    	 }
	    	 $data['pradiusvalue'] =  serialize($result);


	   	   $this->mysql->update(Mysite::$app->config['tablepre'].'shopfast',$data,"shopid='".$shopid."' ");
	    }elseif($shopinfo['shoptype'] ==  1){
	    	$fastfood = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket where shopid=".$shopid."  ");
	    	 $pradius = empty($fastfood['pradius'])?1:intval($fastfood['pradius']);
	    	 $tempdoid = empty($fastfood['pradiusvalue'])?array():unserialize($fastfood['pradiusvalue']);
	    	 $result = array();
	    	 for($i=0;$i< $pradius;$i++){
	    	 	   if($i == $gongli){
	    	 	       $result[$i] = $cost;
	    	 	   }else{
	    	 	       $result[$i]=  isset($tempdoid[$i])? $tempdoid[$i]:0;
	    	 	   }
	    	 }
	    	 $data['pradiusvalue'] =  serialize($result);

	   	   $this->mysql->update(Mysite::$app->config['tablepre'].'shopmarket',$data,"shopid='".$shopid."' ");
	    }
	    $this->success('操作成功');
   }
   function useraddress(){
   	 $this->checkmemberlogin();
   	 $data['addressid'] = intval(IReq::get('addressid'));
	   $data['area_grade'] = empty(Mysite::$app->config['area_grade'])?1:Mysite::$app->config['area_grade'];
	   $data['arealist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area  where  parent_id = 0 limit 0,100");

	   $temparea =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area   ");
	   $areatoname = array();
	   foreach($temparea as $key=>$value){
	   	$areatoname[$value['id']] = $value['name'];
	   }
	   $areatoname[0] = '';
	   $data['areatoname'] = $areatoname;
	   $data['addresslimit'] = Mysite::$app->config['addresslimit'];//限制绑定店铺数量
		 Mysite::$app->setdata($data);
   }
   function saveaddress(){
   	$this->checkmemberlogin();
   	 $addressid = intval(IReq::get('addressid'));
		 if(empty($addressid))
		 {
		 	 $checknum = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."address where userid='".$this->member['uid']."' ");
		 	 if(Mysite::$app->config['addresslimit'] < $checknum)$this->message('地址数量不能超过'.Mysite::$app->config['addresslimit'].'个');

	     $arr['userid'] = $this->member['uid'];
	     $arr['username'] = $this->member['username'];

	     $arr['address'] =  IFilter::act(IReq::get('add_new'));
	     $arr['phone'] = IFilter::act(IReq::get('phone'));
	     $arr['otherphone'] = '';
	     $arr['contactname'] = IFilter::act(IReq::get('contactname'));
	     $arr['sex'] =  IFilter::act(IReq::get('sex'));
	     $arr['default'] = $checknum == 0?1:0;
	     if(!(IValidate::len(IFilter::act(IReq::get('add_new')),3,50)))$this->message('录入地址长度不能少于3个');
	     if(!(IValidate::phone($arr['phone'])))$this->message('录入正确的电话号码');
	     if(!empty($arr['otherphone'])&&!(IValidate::phone($arr['otherphone'])))$this->message('录入正确的备用号码');
	     if(!(IValidate::len($arr['contactname'],2,6)))$this->message('联系人名长度不能小于2个大于6个');
	     $this->mysql->insert(Mysite::$app->config['tablepre'].'address',$arr);
	     $this->success('操作成功');
		 }else{
	     $arr['address'] =  IFilter::act(IReq::get('add_new'));
	     $arr['phone'] = IFilter::act(IReq::get('phone'));
	     $arr['otherphone'] = '';
	     $arr['contactname'] = IFilter::act(IReq::get('contactname'));
	     $arr['sex'] =  IFilter::act(IReq::get('sex'));
	      if(!(IValidate::len(IFilter::act(IReq::get('add_new')),3,50)))$this->message('录入地址长度不能少于3个');
	     if(!(IValidate::phone($arr['phone'])))$this->message('录入正确的电话号码');
	     if(!empty($arr['otherphone'])&&!(IValidate::phone($arr['otherphone'])))$this->message('录入正确的备用号码');
	     if(!(IValidate::len($arr['contactname'],2,6)))$this->message('联系人名长度不能小于2个大于6个');
	     $this->mysql->update(Mysite::$app->config['tablepre'].'address',$arr,'userid = '.$this->member['uid'].' and id='.$addressid.'');
	     $this->success('操作成功');
		 }
		$this->success('操作成功');
  }
  function deladdress(){
  	$this->checkmemberlogin();
  	 $uid = intval(IReq::get('addressid'));
		 if(empty($uid)) $this->message('删除ID不能为空');
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'address',"id = '$uid' and  userid='".$this->member['uid']."'");
	   $this->success('操作成功');
  }
  function editaddress(){
  	$this->checkmemberlogin();
  	$what = trim(IFilter::act(IReq::get('what')));
		$addressid = intval(IReq::get('addressid'));
		if(empty($addressid)) $this->message('编辑地址获取失败');
  	if($what == 'default')
  	{
  		$arr['default'] = 0;
  		$this->mysql->update(Mysite::$app->config['tablepre'].'address',$arr,"userid='".$this->member['uid']."'");
  		$arr['default'] = 1;
  		$this->mysql->update(Mysite::$app->config['tablepre'].'address',$arr,"id='".$addressid."' and userid='".$this->member['uid']."' ");
  		 $this->success('操作成功');
  	}elseif($what == 'addr')
  	{
  		$arr['address'] = IFilter::act(IReq::get('controlname'));
  		if(!(IValidate::len($arr['address'],5,50))) $this->message('录入地址长度不能少于5个');
  		$this->mysql->update(Mysite::$app->config['tablepre'].'address',$arr,"id='".$addressid."' and userid='".$this->member['uid']."' ");
  	  $this->success('操作成功');
  	}elseif($what == 'phone')
  	{
  		$arr['phone'] = IFilter::act(IReq::get('controlname'));
  		if(!IValidate::phone($arr['phone'])) $this->message('录入的联系电话不是手机或者座机正确');
  		$this->mysql->update(Mysite::$app->config['tablepre'].'address',$arr,"id='".$addressid."' and userid='".$this->member['uid']."' ");
  		 $this->success('操作成功');
  	}
  	elseif($what == 'bak_phone')
  	{
  		$arr['otherphone'] = IFilter::act(IReq::get('controlname'));
  		if(!IValidate::phone($arr['otherphone']))$this->message('录入的备用电话不是手机或者座机正确');

  		$this->mysql->update(Mysite::$app->config['tablepre'].'address',$arr,"id='".$addressid."' and userid='".$this->member['uid']."' ");
  		 $this->success('操作成功');
  	}
  	elseif($what == 'recieve_name')
  	{
  	 	$arr['contactname'] =  IFilter::act(IReq::get('controlname'));
  	 	if(!(IValidate::len($arr['contactname'],2,6))) $this->message('联系人名长度不能小于2个大于6个');
  		$this->mysql->update(Mysite::$app->config['tablepre'].'address',$arr,"id='".$addressid."' and userid='".$this->member['uid']."' ");
  		 $this->success('操作成功');
  	}else{
  		 $this->message('未定义的操作');
  	}
  }
  function shopbaidumap(){
  	$this->checkshoplogin();
		 $shopid = ICookie::get('adminshopid');
		 $shopinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where  id = '".$shopid."' order by id asc");
	   $data['dlng'] = empty($shopinfo['lng'])||$shopinfo['lng']=='0.000000'?Mysite::$app->config['baidulng']:$shopinfo['lng'];
	   $data['dlat'] = empty($shopinfo['lat'])||$shopinfo['lat']=='0.000000'?Mysite::$app->config['baidulat']:$shopinfo['lat'];
		 $data['baidumapkey'] = Mysite::$app->config['baidumapkey'];
		  Mysite::$app->setdata($data);
  }
  function savemapshoplocation(){
  	$this->checkshoplogin();
	  $data['lng'] = IReq::get('lng');
		$data['lat'] = IReq::get('lat');
		$shopid = ICookie::get('adminshopid');
		if(empty($data['lng'])) $this->message('百度地图坐标不能为空');
		if(empty($data['lat'])) $this->message('百度坐标不能为空');
		if(empty($shopid)) $this->message('cookies失效,请重新登陆');
		$shopid = ICookie::get('adminshopid');
		$this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$shopid."'");
	  $this->success('操作成功');
	}
	function setshoparea(){
		$this->checkshoplogin();
		 $areainfo = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area   order by orderid asc");
	  //	print_r($areainfo);
		//&nbsp;&nbsp;&nbsp;&nbsp;
		$parentids = array();
		foreach($areainfo as $key=>$value){
		  $parentids[] = $value['parent_id'];
		}
		//去重
		$parentids = array_unique($parentids);
		$data['parent_ids'] = $parentids;
	 	 $this->getgodigui($areainfo,0,0);
	 	 $data['arealist'] = $this->digui;
	 	 Mysite::$app->setdata($data);
	}

}



?>