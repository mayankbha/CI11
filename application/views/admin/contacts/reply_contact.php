<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">



<div class="heading-cont clearfix">

<h1 class="pull-left">Admin Reply</h1>

</div>	<!-- end header cont -->



<div class="ymp_inner_container view_achievement">


<form class="form-horizontal row-fluid" action="<?php echo site_url('admin/contacts/send/'.$contact['contact_id'])?>" name="contactfrm"  method="post">
<div class="span6">

    <div class="control-group">

      <label class="control-label">To:</label>

      <div class="controls">
        
        <?php echo $contact['email'];?>

      </div>

    </div>

      <div class="control-group">

      <label class="control-label">Email:</label>

      <div class="controls">

       <input type="text" class="input_field" id="subject" name="subject"  value="Re: <?php echo $contact['subject'];?>">

      </div>

    </div>

      <div class="control-group">

      <label class="control-label">Message:</label>

      <div class="controls">
		<textarea name="message" class="input_field" >

***********************************************************************
<?=str_replace('*','',$contact['message']);?></textarea>

      </div>

    </div>

    <div class="control-group">
    
          <label class="control-label">&nbsp;</label>
    
          <div class="controls text-center">
    
                <button type="submit" class="ymp_btn">Send</button>&nbsp;
                <button type="button" class="ymp_btn" onclick="location.href='<?=site_url('admin/contacts');?>'">Cancel</button>
    
          </div>
    
        </div>   
                    
</div>

</form>


</div>	



<!-- end tabular container -->



</div>

</div>

</div>

</div>

<script>document.contactfrm.message.focus();</script>