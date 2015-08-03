<?php
class method   extends adminbaseclass
{

	 function savesingle(){
	 	$id = IReq::get('uid');
		$data['addtime'] = strtotime(IReq::get('addtime').' 00:00:00');
		$data['title'] = IReq::get('title');
		$data['content'] = IReq::get('content');
		$data['code'] = IReq::get('code');
			$data['seo_key'] = IFilter::act(IReq::get('seo_key'));
	   	$data['seo_content'] = IFilter::act(IReq::get('seo_content'));
		if(empty($id))
		{
			$link = IUrl::creatUrl('adminpage/single/module/addsingle');
			if(empty($data['content'])) $this->message('单页内容不能为空',$link);
			if(empty($data['title'])) $this->message('单页标题不能为空',$link);
			$this->mysql->insert(Mysite::$app->config['tablepre'].'single',$data);
		}else{
			$link = IUrl::creatUrl('single/addsingle/id/'.$id);
			if(empty($data['content'])) $this->message('单页内容不能为空',$link);
			if(empty($data['title'])) $this->message('单页标题不能为空',$link);
			$this->mysql->update(Mysite::$app->config['tablepre'].'single',$data,"id='".$id."'");
		}
		$link = IUrl::creatUrl('adminpage/single/module/singlelist');
		$this->success('操作成功',$link);
	 }
	 function delsingle(){
	 	 $uid = IReq::get('id');
		 $uid = is_array($uid)?$uid:array($uid);
		 $ids = join(',',$uid);
		 if(empty($ids))  $this->message('单页ID不能为空');
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'single',"id in (".$ids.") ");
	   $this->success('操作成功');
	 }
}



?>