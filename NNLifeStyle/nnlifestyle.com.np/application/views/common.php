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
</head>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">

<body>
<?php $this->load->view("include/header"); ?>

<div style="background-image: url(<?php echo base_url('assets/images/rix0o97hv5.jpg'); ?>);" class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2><?php echo $pagetitle; ?></h2>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>

<section class="page-container">
	<div class="container common">
		<div class="row">
			<div class="col-md-12">
				<?php if(!empty($img)){ ?>
                	<div style="background-image:url(<?php echo $img; ?>);" class="cpic"></div>
                <?php } ?>
                
                <?php echo $desc; ?>
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