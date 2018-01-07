<?php

/**
* 
*/
class TblEmployee extends CI_Model
{
	
	public $table = 'employees';
	public function __construct($arg = "")
	{
		parent::__construct();
		$this->load->database();
	}

	public function getallemployee(){
		// $query = $this->db->select('*')
		// 		->from('employees')
		// 		->get();
		// $res = $query->result();
		// printr($res,1);
		$query = $this->db->get('employees',10);
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}
	public function addNewEmployee(){
		$fields = array(
			'first_name'=>$this->input->post('fname'),
			'last_name'=>$this->input->post('lname'),
			'gender'=>$this->input->post('gender'),
			'status'=>$this->input->post('status')
			);
		$this->db->insert('employees',$fields);
		if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function editEmployee(){
		$emp_id = $this->input->get('id');
		$this->db->where('emp_no',$emp_id);
		$query = $this->db->get('employees');
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function updateEmployee(){
		$empid = $this->input->post('empid');
		$fields = array(
			'first_name'=>$this->input->post('fname'),
			'last_name'=>$this->input->post('lname'),
			'gender'=>$this->input->post('gender'),
			'status'=>$this->input->post('status'),
			);
		$this->db->where('emp_no',$empid);
		$this->db->update('employees',$fields);
		if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function deleteEmployee(){
		$emp_id = $this->input->get('id');
		$this->db->where('emp_no',$emp_id);
		$this->db->delete('employees');
		if($this->db->affected_rows() > 0 ){
			return true;
		}
		else{
			return false;
		}
	}
}

?>