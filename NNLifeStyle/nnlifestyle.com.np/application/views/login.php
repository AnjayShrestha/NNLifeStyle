<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
</head>

<body>
<?php 
$this->load->view('include/header');
?>
       
<div style="background-image: url(<?php echo base_url('assets/images/rix0o97hv5.jpg'); ?>);" class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
        
   <div class="page-container">
   		<div class="container">
        	<div class="nsodetails addBox">
<div class="rlogin">
<div class="row">
<div class="clientLogin">
<h1 align="center">Login / Register</h1>
  	<div class="col-md-6">
    	<div class="box-border">

<h2>Already registered? Login</h2>

<div class="result"></div>

<form method="post" class="login-form">

<div class="form-group">
	<input name="useridentity" type="text" id="useridentity" class="form-control" placeholder="Email Address">
</div>

<div class="form-group">
	<input name="password" type="password" id="password" class="form-control" placeholder="password">
</div>

<div class="form-group">
	<a href="<?php echo base_url("user/forgot-password"); ?>" >Forgot your password?</a>
</div>

<div class="form-group">
	<button id="login" class="btn btn-block">Login</button>
</div>
</form>

</div><!--box-border-->

    </div>
    
    <div class="col-md-6" style="font-family:Arial, Helvetica, sans-serif;">
    <div class="box-border regbox">

<h2>Register</h2>


<div class="form-group">
<a href="<?php echo base_url("register"); ?>"><button class="btn btn-block">Register</button></a>
</div>



</div>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
    </div>
</div>
        </div>
        <!-- container -->
   </div>
   <!-- page-container -->
   <div class="clearfix"></div>
   
<?php $this->load->view('include/footer'); ?>

<script>
$(document).on('click', '#login', function (e) {
	$('.login-form').submit(false);
	var dataString = $('.login-form').serialize();
	
	$.ajax({
		type: "POST",
		url: "<?php echo base_url("front/logg_in"); ?>",
		data: dataString,
		beforeSend: function(){
			$('.result').html("<i class='fa fa-refresh fa-spin fa-3x fa-fw'></i> Authenticating...");
		},
		success: function(data)
		{
			$('.result').fadeOut(0).html(data).fadeIn(500);
		}
	});
});


$('#useridentity').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $("#login").trigger('click');
		return false;     
    }
});

$('#password').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $("#login").trigger('click');
		return false;     
    }
});
</script>
</body>
</html>