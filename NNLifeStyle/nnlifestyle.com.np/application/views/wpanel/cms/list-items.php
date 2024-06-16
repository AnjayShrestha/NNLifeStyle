<div class="placeholder"></div>

<!-- container -->
<div class="container-fluid">

	<!-- row -->
	<div class="row">
    	
        <div class="col-md-10 col-md-offset-2">
        	
            <!-- dashboard_graph -->
            
            <div class="content">
                <div class="col-md-12">
                    <h3><?php echo $title; ?></h3>
                	
                	<table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th class="col-md-1">S.N.</th>
                            <th class="col-md-3">Page Type</th>
                            <th class="col-md-3">Page Title</th>
                            <th class="col-md-4">Description</th>
                            <th class="col-md-1 text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $c = 0; foreach($content as $crow){ ?>
                          <tr>
                            <td class="col-md-1"><?php echo ++$c; ?></td>
                            <td class="col-md-3"><?php echo $crow->page_type; ?></td>
                            <td class="col-md-3"><?php echo $crow->page_title; ?></td>
                            <td class="col-md-4">
								<p><?php echo $this->common->summaryModeb(strip_tags($crow->description), 10, "..."); ?></p>
                            </td>
                            <td class="col-md-1 tools text-center">
                            	<a class="btn btn-success process" data-toggle="tooltip" data-placement="top" title="Edit Data" id="<?php echo $crow->id; ?>">
                            		<i class="fa fa-edit" aria-hidden="true"></i>
                            	</a>
                            </td>
                          </tr>
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
<a class="redirect" href="<?php echo base_url($page); ?>" style="display:none;">redirect</a>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
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
        <a class="btn btn-success" id="save">Save changes</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


<script type="text/javascript" src="<?php echo base_url(); ?>editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>editor/ckfinder/ckfinder.js"></script>
<!-- jQuery -->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});	
	
$(document).on('click', '.process', function(){ 
		$('#myModal').modal("show");
		var id = $(this).attr("id");
		$("#myModal .modal-title").html("<?php echo $et; ?>");
		$.ajax({
			type: "post",
			url: "<?php echo base_url('cms/process/'); ?>",
			data:{"id":id},
			beforeSend: function(){
		   		$('.fdata').html(" <i class='fa fa-refresh fa-spin fa-1x fa-fw'></i> please wait...");
			},
			success: function(data){
				
				$('.fdata').html(data);
			}
		});
});

$(document).on('click', '#save', function (e) {
	for ( instance in CKEDITOR.instances ) {
		CKEDITOR.instances[instance].updateElement();
	}
	var dataString = $('.myForm').serialize();
	$.ajax({
			type: "POST",
			url: "<?php echo base_url("cms/save"); ?>",
			data: dataString,
			beforeSend: function(){
				$('.page-header h4 span').html("<i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>");
			},
			success: function(data)
			{
				$('#myModal').modal("hide");
				$('#myModal').on('hidden.bs.modal', function (e) {
					new PNotify({
								title: '<?php echo $pn_title; ?>',
								text: '<?php echo $pn_edit_msg; ?>',
								type: '<?php echo $pn_type; ?>',
								nonblock: {nonblock: true, nonblock_opacity: .2}
							});
					$('.redirect').trigger('click');
				});
			}
	});
	e.stopImmediatePropagation();
    return false;
});

$(document).on('click', '.redirect', function (e) {
    $.ajax({
    type: "post",
    url: $(this).attr("href"),
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
</script>