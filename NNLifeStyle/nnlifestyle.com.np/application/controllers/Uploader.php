<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploader extends CI_Controller {
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model('upload_files');
	}

	public function index()
	{
		$this->upload_files->start_file_upload();
	}
	
	public function del_media(){
		$this->upload_files->delete_permanently_media();
	}
	
	public function del_multi_media(){
		$this->upload_files->delete_multi_permanently_media();
	}
	
	public function generate_thumbnail(){
		$this->upload_files->start_generating_thumbnails();
	}
}