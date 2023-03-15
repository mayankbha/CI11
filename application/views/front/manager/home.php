<div id="page-body"> 

<div class="container">

<div class="row">

<div class="span12">

<div class="ymp_inner">

<div class="heading_cont clearfix">

<h2><span>Creative Manager</span></h2>

<p class="text-right"><a href="<?php  echo site_url('/ads/index'); ?>" class="btn">Add New Creative</a></p>

</div>	<!-- end header cont -->

 <!--confirmation area -->
<div class="row-fluid" id="confirmation" style="margin-bottom: 30px; display:none">
  <div class="span7 margin-auto">
	<div class="confirmation-bar"> <a href="javascript:void(0);" onClick="$('#confirmation').hide();" class="popup-close"><img src="<?=base_url();?>images/popup-close.png" alt=""></a> <span class="confirmation-check"><img src="<?=base_url();?>images/confirmation-check.png" alt=""></span>
	  <p class="text-center"><?=str_replace('<p>','',str_replace('</p>','',$content));?></p>
	</div>
  </div>
</div>
<!--/conformation area -->

<div class="inner_content tabular_cont">

<table>

  <tr>

    <th><a href="<?=site_url('manager/index/ads_id/'.$order_type);?>">CREATIVE ID</a></th>

    <th class="hidden-phone hidden-tablet"><a href="<?=site_url('manager/index/title/'.$order_type);?>">CREATIVE NAME</a></th>

    <th><a href="<?=site_url('manager/index/user_id/'.$order_type);?>">USER </a></th>

    <th class="hidden-phone"><a href="<?=site_url('manager/index/created_date/'.$order_type);?>">CREATED ON</a></th>

    <th><a href="<?=site_url('manager/index/status/'.$order_type);?>">STATUS </a></th>

    <th >ACTIONS</th>

  </tr>
  <?php  foreach($items as $item) : ?>	
  <tr onClick="window.location='<?php  echo site_url('manager/view/'.$item['ads_id']); ?>'" style="cursor:pointer">

    <td><?php echo $item['ads_id']; ?></td>

    <td class="hidden-phone hidden-tablet"><?php echo $item['title']; ?></td>

    <td><?php echo $item['username']; ?></td>

    <td class="hidden-phone"><?php echo $item['created_date']; ?></td>

    <td><?php if ($item['status']==1) echo 'Active'; ?></td>

    <td class="actions text-center" onclick="event.cancelBubble=true;">
    	<a href="<?=site_url('ads/index/'.$item['ads_id']);?>" class="edit"><img src="<?=base_url();?>images/edit_icon.png" alt="Edit" title="Edit">
    	</a>
    	
    	<a href="<?=site_url('manager/view/'.$item['ads_id']);?>" class="view"><img src="<?=base_url();?>images/view_icon.png" alt="view" title="View">
    	</a>
    	
    	<a href="javascript:void(0);" onClick="$('#popup-container<?=$item['ads_id'];?>').show(); $('.popup-mask').show();"  class="remove"><img src="<?=base_url();?>images/delete_icon.png" alt="remove"  title="Remove">
    	</a>
    	
		<div class="popup-container" id="popup-container<?=$item['ads_id'];?>" style="display:none">
		  <div class="popup-inner">
		  <div class="popup-arrow"><img src="<?=base_url();?>images/popup-arrow.png" alt=""></div>
		  <p>Are you sure you want to do this?<span> This action is not reversible.</span>&nbsp; <span><button type="button" onClick="window.location='<?php  echo site_url('manager/remove/'.$item['ads_id']); ?>'" class="btn">Confirm</button> &nbsp; <button type="button" onClick="$('#popup-container<?=$item['ads_id'];?>').hide(); $('.popup-mask').hide();" class="btn">Cancel</button></span></p>
		  </div>
		</div>
    </td>

  </tr>
 <?PHP endforeach; ?>
  
 
</table>


</div><!-- end inner container -->

</div>
<!--end ymp innder for left right padding-->


</div>

</div>

</div>

</div>