<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class HelperPractice extends CI_Controller
{
	
	public function __construct($arg = "")
	{
		parent::__construct();
	}

	public function index(){
		// echo'asldjh';exit;
		$this->load->helper('array');
		$arr = ['abc'=>'ABC','xyz'=>'XYZ'];
		echo element('ajay',$arr,'Not Found');
	}
}

?>