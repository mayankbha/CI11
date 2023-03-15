<script>
function show_remove(id){
$('.popup_container').hide();
$('.del_'+id).css('display',"block");
}
</script>

<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="ymp_inner">

<div class="heading_cont clearfix">

<h2><span>Admin Template Controller</span></h2>

<p class="text-right">
<a href="<?php  echo site_url('admin/template/edit'); ?>" class="btn">Add New Template</a>
</p>

</div>	<!-- end header cont -->



<div class="tabular_cont"  >

<table>

  <tbody><tr>

    <th style="width:145px;"><a href="<?= site_url('admin/template/index/template_id/' . $order_type); ?>">Template ID</a></th>

    <th class="hidden-phone" style="width:160px;"><a href="<?= site_url('admin/template/index/template_name/' . $order_type); ?>">Template Name</a></th>

    <th class="hidden-480"><a href="<?= site_url('admin/template/index/user_name/' . $order_type); ?>">User</a></th>

    <th class="hidden-phone"><a href="<?= site_url('admin/template/index/created_on/' . $order_type); ?>">Created on</a></th>

    <th class=""><a href="<?= site_url('admin/template/index/status/' . $order_type); ?>">Status</a></th>

    <th class="text-center">Actions</th>

  </tr>
 
  <?php  if($templates) { foreach ($templates as $template) { ?>	
  <tr>

    <td onclick="window.location='<?php  echo site_url('admin/template/view/'.$template['template_id']);  ?>'"  style="cursor:pointer" ><?php echo $template['template_id']; ?></td>
 
    <td onclick="window.location='<?php  echo site_url('admin/template/view/'.$template['template_id']);  ?>'"  style="cursor:pointer" class="hidden-phone"><?php echo $template['template_name']; ?></td>

    <td onclick="window.location='<?php  echo site_url('admin/template/view/'.$template['template_id']);  ?>'"  style="cursor:pointer" class="hidden-480"><?php echo $template['user_name']; ?></td>

    <td onclick="window.location='<?php  echo site_url('admin/template/view/'.$template['template_id']);  ?>'"  style="cursor:pointer" class="hidden-phone"><?php echo $template['created_on']; ?></td>

    <td onclick="window.location='<?php  echo site_url('admin/template/view/'.$template['template_id']);  ?>'"  style="cursor:pointer" class="hidden-phone"><?php  if($template['status']==1){  echo  "Active";  }else{ echo  "InActive" ;} ?></td>

    <td class="actions text-center">
    	<a href="<?php  echo site_url('admin/template/edit/'.$template['template_id']); ?>"  title="Edit"><img src="<?= base_url(); ?>images/admin/edit_icon.png" alt="Edit"></a>
    	<a href="javascript:void(0);" class="" title="Remove"  onclick="show_remove(<?= $template['template_id']; ?>);" ><img src="<?= base_url(); ?>images/admin/delete_icon.png" alt="Delete"></a>
        <div class="popup_container del_<?= $template['template_id']; ?>"  style="margin-left:0px; display:none">					

                                            <div class="popover bottom " style="top:5px;margin-top:0px; margin-right:28px;" >

                                                <div class="arrow"></div>

                                                <div class="popover-inner">

                                                    <div class="popover-content">

                                                        <p> Are you sure you want to do this? <span>This action is not reversible.</span> <span class="sp_btn">

                                                                <button type="button" class="btn" onclick="location.href = '<?= site_url('admin/template/delete/' . $template['template_id']); ?>'">Confirm</button>

                                                                <button type="button" class="btn" onclick="$('.popup_container').hide();">Cancel</button>

                                                            </span> </p>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                  </td>

  </tr>

  <?php } } ?>
 
</tbody></table>

                 </div>	<!-- end tabular container -->
                  </div>
                <!--end ymp inner for left right padding--> 

            </div>
        </div>
    </div>
</div>