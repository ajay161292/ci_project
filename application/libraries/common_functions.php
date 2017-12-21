<?php
class Common_Functions{
	
	public function __construct()
	{
		$this->CI = & get_instance();
	}

	public function printr($val,$die=0)
	{
		// echo'jaksdhkash';exit;
	    if(is_array($val))
	    {
	        echo "<pre style='color:#000'>";
	        print_r($val);
	        echo "</pre>";
	    }
	    else if(is_object($val))
	        var_dump($val);
	    else
	        echo $val;
		
		if($die == 1)
			die('Output Stopped..');
	}

}

?>