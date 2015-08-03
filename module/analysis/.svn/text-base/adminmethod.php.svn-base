<?php
class method   extends adminbaseclass
{   
	 function area(){
	 	 $selecttype = intval(IFilter::act(IReq::get('selecttype')));
 	 		$tempselecttype = in_array($selecttype,array(0,1,2,3))?$selecttype:0;
 	 		
 	 		$wherearray = array(
 	 		'0'=>'',
 	 		'1'=>' where  addtime > '.strtotime('-1 month'),
 	 		'2'=>' where addtime > '.strtotime('-7 day'),
 	 		'3'=>' where addtime > '.strtotime(date('Y-m-d',time()))
 	 		); 
 	 	 
 	 		
 	 		
 	 		
	 	   $arealist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."area where parent_id=0");
	 	   $total = 0;
	 	   $nowdata = array();
	 	   foreach($arealist as $key=>$value){// FIND_IN_SET('".$firstareain."',`areaids`)
	 	   	  $where = empty($wherearray[$tempselecttype])?" where FIND_IN_SET('".$value['id']."',`areaids`)":$wherearray[$tempselecttype]." and FIND_IN_SET('".$value['id']."',`areaids`)";
	 	   	  $value['shuliang'] = $this->mysql->counts("select id from ".Mysite::$app->config['tablepre']."order ".$where."    ");
	 	   	  
	 	   	 $nowdata[] = $value;
	 	   	 $total = $total+$value['shuliang'];
	 	   	    
	 	   }
	 	   $data['total'] = $total;
	 	   $data['allshu'] = count($arealist);
	 	   $data['arealist'] = $nowdata; 
	 	    $data['selecttype'] = $selecttype;
      Mysite::$app->setdata($data);
 	 } 
 	 function shop(){
 	 	//店铺统计 
 	 		 $selecttype = intval(IFilter::act(IReq::get('selecttype')));
 	 		$tempselecttype = in_array($selecttype,array(0,1,2,3))?$selecttype:0;
 	 		$wherearray = array(
 	 		'0'=>'',
 	 		'1'=>'  addtime > '.strtotime('-1 month'),
 	 		'2'=>'  addtime > '.strtotime('-7 day'),
 	 		'3'=>'  addtime > '.strtotime(date('Y-m-d',time()))
 	 		); 
 	 		$where1 = empty($wherearray[$tempselecttype]) ? '':' where '.$wherearray[$tempselecttype];
 	 		$where2 = empty($wherearray[$tempselecttype]) ? '':' and '.$wherearray[$tempselecttype]; 
 	 		 
 	 		$orderlist = $this->mysql->getarr("select count(id) as shuliang ,shopid from ".Mysite::$app->config['tablepre']."order  ".$where1."   group by shopid   order by shuliang desc  limit 0,10");
 	 		$data['list'] = array();
 	 		$data['newdata'] = array();
 	 		foreach($orderlist as $key=>$value){
 	 		  if($value['shopid'] > 0){
 	 		  
 	 		     $shopinfo = $this->mysql->select_one("select  shopname,id from ".Mysite::$app->config['tablepre']."shop  where id=".$value['shopid']." "); 
 	 		   //  $value['det'] = $this->mysql->getarr("select count(id) as shuliang ,DATE_FORMAT(FROM_UNIXTIME(`addtime`),'%e') as month from ".Mysite::$app->config['tablepre']."order where addtime > ".$mintime." and shopid =".$value['shopid']." group by month    order by month desc  limit 0,10");
 	 		     $value['det'] = $this->mysql->getarr("select count(id) as shuliang ,shopid from ".Mysite::$app->config['tablepre']."order where  shopid =".$value['shopid']." ".$where2."  order by id desc  limit 0,10");
 	 		     $value['shopname'] = isset($shopinfo['shopname'])? $shopinfo['shopname']:'不存在';
 	 		   
 	 		     $data['list'][] = $value;
 	 		    
 	 		  }
 	 		}
 	 	 
 	 $timearr= array(
 	 '0'=>'所有时间',
 	 '1'=>'最近一月',
 	 '2'=>'最近一周',
 	 '3'=>'当天'
 	 );
 
 	 $data['typeshow'] = $timearr[$tempselecttype];
 	 $data['selecttype'] = $selecttype; 
 	 		 Mysite::$app->setdata($data);
 	 	
  	}
  	
  	function goods(){
 	 	//店铺统计 
 	 		 $selecttype = intval(IFilter::act(IReq::get('selecttype')));
 	 		$tempselecttype = in_array($selecttype,array(0,1,2,3))?$selecttype:0;
 	 			$wherearray = array(
 	 		'0'=>'',
 	 		'1'=>'  ord.addtime > '.strtotime('-1 month'),
 	 		'2'=>'  ord.addtime > '.strtotime('-7 day'),
 	 		'3'=>'  ord.addtime > '.strtotime(date('Y-m-d',time()))
 	 		); 
 	 		$where1 = empty($wherearray[$tempselecttype]) ? '':' where '.$wherearray[$tempselecttype];
 	 		$where2 =  empty($wherearray[$tempselecttype]) ? '':' and '.$wherearray[$tempselecttype];
 	 		$data['list']= $this->mysql->getarr("select count(ordet.id) as shuliang ,ordet.goodsid,ordet.goodsname as shopname from ".Mysite::$app->config['tablepre']."orderdet  as ordet left join  ".Mysite::$app->config['tablepre']."order as ord on ordet.order_id = ord.id  ".$where1." group by ordet.goodsid   order by shuliang desc  limit 0,5");
 	 	 
 	 		 $data['selecttype'] = $selecttype;
 	 	  Mysite::$app->setdata($data);
 	 	
  	}
  	function user(){
 	 	//店铺统计 
 	 		
 	 		$selecttype = intval(IFilter::act(IReq::get('selecttype')));
 	 		$tempselecttype = in_array($selecttype,array(0,1,2,3))?$selecttype:0;
 	 		$wherearray = array(
 	 		'0'=>'',
 	 		'1'=>' where addtime > '.strtotime('-1 month'),
 	 		'2'=>' where addtime > '.strtotime('-7 day'),
 	 		'3'=>' where addtime > '.strtotime(date('Y-m-d',time()))
 	 		);
 	 		$tempdata =   $this->mysql->getarr("select count(id) as shuliang ,DATE_FORMAT(FROM_UNIXTIME(`addtime`),'%k') as month from ".Mysite::$app->config['tablepre']."order  ".$wherearray[$tempselecttype]." group by month    order by month desc  limit 0,10");
 	 		$list = array();
 	 	  if(is_array($tempdata)){
 	 	  	foreach($tempdata as $key=>$value){
 	 	  		$list[$value['month']] = $value['shuliang'];
 	 	  	}
 	 	  }
 	 	  $data['list'] = $list;
 	 	  $data['selecttype'] = $selecttype;
 	 	  Mysite::$app->setdata($data);
 	 	
  	}
}



?>