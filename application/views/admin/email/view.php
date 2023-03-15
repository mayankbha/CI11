  <div id="page-body">
    <div class="container admin-content">
      <div class="row">
        <div class="span10 margin-auto">
          <div class="heading_cont clearfix">
            <h2><span>Admin View Outbound Email</span> </h2>
          </div>
          <!-- end header cont -->
          <div class="row-fluid">
          <div class="admin-form span10 margin-auto clearfix">
          
          <div class="span11 clearfix">
                <dl class="dl-horizontal">
					<dt>Subject:</dt>
					<dd><?php echo $email['subject'];?></dd>
					
					<dt>Message:</dt>
					<dd><?php echo $email['content'];?></dd>
					
					<dt>&nbsp;</dt>
					<dd class="text-center action-buttons">
	
					<button type="button" onclick="location.href='<?=site_url('admin/email');?>';"  class="btn">Back</button>
					<button type="button" onclick="location.href='<?php echo site_url('admin/email/edit/'.$email['email_id'])?>'" class="btn">Edit</button>
				 
					</dd>
    
    			</dl>
		   </div>
		   </div>
          </div>
          <!-- end page inner container --> 
          
        </div>
      </div>
    </div>
  </div>