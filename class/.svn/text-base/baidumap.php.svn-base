<?php 

/**
 * @class baidumap  百度地图
 
 
 */
class baidumap
{
	 private $mapkey;//百度地图ak 
	 private $mapsecret;//百度地图 secret 
   private $mapurl = 'http://api.map.baidu.com';//百度地图的连接
   private $shorturl;
   private $param;//参数数组 
	 
	  function __construct(){ 	 
	  	 $this->mapkey =  Mysite::$app->config['baidumapkey'];  
	  	 $this->mapsecret =  Mysite::$app->config['baidumapsecret'];  
	  
	  	 $this->shorturl = '';
    } 
   function intparam(){//初始化参数
   	   $this->param = array();
   	   $this->param['ak'] = $this->mapkey;
   }
   public function caculateAKSN(){  
       $querystring_arrays = $this->param;
       ksort($querystring_arrays);   
       $querystring = http_build_query($querystring_arrays);  
       $this->param['sn'] = md5(urlencode($this->shorturl.'?'.$querystring.$this->mapsecret));   
   }
   function Iptoposition($coor='bd09ll'){  //样式   若需要返回百度墨卡托坐标  则初始化值时候  new baidumap(''); new baidumap() 则返回百度百度经纬度坐标
   	   $this->shorturl = '/location/ip'; 
   	   $this->intparam();//初始化参数
   	   $this->param['ip'] = IClient::getIp(); 
   	  // $this->caculateAKSN();//获取SN 不要签名
   	   ksort($this->param);
   	   $this->param['coor'] = $coor;//设置返坐标 
   	   $info = $this->dolink(); 
   	   if(isset($info['status'])){
   	   	if($info['status'] == 0){
   	   		return  $info['content']['address_detail']['city'];
   	   	 }else{
   	   	return '';
   	   	}
   	   }else{
   	    return '';
   	  }
   	    
   }
   function dolink(){
   	   $link = $this->mapurl.$this->shorturl.'?'.http_build_query($this->param); 
   	   
   	 	 $info = $this->vpost($link);  
   	 	 $info = json_decode($info,true);
   	 	 return $info;
   }
   
   //post提交数据
   //$post_string = "app=request&version=beta"; 
   function vpost($url,$data='',$cookie=''){ // 模拟提交数据函数
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
   // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    curl_setopt($curl, CURLOPT_REFERER,'');// 设置Referer
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    if (curl_errno($curl)) {
       echo 'Errno'.curl_error($curl);//捕抓异常
    }
    curl_close($curl); // 关闭CURL会话
    return $tmpInfo; // 返回数据
  }

   

}


?>