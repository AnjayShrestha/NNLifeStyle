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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
</head>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">

<body>

<style>
.cart_navigation{margin-top: 15px;}
</style>
<?php 
$this->load->view('include/header');
foreach($user as $urow){ 
	// $ulname = $urow->last_name;
	$ufname = $urow->full_name;
	$uemail = $urow->user_email;
	$uphone = $urow->phone;
	// $ucountry = $urow->country;
	// $ucity = $urow->city;
	$uaddress = $urow->address;
	
	//delivery details
	$dfname = $urow->shipping_full_name;
	$dphone = $urow->shipping_phone_number;
	$dcountry = $urow->shipping_country;
	$dstate = $urow->state;
	$dcity = $urow->shipping_city;
	$daddress = $urow->shipping_address;
}
$this->db->group_by("invoice_no");
$query = $this->db->get('orders');
$count =  $query->num_rows();
$invoiceno = "#PU".date("ysmi")."I".($count + 1);
?>
 
<div style="background-image: url(<?php echo base_url('assets/images/rix0o97hv5.jpg'); ?>);" class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Checkout</h2>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
  
   <div class="page-container">
   		<div class="container">
            <div class="contain-details">

<div class="row">


<div class="result"></div>
<div class="cart-list">
<?php
if(empty($cart)){
	?>
	<div class="nsodetails">
						<div class="profile">
							<div class="cart-detail" style="background:#fff; width:100%; padding:30px 80px;">
								<div class="alert alert-danger">
								  <strong>Sorry!</strong> Your Cart is empty
								</div>
							</div>
						</div>
					</div>
<?php }else{
if (empty($dfname) || empty($dphone) || empty($dcountry) || empty($dcity) || empty($dcity) || empty($daddress)) {
	echo '<script>
			window.setTimeout(function() {
			location.href = "'.base_url('delivery-address').'";
			}, 1000);
		</script>';
}else{
?>

<div class="cart-detail">
<form id="finalcart" method="post">
<input name="fcart" type="hidden" id="fcart" value="fcart"/>
<div class="table-responsive" style="border: none !important;">
<table class="cart_summary table table-bordered" width="100%" style="border: 1px #DDDDDD solid;">



<thead>
<tr>
   	<th>S.N.</th>
   	<th>Code</th>
    <th>Items</th>
    <th>Color</th>
    <th>Size</th>
	<th class="qtyth">Qty</th>
	<th class="priceth">Price</th>
	<th class="totalth">Total</th>
</tr>
</thead>

<tbody>
<?php 
$c = 0;
foreach($cart as $row){
						$price = $row->price;
						$pound = $row->pound;
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
<div><input name="id[]" type="hidden" id="id[]" value="<?php echo $row->id; ?>"/></div>
<input name="pcode[]" type="hidden" id="pcode[]" value="<?php echo $row->pcode; ?>"/>
<div><input name="prod_id[]" type="hidden" id="prod_id[]" value="<?php echo $row->prod_id; ?>"/></div>
<div><input name="product[]" type="hidden" id="product[]" value="<?php echo $row->items; ?>"/></div>
<div><input name="qty[]" type="hidden" id="qty[]" value="<?php echo $row->qty; ?>"/></div>
<div><input name="color[]" type="hidden" id="color[]" value="<?php echo $row->color; ?>"/></div>
<div><input name="size[]" type="hidden" id="size[]" value="<?php echo $row->size; ?>"/></div>
<div><input name="permalink[]" type="hidden" id="permalink[]" value="<?php echo $row->permalink; ?>"/></div>
<div><input name="price[]" type="hidden" id="price[]" value="<?php echo $row->price; ?>"/></div>
<div><input name="total[]" type="hidden" id="total[]" value="<?php echo $total; ?>"/></div>

<div class="wr">
<tr>
  <td><?php echo ++$c; ?></td>
  <td><?php echo $row->pcode; ?></td>
  <td><?php echo $row->items; ?></td>
  <td><?php echo $row->color; ?></td>
  <td><?php echo $row->size; ?></td>
  <td class="qty"><?php echo $row->qty; ?></td>
  <td class="total">NPR <?php echo number_format($row->price); ?></td>
  <td class="price"><span>NPR <?php echo number_format($total); ?></span></td>
</tr>
</div>
<?php } ?>
<tfoot>
						<tr>
							<td colspan="6" rowspan="3">
								<div class="col-md-6 coupon nopadding">
								<div class="input-group">
									<?php if(!empty($coupon)){ ?>
										<h4><strong>Coupon</strong></h4>
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
<div class="cart_navigation" align="right">

<a href="<?php echo base_url("cart"); ?>" class="btn continue">&larr; Back</a>

<?php if($this->session->userdata('is_user_logged_in') != true){ ?> 
<a href="<?php echo base_url("login"); ?>" id="order" class="btn continue">Checkout &rarr;</a>
<?php }else{ $this->session->set_userdata('checkout', "yes");?>
<a data-toggle="modal" data-target="#myModal" id="checkout" class="btn continue checkout">Checkout &rarr;</a>
<?php } ?>
</div>
</div>
	
<div><input name="coupon" type="hidden" id="coupon" value="<?php echo $coupon; ?>"/></div>
<div><input name="discount" type="hidden" id="discount" value="<?php echo $dc; ?>"/></div>
<div class="payment-info">
<div><input name="invoiceno" type="hidden" id="invoiceno" value="<?php echo $invoiceno; ?>"/></div>

<div><input name="ufname" type="hidden" id="ufname" value="<?php echo $ufname; ?>"/></div>
<div><input name="uemail" type="hidden" id="uemail" value="<?php echo $uemail; ?>"/></div>
<div><input name="uphone" type="hidden" id="uphone" value="<?php echo $uphone; ?>"/></div>
<div><input name="uaddress" type="hidden" id="uaddress" value="<?php echo $uaddress; ?>"/></div>
<!-- delivery details -->
<div><input name="dfname" type="hidden" id="dfname" value="<?php echo $dfname; ?>"/></div>
<div><input name="dphone" type="hidden" id="dphone" value="<?php echo $dphone; ?>"/></div>
<div><input name="dcountry" type="hidden" id="dcountry" value="<?php echo $dcountry; ?>"/></div>
<div><input name="dcity" type="hidden" id="dcity" value="<?php echo $dcity; ?>"/></div>
<div><input name="daddress" type="hidden" id="daddress" value="<?php echo $daddress; ?>"/></div>
</div>
</form>

<div class="clearfix"></div>

</div>
<?php }
}
$amount = $grand_total - $vd;
?>
</div>


</div>

</div>
        </div>
        <!-- container -->
   </div>
   <!-- page-container -->
   <div class="clearfix"></div>
   
   
   <!-- Modal -->
	<div id="myModal" class="modal fade payment" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Final Checkout</h4>
		  </div>
		  <div class="modal-body">
			<div class="res"></div>
			<div class="alert alert-warning"><strong>Caution : Final Step!</strong> This is the last step. Once you click "ORDER NOW", you will not be able to change or edit your order. To cancel, edit or change your order please click on cancel.</div>
		  </div>
		  <div class="modal-footer">
			<a class="btn cancel" data-dismiss="modal">Cancel</a>
			<a class="btn order" id="buy">Order Now</a>
		  </div>
		</div>

	  </div>
	</div>
   
<?php $this->load->view('include/footer'); ?>
        
<script>
$(document).ready(function(){
	$(".checkout").trigger('click');
});
	
$(document).on('click', '#buy', function(event){
	var dataString = $('#finalcart').serialize();
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('checkout'); ?>",
		data: dataString,
		beforeSend: function(){
			$('.res').html("<p class='success msgcenter'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i> Processing Checkout...</p>");
		},
		success: function(response)
		{
			location.href='<?php echo base_url('payment'); ?>'
		}
	});
	event.stopImmediatePropagation();
});
</script>
</body>
</html>