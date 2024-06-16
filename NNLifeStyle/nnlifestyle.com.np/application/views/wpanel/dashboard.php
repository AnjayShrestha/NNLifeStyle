<div class="placeholder"></div>

<!-- container -->
<div class="container-fluid">

	<!-- row -->
	<div class="row">
    	
        <div class="col-md-10 col-md-offset-2">
        	
            <!-- dashboard_graph -->
            
            <div class="dashboard">
               
                <div class="col-md-4">
                    <div class="dashbox">
                        <div class="page-header">
                        	<h3>Category</h3>
                        </div>
                        
                        <div class="row dashcontent">
                        	<div class="col-md-8">
                            	<div class="price">Total Count: <?php echo $category; ?></div>
                            </div>
                            
                            <div class="col-md-4">
                            	<a href="<?php echo base_url("category"); ?>" class="btn btn-danger btn-xs">Manage Category</a>
                            </div>
                            
                            <div class="clearfix"></div>
                            
                            <p>Total Category in store</p>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-4">
                    <div class="dashbox">
                        <div class="page-header">
                        	<h3>Products</h3>
                        </div>
                        
                        <div class="row dashcontent">
                        	<div class="col-md-8">
                            	<div class="price">Total Count: <?php echo $products; ?></div>
                            </div>
                            
                            <div class="col-md-4">
                            	<a href="<?php echo base_url("product"); ?>" class="btn btn-success btn-xs">Manage Products</a>
                            </div>
                            
                            <div class="clearfix"></div>
                            
                            <p>Total Products in store</p>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-4">
                    <div class="dashbox">
                        <div class="page-header">
                        	<h3>Members</h3>
                        </div>
                        
                        <div class="row dashcontent">
                        	<div class="col-md-8">
                            	<div class="price">Total Count: <?php echo $members; ?></div>
                            </div>
                            
                            <div class="col-md-4">
                            	<a href="<?php echo base_url("members"); ?>" class="btn btn-warning btn-xs">Manage Members</a>
                            </div>
                            
                            <div class="clearfix"></div>
                            
                            <p>Total Members we have</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="col-md-12"><br>
                    <h3>Latest Orders</h3>
                	
                	<table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                          	<th><input name="checkAll" type="checkbox" id="checkAll"></th>
                            <th>S.N.</th>
                            <th>Invoice No.</th>
                            <th>Email</th>
                            <th>Invoice Date</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Info</th>
                            <th class="text-center">Invoice</th>
                          </tr>
                        </thead>
                        <tbody class="tbody">
                        <?php 
						if(empty($pc)){ $c = 0; }else{ $c = $pc;} 
						foreach($orders as $crow){ 
							$count[] = $c;
						?>
                        <div class="tt">
                          <tr>
                          	<td><input name="check[]" type="checkbox" id="check[]" class="check" value="<?php echo $crow->id; ?>" ></td>
                            <td><?php echo ++$c; ?></td>
                            <td><?php echo $crow->invoice_no; ?></td>
                            <td><?php echo $crow->user_email; ?></td>
                            <td><?php echo $crow->order_date; ?></td>
                            <td class="text-center">
                                <label class="switch">
								  <input class="status" name="status" data-email="<?php echo $crow->user_email; ?>" data-invoice="<?php echo $crow->invoice_no; ?>" id="<?php echo $crow->id; ?>" type="checkbox" <?php if($crow->status == 'Approved'){ echo 'checked';} ?>>
								  <span class="slider round"></span>
								</label>
                            </td>
							  
                            <td class="tools text-center">
                            	<a class="btn btn-success info" id="<?php echo $crow->user_session_id; ?>" data-invoiceno="<?php echo $crow->invoice_no; ?>"  data-type="member" data-title="Customer Information" data-toggle="modal" data-tooltip="tooltip" data-placement="top" title="Client Info" id="<?php echo $crow->id; ?>">
                            		<i class="fa fa-info-circle" aria-hidden="true"></i>
                            	</a>
                            </td>
                            <td class="tools text-center">
                            	<a class="btn btn-info info" id="<?php echo $crow->invoice_no; ?>" data-cid="<?php echo $crow->user_session_id; ?>"  data-type="invoice" data-title="Invoice Details" data-toggle="modal" data-tooltip="tooltip" data-placement="top" title="Invoice" id="<?php echo $crow->id; ?>">
                            		<i class="fa fa-print" aria-hidden="true"></i>
                            	</a>
                            </td>
                          </tr>
                          </div>
                        <?php } ?>
                        </tbody>
                      </table>
                
                </div>
            
            </div>
            
            <!-- dashboard_graph -->
            
        </div>
        
    </div>
    <!-- row -->

</div>
<!-- container -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      	<div class="media-content" style="height:100%;">
      		<div class="inforesults"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<script>
$(document).ready(function(){
    $('[data-tooltip="tooltip"]').tooltip();
});
	
$(document).on('click', '.status', function(e){
	var invoiceno = $(this).attr('data-invoice');
	if($(this).prop('checked') == true){
		var cval = 'Approved';
	}else{
		var cval = 'Cancel';
	}
	
	$.ajax({
			type: "post",
			url: "<?php echo base_url($page.'/save'); ?>",
			data:{"status": cval, "invoice": invoiceno},
			success: function(data){
				new PNotify({
					title: 'Status',
					text: 'Status Changed Successfully',
					type: 'success',
					nonblock: {nonblock: true, nonblock_opacity: .2}
				});
			}
	});
	e.stopImmediatePropagation();
});	
	
$(document).on('click', '.info', function (e) {
	var id = $(this).attr("id");
	var type = $(this).attr("data-type");
	var cid = $(this).attr("data-cid");
	var inid = $(this).attr("data-invoiceno");
	if(type == 'invoice'){
		$('#myModal').removeClass('ordersinfo');
		$('#myModal').addClass('orders');
		$('#myModal .modal-body').css('padding', 0);
		$('#myModal .modal-header').hide();
		$('#myModal .modal-footer').hide();
	}else{
		$('#myModal').removeClass('orders');
		$('#myModal').addClass('ordersinfo');
		$('#myModal .modal-body').css('padding', '15px');
		$('#myModal .modal-header').show();
		$('#myModal .modal-footer').show();
	}
	var title = $(this).attr("data-title");
	$(".modal-title").html(title);
	$.ajax({
		type: "POST",
		url: "<?php echo base_url($page.'/get_order_customer_info'); ?>",
		data: {"id":id, "inid":inid, "type":type, "cid": cid},
		success: function(data)
		{
			$('#status').html('');
			$("#myModal").modal("show");
			$('.inforesults').html(data);
		}
	});
});
	
$(document).on('click', '#send', function (e) {
	var id = $('#invoiceno').val();
	var cid = $('#cid').val();
	$.ajax({
		type: "POST",
		url: "<?php echo base_url($page.'/get_order_customer_info'); ?>",
		data: {"id":id, "type":"invoice", "cid": cid, "sendinvoice": "Yes"},
		beforeSend: function(){
			$('#status').html('<div class="alert alert-success"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i> Generating PDF! Please wait...</div>');
		},
		success: function(data)
		{
			$('#status').html('');
			$('.inforesults').html(data);
			new PNotify({
				title: 'Invoice Sent',
				text: 'Invoice Sent Successfully',
				type: 'success',
				nonblock: {nonblock: true, nonblock_opacity: .2}
			});
		}
	});
	e.stopImmediatePropagation();
});
</script>