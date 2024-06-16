<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/owlcarousel/assets/owl.theme.default.min.css">
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/owlcarousel/owl.carousel.js"></script>
<script>
$(document).ready(function() {
	$('#slider1').owlCarousel({
    	loop: true,
        margin: 10,
		autoplay: true,
        responsiveClass: true,
		responsive: true,
        responsive: {
        	0: {
            	items: 1,
            	nav: true
            },
            600: {
            	items: 1,
                nav: false
            },
            	1000: {
               	items: 6,
                nav: true,
                loop: true,
                margin: 20
            }
		}
	});
});
</script>
</head>

<body>
<?php
	$this->load->view("include/header");
	$this->load->view("include/banner");
	$catdata = array();
	$catimgdata = array();
	$catpermalink = array();
	foreach($cat as $catrow){
		$catdata[] = $catrow->title;
		$catimgdata[] = $catrow->attachment1;
		$catpermalink[] = $catrow->permalink;
	}
?>

<section class="feature section-gap">
	<div class="container">
		<div class="row">
			<div class="col-md-6 fbox">
				<a href="<?php echo base_url('categories/'.$catpermalink[0]); ?>" style="background-image: url(<?php echo str_replace('/medium/', '/', $catimgdata[0]); ?>);" class="fbpic">
					<span class="btn btn-link"><?php echo $catdata[0]; ?></span>
				</a>
			</div>
			<!-- left -->
			
			<div class="col-md-3 fbox">
				<a href="<?php echo base_url('categories/'.$catpermalink[1]); ?>" style="background-image: url(<?php echo str_replace('/medium/', '/', $catimgdata[1]); ?>);" class="fbpic">
					<span class="btn btn-link"><?php echo $catdata[1]; ?></span>
				</a>
				
				<a href="<?php echo base_url('categories/'.$catpermalink[2]); ?>" style="background-image: url(<?php echo str_replace('/medium/', '/', $catimgdata[2]); ?>);" class="fbpic">
					<span class="btn btn-link"><?php echo $catdata[2]; ?></span>
				</a>
			</div>
			<!-- mid -->
			
			<div class="col-md-3 fbox">
				<a href="<?php echo base_url('categories/'.$catpermalink[3]); ?>" style="background-image: url(<?php echo str_replace('/medium/', '/', $catimgdata[3]); ?>);" class="fbpic">
					<span class="btn btn-link"><?php echo $catdata[3]; ?></span>
				</a>
			</div>
			<!-- right -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</section>
<!-- feature -->

<section class="feature-products section-gap">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Featured Products</h2>
			</div>
			<!-- left -->
			
			<div class="col-md-6 text-right">
				<a href="<?php echo base_url('categories/featured'); ?>" class="btn btn-link theme-btn">View All</a>
			</div>
			<!-- right -->
			<div class="clearfix"></div>
			
			<?php foreach($feature as $frow){ ?>
			<div class="col-md-3">
				<div class="fpbox">
					<a href="<?php echo base_url('product-details/'.$frow->permalink); ?>">
						<div style="background-image: url(<?php echo $frow->attachment1; ?>);" class="fpbpic"></div>
						
						<h4><?php echo $frow->category; ?></h4>
						<p><?php echo $frow->title; ?></p>
						<h3>Rs <?php echo $frow->price; ?> /-</h3>
					</a>
				</div>
			</div>
			<!-- fpbox -->
			<?php } ?>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</section>
<!-- feature-products -->

<section class="mid-section" style="background-image: url(<?php echo str_replace('/medium/', '/', $ofimg); ?>);">
	<div class="container">
		<div class="row">
			<?php echo $oftxt; ?>
			<h3><?php echo $oftitle; ?></h3>
			<a href="<?php echo base_url('categories'); ?>" class="btn btn-link theme-btn-two">Shop Now</a>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</section>
<!-- mid-section -->

<section class="newarrivals section-gap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>New Arrivals <span>/ Best Seller</span></h2>
			</div>
			
			<div class="col-md-12">
				<div class="owl-carousel owl-theme" id="slider1">
					<?php foreach($best as $bestrow){ ?>
					<div class="item">
						<div class="newbox">
							<a href="<?php echo base_url('product-details/'.$bestrow->permalink); ?>">
								<div align="center"><img src="<?php echo $bestrow->attachment1; ?>" alt=""/></div>
								<h4><?php echo $bestrow->title; ?></h4>
								<p><?php echo $this->common->summaryModeb($bestrow->description, 4); ?></p>
								<h3>Rs <?php echo $bestrow->price; ?> /-</h3>
							</a>
						</div>
						<!-- newbox -->
					</div>
					<!-- item -->
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</section>
<!-- newarrivals -->

<?php $this->load->view("include/footer"); ?>
</body>
</html>