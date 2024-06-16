<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membersmodel extends CI_Model {
	
	private $table = 'members';
	
	public function get_data($limit)
	{
		$pc = $this->input->post('pc');
		$search = $this->input->post('search');
		if(empty($pc)){ $pageCount = 0; }else{ $pageCount = $pc;}
		
		if($search == ''){
			$this->db->limit($limit, $pageCount);
		}else{
			// $array = array('first_name' => $search, 'last_name' => $search, 'user_email' => $search, 'phone' => $search);
			$array = array('full_name' => $search, 'user_email' => $search, 'phone' => $search);
			$this->db->or_like($array);
		}
		
		// $this->db->order_by('first_name', 'ASC');
		$this->db->order_by('full_name', 'ASC');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function get_selected_data()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function total_data()
	{
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
	
	public function dataupdate()
	{
		$id = $this->input->post('id');
		$process = $this->input->post('process');
		$password = $this->input->post('password');
		$upwd = $this->input->post('user_show_password');
		$stype = $this->input->post('stype');
		$data = array();
		foreach($_POST as $key=>$value)
		{
			$data[$key] = $value;
		}
		unset($data['submit'], $data['id'], $data['process'], $data['password']);
		if($stype == "status"){
			unset($data['stype']);
		}
		if(!empty($password)){
			unset($data['user_show_password']);
			$pushdata = array('user_show_password' => $password, "user_password" => md5($password));
			$this->db->set($pushdata);
		}
		
		$this->db->set($data);
		
		if($process == 'add'){
			$type = 'insert';
		}else{
			$type = 'update';
			$this->db->where('id', $id);
		}
		
		$this->db->$type($this->table);
	}
	
	public function delete_data()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
	
	public function delete_multi_data()
	{
		$check = $this->input->post('check');
		if(!empty($check)){
			foreach($check as $key=>$val)
			{
				$this->db->where('id', $val);
				$this->db->delete($this->table);
			}
		}
	}
}