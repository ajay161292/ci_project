<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class My_Controller extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		// $this->load->model('TblCountries');
		$this->load->library('menu_lib');
		// $this->load->library('common_functions');
	}
}



?>