<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/

class Profiler extends CI_Controller
{
	
	function __construct($arg='')
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);


	}

	public function index(){

		$this->load->view('templates/header');
		$this->load->view('profiler/index');
	}
}

?>