<?php
/**
功能：数据库的基础操作类
时间 ：2012-06-05
作者：陆广有
QQ:952117701
 **/
class DBSQL {
	private $CONN = ""; //定义数据库连接变量
	public $sqlshow = 0;
	private $msg = "";
	public $charset = "utf-8";
	
	/*private function checkurl(){
	if (strstr($_SERVER["HTTP_REFERER"],"localhost") || strstr($_SERVER["HTTP_REFERER"],"127.0.0.1") || strstr($_SERVER["HTTP_REFERER"],"124.172.242.45")|| strstr($_SERVER["HTTP_REFERER"],"www.gzxxws.com") || strstr($_SERVER["HTTP_REFERER"],"gzxxws.com")){
		}else{
			//exit();
		}
	}*/
	public function __construct() {
	    $conn = mysql_connect('localhost', UserName, PassWord);
		mysql_select_db(DBName) or die ('Can\'t use database : ' . mysql_error());
		try {
			$this->CONN = $conn;
			//$this->checkurl();
			@mysql_query ( "set names '{$this->msg}'" );
		} catch ( Exception $e ) {
			$this->msg = $e;
			echo $e;
		}
	
	}
	
	public function select($sql = "") {
		if (empty ( $sql ))
			return false; //如果SQL语句为空则返回FALSE
		if (empty ( $this->CONN ))
			return false; //如果连接为空则返回FALSE
		try { //捕获数据库选择错误并显示错误文件
			$results = mysql_query ( $sql, $this->CONN );
		} catch ( Exception $e ) {
			
			$this->msg = $e;
		
		//include (ERRFILE);
		}
		if ((! $results) or (empty ( $results ))) { //如果查询结果为空则释放结果并返回FALSE
			@mysql_free_result ( $results );
			return false;
		}
		
		$count = 0;
		$data = array ();
		
		while ( $row = @mysql_fetch_array ( $results ) ) { //把查询结果重组成一个二维数组
			$data [$count] = $row;
			$count ++;
		}
		
		@mysql_free_result ( $results );
		if ($this->sqlshow == 1) {
			echo $sql;
		} elseif ($this->sqlshow == 2) {
			echo $sql;
			echo $this->msg;
		}
		return $data;
	}
	
	
	public function getCount($sql = "") {
		if (empty ( $sql ))
			return 0; //如果SQL语句为空则返回0
		if (empty ( $this->CONN ))
			return 0; //如果连接为空则返回0
		try { //捕获数据库选择错误并显示错误文件
			$results = mysql_query ( $sql, $this->CONN );
		} catch ( Exception $e ) {
			$this->msg = $e;
		
		//include (ERRFILE);
		}
		if ((! $results) or (empty ( $results ))) { //如果查询结果为空则释放结果并返回0
			@mysql_free_result ( $results );
			return 0;
		}
		$countrs = mysql_fetch_array ( $results );
		$countnum = $countrs [0];
		@mysql_free_result ( $results );
		if ($this->sqlshow == 1) {
			echo $sql;
		} elseif ($this->sqlshow == 2) {
			echo $sql;
			echo $this->msg;
		}
		return $countnum;
	}
	
	
	public function getCountRows($sql = "") {
		if (empty ( $sql ))
			return 0; //如果SQL语句为空则返回0
		if (empty ( $this->CONN ))
			return 0; //如果连接为空则返回0
		try { //捕获数据库选择错误并显示错误文件
			$results = mysql_query ( $sql, $this->CONN );
		} catch ( Exception $e ) {
			$this->msg = $e;
		
		//include (ERRFILE);
		}
		if ((! $results) or (empty ( $results ))) { //如果查询结果为空则释放结果并返回0
			@mysql_num_rows ( $results );
			return 0;
		}
		$countnum = mysql_num_rows ( $results );
		@mysql_free_result ( $results );
		if ($this->sqlshow == 1) {
			echo $sql;
		} elseif ($this->sqlshow == 2) {
			echo $sql;
			echo $this->msg;
		}
		
		return $countnum;
	}
	
	public function checkIsExist($sql = "") {
		if (empty ( $sql )) {
			return 1; //如果SQL语句为空则返回0
		} else {
			if (empty ( $this->CONN )) {
				return 2; //如果连接为空则返回0
			} else {
				try { //捕获数据库选择错误并显示错误文件
					$results = mysql_query ( $sql, $this->CONN );
				} catch ( Exception $e ) {
					$this->msg = $e;
				
		//include (ERRFILE);
				}
				if ((! $results) or (empty ( $results ))) { //如果查询结果为空则释放结果并返回0
					//@mysql_num_rows ( $results );
					return 3;
				} else {
					$countnum = @mysql_num_rows ( $results );
					@mysql_free_result ( $results );
					if ($this->sqlshow == 1) {
						echo $sql;
					} elseif ($this->sqlshow == 2) {
						echo $sql;
						echo $this->msg;
					}
					if ($countnum > 0) {
						return 4;
					} else {
						return 5;
					}
				}
			}
		}
	
	}
	
	
	public function getCheckIsExist($field_value, $name, $field = "id") {
		$sql = "SELECT `" . $field . "` FROM `" . $name . "` WHERE `" . $field . "` = '$field_value'";
		return $this->checkIsExist ( $sql );
	
	}
	
	
	public function insert($sql = "") {
		if (empty ( $sql ))
			return 0; //如果SQL语句为空则返回FALSE
		if (empty ( $this->CONN ))
			return 0; //如果连接为空则返回FALSE
		try { //捕获数据库选择错误并显示错误文件
			$results = mysql_query ( $sql, $this->CONN );
		} catch ( Exception $e ) {
			$this->msg = $e;
		
		//include (ERRFILE);
		}
		if ($this->sqlshow == 1) {
			echo $sql;
		} elseif ($this->sqlshow == 2) {
			echo $sql;
			echo $this->msg;
		}
		if (! $results) //如果插入失败返回0，否则返回当前插入数据ID
			return 0;
		else
			return @mysql_insert_id ( $this->CONN );
	}
	
	
	public function insertNew($sql = "") {
		if (empty ( $sql ))
			return 0; //如果SQL语句为空则返回FALSE
		if (empty ( $this->CONN ))
			return 0; //如果连接为空则返回FALSE
		try { //捕获数据库选择错误并显示错误文件
			$results = mysql_query ( $sql, $this->CONN );
		} catch ( Exception $e ) {
			$this->msg = $e;
		
		//include (ERRFILE);
		}
		if ($this->sqlshow == 1) {
			echo $sql;
		} elseif ($this->sqlshow == 2) {
			echo $sql;
			echo $this->msg;
		}
		if (! $results) //如果插入失败返回0，否则返回当前插入数据ID
			return 0;
		else
			return 1;
	}
	
	
	public function update($sql = "") {
		if (empty ( $sql ))
			return false; //如果SQL语句为空则返回FALSE
		if (empty ( $this->CONN ))
			return false; //如果连接为空则返回FALSE
		try { //捕获数据库选择错误并显示错误文件
			$result = mysql_query ( $sql, $this->CONN );
		} catch ( Exception $e ) {
			$this->msg = $e;
		
		//include (ERRFILE);
		

		}
		if ($this->sqlshow == 1) {
			echo $sql;
		} elseif ($this->sqlshow == 2) {
			echo $sql;
			echo $this->msg;
		}
		return $result;
	}
	
	public function delete($sql = "") {
		if (empty ( $sql ))
			return false; //如果SQL语句为空则返回FALSE
		if (empty ( $this->CONN ))
			return false; //如果连接为空则返回FALSE
		try {
			$result = mysql_query ( $sql, $this->CONN );
		} catch ( Exception $e ) {
			$this->msg = $e;
		
		//include (ERRFILE);
		}
		if ($this->sqlshow == 1) {
			echo $sql;
		} elseif ($this->sqlshow == 2) {
			echo $sql;
			echo $this->msg;
		}
		return $result;
	}
	
	public function begintransaction() {
		mysql_query ( "SET  AUTOCOMMIT=0" ); //设置为不自动提交，因为MYSQL默认立即执行
		mysql_query ( "BEGIN" ); //开始事务定义
	}
	
	public function rollback() {
		mysql_query ( "ROOLBACK" );
	}
	
	public function commit() {
		mysql_query ( "COMMIT" );
	}
	
	public function getInfo($id, $name, $field_id = "id") {
		$sql = "SELECT * FROM `" . $name . "` WHERE $field_id = '{$id}' LIMIT 1";
		$r = $this->select ( $sql );
		return $r [0];
	}
	
	public function insertData($name, $data) {
		$field = implode ( ',', array_keys ( $data ) ); //定义sql语句的字段部分
		$i = 0;
		foreach ( $data as $key => $val ) //组合sql语句的值部分
{
			$value .= "'" . $val . "'";
			if ($i < count ( $data ) - 1) //判断是否到数组的最后一个值
				$value .= ",";
			$i ++;
		}
		$sql = "INSERT INTO `" . $name . "`(" . $field . ") VALUES(" . $value . ")";
		// echo $sql."<br>";
		

		return $this->insert ( $sql );
	
	}
	
	public function insertDataNew($name, $data) {
		$field = implode ( ',', array_keys ( $data ) ); //定义sql语句的字段部分
		$i = 0;
		foreach ( $data as $key => $val ) //组合sql语句的值部分
{
			$value .= "'" . $val . "'";
			if ($i < count ( $data ) - 1) //判断是否到数组的最后一个值
				$value .= ",";
			$i ++;
		}
		$sql = "INSERT INTO `" . $name . "`(" . $field . ") VALUES(" . $value . ")";
		// echo $sql."<br>";
		

		return $this->insertNew ( $sql );
	
	}
	
	
	public function createTable($name, $data) {
		
		$field = array ();
		foreach ( $data as $key => $value ) {
			$field [] = '`' . $key . '`' . " varchar(100) ";
		}
		$sql = "CREATE TABLE `" . $name . "`( `id` int(20) not null auto_increment,PRIMARY KEY  (`id`)," . implode ( ',', $field ) . ")";
		
		//echo $sql."<br>";
		if ($this->sqlshow == 1) {
			echo $sql;
		} elseif ($this->sqlshow == 2) {
			echo $sql;
			echo $this->msg;
		}
		return mysql_query ( $sql, $this->CONN );
	}
	
	
	public function updateData($name, $id, $data, $field_id = "id") {
		$col = array ();
		foreach ( $data as $key => $value ) {
			$col [] = '`' . $key . '`' . "='" . $value . "'";
		}
		$sql = "UPDATE `" . $name . "` SET " . implode ( ',', $col ) . " WHERE $field_id = '$id'";
		//echo $sql;
		return $this->update ( $sql );
	}
	
    public function updateDataNew($name, $field_v, $field,$data ) {
		$col = array ();
		foreach ( $data as $key => $value ) {
			$col [] = '`' . $key . '`' . "='" . $value . "'";
		}
		$sql = "UPDATE `" . $name . "` SET " . implode ( ',', $col ) . " WHERE $field= '{$field_v}'";
		//echo $sql;
		return $this->update ( $sql );
	}
	
	
	public function delData($id, $name, $field_id = "id") {
		if (is_array ( $id )) {
			$arr_id = implode ( ',', $id );
			$sql = "DELETE FROM `" . $name . "` WHERE $field_id in ($arr_id)";
		} else {
			$sql = "DELETE FROM `" . $name . "` WHERE $field_id = $id";
		}
		return $this->delete ( $sql );
	}

}
?>
