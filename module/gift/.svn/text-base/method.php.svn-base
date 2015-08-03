<?php
class method   extends baseclass
{
   function exchang(){
   	$this->checkmemberlogin();
      $userid = empty($this->member['uid'])?0:$this->member['uid'];
	   	if(empty($userid))$this->message("登陆后才可兑换");
	   	$lipin_id = intval(IReq::get('lipin_id'));
	   	if(empty($lipin_id)) $this->message("礼品获取失败");
	   	$lipininfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."gift where id ='".$lipin_id."'  order by id asc  ");
	   	if(empty($lipininfo)) $this->message("礼品获取失败");
	   	if($lipininfo['stock'] < 1)$this->message("礼品库存不足");
	   	$moren_addr = intval(IReq::get('address_id'));

	   	if(empty($moren_addr))
	   	{
	   		$data['address'] = IFilter::act(IReq::get('address'));
	   		$data['contactman'] = IFilter::act(IReq::get('aboutname'));
	   		$data['telphone'] = IFilter::act(IReq::get('aboutphone'));
	   		if(empty($data['address']))$this->message("联系地址不能为空");
	   		if(empty($data['contactman']))$this->message("联系人不能为空");
	   		if(empty($data['telphone']))$this->message("联系电话不能为空");
	   	}else{
	   	 $addressinfo = 	$this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."address where  id = '".$moren_addr."' order by id desc  ");
	   	 if(empty($moren_addr)) $this->message("获取地址失败");
	   	 if($addressinfo['userid'] != $userid) $this->message("选择默认地址不属于您");
	   	 	$data['address'] = $addressinfo['address'];
	   		$data['contactman'] =$addressinfo['contactname'];
	   		$data['telphone'] = $addressinfo['phone'];
	   	}
	   	if($this->member['score'] < $lipininfo['score'])$this->message('兑换积分不足');
	   	$ndata['score'] = $this->member['score'] - $lipininfo['score'];
	   	//更新用户积分
	     $this->mysql->update(Mysite::$app->config['tablepre'].'member',$ndata,"uid='".$this->member['uid']."'");
	   	$data['giftid'] = $lipininfo['id'];
	   	$data['uid'] = $userid;
	   	$data['addtime'] = time();
	   	$data['status'] = 0;
	   	$data['count'] = 1;
	   	$data['score'] = $lipininfo['score'];
       $this->mysql->insert(Mysite::$app->config['tablepre'].'giftlog',$data);
      $this->memberCls->addlog($this->member['uid'],1,2,$lipininfo['score'],'兑换礼品','兑换'.$lipininfo['title'].'减少'.$lipininfo['score'].'积分',$ndata['score']);
       //更新礼品表
       $lidata['stock'] =  $lipininfo['stock']-1;
       $lidata['sell_count'] =  $lipininfo['sell_count']+1;
	   	$this->mysql->update(Mysite::$app->config['tablepre'].'gift',$lidata,"id='".$lipin_id."'");
	    $this->success('操作成功');
  }
  function usergift(){
  	$this->checkmemberlogin();
   $this->logstat();
  }
  function logstat(){
  	$data['logstat'] = array('0'=>'待处理','1'=>'已处理，配送中','2'=>'兑换完成','3'=>'兑换成功','4'=>'已取消兑换');
  	 Mysite::$app->setdata($data);
  }
  function ungift(){
  	$this->checkmemberlogin();
  	$id = intval(IReq::get('id'));
		if(empty($id)) $this->message('获取兑换记录失败');
		$info  = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."giftlog where uid ='".$this->member['uid']."' and id=".$id." ");
		if(empty($info)) $this->message('获取兑换记录失败');
		if($info['status'] != 0)$this->message('兑换已处理不可取消');
		$lipininfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."gift where id ='".$info['giftid']."'  order by id asc  ");
		$titles = isset($lipininfo['title'])? $lipininfo['title']:$info['id'];
		$this->mysql->update(Mysite::$app->config['tablepre'].'giftlog',array('status'=>'4'),"id='".$id."'");
			$ndata['score'] = $this->member['score'] + $info['score'];
		//更新用户积分
	  $this->mysql->update(Mysite::$app->config['tablepre'].'member','`score` = `score`+'.$info['score'],"uid='".$this->member['uid']."'");
	  	//写消息
	  $this->memberCls->addlog($this->member['uid'],1,1,$info['score'],'取消兑换礼品','取消兑换ID为:'.$id.'的礼品['.$titles.'],帐号积分'.$ndata['score'] ,$ndata['score'] );

    $lidata['stock'] =  $lipininfo['stock']+$info['count'];
    $lidata['sell_count'] =  $lipininfo['sell_count']-$info['count'];
		$this->mysql->update(Mysite::$app->config['tablepre'].'gift',$lidata,"id='".$info['giftid']."'");
	  $this->success('操作成功');

  }
}



?>