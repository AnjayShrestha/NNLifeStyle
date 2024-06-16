<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends CI_Model {
	private $cname = '';
	private $adminEmail = '';
	
	public function get_cms_part($page_type, $field){
		$this->db->where('page_type', $page_type);
		return $this->db->get('content')->row()->{$field};
	}
	
	public function get_selected_data($table, $field, $value, $limit){
		$this->db->where($field, $value);
		$this->db->order_by('display_order', 'asc');
		$this->db->limit($limit);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	public function get_company_info($field){
		$this->cname = $this->db->get('wp_admin')->row()->fullname;
		$this->adminEmail = $this->db->get('wp_admin')->row()->email;
		return $this->db->get('wp_admin')->row()->{$field};
	}
	
	public function get_data($table, $type, $order)
	{
		$this->db->order_by($type, $order);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	public function get_tag_data($table, $type, $order, $tags)
	{
		$this->db->where('tags', $tags);
		$this->db->order_by($type, $order);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	public function get_all_banner()
	{
		$this->db->order_by('display_order', 'asc');
		$query = $this->db->get('banner');
		return $query->result();
	}
	
	public function get_limited_data($table, $limit, $type, $order)
	{
		$this->db->order_by($type, $order);
		$this->db->limit($limit);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	public function total_categories_products($slug)
	{
		$data = array('cat_slug' => $slug);
		$this->db->where($data);
		$query = $this->db->get('products');
		return $query->num_rows();
	}
	
	public function get_testimonials()
	{
		$this->db->where('status', 'Approved');
		$this->db->order_by('display_order', 'asc');
		$query = $this->db->get('testimonials');
		return $query->result();
	}
	
	public function get_partial_data($table, $type, $wv, $field){
		$this->db->where($type, $wv);
		return $this->db->get($table)->row()->{$field};
	}
	
	public function get_partial_data_package($field){
		$url = $this->uri->segment(2);
		$type = $this->input->post('type');
		$data = array('cat_slug' => $url, 'permalink' => $url3);
		$this->db->where($data);
		return $this->db->get('region')->row()->{$field};
	}
	
	public function get_products($limit){
		$tags = $this->uri->segment(1);
		$url = $this->uri->segment(2);
		$p = $this->uri->segment(3);
		$type = $this->input->post('type');
		$amount = $this->input->post('amount');
		$s = $this->input->post('slug');
		if(empty($s)){
			$slug = $url;
		}else{
			$slug = $s;
		}
		if(empty($p)){ $page = 0; }else{ $page = $p;}
		
		if($tags == 'men' || $tags == 'women' || $tags == 'bags'){
			$sdata = array('cat_slug' => $slug, 'tags' => $tags);
		}elseif($tags == 'search'){
			$sdata = array('cat_slug' => $url, 'permalink' => $url);
		}else{
			if($url == 'featured'){
				$sdata = array('feature' => 'Yes');
			}else{
				$sdata = array('cat_slug' => $slug);
			}
		}
		
		if($type == 'range'){
			$mp = $this->input->post('min');
			if($mp == 0){
				$minprice = 1;
			}else{
				$minprice = $mp;
			}
			$maxprice = $this->input->post('max');
			
			if($tags == 'search'){
				$this->db->where("`price` BETWEEN $minprice AND $maxprice AND `cat_slug` LIKE '%$url%' OR `permalink` LIKE '%$url%'");
			}else{
				$this->db->where("price BETWEEN $minprice AND $maxprice");
				$this->db->where($sdata);
			}
			
		}elseif($type == 'sort'){
			$sort = $this->input->post('sort');
			if($sort == 'low'){
				$this->db->order_by('price', 'asc');
			}else{
				$this->db->order_by('price', 'desc');
			}
			if($tags == 'search'){
				$this->db->or_like($sdata);
			}else{
				$this->db->where($sdata);
			}
		}else{
			$this->db->order_by('display_order', 'asc');
			if($tags == 'search'){
				$this->db->or_like($sdata);
			}else{
				$this->db->where($sdata);
			}
		}
		$this->db->limit($limit, $page);
		$query = $this->db->get('products');
		return $query->result();
	}
	
	public function total_products()
	{
		$tags = $this->uri->segment(1);
		$url = $this->uri->segment(2);
		$type = $this->input->post('type');
		$amount = $this->input->post('amount');
		$s = $this->input->post('slug');
		if(empty($s)){
			$slug = $url;
		}else{
			$slug = $s;
		}
		
		if($tags == 'men' || $tags == 'women' || $tags == 'bags'){
			$sdata = array('cat_slug' => $slug, 'tags' => $tags);
		}elseif($tags == 'search'){
			$sdata = array('cat_slug' => $url, 'permalink' => $url);
		}else{
			$sdata = array('cat_slug' => $slug);
		}
		
		if($type == 'range'){
			$mp = $this->input->post('min');
			if($mp == 0){
				$minprice = 1;
			}else{
				$minprice = $mp;
			}
			$maxprice = $this->input->post('max');
			
			if($tags == 'search'){
				$this->db->where("`price` BETWEEN $minprice AND $maxprice AND `cat_slug` LIKE '%$url%' OR `permalink` LIKE '%$url%'");
			}else{
				$this->db->where("price BETWEEN $minprice AND $maxprice");
				$this->db->where($sdata);
			}
		}else{
			if($tags == 'search'){
				$this->db->or_like($sdata);
			}else{
				$this->db->where($sdata);
			}
		}
		$query = $this->db->get('products');
		return $query->num_rows();
	}
	
	public function get_product_details(){
		$permalink = $this->uri->segment(2);
		$this->db->where('permalink', $permalink);
		$query = $this->db->get('products');
		return $query->result();
	}
	
	public function generate_temp_session(){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%";
    	$code = substr(str_shuffle($chars),0,30);
		return $code;
	}
	
	public function add_to_cart()
	{
		if($this->session->userdata('is_user_logged_in') == true){
			$sessid = $this->session->userdata['is_user_logged_in']['id'];
		}else{
			$sessid = "";
		}
		$item = $this->input->post('item');
		$price = $this->input->post('price');
		$qty = $this->input->post('qty');
		$color = $this->input->post('color');
		$size = $this->input->post('size');
		$permalink = $this->input->post('permalink');
		$pcode = $this->input->post('pcode');
		$id = $this->input->post('id');
		$temp_session_id = $this->session->userdata('temp_session_id');
		
		$data = array(
		'items' => $item, 
		'price' => $price, 
		'qty' => $qty,
		'color' => $color,
		'size' => $size,
		'permalink' => $permalink,
		'pcode' => $pcode,
		'prod_id' => $id,
		'temp_session_id' => $temp_session_id, 
		'session_id' => $sessid
		);
		$this->db->set($data);
		$this->db->insert('temp_cart');
	}
	
	public function get_temp_cart()
	{
		$sessid = $this->session->userdata['is_user_logged_in']['id'];
		$temp_session_id = $this->session->userdata('temp_session_id');
		$url = $this->uri->segment(1);
		if(empty($temp_session_id)){
				$data = array("session_id" => $sessid);
		}else{
			$data = array("temp_session_id" => $temp_session_id);
		}
		$this->db->where($data);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('temp_cart');
		return $query->result();
	}
	
	public function update_tempcart()
	{
		$id = $this->input->post('id');
		$qty = $this->input->post('qty');
		$coupon = $this->input->post('coupon');
		if(empty($coupon)){
			$discount = '';
		}else{
			$this->db->where("coupon_token", $coupon);
			$discount = $this->db->get('coupon')->row()->discount;
		}
		foreach($id as $key=>$val)
		{
			$q = $qty[$key];
			$data = array('qty' => $q, 'coupon' => $coupon, 'discount' => $discount);
			$this->db->set($data);
			$this->db->where('id', $val);
			$this->db->update('temp_cart');
		}
	}
	
	public function update_final_temp_cart()
	{
		$sessid = $this->session->userdata['is_user_logged_in']['id'];
		$temp_session_id = $this->session->userdata('temp_session_id');
		if(empty($temp_session_id)){
			$field = 'session_id';
			$sid = $sessid;
		}else{
			$field = 'temp_session_id';
			$sid = $temp_session_id;
		}
		$method = $this->input->post('method');
		$userInfo = $this->input->post('pinfo');
		if($userInfo == 'yes'){
			$dfname = $this->input->post('fname');
			$dlname = $this->input->post('lname');
			$demail = $this->input->post('email');
			$dphone = $this->input->post('phone');
			$daddress = $this->input->post('address');
			$pinfo = 'yes';
		}else{
			$dfname = $dlname = $demail = $dphone = $daddress = '';
			$pinfo = 'no';
		}
		
		$data = array('method' => $method, 'pinfo' => $pinfo, 'delivery_first_name' => $dfname, 'delivery_last_name' => $dlname, 'delivery_email' => $demail, 'delivery_phone' => $dphone, 'delivery_address' => $daddress);
		$this->db->set($data);
		$this->db->where($field, $sid);
		$this->db->update('temp_cart');
	}
	
	public function clear_coupon()
	{
		$sessid = $this->session->userdata['is_user_logged_in']['id'];
		$temp_session_id = $this->session->userdata('temp_session_id');
		if(empty($temp_session_id)){
			$data = array("session_id" => $sessid);
		}else{
			$data = array("temp_session_id" => $temp_session_id);
		}
		$sdata = array('coupon' => '', 'discount' => '');
		$this->db->set($sdata);
		$this->db->where($data);
		$this->db->update('temp_cart');
	}
	
	public function check_coupon($token)
	{
		$data = array('coupon_token' => $token, 'status' => 'active');
		$this->db->where($data);
		$query = $this->db->get('coupon');
		return $query->num_rows();
	}
	
	public function delete_tempcart()
	{
		$id = $this->input->post('delid');
		$this->db->where('id', $id);
		$this->db->delete('temp_cart');
	}
	
	public function total_cart()
	{
		if($this->session->userdata('is_user_logged_in') == true){
			$sessid = $this->session->userdata['is_user_logged_in']['id'];
		}else{
			$sessid = null;
		}
		$temp_session_id = $this->session->userdata('temp_session_id');
		if(empty($temp_session_id)){
			$data = array("session_id" => $sessid);
		}else{
			$data = array("temp_session_id" => $temp_session_id);
		}
		$this->db->where($data);
		$query = $this->db->get('temp_cart');
		return $query->num_rows();
	}
	
	//check email address is unique or not.
	public function check_members_email()
	{
		$uemail = $this->input->post('email');
		$data = array("user_email" => $uemail);
		$this->db->where($data);
		$query = $this->db->get('members');
		return $query->num_rows();
	}
	
	public function check_members_phone()
	{
		$uemail = $this->input->post('phone');
		$data = array("phone" => $uemail);
		$this->db->where($data);
		$query = $this->db->get('members');
		return $query->num_rows();
	}
	
	//insert member with email
	public function insert_members_email()
	{
		$fname = $this->input->post('fname');
		// $lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$pass = md5($password);
		// $phone = $this->input->post('phone');
		// $address = $this->input->post('address');
		
		$data = array(
			'full_name' => $fname, 
			// 'last_name' => $lname, 
			'user_email' => $email, 
			'user_show_password' => $password,
			'user_password' => $pass, 
			// 'phone' => $phone,
			// 'address' => $address,
		);
		$this->db->set($data);
		$this->db->insert('members');
		//send email
		
	}


	//insert member with mobile
	public function insert_members_phone()
	{
		$fname = $this->input->post('fname');
		// $lname = $this->input->post('lname');
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');
		$pass = md5($password);
		
		$data = array(
			'full_name' => $fname, 
			// 'last_name' => $lname, 
			'phone' => $phone,
			'user_show_password' => $password,
			'user_password' => $pass, 
			
			// 'address' => $address,
		);
		$this->db->set($data);
		$this->db->insert('members');
		
		
	}
	

	public function send_register_email(){
		
		$email = $this->input->post('email');
		$url = base_url("wpanel");
		$homeurl = base_url();
		
		$message = "
		Dear Customer,<br /><br />
		
		Thank you for registering with us. <br>Please visit our website and phurchase from our collection <a href='$homeurl'>$homeurl</a><br />
			<br />
		<strong>Regards,<br>
		$this->cname</strong>
		";
		
		$admin_message = "
		Hello Admin,<br />
			<br />
		You have a new member registered for $this->cname. <br>Please login to admin section for detail information <a href='$url'>$url</a>
		";
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($this->adminEmail, $this->cname);
		$this->email->to($email);
		$this->email->subject('Registration Successfull');
		$this->email->message($message);
		$this->email->send();
		$this->email->clear();
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($this->adminEmail, $this->cname);
		$this->email->to($this->adminEmail);
		$this->email->cc($this->secondEmail);
		$this->email->subject('New Registration');
		$this->email->message($admin_message);
		$this->email->send();
		$this->email->clear();
	}
	
	public function get_member()
	{
		$id = $this->session->userdata['is_user_logged_in']['id'];
		$this->db->where('id', $id);
		$query = $this->db->get('members');
		return $query->result();
	}
	
	public function check_user_profile()
	{
		$email = $this->input->post('email');
		$id = $this->session->userdata['is_user_logged_in']['id'];
		
		$this->db->where('id !=', $id);
		$query = $this->db->get('members');
		foreach($query->result() as $row)
		{
			$remail = strtolower($row->user_email);
			$pemail = strtolower($email);
			
			if(trim($remail) == trim($pemail))
			{
				$error = 1;
				return $error;
			}
		}
	}
	
	
	public function update_profile()
	{
		$fname = $this->input->post('fname');
		$dob = $this->input->post('dob');
		$gender = $this->input->post('gender');
		// $lname = $this->input->post('lname');
		// $email = $this->input->post('email');
		// $pwd = $this->input->post('password');
		// $oldpwd = $this->input->post('pass');
		// if(empty($pwd)){
		// 	$password = $oldpwd;
		// 	$pass = md5($oldpwd);
		// }else{
		// 	$password = $pwd;
		// 	$pass = md5($pwd);
		// }
		// $phone = $this->input->post('phone');
		// $address = $this->input->post('address');
		
		$data = array(
				'full_name' => $fname, 
				'dateofbirth' => $dob,
				'gender' => $gender
				// 'last_name' => $lname, 
				// 'user_email' => $email, 
				// 'user_show_password' => $password,
				// 'user_password' => $pass, 
				// 'phone' => $phone,
				// 'address' => $address,
		);
		$id = $this->session->userdata['is_user_logged_in']['id'];
		
		$this->db->where('id', $id);
		$this->db->set($data);
		$this->db->update('members');
	}

	public function update_member_password(){

		// $oldPwd = $this->input->post('oldpassword');
		$newPwd = $this->input->post('newpassword');
		// $confirmPwd = $this->input->post('confirmpassword');
		$password = $newPwd;
		$pass = md5($newPwd);
		// if(empty($pwd)){
		// 	$password = $oldpwd;
		// 	$pass = md5($oldpwd);
		// }else{
		// 	$password = $pwd;
		// 	$pass = md5($pwd);
		// }
		
		$data = array(
				// 'full_name' => $fname, 
				// 'dateofbirth' => $dob,
				// 'gender' => $gender
				// 'last_name' => $lname, 
				// 'user_email' => $email, 
				'user_show_password' => $password,
				'user_password' => $pass, 
				// 'phone' => $phone,
				// 'address' => $address,
		);
		$id = $this->session->userdata['is_user_logged_in']['id'];
		
		$this->db->where('id', $id);
		$this->db->set($data);
		$this->db->update('members');
	}
	
	//function to update members shipping details
	public function update_shipping_details(){
		$shippingFullName = $this->input->post('shippingFullName');
		$shippingPhoneNumber = $this->input->post('shippingPhoneNumber');
		$shippingCountry = $this->input->post('shippingCountry');
		$shippingCity = $this->input->post('shippingCity');
		$shippingAddress = $this->input->post('shippingAddress');

		$data = array(
			
				'shipping_full_name' => $shippingFullName,
				'shipping_phone_number' => $shippingPhoneNumber, 
				'shipping_country' => $shippingCountry, 
				'shipping_city' => $shippingCity, 
				'shipping_address' => $shippingAddress, 

		);
		$id = $this->session->userdata['is_user_logged_in']['id'];
		
		$this->db->where('id', $id);
		$this->db->set($data);
		$this->db->update('members');

	}
	
	public function list_all_order($lv)
	{
		$url = $this->uri->segment(2);
		$p = $this->uri->segment(2);
		$limit = $lv;
		if(empty($p)){ $page = 0; }else{ $page = $p;}
		$this->db->where("user_session_id", $this->session->userdata['is_user_logged_in']['id']);
		$this->db->group_by("invoice_no");
		$this->db->order_by("id", "desc");
		$this->db->limit($limit, $page);
		$query = $this->db->get('orders');
		return $query->result();
	}
	
	public function total_order()
	{
		$this->db->where("user_session_id", $this->session->userdata['is_user_logged_in']['id']);
		$this->db->group_by("invoice_no");
		$query = $this->db->get('orders');
		return $query->num_rows();
	}
	
	public function get_invoice_details()
	{
		$id = $this->input->post("id");
		$data = array(
				'invoice_no' => $id,
				'user_session_id' => $this->session->userdata['is_user_logged_in']['id']
		);
		$this->db->where($data);
		$query = $this->db->get('orders');
		return $query->result();
	}
	
	public function insert_final_cart()
	{
		$gt = "";
		$gt2= "";
		$temp_session_id = $this->session->userdata('temp_session_id');
		$sessid = $this->session->userdata['is_user_logged_in']['id'];
		$usertype = "member";
		$invoiceno = $this->input->post('invoiceno'); 
		$id = $this->input->post('id');
		$product = $this->input->post('product');
		$price = $this->input->post('price');
		$qty = $this->input->post('qty');
		$color = $this->input->post('color');
		$size = $this->input->post('size');
		$permalink = $this->input->post('permalink');
		$total = $this->input->post('total');
		$prod_id = $this->input->post('prod_id');
		$pcode = $this->input->post('pcode');
		$coupon = $this->input->post('coupon');
	
		$ufname = $this->input->post('ufname');
		$uemail = $this->input->post('uemail');
		$uphone = $this->input->post('uphone');
		$uaddress = $this->input->post('uaddress');

		// deleviry details
		$dfname = $this->input->post('dfname');
		$dphone = $this->input->post('dphone');
		$dcountry = $this->input->post('dcountry');
		$dcity = $this->input->post('dcity');
		$daddress = $this->input->post('daddress');
		
		if(empty($coupon)){
			$cpn = '';
		}else{
			$cpn = $coupon.'<br>';
		}
		$discount = $this->input->post('discount');
		if(empty($discount)){
			$dcnt = '0.00';
			$dcntvv = '0.00';
		}else{
			$dcnt = $discount.' %<br>';
			$dcntvv = $discount.' %';
		}
        $taxrate = 13;
        $shiprate = 100;
		
		foreach($id as $key => $value){
			$data = array(
				'invoice_no' => $invoiceno,
				'items' => $product[$key], 
				'price' => $price[$key], 
				'qty' => $qty[$key],
				'color' => $color[$key],
				'size' => $size[$key],
				'permalink' => $permalink[$key],
				'total' => $total[$key],
				'pcode' => $pcode[$key],
				'prod_id' => $prod_id[$key],
				'status' => 'pending', 
				'coupon' => $coupon,
				'discount' => $discount,
				'user_name' => $ufname, 
				'user_email' => $uemail,
				'user_phone' => $uphone,
				'user_address' => $uaddress,
				'delivery_full_name' => $dfname, 
				'delivery_phone' => $dphone,
				'delivery_country' => $dcountry,
				'delivery_city' => $dcity,
				'delivery_address' => $daddress,				
                'tax' => $taxrate,
				'user_session_id' => $sessid,
				'user_type' => $usertype
			);
			$this->db->set($data);
			$this->db->insert('orders');
		}
						$cusMsg = "Dear Customer,<br>
						Your order has been confirmed. We will get back to you shortly.<br><br>
						<strong>Here is your Order Details:</strong><br><br>";
		
						$adminMsg = "Dear Admin,<br>
						You have a new order request. Please confirm order by visiting to order list from admin section<br><br>
						<strong>Here is your Order Request Details:</strong><br><br>FUll Name: $uname<br>Email: $uemail<br> Phone: $uphone<br> Address: $uaddress<br><br>";
						
						$message = "Invoice No. = $invoiceno
						<table width='100%' cellspacing='0' cellpadding='0' style='margin-top:10px;'>
							<thead>
								<tr>
									<th style='text-align:left; border:1px #e6e6e6 solid; padding:5px;'>S.N.</th>
									<th style='text-align:left; border:1px #e6e6e6 solid; padding:5px;'>Code</th>
									<th style='text-align:left; border:1px #e6e6e6 solid; padding:5px;'>Items</th>
									<th style='text-align:left; border:1px #e6e6e6 solid; padding:5px;'>Color</th>
									<th style='text-align:left; border:1px #e6e6e6 solid; padding:5px;'>Size</th>
									<th style='text-align:left; border:1px #e6e6e6 solid; padding:5px;'>Qty</th>
									<th style='text-align:left; border:1px #e6e6e6 solid; padding:5px;'>Price</th>
									<th style='text-align:left; border:1px #e6e6e6 solid; padding:5px;'>Total</th>
								</tr>
							</thead>
						<tbody>";
						 $c = 0;
						 $grand_total = "";
						foreach($id as $key => $value){
						$pcd = $pcode[$key];
						$i = $product[$key];
						$p = $price[$key];
						$q = $qty[$key];
						$col = $color[$key];
						$sz = $size[$key];
						$per = $permalink[$key];
						$total = $p * $q;
						$grand_total = $total + $grand_total;
							
						$message.= "<tr>
							<td style='border:1px #e6e6e6 solid; padding:5px;'>".++$c."</td>
							<td style='border:1px #e6e6e6 solid; padding:5px;'>$pcd</td>
							<td style='border:1px #e6e6e6 solid; padding:5px;'>$i</td>
							<td style='border:1px #e6e6e6 solid; padding:5px;'>$col</td>
							<td style='border:1px #e6e6e6 solid; padding:5px;'>$sz</td>
							<td style='border:1px #e6e6e6 solid; padding:5px;'>$q</td>
							<td style='border:1px #e6e6e6 solid; padding:5px;'>NPR ".number_format($p)."</td>
							<td style='border:1px #e6e6e6 solid; padding:5px;'>NPR ".number_format($total)."</td>
						  </tr>";
						 }
						 $vd = ($grand_total / 100) * $discount;
						 if(!empty($coupon)){
							$cpnvv = "<h4><strong>Coupon</strong></h4>
										Your voucher code: <strong>$cpn</strong>
										Voucher code discount: <strong>$dcntvv</strong>";
						 }else{
							 $cpnvv = "";
						 }
						 echo $message.= "<tr>
							<td colspan='6' rowspan='3' style='border:1px #e6e6e6 solid; padding:5px;'>$cpnvv</td>
							<td style='border:1px #e6e6e6 solid; padding:5px;'>Total</td>
							<td colspan='2' style='border:1px #e6e6e6 solid; padding:5px;'>NPR ".number_format($grand_total)."</td>
						  </tr>

						  <tr>
							<td style='border:1px #e6e6e6 solid; padding:5px;'>Discount</td>
							<td colspan='2' style='border:1px #e6e6e6 solid; padding:5px;'>$dcntvv</td>
						  </tr>

						  <tr>
							  <td style='border:1px #e6e6e6 solid; padding:5px;'>Grand Total</td>
							  <td colspan='2' style='border:1px #e6e6e6 solid; padding:5px;'><strong>NPR ".number_format($grand_total - $vd)."</strong></td>
						  </tr>
						</tbody>
						</table>";
			
		
						$this->load->library('email');
						$config['mailtype'] = 'html';
						$config['charset'] = 'utf-8';
						$this->email->initialize($config);
						$this->email->from($this->adminEmail, $this->cname);
						$this->email->to($uemail);
						$this->email->subject('Thank you for your order');
						$this->email->message($cusMsg.$message);
						$send = $this->email->send();
						$this->email->clear();
		
						$this->load->library('email');
						$config['mailtype'] = 'html';
						$config['charset'] = 'utf-8';
						$this->email->initialize($config);
						$this->email->from($this->adminEmail, $this->cname);
						$this->email->to($this->adminEmail);
						$this->email->cc($this->secondEmail);
						$this->email->subject('New Order Request');
						$this->email->message($adminMsg.$message);
						$send = $this->email->send();
		
						if(empty($temp_session_id)){
							$this->db->where('session_id', $sessid);
						}else{
							$this->db->where('temp_session_id', $temp_session_id);
						}
						$this->db->delete('temp_cart');

						$this->session->unset_userdata('temp_session_id');
						$this->session->unset_userdata('shippingstate');
						$this->session->unset_userdata('method');
						$this->session->unset_userdata('tax');
						$this->session->unset_userdata('shipping');
						$this->session->unset_userdata('checkout');

						$msg = '<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px;">Your order has been successfully submitted. We will get back to yo asap.</p>';
	}
	
	public function send_contact()
	{
		$name = $this->input->post('fname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$msg = $this->input->post('message');
		
		$message ='<strong>Contact Request Details:</strong><br><br> Full Name : '.$name.'<br>'.'Email : '.$email.'<br>'.'Phone : '.$phone.'<br>'.'Address : '.$address.'<br>Message : '.$msg;
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($email);
		$this->email->to($this->adminEmail);
		$this->email->subject('Contact Request from '.$name);
		$this->email->message($message);
		$send = $this->email->send();
		if($send){
			$msg = 'success';
		}
		else{
			$msg = 'failed';
		}
		return $msg;
	}
	
	public function check_subscriber()
	{
		$remail = $this->input->post('email');
		$data = array("email" => $remail);
		$this->db->where($data);
		$query = $this->db->get('subscription');
		return $query->num_rows();
	}
	
	public function insert_subscriber()
	{
		$email = $this->input->post('email');
		
		$data = array(
		'email' => $email
		);
		$this->db->set($data);
		$this->db->insert('subscription');
	}
	
	public function send_subscription_email(){
		$url = base_url("wpanel");
		$message = "
		Hello Admin,<br><br>
		You have a new subscriber registered for $this->cname.<br>
		Please login to admin section for detail information <a href='$url'>$url</a>";
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($this->adminEmail, $this->cname);
		$this->email->to($this->adminEmail);
		$this->email->subject('New Subscriber');
		$this->email->message($message);
		$this->email->send();
		$this->email->clear();
	}
	
	public function send_password()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$url = base_url("login");
		
		$this->db->select('user_email,user_password');
		$this->db->where('user_email', $email);
		$query = $this->db->get('members');
		if($query->num_rows() == 0)
		{
			$error = 1;
		}else{
			$message = "Hello User,<br>
						You recently requested a password reset.<br><br>
						Login Url : $url<br>
						<strong>New Password: </strong>$password<br><br>
						Regards,<br>
						Administrator
						";
			
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from($this->adminEmail, $this->cname);
			$this->email->to($email);
			$this->email->subject('reset your password');
			$this->email->message($message);
			$send = $this->email->send();
			if($send){
				$data = array(
					'user_password' => md5($password),
					'user_show_password' => $password
				);
				$this->db->set($data);
				$this->db->where('user_email', $email);
				$this->db->update('members');
			}
			$error = 0;
		}
		return $error;
	}
}