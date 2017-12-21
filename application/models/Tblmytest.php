<?php

class Tblmytest extends CI_Model{

	public $id= '';
	public $name= '';
	public $salary= '';

	public function __construct(){
		$this->load->database();
	}
	public function getlist(){
		$query = $this->db->get('mytest');
		// print_r( $query);exit;
		return $query->result_array();

	}

	public function saveitems($params = array()){
		// print_r($params);exit;
		if(!empty($params)){
			return $this->db->insert('mytest', $params);
		}
	}

	public function deleteitem($id){
		// print_r($id);exit;
		$return = array();
		$this->db->where('id',$id);
		$deleterecord = $this->db->delete('mytest');
		if($deleterecord){
			$return['msg'] = 'record deleted successfully';
			// redirect(LINKPATH.'Home');
		}
		return $return;
	}
	// public function updateitem($id){
	// 	// print_r($id);exit;
	// 	$return = array();
	// 	$this->db->where('id',$id);
	// 	$updaterecord = $this->db->update('mytest');
	// 	if($updaterecord){
	// 		$return['msg'] = 'record updated successfully';
	// 		// redirect(LINKPATH.'Home');
	// 	}
	// 	return $return;
	// }
}

?>