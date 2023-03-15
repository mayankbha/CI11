<div id="contents">
<div class="adpg_cont sm_wdths">
    
    
        <h1 class="">Admin View Contact Detail</h1>
    
    <div class="ad_inr_pgtxt">
        
        <div class="avcd_cont">
            <p><span class="bld">Message Date:</span>   <?php echo date('m-d-Y',strtotime($contact['date']));?></p>
            <p><span class="bld">First Name:</span>    <?php echo $contact['first_name'];?></p>
            <p><span class="bld">Last Name:</span>    <?php echo $contact['last_name']?></p>
            <p><span class="bld">E-mail:</span>   <?php echo $contact['email']?></p>
           
            <p><span class="bld">What can we help you with?</span>    <?php echo $contact['subject']?></p>
            <p><span class="bld">Message:</span>   <?php echo $contact['message']?> </p>
            <p><a href="<?php echo site_url('admin/contacts/reply/'.$contact['contact_id']);?>">Reply</a> <span>|</span> <a href="javascript:void(0);" onclick="openForm('<?php echo site_url('admin/contacts/delete_pp/'.$contact['contact_id'])?>');">Remove</a> <span>|</span> <a href="<?php echo site_url('admin/contacts')?>">Back</a></p>
            
        </div>
        
        <h2 class="tbl_ttl"><span class="bld">Admin</span> Contact History</h2>
        
        <div class="acamc_tbl allbldtbl">
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        
                        
                        <tr class="tp_tbl_tr">
                            <td width="150">Date</td>
                            <td width="150">Name</td>
                            <td width="200">Email</td> 
                            <td width="260">Message</td>
                                                       
                            <td>Actions</td>
                        </tr>
                        
                        <?php $i=1; foreach($replys as $crt): ?>
   <tr class="jst_fr_spc"><td colspan="5"></td></tr>
  <tr>

    <td><?php echo date('m-d-Y',strtotime($crt['date']));?></td>

    <td><?php echo $contact['first_name']?> <?php echo $contact['last_name']?></td>

    <td><?php echo $contact['email']?></td>

    <td><?php echo $contact['subject']?></td>

    <td class="sp_ac_td_a"><a href="<?php echo site_url('admin/contacts/view/'.$crt['contact_id'])?>/true">View</a> <span> | </span> <a href="<?php echo site_url('admin/contacts/reply/'.$contact['contact_id'])?>">Reply</a> <span> | </span> <a href="javascript:void(0);" onclick="openForm('<?php echo site_url('admin/contacts/delete_pp/'.$crt['contact_id'])?>');">Remove</a></td>

  </tr>
  <?php $i++; endforeach;?>
                        
                       
                        
                        <tr class="jst_fr_spc"><td colspan="5"></td></tr>
                    </tbody>
                </table>
            
        </div>
        <div class="clear"></div>
        
    </div>

    
</div>
</div>
<div class="clear"></div>
<!--    end page content  -->
