<section class="banner">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	  	<?php $c= 0; foreach($banner as $banrow){ 
		$o = ++$c;
		if($o == 1){
			$class= "item active";
		}else{
			$class= "item";
		}
		?>
		<div class="<?php echo $class; ?>">
		  <a href="<?php echo $banrow->img_url; ?>" style="background-image: url(<?php echo str_replace('/medium/', '/', $banrow->attachment1); ?>); text-decoration:none; display:block;" class="banimg"></a>
		</div>
		<?php } ?>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
</section>
<!-- banner -->