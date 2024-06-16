<section class="subscribe section-gap">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p>Sign Up for emails and get sale off</p>
			</div>
			<!-- left -->
			
			<div class="col-md-6">
					<div class="input-group">
						<input name="subscribe_email" type="text" id="subscribe_email" class="form-control" placeholder="Your Email">
						<div class="input-group-btn">
						  <button id="subscribe" class="btn btn-default" type="button">
							Subscribe
						  </button>
						</div>
					</div>
					<div class="subscribemsg"></div>
			</div>
			<!-- right-->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</section>
<!-- subscribe -->

<section class="footer section-gap">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="logo">
					<h1>Life <span>Style</span></h1>
				</div>
				<!-- logo -->
				<?php echo $this->common->summaryModeb($ftxt, 15); ?>
				
				<p>
				<i class="fa fa-map-marker-alt" aria-hidden="true"></i> <?php echo strip_tags($address, "<br>"); ?><br>
				<i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $email; ?><br>
				<i class="fa fa-phone-volume" aria-hidden="true"></i>  <?php echo $phone; ?>
				</p>
			</div>
			<!-- left -->
			
			<div class="col-md-2">
				<h3>Informations</h3>
				<ul>
					<li><a href="<?php echo base_url('about-us'); ?>"><span>&rArr; </span> About Us</a></li>
					<li><a href="<?php echo base_url('contact-us'); ?>"><span>&rArr; </span> Contact Us</a></li>
					<li><a href="<?php echo base_url('login'); ?>"><span>&rArr; </span> Login</a></li>
					<li><a href="<?php echo base_url('register'); ?>"><span>&rArr; </span> Register</a></li>
					<li><a href="<?php echo base_url('delivery-policy'); ?>"><span>&rArr; </span> Delivery Policy</a></li>
					<li><a href="<?php echo base_url('terms-conditions'); ?>"><span>&rArr; </span> Terms & Conditions</a></li>
				</ul>
			</div>
			<!-- mid -->
			
			<div class="col-md-2">
				<h3>My Accounts</h3>
				<ul>
					<li><a href="<?php echo base_url('user-profile'); ?>"><span>&rArr; </span> Accounts</a></li>
					<li><a href="<?php echo base_url('order-history'); ?>"><span>&rArr; </span> Order History</a></li>
					<li><a href="<?php echo base_url('cart'); ?>"><span>&rArr; </span> Cart</a></li>
					<li><a href="<?php echo base_url('checkout'); ?>"><span>&rArr; </span> Checkout</a></li>
					<li><a href="<?php echo base_url('categories'); ?>"><span>&rArr; </span> Shop Now</a></li>
				</ul>
			</div>
			<!-- mid -->
			
<!--
			<div class="col-md-3">
				<h3>Gallery Images</h3>
				<a href="#" style="background-image: url(<?php echo base_url(); ?>assets/images/midbg.jpg);" class="gimg"></a>
				<a href="#" style="background-image: url(<?php echo base_url(); ?>assets/images/slider1.jpg);" class="gimg"></a>
				<a href="#" style="background-image: url(<?php echo base_url(); ?>assets/images/slider2.jpg);" class="gimg"></a>
				<a href="#" style="background-image: url(<?php echo base_url(); ?>assets/images/midbg.jpg);" class="gimg"></a>
				<a href="#" style="background-image: url(<?php echo base_url(); ?>assets/images/slider1.jpg);" class="gimg"></a>
				<a href="#" style="background-image: url(<?php echo base_url(); ?>assets/images/slider2.jpg);" class="gimg"></a>
			</div>
-->
			<!-- mid -->
			
			<div class="col-md-4">
				<div class="fb-page" data-href="<?php echo $facebook; ?>" data-tabs="timeline" data-width="500" data-height="235" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo $facebook; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $facebook; ?>">Facebook</a></blockquote></div>
			</div>
			<!-- right -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</section>
<!-- footer -->

<section class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<hr>
			</div>
			
			<div class="col-md-6">
				<p>&copy; Copyright <strong>2018 NN Life Style</strong>. All rights reserved.</p>
			</div>
			
			<div class="col-md-6 text-right">
				<img src="<?php echo base_url(); ?>assets/images/cards.jpg">
			</div>
		</div>
	</div>
	<!-- container -->
</section>
<!-- copyright -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/slugger.js"></script>
<script>
$(document).on('click', '.searchbtn', function () {
	$(".searchbox").fadeToggle();
});

$('#searchlink').slugger({
    source: '#search',
	prefix: '',
	suffix:'',
	readonly: true
});
	
$('#search').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $("#searchnow").trigger('click');
		return false;     
    }
});

$(document).on('click', '.searchnow', function () {
	val = $(".searchlink").val();
	if(val != ''){
		location.href='<?php echo base_url('search/'); ?>' + val;
	}
});
	
$(document).on('click', '#subscribe', function () {
	var subscribeEmail = $('#subscribe_email').val();
	$.ajax({
		type: "POST",
		url: "<?php echo base_url("front/process_subscription"); ?>",
		data: {"email": subscribeEmail},
		success: function(data)
		{
			$('.subscribemsg').fadeOut(0).html(data).fadeIn(500);
			if(data == '<p class="smsg-success">Request Successfull</p>'){
				$('#subscribe_email').val('');
			}
		}
	});
});
</script>