<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="<?php echo base_url(); ?>assets/css/printview.css" rel="stylesheet">
</head>

<body>
<?php
foreach($info as $irow){
	$attachment = $irow->attachment1;
	// $name = $irow->first_name." ".$irow->last_name;
	$name = $irow->full_name;
	$email = $irow->user_email;
	$phone = $irow->phone;
	$country = $irow->country;
	$state = $irow->state;
	$city = $irow->city;
	$address = $irow->address;
	$zipcode = $irow->zipcode;
	$pcode = $irow->pcode;
}
if($prefix == "invoice"){
?>
<div id="status"></div>
<input name="invoiceno" id="invoiceno" type="hidden" value="<?php echo $invoiceno; ?>">
<input name="cid" id="cid" type="hidden" value="<?php echo $cid; ?>">
<input name="semail" id="semail" type="hidden" value="<?php echo $email; ?>">
<div class="actionbtn">
	<div class="buttons">
		<div><a class="btn btn-primary" id="print"><i class="fa fa-print" aria-hidden="true"></i> Print Invoice</a></div>
		<div><a class="btn btn-success" id="send"><i class="fa fa-envelope" aria-hidden="true"></i> Send Invoice</a></div>
	</div>	
</div>
<!-- actionbtn -->

<div id="print-container">
	<div class="print-content">
		<div class="printHeader">
			<div class="hleft">
				<img src="<?php echo $logo; ?>" width="auto" height="80"/>
			</div>
			<!-- hleft -->
			
			<div class="hright">
				<div class="bizname">
					<h1><?php echo $bizname; ?></h1>
					<p><?php echo $bizaddr; ?><br>
					Tel: <?php echo $bphone; ?>, Email: <?php echo $bemail; ?></p>
				</div>
			</div>
			<!-- hleft -->
			<div class="clear"></div>
		</div>
		<!-- printHeader -->
		
		<div class="tpin"><p>TPIN : <span>300073250</span></p></div>
		
		<div class="subprintHeader" style="background: #EFEFEF;">
			<h2>Tax Invoice</h2>
		</div>
		<!-- subprintHeader -->
	
		<div class="cbox">
			<h3>Invoiced To</h3>
			<p><?php echo $name; ?><br>
			<p><?php echo $email; ?><br>
			<p><?php echo $phone; ?><br>
			<?php echo $address; ?>
			</p>
		</div>
		<!-- cbox -->
		
		<div class="cbox">&nbsp;</div>
		<!-- cbox -->
		
		<div class="cbox">
			<p><strong>Invoice</strong> <?php echo $invoiceno; ?><br>
			<strong>Invoice Date: </strong><?php echo date('m/d/Y'); ?><br>
			<strong>Due Date: </strong><?php echo date('m/d/Y'); ?>
			</p>
		</div>
		<!-- cbox -->
		<div class="clear"></div>
		
		<table class="table table-bordered">
			<thead class='thead-light'>
			  <tr>
				<th>S.N.</th>
				<th>Code</th>
				<th>Color</th>
				<th>Size</th>
				<th>Items</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Total</th>
			  </tr>
			</thead>
       		
        	<tbody>
			<?php
			$c = 0;
			$grand_total = 0;
			foreach($orders as $cusrow){
				$orderdate = $cusrow->order_date;
				$odate = strtotime($orderdate);
				$price = $cusrow->price;
						$qty = $cusrow->qty;
						$total = $price * $qty;
						$coupon = $cusrow->coupon;
						$dc = $cusrow->discount;
						if(empty($dc)){
							$discount = '0.00';
						}else{
							$discount = $dc.' %';
						}
						$grand_total = $total + $grand_total;
				?>
				<tr>
					<td><?php echo ++$c; ?></td>
					<td><?php echo $cusrow->pcode; ?></td>
					<td><?php echo $cusrow->color; ?></td>
					<td><?php echo $cusrow->size; ?></td>
					<td><?php echo $cusrow->items; ?></td>
					<td><?php echo $cusrow->qty; ?></td>
					<td>NPR <?php echo number_format($cusrow->price); ?></td>
					<td>NPR <?php echo number_format($total); ?></td>
				</tr>
				<?php 
				} 
					$vd = ($grand_total / 100) * $dc;
					$gtot = $grand_total - $vd;
				?>
				<tr>
					<td colspan="6" rowspan="3" class="tdblock">&nbsp;</td>
					<td>Total</td>
					<td colspan="2">NPR <?php echo number_format($grand_total); ?></td>
				</tr>
					
				<tr>
					<td>Discount</td>
					<td colspan="2"><?php echo $discount; ?></td>
				</tr>
					
				<tr>
					<td>Grand Total</td>
					<td colspan="2">NPR <?php echo number_format($gtot); ?></td>
				</tr>
        	</tbody>
		</table>
		<!-- table -->
		
		<div class="lastline">
			<p>In Words : <?php echo $this->{$mName}->convert_number($gtot); ?><br><br>
			Note: This is a computer generated invoice.</p>
		</div>
	</div>
   	<!-- print -->
</div>    
<!-- print-container -->
<?php }else{
	if(empty($attachment)){ ?>
		<i class='fa fa-user-circle-o' aria-hidden='true'></i>
	<?php }else{ ?>
    	<div class="img-circle userpic">
        	<div style="background-image: url('<?php echo $attachment; ?>');" class="img-circle userImg"></div>
        </div>
    <?php } ?>
    <!-- userpic -->
       
    <h5><strong>Full Name:</strong> <?php echo $name; ?></h5>
    <div class="badge-content">
		<span class="badge"><i class='fa fa-envelope' aria-hidden='true'></i> <?php echo $email; ?></span> 
		<span class="badge"><i class='fa fa-phone' aria-hidden='true'></i> <?php echo $phone; ?></span>
    </div>
    <p style="padding-bottom: 0;">Address:</strong> <?php echo $address; ?></p>
<?php } ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightbox.js"></script>
<script src="<?php echo base_url(); ?>assets/js/print.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#print').click(function(){
			$("#print-container").printThis({ 
				debug: true,              
				importCSS: true,             
				importStyle: true,         
				printContainer: true,       
				loadCSS: "<?php echo base_url(); ?>assets/css/printview.css", 
				pageTitle: "",             
				removeInline: false,        
				printDelay: 333,            
				header: null,             
				formValues: true          
			}); 
		});
	});
</script>
</body>
</html>
