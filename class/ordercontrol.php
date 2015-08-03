<?php 

/**
 * @class ordercontrol
 * @brief 订单控制类
 */
class ordercontrol
{
 
	//订单表
	private $order  = '';

	//订单详情表
	private $orderdet = '';

	//数据库连接操作
	private $mysql    = '';
	//信息表
	private $message    = '';
	//评价表
	private $comment = '';
	//错误信息
  private $err = '';
  
  private $goods = '';
  
  private $orderinfo = '';
  
	//构造函数
	function __construct($orderid)
	{
		 $this->mysql = new mysql_class;  
		 $this->order = Mysite::$app->config['tablepre'].'order';
		 $this->orderdet = Mysite::$app->config['tablepre'].'orderdet';
		 $this->goods = Mysite::$app->config['tablepre'].'goods';
		 $this->message = Mysite::$app->config['tablepre'].'message';
		 $this->orderinfo = $this->mysql->select_one("select * from ".$this->order." where id='".$orderid."'  ");
	}
	
	public function getorder()
	{
		 $test = $this->mysql->getarr("select * from ".$this->order); 
		 return $test;
	}
	/*释放商品库存默认增加赠品未释放*/
	private function releasestroe()
	{
		$ordetinfo = $this->mysql->getarr("select ort.goodscount,go.id,go.sellcount,go.count as stroe from ".$this->orderdet." as ort left join  ".$this->goods." as go on go.id = ort.goodsid  where ort.order_id='".$this->orderinfo['id']."' and ort.is_send = 0 ");
	 	foreach($ordetinfo as $key=>$value)
		{  
			 $this->mysql->update($this->goods,'`count`=`count`+'.$value['goodscount'].' ,`sellcount`=`sellcount`-'.$value['goodscount'],"id='".$value['id']."'");
		} 
	}
	//买家取消订单
	/*param $uid ,用户ID
	  $oderid 订单ID
	  checktype ，0不检测用户所有权  操作对象为 管理员   */
	public function buyerunorder($uid)
	{ 
		 if(empty($this->orderinfo))
		 {
		 	  $this->err = '订单不存在';
		 	   return false;
		 }
		 if($this->orderinfo['status'] != 0 )
		 {
		 	   $this->err = '订单状态不可取消';
		 	   return false;
		 } 
		 if($uid !=  $this->orderinfo['buyeruid'] )//$uid  != $orderinfo['shopuid'] || 
		 {
		 	   $this->err = '订单不属于你';
		 	   return false;
		 }
		
		 //paytype 支付类型outpay货到支付，open_acout账户余额支付，other调用paylist	
		 $detail = '';
		 if($this->orderinfo['paystatus'] == 1&& $this->orderinfo['paytype'] != 'outpay'){
		 	//将订单还给买家账号
		     $this->err = '订单已支付，取消订单请用户到用户中心申请退款';
		 	   return false;
		 	 
		 	 
		 	 
		 }elseif($this->orderinfo['scoredown'] > 0){
		 	 $data['status'] = 4;
		 //更新标志为 4
		    $this->mysql->update($this->order,$data,"id='".$this->orderinfo['id']."'");
		 	 $this->mysql->update(Mysite::$app->config['tablepre'].'member','`score`=`score`+'.$this->orderinfo['scoredown'],"uid ='".$this->orderinfo['buyeruid']."' ");	
		 }
		 if($this->orderinfo['scoredown'] > 0){
		 	$detail .= ',抵扣积分'.$this->orderinfo['scoredown'].'返回账号';
		 }
		 
		 $this->releasestroe();
		 /***操作取消***/
		 $this->wirtemess('买家关闭订单'.$detail); 
		 return true; 
	}
	public function buyerdelorder($uid)
	{ 
		 if(empty($this->orderinfo))
		 {
		 	  $this->err = '订单不存在';
		 	   return false;
		 }
		 if($this->orderinfo['status'] != 4 && $this->orderinfo['status'] !=5)
		 {
		 	   $this->err = '订单状态不可彻底删除';
		 	   return false;
		 } 
		 if($uid !=  $this->orderinfo['buyeruid'] )//$uid  != $orderinfo['shopuid'] || 
		 {
		 	   $this->err = '订单不属于你';
		 	   return false;
		 }
		 
		 $this->mysql->delete($this->order,"id='".$this->orderinfo['id']."'");   
		 $this->mysql->delete($this->orderdet,"order_id='".$this->orderinfo['id']."'");   
		 $this->wirtemess('买家彻底删除订单'); 
		 return true; 
	}
	public function sellerunorder($uid,$reason)
	{
		if(empty($this->orderinfo))
		 {
		 	  $this->err = '订单不存在';
		 	   return false;
		 }
		 if($this->orderinfo['status'] != 0 )
		 {
		 	   $this->err = '订单状态不可取消';
		 	   return false;
		 } 
		 if($uid !=  $this->orderinfo['shopuid'] )//$uid  != $orderinfo['shopuid'] || 
		 {
		 	   $this->err = '订单不属于你';
		 	   return false;
		 }
		
		 $detail = '';
		 if($this->orderinfo['paystatus'] == 1&& $this->orderinfo['paytype'] != 'outpay'){
		 	  //将订单还给买家账号
		 	   $this->err = '订单已支付，取消订单请用户到用户中心申请退款';
		 	   return false;
		 }elseif($this->orderinfo['scoredown'] > 0){
		 	 $data['status'] = 5;
		   //更新标志为 4
		    $this->mysql->update($this->order,$data,"id='".$this->orderinfo['id']."'");
		 	 $this->mysql->update(Mysite::$app->config['tablepre'].'member','`score`=`score`+'.$this->orderinfo['scoredown'],"uid ='".$this->orderinfo['buyeruid']."' ");	
		 }
		 if($this->orderinfo['scoredown'] > 0){
		 	$detail .= ',抵扣积分'.$this->orderinfo['scoredown'].'返回账号';
		 }
		 $this->releasestroe();
		 /***操作取消***/
		 $this->wirtemess('由于'.$reason.',卖家关闭订单'.$detail); 
		 return true; 
	}
	public function sendorder($uid)
	{
		if(empty($this->orderinfo))
		 {
		 	  $this->err = '订单不存在';
		 	   return false;
		 }
		 if($this->orderinfo['status'] != 1 )
		 {
		 	   $this->err = '订单状态不可发货';
		 	   return false;
		 } 
		 if($uid !=  $this->orderinfo['shopuid'] )//$uid  != $orderinfo['shopuid'] || 
		 {
		 	   $this->err = '订单不属于你';
		 	   return false;
		 }
		 if($this->orderinfo['is_reback'] > 0 &&  $this->orderinfo['is_reback']<3)
		 {
		 	   $this->err = '订单退款中不可操作';
		 	   return false;
		 }
		 $data['status'] = 2;
		 //更新标志为 4
		 $this->mysql->update($this->order,$data,"id='".$this->orderinfo['id']."'");
		 /***操作取消***/
		 $this->wirtemess('卖家发货,订单编号：'); 
		 return true; 
	}
	public function shenhe($uid)
	{
		if(empty($this->orderinfo))
		 {
		 	  $this->err = '订单不存在';
		 	   return false;
		 }
		 if($this->orderinfo['status'] != 0 )
		 {
		 	   $this->err = '订单状态不可审核';
		 	   return false;
		 } 
		 if($uid !=  $this->orderinfo['shopuid'] )//$uid  != $orderinfo['shopuid'] || 
		 {
		 	   $this->err = '订单不属于你';
		 	   return false;
		 }
		 if($this->orderinfo['is_reback'] > 0 &&  $this->orderinfo['is_reback'] < 3)
		 {
		 	   $this->err = '订单退款中不可操作';
		 	   return false;
		 }
		 $data['status'] = 1;
		 //更新标志为 4
		 $this->mysql->update($this->order,$data,"id='".$this->orderinfo['id']."'");
		 /***操作取消***/
		 $this->wirtemess('卖家准备配送，订单编号：'); 
		 return true; 
	}
	public function sellerdelorder($uid){
		if(empty($this->orderinfo))
		 {
		 	  $this->err = '订单不存在';
		 	   return false;
		 }
		 if($this->orderinfo['status'] !=4 && $this->orderinfo['status'] !=5 )
		 {
		 	   $this->err = '订单状态不可彻底删除';
		 	   return false;
		 } 
		 if($uid !=  $this->orderinfo['shopuid'] )//$uid  != $orderinfo['shopuid'] || 
		 {
		 	   $this->err = '订单不属于你';
		 	   return false;
		 }
		 
		 $this->mysql->delete($this->order,"id='".$this->orderinfo['id']."'");   
		 $this->mysql->delete($this->orderdet,"order_id='".$this->orderinfo['id']."'");   
		 $this->wirtemess('卖家彻底删除订单'); 
		 return true; 
	}
	public function Error()
	{
		return $this->err;
	}
	//写消息
	private function wirtemess($mes)
	{
		/*
		   $mess['userid'] = $this->orderinfo['shopuid'];
	     $mess['username']  ='';
	     $mess['content'] = $mes.$this->orderinfo['dno'];
	     $mess['addtime'] = time();
	     if($mess['userid'] > 0)
	     {
         $this->mysql->insert($this->message,$mess);  //写消息表
       } 
       $mess['userid'] = $this->orderinfo['buyeruid'];
       if($mess['userid'] > 0)
	     {
         $this->mysql->insert($this->message,$mess);  //写消息表
      }
      */
	}
	
	

	 
}
?>