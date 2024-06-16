<?php $url = $this->uri->segment(1); ?>
<div class="col-md-2 sidebar-menu">
	<div id="jquery-accordion-menu" class="jquery-accordion-menu white">
            <ul id="demo-list">
                
                <li <?php if($url == "products" || $url == "wpcategories"){echo "class='active'";} ?>><a href="#"><i class="fa fa-bars" aria-hidden="true"></i>Products</a>
                    <ul class="submenu">
                    	<li>
                            <a href="<?php echo base_url("products"); ?>"><i class="fa fa-product-hunt" aria-hidden="true"></i>All Products</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url("wpcategories"); ?>"><i class="fa fa-crosshairs" aria-hidden="true"></i>Categories</a>
                        </li>
                    </ul>
                </li>
                
                <li <?php if($url == "banner"){echo "class='active'";} ?>>
                	<a href="<?php echo base_url('banner'); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Manage Banner</a>
                </li>
                
                <li <?php if($url == "cms"){echo "class='active'";} ?>>
                	<a href="<?php echo base_url("cms"); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Content Management</a>
                </li>
                
                <li <?php if($this->uri->segment(1) == "members"){echo "class='active'";} ?>>
                	<a href="<?php echo base_url("members"); ?>">
                    	<i class="fa fa-group" aria-hidden="true"></i>Members
                    </a>
                </li>
                
                <li <?php if($this->uri->segment(1) == "orders"){echo "class='active'";} ?>>
                	<a href="<?php echo base_url("orders"); ?>">
                    	<i class="fa fa-shopping-cart" aria-hidden="true"></i>Orders
                    </a>
                </li>
                
                <li <?php if($this->uri->segment(1) == "coupon"){echo "class='active'";} ?>>
                	<a href="<?php echo base_url("coupon"); ?>">
                    	<i class="fa fa-gift" aria-hidden="true"></i>Coupon
                    </a>
                </li>
                
                <li <?php if($url == "subscribe"){echo "class='active'";} ?>>
                	<a href="<?php echo base_url("subscribe"); ?>">
                    	<i class="fa fa-heart-o" aria-hidden="true"></i>Subscription
                    </a>
                </li>
                
            </ul>
	</div>
</div>