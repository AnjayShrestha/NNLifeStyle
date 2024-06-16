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
<link href="<?php echo base_url(); ?>assets/css/j-forms.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
<style>
</style>
</head>
<style type="text/css">
	.btn-change {
		background: #f57224;
	}

</style>
<body>
<?php 
if($this->session->userdata('is_user_logged_in') == true) redirect('user-profile');
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
<div class="rform">
<div class="row">
<div class="clientLogin">
<h1 align="center">Registration</h1>
  	<div class="col-md-12">
    	<div class="box-border">
			<div class="regiser-account">

			<form method="post" class="j-forms j-multistep register-form" id="j-forms">
			<div class="reg-block">
			<div class="result"></div><br>
			<div class="j-row">
				<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<!-- field full name -->
					<div class="span12 unit">
					<div class="input">
					<label class="icon-right" for="fname">
					<i class="fa fa-user"></i>
					</label>
					<input type="text" id="fname" name="fname" placeholder="Full name">
					</div>
					</div>

			
					<!-- for email address -->
					<div class="span12 unit" id="mail">
					<div class="input">
					<label class="icon-right" for="email">
					<i class="fa fa-envelope"></i>
					</label>
					<input type="email" placeholder="Email" id="email" name="email">
					</div>
					</div>

					<!-- for phone number -->
					<!-- <div  class="span12 unit" id="mobile" style="display:none;">
					<div class="input">
					<label class="icon-right" for="phone">
					<i class="fa fa-phone"></i>
					</label>
					<input type="text" placeholder="Phone" id="phone" name="phone" >
					</div>
					</div> -->

					<div class="span12 unit">
					<div class="input">
					<label class="icon-right" for="password">
					<i class="fa fa-lock"></i>
					</label>
					<input type="password" placeholder="password" id="password" name="password">
					</div>
					</div>
						<!--j-row-->
					<!--end of reg-block-->

					<div class="clearfix"></div>
						<div class="span12 unit">
							<!-- Register through email -->
						<input  class="btn btn-block btn-danger" type="button" id="emailRegister" value="E-REGISTER">
						<!-- register through mobile -->
						<!-- <input class="btn btn-block btn-danger" type="button" id="mobileRegister"  style="display: none; margin-top: -1.5px;" value="M-REGISTER"> -->
						<a class="btn trigger" style="display: none;">trigger</a> 
						</div>
					<div class="clearfix"></div>
					<!-- <hr> -->
				</div>

				<div class="col-md-3">

					<!-- <div class="clearfix"></div>
						<div class="span12 unit"> -->
							<!-- Register through email -->
						<!-- <input  class="btn btn-block btn-danger" type="button" id="emailRegister" value="E-REGISTER"> -->
						<!-- register through mobile -->
						<!-- <input class="btn btn-block btn-danger" type="button" id="mobileRegister"  style="display: none; margin-top: -1.5px;" value="M-REGISTER"> -->
					<!-- 	<a class="btn trigger" style="display: none;">trigger</a> 
						</div>
					<div class="clearfix"></div>
					<hr>
					
					
					<div class="clearfix"></div> -->
						<!-- <div class="span12 unit"> -->
							<!-- <label>Or</label> -->
							<!-- Button to register member with phone number -->
						<!-- <input type="button" id="registerMobile" class="btn btn-block btn-change" value="REGISTER WITH MOBILE"> -->
						<!-- Buttom to register memeber with email address -->
						<!-- <input type="button" id="registerEmail" class="btn btn-block btn-change" style="display: none; margin-top: -1.5px;" value="REGISTER WITH EMAIL"></button> -->
						<!-- <a class="btn trigger" style="display: none;">trigger</a>  -->
						<!-- </div> -->
					<!-- <div class="clearfix"></div> -->
				</div>

			</div>
			</div>
			
			<hr>

			
			</form>

			</div>

		</div>
<!--box-border-->

	</div>

	<!-- div for register and changing the register format -->
	<!-- <div class="col-md-6">
		
	</div> -->
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
	
//jquery click function to register with phone 
// $("#registerMobile").click(function(){
// 	$("#mail").css('display','none');
// 	$("#email").val(null);
// 	$("#mobile").css('display','block');
// 	//register button
// 	$("#mobileRegister").css('display','block');
// 	$("#emailRegister").css('display','none');
// 	// change button
// 	$("#registerMobile").css('display','none');
// 	$("#registerEmail").css('display','block');	
// });


//jquery click function to register with phone 
$("#registerEmail").click(function(){
	$("#mobile").css('display','none');
	$("#phone").val(null);
	$("#mail").css('display','block');
	// register button
	$("#mobileRegister").css('display','none');
	$("#emailRegister").css('display','block');
	// change button
	$("#registerMobile").css('display','block');
	$("#registerEmail").css('display','none');
});



$(document).on('change', '.country', function(e){
		var con = $(this).find(':selected').attr('data-val');
		var cid = $(this).attr('data-id');
		$.ajax({
			type: "post",
			url: "<?php echo base_url('front/prepare_state'); ?>",
			data: {con:con, cid:cid},
			beforeSend: function(){
		   		$('#sres' + cid).html("Please wait...");
			},
			success: function(data){
				$('.trigger').trigger('click');
				$("#state" + cid).html(data);
				var stat = $("#state" + cid).val();
				if(stat == 'No State'){
					$.ajax({
						type: "post",
						url: "<?php echo base_url('front/prepare_city_country'); ?>",
						data: {con:con, cid:cid},
						beforeSend: function(){
							$('#cres' + cid).html("Please wait...");
						},
						success: function(data){
							$("#city" + cid).html(data);
						}
					});
				}else{
					$("#city" + cid).html("<option value='' id='cres" + cid + "'>Select City</option>");
				}
			}
		});
		e.stopImmediatePropagation();
});
	
$(document).on('click', '.trigger', function(e){
		var con = $(".country").find(':selected').attr('data-val');
		$.ajax({
			type: "post",
			url: "<?php echo base_url('front/get_countryCode'); ?>",
			data: {con:con},
			success: function(data){
				$("#countrypcode").val("+" + data);
				$("#countryphonecode").text("+" + data);
			}
		});
		e.stopImmediatePropagation();
});
	
$(document).on('change', '.state', function(e){
		var state = $(this).find(':selected').attr('data-val');
		var sid = $(this).attr('data-id');
        var country = $("#country" + sid).find(':selected').attr('data-val');
		$.ajax({
			type: "post",
			url: "<?php echo base_url('front/prepage_city_from_state'); ?>",
			data: {country:country, state:state, sid:sid},
			beforeSend: function(){
		   		$('#cres' + sid).html("Please wait...");
			},
			success: function(data){
				$("#city" + sid).html(data);
			}
		});
		e.stopImmediatePropagation();
});

//email registration form click	
$(document).on('click', '#emailRegister', function () {
	$('.register-form').submit(false);
	var dataString = $('.register-form').serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo base_url("front/process_register_email"); ?>",
		data: dataString,
		beforeSend: function(){
			$('.result').html("<i class='fa fa-refresh fa-spin fa-3x fa-fw'></i> Registration in process...");
		},
		success: function(data)
		{
			$('.result').fadeOut(0).html(data).fadeIn(500);
		}
	});
});

//mobile registration form click
// $(document).on('click', '#mobileRegister', function () {
// 	$('.register-form').submit(false);
// 	var dataString = $('.register-form').serialize();
// 	$.ajax({
// 		type: "POST",
// 		url: "<?php echo base_url("front/process_register_phone"); ?>",
// 		data: dataString,
// 		beforeSend: function(){
// 			$('.result').html("<i class='fa fa-refresh fa-spin fa-3x fa-fw'></i> Registration in process...");
// 		},
// 		success: function(data)
// 		{
// 			$('.result').fadeOut(0).html(data).fadeIn(500);
// 		}
// 	});
// });


</script>
</body>
</html>