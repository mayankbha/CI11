<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span10 margin-auto">
          <div class="heading_cont clearfix">
            <h2><span>Admin Edit Outbound Email</span></h2>
          </div>
          
          <!-- end header cont -->
          
          <div class="row-fluid">
            <div class="span7 margin-auto">
              <form class="form-inline" action="<?php echo site_url('admin/email/save/'.$email['email_id'])?>" method="post">
                <div class="control-group">
                  <label class="control-label" for="inputSubject">Subject:</label>
                  <div class="controls">
                    <input type="text"  name="subject" id="subject" class="input-block-level" value="<?php echo $email['subject'];?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputSubject">Message:</label>
                  <div class="controls">
				   <textarea name="content" rows="9" class="input-block-level"><?php echo $email['content'];?></textarea>
                  </div>
                </div>
                <div class="control-group text-center">
                  <div class="controls">
                    <button type="submit" class="btn">Save</button>
                    <button type="button" class="btn" onclick="location.href='<?=site_url('admin/email');?>'">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          
          <!-- end form container --> 
        </div>
      </div>
    </div>
  </div>