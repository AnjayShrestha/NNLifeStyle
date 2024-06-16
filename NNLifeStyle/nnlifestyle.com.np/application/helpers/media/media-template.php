<!-- media-upload -->
<div class="modal" id="mediaUpload" tabindex="-2" role="dialog" aria-labelledby="mediaUploadLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title col-md-3" id="myModalLabel">Manage Media</h4>
        <div class="col-md-3" align="right"><button class="btn btn-info viewAll">View All</button> <button class="btn btn-danger multidel"><i class="fa fa-trash-o" aria-hidden="true"></i> delete all selected</button></div>
        <div class="col-md-3"><input type="search" class="form-control searchFiles" placeholder="search"/></div>
      </div>
      <div class="modal-body">
      	<!-- media-files -->
      	<div class="media-files">
        	<!-- media-left -->
        	<div class="col-md-9 media-left" style="padding:0 !important; margin:0 !important;">
            <div class="mFiles">
            	<?php
				$dir = FCPATH."uploads/";
				if (is_dir($dir)){
					$files = array();
					$mtimes = array();
					$dir = new DirectoryIterator($dir);
					foreach ($dir as $fileinfo) {
						if (!$fileinfo->isDot() && $fileinfo->getFilename() != "thumbs" && $fileinfo->getFilename() != "medium") {
							$mtime = $fileinfo->getMTime();
							//$mtimes[$mtime];
							if( !isset($mtimes[$mtime]) ){
       							$mtimes[$mtime]=0;
							}

							if(!$mtimes[$mtime]){
								$files[$mtime.'.0'] = array(
															"filename" => $fileinfo->getFilename(),
															"fullpath" => $fileinfo->getPathname(),
															"ext" => $fileinfo->getExtension(),
															);
								$mtimes[$mtime] = 1;
							}else{
								$files[$mtime.'.'.$mtimes[$mtime]++] = array(
																			"filename" => $fileinfo->getFilename(),
																			"fullpath" => $fileinfo->getPathname(),
																			"ext" => $fileinfo->getExtension(),
																		);
							}
						}
					}
					krsort($files);
					
					foreach($files as $file){?>
					
					<div class="col-md-2 media-content">
					<?php 
					$ext = $file["ext"]; 
					$getFileName = $file["filename"];
					$units = filesize($file["fullpath"]);
					
					$size = $CI->upload_files->get_converted_size($units);
		
					date_default_timezone_set("Asia/Kathmandu"); 
					$time = date("F d Y, h:i:s a", filemtime($file["fullpath"])); 
					
					$fetchFile = base_url("uploads/".$getFileName);
					
					if($ext == 'pdf'){
						$medium = base_url("uploads/thumbs/pdf.svg");
						$thumbs = base_url("uploads/thumbs/pdf.svg");
					}else{
						$medium = base_url("uploads/medium/".$getFileName);
						$thumbs = base_url("uploads/thumbs/".$getFileName);
					}
					list($width, $height) = getimagesize($fetchFile);
					
					echo '<div class="mediaItem" data-ext="'.$ext.'" data-preview="'.$medium.'" data-type="img" data-name="'.$getFileName.'" data-width="'.$width.'"  data-height="'.$height.'" data-size="'.$size.'" data-time="'.$time.'"><div style="100%; height:100%; background:url('.$thumbs.'); background-repeat:no-repeat; background-position:center center; background-size:cover; cursor:pointer;"></div></div>';
					?>
					</div>
					
				<?php
				}}else{
					echo "No folder found named uploads in the director";
				}
				?>
            </div>
            </div>
            <!-- media-left -->
            
            <!-- media-right -->
        	<div class="col-md-3 media-right">
            	<div class="col-md-12">
                	<div class="upload">
                    <form id="uploadForm" method="post" action="<?php echo base_url("uploader"); ?>" enctype="multipart/form-data">
                    	<label class="btn btn-default btn-block uploadMedia"><input name="file[]" type="file" class="hidden" id="file" multiple>Upload Files</label>
                        <div class="progress" style="display:none; margin-top:5px; margin-bottom:0;">
                          <div class="progress-bar" role="progressbar"></div>
                        </div>
                        
                        <div class="filestatus"></div>
                        <div class="timeleft"></div>
                        <div class="speed"></div>
                    </form>
                    </div>
                    <div class="error"></div>
            		<div class="media-preview"></div>
                    <div id="result"></div>
                </div>
                <div class="col-md-12">
                	<div class="media-details"></div>
                </div>
                
                <div class="col-md-12">
                	<div id="myCarousel" class="carousel slide text-center" data-ride="carousel" style="display:none;">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                          <div class="item active">
                            Generating Thumbnails for uploaded images.
                          </div>
                    
                          <div class="item">
                            Please be patient. Good stuff takes time.
                          </div>
                          
                          <div class="item">
                            Control + Left Mouse Click for <br />multiple file select.
                          </div>
                          
                        </div>
                      </div>
                </div>
            </div>
            <!-- media-right -->
        </div>
        <div class="clearfix"></div>
        <!-- media-files -->
      </div>
    </div>
  </div>
</div>
<!-- media-upload -->

<script>
var clickedID;
$(document).on('click', '.mediaUpload1,.mediaUpload2,.mediaUpload3,.mediaUpload4,.mediaUpload5', function (e) {
	clickedID = $(this).attr('data-index');
	$('#mediaUpload').modal("show");
		$.ajax({url: "<?php echo base_url("uploads/"); ?>"});
});

$(document).on('click', '.mediaItem', function (e) {
	var preview = $(this).attr("data-preview");
	var ext = $(this).attr("data-ext");
	var name = $(this).attr("data-name");
	var width = $(this).attr("data-width");
	var height = $(this).attr("data-height");
	var s = $(this).attr("data-size");
	var size = s.replace(/-/g, ' ');
	var t = $(this).attr("data-time");
	var time = t.replace(/-/g, ' ');
	var type = $(this).attr("data-type");
	
	if(ext == 'pdf'){
		var dimension = '';
	}else{
		var dimension = width + ' x ' + height;
	}
	
	if (e.ctrlKey){
		if($(this).hasClass("active")) {
			$(this).removeClass("active");
		}else{
			$(this).addClass("active");
		}
	}else{
		$(".mediaItem").removeClass("active");
		$(this).addClass("active");
	}
	
	$(".media-preview").show();
	$(".media-details").show();
	$(".media-preview").html('<div class="RTresult" style="background:url('+ preview +'); background-repeat:no-repeat; background-position:center center; background-size:cover; cursor:pointer;"></div><p class="del-media" data-name="'+ name +'">Delete Permanently</p>');
		$(".media-details").html('<p><strong>'+ name +'</strong></br>'+ time +'</br>'+ size +'</br>'+ dimension +'</p><div align="right"><button type="button" class="btn btn-primary insertImg">Insert File</button></div>');
});

$(document).on('click', '.insertImg', function (e) {
	var Furl = $('.mFiles .active').map(function() {
	var ext = $(this).attr("data-ext");
		if(ext == 'pdf'){
			return $(this).attr("data-name");
		}else{
    		return $(this).attr("data-preview");
		}
	}).get();
	
	
	
	$.each(Furl, function(index, value){
		//var inputIndex = (index + 1).toString();
		<?php if($single == "yes"){ ?>
		if(index == 1) return false;
		<?php } ?>
		var vtype = value.replace(/^.*\./, '');
		if(vtype == 'pdf' || preview == 'PDF'){
			var preview = "uploads/thumbs/pdf.svg";
		}else{
			var preview = value;
		}
		$('.imgContainer' + clickedID).show();
		$('.imgContainer' + clickedID).append('<div style="width:100%; height:182px; background:url('+ preview +'); background-repeat:no-repeat; background-position:center center; background-size:cover; cursor:pointer; position:relative;"><input name="attachment'+ clickedID +'" type="hidden" id="attachment" value='+ value +'><p class="rFile" data-rm="'+ clickedID +'">remove file</p></div>');
	});
	$('.mediaUpload'+ clickedID).hide();
	$('#mediaUpload').modal("hide");
	$('.media-preview, .media-details').html("");
	$('.media-left').load('<?php echo base_url($CI->uri->segment(1)); ?> .mFiles');
	$('.upload').load('<?php echo base_url($CI->uri->segment(1)); ?> .upload');
	e.stopImmediatePropagation();
});


$(document).on("keyup", ".searchFiles", function(e){
	var gdf = $(this).val();
	if(gdf == ""){
		$('.media-content').show();
		$(".mediaItem").removeClass("TaggedAsSearched");
	}else{
		$(".mediaItem[data-name*='"+ gdf +"' i]").addClass("TaggedAsSearched");
		$('.mediaItem:not(.TaggedAsSearched)').parent().hide();
		if($('.TaggedAsSearched').length == 0){
			if($('.searchResult').length == 0){
				$('.mFiles').append('<p class="searchResult" style="padding:15px;">0 results found. No matches!</p>');
			}
		}else{
			$('.searchResult').remove();
		}
		
		$(".mediaItem").removeClass("TaggedAsSearched");
	}
	
	if (e.keyCode == 8 || e.keyCode == 46) {
		$('.media-content').show();
		$(".mediaItem").removeClass("TaggedAsSearched");
   		$(".searchFiles").trigger("keyup");
	}
	
	if ((e.which == 90 || e.keyCode == 90) && e.ctrlKey){
		$('.media-content').show();
		$(".mediaItem").removeClass("TaggedAsSearched");
   		$(".searchFiles").trigger("keyup");
	}
});

$(".searchFiles").bind('cut', function(e) {
   	e.preventDefault();
});

$(document).on('click', '.viewAll', function (e) {
	$('.media-content').show();
	$(".mediaItem").removeClass("TaggedAsSearched");
	$(".searchFiles").val("");
});

$(document).on('click', '.rFile', function (e) {
	rclickedID = $(this).attr('data-rm');
	$(this).parent().remove();
	$('.mediaUpload' + rclickedID).show();
	$('#attachment' + rclickedID).val("");
	$('.attachment' + rclickedID).val("");
});

function millisecondsToStr (seconds) {
    var levels = [
        ['Remaining time:', Math.floor(seconds / 31536000), 'years'],
        ['Remaining time:', Math.floor((seconds % 31536000) / 86400), 'days'],
        ['Remaining time:', Math.floor(((seconds % 31536000) % 86400) / 3600), 'hours'],
        ['Remaining time:', Math.floor((((seconds % 31536000) % 86400) % 3600) / 60), 'minutes'],
        ['Remaining time:', (((seconds % 31536000) % 86400) % 3600) % 60, 'seconds'],
    ];
    var returntext = '';

    for (var i = 0, max = levels.length; i < max; i++) {
        if ( levels[i][1] === 0 ) continue;
        returntext += ' ' + levels[i][0] +  levels[i][1] + ' ' + (levels[i][1] === 1 ? levels[i][2].substr(0, levels[i][2].length-1): levels[i][2]);
    };
    return returntext.trim();
}

function humanFileSize(size) {
    var i = Math.floor( Math.log(size) / Math.log(1024) );
    return ( size / Math.pow(1024, i) ).toFixed(2) * 1 + ' ' + ['B', 'KB', 'MB', 'GB', 'TB'][i];
}


$(document).on('change', '#file', function (e) {
	var files = $('#file')[0].files;
	var starttime = new Date().getTime();
	
	fileCollection = [];
	fc = [];
	var sum = 0;
	$.each(files, function(index, value){
		sum += Number(value.size);
		fileCollection.push({ name: value.name, size: sum});
	});
	var chk = humanFileSize(sum);
	chk = chk.replace(/[0-9]/g, '');
	var check = chk.split('.').join("");
	
	var gnum = humanFileSize(sum);
	gnum = gnum.replace(/[^0-9\.]/g,"");
	
	$("#uploadForm").submit(e);
	e.preventDefault();
	
	$("#uploadForm").ajaxSubmit({
		dataType: 'json',
		beforeSubmit: function(){
			var val = $("#file").val();
			if (!val.match(/(?:gif|jpg|jpeg|JPEG|pdf|PDF|png|bmp|GIF|JPG|PNG|BMP)$/)) {
				$(".error").show();
				$(".error").html("selected file is not an image!");
				return false;
			}
			var error = "";
			if(check == " GB" || check == " TB"){
				error = 1;
			}else if (check == " MB") {
				if(Number(gnum) > 800){
					error = 1;
				}
			}else if (check == " KB") {
				error = 0;
			}
			if(error == 1){
				$(".error").show();
				$(".error").html("Maximum upload file size: 800 MB");
				return false;
			}
			$(".error").hide();
			$(".uploadMedia").remove();
			$(".progress").show();
			$(".progress-bar").width('0%');
			$(".timeleft").show();
			$(".speed").show();
		},
		uploadProgress: function(event, position, total, percentComplete){
			$(".progress-bar").width(percentComplete + '%');
			$(".progress-bar").html(percentComplete + ' %');
			
			$(".filestatus").html("<div class='fcount'>uploading " + 1 + " of " + fileCollection.length + "</div><div class='additional'>" + fileCollection[0].name +"</div>");
			$.each(fileCollection, function(findex, fcval){
				findex=findex+1;
				if(position >= fcval.size){
					$(".filestatus").html("<div class='fcount'>uploading " + (Number(findex) + 1) + " of " + fileCollection.length + "</div><div class='additional'>" + fileCollection[findex].name +"</div>");
				}
			});
			
			var timeSpent = (new Date().getTime() - starttime) / 1000 ;
            var bytes_per_second =  timeSpent ? position / timeSpent : 0 ;
           	var remaining_bytes =   total - position;
            var seconds_remaining = timeSpent ? remaining_bytes / bytes_per_second : 'calculating' ;
            
			$('.timeleft').html(millisecondsToStr(Math.round(seconds_remaining).toFixed(2)));       
            $('.speed').html(humanFileSize(bytes_per_second) + "/s");
			if($(".timeleft").html() == ""){
				$('.speed').hide();
			}
		},
		success: function(data){
			$(".multidel").attr("disabled", true);
			$(".media-left").scrollTop(0);
			$("#myCarousel").show();
			$(".filestatus").hide();
			$(".progress").hide();
			$('.media-content').show();
			$(".mediaItem").removeClass("TaggedAsSearched");
			$(".searchFiles").val("");
		
			if(data.error == 1){
				$(".error").show();
				$(".error").html(data.msg);
			}else{
				for (var i = 0; i < data.length; i++) {
					var uth = data[i].filename; 
					var uthumbs = uth.substr(0, uth.lastIndexOf('.')) || uth;
					$(".mFiles").prepend('<div class="col-md-2 media-content" id='+ uthumbs +'><div class="mediaItem"><div class="progress" style="width:90%; height:10px; margin:0 auto; margin-top:65px;"><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%;"></div></div></div></div>');
				}
				var current = 0;
				do_ajax();
				function do_ajax() {	
					if (current < data.length) {
						$.ajax({
							type: "post",
							url: "<?php echo base_url('uploader/generate_thumbnail/'); ?>",
							data: {"filename":data[current].filename},
							dataType: 'json',
							success: function(response){
								var cth = response.filename;
								var cthumbs = cth.substr(0, cth.lastIndexOf('.')) || cth;
								$("#" + cthumbs).html('<div class="mediaItem"><div class="progress" style="width:90%; height:10px; margin:0 auto; margin-top:65px;"><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div></div></div>');
								setTimeout(function() {
									$("#" + cthumbs).html('<div class="mediaItem" data-ext='+ response.ext +' data-preview='+ response.medium +' data-type="img" data-name='+ response.filename + ' data-width=' + response.width + ' data-height=' + response.height + ' data-size=' + response.size + ' data-time=' + response.time +'><div style="100%; height:100%; background:url('+ response.thumb +'); background-repeat:no-repeat; background-position:center center; background-size:cover; cursor:pointer;"></div></div>');
									current++;
									do_ajax();
								}, 100);
							}
						});
					}else{
						$('.upload').load('<?php echo base_url($CI->uri->segment(1)); ?> .upload');
						$("#myCarousel").hide();
						$(".multidel").removeAttr("disabled", "disabled");
					}
				}
			}
		},
		resetForm: true ,
	});
	return false;
});



$(document).on('click', '.del-media', function (e) {
	var c = confirm("You are about to permanently delete this item. 'Cancel' to stop, 'OK' to delete.");
	if(c == true){
		var file = $(this).attr("data-name");
		$('.mediaItem[data-name="'+file+'"]').parent().remove();
		$('.media-preview').hide();
		$(".media-details").hide();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("uploader/del_media"); ?>",
			data: {"name":file},
			success: function(data){}
		});
	}
});

$(document).on('click', '.multidel', function (e) {
	var c = confirm("You are about to permanently delete all the selected item. 'Cancel' to stop, 'OK' to delete.");
	if(c == true){
		var Furl = $('.mFiles .active').map(function() {
			return $(this).attr("data-name");
		}).get();
		
		$('.media-preview').hide();
		$(".media-details").hide();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url("uploader/del_multi_media"); ?>",
			data: {name: Furl},
			success: function(data){
				$.each(Furl, function(index, value){
					$('.mediaItem[data-name="'+value+'"]').parent().remove();
					$('.media-preview').hide();
					$(".media-details").hide();
				});
			}
		});
	}
});
</script>