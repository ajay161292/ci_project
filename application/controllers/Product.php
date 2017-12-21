<?php
/**
* 
*/
class Product extends CI_Controller
{
	
	public function __construct($arg ="")
	{
		parent::__construct();
	}

	public function index(){
		// printr($_SESSION,1);
		if(isset($_SESSION['user_id']) && isset($_SESSION['username']) ){
			$this->load->model('products');
			$productlist = $this->products->getallproduct();
			// printr($productlist,1);
			$data['productlist'] = $productlist;
			$this->load->view('product/dashboard',$data);	
		}
		else{
			redirect('product/loginpopup');
			// $this->load->view('product/loginform');
			// self::loginpopup();
		}
	}

	public function loginpopup(){
		// $this->load->view('world/ajaxloginpage');
		// printr($_SESSION,1);
		// $this->load->helper(array('form', 'url'));
		// $this->load->library('form_validation');
		if(isset($_SESSION['user_id']) && isset($_SESSION['username']) ){
			$this->load->view('product/dashboard');	
		}
		else{
			$this->load->view('product/loginform');
		}
	}

	public function login(){
		// printr($_SESSION,1);
		// if(empty($_SESSION['user_id']) or empty($_SESSION['username']) ){
		// 	// redirect('product/index');
		// 		// printr($_POST,1);exit;
		// }
		// else{
		// 	redirect('product/index');
		// }
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if(isset($username)){

			$this->load->model('login_check');
			$valid_user_id = $this->login_check->check_user($username,$password);
			// printr($valid_user_id,1);
			if($valid_user_id > 0){
				// session_start();
				// $this->load->library('session');
				$this->session->set_userdata('user_id',$valid_user_id);
				$this->session->set_userdata('username',$username);
				// printr($this->session->username,1);
				// printr($_SESSION,1);
				$data = array();
				$data['username'] =$this->session->username;
				
				$this->load->model('products');
				$productlist = $this->products->getallproduct();
				// printr($productlist,1);
				$data['productlist'] = $productlist;
				// printr($data,1);
				$this->load->view('product/dashboard',$data);
			}
			else{
				redirect('product/loginpopup');
				// $this->load->view('product/loginform');
			}
		}
	}

	public function logout(){
		$this->load->library('session');
		$array_items = array('username', 'user_id');
		$this->session->unset_userdata($array_items);
		return redirect('product/index');
	}

	public function getajaxsubcategory(){
		// printr($_POST,1);exit;
		$catid = $this->input->get_post('catid');
		// printr($catid,1);
		$this->load->model('products');
		$data['subcategory'] = $this->products->getsubcategory($catid);
		// printr($data,1);
		return $this->output
		            ->set_content_type('application/json')
		            ->set_status_header(200)
		            ->set_output(json_encode(array(
		                    'text' => 'success',
		                    'data' => $data,
		                    'status' => '1'
		            )));
	}

	public function addproduct(){
		$data = array();
		$this->load->model('products');
		$data['category'] = $this->products->getallcategory();
		// printr($data,1);
		$this->load->view('product/add_product',$data);
	}

	public function saveproduct(){
		// printr($_FILES['logo']);
		printr($_POST,1);
		$status = 0;
		$data = array();

		$product_name = $this->input->post('product_name');
		$category_id = $this->input->post('category');
		$subcategory_id = $this->input->post('subcategory');
		$description = $this->input->post('description');
		$status = $this->input->post('status');

		
		$config['upload_path'] = './uploads/products';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '100';
		$config['max_width'] = '100';
		$config['max_height'] = '100';

		$this->load->library('upload',$config);
		// printr($this->upload->data(),1);
		if (!$this->upload->do_upload('logo'))
        {
        	// echo"asdasg";exit;
            $error = array('error' => $this->upload->display_errors('<p>', '</p>'));
		    $this->load->view('product/add_product', $error);
		    $logo = "";
        }
        else
        {
        	// printr($this->upload->data(),1);
            $image_data = array('upload_data' => $this->upload->data());
            $this->load->view('product/dashboard', $image_data);
        	$logo = $this->upload->data('file_name');
        }
        
        $savedata = array();
		$savedata['product_name'] = $product_name;
		$savedata['category_id'] = $category_id;
		$savedata['subcategory_id'] = $subcategory_id;
		$savedata['description'] = $description;
		$savedata['status'] = $status;
		$savedata['logo'] = $logo;
		
		// printr($savedata,1);
		$this->load->model('products');
		if($this->products->saveproduct($savedata)){
			$status = 1;
			$data['message'] = "Product saved Successfully";
			// redirect('product/index');
		}
		else{
			$status = 0;
			$data['message'] = "Somethig Wrong!";
		}

		return $this->output
		            ->set_content_type('application/json')
		            ->set_status_header(200)
		            ->set_output(json_encode(array(
		                    // 'text' => 'success',
		                    'data' => $data,
		                    'status' => $status
		            )));
	}

	public function editproduct($pid){
		$this->load->helper('form');
		// $pid = $this->input->post('id');
		// printr($pid,1);

		$this->load->model('products');
		$data['detail'] = $this->products->getproductdetail($pid);
		$data['category'] = $this->products->getallcategory();
		$data['subcategory'] = $this->products->getallsubcategory();
		// printr($data,1);
		$this->load->view('product/edit_product',$data);

	}
	public function updateproduct(){

	}


	public function deleteproduct(){
		// echo'asdjgash';
		$pid = $this->input->get_post('id');
		// printr($pid,1);
		if($pid > 0){
			$this->load->model('products');
			$res = $this->products->deleteproduct($pid);
			// printr($res,1);
			if($res > 0){
				return $this->output
				            ->set_content_type('application/json')
				            ->set_status_header(200)
				            ->set_output(json_encode(array(
				                    'text' => 'Record Deleted Successfully',
				                    // 'type' => 'danger',
				                    'status' => '1'
				            )));
			}
			else{
				return $this->output
				            ->set_content_type('application/json')
				            ->set_status_header(500)
				            ->set_output(json_encode(array(
				                    'text' => 'Error 500',
				                    'type' => 'danger',
				                    'status' => '0'
				            )));
			}
		}

	}
	
}
