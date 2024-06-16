<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	private $mName = 'dashmodel';
	
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
		$data['page'] = 'dashboard';
		$data['category'] = $this->{$this->mName}->get_total('categories');
		$data['products'] = $this->{$this->mName}->get_total('products');
		$data['members'] = $this->{$this->mName}->get_total('members');
		$data['orders'] = $this->{$this->mName}->latest_order();
		
		$this->load->view('wpanel/header');
		$this->load->view('wpanel/sidebar-menu');
		$this->load->view('wpanel/dashboard', $data);
		$this->load->view('wpanel/footer');
	}
	
	public function save(){
		$this->{$this->mName}->dataupdate();
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
		
		$data['dfname'] = $this->{$this->mName}->get_delivery_info($invoiceno, "delivery_full_name");
		if($type == 'invoice'){
			$uadd = $invoiceno;	
		}else{
			$uadd = $inid;
		}
		$data['utype'] = $this->{$this->mName}->get_delivery_info($uadd, "user_type");
		$data['demail'] = $this->{$this->mName}->get_delivery_info($uadd, "user_email");
		$data['dphone'] = $this->{$this->mName}->get_delivery_info($uadd, "user_phone");
		
		$data['dfname'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_full_name");
		// $data['dlname'] = $this->{$this->mName}->get_delivery_info($uadd, "delivery_last_name");
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
	
	public function profile(){
		$data['data'] = $this->profile->get_data();
		$this->load->view('wpanel/profile', $data);
	}
	
	public function save_profile(){
		$this->profile->dataupdate();
	}
}