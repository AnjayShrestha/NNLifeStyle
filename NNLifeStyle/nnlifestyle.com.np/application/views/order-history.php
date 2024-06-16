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
<link href="<?php echo base_url(); ?>assets/css/j-forms.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
</head>

<body>
<?php 
$this->load->view('include/header');
?>
        
 <div style="background-image: url(<?php echo base_url('assets/images/rix0o97hv5.jpg'); ?>);" class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
  
   <div class="page-container">
   		<div class="container nsodetails">
        
        <div class="client-dashboard">
<div class="profile">
<?php if($this->session->userdata('is_user_logged_in') != true) redirect('login'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/j-forms.css" />

<h1>Order History</h1>

<div class="usernav">
<?php $this->load->view('include/usernav'); ?>
</div>
<!-- usernav -->

<div class="clear"></div><br />

<div class="contain-details nopadding">
<?php
$p = $this->uri->segment(2);
if(empty($p)){
	$c = 0;
}else{
	$c = $p;
}
?>
<table style="width:100%">
        <thead>
          <tr>
            <th width="10%">S.N.</th>
            <th width="40%">Invoice No.</th>
            <th width="30%">Invoice Date</th>
            <th width="20%">Inovice Details</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach($orders as $ordrow){ $count[] = $c;?>
          <tr>
            <td><?php echo ++$c; ?></td>
            <td><?php echo $ordrow->invoice_no; ?></td>
            <td><?php echo $ordrow->order_date; ?></td>
            <td><input name="info" class="btn btn-block info" type="button" id="<?php echo $ordrow->invoice_no; ?>" value="View Details"></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="clear"></div>
      <br />
      
<!--contain-details-->

</div>
<ul class="pagination">
		<?php echo $pagination; ?>
        </ul>
</div>
<!--contain-details-->

</div>
        
        </div>
        <!-- container -->
   </div>
   <!-- page-container -->
   <div class="clearfix"></div>
   
<?php $this->load->view('include/footer'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightbox.js"></script>
<script>
$(document).on('click', '.info', function (e) {
	var id = $(this).attr("id");
	$.ajax({
		type: "POST",
		url: "<?php echo base_url('front/show_invoice_details'); ?>",
		data: {"id":id},
		success: function(data)
		{
			$('.contain-details').html(data);
		}
	});
});

$(document).on('click', '#back', function (e) {
	$('.contain-details').load('<?php echo base_url('order-history'); ?> .contain-details');
});
</script>
</body>
</html>