<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.js"></script>

<?php
$burl = $this->uri->segment(1);
if($burl == "search"){
	$furl = "search";
	$surl = "search";
}else{
	$surl = "sort";
	$furl = "price";
}
?>
 <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 50000,
      values: [ <?php echo $min; ?>, <?php echo $max; ?> ],
   slide: function( event, ui ) {
		 $("#min").val(ui.values[ 0 ]);
	    $("#max").val(ui.values[ 1 ]);
	   $("#type").val("range");
      	//$( "#amount" ).val(ui.values[ 0 ] + "," + ui.values[ 1 ]);
		$( "#amt" ).html( "Rs " + ui.values[ 0 ] + " - Rs " + ui.values[ 1 ] );
      },
		change: function(event, ui) {
			$(".pForm").submit();
        }
    });
    //$( "#amount" ).val(</?php echo $min.",".$max; ?>);
	  $( "#amt" ).html( "Rs " + <?php echo $min; ?> +
      " - Rs " + <?php echo $max; ?> );
  });
<?php if($this->uri->segment(1) == 'price' || $this->uri->segment(1) == 'sort'  || $this->uri->segment(1) == 'search'){ ?>
$(document).on('click', '.pagination a', function (e) {
	$(".pForm").attr("action", $(this).attr("href"));
	$(".pForm").submit();
	e.stopImmediatePropagation();
    return false;
});
<?php } ?>
	  
$(document).on('change', '.sortby', function (e) {
	$("#type").val("sort");
	$(".pForm").attr("action", "<?php echo base_url($surl."/".$slug); ?>");
	$(".pForm").submit();
});
</script>	
<!-- </head> -->

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
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="categories">
					<div class="page-header">
						<h3>Categories</h3>
					</div>
					
					<ul>
						<?php foreach($categories as $catrow){ ?>
						<li><a href="<?php echo base_url('categories/'.$catrow->permalink); ?>"><?php echo $catrow->title; ?> (<?php echo $this->frontend->total_categories_products($catrow->permalink); ?>)</a></li>
						<?php } ?>
					</ul>
				</div>
				<!-- categories -->
				
				<form method="post" class="pForm" action="<?php echo base_url($furl."/".$slug); ?>">
					<input name="slug" type="hidden" id="slug" value="<?php echo $slug; ?>">
					<input name="type" type="hidden" id="type" value="<?php echo $typ; ?>">
					<input name="min" type="hidden" id="min" value="<?php echo $min; ?>">
					<input name="max" type="hidden" id="max" value="<?php echo $max; ?>">
					<p>
					  <label for="amount" class="amount">Price range:</label>
					  <span id="amt"></span>
					</p>
				<div class="clearfix"></div>
				<div id="slider-range"></div><br>
					
					<select name="sort" id="sort" class="form-control sortby" style="border-radius: 0; height: 40px;">
						<option value="">Sort By</option>
						<option value="low" <?php if($sort == 'low'){echo "selected";} ?>>Price[low-high]</option>
						<option value="high" <?php if($sort == 'high'){echo "selected";} ?>>Price[high-low]</option>
					</select>
				</form>
				
				<div class="categories">
					<div class="page-header">
						<h3>Best Selling</h3>
					</div>
					
					<ul>
						<?php foreach($best as $bestrow){ ?>
						<li><a href="<?php echo base_url('product-details/'.$bestrow->permalink); ?>"><?php echo $bestrow->title; ?></a></li>
						<?php } ?>
					</ul>
				</div>
				<!-- categories -->
			</div>
			<!-- left -->
			
			<div class="col-md-9">
				<section class="feature-products">
					<?php foreach($pdata as $prow){ ?>
						<div class="col-md-4">
							<div class="fpbox">
								<a href="<?php echo base_url('product-details/'.$prow->permalink); ?>">
									<div style="background-image: url(<?php echo $prow->attachment1; ?>);" class="fpbpic"></div>
									<p><?php echo $prow->title; ?></p>
									<h3>Rs <?php echo $prow->price; ?> /-</h3>
								</a>
							</div>
						</div>
						<!-- fpbox -->
					<?php } ?>
				</section>
				<!-- feature-products -->
				<div class="clearfix"></div>
				
				<div class="col-md-12">
					<div class="pagination">
						<?php echo $pagination; ?>
					</div>
                </div>
			</div>
			<!-- right -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</section>
<!-- page-container -->

<?php $this->load->view("include/footer"); ?>
</body>
</html>