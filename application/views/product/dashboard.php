<?php 

// echo site_url();
// echo base_url();
// printr($_SESSION,1);
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0){
	echo 'Welcome to dashboard';
}
else{
	redirect('product/index');
}
?>

<div align = "left">
	<a href="<?php echo site_url(); ?>">Home</a> | 
	<a href="<?php echo site_url('employee'); ?>">Employee</a>
</div>
<br/>

<div align = "right"><span>Welcome,<?php echo $_SESSION['username'] ?> | <a href="<?php echo 'logout';?>">Logout</a></span></div><br/>
<br/>

Products List 
<div align = "right"><a href="<?php echo site_url('product/addproduct'); ?>">Add Product</a></div><br/>
<table class="table table-striped " id="productlist">
<thead class="thead-dark">
	<tr>
		<th>Product Name</th>
		<th>Category Name</th>
		<th>SubCategory Name</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>

<?php
// printr($productlist,1);
if(!empty($productlist)){

	foreach ($productlist as $value) {
		echo'<tr>
				<td>'.$value['product_name'].'</td>
				<td>'.$value['category_name'].'</td>
				<td>'.$value['subcategory_name'].'</td>
				<td>' ?>
				<?php 
				if($value['status'] == 1){
					echo 'Active';
				}
				else{
					echo 'Inactive';
				}
				echo '</td>'?>
				<td><a href="<?php echo site_url("product/editproduct/".$value['id']) ?>" > Edit</a>
				| 
				<a href="javascript:void(0);" data-id="<?php echo $value['id'] ?>" class="delete_product">Delete</a>
				</td> 
			</tr>
<?php	}	
} 
?>
</tbody>
</table>

<script src = "<?php echo PUB.'plugins/jquery_validation/lib/jquery-3.1.1.js'?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PUB.'plugins/bootstrap/css/bootstrap.min.css'?>"/>
<script src = "<?php echo PUB.'plugins/bootstrap/js/bootstrap.min.js'?>"></script>
<script src = "<?php echo PUB.'plugins/Datatables/datatables.min.js'?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PUB.'plugins/Datatables/datatables.css'?>"/>

<script>
$(document).ready(function() {
    $('#productlist').DataTable();

    $('.delete_product').click(function(){
    	if (confirm("Are you sure to delete product ? ") == true) {
		    
	    	var pid = $(this).data('id');
	    	// console.log(pid);return false;
	    	$.ajax({
	    		methos: 'POST',
	    		url: 'deleteproduct',
	    		data: {id:pid},
	    		complete: function(response){
	    			// console.log(response);return false;
	    			if(response.status){
	    				alert('Record is deleted Successfully!');
	    			}
	    			else{
	    				alert('Try Again!');	
	    			}
	    		}
	    	})
		}
    });

});

</script>
