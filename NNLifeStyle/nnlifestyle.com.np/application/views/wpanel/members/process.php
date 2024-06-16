<?php 
$process = $this->input->post('process');
if($process = 'add'){
	$uemail = $upwd = $fname = $lname = $phone = $address = '';
	$status = 'active';
}
if($process = 'edit'){
	foreach($sdata as $srow){
		$uemail = $srow->user_email;
		$spwd = $srow->user_show_password;
		$upwd = $srow->user_password;
		$fname = $srow->full_name;
		$phone = $srow->phone;
		$address = $srow->address;
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
				<input name="password" type="text" id="password" class="form-control" placeholder="Change Password">
				<input name="user_show_password" type="hidden" id="user_show_password" class="form-control" value="<?php echo $spwd; ?>">
			</div>
		</div>
	</div>
	<div class="row">
        
        <div class="col-md-6">
			<div class="form-group">
				<input name="full_name" type="text" id="full_name" class="form-control" placeholder="Full Name" value="<?php echo $fname; ?>">
			</div>
		</div>
        
      <!--   <div class="col-md-6">
			<div class="form-group">
				<input name="last_name" type="text" id="last_name" class="form-control" placeholder="Last Name" value="<?php echo $lname; ?>">
			</div>
		</div> -->
        
        <div class="col-md-6">
			<div class="form-group">
				<input name="phone" type="text" id="phone" class="form-control" placeholder="Phone Number" value="<?php echo $phone; ?>">
			</div>			
			
		</div>
	</div>
	<div class="row">

		<div class="col-md-6">
			<div class="form-group">
				<textarea name="address" id="address" class="form-control" placeholder="Address"><?php echo $address; ?></textarea>
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