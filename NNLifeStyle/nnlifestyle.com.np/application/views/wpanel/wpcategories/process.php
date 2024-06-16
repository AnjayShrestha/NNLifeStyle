<?php 
$process = $this->input->post('process');
if($process = 'add'){
	$stitle = $attachment1 = $display_order = $permalink = $shortdesc = $tags = '';
	$dih = 'No';
}
if($process = 'edit'){
	foreach($sdata as $srow){
		$stitle = $srow->title;
		$attachment1 = $srow->attachment1;
		$display_order = $srow->display_order;
		$dih = $srow->display_in_home;
		$permalink = $srow->permalink;
		$shortdesc = $srow->shortdesc;
		$tags = $srow->tags;
	} 
}
?>
    <input name="id" type="hidden" id="id" value="<?php echo $this->input->post('id'); ?>" />
    <input name="process" type="hidden" id="process" value="<?php echo $this->input->post('process'); ?>" />
    <input type="hidden" name="permalink" id="permalink">
	<input name="attachment1" type="hidden" id="attachment1" value='<?php echo $attachment1; ?>'>
  
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
				<input name="title" type="text" id="title" autocomplete="off" class="form-control" placeholder="Title" value="<?php echo $stitle; ?>">
			</div>
		</div>
                
		<div class="col-md-6">
			<div class="form-group">
				<input name="display_order" type="text" id="display_order" class="form-control" placeholder="Display Order" value="<?php echo $display_order; ?>">
			</div>
		</div>
        
        <div class="col-md-6">
        	<div class="form-group">
        		<label>Display In Home:</label>
				<input name="display_in_home" type="radio" id="display_in_home" value="Yes" <?php if($dih == 'Yes'){echo 'checked';} ?>> Yes 
				<input name="display_in_home" type="radio" id="display_in_home" value="No" <?php if($dih == 'No'){echo 'checked';} ?>> No
        	</div>
        	
        	<div class="form-group">
        		<label>Tags:</label>
				<input name="tags" type="radio" id="tags" value="Men" <?php if($tags == 'Men'){echo 'checked';} ?>> Men 
				<input name="tags" type="radio" id="tags" value="Women" <?php if($tags == 'Women'){echo 'checked';} ?>> Women
				<input name="tags" type="radio" id="tags" value="Bags" <?php if($tags == 'Bags'){echo 'checked';} ?>> Bags
        	</div>
        </div>
		
  		
  	</div>
	
<script>
$(document).on('click', '.des_id', function(){ 
	var id = $(this).val();
	$('#destination').val($(this).attr('data-name'));
	$('#des_slug').val($(this).attr('data-slug'));
});
	
$('#permalink').slugger({
    source: '#title',
	prefix: '',
	suffix:'',
	readonly: true
});
</script>