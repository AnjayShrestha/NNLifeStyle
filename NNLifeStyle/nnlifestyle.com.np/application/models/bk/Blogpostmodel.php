<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogpostmodel extends CI_Model {
	
	private $table = 'blogs';
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
		$this->db->order_by('timeStamp', 'desc');
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
		$tags = $this->input->post('tags');
		$type = $this->input->post('type');
		
		$data = array();
		foreach($_POST as $key=>$value)
		{
			$data[$key] = $value;
		}
		
		if($type == "radio"){
			unset($data['tags']);
		}else{
			$data['tags'] = serialize($tags);
		}
		
		//print_r($data);
		
		unset($data['submit'], $data['id'], $data['process'], $data['type']);
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