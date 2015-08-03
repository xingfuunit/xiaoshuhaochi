<?php
/*
 * 采用单例模式，防止传输多个XML
 */
 define('hopedir', dirname(__FILE__).DIRECTORY_SEPARATOR);  
 $Mconfig = include(hopedir."config/hopeconfig.php"); 
 date_default_timezone_set("Asia/Hong_Kong"); 
 include(hopedir.'/lib/function.php'); 
 include(hopedir.'/wx/mysql_class.php'); 
 header("Content-Type:text/html;charset=utf-8"); 
 $Printer = NetPrinterClass::getInstance(); 
 $mysql = new mysql_class();
 logwrite('答应测试');
if (isset($Printer->params['id']) && isset($Printer->params['sta']))  // isset:检测变量是否设置 返回打印结果
{
	  if($Printer->checkinput()){
	  	
	    //  echo 'sign right';
	    //  $this->mysql->update(Mysite::$app->config['tablepre'].'wxback',$data,"id='".$id."'"); 
	       $orderid =  $Printer->params['id'] ;//    usr=355841021188485&id=0003&ord=2&sta=0&sgn=E04A80BE97167584E7452FF54865171E
	    if($Printer->params['sta']   == 0){
	    	if(!empty($orderid)){
	    		$data['is_print'] = 1;
	    	    $mysql->update($Mconfig['tablepre'].'order',$data,"id='".$orderid."'"); 
	    	}
	    }else{
	    	$data['orderid'] = $orderid;
	    	$data['status'] =  $Printer->params['sta'];
	    	$mysql->insert($Mconfig['tablepre'].'printlog',$data); 
	    }
	  }else{
	  	echo 'sign wrong';
	  	
	  } 
}
else// if(isset($Printer->params['usr']) && isset($Printer->params['ord']) && isset($Printer->params['sgn'])) // 传输需要打印的内容
{    
	 //usr 
	 
	 if(isset($Printer->params['usr']) && !empty($Printer->params['usr'])){  
	 	  $nowtime = strtotime(date('Y-m-d',time()));//当天最小时间
	 	  $maxtime = strtotime(date('Y-m-d',time()).' 23:59:59');
	 	  $shopinfo =  $mysql->select_one("select id,uid  from ".$Mconfig['tablepre']."shop  where  IMEI = '".$Printer->params['usr']."'");
	 	  if(!empty($shopinfo)){//当店铺不为空时
	 	  	  //获取订单
	 	  	 
	 	  	  $orderlist =  $mysql->select_one("select *  from ".$Mconfig['tablepre']."order   where  shopid = '".$shopinfo['id']."' and status > 0 and status < 3 and is_print = 0 and posttime > ".$nowtime." and posttime < ".$maxtime."");
	 	  	  if(!empty($orderlist)){
	 	  	  	$orderdet = $mysql->getarr("select *  from ".$Mconfig['tablepre']."orderdet where order_id = ".$orderlist['id']."");
	 	  	  	$contents = '订单编码:'.$orderlist['dno'].'%%';
	 	  	  	$contents .= '下单时间:'.date('Y-m-d H:i:s',$orderlist['addtime']).'%%配送时间:'.date('Y-m-d H:i:s',$orderlist['posttime']).'%%';
	 	  	  	$contents .= '下单人:'.$orderlist['buyername'].'%%电话:'.$orderlist['buyerphone'].''.'%%'; 
	 	  	    $contents .= '下单地址:'.$orderlist['buyeraddress'].'%%';
	 	  	  	if(!empty($orderlist['content'])){
	 	  	  	 $contents .= '订单备注:'.$orderlist['content'].'%%';
	 	  	  	}
	 	  	  	$paycontent = $orderlist['paystatus'] == 0?'未支付':'已支付';
	 	  	    $contents .= '订单总价'.$orderlist['allcost'].'元,'.$paycontent.'%%';
	 	  	    foreach($orderdet as $key=>$value){
	 	  	        $contents .= $value['goodsname'].'('.$value['goodscount'].'份)%%';
	 	  	    }
	 	  	   // print_r($contents);
	 	  	    //contents
	 	  	   $contents=  mb_convert_encoding($contents,'GB2312','UTF-8');
	 	  	   echo $Printer->setId($orderlist['id']) // 设置ID
            ->setTime( time()+28800) // 设置时间
            ->setContent($contents) // 设置content
            ->setSetting("101:6|105:0") // 设置打印机参数等数据，具体参考协议部分文件，建议非必要不要设置，也可以为空  101:6 行间距  102:30列间距默认30 
            ->display();// 输出
	 	  	  	 
	 	  	  } 
	 	  	  
	 	  	  
	 	  }
	 	  
	 	  
	 	  
   
   }
}

//md5(usr+id+ord+sta)
class NetPrinterClass {
    
    private static $_instance;
    
    private $time;
    private $content = "";
    private $setting = "";
    private $id = "";
    
    public $params = array();
    
    private function __construct() {
        $this->getParams();        
        $this->time = date('Y-m-d H:i:s');
    }
    
    private function __clone() {}  //覆盖__clone()方法，禁止克隆    
    
    public static function getInstance()    
    {   
        if(! (self::$_instance instanceof self) ) {    
            self::$_instance = new self();    
        }    
        
        /*
         * 验证是否为正常连接
         */
        /*
        if (!isset(self::$_instance->params['usr'])
                && !isset(self::$_instance->params['sgn'])
                && md5(self::$_instance->params['usr']) != self::$_instance->params['sgn'])
        {
            return false;
        }
        */
        return self::$_instance;    
    }    
    /*
     * 打印终端请求平台下发数据
     * 
     */
    /**
      +----------------------------------------------------------
     * 设置时间 时间不能小于2013-08-01 00:00:00 同时 时间不能于大于2030-08-01 00:00:00
      +----------------------------------------------------------
     * @param string $timestamp 时间戳
      +----------------------------------------------------------
     */
    public function setTime( $timestamp )
    {
        if ($timestamp > 1375315200 && $timestamp < 1911772800) {
            $this->time = date('Y-m-d H:i:s', $timestamp);
        }
        return $this;
    }
    
    
    /**
      +----------------------------------------------------------
     * 写入内容
      +----------------------------------------------------------
     * @param string $content 内容
      +----------------------------------------------------------
     */
    public function setContent( $content )
    {
        $this->content = strip_tags($content);
        return $this;
    }

    /**
      +----------------------------------------------------------
     * 设置打印机参数
      +----------------------------------------------------------
     * @param array $setting 设置 key(响应码) => value(内容)
      +----------------------------------------------------------
     */
    public function setSetting( $setting )  
    {
        if (!empty($setting) && is_array($setting)) {
            $this->setting = "";
            foreach ($setting as $k => $v) {
                if (is_numeric($k)) 
                {
                    $this->setting .= $k.":".strip_tags($v)."|";
                }
            }
        }
        else
        {
            $this->setting = strip_tags($setting);
        }
        return $this;
    }

    /**
      +----------------------------------------------------------
     * 设置ID
      +----------------------------------------------------------
     * @param string $id id SYD123456789
      +----------------------------------------------------------
     */
    public function setId( $id )  
    {
        $this->id = strip_tags($id);        
        return $this;
    }
    
    
    /**
      +----------------------------------------------------------
     * 传输内容是否大于最大内容长度 不能多于2000字节
      +----------------------------------------------------------
     * @return boolean  
      +----------------------------------------------------------
     */
    public function maxLength($str, $length = 2000)
    {
        if (mb_strlen($str) > 2000) 
        {
            return false;
        }
        return true;
    }

    /**
      +----------------------------------------------------------
     * 生成传输用XML 不能多于2000字节
      +----------------------------------------------------------
     * @return string xml 
      +----------------------------------------------------------
     */
    public function display() 
    {
        
        $xml = '<?xml version="1.0" encoding="GBK"?>';
        $xml .= "<r>";
        
        $xml .= "<id>".$this->id."</id>";
        $xml .= "<time>".$this->time."</time>";
        $xml .= "<content>".$this->content."</content>";
        $xml .= "<setting>".$this->setting."</setting>";
        
        $xml .= "</r>";
        
        if ($this->maxLength($xml)) {
            /*echo "<script>"; 
				echo "location.href='http://www.bookkilled.com/todo.php'"; 
				echo "</script>";*/
			header("Content-type: text/xml");
				 
            return $xml;
        }
        return false;
    }
    
    
     /**
      +----------------------------------------------------------
     * 解析返回参数
      +----------------------------------------------------------
     * @return array  
      +----------------------------------------------------------
     */
    public function getParams() 
    {
        $arr = array();
        
        if (isset($_REQUEST['usr'])) $arr['usr'] = $_REQUEST['usr']; // 用户IMEI号码
        if (isset($_REQUEST['ord'])) $arr['ord'] = $_REQUEST['ord']; // 本次交易的序列号，不得重复
        if (isset($_REQUEST['sgn'])) $arr['sgn'] = $_REQUEST['sgn']; // 交易签名。 MD5(usr)转大写
        
        if (isset($_REQUEST['id'])) $arr['id'] = $_REQUEST['id']; // 平台下发打印数据的ID号
        if (isset($_REQUEST['sta'])) $arr['sta'] = $_REQUEST['sta']; // 打印机状态（0为打印成功， 1为过热，3为缺纸卡纸等）
        
        $this->params = $arr;
        
        return $arr;
    }
    public function checkinput(){
    	$checkstr =strtoupper(md5($this->params['usr'].$this->params['id'].$this->params['ord'].$this->params['sta']));//   md5(usr+id+ord+sta)转大写
    	if($checkstr == $this->params['sgn']){
    	  return true;
    	}
    	return false;
    }
}
?>
