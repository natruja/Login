<?php
class DB{
 	private static  $_instance = null;
 	private $_pdo,
 			$_query,
 			$_error = false,
 			$_results,
 			$_count = 0;

 	private function __construct()
 	{
 		try {
 			$this->_pdo = new PDO('mysql:host='.config::get('mysql/host').';dbname='.config::get('mysql/db'), config::get('mysql/username'), config::get('mysql/password') );
 		} catch (PDOException $e) {
 			die($e->getMessage());
 		}

 	}

 	public static function getInstance()
 	{
 		if (!isset(self::$_instance)) {
 			self::$_instance = new DB();
 		}
 		return self::$_instance;
 	}

 	public function query($sql, $params = array())
 	{
 		$this->_error = false;
 		if ($this->_query = $this->_pdo->prepare($sql)) {
 			$x = 1;
 		 	if (count($params)) {
 		 		foreach ($params as $param) {
 		 			 $this->_query->bindValue($x, $param);
 		 			 $x++;
 		 		}
 		 	}
 		 	if ($this->_query->execute()) {
 		 		 $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
 		 		 $this->_count = $this->_query->rowCount();
 		 	} else {
 		 		$this->_error = true;
 		 	}
 		}
 		return $this;
 	}
 	public function action ($action , $table, $where = array())
 	{
   		if (count($where) === 3) {
   			$operators = array("=", ">", "<", ">=", "<=");
   			$filed    = $where[0];
   			$operator = $where[0];
   			$value    = $where[0];
      	}
 	}
 	public function get($table, $where)
 	{
 	}
 	public function delete($table, $where)
 	{
 	}

 	public function error()
 	{
 		return $this->_error;
 	}
}
