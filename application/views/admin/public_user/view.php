<script>
function show_remove(id){
$('.popup_container').hide();
$('.del_'+id).css('display',"block");
}
</script>
<?php  if($user) { $id=$user['user_id']; }else { $id=0;} ?>
<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="ymp_inner">

<div class="heading_cont clearfix">

<h2><span>Admin View Account Detail</span></h2>

</div>	<!-- end header cont -->


<div class="inner_content">

<div class="view_ac">

<p>
	<label>First Name:</label>
    <span><?php echo isset($user['first_name'])? $user['first_name'] : '';?></span>
</p>
<p>
	<label>Last Name:</label>
    <span><?php echo isset($user['last_name']) ? $user['last_name'] : '';?></span>
</p>
<p>
	<label>Email:</label>
    <span><?php echo isset($user['email'])? $user['email'] : '';?></span>
</p>
<p>
	<label>Company Name:</label>
    <span><?php echo isset($user['company_name'])? $user['company_name'] : '';?></span>
</p>
<p>
	<label>Business Type:</label>
    <span><?php echo isset($user['business_type'])? $user['business_type'] : '';?></span>
</p>
<p>
	<label>Phone Number:</label>
    <span><?php echo isset($user['phone'])? $user['phone'] : '';?></span>
</p>

<div class="text-center sbmt_dv">

<button class="btn" onclick="window.location='<?php  echo  site_url('admin/public_users'); ?>'" >Back</button>
&nbsp;&nbsp;
<button class="btn" onclick="show_remove(<?= $user['user_id']; ?>);">Remove</button>

<!--<a href="javascript:void(0);" onclick="show_remove(<?= $user['user_id']; ?>);" title="Remove"  class="btn">Remove</a>-->


<div class="popup_container del_<?= $user['user_id']; ?>" id="popup_container<?=$user['user_id'];?>" style="margin-left:5px; display:none">					

 
                                       <div class="popup_container del_<?= $user['user_id']; ?>" id="popup_container<?=$user['user_id'];?>" style="margin-left:5px; display:none">					

                                    
                                            <div class="popover bottom" style="top:5px;margin-right:172px" >
                                        
                                              <div class="arrow"></div>
                                        
                                              <div class="popover-inner">
                                        
                                                <div class="popover-content">
                                        
                                                  <p> Are you sure you want to do this?
                                                  
                                                  <span class="sp_btn" style="width: 180px !important; margin-left: 0px !important;">

                                                    <button type="button" class="btn" onclick="location.href='<?=site_url('admin/public_users/delete/'.$user['user_id']);?>'" style="margin-left: 20px;">Confirm</button>

                                                    <button type="button" class="btn" onclick="$('.popup_container').hide();"  style="margin-left: 7px;">Cancel</button>
                                        
                                                    </span> </p>
                                        
                                                </div>
                                        
                                              </div>
                                        
                                            </div>
                                    
                                        </div>

</div>

</div>

</div>
<!--end inner content-->


</div>
<!--end ymp innder for left right padding-->


</div>

</div>

</div>

</div>	<!-- end page body here -->

<div id="push"></div>

</div>	<!-- end wrapper -->