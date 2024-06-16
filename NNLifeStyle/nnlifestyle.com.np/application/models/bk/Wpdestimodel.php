<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wpdestimodel extends CI_Model {
	
	private $table = 'destination';
	private $search = 'title';
	
	public function get_data($limit)
	{
		$pc = $this->input->post('pc');
		$search = $this->input->post('search');
		if(empty($pc)){ $pageCount = 0; }else{ $pageCount = $pc;}
		
		if($search == ''){
			$this->db->limit($limit, $pageCount);
		}else{
			$this->db->like($this->search, $search);
		}
		
		
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
		$permalink = $this->input->post('permalink');
		$data = array();
		foreach($_POST as $key=>$value)
		{
			$data[$key] = $value;
		}
		unset($data['submit'], $data['id'], $data['process']);
		if($process == 'edit' && empty($permalink)){
			unset($data['permalink']);
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