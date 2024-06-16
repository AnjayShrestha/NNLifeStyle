<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Model {
	
	/*public function get_profile_pic(){
		$id = $this->session->userdata['is_logged_in']['id'];
		$this->db->where('id', $id);
		return $this->db->get('wp_admin')->row()->attachment;
	}*/
	
	public function check_value($table, $value, $field){
		$this->db->where($field, $value);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	public function get_titlebyName($table, $value, $field, $find){
		$this->db->where($field, $value);
		return $this->db->get($table)->row()->{$find};
	}
	
	function summaryModeb($text, $limit) {
		if (str_word_count($text, 0) > $limit) {
			$numwords = str_word_count($text, 2);
			$pos = array_keys($numwords);
			$text = substr($text, 0, $pos[$limit]).'...';
		}
		return $text;
	}
	
	function spanMode($name){
		$name = preg_split("/\s+/", $name);
		$name[1] = "<black>" . $name[1]. "</black>";
		$name[2] = "<black>" .$name[2] . "</black>";
		$name = join(" ", $name);
		return $name;
	}
	
	public function get_title($table, $id){
		$this->db->where('id', $id);
		return $this->db->get($table)->row()->title;
	}
	
	//additional code for category//
	public function get_list($tname)
	{	
		$query = $this->db->get($tname);
		return $query->result();
	}
	//additional code for category//
}