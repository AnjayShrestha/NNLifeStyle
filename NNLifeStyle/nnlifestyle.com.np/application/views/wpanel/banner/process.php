<?php 
$process = $this->input->post('process');
if($process = 'add'){
	$stitle = $attachment1 = $display_order = $imgurl = '';
}
if($process = 'edit'){
	foreach($sdata as $srow){
		$stitle = $srow->title;
		$attachment1 = $srow->attachment1;
		$display_order = $srow->display_order;
		$imgurl = $srow->img_url;
	} 
}
?>
    <input name="id" type="hidden" id="id" value="<?php echo $this->input->post('id'); ?>" />
    <input name="process" type="hidden" id="process" value="<?php echo $this->input->post('process'); ?>" />
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
				<input name="img_url" type="text" id="img_url" class="form-control" placeholder="Banner Url" value="<?php echo $imgurl; ?>">
			</div>
		</div>
      
      <div class="clearfix"></div>
        
	</div>