<div class="text-center">
    <a class="pull-right hide-modal" href="javascript:void(0);" onclick="closemodal(this)">X</a>
    <div class="appt_box" id="phone_form">
        <h3>Login</h3>                
        <form  action="world/login" class="margin_b_30" id="generallogin" method="post">
            <div id="resmsg" style="display: none;">
                <label id="msg" style="color: #EE6358;"></label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control useremail" placeholder="Email address or Phone number" value="" name="email" maxlength="150" autofocus />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" maxlength="16"  />
            </div>
            <button type="submit" class="btn btn-primary btn-block form_btn has-spinner" id="g_login">Login</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="<?php echo PUB ?>js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo PUB ?>plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="<?php echo PUB ?>plugins/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        // $('#signuppages').click(function(e){
        //      $(".logintwig").load(__SITEURL + '{{ "forms/signup" }}');
        // });

        // $('.useremail').on('change',function(){
        //     var email = $(this).val();
        //     email = $.trim(email);
        //     $(this).val(email);
        // })
    });
</script>
