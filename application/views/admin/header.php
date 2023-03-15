<header>

	<div class="container">
	
		<div class="row">
		
			<div class="span12">
			
			<div id="logo"><a href="<?php echo base_url()?>"><img src="<?=base_url();?>images/admin/logo.png" alt="Sortie" title="Sortie"></a></div>
				<?PHP if ($this->session->userdata('admin_id')==FALSE) { ?>
					<div id="admin-area"><span>Administrator Area</span></div>
				<?PHP } else { ?> 
				 	<div id="admin-area"><span>Administrator Area</span> | <a href="<?=site_url('admin/logout/log_out');?>">Logout</a></div>
				<?PHP } ?>	
			</div>
		
		</div>
	
	</div>

</header>

<?PHP if(isset($display_menu) && $display_menu=="yes") { $this->load->view('admin/menu');  }?>  