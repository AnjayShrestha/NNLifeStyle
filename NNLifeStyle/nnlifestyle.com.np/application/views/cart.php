<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />

</head>

 <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">

<body>
<style>
.cart_navigation{margin-top: 15px;}
</style>
<?php 
$url = $url = $this->uri->segment(1);
$this->load->view('include/header');
?>
       
<div style="background-image: url(<?php echo base_url('assets/images/rix0o97hv5.jpg'); ?>);" class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>My Cart</h2>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
        
<div class="page-container">
	<div class="container">
		<div class="row">
			<div class="contain-details mycart">
				<div class="result"></div>
				<div class="cart-list">
				<?php if(empty($cart)){ ?>
					<div class="nsodetails">
						<div class="profile">
							<div class="cart-detail" style="background:#fff; width:100%; padding:30px 80px;">
								<div class="alert alert-danger">
								  <strong>Sorry!</strong> Your <?php echo $pageTitle; ?> is empty
								</div>
							</div>
						</div>
					</div>	
				<?php }else{
				?>

				<div class="cart-detail">
				<form id="cform" method="post">
					<div class="table-responsive" style="border: none !important;">
						<table class="cart_summary table table-bordered" style="border: 1px #DDDDDD solid;">
						<thead>
						<tr>
							<th>S.N.</th>
							<th>Code</th>
							<th>Items</th>
							<th>Color</th>
							<th>Size</th>
							<th class="qtyth col-md-2">Qty</th>
							<th class="priceth">Price</th>
							<th class="totalth">Total</th>
							<th class="col-md-1 actionth text-center"><div align="center">Delete</div></th>
						</tr>
						</thead>

						<tbody>
						<?php
						$c = 0;
						foreach($cart as $row){
						$price = $row->price;
						$qty = $row->qty;
						$total = $price * $qty;
						$coupon = $row->coupon;
						$dc = $row->discount;
						if(empty($dc)){
							$discount = '0.00';
						}else{
							$discount = $dc.'%';
						}
						$grand_total = $total + $grand_total;
						?>
						<div class="wr">
					<tr>
						<td class="items"><?php echo ++$c; ?></td>
						<td class="items"><?php echo $row->pcode; ?></td>
						<td class="items">
							<a href="<?php echo base_url('product-details/'.$row->permalink); ?>" target="_blank">
								<?php echo $row->items; ?>
							</a>
						</td>
						<td class="items"><?php echo ucfirst($row->color); ?></td>
						<td class="items"><?php echo $row->size; ?></td>
					  <td class="qty">
						<input name="id[]" type="hidden" id="id[]" value="<?php echo $row->id; ?>"/>
						<input name="pcode[]" type="hidden" id="pcode[]" value="<?php echo $row->pcode; ?>"/>
						<input name="qty[]" type="text" class="form-control qty" id="qty[]" value="<?php echo $qty; ?>">
						</td>
					  <td class="total">NPR <?php echo number_format($price); ?></td>
					  <td class="price"><span>NPR <?php echo number_format($total); ?></span></td>
					  <td class="action tools text-center">
					  	<div align="center"><a id="<?php echo $row->id; ?>" class="btn btn-danger del">
					  		<i class="fa fa-trash" aria-hidden="true"></i>
					  	</a></div>
					  </td>
					</tr>
					</div>
					<?php } ?>
					<tfoot>
						<tr>
							<td colspan="6" rowspan="3">
								<div class="col-md-6 coupon nopadding">
								<h4><strong>Coupon</strong></h4>
								<div class="result"></div>
								<div class="input-group">
									<?php if(empty($coupon)){ ?>
									<input id="coupon" type="text" class="form-control" name="coupon" placeholder="Type your voucher code here!">
									<span class="input-group-addon" id="use">USE</span>
									<?php }else{ ?>
										<input id="coupon" type="hidden" class="form-control" name="coupon" value="<?php echo $coupon; ?>">
										Your voucher code is valid.<br>Code: <strong><?php echo $coupon; ?></strong><br>
										Voucher code discount: <strong><?php echo $discount; ?></strong>
									<?php } ?>
								</div>
							</div>
							
							</td>
							<td>Total</td>
							<td colspan="2">NPR <?php echo number_format($grand_total); ?></td>
						  </tr>

						  <tr>
							<td>Discount</td>
							<td colspan="2"><?php echo $discount; ?></td>
						  </tr>

						  <tr>
							  <td>Grand Total</td>
							  <td colspan="2"><strong>NPR <?php $vd = ($grand_total / 100 * $dc); echo number_format($grand_total - $vd); ?></strong></td>
						  </tr>
							</tfoot>
					</table>
					
						<div class="cart_navigation">
							<a href="<?php echo base_url(); ?>" class="btn continue">&larr; Continue shopping </a>
							<?php if(!empty($coupon)){ ?>
							<a class="btn continue clearCoupon"> Clear Coupon</a>
							<?php } ?>
							<a class="btn update"> Update Cart &uarr;</a>
							<a href="<?php echo base_url("delivery-address"); ?>" class="btn checkout">Proceed to checkout &rarr;</a>
						</div>
					</div>
					<!-- table-responsive -->
				</form>

				<div class="clearfix"></div>

				</div>
				<?php } ?>
				</div>

			</div>
			<!-- contain-details -->
		</div>
		<!-- row -->
	</div>
   	<!-- container -->
</div>
<!-- page-container -->
<div class="clearfix"></div>
   

<?php $this->load->view('include/footer'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

<script>
	
$(document).on('click', '#use', function (e) {
	$('.update').trigger('click');
});

$(document).on('click', '.clearCoupon', function (e) {
	$('.update').trigger('click');
});

$('.clearCoupon').unbind('click');
$(document).on('click', '.clearCoupon', function(e){ 
    $.ajax({
		type: "post",
		url: "<?php echo base_url('front/clear_coupon'); ?>",
		data:{"discount":''},
		success: function(response){
			$('.result').fadeOut(0).html(response).fadeIn(1000);
			$('.result').fadeOut(1000);
			$(".cart-list").load('<?php echo base_url($url); ?> .cart-list');	
			$(".innercart").load('<?php echo base_url($url); ?> .innercart');
		}
    });
	e.stopImmediatePropagation();
});
	
$(document).on('click', '.update', function (e) {
	var dataString = $('#cform').serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('front/update_cart'); ?>",
		data: dataString,
		beforeSend: function(){
			$('.result').html("<p class='success msgcenter'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i> Updating Cart...</p>");
		},
		success: function(response)
		{
			$('.result').html(response).fadeIn(1000);
			$(".cart-list").load('<?php echo base_url($url); ?> .cart-list');	
			$(".innercart").load('<?php echo base_url($url); ?> .innercart');
		}
	});
});

$('.qty').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $(".update").trigger('click');
		return false;     
    }
});


$(document).on('click', '.del', function (e) {
	var delid = $(this).attr("id");
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("front/delete_cart"); ?>",
			data: {"delid":delid},
			success: function(data)
			{
				$(".navigation .cc").load('<?php echo base_url($url); ?> .navigation .cc');
				$(".cart-list").load('<?php echo base_url($url); ?> .cart-list');
				$(".innercart").load('<?php echo base_url($url); ?> .innercart');
			}
		});
});
	
$('body').on('click', function (e) {
	var container = $(".searchDetails");
	if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
    	container.hide();
    }
});

$('#search').keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $("#searchbtn").trigger('click');
		return false;     
    }
});

$(document).on('click', '#searchbtn', function (e) {
	$(".searchDetails").fadeIn();
	var search = $('#search').val();
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('front/search_products'); ?>",
		data: {"search": search},
		beforeSend: function(){
			$('#sresult').html('<div class="alert alert-success"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i> Searching...</div>');
		},
		success: function(data)
		{
			$('#sresult').html('');
			$('#search').val('');
			$('.search-content').html(data);
		}
	});
	e.stopImmediatePropagation();
});
</script>
</body>
</html>