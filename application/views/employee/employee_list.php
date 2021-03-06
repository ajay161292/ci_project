<div class="container">
  <div class="alert alert-success" role="alert" style="display:none;"></div>
  <div align = "left">
    <a href="<?php echo site_url(); ?>">Home</a> | 
    <a href="<?php echo base_url('product'); ?>">Products</a>
  </div>
  <h3>Employee List</h3>
  <div>
    <p style="text-align:left;">
      <button class="btn btn-success addemp">Add New Employee</button>
    </p>
    <p style="text-align:right;">
      <a href="<?php echo base_url('employee/generateTCpdf'); ?>">
        <button class="btn btn-success">Create TCPDF</button>
      </a>
      <a href="<?php echo base_url('employee/generateDOMpdf'); ?>">
        <button class="btn btn-success">Create DOMPDF</button>
      </a>
    </p>
  </div>
  <table class="table table-striped table-responsive" id="emp_list" >
    <thead>
      <tr>
        <th scope="col">Employee Id</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Birth Date</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="showdata">
      
    </tbody>
  </table>
</div>
<!-- Modal -->
<div class="modal fade" id="mymodel" tabindex="-1" role="dialog" aria-labelledby="mymodel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mymodel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="my_form" method="post">
            <input type="hidden" name="empid" value="0">
            <div class="form-group">
              <label class="col-form-label" for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name">
            </div>
            
            <div class="form-group col-md-4">
              <label for="inputState">Gender</label>
                <select id="gender" name="gender" class="form-control">
                  <option value="M" selected>Male</option>
                  <option value="F">Female</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="inputState">Status</label>
              <select id="status" name="status" class="form-control">
                <option value="1" selected>Active</option>
                <option value="0">InActive</option>
              </select>
            </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnsaveemp" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deletemodel" tabindex="-1" role="dialog" aria-labelledby="deletemodel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure You want to delete record ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btndelete" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

<script src = "<?php echo PUB.'plugins/jquery_validation/lib/jquery-3.1.1.js'?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PUB.'plugins/bootstrap/css/bootstrap.min.css'?>"/>
<script src = "<?php echo PUB.'plugins/bootstrap/js/bootstrap.min.js'?>"></script>
<script src = "<?php echo PUB.'plugins/Datatables/datatables.min.js'?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PUB.'plugins/Datatables/datatables.css'?>"/>
<script>
// $(document).ready(function(){
  // var DataTable = $('#emp_list').DataTable();
  //method 1

// })
  //method 2
$(function(){

  showallEmployee();

  $(".addemp").click(function(){
    $("#mymodel").modal('show');
    $("#mymodel").find(".modal-title").text('Add New Employee');
    $("#my_form").attr('action','<?php echo base_url() ?>employee/addEmployee');
  });
  
  $("#btnsaveemp").click(function(){
    var url = $("#my_form").attr('action');
    var data = $("#my_form").serialize();
    //validate form
    var fname = $('input[name=fname]');
    var lname = $('input[name=lname]');
    var result = '';
    if(fname.val() == ""){
      fname.parent().parent().addClass('has-error');
    }
    else{
      fname.parent().parent().removeClass('has-error'); 
      result += '1';
    }
    if(lname.val() == ""){
      lname.parent().parent().addClass('has-error');
    }
    else{
      lname.parent().parent().removeClass('has-error'); 
      result += '2';
    }

    if(result == '12'){
      alert('ok');
    
      $.ajax({
        type: 'ajax',
        method: 'post',
        data: data,
        async: false,
        dataType: 'json',
        url: url,
        success: function(response){
          // console.log(response);return false;
          if(response.success){
            $("#mymodel").modal('hide');
            $("#my_form")[0].reset();
            if(response.type == 'add'){
              var type = 'Added';
            }else if(response.type == 'update'){
              var type = 'Updated';
            }
            $(".alert-success").html('Employee' + type + 'Successfully').fadeIn().delay(4000).fadeOut();
            showallEmployee();
          }
          else{
            alert('Error');
          }
        },
        error: function(){
          alert('Could not add data');
        }
      })
    }
  })

  $("#showdata").on('click','.item_edit', function(){
    var emp_id =$(this).attr('data');
    // alert(emp_id);
    $("#mymodel").modal('show');
    $("#mymodel").find(".modal-title").text('Edit Employee');
    $("#my_form").attr('action','<?php echo base_url() ?>employee/updateEmployee');
    $.ajax({
      type: 'ajax',
      method: 'get',
      url: "<?php echo base_url() ?>employee/editEmployee",
      data: {id:emp_id},
      async: false,
      dataType: 'json',
      success: function(data){
          console.log(data);
          $('input[name=fname]').val(data.first_name);
          $('input[name=lname]').val(data.last_name);
          $('select[name=gender]').val(data.gender);
          $('select[name=status]').val(data.status);
          $('input[name=empid]').val(data.emp_no);
      },
      error: function(){
        alert('Could not edit data');
      }
    })
  })

  $("#showdata").on('click','.item_delete', function(){
    var emp_id = $(this).attr('data');
    // alert(emp_id);
    $("#deletemodel").modal('show');
    $("#btndelete").click(function(){
      $.ajax({
        type: 'ajax',
        method: 'get',
        data: {id:emp_id},
        async: false,
        url: "<?php echo base_url() ?>employee/deleteEmployee",
        dataType: 'json',
        success: function(data){
          console.log(data);
          $('#deletemodel').modal('hide');
          $('.alert-success').html('Employee is deleted successfully').fadeIn().delay(4000).fadeOut('slow');
          showallEmployee();
        },
        error: function(){
          alert('Record Could not be deleted');
        }
      })
    })
  })

  function showallEmployee(){
    $.ajax({
      type: 'ajax',
      url: "<?php echo base_url() ?>employee/getallEmployee",
      async: false,
      dataType: 'json',
      success: function(data){
        console.log(data);
        var html ='';
        var i;
        for(i = 0; i < data.length; i++){
           html += '<tr>'+
                        '<td>'+data[i].emp_no+'</td>'+
                        '<td>'+data[i].first_name+'</td>'+
                        '<td>'+data[i].last_name+'</td>'+
                        '<td>'+data[i].birth_date+'</td>'+
                        '<td>'+data[i].status+'</td>'+
                        '<td>'+
                          '<a href="javascript:void(0);" class="btn btn-info item_edit" data="'+data[i].emp_no+'">Edit</a>'+
                          '<a href="javascript:void(0);" class="btn btn-danger item_delete" data="'+data[i].emp_no+'">Delete</a>'
                        '</td>'+
                    '</tr>';
        }
        $("#showdata").html(html);
      },
      error: function(){
        alert('Could not get data from database');
      }
    })
  }

})
</script>