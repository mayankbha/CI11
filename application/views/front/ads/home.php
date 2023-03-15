<!--validate-->
<script type="text/javascript">
$(window).load(function () {
    $('#title').change(function() {
    	$("#title_err").hide();
    	$("#url_err").hide();
		var title = $("#title").val();
		var html = $.ajax({
		type: "POST",
		url: "<?php echo base_url()?>ads/title_validate",
		data: ({
		'title' : title
		}),
		dataType: "html",
		async: false
		}).responseText;
		$("#result").empty().append(html);
	});
	
	 $('#url').change(function() {
	 	$("#url_err").hide();
		var url = $("#url").val();
		var html = $.ajax({
		type: "POST",
		url: "<?php echo base_url()?>ads/url_validate",
		data: ({
		'url' : url
		}),
		dataType: "html",
		async: false
		}).responseText;
		$("#result2").empty().append(html);
	});
});
</script>
<?php
$title = array(
	'name'	=> 'title',
	'id'	=> 'title',
	'size'	=> 50,
	'value' =>  set_value('title')
);

$url = array(
	'name'	=> 'url',
	'id'	=> 'url',
	'size'	=> 50,
	'value' =>  set_value('url')
);
?>
<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="ymp_inner">

<div class="heading_cont clearfix">

<h2><span>Add/Edit Creative</span></h2>

</div>	<!-- end header cont -->



<div class="inner_content">

<div class="tbar">

<a href="#" class="active">Add an Ad  </a>

<a href="#">Configure Template</a>

<a href="#">Preview</a>

<a href="#">Output View</a>

</div>


<div class="ad_form row-fluid">
    <form action="<?php print_r(base_url())?>ads/index" method="post"> 
    <?PHP if(form_error('title')) {  echo form_error('title', '<p id="title_err" style="color:red;">', '</p>');  }?>
    	<p id="result" class="error" style="color:red;"></p> 
    <p>
    	<label>Enter Creative Title:</label>
    	<input type="text" value="<?php if(isset($ad['title'])) print_r($ad['title']);?>" class="input-block-level" name="title" id="title">
    </p>
    
    <?PHP if(form_error('url')) {  echo form_error('url', '<p id="url_err" style="color:red;">', '</p>');  }?>
    	<p id="result2" class="error" style="color:red;"></p> 
    <p>
    	<label>Default Click URL:</label>
    	<input type="text" value="<?php if(isset($ad['url'])) print_r($ad['url']);?>" class="input-block-level" name="url" id="url">
    </p>
    
    <div class="clearfix">
    
    	<p class="span6">
            <label>Select Template or Creative:</label>
            <select class="input-block-level" name="template_id">
            	<?php foreach ($templates as $template):?>>
            		<option <?php if(isset($ad['template_id'])&&($ad['template_id']==$template['template_id'])) echo'selected';?> value="<?php print_r($template['template_id'])?>" ><?php print_r($template['template_name'])?></option>
            	<?php endforeach;?>
            </select>
        </p>
        
    	<p class="span6">
            <label>Select Default Banner Size:</label>
            <?php if (!isset($ad['banner_id'])) $ad['banner_id']=14; ?>
           	<select class="input-block-level" name="banner_id">
            	<?php foreach ($banners as $banner):?>>
            		<option <?php if($ad['banner_id']==$banner['banner_id']) echo'selected';?> value="<?php print_r($banner['banner_id'])?>" ><?php print_r($banner['banner_size'])?></option>
            	<?php endforeach;?>
            </select>
        </p>
        <input type="hidden" name="id" value="<?php if (isset($id)&&(!empty($id))) echo $id; ?>">
        
    </div>
    
    <div class="text-center">
    	<button type="button" class="btn" onClick="window.location='<?php  echo site_url('manager/'); ?>'">Cancel</button> &nbsp;
    	<button type="submit" class="btn">Continue</button>
    </div>
    
    </form>
</div>

</div><!-- end inner container -->

</div>
<!--end ymp innder for left right padding-->


</div>

</div>

</div>

</div>