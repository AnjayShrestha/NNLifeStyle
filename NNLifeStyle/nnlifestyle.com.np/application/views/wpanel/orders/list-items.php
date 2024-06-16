<div class="placeholder"></div>

<!-- container -->
<div class="container-fluid">
	<!-- row -->
	<div class="row">
    	
        <div class="col-md-10 col-md-offset-2">
            <!-- dashboard_graph -->
            
            <div class="content">
            	<!-- page-title -->
                <div class="page-title">
                        <!-- page-title-left -->
                        <div class="col-md-6 page-title-left">
                            <h3><?php echo $title; ?></h3>
                        </div>
                        <!-- page-title-left -->
                            
                        <!-- page-title-right -->    
                  		
                        <div class="clearfix"></div>
                        <!-- page-title-right --> 
                  </div>
                  <!-- page-title -->
                  
                  <div class="col-md-12"><div id="result"></div></div>
                  
            	<?php if(empty($content)){?>
                <div class="col-md-12">
                	<div class="alert alert-danger">
                		<strong>Empty!</strong> No records found.
                	</div>
                </div>
                <?php }else{ ?>
                <div class="col-md-12">
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
						foreach($content as $crow){ 
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
                <?php } 
				
				$search = $this->input->post('search');
				if(!empty($content) && empty($search)){ 
				?>
                <div class="col-md-5">
                	<p><a class="btn btn-danger multidelete"><i class="fa fa-trash" aria-hidden="true"></i> Delete Selected</a> &nbsp; Showing <?php if(count($content) == 0){ echo 0;}else{echo min($count) + 1;} ?> to <?php echo $c; ?> of <?php echo $total; ?> entries</p>
                
                </div>
                
                <div class="col-md-7 text-right">
                
                    <ul class="pagination">
                
                    <?php echo $pagination; ?>
                
                    </ul>
                
                </div>
                <?php } ?>
                <div class="clearfix"></div>
            
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

<div align="right"><input name="pc" type="hidden" id="pc" value="<?php echo $pc; ?>"></div>
<div align="right"><input name="pp" type="hidden" id="pp" value="<?php echo $pp; ?>"></div>
<div align="right"><input name="lp" type="hidden" id="lp" value="<?php echo $lastPage; ?>"></div>
<a class="redirect" href="<?php echo base_url($page.'/'.$pc); ?>" style="display:none;">redirect</a>

<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/selectmenu.js"></script>
<script>
$(document).ready(function(){
    $('[data-tooltip="tooltip"]').tooltip();
	$('.redirect').trigger('click');
});	
	
$(document).on('click', '#checkAll', function(){ 
    $('.check').not(this).prop('checked', this.checked);
});

$(document).on('click', '.status', function(e){
	var invoiceno = $(this).attr('data-invoice');
	var semail = $(this).attr('data-email');
	if($(this).prop('checked') == true){
		var cval = 'Approved';
	}else{
		var cval = 'Cancel';
	}
	
	$.ajax({
			type: "post",
			url: "<?php echo base_url($page.'/save'); ?>",
			data:{"status": cval, "invoice": invoiceno, "semail": semail},
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

$(document).on('click', '.del', function(e){ 
		var tableRow = $(".table tbody tr").length;
		var pc = $('#pc').val();
		var pp = $('#pp').val();
		
		if(pc == '' || pc == 0){
			var url = $('.redirect').attr('href', '<?php echo base_url($page.'/'); ?>' + pc);
		}else{
			if(tableRow == 1){
				var url = $('.redirect').attr('href', '<?php echo base_url($page.'/'); ?>' + (parseInt(pc) - parseInt(pp)));
			}
		}

		var id = $(this).attr("id");
		var c = confirm("Are you sure you want to delete this");
		
		if(c == true){
			$.ajax({
				type: "post",
				url: "<?php echo base_url($page.'/delete/'); ?>",
				data:{"id":id},
				success: function(data){
					$('.redirect').trigger('click');
					new PNotify({
									title: 'Delete',
									text: 'Delete Successfull',
									type: 'error',
									nonblock: {nonblock: true, nonblock_opacity: .2}
								});
				}
			});
		}
		e.stopImmediatePropagation();
});

$(document).on('click', '.multidelete', function(e){ 
		var dataString = $('.check:checked').serialize();
		var check = $('.check:checked').length;
		var tableRow = $(".table tbody tr").length;
		var result = parseInt(tableRow) - parseInt(check);
		var pc = $('#pc').val();
		var pp = $('#pp').val();
		
		if(dataString==''){
			var c = false;
			alert('No item selected');
		}else{
			var c = confirm("Are you sure you want to delete multiple selected items");
			if(pc == '' || pc == 0){
				var url = $('.redirect').attr('href', '<?php echo base_url($page.'/'); ?>' + pc);
			}else{
				if(result == 0){
					var url = $('.redirect').attr('href', '<?php echo base_url($page.'/'); ?>' + (parseInt(pc) - parseInt(pp)));
				}
			}
		}
		
		if(c == true){
			$.ajax({
				type: "post",
				url: "<?php echo base_url($page.'/multidelete/'); ?>",
				data: dataString,
				success: function(data){
					$('.redirect').trigger('click');
					new PNotify({
									title: 'Multiple Delete',
									text: 'Multiple Delete Successfull',
									type: 'error',
									nonblock: {nonblock: true, nonblock_opacity: .2}
								});
				}
			});
		}
		e.stopImmediatePropagation();
});

var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms (5 seconds)

$(document).on('keyup', '#msearch', function (e) {
	clearTimeout(typingTimer);
	var smatch = $(this).prop('value');
	typingTimer = setTimeout(function(){
        $.ajax({
			type: "post",
			url: "<?php echo base_url($page); ?>",
			data: {"search":smatch},
			beforeSend: function(){
				$('#result').html("<i class='fa fa-refresh fa-spin fa-3x fa-fw'></i> searching directory...");
			},
			success: function(data){
				$("#msearch").focus().val(smatch);
				$('.redirect').trigger('click');
			}
		});
    }, doneTypingInterval);
	e.stopImmediatePropagation();
});


$(document).on('click', '.pagination a, .redirect', function (e) {
	var pc = this.href.substr(this.href.lastIndexOf('/') + 1);
	var smatch = $("#msearch").val();

    $.ajax({
    type: "post",
    url: $(this).attr("href"),
	data:{"pc":pc, "search":smatch},
    success: function(response){
			$(".bcontent").html(response);
			$('[data-toggle="tooltip"]').tooltip();
			$("#jquery-accordion-menu").jqueryAccordionMenu();
			$('#demo-list .active').children('.submenu').show();
			$('#demo-list .active').find('span').addClass('submenu-indicator-open');
			$('.jquery-accordion-menu .submenu-indicator').css('-webkit-transition', 'transform 0s linear');
			$(".msearch").focus();
			$(".msearch").val(smatch);
    }

    });
	e.stopImmediatePropagation();
    return false;

});
	
$(document).on('click', '#send', function (e) {
	var id = $('#invoiceno').val();
	var cid = $('#cid').val();
	var semail = $('#semail').val();
	$.ajax({
		type: "POST",
		url: "<?php echo base_url($page.'/get_order_customer_info'); ?>",
		data: {"id":id, "type":"invoice", "cid": cid, "sendinvoice": "Yes", "semail": semail},
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