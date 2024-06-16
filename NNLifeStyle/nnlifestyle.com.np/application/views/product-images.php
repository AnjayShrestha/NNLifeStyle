<div class="thumbnails col-md-3 nopadding">
                	<?php
					$sc = $this->input->post('color');
					if(empty($sc)){
						$scolors = $colors[0];
					}else{
						$scolors = $sc;
					}
	
					$cdata = array('color' => $scolors, 'prod_id' => $this->input->post('pid'));
					$this->db->where($cdata);
					$query = $this->db->get('product_images');
					foreach($query->result() as $pirow){
						$at1 = $pirow->attachment1;
						$at2 = $pirow->attachment2; 
						$at3 = $pirow->attachment3; 
						$at4 = $pirow->attachment4; 
					}
								  
					if(!empty($at1)){?>
                	<div class="col-md-12 col-xs-6">
                    	<div class="thumbox">
                            <a href="<?php echo str_replace('/medium/', '/', $at1); ?>" class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo $at1; ?>'">
                            <div style="background-image:url(<?php echo str_replace('medium', 'thumbs', $at1); ?>);" class="thumbpic"></div>
                            </a> 
                        </div>
                    </div>
                    <?php } if(!empty($at2)){?>
                    <div class="col-md-12 col-xs-6">
                    	<div class="thumbox">
                            <a href="<?php echo str_replace('/medium/', '/', $at2); ?>" class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo $at2; ?>'">
                            <div style="background-image:url(<?php echo str_replace('medium', 'thumbs', $at2); ?>);" class="thumbpic"></div>
                            </a>
                        </div>
                    </div>
                    <?php } if(!empty($at3)){?>
                    
                    <div class="col-md-12 col-xs-6">
                    	<div class="thumbox">
                            <a href="<?php echo str_replace('/medium/', '/', $at3); ?>" class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo $at3; ?>'">
                            <div style="background-image:url(<?php echo str_replace('medium', 'thumbs', $at3); ?>);" class="thumbpic"></div>
                            </a> 
                        </div>
                    </div>
                    
                    <?php } if(!empty($at4)){?>
                    <div class="col-md-12 col-xs-6">
                    	<div class="thumbox">
                            <a href="<?php echo str_replace('/medium/', '/', $at4); ?>" class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo $at4; ?>'">
                            <div style="background-image:url(<?php echo str_replace('medium', 'thumbs', $at4); ?>);" class="thumbpic"></div>
                            </a> 
                        </div>
                    </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
                
               
              <div class="col-md-9">
              		<?php if(!empty($at1)){?>
					<div class="leftsection">
						<div class="zoom-section">    	  
						  <div class="zoom-small-image">
							<a href="<?php echo str_replace('/medium/', '/', $at1); ?>" class = 'cloud-zoom' id='zoom1' >
								<img src="<?php echo $at1; ?>">
							</a>
						  </div>
						</div>
					</div>

				<p class="zoomerinfo">Move your mouse over image or click to enlarge</p>
              	<?php } ?>
               	</div>