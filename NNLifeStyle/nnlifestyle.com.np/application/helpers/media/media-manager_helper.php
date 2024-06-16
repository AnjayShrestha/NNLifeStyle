<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('media_manager')){
	function media_manager($single){
		$CI = get_instance();
    	$CI->load->model('upload_files');
		
		include "media-template.php";
	}
}