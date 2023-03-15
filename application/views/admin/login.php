<div id="page-body">

<div class="container">

<div class="row">
<div class="heading_cont clearfix">

<h2><span>Admin Login</span></h2>

</div>	<!-- end header cont -->
</div>

<div class="row-fluid">
<div class="admin-form">

<div class="span4 margin-auto">
    <form class="form-inline" action="<?PHP echo site_url('admin/login/index')?>" method="post">
	<?PHP if(form_error('username')) { ?> <p><?=form_error('username');?></p><?php } ?>
    <div class="control-group">
    <div class="controls">
    <input type="text" name="username" id="username" placeholder="Email" class="input-block-level" value="<?=set_value('username');?>">
    </div>
    </div>
	<?PHP if(form_error('password')) {  echo '<p>'.form_error('password').'</p>'; }?>  
    <div class="control-group">
    <div class="controls">
    <input type="password" name="password" id="password" placeholder="Password" class="input-block-level">
    </div>
    </div>
    <div class="control-group text-center">
    <div class="controls">
    <button type="submit" class="btn">Login</button> <button type="reset" class="btn">Cancel</button>
    </div>
    </div>
    
    <div class="control-group text-center">
    <div class="controls">
    <a href="<?=site_url('admin/forgot')?>" class="forgot-link">Forgot Password?</a>
    </div>
    </div>
    </form>

</div></div>

</div>

<!-- end form container -->

</div>

</div>

