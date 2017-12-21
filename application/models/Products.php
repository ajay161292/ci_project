<?php

/**
* 
*/
class Products extends CI_Model
{
	private $category_table = 'category';
	private $subcategory_table = 'subcategory';
	private $product_table = 'product';

	public function __construct($arg = "")
	{
		parent::__construct();
		$this->load->database();

	}
	public function getallproduct(){
		$query = $this->db->select("product.id,product.product_name,product.category_id,product.status,product.subcategory_id,category.category_name,subcategory.subcategory_name")
		->from('product')
		->where('product.status <> 0')
		->join('category','category.id = product.category_id','inner')
		->join('subcategory','subcategory.id = product.subcategory_id','inner')
		->get();
		$res = $query->result_array();
		// printr($res,1);
		if($res){
			$data = $res;
		}
		return $data;
	}

	public function getallsubcategory(){
		// $data = array();
		$query = $this->db->select("*")
		->from('subcategory')
		->get();
		$res = $query->result_array();
		// printr($res,1);
		if($res){
			$data = $res;
		}
		return $data;
	}

	public function getallcategory(){
		// $data = array();
		$query = $this->db->select('*')->get('category');
		$res = $query->result_array();
		// printr($res,1);
		if($res){
			$data = $res;
		}
		return $data;
	}

	public function getsubcategory($id){
		
		$query = $this->db->select('id,subcategory_name')->where('category_id',$id)->get('subcategory');
		$res = $query->result_array();
		// printr($res,1);
		if($res){
			return $res;
		}
		else{
			return 0;	
		}
	}

	public function saveproduct($data = array()){
		// printr($data,1);
		$res = $this->db->insert('product',$data);
		// printr($res,1);
		if($res){
			return 1;
		}
		else{
			return 0;
		}

	}

	public function getproductdetail($pid){
		// printr($pid,1);
		$query = $this->db->where('product.id',$pid)
						->select("product.id,product.product_name,product.category_id,product.description,product.logo,product.status,product.subcategory_id,category.category_name,subcategory.subcategory_name")
						->from('product')
						->join('category','category.id = product.category_id','left')
						->join('subcategory','subcategory.id = product.subcategory_id','left')
						->get();
		// printr($query,1);
		$res = $query->result_array();
		// printr($res,1);
		if($res){
			$data  = $res[0];
			return $data;
		}
	}

	public function updateproduct(){
		
	}


	public function deleteproduct($id=""){

		$data = array('status'=>'0');
		// $query = $this->db->delete($this->$product_table,array('id'=>$id));

		$query = $this->db->where('id',$id)->update('product',$data);
		// printr($query,1);
		if($query > 0){
			return 1;
		}
		else{
			return 0;	
		}



	}
}
