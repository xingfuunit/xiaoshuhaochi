<?php
/**
 * @copyright (c) 2011 jooyea.cn
 * @file string_class.php
 * @brief 字符串处理库
 * @author chendeshan
 * @date 2010-12-2
 * @version 0.6
 */

/**
 * @class IString
 * @brief 字符串处理
 */
class IString
{
	/**
	 * @brief 字符串截取
	 * @param string $str 被截取的字符串
	 * @param int $length 截取的长度 值: 0:不对字符串进行截取(默认)
	 * @param bool $append 是否追加省略号 值: true:追加; false:不追加;
	 * @param string $charset $str的编码格式 值: utf8:默认;
	 * @return string 截取后的字符串
	 */
	public static function substr($str, $length = 0, $append = true, $isUTF8=true)
	{
		$byte   = 0;
		$amount = 0;
		$str    = trim($str);
		$length = intval($length);

		//获取字符串总字节数
		$strlength = strlen($str);

		//无截取个数 或 总字节数小于截取个数
		if($length==0 || $strlength <= $length)
		{
			return $str;
		}

		//utf8编码
		if($isUTF8 == true)
		{
			while($byte < $strlength)
			{
				if(ord($str{$byte}) >= 224)
				{
					$byte += 3;
					$amount++;
				}
				else if(ord($str{$byte}) >= 192)
				{
					$byte += 2;
					$amount++;
				}
				else
				{
					$byte += 1;
					$amount++;
				}

				if($amount >= $length)
				{
					$resultStr = substr($str, 0, $byte);
					break;
				}
			}
		}

		//非utf8编码
		else
		{
			while($byte < $strlength)
			{
				if(ord($str{$byte}) > 160)
				{
					$byte += 2;
					$amount++;
				}
				else
				{
					$byte++;
					$amount++;
				}

				if($amount >= $length)
				{
					$resultStr = substr($str, 0, $byte);
					break;
				}
			}
		}

		//实际字符个数小于要截取的字符个数
		if($amount < $length)
		{
			return $str;
		}

		//追加省略号
		if($append)
		{
			$resultStr .= '...';
		}
		return $resultStr;
	}

	/**
	 * @brief 编码转换
	 * @param string &$str 被转换编码的字符串
	 * @param string $outCode 输出的编码
	 * @return string 被编码后的字符串
	 */
	public static function setCode($str,$outCode='UTF-8')
	{
		if(self::isUTF8($str)==false)
		{
			return iconv('GBK',$outCode,$str);
		}
		return $str;
	}

	/**
	 * @brief 检测编码是否为utf-8格式
	 * @param string 被检测的字符串
	 * @return bool 检测结果 值: true:是utf8编码格式; false:不是utf8编码格式;
	 */
	public static function isUTF8($str)
	{
		$result=preg_match('%^(?:[\x09\x0A\x0D\x20-\x7E] # ASCII
		| [\xC2-\xDF][\x80-\xBF] # non-overlong 2-byte
		| \xE0[\xA0-\xBF][\x80-\xBF] # excluding overlongs
		| [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
		| \xED[\x80-\x9F][\x80-\xBF] # excluding surrogates
		| \xF0[\x90-\xBF][\x80-\xBF]{2} # planes 1-3
		| [\xF1-\xF3][\x80-\xBF]{3} # planes 4-15
		| \xF4[\x80-\x8F][\x80-\xBF]{2} # plane 16
		)*$%xs', $str);
		return $result ? true : false;
	}

	/**
	 * @brief 获取字符个数
	 * @param string 被计算个数的字符串
	 * @return int 字符个数
	 */
	public static function getStrLen($str)
	{
		$byte   = 0;
		$amount = 0;
		$str    = trim($str);

		//获取字符串总字节数
		$strlength = strlen($str);

		//检测是否为utf8编码
		$isUTF8=self::isUTF8($str);

		//utf8编码
		if($isUTF8 == true)
		{
			while($byte < $strlength)
			{
				if(ord($str{$byte}) >= 224)
				{
					$byte += 3;
					$amount++;
				}
				else if(ord($str{$byte}) >= 192)
				{
					$byte += 2;
					$amount++;
				}
				else
				{
					$byte += 1;
					$amount++;
				}
			}
		}

		//非utf8编码
		else
		{
			while($byte < $strlength)
			{
				if(ord($str{$byte}) > 160)
				{
					$byte += 2;
					$amount++;
				}
				else
				{
					$byte++;
					$amount++;
				}
			}
		}
		return $amount;
	}
}
?>