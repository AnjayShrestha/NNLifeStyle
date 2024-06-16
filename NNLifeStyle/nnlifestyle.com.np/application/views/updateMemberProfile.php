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
		#profile{
		margin-top: 5px;
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


<h1>Edit Profile</h1>

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
	$fname = $userrow->full_name;
	$email = $userrow->user_email;
	$phone = $userrow->phone;
	$gender = $userrow->gender;
	$dob = $userrow->dateofbirth;
}
?>

<div class="j-row">
	<div class="row">
		<div class="col-md-4">
				<!-- fulname section -->
			<div class="span12 ">
				<div class="input">
				<label>Full Name</label>
				<label class="icon-right" for="fname" style="margin-top: 20px;">
				<i class="fa fa-user"></i>
				</label>
				<input class="form-control" type="text" id="fname" name="fname" placeholder="Full name" value="<?php echo $fname; ?>">
				</div>
			</div>


				<div class="clearfix"></div>
				<hr>

			</div>
		
		<div class="col-md-4">
			<!-- email section -->
			<div class="span12 ">
				<label>Email Address <span>|</span> <?php if ($email != null){ ?>
					<a class="btn btn-link" href="#">Change</a>
					<?php }else{ ?>
					<a class="btn btn-link" href="#">Add</a>						
					<?php } ?>
				</label>
				<!-- show email address if exist -->
					<?php if ($email != null){ ?>						
						<br>
						<div>
							<?php echo $email ?>
						</div>
					<?php }else{ ?>
						<br>
						<div>
							<?php echo 'Please enter your email address.'?>
						</div>
					<?php } ?>
			</div>
			<div class="clearfix"></div>
			<hr>
		</div>


		<div class="col-md-4">
		<!-- phone section -->
		<div class="span12">
			<label>Phone Number <span>|</span> <?php if ($phone != null){ ?>
					<a class="btn btn-link" href="#">Change</a>
					<?php }else{ ?>
					<a class="btn btn-link" href="#">Add</a>						
					<?php } ?>
				</label>
				<!-- show email address if exist -->
					<?php if ($phone != null){ ?>
						<br>
						<div>
							<?php echo $phone ?>
						</div>
					<?php }else{ ?>
						<br>
						<div>
							<?php echo 'Please enter your phone number.'?>
						</div>
					<?php } ?>
		</div>

		<div class="clearfix"></div>
		<hr>

		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
		<!-- date of birth section -->
			<div class="span12">
				<div class="input">
				<label>Date Of Birth</label>	
				<input class="form-control" type="date" id="dob" name="dob"  value="<?php echo $dob; ?>">			
				</div>
			</div>

			<div class="clearfix"></div>
			<hr>

		</div>

		<div class="col-md-4">
		<!-- Gender section -->
			<div class="span12">
				<div class="input">
				<label>Gender</label>				
				<select class="form-control" id="gender" name="gender">
					<?php if ($gender != null) {?>
					<?php if ($gender == "Male"){?>						
						<option value="<?php echo $gender ?>"><?php echo $gender ?></option>
						<option value="Female">Female</option>
					<?php }if ($gender == "Female") {?>
						<option value="<?php echo $gender ?>"><?php echo $gender ?></option>
						<option value="Male">Male</option>
					<?php } ?>
					<?php } else { ?>
						<option value="">Select Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					<?php } ?>					
				</select>
				</div>
			</div>

			<div class="clearfix"></div>

		</div>
	</div>
</div>

<!--j-row end-->


		<div class="clearfix"></div>
		<hr>

		<!-- Button section -->
		<div class="col-md-6 col-md-offset-0" >
			<div class="row">
				<div class="col-md-4" >
					<a href="<?php echo base_url("user-profile"); ?>">
						<input type="button" class="btn btn-default" name="" value="Cancel" style="width: 100%">
					</a>
				</div>
				<div class="col-md-6" id="shippingUpdate">
					<button id="profile" class="btn btn-block">Save</button>
				</div>
			</div>	
		</div>
<!-- 
		<div class="span4 col-md-offset-4">
		<button id="profile" class="btn btn-block">Update</button>
		</div> -->
</div>
<!-- end of profile content block -->
</div>
<!-- end of result block -->
</div>
<!--end of reg-block-->
</form>
<!-- end of the form -->
<div class="clearfix"></div>
<!-- </div> -->


</div>
<!--contain-details-->
</div>

        
        <!-- </div> -->
        <!-- container -->
   <!-- page-container -->
 <div class="clearfix"></div>
   
<?php $this->load->view('include/footer'); ?>

<script>

$(document).on('click', '#profile', function () {
	$('.register-form').submit(false);
	var dataString = $('.register-form').serialize();
	
	$.ajax({
		type: "POST",
		url: "<?php echo base_url("front/update_profile"); ?>",
		data: dataString,
		beforeSend: function(){
			$('.result').html("<p class='success msgcenter'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i> Updating profile...</p>");
		},
		success: function(data)
		{
			if(data == '<p class="success msgcenter">Update Successfull</p>'){
				$(".profile-content").load('<?php echo base_url('update-profile'); ?> .profile-content');
				// setTimeout(function() {
				//   window.location.reload('<?php echo base_url('user-profile'); ?>');
				// }, 3000);
				
			}
			
			$('.result').html(data).fadeIn(1000);			
		}
	});
});
</script>
</body>
</html>