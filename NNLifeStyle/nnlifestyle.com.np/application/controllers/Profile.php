<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	private $mName = 'profilemodel';
	private $page_title = 'Manage Profile Details';
	private $edit_title = 'Profile Details';
	private $PNotify_title = 'Profile Details';
	private $edit_msg = 'Profile Updated Successfully';
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
		$data['et'] = $this->edit_title;
		$data['pn_title'] = $this->PNotify_title;
		$data['pn_edit_msg'] = $this->edit_msg;
		$data['pn_type'] = $this->PNotify_type;
		$this->load->view('wpanel/header');
		$this->load->view('wpanel/sidebar-menu');
		$data['data'] = $this->{$this->mName}->get_data();
		$this->load->view('wpanel/profile', $data);
		$this->load->view('wpanel/footer');
	}
	
	public function save_profile(){
		$this->{$this->mName}->dataupdate();
	}
}
