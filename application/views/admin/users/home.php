<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="ymp_inner">
            <div class="heading_cont clearfix">
              <h2><span>Admin Users Controller</span></h2>
              <p class="text-right"> <a href="<?=site_url('admin/users/edit/0');?>" class="btn">Add New User</a> </p>
            </div>
            <!-- end header cont -->
            
            <div class="tabular_cont public_user">
              <table>
                <tr>
                  <th><a href="<?=site_url('admin/users/index/first_name/'.$order_type);?>">First Name</a></th>
                  <th class="hidden-phone"><a href="<?=site_url('admin/users/index/last_name/'.$order_type);?>">Last Name</a></th>
                  <th class="hidden-phone hidden-tablet"><a href="<?=site_url('admin/users/index/email/'.$order_type);?>">Email Address</a></th>
                  <th><a href="<?=site_url('admin/users/index/active/'.$order_type);?>">Active</a></th>
                  <th class="text-center">Actions</th>
                </tr>
				<?php  foreach($users as $user){ ?>	
                <tr>
                  <td><?php echo $user['first_name']; ?></td>
                  <td class="hidden-phone"><?php echo $user['last_name']; ?></td>
                  <td class="hidden-phone hidden-tablet"><?php echo $user['email']; ?></td>
                  <td><?=($user['active']==1) ? 'Yes' : 'No'; ?></td>
                  <td class="actions text-center">
				  <a href="<?=site_url('admin/users/edit/'.$user['user_id']);?>"><img src="<?=base_url();?>images/admin/edit_icon.png" alt="Edit"></a> 
				  <a href="javascript:void(0);" class="RemovePopup" title="<?=$user['user_id'];?>"><img src="<?=base_url();?>images/admin/delete_icon.png" alt="Delete"></a>
				   <div class="popup_container" id="popup_container<?=$user['user_id'];?>" style="margin-left:5px; display:none">					
				
						<div class="popover bottom" style="top:5px;" >
					
						  <div class="arrow"></div>
					
						  <div class="popover-inner">
					
							<div class="popover-content">
					
							  <p> Are you sure you want to do this? <span>This action is not reversible.</span> <span class="sp_btn">
					
								<button type="button" class="btn" onclick="location.href='<?=site_url('admin/users/delete/'.$user['user_id']);?>'">Confirm</button>
					
								<button type="button" class="btn" onclick="CancelRemovePopup(<?=$user['user_id'];?>)">Cancel</button>
					
								</span> </p>
					
							</div>
					
						  </div>
					
						</div>
				
					</div>
				  </td>
                </tr>
                 <?php } ?>
              </table>
            </div>
            <!-- end tabular container --> 
            
          </div>
          <!--end ymp inner for left right padding--> 
          
        </div>
      </div>
    </div>
  </div>