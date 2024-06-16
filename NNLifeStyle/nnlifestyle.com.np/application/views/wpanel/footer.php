</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-accordion-menu.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/notify/pnotify.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/notify/pnotify.nonblock.js"></script>

<?php echo media_manager('yes'); ?>

<!-- jQuery -->
<script>
$(document).ready(function(e) {
	$('[data-toggle="tooltip"]').tooltip();
	$("#jquery-accordion-menu").jqueryAccordionMenu();
	$('#demo-list .active').children('.submenu').slideDown();
	$('#demo-list .active').find('span').addClass('submenu-indicator-open');
});
</script>
<!-- jQuery -->

</body>
</html>