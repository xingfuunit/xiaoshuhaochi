<?php
class method   extends adminbaseclass
{

   function wxsetsave(){
   	$info['wxtoken'] = trim(IReq::get('wxtoken'));
		$info['wxappid'] = trim(IReq::get('wxappid'));
		$info['wxsecret'] = trim(IReq::get('wxsecret'));
		if(empty($info['wxtoken'])) $this->message('自定义token不能为空');
		if(empty($info['wxappid'])) $this->message('微信appid不能为空');
		if(empty($info['wxsecret'])) $this->message('微信secret不能为空');
	  $config = new config('hopeconfig.php',hopedir);
	  $config->write($info);
	  $this->success('操作成功');
   }

   function wxmenu(){
		//构造微信 menu
		 $wxtoken = Mysite::$app->config['wxtoken'];
		 $errorlink  =IUrl::creatUrl('adminpage/weixin/module/wxset');
		 if(empty($wxtoken)) $this->message('未设置微信基本信息',$errorlink);
	   $data['wxmenu'] =  $this->mysql->getarr("select * from   ".Mysite::$app->config['tablepre']."wxmenu order by sort desc");
		 Mysite::$app->setdata($data);
	 }
	 function savewxmenu(){
		$id = intval(IReq::get('id'));
		$data['name'] = trim(IReq::get('name'));
		$data['parent_id'] = intval(IReq::get('parent_id'));
		$data['type'] = trim(IReq::get('types'));
		$data['sort'] = intval(IReq::get('sort'));
		if(empty($data['name'])) $this->message('提交菜单名不能为空');
		$data['code'] = trim(IReq::get('code'));
		if(empty($data['code'])) $this->message('对应的code不能为空');
		$data['type'] = $data['type']=='view'?'view':'click';
		$data['msgtype'] = 0;
		$info = $this->mysql->select_one("select * from   ".Mysite::$app->config['tablepre']."wxmenu where id = ".$id." order by sort desc");

		if($data['type'] != 'view'){
			 $data['msgtype'] = 1;
		}
		if($id > 0){
			   unset($data['msgtype']);
			   $info = $this->mysql->select_one("select * from   ".Mysite::$app->config['tablepre']."wxmenu where id = ".$id." order by sort desc");
			   if(empty($info)) $this->message('菜单不存在');
			   if($data['type'] == 'view'){
			   	if($info['type'] != 'view'){
			   	  $data['msgtype'] = 0;
			   	  $data['values'] = '';
			   	}
			   }else{
			   	  if($info['type'] != 'click'){
			   	  	 $data['msgtype'] = 1;
			   	     $data['values'] = '';
			   	  }
			   }
				 $this->mysql->update(Mysite::$app->config['tablepre'].'wxmenu',$data,"id='".$id."'");
		}else{
				$this->mysql->insert(Mysite::$app->config['tablepre'].'wxmenu',$data);
		}
	  $this->success('操作成功');
	}
	function getwxmen(){
		$id = intval(IReq::get('id'));
		$info =  $this->mysql->select_one("select * from   ".Mysite::$app->config['tablepre']."wxmenu where id = ".$id." order by sort desc");

		if(empty($info)){
		   $this->message('获取失败');
		}
		$info['msglist']  = array();
		if($info['msgtype']  == 2){
			if(!empty($info['values'])){
		      $info['msglist'] =  unserialize($info['values']);
		  }
		}elseif($info['msgtype'] == 0){
			if(!empty($info['values'])){
		      $info['msglist'] =  unserialize($info['values']);
		  }
		}
		$this->success($info);
	}
	//保存菜单内容
	function savewxmenucontent(){
		$id = intval(IReq::get('id'));
		$msgtype = intval(IReq::get('msgtype'));
		if($id > 0){
			  if(empty($msgtype)){
			      $links = trim(IReq::get('values'));
			      if(empty($links)) $this->message('超连接不能为空');
			       $data['msgtype'] = 0;
			       $miaoshu = trim(IReq::get('miaoshu'));
			      if(empty($miaoshu)) $this->message('超连接描述不能为空');
			      $tempinfo['lj_link'] = $links;
			      $tempinfo['lj_title'] = $miaoshu;
			      $data['values'] = serialize($tempinfo);
			     	$this->mysql->update(Mysite::$app->config['tablepre'].'wxmenu',$data,"id='".$id."'");
			     	$this->success('操作成功');
			  }elseif($msgtype == 1){
			  	 $data['values'] = trim(IReq::get('wb_content'));
			  	 if(empty($data['values'])) $this->message('内容不能为空');
			  	 $data['msgtype'] = 1;
			     $this->mysql->update(Mysite::$app->config['tablepre'].'wxmenu',$data,"id='".$id."'");
			     $this->success('操作成功');
			  }elseif($msgtype == 2){
			  	   $biaoti = IReq::get('biaoti');
			  	   $miaoshu = IReq::get('miaoshu');
			  	   $tupian = IReq::get('tupian');
			  	   $lianjie = IReq::get('lianjie');
			  	   $doshow = array();
			  	   if(is_array($biaoti)){
			  	   	  foreach($biaoti as $key=>$value){
			  	   	  	if(!empty($value)){
			  	   	    $tempinfo['biaoti'] = $value;
			  	   	    $tempinfo['miaoshu']  =  isset($miaoshu[$key])? $miaoshu[$key]:'';
			  	   	    $tempinfo['tupian']    =  isset($tupian[$key])? $tupian[$key]:'';
			  	   	    $tempinfo['lianjie']   =  isset($lianjie[$key])? $lianjie[$key]:'';
			  	   	    $doshow[] = $tempinfo;
			  	   	    }
			  	   	  }
			  	   }else{
			  	   	   if(empty($biaoti)) $this->message('提交数据不能为空');
			  	   	    $tempinfo['biaoti'] = $biaoti;
			  	   	    $tempinfo['miaoshu']  =  $miaoshu;
			  	   	    $tempinfo['tupian']    =  $tupian;
			  	   	    $tempinfo['lianjie']   =  $lianjie;
			  	   	     $doshow[] = $tempinfo;
			  	   }
			  	   if(empty($doshow)) $this->message('提交数据不能为空');
			     	$data['msgtype'] = 2;
			  	  $data['values'] = serialize($doshow);
			  	  $this->mysql->update(Mysite::$app->config['tablepre'].'wxmenu',$data,"id='".$id."'");
			  	  $this->success('操作成功');
			  }
			  $this->message('未定义的操作');
		}
		$this->success('操作成功');
	}


	function wxback(){
		$pageinfo = new page();
	 	$pageinfo->setpage(IReq::get('page'));
		$data['list'] = $this->mysql->getarr("select *  from ".Mysite::$app->config['tablepre']."wxback   order by id desc  limit ".$pageinfo->startnum().", ".$pageinfo->getsize()." ");
		$shuliang  = $this->mysql->counts("select *  from ".Mysite::$app->config['tablepre']."wxback ");
		$pageinfo->setnum($shuliang);
		$data['pagecontent'] = $pageinfo->getpagebar();
    Mysite::$app->setdata($data);
	}
	function savewxback(){
	  $id = intval(IReq::get('id'));
	  $data['code'] = trim(IReq::get('code'));
	  if(empty($data['code'])) $this->message('code不能为空');
	  $data['msgtype'] = intval(IReq::get('msgtype'));
	  if(!in_array($data['msgtype'],array('1','2','3'))) $this->message('类型错误');
	  if($data['msgtype'] ==  1){
	  	$datainfo['lj_title'] =  trim(IReq::get('lj_title'));
	  	$datainfo['lj_link'] =  trim(IReq::get('lj_link'));
	  	if(empty($datainfo['lj_title'])) $this->message('连接标题不能为空');
	  	if(empty($datainfo['lj_link'])) $this->message('连接地址不能为空');
	  	$data['values'] = serialize($datainfo);
	  }elseif($data['msgtype'] ==  2){
	  	 $data['values'] = trim(IReq::get('wb_content'));
	  	 if(empty($data['values'])) $this->message('文本不能为空');

	  }elseif($data['msgtype'] == 3){
	  	     $biaoti = IReq::get('biaoti');
			  	   $miaoshu = IReq::get('miaoshu');
			  	   $tupian = IReq::get('tupian');
			  	   $lianjie = IReq::get('lianjie');
			  	   $doshow = array();
			  	   if(is_array($biaoti)){
			  	   	  foreach($biaoti as $key=>$value){
			  	   	  	if(!empty($value)){
			  	   	    $tempinfo['biaoti'] = $value;
			  	   	    $tempinfo['miaoshu']  =  isset($miaoshu[$key])? $miaoshu[$key]:'';
			  	   	    $tempinfo['tupian']    =  isset($tupian[$key])? $tupian[$key]:'';
			  	   	    $tempinfo['lianjie']   =  isset($lianjie[$key])? $lianjie[$key]:'';
			  	   	    $doshow[] = $tempinfo;
			  	   	    }
			  	   	  }
			  	   }else{
			  	   	   if(empty($biaoti)) $this->message('提交数据不能为空');
			  	   	    $tempinfo['biaoti'] = $biaoti;
			  	   	    $tempinfo['miaoshu']  =  $miaoshu;
			  	   	    $tempinfo['tupian']    =  $tupian;
			  	   	    $tempinfo['lianjie']   =  $lianjie;
			  	   	     $doshow[] = $tempinfo;
			  	   }
			  	   if(empty($doshow)) $this->message('提交数据不能为空');
	  	      $data['values'] = serialize($doshow);
	  }
	  if($id > 0){
	       $this->mysql->update(Mysite::$app->config['tablepre'].'wxback',$data,"id='".$id."'");
	  }else{
	  		 $this->mysql->insert(Mysite::$app->config['tablepre'].'wxback',$data);
	  }
	  $this->success('操作成功');
	}
	function getwxback(){
		 $id = intval(IReq::get('id'));
		 if($id < 1) $this->message('微信获取错误');
		 	$info  = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."wxback where id=".$id."");
		 	if(empty($info)) $this->message('微信错误');
		 $temp = array();
		 if($info['msgtype']   == 1){
		      $info['listcontent'] = unserialize($info['values']);
		 }elseif($info['msgtype'] == 3){
		 	   $info['listcontent'] = unserialize($info['values']);
		 }
		 $this->success($info);
	}
	function delwxback(){
		 $id = intval(IReq::get('id'));
		 if($id < 1) $this->message('提交ID错误');
		 $this->mysql->delete(Mysite::$app->config['tablepre'].'wxback',"id  in(".$id.")");
	  	$this->success('操作成功');
	}
	 function delwxmenu(){
	 	$this->checkadminlogin();
		 $id = intval(IReq::get('id'));
		 if($id < 1) $this->message('提交ID错误');
		 $this->mysql->delete(Mysite::$app->config['tablepre'].'wxmenu',"id  in(".$id.")");
	   $this->success('操作成功');
	}
	function  updatewxmenu(){
	//更新菜单到服务器
	$this->checkadminlogin();
	    	$info =  $this->mysql->getarr("select * from   ".Mysite::$app->config['tablepre']."wxmenu   order by sort desc");
	    	$tempinfo = array();
	    	foreach($info as $key=>$value){
	    		if($value['parent_id']  == 0){

	    		  $value['sub_button'] = array();
	    		  foreach($info as $k=>$val){
	    		    if($value['id'] == $val['parent_id']){
	    		    	$value['sub_button'][] = $val;
	    		    }
	    		  }
	    		  $tempinfo[] = $value;
	    		}
	    	}
	    	/*转换为菜单*/
	    	$menuinfo = array();
	    	//$stringarr = '{"button":[';
	    	foreach($tempinfo as $key=>$value){
	    		if(count($value['sub_button']) > 0){
	    			$temhuan = array();
	    			$temhuan['name'] = urlencode($value['name']);
	    		//	$neicontent = '{"name":"'.$value['name'].'","sub_button":[';
	    			foreach($value['sub_button'] as $k=>$v){
               			$temsub = array();
               			$temsub['name'] = urlencode($v['name']);
               			$temsub['type'] = $v['type'];

               			if($v['type'] == 'view'){
	    			       $link = unserialize($value['values']);
	    			       $temhuan['url'] =  urlencode($link['lj_link']);
	    			   }else{
	    			      $temsub['key'] = $v['code'];
	    			   }
               		   $temhuan['sub_button'][] =  $temsub;
        	 		}
	    			$menuinfo['button'][] = $temhuan;
	    			//$neicontent .= ']},';
	    		 //	$stringarr .= $neicontent;

	    		}else{
	    			//$stringarr .=  '{"name":"'.$value['name'].'","key":"'.$value['code'].'","type":"click"},';
	    			$temhuan = array();
	    			$temhuan['name'] = urlencode($value['name']);
	    			if($value['type'] == 'view'){
	    				$link = unserialize($value['values']);
	    			    $temhuan['url'] =  urlencode($link['lj_link']);
	    			}else{
	    			  $temhuan['key'] = $value['code'];
	    			}
	    			$temhuan['type'] = $value['type'];
	    			$menuinfo['button'][] = $temhuan;
	    		}
	    	}
	    	//$stringarr .= ']}';
	      $testinfo =   urldecode(json_encode($menuinfo ));
	    	$wx_s = new wx_s();
	    	if($wx_s->savemenu($testinfo)){
	    		$this->success('操作成功');
	    	}else{
	    		$this->message($wx_s->err());
	    	}



	}
	function delwxbd(){
		 $id = intval(IReq::get('id'));
		 if($id < 1) $this->message('提交ID错误');
		 $this->mysql->delete(Mysite::$app->config['tablepre'].'wxuser',"id  in(".$id.")");
	  	$this->success(array('error'=>false));
	}
	function wxuser(){
		$pageinfo = new page();
		$pageinfo->setpage(IReq::get('page'));
		$data['list'] = $this->mysql->getarr("select a.openid,a.is_bang,b.*  from ".Mysite::$app->config['tablepre']."wxuser  as a left join ".Mysite::$app->config['tablepre']."member as b on b.uid = a.uid   order by a.uid desc  limit ".$pageinfo->startnum().", ".$pageinfo->getsize()." ");
		$shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."wxuser  ");
		$pageinfo->setnum($shuliang);
		$data['pagecontent'] = $pageinfo->getpagebar();
    Mysite::$app->setdata($data);


		/*
		$wx_s = new wx_s();

	  print_r($wx_s->get_img());

		if($wx_s->menu()){
		print_r($wx_s->returnmenu());
	}else{
		$this->json($wx_s->err());
	} */
		/*
		if($wx_s->get_user()){
			print_r($wx_s->userlist());
		}else{
			echo $wx_s->err();
		} */
		 /*
		if($wx_s->sendmsg('订单编号为：dno371033343,总价48元，详情：番茄炒蛋7元','oKDxjuLiZlRRIaI_RVdex2NOJx_E')){
		    echo 'ok';
		}else{
		   echo $wx_s->err();
		}*/
		/*
		if($wx_s->sendmsg('测试发送客服消息3','oKDxjuL-79rRF_ZQaElogLFlaTho')){
		    echo 'ok';
		}else{
		   echo $wx_s->err();
		}*/
		/*设置 发送客服消息   oKDxjuLiZlRRIaI_RVdex2NOJx_E     */
	}
	function getoneuser(){
		$openid = trim(IReq::get('openid'));
	  $wx_s = new wx_s();
	  if($wx_s->showuserinfo($openid)){
	  	$this->success($wx_s->getone());
	  }else{
	  	$info = $wx_s->err();
	  	$this->message($info);
	  }

	}
	function sendwxmsg(){
		$openid = trim(IReq::get('openid'));
		$content = trim(IReq::get('content'));
		if(empty($content)) $this->message('发送内容不能为空');
		$wx_s = new wx_s();
		if($wx_s->sendmsg($content,$openid)){
		  $this->success('操作成功');
		}else{
			$this->message($wx_s->err());
		}
	}
}



?>
