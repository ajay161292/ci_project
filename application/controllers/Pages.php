<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('menu_lib');
		// $this->load->helper('url');
	}
	public function aboutus(){
		$this->load->view('templates/header');
		$this->load->view('pages/about');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	}
	public function contact(){
		$this->load->view('templates/header');
		$this->load->view('pages/contact');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	}
	public function services(){
		$this->load->view('templates/header');
		$this->load->view('pages/services');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	}
	public function solutions(){
		$this->load->view('templates/header');
		$this->load->view('pages/solutions');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	}
}

?>