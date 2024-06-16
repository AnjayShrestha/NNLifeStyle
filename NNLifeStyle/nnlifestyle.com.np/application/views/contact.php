  <!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
</head>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">

<body>
<?php $this->load->view('include/header'); ?>
 
 <div style="background-image: url(<?php echo base_url('assets/images/rix0o97hv5.jpg'); ?>);" class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Contact Us</h2>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
  
   <div class="page-container">
   		<div class="container contact-us">
        	<div class="row">
        		<div class="col-md-7" style="padding: 0; margin: 0;">
        			<div class="caption"><p>Thank you for visiting our website. If you would like to get into contact with us simply fill out the nifty form below. Cheers!</p></div>
        			
					<form method="post" action="<?php echo base_url('contact-us'); ?>">
						<div class="msgcenter"><?php echo $msg; ?></div>
						
						<div class="clearfix"></div>
						
						<div class="col-md-6">
							<div class="form-group">
								<input name="fname" type="text" id="fname" class="form-control" placeholder="Full Name" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<input name="email" type="email" id="email" class="form-control" placeholder="Email Address" required>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<input name="phone" type="text" id="phone" class="form-control" placeholder="Phone Number" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<input name="address" type="text" id="address" class="form-control" placeholder="Address" required>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="message" id="message" placeholder="Message" class="form-control"></textarea>
							</div>
							
							<div class="form-group">
								<?php echo $this->recaptcha->render(); ?>
							</div>
						</div>

						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Submit Message</button>
						</div>
					</form>
				</div>
       			<!-- left -->
        		
        		<div class="col-md-4 col-md-offset-1">
        			<h3>You'll find us here</h3>
					<p><strong><em>NN Life Style</em></strong><br>
					<strong>Address:</strong> <?php echo strip_tags($address, '<br>'); ?><br>
					<strong>Email:</strong> <?php echo $email; ?><br>
					<strong>Phone :</strong> <?php echo $phone; ?><br><br>
          			<strong>Opening Hours:</strong><br>
          			<?php echo $opening; ?></p>
           			
           			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1766.0897663494065!2d85.30793670812652!3d27.7117425956975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fdc76658b9%3A0x6c9793caa23b502b!2sChhetrapati%2C+Kathmandu+44600!5e0!3m2!1sen!2snp!4v1532665692411" frameborder="0" style="border:0" allowfullscreen></iframe>
            	</div>
            	<!-- right -->
				
        	</div>
        	<!-- row -->
        </div>
        <!-- container -->
        
   </div>
   <!-- page-container -->
   
<?php $this->load->view('include/footer'); ?>
</body>
</html>