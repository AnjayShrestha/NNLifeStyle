<div class="placeholder"></div>

<!-- container -->
<div class="container-fluid">

	<!-- row -->
	<div class="row">
    	
        <div class="col-md-10 col-md-offset-2">
        	
            <!-- dashboard_graph -->
            
            <div class="content">
            	<!-- page-title -->
                <div class="page-title">
                        <div class="col-md-8 page-title-left">
                            <h3><?php echo $title; ?></h3>
                        </div>
                        
                        <div class="col-md-4">
                        	<h3>Change Password</h3>
                        </div>
                  </div>
                  <!-- page-title -->
                
                
                <div class="clearfix"></div>
            	<form method="post" class="dprofile">
            	<?php foreach($data as $row){ ?>
            	<div class="col-md-8">
						<input name="attachment1" type="hidden" id="attachment1" value='<?php echo $row->attachment1; ?>'>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input name="fullname" type="text" id="fullname" class="form-control" placeholder="Full Name" value="<?php echo $row->fullname; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<input name="email" type="text" id="email" class="form-control" placeholder="Email Address" value="<?php echo $row->email; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<input name="phone" type="text" id="phone" class="form-control" placeholder="Phone Number" value="<?php echo $row->phone; ?>">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input name="opening_hours" type="text" id="opening_hours" class="form-control" placeholder="Opening Hours" value="<?php echo $row->opening_hours; ?>">
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group" style="margin-bottom: 0;">
									<textarea name="address" id="address" class="form-control" placeholder="Address"><?php echo $row->address; ?></textarea>
								</div>
							</div>
							
							<div class="col-md-12">
								<h3>Social Media</h3>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input name="facebook" type="text" id="facebook" class="form-control" placeholder="Facebook" value="<?php echo $row->facebook; ?>">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input name="instagram" type="text" id="instagram" class="form-control" placeholder="Instagram" value="<?php echo $row->instagram; ?>">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input name="youtube" type="text" id="youtube" class="form-control" placeholder="Youtube" value="<?php echo $row->youtube; ?>">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input name="viber" type="text" id="viber" class="form-control" placeholder="Viber" value="<?php echo $row->viber; ?>">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input name="whatsapp" type="text" id="whatsapp" class="form-control" placeholder="Whatsapp" value="<?php echo $row->whatsapp; ?>">
								</div>
							</div>

						</div>
            	</div>
            	<!-- left -->
            	
            	<div class="col-md-4">
            		<div class="form-group">
            			<input name="show_password" type="hidden" id="show_password" class="form-control" placeholder="Old Password" value="<?php echo $row->show_password; ?>">
						<input name="oldpassword" type="password" id="oldpassword" class="form-control" placeholder="Old Password">
					</div>
           		
            		<div class="form-group">
						<input name="password" type="password" id="password" class="form-control" placeholder="New Password">
					</div>

					<div class="form-group">
						<input name="confirm_password" type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" >
					</div>

					<div class="form-group">
						<div id="pass-info"></div>
					</div>
           			
           			<h3>Profile Image</h3>
           			
           			<div class="fileUpload">
									<div class="form-group">
										<?php if($row->attachment1 == ""){?>


										<div class="noImage thumbnail mediaUpload1" data-index="1">
											<div class="noImage-content"><i class="fa fa-picture-o" aria-hidden="true"></i><p>Add Image</p></div>

										</div>
										<div class="imgContainer1"></div>
										<?php }else{ ?>
											<div class="noImage thumbnail mediaUpload1" style="display:none;" data-index="1">
												<div class="noImage-content"><i class="fa fa-picture-o" aria-hidden="true"></i><p>Add Image</p></div>

											</div>
											<div class="imgContainer1">
												<div class="ic">
													<div style="width:100%; height:160px; background:url(<?php echo $row->attachment1; ?>); background-repeat:no-repeat; background-position:center center; background-size:cover; cursor:pointer; position:relative;"><p class="rFile" data-rm="1">remove file</p></div>
												</div>
											</div>
										<?php } ?>

									</div>
								</div>
           	
           						<div class="form-group"><br>
           							<a class="btn btn-success saveProfile">Update</a>	
           						</div>
            	</div>
            	<!-- right -->
            	
            	</form>
				<?php } ?>
            </div>
            
            <!-- dashboard_graph -->
            
        </div>
        
    </div>
    <!-- row -->

</div>
<!-- container -->

<script type="text/javascript" src="<?php echo base_url(); ?>editor/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	passwordStrengthCheck(); //call password check function
});
	
CKEDITOR.replace( 'address',
{
	baseFloatZIndex : 1E5,
	height: '120px',
	toolbar :[]
});

function passwordStrengthCheck()
{
	//Must contain 5 characters or more
	var WeakPass = /(?=.{5,}).*/; 
	//Must contain lower case letters and at least one digit.
	var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 
	//Must contain at least one upper case letter, one lower case letter and one digit.
	var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 
	//Must contain at least one upper case letter, one lower case letter and one digit.
	var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{5,}$/; 
	
	$(document).on('keyup', '#password', function(e){
		if(VryStrongPass.test($('#password').val()))
		{
			$('#pass-info').removeClass().addClass('vrystrongpass').html("Very Strong! (please don't forget your password!)");
		}	
		else if(StrongPass.test($('#password').val()))
		{
			$('#pass-info').removeClass().addClass('strongpass').html("Strong! (Enter special chars to make even stronger");
		}	
		else if(MediumPass.test($('#password').val()))
		{
			$('#pass-info').removeClass().addClass('goodpass').html("Good! (Enter uppercase letter to make strong)");
		}
		else if(WeakPass.test($('#password').val()))
    	{
			$('#pass-info').removeClass().addClass('stillweakpass').html("Still Weak! (Enter digits to make good password)");
    	}
		else
		{
			$('#pass-info').removeClass().addClass('weakpass').html("Very Weak! (Must be 5 or more chars)");
		}
	});
	
	$(document).on('keyup', '#oldpassword', function(e){
		if($('#oldpassword').val() !== $('#show_password').val())
		{
			$('#pass-info').removeClass().addClass('weakpass').html("Incorrect Old Password!");	
		}else{
			$('#pass-info').removeClass().addClass('goodpass').html("Old Password Verified!");	
		}
			
	});
	
	$(document).on('keyup', '#confirm_password', function(e){
		if($('#password').val() !== $('#confirm_password').val())
		{
			$('#pass-info').removeClass().addClass('weakpass').html("Passwords do not match!");	
		}else{
			$('#pass-info').removeClass().addClass('goodpass').html("Passwords match!");	
		}
			
	});
}
	
$(document).on('click', '.saveProfile', function(e){
	for ( instance in CKEDITOR.instances ) {
		CKEDITOR.instances[instance].updateElement();
	}
	var dataString = $('.dprofile').serialize();
	$.ajax({
			type: "POST",
			url: "<?php echo base_url('profile/save_profile'); ?>",
			data: dataString,
			beforeSend: function(){
				$('.page-header h4 span').html("<i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>");
			},
			success: function(data)
			{
				$('#oldpassword').val('');
				$('#password').val('');
				$('#confirm_password').val('');
				//$('#pass-info').css('vi', 'none');
				var obj = JSON.parse(data);
				var err = obj.error;
				new PNotify({
								title: obj.title,
								text: obj.msg,
								type: obj.type,
								nonblock: {nonblock: true, nonblock_opacity: .2}
							});
				$(".header").load('<?php echo base_url('profile'); ?> .header');
				//$(".bcontent").load('</?php echo base_url('profile'); ?> .bcontent');
			}
	});
	e.stopImmediatePropagation();
});
</script>