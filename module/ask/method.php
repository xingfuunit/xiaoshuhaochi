<?php
class method   extends baseclass
{
	 function backask()
	 {
		  $id = intval(IReq::get('askbackid'));
	   	if(empty($id)) $this->message('提交回复ID不能为空');
	   	$checkinfo = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."ask where id='".$id."'  ");
	   	if(empty($checkinfo)) $this->message('网站留言获取失败');
		  if(!empty($checkinfo['replycontent']))  $this->message('已经回复,不可再次提交');
		  $where = " id='".$id."' ";
	    	 $shopid = ICookie::get('adminshopid');
	    	 if(empty($shopid)) $this->message('无权限回复该条留言记录');
	    	 if($checkinfo['shopid'] != $shopid) $this->message('无权限回复该条留言记录');
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
		 $where = " id in($ids)";
	   	   $this->checkshoplogin();
	    	 $shopid = ICookie::get('adminshopid');
	    	if(!empty($shopid)){
	    		 $where = $where." and shopid = ".$shopid;
	    	}

	   $this->mysql->delete(Mysite::$app->config['tablepre'].'ask',$where);
	   $this->success('操作成功');
   }
   function delmyask(){
   	  $this->checkmemberlogin();
   	  $id = intval(IFilter::act(IReq::get('id')));
   	   if(empty($id))  $this->message('留言ID不能为空');
   	   $this->mysql->delete(Mysite::$app->config['tablepre'].'ask'," id= '".$id."' and uid = '".$this->member['uid']."'  ");
   	    $this->success('操作成功');
   }
   function saveask()
	 {
	 	 if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
	 	    
	 	 }else{
	 	 	  $this->message('请通过网页提交');
	   	}
	  	$shopid = intval(IReq::get('shopid'));
	  	$data['content'] = trim(IFilter::act(IReq::get('content')));
	  	$type = intval(IReq::get('type'));//留言类型 shop
	    if(empty($data['content'])) $this->message('留言内容不能为空');
	    if(strlen($data['content']) > 200) $this->message('留言长度不能超过 200字符串');
	    $data['shopid'] = empty($shopid)?'0':$shopid;
	    $data['uid'] = $this->member['uid'];
	    $data['typeid'] = empty($type)?3:$type;
	    $data['addtime'] = time();
	    $this->mysql->insert(Mysite::$app->config['tablepre'].'ask',$data);
		  $this->success('操作成功');
   }
   function myask(){
   	$this->checkmemberlogin();
     $this->asktype();
   }
	 function asktype(){
	 	  $data['typelist'] =array('0'=>'店铺留言','1'=>'建议','2'=>'问题','3'=>'催单','4'=>'投诉申告','5'=>'其他');
	   	Mysite::$app->setdata($data);
	 }
	 function deluserpms(){
	 	$this->checkmemberlogin();
	 	  $id = IReq::get('id');
	 	  $uid = $this->member['uid'];
	 	  if(empty($uid)) $this->message('用户无权限操作');
	 	  $this->mysql->delete(Mysite::$app->config['tablepre'].'pmes'," id ='".$id."' and uid = '".$uid."' ");
	 	  $this->success('操作成功');
	 }
	 function saveuserpmes(){
	 	$this->checkmemberlogin();
	   $uid = $this->member['uid'];
	   if(empty($uid)) $this->message('用户无权限操作');
	 	 $data['usercontent'] = trim(IFilter::act(IReq::get('message')));
	   $data['userimg'] = trim(IFilter::act(IReq::get('image')));
	   $data['uid'] = $this->member['uid'];
	   $data['username'] = $this->member['username'];
	   $data['creattime'] = time();
	   $data['backuid'] = 0;
	   $data['backcontent']='';
	   $data['backimg'] = '';
	   $data['backtime']=0;
	   $data['backusername'] = '网站客服';
	   if(empty($data['usercontent'])) $this->message('发送内容不能为空');
	   $this->mysql->insert(Mysite::$app->config['tablepre'].'pmes',$data);
	   $this->success('操作成功');
	 }
   function newshopask(){
	 	   //$this->checkshoplogin();

	 	 $shopid = intval(IFilter::act(IReq::get('id')));
     $type = trim(IFilter::act(IReq::get('showtype')));
     $data['list'] = array();
     $data['pagecontent'] = '';
     if($type == 'shop'){
       	$this->pageCls->setpage(intval(IReq::get('page')),10);
                 $data['list'] = $this->mysql->getarr("select a.*,b.username,b.logo  from ".Mysite::$app->config['tablepre']."ask as a left join  ".Mysite::$app->config['tablepre']."member as b on a.uid = b.uid    where a.shopid=".$shopid."  order by id desc limit ".$this->pageCls->startnum().", ".$this->pageCls->getsize()."");
             $shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."ask   where shopid=".$shopid." ");
                  $this->pageCls->setnum($shuliang);
              $data['pagecontent'] = $this->pageCls->ajaxbar('getliuyan');
     }
     Mysite::$app->setdata($data);
  }
  	function shopask(){
  		$this->checkshoplogin();
  	}
	  function pmessage(){
	  $this->checkmemberlogin();
	  }

}



?>