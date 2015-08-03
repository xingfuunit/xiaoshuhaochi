<?php
class method   extends adminbaseclass
{
	 function savegifttype(){
	 	   $id = intval(IReq::get('uid'));
		   $data['name'] = IReq::get('name');
		   $data['orderid']  = intval(IReq::get('orderid'));
		   if(empty($data['name'])) $this->message('店铺类型不能为空');
		   if(empty($id))
		   {
		   	$this->mysql->insert(Mysite::$app->config['tablepre'].'gifttype',$data);
		   }else{
		   	$this->mysql->update(Mysite::$app->config['tablepre'].'gifttype',$data,"id='".$id."'");
		   }
		   $this->success('操作成功');
	 }
	 function delgifttype(){
	 	 $id = IReq::get('id');
		 if(empty($id))  $this->message('礼品类型ID不能为空');
		 $ids = is_array($id)? join(',',$id):$id;
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'gifttype',"id in($ids)");
	   $this->success('操作成功');
	 }
   function savegift(){
      $id = IReq::get('uid');
		  $data['title'] = IReq::get('title');
		  $data['content'] = IReq::get('content');
		  $data['market_cost'] = intval(IReq::get('market_cost'));
		  $data['typeid'] = IReq::get('typeid');
		  $data['score'] = intval(IReq::get('score'));
		  $data['stock'] = intval(IReq::get('stock'));
		  $data['img'] = IReq::get('img');
		  $data['sell_count'] = intval(IReq::get('sell_count'));
		  if(empty($id))
		  {
		  	$link = IUrl::creatUrl('adminpage/gift/module/addgift');
		  	if(empty($data['content'])) $this->message('礼品内容不能为空',$link);
		  	if(empty($data['title'])) $this->message('礼品标题不能为空',$link);
		  	if(empty($data['score'])) $this->message('礼品积分不能为空',$link);
		  	$this->mysql->insert(Mysite::$app->config['tablepre'].'gift',$data);
		  }else{
		  	$link = IUrl::creatUrl('adminpage/gift/module/addgift/id/'.$id);
		  	if(empty($data['content'])) $this->message('礼品内容不能为空',$link);
		  	if(empty($data['title'])) $this->message('礼品标题不能为空',$link);
		  	if(empty($data['score'])) $this->message('礼品积分不能为空',$link);
		  	$this->mysql->update(Mysite::$app->config['tablepre'].'gift',$data,"id='".$id."'");
		  }
	   	$link = IUrl::creatUrl('adminpage/gift/module/giftlist');
		  $this->message('操作成功',$link);
   }
   function delgift(){
   	 $id = IReq::get('id');
		 if(empty($id))  $this->message('礼品ID不能为空');
		 $ids = is_array($id)? join(',',$id):$id;
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'gift',"id in($ids)");
	   $this->success('操作成功');
   }
  function logstat(){
  	$data['logstat'] = array('0'=>'待处理','1'=>'已处理，配送中','2'=>'兑换完成','3'=>'兑换成功','4'=>'已取消兑换');
  	 Mysite::$app->setdata($data);
  }
  function giftlog(){
    $orderstatus = intval(IReq::get('orderstatus'));
		$starttime = trim(IReq::get('starttime'));
		$endtime = trim(IReq::get('endtime'));
		$newlink = '';
		$where= '';
		$data['orderstatus'] = '';
		if($orderstatus > 0)
		{
			   $chastatus = $orderstatus -1;
			   $data['orderstatus'] = $orderstatus;
	   	   $where .= ' and  gg.status = \''.$chastatus.'\' ';
	   	   $newlink .= '/orderstatus/'.$orderstatus;
		}
		$data['starttime'] ='';
		if(!empty($starttime))
		{
			 $data['starttime'] = $starttime;
			 $where .= ' and  gg.addtime > '.strtotime($starttime.' 00:00:01').' ';
	   	 $newlink .= '/starttime/'.$starttime;
		}
		$data['endtime'] = '';
		if(!empty($endtime))
		{
			 $data['endtime'] = $endtime;
			 $where .= ' and  gg.addtime < '.strtotime($endtime.' 23:59:59').' ';
	   	 $newlink .= '/endtime/'.$endtime;
		}

		$link = IUrl::creatUrl('adminpage/gift/module/giftlog'.$newlink);
		$data['outlink'] =IUrl::creatUrl('adminpage/gift/module/outgiftlog/outtype/query'.$newlink);

	  $this->pageCls->setpage(IReq::get('page'));
		$data['list'] = $this->mysql->getarr("select gg.*,gf.title,mb.username from ".Mysite::$app->config['tablepre']."giftlog as gg left join ".Mysite::$app->config['tablepre']."gift as gf on gf.id = gg.giftid  left join ".Mysite::$app->config['tablepre']."member as mb on mb.uid=gg.uid where  gg.id > 0  ".$where." order by gg.id desc  limit ".$this->pageCls->startnum().", ".$this->pageCls->getsize()."");
		$shuliang  = $this->mysql->counts("select gg.* from ".Mysite::$app->config['tablepre']."giftlog as gg where  gg.id > 0 ".$where." ");
		$this->pageCls->setnum($shuliang);
		$data['pagecontent'] = $this->pageCls->getpagebar($link);

		 Mysite::$app->setdata($data);
  }
  function delgiftlog(){
  	  $id = IReq::get('id');
		 if(empty($id))  $this->message('记录iD不能为空');
		 $ids = is_array($id)? join(',',$id):$id;
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'giftlog'," id in($ids) ");
	   $this->success('操作成功');
  }
  function outgiftlog()
	{
		$outtype = IReq::get('outtype');

		if(!in_array($outtype,array('query','ids')))
		{
		  	header("Content-Type: text/html; charset=UTF-8");
			 echo '查询条件错误';
			 exit;
		}
		$where = '';
		if($outtype == 'ids')
		{
			  $id = trim(IReq::get('id'));
			  if(empty($id))
			  {
			  	 header("Content-Type: text/html; charset=UTF-8");
			  	 echo '查询条件不能为空';
			  	 exit;
			  }
			   $doid = explode('-',$id);
			  $id = join(',',$doid);
			  $where .= ' and gg.id in('.$id.') ';
		}else{

		   $orderstatus = intval(IReq::get('orderstatus'));
		   $where .= $orderstatus > 0?' and   gg.status = \''.($orderstatus-1).'\' ':'';

		   $starttime = trim(IReq::get('starttime'));
		   $where .= !empty($starttime)? ' and   gg.addtime > '.strtotime($starttime.' 00:00:01').' ':'';

		   $endtime = trim(IReq::get('endtime'));
		   $where .= !empty($endtime)? ' and   gg.addtime > '.strtotime($endtime.' 23:59:59').' ':'';
		}

		 $outexcel = new phptoexcel();
		 $titledata = array('礼品名称','用户名','用户地址','联系电话','联系人');
		 $titlelabel = array('title','username','address','telphone','contactman');

		 $datalist = $this->mysql->getarr("select gf.title,mb.username,gg.address,gg.telphone,gg.contactman from ".Mysite::$app->config['tablepre']."giftlog as gg left join ".Mysite::$app->config['tablepre']."gift as gf on gf.id = gg.giftid  left join ".Mysite::$app->config['tablepre']."member as mb on mb.uid=gg.uid where  gg.id > 0  ".$where." order by gg.id desc  limit 0,2000");

		 $outexcel->out($titledata,$titlelabel,$datalist,'','积分兑换导出结果');
	}
  function exgift()
	{
	   $id = intval(IReq::get('id'));
	   $type = IReq::get('type');//un取消  pass审核  unpass 取消审核  send发货 over完成
	   if(empty($id))  $this->message('兑换ID不能为空');
	   $checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."giftlog where id=".$id."  ");
	   if(empty($checkinfo))$this->message('兑换记录不存在');
	   $giftinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."gift where id=".$checkinfo['giftid']."  ");
	   if(empty($giftinfo)) $this->message('兑换礼品不存在');
	    $memberinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."member where uid=".$checkinfo['uid']."  ");
	   switch($type)
	   {
	   	  case 'un':
	   	        //取消 积分兑换
	   	        if($checkinfo['status'] != 0)$this->message('兑换记录不可取消');
	   	        //更新兑换记录
	   	        $data['status'] =4;
	   	        $this->mysql->update(Mysite::$app->config['tablepre'].'giftlog',$data,"id='".$id."'");
	   	        //更新用户积分 并写消息
	   	        if(!empty($memberinfo))
	   	        {
	   	        	   $ndata['score'] = $memberinfo['score'] + $checkinfo['score'];
	                 $this->mysql->update(Mysite::$app->config['tablepre'].'member','`score` = `score`+'.$checkinfo['score'],"uid='".$memberinfo['uid']."'");
	                 $this->memberCls->addlog($memberinfo['uid'],1,1,$checkinfo['score'],'取消兑换礼品','管理员取消兑换ID为:'.$giftinfo['id'].'的礼品['.$giftinfo['title'].'],帐号积分'.$ndata['score'] ,$ndata['score'] );
	   	        }
	   	        //还库存
	   	        $gdata['sell_count'] = $giftinfo['sell_count'] -$checkinfo['count'];
	   	        $gdata['stock'] = $giftinfo['stock'] +$checkinfo['count'];
	   	        $this->mysql->update(Mysite::$app->config['tablepre'].'gift',$gdata,"id='".$giftinfo['id']."'");
	   	  break;
	   	  case 'pass':
	   	         if($checkinfo['status'] != 0)$this->message('兑换记录不可审核');
	   	        $data['status'] =1;
	   	        $this->mysql->update(Mysite::$app->config['tablepre'].'giftlog',$data,"id='".$id."'");
	   	  break;
	   	  case 'unpass':
	   	         if($checkinfo['status'] != 1)$this->message('兑换记录不可取消');
	   	        $data['status'] =0;
	   	        $this->mysql->update(Mysite::$app->config['tablepre'].'giftlog',$data,"id='".$id."'");
	   	  break;
	   	  case 'send':
	   	       if($checkinfo['status'] != 1)$this->message('兑换记录不可发货');
	   	        $data['status'] =2;
	   	        $this->mysql->update(Mysite::$app->config['tablepre'].'giftlog',$data,"id='".$id."'");
	   	  break;
	   	  case 'over':
	   	       if($checkinfo['status'] != 2)$this->message('兑换记录不可发货');
	   	        $data['status'] =3;
	   	        $this->mysql->update(Mysite::$app->config['tablepre'].'giftlog',$data,"id='".$id."'");
	   	  break;
	   	  default:
	   	   $this->message('未定义的操作');
	   	  break;
	    }

	  $this->success('操作成功');
  }
}



?>