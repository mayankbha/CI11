<!--validate-->
<script type="text/javascript">
$(window).load(function () {
    $('#username').change(function() {
    	$("#user_err").hide();
    	$("#pass_err").hide();
		var username = $("#username").val();
		var html = $.ajax({
		type: "POST",
		url: "<?php echo base_url()?>home/username_validate",
		data: ({
		'username' : username
		}),
		dataType: "html",
		async: false
		}).responseText;
		$("#result").empty().append(html);
	});
	
	 $('#password').change(function() {
	 	$("#pass_err").hide();
		var password = $("#password").val();
		var html = $.ajax({
		type: "POST",
		url: "<?php echo base_url()?>home/password_validate",
		data: ({
		'password' : password
		}),
		dataType: "html",
		async: false
		}).responseText;
		$("#result2").empty().append(html);
	});
});
</script>
<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'size'	=> 50,
	'value' =>  set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 50,
	'value' =>  set_value('password')
);
?>
    
<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="ymp_inner">

<div class="heading_cont clearfix">

<h2><span>Log In</span></h2>

</div>	<!-- end header cont -->



<div class="inner_content">

<?=$content;?>


<div class="login_box row-fluid">
    <form  action="<?PHP echo site_url('home')?>" method="post">
    <?PHP if(form_error('username')) {  echo form_error('username', '<p id="user_err" style="color:red;">', '</p>');  }?>
    <p id="result" class="error" style="color:red;"></p> 
    <p><input type="text" placeholder="User Name" value="" name="username" id="username" class="input-block-level" >
      <span><img src="<?=base_url();?>images/profile_icon.png" alt=" "  style="margin-top:5px;"></span></p>
    <?PHP if(form_error('password')) {  echo form_error('password', '<p id="pass_err" style="color:red;">', '</p>');  }?>
    <p id="result2" class="error" style="color:red;"></p> 
    <p><input type="password" placeholder="Password" value="" name="password" id="password" class="input-block-level" style="padding: 4px 35px;"><span><img src="<?=base_url();?>images/lock_icon.png" alt=" " style="margin-top:5px;"></span></p>
    
    <p class="text-center"><button type="submit" class="btn">Login</button></p>
    
    <p class="text-center"><a href="<?php echo site_url('home/forgotpassword');?>">Forgot Password?</a></p>
    
    </form>
</div>

</div><!-- end inner container -->

</div>
<!--end ymp innder for left right padding-->


</div>

</div>

</div>

</div>

