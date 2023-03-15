<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span10 margin-auto">
          <div class="heading_cont clearfix">
            <h2><span>Admin <?=($edit == 'edit') ? 'Edit User' : 'Add New User';?></span></h2>
          </div>
          <!-- end header cont -->
          
          <div class="row-fluid">
            <div class="span6 margin-auto">
              <form class="form-inline" action="<?=site_url('admin/users/save/'.$user_id);?>" method="post">
			  	<?PHP if (form_error('first_name')) { ?><div> <?php echo form_error('first_name'); ?></div><?PHP } ?>
                <div class="control-group">
                  <label class="control-label" for="inputFirstName" style="cursor:default">First Name:</label>
                  <div class="controls">
				  <input type="text" name="first_name" id="first_name" class="input-block-level" placeholder="First Name" value="<?php echo set_value('first_name', ($edit == 'edit') ? $user['first_name'] : ''); ?>">
                    
                  </div>
                </div>
				<?PHP if (form_error('last_name')) { ?><div> <?php echo form_error('last_name'); ?></div><?PHP } ?>	
                <div class="control-group">
                  <label class="control-label" for="inputLastName" style="cursor:default">Last Name:</label>
                  <div class="controls">
                   	<input type="text" name="last_name" id="last_name" class="input-block-level" placeholder="Last Name" value="<?php echo set_value('last_name', ($edit == 'edit') ? $user['last_name'] : ''); ?>">
                  </div>
                </div>
				<?PHP if (form_error('email')) { ?><div> <?php echo form_error('email'); ?></div><?PHP } ?>
                <div class="control-group">
                  <label class="control-label" for="inputEmail" style="cursor:default">Email:</label>
                  <div class="controls">
                     <input type="text" name="email" id="email" class="input-block-level" placeholder="Email" value="<?php echo set_value('email', ($edit == 'edit') ? $user['email'] : ''); ?>">
                  </div>
                </div>
				 <?PHP if (form_error('password')) { ?><div> <?php echo form_error('password'); ?></div><?PHP } ?>
                <div class="control-group">
                  <label class="control-label" for="inputPassword" style="cursor:default">Password:</label>
                  <div class="controls">
                    <input type="password" id="password" name="password" placeholder="Password" tabindex="3" class="input-block-level">
                  </div>
                </div>
				<?PHP if (form_error('confirm')) { ?><div> <?php echo form_error('confirm'); ?></div><?PHP } ?>
                <div class="control-group">
                  <label class="control-label" for="inputConfirmPassword" style="cursor:default">Confirm Password:</label>
                  <div class="controls">
                    <input type="password" id="confirm"  name="confirm" placeholder="Password" tabindex="4" class="input-block-level">
                  </div>
                </div>
                <div class="control-group text-center clearfix">
                  <div class="controls">
                    <label class="checkbox pull-left" style="cursor:default">
                      <input type="checkbox" id="active"  name="active" value="1" <?=(isset($user['active']) && $user['active']==1) ? 'checked="checked"' : '' ;?>>
                      Active </label>
                    <button type="submit" class="btn">Save</button>
                    <button type="button" class="btn" id="btn_cancel">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end form container --> 
      
    </div>
  </div>
<script type="text/javascript">  
    $("#btn_cancel").click(function(){
        var   url = "<?php echo site_url('admin/users') ?>";
        //  $(window.location).attr('href', url); 
        window.location.href=url;
    });
	$("#first_name").focus();
</script>		