<?php /*

*/
class upload
{
    var $saveName; // 保存名
    var $savePath; // 保存路径
    var $fileFormat = array('gif', 'jpg', 'png', 'application/octet-stream'); // 文件格式&MIME限定
    var $overwrite = 0; // 覆盖模式
    var $maxSize = 1048576; // 文件最大字节
    var $ext; // 文件扩展名
    var $thumb = 1; // 是否生成缩略图
    var $thumbWidth = 40; // 缩略图宽
    var $thumbHeight = 40; // 缩略图高
    var $thumbPrefix = "thumb_"; // 缩略图前缀
    var $errno; // 错误代号
    var $returnArray = array(); // 所有文件的返回信息
    var $returninfo = array(); // 每个文件返回信息


    //构造函数
    // @param savePath 文件保存路径
    // @param fileFormat 文件格式限制数组
    // @param maxSize 文件最大尺寸
    // @param overwriet 是否覆盖 1 允许覆盖 0 禁止覆盖
   
    function upload($savePath, $fileFormat = '', $maxSize = 0, $overwrite = 0 , $fileInput = 'imgFile' , $changeName=1){
        $this->setSavepath($savePath);
		$this->makeDirectory($savePath);//创建上传目录
        $this->setFileformat($fileFormat);
        $this->setMaxsize($maxSize);
        $this->setOverwrite($overwrite);
        $this->setThumb($this->thumb, $this->thumbWidth, $this->thumbHeight);
        $this->errno = 0;
		$this->run($fileInput,$changeName);
    }

    // 上传
    function run($fileInput, $changeName = 1)
    {
        if (isset($_FILES[$fileInput])) {
            $fileArr = $_FILES[$fileInput];
            if (is_array($fileArr['name'])) { //上传同文件域名称多个文件
                for ($i = 0; $i < count($fileArr['name']); $i++) {
                    $ar['tmp_name'] = $fileArr['tmp_name'][$i];
                    $ar['name'] = $fileArr['name'][$i];
                    $ar['type'] = $fileArr['type'][$i];
                    $ar['size'] = $fileArr['size'][$i];
                    $ar['error'] = $fileArr['error'][$i];
                    $this->getExt($ar['name']); //取得扩展名，赋给$this->ext，下次循环会更新
                    $this->setSavename($changeName == 1 ? '' : $ar['name']); //设置保存文件名
                    if ($this->copyfile($ar)) {
                        $this->returnArray[] = $this->returninfo;
                    } else {
                        $this->returninfo['error'] = $this->errmsg();
						if($this->returninfo['error']==1) $this->returnArray[] = $this->returninfo;
                    }
                }
                return $this->errno ? false : true;
            } else { //上传单个文件
                $this->getExt($fileArr['name']); //取得扩展名
                $this->setSavename($changeName == 1 ? '' : $fileArr['name']); //设置保存文件名
                if ($this->copyfile($fileArr)) {
                    $this->returnArray[] = $this->returninfo;
                } else {
                    $this->returninfo['error'] = $this->errmsg();
                    if($this->returninfo['error']==1) $this->returnArray[] = $this->returninfo;
                }
                return $this->errno ? false : true;
            }
            return false;
        } else {
            $this->errno = 10;
            return false;
        }
    }


    // 单个文件上传
    function copyfile($fileArray)
    {
        $this->returninfo = array();
        // 返回信息
        $this->returninfo['name'] = $fileArray['name'];
        $this->returninfo['saveName'] = $this->saveName;
        $this->returninfo['size'] = number_format(($fileArray['size']) / 1024, 0, '.',
            ' '); //以KB为单位
        $this->returninfo['type'] = $fileArray['type'];
        // 检查文件格式
        if (!$this->validateFormat()) {
            $this->errno = 11;
            return false;
        }
        // 检查目录是否可写
        if (!@is_writable($this->savePath)) {
            $this->errno = 12;
            return false;
        }
        // 如果不允许覆盖，检查文件是否已经存在
        if ($this->overwrite == 0 && @file_exists($this->savePath . $fileArray['name'])) {
            $this->errno = 13;
            return false;
        }
        // 如果有大小限制，检查文件是否超过限制
        if ($this->maxSize != 0) {
            if ($fileArray["size"] > $this->maxSize) {
                $this->errno = 14;
                return false;
            }
        }
        // 文件上传
        if (!move_uploaded_file($fileArray["tmp_name"], $this->savePath . $this->saveName)) {
            $this->errno = $fileArray["error"]; 
            return false;
        } elseif ($this->thumb) { //创建缩略图
            $CreateFunction = "imagecreatefrom" . ($this->ext == 'jpg' ? 'jpeg' : $this->ext);
            $SaveFunction = "image" . ($this->ext == 'jpg' ? 'jpeg' : $this->ext);
            if (strtolower($CreateFunction) == "imagecreatefromgif" && !function_exists("imagecreatefromgif")) {
            	$this->errno = 16;
                return false;
            } elseif (strtolower($CreateFunction) == "imagecreatefromjpeg" && !function_exists("imagecreatefromjpeg")) {
                $this->errno = 17;
                return false;
            } elseif (!function_exists($CreateFunction)) {
                $this->errno = 18;
                return false;
            }

            $Original = @$CreateFunction($this->savePath . $this->saveName);
            if (!$Original) {
                $this->errno = 19;
                return false;
            }
            $originalHeight = ImageSY($Original);
            $originalWidth = ImageSX($Original);
            $this->returninfo['originalHeight'] = $originalHeight;
            $this->returninfo['originalWidth'] = $originalWidth;
            if (($originalHeight < $this->thumbHeight && $originalWidth < $this->thumbWidth)) {
                // 如果比期望的缩略图小，那只Copy
                copy($this->savePath . $this->saveName, $this->savePath . $this->thumbPrefix . $this->saveName);
            } else {
                if ($originalWidth > $this->thumbWidth) { // 宽 > 设定宽度
                    $thumbWidth = $this->thumbWidth;
                    $thumbHeight = $this->thumbWidth * ($originalHeight / $originalWidth);
                    if ($thumbHeight > $this->thumbHeight) { //高 > 设定高度
                        $thumbWidth = $this->thumbHeight * ($thumbWidth / $thumbHeight);
                        $thumbHeight = $this->thumbHeight;
                    }
                } elseif ($originalHeight > $this->thumbHeight) { //高 > 设定高度
                    $thumbHeight = $this->thumbHeight;
                    $thumbWidth = $this->thumbHeight * ($originalWidth / $originalHeight);
                    if ($thumbWidth > $this->thumbWidth) { //宽 > 设定宽度
                        $thumbHeight = $this->thumbWidth * ($thumbHeight / $thumbWidth);
                        $thumbWidth = $this->thumbWidth;
                    }
                }
                if ($thumbWidth == 0)
                    $thumbWidth = 1;
                if ($thumbHeight == 0)
                    $thumbHeight = 1;
                $createdThumb = imagecreatetruecolor($thumbWidth, $thumbHeight);
                if (!$createdThumb) {
                    $this->errno = 20;
                    return false;
                }
                if (!imagecopyresampled($createdThumb, $Original, 0, 0, 0, 0, $thumbWidth, $thumbHeight,$originalWidth, $originalHeight)) {
                    $this->errno = 21;
                    return false;
                }
                if (!$SaveFunction($createdThumb, $this->savePath . $this->thumbPrefix . $this->saveName)) {
                    $this->errno = 22;
                    return false;
                }
            }
        }
        $info = $this->imageWaterMark($this->savePath.$this->saveName);
        // 删除临时文件
        if (!@$this->del($fileArray["tmp_name"])) {
            return false;
        }
        return true;
    }

    // 文件格式检查,MIME检测
    function validateFormat()
    {
        if (!is_array($this->fileFormat) || in_array(strtolower($this->ext), $this->
            fileFormat) || in_array(strtolower($this->returninfo['type']), $this->
            fileFormat))
            return true;
        else
            return false;
    }
    //获取文件扩展名
    function getExt($fileName)
    {
        $ext = explode(".", $fileName);
        $ext = $ext[count($ext) - 1];
		$ext = $ext=="jpeg" ? "jpg" : $ext;
        $this->ext = strtolower($ext);
    }

    //设置上传文件的最大字节限制
    // @param $maxSize 文件大小(bytes) 0:表示无限制
    function setMaxsize($maxSize)
    {
        $this->maxSize = $maxSize;
    }
    //设置文件格式限定
    // @param $fileFormat 文件格式数组
    function setFileformat($fileFormat)
    {
        if (is_array($fileFormat)) {
            $this->fileFormat = $fileFormat;
        }
    }

    //设置覆盖模式
    // @param overwrite 覆盖模式 1:允许覆盖 0:禁止覆盖
    function setOverwrite($overwrite)
    {
        $this->overwrite = $overwrite;
    }


    //设置保存路径
    // @param $savePath 文件保存路径：以 "/" 结尾，若没有 "/"，则补上
    function setSavepath($savePath)
    {
        $this->savePath = substr(str_replace("\\", "/", $savePath), -1) == "/" ? $savePath :
            $savePath . "/";
    }

    //设置缩略图
    // @param $thumb = 1 产生缩略图 $thumbWidth,$thumbHeight 是缩略图的宽和高
    function setThumb($thumb, $thumbPrefix, $thumbWidth = 0, $thumbHeight = 0)
    {
        $this->thumb = $thumb;
        $this->thumbPrefix = $thumbPrefix;
        if ($thumbWidth)
            $this->thumbWidth = $thumbWidth;
        if ($thumbHeight)
            $this->thumbHeight = $thumbHeight;
    }

    //设置文件保存名
    // @saveName 保存名，如果为空，则系统自动生成一个随机的文件名
    function setSavename($saveName)
    {
        if ($saveName == '') { // 如果未设置文件名，则生成一个随机文件名
            $name = date('YmdHis') . rand(100, 999) . '.' . $this->ext;
        } else {
            $name = $saveName;
        }
        $this->saveName = $name;
    }

    //删除文件
    // @param $file 所要删除的文件名
    function del($fileName)
    {
        if (!@unlink($fileName)) {
            $this->errno = 15;
            return false;
        }
        return true;
    }

    // 返回单个上传文件的信息
    function getInfo()
    {
        return $this->returninfo;
    }


    //返回多个上传文件信息

    function getfile()
    {
        return $this->returnArray;
    }


    // 得到错误信息
    function errmsg()
    {
        $errormsg = array(
								  0 => '1',
								  1 => '上传的文件过大!', 
								  2 => '上传的文件过大!',
								  3 => '文件只有部分被上传!', 
								  4 => '没有提交任何上传信息!', 
								  6 => '创建缩略图失败，你的PHP版本过低!', 
								  7 => '创建缩略图失败，你的PHP版本过低!', 
								  10 => '表单文件域不存在!', 
								  11 => '不允许上传该格式文件!', 
								  12 => '上传目录不存在或不可写!', 
								  13 => '该文件已上传!', 
								  14 => '上传的文件过大!', 
								  15 => '1', 
								  16 => 'Your version of PHP does not appear to have GIF thumbnailing support.',
            17 => 'Your version of PHP does not appear to have JPEG thumbnailing support.',
            18 => 'Your version of PHP does not appear to have pictures thumbnailing support.',
            19 => 'An error occurred while attempting to copy the source image . 
                     Your version of php (' . phpversion() .
            ') may not have this image type support.', 20 =>
            'An error occurred while attempting to create a new image.', 21 =>
            'An error occurred while copying the source image to the thumbnail image.', 22 =>
            'An error occurred while saving the thumbnail image to the filesystem. 
                     Are you sure that PHP has been configured with both read and write access on this folder?', );
        if ($this->errno == 0)
            return false;
        else
            return $errormsg[$this->errno];
    }

    //创建目录

    function makeDirectory($directoryName)
    {

        $temp = $directoryName;

        if (!is_dir($temp)) {
            $oldmask = umask(0);
            if (!mkdir($temp, 0777))
                exit("不能建立目录 $temp");
            umask($oldmask);
        }

        return $temp;
    }
    
 
    /*
* 功能：PHP图片水印 (水印支持图片或文字)
* 参数：
*       $groundImage     背景图片，即需要加水印的图片，暂只支持GIF,JPG,PNG格式；
*       $waterPos        水印位置，有10种状态，0为随机位置；
*                       1为顶端居左，2为顶端居中，3为顶端居右；
*                       4为中部居左，5为中部居中，6为中部居右；
*                       7为底端居左，8为底端居中，9为底端居右；
*       $waterImage      图片水印，即作为水印的图片，暂只支持GIF,JPG,PNG格式；
*       $waterText       文字水印，即把文字作为为水印，支持ASCII码，不支持中文；
*       $fontSize        文字大小，值为1、2、3、4或5，默认为5；
*       $textColor       文字颜色，值为十六进制颜色值，默认为#CCCCCC(白灰色)；
*       $fontfile        ttf字体文件，即用来设置文字水印的字体。使用windows的用户在系统盘的目录中
*                       搜索*.ttf可以得到系统中安装的字体文件，将所要的文件拷到网站合适的目录中,
*                       默认是当前目录下arial.ttf。
*       $xOffset         水平偏移量，即在默认水印坐标值基础上加上这个值，默认为0，如果你想留给水印留
*                       出水平方向上的边距，可以设置这个值,如：2 则表示在默认的基础上向右移2个单位,-2 表示向左移两单位
*       $yOffset         垂直偏移量，即在默认水印坐标值基础上加上这个值，默认为0，如果你想留给水印留
*                       出垂直方向上的边距，可以设置这个值,如：2 则表示在默认的基础上向下移2个单位,-2 表示向上移两单位
* 返回值：
*        0   水印成功
*        1   水印图片格式目前不支持
*        2   要水印的背景图片不存在
*        3   需要加水印的图片的长度或宽度比水印图片或文字区域还小，无法生成水印
*        4   字体文件不存在
*        5   水印文字颜色格式不正确
*        6   水印背景图片格式目前不支持
* 修改记录：
*         
* 注意：Support GD 2.0，Support FreeType、GIF Read、GIF Create、JPG 、PNG
*       $waterImage 和 $waterText 最好不要同时使用，选其中之一即可，优先使用 $waterImage。
*       当$waterImage有效时，参数$waterString、$stringFont、$stringColor均不生效。
*       加水印后的图片的文件名和 $groundImage 一样。
* 作者：高西林
* 日期：2007-4-28
* 说明：本程序根据longware的程序改写而成。
*/
    function imageWaterMark($groundImage,$waterPos=0,$waterImage="",$waterText="",$fontSize=12,$textColor="#CCCCCC", $fontfile='font.ttf',$xOffset=0,$yOffset=0)
   {
   	
   	 if(Mysite::$app->config['is_water'] != 1){
   	  return 0;
   	 }
   	 $waterPos = intval(Mysite::$app->config['water_pos']);
   	  $waterImage = empty(Mysite::$app->config['logo_water'])?'':hopedir.Mysite::$app->config['logo_water'];
   	   $waterText = Mysite::$app->config['text_water'];
   	  $fontSize = intval(Mysite::$app->config['size_water']);
   	  $textColor = Mysite::$app->config['color_water'];
      $isWaterImage = FALSE;
     //读取水印文件
     if(!empty($waterImage) && file_exists($waterImage)) {
         $isWaterImage = TRUE;
         $water_info = getimagesize($waterImage);
         $water_w     = $water_info[0];//取得水印图片的宽
         $water_h     = $water_info[1];//取得水印图片的高

         switch($water_info[2])   {    //取得水印图片的格式  
             case 1:$water_im = imagecreatefromgif($waterImage);break;
             case 2:$water_im = imagecreatefromjpeg($waterImage);break;
             case 3:$water_im = imagecreatefrompng($waterImage);break;
             default:return 1;
         }
     }

     //读取背景图片
     if(!empty($groundImage) && file_exists($groundImage)) {
         $ground_info = getimagesize($groundImage);
         $ground_w     = $ground_info[0];//取得背景图片的宽
         $ground_h     = $ground_info[1];//取得背景图片的高

         switch($ground_info[2]) {    //取得背景图片的格式  
             case 1:$ground_im = imagecreatefromgif($groundImage);break;
             case 2:$ground_im = imagecreatefromjpeg($groundImage);break;
             case 3:$ground_im = imagecreatefrompng($groundImage);break;
             default:return 1;
         }
     } else { 
         return 2;
     }

     //水印位置
     if($isWaterImage) { //图片水印  
         $w = $water_w;
         $h = $water_h;
         $label = "图片的";
         } else {  
     //文字水印
        $fontfile =dirname(__FILE__).'/'.$fontfile;
        if(!file_exists($fontfile))return 4;
         $temp = imagettfbbox($fontSize,0,$fontfile,$waterText);//取得使用 TrueType 字体的文本的范围
         $w = $temp[2] - $temp[6];
         $h = $temp[3] - $temp[7];
         unset($temp);
     }
     if( ($ground_w < $w) || ($ground_h < $h) ) {
         return 3;
     }
     switch($waterPos) {
         case 0://随机
             $posX = rand(0,($ground_w - $w));
             $posY = rand(0,($ground_h - $h));
             break;
         case 1://1为顶端居左
             $posX = 0;
             $posY = 0;
             break;
         case 2://2为顶端居中
             $posX = ($ground_w - $w) / 2;
             $posY = 0;
             break;
         case 3://3为顶端居右
             $posX = $ground_w - $w;
             $posY = 0;
             break;
         case 4://4为中部居左
             $posX = 0;
             $posY = ($ground_h - $h) / 2;
             break;
         case 5://5为中部居中
             $posX = ($ground_w - $w) / 2;
             $posY = ($ground_h - $h) / 2;
             break;
         case 6://6为中部居右
             $posX = $ground_w - $w;
             $posY = ($ground_h - $h) / 2;
             break;
         case 7://7为底端居左
             $posX = 0;
             $posY = $ground_h - $h;
             break;
         case 8://8为底端居中
             $posX = ($ground_w - $w) / 2;
             $posY = $ground_h - $h;
             break;
         case 9://9为底端居右
             $posX = $ground_w - $w;
             $posY = $ground_h - $h;
             break;
         default://随机
             $posX = rand(0,($ground_w - $w));
             $posY = rand(0,($ground_h - $h));
             break;     
     }

     //设定图像的混色模式
     imagealphablending($ground_im, true);

     if($isWaterImage) { //图片水印
         imagecopy($ground_im, $water_im, $posX + $xOffset, $posY + $yOffset, 0, 0, $water_w,$water_h);//拷贝水印到目标文件         
     } else {//文字水印
         if( !empty($textColor) && (strlen($textColor)==7) ) {
             $R = hexdec(substr($textColor,1,2));
             $G = hexdec(substr($textColor,3,2));
             $B = hexdec(substr($textColor,5));
         } else {
           return 5;
         }
         imagettftext ( $ground_im, $fontSize, 0, $posX + $xOffset, $posY + $h + $yOffset, imagecolorallocate($ground_im, $R, $G, $B), $fontfile, $waterText);
     }

     //生成水印后的图片
     @unlink($groundImage);
     switch($ground_info[2]) {//取得背景图片的格式
         case 1:imagegif($ground_im,$groundImage);break;
         case 2:imagejpeg($ground_im,$groundImage);break;
         case 3:imagepng($ground_im,$groundImage);break;
         default: return 6;
     }

     //释放内存
     if(isset($water_info)) unset($water_info);
     if(isset($water_im)) imagedestroy($water_im);
     unset($ground_info);
     imagedestroy($ground_im);
     //
     return 0;
  }

}
?>