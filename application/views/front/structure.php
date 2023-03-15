<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<title><?PHP echo @$meta['title']?></title>

		<meta name="description" content="<?PHP echo @$meta['description']?>" />

		<meta name="keywords" content="<?PHP echo @$meta['keywords']?>" />

		<link href="<?PHP echo base_url()?>css/reset.css" rel="stylesheet" type="text/css" />

		<link href="<?PHP echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />

		<link href="<?PHP echo base_url()?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />

		<link href="<?PHP echo base_url()?>css/global-y.css" rel="stylesheet" type="text/css" />

		<link href="<?PHP echo base_url()?>css/global.css" rel="stylesheet" type="text/css" />

		<link href="<?PHP echo base_url()?>css/global-m.css" rel="stylesheet" type="text/css" />

		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>js/jquery/jquery-ui-1.8.10.custom.css"/>

		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/calendar.css"/>

		<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery-1.7.1.min.js"></script>

		<script src="<?php echo base_url()?>js/jquery/jquery.simplemodal.js" type="text/javascript"></script>

		<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery-ui.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url()?>js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

		<script type="text/javascript" src="<?php echo base_url()?>js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

		<script type="text/javascript" src="<?php echo base_url()?>js/front.js"></script>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

   		<link rel="stylesheet" href="<?php echo base_url()?>css/validationEngine.jquery.css" type="text/css"/>

		<script src="<?php echo base_url()?>js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>

		<script src="<?php echo base_url()?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
		<!--
		<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/tiny_mce.js"></script>
	    <script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/init_tiny.js"></script>
	    -->

	</head>

	<body>

		<div id="gray_bak" style="display:none; position:absolute; margin: auto; top: 0; left: 0; width: 100%; height: 100%; z-index: 9;background-color: #7f7f7f; opacity:0.7; filter: alpha(opacity=70);overflow:auto" onclick="closePP();">&nbsp;</div>

        <div id="content" style="display:none">
			<div id="basic-modal-content" style="display:none;padding:8px; "></div>
		</div>

		<div id="basic-modal-content" style="display:none;padding:8px; "></div>

		<div style="display:none">

			<div id="modal_message"><?PHP echo $this->session->flashdata('message');?></div>

			<div id="modal_message1"><?PHP echo @$message?></div>

			<a id="message_pp" href="<?PHP echo $this->session->flashdata('url');?>">View Message</a>

			<a id="confirm_pp" href="<?PHP echo $this->session->flashdata('url');?>">View Message</a>

		</div>
		<div id="wrapper" class="<?=isset($Wapper_calss) ? $Wapper_calss : '';?>">
			<div class="popup-mask" style="display:none; height:110%">&nbsp;</div>
			<?PHP echo $this->load->view('front/header');?>

			<?PHP echo $this->load->view($body);?>
			<div id="push"></div>

		</div>	<!-- end wrapper -->
		<?PHP echo $this->load->view('front/footer');?>

		<?php
		$msg = $this->session->flashdata('message');

		if($msg){?>

		<script type="text/javascript">

		$(document).ready(function(){

			show_popup_message('Alert',$('#modal_message').html());

		});

		</script>

		<?php } if(isset($message)){?>

			<script type="text/javascript">

			$(document).ready(function(){

				show_popup_message('Alert',$('#modal_message1').html());

			});

			</script>

		<?php } $message_pp = $this->session->flashdata('message_pp');

			if($message_pp){

				$temp = explode('|',$message_pp);

				$msg = $temp[0];

				$title = '';

				if(isset($temp[1])){

					$title = $temp[1];

				}?>

		<script type="text/javascript">

		$(document).ready(function(){

			show_popup_message('<?PHP echo @$title?>','<?PHP echo str_replace("\n",'',$msg)?>');

		});

		</script>

		<?php	}  ?>
		<script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
		<script>

		$('.tooltp span').tooltip('show');

		</script>
	</body>

</html>
