<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logcheck extends CI_Model {
	
	public function checklogin($username,$password)
	{
		$this->db->select('id,fullname,attachment1,username,email,password');
		$data = array('username'=>$username,'password'=>md5($password));
		$this->db->where($data);
		$query = $this->db->get('wp_admin');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$is_logged_in = array(
									'id' => $row->id, 
									'fullname' => $row->fullname, 
									'attachment1' => $row->attachment1,
									'email' => $row->email
								);
			$this->session->set_userdata('is_logged_in', $is_logged_in);
			return true;
		}
		else
			{
				return false;
			}
	}
	
	public function security()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->checklogin($username,$password);
		if($result == true)
		{
			$attempt = 'verified';
		}
		else
			{	
				$attempt = 'invalid';
			}
		return $attempt;
	} 
	
	public function send_password()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$url = base_url();
		
		$this->db->select('email');
		$this->db->where('email', $email);
		$query = $this->db->get('wp_admin');
		if($query->num_rows() == 0)
		{
			$error = 1;
		}else{
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('<wfybiz@gmail.com>');
			$this->email->to($email);
			$this->email->subject('reset your password');
			
			$message = "Hi Admin,</br>
						You recently requested a password reset.</br></br>
						Login Url : $url</br>
						<strong>New Password: </strong>$password</br></br>
						Regards,</br>
						Administrator
						";
			
			$this->email->message($message);
			$send = $this->email->send();
			if($send){
				$this->db->where('email', $email);
				$data = array(
								'password' => md5($password),
								'show_password' => $password
							);
				$this->db->set($data);
				$this->db->update('wp_admin');
			}
			$error = 0;
		}
		return $error;
	}
}