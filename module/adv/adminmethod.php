<?php
class method   extends adminbaseclass
{
	 function deladv()
	 {
		 $id = IReq::get('id');
		 if(empty($id))  $this->message('广告ID不能为空');
		 $ids = is_array($id)? join(',',$id):$id;
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'adv'," id in($ids) ");
	  $this->success('操作成功');
	 }
	 function saveadv(){
	 	 $data['title'] = IReq::get('title');
		 $data['advtype']= IReq::get('advtype');
		 $data['img'] = IReq::get('img');
		 $data['linkurl']= IReq::get('linkurl');
		 $data['module'] = Mysite::$app->config['sitetemp'];
		 $uid = IReq::get('uid');
		 if(empty($data['title'])) $this->message('广告标题不能为空');
	   if(empty($data['img'])) $this->message('广告图片不能为空');
		 if(empty($data['linkurl'])) $this->message('广告链接不能为空');
		 if(empty($uid))
	   {
			  $this->mysql->insert(Mysite::$app->config['tablepre'].'adv',$data);
		 }else{
			  $this->mysql->update(Mysite::$app->config['tablepre'].'adv',$data,"id='".$uid."'");
	 	 }
    	$this->success('操作成功');
	 }

	 function saveadvtype(){
	 	 $arrtypename = IReq::get('typename');
			$arrtypeurl = IReq::get('typeurl');
			$arrtypeorder = IReq::get('typeorder');
		  if(empty($arrtypename)) $this->message('广告类型不能为空');
		  if(is_array($arrtypename))
		  {
		  	$orderinfo = array();
		  	foreach($arrtypename as $key=>$value)
		  	{
		  		if(isset($arrtypeorder[$key]))
		  		{
		  		  $dokey = !empty($arrtypeorder[$key])? $arrtypeorder[$key]:0;
		  		  array_push($orderinfo,$dokey);
		  	  }else{
		  	  	 array_push($orderinfo,0);
		  	  }
		  	}
		  	$orderinfo = array_unique($orderinfo);
		  	sort($orderinfo);
		  	$newinfo =  array();
		  	foreach($orderinfo as $key=>$value)
		  	{
		  		foreach($arrtypename as $k=>$v)
		  		{
		  	    if(isset($arrtypeorder[$k]))
		  	   	{
		  	   	  $checkcode = !empty($arrtypeorder[$k])? $arrtypeorder[$k]:0;

		  	     }else{
		  	     	$checkcode = 0;
		  	     }

		  			if($checkcode == $value)
		  			{
		  				$data['typename'] = $v;
		  				$data['typeurl'] = isset($arrtypeurl[$k])? $arrtypeurl[$k]:'';
		  				$data['typeorder'] = $checkcode;
		  				$newinfo[] = $data;
		  			}
		  		}
		  	}

		  }else{
		  	$newinfo['typename'] = $arrtypename;
		  	$newinfo['typeurl'] = $arrtypeurl;
		  	$newinfo['typeorder'] = $arrtypeorder;
		  }
		$siteinfo['advtype'] =   serialize($newinfo);
		$config = new config('hopeconfig.php',hopedir);
	  $config->write($siteinfo);
	  $this->success('操作成功');
   }
}



?>