<?php 
$process = $this->input->post('process');
if($process = 'add'){
	$uemail = $upwd = $fname = $lname = $phone = '';
	$status = 'Pending';
}
if($process = 'edit'){
	foreach($sdata as $srow){
		$uemail = $srow->user_email;
		$upwd = $srow->user_password;
		$fname = $srow->first_name;
		$lname = $srow->last_name;
		$phone = $srow->phone;
		$status = $srow->status;
	} 
}
?>
    <input name="id" type="hidden" id="id" value="<?php echo $this->input->post('id'); ?>" />
    <input name="process" type="hidden" id="process" value="<?php echo $this->input->post('process'); ?>" />
    
    <div class="row">
        <div class="col-md-6">
			<div class="form-group">
				<input name="user_email" type="email" id="user_email" class="form-control" placeholder="Email Address" value="<?php echo $uemail; ?>">
			</div>
		</div>
                
		<div class="col-md-6">
			<div class="form-group">
				<input name="user_password" type="text" id="user_password" class="form-control" placeholder="Password" value="<?php echo $upwd; ?>">
			</div>
		</div>
        
        <div class="col-md-6">
			<div class="form-group">
				<input name="first_name" type="text" id="first_name" class="form-control" placeholder="First Name" value="<?php echo $fname; ?>">
			</div>
		</div>
        
        <div class="col-md-6">
			<div class="form-group">
				<input name="last_name" type="text" id="last_name" class="form-control" placeholder="Last Name" value="<?php echo $lname; ?>">
			</div>
		</div>
        
        <div class="col-md-6">
			<div class="form-group">
				<input name="phone" type="text" id="phone" class="form-control" placeholder="Phone Number" value="<?php echo $phone; ?>">
			</div>
		</div>
        
        <div class="col-md-6">
			<div class="form-group">
            	<label>Status:</label>
				<select name="status" class="form-control">
                	<option value="Approved" <?php if($status == 'Approved'){ echo 'selected';} ?>>Approved</option>
                    <option value="Pending" <?php if($status == 'Pending'){ echo 'selected';} ?>>Pending</option>
                    <option value="Cancel" <?php if($status == 'Approved'){ echo 'selected';} ?>>Cancel</option>
                </select>
			</div>
		</div>
        
	</div>