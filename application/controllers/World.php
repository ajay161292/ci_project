<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class World extends My_Controller{

	// public function __construct(){
	// 	parent::__construct();
	// 	// $this->load->model('TblCountries');
	// 	$this->load->library('menu_lib');
	// 	// $this->load->library('common_functions');
	// }

	public function index(){
		//traditional way to initialize object
		// $Countries = new TblCountries();
		// $data['countries'] = $Countries->getallcountrieslist();

		//CI way to initialize object
		$this->load->model('TblCountries');
		// $this->load->model('TblCountries', '', TRUE);
		$data['countries'] = $this->TblCountries->getallcountrieslist();

		// printr($data);exit;
		
		$this->load->view('templates/header',$data);
		$this->load->view('world/index',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');

		// $query = $this->db->query("SELECT * FROM countries");
		// $this->table->set_heading('Id', 'ShortName', 'Name','PhoneCode');
		// echo $this->table->generate($query);
	}
	// public function loginpopup(){
	// 	// $this->load->view('world/ajaxloginpage');
	// 	// printr($_SESSION,1);
	// 	$this->load->helper(array('form', 'url'));
	// 	$this->load->library('form_validation');

	// 	$this->load->view('world/loginform');
		

	// }
	// public function login(){
	// 	$this->load->helper(array('form', 'url'));
	// 	$this->load->library('form_validation');
		
	// 	// printr($_SESSION,1);

	// 	$this->form_validation->set_rules('username', 'Username', 'required');
 //        $this->form_validation->set_rules('password', 'Password', 'required',
 //                array('required' => 'You must provide a %s.')
 //        );
 //        // $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
 //        // $this->form_validation->set_rules('email', 'Email', 'required');

	// 	if ($this->form_validation->run() == FALSE)
	// 	{
	// 	    $this->load->view('world/loginform');
	// 	}
	// 	else
	// 	{
	// 		// print_r($_POST);exit;
	// 		$username = $this->input->post('username');
	// 		$password = $this->input->post('password');

	// 		$this->load->model('login_check');
	// 		$valid_user_id = $this->login_check->check_user($username,$password);
	// 		// printr($valid_user_id,1);
	// 		if($valid_user_id > 0){
	// 			// session_start();
	// 			$this->load->library('session');
	// 			$this->session->set_userdata('user_id',$valid_user_id);
	// 			$this->session->set_userdata('username',$username);
	// 			// printr($this->session->username,1);
	// 			$data = array();
	// 			$data['username'] =$this->session->username;
	// 			$this->load->model('product');
	// 			$productlist = $this->product->getallproduct();
	// 			// printr($productlist,1);
	// 			$data['productlist'] = $productlist;
	// 			$this->load->view('world/dashboard',$data);
	// 		}
	// 		else{
	// 			echo'username or password does not match';
	// 			$this->load->view('world/loginform');
	// 		}

	// 	}
	// }
	// public function logout(){
	// 	$this->load->library('session');
	// 	$array_items = array('username', 'user_id');
	// 	$this->session->unset_userdata($array_items);
	// 	return redirect('world/login');
	// }

	// public function editproduct($pid){
	// 	$this->load->helper('form');
	// 	// $pid = $this->input->post('id');
	// 	// printr($pid,1);

	// 	$this->load->model('product');
	// 	$product = $this->product->editproduct($pid);
	// 	printr($product,1);
	// 	$this->load->view('world/edit_product',$product);

	// }
	// public function updateproduct(){

	// }
	// public function deleteproduct(){
	// 	$pid = $this->input->post('id');

	// }
	// public function addproduct(){
	// 	// echo"asdmasbd";exit;
	// 	$this->load->view('add_product');
	// }
	// public function saveproduct(){

	// }

}

?>



