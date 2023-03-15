<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="heading-cont clearfix">
            <h1 class="pull-left">Admin Contacts Controller </h1>
          </div>
          <!-- end header cont -->
          
          <div class="tabular_cont">
            <table>
              <tbody>
                <tr>
                  <th><a href="<?=site_url('admin/contacts/index/date/'.$order_type);?>">Date </a></th>
                  <th class="hidden-phone"><a href="<?=site_url('admin/contacts/index/email/'.$order_type);?>">Email</a></th>
                  <th><a href="<?=site_url('admin/contacts/index/first_name/'.$order_type);?>">First Name</a></th>
				  <th><a href="<?=site_url('admin/contacts/index/last_name/'.$order_type);?>">Last Name</a></th>
				  <th class="hidden-phone"><a href="<?=site_url('admin/contacts/index/subject/'.$order_type);?>">Subject</a></th>
                  <th class="text-center">Actions</th>
                </tr>
				<?php $i=0; foreach($contacts as $crt_contact): ?>
                <tr>
                  <td><?php echo date('m-d-Y',strtotime($crt_contact['date']));?></td>
                  <td class="hidden-phone"><?php echo $crt_contact['email'];?></td>
                  <td><?php echo $crt_contact['first_name'];?></td>
				  <td><?php echo $crt_contact['last_name'];?></td>
				  <td class="hidden-phone"><?php echo substr($crt_contact['subject'],0,20);?></td>
                  <td class="actions text-center">
				  	<a href="<?=site_url('admin/contacts/view/'.$crt_contact['contact_id']);?>"><img alt="View" src="<?=base_url();?>images/admin/view_icon.png"></a> 
					<a href="<?=site_url('admin/contacts/reply/'.$crt_contact['contact_id']);?>"><img alt="Reply" src="<?=base_url();?>images/admin/reply.png"></a>
					<a href="javascript:void(0);" class="RemovePopup" title="<?=$crt_contact['contact_id'];?>"><img alt="Delete" src="<?=base_url();?>images/admin/delete_icon.png"></a> 
					
					<div class="popup_container" id="popup_container<?=$crt_contact['contact_id'];?>" style="margin-left:5px; display: none"> 
						<div class="popover bottom" style="top:5px;">
						  <div class="arrow"></div>
						  <div class="popover-inner">
							<div class="popover-content">
							  <p>Are you sure you want to do this?  <span>This action is not reversible.</span> <span class="sp_btn">
									<button type="button" onclick="location.href='<?=site_url('admin/contacts/delete/'.$crt_contact['contact_id']);?>'" class="ymp_btn">Confirm</button>
									<button type="button" class=" ymp_btn" onclick="CancelRemovePopup(<?=$crt_contact['contact_id'];?>)">Cancel</button>							
								</span> </p>
							</div>
						  </div>
						</div>
                  	</div>
					</td>
                </tr>
                <?php $i++; endforeach;?>
              </tbody>
            </table>
          </div>
          
          <!-- end tabular container --> 
          
        </div>
      </div>
    </div>
</div>