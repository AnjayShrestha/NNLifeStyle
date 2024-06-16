<?php 
$process = $this->input->post('process');
if($process = 'add'){
	$stitle = $display_order = $permalink = '';
	$dif = 'No';
}
if($process = 'edit'){
	foreach($sdata as $srow){
		$stitle = $srow->title;
		$display_order = $srow->display_order;
		$dif = $srow->display_in_front;
		$permalink = $srow->permalink;
	} 
}
?>
    <input name="id" type="hidden" id="id" value="<?php echo $this->input->post('id'); ?>" />
    <input name="process" type="hidden" id="process" value="<?php echo $this->input->post('process'); ?>" />
    <input type="hidden" name="permalink" id="permalink">
    
    <div class="row">
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
        		<label>Display In Front:</label>
				<input name="display_in_front" type="radio" id="display_in_front" value="Yes" <?php if($dif == 'Yes'){echo 'checked';} ?>> Yes 
				<input name="display_in_front" type="radio" id="display_in_front" value="No" <?php if($dif == 'No'){echo 'checked';} ?>> No
        	</div>
        </div>
	</div>
	
<script>
$('#permalink').slugger({
    source: '#title',
	prefix: '',
	suffix:'',
	readonly: true
});
</script>