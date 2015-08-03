<?php
class method   extends baseclass
{
	 //店铺列表页
	 function index(){


            // echo $this->member['uid'];exit;
                if (!ICookie::get('lng')) {
                    $link = IUrl::creatUrl('site&action=setlocationlink&areaid=27');
          header("Location:".$link);


                }
	 	if(Mysite::$app->config['sitetemp'] == 'gaodashang'){
	 		$this->gaodashang();
	 	}elseif(Mysite::$app->config['sitetemp'] == 'dianwoba'){
	 	   $this->dianwoba();
	 	}else{



	 	    $this->gettopcollect();
	      $psset = Mysite::$app->config['psset'];
	      //店铺的cattype
	      $locationtype = 0;
	           $attrshop = array();
		         $data['attrinfo'] = array();
             $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = 0 and parent_id = 0 and is_search =1  order by orderid asc limit 0,1000");
		         foreach($templist as $key=>$value){
	          	 $value['det'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20");
	          	 $value['is_now'] = isset($seardata[$value['id']])?$seardata[$value['id']]:0;
	          	 $data['attrinfo'][] = $value;
	 	         }
	 	         //获取搜索属性性结束


	 	         //获取展示属性
		         $data['mainattr'] = array();
             $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = 0 and parent_id = 0 and is_main =1  order by orderid asc limit 0,1000");
		         foreach($templist as $key=>$value){
	          	 $value['det'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20");
	          	 $data['mainattr'][] = $value;
	 	         }

                   $goods = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shop as a left join ".Mysite::$app->config['tablepre']."goods as b on a.id = b.shopid where a.id=190 and is_goshop=0");
                   $shop_id=190;
                   $data['shopinfo'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where  id='".$shop_id."' ");
                    $data['index_goods']=$goods;


	      if(!empty($psset)){
	      	 $psinfo = unserialize($psset);
	      	 $locationtype = $psinfo['locationtype'];
	      }
	      $where = $this->search($locationtype);

	      $shopsearch = IFilter::act(IReq::get('shopsearch'));


		    $data['shopsearch'] = $shopsearch;
		    $list = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."    order by sort asc limit 0,100");

		    $nowhour = date('H:i:s',time());
		    $nowhour = strtotime($nowhour);
		    $templist = array();
		    if(is_array($list)){//转换数据
		       foreach($list as $key=>$value){
		           	if($value['id'] > 0){
		        	     $checkinfo = $this->shopIsopen($value['is_open'],$value['starttime'],$value['is_orderbefore'],$nowhour);
		        	     $value['opentype'] = $checkinfo['opentype'];
		        	     $value['newstartime']  =  $checkinfo['newstartime'];

		        	      $ps  = $this->pscost($value,10);
		        	     $value['pscost'] = $ps['pscost'];

		        	    //每个店铺属性
		        	     $value['attrdet'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr where  cattype = 0 and shopid = '".$value['id']."' ");//每个商品的属性值
		        	     $tempinfo = array();
		        	     foreach($value['attrdet'] as $keys=>$valx){
		        	    	  $tempinfo[] = $valx['attrid'];
		        	     }
		        	     $value['servertype'] = join(',',$tempinfo);
		         	     $templist[] = $value;
		             }
		       }
	      }
                    $data['uid'] = $this->member["uid"];
		    $data['shoplist'] = $templist;
	 	    if($locationtype == 1){
	 	    	  //地图定位
		         Mysite::$app->setdata($data);
	 	    	   Mysite::$app->setAction('mapindex');
	 	    }else{
	 	    	//文字定位
	 	    	 Mysite::$app->setdata($data);
	 	    	 Mysite::$app->setAction('index');
	 	    }
	 	  }

	 }
	 function gaodashang(){

	      $arealist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area where parent_id = 0   order by id asc limit 0,50");
	      $shopidarray  = array();
	      $indexarea = array();
	      foreach($arealist as $key=>$value){
	      	$areadet = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area where parent_id = ".$value['id']."   order by id asc limit 0,50");
	      	$areacom = array();
	      	foreach($areadet as $k=>$v){
	      	  if($v['is_com'] == 1){

	      	    $shopidlist  =  $this->mysql->getarr("select shopid from ".Mysite::$app->config['tablepre']."areashop where areaid = ".$v['id']." and shopid > 0  group  by shopid   limit 0,50");

	      	    $v['shopids'] = array();
	      	    foreach($shopidlist as $m=>$t){
	      	      $v['shopids'][] = $t['shopid'];
	      	      $shopidarray[] = $t['shopid'];
	      	    }
	      	    //endtime    是否营业
	      	    $areacom[] = $v;
	      	  }
	      	}
	      	$value['det'] = $areadet;
	      	$value['areacom'] = $areacom;
	      	$indexarea[] = $value;
	      }
	      $shoplist = array();
	      if(count($shopidarray) > 0){
	          $temp = array_unique($shopidarray);
	          $temp_str = join(',',$temp);

	          if(!empty($temp_str)){
	          	$temp_shoplist  =  $this->mysql->getarr("select b.id,b.shopname,b.shoplogo,b.point,b.pointcount,a.limitstro,a.personcost,b.starttime,a.limitcost from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where b.endtime > ".time()."  and is_open = 1 and is_pass = 1 and a.shopid in(".$temp_str.") and a.is_com = 1 order  by sort  asc");

	          	foreach($temp_shoplist as $key=>$value){
	          		$shoplist[$value['id']] = $value;
	          	}

	          }
	      }
	      $data['indexarea'] = $indexarea;
	      $data['shoplist'] = $shoplist;
	      Mysite::$app->setdata($data);

	 }
	 function dianwoba(){
	   	$areado =  $this->mysql->getarr("select  * from ".Mysite::$app->config['tablepre']."area where parent_id = 0");
	 	    $dotemp = array();
	 	    foreach($areado as $key=>$value){
	 	    	 $value['det'] = $this->mysql->getarr("select  * from ".Mysite::$app->config['tablepre']."area where parent_id = ".$value['id']."");
	 	    	 $dotemp[] = $value;
	 	    }
	 	    $data['arealist'] = $dotemp;
	 	   $data['recomshop'] =  $this->mysql->getarr("select b.id,b.shortname,b.shopname,b.shoplogo,a.shopid from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where   b.is_open = 1 and b.is_pass = 1 and a.is_com =1 limit 0,32");
		   Mysite::$app->setdata($data);
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
		          $where .= empty($where) ? ' where id > 0 and endtime > '.time().' and  SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) < (`pradius`*0.0015) ':' and id > 0 and endtime > '.time().'  and SQRT((`lat` -'.$lat.') * (`lat` -'.$lat.' ) + (`lng` -'.$lng.' ) * (`lng` -'.$lng.' )) < (`pradius`*0.0015) ';//0.009/6 = 0.0015
		     }else{
	 	    	//文字定位
	 	    	  $nowadID = ICookie::get('myaddress');
	         $myaddressname= ICookie::get('mapname');
	         if($nowadID > 0){
	           $where = empty($where)?" where id in(select shopid from ".Mysite::$app->config['tablepre']."areashop where areaid = ".$nowadID." ) ":$where." and id in(select shopid from ".Mysite::$app->config['tablepre']."areashop where areaid = ".$nowadID." ) ";
	         }
		       $shopsearch = IFilter::act(IReq::get('shopsearch'));
		       if(!empty($shopsearch)) $where .= empty($where)?" where shopname like '%".$shopsearch."%' ":" and shopname like '%".$shopsearch."%' ";
		       $where .= empty($where) ? ' where id > 0 and endtime > '.time().' ':' and id > 0 and endtime > '.time().' ';



	 	     }
	 	    return $where;
	 }
	 function ajaxshopinfo()
	 {
		  $shop_id = intval(IReq::get('shop_id'));
		  $data['shopinfo'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where  id='".$shop_id."' ");
		  if(empty($data['shopinfo']))
		  {
		   	echo 'not find';
			  exit;
		  }
		  $data['attr'] = array();
      $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = 0 and parent_id = 0   order by orderid asc limit 0,1000");
		  foreach($templist as $key=>$value){
	  	   $value['det'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20");
	  	   $data['attr'][] = $value;
	 	  }
		  $nowhour = date('H:i:s',time());
		  $data['nowhour'] = strtotime($nowhour);
	  	$checkinfo = $this->shopIsopen($data['shopinfo']['is_open'],$data['shopinfo']['starttime'],$data['shopinfo']['is_orderbefore'],$nowhour);
		  $data['shopinfo']['opentype'] = $checkinfo['opentype'];
	    $data['shopinfo']['newstartime']  =  $checkinfo['newstartime'];
	    $myaddress = ICookie::get('myaddress');
	    if(!empty($myaddress)){
	      $tempinfo =  $this->mysql->select_one("select cost from ".Mysite::$app->config['tablepre']."areatoadd   where  areaid='".$myaddress."' and shopid = '".$data['shopinfo']['id']."' ");
	  	  $data['shopinfo']['sendcost'] = $tempinfo['cost'];
	     	$data['shopinfo']['attrdet'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr where  cattype = 0 and shopid = '".$data['shopinfo']['id']."' ");
	    }
		  Mysite::$app->setdata($data);
	 }
	 function collect(){
	   $nowhour = date('H:i:s',time());
		 $data['nowhour'] = strtotime($nowhour);

		 $data['mainattr'] = array();
     $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = 0 and parent_id = 0 and is_main =1  order by orderid asc limit 0,1000");
		 foreach($templist as $key=>$value){
	  	 $value['det'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20");
	  	 $data['mainattr'][] = $value;
	 	 }
		  $data['signlist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodssign where type = 'shop'  order by id asc limit 0,100 ");
		 $this->gettopcollect();
     Mysite::$app->setdata($data);
	}
	function gettopcollect()
	{
		$data['collectlist'] ='';
		if(!empty($this->member['uid']))
		{
			 $where = " where uid=".$this->member['uid']."  and collecttype = '0' "; //条件
			 $shoucangl = $this->mysql->getarr("select collectid from ".Mysite::$app->config['tablepre']."collect ".$where." order by id desc limit 0, 5");
			 if(count($shoucangl) > 0 )
			 {

			 	  $ids = '';
			 	  foreach($shoucangl as $key=>$value)
			 	  {
			 	  	$ids .= $value['collectid'].',';
			 	  }
			 	  $ids = substr($ids,0,strlen($ids)-1);//FIND_IN_SET( ".$nowadID.", areaid )
			 	  $list = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id and  FIND_IN_SET( id, '".$ids."' )   order by sort asc limit 0,100");
			 	  $nowhour = date('H:i:s',time());
          $nowhour = strtotime($nowhour);
          $templist = array();
          if(is_array($list)){
			 	     foreach($list as $keys=>$values){

			 	     		if($values['id'] > 0){
			       $checkinfo = $this->shopIsopen($values['is_open'],$values['starttime'],$values['is_orderbefore'],$nowhour);
			       $values['opentype'] = $checkinfo['opentype'];
			       $values['newstartime']  =  $checkinfo['newstartime'];

			         $values['attrdet'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr where  cattype = 0 and shopid = ".$values['id']."");
			       $templist[] = $values;
			     }
	           }
	        }
	        $data['collectlist']  = $templist;
			 }

		}
		 Mysite::$app->setdata($data);
	}

	//选择地址
	 function guide(){
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
	 	$psset = Mysite::$app->config['psset'];
	  if(!empty($psset)){
	  	 $psinfo = unserialize($psset);
	  	if($psinfo['locationtype'] == 1){
	  		$surec = IFilter::act(IReq::get('surec'));
		    $data['searchvalue'] = '';
	   	  $data['result'] = array();
		    $cityname = '';
		    if($surec ==  1){
		    	$searchvalue= IFilter::act(IReq::get('searchvalue'));
		    	$cityname= IFilter::act(IReq::get('cityname'));
		    	$content =   file_get_contents('http://api.map.baidu.com/place/v2/search?ak='.Mysite::$app->config['baidumapkey'].'&output=json&query='.$searchvalue.'&page_size=12&page_num=0&scope=1&region='.$cityname);
		    	$backinfo = json_decode($content,true);
		    	$data['searchvalue'] =$searchvalue;
		      $data['result'] = $backinfo;
		    }
		     $nowID = ICookie::get('myaddress');
	       $lng = ICookie::get('lng');
	       $lat = ICookie::get('lat');
		     if(empty($nowID)){
		             $areainfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where parent_id = 0 order by orderid asc ");
		     }else{
		     	  $checkareaid = $nowID;
	          $dataareaids = array();
		       	while($checkareaid > 0){
	  	            $tempareainfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id ='".$nowID."'   order by id desc limit 0,50");
	  	            if(empty($tempareainfo)){
	  	              break;
	  	            }
	  	            $areainfo = $tempareainfo;
	  	            if(in_array($checkareaid,$dataareaids)){
	  	              break;
	  	            }
	  	            $dataareaids[] = $checkareaid;
	  	            $checkareaid = $areainfo['parent_id'];


	          }

		     }

		     $data['cityinfo'] = $areainfo;
		     $data['baidumapkey'] = Mysite::$app->config['baidumapkey'];
		     $checklng = intval($lng);
		     $data['dlng'] = empty($checklng)? $areainfo['lng']:$lng;
		     $checklat = intval($lat);
		     $data['dlat'] =empty($checklat)?$areainfo['lat']:$lat;//[lng] =>  [lat] => 34.805885
         $data['cityname'] = $areainfo['name'];
		     $data['sitetitle'] = '确定我的位置';
		     $data['arealist'] =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area where parent_id = 0 order by orderid asc ");

		      $cookmalist = ICookie::get('cookmalist');
		      $cooklnglist = ICookie::get('cooklnglist');
		      $cooklatlist = ICookie::get('cooklatlist');
		      $data['cookmalist'] = empty($cookmalist)?array():explode(',',$cookmalist);
		      $data['cooklnglist'] = empty($cooklnglist)?array():explode(',',$cooklnglist);
          $data['cooklatlist'] = empty($cooklatlist)?array():explode(',',$cooklatlist);

           Mysite::$app->setdata($data);
	 		   Mysite::$app->setAction('baidumap');
	   	}
	  }
	      Mysite::$app->setdata($data);

	}
	function searchdet(){
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
		Mysite::$app->setdata($data);
	}
	function searchchild(){
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
		Mysite::$app->setdata($data);
	}
	//设置地区值
	function setlocationlink($areaid=""){
                $areaid = IFilter::act(IReq::get('areaid'));
		  $arealist = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id = ".$areaid." order by orderid asc ");
		  ICookie::set('lng',$arealist['lng'],2592000);
	  	  ICookie::set('lat',$arealist['lat'],2592000);
		  ICookie::set('mapname',$arealist['name'],2592000);
		  ICookie::set('myaddress',$areaid,2592000);

		  $cookmalist = ICookie::get('cookmalist');
		  $cooklnglist = ICookie::get('cooklnglist');
		  $cooklatlist = ICookie::get('cooklatlist');
		  $check = explode(',',$cookmalist);
		  if(!in_array($arealist['name'],$check)){
		    $cookmalist = empty($cookmalist)?  $arealist['name'].',':$arealist['name'].','.$cookmalist;
		    $cooklatlist = empty($cooklatlist)?  $arealist['lat'].',':$arealist['lat'].','.$cooklatlist;
		    $cooklnglist = empty($cooklnglist)?  $arealist['lng'].',':$arealist['lng'].','.$cooklnglist;
		    ICookie::set('cookmalist',$cookmalist,2592000);
		    ICookie::set('cooklatlist',$cooklatlist,2592000);
		    ICookie::set('cooklnglist',$cooklnglist,2592000);
		  }
		  if(Mysite::$app->config['sitetemp'] == 'dianwoba'){
		  $link = IUrl::creatUrl('site/shoplist');
		  $this->message('',$link);
		 }else{

		  $link = IUrl::creatUrl('site/index');
		  $this->message('',$link);
		}
	}
	//通过百度地图设置地区值
	function setuserlng(){
		//setuserlng&mapname=郑州市七十一中&lat=34.784754&lng=113.654217
		$shopid = IFilter::act(IReq::get('shopid'));
		$lng = IFilter::act(IReq::get('lng'));
		$lat = IFilter::act(IReq::get('lat'));
		$mapname = IFilter::act(IReq::get('mapname'));
		$checklng = intval($lng);
		if(empty($checklng)){
			 $link = IUrl::creatUrl('site/guide');
		   $this->message('',$link);
		}
		$checklat = intval($lat);
		if(empty($checklat)){
			 $link = IUrl::creatUrl('site/guide');
		 	   $this->message('',$link);
		}
		ICookie::set('lng',$lng,2592000);
		ICookie::set('lat',$lat,2592000);
		ICookie::set('mapname',$mapname,2592000);
		ICookie::clear('myaddress');
		 $cookmalist = ICookie::get('cookmalist');
		  $cooklnglist = ICookie::get('cooklnglist');
		  $cooklatlist = ICookie::get('cooklatlist');
		  $check = explode(',',$cookmalist);
		  if(!in_array($mapname,$check)){
		    $cookmalist = empty($cookmalist)?  $mapname.',':$mapname.','.$cookmalist;
		    $cooklatlist = empty($cooklatlist)?  $lat.',': $lat.','.$cooklatlist;
		    $cooklnglist = empty($cooklnglist)?  $lng.',':$lng.','.$cooklnglist;
		    ICookie::set('cookmalist',$cookmalist,2592000);
		    ICookie::set('cooklatlist',$cooklatlist,2592000);
		    ICookie::set('cooklnglist',$cooklnglist,2592000);
		  }

		 $gototype = IFilter::act(IReq::get('gototype'));
		 if(!empty($gototype)){
		$link = IUrl::creatUrl('market/index');
		 	   $this->message('',$link);
		 	 }else{
		 	 	$link = IUrl::creatUrl('site/index');
		 	   $this->message('',$link);
		 	}



	}
	//验证码
	 function getCaptcha(){
	  	$width      = intval(IReq::get('w')) == 0 ? 130 : IFilter::act(IReq::get('w'));
	   	$height     = intval(IReq::get('h')) == 0 ? 45  : IFilter::act(IReq::get('h'));
	   	$wordLength = intval(IReq::get('l')) == 0 ? 5   : IFilter::act(IReq::get('l'));
	   	$fontSize   = intval(IReq::get('s')) == 0 ? 25  : IReq::get('s');
	   	$ValidateObj = new Captcha();
	   	$ValidateObj->width  = $width;
	   	$ValidateObj->height = $height;
	   	$ValidateObj->maxWordLength = $wordLength;
	   	$ValidateObj->minWordLength = $wordLength;
	   	$ValidateObj->fontSize      = $fontSize;
	   	$ValidateObj->CreateImage($text);
	   	exit;
	 }
	 //构造地址的select
	 function getparentarea(){

		$findid = intval(IReq::get('areaid'));
		$defaultid = IFilter::act(IReq::get('defaultid'));
		$deids = empty($defaultid)?array():explode(',',$defaultid);
		$list = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area  where  parent_id ='".$findid."' limit 0,100");
		$content = '';
		if(is_array($list)){
		   foreach($list as $key=>$value){
		   	  $extentd = in_array($value['id'],$deids)?'selected':'';
			    $content .= '<option value="'.$value['id'].'" data="'.$value['id'].'" '.$extentd.'>'.$value['name'].'</option>	';
		   }
		}
		echo $content;
		exit;

	}

	//获取地址坐标
	function  mapjson(){
		$searchvalue= IReq::get('searchvalue');
		$citycode = IReq::get('citycode');
	  $cityname = IReq::get('cityname');
		$content =   file_get_contents('http://api.map.baidu.com/place/v2/search?ak='.Mysite::$app->config['baidumapkey'].'&output=json&query='.$searchvalue.'&page_size=10&page_num=0&scope=1&region='.$cityname);
		echo $content;
		exit;
	}
	/*
	function  ajaxlngtlat(){
		 $lng= IFilter::act(IReq::get('lng'));
		 $lat= IFilter::act(IReq::get('lat'));
		  $bili = intval(Mysite::$app->config['servery']/1000);
		 	  $bili = $bili*0.009;
		 $shuliang =  $this->mysql->counts("select b.id from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on b.id=a.shopid where b.is_open=1  and  endtime > ".time()." and SQRT((`lat` -".$lat.") * (`lat` -".$lat." ) + (`lng` -".$lng." ) * (`lng` -".$lng." )) < (`pradius`*0.0015) order by b.id asc limit 0,1000");
		 $this->success($shuliang);
	} */
	function  ajaxlngtlat(){
		 $lng= IFilter::act(IReq::get('lng'));
		 $lat= IFilter::act(IReq::get('lat'));
		  $bili = intval(Mysite::$app->config['servery']/1000);
		 	  $bili = $bili*0.009;
		 $shuliang =  $this->mysql->counts("select b.id from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on b.id=a.shopid where b.is_open=1  and  endtime > ".time()." and SQRT((`lat` -".$lat.") * (`lat` -".$lat." ) + (`lng` -".$lng." ) * (`lng` -".$lng." )) < (`pradius`*0.0015) order by b.id asc limit 0,1000");
		  $shuliang2 =  $this->mysql->counts("select b.id from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on b.id=a.shopid where b.is_open=1  and  endtime > ".time()." and SQRT((`lat` -".$lat.") * (`lat` -".$lat." ) + (`lng` -".$lng." ) * (`lng` -".$lng." )) < (`pradius`*0.0015) order by b.id asc limit 0,1000");
		  $data['shopshu'] = $shuliang;
		  $data['marketshu'] = $shuliang2;
		 $this->success($data);
	}
	function ajaxbaidu(){
		 $searchvalue= IFilter::act(IReq::get('searchvalue'));

		 $cityname= IFilter::act(IReq::get('cityname'));
		 $pagenum= intval(IReq::get('pagenum'));
	   $content =   file_get_contents('http://api.map.baidu.com/place/v2/search?ak='.Mysite::$app->config['baidumapkey'].'&output=json&query='.$searchvalue.'&page_size=12&page_num='.$pagenum.'&scope=1&region='.$cityname);

		 $arealist  = json_decode($content,true);

		 if($arealist['status'] == 0){
		 	  $tempval = $arealist['results'];
		 	  $temparray = array();
		 	  $bili = intval(Mysite::$app->config['servery']/1000);
		 	  $bili = $bili*0.009;
		    foreach($tempval as $key=>$value){
		    	$lng = $value['location']['lng'];
		    	$lat = $value['location']['lat'];
		      $shuliang =  $this->mysql->counts("select b.id from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on b.id=a.shopid where   b.is_open=1  and  endtime > ".time()." and   SQRT((`lat` -".$lat.") * (`lat` -".$lat." ) + (`lng` -".$lng." ) * (`lng` -".$lng." )) < (`pradius`*0.0015)  order by b.id asc limit 0,1000");
		      $arealist['results'][$key]['shuliang'] = $shuliang;
		    }
		 }
		   $arealist['pagenum'] = $pagenum;
		 echo 'searchbackdata('.json_encode($arealist).')';
		 exit;

		// $backinfo = json_decode($content,true);
	}
	/*购物车部分***********************/

	/*添加购物车*/

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
	//减少购物车数量
	function downcart()
	{
		$shopid = intval(IReq::get('shopid'));
		$goods_id = intval(IReq::get('goods_id'));
		$num = intval(IReq::get('num'));
		if($shopid < 0) $this->message('店铺获取失败');
		if($goods_id < 0) $this->message('获取商品失败');
		if($num <  1)$this->message('商品数量失败');
	  $Cart = new smCart;
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
	//删除某店铺某商品
	function delcartgoods()
	{
		 $shopid = intval(IReq::get('shopid'));
		 $goods_id = intval(IReq::get('goods_id'));
	   $Cart = new smCart;
	   $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
	   $checkinfo = $Cart->del($goods_id,$shopid);
	   if($checkinfo == false)
     {
   	   $this->message($Cart->getError());
     }
     $this->success('操作成功');
	}
	//删除某店铺所有商品
	function delshopcart()
	{
		 $shopid = intval(IReq::get('shopid'));
	  	if($shopid < 0) $this->message('店铺获取失败');
		 $Cart = new smCart;
		 $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
		 $Cart->delshop($shopid);
		 $this->success('操作成功');
	}
	//输入框修改数量
	function modifycart()
	{
		$shopid = intval(IReq::get('shopid'));
		$goods_id = intval(IReq::get('goods_id'));
		$targetnum = intval(IReq::get('num'));
		if($shopid < 0) $this->message('店铺获取失败');
		if($goods_id < 0) $this->message('获取商品失败');
		if($targetnum < 1) $this->message('请执行删除该商品操作');
	  $Cart = new smCart;
	  $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
    $carinfo = $Cart->getMyCart();
    if(!isset($carinfo['list'][$shopid]['data'][$goods_id]['count'])){
    	 $this->message('此商品未添加到购物车');
    }
    $js = $targetnum - $carinfo['list'][$shopid]['data'][$goods_id]['count'];
    $num = $js;
    $checkinfo = $Cart->add($goods_id,$num,$shopid);

    if($checkinfo == false)
    {
   	   $this->message($Cart->getError());
    }
     $this->success('操作成功');
	}
	//清楚购物车所有商品
	function clearcart()
	{
		 $Cart = new smCart;
		 $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
		 $Cart->clear();
		 $this->success('操作成功');
	}
	//显示小型购物车
	function smallcat(){
		 $shopid = intval(IReq::get('shopid'));
                 if (!$shopid) {
                     $shopid=190;
                 }
           $Cart = new smCart;
           $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
	   $carinfo = $Cart->getMyCart();
	   $data['cartinfo'] = $carinfo;
	   $cxclass = new sellrule();
	   $showtype = trim(IReq::get('showtype'));
	   foreach($carinfo['list'] as $key=>$value){

	     if($value['shopinfo']['shoptype'] ==1){
	   	    $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    ");
	      }else{
	        $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    ");
	      }

        $cxclass->setdata($key,$value['sum'],$value['shopinfo']['shoptype']);
        $cxinfo = $cxclass->getdata();
        $data['cartinfo']['list'][$key]['cx'] = $cxinfo;
        $tempinfo =   $this->pscost($shopcheckinfo,$value['count']);
        $data['cartinfo']['list'][$key]['pstype'] = $tempinfo['pstype'];
       $data['cartinfo']['list'][$key]['pscost'] = $cxinfo['nops'] == true?0:$tempinfo['pscost'];
        $data['cartinfo']['list'][$key]['limitcost'] = $shopcheckinfo['limitcost'];


	   }
	   $data['shopid'] = $shopid;
	   Mysite::$app->setdata($data);
	}
	function marketcart(){
		 $shopid = intval(IReq::get('shopid'));
		 $Cart = new smCart;
	   $carinfo = $Cart->getMyCart();
	   $data['cartinfo'] = $carinfo;
	   $cxclass = new sellrule();
	   foreach($carinfo['list'] as $key=>$value){
	      if($value['shopinfo']['shoptype'] ==1){
	   	    $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    ");
	      }else{
	        $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    ");
	      }

        $cxclass->setdata($key,$value['sum'],$value['shopinfo']['shoptype']);
        $cxinfo = $cxclass->getdata();
        $data['cartinfo']['list'][$key]['cx'] = $cxinfo;
        $tempinfo =   $this->pscost($shopcheckinfo,$value['count']);
        $data['cartinfo']['list'][$key]['pstype'] = $tempinfo['pstype'];
        $data['cartinfo']['list'][$key]['pscost'] = $cxinfo['nops'] == true?0:$tempinfo['pscost'];

	   }
	   $data['shopid'] = $shopid;
	   Mysite::$app->setdata($data);
	}
	function showcatax(){
		 $shopid = intval(IReq::get('shopid'));
                 if (!$shopid) {
                     $shopid = 190;
                 }
	   if(empty($shopid)){
	   	 	$link = IUrl::creatUrl('site/index');
	     	$this->message('未选择对应店铺',$link);
	   }
	   $Cart = new smCart;
	   $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
	   $carinfo = $Cart->getMyCart();
	   if(!isset($carinfo['list'][$shopid]['data'])){
	    	 	$link = IUrl::creatUrl('site/index');
	     	$this->message('对应店铺购物车商品为空',$link);
	   }
	   $showtype = trim(IReq::get('showtype'));
	   $data['showtype'] = $showtype;

	   if($showtype == 'market'){
	   	   $data['shopinfo'] =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$shopid."'    ");
	   }else{
	       $data['shopinfo'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$shopid."'    ");
	    }

	   if(empty($data['shopinfo']))
	   {
	   		$link = IUrl::creatUrl('site/index');
	     	$this->message('未选择对应店铺',$link);
	   }
	   $data['shopid'] = $shopid;
	   $data['scoretocost'] = Mysite::$app->config['scoretocost'];

	   $data['cartinfo'] = $carinfo;
	   //初始化日期逻辑
	    //10:00以后的逻辑控制
           $order_time_limit = $this->mysql->select_one("select asoftime from ".Mysite::$app->config['tablepre']."shopfast where shopid = ".$shopid."");
           $asoftime = $order_time_limit['asoftime'];
	   $select_time="";
       $now_time=date("H:i:s");
       if ($now_time>=$asoftime.":00") {
            $now_time =  strtotime("+1 day");
       }
       $data['test_time'] = time();
       $data['select_time'] = $now_time;

       $cxclass = new sellrule();
	   foreach($carinfo['list'] as $key=>$value){
        if($showtype == 'market'){
	   	    $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    ");
	      }else{
	       $shopcheckinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    ");
	      }
        $cxclass->setdata($key,$value['sum'],$value['shopinfo']['shoptype'], $now_time);
        $cxinfo = $cxclass->getdata();
        $data['cartinfo']['list'][$key]['cx'] = $cxinfo;
        $tempinfo =   $this->pscost($shopcheckinfo,$value['count']);
        $data['cartinfo']['list'][$key]['pstype'] = $tempinfo['pstype'];
        $data['cartinfo']['list'][$key]['pscost'] = $cxinfo['nops'] == true?0:$tempinfo['pscost'];


	   }
	   //检测 设置地址是否在  配送 范围

	   $psset = Mysite::$app->config['psset'];
	   if(empty($psset)){
	   	   $link = IUrl::creatUrl('site/index');
	      $this->message('网站未设置配送方式，请联系管理员',$link);
	   }
     $psinfo = unserialize($psset);

     $checkps = 	 $this->pscost($data['shopinfo'],$carinfo['list'][$shopid]['count']);

     if($checkps['canps'] != 1){
     	 $link = IUrl::creatUrl('site/guide');
	      $this->message('该店铺不在配送范围内',$link);
     }

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

		}

		$data['myaddressslist'] = array();
		if($this->member['uid'] > 0 ){
		    	$data['myaddressslist'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."address  where     userid = ".$this->member['uid']." and `default` =1 ");
		}


	   $data['juanlist'] = array();
	   if(!empty($this->member['uid'] )){
	        $data['juanlist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan  where uid ='".$this->member['uid']."'  and status = 1 and endtime > ".time()."  order by id desc limit 0,20");
	   }
	  $data['paylist']  = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id desc  ");
	   Mysite::$app->setdata($data);
	}


	function ajaxcatax()
	{
		$shopid = intval(IReq::get('shopid'));
		$showtype = trim(IReq::get('showtype'));
		$day = strtotime(IReq::get('posttime'))? strtotime(IReq::get('posttime')):0;
         if (!$shopid) {
             $shopid = 190;
         }
	   $Cart = new smCart;
	   $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
	   $carinfo = $Cart->getMyCart();
       $cxclass = new sellrule();
	   foreach($carinfo['list'] as $key=>$value){
        if($showtype == 'market'){
	   	    $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    ");
	      }else{
	       $shopcheckinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    ");
	      }
        $cxclass->setdata($key,$value['sum'],$value['shopinfo']['shoptype'], $day);
        $cxinfo = $cxclass->getdata();
        $data['cx'] = $cxinfo;
        $tempinfo =   $this->pscost($shopcheckinfo,$value['count']);
        $data['pstype'] = $tempinfo['pstype'];
        $data['pscost'] = $cxinfo['nops'] == true?0:$tempinfo['pscost'];


	   }
	   echo json_encode($data);exit;
	   //Mysite::$app->setdata($data);
	}


	function showcart(){
		 //检测是否  在配送范围
		 //
		 $shopid = intval(IReq::get('shopid'));
	   if(empty($shopid)){
	   	 $link = IUrl::creatUrl('site/index');
	     	 $this->message('未选择对应店铺',$link);
	   }
	   $Cart = new smCart;
	   $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
	   $carinfo = $Cart->getMyCart();
	   if(!isset($carinfo['list'][$shopid]['data'])){
	    	 	$link = IUrl::creatUrl('site/index');
	     	$this->message('对应店铺购物车商品为空',$link);
	   }
	   $showtype = trim(IReq::get('showtype'));
	    if($showtype == 'market'){
	   	   $data['shopinfo'] =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$shopid."'    ");
	   }else{
	       $data['shopinfo'] =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$shopid."'    ");
	    }
	   //$data['shopinfo'] =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$shopid."'    ");
	   if(empty($data['shopinfo']))
	   {
	   		$link = IUrl::creatUrl('site/index');
	     	$this->message('未选择对应店铺',$link);
	   }
	   $data['shopid'] = $shopid;
	   $data['scoretocost'] = Mysite::$app->config['scoretocost'];

	   //检测 设置地址是否在  配送 范围

	   $psset = Mysite::$app->config['psset'];
	   if(empty($psset)){
	   	   $link = IUrl::creatUrl('site/index');
	      $this->message('网站未设置配送方式，请联系管理员',$link);
	   }
     $psinfo = unserialize($psset);

     $checkps = 	 $this->pscost($data['shopinfo'],$carinfo['list'][$shopid]['count']);
     if($checkps['canps'] != 1){
     	 $link = IUrl::creatUrl('site/guide');
	      $this->message('该店铺不在配送范围内',$link);
     }

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
		    	 $data['areainfo'] = $temp_areainfo.$data['areainfo'];
		    }
		  }
		  if($this->member['uid'] > 0 &&nowID > 0){
		  	$data['myaddressslist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."address  where areaid".$area_grade."=".$nowID."");
		  }
	  }

	  $data['paylist']  = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id desc  ");

	   Mysite::$app->setdata($data);
	}
	function smallcat2(){
		 $shopid = intval(IReq::get('shopid'));
	   $Cart = new smCart;
	   $plate = intval(IReq::get('plate'));
	    if (!empty($plate)) {
	    	$Cart->cartName = 'platesmcart';
		}
	   $carinfo = $Cart->getMyCart();
	   $data['cartinfo'] = $carinfo;
	   $data['shopinfo'] = array();
	   $cxclass = new sellrule();
	   $showtype = trim(IReq::get('showtype'));
	   foreach($carinfo['list'] as $key=>$value){
	     if($value['shopinfo']['shoptype'] ==1){
	   	    $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    ");
	      }else{
	        $shopcheckinfo =   $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$key."'    ");
	      }
        $cxclass->setdata($key,$value['sum'],$value['shopinfo']['shoptype']);
        $cxinfo = $cxclass->getdata();
        $data['cartinfo']['list'][$key]['cx'] = $cxinfo;
        $data['cartinfo']['list'][$key]['areacost'] = 0;
        $tempinfo =   $this->pscost($shopcheckinfo,$value['count']);
        $data['cartinfo']['list'][$key]['pstype'] = $tempinfo['pstype'];
        $data['cartinfo']['list'][$key]['pscost'] = $cxinfo['nops'] == true?0:$tempinfo['pscost'];
        $data['cartinfo']['list'][$key]['shopinfo'] = $shopcheckinfo;

	   }
	   $data['shopid'] = $shopid;
	   $data['juanlist'] = array();
	   if(!empty($this->member['uid'] )){
	        $data['juanlist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan  where uid ='".$this->member['uid']."'  and status = 1 and endtime > ".time()."  order by id desc limit 0,20");
	   }
	   Mysite::$app->setdata($data);

	}

	/*购物车部分结束**************************/
	function ajaxareadata(){
		 $areaid = intval(IReq::get('areaid'));
		 $typeid = intval(IReq::get('typeid'));
		 $arealist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area where parent_id = ".$areaid." order by orderid asc ");

		 $this->success($arealist);
	}
	function single(){
	  $data['show'] = IFilter::act(IReq::get('show'));
	  $data['id'] =  intval(IFilter::act(IReq::get('id')));
	  $data['info'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."single where id ='".$data['id']."' or code='".$data['show']."' order by id asc ");
	  if(empty($data['info'])){
	  	$data['info'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."single   order by id asc ");
	  }
	  Mysite::$app->setdata($data);
	}
	function news(){
	  $data['id'] =  intval(IFilter::act(IReq::get('id')));
	  $data['info'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."news where id ='".$data['id']."'  order by id desc ");
	  if(empty($data['info'])){
	    	$data['info'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."news   order by id asc ");
	  }
	  Mysite::$app->setdata($data);
	}
	function newstype(){
		$data['id'] =  intval(IFilter::act(IReq::get('id')));
	  $data['info'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."newstype where id ='".$data['id']."'  order by id asc ");
	  if(empty($data['info'])){
	    	$data['info'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."newstype where  parent_id > 0 order by id desc ");
	  }
	  Mysite::$app->setdata($data);
	}
   function phonecode(){
    	//当 用户已登陆  remove
    	//当用电话已验证 remove
    	//当用电话未验证则显示
    	//$this->memberinfo
      $checksend = Mysite::$app->config['ordercheckphone'];
      if(empty($checksend)){
    	 	echo '';
    	 	exit;
    	}
    	if(!empty($this->member['uid'])){
    	  echo 'removesend()';
    	  exit;
    	}
      $phone = IFilter::act(IReq::get('phone'));
      if(empty($phone)){
         echo 'showsend(\'\',0)';
         exit;
      }
      //检测电话号码
      $checkphone = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."mobile where phone ='".$phone."'   order by addtime desc limit 0,50");
      if(empty($checkphone)){
      	echo 'showsend(\'\',0)';
         exit;
      }
      $bijiaotime = time() - 180;
      if($checkphone['is_send'] == 1){
      	  echo 'removesend()';
    	    exit;
      }
      if($checkphone['addtime']  < $bijiaotime){
      		echo 'showsend(\'\',0)';
         exit;
      }else{
      	 $backtime = 180-(time() - $checkphone['addtime']);
      	 echo 'showsend(\''.$phone.'\','.$backtime.')';
    	    exit;
      }

    }
    function setphone(){
    	 $checksend = Mysite::$app->config['ordercheckphone'];
    	 if($checksend == 1){
    	 	   if(!empty($this->member['uid'])){
    	       echo 'removesend()';
    	       exit;
    	     }
    	     $phone = IFilter::act(IReq::get('phone'));
    	     if(IValidate::suremobi($phone)){
    	     	     $checkphone = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."mobile where phone ='".$phone."'   order by addtime desc limit 0,50");
    	     	     if(!empty($checkphone)){
                     if($checkphone['is_send'] == 1){
                          echo 'removesend()';
    	                    exit;
                     }
                      $bijiaotime = time() - 180;
                      if($checkphone['addtime']  > $bijiaotime){//验证码还有效
                      	  $backtime = 180 -(time() - $checkphone['addtime']);
                        	ICookie::set('phonecode',$checkphone['code'],$backtime);
                        	echo 'showsend(\''.$phone.'\','.$backtime.')';
    	                     exit;
                      }
                 }
                 //重新发送验证码
                 $data['code'] = mt_rand(10000,99999);
                 $data['phone'] = $phone;
                 $data['addtime'] = time();
                 $data['is_send'] = 0;
                 ICookie::set('phonecode',$data['code'],180);
                   /*调用发送*/
                   /* usercodetpl*/
                  $default_tpl = new config('tplset.php',hopedir);
	        	      $tpllist = $default_tpl->getInfo();
	        	      if(!isset($tpllist['usercodetpl']) || empty($tpllist['usercodetpl']))
	        	      {
	        	         // logwrite('短信发送商家模板加载失败');
	        	         echo 'alert(\'发送失败，请联系管理员设置模板\')';
    	               exit;
	        	      }else{
	        	      	  $sendmobile = new mobile();
	        	      	  $tempdata['code'] = $data['code'];
	        	      	  $tempdata['sitename'] = Mysite::$app->config['sitename'];
	        	      	  $contents =  Mysite::$app->statichtml($tpllist['usercodetpl'],$tempdata);
	        	          if(Mysite::$app->config['smstype'] == 2){//139邮箱转发短信
	        	          	//使用sms10086cn发送/
	        	          	 $APIServer = 'http://www.sms-10086.cn/Service.asmx/sendsms?';
	                       $weblink = $APIServer.'zh='.trim(Mysite::$app->config['sms86ac']).'&mm='.trim(Mysite::$app->config['sms86pd']).'&hm='.$phone.'&nr='.urlencode($contents).'&dxlbid=27';
	        	             $contentcccc =  file_get_contents($weblink);
	        	             logwrite('验证短信发送:'.$contentcccc);
	        	          }else{
	        	          	//使用sms10086cn发送/
	        	             $phoneids = array();
	         	 	           $phoneids[] =$phone;
	             	         $chekcinfo = $sendmobile->sendsms($phoneids,$contents);
	             	         logwrite('验证短信发送:'.$chekcinfo);
	             	      }
	             	  }
                 $this->mysql->insert(Mysite::$app->config['tablepre'].'mobile',$data);

                 echo 'showsend(\''.$phone.'\',180)';
    	           exit;



    	     }else{
    	       	echo 'alert(\'不是手机号\')';
    	       	exit;
    	     }
    	}else{
    	   echo '';
    	   exit;
    	}
    }
    function waitpay(){
    	$userid = empty($this->member['uid'])?0:$this->member['uid'];
		$orderid = intval(IReq::get('orderid'));
		if(empty($orderid)) $this->error('订单获取失败');
		if($userid == 0){
			//ICookie::get('Captcha')
			$neworderid = ICookie::get('orderid');

			if($orderid != $neworderid) $this->message('订单无查看权限1');
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
		$paydir = hopedir.'/plug/pay/'.$orderinfo['paytype'];


                if(!file_exists($paydir.'/pay.php'))
    {
      	$this->message('支付方式文件不存在');
    }
    $dopaydata = array('type'=>'order','upid'=>$orderid,'cost'=>$orderinfo['allcost']);//支付数据
    include_once($paydir.'/pay.php');
    //调用方式  直接调用支付方式
	}
	function updatearea(){

		  $this->mysql->getarr("TRUNCATE TABLE  `xiaozu_areatoadd`");
		  $this->mysql->getarr("TRUNCATE TABLE  `xiaozu_areashop`");
		 $tempaa = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area   order by id asc limit 0,2000");
		 foreach($tempaa as $key=>$value){
		   	$temp['areaid'] = $value['id'];
		   	$temp['shopid'] =0;
		 	 $this->mysql->insert(Mysite::$app->config['tablepre'].'areashop',$temp);
		 	 $tk['areaid'] =$value['id'];
		 	 $tk['shopid'] = 0;
		 	 $tk['cost'] = 0;
		 	  $this->mysql->insert(Mysite::$app->config['tablepre'].'areatoadd',$tk);
		 }
	  $udata['cattype'] = 0;
		$this->mysql->update(Mysite::$app->config['tablepre'].'goodstype',$udata," id > 0 ");

	}
	//在线支付返回处理
	function payback(){
		//在线支付返回处理代码
		$paytype = trim(IFilter::act(IReq::get('paytype')));
		if(empty($paytype)){
		  $this->error('未定义的支付接口');
		}
		$paydir = hopedir.'/plug/pay/'.$paytype;
		if(!file_exists($paydir.'/back.php'))
    {
      	$this->message('支付方式方式不存在');
    }
    $paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
    if(is_array($paylist)){
		  foreach($paylist as $key=>$value){
			   $paytypelist[] =$value['loginname'];
		  }
		}
		if(!in_array($paytype,$paytypelist)){
		  $this->message('未定义的支付方式');
		}
    include_once($paydir.'/back.php');
	}
	function noticeurl(){
		$paytype = trim(IFilter::act(IReq::get('paytype')));
		if(empty($paytype)){
		  $this->message('未定义的支付接口');
		}
		$paydir = hopedir.'/plug/pay/'.$paytype;
		if(!file_exists($paydir.'/notice.php'))
    {
      	$this->message('支付方式方式不存在');
    }
    $paylist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id asc limit 0,50");
    if(is_array($paylist)){
		  foreach($paylist as $key=>$value){
			   $paytypelist[] =$value['loginname'];
		  }
		}
		if(!in_array($paytype,$paytypelist)){
		  $this->message('未定义的支付方式');
		}
    include_once($paydir.'/notice.php');
	}
	function ceju(){
			$mi = $this->GetDistance(IFilter::act(IReq::get('lat')),IFilter::act(IReq::get('lng')), IFilter::act(IReq::get('dlat')),IFilter::act(IReq::get('dlng')), 1);
			$tempmi = $mi;
			  $mi = $mi > 1000? round($mi/1000,2).'公里':$mi.'米';

		  $this->success($mi);
	}
	function searchposition(){
		$position = IFilter::act(IReq::get('position'));
		$areainfo = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area   order by orderid asc");
		$parentids = array();
		foreach($areainfo as $key=>$value){
		  $parentids[] = $value['parent_id'];
		}
		//去重
		$parentids = array_unique($parentids);

		$data['list'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area where  id not in(".join(',',$parentids).") and name like '%".$position."%' order by orderid asc  ");




	  Mysite::$app->setdata($data);
	}
	function makeshow(){
		$id = intval(IFilter::act(IReq::get('id')));
		$actime = IFilter::act(IReq::get('actime'));
		$sign = IFilter::act(IReq::get('sign'));
		$status = intval(IFilter::act(IReq::get('status')));
		if($id < 1){
		  echo '获取失败';
		  exit;
		}
		if(empty($actime)){
		  echo '检测不通过';
		  exit;
		}
		if(empty($sign)){
		   echo '检测不通过';
		   exit;
		}
		$orderinfo =    $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."order  where id= '".$id."'   ");
		if(empty($orderinfo)){
		   echo '订单获失败';
		   exit;
		}
		$tempstr = md5($orderinfo['dno'].$actime);
	  $tempstr = substr($tempstr,3,15);
	  $tempstr = md5($orderinfo['shopuid'].$tempstr);
	  $tempstr = substr($tempstr,3,15);

	 if($sign != $tempstr){
	    echo '验证不通过';
	    exit;
	 }
	 if($orderinfo['status'] != 1){
	   echo '订单状态不可操作制作与否';
	   exit;
	 }
	 $dolink = IUrl::creatUrl('site/sendorder/id/'.$id.'/sign/'.$sign.'/actime/'.$actime);
	 if(!empty($orderinfo['is_make'])){
	 	 echo '订单已处理过,不需再次操作<br>';
	   if($orderinfo['is_make'] == 1){


	   	 echo '已确认制作<br>';
	     echo '若需要立即发货,<a href="'.$dolink.'">点击发货</a>';
	     exit;
	   }else{
	   	 echo '已取消制作该订单,等待管理员处理';
	   	 exit;

	   }
	 }else{

	    if($status == 1){
	    	$newdata['is_make'] = 1;
		   	$this->mysql->update(Mysite::$app->config['tablepre'].'order',$newdata,"id='".$id."'");
		   	echo '已确认制作<br>';
	     echo '若需要立即发货,<a href="'.$dolink.'">点击发货</a>';
	     exit;
	    }elseif($status == 2){
	    	 	$newdata['is_make'] = 2;
		   	$this->mysql->update(Mysite::$app->config['tablepre'].'order',$newdata,"id='".$id."'");
		   	 echo '已取消制作该订单,等待管理员处理';
	   	 exit;
	    }else{
	    	 echo '提交操作数据失败';
	    	 exit;
	    }
	 }

	    exit;
	}
	function sendorder(){
		$id = intval(IFilter::act(IReq::get('id')));
		$actime = IFilter::act(IReq::get('actime'));
		$sign = IFilter::act(IReq::get('sign'));
		$status = intval(IFilter::act(IReq::get('status')));
		if($id < 1){
		  echo '获取失败';
		  exit;
		}
		if(empty($actime)){
		  echo '检测不通过';
		  exit;
		}
		if(empty($sign)){
		   echo '检测不通过';
		   exit;
		}
		$orderinfo =    $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."order  where id= '".$id."'   ");
		if(empty($orderinfo)){
		   echo '订单获失败';
		   exit;
		}
		$tempstr = md5($orderinfo['dno'].$actime);
	  $tempstr = substr($tempstr,3,15);
	  $tempstr = md5($orderinfo['shopuid'].$tempstr);
	  $tempstr = substr($tempstr,3,15);

	 if($sign != $tempstr){
	    echo '验证不通过';
	    exit;
	 }
	 if($orderinfo['status'] != 1){
	   echo '订单状态已发货或者不能发货';
	   exit;
	 }
	  if($orderinfo['is_make'] != 1){
	     echo '订单制作状态错误';
	     exit;
	  }
	  $newdata['status'] = 2;
		 $this->mysql->update(Mysite::$app->config['tablepre'].'order',$newdata,"id='".$id."'");
		echo  '操作成功';
		exit;
  }
  function catalog(){
	  	$tempareaid = ICookie::get('myaddress');

	    $areaid =0;
	    if(empty($tempareaid)){
	    	$areaid = 2;
	    }else{
	    	 $dataareaids = array();
	    	while($tempareaid > 0){
	  	         $areaid = $tempareaid;
	  	         $temp_check =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id ='".$tempareaid."'   order by id desc limit 0,50");
	  	         if(empty($temp_check)){
	  	           break;
	  	         }
	  	         if(in_array($temp_check['parent_id'],$dataareaids)){
	  	           break;
	  	         }
	  	         if($temp_check['parent_id'] == 0){
	  	           break;
	  	         }
	  	         $dataareaids[] = $tempareaid;
	  	         $tempareaid = $temp_check['parent_id'];
	      }
	    }





      //获取所有菜品分类
      $caiplist = $this->mysql->getarr("select id,name from ".Mysite::$app->config['tablepre']."shoptype where parent_id = 51   order by orderid asc limit 0,50");
      //获取所有二级区域名称
      $arealist = $this->mysql->getarr("select id,name from ".Mysite::$app->config['tablepre']."area where parent_id = '".$areaid."'   order by id asc limit 0,50");

      //print_r($arealist);
      //xiaozu_shopattr  	shopid	cattype 1外卖2订台	firstattr	attrid
     // $arealist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."areatoadd where areaid = '".$areaid."'   order by shopid asc limit 0,1000");//获取改区域所有店铺
      $shoplist =  $this->mysql->getarr("select id,shopname from ".Mysite::$app->config['tablepre']."shop where   id in(select shopid from ".Mysite::$app->config['tablepre']."areashop where areaid = ".$areaid.") ");

      $tempshoplist=array();
      foreach($shoplist as $k=>$val){
          //获取每个店铺的  菜品 值   区域值
          $temp_cp = $this->mysql->getarr("select attrid  from ".Mysite::$app->config['tablepre']."shopattr  where shopid = '".$val['id']."'   order by attrid asc limit 0,50");
          //,areaid2,areaid3

          $temp_cpids = array();
          foreach($temp_cp as $key=>$value){
          	$temp_cpids[] = $value['attrid'];
          }
          $vk['cpids'] = join(',',$temp_cpids);

          $tempb = $this->mysql->getarr("select areaid  from ".Mysite::$app->config['tablepre']."areashop  where shopid = '".$val['id']."'   order by areaid asc limit 0,100");
          $dotem = array();
          foreach($tempb as $vc=>$vb){
          	$dotem[] =$vb['areaid'];
          }

           $vk['areaids'] = join(',',$dotem);
           $vk['id'] = $val['id'];
           $vk['shopname'] = $val['shopname'];
           $tempshoplist[] = $vk;
      }
      $data['shopdata'] = $tempshoplist;
      $data['caiplist'] = $caiplist;
      $data['arealist'] = $arealist;
     Mysite::$app->setdata($data);
	}

	function changeshop(){
	  $id = intval(IFilter::act(IReq::get('id')));
	  $link = IUrl::creatUrl('site/index/');
	  if($id < 1){
	  	$this->message('获取店铺ID失败',$link);
	  }

	  $grade = Mysite::$app->config['area_grade'];
	  $temp_where = '';
	  $doarea = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area where parent_id in(select id from ".Mysite::$app->config['tablepre']."area where parent_id =0) ");
	  if($grade == 1){
	     $where = ' and areaid  in(select id from '.Mysite::$app->config['tablepre'].'area where parent_id =0)';
	  }elseif($grade == 2){
	  	$where = ' and areaid  in(select id from '.Mysite::$app->config['tablepre'].'area where parent_id in(select id from '.Mysite::$app->config['tablepre'].'area where parent_id =0)) ';
	  }elseif($grade == 3){
	  	$where = ' and areaid   in(select id from '.Mysite::$app->config['tablepre'].'area where parent_id in(select id from '.Mysite::$app->config['tablepre'].'area where parent_id in(select id from '.Mysite::$app->config['tablepre'].'area where parent_id =0))) ';
	  }

	  $checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."areatoadd where shopid=".$id." ".$where."");

	  if(empty($checkinfo)){
	     $this->message('获取店铺区域信息失败',$link);
	  }
	  $arealist = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."area where id = ".$checkinfo['areaid']." order by orderid asc ");
	  if(empty($arealist)){
	  	$this->message('获取店铺区域信息失败',$link);
	  }
		 	ICookie::set('lng',$arealist['lng'],2592000);
	  	ICookie::set('lat',$arealist['lat'],2592000);
		  ICookie::set('mapname',$arealist['name'],2592000);
		  ICookie::set('myaddress',$checkinfo['areaid'],2592000);
		  $cookmalist = ICookie::get('cookmalist');
		  $cooklnglist = ICookie::get('cooklnglist');
		  $cooklatlist = ICookie::get('cooklatlist');
		  $check = explode(',',$cookmalist);
		  if(!in_array($arealist['name'],$check)){
		    $cookmalist = empty($cookmalist)?  $arealist['name'].',':$arealist['name'].','.$cookmalist;
		    $cooklatlist = empty($cooklatlist)?  $arealist['lat'].',':$arealist['lat'].','.$cooklatlist;
		    $cooklnglist = empty($cooklnglist)?  $arealist['lng'].',':$arealist['lng'].','.$cooklnglist;
		    ICookie::set('cookmalist',$cookmalist,2592000);
		    ICookie::set('cooklatlist',$cooklatlist,2592000);
		    ICookie::set('cooklnglist',$cooklnglist,2592000);
		  }
		  $link = IUrl::creatUrl('shop/index/id/'.$id);
		  $this->message('',$link);
	}
	function shoplist(){
	     $data['cpid'] = intval(IFilter::act(IReq::get('cpid')));
	     $data['qisong'] = intval(IFilter::act(IReq::get('qisong')));
	     $data['renjun'] = intval(IFilter::act(IReq::get('renjun')));
	     $data['orderby'] = intval(IFilter::act(IReq::get('orderby')));
	      $psset = Mysite::$app->config['psset'];
	      //店铺的cattype
	      $locationtype = 0;
	           $attrshop = array();

	 	         //获取搜索属性性结束
	 	    $qisongarray = array(
	 	    '0'=>'',
	 	    '1'=>' a.limitcost > 0 and a.limitcost < 51 ',
	 	    '2'=>' a.limitcost > 50 and a.limitcost < 101 ',
	 	    '3'=>' a.limitcost > 100   '
	 	    );
	 	    $renjunarray = array(
	 	    '0'=>'',
	 	    '1'=>' a.personcost > 0 and a.personcost < 11 ',
	 	    '2'=>' a.personcost > 10 and a.personcost < 51  ',
	 	    '3'=>' a.personcost > 50'
	 	    );
	 	    $orderarray = array(
	 	    '0'=>'  sort asc',
	 	    '1'=>' a.personcost desc',
	 	    '2'=>' a.limitcost desc'
	 	    );
	 	    $orderinfo = in_array($data['orderby'],array(0,1,2))?$orderarray[$data['orderby']]:'sort asc';


	      if(!empty($psset)){
	      	 $psinfo = unserialize($psset);
	      	 $locationtype = $psinfo['locationtype'];
	      }
	      $where = $this->search($locationtype);

	        $data['attrinfo'] = array();
	        $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = 51 order by orderid asc  limit 0,20"); ;


		         foreach($templist as $key=>$value){
	          	 $tempwhere = empty($where)?' where id in(select shopid from '.Mysite::$app->config['tablepre'].'shopattr where attrid = '.$value['id'].' ) ':$where.'  and   id in(select shopid from '.Mysite::$app->config['tablepre'].'shopattr where attrid = '.$value['id'].' ) ';
	          	 $data['attrinfo'][] = $value;
	 	         }

	      if(!empty($data['cpid'])){
	         $where = empty($where)?' where id in(select shopid from '.Mysite::$app->config['tablepre'].'shopattr where attrid = '.$data['cpid'].' ) ':$where.'  and   id in(select shopid from '.Mysite::$app->config['tablepre'].'shopattr where attrid = '.$data['cpid'].' ) ';
	      }
	      if(in_array($data['qisong'],array(1,2,3))){
	         $where = empty($where)?' where '.$qisongarray[$data['qisong']]:$where.' and '.$qisongarray[$data['qisong']];
	      }
	       if(in_array($data['renjun'],array(1,2,3))){
	         $where = empty($where)?' where '.$renjunarray[$data['renjun']]:$where.' and '.$renjunarray[$data['renjun']];
	      }

	      $shopsearch = IFilter::act(IReq::get('shopsearch'));
		    $data['shopsearch'] = $shopsearch;
		    $this->pageCls->setpage(intval(IReq::get('page')),10);
        $list = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."    order by ".$orderinfo." limit ".$this->pageCls->startnum().", ".$this->pageCls->getsize()."");

       $shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."   ");
       $this->pageCls->setnum($shuliang);
       $data['pagecontent'] = $this->pageCls->getpagebar();// $this->pageCls->getpagebar();

		    $nowhour = date('H:i:s',time());
		    $nowhour = strtotime($nowhour);
		    $templist = array();
		    $shopdoid = array();
		    if(is_array($list)){//转换数据
		       foreach($list as $key=>$value){
		           	if($value['id'] > 0){
		        	     $checkinfo = $this->shopIsopen($value['is_open'],$value['starttime'],$value['is_orderbefore'],$nowhour);
		        	     $value['opentype'] = $checkinfo['opentype'];
		        	     $value['newstartime']  =  $checkinfo['newstartime'];
		        	     $psinfo = $this->pscost($value,1);
		        	     $value['pscost'] = $psinfo['pscost'];


		        	    //每个店铺属性
		        	    $shopdoid[] = $value['id'];
		         	     $templist[] = $value;
		             }
		       }
	      }
	      $data['shopdoid'] = join(',',$shopdoid);
		    $data['shoplist'] = $templist;
		     $data['cpid'] = empty($data['cpid'])?'default':$data['cpid'];
	       $data['qisong'] = empty($data['qisong'])?'default':$data['qisong'];
	       $data['renjun'] = empty($data['renjun'])?'default':$data['renjun'];
	       $data['orderby'] = empty($data['orderby'])?'default':$data['orderby'];
	         $data['recomshop'] =  $this->mysql->getarr("select b.id,b.shortname,b.shopname,b.shoplogo,a.shopid,b.address from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id  where   b.is_open = 1 and b.is_pass = 1 and a.is_com =1 limit 0,10");
		    Mysite::$app->setdata($data);

		    if($locationtype == 1){
	 	    	  //地图定位
		         Mysite::$app->setdata($data);
	 	    	   Mysite::$app->setAction('mapshoplist');
	 	    }else{
	 	    	//文字定位
	 	    	 Mysite::$app->setdata($data);
	 	    	 Mysite::$app->setAction('shoplist');
	 	    }

	 }
         function gettotlesum () {
     $Cart = new smCart;
     $carinfo = $Cart->getMyCart();
     $shopid = intval(IReq::get('shopid'));
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

        function loginout () {
                  $shopid = IFilter::act(IReq::get('shopid'));
                  if (!$shopid) {
                      $shopid = 190;
                  }
		  $this->memberCls->loginout();
              //    if ($shopid) {
              //        $link = IUrl::creatUrl('site/shopshow&id='.$shopid);
               //   }else{
                       $link = IUrl::creatUrl('site/index');
                       $this->success("退出成功", $link);

               //   }
        }
        function goodsDetail () {

            $goods_id = trim(IFilter::act(IReq::get('goods_id')));
            $goods_id = 4321;
            if (!$goods_id) {
                     $this->message('操作失败');
                     $link = IUrl::creatUrl('site&action=index');
                     header("Location:".$link);
                     exit;
                }
            $detail = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goods as a left join ".Mysite::$app->config['tablepre']."shop as b on a.shopid=b.id where a.id='".$goods_id."'  ");
             $data['detail'] = $detail[0];
          //$data['goods_id'] = $goods_id;
         // print_r($detail);exit;
             if ($detail) {
                 echo json_encode(array("success"=>"yes","msg"=>$detail[0]));
                 exit;
             } else {
                echo json_encode(array("success"=>"yes","msg"=>"系统出错"));             }

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


 }



?>
