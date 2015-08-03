<?php
class method   extends baseclass
{
	//默认首页
	function index(){
	   $shop = trim(IFilter::act(IReq::get('id')));
		$where = intval($shop) > 0?' where a.shopid = '.$shop:'where shortname=\''.$shop.'\'';
		//获取外卖店铺
		$shopinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."   ");

		//年费检测
		if($shopinfo['endtime'] < time()){
			$link = IUrl::creatUrl('site/index');
		   $this->message('店铺已关门',$link);
		}

		if(empty($shopinfo)){
			$link = IUrl::creatUrl('site/index');
		  $this->message('获取店铺信息失败',$link);
		}
		$nowhour = date('H:i:s',time());
	  $nowhour = strtotime($nowhour);
	  $data['shopinfo'] = $shopinfo;
		$data['shopopeninfo'] = $this->shopIsopen($shopinfo['is_open'],$shopinfo['starttime'],$shopinfo['is_orderbefore'],$nowhour);


		//获取所有外卖分类及商品
		$data['com_goods'] =  $this->mysql->getarr("select *  from ".Mysite::$app->config['tablepre']."goods where shopid = ".$shopinfo['id']." and is_com = 1   ");
		$goodstype=  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodstype where shopid = ".$shopinfo['id']." and cattype = ".$shopinfo['shoptype']." order by orderid asc");
		$data['goodstype'] = array();
		$tempids = array();
		foreach($goodstype as $key=>$value){
			 $value['det'] = $this->mysql->getarr("select *  from ".Mysite::$app->config['tablepre']."goods where typeid = ".$value['id']." and shopid=".$shopinfo['id']."  ");
			 $tempids[] = $value['id'];
			$data['goodstype'][] =$value;
		}
		//获取主属性

	  $data['mainattr'] = array();
     $templist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = ".$shopinfo['shoptype']." and parent_id = 0 and is_main =1  order by orderid asc limit 0,1000");
		 foreach($templist as $key=>$value){
	  	 $value['det'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20");
	  	 $data['mainattr'][] = $value;
	 	 }
	  //获取店铺主属性
		$data['shopattr'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr  where  cattype = ".$shopinfo['shoptype']." and shopid = '".$shopinfo['id']."'  order by firstattr asc limit 0,1000");

		//获取店铺商品属性
		 $data['goodsattr'] = array();
		 $goodsattr = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodssign  where  type = 'goods'  order by id asc limit 0,1000");

		 foreach($goodsattr as $key=>$value){
		   $data['goodsattr'][$value['id']] = $value['imgurl'];

		 }

	   $data['psinfo'] = 	 $this->pscost($shopinfo,1);
	    $sellrule =new sellrule();
		    $sellrule->setdata($shopinfo['shopid'],1000,$shopinfo['shoptype']);
		    $ruleinfo = $sellrule->getdata();
		 $data['ruledata'] = array();
		 if(isset($ruleinfo['cxids']) && !empty($ruleinfo['cxids'])){
		 	   //获取所有规则数据
		 	 $data['ruledata'] =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."rule  where  id in(".$ruleinfo['cxids'].")  order by id asc limit 0,1000");


		 }
		 $cximglist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodssign  where  type = 'cx'  order by id asc limit 0,1000");

		 $data['ruleimg'] = array();
		 foreach($cximglist as $key=>$value){
		    $data['ruleimg'][$value['id']] = $value['imgurl'];
		 }

		 $data['cxlist'] = $ruleinfo;



	  $data['scoretocost'] = Mysite::$app->config['scoretocost'];

	  //判断收藏
	   $data['collect'] = array();
	   if(!empty($this->memberinfo)){ //collectid 对应商品/店铺ID collecttype 0店铺 1商品 shopuid 店铺所有者ID orderid
	  	 $data['collect'] =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."collect where collectid=".$shopinfo['id']." and collecttype = 0 and uid=".$this->member['uid']." ");
	   }

	  //获取备注
	   $bzinfo = Mysite::$app->config['orderbz'];
	   $data['bzlist'] = array();
	   if(!empty($bzinfo)){
	 	    $data['bzlist'] = unserialize($bzinfo);
	   }
	   /*个人地址列表  */
	   $addresslist = array();
	   if($this->member['uid'] > 0){
	   	  	$addresslist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."address where userid=".$this->member['uid']."  ");
	   }
	   $data['addresslist'] = $addresslist;

	   //获取促销规则数据


	   $data['paylist']  = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."paylist   order by id desc  ");

	   /*优惠卷*/
	   $data['juanlist'] = array();
	   if(!empty($this->member['uid'] )){
	        $data['juanlist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."juan  where uid ='".$this->member['uid']."'  and status = 1 and endtime > ".time()."  order by id desc limit 0,20");
	   }
	   Mysite::$app->setdata($data);
	}
	//保存店铺
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
	function useredit(){
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		if($shopid > 0){
			  $data['shopname'] =IFilter::act(IReq::get('shopname'));
			  if(!empty($data['shopname'])){
			  	$data['phone'] = IFilter::act(IReq::get('phone'));
	      	$data['address'] = IFilter::act(IReq::get('address'));
	      	$data['shortname'] = IFilter::act(IReq::get('shortname'));
	      	$data['email'] = IFilter::act(IReq::get('email'));
	      	$data['is_open'] = intval(IReq::get('is_open'));
	      	$starttime = IFilter::act(IReq::get('starttime'));
	        $data['otherlink'] = IFilter::act(IReq::get('otherlink'));
	        $data['IMEI'] = IFilter::act(IReq::get('IMEI'));
	        $link = IUrl::creatUrl('shopcenter/base');
	      	if(!(IValidate::len($data['shopname'],4,50))) $this->message('店铺名长度大于4小于50');//$this->refunction('店铺名长度大于4小于50',$link);
	      	if(!(IValidate::phone($data['phone']))) $this->message('正录入正确的订餐电话');//$this->refunction('正录入正确的订餐电话',$link);
	      	if(!(IValidate::len($data['address'],4,50)))  $this->message('店铺门市地址长度大于4小于50');//$this->refunction('店铺门市地址长度大于4小于50',$link);
	      	if(!(IValidate::len($data['shortname'],3,10))) $this->message('访问地址长度大于3小于10');//$this->refunction('访问地址长度大于3小于10',$link);
	      	if(!empty($data['shortname'])){
	      	    if(!(IValidate::email($data['email']))) $this->message('邮箱地址不是邮件');//$this->refunction('邮箱地址不是邮件',$link);
	        }
	      	if(in_array($data['shortname'],array('shopcenter','site','admin','member','membercenter','shop','comment','ask','single','gift','news','adv'))) $this->message('访问地址已存在');// $this->refunction('访问地址已存在',$link); //判断是否是系统设置的类型
	      	$checkcode = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where id !='".$shopid."' and shortname ='".$data['shortname']."' ");
	      	if(!empty($checkcode)) $this->message('访问地址已存在');//$this->refunction('访问地址已存在',$link); //判断是否是有店铺 有此名称
	      	$data['starttime']='';
	      	   if(empty($starttime)) $this->message('录入时间不能为空');
	      	   $starttime =  explode(',',$starttime);
	      	   if(!is_array($starttime)) $this->message('时间格式错误');// $this->refunction('请录入正确时间格式',$link);
	      	   $checkshu = count($starttime);
	      	   if($checkshu%4 !=0) $this->message('时间格式错误11');
	      	  $newtime = array();
	      	  foreach($starttime as $key=>$value)
	      	  {

	      	  	 if($key%4 == 0){
	      	  	 	  $data['starttime'] .= $value.':';
	      	  	 }elseif($key%4 == 1){
	      	  	 	$data['starttime'] .= $value.'-';
	      	  	 }elseif($key%4 == 2){
	      	  	 	$data['starttime'] .= $value.':';
	      	  	 }elseif($key%4 == 3){
	      	  	 		$data['starttime'] .= $value.'|';
	      	  	 }

	      	  }

	      	 if(empty($data['starttime'])) $this->message('请录入营业时间');// $this->refunction('请录入营业时间',$link);
	      	 if(count($newtime)%2==1) $this->message('请录入正确时间格式');//$this->refunction('请录入正确时间格式',$link);

	      	  $data['starttime'] = substr($data['starttime'],0,strlen($data['starttime'])-1);
	         $this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$shopid."'");
	         //$basearea = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."areatowait where shopid=".$shopid."    order by id desc  limit 0,1000");

	         //更新店铺名称
	         $Searchk = new searchkey($this->mysql);
	         $checkiex = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."shopfast where shopid ='".$shopid."'  ");
	         if($checkiex > 0){
	            $Searchk->setdata(1,$shopid,$data['shopname']);
	            $Searchk->save();
	         }
			  	 $this->success('操作成功');
			  }
		}
		$data['newtimedata'] = array();
		Mysite::$app->setdata($data);
	}
	function startshop(){
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		if($shopid > 0){
			 $shopinfo = $this->shopinfo();
		   $opentype = IFilter::act(IReq::get('opentype'));
		   if($shopinfo['shoptype'] == 0){
		   	  $checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast  where shopid = '".$shopid."' ");
		   	  if(empty($checkinfo)){
		      	$data['shopid'] = $shopid;
		      	$this->mysql->insert(Mysite::$app->config['tablepre']."shopfast",$data); //写入
		      	$Searchk = new searchkey($this->mysql);
		        $Searchk->setdata($shopinfo['shoptype'],$shopid,$shopinfo['shopname']);
	              $this->success('操作成功');

	        }else{
	     	    $this->message('已存在信息开启失败');
	        }
		   }elseif($shopinfo['shoptype'] == 1){
		   	  $checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket  where shopid = '".$shopid."' ");
		   	  if(empty($checkinfo)){
		      	$data['shopid'] = $shopid;
		      	$this->mysql->insert(Mysite::$app->config['tablepre']."shopmarket",$data); //写入
		      	$Searchk = new searchkey($this->mysql);
		        $Searchk->setdata($shopinfo['shoptype'],$shopid,$shopinfo['shopname']);
	          $this->success('操作成功');
	        }else{
	     	    $this->message('已存在信息开启失败');
	        }
		   }
	  }
	}
	function closeshop(){
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		$opentype = IFilter::act(IReq::get('opentype'));
		$checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop  where id = '".$shopid."' ");
		if(empty($checkinfo)){
			 $this->message('店铺对应设置不存在，删除失败');
		}else{
			  if($checkinfo['shoptype'] == 0){
			        $this->mysql->delete(Mysite::$app->config['tablepre']."shopfast"," shopid='".$shopid."'");
			     	  $this->mysql->delete(Mysite::$app->config['tablepre']."areatoadd"," shopid='".$shopid."' "); //
			     		$this->mysql->delete(Mysite::$app->config['tablepre']."areashop"," shopid='".$shopid."' "); //
			     		//删除产品
			     		$this->mysql->delete(Mysite::$app->config['tablepre']."goods"," shopid='".$shopid."' "); //
			     		//删除分类
			     		$this->mysql->delete(Mysite::$app->config['tablepre']."goodstype"," shopid='".$shopid."' "); //
			  }
			  if($checkinfo['shoptype'] == 1){
			  	  $this->mysql->delete(Mysite::$app->config['tablepre']."shopmarket"," shopid='".$shopid."'");
			      $this->mysql->delete(Mysite::$app->config['tablepre']."areamarket"," shopid='".$shopid."' "); //
			      $this->mysql->delete(Mysite::$app->config['tablepre']."areatomar"," shopid='".$shopid."' "); //
			      	$this->mysql->delete(Mysite::$app->config['tablepre']."goods"," shopid='".$shopid."' "); //
			  		$this->mysql->delete(Mysite::$app->config['tablepre']."marketcate"," shopid='".$shopid."' "); //
			  }


		   $this->mysql->delete(Mysite::$app->config['tablepre']."shopattr"," shopid='".$shopid."' and cattype  = ".$checkinfo['shoptype']."");
		   $this->mysql->delete(Mysite::$app->config['tablepre']."shopsearch"," shopid='".$shopid."' and cattype  = ".$checkinfo['shoptype']."");
			 $Searchk = new searchkey($this->mysql);
	     $Searchk->setdata($checkinfo['shoptype'],$shopid,'a');
	     $Searchk->del();
		   $this->success('操作成功');
		}
	}

	function usershopfast(){
		$this->checkshoplogin();
		$data['sitetitle'] = '店铺设置';
		$shopid = ICookie::get('adminshopid');
		$checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop  where id = '".$shopid."' ");

		if($checkinfo['shoptype'] == 0){

	     	$data['shopfast'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast  where shopid = '".$shopid."' ");

                   //  print_r($data['shopfast']['sendset']);exit;
	     	if(empty($data['shopfast'])){
	     	  	$udata['shopid'] = $shopid;
		      	$this->mysql->insert(Mysite::$app->config['tablepre']."shopfast",$udata);
		      	$data['shopfast'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast  where shopid = '".$shopid."' ");
	     	}
	  }
                $arr_morning_offer="";
                $arr_afternoon_offer="";
                $arr_morning_offer = explode("-",$data['shopfast']['morning_offer']);
                if ($data['shopfast']['afternoon_offer']) {
                      $arr_afternoon_offer = explode("-",$data['shopfast']['afternoon_offer']);
                      $afternoon_offer1 = explode(":",$arr_afternoon_offer[0]);
                      $afternoon_offer2 = explode(":",$arr_afternoon_offer[1]);
                      $data['afternoon_offer1'] = $afternoon_offer1;
                      $data['afternoon_offer2'] = $afternoon_offer2;
                }

                $morning_offer1 = explode(":",$arr_morning_offer[0]);
                $morning_offer2 = explode(":",$arr_morning_offer[1]);
                $data['morning_offer1'] = $morning_offer1;
                $data['morning_offer2'] = $morning_offer2;
                //到店消费配置
                $arr_morning_inshop="";
                $arr_afternoon_inshop="";
                $arr_morning_inshop = explode("-",$data['shopfast']['morning_inshop']);
                if ($data['shopfast']['afternoon_inshop']) {
                      $arr_afternoon_inshop = explode("-",$data['shopfast']['afternoon_inshop']);
                      $afternoon_inshop1 = explode(":",$arr_afternoon_inshop[0]);
                      $afternoon_inshop2 = explode(":",$arr_afternoon_inshop[1]);
                      $data['afternoon_inshop1'] = $afternoon_inshop1;
                      $data['afternoon_inshop2'] = $afternoon_inshop2;
                }

                $morning_inshop1 = explode(":",$arr_morning_inshop[0]);
                $morning_inshop2 = explode(":",$arr_morning_inshop[1]);
                $data['morning_inshop1'] = $morning_inshop1;
                $data['morning_inshop2'] = $morning_inshop2;

	  //获取所有extend属性 xiaozu_shoptype
	  //id  name 分类名 type checkbox多选，radio单选，img图片，input输入框 parent_id 0表示导航明，1值  1外卖2订台3其他 is_search 0不是搜索关键字1搜索关键字 is_main 是否展示在店铺列表 0否1是 is_admin 设置类型0店铺1后台 instro 简单介绍 orderid
	  $attrinfo = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = ".$checkinfo['shoptype']." and parent_id = 0 and is_admin = 0  order by orderid asc limit 0,1000");
	  $data['attrlist'] = array();
	  foreach($attrinfo as $key=>$value){
	  	 $value['det'] =  $this->mysql->getarr("select id,name,instro from ".Mysite::$app->config['tablepre']."shoptype where   parent_id = ".$value['id']." order by id desc ");
                 
	  	 $data['attrlist'][] = $value;
	  }
          
	  // shopid  cattype 1外卖2订台 firstattr  attrid 该属性ID value 值
	  $shopsetatt = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr where  cattype = ".$checkinfo['shoptype']."   and shopid = '".$shopid."'  limit 0,1000");
	  //firstvalue attrid
	  $myattr = array();
	  foreach($shopsetatt as $key=>$value){
	  	 $myattr[$value['firstattr'].'-'.$value['attrid']] = $value['value'];
	  }
	  $data['myattr'] = $myattr;
	  $data['pestypearr'] = array(
	 	   '1'=>'店铺统一配送费',
	 	   '2'=>'店铺区域设置配送费',
	 	   '3'=>'不计算配送费',
	 	   '4'=>'根据定位距离计算',
	 	   '5'=>'根据菜品数计算配送费',
                   '6'=>'未满指定金额计费'
	 	   );
	 	$data['defaultset'] = array('pstype'=>'0','psvalue1'=>'0','psvalue2'=>'0','psvalue3'=>'0');
	  Mysite::$app->setdata($data);
	}
	function usershopmarket(){
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		$checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop  where id = '".$shopid."' ");


	  $data['shopfast'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket  where shopid = '".$shopid."' ");
	  if(empty($data['shopfast'])){
	  	  $udata['shopid'] = $shopid;
		      	$this->mysql->insert(Mysite::$app->config['tablepre']."shopmarket",$udata);
		      	 $data['shopfast'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket  where shopid = '".$shopid."' ");
	  }



	  //获取所有extend属性 xiaozu_shoptype
	  //id  name 分类名 type checkbox多选，radio单选，img图片，input输入框 parent_id 0表示导航明，1值  1外卖2订台3其他 is_search 0不是搜索关键字1搜索关键字 is_main 是否展示在店铺列表 0否1是 is_admin 设置类型0店铺1后台 instro 简单介绍 orderid
	  $attrinfo = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = ".$checkinfo['shoptype']." and parent_id = 0 and is_admin = 0  order by orderid desc limit 0,1000");
	  $data['attrlist'] = array();
	  foreach($attrinfo as $key=>$value){
	  	 $value['det'] =  $this->mysql->getarr("select id,name,instro from ".Mysite::$app->config['tablepre']."shoptype where   parent_id = ".$value['id']." order by id desc ");
	  	 $data['attrlist'][] = $value;
	  }
	  // shopid  cattype 1外卖2订台 firstattr  attrid 该属性ID value 值
	  $shopsetatt = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopattr where  cattype = ".$checkinfo['shoptype']."   and shopid = '".$shopid."'  limit 0,1000");
	  //firstvalue attrid
	  $myattr = array();
	  foreach($shopsetatt as $key=>$value){
	  	 $myattr[$value['firstattr'].'-'.$value['attrid']] = $value['value'];
	  }
	  $data['myattr'] = $myattr;
	  $data['pestypearr'] = array(
	 	   '1'=>'店铺统一配送费',
	 	   '2'=>'店铺区域设置配送费',
	 	   '3'=>'不计算配送费',
	 	   '4'=>'百度地图测算配送费',
	 	   '5'=>'根据菜品数计算配送费'
	 	   );
	 	$data['defaultset'] = array('pstype'=>'0','psvalue1'=>'0','psvalue2'=>'0','psvalue3'=>'0');
	  Mysite::$app->setdata($data);
	}

	function shopinfo(){
	  $shopid = ICookie::get('adminshopid');
	  if($shopid > 0){
	    $shopinfo =	$this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop  where id = '".$shopid."' ");
	  }else{
	  	$shopinfo = '';
	  }
	  return $shopinfo;
	}
	function savefastfood(){
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$shopinfo = $this->shopinfo();
		if($shopinfo['shoptype'] ==  0){//外卖
		$data['is_orderbefore'] = intval(IFilter::act(IReq::get('is_orderbefore')));
                $data['is_orderbefore_inshop'] = intval(IFilter::act(IReq::get('is_orderbefore_inshop')));
		$data['befortime'] = intval(IFilter::act(IReq::get('befortime')));
                $data['befortime_inshop'] = intval(IFilter::act(IReq::get('befortime_inshop')));

		$data['limitcost']  = intval(IFilter::act(IReq::get('limitcost')));
		$data['limitstro'] = IFilter::act(IReq::get('limitstro'));
		$data['personcost'] = intval(IFilter::act(IReq::get('personcost')));
		$data['sendtype'] = intval(IFilter::act(IReq::get('sendtype')));
		$data['maketime']  = intval(IFilter::act(IReq::get('maketime')));
		$data['asoftime'] = IFilter::act(IReq::get('asoftime'));

		$data['is_waimai'] = intval(IFilter::act(IReq::get('is_waimai')));
		$data['is_goshop'] = intval(IFilter::act(IReq::get('is_goshop')));
		$data['personcount'] = intval(IFilter::act(IReq::get('personcount')));
		if (!empty($data['asoftime'])) {
			if (!preg_match('/^([0-1][0-9])|(2[0-3]):([1-9]|(0[1-9])|([1-5][0-9]))$/',$data['asoftime'])) {
				$link = IUrl::creatUrl('shop/usershopfast');
				$this->message('当天下单截至时间不正确', $link);
			}
		}
		$data['asoftime'] = empty($data['asoftime'])? '10:00' : $data['asoftime'];

		$pstype = intval(IFilter::act(IReq::get('pstype')));
		$psvalue1 = IFilter::act(IReq::get('psvalue1'));
		$psvalue2 = IFilter::act(IReq::get('psvalue2'));
		$psvalue3 = IFilter::act(IReq::get('psvalue3'));
                //外卖配送时间段
                $totle_time = IFilter::act(IReq::get('dotime'));
                $morning_offer = $totle_time[0].":".$totle_time[1]."-".$totle_time[2].":".$totle_time[3];
                $afternoon_offer = $totle_time[4].":".$totle_time[5]."-".$totle_time[6].":".$totle_time[7];
                $morning_offer_int = $totle_time[0].$totle_time[1].$totle_time[2].$totle_time[3];

               $link = IUrl::creatUrl('shop/usershopfast');
                if(!$totle_time[0]|!$totle_time[1]|!$totle_time[2]|!$totle_time[3]) $this->message("请填写正确的上午配送时间",$link);
               if(preg_match("/[^\d-., ]/",$morning_offer_int)) $this->message("时间格式必须是正确的数字格式",$link);
               if ($totle_time[0]>=24 | $totle_time[0]<0 | $totle_time[1]>=60 | $totle_time[1]<0 | $totle_time[2]>=24 | $totle_time[2]<0 | $totle_time[3]>=60 | $totle_time[3]<0) {
                   $this->message("请填写正确的时间格式",$link);
               }

               if ($totle_time[0]>$totle_time[2]) $this->message("起始时间不能大于截止时间",$link);
                //if(!$totle_time[4]|!$totle_time[5]|!$totle_time[6]|!$totle_time[7]) $this->message("请填写正确的下午配送时间",$link);

                if(!$totle_time[4]|!$totle_time[5]|!$totle_time[6]|!$totle_time[7]) {
                  $afternoon_offer="";
                }else{
                if(preg_match("/[^\d-., ]/",$morning_offer_int)) $this->message("下午时间格式必须是正确的数字格式",$link);
               if ($totle_time[4]>=24 | $totle_time[4]<0 | $totle_time[5]>=60 | $totle_time[5]<0 | $totle_time[6]>=24 | $totle_time[6]<0 | $totle_time[7]>=60 | $totle_time[7]<0) {
                   $this->message("请填写正确的下午时间格式",$link);
               }
          if ($totle_time[4] > $totle_time[6]) $this->message("起始时间不能大于截止时间",$link);

                }

                $data['morning_offer'] = $morning_offer;
                $data['afternoon_offer'] = $afternoon_offer;
                //堂食时间段
                if ($data['is_goshop']==1) {
                     $totle_time_inshop = IFilter::act(IReq::get('dotime2'));
                $morning_inshop = $totle_time_inshop[0].":".$totle_time_inshop[1]."-".$totle_time_inshop[2].":".$totle_time_inshop[3];
                $afternoon_inshop = $totle_time_inshop[4].":".$totle_time_inshop[5]."-".$totle_time_inshop[6].":".$totle_time_inshop[7];
                $morning_inshop_int = $totle_time_inshop[0].$totle_time_inshop[1].$totle_time_inshop[2].$totle_time_inshop[3];

               $link = IUrl::creatUrl('shop/usershopfast');
                if(!$totle_time_inshop[0]|!$totle_time_inshop[1]|!$totle_time_inshop[2]|!$totle_time_inshop[3]) $this->message("请填写正确的上午堂食时间",$link);
               if(preg_match("/[^\d-., ]/",$morning_inshop_int)) $this->message("时间格式必须是正确的数字格式",$link);
               if ($totle_time_inshop[0]>=24 | $totle_time_inshop[0]<0 | $totle_time_inshop[1]>=60 | $totle_time_inshop[1]<0 | $totle_time_inshop[2]>=24 | $totle_time_inshop[2]<0 | $totle_time_inshop[3]>=60 | $totle_time_inshop[3]<0) {
                   $this->message("请填写正确的堂食时间格式",$link);
               }

               if ($totle_time_inshop[0]>$totle_time_inshop[2]) $this->message("堂食起始时间不能大于截止时间",$link);
                //if(!$totle_time[4]|!$totle_time[5]|!$totle_time[6]|!$totle_time[7]) $this->message("请填写正确的下午配送时间",$link);
                  
                if(!$totle_time_inshop[4]|!$totle_time_inshop[5]|!$totle_time_inshop[6]|!$totle_time_inshop[7]) {
                  $afternoon_inshop="";
                }else{
                if(preg_match("/[^\d-., ]/",$morning_inshop_int)) $this->message("下午堂食时间格式必须是正确的数字格式",$link);
               if ($totle_time_inshop[4]>=24 | $totle_time_inshop[4]<0 | $totle_time_inshop[5]>=60 | $totle_time_inshop[5]<0 | $totle_time_inshop[6]>=24 | $totle_time_inshop[6]<0 | $totle_time_inshop[7]>=60 | $totle_time_inshop[7]<0) {
                   $this->message("请填写正确的下午时间格式",$link);
               }
          if ($totle_time_inshop[4] > $totle_time_inshop[6]) $this->message("堂食起始时间不能大于截止时间",$link);

                }
                $data['morning_inshop'] = $morning_inshop;
                $data['afternoon_inshop'] = $afternoon_inshop;
                }else {
                    $data['morning_inshop'] = "";
                $data['afternoon_inshop'] = "";
                }
               
                //
                $data['interval'] = IFilter::act(IReq::get('interval_inshop'));
                $data['interval'] = IFilter::act(IReq::get('interval'));
		$data['pradius'] = intval(IFilter::act(IReq::get('pradius')));
		$serr['pstype'] = intval($pstype*10)/10;
		$serr['psvalue1'] = intval($psvalue1*10)/10;
		$serr['psvalue2'] = intval($psvalue2*10)/10;
		$serr['psvalue3'] = intval($psvalue3*10)/10;
		$data['sendset'] = serialize($serr);

		$checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast  where shopid = '".$shopinfo['id']."' ");



		$this->mysql->update(Mysite::$app->config['tablepre'].'shopfast',$data,"shopid='".$shopinfo['id']."'");
		$updata['pradiusa'] = $data['pradius'];
		$this->mysql->update(Mysite::$app->config['tablepre'].'shop',$updata,"id='".$shopinfo['id']."'");
	 }elseif($shopinfo['shoptype'] == 1){ //超市
	 		$data['is_orderbefore'] = intval(IFilter::act(IReq::get('is_orderbefore')));
	 		$data['pradius'] = intval(IFilter::act(IReq::get('pradius')));
		  $data['befortime'] = intval(IFilter::act(IReq::get('befortime')));
                
		  $data['limitcost']  = intval(IFilter::act(IReq::get('limitcost')));
		  $data['limitstro'] = IFilter::act(IReq::get('limitstro'));
		  $data['sendtype'] = intval(IFilter::act(IReq::get('sendtype')));
		  $data['maketime']  = intval(IFilter::act(IReq::get('maketime')));
		  $pstype = intval(IFilter::act(IReq::get('pstype')));
		  $psvalue1 = IFilter::act(IReq::get('psvalue1'));
		  $psvalue2 = IFilter::act(IReq::get('psvalue2'));
		  $psvalue3 = IFilter::act(IReq::get('psvalue3'));
		  $serr['pstype'] = intval($pstype*10)/10;
		  $serr['psvalue1'] = intval($psvalue1*10)/10;
		  $serr['psvalue2'] = intval($psvalue2*10)/10;
		  $serr['psvalue3'] = intval($psvalue3*10)/10;
		  $data['sendset'] = serialize($serr);
		  $checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket  where shopid = '".$shopinfo['id']."' ");
		  $this->mysql->update(Mysite::$app->config['tablepre'].'shopmarket',$data,"shopid='".$shopinfo['id']."'");
		  $updata['pradiusa'] = $data['pradius'];
		  $this->mysql->update(Mysite::$app->config['tablepre'].'shop',$updata,"id='".$shopinfo['id']."'");
	 }
		//
	 $attrinfo = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = ".$shopinfo['shoptype']." and parent_id = 0 and is_admin = 0  order by orderid desc limit 0,1000");
		$tempinfo = array();
		foreach($attrinfo as $key=>$value){
			    $tempinfo[] = $value['id'];
		}

		if(count($tempinfo) > 0){
			//删除店铺属性是前台控制部分
			 $this->mysql->delete(Mysite::$app->config['tablepre']."shopattr"," shopid='".$shopinfo['id']."' and firstattr in(".join(',',$tempinfo).") ");
		   //写店铺数据
		  foreach($attrinfo as $key=>$value){
			     //shopid     value ;
			     $attrdata['shopid'] = $shopinfo['id'];
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
		  $this->mysql->delete(Mysite::$app->config['tablepre']."shopsearch"," shopid='".$shopinfo['id']."'  and parent_id in(".join(',',$tempinfo).") ");
		  foreach($attrinfo as $key=>$value){
		  	if($value['is_search'] == 1 && $value['type'] != 'input'){
		  		$inputdata = IFilter::act(IReq::get('mydata'.$value['id']));
		  		$temp = is_array($inputdata)?$inputdata:array($inputdata);
		  		foreach($temp as $ky=>$val){
		  			$searchdata['shopid'] = $shopinfo['id'];
		  			$searchdata['parent_id'] = $value['id'];
		  			$searchdata['cattype'] =$shopinfo['shoptype'];
		  			$searchdata['second_id'] = intval($val);
		  			if($val > 0){
		  				 $this->mysql->insert(Mysite::$app->config['tablepre']."shopsearch",$searchdata);
		  			}
		  		}

		  	}
		  }
		}


		$link = '';
		if(empty($shopinfo['shoptype'])){
			 if($data['sendtype'] == 0){
			  //配送区间之间调用  网站的
			     $this->mysql->delete(Mysite::$app->config['tablepre']."areashop"," shopid='".$shopid."' ");
			     $this->mysql->delete(Mysite::$app->config['tablepre']."areatoadd"," shopid='".$shopid."' ");
			     $listarea = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."areashop where shopid = 0   ");
			     foreach($listarea as $key=>$value){
			     	$adata['areaid'] = $value['areaid'];
			     	$adata['shopid'] = $shopid;
			     	 $this->mysql->insert(Mysite::$app->config['tablepre']."areashop",$adata);
			     }
			     $listareac = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."areatoadd where shopid = 0  ");
			      foreach($listareac as $key=>$value){
			     	$bdata['areaid'] = $value['areaid'];
			     	$bdata['shopid'] = $shopid;
			     	$bdata['cost'] = $value['cost'];
			     	 $this->mysql->insert(Mysite::$app->config['tablepre']."areatoadd",$bdata);
			   }
		  }
		 $link = IUrl::creatUrl('shop/usershopfast');
		  $this->message('外卖设置编辑成功',$link);
		}elseif($shopinfo['shoptype'] == 1){
			if($data['sendtype'] == 0){
			  //配送区间之间调用  网站的
			     $this->mysql->delete(Mysite::$app->config['tablepre']."areamarket"," shopid='".$shopid."' ");
			     $this->mysql->delete(Mysite::$app->config['tablepre']."areatomar"," shopid='".$shopid."' ");
			     $listarea = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."areashop where shopid = 0   ");
			     foreach($listarea as $key=>$value){
			     	$adata['areaid'] = $value['areaid'];
			     	$adata['shopid'] = $shopid;
			     	 $this->mysql->insert(Mysite::$app->config['tablepre']."areamarket",$adata);
			     }
			     $listareac = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."areatoadd where shopid = 0  ");
			      foreach($listareac as $key=>$value){
			     	$bdata['areaid'] = $value['areaid'];
			     	$bdata['shopid'] = $shopid;
			     	$bdata['cost'] = $value['cost'];
			     	 $this->mysql->insert(Mysite::$app->config['tablepre']."areatomar",$bdata);
			   }
		  }
			 $link = IUrl::creatUrl('shop/usershopmarket');
			  $this->message('超市设置编辑成功',$link);
		}

	}
	function usershopnotice(){
		$this->checkshoplogin();
		$uid = IFilter::act(IReq::get('uid'));
		if(!empty($uid)){
	    $data['notice_info'] = IReq::get('notice_info');
	    $shopid = ICookie::get('adminshopid');
	  	$link = IUrl::creatUrl('shop/usershopnotice');
		  $this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$shopid."'");
	    $this->message('修改公告成功',$link);
	  }
	}
	function usershopcxnotice(){
		$this->checkshoplogin();
		$uid = IFilter::act(IReq::get('uid'));
		if(!empty($uid)){
	    $data['cx_info'] = IReq::get('cx_info');
	    $shopid = ICookie::get('adminshopid');
		  $link = IUrl::creatUrl('shop/usershopcxnotice');
		  $this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$shopid."'");
	    $this->message('修改简介成功',$link);
   	}
	}
	function usershopinstro()
	{
		$this->checkshoplogin();
		$uid = IFilter::act(IReq::get('uid'));
		if(!empty($uid)){
	    $data['intr_info'] = IReq::get('intr_info');
	    $shopid = ICookie::get('adminshopid');
		  $link = IUrl::creatUrl('shop/usershopinstro');
		  $this->mysql->update(Mysite::$app->config['tablepre'].'shop',$data,"id='".$shopid."'");
	    $this->message('修改简介成功',$link);
   	}
	}

	function addcollect(){
		$this->checkmemberlogin();
		$collectid = intval(IReq::get('collectid'));
		$type = intval(IReq::get('type'));
		if(empty($this->member['uid']))$this->message('未登陆不可收藏');
		if(empty($collectid))$this->message('收藏失败');
		$data['collecttype'] = empty($type)? 0:1;
		$data['collectid'] = $collectid;
		$data['uid'] = $this->member['uid'];
		//收藏商品
		if($data['collecttype'] == 1)
		{
			$goodsinfo = $this->mysql->select_one("select uid from ".Mysite::$app->config['tablepre']."goods where id=".$collectid."  ");
			if(empty($goodsinfo)) $this->message('获取收藏商品失败');
		}else{
		//收藏店铺 shopuid
		  $goodsinfo = $this->mysql->select_one("select uid from ".Mysite::$app->config['tablepre']."shop where id=".$collectid."  ");
		 if(empty($goodsinfo)) $this->message('获取收藏店铺失败');
		}

		 $checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."collect where uid=".$data['uid']." and collectid=".$data['collectid']."  and collecttype = '".$data['collecttype']."' ");
		 if(!empty($checkinfo))
		 {
		 		$this->success('操作成功');
		 }
		 $data['shopuid'] = $goodsinfo['uid'];
		 $this->mysql->insert(Mysite::$app->config['tablepre'].'collect',$data);
	   $this->success('操作成功');
	}
	function delcollect()
	{
		$this->checkmemberlogin();
		$collectid = intval(IReq::get('collectid'));
		$type = intval(IReq::get('type'));
		if(empty($this->member['uid']))$this->message('未登陆不可删除收藏');
		if(empty($collectid))$this->message('删除收藏失败');
		$collecttype = empty($type)? 0:1;
		$this->mysql->delete(Mysite::$app->config['tablepre'].'collect',"uid='".$this->member['uid']."'  and collectid = '".$collectid."' and collecttype ='".$collecttype."'");
		$this->success('操作成功');
	}
	function goodslist(){
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		$shopinfo = $this->shopinfo();
		if(empty($shopinfo)) $this->message('店铺信息错误');

		$is_goshop = intval(IReq::get('is_goshop'));
		if (!in_array($is_goshop, array(0,1))) {
			$this->message('只能堂吃或者外卖');
		}
		$shoptype = $shopinfo['shoptype'];
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		if(empty($shoptype)){
	        $listtype = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodstype where shopid = '".$shopid."' and is_goshop=".$is_goshop." order by orderid asc  ");
    }elseif($shoptype ==1){
    	   $listtype = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."marketcate where shopid = '".$shopid."'  order by orderid asc  ");
    }
		//获取该菜单下的所有商品
		$alllist = array();
		if(is_array($listtype))
		{
			foreach($listtype as $key=>$value)
			{
				$value['det'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goods where typeid = '".$value['id']."' and shopid=".$shopid." and is_goshop=".$is_goshop." order by id asc limit 0,1000  ");
				$alllist[]= $value;
			}
		}
		$data['list'] =$alllist;
		//获取所有的  商品标签 goodssign
		$goodssign = $this->mysql->getarr("select id,imgurl,name,instro from ".Mysite::$app->config['tablepre']."goodssign where type = 'goods'  order by id asc  ");
		$checksign = array();
		if(is_array($goodssign)){
		  foreach($goodssign as $key=>$value){
		  	$checksign[] = $value['id'];
		  }
		}

		$data['is_goshop'] = $is_goshop;
		$data['goodssign'] = $goodssign;
		$data['checksign'] = $checksign;
		$data['showshu'] = count($goodssign);
		$data['jsondata'] = json_encode($goodssign);
		 Mysite::$app->setdata($data);
	}
	//超市产品
	function marketgoodslist(){
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		$shopinfo = $this->shopinfo();
		if(empty($shopinfo)) $this->message('店铺信息错误');
		$shoptype = $shopinfo['shoptype'];
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$topid =   intval(IFilter::act(IReq::get('topid')));
	  $toplist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."marketcate where shopid = '".$shopid."' and parent_id = 0 order by orderid asc  ");
	  $topcheck = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."marketcate where shopid = '".$shopid."' and parent_id = 0 and id=".$topid." order by orderid asc  ");
	  $newtopid = !empty($topcheck) ? $topid:0;
	  if($newtopid == 0){
	    if(isset($toplist['0']['id']) && count($toplist) > 0){
	  	    $newtopid = $toplist[0]['id'];
	    }
	  }
	  $data['toplist'] = $toplist;
	  $data['topid'] = $newtopid;
	  $listtype =  $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."marketcate where shopid = '".$shopid."' and parent_id =".$newtopid." order by orderid asc  ");
		$alllist = array();
		if(is_array($listtype))
		{
			foreach($listtype as $key=>$value)
			{
				$value['det'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goods where typeid = '".$value['id']."' and shopid=".$shopid." order by id asc limit 0,1000  ");
				$alllist[]= $value;
			}
		}
		$data['list'] =$alllist;
		//获取所有的  商品标签 goodssign
		$goodssign = $this->mysql->getarr("select id,imgurl,name,instro from ".Mysite::$app->config['tablepre']."goodssign where type = 'goods'  order by id asc  ");
		$checksign = array();
		if(is_array($goodssign)){
		  foreach($goodssign as $key=>$value){
		  	$checksign[] = $value['id'];
		  }
		}
		$data['goodssign'] = $goodssign;
		$data['checksign'] = $checksign;
		$data['showshu'] = count($goodssign);
		$data['jsondata'] = json_encode($goodssign);
		 Mysite::$app->setdata($data);
	}
	function savegoodstype(){
		$data['name'] = IFilter::act(IReq::get('name'));
		$data['orderid'] = intval(IReq::get('orderid'));
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		$data['shopid'] =    $shopid;
		if(empty($data['shopid'])) $this->message('COOK失效，请重新登陆');
		$shopinfo = $this->shopinfo();
		if(!(IValidate::len($data['name'],1,10)))$this->message('分类名称长度不能小于5大于10');
		$is_goshop = intval(IReq::get('is_goshop'));
		if (!in_array($is_goshop, array(0,1))) {
			$this->message('只能堂吃或者外卖');
		}
		$data['is_goshop'] = $is_goshop;
		if(empty($shopinfo['shoptype'])){
			$checkwaimai = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast where shopid = '".$shopid."'  order by shopid asc  ");
		  $data['cattype'] = 0;
		  if(empty($checkwaimai)) $this->message('店铺未开启外卖');
	  	$checkshuliang = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."goodstype where shopid='".$shopid."'");
	  	$checkshuliang +=1;
	  	if(Mysite::$app->config['shoptypelimit'] < $checkshuliang) $this->json('分类个数不能超过'.Mysite::$app->config['shoptypelimit'].'个');
	   	$this->mysql->insert(Mysite::$app->config['tablepre'].'goodstype',$data);
	  }elseif($shopinfo['shoptype'] == 1){
	  		$checkwaimai = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopmarket where shopid = '".$shopid."'  order by shopid asc  ");
	  	  if(empty($checkwaimai)) $this->message('超市未开启外卖');
	  	  $checkshuliang = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."marketcate where shopid='".$shopid."'");
	  	  $checkshuliang +=1;
	  	 if(Mysite::$app->config['shoptypelimit'] < $checkshuliang) $this->json('分类个数不能超过'.Mysite::$app->config['shoptypelimit'].'个');
	  	 $data['orderid'] = $data['orderid'] == 0 ? $checkshuliang:$data['orderid'];
	  	 $parent_id =  intval(IFilter::act(IReq::get('parent_id')));
	  	 if($parent_id > 0){
	  	      $checkshuliang = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."marketcate where shopid='".$shopid."' and id=".$parent_id."");
	  	     if(empty($checkshuliang)) $this->message('上级目录不属于你，或者为空');
	  	 }
	     $data['parent_id'] = $parent_id;
	   	 $this->mysql->insert(Mysite::$app->config['tablepre'].'marketcate',$data);
	  }
		$this->success('操作成功');
	}
	function editgoodstype()
	{
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$shopinfo = $this->shopinfo();
		$what = trim(IFilter::act(IReq::get('what')));
		$addressid = intval(IReq::get('addressid'));
		if(empty($addressid))$this->message('编辑信息获取失败');//$this->json(array('error'=>true,'message'=>''));
  	if($what == 'name')
  	{
  		$arr['name'] = IFilter::act(IReq::get('controlname'));
  		if(!(IValidate::len($arr['name'],2,10))) $this->message('分类名称长度不能小于2大于10');// $this->json(array('error'=>true,'message'=>''));
  		if(empty($shopinfo['shoptype'])){
  	    	$this->mysql->update(Mysite::$app->config['tablepre'].'goodstype',$arr,"id='".$addressid."' and shopid='".$shopid."' ");
  	  }elseif($shopinfo['shoptype'] == 1){
  	  		$this->mysql->update(Mysite::$app->config['tablepre'].'marketcate',$arr,"id='".$addressid."' and shopid='".$shopid."' ");
  	  }

  	  $this->success('操作成功');// $this->json(array('error'=>false,'message'=>'操作完成'));
  	}elseif($what == 'orderid')
  	{
  		$arr['orderid'] = intval(IReq::get('controlname'));
  		if(empty($shopinfo['shoptype'])){
  	     $this->mysql->update(Mysite::$app->config['tablepre'].'goodstype',$arr,"id='".$addressid."' and shopid='".$shopid."' ");
  	  }elseif($shopinfo['shoptype'] == 1){
  	  	 $this->mysql->update(Mysite::$app->config['tablepre'].'marketcate',$arr,"id='".$addressid."' and shopid='".$shopid."' ");
  	  }

  		$this->success('操作成功');// $this->json(array('error'=>false,'message'=>'操作完成'));
  	}elseif($what == 'allinfo'){
  		$arr['name'] = IFilter::act(IReq::get('name'));
  		$arr['orderid'] = intval(IFilter::act(IReq::get('orderid')));
  		if(empty($shopinfo['shoptype'])){
  	     $this->mysql->update(Mysite::$app->config['tablepre'].'goodstype',$arr,"id='".$addressid."' and shopid='".$shopid."' ");
  	  }elseif($shopinfo['shoptype'] == 1){
  	  	$arr['parent_id'] = intval(IFilter::act(IReq::get('parent_id')));
  	  	 $this->mysql->update(Mysite::$app->config['tablepre'].'marketcate',$arr,"id='".$addressid."' and shopid='".$shopid."' ");
  	  }
  	  $this->success('操作成功');
  	}else{


  		$this->message('处理失败');//  		$this->json(array('error'=>true,'message'=>'提交失败'));
  	}
	}
	function goodsone(){
	  $this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$shopinfo = $this->shopinfo();
			if(empty($shopinfo)) $this->message('店铺信息错误');
		$shoptype = $shopinfo['shoptype'];
		$id = intval(IFilter::act(IReq::get('gid')));
		if(empty($id)) $this->message('商品ID错误');
		$goodsinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."goods where shopid='".$shopinfo['id']."' and id=".$id."");
		if(empty($goodsinfo)) $this->message('商品获取失败');
		if(empty($shoptype)){
	        $listtype = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodstype where shopid = '".$shopinfo['id']."'  order by orderid asc  ");
    }elseif($shoptype ==1){
    	   $listtype = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."marketcate where shopid = '".$shopinfo['id']."'  and parent_id  != 0 order by orderid asc  ");
    }
		//获取所有的  商品标签 goodssign
		$goodssign = $this->mysql->getarr("select id,imgurl,name,instro from ".Mysite::$app->config['tablepre']."goodssign where type = 'goods'  order by id asc  ");
		$checksign = array();
		if(is_array($goodssign)){
		  foreach($goodssign as $key=>$value){
		  	$checksign[] = $value['id'];
		  }
		}
		$data['goodssign'] = $goodssign;
		$data['checksign'] = $checksign;
		$data['showshu'] = count($goodssign);
	 $data['goodsinfo'] = $goodsinfo;
	 $data['listtype'] = $listtype;
		Mysite::$app->setdata($data);
	}
	function savegoodsall(){
		$this->checkshoplogin();
		$gid = intval(IFilter::act(IReq::get('gid')));
		$shopid = ICookie::get('adminshopid');
		$link = IUrl::creatUrl('shop/goodsone/gid/'.$gid);
		if(empty($shopid)) $this->message('COOK失效，请重新登陆',$link);
		$shopinfo = $this->shopinfo();
			if(empty($shopinfo)) $this->message('店铺信息错误',$link);
		$shoptype = $shopinfo['shoptype'];
		if(empty($gid)) $this->message('商品ID错误',$link);
		$goodsinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."goods where shopid='".$shopinfo['id']."' and id=".$gid."");
		if(empty($goodsinfo)) $this->message('商品获取失败',$link);
		//构造数据
		$data['is_new'] =intval(IFilter::act(IReq::get('is_new')));
		$data['is_hot'] =intval(IFilter::act(IReq::get('is_hot')));
		$data['is_com'] =intval(IFilter::act(IReq::get('is_com')));
		$temp = IFilter::act(IReq::get('cxids'));
		$data['signid'] = is_array($temp)?join(',',$temp):$temp;
		$data['typeid'] = intval(IFilter::act(IReq::get('typeid')));
		$type_info = $this->mysql->select_one("SELECT is_goshop FROM ".Mysite::$app->config['tablepre']."goodstype WHERE id=".$data['typeid']);
		$data['is_goshop'] = $type_info['is_goshop'];
		$data['instro'] = IReq::get('instro');
    $this->mysql->update(Mysite::$app->config['tablepre'].'goods',$data,"id='".$gid."' and  shopid = '".$shopinfo['id']."'");
    $data['id'] = $gid;
    $goodsinfo['typeid'] = $data['typeid'];
    echo "<script>parent.refreshgoods(".json_encode($goodsinfo).");</script>";
    exit;

	}
	function addgoods(){
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$shopinfo = $this->shopinfo();
		$is_goshop = intval(IReq::get('is_goshop'));
		if (!in_array($is_goshop, array(0,1))) {
			$this->message('只能堂吃或者外卖');
		}
		$data['is_goshop'] = $is_goshop;
  	    $data['name'] = trim(IFilter::act(IReq::get('name')));
		$data['typeid'] = IFilter::act(IReq::get('typeid'));
		$data['count'] = intval(IFilter::act(IReq::get('count')));
		$data['cost'] = IFilter::act(IReq::get('cost'));
		$data['prime_cost'] = IFilter::act(IReq::get('prime_cost'));
		$data['bagcost'] = IFilter::act(IReq::get('bagcost'));
		$data['img'] = '';
		$data['signid'] = '';
        $checkshuliang = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."goods where shopid='".$shopid."'");
	  $checkshuliang +=1;
	  if(Mysite::$app->config['shopgoodslimit'] < $checkshuliang) $this->message('商品总个数不能超过'.Mysite::$app->config['shopgoodslimit'].'个');
		if(!(IValidate::len($data['name'],2,50))) $this->message('商品标题长度不能大于50小于2');
	  $chekcount = $data['cost']*100;
	  if($data['cost'] < 1) $this->message('请录入正确的销售价格');
	  if($data['prime_cost'] < 0) $this->message('请录入正确的原价');
	  $data['shopid'] =  $shopid;
	  $data['uid'] = $this->member['uid'];
	  $data['point'] = 0;
    $data['sellcount']   = 0;
    $data['instro'] = '';
    $data['daycount'] = $data['count'];
    $data['bagcost'] = 0;
    $data['shoptype'] = $shopinfo['shoptype'];
    $this->mysql->insert(Mysite::$app->config['tablepre'].'goods',$data);
    $id = $this->mysql->insertid();
    $info = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."goods where id = '$id'");
    if(empty($info)) $this->message('写数据失败');
    $this->success($info);
  }
  function updategoods(){
  	$this->checkshoplogin();
  	$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$controlname =  trim(IFilter::act(IReq::get('controlname')));
		$goodsid =  intval(IReq::get('goodsid'));
		$values =  trim(IReq::get('values'));
		if(empty($goodsid)) $this->message('商品ID获取失败');
		//print_r($controlname);exit;
		switch($controlname)
	   {
	   	  case 'name'://更新商品标题
	   	  if(!(IValidate::len($values,2,50))) $this->message('商品标题长度不能大于50小于2');
	   	  $data['name'] = $values;
	   	  break;
	   	  case 'count':
	   	  $data['count'] = intval($values);
	   	  $data['daycount']= intval($values);
	   	  break;
	   	  case 'instro':
	   	   if(!(IValidate::len($values,0,200))) $this->message('商品标题长度不能大于200');
	   	   $data['instro'] = $values;
	   	  break;
	   	  case 'cost':
	   	  $values = $values * 100;
	   	  $kk = intval($values);
	   	  if($kk < 0) $this->message('设置商品价格错误');
	   	  $data['cost'] = $values/100;
	   	  break;
	   	  case 'bagcost':
	   	  $values = $values * 100;
	   	  $kk = intval($values);
	   	  if($kk < 0) $this->message('设置商品价格错误');
	   	  $data['bagcost'] = $values/100;
	   	  break;
	   	  case 'sellcount':
	   	   $values = $values * 100;
	   	  $kk = intval($values);
	   	  if($kk < 0) $this->message('设置商品数量错误');
	   	  $data['sellcount'] = $values/100;
	   	  break;
	   	  case 'typeid':
	   	  $values = intval($values);
	   	  if(empty($values)) $this->message('商品类型错误');
	   	  $shopinfo = $this->shopinfo();
	   	  $checkshuliang = 0;
	   	  if(empty($shopinfo['shoptype'])){
	   	      $checkshuliang = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."goodstype where id = '$values' and shopid='".$shopid."'");
	   	  }elseif($shopinfo['shoptype']==1){
	   	  	 $checkshuliang = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."marketcate where id = '$values' and shopid='".$shopid."'");
	   	  }
	   	  if($checkshuliang < 1) $this->message('商品类型获取失败');
	   	  $data['typeid'] = $values;
	   	  break;
	   	  case 'signid':
	   	  if(empty($values)) $this->message('数据错误');
	   	  $data['signid'] = $values;
	   	  break;
	   	  case 'is_new':
	   	  $data['is_new'] = $values;
	   	  break;
	   	  case 'is_com':
	   	  $data['is_com'] = $values;
	   	  break;
	   	  case 'is_hot':
	   	  $data['is_hot'] = $values;
	   	  break;
	   	  case 'prime_cost':
	   	  $values = $values * 100;
	   	  $kk = intval($values);
	   	  if($kk < 0) $this->message('设置商品原价错误');
	   	  $data['prime_cost'] = $values/100;
	   	  break;
	   	  default:
	   	  $this->message('未定义的操作');
	   	  break;
	   }
	  $this->mysql->update(Mysite::$app->config['tablepre'].'goods',$data,"id='".$goodsid."' and  shopid = '".$shopid."'");
	  $this->success('操作成功');
	}
	function delgoods(){
		$this->checkshoplogin();
		 $shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
	   $uid = intval(IReq::get('id'));
		 if(empty($uid))  $this->message('删除ID不能为空');//(array('error'=>true,'msg'=>''));
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'goods',"id = '$uid' and  shopid='".$shopid."'");
	   $this->success('操作成功');
  }
  function addcxrule(){
  	$this->checkshoplogin();
  	 $shopid = ICookie::get('adminshopid');
   	 if(empty($shopid)) $this->message('COOK失效，请重新登陆');
   	 /// $shopinfo = $this->shopinfo();
  	 $id = intval(IReq::get('id'));
  	 $this->setstatus();
     $data['cxsignlist'] = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."goodssign where type='cx' order by id desc limit 0, 100");
		 $data['cxinfo'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."rule where id = '".$id."'  and shopid =  ".$shopid."  order by id desc limit 0, 100");
	$app_cope = explode(',', $data['cxinfo']['app_cope']);
	$data['is_goshop'] = 0;
	$data['is_waimai'] = 0;
	if(count($app_cope) == 2) {
		$data['is_goshop'] = 1;
		$data['is_waimai'] = 1;
	} elseif(count($app_cope) == 1) {
		if ($app_cope[0] == 1) {
			$data['is_goshop'] = 1;
		} elseif ($app_cope[0] == 0) {
			$data['is_waimai'] = 1;
		}
	}
		  Mysite::$app->setdata($data);
  }
  function savecxrule(){
  	$this->checkshoplogin();
  	$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$shopinfo = $this->shopinfo();
		$cxid = intval(IReq::get('cxid'));
    $data['name']=  trim(IFilter::act(IReq::get('name')));
    $data['limitcontent'] = intval(IReq::get('limitcontent'));
    $is_goshop = intval(IReq::get('is_goshop'));
    $is_waimai = intval(IReq::get('is_waimai'));
    if ($is_goshop && $is_waimai) {
    	$data['app_cope'] = '0,1';
    } elseif ($is_goshop && !$is_waimai) {
    	$data['app_cope'] = '1';
    } elseif(!$is_goshop && $is_waimai) {
    	$data['app_cope'] = '0';
    } else {
    	$this->message('适用范围必须选中1个或者2个');
    }
    $controltype = intval(IReq::get('controltype'));
    $data['cattype'] = $shopinfo['shoptype'];
    if(empty($data['name'])) $this->message('促销标题不能为空');
    $data['type'] = 1;//默认购物车限制
    $limittype = intval(IReq::get('limittype'));//limittype int(1)   否       1表示 不制定    2表示制定星期     3表示具体时间段    4表示提前天数
    $data['limittype'] = in_array($limittype,array('1,','2','3','4')) ? $limittype:1;

    if($data['limittype'] ==  1){
    	$data['limittime'] = '';
    }elseif($data['limittype'] == 2){
    	$limittime = IFilter::act(IReq::get('limittime1'));
    	if(!is_array($limittime)) $this->message('未制定具体星期');
    	$data['limittime'] = join(',',$limittime);
    }elseif ($data['limittype'] == 3){
    	$limittime2 = IFilter::act(IReq::get('limittime2'));
    	$limittime22 = IFilter::act(IReq::get('limittime22'));

    	if(empty($limittime2) || empty($limittime22)) $this->message('未填写具体时间段');
    	$limittime2 = is_array($limittime2)? $limittime2:array($limittime2);
    	$limittime22 = is_array($limittime22)? $limittime22:array($limittime22);
    	if(count($limittime2) != count($limittime22)) $this->message('时间段不对应');
    	$contents = '';
    	foreach($limittime2 as $key=>$value){
    		//12:00-13:00,
    		if(!empty($value) && !empty($limittime22[$key])){
    			$contents .= $value.'-'.$limittime22[$key].',';

    		}
    	}
    	if(empty($contents)) $this->message('时间段未选择');
    	$data['limittime'] = substr($contents,0,strlen($contents)-1);
    } else {
    	$limittime3 = (int)IFilter::act(IReq::get('limittime3'));
    	if (!is_int($limittime3) || $limittime3 <= 0) {
    		$this->message('提前天数必须为正整数');
    	}
    	$data['limittime'] = $limittime3;
    }
    if(!in_array($controltype,array('1','2','3','4'))) $this->message('促销类型错误');
    $data['controltype'] = $controltype;
    $data['controlcontent'] = intval(IReq::get('controlcontent'));
    if($controltype != 4){
    if(empty($data['controlcontent'])) $this->message('促销类型对应值错误');
    }
    $data['presenttitle'] = $controltype == 1? trim(IFilter::act(IReq::get('presenttitle'))):'';
    $starttime = IFilter::act(IReq::get('starttime'));
    $endtime = IFilter::act(IReq::get('endtime'));
    if(empty($starttime)) $this->message('促销开始时间未设置');
    if(empty($endtime)) $this->message('促销结束时间未设置');
    $data['signid'] = intval(IReq::get('signid'));
    if(empty($data['signid'])) $this->message('请选择促销售标签');
    $data['starttime'] = strtotime($starttime.' 00:00:00');
    $data['endtime'] = strtotime($endtime.' 23:59:59');
    $data['status'] = intval(IReq::get('status'));
    $data['shopid'] = $shopid;

    if(empty($cxid)){
       $this->mysql->insert(Mysite::$app->config['tablepre'].'rule',$data);
    }else{
    	unset($data['shpid']);
    	$this->mysql->update(Mysite::$app->config['tablepre'].'rule',$data,"id='".$cxid."' and shopid = '".$shopid."'");
    }
    //
    $this->success('操作成功');//(array('error'=>false));
	}
	function delcxrule(){
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$cxid = intval(IReq::get('cxid'));
		if(empty($cxid)) $this->message('促销规则获取失败');
		 $this->mysql->delete(Mysite::$app->config['tablepre'].'rule',"id='".$cxid."' and shopid = '".$shopid."'");
	  $this->success('操作成功');
	}
  function makeorder(){
	   $info['shopid'] = intval(IReq::get('shopid'));//店铺ID
		 $info['remark'] = IFilter::act(IReq::get('remark'));//备注
		 $info['paytype'] = IFilter::act(IReq::get('paytype'));//支付方式
		 $info['dikou'] = intval(IReq::get('dikou'));//抵扣金额
	 	 $info['username'] = IFilter::act(IReq::get('username'));
		 $info['mobile'] = IFilter::act(IReq::get('mobile'));
		 $info['addressdet'] = IFilter::act(IReq::get('addressdet'));
		 $info['senddate'] =  IFilter::act(IReq::get('senddate'));
		 $info['minit'] = IFilter::act(IReq::get('minit'));
		 $info['juanid']  = intval(IReq::get('juanid'));//优惠劵ID
		 $info['ordertype'] = 1;//订单类型
		 $peopleNum = IFilter::act(IReq::get('peopleNum'));
		 $info['othercontent'] ='';//empty($peopleNum)?'':serialize(array('人数'=>$peopleNum));

		 if(empty($info['shopid'])) $this->message('店铺ID错误');
		 $Cart = new smCart;
	   $carinfo = $Cart->getMyCart();
	   //print_r($carinfo);exit;
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
	   	   if (!array_key_exists($value['id'], $stock_list)) {
	   	   	  $stock_list[$value['id']] = 0;
	   	   }
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
	  if(!empty($nowid)){
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
	 }else{
	   $data['areaids'] = '';
	 }




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
    }





		 $data['shopcost'] = 0;//:店铺商品总价
		 $data['shopps'] = 0;//店铺配送费
		 $data['shoptype'] = 0;//: 0:普通订单，1订台订单
		 $data['bagcost']=0;//:打包费
		 //获取店铺商品总价  获取超市商品总价
		 $data['shopcost'] = $carinfo['list'][$info['shopid']]['sum'];
		 $data['shopps'] = $checkps['pscost'];
		 $data['bagcost'] =  $carinfo['list'][$info['shopid']]['bagcost'];
		 //支付方式检测
		 $userid = $info['userid'];
		 $data['paytype'] = $info['paytype'];
		 $paytype = $info['paytype'];
		 if($paytype != 'outpay'){
			 if($paytype == 'open_acout'){
		     if(Mysite::$app->config['open_acout'] != 1 || $userid == 0){
		  	    $data['paytype'] = 'outpay';

		     }
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
	  	    if(!$tempinfo) $this->message('配送时间不在有效配送时间范围');
	  	    if($shopinfo['is_open'] != 1) $this->message('店铺暂停营业');
	  	    if($shopinfo['limitcost'] > $allcost) $this->message('商品总价低于最小起送价'.$shopinfo['limitcost']);
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

		//  daycode 当天订单序号
	  $data['ipaddress'] = $info['ipaddress'];
		$data['is_ping'] = 0;// 是否评价字段 1已评完 0未评
		$data['addtime'] = time();
	  $data['posttime'] = $nowpost;//: 配送时间
	  $data['othertext'] = $info['othercontent'];//其他说明
	  $data['is_make'] = Mysite::$app->config['allowed_is_make'] == 1?0:1;
	  //  :审核时间
	  $data['passtime'] = time();
	  if($data['status']  == 1){
	  	$data['passtime'] == 0;
	  }
	  $data['buycode'] = substr(md5(time()),9,6);
	  $data['dno'] = time().rand(1000,9999);
	  $minitime = strtotime(date('Y-m-d',time()));
    $tj = $this->mysql->select_one("select count(id) as shuliang from ".Mysite::$app->config['tablepre']."order where shopid='".$info['shopid']."' and addtime > ".$minitime."  limit 0,1000");
	  $data['daycode'] = $tj['shuliang']+1;
	  $this->mysql->insert(Mysite::$app->config['tablepre'].'order',$data);  //写主订单
	  $orderid = $this->mysql->insertid();
	  $this->orderid = $orderid;

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
            $this->mysql->insert(Mysite::$app->config['tablepre'].'daystock',$stockdata);
        }
	    //$this->mysql->update(Mysite::$app->config['tablepre'].'goods','`count`=`count`-'.$cmd['goodscount'].' ,`sellcount`=`sellcount`+'.$cmd['goodscount'],"id='".$cmd['goodsid']."'");
        $this->mysql->update(Mysite::$app->config['tablepre'].'goods','`sellcount`=`sellcount`+'.$cmd['goodscount'],"id='".$cmd['goodsid']."'");
	  }

	  if(is_array($zpin)&& count($zpin) > 0){

	     foreach($zpin as $key=>$value){
	  		  $datadet['order_id'] = $orderid;
	  	    $datadet['goodsid'] = $key;
	  	    $datadet['goodsname'] = $value['presenttitle'];
	  	    $datadet['goodscost'] = 0;
	  	    $datadet['goodscount'] = 1;
	  	    $datadet['shopid'] = $shopinfo['id'];
	  	    $datadet['status'] = 0;
	  	    $datadet['is_send'] = 1;
	  	    //更新促销规则中 此赠品的数量
	  	    $this->mysql->insert(Mysite::$app->config['tablepre'].'orderdet',$datadet);
	  	  	$this->mysql->update(Mysite::$app->config['tablepre'].'rule','`controlcontent`=`controlcontent`-1',"id='".$key."'");
	    }
	  }

	  $checkbuyer = Mysite::$app->config['allowedsendbuyer'];
	  $checksend = Mysite::$app->config['man_ispass'];
	 	if($checksend != 1)
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
	//添加商品分类
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
   function collect(){
   	$this->checkmemberlogin();
   	$pageinfo = new page();
    $data['shoptypelist']= $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shoptype order by orderid asc ");
	  $pageinfo->setpage(intval(IReq::get('page')),100);
		$data['list'] = $this->mysql->getarr("select co.collectid,co.orderid,sh.* from ".Mysite::$app->config['tablepre']."collect as co left join   ".Mysite::$app->config['tablepre']."shop as sh on sh.id = co.collectid  where co.uid = '".$this->member['uid']."' and co.collecttype=0 order by co.orderid asc limit ".$pageinfo->startnum().", ".$pageinfo->getsize()."");
		$shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."collect where uid = '".$this->member['uid']."' and collecttype=0");
		$pageinfo->setnum($shuliang);
		$data['pagecontent'] = $pageinfo->getpagebar();
		 Mysite::$app->setdata($data);
  }
  function savepxmyF(){
  	$this->checkmemberlogin();
		$data['orderid'] =intval(IReq::get('pxid'));
		$collecttype = intval(IReq::get('collecttype'));
		$collectid  = intval(IReq::get('collectid'));
		if($collectid < 1) $this->message('提交数据错误');
		if($collecttype > 1) $this->message('提交操作类型错误');
		$this->mysql->update(Mysite::$app->config['tablepre'].'collect',$data,"collectid='".$collectid."' and uid='".$this->memberinfo['uid']."' and collecttype=".$collecttype." ");
	  $this->success('操作成功');
	}
	function gotocollect(){
		$this->checkmemberlogin();
		  $collectid = intval(IReq::get('collectid'));
		  $checkshop = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopfast where shopid = ".$collectid."");
		  if(empty($checkshop)){
		  	$checkshop2 = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shopwait where shopid = ".$collectid."");
		  	if(empty($checkshop2)){
		  	  $this->message('此ID对应店铺未开任何店铺');
		  	}else{
		  			$link = IUrl::creatUrl('shop/index/id/'.$collectid);
		    $this->message('',$link);
		  	}
		  }else{
		  	$link = IUrl::creatUrl('shop/index/id/'.$collectid);
		    $this->message('',$link);
		  }
	}
	function checkshopphone()
	{
		 $uname = IFilter::act(IReq::get('uname'));
	    $userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where maphone='".$uname."' ");
	    if(empty($userinfo))
	    {
	       $this->success('通过');
	    }else{
	    	 $this->message('联系电话已存在');
	    }
	}
	function checkshopname()
	{
		  $uname = IFilter::act(IReq::get('uname'));
	    $userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where shopname='".$uname."' ");
	     if(empty($userinfo))
	    {
	       $this->success('通过');
	    }else{
	    	 $this->message('店铺已存在');
	    }
	}
	function openshop(){
		if(empty($this->member['uid'])){
			  $link = IUrl::creatUrl('member/index');
		  $this->message('想开店请先注册为普通会员',$link);

		}
		$this->setstatus();
  }
	function saveopen()
	{
		if(empty($this->member['uid'])){
			  $link = IUrl::creatUrl('member/index');
		  $this->message('想开店请先注册为普通会员',$link);

		}
	 	 $maphone = IFilter::act(IReq::get('maphone'));
     $shopname = IFilter::act(IReq::get('shopname'));
     $address = IFilter::act(IReq::get('address'));
     $shoptype =  IFilter::act(IReq::get('shoptype'));
     if(!(IValidate::phone($maphone)))$this->message('联系电话格式错误');
     if(!(IValidate::len($shopname,3,30)))$this->message('店铺名长度大于3小于30');
     if(!(IValidate::len($address,6,50)))$this->message('店铺地址长度大于6小于50');
     $userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where uid='".$this->member['uid']."' ");
     if(!empty($userinfo))$this->message('您已绑定店铺不可操作');
     $userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where maphone='".$maphone."' ");
     if(!empty($userinfo))$this->message('联系人电话已存在');
     $userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where shopname='".$shopname."' ");
     if(!empty($userinfo))$this->message('店铺名称已重复');
     $arr['shopname'] = $shopname;
     $arr['maphone'] = $maphone;
     $arr['uid'] = $this->member['uid'];
     $arr['address'] = $address;
     $arr['addtime'] = time();
     $arr['is_open'] = '0';
     $arr['shoptype'] = $shoptype;
     $nowday = 24*60*60*365;
	   $data['endtime'] = time()+$nowday;
     $this->mysql->insert(Mysite::$app->config['tablepre'].'shop',$arr);
    $this->success('操作成功');
	}
	function mangeshop(){
		$this->checkmemberlogin();
	    $id =  intval(IFilter::act(IReq::get('id')));
	    $userinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop where id='".$id."' and is_pass=1 and uid=".$this->member['uid']." ");

	    $link = IUrl::creatUrl('member/index');
	    if(empty($userinfo)) $this->message('未开店或者店铺审核未通过',$link);
	    $link =  IUrl::creatUrl('shop/useredit'); ///http://192.168.0.104/index.php?controller=&action=;
	    ICookie::set('adminshopid',$id,86400);
	    $this->success('',$link);
	}
	function savepx(){//保存排序
			$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		$shopinfo = $this->shopinfo();
		$pxids = IFilter::act(IReq::get('pxids'));
		$pxindex = IFilter::act(IReq::get('pxindex'));
		if(empty($pxids)||empty($pxindex)) $this->message('排序数据错误11');
		$testinfo = explode(',',$pxids);
	//	$newdata = array();
		$test2 = explode(',',$pxindex);
		if(count($testinfo) !=  count($test2)) $this->message('排序数据错误12');
		foreach($testinfo as $key=>$value){
			if(intval($value) > 0){
				//$newdata[] = $value;
				$data['orderid'] = intval($test2[$key]);
				if(empty($shopinfo['shoptype'])){
				$this->mysql->update(Mysite::$app->config['tablepre'].'goodstype',$data,"id='".$value."'");
			  }elseif($shopinfo['shoptype'] == 1){
			  	$this->mysql->update(Mysite::$app->config['tablepre'].'marketcate',$data,"id='".$value."'");
			  }
				//
			}
		}
		 $this->success('操作成功');
	}
	function delgoodstype()
	{
		$this->checkshoplogin();
		 $shopid = ICookie::get('adminshopid');
		 if(empty($shopid)) $this->message('COOK失效，请重新登陆');
		 $shopinfo = $this->shopinfo();
		 $uid = intval(IReq::get('addressid'));
		 if(empty($uid))  $this->message('删除ID不能为空');//$this->json(array('err'=>true,'msg'=>'删除ID不能为空'));
		 if(empty($shopinfo['shoptype'])){
		    $checkshuliang = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."goodstype where id = '$uid' and shopid='".$shopid."'");
		    if($checkshuliang < 1) $this->message('数据未查找到');//$this->json(array('err'=>true,'msg'=>''));
		    $this->mysql->delete(Mysite::$app->config['tablepre'].'goods',"typeid = '$uid' and  shopid='".$shopid."'");
	      $this->mysql->delete(Mysite::$app->config['tablepre'].'goodstype',"id = '$uid' and  shopid='".$shopid."'");
	   }elseif($shopinfo['shoptype']==1){

	   	  $checkshuliang = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."marketcate where id = '$uid' and shopid='".$shopid."'");
		    if($checkshuliang < 1) $this->message('数据未查找到');//$this->json(array('err'=>true,'msg'=>''));
		      $checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."marketcate where id = '$uid' and shopid='".$shopid."'");
		    if(empty($checkinfo['parent_id'])){
		    	  $checkshuliang = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."marketcate where parent_id = '$uid' and shopid='".$shopid."'");
		    	  if($checkshuliang > 0){
		    	    $this->message('此分类下有二级分类不可删除');
		    	  }
		    }
		    $this->mysql->delete(Mysite::$app->config['tablepre'].'goods',"typeid = '$uid' and  shopid='".$shopid."'");
	      $this->mysql->delete(Mysite::$app->config['tablepre'].'marketcate',"id = '$uid' and  shopid='".$shopid."'");
	   }
	   $this->success('操作成功');
	}

	function setstatus(){
	    $data['shoptype'] = array('0'=>'外卖','1'=>'超市');
	   Mysite::$app->setdata($data);
	}

	//保存弹出层
	function savegoodinstro(){

	  	$goodsid = intval(IFilter::act(IReq::get('goodsid')));
	  	$instro =  IFilter::act(IReq::get('content'));
	  	if(empty($goodsid)){
	  	    echo "<script>parent.setinerror('产品ID获取失败');</script>";
	  	    exit;
	  	}
	  	$shopid = ICookie::get('adminshopid');
		 if(empty($shopid)) {
		    echo "<script>parent.setinerror('COOK失效，请重新登陆');</script>";
	  	    exit;
		 }
		 $shopinfo = $this->shopinfo();
		 if(empty($shopinfo)){
		     echo "<script>parent.setinerror('COOK失效，请重新登陆');</script>";
	  	    exit;
		  }
	  		$data['instro'] = $instro;
			 $this->mysql->update(Mysite::$app->config['tablepre'].'goods',$data,"id='".$goodsid."' and  shopid = '".$shopinfo['id']."'");
			 echo "<script>parent.setinsucess('保存成功');</script>";
			 exit;
	}
	function delgoodsimg(){
	  $id = intval(IReq::get('id'));
	  $this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		if(empty($shopid)) $this->message('未选择店铺');

	  $goodsinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."goods where id ='".$id."' and shopid ='".$shopid."' ");
		if(empty($goodsinfo)) $this->message('商品信息获取失败');
		if(!empty($goodsinfo['img'])){
			IFile::unlink(hopedir.$goodsinfo['img']);
			$udata['img'] = '';
			$this->mysql->update(Mysite::$app->config['tablepre'].'goods',$udata,"id='".$id."'");

		}
		$this->success('操作成功');



	}

	function goodsstock()
	{
		$this->checkshoplogin();
		$shopid = ICookie::get('adminshopid');
		if ($shopid <= 0){
			$this->message("请重新登陆");
		}
		$gid = (int)IReq::get('gid');
		$startdate = IReq::get('start_date');
		$enddate = IReq::get('end_date');
		//print_r($startdate);exit;
		$startdate = empty($startdate) ? date('Y-m-d') : $startdate;
		$enddate = empty($enddate)? date('Y-m-d', strtotime("+7 day")) : $enddate;
		if (! ($sd = @strtotime($startdate))) {
			$this->message("开始日期格式不正确");
		}
		if (! ($ed = @strtotime($enddate))) {
			$this->message("结束日期格式不正确");
		}
		$temp_list = [];
		do {
        	$temp_list[date('Y-m-d', $sd)] = 0;
    	} while (($sd += 86400) <= $ed);
		$info = $this->mysql->select_one("SELECT daycount FROM ".Mysite::$app->config['tablepre']."goods WHERE id=".$gid);
		$daycount = $info['daycount'];
		$daystock = $this->mysql->getarr("SELECT day, stock FROM ".Mysite::$app->config['tablepre']."daystock WHERE goods_id=$gid AND day BETWEEN $sd AND $ed");
		$buynum_list = [];
		$stock_list = [];
		foreach ($daystock as $v) {
			$buynum_list[date('Y-m-d',$v['day'])] = $v['stock'];
		}
		$buynum_list = array_merge($temp_list, $buynum_list);
		//print_r($buynum_list);exit;
		foreach ($buynum_list as $k => $buy) {
			$stock_list[$k] = $daycount - $buy;
		}
		$data['stock_list'] = $stock_list;
		$data['start_date'] = $startdate;
		$data['end_date'] = $enddate;
		$data['gid'] = $gid;
		Mysite::$app->setdata($data);
	}


}
?>
