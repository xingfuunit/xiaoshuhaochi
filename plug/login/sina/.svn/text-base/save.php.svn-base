<?php  
  $savedata['appid'] =  IReq::get('appid');
  $savedata['appkey'] =  IReq::get('appkey');
  $savedata['callback'] = IUrl::creatUrl('member/otherlogin/logintype/sina'); 
  
      $configData = var_export($savedata,true);
		  $configStr = "<?php return {$configData}?>"; 
  $incFile = fopen($logindir."/".$idtype."/config/config.php","w+") or die("请设置plug\login\qq\API\comm\inc.php的权限为777");
  
  if(fwrite($incFile, $configStr)){
       /// echo "<meta charset='utf-8' />";
       //  echo "配置成功";
        $taskinfo =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."otherlogin where loginname='".$idtype."'  "); 
        
        	  include_once($logindir.'/'.$idtype.'/set.php');
        	  $ssdata['loginname'] = $idtype;
        	  $ssdata['logindesc'] = $setinfo['name']; 
        	  $ssdata['logourl'] = Mysite::$app->config['siteurl'].'/plug/login/'.$idtype.'/images/'.$setinfo['logourl']; 
        	  $ssdata['temp'] = json_encode($savedata);
        	  if(empty($taskinfo))
        {
        	 unset($ssdata['addmeta']);
  	      	$this->mysql->insert(Mysite::$app->config['tablepre'].'otherlogin',$ssdata);  //写消息表	 
        }	else{
        	 unset($ssdata['addmeta']);
        	   unset($ssdata['loginname']);
        	 	 $this->mysql->update(Mysite::$app->config['tablepre'].'otherlogin',$ssdata,"loginname='".$idtype."'"); 
        }
        echo "<meta charset='utf-8' />";
         echo "<script>parent.uploadsucess('配置成功');</script>";   
         exit;
        	
  }else{
        echo "Error";
  }  
   
?>