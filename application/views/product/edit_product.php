<?php
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0){
  echo 'Welcome to dashboard';
}
else{
  redirect('product/index');
}
// printr($detail,1);
?>


<div align = "right"><span>Welcome,<?php echo $_SESSION['username'] ?> | <a href="<?php echo 'logout';?>">Logout</a></span></div><br/>
<br/>

<div class="container">
  	<form name="editproduct" id="editproduct" method="post" enctype="multipart/form-data" action="saveproduct">

<div class="row">
  	<div class="col-6 col-md-6">
	    <div class="form-group">
	      	<label for="product_name">Product name</label>
	      	<input type="text" name="product_name" class="form-control" id="product_name" value="<?php echo $detail['product_name'] ?>" placeholder="Product Name" required data-msg-required="Please enter Product name!">
	    </div>
	    
	    <div class="form-group">
	      <label for="category">Product Category</label>
	      <?php  //printr($category,1); ?>
	      <select class="form-control" name="category" id="category" data-url = <?php echo site_url('product/getajaxsubcategory') ?> required data-msg-required="Please select Category!">
	        <option>Select Category</option>
	        <?php 
	         if($category){
	          foreach ($category as $key => $value) { ?>
	        
	            <option value = "<?php echo ''.$value['id'].'' ?>"
	            	<?php if($value['id'] == $detail['category_id']){
	            				echo 'selected = selected' ;
	            			}
	            	?> >
	            	<?php echo $value['category_name']; ?>
	            </option>
	        
	        <?php }
	        }
	        ?>
	      </select>
	    </div>

	    <div class="form-group">
	      <label for="subcategory">Product Subcategory</label>
	      <select class="form-control" name="subcategory" id="subcategory" required data-msg-required="Please select subcategory!">
	        <option value=""></option>
	        	<?php 
		         	if($subcategory){
		          	foreach ($subcategory as $key => $value) { ?>
		        
		            <option value = "<?php echo ''.$value['id'].'' ?>"
		            	<?php if($value['id'] == $detail['subcategory_id']){
		            				echo 'selected = selected' ;
		            			}
		            	?> ><?php echo $value['subcategory_name']; ?>
		            </option>
		        
		        <?php }
		        }
		        ?>
	      </select>
	    </div>

	    <div class="form-group">
	      	<label for="description">Description</label>
	      	<textarea class="form-control" name="description" id="description" rows="3" required data-msg-required="Please enter description!"><?php echo $detail['description'] ?>
	      </textarea>
	    </div>
	</div>
	<div class="col-6 col-md-6">    
	    <div class="form-group">
	      	<label class="custom-file">Product Logo
	      		<img src="<?php echo site_url('uploads/products/'.$detail['logo']); ?>" align="center" />
	    	  	<input type="file" name="logo" id="logo" class="custom-file-input" onchange="loadFile(event)" required>
	    	  	<span id="file_error"></span>
	    	  	<span class="custom-file-control"></span>
	    	</label>

	    	<div class="position-relative preview" align="center" style="display:none;">
		        <img class="rounded" id="output" width="100" height="100"/>
		        <a href="javascript:void(0);" class="delete_logo">Delete</a>
		     </div>
	    </div>
	</div>
</div>	

<div class="row">	
	<div class="col-6 col-md-6">
		<input type="hidden" name="update_form" />
	  	<input type="submit" name="submit" value="Add Product" />
	  	<a href="<?php echo base_url()."product" ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
	</div>
</div>
  	</form>
</div>
</div>


<script src = "<?php echo PUB.'plugins/jquery_validation/lib/jquery-3.1.1.js'?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PUB.'plugins/bootstrap/css/bootstrap.min.css'?>"/>
<script src = "<?php echo PUB.'plugins/bootstrap/js/bootstrap.min.js'?>"></script>
<script src = "<?php echo PUB.'plugins/jquery_validation/dist/jquery.validate.min.js'?>"></script>
<script src = "<?php echo PUB.'plugins/jquery_validation/dist/additional-methods.min.js'?>"></script>
<script>

$(document).ready(function(){

  	$("#category").on('change',function(){
	    var cat_id = $(this).val();
	    // console.log(cat_id);
	    var page = $(this).data('url');
	    // console.log(page);
	    if(cat_id > 0){
	      $.ajax({
	        method: 'POST',
	        data: {'catid':cat_id},
	        url: page,
	        success: function(response){
	          // console.log(response);return false;
	          if(response.data.subcategory){
	             $("#subcategory").empty();
	                $.each(response.data.subcategory,function(key,value){
	                    $("#subcategory").append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
	                });
	          }
	          else{
	              $("#subcategory").empty();
	          }
	        }
	      	})
	    }
	    else{
	      	$("#subcategory").empty();
	    }
  	})

  	$(".delete_logo").click(function(){
      	// var baseURL = document.baseURI;
      	var baseURL = document.location.origin
      	// console.log(baseURL+"/ci_project/public/images/site/placeholder-image.png");
      	var blank = baseURL+"/ci_project/public/images/site/placeholder-image.png";
      	$("#output").attr("src",blank);
    	$(this).hide();
  	});

  	$("#logo").on('change',function(){
	    $("#file_error").html("");
	    var file_size = $('#logo')[0].files[0].size;
	    console.log(file_size);
	    if(file_size>50000) {
	      $("#file_error").html("File size is greater than 20kb");
	      return false;
	    }
	      return true;
	});

})

$('#editproduct').validate({
 	rules: {
      logo: {
        required: true,
        extension: "jpg|png|jpeg|bmp",
        // accept: "image/*",
        // filesize : 50000
      }
	},
	messages: {
	    logo: "Logo size must be below 50 kb"
	},
	submitHandler: function(form) {
	    $(form).submit();
	}
})

var loadFile = function(event) {
  $(".preview").show();
  var output = document.getElementById('output');
  console.log(output);
  output.src = URL.createObjectURL(event.target.files[0]);
};

</script>
