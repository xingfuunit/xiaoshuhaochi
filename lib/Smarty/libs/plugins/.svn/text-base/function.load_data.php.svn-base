<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {load_data} function plugin
*
* Type: function<br>
* Name: eval<br>
* Purpose: evaluate a template variable as a template<br>
* @link http://smarty.php.net/manual/en/language.function.eval.php {eval}
* @param array
* @param Smarty
 */
//<{load_data assign="shuliang" table="order" where="`status`=0" limit=10 type="total" fileds}>
function smarty_function_load_data($params, &$smarty)
{
  
  (!isset($params['table']) || empty($params['table'])) && exit('`table` is empty!');
  
 // $Mconfig = include(hopedir."config/hopeconfig.php");  
 // print_r($Mconfig);
  
  $type = isset($params['type']) ? $params['type']:'list';  //total  总数量   one    list 3个分类   
  $fileds = isset($params['fileds']) ? $params['fileds']:'*';
  $where = isset($params['where'])? $params['where']: '';
  $where = empty($where)?'':' where '.$where;
  $orderby = isset($params['orderby'])? 'order by '.$params['orderby']:'';
  $limit = isset($params['limit'])? 'LIMIT 0,'.$params['limit']:'LIMIT 0,1';
   if( !class_exists('mysql_class')){
      	include(hopedir."lib/core/extend/mysql_class.php");   //core\extend
        $mysql = new mysql_class(); 
   }else{
      $mysql = new mysql_class();
   }
   $page = intval(IFilter::act(IReq::get('page'))); 
	 $pagesize = intval(IFilter::act(IReq::get('pagesize'))); 
	 $pagesize = isset($params['pagesize'])? $params['pagesize']:$pagesize;
	 $pagesize = empty($pagesize)?10:$pagesize;
  // $db = $class::factory(array('table' => $params['table']));
  //var_dump($params);
  if (!empty($params['assign'])) {
  //把数据赋值给变量$params['assign']，这样前端就可以使用这个变量了（例如可以结合foreach输出一个列表等）
    //  $smarty->assign($params['assign'], $db->get_block_list(array($params['where']), $params['limit'])); 
    if($type == 'total'){
    	$result = $mysql->counts("select ".$fileds." from ".Mysite::$app->config['tablepre'].$params['table']."  ".$where." ".$orderby." ".$limit."");
    }elseif($type == 'one'){ 
    	$result = $mysql->select_one("select ".$fileds." from ".Mysite::$app->config['tablepre'].$params['table']."  ".$where." ".$orderby." ".$limit.""); 
    }else{ 
    	if(isset($params['showpage'])&& $params['showpage'] ==  true){
    	    if( !class_exists('page')){
      	      include(hopedir."lib/core/extend/page.php");   //core\extend
              $pageclass = new page(); 
          }else{
              $pageclass = new page();
          } 
          $pageclass->setpage($page,$pagesize); 
          
	      	$result['list'] = $mysql->getarr("select ".$fileds." from ".Mysite::$app->config['tablepre'].$params['table']."  ".$where."  ".$orderby."  limit ".$pageclass->startnum().", ".$pageclass->getsize()."");   
	        $shuliang  = $mysql->counts("select ".$fileds." from ".Mysite::$app->config['tablepre'].$params['table']."  ".$where." ");
	       	$pageclass->setnum($shuliang);
	       	if(isset($params['pagetype'])){
	       		$result['pagecontent'] = $pageclass->ajaxbar($params['pagetype']);
	       	}else{
	       	$result['pagecontent'] = $pageclass->getpagebar();
	        }
      }else{ 
    	   $result['list'] = $mysql->getarr("select ".$fileds." from ".Mysite::$app->config['tablepre'].$params['table']."  ".$where." ".$orderby."  ".$limit."");
      } 
    }
    /*
    $result['list'] = array();
     $result['pagecontent'] = ''; */
    
    $smarty->assign($params['assign'],$result);
   } 
}

?>