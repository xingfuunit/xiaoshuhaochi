<?php
//dezend by http://www.yunlu99.com/
class IController
{
	protected $module;
	protected $ctrlId;
	protected $tplname;
	private $renderData = array();
	public $mysql;
	public $page;

	public function __construct($module, $controllerId, $Taction)
	{
		$this->module = $module;
		$this->ctrlId = $controllerId;
		$this->tplname = $Taction;
		$this->mysql = new mysql_class();
		$this->page = new page();
		$this->memberCls = new memberclass($this->mysql);
	}

	public function error($msg, $link = '')
	{
		$this->info_default();
		$data['sitetitle'] = '错误提示';
		$data['errorlink'] = empty($link) ? $_SERVER['HTTP_REFERER'] : $link;
		$this->setdata($data);
		$this->setdata(array('msg' => $msg));
		$this->ctrlId = 'public';
		$this->tplname = 'error';
		$this->display();
		exit();
	}

	public function success($msg, $link)
	{
		$this->info_default();
		$data['sitetitle'] = $msg;
		$data['link'] = $link;
		$this->setdata($data);
		$this->setdata(array('msg' => $msg));
		$this->ctrlId = 'public';
		$this->tplname = 'success';
		$this->display();
		exit();
	}

	public function directs($info)
	{
		$tempinfo = explode('/', $info);
		$this->ctrlId = $tempinfo[0];
		$this->tplname = $tempinfo[1];
		$this->display();
	}

	public function refunction($msg, $info = '')
	{
		$newrul = (empty($info) ? $this->module->config['siteurl'] : $info);
		header('Content-Type:text/html;charset=utf-8');

		if (!empty($msg)) {
			echo '<script>alert(\'' . $msg . '\');location.href=\'' . $newrul . '\';</script>';
		}
		else {
			echo '<script>location.href=\'' . $newrul . '\';</script>';
		}

		exit();
	}

	public function display()
	{
		header('Content-Type:text/html;charset=utf-8');
		$filePath = hopedir . '/lib/Smarty/libs/Smarty.class.php';

		if (!class_exists('smarty')) {
			include_once $filePath;
		}

		$smarty = new Smarty();
		$smarty->cache_lifetime = 0;
		$smarty->caching = false;
		$smarty->template_dir = './templates';
		$smarty->compile_dir = './templates_c';
		$smarty->cache_dir = './smarty_cache';
		$smarty->left_delimiter = '<{';
		$smarty->right_delimiter = '}>';
		$smarty->assign('controlname', $this->ctrlId);
		$smarty->assign('urlshort', $this->ctrlId . '/' . $this->tplname);
		$templtepach = $this->module->config['sitetemp'] . '/' . $this->ctrlId . '/' . $this->tplname . '.html';

		if (!file_exists('templates/' . $templtepach)) {
			$this->error('模板文件不存在');
		}

		$smarty->registerPlugin('function', 'ofunc', 'FUNC_function');
		$smarty->registerPlugin('block', 'oblock', 'FUNC_block');
		$data = $this->getdata();

		foreach ($data as $key => $value) {
			$smarty->assign($key, $value);
		}

		if ($this->ctrlId == 'admin') {
			$menu = adminmenu::submenu($data['admininfo']['limit']);
			$smarty->assign('menu', $menu);
		}

		$smarty->display($templtepach);
	}

	public function gethtml()
	{
		header('Content-Type:text/html;charset=utf-8');
		date_default_timezone_set('Asia/Hong_Kong');
		$filePath = hopedir . '/lib/Smarty/libs/Smarty.class.php';

		if (!class_exists('smarty')) {
			include_once $filePath;
		}

		$smarty = new Smarty();
		$smarty->cache_lifetime = 0;
		$smarty->caching = false;
		$smarty->template_dir = './templates';
		$smarty->compile_dir = './templates_c';
		$smarty->cache_dir = './smarty_cache';
		$smarty->left_delimiter = '<{';
		$smarty->right_delimiter = '}>';
		$smarty->assign('urlshort', $this->ctrlId . '/' . $this->tplname);
		$templtepach = $this->module->config['sitetemp'] . '/' . $this->ctrlId . '/' . $this->tplname . '.html';
		$this->info_default();

		if (!file_exists('templates/' . $templtepach)) {
			$data['sitetitle'] = '错误提示';
			$data['sitename'] = $this->module->config['sitename'];
			$data['description'] = $this->module->config['description'];
			$data['keywords'] = $this->module->config['keywords'];
			$data['is_static'] = $this->module->config['is_static'];
			$data['msg'] = '模板文件不存在';
			$this->setdata($data);
			$templtepach = $this->module->config['sitetemp'] . '/public/error.html';
		}

		$smarty->registerPlugin('function', 'ofunc', 'FUNC_function');
		$smarty->registerPlugin('block', 'oblock', 'FUNC_block');
		$data = $this->getdata();

		if (is_array($data)) {
			foreach ($data as $key => $value) {
				$smarty->assign($key, $value);
			}
		}

		$content = $smarty->fetch($templtepach);
		return $content;
	}

	static public function statichtml($htmlcontent, $datas)
	{
		$filePath = hopedir . '/lib/Smarty/libs/Smarty.class.php';

		if (!class_exists('smarty')) {
			include_once $filePath;
		}

		$smarty = new Smarty();
		$smarty->cache_lifetime = 0;
		$smarty->caching = false;
		$smarty->template_dir = './templates';
		$smarty->compile_dir = './templates_c';
		$smarty->cache_dir = './smarty_cache';
		$smarty->left_delimiter = '{';
		$smarty->right_delimiter = '}';

		if (is_array($datas)) {
			foreach ($datas as $key => $value) {
				$smarty->assign($key, $value);
			}
		}

		$content = $smarty->fetch('string:' . $htmlcontent);
		return $content;
	}

	public function info_default()
	{
		$data['footfriendlink'] = $this->mysql->getarr('select * from ' . Mysite::$app->config['tablepre'] . 'friendlink  where type=1 order by orderid asc  limit 0,10');
		$data['sitename'] = $this->module->config['sitename'];
		$data['keywords'] = $this->module->config['keywords'];
		$data['description'] = $this->module->config['description'];
		$data['shoplogo'] = $this->module->config['shoplogo'];
		$data['userlogo'] = $this->module->config['userlogo'];
		$data['notice'] = $this->module->config['notice'];
		$data['sitelogo'] = $this->module->config['sitelogo'];
		$data['cityname'] = $this->module->config['cityname'];
		$data['toplink'] = unserialize($this->module->config['toplink']);
		$data['footlink'] = unserialize($this->module->config['footlink']);
		$data['footerdata'] = $this->module->config['footerdata'];
		$data['metadata'] = $this->module->config['metadata'];
		$data['sitebk'] = $this->module->config['sitebk'];
		$data['is_static'] = $this->module->config['is_static'];
		$data['tempdir'] = $this->module->config['sitetemp'];
		$data['siteurl'] = $this->module->config['siteurl'];
		$data['beian'] = $this->module->config['beian'];
		$data['litel'] = $this->module->config['litel'];
		$data['marketstarttime'] = $this->module->config['marketstarttime'];
		$data['starttime'] = $this->module->config['starttime'];
		$this->setdata($data);
	}

	public function setdata($data)
	{
		$tempdata = $this->getdata();
		$tempdata = array_merge($tempdata, $data);
		$this->renderData = $tempdata;
	}

	public function getdata()
	{
		return $this->renderData;
	}

	public function getcontroller()
	{
		return $this->ctrlId;
	}

	public function getaction()
	{
		return $this->tplname;
	}

	public function json($msg)
	{
		echo json_encode($msg);
		exit();
	}
}


?>
