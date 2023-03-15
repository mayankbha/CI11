<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="heading_cont clearfix">
          <h2><span>Admin Forgot Password</span></h2>
        </div>
        <!-- end header cont --> 
      </div>
      <div class="row-fluid">
        <div class="admin-form">
          <div class="span4 margin-auto">
            <form class="form-inline" action="<?php echo site_url('admin/forgot/send')?>" method="post">
              <div class="control-group">
                <div class="controls">
                  <input name="email" id="email" type="text" placeholder="Email Address" class="input-block-level" value="<?=set_value('username');?>">
                </div>
              </div>
              <div class="control-group text-center">
                <div class="controls">
                  <button type="submit" class="btn">Submit</button>
                  <button type="button" class="btn" id="btn_cancel">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <!-- end form container --> 
      
    </div>
  </div>
 
<script type="text/javascript">
$("#btn_cancel").click(function(){       
     url = "<?php echo site_url('admin/login')?>";
     $(window.location).attr('href', url); 
});

</script>