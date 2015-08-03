<?php 

/**
 * @class Cart
 * @brief 天气预报
 */
class weather
{
	private $weatherurl = 'http://i.tianqi.com/index.php?c=code&id=12&bgc=%230070C0&icon=1&num=5'; 
	private $weathercontent = '';
  function __construct()
	{
	 $info = file_get_contents($this->weatherurl); 
	 //$this->weathercontent =  mb_convert_encoding($info, "UTF-8", "GBK"); 

	 $this->weathercontent = iconv("GBK", "UTF-8", $info); 
	}
	function weatherdata()
	{
		 
		  preg_match_all("/title=\"(.*)\"/i",$this->weathercontent,$weatherinfo);
      preg_match_all("/<div (.*)<\/div>/",$this->weathercontent,$infoa);

    $weather = '';
    if(isset($weatherinfo[0]) && count($weatherinfo[0]) > 5)
    { 
    	if(isset($infoa[0]) && count($infoa[0])>12)
      { 
      	 $weather['city'] = $infoa[0][0]; 
      	 $weather['today']['img'] = $infoa[0][2];
      	 $weather['today']['day'] = $infoa[0][3];
      	 $weather['today']['wendu'] = $infoa[0][4];
      	 $qihou = explode('"',$weatherinfo[0][2]);  
      	 $weather['today']['tiqi'] = $qihou[1] ;
      	 
      	  $weather['tom']['img'] = $infoa[0][5];
      	 $weather['tom']['day'] = $infoa[0][6];
      	 $weather['tom']['wendu'] = $infoa[0][7];
      	 $qihou = explode('"',$weatherinfo[0][3]);  
      	 $weather['tom']['tiqi'] = $qihou[1] ;
      	 
      	  $weather['tomtom']['img'] = $infoa[0][8];
      	 $weather['tomtom']['day'] = $infoa[0][9];
      	 $weather['tomtom']['wendu'] = $infoa[0][10];
      	 $qihou = explode('"',$weatherinfo[0][4]);  
      	 $weather['tomtom']['tiqi'] = $qihou[1] ;
      }
    } 
    return $weather;
	}
 
	

}
?>