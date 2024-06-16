<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profilemodel extends CI_Model {
	
	private $table = 'wp_admin';
	
	public function get_data()
	{
		$id = $this->session->userdata['is_logged_in']['id'];
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function dataupdate()
	{
		$id = $this->session->userdata['is_logged_in']['id'];
		$pwd = $this->input->post('show_password');
		$oldpassword = $this->input->post('oldpassword');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		
		
		
		if($oldpassword !=""){
			if($pwd != $oldpassword){
				$title = 'Unable to update Profile';
				$msg = "Incorrect Old Password!";
				$type = "error";
				$error = 1;
			}
			elseif(empty($password)){
				$title = 'Unable to update Profile';
				$msg = "New Password cannot be empty!";
				$type = "error";
				$error = 1;
			}
			elseif($password != $confirm_password){
				$title = 'Unable to update Profile';
				$msg = "Passwords do not match!";
				$type = "error";
				$error = 1;
			}else{
				$error = 0;
			}
		}else{
			$error = 0;
		}
		if($error == 0){
			$title = 'Profile Updated';
			$msg = "Profile Updated Successfully!";
			$type = "success";
			
			$data = array();
			foreach($_POST as $key=>$value)
			{
				$data[$key] = $value;
			}
			
			if($oldpassword !=""){
				$data['show_password'] = $password;
				$data['password'] = md5($password);
			}else{
				$data['show_password'] = $pwd;
				$data['password'] = md5($pwd);
			}
			unset($data['oldpassword'], $data['confirm_password']);
			
			
			//print_r($data);
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update($this->table);
			
			$is_logged_in = array(
									'id' => $id, 
									'fullname' => $this->input->post('fullname'), 
									'attachment1' => $this->input->post('attachment1'),
									'email' => $this->input->post('email')
								);
			$this->session->set_userdata('is_logged_in', $is_logged_in);
		}
			$jdata = array(
							"title" => $title,
							"msg" => $msg,
							"type" => $type,
							"error" => $error
						);
			
			echo json_encode($jdata);
		
	}
}