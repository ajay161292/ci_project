<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class TestEmail extends CI_Controller
{
	
	public function __construct($arg ="")
	{
		parent::__construct();
	}

	public function index(){
		$this->load->library('email');
		$this->email->abc();
	}
}


