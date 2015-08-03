<?php
class method   extends adminbaseclass
{

	 function  asklist(){
	    $this->asktype();
	   $searchvalue = IReq::get('searchvalue');
	   $typeid = intval(IReq::get('typeid'));
	   $data['typeid'] = $typeid;
	   $data['searchvalue'] = $searchvalue;
	   $data['where'] = '';

	   Mysite::$app->setdata($data);
	 }
	 function backask()
	 {
		  $id = intval(IReq::get('askbackid'));
	   	if(empty($id)) $this->message('提交回复ID不能为空');
	   	$checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."ask where id='".$id."'  ");
	   	if(empty($checkinfo)) $this->message('网站留言获取失败');
		  if(!empty($checkinfo['replycontent']))  $this->message('已经回复,不可再次提交');
		  $where = " id='".$id."' ";
	   	$data['replycontent'] = IFilter::act(IReq::get('askback'));
	  	if(empty($data['replycontent'])) $this->message('回复内容不能为空');
		  $data['replytime'] = time();
		  $this->mysql->update(Mysite::$app->config['tablepre'].'ask',$data,$where);
		  $this->success('操作成功');
   }
   function delask(){

     $id = IFilter::act(IReq::get('id'));
		 if(empty($id))  $this->message('留言ID不能为空');
		 $ids = is_array($id)? join(',',$id):$id;
		 $adminuid = ICookie::get('adminuid');
		 $where = " id in($ids)";
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'ask',$where);
	   $this->success('操作成功');
   }
	 function asktype(){
	 	  $data['typelist'] =array('0'=>'店铺留言','1'=>'建议','2'=>'问题','3'=>'催单','4'=>'投诉申告','5'=>'其他');
	   	Mysite::$app->setdata($data);
	 }
	 function savepme(){
	 	$message = trim(IReq::get('message'));
		if(empty($message)) $this->message('回复内容不能为空');
		$data['usercontent'] = $message;
		$data['uid'] = 0;
		$data['backusername'] = '网站客服';
		$data['userimg'] = '';
		$data['creattime'] = time();
		$data['backtime'] = 0;
		$data['backuid'] = 0;
		$this->mysql->insert(Mysite::$app->config['tablepre'].'pmes',$data);  //写消息表
		$this->success('操作成功');
	 }
	 function delpmes(){
	   	$id = IReq::get('id');
		  if(empty($id)) $this->json('提交ID为空处理失败');
	  	$id = is_array($id)?$id:array($id);
	  	$tempids = join(',',$id);
	  	if(empty($tempids)) $this->json('数据合并出错');
	  	$this->mysql->delete(Mysite::$app->config['tablepre'].'pmes'," id in($tempids) ");
			$this->success('操作成功');
	 }
	 function backpme(){
	 	$id = intval(IReq::get('id'));
		if(empty($id)) $this->message('提交ID错误');
		$message = trim(IReq::get('message'));
		if(empty($message)) $this->message('回复内容不能为空');
		$data['backcontent'] 	= $message;
		$data['backuid'] = '';
		$data['backimg']	='';
		$data['backtime'] = time();
		$this->mysql->update(Mysite::$app->config['tablepre'].'pmes',$data,"id='".$id."'");
		$this->success('操作成功');
   }
}



?>