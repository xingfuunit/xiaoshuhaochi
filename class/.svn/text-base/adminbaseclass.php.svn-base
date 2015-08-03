<?php 

/**
 * @class baseclass 
 * @描述   基础类
 */
class adminbaseclass
{
	 public $mysql;
	 public $memberCls;
	 public $member;
	 public $pageCls;
	 public $admin;
	 public $digui;
	 function init(){
	 	     //主要是检测权限 
	 	     $controller = Mysite::$app->getController();
	 	     $Taction = Mysite::$app->getAction();
	 	     $this->mysql =  new mysql_class(); 
	 	     $this->memberCls = new memberclass($this->mysql);  
	 	     $this->pageCls = new page();
	 	     $this->admin =  $this->memberCls->getadmininfo();  
	 	     $this->digui = array();//递归处理数组
	 	     $link = IUrl::creatUrl('member/adminlogin'); 
	 	     if($this->admin['uid'] == 0) $this->message('未登陆',$link);
	 	     $data['admininfo'] = $this->admin; 
	 	     
	 	     $checkmodule =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."module  where name='".$Taction."' and install=1 limit 0,20");  
	 	     if(empty($checkmodule) && !in_array($controller,array('site','market'))){ 
	 	         $this->message('未安装此模版'); 
	 	     }   
	 	     $action = Mysite::$app->getAction();  
	 	     $data['moduleid']= $checkmodule['id']; 
	 	     $data['moduleparent'] = $checkmodule['parent_id']; 
	 	     $id = intval(IFilter::act(IReq::get('id'))); 
	 	     $data['id'] = $id; 
	 	   
	 	     Mysite::$app->setdata($data);  
	 } 
	 public function checkadminlogin(){
	 	 $link = IUrl::creatUrl('member/adminlogin'); 
	 	 if($this->admin['uid'] == 0) $this->message('未登陆',$link); 
	 }
	 public function checkmemberlogin(){
	 	 $link = IUrl::creatUrl('member/login'); 
	 	 if($this->member['uid'] == 0) $this->message('未登陆',$link); 
	 }
	 public function checkshoplogin(){
	 	 $link = IUrl::creatUrl('member/shoplogin'); 
	 	 if($this->member['uid'] == 0&&$this->admin['uid'] == 0)  $this->message('未登陆',$link); 
	 	 $shopid = ICookie::get('adminshopid');
	 	 if(empty($shopid)) $this->message('未登陆',$link); 
	 }
	 public static function sqllink($where,$sqlkey,$sqlvalue,$fuhao){
	 	  if(empty($sqlvalue)){
	 	     return  $where;
	 	  }else{
	 	  	 if(empty($where)){
	 	  	   return  '`'.$sqlkey.'`'.$fuhao.'\''.$sqlvalue.'\'';
	 	  	 }else{
	 	  	 	 return $where.' and `'.$sqlkey.'`'.$fuhao.'\''.$sqlvalue.'\'';
	 	  	 }
	 	  }
	   
	 }
	 public static function message($msg,$link=''){
	 		$datatype = IFilter::act(IReq::get('datatype')); 
	 		if($datatype == 'json'){
	 			 echo json_encode(array('error'=>true,'msg'=>$msg));  
	       exit; 
	 		}else{   
         self::refunction($msg,$link);
	 		} 
   }
   public static function refunction($msg,$info=''){
   	  $newrul = empty($info)?Mysite::$app->config['siteurl']:$info;
	    header("Content-Type:text/html;charset=utf-8"); 
	    if(!empty($msg))
	    {
			   echo '<script>alert(\''.$msg.'\');location.href=\''.$newrul.'\';</script>';
		  }else{
		     echo '<script>location.href=\''.$newrul.'\';</script>';
	  	}
      exit;
   }
   public static function success($msg,$link=''){
   	   $datatype = IFilter::act(IReq::get('datatype')); 
	 		if($datatype == 'json'){
	 			 echo json_encode(array('error'=>false,'msg'=>$msg)); 
	       exit; 
	 		}else{
	 			 self::refunction($msg,$link); 
	 		}
    	
   }
   
	 public static function shopIsopen($is_open,$starttime,$is_orderbefore,$nowhour){ 
		  $find = 0 ;
		  $hfind =0;
		  $gotime ='';
		  $opentype = 0;
		  $endtime = '';
		  $checkstart = '';
		  $checkend = '';
		  if($is_open == 0){
		  	   $opentype = 4;//店铺休息
		  }else{
		 	if(empty($starttime)){
		 		  $opentype = 1;//已打烊
		 	}else{
		 		$foo = explode('|',$starttime); 
		 		foreach($foo as $key=>$value){
		 			
		 			if(!empty($value)){
		 				$mytime = explode('-',$value);
		 			 
		 				if(count($mytime) > 1){
		 				
		 					$time1 = strtotime($mytime[0]);
		 					$time2 = strtotime($mytime[1]);
		 				 
		 					if($nowhour > $time1 && $nowhour < $time2){
		 						$find = 1;
		 						$opentype = 2;//营业中 
		 						$gotime = empty($gotime)?$mytime[0]:$gotime;
		 						$endtime = !empty($mytime[1])?strtotime($mytime[1]):$endtime;
		 					}
		 					if($nowhour < $time2){
		 						$hfind = 1;
		 						$gotime = empty($gotime)?$mytime[0]:$gotime; 
		 						$checkstart = empty($checkstart)?strtotime($mytime[0]):$checkstart; 
		 					  $checkend = !empty($mytime[1])?strtotime($mytime[1]):$checkend;
		 					} 
		 				}
		 			}
		 		}
		 		if($opentype == 0){
		 		   if($is_orderbefore == 1&& $hfind ==1){
		 			   $opentype = 3;//3接受预定 
		 		   }
		 		} 
		 	}
		 } 
		 return array('opentype'=>$opentype,'newstartime'=>$gotime,'endtime'=>$endtime,'startoktime'=>$checkstart,'startendtime'=>$checkend); 
	 }
	 public function pscost($shopinfo,$goodsnum){
  	$backdata = array('pscost'=>0,'pstype'=>0,'canps'=>0);
  	$sendtype = 0;//网站配送
  	if(isset($shopinfo['sendtype']) && $shopinfo['sendtype'] == 1 ){ 
  	  $sendtype = 1;  //店铺配送
  	  $backdata['pstype'] = 1;
  	}
  	// 'psset' => 'a:5:{s:12:"locationtype";i:2;s:6:"pstype";i:1;s:8:"psvalue1";s:1:"3";s:8:"psvalue2";s:1:"6";s:8:"psvalue3";s:2:"10";}',
  	$psinfo = Mysite::$app->config['psset'];
  	if(empty($psinfo)){
  	  return $backdata;//无配送设置则配送费为 0;
  	}
  	$siteps = unserialize($psinfo);
    $locationtype = $siteps['locationtype']  == 1?1:2;//定位方式
  	if($sendtype == 0){//网站配送费计算规则;   
  	   switch($siteps['pstype']){
  	     case '1':
  	        $backdata['pscost'] =  empty($siteps['psvalue1'])?0:$siteps['psvalue1'];
  	        $backdata['canps'] = 1;
  	     break;
  	     case '2'://根据不同区域设置不同配送费
  	      $areaid = ICookie::get('myaddress');  
  	      if(!empty($areaid)){
  	           if($shopinfo['shoptype'] == 1){
  	            $areainfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."areatomar where areaid = ".$areaid." and shopid = 0"); 
  	           }else{
  	           $areainfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."areatoadd where areaid = ".$areaid." and shopid = 0"); 
  	           }
  	           $backdata['pscost'] =  isset($areainfo['cost'])? $areainfo['cost']:0;  
  	           $backdata['canps'] = 1;
  	      }else{
  	      	$backdata['canps'] = 0;
  	      }
  	     break;
  	     case '3'://不计算
  	     $backdata['pscost'] = 0;
  	     $backdata['canps'] = 1;
  	     break;
  	     case '4'://地图
  	       if($locationtype == 1){
  	       	  $lat = ICookie::get('lat');  
  	       	  $lng = ICookie::get('lng');  
  	       	  $lat = empty($lat)?0:$lat;
  	       	  $lng = empty($lng)?0:$lng;
  	       	  $shoplat = isset($shopinfo['lat'])?$shopinfo['lat']:0;
  	       	  $shoplng = isset($shopinfo['lng'])?$shopinfo['lng']:0;
  	       	  $juli =  $this->GetDistance($lat,$lng, $shoplat,$shoplng, 1);
  	       	  if($juli < 1001){
  	       	     $backdata['pscost'] = $siteps['psvalue1'];
  	       	     $backdata['canps'] = 1;
  	       	  }elseif($juli < 3001){
  	       	  	$backdata['pscost'] = $siteps['psvalue2'];
  	       	  	$backdata['canps'] = 1;
  	       	  }elseif($juli < 6001){
  	       	  	$backdata['pscost'] = $siteps['psvalue3'];
  	       	  	$backdata['canps'] = 1;
  	       	  }else{
  	       	  	$backdata['pscost'] = 100;
  	       	  	$backdata['canps'] = 0;
  	       	  } 
  	       }else{
  	       	 $backdata['pscost'] = 0;
  	       	 $backdata['canps'] = 0;
  	       }
  	     break;
  	     case '5'://菜品计算
  	        $tempstart =$siteps['psvalue1'];
  	        $stepcost =  $goodsnum*$siteps['psvalue2']; 
  	        $backdata['pscost'] = $tempstart+$stepcost - $siteps['psvalue2'];
  	        $backdata['pscost'] = 0;
  	        $backdata['canps'] = 1;
  	     break;
  	     default://不在 所列举 范围内则为0；
  	        $backdata['pscost'] =  0;
  	        $backdata['canps'] = 0;
  	     break;
  	   }
  	  	
  	  	
  	}elseif($sendtype ==  1){//店铺配送费计算规则
  		
  		
  		if(empty($shopinfo['sendset'])){//无店铺设置返回0；
  			  return $backdata;
  		}
  		
  		$shopps =  unserialize($shopinfo['sendset']);
  		 
  		switch($shopps['pstype']){
  	     case '1'://同意配送费
  	        $backdata['pscost'] =  empty($shopps['psvalue1'])?0:$shopps['psvalue1'];
  	        $backdata['canps'] = 1;
  	     break;
  	     case '2'://根据不同区域设置不同配送费 
  	      $areaid = ICookie::get('myaddress');
  	      if(!empty($areaid)){  
  	          if($shopinfo['shoptype'] == 1){
  	          	$areainfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."areatomar where areaid = ".$areaid." and shopid = ".$shopinfo['id'].""); 
  	            $backdata['pscost'] =  isset($areainfo['cost'])? $areainfo['cost']:0;  
  	            $checkareainfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."areamarket where areaid = ".$areaid." and shopid = ".$shopinfo['id'].""); 
  	          }else{
  	            $areainfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."areatoadd where areaid = ".$areaid." and shopid = ".$shopinfo['id'].""); 
  	            $backdata['pscost'] =  isset($areainfo['cost'])? $areainfo['cost']:0;  
  	            $checkareainfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."areashop where areaid = ".$areaid." and shopid = ".$shopinfo['id'].""); 
  	          }
  	          if(empty($checkareainfo)){
  	          	$backdata['canps'] = 0;
  	          }else{
  	           $backdata['canps'] = 1;
  	           }
  	      }else{
  	      	 $backdata['canps'] = 0;
  	      }
  	      
  	     break;
  	     case '3'://不计算 
  	        $backdata['pscost'] = 0;
  	        $backdata['canps'] = 1;
  	     break;
  	     case '4'://地图
  	       if($locationtype == 1){
  	       		$lat = ICookie::get('lat');  
  	       	  $lng = ICookie::get('lng');  
  	       	  $lat = empty($lat)?0:$lat;
  	       	  $lng = empty($lng)?0:$lng;
  	       	  $juli =  $this->GetDistance($lat,$lng, $shopinfo['lat'],$shopinfo['lng'], 1);
  	       	  if($juli < 1001){
  	       	     $backdata['pscost'] = $shopps['psvalue1'];
  	       	     $backdata['canps'] =1;
  	       	  }elseif($juli < 3001){
  	       	  	$backdata['pscost'] = $shopps['psvalue2'];
  	       	  	$backdata['canps'] = 1;
  	       	  }elseif($juli < 6001){
  	       	  	$backdata['pscost'] = $shopps['psvalue3'];
  	       	  	$backdata['canps'] = 1;
  	       	  }else{
  	       	  	$backdata['canps'] = 0;
  	       	  	$backdata['pscost'] = 100;
  	       	  } 
  	       }else{
  	       	 $backdata['canps'] = 0;
  	       	 $backdata['pscost'] = 0;
  	       }
  	     break;
  	     case '5'://菜品计算
  	        $tempstart =$shopps['psvalue1'];
  	        $stepcost =  $goodsnum*$shopps['psvalue2']; 
  	        $backdata['pscost'] = $tempstart+$stepcost - $shopps['psvalue2'];
  	        $backdata['canps'] = 1;
  	     break;
  	     default://不在 所列举 范围内则为0；
  	        $backdata['pscost'] =  0;
  	        $backdata['canps'] = 0;
  	     break;
  	   }
  		
  		
  	}
  	return $backdata; 
  }
  
  //发送通知信息
  
  
  
  
   function GetDistance($lat1, $lng1, $lat2, $lng2, $len_type = 1, $decimal = 2)
  {
    	 define('EARTH_RADIUS', 6378.137);//地球半径，假设地球是规则的球体
       define('PI', 3.1415926);
    	 $earth = 6378.137;
    	 $pi = 3.1415926;
       $radLat1 = $lat1 * PI ()/ 180.0;   //PI()圆周率
       $radLat2 = $lat2 * PI() / 180.0;
       $a = $radLat1 - $radLat2;
       $b = ($lng1 * PI() / 180.0) - ($lng2 * PI() / 180.0);
       $s = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1) * cos($radLat2) * pow(sin($b/2),2)));
       $s = $s * EARTH_RADIUS;
       $s = round($s * 1000);
       if ($len_type > 1)
       {
           $s /= 1000;
       }
       return round($s, $decimal);
   } 
}
?>