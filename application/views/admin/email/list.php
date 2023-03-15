<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span10 margin-auto">
          <div class="heading_cont clearfix">
            <h2><span>Admin Outbound Email Controller</span></h2>
          </div>
          <!-- end header cont -->
          
          <div class="tabular_cont outbound-email">
            <table>
			 <?php $i=0; foreach($emails as $email):?>		
              <tr>
                <td style="width: 84%;"><p><?php echo $email['subject'];?><br /><?php echo $email['content'];?> </p></td>
                <td class="hidden-phone" style="width: 3%;">&nbsp;</td>
                <td style="width: 13%;" class="actions text-center"><a href="<?php echo site_url('admin/email/view/'.$email['email_id'])?>"><img src="<?=base_url();?>images/admin/view_icon.png" alt="View" title="View"></a> <a href="<?php echo site_url('admin/email/edit/'.$email['email_id'])?>"><img src="<?=base_url();?>images/admin/edit_icon.png" alt="Edit" title="Edit"></a></a></td>
              </tr>
             <?php $i++; endforeach;?>
            </table>
          </div>
          <!-- end tabular container --> 
          
        </div>
      </div>
    </div>
  </div>