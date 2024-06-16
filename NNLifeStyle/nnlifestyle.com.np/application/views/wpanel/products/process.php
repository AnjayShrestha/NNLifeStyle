<?php 
$process = $this->input->post('process');
if($process = 'add'){
	$pcode = $stitle = $attachment1 = $colors = $psize = $price = $catid = $category = $cat_slug = $tags = '';
	$bs = 'No';
	$fd = 'No';
	$description = '';
	$display_order = $total + 1;
	$pcount = $total + 1;
	$pcode = "#".$pcount;
}
if($process = 'edit'){
	foreach($sdata as $srow){
		$pcode = $srow->pcode;
		$stitle = $srow->title;
		$display_order = $srow->display_order;
		$attachment1 = $srow->attachment1;
		$bs = $srow->best_selling;
		$fd = $srow->feature;
		$price = $srow->price;
		$cat_slug = $srow->cat_slug;
		$catid = $srow->cat_id;
		$category = $srow->category;
		$description = $srow->description;
		$colors = $srow->colors;
		$psize = $srow->psize;
		$tags = $srow->tags;
		$pcode = $srow->pcode;
	} 
}
?>
<style>
	#product .noImage{height: 205px !important;}
	.imgContainer1 .ic div{height: 205px !important;}
</style>   
  
    <input name="id" type="hidden" id="id" value="<?php echo $this->input->post('id'); ?>" />
    <input name="process" type="hidden" id="process" value="<?php echo $this->input->post('process'); ?>" />
    <input name="attachment1" type="hidden" id="attachment1" class="attachment1" value='<?php echo $attachment1; ?>'>
    <input name="category" type="hidden" id="category" value='<?php echo $category; ?>'>
    <input name="tags" type="hidden" id="tags" value='<?php echo $tags; ?>'>
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
          	
           	<div class="col-md-6">
                <div class="form-group">
                    <input name="pcode" type="text" id="pcode" class="form-control" placeholder="Product Code" value="<?php echo $pcode; ?>" readonly>
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
            
            <div class="col-md-12">
                <div class="form-group">
                    <textarea name="colors" class="form-control" id="colors" placeholder="Colors(e.g. red,blue,green)"><?php echo $colors; ?></textarea>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <textarea name="psize" class="form-control" id="psize" placeholder="Size(e.g. small,medium,large)"><?php echo $psize; ?></textarea>
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
                	<input class="cat_id" name="cat_id" type="radio" value="<?php echo $catrow->id; ?>" <?php if($catid == $catrow->id){ echo 'checked';} ?> data-name="<?php echo $catrow->title; ?>" data-tags="<?php echo $catrow->tags; ?>" data-slug="<?php echo $catrow->permalink; ?>"> <?php echo $catrow->title; ?></label></div>
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
	$('#tags').val($(this).attr('data-tags'));
	$('#cat_slug').val($(this).attr('data-slug'));
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