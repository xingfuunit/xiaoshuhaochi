<?php 

/**
 * @class phptoexcel
 * @brief 数据内容导出成excel文件.xls文件类型
 调用说明
 $sendmsg = new mobile();
 $check = $sendmsg->login();
 if($check == 'ok')
{
//获取账号余额代码

     $check->getBalance();
//发送短信代码
 sendmsg->sendsms(array(),'内容');
}

$sendmsg->endsend();//每次处理完成后需要退出
 */
class phptoexcel
{
	  
	 /*
	  function __construct(){ 	 
	  	header("Content-Type: text/html; charset=UTF-8");
	  	$this->serialNumber =  Mysite::$app->config['smacount'];
	  	$this->password =  Mysite::$app->config['smpassword']; 
	  	//hopedir
	  	require_once plugdir.'/phone/include/Client.php';
      $this->client = new Client($this->gwUrl,$this->serialNumber,$this->password,$this->sessionKey,$this->proxyhost,$this->proxyport,$this->proxyusername,$this->proxypassword,$this->connectTimeOut,$this->readTimeOut);
      $this->client->setOutgoingEncoding("UTF-8");  
   }*/
   private $wordvalue =  array(
   '0'=>'A',
   '1'=>'B',
   '2'=>'C',
   '3'=>'D',
   '4'=>'E',
   '5'=>'F',
   '6'=>'G',
   '7'=>'H',
   '8'=>'J',
   '9'=>'K',
   '10'=>'L',
   '11'=>'M',
   '12'=>'N',
   '13'=>'O',
   '14'=>'P'
   );
   //导出方案1
   function out($titledata,$titlelabel,$datalist,$filename='',$instro='')
   {
   	    $nowtime = date('Y-m-d',time());
		    $filename = empty($filename)?$this->Sanitize($nowtime.'--'.$instro):$this->Sanitize($filename); 
   	    header("Content-Type:text/html");
        header("Content-type:application/vnd.ms-excel;charset=utf-8");
        header("Content-Disposition:filename={$filename}.xls");
        $shuliang = count($titlelabel);
        $i = 1;
        foreach($titledata as $key=>$value){
          if($shuliang == $i){
          	 echo $this->Sanitize($value)."\t\n";
           }else{
             echo $this->Sanitize($value)."\t";
           }
          $i =$i+1;
        }
         
       foreach($datalist as $key=>$value){
       	   $i = 1;
       	   foreach($titlelabel as $keys=>$val){
       	   	  if($shuliang == $i){
          	     echo $this->Sanitize($value[$val])."\t\n";
              }else{
                echo $this->Sanitize($value[$val])."\t";
              } 
       	   	$i =$i+1;
       	   } 
       	 
       } 
        exit; 
   }
   function Sanitize($value){
   	 $value = @iconv('utf-8', 'gb2312', $value);
   	 return $value;
   }
   function bakout($titledata,$titlelabel,$datalist,$filename='',$instro='')
   {
   	  
   	  $logindir = plugdir.'/excel'; 
   	  
     if(file_exists($logindir.'/PHPExcel.php'))
     {  
     	 require_once($logindir.'/PHPExcel.php');
     	 error_reporting(E_ALL);
       ini_set('display_errors', TRUE);
       ini_set('display_startup_errors', TRUE);
       date_default_timezone_set('Europe/London'); 
       define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');//sitename
       $objPHPExcel = new PHPExcel(); 
       $objPHPExcel->getProperties()->setCreator(Mysite::$app->config['sitename'])
							 ->setLastModifiedBy(Mysite::$app->config['sitename'])
							 ->setTitle("Office XLS Test Document")
							 ->setSubject("Office XLS Test Document")
							 ->setDescription("output php to xls")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");
			  $objActSheet = $objPHPExcel->getActiveSheet();  
       foreach($titledata as $key=>$value)
       {
       	   $objPHPExcel->setActiveSheetIndex(0)
       	    ->setCellValue($this->wordvalue[$key].'1', $value);
       	   $objActSheet->getColumnDimension($this->wordvalue[$key])->setWidth(30);
        }
        
        foreach($datalist as $key=>$value)
        {
        	$m=$key+2;//判断第几行
        	foreach($titlelabel as $km=>$val)
        	{
        	  $objPHPExcel->setActiveSheetIndex(0)
       	    ->setCellValue($this->wordvalue[$km].$m, $value[$val]);
       	   }
        }	
       if(empty($filename))
       {
       	 $filename = date('Y-m-d H:i:s');
       }
       $instro = empty($instro)?'php数据导出':$instro;	
       
       
       $objPHPExcel->getActiveSheet()->setTitle($instro);  
       $objPHPExcel->setActiveSheetIndex(0); 
       $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
       header("Content-Type: application/force-download");
       header("Content-Type: application/octet-stream");
       header("Content-Type: application/download");
       header('Content-Disposition:inline;filename="'.$filename.'.xls"');
       header("Content-Transfer-Encoding: binary");
       header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
       header("Last-Modified:" . gmdate("D, d M Y H:i:s") ." GMT");
       header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
       header("Pragma: no-cache");
        
       $objWriter->save('php://output');
       
       exit;

     }else{
     	echo '获取失败';
     	exit;
     } 
    }

}
?>