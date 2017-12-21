<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Tblmytest');
		$this->load->helper('url_helper');
	}

	public function index(){	
		$list = $this->Tblmytest->getlist();
		// print_r($list);exit;
		$data['list'] = $list;
		$this->load->view('home/home',$data);
	}

	public function additem(){
		// print_r($_POST);
		$name = $this->input->post('name');
		$salary = $this->input->post('salary');

		if(!empty($name) && !empty($salary)){
			$data = array("name"=>$name,"salary"=>$salary);
			$savedata = new Tblmytest();
			$save = $savedata->saveitems($data);
			// $save = $this->db->insert('mytest', $data);
			if($save){
				echo"record inserted successfully";
				// $this->load->view('home/home');
			}	
		}
		$this->load->view('home/add');
	}

	public function deleteitem($id=''){
		$id = $this->input->get('id');
		// print_r($id);exit;
		$this->load->model('Tblmytest');
		$deleterec = $this->Tblmytest->deleteitem($id);
		if($deleterec){
			echo $deleterec['msg'];
			// $this->load->view(LINKPATH.'home');
		}
	}

	public function updateitem($id=''){
		$id = $this->input->get('id');
		// print_r($id);exit;
		$this->load->database();
		$this->load->model('Tblmytest');

		if($this->input->post('name') && $this->input->post('salary')){
			
			$name = $this->input->post('name');
			$salary = $this->input->post('salary');

			$data = array(
					'name'=> $name,
					'salary'=> $salary);
			// print_r($data);exit;
			$this->db->where('id', $id);
			$updaterec = $this->db->update('mytest', $data); 
			// $updaterec = $this->db->update('mytest', $data, "id = '.$id.'");
			if($updaterec){
				echo'Record Updated Successfully';
			}
		}
		$query = $this->db->get_where('mytest',array('id'=>$id),0,0);
		// print_r($query);exit;
		if ($query->num_rows() > 0)
			{
			   	$row = $query->row();   
			   	$data['name'] =  $row->name;
			   	$data['salary'] = $row->salary;	  
			   	// $data['data'] = $data;
			   	// print_r($data);exit;
				$this->load->view('home/edit',$data);
			}
	}
}

?>