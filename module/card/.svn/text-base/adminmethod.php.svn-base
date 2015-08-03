<?php
class method   extends adminbaseclass
{  
	 
   function delcard(){ 
   	 $id = IReq::get('id'); 
		 if(empty($id))  $this->message('充值卡ID不能为空'); 
		 $ids = is_array($id)? join(',',$id):$id;    
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'card',"id in($ids)");  
	   $this->success('操作成功'); 
   } 
   function saveprensentjuan(){
   		$siteinfo['regester_juan'] = intval(IReq::get('regester_juan'));
   		$siteinfo['regester_juanlimit'] = intval(IReq::get('regester_juanlimit'));
   		$siteinfo['regester_juancost'] = intval(IReq::get('regester_juancost'));
   		$siteinfo['regester_juanday'] = intval(IReq::get('regester_juanday')); 
   		
		  $siteinfo['wx_juan'] = intval(IReq::get('wx_juan'));
		  $siteinfo['wx_juancost'] = intval(IReq::get('wx_juancost'));
		  $siteinfo['wx_juanlimit'] = intval(IReq::get('wx_juanlimit'));
		  $siteinfo['wx_juanday'] = intval(IReq::get('wx_juanday'));
 
		$siteinfo['login_juan'] = intval(IReq::get('login_juan'));
		$siteinfo['login_data'] = strtotime(IReq::get('login_data'));
    
    
    $siteinfo['login_juanlimit'] = intval(IReq::get('login_juanlimit'));
    $siteinfo['login_juancost'] = intval(IReq::get('login_juancost'));
    $siteinfo['login_juanday'] = intval(IReq::get('login_juanday'));
    
    
		$siteinfo['tui_juan'] = intval(IReq::get('tui_juan'));
		$siteinfo['tui_juanlimit'] = intval(IReq::get('tui_juanlimit'));
		$siteinfo['tui_juancost'] = intval(IReq::get('tui_juancost'));
		$siteinfo['tui_juanday'] = intval(IReq::get('tui_juanday'));
		 $config = new config('hopeconfig.php',hopedir);  
	  $config->write($siteinfo);
		 
		$this->success('操作成功');
		
   }
   function cardlist(){ 
       	$searchvalue = intval(IReq::get('searchvalue'));
      	$orderstatus = intval(IReq::get('orderstatus'));
      	$starttime = trim(IReq::get('starttime'));
      	$endtime = trim(IReq::get('endtime'));
      	$newlink = '';
      	$where= '';
      	$data['searchvalue'] = '';
      	if($searchvalue > 0)//限制值
      	{ 
      			 $data['searchvalue'] = $searchvalue;
         	   $where .= ' and  cost = \''.$searchvalue.'\' ';
         	   $newlink .= '/searchvalue/'.$searchvalue; 
      	}
      	$data['orderstatus'] = '';
      	if($orderstatus > 0)
      	{
      		   $chastatus = $orderstatus -1;
      		   $data['orderstatus'] = $orderstatus;
         	   $where .= ' and  status = \''.$chastatus.'\' ';
         	   $newlink .= '/orderstatus/'.$orderstatus; 
      	}
      	$data['starttime'] = '';
      	if(!empty($starttime))
      	{
      		 $data['starttime'] = $starttime;
      		 $where .= ' and  creattime > '.strtotime($starttime.' 00:00:01').' ';
         	 $newlink .= '/starttime/'.$starttime; 
      	}
      	$data['endtime'] = '';
      	if(!empty($endtime))
      	{
      		 $data['endtime'] = $endtime;
      		 $where .= ' and  creattime < '.strtotime($endtime.' 23:59:59').' ';
         	 $newlink .= '/endtime/'.$endtime; 
      	} 
      	$data['where'] = " id > 0 ".$where;
      	$link = IUrl::creatUrl('adminpage/card/module/cardlist'.$newlink);
      	$data['outlink'] =IUrl::creatUrl('adminpage/card/module/outcard/outtype/query'.$newlink);           
        Mysite::$app->setdata($data);    
   }
   function savecard()
	{ 
		$card_temp = trim(IReq::get('card_temp')); 
		$card_acount = intval(IReq::get('card_acount')); 
		$card_cost = intval(IReq::get('card_cost')); 
		if(empty($card_temp))$this->message('充值卡前缀不能为空');
		if($card_acount < 1)$this->message('充值卡充值卡数量不能小于1');
		if(!in_array($card_cost,array(10,50,100,200)))$this->message('充值卡金额不在限制范围内');
		$timenow = time();
		for($i=0;$i< $card_acount;$i++)
		{
			$data['card'] = $card_temp.$timenow.$i.rand(1000,9999);
			$data['card_password'] = substr(md5($data['card']),0,11);
			$data['status'] = 0;
			$data['cost'] = $card_cost;
			$data['creattime'] = $timenow;
			$this->mysql->insert(Mysite::$app->config['tablepre'].'card',$data); 
		}
		$this->success('保存成功');
	}
	function outcard(){ 
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
			  $where .= ' and id in('.$id.') ';
		}else{
		   $searchvalue = intval(IReq::get('searchvalue'));
		   $where .= $searchvalue > 0? ' and  cost = \''.$searchvalue.'\' ':'';
		   
		   $orderstatus = intval(IReq::get('orderstatus')); 
		   $where .= $orderstatus > 0?' and  status = \''.($orderstatus-1).'\' ':'';
		   
		   $starttime = trim(IReq::get('starttime')); 
		   $where .= !empty($starttime)? ' and  creattime > '.strtotime($starttime.' 00:00:01').' ':'';
		   
		   $endtime = trim(IReq::get('endtime')); 
		   $where .= !empty($endtime)? ' and  creattime < '.strtotime($endtime.' 23:59:59').' ':'';
		}		 
		
		 $outexcel = new phptoexcel();
		 $titledata = array('卡号','密码','充值金额');
		 $titlelabel = array('card','card_password','cost');  
		 $datalist = $this->mysql->getarr("select card,card_password,cost from ".Mysite::$app->config['tablepre']."card where id > 0 ".$where."   order by id desc  limit 0,2000 "); 
		 $outexcel->out($titledata,$titlelabel,$datalist,'','充指卡导出结果'); 
	}
	function juanlist(){ 
	$searchvalue = intval(IReq::get('searchvalue'));
		$orderstatus = intval(IReq::get('orderstatus'));
		$starttime = trim(IReq::get('starttime'));
		$endtime = trim(IReq::get('endtime'));
		
		$newlink = '';
		$where= '';
		$data['searchvalue'] = '';
		if($searchvalue > 0)//限制值
		{ 
				 $data['searchvalue'] = $searchvalue;
	   	   $where .= ' and  limitcost = \''.$searchvalue.'\' ';
	   	   $newlink .= '/searchvalue/'.$searchvalue; 
		}
		$data['orderstatus'] = '';
		if($orderstatus > 0)
		{
			   $chastatus = $orderstatus -1;
			   $data['orderstatus'] = $orderstatus;
	   	   $where .= ' and  status = \''.$chastatus.'\' ';
	   	   $newlink .= '/orderstatus/'.$orderstatus; 
		}
		$data['starttime'] = '';
		if(!empty($starttime))
		{
			 $data['starttime'] = $starttime;
			 $where .= ' and  creattime > '.strtotime($starttime.' 00:00:01').' ';
	   	 $newlink .= '/starttime/'.$starttime; 
		}
		$data['endtime'] = '';
		if(!empty($endtime))
		{
			 $data['endtime'] = $endtime;
			 $where .= ' and  creattime < '.strtotime($endtime.' 23:59:59').' ';
	   	 $newlink .= '/endtime/'.$endtime; 
		}
		  
		$data['where'] = ' id > 0 '.$where;
		$link = IUrl::creatUrl('adminpage/card/module/juanlist'.$newlink); 
		$data['outlink'] =IUrl::creatUrl('adminpage/card/outjuan/module/outtype/query'.$newlink);
		$data['nowtime'] = time();
		$data['statustype'] = array(
		          '1'=>'已绑定',
		          '2'=>'已使用',
		          '3'=>'无效'
		          );
		  Mysite::$app->setdata($data); 
	}
  function savejuan()
	{ 
		$card_temp = trim(IReq::get('card_temp')); //卡前缀
		$card_acount = intval(IReq::get('card_acount')); //卡数量
		$card_cost = intval(IReq::get('card_cost')); //优惠金额
		$limit_cost = intval(IReq::get('limit_cost')); //限制金额
		$card_time = intval(IReq::get('card_time'));//有效时间
		$name = trim(IReq::get('name'));
		if(empty($name)) $this->message('优惠劵名称不能为空');
		if(empty($card_temp))$this->message('优惠劵前缀不能为空');
		if($card_acount < 1)$this->message('优惠劵生成数量不能小于1'); 
		if($card_cost < 1) $this->message('优惠劵优惠金额不能小于1');
		if($limit_cost < 1) $this->message('优惠劵金额不能小于1');
		if($card_time < 1) $this->message('优惠劵有效时间不能小于1天'); 
		if($card_acount > 100) $this->message('每次生成优惠劵不能超过100条'); 
		$timenow = time();
		for($i=0;$i< $card_acount;$i++)
		{
			$data['card'] = $card_temp.$timenow.$i.rand(10,99);
			$data['card_password'] = substr(md5($data['card']),0,5);
			$data['status'] = 0;
			$data['creattime'] = $timenow;
			$data['cost'] = $card_cost;
			$data['limitcost'] = $limit_cost;
			$data['endtime'] = $timenow+$card_time*24*60*60;
			$data['name'] = $name;
			//uid ,  usetime username 
			$this->mysql->insert(Mysite::$app->config['tablepre'].'juan',$data); 
		}
		$this->success('保存成功');
	}
	function deljuan(){ 
   	 $id = IReq::get('id'); 
		 if(empty($id))  $this->message('优惠券ID不能为空'); 
		 $ids = is_array($id)? join(',',$id):$id;    
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'juan',"id in($ids)");  
	   $this->success('操作成功'); 
  }
  function outjuan()
	{ 
		 $this->checkadminlogin();
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
			  $where .= ' and id in('.$id.') ';
		}else{
		   $searchvalue = intval(IReq::get('searchvalue'));
		   $where .= $searchvalue > 0? ' and  limitcost = \''.$searchvalue.'\' ':'';
		   
		   $orderstatus = intval(IReq::get('orderstatus')); 
		   $where .= $orderstatus > 0?' and  status = \''.($orderstatus-1).'\' ':'';
		   
		   $starttime = trim(IReq::get('starttime')); 
		   $where .= !empty($starttime)? ' and  creattime > '.strtotime($starttime.' 00:00:01').' ':'';
		   
		   $endtime = trim(IReq::get('endtime')); 
		   $where .= !empty($endtime)? ' and  creattime > '.strtotime($endtime.' 23:59:59').' ':'';
		}		 
		
		 $outexcel = new phptoexcel();
		 $titledata = array('卡号','密码','购物车限制金额','优惠金');
		 $titlelabel = array('card','card_password','limitcost','cost');  
		 $datalist = $this->mysql->getarr("select card,card_password,limitcost,cost from ".Mysite::$app->config['tablepre']."juan where id > 0 ".$where."   order by id desc  limit 0,2000 "); 
		 $outexcel->out($titledata,$titlelabel,$datalist,'','消费卷导出结果'); 
		            	  
	}	  
	function savescore(){ 
   	 $siteinfo['commentscore'] = intval(IReq::get('commentscore'));
		$siteinfo['loginscore'] = intval(IReq::get('loginscore'));
		$siteinfo['regesterscore'] = intval(IReq::get('regesterscore')); 
		$siteinfo['commenttype'] =intval(IReq::get('commenttype'));
		$siteinfo['scoretocost'] =intval(IReq::get('scoretocost'));
		$siteinfo['maxdayscore'] =intval(IReq::get('maxdayscore')); 
		$siteinfo['commentday'] = intval(IReq::get('commentday')); 
		$config = new config('hopeconfig.php',hopedir);  
	  $config->write($siteinfo);
		$this->success('操作成功'); 
  }
  function savesendtask(){ 
  	$data['taskname'] = IReq::get('taskname'); 
		$data['tasktype'] = IReq::get('tasktype');
		$data['tasktype'] = empty($data['tasktype'])?1:$data['tasktype'];
		$data['taskusertype'] = IReq::get('taskusertype');
		$data['taskusertype'] = empty($data['taskusertype'])?1:$data['taskusertype'];
		$data['usertype'] = IReq::get('usertype');
		$data['userscore'] = IReq::get('userscore');
		$data['creattime_starttime'] = IReq::get('creattime_starttime');
		$data['creattime_endtime'] = IReq::get('creattime_endtime');
		$data['logintime_starttime'] = IReq::get('logintime_starttime');
		$data['logintime_endtime'] = IReq::get('logintime_endtime');
		$data['objcontent'] = IReq::get('objcontent');
		$data['content']  = IReq::get('content');
		  $link = IUrl::creatUrl('adminpage/card/module/sendtask'); 
           
	  if(empty($data['taskname']))  $this->message('群发标题不能为空',$link);
	  if(empty($data['content'])) $this->message('群发内容不能为空',$link);  
	  $miaoshu = $data['tasktype']==1?'群发邮件':'群发短信'; 
	  if($data['taskusertype'] ==1 )
	  { 
	  	$where = '';
	  	$miaoshu .= '根据条件：';
	  	if($data['usertype'] > 0) 
	  	{
	  		if($data['usertype'] == 1)
	  		{
	  			 $where .= " and usertype  = \'0\' ";
	  		}else{
	  			$where .= " and usertype  = \'1\' ";
	  		} 
	  		$miaoshu .= $data['usertype'] == 1?'普通会员':'商家会员';
	  	}
	  	if($data['userscore'] > 0)
	  	{
	  		$where .= " and score   > ".$data['userscore']." ";
	  		$miaoshu .=  '积分大于'.$data['userscore'];
	  	}
	  	if(!empty($data['creattime_starttime']))
	  	{
	  		 $limittime = strtotime($data['creattime_starttime'].' 00:00:00');
	  		 $where .= " and creattime   > ".$limittime." ";
	  		 $miaoshu .=  '注册时间大于'.$data['creattime_starttime'];
	  	}
	  	if(!empty($data['logintime_starttime']))
	  	{
	  		 $limittime = strtotime($data['creattime_endtime'].' 00:00:00');
	  		 $where .= " and creattime   < ".$limittime." ";
	  		 $miaoshu .=  '注册时间小于'.$data['creattime_endtime'];
	  	}
	  	if(!empty($data['logintime_starttime']))
	  	{
	  		 $limittime = strtotime($data['logintime_starttime'].' 00:00:00');
	  		 $where .= " and logintime   > ".$limittime." ";
	  		 $miaoshu .=  '最近登陆时间大于'.$data['logintime_starttime'];
	  	}
	  	if(!empty($data['logintime_endtime']))
	  	{
	  		 $limittime = strtotime($data['logintime_endtime'].' 00:00:00');
	  		 $where .= " and logintime   < ".$limittime." ";
	  		 $miaoshu .=  '最近登陆时间小于'.$data['logintime_endtime'];
	  	}
	  	$data['tasklimit'] = $where;
	  	$data['othercontent'] = $miaoshu; 
	  }else{ 
	  	if(empty($data['objcontent'])) $this->message('群发对象不能为空',$link);  
	  	$data['tasklimit'] = $data['objcontent'];
	  	$data['othercontent'] = $miaoshu.'指定对象:'.$data['objcontent'];
	  } 
	  unset($data['usertype']);
		unset($data['userscore']);
		unset($data['creattime_starttime']);
		unset($data['creattime_endtime']);
		unset($data['logintime_starttime']);
		unset($data['logintime_endtime']);
		unset($data['objcontent']);
	  $this->mysql->insert(Mysite::$app->config['tablepre'].'task',$data);
	  $link = IUrl::creatUrl('adminpage/card/module/sendtasklist'); 
		 $this->message('',$link);  
  }
  function starttask()
	{ 
		$taskid = IReq::get('taskid'); 
		$taskinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."task where id='".$taskid."'  "); 
		if(empty($taskinfo))
		{
			echo '任务不存在';
			exit;
		} 
		if($taskinfo['status'] > 1)
		{
			  echo '任务执行完毕,请关闭窗口';
			  exit;
		}
		$data = array('taskmiaoshu'=>'');
		//执行任务
	  if($taskinfo['tasktype'] == 1)
	  {
	  	$emailids = '';//邮箱ID集
	  	$newdata = array();//任务处理数据
	    $data['taskmiaoshu'] .= '邮件群发任务';
	  	if($taskinfo['taskusertype'] == 1)
	  	{
	  	//	echo '根据用户表筛选查询'.$taskinfo['tasklimit'];//tasklimit 
	  		//构造默认查询
	  		$where = ' where uid > '.$taskinfo['start_id'].'  '.$taskinfo['tasklimit']; //start_id;//起点UID
	  		
	  		$memberlist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."member ".$where." order by uid asc  limit 0, 10");  
	  		$startid =  $taskinfo['start_id'];
	  		if(count($memberlist) > 9)
	  		{
          	foreach($memberlist as $key=>$value)//循环取出邮件集 
          	{
          	  if(IValidate::email($value['email'])) {
          		 $emailids .= empty($emailids)?	$value['email']:','.$value['email'];
              }  
             $startid = $value['uid'];
             
          	}
	  		}	 
	  		if(count($memberlist) < 10)
	  		{
	  			//更新任务执行完毕
	  			$newdata['status'] = 2;
	  			 $data['taskmiaoshu'] .= ',执行完毕';
	  		}else{
	  			//
	  			$newdata['status'] = 1;
	  			$newdata['start_id'] = $startid;//更新下一页
	  		  $data['taskmiaoshu'] .= ',从用户表uid为'.$taskinfo['start_id'].'执行到uid为'.$startid;
	  		}		 
	  	  //更新任务
	  	}else{
	  		$tasklimit = $taskinfo['tasklimit'];
	  		$checklist = explode(',',$tasklimit);
	  		foreach($checklist as $key=>$value)
	  		{
	  			 if(IValidate::email($value))
	  			  {
	  			  	 $emailids .= empty($emailids)? $value:','.$value;
	  			  }  
	  		} 
	  		$newdata['status'] = 2;
	  		//更新任务
	  		$data['taskmiaoshu'] .= ',根据指定邮箱地址发送邮件完成';
	  	}
	  	//更新任务
	  	 $this->mysql->update(Mysite::$app->config['tablepre'].'task',$newdata,"id='".$taskid."'");  
	  	if(!empty($emailids))
	  	{
	       $smtp = new ISmtp(Mysite::$app->config['smpt'],25,Mysite::$app->config['emailname'],Mysite::$app->config['emailpwd'],false); 
       //$content = iconv('utf-8','gb2312',$content);
        $info = $smtp->send($emailids, Mysite::$app->config['emailname'],$taskinfo['taskname'],$taskinfo['content'] , "" , "HTML" , "" , "");
      } 
      $data['taskdata'] = $newdata;
      $data['showcontent'] = $emailids; 
     
	  }else{ 
	  	
	  	$emailids = '';//邮箱ID集
	  	$newdata = array();//任务处理数据
	    $data['taskmiaoshu'] .= '短信群发任务';
	  	if($taskinfo['taskusertype'] == 1)
	  	{
	  	//	echo '根据用户表筛选查询'.$taskinfo['tasklimit'];//tasklimit 
	  		//构造默认查询
	  		$where = ' where uid > '.$taskinfo['start_id'].'  '.$taskinfo['tasklimit']; //start_id;//起点UID
	  		
	  		$memberlist = $this->mysql->getarr("select * from ".Mysite::$app->config['tablepre']."member ".$where." order by uid asc  limit 0, 10");  
	  		$startid =  $taskinfo['start_id'];
	  		if(count($memberlist) > 9)
	  		{
          	foreach($memberlist as $key=>$value)//循环取出邮件集 
          	{
          	  if(IValidate::suremobi($value['phone'])) {
          		 $emailids .= empty($emailids)?	$value['phone']:','.$value['phone'];
              }  
             $startid = $value['uid'];
             
          	}
	  		}	 
	  		if(count($memberlist) < 10)
	  		{
	  			//更新任务执行完毕
	  			$newdata['status'] = 2;
	  			 $data['taskmiaoshu'] .= ',执行完毕';
	  		}else{
	  			//
	  			$newdata['status'] = 1;
	  			$newdata['start_id'] = $startid;//更新下一页
	  		  $data['taskmiaoshu'] .= ',从用户表uid为'.$taskinfo['start_id'].'执行到uid为'.$startid;
	  		}		 
	  	  //更新任务
	  	}else{
	  		$tasklimit = $taskinfo['tasklimit'];
	  		$checklist = explode(',',$tasklimit);
	  		foreach($checklist as $key=>$value)
	  		{
	  			 if(IValidate::suremobi($value))
	  			  {
	  			  	 $emailids .= empty($emailids)? $value:','.$value;  
	  			  }  
	  		} 
	  		$newdata['status'] = 2;
	  		//更新任务
	  		$data['taskmiaoshu'] .= ',根据指定手机号发送短信完成';
	  	}
	  	//更新任务
	  	$data['showcontent'] = $emailids; 
	   if(!empty($emailids))
	   {
        $sendmobile = new mobile();
        /*
		    $checklogin = $sendmobile->login(); 
		    if($checklogin == 'ok')
		    {
		    */
		   	    $emailids = explode(',',$emailids); 
	      	  $chekcinfo = $sendmobile->sendsms($emailids,$taskinfo['content']);
	      	  if($chekcinfo == 'ok')
	      	  {
	      	  	//发送成功
	      	  	 //更新任务
	     	     $this->mysql->update(Mysite::$app->config['tablepre'].'task',$newdata,"id='".$taskid."'"); 
	      	  }else{
	      	  	
	      	  	$data['taskmiaoshu'] .= ',短信发送失败,错误代码:'.$chekcinfo;
	      	  }
	      	  /*
	      	  $sendmobile->endsend();
	      }else{
	      	  $data['taskmiaoshu'] .= ',短信发送失败,错误代码:'.$checklogin;
	      }	*/
	    } 
		  
      $data['taskdata'] = $newdata;
      
	  } 
	 Mysite::$app->setdata($data);
	}
	function deltask()
	{ 
		 $id = IReq::get('id'); 
		 if(empty($id))  $this->message('任务ID不能为空'); 
		 $ids = is_array($id)? join(',',$id):$id; 
	   $this->mysql->delete(Mysite::$app->config['tablepre'].'task'," id in($ids) ");   
	   $this->success('操作成功');//(array('error'=>false)); 
	 }
	 
}



?>