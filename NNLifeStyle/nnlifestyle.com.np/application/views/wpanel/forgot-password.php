<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo BASENAME; ?> | Login</title>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
    <div class="row">
    	<div class="info">
        	<h1><?php echo BASENAME; ?></h1><span>Powered By <i class="glyphicon glyphicon-heart"></i> by <a href="http://megaweblink.com.np/" target="_blank">Mega Web Link</a></span>
      	</div>
        <!--info-->
        
        <div class="col-md-4 col-md-offset-4">
            <!-- begin login -->
            <div class="form">
            	<div class="circle" align="center">
            		<div style="background-image:url(<?php echo base_url("assets/images/logo.png"); ?>);" class="thumbnail"></div>
                </div>
                <form class="login-form" method="post">
                	<div id="div-login-msg">
                    	<div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                        <span id="text-login-msg"><?php echo $msg; ?></span>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="form-group has-feedback">
                        <input name="email" type="text" class="form-control" id="email" placeholder="Email Address">
                        <i class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></i>
                    </div>
                    
                    <input name="password" type="hidden" class="form-control" id="password" value="<?php echo $password; ?>">
                    <input name="submit" type="button" class="button" id="submit" value="Login"/>
                    
                    
                    
                    <div class="col-md-12" style="padding:0;">
                        <p class="message"><span onclick="location.href='<?php echo base_url(); ?>'"><i class="fa fa-long-arrow-left"></i> Back to Website</span> <a href="<?php echo base_url('wpanel'); ?>" class="forgot-password">Got ot Login Page</a></p>
                    </div>
                </form>
            </div>
            <!-- end login -->
        </div>
    </div>
    <!--row-->
</div>
<!--container-->

<script src="<?php echo base_url("assets/js/ajax.js"); ?>"></script>
<script>
$(document).on('click', '#submit', function (e) {
	var dataString = $('.login-form').serialize();
	
	$.ajax({
		type: "POST",
		url: "<?php echo base_url("checking-forgot-password"); ?>",
		data: dataString,
		success: function(data)
		{
			$('#text-login-msg').fadeOut(0).html(data).fadeIn(500);
			$('.login-form')[0].reset();
		}
	});
});


$('#email').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $("#submit").trigger('click');
		return false;     
    }
});
</script>
</body>
</html>