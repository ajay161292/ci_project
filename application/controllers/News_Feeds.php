<?php
class News_Feeds extends CI_Controller
{
	
	public function __construct($arg="")
	{
		parent::__construct();
	}

	public function index(){
		$this->load->library('fbgraphsdk');
		$this->fbgraphsdk->getfeeds();
	}
}
