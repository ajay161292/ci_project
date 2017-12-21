<?php
class TblCountries extends My_Model{

public $id;
public $sortname;
public $name;
public $phonecode;
public $table = 'countries';


// public function __construct(){
// 	parent::__construct();	
// 	$this->load->database();
	
// 	// //Connecting to Multiple Databases
// 	// $DB1 = $this->load->database('group_one', TRUE);
// 	// $DB2 = $this->load->database('group_two', TRUE);

// }

public function getallcountrieslist(){
	$return = array();
	// //regular queries
	// $res = $this->db->query("SELECT * FROM $this->table ");
	$res = $this->db->get($this->table);
	$return = $res->result();
	// echo'<pre>';print_r($res);exit;
	return $return;
}

}

?>