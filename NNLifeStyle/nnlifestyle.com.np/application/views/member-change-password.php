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
	label{
		font-size: 25px;
		font-family: bold;
		margin-left: 10px;
	}	
	@media(max-width: 1200px){
		#changepassword{
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


<h1>Change Password</h1>

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
<div class="profile-content">
<?php 
foreach($user as $urow){ 
	$pwd = $urow->user_password;
	// $password = $urow->user_show_password;
	// $address = $urow->address;
}
?>

		<div class="j-row">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<!-- old password section -->
					<div class="span12 unilt ">
						<div class="input">
						<input name="password" type="hidden" id="password" class="form-control" value="<?php echo $pwd; ?>">
						<label>OLD Password</label>			
						<input  type="password" id="oldpassword" name="oldpassword" placeholder="OLD Password">
						</div>
					</div>
					<div class="clearfix"></div>
					<hr>

					<!-- new password section -->
					<div class="span12 unilt ">
						<div class="input">
						<label>NEW Password</label>			
						<input  type="password" id="newpassword" name="newpassword" placeholder="NEW Password">
						</div>
					</div>
					<div class="clearfix"></div>
					<hr>


					<!-- confirm password section -->
					<div class="span12 unilt ">
						<div class="input">
						<label>CONFIRM Password</label>			
						<input  type="password" id="confirmpassword" name="confirmpassword" placeholder="CONFIRM Password">
						</div>
					</div>
					<div class="clearfix"></div>
					<hr>

					<div class="clearfix"></div>

					<div class="col-md-12 col-md-offset-0" >
						<div class="row">
							<div class="col-md-4" >
								<a href="<?php echo base_url("user-profile"); ?>">
									<input type="button" class="btn btn-default" name="" value="Cancel" style="width: 100%">
								</a>
							</div>
							<div class="col-md-6" id="shippingUpdate">
								<button id="changepassword" class="btn btn-block">Change Password</button>
							</div>
						</div>	
					</div>
					<!-- <div class="span12">
					<button id="changepassword" class="btn btn-block">Change Password</button>
					</div> -->
				</div>
				<div class="col-md-3"></div>

			</div>			

		</div>		
	<!--j-row end-->
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

$(document).on('click', '#changepassword', function () {
	$('.register-form').submit(false);
	var dataString = $('.register-form').serialize();
	
	$.ajax({
		type: "POST",
		url: "<?php echo base_url("front/update_member_password"); ?>",
		data: dataString,
		beforeSend: function(){
			$('.result').html("<p class='success msgcenter'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i> Changing password...</p>");
		},
		success: function(data)
		{
			if(data == '<p class="success msgcenter">Update Successfull</p>'){
				$(".profile-content").load('<?php echo base_url('member-change-password'); ?> .profile-content');
				
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