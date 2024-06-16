<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'front';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ------------ User Account ------------ //

$route['wpanel'] = "gateway";
$route['checking'] = "gateway/logg_in";
$route['logout'] = "gateway/logout";
$route['forgot-password'] = "gateway/forgot_password";
$route['checking-forgot-password'] = "gateway/get_new_password";

// ------------ User Account ------------ //

$firstSegment = $this->uri->segment(1);
$route[$firstSegment.'/:num'] = $firstSegment;

// ------------ Front ------------ //
$route['about'] = 'front/about';

$route['categories'] = 'front/categories';
$route['categories/:any'] = 'front/products';
$route['categories/:any/:num'] = 'front/products';

$route['categories/:featured'] = 'front/products';
$route['categories/:featured/:num'] = 'front/products';

$route['price/:any'] = 'front/products';
$route['price/:any/:num'] = 'front/products';

$route['sort/:any'] = 'front/products';
$route['sort/:any/:num'] = 'front/products';

$route['men/:any'] = 'front/products';
$route['men/:any/:num'] = 'front/products';

$route['women/:any'] = 'front/products';
$route['women/:any/:num'] = 'front/products';

$route['bags/:any'] = 'front/products';
$route['bags/:any/:num'] = 'front/products';

$route['search/:any'] = 'front/products';
$route['search/:any/:num'] = 'front/products';

$route['product-details/:any'] = 'front/product_details';

$route['cart'] = 'front/cart';
$route['checkout'] = 'front/checkout';
$route['checkout-guest'] = 'front/checkout_guest';
$route['login'] = 'front/login';
$route['register'] = 'front/register';
$route['user-profile'] = 'front/profile';
$route['update-profile'] = 'front/updateMemberProfile';
$route['change-password'] = 'front/member_change_password';
$route['shipping-address'] = 'front/shipping_address';
$route['delivery-address'] = 'front/delivery_address';
$route['order-history'] = 'front/order_history';
$route['order-history/:num'] = 'front/order_history';
$route['user-logout'] = 'front/logout';
$route['payment'] = 'front/payment';
$route['make-a-payment'] = 'front/make_payment';
$route['user/forgot-password'] = "front/forgot_password";

$route['contact-us'] = 'front/contact';

$route['about-us'] = 'front/common';
$route['terms-conditions'] = 'front/common';
$route['delivery-policy'] = 'front/common';

$route['payment'] = 'front/payment';

// ------------ Front ------------ //