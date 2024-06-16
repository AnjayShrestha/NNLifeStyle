<!doctype html>
<html><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/cloud-zoom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cloud-zoom.1.0.2.js"></script>
</head>

<body>
<style>
.carousel-control{
	width: auto;
}
.carousel-control.left, .carousel-control.right{ 
    background: none !important;
    filter: progid:none !important;>
}
small{color: #6E6E6E;}
.cloud-zoom{}

.mousetrap{margin:auto !important; left:0 !important;}

.leftsection{border:2px solid #E1E1E1;}
.zoom-section{width: 70%; padding: 20px; margin: 0 auto;}
	
.zoom-small-image img{
	width:100%;
	height:auto;
	margin: 0 auto;
}

.cloud-zoom-lens {
	border:4px solid #E1E1E1;
	/*margin:-4px;	 Set this to minus the border thickness. */
	background-color:#fff;	
	cursor:move;
	
}

.cloud-zoom-big {
	border:4px solid #E1E1E1;
	overflow:hidden;
	width:400px !important;
	height:400px !important;
	top:-22px !important;
	left: 408px !important;
	z-index: 1 !important;
}

/* This is the loading message. */
.cloud-zoom-loading {
	color:white;	
	background:#222;
	padding:3px;
	border:1px solid #E1E1E1;
}
</style>

<?php
	$this->load->view('include/header');
	$find = $this->uri->segment(2);
	foreach($prodetails as $prow){
		$pid = $prow->id;
		$colors = explode(',', $prow->colors);
?>

<div class="productDetails">

<div style="background-image: url(<?php echo base_url('assets/images/rix0o97hv5.jpg'); ?>);" class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2><?php echo $prow->title; ?></h2>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>

<div class="page-container">
	<div class="container">
		<div class="row">
			<div class="cnav">
				<div class="ctitle">
					<h3><a href="<?php echo base_url(); ?>">Home</a> / <a href="<?php echo base_url(); ?>"><?php echo $prow->category; ?></a>  / <a href="<?php echo base_url(); ?>"><?php echo $prow->tags; ?></a> / <?php echo $prow->title; ?></h3>
				</div>
				<!-- ctitle -->
			</div>
			<!-- cnav -->
			
			<div class="col-md-12">
				<h3>&nbsp;</h3>
			</div>
			<!-- title -->
			<div class="clearfix"></div>
			<?php if($this->session->userdata("is_user_logged_in") == true){?>

			<form action="<?php echo base_url("product-details/".$this->uri->segment(2)) ?>" method="post" id="pform">
			
			<?php } else {?>
			<form action="<?php echo base_url("login") ?>" target="_blank" method="post" id="pform">
			<?php } ?>
			<input name="cart" type="hidden" id="cart" value="cart"/>
			<input name="id" type="hidden" id="id" value="<?php echo $prow->id; ?>"/>
			<input name="item" type="hidden" id="item" value="<?php echo $prow->title; ?>"/>
			<input name="price" type="hidden" id="price" value="<?php echo $prow->price; ?>"/>
			<input name="permalink" type="hidden" id="permalink" value="<?php echo $prow->permalink; ?>"/>
			<section id="product-view" class="col-md-6 nopadding">
            	<div class="result"></div>
              	
               	<div class="clearfix"></div>
               	
               	<div class="page-header sliderTitle">
               		<h4>You may also like</h4><br>
               	</div>
					<div class="newarrivals">
						<div class="carousel slide" data-ride="carousel" data-type="multi" id="myCarousel">
							<div class="carousel-inner">
							<?php
							$catdata = array('cat_slug' => $prow->cat_slug, 'tags' => $prow->tags);
							$this->db->where($catdata);
							$this->db->limit(12);
							$query = $this->db->get('products');
							$nqury = $query->result();
							$c = 0;
							?>
							<div class='item active'>
							<?php
							foreach($nqury as $poprow){ 
							if($prow->id != $poprow->id){
							$cc = ++$c;
							?>
									<div class="newbox col-md-4">
										<a href="<?php echo base_url('product-details/'.$poprow->permalink); ?>">
											<div align="center"><img src="<?php echo $poprow->attachment1; ?>" alt=""/></div>
											<h4><?php echo $poprow->title; ?></h4>
											<h3>Rs <?php echo $poprow->price; ?> /-</h3>
										</a>
									</div>
									
							<?php 
							if (($cc % 3) == 0) echo "</div><div class='item'>";
							}} ?>
							</div>
							</div>
							<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
						</div>
						<!-- carousel -->
					</div>
				</section>
				
				<section id="product-details" class="col-md-6">
                    <div class="page-header" style="padding-bottom: 10px;">
                    	<input name="pcode" type="hidden" name="pcode" value="<?php echo $prow->pcode; ?>">
                    	<h3>Product Code: <?php echo $prow->pcode; ?></h3>
                        <price>Rs: <?php echo number_format($prow->price); ?></price>
                    </div><br>

                    
                    <div class="product-add-to-cart">
      <span class="control-label">Quantity</span>

    
      <div class="product-quantity">
        <div class="qty">
          <div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input name="qty" id="quantity_wanted" value="1" class="input-group form-control" min="1" style="display: block;" type="text" readonly><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-touchspin js-touchspin bootstrap-touchspin-up" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button><button class="btn btn-touchspin js-touchspin bootstrap-touchspin-down" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button></span></div>
        </div>
      </div>
      <div class="clearfix"></div>
  </div>
                 
                 <h4><strong>AVAILABLE COLORS</strong></h4> 
                  <div class="pcolors">
                  	<?php
					foreach($colors as $colval){ ?>
                		<input type="radio" id="<?php echo $colval; ?>" name="color" value="<?php echo $colval; ?>" class="colors" <?php if($colval == $colors[0]){ echo 'checked';} ?>>
                 		<label for="<?php echo $colval; ?>"><?php echo ucfirst($colval); ?></label>
                 	<?php } ?>
                  </div><br><br>
                  
                  <h4><strong>AVAILABLE SIZE</strong></h4> 
                  <div class="pcolors">
                  	<?php
					$psize = explode(',', $prow->psize);
					if(!empty($psize)){
					foreach($psize as $psizeval){ ?>
                		<input type="radio" id="<?php echo $psizeval; ?>" name="size" value="<?php echo $psizeval; ?>" class="size" <?php if($psizeval == $psize[0]){ echo 'checked';} ?>>
                 		<label for="<?php echo $psizeval; ?>"><?php echo ucfirst($psizeval); ?></label>
                 	<?php }} ?>
                  </div>
                   
                   <hr>
                  	
                  	
                  	
                    <button id="addtocart" name="addtocart" class="btn addtocart">Add To Cart</button>
                    
                   <div class="clearfix"></div><br><br>
                   
                   <div class="details">
                   	<div class="page-header">
                    	<h4>Details, Design & Specials</h4>
                    </div>
                    <!-- page-header -->
                    
                    <?php echo $prow->description; ?>
                   </div>
                   <!-- details -->
                    
                    
                    
                    <div class="clearfix"></div>
                    
                </section>
                <div class="clearfix"></div>
			
			</form>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
<!-- fproducts -->

</div>

<?php } $this->load->view('include/footer'); ?>
<script>
$(document).ready(function(e) {
	

	
var quantitiy=0;
  $('.bootstrap-touchspin-up').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity_wanted').val());
        // If is not undefined
            $('#quantity_wanted').val(quantity + 1);
            // Increment
    });

     $('.bootstrap-touchspin-down').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity_wanted').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>1){
            $('#quantity_wanted').val(quantity - 1);
            }
    });
	
	$(".colors").trigger('click');
});
	
$(".colors").click(function(){
	var val = $(this).val();
	$.ajax({
		type: "post",
		url: "<?php echo base_url('front/pimages/'); ?>",
		data:{"color":val, "pid":'<?php echo $pid; ?>'},
		beforeSend: function(){
			//$('.result').html(" <i class='fa fa-refresh fa-spin fa-1x fa-fw'></i> please wait...");
		},
		success: function(data){
			$('.result').html(data);
			$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
		}
	});
	e.stopImmediatePropagation();
});

//submit the cart
$(".addtocart").click(function(){
	$("#pform").submit();
});
</script>

</body>
</html>