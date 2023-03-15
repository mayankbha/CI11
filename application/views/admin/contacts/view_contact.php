<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="heading-cont clearfix">
            <h1 class="pull-left">Admin View Contact Detail </h1>
          </div>
          <!-- end header cont -->
          
          <div class="view_achievement view_contact" style="padding-left:0;">
            <p>
              <label>Message Date:</label>
              <span><?php echo date('m-d-Y',strtotime($contact['date']));?></span> </p>
            
            <p>
              <label>Email: </label>
              <span><?php echo $contact['email'];?></span> </p>
            <p>
              <label>Subject:</label>
              <span><?php echo $contact['subject'];?></span> </p>
            <p>
              <label>Message:</label>
              <span><?php echo nl2br($contact['message']);?></span> </p>
            <p class="sbmt_dv actions">
              <label class="hidden-phone">&nbsp;</label>
              <span>
              <button type="button" onclick="location.href='<?php echo site_url('admin/contacts/')?>'" class="ymp_btn">Back</button>
              <button type="button" onclick="location.href='<?php echo site_url('admin/contacts/reply/'.$contact['contact_id'])?>'" class="ymp_btn">Reply</button>
             <a href="javascript:void(0);" onclick="$('.popup-mask').show(); $('#popup_container<?=$contact['contact_id'];?>').show();" class="ymp_top_btn"> <button type="button" class="ymp_btn">Remove</button></a>
			 	<div class="popup_container" id="popup_container<?=$contact['contact_id'];?>" style="margin-left:5px; display: none"> 
						<div class="popover bottom" style="top: 35px; right: 125px; width: 420px;">
						  <div class="arrow"></div>
						  <div class="popover-inner">
							<div class="popover-content">
							  <p style="text-align:left">Are you sure you want to do this? <span class="sp_btn" style="margin-top:-20px;">
									<button type="button" onclick="location.href='<?=site_url('admin/contacts/delete/'.$contact['contact_id']);?>'" class="ymp_btn" style="margin-left:230px;">Confirm</button>
									<button type="button" class=" ymp_btn" onclick="CancelRemovePopup(<?=$contact['contact_id'];?>)">Cancel</button>							
								</span> </p>
							</div>
						  </div>
						</div>
                  	</div>
              </span> </p>
          </div>
          <div class="heading-cont clearfix" style="padding-top:35px;">
            <h1 class="pull-left">Admin Contact History </h1>
          </div>
          <!-- end header cont -->
          
          <div class="tabular_cont">
            <table>
              <tbody>
                <tr>
                  <th class=""><a href="<?=site_url('admin/contacts/view/'.$contact_id.'/date/'.$order_type);?>">Date</a></th> 

				  <th class="hidden-phone"><a href="<?=site_url('admin/contacts/view/'.$contact_id.'/subject/'.$order_type);?>">Subject</a></th>
			
				  <th class="hidden-phone"><a href="<?=site_url('admin/contacts/view/'.$contact_id.'/first_name/'.$order_type);?>">First Name</a></th>
			
				  <th class="hidden-phone"><a href="<?=site_url('admin/contacts/view/'.$contact_id.'/last_name/'.$order_type);?>">Last Name</a></th>
			
				  <th class=""><a href="<?=site_url('admin/contacts/view/'.$contact_id.'/email/'.$order_type);?>">Email</a></th>  
                  <th class="text-center">Actions</th>
                </tr>
				<?php $i=0; foreach($replys as $crt) : ?>
                <tr>
                  <td class=""><?php echo date('m/d/Y',strtotime($crt['date']));?></td>

				  <td class="hidden-phone"><?php echo substr($crt['first_name'],0,15);?></td>
			
				  <td class="hidden-phone"><?php echo $crt['first_name'];?></td>
			
				  <td class="hidden-phone"><?php echo $crt['last_name'];?></td>
			
				  <td class=""><?php echo $crt['email'];?></td>
                  <td class="actions text-center"><a href="<?=site_url('admin/contacts/view/'.$crt['contact_id']);?>"><img alt="View" src="<?=base_url();?>images/admin/view_icon.png"></a> 
				  <a href="<?=site_url('admin/contacts/reply/'.$crt['contact_id']);?>"><img alt="Reply" src="<?=base_url();?>images/admin/reply.png"></a>
					<a href="javascript:void(0);" class="RemovePopup" title="<?=$crt['contact_id'];?>"><img alt="Delete" src="<?=base_url();?>images/admin/delete_icon.png"></a> 
					<div class="popup_container" id="popup_container<?=$crt['contact_id'];?>" style="margin-left:5px; display: none"> 
						<div class="popover bottom" style="top:5px;">
						  <div class="arrow"></div>
						  <div class="popover-inner">
							<div class="popover-content">
							  <p>Are you sure you want to do this?  <span>This action is not reversible.</span> <span class="sp_btn">
									<button type="button" onclick="location.href='<?=site_url('admin/contacts/delete/'.$crt['contact_id']);?>'" class="ymp_btn">Confirm</button>
									<button type="button" class=" ymp_btn" onclick="CancelRemovePopup(<?=$crt['contact_id'];?>)">Cancel</button>							
								</span> </p>
							</div>
						  </div>
						</div>
                  	</div>
					</td>

				  	
				  </td>
				  <?PHP $i++; endforeach;?>	
                </tr>
                
              </tbody>
            </table>
          </div>
          
          <!-- end tabular container --> 
          
        </div>
      </div>
    </div>
  </div>