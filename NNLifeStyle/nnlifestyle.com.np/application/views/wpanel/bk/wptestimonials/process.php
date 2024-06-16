<?php 
$process = $this->input->post('process');
if($process = 'add'){
	$stitle = $attachment1 = $display_order = $email = $phone = $address = $status = $description = '';
}
if($process = 'edit'){
	foreach($sdata as $srow){
		$stitle = $srow->fname;
		$attachment1 = $srow->attachment1;
		$display_order = $srow->display_order;
		$email = $srow->email;
		$phone = $srow->phone;
		$address = $srow->address;
		$description  = $srow->message;
		$status = $srow->status;
	} 
}
?>
    <input name="id" type="hidden" id="id" value="<?php echo $this->input->post('id'); ?>" />
    <input name="process" type="hidden" id="process" value="<?php echo $this->input->post('process'); ?>" />
    <input name="attachment1" type="hidden" id="attachment1" value='<?php echo $attachment1; ?>'>
    
    <div class="row">
    
    	<div class="col-md-6">
			<div class="form-group">
				<input name="fname" type="text" id="fname" class="form-control" placeholder="Full Name" value="<?php echo $stitle; ?>">
			</div>
		</div>
                
		<div class="col-md-6">
			<div class="form-group">
				<input name="email" type="text" id="college" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
			</div>
		</div>
       
       <div class="col-md-6">
			<div class="form-group">
				<input name="phone" type="text" id="phone" class="form-control" placeholder="Phone" value="<?php echo $phone; ?>">
			</div>
		</div>
                
		<div class="col-md-6">
			<div class="form-group">
				<input name="address" type="text" id="address" class="form-control" placeholder="Address" value="<?php echo $address; ?>">
			</div>
		</div>
       
		<div class="col-md-4 fileUpload">
        
			<div class="form-group">
				<input name="display_order" type="text" id="display_order" class="form-control" placeholder="Display Order" value="<?php echo $display_order; ?>">
			</div>
       
       		<div class="form-group">
            	<label>Status:</label>
				<select name="status" class="form-control">
               		<option value="Pending" <?php if($status == 'Pending'){ echo 'selected';} ?>>Pending</option>
                	<option value="Approved" <?php if($status == 'Approved'){ echo 'selected';} ?>>Approved</option>
                </select>
			</div>
        
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
        
        <div class="col-md-8">
			<div class="form-group">
                <textarea name="message" id="description" placeholder="Message"><?php echo $description; ?></textarea>
			</div>
		</div>
	</div>

<script type="text/javascript">
 CKEDITOR.replace( 'description',
{
	toolbar :
		[
			{ name: 'insert', items : ['Image', 'Table', 'Youtube'] },
			{ name: 'document', items : ['Source'] },
			{ name: 'clipboard', items : [ 'Cut','Copy','Paste','Link','Unlink','Blockquote'] },
			{ name: 'links', items : [ 'TextColor','BGColor','Bold','Italic','Strike','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','NumberedList','BulletedList'] },
			{ name: 'styles', items : [ 'Format','Font','FontSize','RemoveFormat' ] }
		],
	
	filebrowserBrowseUrl : '<?php echo base_url(); ?>editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url(); ?>editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '/ckfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '/ckfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '/ckfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Flash',
});
</script>