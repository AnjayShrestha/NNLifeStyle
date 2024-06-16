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
                  		<div class="col-md-6">
                       		<div class="col-md-offset-1 col-md-4 addSection">
                              <button class="btn btn-default btn-block showAddEdit" id=""><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo $at; ?></button>
                              </div>
                        </div>
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
                          	<th class="col-md-1"><input name="checkAll" type="checkbox" id="checkAll"></th>
                            <th class="col-md-1">S.N.</th>
                            <th class="col-md-2">Name</th>
                            <th class="col-md-4">Email</th>
                            <th class="col-md-2">Phone</th>
                            <th class="col-md-1 text-center">Status</th>
                            <th class="col-md-1 text-center">Action</th>
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
                          	<td class="col-md-1"><input name="check[]" type="checkbox" id="check[]" class="check" value="<?php echo $crow->id; ?>" ></td>
                            <td class="col-md-1"><?php echo ++$c; ?></td>
                            <!-- <td class="col-md-4"><?php echo $crow->first_name." ".$crow->last_name; ?></td> -->
                            <td class="col-md-4"><?php echo $crow->full_name ?></td>
                            <td class="col-md-2"><?php echo $crow->user_email; ?></td>
                            <td class="col-md-2"><?php echo $crow->phone; ?></td>
                            <td class="col-md-1 text-center">
                            	<label class="switch">
								  <input class="status" name="status" id="<?php echo $crow->id; ?>" type="checkbox" <?php if($crow->status == 'active'){ echo 'checked';} ?>>
								  <span class="slider round"></span>
								</label>
                            </td>
                            
                            <td class="col-md-1 tools text-center">
                            	<a class="btn btn-success showAddEdit" data-toggle="tooltip" data-placement="top" title="Edit Data" id="<?php echo $crow->id; ?>">
                            		<i class="fa fa-edit" aria-hidden="true"></i>
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
<form method="post" class="myForm">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      	<div class="fdata"></div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" data-dismiss="modal">Close</a>
        <!--a class="btn btn-success" id="save">Submit</a-->
        <input type="submit" class="btn btn-success" name="submit" id="submit" value="Submit">
      </div>
    </div>
  </div>
</div>
</form>
<!-- Modal -->

<div align="right"><input name="pc" type="hidden" id="pc" value="<?php echo $pc; ?>"></div>
<div align="right"><input name="pp" type="hidden" id="pp" value="<?php echo $pp; ?>"></div>
<div align="right"><input name="lp" type="hidden" id="lp" value="<?php echo $lastPage; ?>"></div>
<a class="redirect" href="<?php echo base_url($page.'/'.$pc); ?>" style="display:none;">redirect</a>

<!-- jQuery -->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});	
	
$(document).on('click', '#checkAll', function(){ 
    $('input:checkbox').not(this).prop('checked', this.checked);
});
	
$(document).on('click', '.status', function(event){
	var id = $(this).attr('id');
	if($(this).prop('checked') == true){
		var cval = 'active';
	}else{
		var cval = 'inactive';
	}
	
	$.ajax({
			type: "post",
			url: "<?php echo base_url($page.'/save'); ?>",
			data:{"id":id, "process": "update", "status": cval, "stype": "status"},
			success: function(data){
				new PNotify({
					title: 'Status',
					text: 'Status Changed Successfully',
					type: 'success',
					nonblock: {nonblock: true, nonblock_opacity: .2}
				});
			}
	});
	event.stopImmediatePropagation();
});

$(document).on('click', '.showAddEdit', function(e){
		$('#myModal').modal("show");
		var id = $(this).attr("id");
		if(id == ""){
			var process = "add";
			$("#myModal .modal-title").html("<?php echo $at; ?>");
		}else{
			var process = "edit";
			$("#myModal .modal-title").html("<?php echo $et; ?>");
		}
		
		$.ajax({
			type: "post",
			url: "<?php echo base_url($page.'/process/'); ?>",
			data:{"id":id, "process":process},
			beforeSend: function(){
		   		$('.fdata').html(" <i class='fa fa-refresh fa-spin fa-1x fa-fw'></i> please wait...");
			},
			success: function(data){
				
				$('.fdata').html(data);
			}
		});
		e.stopImmediatePropagation();
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

$(document).on('click', '#submit', function(e){ 
	$( ".myForm" ).validate( {
		rules: {
					user_email: {
							required: true,
							email: true
					},
					
					user_password: "required",
					full_name: "required",
					// last_name: "required",
					phone: {
							required: true,
							number: true,
							minlength: 10,
							maxlength: 10							
					}
				},
				messages: {
					user_email: {
						email:"Please enter a valid email"
					},
					phone: {
						number:"Please enter a valid number"
					}
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );
					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".form-group" ).addClass( "has-feedback" );
					error.insertAfter( element );
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				},
				
				submitHandler: function (form) {
				$( ".form-group" ).removeClass( "has-success" );
				$( ".form-group span" ).removeClass( "glyphicon-ok" );
				
				var tableRow = $(".table tbody tr").length;
				var process = $('#process').val();
				var pc = $('#pc').val();
				var pp = $('#pp').val();
				var lp = $('#lp').val();
				
				if(lp == 0){
					var url = $('.redirect').attr('href', '<?php echo base_url($page.'/'); ?>' + pc);
				}else{
					if(pc == '' || pc == 0){
						if(tableRow == pp && process == 'add'){
							var url = $('.redirect').attr('href', '<?php echo base_url($page.'/'); ?>' + pp);
						}
					}else{
						if(tableRow == pp && process == 'add'){
							var url = $('.redirect').attr('href', '<?php echo base_url($page.'/'); ?>' + (parseInt(pc) + parseInt(pp)));
						}
					}
				}
					
				var dataString = $('.myForm').serialize();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url($page."/save"); ?>",
					data: dataString,
					beforeSend: function(){
						$('.page-header h4 span').html("<i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>");
					},
					success: function(data){
						$('#myModal').modal("hide");
						var process = $('#process').val();
						if(process == 'add'){
							var msg = '<?php echo $pn_add_msg; ?>';
						}else{
							var msg = '<?php echo $pn_edit_msg; ?>';
						}
						
						$('#myModal').on('hidden.bs.modal', function (e) {
							new PNotify({
										title: '<?php echo $pn_title; ?>',
										text: msg,
										type: '<?php echo $pn_type; ?>',
										nonblock: {nonblock: true, nonblock_opacity: .2}
								});
							$('.redirect').trigger('click');
						});
						
						
					}
				});
				return false;
			}
	});
});
</script>