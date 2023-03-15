<header>

	<div class="container">
	
		<div class="row">
		
			<div class="span12">
			
				<div id="logo"><a href="#"><img src="<?=base_url();?>images/logo.png" alt="Scinected" title="Scinected"></a></div>
				<?PHP if(isset($logedin) && $logedin=='yes') { ?>
				 <div id="admin-area"> <span>Welcome, <?php echo $this->session->userdata('first_name')?></span> | <a href="<?php  echo site_url('/manager/logout'); ?>">LOGOUT</a> </div>
				 <?PHP } ?>
			</div>
		
		</div>
	
	</div>

</header>