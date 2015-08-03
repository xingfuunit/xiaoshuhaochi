<?php
class method   extends adminbaseclass
{
	   function index(){
	 	       $link = IUrl::creatUrl('/adminpage/news/module/newslist');
           $this->refunction('',$link);
	 }
	 function savenewstype(){
	 	$id = intval(IReq::get('uid'));
		$data['name'] = IReq::get('name');
		$data['orderid']  = intval(IReq::get('orderid'));
		$data['type'] = intval(IReq::get('type'));
		$data['parent_id'] = intval(IReq::get('parent_id'));
		$data['displaytype'] = intval(IReq::get('displaytype'));
		if(empty($data['name'])) $this->message('新闻类型不能为空');
		if(empty($id))
		{
			$this->mysql->insert(Mysite::$app->config['tablepre'].'newstype',$data);
		}else{
			$this->mysql->update(Mysite::$app->config['tablepre'].'newstype',$data,"id='".$id."'");
		}
		$this->success('操作成功','');
   }
   function delnews(){
   	  $id = IFilter::act(IReq::get('id'));
		  if(empty($id))  $this->message('新闻ID不能为空');
		  $ids = is_array($id)? join(',',$id):$id;
		 if(empty($ids))  $this->message('提交ID值不能为空');
	    $this->mysql->delete(Mysite::$app->config['tablepre'].'news'," id in($ids)");
	    $this->success('操作成功','');
  }
   function delnewstype(){
		 $id = IFilter::act(IReq::get('id'));
		  if(empty($id))  $this->message('新闻类型ID不能为空');
		 $ids = is_array($id)? join(',',$id):$id;
		 if(empty($ids))  $this->message('提交ID值不能为空');
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'newstype'," id in($ids)");
	   $this->success('操作成功','');
   }
   function addnews(){
    $id = intval(IReq::get('id'));
		$data['info'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."news where id=".$id."  ");

    $data['typlist']= $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."newstype  order by orderid desc ");
    $temptypeid = array();
    if(!empty($id)){
		$tempid = $data['info']['typeid'];
     while ($tempid > 0) {
        $getstr =     $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."newstype where id=".$tempid."  ");
        if(!empty($getstr)){
        	$tempid = $getstr['parent_id'];
        	$temptypeid[] = $getstr['id'];
        }else{
        	$temptypeid[] = $tempid;
        	$tempid = 0;
        }
      }
		 $data['allids'] = $temptypeid;
		}else{
			$data['allids'] = array();
		}

		Mysite::$app->setdata($data);
   }
   function savenews(){
      $id = IReq::get('uid');
	   	$data['addtime'] = strtotime(IReq::get('addtime').' 00:00:00');
	   	$data['title'] = IReq::get('title');
	   	$data['content'] = IReq::get('content');
	   	$data['orderid'] = IReq::get('orderid');
	   	$data['typeid'] = IReq::get('typeid');
	   	$data['seo_key'] = IFilter::act(IReq::get('seo_key'));
	   	$data['seo_content'] = IFilter::act(IReq::get('seo_content'));

	   	if(empty($id))
	   	{
	   		$link = IUrl::creatUrl('adminpage/news/module/addnews');
	   		if(empty($data['content'])) $this->message('新闻内容不能为空',$link);
	   		if(empty($data['title'])) $this->message('新闻标题不能为空',$link);
	   		$this->mysql->insert(Mysite::$app->config['tablepre'].'news',$data);
	   	}else{
	   		$link = IUrl::creatUrl('adminpage/news/module/addnews/id/'.$id);
	   		if(empty($data['content'])) $this->message('新闻内容不能为空',$link);
	   		if(empty($data['title'])) $this->message('新闻标题不能为空',$link);
	   		$this->mysql->update(Mysite::$app->config['tablepre'].'news',$data,"id='".$id."'");
	   	}
	   	$link = IUrl::creatUrl('adminpage/news/module/newslist');
	    $this->success('操作成功',$link);
   }
   function addnewstype()
	{
	  $id = intval(IReq::get('id'));
		$data['info'] = $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."newstype where id=".$id."  ");
		$mydatinfo = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."newstype ");
		$data['typeoption'] = $this->huannewtype($mydatinfo,0,0,$data['info']['parent_id']);

	 	Mysite::$app->setdata($data);
	}

	function huannewtype($mydatinfo,$parent_id,$grade,$nowid=0){
		$htmlcontent = '';
		$tempshow = '';
		for($i = 0;$i< $grade;$i++)
		 {
		 	 $tempshow .="&nbsp&nbsp&nbsp&nbsp";
		 }
		foreach($mydatinfo as $key=>$value){
			if($value['parent_id'] == $parent_id){
			     if($value['type'] == 2)
			     {
			     	 $onoption = $nowid == $value['id']?'selected':'';
				     $htmlcontent .='<option value="'.$value['id'].'" '.$onoption.'>'.$tempshow.$value['name'].'</option>';
				     $htmlcontent .= $this->huannewtype($mydatinfo,$value['id'],$grade+1,$nowid);
				   }
			}
		}
		return $htmlcontent;
	}
}



?>