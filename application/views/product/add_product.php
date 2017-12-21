<?php 

// printr($_SESSION,1);
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0){
  echo 'Welcome to dashboard';
}
else{
  redirect('product/index');
}
?>


<div align = "right"><span>Welcome,<?php echo $_SESSION['username'] ?> | <a href="<?php echo 'logout';?>">Logout</a></span></div><br/>
<br/>
<div align="left" width="50";>
  <form name="addproduct" id="addproduct" method="post" enctype="multipart/form-data" action="saveproduct">
    <div class="form-group">
      <label for="product_name">Product name</label>
      <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name" required data-msg-required="Please enter Product name!">
    </div>
    
    <div class="form-group">
      <label for="category">Product Category</label>
      <?php  //printr($category,1); ?>
      <select class="form-control" name="category" id="category" required data-msg-required="Please select Category!">
        <option value="">Select Category</option>
        <?php 
         if($category){
          foreach ($category as $key => $value) {
              echo' <option value = "'.$value['id'].'">'.$value['category_name'].'</option>';
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="subcategory">Product Subcategory</label>
      <select class="form-control" name="subcategory" id="subcategory" required>
        <option value=""></option>
        
      </select>
    </div>
    
    <div class="form-group">
      <label class="custom-file">Product Logo (Only jpg/png/jpeg extensions allowed of 100*100 size)
    	  	<input type="file" name="logo" id="logo" onchange="loadFile(event)" class="custom-file-input" >
          <span id="file_error"></span>
    	  	<span class="custom-file-control"></span>
    	</label>
      <div class="position-relative preview" align="center" style="display:none;">
        <img class="rounded" id="output" width="100" height="100"/>
        <a href="javascript:void(0);" class="delete_logo">Delete</a>
      </div>
      
    </div>  

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3" required 
      data-msg-required="Please enter description!"></textarea>
    </div>
    
    <div class="form-check">
      <label class="form-check-label">Status</label>
        <input class="form-check-input" type="radio" name="status" id="status" value="1" checked> Active
        <input class="form-check-input" type="radio" name="status" id="status" value="2">Inactive
    </div>

  	<input type="submit" name="submit" value="Add Product" />
  	<a href="index" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>

  </form>
</div>


<script src = "<?php echo PUB.'plugins/jquery_validation/lib/jquery-3.1.1.js'?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PUB.'plugins/bootstrap/css/bootstrap.min.css'?>"/>
<script src = "<?php echo PUB.'plugins/bootstrap/js/bootstrap.min.js'?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PUB.'plugins/bootstrap-validator/css/bootstrapValidator.min.css'?>"/>
<script src = "<?php echo PUB.'plugins/bootstrap-validator/js/bootstrapValidator-0.5.3.js'?>"></script>
<script src = "<?php echo PUB.'plugins/jquery_validation/dist/jquery.validate.min.js'?>"></script>
<script src = "<?php echo PUB.'plugins/jquery_validation/dist/additional-methods.min.js'?>"></script>

<script>
// just for the demos, avoids form submit
// jQuery.validator.setDefaults({
//   debug: true,
//   success: "valid"
// });

$('#addproduct').validate({
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

$("#logo").on('change',function(){
  
    $("#file_error").html("");
    var file_size = $('#logo')[0].files[0].size;
    console.log(file_size);
    if(file_size>20000) {
      $("#file_error").html("File size is greater than 20kb");
      return false;
    }
      return true;
})


$(document).ready(function(){
  // $("#addproduct").bootstrapValidator({
  //   fields: {
  //           product_name: {
  //               validators: {
  //                   notEmpty: {
  //                       message: 'please enter product name'
  //                   }
  //               }
  //           },
  //           category: {
  //               validators: {
  //                   notEmpty: {
  //                       message: 'select category'
  //                   }
  //               }
  //           },
  //           subcategory: {
  //               validators: {
  //                   notEmpty: {
  //                       message: 'select subcategory'
  //                   }
  //               }
  //           },
  //           logo: {
  //               validators: {
  //                 notEmpty: {
  //                       message: 'select logo'
  //                   },
  //                   file: {
  //                       extension: 'jpeg,png,jpg,bmp',
  //                       type: 'image/jpeg,image/png',
  //                       maxSize: 100 * 100,
  //                       message: 'The selected file is not valid'
  //                   }
  //               }
  //           },
  //           description: {
  //               validators: {
  //                   notEmpty: {
  //                       message: 'Description is required'
  //                   }
  //               }
  //           },

  //       }
    
  // })
  // .on('success.form.bv', function(e) {
  //     // // Prevent form submission
  //     // e.preventDefault();
  //     // // Get the form instance
  //     // var formdata = $("#caseCreateForm").serializeArray();
  //     var $form = $(e.target);
  //     // console.log($form);
  //     // return false;
  //     // // Get the BootstrapValidator instance
  //     // var bv = $form.data('bootstrapValidator');
  //     // Use Ajax to submit form data
  //     $.post($form.attr('action'), $form.serialize(), function(result) {
  //           console.log(result);return false;
  //           if(result.data.status){
  //             alert(result.data.message);
  //             window.location.href = 'product/dashboard';
  //           }
  //           else{
  //             alert(result.data.message);
  //           }

  //     },'json');
  // });


  $("#category").on('change',function(){
    var cat_id = $(this).val();
    // console.log(cat_id);
    if(cat_id > 0){
      $.ajax({
        method: 'POST',
        data: {'catid':cat_id},
        url: 'getajaxsubcategory',
        success: function(response){
            // console.log(response.data);return false;
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

  // $('.delete_logo').click(function(){
  //   $.ajax({
  //     method: 'POST',
  //     data: '',
  //     url: '',
  //     success: function(response){
  //       console.log(data);
  //       if(response){

  //       }
  //       else{

  //       }
  //     }
  //   })
  // })
  $(".delete_logo").click(function(){
      console.log($(this).prev(".rounded").attr('src'));
      var img_src = $(this).prev(".rounded").attr('src')
      // $(img_src).remove();
      $(img_src).empty();
      
  });

})

var loadFile = function(event) {
  $(".preview").show();
  var output = document.getElementById('output');
  console.log(output);
  output.src = URL.createObjectURL(event.target.files[0]);
};

</script>