<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashmodel extends CI_Model {
	
	public function get_total($table)
	{	
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	public function latest_order()
	{	
		$this->db->limit(5);
		$this->db->group_by("invoice_no");
		$this->db->order_by('order_date', 'desc');
		$query = $this->db->get('orders');
		return $query->result();
	}
	
	public function dataupdate()
	{
		$invoice = $this->input->post('invoice');
		$status = $this->input->post('status');
		$this->db->set('status', $status);
		$this->db->where('invoice_no', $invoice);
		$this->db->update('orders');
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from("info@canaanonline.com");
		$this->email->to('wfybiz@gmail.com');
		$this->email->subject('Order Status');
		
		$message = "Dear Customer your order has been $status. Please feel free to contact Us";
		$this->email->message($message);
		$send = $this->email->send();
	}
	
	function get_customer_details(){
		$type = $this->input->post("type");
		if($type == "member"){
			$id = $this->input->post("id");
		}else{
			$id = $this->input->post("cid");
		}
		$this->db->where('id', $id);
		$query = $this->db->get('members');
		return $query->result();
	}
	
	function get_customer_order_details(){
		$id = $this->input->post("id");
		$this->db->where('invoice_no', $id);
		$query = $this->db->get('orders');
		return $query->result();
	}
	
	public function get_company_info($field){
		$this->cname = $this->db->get('wp_admin')->row()->fullname;
		$this->adminEmail = $this->db->get('wp_admin')->row()->email;
		return $this->db->get('wp_admin')->row()->{$field};
	}
	
	
		function convert_number($number) {
		if (($number < 0) || ($number > 999999999)) {
			throw new Exception("Number is out of range");
		}
		$Gn = floor($number / 1000000);
		/* Millions (giga) */
		$number -= $Gn * 1000000;
		$kn = floor($number / 1000);
		/* Thousands (kilo) */
		$number -= $kn * 1000;
		$Hn = floor($number / 100);
		/* Hundreds (hecto) */
		$number -= $Hn * 100;
		$Dn = floor($number / 10);
		/* Tens (deca) */
		$n = $number % 10;
		/* Ones */
		$res = "";
		if ($Gn) {
			$res .= $this->convert_number($Gn) .  "Million";
		}
		if ($kn) {
			$res .= (empty($res) ? "" : " ") .$this->convert_number($kn) . " Thousand";
		}
		if ($Hn) {
			$res .= (empty($res) ? "" : " ") .$this->convert_number($Hn) . " Hundred";
		}
		$ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
		$tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
		if ($Dn || $n) {
			if (!empty($res)) {
				$res .= " and ";
			}
			if ($Dn < 2) {
				$res .= $ones[$Dn * 10 + $n];
			} else {
				$res .= $tens[$Dn];
				if ($n) {
					$res .= "-" . $ones[$n];
				}
			}
		}
		if (empty($res)) {
			$res = "zero";
		}
		return $res;
	}
	
	public function get_delivery_info($invoiceno, $field){
		$this->db->where('invoice_no', $invoiceno);
		return $this->db->get('orders')->row()->{$field};
	}
	
	public function create_pdf($invoiceno, $html){
		require_once APPPATH.'/vendor/autoload.php';
		$pdfile = FCPATH.'/invoices/'.$invoiceno;
		if(!file_exists($pdfile)){
			$mpdf = new \Mpdf\Mpdf();
			$stylesheet = file_get_contents(FCPATH.'/assets/css/pdf.css');
			$mpdf->WriteHTML($stylesheet,1);
			$mpdf->WriteHTML($html, 2);
			$mpdf->Output(FCPATH.'/invoices/'.$invoiceno.'.pdf', 'F');
		}
	}
	
}