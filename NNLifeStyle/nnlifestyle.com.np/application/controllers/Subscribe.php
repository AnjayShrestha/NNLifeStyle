<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {
	
	private $folder = 'subscribe';
	private $mName = 'subscribemodel';
	private $page_title = 'Manage Subscription';
	private $add_title = '';
	private $edit_title = '';
	private $PNotify_title = '';
	private $add_msg = '';
	private $edit_msg = '';
	private $PNotify_type = 'success';
	private $perPage = 10;
	
	function __construct()
	{
		parent :: __construct();
		$this->load->model($this->mName);
		
		if($this->session->userdata('is_logged_in') != true)
		{
			redirect('wpanel');
		}
	}

	public function index()
	{
		$pp = $this->perPage;
		$pc = $this->input->post('pc');
		if(empty($pc)){
			$pcv = 0;
		}else{
			$pcv = $pc;
		}
		$data['title'] = $this->page_title;
		$data['at'] = $this->add_title;
		$data['et'] = $this->edit_title;
		$data['pn_title'] = $this->PNotify_title;
		$data['pn_add_msg'] = $this->add_msg;
		$data['pn_edit_msg'] = $this->edit_msg;
		$data['pn_type'] = $this->PNotify_type;
		$data['page'] = $this->folder;
		$data['pc'] = $pcv;
		$data['pp'] = $pp;
		
		
		$this->load->view('wpanel/header');
		$this->load->view('wpanel/sidebar-menu');
		
		$data['content'] = $this->{$this->mName}->get_data($pp);
		$data['sdata'] = $this->{$this->mName}->get_selected_data();
		
		$total = $this->{$this->mName}->total_data();
		$data['total'] = $total;
		
		$curPage = floor(($pcv/$pp) + 1);
		$totalPage = ceil($total / $pp);
		
		if($curPage >= $totalPage){
			$lastPage = 1;
		}else{
			$lastPage = 0;
		}
		
		$data['lastPage'] = $lastPage;
		
		
		
		
		//pagination code
		$this->load->library('pagination');
		$config['base_url'] = base_url($this->folder.'/');
		$config['uri_segment'] = 2;
		$config['total_rows'] = $total;
		$config['per_page'] = $pp;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['prev_link'] = 'Previous';
		$config['next_link'] = 'Next';
		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '</span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['use_page_numbers'] = false;
		$config['num_links'] = '10';  
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//pagination code
		
		$this->load->view('wpanel/'.$this->folder.'/list-items', $data);
		
		$this->load->view('wpanel/footer');
	}
	
	public function process(){
		$data['sdata'] = $this->{$this->mName}->get_selected_data();
		$this->load->view('wpanel/'.$this->folder.'/process', $data);
	}
	
	public function save(){
		$this->{$this->mName}->dataupdate();
	}
	
	public function delete(){
		$this->{$this->mName}->delete_data();
	}
	
	public function multidelete(){
		$this->{$this->mName}->delete_multi_data();
	}
	
	public function profile(){
		$data['data'] = $this->profile->get_data();
		$this->load->view('wpanel/profile', $data);
	}
	
	public function save_profile(){
		$this->profile->dataupdate();
	}
	
		public function get_order_customer_info(){
		$prefix = $this->input->post('type');
		$info = $this->{$this->mName}->get_customer_order_details();
		if($prefix == "invoice"){?>
        <table class="table table-striped">
        <thead>
          <tr>
            <th>S.N.</th>
            <th>Items</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
         <?php
		 $c = 0;
		 $grand_total = "";
		foreach($info as $cusrow){
			$price = $cusrow->price;
			$qty = $cusrow->qty;
			$total = $price * $qty;
			$grand_total = $total + $grand_total;
		?>
          <tr>
            <td><?php echo ++$c; ?></td>
            <td><?php echo $cusrow->items; ?></td>
            <td>
            Rs <?php 
			$price = $cusrow->price; 
			echo number_format((float)$price, 2, '.', '');
			?></td>
            <td><?php echo $cusrow->qty; ?></td>
            <td>Rs 
			<?php 
			$total = $cusrow->total; 
			echo number_format((float)$total, 2, '.', '');
			?>
            </td>
          </tr>
          <?php } ?>
          
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Grand Total:</td>
            <td>Rs <?php $tax = ($grand_total / 100) * $cusrow->tax; 
			$gttc = $grand_total; 
			echo number_format((float)$gttc, 2, '.', '');
			?>
            </td>
          </tr>
        </tbody>
      </table>

        <?php
		}else{
		foreach($info as $irow){
				$email = $irow->user_email;
				$name = $irow->first_name." ".$irow->last_name;
				$phone = $irow->phone;
			?>
            <ul class="list-group">
            	<li class="list-group-item"><strong>Full Name:</strong> <?php echo $name; ?></li>
                <li class="list-group-item"><strong>Email Address:</strong> <?php echo $email; ?></li>
                <li class="list-group-item"><strong>Phone Number:</strong> <?php echo $phone; ?></li>
            </ul>
           
    <?php
	}}}
}
