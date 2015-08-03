<?php
class method   extends baseclass
{

	function exchangjuan(){
		$this->checkmemberlogin();
		$card = trim(IFilter::act(IReq::get('card')));
		$password = trim(IFilter::act(IReq::get('password')));
		if(empty($card)) $this->message('优惠劵卡号不能为空');
		if(empty($password)) $this->message('优惠劵密码不能为空');
		$checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."juan where card ='".$card."'  and card_password = '".$password."' and endtime > ".time()." and status = 0");
		if(empty($checkinfo)) $this->message('兑换未获取到');
		if($checkinfo['uid'] > 0) $this->message('此优惠劵已兑换');

		$arr['uid'] = $this->member['uid'];
		$arr['status'] =  1;
		$arr['username'] = $this->member['username'];
		$this->mysql->update(Mysite::$app->config['tablepre'].'juan',$arr,"card='".$card."'  and card_password = '".$password."' and endtime > ".time()." and status = 0 and uid = 0");
		$mess['userid'] = $this->member['uid'];
	  $mess['username']  ='';
	  $mess['content'] = '绑定优惠劵'.$checkinfo['card'];
	  $mess['addtime'] = time();
    //$this->mysql->insert(Mysite::$app->config['tablepre'].'message',$mess);  //写消息表
		$this->success('兑换成功');

	}
	function exchangcard(){
		$this->checkmemberlogin();
		$card = trim(IFilter::act(IReq::get('card')));
		$password = trim(IFilter::act(IReq::get('password')));
		if(empty($card)) $this->message('充值卡号不能为空');
		if(empty($password)) $this->message('充值卡密码不能为空');
		$checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."card where card ='".$card."'  and card_password = '".$password."' and uid =0 and status = 0");
		if(empty($checkinfo)) $this->message('充值卡不存在或者已使用');
		$arr['uid'] = $this->member['uid'];
		$arr['status'] =  1;
		$arr['username'] = $this->member['username'];
		$this->mysql->update(Mysite::$app->config['tablepre'].'card',$arr,"card ='".$card."'  and card_password = '".$password."' and uid =0 and status = 0");
		//`$key`
		$this->mysql->update(Mysite::$app->config['tablepre'].'member','`cost`=`cost`+'.$checkinfo['cost'],"uid ='".$this->member['uid']."' ");
    $allcost = $this->member['cost']+$checkinfo['cost'];
    $this->memberCls->addlog($this->member['uid'],2,1,$checkinfo['cost'],'充值卡充值','使用充值卡'.$checkinfo['card'].'充值'.$checkinfo['cost'].'元',$allcost);
		$this->success('兑换成功');
	}

}



?>