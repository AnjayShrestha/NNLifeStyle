<?php 
$process = $this->input->post('process');
if($process = 'add'){
	$stitle = $attachment1 = $display_order = $img_url =  $pkg = $pid = '';
}
if($process = 'edit'){
	foreach($sdata as $srow){
		$stitle = $srow->title;
		$attachment1 = $srow->attachment1;
		$display_order = $srow->display_order;
		$pkg = $srow->packages;
		$pid = $srow->prod_id;
	} 
}
?>
    <input name="id" type="hidden" id="id" value="<?php echo $this->input->post('id'); ?>" />
    <input name="process" type="hidden" id="process" value="<?php echo $this->input->post('process'); ?>" />
    <input name="attachment1" type="hidden" id="attachment1" value='<?php echo $attachment1; ?>'>
    <input name="prod_id" type="hidden" id="prod_id" value='<?php echo $pid; ?>'>
    
    <div class="row">
       
		<div class="col-md-6 fileUpload">
                <div class="form-group">
                    <?php if($attachment1 == ""){?>
                    
                    
                    <div class="noImage thumbnail mediaUpload1" data-index="1">
                        <div class="noImage-content"><i class="fa fa-picture-o" aria-hidden="true"></i><p>Add Image</p></div>
                        
                    </div>
                    <div class="imgContainer1"></div>
                    <?php }else{ ?>
                        <div class="noImage thumbnail mediaUpload1" style="display:none;" data-index="1">
                            <div class="noImage-content"><i class="fa fa-picture-o" aria-hidden="true"></i><p>Add Image</p></div>
                        
                        </div>
                        <div class="imgContainer1">
                            <div class="ic">
                                <div style="width:100%; height:182px; background:url(<?php echo $attachment1; ?>); background-repeat:no-repeat; background-position:center center; background-size:cover; cursor:pointer; position:relative;"><p class="rFile" data-rm="1">remove file</p></div>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
        
        <div class="col-md-6">
			<div class="form-group">
				<input name="title" type="text" id="title" class="form-control" placeholder="Title" value="<?php echo $stitle; ?>">
			</div>
		</div>
                
		<div class="col-md-6">
			<div class="form-group">
				<input name="display_order" type="text" id="display_order" class="form-control" placeholder="Display Order" value="<?php echo $display_order; ?>">
			</div>
		</div>
       
       <div class="col-md-6">
			<div class="form-group">
				<label>Packages List</label>
				<select name="packages" id="packages" class="form-control">
               		<option value="">Select Package</option>
               		<?php foreach($packages as $prow){ ?>
                		<option value="<?php echo $prow->title; ?>" data-id="<?php echo $prow->id; ?>" <?php if($pkg == $prow->title){ echo 'selected';} ?>><?php echo $prow->title; ?></option>
                	<?php } ?>
              	</select>
			</div>
		</div>
        
	</div>
	
<script>
$(document).on('change', '#packages', function(){ 
	var pid = $('option:selected', this).attr('data-id');
	$('#prod_id').val(pid);
});
</script>