<?php
class method   extends adminbaseclass
{
	 function savearea(){
	  $checinfo = 	Mysite::$app->config['psset'];
	  if(empty($checinfo)){
	     $link = IUrl::creatUrl('area/adminpsset');
		   $this->message('请进行网站配送设置',$link);
  	}

	  $id = intval(IReq::get('uid'));
		$data['name'] = IReq::get('name');
		$data['orderid']  = intval(IReq::get('orderid'));
		$data['pin'] = IReq::get('pin');
		$data['parent_id'] = intval(IReq::get('parent_id'));
		$data['imgurl'] = IReq::get('imgurl');
		$data['is_com'] = intval(IReq::get('is_com'));
		if(empty($id))
		{
			$data['lng'] = 0;
		  $data['lat'] = 0;
			$link = IUrl::creatUrl('area/adminarealist');
			if(empty($data['name']))  $this->message('地区名称不能为空',$link);
			if(empty($data['pin']))	$this->message('拼音字母不能为空',$link);
			if($data['parent_id'] == 0 && empty($data['imgurl']))$this->message('地址图标不能为空',$link);

			$this->mysql->insert(Mysite::$app->config['tablepre'].'area',$data);
			$areatempid = $this->mysql->insertid();
			$tempdata['areaid'] = $areatempid;
	   	$tempdata['shopid'] = 0;
	   	$tempdata['cost'] = 0;
	   	$this->mysql->insert(Mysite::$app->config['tablepre']."areatoadd",$tempdata);
	   	$tempdata2['areaid'] = $areatempid;
	   	$tempdata2['shopid'] = 0;
	   	$this->mysql->insert(Mysite::$app->config['tablepre']."areashop",$tempdata2);
		}else{
			$link = IUrl::creatUrl('area/adminarealist/id/'.$id);
			if(empty($data['name']))  $this->message('地区名称不能为空',$link);
			if(empty($data['pin']))	$this->message('拼音字母不能为空',$link);
			if($data['parent_id'] == 0 && empty($data['imgurl']))$this->message('地址图标不能为空',$link);
			$this->mysql->update(Mysite::$app->config['tablepre'].'area',$data,"id='".$id."'");
		}
		$link = IUrl::creatUrl('area/adminarealist');
		$this->success('操作成功！',$link);
	 }
	 function adminareacost(){
	 	 $areaid = intval(IReq::get('areaid'));
		 $type = trim(IReq::get('type'));
		 $cost  = IFilter::act(IReq::get('cost'));
		 $cost = intval($cost*10)/10;
		 if($areaid < 1) $this->message('地址ID错误');
		 if(!in_array($type,array('add','del','updat'))) $this->message('未定义的操作');
		 $areainfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id =".$areaid."");
		 if(empty($areainfo)) $this->message('获取地址信息失败');
		 $insertdata['cost'] = $cost;
	   $this->mysql->update(Mysite::$app->config['tablepre'].'areatoadd',$insertdata," shopid = 0 and areaid ='".$areaid."'");
	 	 $this->success('操作成功！');
	 }
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
	 function savepsset(){
	 	 $locationtype =  intval(IFilter::act(IReq::get('locationtype')));
	 	 if($locationtype == 1){
	 	    $test =  Mysite::$app->config['baidumapkey'];
	 	    if(empty($test)) $this->message('请先设置百度地图的secrkey');
	 	 }
	 	 $pstype = intval(IFilter::act(IReq::get('pstype')));
	 	 $savearray['locationtype']  =  $locationtype;
	 	 $savearray['pstype']  = $pstype;
	 	 $savearray['psvalue1'] = IFilter::act(IReq::get('mapay1'));
	 	 $savearray['psvalue2'] = IFilter::act(IReq::get('mapay2'));
	 	 $savearray['psvalue3'] =IFilter::act(IReq::get('mapay3'));
	 	 if($pstype ==  1){//统一配送费时
	 	 	 $savearray['psvalue1'] = IFilter::act(IReq::get('allpay'));
	 	 }elseif($pstype == 5){
	 	 	 $savearray['psvalue1'] =IFilter::act(IReq::get('caipay1'));
	 	   $savearray['psvalue2'] = IFilter::act(IReq::get('caipay2'));
	   }

	   $siteinfo['psset'] =   serialize($savearray);
	   $siteinfo['opensitesend'] =  intval(IFilter::act(IReq::get('opensitesend')));
	   $siteinfo['openshopsend'] = intval(IFilter::act(IReq::get('openshopsend')));
		 $config = new config('hopeconfig.php',hopedir);
	   $config->write($siteinfo);
	   $this->success('操作成功！');

	 }
	 function adminarealist(){
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

	 	 $areacost = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."areatoadd where shopid =0");
	   $tempdolist = array();
	   foreach($areacost as $key=>$value){
	      $tempdolist[$value['areaid']] = $value['cost'];
	   }
	   $data['areacost'] = $tempdolist;
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
  function baidumap(){
    $id = intval(IReq::get('id'));
		 $areainfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where  id = '$id' order by id asc");
		 if(empty($areainfo)){
		   echo '获取信息失败';
		   exit;
		 }
		 $is_name = 1;
		 $data['arealng'] = 0;
		 $data['arealat'] = 0;
		 $data['nowcityname'] = '';
		 if(empty($areainfo['parent_id'])){
		    $data['nowcityname'] = $areainfo['name'];
		    $checklng = intval($areainfo['lng']);
		    if(!empty($checklng)){
		      $is_name = 2;
		      $data['arealng'] = $areainfo['lng'];
		      $data['arealat'] = $areainfo['lat'];
		    }

		 }else{
		 	   $data['nowcityname'] = $areainfo['name'];
		 	    $pinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where  id = '".$areainfo['parent_id']."' order by id asc");
		 	    if(empty($pinfo)){
		         echo '获取上级地址失败';
		         exit;
		      }
		     $checklng = intval($areainfo['lng']);
		     if(!empty($checklng)){
		        $is_name = 2;
		        $data['arealng'] = $areainfo['lng'];
		        $data['arealat'] = $areainfo['lat'];
		     }else{
		     	   $checklng2 = intval($pinfo['lng']);
		     	   if(!empty($checklng2)){
		     	     $is_name = 2;
		           $data['arealng'] = $pinfo['lng'];
		           $data['arealat'] = $pinfo['lat'];
		         }else{

		           echo '未设置上级地址百度坐标';
		           exit;
		         }
		     }



		 }
		 $data['arealng'] = $data['arealng'] == 0?Mysite::$app->config['baidulng']:$data['arealng'];
		 $data['arealat'] = $data['arealat'] == 0?Mysite::$app->config['baidulat']:$data['arealat'];

		 $data['is_name'] = $is_name;
		 $data['myareaid'] = $id;
		 $data['baidumapkey'] = Mysite::$app->config['baidumapkey'];
		 Mysite::$app->setdata($data);
  }
  function savemaplocation(){
  	 $id = intval(IReq::get('id'));
		if($id < 1){
		  $this->json('区域ID不能为空');
		}
		 $data['lng'] = IReq::get('lng');
		$data['lat'] = IReq::get('lat');
		if(empty($data['lng'])) $this->message('百度地图坐标不能为空');
		if(empty($data['lat'])) $this->message('百度坐标不能为空');
		$this->mysql->update(Mysite::$app->config['tablepre'].'area',$data,"id='".$id."'");
	   $this->success('操作成功！');
  }
	function setshow(){
	  $id = intval(IReq::get('id'));
	  $type = intval(IReq::get('type'));
	  if(empty($id))$this->message('地区ID不能为空');
	  $data['show'] = $type != 1?0:1;
	  $this->mysql->update(Mysite::$app->config['tablepre'].'area',$data,"id='".$id."'");
	  $this->success('操作成功！');
	}
	function delarea()
	{
		 $uid = intval(IReq::get('id'));
		 if(empty($uid))  $this->message('店铺ID不能为空');
		 $areainfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where  parent_id = '".$uid."' order by id asc");
		 if(!empty($areainfo)) $this->message('店铺拥有下级区域不可操作，请先删除他的子区域');

	   $this->mysql->delete(Mysite::$app->config['tablepre'].'area',"id = '$uid'");
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'areatoadd',"areaid = '$uid'");
	    $this->mysql->delete(Mysite::$app->config['tablepre'].'areamarket',"areaid = '$uid'");
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'areashop',"areaid = '$uid'");
	     $this->mysql->delete(Mysite::$app->config['tablepre'].'areatomar',"areaid = '$uid'");

	   $this->success('操作成功！');;
	}
	function addarealist(){
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
