<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {
	
	private $folder = 'cms';
	private $mName = 'cmodel';
	private $page_title = 'Content Management';
	private $add_title = '';
	private $edit_title = 'Edit Page';
	private $PNotify_title = 'Page Updated';
	private $add_msg = '';
	private $edit_msg = 'Page has been successfully Updated';
	private $PNotify_type = 'success';
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model($this->mName);
		
		if($this->session->userdata('is_logged_in') != true)
		{
			redirect('wpanel');
		}
	}

	public function index()
	{
		$data['title'] = $this->page_title;
		$data['at'] = $this->add_title;
		$data['et'] = $this->edit_title;
		$data['pn_title'] = $this->PNotify_title;
		$data['pn_add_msg'] = $this->add_msg;
		$data['pn_edit_msg'] = $this->edit_msg;
		$data['pn_type'] = $this->PNotify_type;
		$data['page'] = $this->folder;
		
		$this->load->view('wpanel/header');
		$this->load->view('wpanel/sidebar-menu');
		$data['content'] = $this->{$this->mName}->get_data();
		$this->load->view('wpanel/'.$this->folder.'/list-items', $data);
		$this->load->view('wpanel/footer');
	}
	
	public function process(){
		$data['sdata'] = $this->{$this->mName}->get_selected_data();
		$this->load->view('wpanel/'.$this->folder.'/process', $data);
	}
	
	public function save(){
		$this->{$this->mName}->dataupdate();
	}
	
	public function profile(){
		$data['data'] = $this->profile->get_data();
		$this->load->view('wpanel/profile', $data);
	}
	
	public function save_profile(){
		$this->profile->dataupdate();
	}
}
