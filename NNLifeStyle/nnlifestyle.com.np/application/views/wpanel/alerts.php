<a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	<i class="fa fa-bell" aria-hidden="true"></i> Alert <span class="badge">
		<?php 
		$hostingcount = count($exc); 
		$domaincount = count($exd);
		echo $hostingcount + $domaincount;
		?>
    </span>
</a>
<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <div class="dropdown-header">Hosting Alerts</div>
        <div class="drop-content" id="hosting-alerts">
            <a>
                <h5>
				<?php 
				echo count($exc);
				if(count($exc) > 1){ ?> 
                Accounts has been Expired
                <?php }else { ?>
                Account has been Expired
                <?php } ?>
                </h5>
            </a>
        </div>
    <div role="separator" class="divider"></div>
    
    <div class="dropdown-header">Domain Alerts</div>
        <div class="drop-content" id="domain-alerts">
            <a>
                <h5>
				<?php 
				echo count($exd);
				if(count($exd) > 1){ ?> 
                Domains has been Expired
                <?php }else { ?>
                Domain has been Expired
                <?php } ?>
                </h5>
            </a>
        </div>
    <div role="separator" class="divider"></div>
</div>