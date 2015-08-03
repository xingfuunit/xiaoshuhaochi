<?php

/**
 * @class sellrule
 * @brief 促销规则
 */
class sellrule
{

	 //获取促销规则
	 //满          送/减
	 //2.下单时间  送/减
	 private $ruletype = array('1'=>'购物车总价');//网关地址
	 private $rulecontrol = array('1'=>'赠送','2'=>'减费用','3'=>'折扣');
	 //limittype  1表示具体 不指定时间
	 //limittype  2表示     指定星期  limitcontent表示周1,2,3,4,5,6,7 在开始时间到结束时间
	 //           3表示     制定具体  具体几点
	 //id  name    type         limittype  limittime//限制时间      limitcontent  controltype            controlcontent                  开始时间           结束时间    status：1进行中  2结束   shopid/店铺ID 属于哪个店铺
	 //             1              1                                   30元         折扣                      90
	 //            1               2         2,3,4,5                    20元          赠送                      商品ID
	 //            1               1                                   100          减费用                    5元

	 private  $shopid = ''; //店铺ID
	 private  $cartcost = 0;//购物车总金额
	 private  $weekday = '';//当天周几
	 private  $maketime = '';//下单时间
	 private  $shoptype = '';
	 private  $rulelist = array();
	 private $time = 0;
    private $posttime = 0;
	 //初始化函数
	  function __construct(){
	  	 $this->mysql = new mysql_class;
		   $this->tablepre = Mysite::$app->config['tablepre'];
   }
   public function setdata($shopid,$cartcost=0,$shoptype='1',$posttime=0, $cartname = 'shoppingsmcart'){//设置规则数据;
   	   $this->shopid = $shopid;
   	   $this->cartcost = $cartcost;
   	   $this->shoptype = $shoptype;
     	 $this->maketime = time();
   	   $this->weekday = date('w');
         $this->posttime = $posttime;
         $this->app_cope = $cartname == 'shoppingsmcart'? 0 : 1;
   }
   //获取规则列表
   public function get_rulelist(){
   	  // $this->rulelist = array(); //获取某店铺所有有效 规则

   	   $list = $this->mysql->getarr("select * from ".$this->tablepre."rule where shopid='".$this->shopid."' and status = 1 and  starttime < ".$this->maketime." and endtime > ".$this->maketime." and cattype=".$this->shoptype."");

   	   return $list;
   }
   //返回规则数据

   //计算最大化数据
   function maxdata($data,$gzdata)
   {
   	  $makedata = array('downcost'=>0,'surecost'=>$this->cartcost,'cxids'=>'','zid'=>array(),'gzdata'=>$gzdata,'nops'=>false);//计算结果
   	 if(isset($data['downcost']))
   	 {
   	 	   $findcost = 0;
   	 	   $findid = '';
   	 	   foreach($data['downcost'] as $key=>$value)//最大计算
   	 	   {
   	 	   	 if($value > $findcost)
   	 	   	 {
   	 	   	 	 $findcost = $value;
   	 	   	 	 $findid = $key;
   	 	   	 }
   	 	   }
   	 	   $makedata['surecost'] = $makedata['surecost'] - $findcost;
   	 	   $makedata['cxids'] = empty($findid)? $makedata['cxids']:$makedata['cxids'].$findid.',';
   	 	   $makedata['downcost'] += $findcost;
   	 }
   	 if(isset($data['zhekou']))
   	 {

   	 	   $findcost = 100;
   	 	   $findid = '';
   	 	   foreach($data['zhekou'] as $key=>$value)//最小计算
   	 	   {
   	 	   	 if($value < $findcost)
   	 	   	 {
   	 	   	 	 $findcost = $value;
   	 	   	 	 $findid = $key;
   	 	   	 }
   	 	   }
   	 	   $down = $findcost*$makedata['surecost']*0.01;
   	 	   $makedata['cxids'] = empty($findid)? $makedata['cxids']:$makedata['cxids'].$findid.',';
   	 	   $makedata['downcost'] += $makedata['surecost'] - $down;
            $makedata['surecost'] =  $down;
   	 }
   	 if(isset($data['zpin']))
   	 {
   	 	   $ids = array();
   	 	   $findid = '';
   	 	   foreach($data['zpin'] as $key=>$value)//最多计算
   	 	   {
   	 	   	  if(!empty($value))
   	 	   	  {
   	 	   	 	 $ids[$key] = $value;
   	 	   	 	 $findid .= $key.',';
   	 	   	 }
   	 	   }
   	 	   $findid = empty($findid)?'':substr($findid,0,strlen($findid)-1);
   	 	   $makedata['cxids'] = empty($findid)? $makedata['cxids']:$makedata['cxids'].$findid.',';
   	 	   $makedata['zid'] = $ids;
   	 }
   	 if(isset($data['nops'])){

   	 	   $findid = '';
   	 	   foreach($data['nops'] as $key=>$value)//最多计算
   	 	   {

   	 	   	 	 $findid .= $key.',';

   	 	   }
   	 	   $findid = empty($findid)?'':substr($findid,0,strlen($findid)-1);
   	 	   $makedata['cxids'] = empty($findid)? $makedata['cxids']:$makedata['cxids'].$findid.',';
   	 	   $makedata['nops'] = true;

     }
   	 $makedata['cxids'] = strlen($makedata['cxids']) > 1 ? substr($makedata['cxids'],0,strlen($makedata['cxids'])-1):'';
   	 return $makedata;
   }

   /*返回数据格式为：
      array(
            'downcost'=>'10',优惠金额
            'surecost'=>'10',实际金额
            'cxids'=>'1,2,3',满足条件的促销规则id集
            'zid'=>array('赠品标题',库存,赠品ID集
            );
      同类型规则 采用 取最大值规则;
    */
   public function getdata(){
   	  $list = $this->get_rulelist();
   	  if(empty($list))
   	  {
   	  	 return array('downcost'=>0,'surecost'=>$this->cartcost,'cxids'=>'','zid'=>'','nops'=>false);
   	  }
   	  //制造满足条件规则
   	  /*
   	      data['zhekou'] = array('id'=>'折扣价格');
   	      data['downcost'] = array('id'=>'减少金额');
   	      data['zpin'] = array('id'=>'赠品IDS');
   	  */
   	  $datas = array();
   	  //构造促规则标题
   	  $gzdata = array();
   	  foreach($list as $key=>$value){
         if (in_array($this->app_cope, explode(',', $value['app_cope']))) {
   	  	if($value['type'] == 1)
   	  	{

   	  		  //表示购物车总价  //默认都是 购物车总价
   	  		  if($value['limitcontent'] <= $this->cartcost)
   	  		  {//商品总价 > 当前购物车
   	  		  	$gzdata[$value['id']] = $value['name'];
   	  		  	if($value['limittype'] == 1)
   	  		  	{//不指定具体 星期
   	  		  	     if($value['controltype'] == 1)
   	  		  	     {//赠品
   	  		  	     	  if(intval($value['controlcontent']) > 0){
   	  		  	     	   $datas['zpin'][$value['id']] =  array('presenttitle'=>$value['presenttitle'],'kc'=>$value['controlcontent']);//
   	  		  	     	  }else{
   	  		  	     	  	unset($gzdata[$value['id']]);
   	  		  	     	  }

   	  		  	     }elseif($value['controltype'] == 2)
   	  		  	     {//减肥用
   	  		  	     	  $datas['downcost'][$value['id']] = $value['controlcontent'];
   	  		  	     }elseif($value['controltype'] == 3)
   	  		  	     {//折扣
   	  		  	     	  $datas['zhekou'][$value['id']] = $value['controlcontent'];
   	  		  	     }elseif($value['controltype'] == 4)
   	  		  	     {//免配送
   	  		  	                	  $datas['nops'][$value['id']] = $value['controlcontent'];
   	  		  	      }

   	  		  	}elseif($value['limittype'] == 2)
   	  		  	{//制定星期
   	  		  		   if(!empty($value['limittime'])){
   	  		  		   	  if(in_array($this->weekday,explode(',',$value['limittime'])))
   	  		  		   	  {
   	  		  	            if($value['controltype'] == 1)
   	  		  	            {//赠品
   	  		  	            	  if(intval($value['controlcontent']) > 0){
   	  		  	            	     $datas['zpin'][$value['id']] = array('presenttitle'=>$value['presenttitle'],'kc'=>$value['controlcontent']);
   	  		  	            	  }else{
   	  		  	     	            	unset($gzdata[$value['id']]);
   	  		  	     	           }
   	  		  	            }elseif($value['controltype'] == 2)
   	  		  	            {//减肥用
   	  		  	            	  $datas['downcost'][$value['id']] = $value['controlcontent'];
   	  		  	            }elseif($value['controltype'] == 3)
   	  		  	            {//折扣
   	  		  	            	  $datas['zhekou'][$value['id']] = $value['controlcontent'];
   	  		  	            }elseif($value['controltype'] == 4)
   	  		  	             {//免配送
   	  		  	                	  $datas['nops'][$value['id']] = $value['controlcontent'];
   	  		  	            }
   	  		  	        } else {
                           unset($gzdata[$value['id']]);
                       }
   	  		  	     }
               } elseif ($value['limittype'] == 4){
                  if (!empty($value['limittime']) && $value['limittime'] > 0) {
                     $day = (strtotime(date('Y-m-d',(int)$this->posttime)) - strtotime(date('Y-m-d')))/24/3600;
                      if ($day >= $value['limittime']) {
                          if ($value['controltype'] == 1) {//赠品
                                if (intval($value['controlcontent']) > 0){
                                   $datas['zpin'][$value['id']] = array('presenttitle'=>$value['presenttitle'],'kc'=>$value['controlcontent']);
                                }else{
                                    unset($gzdata[$value['id']]);
                                }
                           }elseif($value['controltype'] == 2){//减费用
                                $datas['downcost'][$value['id']] = $value['controlcontent'];
                           }elseif($value['controltype'] == 3)
                           {//折扣
                                $datas['zhekou'][$value['id']] = $value['controlcontent'];
                           }elseif($value['controltype'] == 4)
                            {//免配送
                                   $datas['nops'][$value['id']] = $value['controlcontent'];
                           }
                      } else {
                          unset($gzdata[$value['id']]);
                          unset($list[$key]);
                      }
                  }
   	  		  	}elseif($value['limittype'] == 3)
   	  		  	{//指定时间间隔
   	  		  		   if(!empty($value['limittime'])){//12:00-13:00,
   	  		  		   	   //strtotime($starttime.' 00:00:00')
   	  		  		   	   $datey = date('Y-m-d',$this->maketime);
   	  		  		   	   $info =explode(',',$value['limittime']);
   	  		  		   	   $find = false;
   	  		  		   	   foreach($info as $kc=>$val)
   	  		  		   	   {
   	  		  		   	   	  if(!empty($val))
   	  		  		   	   	  {
   	  		  		   	   	  	$checkinfo = explode('-',$val);
   	  		  		   	   	  	if(!empty($checkinfo[1]))
   	  		  		   	   	  	{
   	  		  		   	   	  		   $time1 = strtotime($datey.' '.$checkinfo[0].':00');
   	  		  		   	   	  		   $time2 = strtotime($datey.' '.$checkinfo[1].':00');
   	  		  		   	   	  		   if($this->maketime > $time1 && $this->maketime < $time2)
   	  		  		   	   	  		   {
   	  		  		   	   	  		   	   $find = true;
   	  		  		   	   	  		   	   break;
   	  		  		   	   	  		   }
   	  		  		   	   	  	}
   	  		  		   	   	  }
   	  		  		   	   }
   	  		  		   	   if($find){//在指定时间 购买

   	  		  	                if($value['controltype'] == 1)
   	  		  	                {//赠品
   	  		  	                	   if(intval($value['controlcontent']) > 0){
   	  		  	                	      $datas['zpin'][$value['id']] = array('presenttitle'=>$value['presenttitle'],'kc'=>$value['controlcontent']);
   	  		  	                	   }else{
   	  		  	     	  	                unset($gzdata[$value['id']]);
   	  		  	     	                }
   	  		  	                }elseif($value['controltype'] == 2)
   	  		  	                {//减肥用
   	  		  	                	  $datas['downcost'][$value['id']] = $value['controlcontent'];
   	  		  	                }elseif($value['controltype'] == 3)
   	  		  	                {//折扣
   	  		  	                	  $datas['zhekou'][$value['id']] = $value['controlcontent'];
   	  		  	                }elseif($value['controltype'] == 4)
   	  		  	                {//免费配送
   	  		  	                	  $datas['nops'][$value['id']] = $value['controlcontent'];
   	  		  	                }
   	  		  	         } else {
                           unset($gzdata[$value['id']]);
                        }
   	  		  	    }
   	  		  	}
   	  		  }
            }
   	  	}
   	  }
   	  return $this->maxdata($datas,$gzdata);
   }

}
?>
