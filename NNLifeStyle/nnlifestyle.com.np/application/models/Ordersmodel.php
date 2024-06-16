<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ordersmodel extends CI_Model {
	
	private $table = 'orders';
	private $search = 'invoice_no';
	private $cname = '';
	private $adminEmail = '';
	
	public function get_company_info($field){
		$this->cname = $this->db->get('wp_admin')->row()->fullname;
		$this->adminEmail = $this->db->get('wp_admin')->row()->email;
		return $this->db->get('wp_admin')->row()->{$field};
	}
	
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
		
		$this->db->group_by("invoice_no");
		$this->db->order_by("id", "desc");
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
		$this->db->group_by("invoice_no");
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
	
	public function dataupdate()
	{
		$invoice = $this->input->post('invoice');
		$status = $this->input->post('status');
		$semail = $this->input->post('semail');
		$this->db->set('status', $status);
		$this->db->where('invoice_no', $invoice);
		$this->db->update($this->table);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($this->adminEmail, $this->cname);
		$this->email->to($semail);
		$this->email->subject('Order Status');
		
		$message = "Dear Customer your order has been $status. Please feel free to contact Us";
		$this->email->message($message);
		$send = $this->email->send();
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
		$query = $this->db->get($this->table);
		return $query->result();
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
		return $this->db->get($this->table)->row()->{$field};
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
			$error = 0;
		}else{
			$error = 0;
		}
		return $error;
	}
	
	public function send_invoice($invoiceName){
		$semail = $this->input->post('semail');
		$pdf = FCPATH.'/invoices/'.$invoiceName.'.pdf';
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($this->adminEmail, $this->cname);
		$this->email->to($semail);
		$this->email->attach($pdf);
		$this->email->subject('Invoice From '.$this->cname);
		
		$message = "Dear Valued Customer,<br><br>
		Greetings from $this->cname!<br><br>

		Please find the attached electronic invoice payment of your order. If you have any query, please contact our Accounts Section or write to us at $this->adminEmail<br><br>

		Thank you for your business.<br><br>

		Best regards,
		Customer Accounts Department,
		$this->cname";
		
		$this->email->message($message);
		$send = $this->email->send();
	}
}