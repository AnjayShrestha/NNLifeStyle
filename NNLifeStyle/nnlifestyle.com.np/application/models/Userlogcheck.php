<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userlogcheck extends CI_Model {
	
	public function checklogin($useridentity,$password)
	{
		$this->load->helper('email');
		$this->db->select('id,user_email,user_password,full_name,status');
		// if (valid_email($useridentity))
		// {
			$data = array('user_email'=>$useridentity,'user_password'=>md5($password));
		// }
		// else
		// {
		// 	$data = array('phone'=>$useridentity,'user_password'=>md5($password));
		// }
		$this->db->where($data);
		$query = $this->db->get('members');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$this->session->set_userdata('fname', $row->full_name);
			$is_logged_in = array('id' => $row->id, 'useridentity' => $row->user_email, 'password' => $row->user_password, 'status' => $row->status);
			$this->session->set_userdata('is_user_logged_in', $is_logged_in);
			return true;
		}
		else
			{
				return false;
			}
	}
	
	public function security()
	{
		$useridentity = $this->input->post('useridentity');
		$password = $this->input->post('password');
		$result = $this->checklogin($useridentity,$password);
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
}