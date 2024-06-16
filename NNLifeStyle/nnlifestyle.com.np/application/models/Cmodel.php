<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cmodel extends CI_Model {
	
	private $table = 'content';
	
	public function get_data()
	{
		$this->db->where('type', 'active');
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
	
	public function dataupdate()
	{
		$id = $this->input->post('id');
		$data = array();
		foreach($_POST as $key=>$value)
		{
			$data[$key] = $value;
		}
					
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update($this->table);
	}
}