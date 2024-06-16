<?php 
$process = $this->input->post('process');
if($process = 'add'){
	$stitle = $attachment = $discount = '';
	$key = $token;
	$status = 'active';
}
if($process = 'edit'){
	foreach($sdata as $srow){
		$stitle = $srow->title;
		$key = $srow->coupon_token;
		$discount = $srow->discount;
		$status = $srow->status;
	} 
}
?>
    <input name="id" type="hidden" id="id" value="<?php echo $this->input->post('id'); ?>" />
    <input name="process" type="hidden" id="process" value="<?php echo $this->input->post('process'); ?>" />
    
    <div class="row">
        
        <div class="col-md-6">
			<div class="form-group">
				<input name="title" type="text" id="title" class="form-control" placeholder="Title" value="<?php echo $stitle; ?>">
			</div>
		</div>
                
		<div class="col-md-6">
			<div class="form-group">
				<input name="coupon_token" type="text" id="coupon_token" class="form-control" value="<?php echo $key; ?>" readonly required>
			</div>
		</div>
        
        <div class="col-md-6">
			<div class="form-group">
				<input name="discount" type="text" id="discount" class="form-control" placeholder="Discount" value="<?php echo $discount; ?>">
			</div>
		</div>
        
        <div class="col-md-6">
			<div class="form-group">
            	<label>Status:</label>
				<input name="status" type="radio" id="status" value="active" <?php if($status == 'active'){echo 'checked';} ?>> Active 
                <input name="status" type="radio" id="status" value="inactive" <?php if($status == 'inactive'){echo 'checked';} ?>> Inactive
			</div>
		</div>
        
	</div>