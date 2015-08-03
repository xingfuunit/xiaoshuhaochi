<?php
class method   extends baseclass
{   
   
  function index(){
     /*  商品分类  */ 
      $psset = Mysite::$app->config['psset'];
	    $locationtype = 0;  
      if(!empty($psset)){
	      	 $psinfo = unserialize($psset);
	      	 $locationtype = $psinfo['locationtype']; 
	    }
	    $where = $this->search($locationtype);  
	   $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."      limit 0,100");  
	   $data['findtype'] = 0;
	   if(empty($shopinfo)){
	   	 $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id    order by sort asc limit 0,100");  
	   	 $data['findtype'] = 1;
	   }
	   
	   $data['shopinfo'] = $shopinfo; 
	   
	   $data['catlist'] = $this->setcatlist($shopinfo['id']); 
	   Mysite::$app->setdata($data); 
  }
  function showgoods(){
   
  	  $psset = Mysite::$app->config['psset'];
	    $locationtype = 0;  
      if(!empty($psset)){
	      	 $psinfo = unserialize($psset);
	      	 $locationtype = $psinfo['locationtype']; 
	    }
	    $id = intval(IFilter::act(IReq::get('id'))); 
      $goodsinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."goods where   id =".$id." and shoptype = 1 order by id asc limit 0,100");  
      if(empty($goodsinfo)){
      	$link = IUrl::creatUrl('market/index'); 
      	$this->message('数据获取失败',$link);
      }
      $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where b.id = ".$goodsinfo['shopid']."    order by sort asc limit 0,100");  
      $data['findtype'] = 0;
	    if(empty($shopinfo)){
	      	 $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id    order by sort asc limit 0,100");  
	     	  $data['findtype'] = 1;
	    }
	    $data['catinfo'] =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."marketcate where   id =".$goodsinfo['typeid']."  order by orderid asc limit 0,100");  
      $data['shopinfo'] = $shopinfo;
      $data['catlist'] = $this->setcatlist($shopinfo['id']); 
      $data['goodsinfo'] = $goodsinfo;
       Mysite::$app->setdata($data);
  }
  function cat(){ 
  	 $psset = Mysite::$app->config['psset'];
	    $locationtype = 0;  
      if(!empty($psset)){
	      	 $psinfo = unserialize($psset);
	      	 $locationtype = $psinfo['locationtype']; 
	    }
      $id = intval(IFilter::act(IReq::get('id'))); 
      $catinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."marketcate where   id =".$id."  order by orderid asc limit 0,100");  
      $data['catinfo'] = $catinfo;
      $data['findtype'] = 0;
      if(empty($catinfo)){
      	 $where = $this->search($locationtype);  
	       $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."     limit 0,100");  
	     
	       if(empty($shopinfo)){
	       	 $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id    order by sort asc limit 0,100");  
	       	 $data['findtype'] = 1;
	       }
      	 
      }else{
         $shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where b.id=".$catinfo['shopid']."  order by sort asc limit 0,100");  
      }
     
      $datawhere = '';
      if(!empty($catinfo)){
      	if($catinfo['parent_id'] >  0){
          $datawhere = " shopid = ".$catinfo['shopid']." and typeid = ".$id;
        }else{
        	 $tempids = $this->mysql->getarr("select id from ".Mysite::$app->config['tablepre']."marketcate where shopid='".$shopinfo['id']."' and parent_id = ".$id."  order by orderid asc limit 0,100");  
        	 $temp_c = array();
        	 if(is_array($tempids)){
        	     foreach($tempids as $key=>$value){
        	     	$temp_c[] = $value['id'];
        	     }
        	 }
        	 $trmp_str = join(',',$temp_c);
        	 if(!empty($trmp_str)){
        	  	 $datawhere = " shopid = ".$catinfo['shopid']." and typeid in(".$trmp_str.")";
        	 }else{
        	 	 $datawhere = " shopid = ".$catinfo['shopid'];
        	 }
        }
      }  
      $data['where'] = $datawhere;
      $data['shopinfo'] = $shopinfo; 
      $data['catlist'] = $this->setcatlist($shopinfo['shopid']); 
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
   function search($locationtype){
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
		        $where .= empty($where) ? ' where id > 0 and endtime > '.time().' and  SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) < (`pradius`*0.0015) order by  SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) asc  ':' and id > 0 and endtime > '.time().'  and SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) < (`pradius`*0.0015)  order by  SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) asc ';
		     }else{
	 	    	//文字定位
	 	    	 $nowadID = ICookie::get('myaddress'); 
	         $myaddressname= ICookie::get('mapname');  
	         if($nowadID > 0){ 
	           $where = empty($where)?" where id in(select shopid from ".Mysite::$app->config['tablepre']."areamarket where areaid = ".$nowadID." ) ":$where." and id in(select shopid from ".Mysite::$app->config['tablepre']."areamarket where areaid = ".$nowadID." ) ";   
	         }  
		       $shopsearch = IFilter::act(IReq::get('shopsearch')); 
		       if(!empty($shopsearch)) $where .= empty($where)?" where shopname like '%".$shopsearch."%' ":" and shopname like '%".$shopsearch."%' ";
		       $where .= empty($where) ? ' where id > 0 and endtime > '.time().' order by sort asc':' and id > 0 and endtime > '.time().' order by sort asc';  
	 	     }  
	 	    return $where;
	 } 
  function cart(){
  		$data['sitetitle'] = '购物车';
		$gooids = $_COOKIE["market_id"];
		$market_count = $_COOKIE["market_count"];
		if(empty($gooids)){
		  $this->message('购物车商品为空');
		}
		$gidinfo = explode(',',$gooids);
		$gidconut = explode(',',$market_count);
		$tempids = array();
		foreach($gidinfo as $key=>$value){
			if(intval($value) > 0){
			$tempids[$value] = $gidconut[$key];
		  }
		}
		$cartlist = array();
		 
		$goodsshu = 0; 
		$query = join(',',array_keys($tempids));
		if(!empty($query)){
		    $goodsinfo = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goods where id in(".$query.") and shopid =0"); 
		    foreach($goodsinfo as $key=>$value){
		    	$value['buycount'] = $tempids[$value['id']];
		    	$value['sum'] = $value['buycount']*$value['cost'];
		    	$cartlist[] = $value;
		    	$goodsshu +=$value['buycount'];
		    } 
	  } 
	  $data['cartlist'] = $cartlist; 
	  //获取配送费
	   $checkps = 	 $this->pscost(array('shopid'=>0),$goodsshu);  
	   if($checkps['canps'] != 1){
        $link = IUrl::creatUrl('site/guide');
	      $this->message('该店铺不在配送范围内',$link); 
     } 
     $data['pscost'] = $checkps['pscost'];
	   $psinfo = unserialize(Mysite::$app->config['psset']);
	    $data['areainfo'] = '';
     $nowID = ICookie::get('myaddress');
     $data['locationtype'] = $psinfo['locationtype'];
	  if($psinfo['locationtype'] == 1){
	  	//百度地图
	  	$data['areainfo'] = ICookie::get('mapname');
	  	if(empty($data['areainfo'])){
	  		 $link = IUrl::creatUrl('site/guide');
	     	 $this->message('请先选择您所在区域在进行下单',$link); 
	  	} 
	  }else{ 
	  	$data['areainfo'] = ICookie::get('mapname');
		  if(empty($nowID)){
		     $link = IUrl::creatUrl('site/guide');
	     	 $this->message('请先选择您所在区域在进行下单',$link); 
		  }  
		}
		$data['myaddressslist'] = array();
		$tempre = '';
		if(!empty($nowID)){
			$area_grade = Mysite::$app->config['area_grade']; 
			$temp_areainfo = '';
		  if($area_grade > 1){
		    $areainfocheck = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id=".$nowID."");
		    if(!empty($areainfocheck)){
		       $areainfocheck1 = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id=".$areainfocheck['parent_id']."");
		     
		       if(!empty($areainfocheck1)){
		    	     $temp_areainfo = $areainfocheck1['name'];
		    	     if($area_grade > 2){
		    		      $areainfocheck2 = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id=".$areainfocheck1['parent_id']."");
		    		      if(!empty($areainfocheck2)){
		    		      	$temp_areainfo = $areainfocheck2['name'].$temp_areainfo;
		    		      }
		    		
		      	   }
		       } 
		    	$tempre = $temp_areainfo.$tempre;
		    } 
		  } 
		  if($this->member['uid'] > 0){ 
		  	$data['myaddressslist'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."address  where areaid".$area_grade."=".$nowID.""); 
		  }
	  }
	   
	  if(isset($data['myaddressslist']['address'])){
	  	$data['areainfo'] = $tempre.$data['myaddressslist']['address'];
	  }else{
	  	$data['areainfo'] = $tempre.$data['areainfo'];
	  }
	  //获取默认配送所有地址
	  
	   
	   $data['open_acout'] = Mysite::$app->config['open_acout'];
	  $data['paylist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id desc  "); 
	   // 
	  $data['starttime'] = Mysite::$app->config['marketstarttime'];
	   $data['marketlong'] = Mysite::$app->config['marketlong'];
	    
	   $data['juanlist'] = array();
	  if(!empty($this->member['uid'])){
	    $data['juanlist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan  where uid ='".$this->member['uid']."'  and status = 1 and endtime > ".time()."  order by id desc limit 0,20");
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
   function order(){
   	 $this->checkshoplogin();
   }
   function goodslist(){
   	   $this->checkadminlogin();
   }
  
	  
}



?>