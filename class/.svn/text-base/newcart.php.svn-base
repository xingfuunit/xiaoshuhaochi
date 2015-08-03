<?php 

/**
 * @class Cart
 * @brief 购物车类库
 */
class newCart
{
	/*购物车cookie存储结构
	* array [goods]=>array(商品主键=>数量) , [product]=>array( 货品主键=>数量 )
	*/
	private $cartStruct = array( 'goods' => array());

	/*购物车返还结构
	* [id]   :array  商品id值;
	* [count]:int    商品数量;
	* [info] :array  商品信息 [goods]=>array( ['id']=>商品ID , ['data'] => array( [商品ID]=>array ( [sell_price]价格, [count]购物车中此商品的数量 ,[type]类型goods,product ,[goods_id]商品ID值 ) ) ) , [product]=>array( 同上 ) , [count]购物车商品和货品数量 , [sum]商品和货品总额 ;
	* [sum]  :int    商品总价格;
	*/
	private $cartExeStruct = array('goods' => array('id' => array(), 'data' => array() ) , 'count' => 0,'sum' => 0);

	//购物车名字前缀
	private $cartName    = 'shoppingnewcart';

	//购物车中最多容纳的数量
	private $maxCount    = 100;

	//错误信息
	private $error       = '';

	//购物车的存储方式
	private $saveType    = 'cookie';

	//构造函数
	function __construct()
	{
		$cartInfo = $this->getMyCartStruct();
		$this->setMyCart($cartInfo);
	}

	//获取新加入购物车的数据
	public function getUpdateCartData($cartInfo,$gid,$num,$type)
	{
		$gid = intval($gid);
		$num = intval($num);
		 
		//获取基本的商品数据
		$goodsRow = $this->getGoodInfo($gid,$type);
		if($goodsRow)
		{
			//购物车中已经存在此类商品
			if(isset($cartInfo[$type][$gid]))
			{
				if($goodsRow['shuliang'] < $cartInfo[$type][$gid] + $num)
				{
					$this->error = '该商品库存不足';
					return false;
				}
				$cartInfo[$type][$gid] += $num;
			}

			//购物车中不存在此类商品
			else
			{
				if($goodsRow['shuliang'] < $num)
				{
					$this->error = '该商品库存不足';
					return false;
				}
				$cartInfo[$type][$gid] = $num;
			}

			return $cartInfo;
		}
		else
		{
			$this->error = '该商品库存不足';
			return false;
		}
	}

	/**
	 * @brief 将商品或者货品加入购物车
	 * @param $gid  商品或者货品ID值
	 * @param $num  购买数量
	 * @param $type 加入类型 goods商品; product:货品;
	 */
	public function add($gid, $num = 1 ,$type = 'goods')
	{
		//购物车中已经存在此商品
		$cartInfo = $this->getMyCartStruct();

		if($this->getCartSort($cartInfo) >= $this->maxCount)
		{
			$this->error = '加入购物车失败,购物车中最多只能容纳'.$this->maxCount.'种商品';
			return false;
		}
		else
		{
			$cartInfo = $this->getUpdateCartData($cartInfo,$gid,$num,$type);
			if($cartInfo === false)
			{
				return false;
			}
			else
			{
				return $this->setMyCart($cartInfo);
			}
		}
	}

	//计算商品的种类
	private function getCartSort($mycart)
	{
		$sumSort   = 0;
		$sortArray = array('goods');

		foreach($sortArray as $sort)
		{
			$sumSort += count($mycart[$sort]);
		}
		return $sumSort;
	}

	//删除商品
	public function del($gid , $type = 'goods')
	{
		$cartInfo = $this->getMyCartStruct();
		 

		//删除商品数据
		if(isset($cartInfo[$type][$gid]))
		{
			unset($cartInfo[$type][$gid]);
			$this->setMyCart($cartInfo);
		}
		else
		{
			$this->error = '购物车中没有此商品';
			return false;
		}
	}

	//根据 $gid 获取商品信息
	private function getGoodInfo($gid, $type = 'goods')
	{
		$dataArray = array();
 
		 
		 //    typeid 商品类型 name 商品名称 count 商品数量 cost 商品价格 img 图片地址 point 评分 sellcount 销售数量 shopid 店铺ID uid  signid
		 $mysql = new mysql_class;  
			$dataArray = $mysql->select_one("select id,name,count as shuliang,cost,img,shopid,sellcount from ".Mysite::$app->config['tablepre']."goods where id=".$gid."  ");  
			$dataArray['id'] = $dataArray['id'];
		 

		return $dataArray;
	}

	//获取当前购物车的结构化数据JSON
	private function getMyCartStruct()
	{
		$cartName  = $this->getCartName();
		if($this->saveType == 'session')
		{
			$cartValue = ISession::get($cartName);
		}
		else
		{
			$cartValue = ICookie::get($cartName);
		}

		if($cartValue == null)
		{
			return $this->cartStruct;
		}
		else
		{
			$cartValue = JSON::decode(str_replace(array('&','$'),array('"',','),$cartValue));
			return $cartValue;
		}
	}

	//获取当前购物车信息
	public function getMyCart()
	{
		$cartName  = $this->getCartName();
		if($this->saveType == 'session')
		{
			$cartValue = ISession::get($cartName);
		}
		else
		{
			$cartValue = ICookie::get($cartName);
		}

		if($cartValue == null)
		{
			return $this->cartExeStruct;
		}
		else
		{
			$cartValue = JSON::decode(str_replace(array('&','$'),array('"',','),$cartValue));
			if(is_array($cartValue))
			{
				return $this->cartFormat($cartValue);
			}
			else
			{
				return $this->cartExeStruct;
			}
		}
	}

	//清空购物车
	public function clear()
	{
		$cartName = $this->getCartName();
		if($this->saveType == 'session')
		{
			ISession::clear($cartName);
		}
		else
		{
			ICookie::clear($cartName);
		}
	}

	//写入购物车
	public function setMyCart($goodsInfo)
	{
		$goodsInfo = str_replace(array('"',','),array('&','$'),JSON::encode($goodsInfo));
		$cartName = $this->getCartName();
		if($this->saveType == 'session')
		{
			ISession::set($cartName,$goodsInfo);
		}
		else
		{
			ICookie::set($cartName,$goodsInfo,'7200');
		}
		return true;
	}

	/**
	 * @brief  把cookie的结构转化成为程序所用的数据结构
	 * @param  $cartValue 购物车cookie存储结构
	 * @return array : [goods]=>array( ['id']=>商品ID , ['data'] => array( [商品ID]=>array ([name]商品名称 , [list_img]图片地址 , [sell_price]价格, [count]购物车中此商品的数量 ,[type]类型goods,product , [goods_id]商品ID值 ) ) ) , [product]=>array( 同上 ) , [count]购物车商品和货品数量 , [sum]商品和货品总额 ;
	 */
	private function cartFormat($cartValue)
	{
		//初始化结果
		$result = $this->cartExeStruct;
		 
		$goodsIdArray = array();

		if(isset($cartValue['goods']) && $cartValue['goods'])
		{
			$goodsIdArray = array_keys($cartValue['goods']);
			$result['goods']['id'] = $goodsIdArray;
			foreach($goodsIdArray as $gid)
			{
				$result['goods']['data'][$gid] = array(
					'id'       => $gid,
					'type'     => 'goods',
					'goods_id' => $gid,
					'count'    => $cartValue['goods'][$gid],
				);

				//购物车中的种类数量累加
				$result['count'] += $cartValue['goods'][$gid];
			}
		}

	 

		if($goodsIdArray)
		{
			$goodsArray = array();
       $mysql = new mysql_class;  
			$goodsData = $mysql->getarr("select id,name,count as shuliang,cost,img,shopid,sellcount  from ".Mysite::$app->config['tablepre']."goods where id in (".join(",",$goodsIdArray).")  order by shopid asc  ");
			
		 
			foreach($goodsData as $goodsVal)
			{
				$goodsArray[$goodsVal['id']] = $goodsVal;
			}
      $tempshopids = array();
			foreach($result['goods']['data'] as $key => $val)
			{
				$result['goods']['data'][$key]['img']   = $goodsArray[$val['goods_id']]['img'];
				$result['goods']['data'][$key]['name']       = $goodsArray[$val['goods_id']]['name'];
				$result['goods']['data'][$key]['cost'] = $goodsArray[$val['goods_id']]['cost'];
        $result['goods']['data'][$key]['shopid'] = $goodsArray[$val['goods_id']]['shopid'];
        $result['goods']['data'][$key]['store_num'] = $goodsArray[$val['goods_id']]['shuliang'];
        $result['goods']['data'][$key]['sellcount'] = $goodsArray[$val['goods_id']]['sellcount'];
				//购物车中的金额累加
				$tempshopids[] = $goodsArray[$val['goods_id']]['shopid'];
				$result['sum']   += $goodsArray[$val['goods_id']]['cost'] * $val['count'];
			}
			$result['shopids'] = array_unique($tempshopids);  
			$result['shopinfo'] = $mysql->getarr("select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where id in (".join(",",$result['shopids']).")  ");  
		}
		return $result;
	}

	//[私有]获取购物车名字
	private function getCartName()
	{
		return $this->cartName;
	}

	//获取错误信息
	public function getError()
	{
		return $this->error;
	}
}
?>