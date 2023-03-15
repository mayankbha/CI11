<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>Welcome to Our Site!</title>
		
		<link href="<?=base_url()?>css/admin/reset.css" rel="stylesheet" type="text/css" />
		
		<link href="<?=base_url()?>css/admin/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<link href="<?=base_url()?>css/admin/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
		
		<link href="<?=base_url()?>css/admin/global.css" rel="stylesheet" type="text/css" />
		
		<link href="<?=base_url()?>css/admin/global-y.css" rel="stylesheet" type="text/css" />
		
		<link href="<?=base_url()?>css/admin/global-m.css" rel="stylesheet" type="text/css" />

		<!-- HTML5 shim for IE backwards compatibility -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
         <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
         <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
         <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        
		<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>images/admin/favicon.ico" />
		
		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>js/jquery/jquery-ui-1.8.10.custom.css">
		
		<script src="<?php echo base_url()?>js/jquery/jquery-1.7.1.min.js"></script>
		
        <script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/tiny_mce.js"></script>
	    <script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/init_tiny.js"></script>
        
		<script src="<?php echo base_url()?>js/jquery/jquery.simplemodal.js" type="text/javascript"></script>	
		
		<script src="<?php echo base_url()?>js/jquery/jquery-ui-1.8.10.custom.min.js"></script>
		
		<script src="<?php echo base_url()?>js/admin.js" type="text/javascript" ></script>
		
		<script type="text/javascript" src="<?php echo base_url()?>js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url()?>js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
		
		<script src="<?php echo base_url()?>js/admin.js" type="text/javascript"></script>
		
		<script type='text/javascript' src='<?php echo base_url()?>js/osx/osx.js'></script>
		
		<link type='text/css' href='<?php echo base_url()?>js/osx/osx.css' rel='stylesheet' media='screen' />
		
		<script language="javascript"> var base_url = '<?=base_url();?>';</script>
		
	</head>
	
	<body>
		
		<div id="modal_message"><?PHP echo $this->session->flashdata('message');?></div>
		
		<div id="wrapper">
			<div class="popup-mask" style="display:none"></div>
		  <!-- header starts here -->
		  <?php $this->load->view('admin/header');?>
		  <!-- header ends here -->
		
		  <!--content-->
		  <?php $this->load->view($body);?>
		  <div id="push"></div> 			 
		  <!--/content-->
		</div>
		  <!--footer-->
		  <?php $this->load->view('admin/footer');?>
			<!-- footer ends here -->
		
		<?php 	
			$msg = $this->session->flashdata('message'); 
			if($msg){
		?>
			<script type="text/javascript">
				$('#modal_message').dialog({
						modal: true
				});
			</script>
		<?php } ?>
		<script src="<?=base_url();?>js/bootstrap.min.js" type="text/javascript"></script>
		
		<script src="<?=base_url();?>js/scripts.js" type="text/javascript"></script>
	</body>
</html>
