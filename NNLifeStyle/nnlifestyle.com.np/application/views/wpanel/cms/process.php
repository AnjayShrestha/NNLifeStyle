<?php foreach($sdata as $srow){ ?>
<form method="post" class="myForm">
    <input name="id" type="hidden" id="id" value="<?php echo $this->input->post('id'); ?>" />
    <input name="attachment1" type="hidden" id="attachment1" value='<?php echo $srow->attachment1; ?>'>
    
    <div class="row">
    	<div class="col-md-6">
			<div class="form-group">
				<input name="page_type" type="text" id="page_type" class="form-control" placeholder="Page Name" value="<?php echo $srow->page_type; ?>" readonly>
			</div>
		</div>
                
		<div class="col-md-6">
			<div class="form-group">
				<input name="page_title" type="text" id="page_title" class="form-control" placeholder="Page Title" value="<?php echo $srow->page_title; ?>">
			</div>
		</div>
        
        <div class="col-md-8">
			<div class="form-group">
                <textarea name="description" id="description"><?php echo $srow->description; ?></textarea>
			</div>
		</div>
       
		<div class="col-md-4 fileUpload">
                <div class="form-group">
                    <?php if($srow->attachment1 == ""){?>
                    
                    
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
                                <div style="width:100%; height:182px; background:url(<?php echo $srow->attachment1; ?>); background-repeat:no-repeat; background-position:center center; background-size:cover; cursor:pointer; position:relative;"><p class="rFile" data-rm="1">remove file</p></div>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
        
	</div>
</form>
<?php } ?>

<script type="text/javascript">
CKEDITOR.replace( 'description',
{
	baseFloatZIndex : 1E5,
	extraPlugins : 'youtube',
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