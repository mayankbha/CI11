<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="ymp_inner">

<div class="heading_cont clearfix">

<h2><span>Admin <?=($edit == 'edit') ? 'Edit Template' : 'Add New Template';?></span></h2>

</div>	<!-- end header cont -->

<div class="inner_content">

<form action="<?=site_url('admin/template/save/'.$t_id);?>" method="post"  name="template_edit">
<div class="edit_template">

<p>
<label style="display:inline-block; width:130px; font-size:22px;">Template ID:</label>
<?php echo set_value('template_id', ($edit == 'edit') ? $id=$template['template_id'] : $id=""); ?>
</p>
<?PHP if (form_error('template_name')) { ?><div> <?php echo form_error('template_name'); ?></div><?PHP } ?>
<p>
<label>Template Name:</label>
<input name="template_name" type="text"   value="<?php echo set_value('template_name', ($edit == 'edit') ? $template['template_name'] : ''); ?>" >
</p>
<?PHP if (form_error('user_name')) { ?><div> <?php echo form_error('user_name'); ?></div><?PHP } ?>
<p>
<label>User:</label>
<input name="user_name" type="text"  value="<?php echo set_value('user_name', ($edit == 'edit') ? $template['user_name'] : ''); ?>" >
</p>

<p>
<label>Status:</label>
<select class="input-block-level"  name="status" >
 <option value="1" >Active</option></select>
</p>
<p class="tidy_cat_p">

<label>Template Elements:</label>


<textarea name="template_content" class="mceNoEditor input-block-level" rows="6"><?php echo set_value('template_content', ($edit == 'edit') ? $template['template_content'] : ''); ?></textarea>
</p>
</form>

 <div class="text-center sbmt_dv">
 <div class="control-group text-center clearfix">
                  <div class="controls">

                    <button type="button" class="btn" onclick="window.location='<?php echo site_url('admin/template'); ?>'" >Back</button>
                    <button type="submit" class="btn">Edit</button>
                    <button type="button" class="btn" onclick="window.location='<?php echo site_url('admin/template/view/'.$id); ?>'">Preview</button>
                  </div>
                </div>

</div>

</div>

</div>	<!-- end tabular container -->
