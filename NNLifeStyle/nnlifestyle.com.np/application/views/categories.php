<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
</head>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">

<body>
<?php $this->load->view("include/header"); ?>

<div style="background-image: url(<?php echo base_url('assets/images/rix0o97hv5.jpg'); ?>);" class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Categories</h2>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>

<section class="page-container">
	<div class="container">
		<div class="row">
			<div class="catlist">
				<div class="navigation">
					<ul>
						<li><a href="#">Men</a>
							<ul>
								<?php 
								$menTag = $this->frontend->get_tag_data("categories", 'display_order', 'asc', "Men");
								foreach($menTag as $mtcrow){ ?>
									<li><a href="<?php echo base_url('men/'.$mtcrow->permalink); ?>" class="badge"><?php echo $mtcrow->title; ?></a></li>
								<?php } ?>
							</ul>
						</li>
					</ul><br>
					
					<ul>
						<li><a href="#">Women</a>
							<ul>
								<?php 
								$womenTag = $this->frontend->get_tag_data("categories", 'display_order', 'asc', "Women");
								foreach($womenTag as $wtcrow){ ?>
									<li><a href="<?php echo base_url('women/'.$wtcrow->permalink); ?>" class="badge"><?php echo $wtcrow->title; ?></a></li>
								<?php } ?>
							</ul>
						</li>
					</ul><br>
					
					<ul>
						<li><a href="#">Bags</a>
							<ul>
								<?php 
								$bagTag = $this->frontend->get_tag_data("categories", 'display_order', 'asc', "Bags");
								foreach($bagTag as $btcrow){ ?>
									<li><a href="<?php echo base_url('bags/'.$btcrow->permalink); ?>" class="badge"><?php echo $btcrow->title; ?></a></li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</section>
<!-- page-container -->

<?php $this->load->view("include/footer"); ?>
</body>
</html>