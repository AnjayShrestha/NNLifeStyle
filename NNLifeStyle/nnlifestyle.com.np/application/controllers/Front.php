<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
	var $data;
	function __construct(){
		parent :: __construct();
		$this->load->model('frontend');
		$this->data = array(
			'msg' => "", 
			'search' => "", 
			'address' => $this->frontend->get_company_info("address"), 
			'phone' => $this->frontend->get_company_info("phone"), 
			'email' => $this->frontend->get_company_info("email"), 
			'facebook' => $this->frontend->get_company_info("facebook"),
			'youtube' => $this->frontend->get_company_info("youtube"),
			'instagram' => $this->frontend->get_company_info("instagram"),
			'opening' => $this->frontend->get_company_info("opening_hours"),
			'categories' => $this->frontend->get_data("categories", 'display_order', 'asc'),
			'totalcart' => $this->frontend->total_cart(),
			'ftxt' => $this->frontend->get_cms_part('About Us', 'description')
		);
		$this->load->vars($this->data);
	}

	public function index()
	{	
		$data['best'] = $this->frontend->get_selected_data('products', 'best_selling', 'Yes', 8);
		$data['feature'] = $this->frontend->get_selected_data('products', 'feature', 'Yes', 8);
		$data['cat'] = $this->frontend->get_selected_data('categories', 'display_in_home', 'yes', 4);
		$data['oftitle'] = $this->frontend->get_cms_part('Home Page Offer Section', 'page_title');
		$data['oftxt'] = $this->frontend->get_cms_part('Home Page Offer Section', 'description');
		$data['ofimg'] = $this->frontend->get_cms_part('Home Page Offer Section', 'attachment1');
		$data['banner'] = $this->frontend->get_all_banner();
		$this->load->view('home', $data);
	}
	
	public function categories(){
		$data['clients'] = '';
		$this->load->view('categories', $data);
	}
	
	public function products()
	{	
		$chk = $this->uri->segment(1);
		$url = $this->uri->segment(2);
		$price = $this->input->post('price');
		$type = $this->input->post('type');
		$min = $this->input->post('min');
		$max = $this->input->post('max');
		$sort = $this->input->post('sort');
		if($chk == "price"){
			$minprice = $min;
			$maxprice = $max;
			$baseurl = "price";
			$sb = "";
			$typ = "range";
		}
		elseif($chk == "sort"){
			$minprice = 5000;
			$maxprice = 20000;
			$baseurl = "sort";
			$sb = $sort;
			$typ = "sort";
		}elseif($chk == "search"){
			if(empty($min)){
				$minprice = 5000;
			}else{
				$minprice = $min;
			}
			
			if(empty($max)){
				$maxprice = 20000;
			}else{
				$maxprice = $max;
			}
			
			$baseurl = "search";
			$sb = $sort;
			$typ = $type;
		}else{
			$minprice = 5000;
			$maxprice = 20000;
			$baseurl = $chk;
			$sb = "";
			$typ = "";
		}
		
		$total = $this->frontend->total_products();
		$limit = 12;
		$data['slug'] = $url;
		$data['sort'] = $sb;
		$data['typ'] = $typ;
		$data['min'] = $minprice;
		$data['max'] = $maxprice;
		$data['best'] = $this->frontend->get_selected_data('products', 'best_selling', 'Yes', 8);
		if($chk == "search"){
			$data['pagetitle'] = $total." records found";
		}else{
			$data['pagetitle'] = $this->frontend->get_partial_data('categories', 'permalink', $url, 'title');
		}
		$data['pdata'] = $this->frontend->get_products($limit);
		$data['total'] = $total;
		
		//pagination code
		$config['base_url'] = base_url($baseurl."/".$url);
		$config['uri_segment'] = 3;
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['prev_link'] = 'Previous';
		$config['next_link'] = 'Next';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="previous">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['use_page_numbers'] = false;
		$config['num_links'] = '10';  
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//pagination code
		
		$this->load->view('products', $data);
	}
	
	public function search_packages(){
		$destination = $this->input->post('destination');
		$activities = $this->input->post('activities');
		$region = $this->input->post('region');
		$data['search'] = $this->input->post('search');
		$data['destination'] = $destination;
		$data['activities'] = $activities;
		$data['region'] = $region;
		$data['pdata'] = $this->frontend->search_packages($destination, $activities, $region);
		$this->load->view('packages', $data);
	}
	
	public function product_details()
	{	
		$cart = $this->input->post('cart');
		$data['code'] = $this->frontend->generate_temp_session();
		if($cart){
			if($this->session->userdata('temp_session_id') == "")
			{
				$date = date('mdy');  
				$time = date('his');
				$temp_session_id = $this->frontend->generate_temp_session();
				$this->session->set_userdata('temp_session_id', $temp_session_id); 
			}
			$this->frontend->add_to_cart();
			
			redirect("cart");
		}
		$data['prodetails'] = $this->frontend->get_product_details();
		$this->load->view('product-details', $data);
	}
	
	public function pimages()
	{	
		$data['prodetails'] = $this->frontend->get_product_details();
		$this->load->view('product-images', $data);
	}
	
	public function cart(){
		$data['coupon'] = '';
		$url = $this->uri->segment(1);
		$data['pageTitle'] = 'Cart';
		$data['cart'] = $this->frontend->get_temp_cart();	
		$this->load->view('cart', $data);	
	}
	
	public function update_cart(){
		$coupon = $this->input->post('coupon');
		if(!empty($coupon)){
			$chktoken = $this->frontend->check_coupon($coupon);
			if($chktoken == 0){
				echo '<p class="error msgcenter">Invalid Voucher Code</p>';
			}else{
				$this->frontend->update_tempcart();
				echo '<p class="success msgcenter">Update Successfull</p>';
			}
		}else{
			$this->frontend->update_tempcart();
			echo '<p class="success msgcenter">Update Successfull</p>';
		}
	}
	
	public function update_final_temp_cart(){
		$this->frontend->update_final_temp_cart();
	}
	
	public function delete_cart(){
		$this->frontend->delete_tempcart();
		echo '<p class="error">Delete Successfull</p>';
	}
	
	//function to checkout shopping
	public function checkout(){
		$fcart = $this->input->post('fcart');
		if($fcart){
			$this->frontend->insert_final_cart();
		}
		$data['user'] = $this->frontend->get_member();
		$data['cart'] = $this->frontend->get_temp_cart();
		$this->load->view('checkout', $data);		
	}
	
	public function login()
	{
		$cart = $this->frontend->total_cart();
		if(isset($_SERVER['HTTP_REFERER'])){
			$referer = basename($_SERVER['HTTP_REFERER']);
			if($referer == "checkout" && $cart > 0)
			{
				$this->session->set_userdata('checkout', "yes"); 
			}
		}	
		if($this->session->userdata('is_user_logged_in') != true){
			$this->load->view('login');	
		}else{
			redirect("user-profile");
		}	
	}
	
	public function logg_in()
	{
		$this->load->model('userlogcheck');
		
		$data['useridentity'] = $this->input->post('useridentity');
		$data['password'] = $this->input->post('password');
		
		$check = $this->userlogcheck->security();
		
		if($check == 'verified')
		{
			$status = $this->session->userdata['is_user_logged_in']['status'];
			$cart = $this->frontend->total_cart();
			if($status == "inactive"){
				echo '<p class="error msgcenter">Your Account Has been deactivated. Please contact the admin for further process.</p>';
			}else{
				if(isset($this->session->userdata['checkout']) == "yes" && $cart > 0){
					echo '<p class="success msgcenter">Login Successfull</p>';
					echo '
					<script>
						window.setTimeout(function() {
						location.href = "'.base_url('checkout').'";
						}, 1000);
					</script>';
				}else{
						echo '<p class="success msgcenter">Login Successfull</p>';
						echo '
						<script>
							window.setTimeout(function() {
							location.href = "'.base_url('user-profile').'";
							}, 1000);
						</script>';
				}
			}
		}else{
			echo '<p class="error msgcenter">Inavlid Email Address or Password</p>';
		}
	}
	
	public function logout()
	{	
		$temp_session_id = $this->session->userdata('temp_session_id');
		$data = array("temp_session_id" => $temp_session_id);
		$this->db->where($data);
		$this->db->delete('temp_cart');
		$this->session->sess_destroy();
		redirect("login");
	}
	
	public function forgot_password()
	{	
		$data['msg'] = '';
		$email = $this->input->post("email");
		if(isset($email)){
			$check = $this->frontend->send_password();
			if($check == 0)
			{
				$data['msg'] = '<p class="success msgcenter">Check your email for the new password.</p>';
			}else{
				$data['msg'] = '<p class="error msgcenter">Your email is not authenticated</p>';
			}
		}
		
    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!<]@(#$[%^}&*){:~>";
    	$pwd = substr(str_shuffle($chars),0,16);
		$data['password'] = $pwd;
		$this->load->view('forgot-password', $data);
	}
	
	
	public function register()
	{	
		$this->load->view('register');
	}
	
	public function process_register_email()
	{
		$this->load->helper('email');
		$fname = $this->input->post('fname');
		// $lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		// $phone = $this->input->post('phone');
		// $address = $this->input->post('address');

		// Validate password strength
			// $uppercase = preg_match('@[A-Z]@', $password);
			// $lowercase = preg_match('@[a-z]@', $password);
			// $number    = preg_match('@[0-9]@', $password);
			// $specialChars = preg_match('@[^\w]@', $password);

		
		if (valid_email($email))
		{
			$valid = 1;
		}
		else
		{
			$valid = 0;
		}
		
		if( empty($fname) || empty($email) ||empty($password) ){
			echo '<p class="error msgcenter">All fields are Required</p>';
		}else{
			if($valid == 1)
			{	
				$check = $this->frontend->check_members_email();
				
				if($check == 1)
				{
					$msg = '<p class="error msgcenter">Email Already exists please try a different email</p>';
				}
				else
					{
						// if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
						// 	    // echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';

						// // if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $password)) {
						// 	$msg = '<p class="error msgcenter">Password must contain at least one number and one uppercase and one lowercase letter and one special character, and at least 8 or more characters</p>';

						// }
						// else{
							// $msg = '<p class="error msgcenter">Strong password</p>';

							$this->frontend->insert_members_email();
							$msg = '<p class="success msgcenter">Registration Successfull</p>';
							echo "<script>$('.register-form')[0].reset();</script>";
							$this->frontend->send_register_email();
						// }
				}
			}else{
				$msg = '<p class="error msgcenter">Email is not valid. Please enter a valid email.</p>';
			}
			echo $msg;
		}
	}


	public function process_register_phone()
	{
		// $this->load->helper('email');
		$fname = $this->input->post('fname');
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');
		// $validation = $this->form_validation->set_rules('phone', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]'); //{10} for 10 digits number
		// Validate password strength
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);
			$specialChars = preg_match('@[^\w]@', $password);

		 if (preg_match('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', $phone))
	        {
	                $valid = 1;
	        }
	        else
	        {
	                 $valid = 0;
	        }
		
		if( empty($fname) || empty($phone) ||empty($password) ){
			echo '<p class="error msgcenter">All fields are Required</p>';
		}else{
			if($valid == 1)
			{	
				$check = $this->frontend->check_members_phone();
				
				if($check == 1)
				{
					$msg = '<p class="error msgcenter">Phone Number Already exists please try a different phone number.</p>';
				}
				else
					{
						if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
							$msg = '<p class="error msgcenter">Password must contain at least one number and one uppercase and one lowercase letter and one special character, and at least 8 or more characters</p>';

						}
						else{

							$this->frontend->insert_members_phone();
							$msg = '<p class="success msgcenter">Registration Successfull</p>';
							echo "<script>$('.register-form')[0].reset();</script>";
							// $this->frontend->send_register_email();
						}
						
				}
			}else{
				$msg = '<p class="error msgcenter">Phone Number is not valid. Please enter a valid phone number.</p>';
			}
			echo $msg;
		}
	}
	
	//controller function to view member profile details.
	public function profile()
	{	
		$data['user'] = $this->frontend->get_member();
		$this->load->view('profile', $data);
	}

	// controller function to view member profile form to update.
	public function updateMemberProfile(){
		$data['user'] = $this->frontend->get_member();
		$this->load->view('updateMemberProfile', $data);
	}

	//controller function to update member profile personal details.
	public function update_profile(){
		$fname = $this->input->post('fname');
		$dob = $this->input->post('dob');
		$gender = $this->input->post('gender');
		$today = date('Y-m-d');
		if( empty($fname)){
			echo '<p class="error msgcenter">Full Name is Required.</p>';
		}else{
		
			if(empty($dob))
			{	
				$this->frontend->update_profile();
				echo '<p class="success msgcenter">Update Successfull</p>';	
				echo '
						<script>
							window.setTimeout(function() {
							location.href = "'.base_url('user-profile').'";
							}, 3000);
						</script>';
			}
			else{
				if ($dob > $today ) {
					echo '<p class="error msgcenter">Date Of Birth is in future.</p>';
				}
				else{
					$this->frontend->update_profile();
					echo '<p class="success msgcenter">Update Successfull</p>';
					echo '
						<script>
							window.setTimeout(function() {
							location.href = "'.base_url('user-profile').'";
							}, 3000);
						</script>';
				}				
			}
		}
	}
	
	// controller function to view member change password form.
	public function member_change_password()
	{	
		$data['user'] = $this->frontend->get_member();
		$this->load->view('member-change-password', $data);
	}

	//controller function to update the member password.
	public function update_member_password(){
		$id = $this->session->userdata['is_logged_in']['id'];
		$pwd = $this->input->post('password');

		$oldPwd = $this->input->post('oldpassword');
		$newPwd = $this->input->post('newpassword');
		$confirmPwd = $this->input->post('confirmpassword');
		$hasspwd = md5($oldPwd);
		// $today = date('Y-m-d');

		// Validate password strength
		$uppercase = preg_match('@[A-Z]@', $newPwd);
		$lowercase = preg_match('@[a-z]@', $newPwd);
		$number    = preg_match('@[0-9]@', $newPwd);
		$specialChars = preg_match('@[^\w]@', $newPwd);

		if( empty($oldPwd) || empty($newPwd) || empty($confirmPwd)){
			echo '<p class="error msgcenter">All Field is Required.</p>';
		}else{
				if ($pwd == $hasspwd) {
					if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newPwd) < 8) {
							echo '<p class="error msgcenter">New password must contain at least one number and one uppercase and one lowercase letter and one special character, and at least 8 or more characters</p>';

						}
						else{

							if ($newPwd != $confirmPwd ) {
										echo '<p class="error msgcenter">New and Confirm Password doesnot match.</p>';
								}
								else{
									$this->frontend->update_member_password();
									echo '<p class="success msgcenter">Update Successfull</p>';
									echo '<script>
										window.setTimeout(function() {
										location.href = "'.base_url('user-profile').'";
										}, 3000);
									</script>';
								}	
						}
				}	
				else{
					echo '<p class="error msgcenter">Invalid Password.</p>';
				}		
		}
	}
	//front controller function to view shipping address update form
	public function shipping_address(){
		$data['user'] = $this->frontend->get_member();
		$this->load->view('shipping-address', $data);
	}


		//controller function to update member profile shipping details.
	public function update_shipping(){
		$shippingFullName = $this->input->post('shippingFullName');
		$shippingPhoneNumber = $this->input->post('shippingPhoneNumber');
		$shippingCountry = $this->input->post('shippingCountry');
		$shippingCity = $this->input->post('shippingCity');
		$shippingAddress = $this->input->post('shippingAddress');
		// $today = date('Y-m-d');
		 if (preg_match('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', $shippingPhoneNumber))
        {
                $valid = 1;
        }
        else
        {
                 $valid = 0;
        }
		if( empty($shippingFullName) || empty($shippingPhoneNumber) || empty($shippingCountry) || empty($shippingCity) 
			|| empty($shippingAddress)){
			echo '<p class="error msgcenter">All Fields are Required.</p>';
		}else{		
			if($valid == 1)
			{	
				$this->frontend->update_shipping_details();
				echo '<p class="success msgcenter">Update Successfull</p>';	
				echo '<script>
							window.setTimeout(function() {
							location.href = "'.base_url('user-profile').'";
							}, 3000);
						</script>';
			}else{
				echo '<p class="error msgcenter">Phone Number is not valid. Please enter a valid phone number.</p>';
				}				
		}
	}


	public function delivery_address(){
		$data['user'] = $this->frontend->get_member();
		$this->load->view('delivery-address', $data);
	}


	public function update_delivery(){
		$shippingFullName = $this->input->post('shippingFullName');
		$shippingPhoneNumber = $this->input->post('shippingPhoneNumber');
		$shippingCountry = $this->input->post('shippingCountry');
		$shippingCity = $this->input->post('shippingCity');
		$shippingAddress = $this->input->post('shippingAddress');
		// $today = date('Y-m-d');
		 if (preg_match('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', $shippingPhoneNumber))
        {
                $valid = 1;
        }
        else
        {
                 $valid = 0;
        }
		if( empty($shippingFullName) || empty($shippingPhoneNumber) || empty($shippingCountry) || empty($shippingCity) 
			|| empty($shippingAddress)){
			echo '<p class="error msgcenter">All Fields are Required.</p>';
		}else{		
			if($valid == 1)
			{	
				$this->frontend->update_shipping_details();
				echo '<p class="success msgcenter">Update Successfull</p>';	
				echo '<script>
							window.setTimeout(function() {
							location.href = "'.base_url('checkout').'";
							}, 1000);
						</script>';
			}else{
				echo '<p class="error msgcenter">Phone Number is not valid. Please enter a valid phone number.</p>';
				}				
		}
	}



	public function order_history()
	{
		$limit = 12;
		$data['orders'] = $this->frontend->list_all_order($limit);
		$data['total'] = $this->frontend->total_order();
		
		//pagination code
		$this->load->library('pagination');
		$config['base_url'] = base_url("order-history/");
		$config['uri_segment'] = 2;
		$config['total_rows'] = $this->frontend->total_order();
		$config['per_page'] = $limit;
		//$config['first_url'] = base_url("category-list");
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
		
		$this->load->view('order-history', $data);
	}
	
	public function show_invoice_details(){
	$invoice = $this->frontend->get_invoice_details();
	?>
    <p style="text-align: center !important;">Invoice Details</p><br>
	
    <table width="100%;">
        <thead>
          <tr>
            <th>S.N.</th>
            <th>Code</th>
            <th>Items</th>
            <th>Color</th>
            <th>Size</th>
            <th>Qty</th>
			<th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
         <?php
		 $c = 0;
		 $grand_total = "";
		 foreach($invoice as $cusrow){
						$pcode = $cusrow->pcode;
						$price = $cusrow->price;
						$qty = $cusrow->qty;
						$total = $price * $qty;
						
						$coupon = $cusrow->coupon;
						$dc = $cusrow->discount;
						if(empty($dc)){
							$discount = '0.00';
						}else{
							$discount = $dc.' %';
						}
						$grand_total = $total + $grand_total;
		?>
          <tr>
            <td><?php echo ++$c; ?></td>
            <td><?php echo $cusrow->pcode; ?></td>
            <td><?php echo $cusrow->items; ?></td>
            <td><?php echo $cusrow->color; ?></td>
            <td><?php echo $cusrow->size; ?></td>
            <td><?php echo $cusrow->qty; ?></td>
			<td>NPR <?php echo number_format($cusrow->price); ?></td>
            <td>NPR <?php echo number_format($total); ?></td>
          </tr>
          <?php } ?>
          
          <tr>
            <td colspan="6" rowspan="3"><strong>Invoice No:</strong> <?php echo $cusrow->invoice_no; ?>
        <p>
        <?php if(!empty($coupon)){?>
            Voucher Code: <?php echo $coupon; ?><br>
       
        <?php if(!empty($discount)){?>
            Discount: <?php echo $discount; ?>
			<?php }} ?>
        </p></td>
			<td>Total</td>
			<td colspan="2">NPR <?php echo number_format($grand_total); ?></td>
          </tr>
			
		  <tr>
		  	<td>Discount</td>
		    <td colspan="2"><?php echo $discount; ?></td>
		  </tr>
		  
		  <tr>
			  <td>Grand Total</td>
			  <td colspan="2"><strong>NPR <?php $vd = ($grand_total / 100) * $dc; echo number_format($grand_total - $vd); ?></strong></td>
		  </tr>
        </tbody>
      </table><br />
      <div align="right"><input name="back" type="button" id="back" value="Go Back" class="btn back" style="padding-left: 10px; padding-right: 10px;"></div>
    <?php
	}
	
	public function contact()
	{
		$this->load->library('recaptcha');
		$fname = $this->input->post('fname');
		if($fname){
			// Catch the user's answer
			$captcha_answer = $this->input->post('g-recaptcha-response');

			// Verify user's answer
			$response = $this->recaptcha->verifyResponse($captcha_answer);

			// Processing ...
			if ($response['success']) {
				$check = $this->frontend->send_contact();
				if($check == 'success'){
					$data['msg'] = '<p class="success msgcenter">Message Sent Successfully</p>';
				}
				else{
					$data['msg'] = '<p class="error msgcenter">Message Sent Failed</p>';
				}
			} else {
				// Something goes wrong
				$data['msg'] = '<p style="color:red;">Message Sent Failed. Invalid Captcha</p><br>';
				//var_dump($response);
			}
		}
		
		$data['title'] = $this->frontend->get_cms_part('Contact Us', 'page_title');
		$data['shortdesc'] = $this->frontend->get_cms_part('Contact Us', 'description');
		$data['simg'] = $this->frontend->get_cms_part('Contact Us', 'attachment1');
		$this->load->view('contact', $data);
	}
	
	public function common()
	{
		$url = $this->uri->segment(1);
		switch($url){
			case "about-us": $page = 'About Us'; break;
			case "terms-conditions": $page = 'Terms & Conditions'; break;
			case "delivery-policy": $page = 'Delivery Policy'; break;
		}
		$data['pagetitle'] = $this->frontend->get_cms_part($page, 'page_title');
		$data['img'] = $this->frontend->get_cms_part($page, 'attachment1');
		$data['desc'] = $this->frontend->get_cms_part($page, 'description');
		$this->load->view('common', $data);
	}
	
	public function process_subscription()
	{
		$email = $this->input->post('email');
		
		if(empty($email)){
			echo '<p class="smsg-error">Email is required</p>';
		}else{
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{	
				$check = $this->frontend->check_subscriber();
				
				if($check == 1)
				{
					echo '<p class="smsg-error">Email Already exists please try a different email</p>';
				}
				else
					{
						$this->frontend->insert_subscriber();
						echo '<p class="smsg-success">Request Successfull</p>';
						$this->frontend->send_subscription_email();
				}
			}else{
				echo '<p class="smsg-error">Invalid Email Address!</p>';
			}
		}
	}
	
	public function clear_coupon(){
		$this->frontend->clear_coupon();
		echo '<p class="success">Update Successfull</p>';
	}
	
	public function payment(){
		$this->load->view('payment');
	}
}