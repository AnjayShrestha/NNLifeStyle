<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gateway extends CI_Controller {
	function __construct()
	{
		parent :: __construct();
		$this->load->model('logcheck');
	}
	
	public function index()
	{
		if($this->session->userdata('is_logged_in') == true)
		{
			redirect('dashboard');
			
		}else{
			$data['msg'] = "";
			$this->load->view('wpanel/login', $data);
		}
	}
	
	public function logg_in()
	{
		$check = $this->logcheck->security();
		
		if($check == 'verified')
		{
			echo '<span style="color:green;">Login Successfull</span>';
			echo '
			<script>
				window.setTimeout(function() {
				location.href = "'.base_url('dashboard').'";
				}, 1000);
			</script>';
		}else{
			echo '<span style="color:red;">Inavlid Email or Password</span>';
		}
	}
	
	public function logout()
	{	
		$this->session->sess_destroy();
		$data['msg'] = '<span style="color:green;">Logout Successfull</span>';
		$this->load->view('wpanel/login', $data);	
	}
	
	public function forgot_password()
	{	
    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!<]@(#$[%^}&*){:~>";
    	$pwd = substr(str_shuffle($chars),0,16);
		
		$data['msg'] = "Type your email address.";
		$data['password'] = $pwd;
		$this->load->view('wpanel/forgot-password', $data);	
	}
	
	public function get_new_password(){
		$check = $this->logcheck->send_password();
		if($check == 0)
		{
			echo '<span style="color:green;">Check your email for the new password.</span>';
		}else{
			echo '<span style="color:red;">Your email is not authenticated</span>';
		}
	}
}
