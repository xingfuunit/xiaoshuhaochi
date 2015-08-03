<?php
//dezend by http://www.yunlu99.com/
class IReq
{
	static public function get($key, $type = false)
	{
		if ($type == false) {
			if (isset($_GET[$key])) {
				return $_GET[$key];
			}
			else if (isset($_POST[$key])) {
				return $_POST[$key];
			}
			else {
				return NULL;
			}
		}
		else {
			if (($type == 'get') && isset($_GET[$key])) {
				return $_GET[$key];
			}
			else {
				if (($type == 'post') && isset($_POST[$key])) {
					return $_POST[$key];
				}
				else {
					return NULL;
				}
			}
		}
	}

	static public function set($key, $value, $type = 'get')
	{
		if ($type == 'get') {
			$_GET[$key] = $value;
		}
		else if ($type == 'post') {
			$_POST[$key] = $value;
		}
	}
}


?>
