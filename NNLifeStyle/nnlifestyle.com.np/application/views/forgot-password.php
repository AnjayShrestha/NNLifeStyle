<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon"/>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/j-forms.css" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">

<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body class="forgot-password">
<?php $this->load->view('include/header'); ?>

<div style="background-image: url(<?php echo base_url('assets/images/rix0o97hv5.jpg'); ?>);" class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Forgot Password</h2>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
        
   <div class="page-container">
   		<div class="container nsodetails">
        	<div class="profile">
<div class="contain-details">
<div class="regiser-account">
<form method="post" class="j-forms j-multistep register-form" id="j-forms" action="<?php echo base_url("user/forgot-password"); ?>">
<div class="reg-block">
<h2>Type your email address.</h2>

<div class="result"><?php echo $msg; ?></div>



<div class="j-row">
<div class="span8 unit col-md-offset-2">

<div class="input">

<label class="icon-right" for="email">

<i class="fa fa-envelope"></i>

</label>

<input type="text" id="email" placeholder="Your email address" name="email">

</div>

</div>
</div><!--j-row-->

<!--j-row-->



</div><!--end of reg-block-->

<hr>

<div class="clearfix"></div><br />

<input name="password" type="hidden" id="password" value="<?php echo $password; ?>">
<div align="center"><button type="submit" class="btn" style="padding-left: 15px; padding-right: 15px;">Get New Password</button></div>

</form>
<div class="clearfix"></div>
</div>


</div>
<!--contain-details-->

</div>
        </div>
        <!-- container -->
   </div>
   <!-- page-container -->
   <div class="clearfix"></div>
   
<?php $this->load->view('include/footer'); ?>
</body>
</html>