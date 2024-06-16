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
<style>
.profile{background:#fff; margin:0 auto 20px auto; width:80%; padding:20px; border:1px #fff dashed;}
</style>
</head>

<body>
<?php 
if($this->session->userdata('is_user_logged_in') != true){
	redirect('login');
}else{
	if(isset($_SERVER['HTTP_REFERER']) != "checkout") redirect('user-profile'); 
}
$this->load->view('include/header');
?>
 
<div style="background-image: url(<?php echo base_url('assets/images/rix0o97hv5.jpg'); ?>);" class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Order Successful</h2>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
  
   <div class="page-container">
   		<div class="container nsodetails">
        
        <div class="payment profile">

<h1>Thank You <?php echo $this->session->userdata("fname"); ?></h1>

<div class="clearfix"></div><br>

<div class="contain-details">

<div class="alert alert-success">
  <strong>Success!</strong> Your order is in process. We will get back to you asap.
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
</script>
</body>
</html>