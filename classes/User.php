<?php 
class User{
	private $_db, $_data;

	public function __construct($user = null){
			$this->_db = DB::getInstance();
	}
	public  function create($fileds = array()){
		if(!$this->_db->insert('users', $fileds)){
			throw new Exception("Theres was a problem creating an account.");
		}
	}
	public function find($user = null){
		if($user){
			$filed = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('users', array($filed, '=', $user));
			 
			if($data->count()){
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}
	public function login($username = null, $password = null){
			
			$user = $this->find($username);
			if($user){
				 if($this->data()->password === Hash::make($password, $this->data()->salt)){
			 	 	echo "ok";
			 	}
			}
			


		return false;
	}
	private function data(){
		return $this->_data;
	}
}

?>