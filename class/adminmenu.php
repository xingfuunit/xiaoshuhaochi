<?php

 class adminmenu
{
	private static $commonMenu = array('/system/default');
	public $current;
    //菜单的配制数据
  /*limitmenu 限制菜单代码 控制操作  */ 
  private static $limitmenu = array( 
          'siteset'=>'网站设置',
          'seo_setsave'=>'保存网站设置',
          'limitset'=>'网站限制',
          'savelimitset'=>'保存网站限制',
          'footlink' => '顶部导航管理',
          'savefootlink'=>'保存网站顶部导航', 
		      'toplink' => '网站底部导航条', 
		      'savetoplink'=>'保存网站底部导航',
		      'jflimitset'=>'积分设置',
					'manegelist'	=>	'管理员列表',
					'manegeadd'	=>	'添加管理员',
					'editmanege'=>'编辑管理员',
					'manegesave'=>'保存管理员',
					'delmanege'=>'删除管理员',
					'memberlist'	=>	'普通会员',
					'addmember'	=>	'添加普通会员',
					'editmember'=>'编辑普通会员',
					'membersave'=>'保存普通管理员',
					'delmember'=>'删除普通会员',
					'oauthlist'=>'第三方登录列表',
					'deloauth'=>'删除第三方会员',
					'shoplist'		=>	'店铺列表',  
					'shoplistw'=>'待审核店铺列表',
					'shoptype'		=>	'店铺类型列表', 
					'addshoptype'		=>	'店铺类型添加',
					'editshoptype' =>'编辑店铺类型',
					'saveshoptype'=>'保存店铺类型',
					'delshoptype'=>'删除店铺类型',
					'arealist' => '配送区域',
					'addarea' => '添加配送区域',
					'eidtarea'=>'编辑配送区域',
					'savearea'=>'保存配送区域',  
					'cxsign'=>'促销标签列表',
					'addcxsign'=>'添加促销标签',	
					'editcxsign'=>'编辑促销标签',				
					'orderlist'		=>	'订单列表',
					'ordertotal'		=>	'订单统计',  
					'markettj'=>'商城统计',
					'marketorder'=>'商城订单',
					'orderyjin'=>'商家结算',					
					'commentlist'=>'评价列表',
					'delcommlist'=>'删除评价',
					'asklist'=>'网站留言',
					'delask'=>'删除留言',
					'askshoplist'=>'店铺留言',					
					'singlelist' => '单页列表',
					'addsingle' => '单页添加',
					'savesingle'=>'保存单页',
					'delsingle'=>'删除单页',
					'adv' =>'广告列表',
					'addadv'=>'添加广告',
					'advtype' =>'广告类型',					
				  'giftlist' => '礼品列表',
				  'addgift' => '添加礼品',
				  'gifttype'=>'礼品分类',
				  'addgifttype'=>'礼品分类添加',
				  'giftlog'=>'兑换记录',					
					'emailset' => '邮箱设置', 
					'smsset' => '短信设置',  
					'sendtasklist' => '群发任务列表',
					'sendtask' => '添加群发任务',
					'cardlist' => '充值卡列表',
					'addcard' => '添加充值卡',
					'juanlist' => '优惠劵列表',
					'addjuan' => '添加优惠劵',		
					'excomm'=>'评价管理2',
					'pmes'=>'私信管理',			
					'loginlist' => '登录接口列表',
					'paylist'=>'支付接口列表', 
					'othertpl'=>'短信/邮件模板设置', 
					'ordertodayw'		=>	'今日待审核订单',
					'ordertoday'		=>	'今日已审核订单',
					'basedata'  => '数据库备份',
					'rebkdata'=>'数据库还原',
					'market'=>'超市商品列表',
					'addmarket'=>'添加超市商品',
					'editmarket'=>'编辑超市商品',
					'delmarket'=>'删除超市商品',
					'addmarkettype'=>'添加超市商品分类',
					'delmarkettype'=>'删除超市商品分类',
					'listmarkettype'=>'超市商品列表',
					'friendlink'=>'友情连接', 
					'shoptopatt'=>'排行分类',
					'wxset'=>'微信基本设置',
					'wxback'=>'微信自动回复',
					'printlog'=>'无线打印日志',
  );
    /*$menu 默认所有菜单*/
	private static $menu = array( 
				'网站设置'=>array(
					'/admin/index' => '网站信息',
					'/admin/siteset' => '网站设置', 
					'/admin/limitset'=> '网站限制',
					'/admin/sitebk'  => '网站背景水印设置',
					'/admin/footlink' => '顶部导航管理',
					'/admin/toplink' => '网站底部导航条',
					'/admin/jflimitset'=>'积分设置',
					'/admin/errlog' => '错误日志',
				),
				'会员管理'=>array(
			  	'/admin/manegelist'	=>	'管理员列表',
					'/admin/manegeadd'	=>	'添加管理员',
					'/admin/memberlist'	=>	'普通会员',
					'/admin/memberslist'=>'商家会员',
					'/admin/addmember'	=>	'添加会员',
					'/admin/oauthlist'  =>  '第三方登录列表',
				),
				'店铺管理'=>array(
					'/admin/shoplist'		=>	'店铺列表', 
					'/admin/shoplistw'  =>'待审核店铺',
					'/admin/addshop'		=>	'店铺添加', 
					'/admin/shoptype'		=>	'模型设置', 
					'/admin/arealist' => '配送区域',
					'/admin/addarea' => '添加配送区域', 
					'/admin/cxsign'=>'促销图标列表',
					'/admin/addcxsign'=>'添加促销图标',
					'/admin/orderbz'=>'订单备注标记', 
					'/admin/shoptopatt'=>'订台排行数据',
				),
				
				'超市管理'=>array( 
				  '/admin/market'=>'超市商品列表', 
				  '/admin/addmarket'=>'添加超市商品',
				  '/admin/listmarkettype'=>'超市商品分类',
				  '/admin/setmarket'=>'超市设置',
				), 
				'订单管理'=>array(
				  '/admin/orderlist'		=>	'所有订单',
					'/admin/ordertodayw'		=>	'今日待审核订单',
					'/admin/ordertoday'		=>	'今日已审核订单',
					'/admin/ordertotal'		=>	'订单统计', 
					'/admin/orderyjin'   =>'商家结算',
					'/admin/markettj'=>'商城统计',
					'/admin/marketorder'=>'商城订单',
					'/admin/printlog'=>'无线打印日志',
				), 
				'微信管理'=>array(
				  '/admin/wxset'=>'微信设置', 
				  '/admin/wxmenu'=>'微信菜单',
				  '/admin/wxback'=>'微信自动回复',
				  '/admin/wxuser'=>'微信用户列表',
			    
				),
				'内容管理'=>array( 
					'/admin/newslist' => '新闻列表',
					'/admin/addnews' => '添加新闻',
					'/admin/newstype'=>'新闻分类',
					'/admin/addnewstype' =>'添加新闻分类', 
					'/admin/singlelist' => '单页列表', 
					'/admin/addsingle' => '单页添加',
					'/admin/adv' =>'广告列表',
					'/admin/addadv'=>'添加广告',
					'/admin/advtype' =>'广告类型',
						'/admin/commentlist'=>'评价列表',
				 	  '/admin/asklist'=>'网站留言',
				  	'/admin/askshoplist'=>'店铺留言',
				    '/admin/pmes'=>'私信管理',
				), 
				'礼品管理'=>array(
				  '/admin/giftlist' => '礼品列表',
				  '/admin/addgift' => '添加礼品',
				  '/admin/gifttype'=>'礼品分类',
				  '/admin/addgifttype'=>'礼品分类添加',
				  '/admin/giftlog'=>'兑换记录',
				),
				'营销管理'=>array( 
					'/admin/emailset' => '邮箱设置', 
					'/admin/smsset' => '短信设置',  
					'/admin/sendtasklist' => '群发任务列表',
					'/admin/sendtask' => '添加群发任务',
					'/admin/cardlist' => '充值卡列表',
					'/admin/addcard' => '添加充值卡',
					'/admin/juanlist' => '优惠劵列表',
					'/admin/addjuan' => '添加优惠劵',
				),
				'其他管理'=>array( 
					'/admin/loginlist' => '登录接口列表',
					'/admin/paylist'=>'支付接口列表',
					'/admin/othertpl'=>'短信/邮件模板设置',
					//'/admin/friendlink'=>'友情连接',
					'/admin/cleartpl'=>'清理缓存文件', 
					'/admin/basedata'=>'数据库备份',
					'/admin/rebkdata'=>'数据库还原',
				) 
	); 
	public static function submenu($limitright)
	{ 
		$controllerObj = Mysite::$app->getController();
		$controller = $controllerObj->getcontroller();
		$action =  $controllerObj->getaction();
		$currentlink = '/'.$controller.'/'.$action;
		$vcurrent = '/'.$controller.'/'; 
		$link = IUrl::creatUrl('/other/ucenter'); 
		$linkarray = array();
		$is_find = false;
		
		$alllimit = self::$limitmenu;  
		$doarray = array_keys($alllimit);//所有限制权限
		$limitarray = explode(',',$limitright);//拥有权限
		
		
		foreach(self::$menu as $key => $value)
		{
			$temsublink = array();
			$defalturl = '';
			$i = 0;
			 
		  foreach($value as $linkurl => $linkname)
			{
				//panduan linkurl 是否存在  limitright;
				//不存在continue;
				$checkrightname = explode('/',$linkurl); 
				if(in_array($checkrightname[2],$doarray))
				{
					 if(!in_array($checkrightname[2],$limitarray))
				   {
					    continue; 
			     }
			  }  
				$tempone = array();
				$tempone['is_curent'] = false;
				if($currentlink == $linkurl)
				{
					$tempone['is_curent'] = true;
					$is_find = true;
				}
				$linkurl = substr($linkurl,1,strlen($linkurl));
				$tempone['urls'] = IUrl::creatUrl($linkurl);
				
				$tempone['name'] =$linkname;
				$temsublink[] = $tempone;
				if($i == 0)
				{
					$defalturl = $tempone['urls'];
				}
				$i++;
				
			}
			if(empty($defalturl))
			{
				 continue; 
		  }
			$tempuplink = array();
			$tempuolink['is_curent'] = false;
			if($is_find == true)
			{
				$tempuolink['is_curent'] = true;
			}
			//continue;
			
			$tempuolink['urls'] = $defalturl;
			$tempuolink['name'] =$key; 
			$tempuolink['det'] = $temsublink;
			$linkarray[] = $tempuolink;
		  $is_find = false;
		} 
	 
		return $linkarray;
	}
	
	public function getshow()
	{
		
	}	
	public static function getlimit()
	{
		return self::$limitmenu; 
	}
	public static function checkright($mylimit)
	{
		
		$alllimit = self::$limitmenu; 
		$doarray = array_keys($alllimit); //获取所有键值
		$controllerObj = Mysite::$app->getController();
		$controller = $controllerObj->getcontroller();
		$action =  $controllerObj->getaction();
		if(in_array($action,$doarray))
		{
			 $checkmy = explode(',',$mylimit);
			 if(in_array($action,$checkmy))
			 {
			 	  return true;
			 }	
			 return false;
		}else{
			return true;
		}	 
	}
	
}

?>