<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/j-forms.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
</head>
<style type="text/css">
	/*.usernav{
		background-color: #DCDCDC; 
		border-radius: 2px; 
		padding: 5px;
	}*/
	@media(max-width: 1200px){
		#shippingUpdate{
		margin-top: 5px;
	}
}
	
	
</style>
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
  
   <div class="page-container" style="margin-top: 15px;">
   		<div class="container nsodetails">
        
        <div class="client-dashboard">
<div class="profile">
<?php if($this->session->userdata('is_user_logged_in') != true) redirect('login'); ?>


<h1>Update Shipping Address</h1>

<div class="usernav">
<?php $this->load->view('include/usernav'); ?>
</div>
<!-- usernav -->

<div class="clear"></div>

<div class="contain-details nopadding">


<div class="regiser-account">
<form method="post" class="j-forms j-multistep register-form" id="j-forms">
<div class="reg-block">
<div class="result"></div><br>
<div class="profile-content" style="margin-left: 2%;">
<?php 
foreach($user as $userrow){ 
	$shippingFullName = $userrow->shipping_full_name;
	$shippingPhoneNumber = $userrow->shipping_phone_number;
	$shippingCountry = $userrow->shipping_country;
	$shippingCity = $userrow->shipping_city;
	$shippingAddress = $userrow->shipping_address;
}
?>

<div class="j-row">
	<div class="row">
		<div class="col-md-6">
				<!--Shipping fullname section -->
			<div class="span12 ">
				<div class="input">
				<label>Full Name</label>
				<!-- <label class="icon-right" for="fname" style="margin-top: 20px;">
				<i class="fa fa-user"></i>
				</label> -->
				<input class="form-control" type="text" id="shippingFullName" name="shippingFullName" placeholder="Enter your full name." value="<?php echo $shippingFullName; ?>">
				</div>
			</div>


				<div class="clearfix"></div>
				<hr>


				<!-- shipping phone number section -->
			<div class="span12 ">
				<div class="input">
				<label>Phone Number</label>
				<!-- <label class="icon-right" for="fname" style="margin-top: 20px;">
				<i class="fa fa-user"></i>
				</label> -->
				<input class="form-control" type="text" id="shippingPhoneNumber" name="shippingPhoneNumber" placeholder="Please enter your phone number." value="<?php echo $shippingPhoneNumber; ?>">
				</div>
			</div>


				<div class="clearfix"></div>
				<hr>

		</div>
		
		<div class="col-md-6">
			<!-- shipping country section -->
				<div class="span12 ">
					<div class="input">
					<label>Country</label>
					
					<input class="form-control" type="text" id="shippingCountry" name="shippingCountry" placeholder="Enter your Country name." value="<?php echo $shippingCountry; ?>">
					</div>
				</div>


				<div class="clearfix"></div>
				<hr>

				<!-- shipping City section -->
				<div class="span12 ">
					<div class="input">
					<label>City</label>
					
					<input class="form-control" type="text" id="shippingCity" name="shippingCity" placeholder="Enter your City Name." value="<?php echo $shippingCity; ?>">
					</div>
				</div>
				<div class="clearfix"></div>
				<hr>

				<!-- shipping Address section -->
				<div class="col-md-12 ">
					<label>Address</label>	
					<input class="form-control" type="text" id="shippingAddress" name="shippingAddress" placeholder="For Ex: House#123, Street #123, ABC Road" value="<?php echo $shippingAddress; ?>">
					
				</div>


				<div class="clearfix"></div>
		</div>

	</div>

	<!-- <div class="row">
		

	</div> -->
</div>

<!--j-row end-->


		<div class="clearfix"></div>
		<hr>
		<div class="col-md-6 col-md-offset-0" >
			<div class="row">
				<div class="col-md-4" >
					<a href="<?php echo base_url("user-profile"); ?>">
						<input type="button" class="btn btn-default" name="" value="Cancel" style="width: 100%">
					</a>
				</div>
				<div class="col-md-6" id="shippingUpdate">
					<button id="shipping" class="btn btn-block" >Save</button>
				</div>
			</div>	
		</div>
</div>
<!-- end of profile content block -->
</div>
<!-- end of result block -->
</form>
<!-- end of the form -->
</div>
<!--end of reg-block-->

<div class="clearfix"></div>
<!-- </div> -->


</div>
<!--contain-details-->
</div>
<!-- profile div ends -->
</div>
<!-- client dashboard -->
</div>
<!-- container -->
</div>    
<!-- page-container -->
<div class="clearfix"></div>

   
<?php $this->load->view('include/footer'); ?>

<script>

$(document).on('click', '#shipping', function () {
	$('.register-form').submit(false);
	var dataString = $('.register-form').serialize();	
	$.ajax({
		type: "POST",
		url: "<?php echo base_url("front/update_shipping"); ?>",
		data: dataString,
		beforeSend: function(){
			$('.result').html("<p class='success msgcenter'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i> Updating Address...</p>");
		},
		success: function(data)
		{
			if(data == '<p class="success msgcenter">Update Successfull</p>'){
				$(".profile-content").load('<?php echo base_url('shipping-address'); ?> .profile-content');
				// setTimeout(function() {
				//   window.location.reload("<?php echo base_url("user-profile"); ?>");
				// }, 3000);
				
			}			
			$('.result').html(data).fadeIn(1000);			
		}
	});
});
</script>
</body>
</html>