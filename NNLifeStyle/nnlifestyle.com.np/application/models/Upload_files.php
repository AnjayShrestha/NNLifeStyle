<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_files extends CI_Model {
	
	public function start_file_upload()
	{
		$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		$temp_name = $_FILES['file']['tmp_name'];
		$uploaddir='uploads/';
		$mediumdir = "uploads/medium/";
		$thumbdir = "uploads/thumbs/";
		$data = array();
		
		foreach($temp_name as $key => $val){
			$filename = $_FILES['file']['name'][$key];
			$ufname = str_replace(" ","-", $filename);
			$tmp = $_FILES['file']['tmp_name'][$key];
			// $detectedType = exif_imagetype($tmp);
			$fileExtensions = ['jpeg','jpg','png'];
			$fileExtension = strtolower(end(explode('.',$filename)));
				
			if(in_array($fileExtension,$fileExtensions) || pathinfo($filename, PATHINFO_EXTENSION) == 'pdf'  || pathinfo($filename, PATHINFO_EXTENSION) == 'PDF'){
				if(is_uploaded_file($tmp)){
					@move_uploaded_file($tmp,$uploaddir.$ufname);
					
					$config['image_library'] = 'gd2';
					$config['source_image'] = $uploaddir.$ufname;
					$config['new_image'] = $uploaddir.$ufname;
					/*$config['wm_type'] = 'overlay';
					$config['wm_overlay_path'] = FCPATH.'assets/images/overlay.png';
					//the overlay image
					$config['wm_opacity'] = 80;
					$config['wm_vrt_alignment'] = 'bottom';
					$config['wm_hor_alignment'] = 'right';
					$config['wm_hor_offset'] = '20px';
					$config['wm_vrt_offset'] = '20px';
					$this->load->library('image_lib', $config);
					$this->image_lib->initialize($config);
					$this->image_lib->watermark();
					$this->image_lib->clear();*/
						
					$data[] = array(
									"error" => 0,
									"filename" => $ufname
								);
						
					}
				}else{
					$data = array(
									"error" => 1,
									"msg" => "Something went wrong ! (jpg,png,gif) expect this other file type is not allowed. Please try another.",
								);
				}
			}
			echo json_encode($data);
	}
	
	public function delete_permanently_media()
	{
		$uploaddir='uploads/';
		$mediumdir = "uploads/medium/";
		$thumbdir = "uploads/thumbs/";
		$image_name = $this->input->post("name");
		$del_img = $uploaddir.$image_name;
		if(file_exists($del_img))
		@unlink($del_img);
		
		$medium_img = $mediumdir.$image_name;
		if(file_exists($medium_img))
		@unlink($medium_img);
		
		$thumb_img = $thumbdir.$image_name;
		if(file_exists($thumb_img))
		@unlink($thumb_img);
	}
	
	public function delete_multi_permanently_media()
	{
		$uploaddir='uploads/';
		$mediumdir = "uploads/medium/";
		$thumbdir = "uploads/thumbs/";
		$image_name = $this->input->post("name");
		
		foreach($image_name as $key => $val){
			$del_img =  $uploaddir.$image_name[$key];
			$medium_img =  $mediumdir.$image_name[$key];
			$thumb_img =  $thumbdir.$image_name[$key];
			
			if(file_exists($del_img))
			@unlink($del_img);
			
			if(file_exists($medium_img))
			@unlink($medium_img);
			
			if(file_exists($thumb_img))
			@unlink($thumb_img);
		}
	}
	
	public function get_converted_size($bytes){
		if($bytes >= 1073741824){
			$size = number_format($bytes / 1073741824, 2).' GB';
		}elseif($bytes >= 1048576){
			$size = number_format($bytes / 1048576, 2).' MB';
		}elseif($bytes >= 1024){
			$size = number_format($bytes / 1024, 2).' KB';
		}elseif($bytes > 1){
			$size = $bytes.' bytes';
		}elseif($bytes == 1){
			$size = '1 byte';
		}else{
			$size = '0 bytes';
		}
		return $size;
	}
	
	public function start_generating_thumbnails()
	{
		$filename = $this->input->post('filename');
		$uploaddir='uploads/';
		$mediumdir = "uploads/medium/";
		$thumbdir = "uploads/thumbs/";
		
		$config['image_library'] = 'gd2';
		
		$config['source_image'] = $uploaddir.$filename;
		$config['new_image'] = $thumbdir.$filename;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['thumb_marker'] = FALSE;
		$config['width'] = 300;
		$config['height'] = 300;
		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
							
		$config['source_image'] = $uploaddir.$filename;
		$config['new_image'] = $mediumdir.$filename;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['thumb_marker'] = FALSE;
		$config['width'] = 500;
		$config['height'] = 500;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
							
		date_default_timezone_set("Asia/Kathmandu"); 
		$t = date("F d Y, h:i:s a", filemtime($uploaddir.$filename));
		$time = str_replace(" ", "-", $t);
		$units = filesize($uploaddir.$filename);
		$s = $this->upload_files->get_converted_size($units);
		$size = str_replace(" ", "-", $s);
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if($ext == 'pdf'){
			$gthumb = base_url("uploads/thumbs/pdf.svg");
			$gmedium = base_url("uploads/thumbs/pdf.svg");
			$large = base_url("uploads/thumbs/pdf.svg");
		}else{
			$gthumb = base_url().$thumbdir.$filename;
			$gmedium = base_url().$mediumdir.$filename;
			$large = base_url().$uploaddir.$filename;
		}
		list($width, $height) = getimagesize($uploaddir.$filename);
							
		$data = array(
			"filename" => $filename, 
			"large" => $large,
			"medium" => $gmedium,
			"thumb" => $gthumb, 
			"width" => $width, 
			"height" => $height, 
			"size" => $size,
			"time" => $time,
			"ext" => $ext
		);
		echo json_encode($data);
	}
}