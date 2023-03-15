<link href="<?php echo base_url();?>css/admin/popup.css" rel="stylesheet" type="text/css" />
<div id="popover">
  <div id="sm_pp">
    <div id="pp_header">
      <div class="alignleft">Remove User</div>
      <div class="alignright"><a href="javascript:void(0);" onclick="closePP();"><img src="<?php echo base_url();?>images/admin/clz_pp.gif" alt="close" border="0" title="close" /></a></div>
      <div class="clear"></div>
    </div>
    <!-- end header here -->
    
    <div id="pp_contents">
      <div class="pp_msg" align="center">Are you sure you want to delete this User?<span>This action is NOT reversible</span></div>
      <div align="center">
        <input name="" type="button" class="btn" onclick="closePP();" value="Cancel" style="margin-right:7px" />
        <input name="" type="button" onclick="window.location='<?=site_url('admin/users/delete/'.$user_id);?>'" class="btn" value="Confirm" />
      </div>
    </div>
    <!-- end pp contents here --> 
    
  </div>
  <!-- end remove popover here --> 
  
</div>






