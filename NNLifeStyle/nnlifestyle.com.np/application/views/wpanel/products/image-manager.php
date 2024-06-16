<style>
.nav{cursor: pointer;}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    color: #fff;
    cursor: default;
    background-color: #337AB7;
    border: 1px solid #2E70A5;
    border-bottom-color: rgb(221, 221, 221);
    border-bottom-color: transparent;
}
</style>
<?php
foreach($sdata as $srow){
	$colors = explode(",", $srow->colors);
}
?>
<input name="prod_id" type="hidden" id="prod_id" value="<?php echo $this->input->post('id'); ?>" />
<input name="color" type="hidden" id="color" value="<?php echo $colors[0]; ?>" class="changecolor">
<ul class="nav nav-tabs">
	<?php $d = 0; foreach($colors as $colorows){
	++$d;
	if($d == 1){
		$class = 'colors active';
	}else{
		$class = 'colors';
	}
	?>
	<li class="<?php echo $class; ?>"><a data-name="<?php echo $colorows; ?>"><?php echo ucfirst($colorows); ?></a></li>
	<?php } ?>
</ul>

<div class="fetchimages"></div>
<a class="fetchdata" href="#" style="display: none;">fetch</a>

<script>
$(document).on('click', '.colors', function(){
	$('.nav li').removeClass('active');
	$(this).addClass('active');
	var val = $(this).find('a').attr('data-name');
	$(".changecolor").val(val);
	$('.fetchdata').trigger('click');
});
	
$(document).on('click', '.fetchdata', function(e){
		var prod_id = $("#prod_id").val();
		var color = $("#color").val();
	
		$.ajax({
			type: "post",
			url: "<?php echo base_url('products/ipview/'); ?>",
			data:{"prod_id":prod_id, "color":color},
			beforeSend: function(){
		   		$('.fetchimages').html(" <i class='fa fa-refresh fa-spin fa-1x fa-fw'></i> please wait...");
			},
			success: function(data){
				$('.fetchimages').html(data);
			}
		});
		e.stopImmediatePropagation();
});
</script>