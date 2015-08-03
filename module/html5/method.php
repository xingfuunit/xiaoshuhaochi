<?php
/*
*   method 方法  包含所有会员相关操作
    管理员/会员  添加/删除/编辑/用户登陆
    用户日志其他相关连的通过  memberclass关联
*/
class method   extends baseclass
{
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
	    	            $link = IUrl::creatUrl('html5/shoplist');
	    	            $this->message('',$link);
	       }


	    }

	 }
	 function marketps(){
	 	$id =IFilter::act(IReq::get('id'));
	 	$areagrade = Mysite::$app->config['area_grade'];
		 if($id > 0){
		 	  if($areagrade > 1)
		 	  {
		 	  	  $checkinfo =  $this->mysql->select_one("select id,name,parent_id from ".Mysite::$app->config['tablepre']."area where id=".$id."  ");
		 	  	  if($checkinfo['parent_id'] > 0){
		 	  	  	if($areagrade > 2){
		 	  	  		 $checkinfo2 =  $this->mysql->select_one("select id,name,parent_id from ".Mysite::$app->config['tablepre']."area where id=".$checkinfo['parent_id']."  ");
		 	  	  		 if($checkinfo2['parent_id'] > 0){
		 	  	  		 	  ////设置区域
		 	  	  		 	  $arealist = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id = ".$id." order by orderid asc ");
	    	           	ICookie::set('lng',$arealist['lng'],2592000);
	                	ICookie::set('lat',$arealist['lat'],2592000);
	    	            ICookie::set('mapname',$arealist['name'],2592000);
	    	            ICookie::set('myaddress',$arealist['id'],2592000);
	    	            $cookmalist = ICookie::get('cookmalist');
	    	            $cooklnglist = ICookie::get('cooklnglist');
	    	            $cooklatlist = ICookie::get('cooklatlist');
	    	            $link = IUrl::creatUrl('html5/market');
	    	            $this->message('',$link);
		 	  	  		 }
		 	  	  	}else{
		 	  	  		$arealist = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id = ".$id." order by orderid asc ");
	    	       	ICookie::set('lng',$arealist['lng'],2592000);
	            	ICookie::set('lat',$arealist['lat'],2592000);
	    	        ICookie::set('mapname',$arealist['name'],2592000);
	    	        ICookie::set('myaddress',$arealist['id'],2592000);
	    	        $cookmalist = ICookie::get('cookmalist');
	    	        $cooklnglist = ICookie::get('cooklnglist');
	    	        $cooklatlist = ICookie::get('cooklatlist');
	    	        $link = IUrl::creatUrl('html5/market');
	    	        $this->message('',$link);
		 	  	  	}
		 	  	  }

		 	  }else{
		 	  	//设置区域
	    	  $arealist = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id = ".$id." order by orderid asc ");
	    	 	ICookie::set('lng',$arealist['lng'],2592000);
	      	ICookie::set('lat',$arealist['lat'],2592000);
	    	  ICookie::set('mapname',$arealist['name'],2592000);
	    	  ICookie::set('myaddress',$arealist['id'],2592000);
	    	  $cookmalist = ICookie::get('cookmalist');
	    	  $cooklnglist = ICookie::get('cooklnglist');
	    	  $cooklatlist = ICookie::get('cooklatlist');
	    	  $link = IUrl::creatUrl('html5/market');
	    	  $this->message('',$link);
		 	  }
		 }
	 }
	 function shoplist(){
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
	 function market(){
	     $psset = Mysite::$app->config['psset'];
	    $locationtype = 0;
      if(!empty($psset)){
	      	 $psinfo = unserialize($psset);
	      	 $locationtype = $psinfo['locationtype'];
	    }
	    $where = $this->marketsearch($locationtype);
	   $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."    order by sort asc limit 0,100");
	   $data['findtype'] = 0;
	   if(empty($shopinfo)){
	   	 $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id    order by sort asc limit 0,100");
	   	 $data['findtype'] = 1;
	   }

	   $data['shopinfo'] = $shopinfo;

	   $data['catlist'] = $this->setcatlist($shopinfo['id']);
	   Mysite::$app->setdata($data);
	 }
	 function setcatlist($shopid){

  	$temp = array();
  	$catlist =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."marketcate where shopid='".$shopid."' and parent_id = 0  order by orderid asc limit 0,100");
  	if(is_array($catlist)){
  		foreach($catlist as $key=>$value){
  			$value['det'] =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."marketcate where shopid='".$shopid."' and parent_id =".$value['id']."  order by orderid asc limit 0,100");
  			$value['ids'] = '';
  			if(is_array($value['det'])){
  				$temc = array();
  			  foreach($value['det'] as $k=>$v){
  			     $temc[] = $v['id'];
  			  }
  			  $value['ids'] = join(',',$temc);
  			}
  			$temp[] = $value;
  		}
  	}
  	return $temp;
  }
	 function marketsearch($locationtype){
	 	    //搜索信息
	 	     $where = '';
	 	     if($locationtype == 1){
	 	    	  $nowadID = ICookie::get('myaddress');
	 	        $myaddressname= ICookie::get('mapname');  //
	 	        $lng= ICookie::get('lng');
	 	        $lat= ICookie::get('lat');
	 	        $lng = empty($lng)?0:$lng;
	 	        $lat = empty($lat)?0:$lat;
	 	        $shopsearch = IFilter::act(IReq::get('shopsearch'));
		        $data['shopsearch'] = $shopsearch;
		        if(!empty($shopsearch)) $where .= empty($where)?" where shopname like '%".$shopsearch."%' ":" and shopname like '%".$shopsearch."%' ";
		        $bili = intval(Mysite::$app->config['servery']/1000);
		        $bili = $bili*0.009;
		        $where .= empty($where) ? ' where id > 0 and endtime > '.time().' and  SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) < '.$bili.' ':' and id > 0 and endtime > '.time().'  and SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) < '.$bili.' ';
		     }else{
	 	    	//文字定位
	 	    	 $nowadID = ICookie::get('myaddress');
	         $myaddressname= ICookie::get('mapname');
	         if($nowadID > 0){
	           $where = empty($where)?" where id in(select shopid from ".Mysite::$app->config['tablepre']."areamarket where areaid = ".$nowadID." ) ":$where." and id in(select shopid from ".Mysite::$app->config['tablepre']."areamarket where areaid = ".$nowadID." ) ";
	         }
		       $shopsearch = IFilter::act(IReq::get('shopsearch'));
		       if(!empty($shopsearch)) $where .= empty($where)?" where shopname like '%".$shopsearch."%' ":" and shopname like '%".$shopsearch."%' ";
		       $where .= empty($where) ? ' where id > 0 and endtime > '.time().' ':' and id > 0 and endtime > '.time().' ';
	 	     }
	 	    return $where;
	 }
	 function shop(){
	 	  $id = IFilter::act(IReq::get('id'));
	 	   $data['shopinfo']  =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$id."'    ");
	 	   Mysite::$app->setdata($data);
	 }
	 function shopshow(){
	 	   $id = IFilter::act(IReq::get('id'));
	 	  $shopinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$id."'    ");


	   $data['mainattr'] = array();
     $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = ".$shopinfo['shoptype']." and parent_id = 0 and is_main =1  order by orderid asc limit 0,1000");
		 foreach($templist as $key=>$value){
	  	 $value['det'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20");
	  	 $data['mainattr'][] = $value;
	 	 }
	  //获取店铺主属性
	  	$data['shopattr'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr  where  cattype = ".$shopinfo['shoptype']." and shopid = '".$shopinfo['id']."'  order by firstattr asc limit 0,1000");
	  	 $data['shopinfo'] = $shopinfo;
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
                     // $backdata['surecost'] = number_format($cxinfo['surecost'],2,'.','');
        	      $backdata['surecost'] = $cxinfo['surecost'];
        	      $backdata['downcost'] = $cxinfo['downcost'];
        	      $backdata['gzdata'] = isset($cxinfo['gzdata'])?$cxinfo['gzdata']:array();



                $tempinfo =   $this->pscost($shopcheckinfo,$backdata['sumcount']);
                $backdata['pstype'] = $tempinfo['pstype'];
                $backdata['pscost'] =$cxinfo['nops'] == true?0:$tempinfo['pscost']; // $tempinfo['pscost'];
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
	function member(){
			$link = IUrl::creatUrl('html5/login');
	    if($this->member['uid'] == 0)  $this->message('',$link);
	}
	function order(){
			$link = IUrl::creatUrl('html5/login');
	    if($this->member['uid'] == 0)  $this->message('',$link);
	}
	function getmember(){
		$openid =   IFilter::act(IReq::get('openid'));  //openid='.$this->obj->FromUserName.'&='.$time.'&=
		   	   $actime =  IFilter::act(IReq::get('actime'));
		   	   $sign =  IFilter::act(IReq::get('sign'));
		   	   $mycode = Mysite::$app->config['wxtoken'];
		   	   $checkstr = md5($mycode.$actime);
		   	   $checkstr = substr($checkstr,3,15);
		   	     logwrite('判断是否是微信openid:'.$openid.'##actime'.$actime.'#sign='.$sign);
		   	   if($checkstr == $sign && !empty($openid)){
		   	   	 logwrite('报信微信用户信息'.'判断用户是否被添加到 数据');
		   	   	  $checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."wxuser where openid ='".$openid."' ");
		   	   	  if(!empty($checkinfo)){
		   	   	       ICookie::set('logintype','wx',86400);
		   	   	       ICookie::set('wxopenid',$openid,86400);
		   	   	      logwrite('报信微信用户信息'.$openid);
		   	      }
		   	   }
		   	   echo '';
		   	   exit;
	}
	function apilogin(){

	//	$reload =  IFilter::act(IReq::get('reload'));
		logwrite('baoc');
	//	logwrite($reload);

    $links = empty($reload)?IUrl::creatUrl('html5/index'):$reload;
	         $openid =   IFilter::act(IReq::get('openid'));  //openid='.$this->obj->FromUserName.'&='.$time.'&=
		   	   $actime =  IFilter::act(IReq::get('actime'));
		   	   $sign =  IFilter::act(IReq::get('sign'));
		   	   $mycode = Mysite::$app->config['wxtoken'];
		   	   $checkstr = md5($mycode.$actime);
		   	   $checkstr = substr($checkstr,3,15);
		   	     logwrite('判断是否是微信openid:'.$openid.'##actime'.$actime.'#sign='.$sign);
		   	   if($checkstr == $sign && !empty($openid)){
		   	   	 logwrite('报信微信用户信息'.'判断用户是否被添加到 数据');
		   	   	  $checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."wxuser where openid ='".$openid."' ");
		   	   	  if(!empty($checkinfo)){
		   	   	       ICookie::set('logintype','wx',86400);
		   	   	       ICookie::set('wxopenid',$openid,86400);
		   	   	      logwrite('报信微信用户信息'.$openid);
		   	      }
		   	   }

		   	    echo 'xxxxxxxxxxx';
		 exit;
		  exit;
	}
	function login(){
		  $link = IUrl::creatUrl('html5/member');
	    if($this->member['uid'] > 0)  $this->message('',$link);
	}
	function reg(){
		  $link = IUrl::creatUrl('html5/member');
	    if($this->member['uid'] > 0)  $this->message('',$link);
	}
	function forgot(){
		  $link = IUrl::creatUrl('html5/member');
	    if($this->member['uid'] > 0)  $this->message('',$link);
	}
	function loginout(){
		  $this->memberCls->loginout();
      $link = IUrl::creatUrl('html5/index');
      $this->refunction('',$link);
	}
	function userorder(){
			$link = IUrl::creatUrl('html5/login');
	 if($this->member['uid'] == 0)  $this->message('',$link);
	  $pageinfo = new page();
	  $pageinfo->setpage(intval(IReq::get('page')),8);
		$datalist = $this->mysql->getarr("select id,shopname,allcost,addtime,status,is_ping,shoptype from ".Mysite::$app->config['tablepre']."order where buyeruid='".$this->member['uid']."'  order by id desc limit ".$pageinfo->startnum().", ".$pageinfo->getsize()."");
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
		 	$link = IUrl::creatUrl('html5/login');
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
	function collect(){
	//收藏
		$link = IUrl::creatUrl('html5/login');
	   if($this->member['uid'] == 0)  $this->message('',$link);
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
			 //  INPUT IMG  checkbox
			 $where = " where uid=".$this->member['uid']."  and collecttype = '0' "; //条件
			 $shoucangl = $this->mysql->getarr("select collectid from ".Mysite::$app->config['tablepre']."collect ".$where." order by id desc limit 0, 5");
			 $list = array();
			 if(count($shoucangl) > 0 )
			 {

			 	  $ids = '';
			 	  foreach($shoucangl as $key=>$value)
			 	  {
			 	  	$ids .= $value['collectid'].',';
			 	  }
			 	  $ids = substr($ids,0,strlen($ids)-1);//FIND_IN_SET( ".$nowadID.", areaid )
			 	  $list = $this->mysql->getarr("select b.id,a.shopid,b.shoplogo,b.is_open,a.is_orderbefore,b.starttime,b.shopname,a.limitcost from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id and  FIND_IN_SET( id, '".$ids."' )   order by sort asc limit 0,100");
			 	  $nowhour = date('H:i:s',time());
          $nowhour = strtotime($nowhour);
          $templist = array();
          if(is_array($list)){
			 	     foreach($list as $keys=>$values){

			 	     		if($values['id'] > 0){
			 	     			  $values['shoplogo'] = empty($values['shoplogo'])? Mysite::$app->config['siteurl'].Mysite::$app->config['shoplogo']:Mysite::$app->config['siteurl'].$values['shoplogo'];
			             $checkinfo = $this->shopIsopen($values['is_open'],$values['starttime'],$values['is_orderbefore'],$nowhour);
			             $values['opentype'] = $checkinfo['opentype'];
			             $values['newstartime']  =  $checkinfo['newstartime'];
			             $attrdet = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr where  cattype = 1 and shopid = ".$values['id']."");
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
	        $list  = $templist;
			 }
			 $data['list'] = $list;
			 Mysite::$app->setdata($data);
	}
	function editaddress(){
		$link = IUrl::creatUrl('html5/login');
	  if($this->member['uid'] == 0)  $this->message('',$link);
	}
	function modifypwd(){
			$link = IUrl::creatUrl('html5/login');
	  if($this->member['uid'] == 0)  $this->message('',$link);
	}
	function address(){
		$link = IUrl::creatUrl('html5/login');
	  if($this->member['uid'] == 0)  $this->message('',$link);
	  $tarelist = $this->mysql->getarr("select id,phone,address,contactname,`default`  from ".Mysite::$app->config['tablepre']."address where userid='".$this->member['uid']."'   order by id asc limit 0,50");
	  $arelist = array();
	  $areaid=array();
	  $data['arealist'] = $tarelist;
	  $data['areaarr'] = $arelist;
	  Mysite::$app->setdata($data);
	}
	function buycart(){

		 $psset = Mysite::$app->config['psset'];
     $psinfo = unserialize($psset);
      $data['areainfo'] = '';
     $nowID = ICookie::get('myaddress');
     $data['locationtype'] = $psinfo['locationtype'];
		  if(empty($nowID)){
		     $link = IUrl::creatUrl('html5/index');
	     	 $this->message('请先选择您所在区域在进行下单',$link);
		  }
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
		  $data['myaddressslist'] = array();
		  $tempre = '';

		  if($this->member['uid'] > 0){
		  	$data['myaddressslist'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."address  where  userid=".$this->member['uid']." and `default` = 1");
		  }


	   $shopid = intval(IReq::get('id'));
		 //获取店铺配送时间

		 $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where shopid = ".$shopid."   ");
		 if(empty($shopinfo)){
		 	 $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where shopid = ".$shopid."   ");
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
		     	  		  if($whtime < $etime && $whtime >= $nowtime&& $whtime > $dototime){
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
	   $data['paylist']  = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id desc  ");
          $gustAddress = "";
          @$gustAddress = $_COOKIE['gustAddress'];
           if ($gustAddress) {

               $data['gustinfo'] = unserialize($gustAddress);

            }else{
                 $data['gustinfo'] = "";

            }

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
	function makeorder(){
		 $info['shopid'] = intval(IReq::get('shopid'));//店铺ID
		 $info['remark'] = IFilter::act(IReq::get('remark'));//备注
		 $info['paytype'] = IFilter::act(IReq::get('paytype'));;//支付方式IFilter::act(IReq::get('paytype'));//支付方式
		 $info['dikou'] = 0;//intval(IReq::get('dikou'));//抵扣金额
	 	 $info['username'] = IFilter::act(IReq::get('username'));
		 $info['mobile'] = IFilter::act(IReq::get('mobile'));
		 $info['addressdet'] = IFilter::act(IReq::get('addressdet'));
		 $info['senddate'] = date('Y-m-d',time());// IFilter::act(IReq::get('senddate'));
		 $info['minit'] = IFilter::act(IReq::get('minit'));
		 $info['juanid']  = 0;//intval(IReq::get('juanid'));//优惠劵ID
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
		 $data['shopcost'] = $carinfo['list'][$info['shopid']]['sum'];
		 $data['shopps'] = $checkps['pscost'];
		 $data['bagcost'] =  $carinfo['list'][$info['shopid']]['bagcost'];
		 //支付方式检测
		 $data['paytype'] = $info['paytype'];
		 $paytype = $info['paytype'];
		 if($paytype != 'outpay'){
			 if($paytype == 'open_acout'){
		   /*  if(Mysite::$app->config['open_acout'] != 1 || $userid == 0){
		  	    $data['paytype'] = 'outpay';
		     }*/
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
		$data['pstype'] = $checkps['pstype'] ;
		$data['shoptype'] = $shopinfo['shoptype'];
		//检测店铺
		//$senddate = $info['senddate'];
		//$minit = $info['minit'];
	  //$nowpost = strtotime($senddate.' '.$minit.':00');

	  	    $settime = time() - (10*60);
	  	   // if($settime > $nowpost)  $this->message('提交配送时间和服务器时间相差超过10分钟下单失败');
	  	    $temp = strtotime($minit.':00');
	  	    $is_orderbefore = $shopinfo['is_orderbefore'] == 0?0:$shopinfo['befortime'];
	  	    $tempinfo = $this->checkshopopentime($is_orderbefore,$nowpost,$shopinfo['starttime']);
	  	    if(!$tempinfo) $this->message('配送时间不在有效配送时间范围');
	  	    if($shopinfo['is_open'] != 1) $this->message('店铺暂停营业');
	  	    if($shopinfo['limitcost'] > $allcost ) $this->message('商品总价低于最小起送价'.$shopinfo['limitcost']);
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
	function subshow(){
	  $orderid = intval(IReq::get('orderid'));
		$userid = empty($this->member['uid'])?0:$this->member['uid'];
		$orderid = intval(IReq::get('orderid'));
		if(empty($orderid)) $this->message('订单获取失败');
		if($userid == 0){
			$neworderid = ICookie::get('orderid');
			if($orderid != $neworderid) $this->message('订单无查看权限1');
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
		$paytypelist = array('outpay'=>'货到支付','open_acout'=>'账号余额支付');
		$paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
		if(is_array($paylist)){
		  foreach($paylist as $key=>$value){
			    $paytypelist[$value['loginname']] = $value['logindesc'];
		  }
	  }
		$paytypearr = $paytypelist;

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
            $link = IUrl::creatUrl('html5/gotopay&orderid='.$orderid);
            $this->message('订单生成成功',$link);
        }

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

		$paydir = hopedir.'/plug/pay/'.$paytype;
	 	if(!file_exists($paydir.'/pay.php'))
    {
      	$this->message('支付方式文件不存在');
    }
    $dopaydata = array('type'=>'order','upid'=>$orderid,'cost'=>$orderinfo['allcost']);//支付数据
     if ($orderinfo['paytype'] == "weixin") {
    	//echo $paydir.'/wxsite/pay.php';
    ///data/www/xshc/wmr//plug/pay/weixin/wxsite/pay.php

    	include_once($paydir.'/wxsite/pay.php');
    } else {
    	include_once($paydir.'/pay.php');
    }
    //调用方式  直接调用支付方式
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
           if ($res) {
               echo json_encode(array('success'=>'yes','msg'=>'保存成功'));exit;
           }

        }

}



?>
