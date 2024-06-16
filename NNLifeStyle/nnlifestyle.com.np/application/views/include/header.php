<!-- <!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/docs.min.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/cloud-zoom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/j-forms.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cloud-zoom.1.0.2.js"></script>
</head>
 -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=1653526034889620&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b5c2489df040c3e9e0c0b7c/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php
$url = basename($this->uri->segment(1));
?>


<!-- <body> -->
<section class="top">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			<!-- 	<div class="row">
					<div class="col-md-6">
							<p><i class="fa fa-phone-volume" aria-hidden="true"></i> <?php echo $phone; ?></p>
					</div>
					<div class="col-md-6">
						<p><i class="fa fa-clock" aria-hidden="true"></i><?php echo $opening; ?></p>
					</div>
				</div> -->
				<p><i class="fa fa-phone-volume" aria-hidden="true"></i> <?php echo $phone; ?> <span>&nbsp;</span> <i class="fa fa-clock" aria-hidden="true"></i><?php echo $opening; ?></p>		
			</div>
			<!-- left -->
			
			<div class="col-md-6 text-right">
				<?php if($this->session->userdata("is_user_logged_in") != true){?>
						<a href="<?php echo base_url('login'); ?>" class="btn btn-link"><i class="fa fa-sign-in-alt" aria-hidden="true"></i> Login</a>
				<span>|</span> <a href="<?php echo base_url('register'); ?>" class="btn btn-link"><i class="fa fa-user" aria-hidden="true"></i> Register</a>
				<?php }else{ ?>
						<a href="<?php echo base_url('user-profile'); ?>" class="btn btn-link"><i class="fa fa-user" aria-hidden="true"></i> Account</a>
						<span>|</span> 
						<a href="<?php echo base_url('user-logout'); ?>" class="btn btn-link"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
				<?php } ?>
				
				
				<span>|</span> 
				<a href="<?php echo $facebook; ?>" class="btn btn-link socials" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
				<a href="<?php echo $youtube; ?>" class="btn btn-link socials" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a>
				<a href="<?php echo $instagram; ?>" class="btn btn-link socials" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
			</div>
			<!-- right -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</section>
<!-- top -->

<section class="header">
	<div class="container">
		<!-- top -->
		<div class="row">
			<!-- logo -->
			<div class="col-md-3">
				<a href="<?php echo base_url(''); ?>" class = "btn">
					<!-- <div class="logo"> -->
						<h1 class="logo">Life <span>Style</span></h1>
					<!-- </div> -->
				</a>
			</div>

			<!-- middle -->
			<div class="col-md-6" style="padding-top: 1%;">
					<div class="input-group">
						<input name="search" type="search" id="search" class="form-control" placeholder="Search for products and categories">
						<input name="searchlink" type="hidden" id="searchlink" class="form-control searchlink">
						<div class="input-group-btn">
							<button class="btn btn-default searchnow" type="button" id="searchnow" style="width: 50px; height: 34px">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
			</div>

			<div class="col-md-3" style="padding-top: 1%;">
				<?php if($this->session->userdata("is_user_logged_in") == true){?>
						
						<a href="<?php echo base_url('cart'); ?>" class="btn" style="color:black; font-size: 20px" ><i class="fa fa-shopping-cart"  aria-hidden="true"></i> Cart : <?php echo $totalcart; ?></a>
						<span style=" font-size: 20px;">|</span> 
						<a href="<?php echo base_url('checkout'); ?>" class="btn" style="color: black; font-size: 20px"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Checkout</a> 
				<!-- <a href="<?php echo base_url('cart'); ?>" class="img-circle cart">
					<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					<p>Shopping Cart Items: <strong class="cc"></strong></p>
				</a> -->
				<?php }?>				
			</div>
			
		</div>
			
	
			<!-- bottom -->
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="navigation">
					<ul class="dnav">
						<li><a href="#" <?php if($url == ''){ echo "class=act"; } ?>>Home <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
							<ul>
								<li><a href="<?php echo base_url('about-us'); ?>">About Us</a></li>
								<li><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
							</ul>
						</li>
						
						<li><a href="<?php echo base_url('categories'); ?>" <?php if($url == 'categories' || $url == 'sort' || $url == 'price'){ echo "class=act"; } ?>>Categories</li>
						<li><a href="#" <?php if($url == 'men'){ echo "class=act"; } ?>>Men <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
							<ul>
								<?php 
								$menTag = $this->frontend->get_tag_data("categories", 'display_order', 'asc', "Men");
								foreach($menTag as $mtcrow){ ?>
									<li><a href="<?php echo base_url('men/'.$mtcrow->permalink); ?>"><?php echo $mtcrow->title; ?></a></li>
								<?php } ?>
							</ul>
						</li>
						<li><a href="#" <?php if($url == 'women'){ echo "class=act"; } ?>>Women <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
							<ul>
								<?php 
								$womenTag = $this->frontend->get_tag_data("categories", 'display_order', 'asc', "Women");
								foreach($womenTag as $wtcrow){ ?>
									<li><a href="<?php echo base_url('women/'.$wtcrow->permalink); ?>"><?php echo $wtcrow->title; ?></a></li>
								<?php } ?>
							</ul>
						</li>
						<li><a href="#" <?php if($url == 'bags'){ echo "class=act"; } ?>>Bags <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
							<ul>
								<?php 
								$bagTag = $this->frontend->get_tag_data("categories", 'display_order', 'asc', "Bags");
								foreach($bagTag as $btcrow){ ?>
									<li><a href="<?php echo base_url('bags/'.$btcrow->permalink); ?>"><?php echo $btcrow->title; ?></a></li>
								<?php } ?>
							</ul>
						</li>					
					</ul>
				</div>
				
			</div>
			<!-- right -->	
			<div class="col-md-3"></div>

		</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</section>
<!-- header -->