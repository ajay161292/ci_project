<?php
class Menu_lib{
	
	public function __construct()
	{
		$this->CI = & get_instance();
	}
	public function menu_navigation(){
		$menu = array(
					array('text'=>'Home', 'url'=>''),
					array('text'=>'About Us', 'url'=>'pages/aboutus'),
					array('text'=>'Service',  'url'=>'pages/services'),
					array('text'=>'Hooks & Profile Benchmarking', 'url'=>'profiler'),
					array('text'=>'AJAX CRUD', 'url'=>'employee'),					
					array('text'=>'Contact',   'url'=>'pages/contact') 
				);
		$html = '<ul>';
		foreach ($menu as $data){
			$html .= '<li>';
			$html .= anchor($data['url'],$data['text']);
			$html .= '<li>';
		}
		$html .= '<ul>';
		return $html;
	}
}

?>
