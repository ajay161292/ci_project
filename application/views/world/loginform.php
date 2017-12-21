<?php
// printr($_SESSION,1);
?>
<body><html>
<head>
<title>Login Form</title>
</head>
<body>

<?php //echo form_open('world/login'); ?>
<!-- <h5>Username</h5> -->
<!-- <input type="text" name="username" value="<?php //echo set_value('username'); ?>" size="50" /> -->
<?php //echo form_error('username', '<div class="error">', '</div>'); ?>
<!-- <h5>Password</h5> -->
<!-- <input type="text" name="password" value="<?php //echo set_value('password'); ?>" size="50" /> -->
<?php //echo form_error('password', '<div class="error">', '</div>'); ?>
<!-- <h5>Password Confirm</h5> -->
<!-- <input type="text" name="passconf" value="<?php //echo set_value('passconf'); ?>" size="50" />
<?php //echo form_error('passconf', '<div class="error">', '</div>'); ?>
<h5>Email Address</h5>
<input type="text" name="email" value="<?php //echo set_value('email'); ?>" size="50" />
<?php //echo form_error('email', '<div class="error">', '</div>'); ?> -->
<!-- <div><input type="submit" value="Submit" /></div>
</form> -->

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</body>
</html>

</body>
<script src = "<?php echo PUB.'plugins/jquery_validation/lib/jquery-3.1.1.js'?>"></script>
<script src = "<?php echo PUB.'plugins/jquery_validation/dist/jquery.validate.min.js'?>"></script>

<script>
  $("#loginform").validate({
    rules: {
      username: {
        required: true,
        email: true
      },
      password: {
        required: true,
      }
    },
    messages: {
      username: {
        required: 'Please enter usernme'
        // email: 'Please enter proper email id'
      }
    }
  })
</script>