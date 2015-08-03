<?php
 
class mysql_class{
	
 private $dbhost; //数据库主机
 private $dbuser; //数据库用户名
 private $dbpassword; //数据库用户名密码
 private $dbname; //数据库名 
 private $dbcharset; //数据库编码，GBK,UTF8,gb2312
 private $conn; //数据库连接标识;
 private $pconn; //是否永久连接
 
 //构造函数
 function __construct(){ 	 
 	 
   $this->dbhost = Mysite::$app->config['dbhost'];
   $this->dbuser = Mysite::$app->config['dbuser'];
   $this->dbpassword = Mysite::$app->config['dbpw'];
   $this->dbname = Mysite::$app->config['dbname'];
   $this->conn = 'conn';
   $this->pconn = 'false';
   $this->dbcharset = Mysite::$app->config['dbcharset'];    
   $this->connect();
 }
 
 //连接数据库
 private function connect(){ 	 
   if($this->pconn){
      $this->conn=@mysql_pconnect($this->dbhost,$this->dbuser,$this->dbpassword) or die($this->error());
   }else{
      $this->conn=@mysql_connect($this->dbhost,$this->dbuser,$this->dbpassword) or die($this->error());
   }
    $version = @mysql_get_server_info(); 
   
    if($version > '4.1' && $this->dbcharset) {
				 @mysql_query("SET NAMES $this->dbcharset") or die ($this->error());
    } 
    if($version > '5.0') {
				 @mysql_query("SET sql_mode=''") or die ($this->error()); 
    }
												
 
   @mysql_select_db($this->dbname, $this->conn) or die ($this->error());
   
 }
 
 
 //执行一条SQL语句
 function query($sql) {
   $query = @mysql_query($sql,$this->conn) or die($this->error($sql));
   return $query;
 }
 
 //创建新的数据库
 function create_database($database) {
   $sql = 'create database ' . $database;
   return $this->query($sql);
 } 
 
 //信息生成数组(双方式)
 function arr($query){
   return mysql_fetch_array($query);
 }
 
 //获取一条数据。
 function select_one($sql){
   $query=$this->query($sql);
   return $this->assoc($query);
 }

 //信息生成数组(字段名方式)
 function assoc($query) {
   return mysql_fetch_assoc($query);
 }

 //信息生成数组(数字索引方式)
 function row($query) {
   return mysql_fetch_row($query);
 }

 //信息生成对象
 function obj($query) {
   return mysql_fetch_object($query);
 }
 
 //返回数据条数
 function num($table,$where="") {
   $where = $where!="" ?  "where $where" : "";
   return $this->counts("select * from $table $where");
 }
 
 //返回数据条数
 function counts($sql) {
   return mysql_num_rows($this->query($sql));
 }
 
 function affected(){
   return mysql_affected_rows();
 }
 
  //返回数据
 function value($table,$row,$where="") {
   $sql="select * from $table where $where";
   $rs=$this->select_one($sql);
   return $rs[$row];
 }
 
 //插入数据
 function insert($table, $row) {
   $sql = $this->sql_insert($table, $row);
   return $this->query($sql);
 }
 
 //更新数据
 function update($table,$row,$where) {
   $sql = $this->sql_update($table, $row, $where);
   return $this->query($sql);
 } 
 
 function sql_insert($table, $row){
	$fields = '';
	$values = '';
	foreach ($row as $key=>$value) {
	  $fields .= "`".$key."`,";
	  $values .= "'".$value."',";
	}
	return "insert into `".$table."` (".substr($fields, 0, -1).") values (".substr($values, 0, -1).")";
 }
 

 function sql_update($tbname, $row, $where){
    $sqlud='';
    if(is_string($row)){
	  $sqlud=$row.' ';
	}else{
	  foreach ($row as $key=>$value) {
		$sqlud .= "`$key`"."= '".$value."',";
	  }
	}
	return "update `".$tbname."` set ".substr($sqlud, 0, -1)." where ".$where;
 }
 
 function getarr($sql){
 	$getarr = array();
	$query = $this->query($sql); 
    while($rs=$this->assoc($query)){
  	    $getarr[] = $rs;
	  }
	return $getarr;
 }
 
 //删除数据
 function delete($table, $where) {
   return $this->query("delete from $table where $where");
 }
 
 function insertid(){
   return mysql_insert_id($this->conn);	 
 }
 
 //获取数据库所有表()
 function gettales() {
 	    $rs = $this->query("SHOW TABLES FROM ".$this->dbname.""); 
     $tables = array(); 
    while ($row = $this->row($rs)) { 
        $tables[] = $row[0]; 
    }

  

    return $tables;
    /*
 	$tables =  mysql_list_tables($this->dbname); 
 	$cachetables = array(); 
 	$tableselected = array();
 	while ($table = $this->row($tables)){   
 		$cachetables[$table[0]] = $table[0];   
 		$tableselected[$table[0]] = 1;
 		} 
   return $cachetables; */
 }  
 //返回表字段数
 function getfields($sql)
 {
  return	mysql_num_fields($sql);
}

//转换符号
 function changto($sql)
 {
 	return mysql_escape_string($sql);
}
 function restroe($sql)
 {
 	return mysql_free_result($sql);
}
 //错误信息提示
 private function error($sql=""){
 	
   $error = "Mysql_error：".mysql_error()."(".mysql_errno().")";
    $error .= $sql == "" ? "" : "Sql：'{$sql}'";  
   logwrite($error);
   return false;
 } 
 
 //析构函数关闭数据库
 function __destruct(){	 
	 @mysql_close($this->conn);
 }
}
?>