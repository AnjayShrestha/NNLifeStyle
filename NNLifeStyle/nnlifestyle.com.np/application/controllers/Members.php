<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {
	
	private $folder = 'members';
	private $mName = 'membersmodel';
	private $page_title = 'Manage Member';
	private $add_title = 'Add Member';
	private $edit_title = 'Edit Member';
	private $PNotify_title = 'Members';
	private $add_msg = 'Member Added Successfully';
	private $edit_msg = 'Member has been successfully Updated';
	private $PNotify_type = 'success';
	private $perPage = 8;
	
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
		$pp = $this->perPage;
		$pc = $this->input->post('pc');
		if(empty($pc)){
			$pcv = 0;
		}else{
			$pcv = $pc;
		}
		$data['title'] = $this->page_title;
		$data['at'] = $this->add_title;
		$data['et'] = $this->edit_title;
		$data['pn_title'] = $this->PNotify_title;
		$data['pn_add_msg'] = $this->add_msg;
		$data['pn_edit_msg'] = $this->edit_msg;
		$data['pn_type'] = $this->PNotify_type;
		$data['page'] = $this->folder;
		$data['pc'] = $pcv;
		$data['pp'] = $pp;
		
		
		$this->load->view('wpanel/header');
		$this->load->view('wpanel/sidebar-menu');
		
		$data['content'] = $this->{$this->mName}->get_data($pp);
		$data['sdata'] = $this->{$this->mName}->get_selected_data();
		
		$total = $this->{$this->mName}->total_data();
		$data['total'] = $total;
		
		$curPage = floor(($pcv/$pp) + 1);
		$totalPage = ceil($total / $pp);
		
		if($curPage >= $totalPage){
			$lastPage = 1;
		}else{
			$lastPage = 0;
		}
		
		$data['lastPage'] = $lastPage;
		
		
		//pagination code
		$this->load->library('pagination');
		$config['base_url'] = base_url($this->folder.'/');
		$config['uri_segment'] = 2;
		$config['total_rows'] = $total;
		$config['per_page'] = $pp;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['prev_link'] = 'Previous';
		$config['next_link'] = 'Next';
		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '</span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['use_page_numbers'] = false;
		$config['num_links'] = '10';  
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//pagination code
		
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
	
	public function delete(){
		$this->{$this->mName}->delete_data();
	}
	
	public function multidelete(){
		$this->{$this->mName}->delete_multi_data();
	}
	
	public function profile(){
		$data['data'] = $this->profile->get_data();
		$this->load->view('wpanel/profile', $data);
	}

	public function save_profile(){
		$this->profile->dataupdate();
	}
}
