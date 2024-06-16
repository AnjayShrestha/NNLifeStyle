<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo BASENAME; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" type="image/x-icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/jquery-accordion-menu.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/layout.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/ajax.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
</head>

<body>
<?php
$userPic = $this->session->userdata['is_logged_in']['attachment1'];
$userName = $this->session->userdata['is_logged_in']['fullname'];
$userEmail = $this->session->userdata['is_logged_in']['email'];
$url = $this->uri->segment(1);
if($url == 'subscribe' || $url == 'orders' || $url == 'comments'){
	$sclass = 'right:15px !important';
}else{
	$sclass = '';
}
if($url != 'dashboard' && $url != 'cms' && $url != 'profile'){
?>
<div class="container">
    <div class="col-md-3 search" style="<?php echo $sclass; ?>">
        <div class="input-group">
            <input name="msearch" type="search" class="form-control msearch" id="msearch" placeholder="Search" value="<?php echo $this->input->post('search'); ?>">
            <div class="input-group-btn">
                <button class="btn btn-default">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php } ?>

<div class="bcontent">
<div class="header">

	<!-- container -->
    <div class="container-fluid">
    
    	<!-- row -->
        <div class="row">
        	<!-- left -->
            <div class="col-md-2 hleft">
                <h1><i class="fa fa-bolt" aria-hidden="true"></i> Admin Panel</h1>
                <span>Solution for user interfaces</span>
            </div>
            <!-- left -->
            
            <!-- right -->
            <div class="col-md-10 hright">
            	<div class="col-md-6">
                	<div class="profile-img">
                            <div class="upic img-circle" style="background-image:url(<?php echo $userPic; ?>);"></div>
                            <span><?php echo $userName; ?></span>
                    </div>
                </div>
                
            	<div class="col-md-6">
                    <ul class="text-right">
                      <li class="dropdown">
                        	<button class="dropdown-toggle tooltip-button" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Logout" onClick="location.href='<?php echo base_url("dashboard"); ?>'">Dashboard</button>
                        </li>
                        
                        <li class="dropdown user-menu"><button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Settings"><i class="fa fa-sliders" aria-hidden="true"></i></button>
                        	<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu4">
                            	<li class="user-header"><br>
                                    <div class="ubpic img-circle" style="background-image:url(<?php echo $userPic; ?>);"></div>
                                    <p>
                                      <?php echo $userName; ?>
                                      <small><?php echo $userEmail; ?></small>
                                    </p>
                            	</li>
                              
                              <li class="user-footer">
                                <div class="col-md-8 col-md-offset-2">
                                  <a href="<?php echo base_url('profile'); ?>" class="btn btn-default btn-block profile">Profile</a>
                                </div>
                              </li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                        	<button class="dropdown-toggle tooltip-button" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Logout" onClick="location.href='<?php echo base_url('logout'); ?>'"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- right -->
            <div class="clearfix"></div>
        </div>
        <!-- row -->
    
    </div>
    <!-- container -->
    
</div>
<!-- header -->