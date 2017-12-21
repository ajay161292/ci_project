<?php
class Login_Check extends My_Model{
	
	private $username;
	private $password;
	private $table = 'user';

	public function __construct(){
		parent::__construct();
		$this->load->database();
		// $this->load->()
	}

	public function check_user($uname,$pass){
		// printr($pass);
		$q = array('username' => $uname,'password' => $pass);
		// $res = $this->db->select('SELECT * from '.$this->table)
		// 				->where($q);
		$q = $this->db->where($q)->get('user');
		$res  = $q->result();
		// $row  = $res->rows();
		// printr($res,1);
		if($res[0]){
			$uid = $res[0]->id;
			// $uname = $res[0]->username;
			return $uid;
		}
		else{
			return 0;
		}
	}

}

