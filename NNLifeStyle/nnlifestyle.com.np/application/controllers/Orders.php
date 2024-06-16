<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	
	private $folder = 'orders';
	private $mName = 'ordersmodel';
	private $page_title = 'Manage Orders';
	private $add_title = '';
	private $edit_title = '';
	private $PNotify_title = '';
	private $add_msg = '';
	private $edit_msg = '';
	private $PNotify_type = 'success';
	private $perPage = 10;
	
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
	
	public function get_order_customer_info(){
		$type = $this->input->post('type');
		$invoiceno = $this->input->post('id');
		$inid = $this->input->post('inid');
		$sendinvoice = $this->input->post('sendinvoice');
		if(empty($sendinvoice)){
			$send = "No";
		}else{
			$send = $sendinvoice;
		}
		$data['prefix'] = $this->input->post('type');
		$data['invoiceno'] = $invoiceno;
		$data['cid'] = $this->input->post('cid');
		$data['orders'] = $this->{$this->mName}->get_customer_order_details();
		$data['info'] = $this->{$this->mName}->get_customer_details();
		
		$data['dfname'] = $this->{$this->mName}->get_delivery_info($invoiceno, "delivery_first_name");
		if($type == 'invoice'){
			$uadd = $invoiceno;	
		}else{
			$uadd = $inid;
		}
		$data['utype'] = $this->{$this->mName}->get_delivery_info($uadd, "user_type");
		$data['demail'] = $this->{$this->mName}->get_delivery_info($uadd, "user_email");
		$data['dphone'] = $this->{$this->mName}->get_delivery_info($uadd, "user_phone");
		$data['dfname'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_first_name");
		$data['dlname'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_last_name");
		$data['dphone'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_phone");
		$data['dcountry'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_country");
		$data['dstate'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_state");
		$data['dcity'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_city");
		$data['daddress'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_address");
		$data['dzipcode'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_zipcode");
		$data['dpcode'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_pcode");
		
		
		$data['mName'] = $this->mName;
		$data['logo'] = $this->{$this->mName}->get_company_info("attachment1");
		$data['bizname'] = $this->{$this->mName}->get_company_info("fullname");
		$data['bizaddr'] = $this->{$this->mName}->get_company_info("address");
		$data['bphone'] = $this->{$this->mName}->get_company_info("phone");
		$data['bemail'] = $this->{$this->mName}->get_company_info("email");
		$data['invoiceno'] = $invoiceno;
			
		if($send == "Yes"){
			$html = $this->load->view('wpanel/template', $data, true);
			$err = $this->{$this->mName}->create_pdf($invoiceno, $html);
			if($err == 0){
				$this->{$this->mName}->send_invoice($invoiceno);
			}
		}
		$this->load->view('wpanel/template', $data);
	}
}
