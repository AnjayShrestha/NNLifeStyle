<?php 
$process = $this->input->post('process');
if($process = 'add'){
	$pcode = $stitle = $attachment1 = $attachment2 = $attachment3 = $attachment4 = $attachment5 = $display_order = $price = $catid = $category = $cat_slug = '';
	$bs = 'No';
	$fd = 'No';
	$description = '';
}
if($process = 'edit'){
	foreach($sdata as $srow){
		$pcode = $srow->pcode;
		$stitle = $srow->title;
		$attachment1 = $srow->attachment1;
		$attachment2 = $srow->attachment2;
		$attachment3 = $srow->attachment3;
		$attachment4 = $srow->attachment4;
		$attachment5 = $srow->attachment5;
		$display_order = $srow->display_order;
		$bs = $srow->best_selling;
		$fd = $srow->feature;
		$price = $srow->price;
		$cat_slug = $srow->cat_slug;
		$catid = $srow->cat_id;
		$category = $srow->category;
		$description = $srow->description;
	} 
}
?>
    <input name="id" type="hidden" id="id" value="<?php echo $this->input->post('id'); ?>" />
    <input name="process" type="hidden" id="process" value="<?php echo $this->input->post('process'); ?>" />
    <input name="attachment1" type="hidden" id="attachment1" value='<?php echo $attachment1; ?>'>
    <input name="attachment2" type="hidden" id="attachment2" value='<?php echo $attachment2; ?>'>
    <input name="attachment3" type="hidden" id="attachment3" value='<?php echo $attachment3; ?>'>
    <input name="attachment4" type="hidden" id="attachment4" value='<?php echo $attachment4; ?>'>
    <input name="attachment5" type="hidden" id="attachment5" value='<?php echo $attachment5; ?>'>
    <input name="category" type="hidden" id="category" value='<?php echo $category; ?>'>
    <input name="cat_slug" type="hidden" id="cat_slug" value="<?php echo $cat_slug; ?>">
    <input type="hidden" name="permalink" id="permalink">
    
    <div class="col-md-8 nopadding">
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
                    <input name="price" type="text" id="price" class="form-control" placeholder="Price" value="<?php echo $price; ?>">
                </div>
            </div>
        </div>
    </div>
    <!-- left -->
    
    <div class="col-md-4">
    	<div class="page-header">
        	<h3>Categories</h3>
        </div>
        <!-- page-header-->
        
    	<div class="catlist">
            <div class="form-group subcatlist">
                <?php foreach($catdata as $catrow){?>
                <div class="act"><label>
                	<input class="cat_id" name="cat_id" type="radio" value="<?php echo $catrow->id; ?>" <?php if($catid == $catrow->id){ echo 'checked';} ?> data-name="<?php echo $catrow->title; ?>" data-slug="<?php echo $catrow->permalink; ?>"> <?php echo $catrow->title; ?></label></div>
                <?php } ?>
            </div>
        </div>
        <!-- catlist --><br>

   		<div class="form-group">
   					<label>New Arrivals:</label>
					<input name="feature" type="radio" id="feature" value="Yes" <?php if($fd == 'Yes'){echo 'checked';} ?>> Yes 
					<input name="feature" type="radio" id="feature" value="No" <?php if($fd == 'No'){echo 'checked';} ?>> No
					
					<label>Best Selling:</label>
					<input name="best_selling" type="radio" id="best_selling" value="Yes" <?php if($bs == 'Yes'){echo 'checked';} ?>> Yes 
					<input name="best_selling" type="radio" id="best_selling" value="No" <?php if($bs == 'No'){echo 'checked';} ?>> No
					<div class="clearfix"></div>
				</div>
    </div>
    <!-- right -->
    <div class="clearfix"></div>
    
    <div class="col-md-6" style="padding-left: 0 !important;">
                
	</div>
    
    <div class="col-md-12" style="padding-left: 0 !important;">
                <div class="form-group" style="padding-left: 0 !important;">
        	<p>Description</p>
            <textarea name="description" id="editor1" placeholder="Description"><?php echo $description; ?></textarea>
         </div>
	</div>
    
 <script>
$(function() {
	window.setTimeout(function() {
		$("input[name='cat_id']:radio:checked").click();
	}, 30);
});

$(document).on('click', '.cat_id', function(){ 
	var id = $(this).val();
	$('#category').val($(this).attr('data-name'));
	$('#cat_slug').val($(this).attr('data-slug'));
	if($(this).is(':checked')) { 
   		$('.reglist div').hide();
   		$('.reglist .reg_' + id).show();
	}
});
	 
$('#permalink').slugger({
    source: '#title',
	prefix: '',
	suffix:'',
	readonly: true
});
</script>       

<script type="text/javascript">
 CKEDITOR.replace( 'editor1',
{
	toolbar :
		[
			{ name: 'insert', items : ['Table'] },
			{ name: 'document', items : ['Source'] },
			{ name: 'clipboard', items : [ 'Cut','Copy','Paste'] },
			{ name: 'links', items : [ 'Link','Unlink','TextColor','BGColor','Bold','Italic','Strike','-','RemoveFormat','Blockquote'] },
			{ name: 'styles', items : [ 'Format','Font','FontSize','NumberedList','BulletedList' ] },
			{ name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] }
		],
	
	filebrowserBrowseUrl : '<?php echo base_url(); ?>editor/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url(); ?>editor/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>editor/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '/ckfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '/ckfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '/ckfinder/core/connector/asp/connector.asp?command=QuickUpload&type=Flash',
});
</script>