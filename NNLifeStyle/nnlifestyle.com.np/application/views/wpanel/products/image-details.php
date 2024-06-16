<?php
$icount = count($idata);
if($icount == 0){
	$attachment1 = "";
	$attachment2 = "";
	$attachment3 = "";
	$attachment4 = "";
}else{
	foreach($idata as $irow){
		$attachment1 = $irow->attachment1;
		$attachment2 = $irow->attachment2;
		$attachment3 = $irow->attachment3;
		$attachment4 = $irow->attachment4;
	}
}
?>
<input name="attachment1" type="hidden" id="attachment1" class="attachment1" value='<?php echo $attachment1; ?>'>
<input name="attachment2" type="hidden" id="attachment2" class="attachment2" value='<?php echo $attachment2; ?>'>
<input name="attachment3" type="hidden" id="attachment3" class="attachment3" value='<?php echo $attachment3; ?>'>
<input name="attachment4" type="hidden" id="attachment4" class="attachment4" value='<?php echo $attachment4; ?>'>

<div class="row" style="margin-top: 10px;">
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
            
            <div class="col-md-6 fileUpload">
                <div class="form-group">
                    <?php if($attachment2 == ""){?>
                    
                    
                    <div class="noImage thumbnail mediaUpload2" data-index="2">
                        <div class="noImage-content"><i class="fa fa-picture-o" aria-hidden="true"></i><p>Add Image</p></div>
                        
                    </div>
                    <div class="imgContainer2"></div>
                    <?php }else{ ?>
                        <div class="noImage thumbnail mediaUpload2" style="display:none;" data-index="2">
                            <div class="noImage-content"><i class="fa fa-picture-o" aria-hidden="true"></i><p>Add Image</p></div>
                        
                        </div>
                        <div class="imgContainer2">
                            <div class="ic">
                                <div style="width:100%; height:182px; background:url(<?php echo $attachment2; ?>); background-repeat:no-repeat; background-position:center center; background-size:cover; cursor:pointer; position:relative;"><p class="rFile" data-rm="2">remove file</p></div>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
            
            <div class="col-md-6 fileUpload">
                <div class="form-group">
                    <?php if($attachment3 == ""){?>
                    
                    
                    <div class="noImage thumbnail mediaUpload3" data-index="3">
                        <div class="noImage-content"><i class="fa fa-picture-o" aria-hidden="true"></i><p>Add Image</p></div>
                        
                    </div>
                    <div class="imgContainer3"></div>
                    <?php }else{ ?>
                        <div class="noImage thumbnail mediaUpload3" style="display:none;" data-index="3">
                            <div class="noImage-content"><i class="fa fa-picture-o" aria-hidden="true"></i><p>Add Image</p></div>
                        
                        </div>
                        <div class="imgContainer3">
                            <div class="ic">
                                <div style="width:100%; height:182px; background:url(<?php echo $attachment3; ?>); background-repeat:no-repeat; background-position:center center; background-size:cover; cursor:pointer; position:relative;"><p class="rFile" data-rm="3">remove file</p></div>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
            
            <div class="col-md-6 fileUpload">
                <div class="form-group">
                    <?php if($attachment4 == ""){?>
                    
                    
                    <div class="noImage thumbnail mediaUpload4" data-index="4">
                        <div class="noImage-content"><i class="fa fa-picture-o" aria-hidden="true"></i><p>Add Image</p></div>
                        
                    </div>
                    <div class="imgContainer4"></div>
                    <?php }else{ ?>
                        <div class="noImage thumbnail mediaUpload4" style="display:none;" data-index="4">
                            <div class="noImage-content"><i class="fa fa-picture-o" aria-hidden="true"></i><p>Add Image</p></div>
                        
                        </div>
                        <div class="imgContainer4">
                            <div class="ic">
                                <div style="width:100%; height:182px; background:url(<?php echo $attachment4; ?>); background-repeat:no-repeat; background-position:center center; background-size:cover; cursor:pointer; position:relative;"><p class="rFile" data-rm="4">remove file</p></div>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>