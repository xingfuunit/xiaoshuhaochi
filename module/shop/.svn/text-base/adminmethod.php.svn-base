<?php
class method   extends adminbaseclass
{

	//保存店铺
	function saveshop()
	{
		$subtype = intval(IReq::get('subtype'));
		$id = intval(IReq::get('uid'));
		if(!in_array($subtype,array(1,2))) $this->message('提交数据错误');
		if($subtype == 1){
			  $username = IReq::get('username');
			  if(empty($username)) $this->message('会员帐号不能为空');
				$testinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where username='".$username."'  ");
			  if(empty($testinfo)) $this->message('会员帐号不存在');
			  $shopinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."usrlimit where  `group`='".$testinfo['group']."' and  name='editshop' ");
			  if(empty($shopinfo)) $this->message('获取用户不可操作店铺保存');
			  $shopinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where  uid='".$testinfo['uid']."' ");
			  if(!empty($shopinfo)) $this->message('会员帐号已绑定店铺');
			  $data['shopname'] = IReq::get('shopname');
			  if(empty($data['shopname']))  $this->message('店铺名称不能为空');
			  $shopinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where  shopname='".$data['shopname']."'  ");
			  if(!empty($shopinfo)) $this->message('店铺名重复');
			  $data['uid'] = $testinfo['uid'];
			  $data['shoptype'] = intval(IReq::get('shoptype'));
			  $nowday = 24*60*60*365;
	       $data['endtime'] = time()+$nowday;
			  $this->mysql->insert(Mysite::$app->config['tablepre'].'shop',$data);
			  $this->success('操作成功');
		}elseif($subtype ==  2){
			/*检测*/
			$data['username'] = IReq::get('username');
		  $data['phone'] = IReq::get('maphone');
      $data['email'] = IReq::get('email');
      $data['password'] = IReq::get('password');
      $sdata['shopname'] = IReq::get('shopname');
       if(empty($sdata['shopname']))  $this->message('店铺名称不能为空');
		   $shopinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where  shopname='".$sdata['shopname']."'  ");
			 if(!empty($shopinfo)) $this->message('店铺名重复');
			 $password2 = IReq::get('password2');
		   if($password2 != $data['password']) $this->message('确认密码设置密码不一致');
			 $uid = 0;
			 if($this->memberCls->regester($data['email'],$data['username'],$data['password'],$data['phone'],3)){
			 	$uid = $this->memberCls->getuid();
			 }else{
			 	 $this->message($this->memberCls->ero());
			 }
      $sdata['uid'] = $uid;
      $sdata['maphone'] =  $data['phone'];
      $sdata['addtime'] = time();
      $sdata['email'] =  $data['email'];
      $sdata['shoptype'] = intval(IReq::get('shoptype'));
      $nowday = 24*60*60*365;
	     $sdata['endtime'] = time()+$nowday;
      $this->mysql->insert(Mysite::$app->config['tablepre'].'shop',$sdata);
		  $this->success('操作成功');
		}else{
		 $this->message('提交数据类型错误');
		}
	}
	 function shopbiaoqian()
	 {
	 	  $this->setstatus();
	 	  $shopid =  intval(IReq::get('id'));
	 	  if(empty($shopid))
	 	  {
	 	  	 echo '店铺不存在';
	 	  	 exit;
	 	   }
	 	  $shopinfo= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where id=".$shopid."  ");
	 	  if(empty($shopinfo))
	 	  {
	 	     echo '店铺不存在';
	 	  	 exit;
	 	  }
	 	  $fastfood = array();
	 	  if($shopinfo['shoptype'] == 0){
	 	     $fastfood = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast where shopid=".$shopid."  ");
	   	}
	 	  $attrinfo = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype='".$shopinfo['shoptype']."' and  parent_id = 0 and is_admin = 1  order by orderid desc limit 0,1000");//获取所有后台控制属性
	 	  $data['attrlist'] = array(); //每个主属性  --对应子属性
	    foreach($attrinfo as $key=>$value){
	  	   $value['det'] =  $this->mysql->getarr("select id,name,instro from ".Mysite::$app->config['tablepre']."shoptype where  cattype='".$shopinfo['shoptype']."' and   parent_id = ".$value['id']." order by id desc ");
	  	   $data['attrlist'][] = $value;
	    }
	 	  $shopsetatt = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr where    cattype='".$shopinfo['shoptype']."' and  shopid = '".$shopid."'  limit 0,1000");
	    $myattr = array();
	    foreach($shopsetatt as $key=>$value){
	  	    $myattr[$value['firstattr'].'-'.$value['attrid']] = $value['value'];
	    }
	    $data['myattr'] = $myattr;
	 	  $data['fastfood'] = $fastfood;
	 	  $data['shopid'] = $shopid;
	 	  $data['shopinfo'] = $shopinfo;
	    Mysite::$app->setdata($data);
	  }
	function saveshopbq()
	{
		 $id = IReq::get('ids');
		 $shopid = intval(IReq::get('shopid'));
		 if(empty($shopid))
		 {
		 	  echo "<script>parent.uploaderror('店铺获取失败');</script>";
		 	 exit;
		 	}
		 	//fis_com
		  $is_recom = intval(IReq::get('is_recom'));
		  $shopinfo= $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where id=".$shopid."  ");
		  if(!empty($shopinfo)){
		  	$udata['is_recom'] = $is_recom;
		    	$this->mysql->update(Mysite::$app->config['tablepre'].'shop',$udata,"id='".$shopid."'");
		  }
	  if($shopinfo['shoptype'] == 0){
		   $fastfood = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopfast where shopid=".$shopid."  ");
		   if(count($fastfood) > 0){
		 	  $data['is_com'] = intval(IReq::get('fis_com'));
		 	  $data['is_hot'] = intval(IReq::get('fis_hot'));
		 	  $data['is_new'] = intval(IReq::get('fis_new'));
		 	   $this->mysql->update(Mysite::$app->config['tablepre'].'shopfast',$data,"shopid='".$shopid."'");
		   }
	  }

		$attrinfo = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = '".$shopinfo['shoptype']."' and parent_id = 0 and is_admin = 1  order by orderid desc limit 0,1000");
		$tempinfo = array();
		foreach($attrinfo as $key=>$value){
			    $tempinfo[] = $value['id'];
		}
		if(count($tempinfo) > 0){
			//删除店铺属性是前台控制部分
			 $this->mysql->delete(Mysite::$app->config['tablepre']."shopattr"," shopid='".$shopid."' and firstattr in(".join(',',$tempinfo).") ");
		   //写店铺数据
		  foreach($attrinfo as $key=>$value){
			     //shopid     value ;
			     $attrdata['shopid'] = $shopid;
			     $attrdata['cattype'] = $shopinfo['shoptype'];
			     $attrdata['firstattr']  = $value['id'];
			     $inputdata = IFilter::act(IReq::get('mydata'.$value['id']));

			     //shopid  cattype     value;
			     if($value['type'] == 'input'){
			     	 $attrdata['attrid'] = 0;
			     	 $attrdata['value'] = $inputdata;
			     	 $this->mysql->insert(Mysite::$app->config['tablepre']."shopattr",$attrdata);
			     }elseif($value['type'] == 'img'){
			     	 $temp = array();
			     	 $temp = is_array($inputdata)?$inputdata:array($inputdata);
			     	 $ids = join(',',$temp);
			     	 if(empty($ids)){
			     	    continue;
			     	 }
			     	 $tempattr  = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where id in(".$ids.")   order by orderid desc limit 0,1000");
			     	 foreach($tempattr as $ky=>$val){
			     	 	$attrdata['attrid'] = $val['id'];
			     	  $attrdata['value'] = $val['name'];
			     	  $this->mysql->insert(Mysite::$app->config['tablepre']."shopattr",$attrdata);
			     	 }
			     }elseif($value['type'] =='checkbox'){
			     	 $temp = array();
			     	 $temp = is_array($inputdata)?$inputdata:array($inputdata);
			     	 $ids = join(',',$temp);
			     	 if(empty($ids)){
			     	    continue;
			     	 }
			     	 $tempattr  = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where id in(".$ids.")   order by orderid desc limit 0,1000");
			     	 foreach($tempattr as $ky=>$val){
			     	 	$attrdata['attrid'] = $val['id'];
			     	  $attrdata['value'] = $val['name'];
			     	  $this->mysql->insert(Mysite::$app->config['tablepre']."shopattr",$attrdata);
			     	 }
			     }elseif($value['type'] = 'radio'){
			     	 //$this->json($inputdata);
			     	  $tempattr  = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shoptype where id in(".intval($inputdata).")   order by orderid desc limit 0,1000");
			     	  if(empty($tempattr)){
			     	    continue;
			     	  }

			     	  $attrdata['attrid'] = $tempattr['id'];
			     	  $attrdata['value'] = $tempattr['name'];
			     	  $this->mysql->insert(Mysite::$app->config['tablepre']."shopattr",$attrdata);
			     }else{
			      continue;
		       }
		  }
		  //is_search
		  $this->mysql->delete(Mysite::$app->config['tablepre']."shopsearch"," shopid='".$shopid."'  and parent_id in(".join(',',$tempinfo).") ");
		  foreach($attrinfo as $key=>$value){
		  	if($value['is_search'] == 1 && $value['type'] != 'input'){
		  		$inputdata = IFilter::act(IReq::get('mydata'.$value['id']));
		  		$temp = is_array($inputdata)?$inputdata:array($inputdata);
		  		foreach($temp as $ky=>$val){
		  			$searchdata['shopid'] = $shopid;
		  			$searchdata['parent_id'] = $value['id'];
		  			$searchdata['cattype'] = $shopinfo['shoptype'];
		  			$searchdata['second_id'] = intval($val);
		  			if($val > 0){
		  				 $this->mysql->insert(Mysite::$app->config['tablepre']."shopsearch",$searchdata);
		  			}
		  		}

		  	}
		  }
		}
		 echo "<script>parent.uploadsucess('');</script>";
		 exit;
	}
	function passhop()
	{
		 $id = intval(IReq::get('id'));
		 $data['is_pass'] =  1;
		 if(empty($id)) $this->message('店铺ID不存在');
		  $tempattr  = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop  where id=".$id." ");
	    if(empty($tempattr))$this->message('店铺不存在');
	  	$this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$id."'");
	  	$cdata['group'] = 3;
	  	$this->mysql->update(Mysite::$app->config['tablepre'].'member',$cdata,"uid='".$tempattr['uid']."'");
	  	$this->success('操作成功');
	}
	//保存佣金
	function savesetshopyjin(){
		 $yjin = IReq::get('yjin');
		 $shopid = intval(IReq::get('shopid'));
		 if(empty($shopid)) $this->message('获取店铺失败');
		 $data['yjin'] = $yjin;
		 $this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$shopid."'");
		 $this->success('操作成功');
	}
	//店铺排序
	function adminshoppx(){
		$shopid = intval(IReq::get('id'));
		$data['sort'] = intval(IReq::get('pxid'));
		$this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$shopid."'");
	  $this->success('操作成功');
	}
	//店铺有效天数
	function shopactivetime(){
		$shopid = intval(IReq::get('shopid'));
		$mysetclosetime= intval(IReq::get('mysetclosetime'));
		$nowday = 24*60*60*$mysetclosetime;
		$data['endtime'] = time()+$nowday;
		$this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$shopid."'");
		$this->success('操作成功');
	}
	function delshop()
	{
		 $id = IReq::get('id');
		 if(empty($id))  $this->message('店铺ID不能为空');
		 $ids = is_array($id)? join(',',$id):$id;
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'shop',"id in($ids)");
	   /*删除店铺对应商品及商品分类*/
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'goodstype',"shopid in($ids)");
     $this->mysql->delete(Mysite::$app->config['tablepre'].'goods',"shopid in($ids)");
     $this->mysql->delete(Mysite::$app->config['tablepre'].'shopmarket'," shopid in($ids)");
     $this->mysql->delete(Mysite::$app->config['tablepre'].'shopfast'," shopid in($ids)");
		 $this->mysql->delete(Mysite::$app->config['tablepre']."shopattr"," shopid in($ids)");
		 $this->mysql->delete(Mysite::$app->config['tablepre']."shopsearch"," shopid in($ids)");
		 $this->mysql->delete(Mysite::$app->config['tablepre']."areatoadd"," shopid  in($ids) "); //
	   $this->mysql->delete(Mysite::$app->config['tablepre']."searkey"," goid  in($ids)   ");
	   $this->mysql->delete(Mysite::$app->config['tablepre']."areamarket"," shopid  in($ids) ");
	   $this->mysql->delete(Mysite::$app->config['tablepre']."areatomar"," shopid  in($ids) ");
	   $this->mysql->delete(Mysite::$app->config['tablepre']."marketcate"," shopid  in($ids) ");
	   $this->mysql->delete(Mysite::$app->config['tablepre']."shopmarket"," shopid  in($ids) "); //

	   $this->success('操作成功');
	}
	//删除店铺属性
	function delshoptype(){
		 $id = IReq::get('id');
		 if(empty($id))  $this->message('店铺ID不能为空');
		 $ids = is_array($id)? join(',',$id):$id;
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'shoptype'," id in($ids) ");
	   $this->success('操作成功');
	}
	//保存店铺属性
	function saveshoptype(){
		$id = intval(IReq::get('id'));
		$data['name'] = trim(IReq::get('name'));
		$data['type'] = trim(IReq::get('type'));
		$data['parent_id'] = 0;
		$data['cattype'] = intval(IReq::get('cattype'));
		$data['is_search']  = intval(IReq::get('is_search'));
		$data['is_search']  = intval(IReq::get('is_search'));
		$data['is_main']  = intval(IReq::get('is_main'));
		$data['is_admin']  = intval(IReq::get('is_admin'));
		$data['instro']  = IReq::get('instro');
		$data['orderid']  = IReq::get('orderid');
		if(empty($data['name'])) $this->message('属性名称不能为空');
		if(empty($data['type'])) $this->message('数据类型不能为空');
		if(empty($id))
		{
			$this->mysql->insert(Mysite::$app->config['tablepre'].'shoptype',$data);
		}else{
			$this->mysql->update(Mysite::$app->config['tablepre'].'shoptype',$data,"id='".$id."'");
		}
		$this->success('操作成功');
	}
	//保存店铺二级属性
	function saveshopdettype(){
		 $id = IReq::get('id');
	   if($id < 0){
	     $this->message('数据错误');
	   }
	   $ids = IReq::get('ids');
	   $name = IReq::get('name');
	   $instro = IReq::get('instro');
	   $cattype = IReq::get('cattype');
	   $ids = is_array($ids)? $ids:array($ids);
	   $name = is_array($name)?$name:array($name);
	   $instro = is_array($instro)?$instro:array($instro);
	   /*检测数据是否合法;*/
	   $checkdo = true;
	   $newdata = array();
	   $delids = array();
	   foreach($name as $key=>$value){
	   	 if(empty($value)){
	   	 	$checkdo = false;
	   	 	break;
	   	 }
	   	 $tempdata = array();
	   	 $tempdata['name'] = $value;
	   	 $tempdata['id'] = isset($ids[$key])?$ids[$key]:0;
	   	 $tempdata['instro'] = isset($instro[$key])?$instro[$key]:'';
	   	 if($tempdata['id'] > 0){
	   	 	$delids[] = $tempdata['id'];
	   	 }
	   	 $newdata[]= $tempdata;
	   }
	   $notinids = join(',',$delids);
	   if(!empty($notinids)){
	   	   $this->mysql->delete(Mysite::$app->config['tablepre'].'shoptype',"parent_id = $id and id not in($notinids)");
	   }else{
	   	   $this->mysql->delete(Mysite::$app->config['tablepre'].'shoptype',"parent_id = $id");
	   }
	   if($checkdo == false) $this->message('提交数据中存在空数据保存失败');
	   foreach($newdata as $key=>$value){
	     $data['type'] = 0;
	     $data['parent_id'] = $id;
	     $data['cattype'] = $cattype;
	     $data['is_search'] = 0;
	     $data['is_main'] = 0;
	     $data['is_admin'] = 0;
	     $data['name'] = $value['name'];
	     $data['instro'] = $value['instro'];
	     if($value['id']  > 0){
	       $this->mysql->update(Mysite::$app->config['tablepre'].'shoptype',$data,"id='".$value['id']."'");
		   }else{
			   $this->mysql->insert(Mysite::$app->config['tablepre'].'shoptype',$data);
	     }
	   }
	   $this->success('操作成功');
	}
	function resetdefualt(){
		$shopid = IReq::get('shopid');
	  ICookie::set('adminshopid',$shopid,86400);
		$link = IUrl::creatUrl('shop/useredit');
    $this->refunction('',$link);
	}

	function savegoodssign(){
		$id = intval(IReq::get('uid'));
		$data['name'] = IReq::get('name');
		$data['imgurl'] = IReq::get('img');
		$data['type']  = IReq::get('typename');
		$data['instro']  = IReq::get('instro');
		$data['typevalue'] = IReq::get('typevalue');
		if(empty($data['name'])) $this->message('标签名不能为空');
		if(empty($data['imgurl'])) $this->message('标签图标不能为空');
		if(empty($id))
		{
			$this->mysql->insert(Mysite::$app->config['tablepre'].'goodssign',$data);
		}else{
			$this->mysql->update(Mysite::$app->config['tablepre'].'goodssign',$data,"id='".$id."'");
		}
		$this->success('操作成功');
	}
	function delgoodssign()
	{
	   $id = IReq::get('id');
		 if(empty($id))  $this->message('标签ID不能为空');
		 $ids = is_array($id)? join(',',$id):$id;
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'goodssign'," id in($ids) ");
	   $this->success('操作成功');
	}

	function adminshoplist(){
	    $this->setstatus();
	    $where = '';
	     
	    
	    $data['shopname'] =  trim(IReq::get('shopname'));
	   $data['username'] =  trim(IReq::get('username'));
	 	 $data['phone'] = trim(IReq::get('phone'));
	 	 if(!empty($data['shopname'])){
	 	   $where .= " and shopname='".$data['shopname']."'";
	 	 }
	 	 if(!empty($data['username'])){
	 	   $where .= " and uid in(select uid from ".Mysite::$app->config['tablepre']."member where username='".$data['username']."')";
	 	 }
	 	 if(!empty($data['phone'])){
	 	    $where .=" and phone='".$data['phone']."'";
	 	 }
	 	 
	 	 //构造查询条件
	 	 $data['where'] = $where; 
	    
	    Mysite::$app->setdata($data);
	    
	}
	function setstatus(){
	    $data['shoptype'] = array('0'=>'外卖','1'=>'超市');
	   Mysite::$app->setdata($data);
	}
	function adminshopwati(){
	   $this->setstatus();
	}
	function shoptype(){
		 $this->setstatus();
	}
	function addshop(){
	   $this->setstatus();
	}
	function setnotice(){
		 $shopid =  intval(IReq::get('shopid'));
	 	  if(empty($shopid))
	 	  {
	 	  	 echo '店铺不存在';
	 	  	 exit;
	 	   }
	 	  $shopinfo= $this->mysql->select_one("select noticetype,IMEI,machine_code,mKey from ".Mysite::$app->config['tablepre']."shop where id=".$shopid."  ");
	 	  if(empty($shopinfo))
	 	  {
	 	     echo '店铺不存在';
	 	  	 exit;
	 	   }
	   $data['IMEI'] = $shopinfo['IMEI'];
	   $data['shopid'] = $shopid;
	   $data['machine_code'] = $shopinfo['machine_code'];
	   $data['mKey'] = $shopinfo['mKey'];
	   $data['noticetype'] = explode(',',$shopinfo['noticetype']);
	   Mysite::$app->setdata($data);
	}
	function saveshoppnotice(){
		$pstype = IReq::get('pstype');
		 $shopid = intval(IReq::get('shopid'));
		  $data['IMEI'] = IReq::get('IMEI');
		 if(empty($shopid))
		 {
		 	  echo "<script>parent.uploaderror('店铺获取失败');</script>";
		 	 exit;
		 	}
		 $tempvalue = '';
		 if(is_array($pstype)){
		 	$tempvalue = join(',',$pstype);
		 }

		 $data['noticetype'] = $tempvalue;
		 $data['machine_code'] = IReq::get('machine_code');
		 $data['mKey'] =  IReq::get('mKey');
		 $this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$shopid."'");
		  echo "<script>parent.uploadsucess('');</script>";
		 exit;
	}
	function savelunadv(){
			$shopid = ICookie::get('adminshopid');
	    $imglist =IFilter::act(IReq::get('imglist'));
	    $links = IUrl::creatUrl('shop/shoplunadv');
	    if(empty($imglist)) $this->message('图片不能为空',$links);
	    $data['imglist'] = join(',',$imglist);
	    $this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$shopid."'");
	    $this->success('操作成功',$links);
	}


}



?>