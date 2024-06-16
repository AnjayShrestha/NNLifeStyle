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
	.personal{
		background-color: #DCDCDC; 
		border-radius: 2px; 
		height: 250px;
	}
	.address{
		background-color: #DCDCDC;
		border-radius: 2px; 
		margin-left: 0.5% ; 
		height: 250px;
		width: 450px;
	}
	@media(max-width: 1200px){
		.address{
			margin-left: 0;
			margin-top: 2px;
			width: auto;
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

<h1>Profile</h1>

<div class="usernav">
<?php $this->load->view('include/usernav'); ?>
</div>
<!-- usernav -->

<div class="clear"></div><br />

<div class="contain-details nopadding">

<div class="profile-content" style="margin-left: 2%;">
<?php 
foreach($user as $urow){ 
	$fname = $urow->full_name;
	$email = $urow->user_email;
	$phone = $urow->phone;
	$sfullname = $urow->shipping_full_name;
	$sphonenumber = $urow->shipping_phone_number;
	$scountry = $urow->shipping_country;
	$scity = $urow->shipping_city;
	$saddress = $urow->shipping_address;
	// $password = $urow->user_show_password;
	// $address = $urow->address;
}
?>
<div class="row" >
	<div class="col-md-5 personal">
		<div class="box-body" style=" padding: 10px;">
					<label style="font-size: 20px;">Personal Details <span>|</span> 
						<a class="btn btn-link"href="<?php echo base_url("update-profile"); ?>">Edit</a></label>

					<div><b>Name: </b><?php echo $fname ?> </div><br>
					<?php if ($email!=null) : ?>
						<div><b>Email: </b><?php echo $email ?></div><br>
					<?php endif ?> 
					<?php if ($phone!=null) : ?>
						<div><b>Phone: </b><?php echo $phone ?></div>
					<?php endif ?> 
					<br>
					<a href="<?php echo base_url("change-password"); ?>"><input class="btn btn-block" type="button" name="" value="Change Password"></a>
		</div>
	</div>
	<!-- <div class="col-md-1"></div> -->
	<div class="col-md-5 address" >
		<div class="box-body" style=" padding: 10px;">
				<label style="font-size: 20px;">Address Book <span>|</span> <?php if ($saddress == null){ ?> 
					 	<a class="btn btn-link" href="<?php echo base_url("shipping-address"); ?>">Add</a>
					<?php }else { ?>
					 	<a class="btn btn-link" href="<?php echo base_url("shipping-address"); ?>">Edit</a>							
					<?php } ?>
				</label>
				<?php if ($scountry!=null) : ?>
					<div><b>Shipping Country: </b><?php echo $scountry ?></div><br>
				<?php endif ?> 
				<?php if ($scity!=null) : ?>
					<div><b>Shipping City: </b><?php echo $scity ?></div><br>
				<?php endif ?> 
				<?php if ($saddress!=null) : ?>
					<div><b>Shipping Address: </b><?php echo $saddress ?></div>
				<?php endif ?> 

				<br><br>
				<!-- <i class="bi bi-geo-alt"></i> -->
					<svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M12.166 8.94C12.696 7.867 13 6.862 13 6A5 5 0 0 0 3 6c0 .862.305 1.867.834 2.94.524 1.062 1.234 2.12 1.96 3.07A31.481 31.481 0 0 0 8 14.58l.208-.22a31.493 31.493 0 0 0 1.998-2.35c.726-.95 1.436-2.008 1.96-3.07zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
					  <path fill-rule="evenodd" d="M8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
					</svg>
		</div>
	</div>
</div>


<hr>


</div>

</div>
</div>
</div>
        
        <!-- </div> -->
        <!-- container -->
</div>
</div>
   <!-- page-container -->
   <div class="clearfix"></div>
   
<?php $this->load->view('include/footer'); ?>

<script>

// $(document).on('click', '#profile', function () {
// 	$('.register-form').submit(false);
// 	var dataString = $('.register-form').serialize();
	
// 	$.ajax({
// 		type: "POST",
// 		url: "<?php echo base_url("front/update_profile"); ?>",
// 		data: dataString,
// 		beforeSend: function(){
// 			$('.result').html("<p class='success msgcenter'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i> Updating profile...</p>");
// 		},
// 		success: function(data)
// 		{
// 			if(data == '<p class="success msgcenter">Update Successfull</p>'){
// 				$(".profile-content").load('<?php echo base_url('user-profile'); ?> .profile-content');
// 			}
			
// 			$('.result').html(data).fadeIn(1000);
// 		}
// 	});
// });
</script>
</body>
</html>