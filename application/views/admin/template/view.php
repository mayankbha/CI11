<?php  $id = isset($id)?$id:0; ?>

<script>

	function show_remove(id)
	{
		$('.popup_container').hide();
		$('.del_'+id).css('display',"block");
	}

	$(function(){

		$( "#width-slider" ).slider({
			orientation: "horizontal",
			range: "min",
			value: 80,
			slide: handleWidth
		});

		$( "#height-slider" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 1000,
			value: 600,
			slide: handleHeight
		});

		var div_dimension = jQuery('#vardiv'); //caches the query when dom is ready
		//var CELL_WIDTH = 200;
		var ASPECT = 1.5;

		$( "#dimensions-slider" ).slider({
			range: "min",
			min: 10,
			max: 100,
			value: 50,
			slide: function(event, ui){
				var size = ui.value;
				var height = parseInt(parseInt(parseInt(size) * 8) / parseInt(ASPECT));
				//var height = parseInt(size) / parseInt(ASPECT);
				$('#vardiv').css('width', size + '%');
				$('#vardiv').css('height', height + 'px');
				$("#width_val").text(size + '%');
				$("#height_val").text(height + 'px');
			}
		});

	});
   
	function handleWidth(event, slider)
	{
		$('#vardiv').css('width', slider.value + '%');
		$("#width_val").text(slider.value + '%');
	}

	function handleHeight(event, slider)
	{
		$('#vardiv').css('height', slider.value + 'px');
		$("#height_val").text(slider.value + 'px');
	}

	$(function(){
		$("img").load(function(){
			var h=this.height,w=this.width
			$(this).removeAttr('width').removeAttr('height')
			var actualHeight =$(this).height(),actualWidth=$(this).width()
			$(this).attr({height:h,width:w}).data({height: actualHeight, width: actualWidth})
		})
	})
	
</script>

<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="ymp_inner">

<div class="heading_cont clearfix">

<h2><span>Admin View Template Detail</span></h2>

</div>	<!-- end header cont -->



<div class="inner_content row-fluid">

<div class="span7 view_template">

<div class="vt_top">

<p>
<label>Template ID:</label>
<?php if($template) { $id = $template['template_id'];  echo $id; } ?>
</p>

<p>
<label>Template Name:</label>
<?php if($template) { echo $template['template_name'];  } ?></p>
<p>
<label>User:</label>
<?php if($template) { echo $template['user_name'];  } ?>
</p>

<p>
<label>Created on:</label>
<?php if($template) { echo $template['created_on'];  } ?>
</p>

<p>
<label>Last Edited:</label>
09/29/2013
</p>

</div>

<div class="vd_mdl">

<label>Responsive Size:</label>

<div class="slider_box1 clearfix" > 
	<span class="sb_txt">Width:</span>
	<span  style="width: 250px; height: 8px; background: #999999; margin-top: 8px;" id="width-slider"></span>
</div>

<div class="slider_box2 clearfix">
	<span class="sb_txt">Height:</span>
	<span  style="width: 250px; height: 8px; background: #999999; margin-top: 8px;" id="height-slider"></span>
</div>

<div class="slider_box3 clearfix">
	<span class="sb_txt">Dimensions:</span>
	<span  style="width: 250px; height: 8px; background: #999999; margin-top: 8px;" id="dimensions-slider"></span>
</div>

</div>

<div class="vd_btm">

<p>
<label>Pre-Set Size:</label>
<select class="input-block-level">
<option>800 x 600</option>
</select>
</p>

<div class="">

<button type="button" class="btn" onclick="window.location='<?php  echo site_url('admin/template'); ?>'">Back</button>
&nbsp;

<button type="button" class="btn" onclick="window.location='<?php  echo site_url('admin/template/edit/'.$id); ?>'">Edit</button>&nbsp;
<button type="button" class="btn" onclick="window.location='<?php  echo site_url('admin/template/save/'.$id); ?>'">Finish</button>&nbsp;
<!--<a href="javascript:void(0);" class="btn" title="Remove"  onclick="show_remove(<?= $id; ?>);" >Remove</a>-->

        <div class="popup_container del_<?= $id; ?>"  style="margin-left:0px; display:none">					

                                            <div class="popover bottom " style="top:5px;margin-top:0px; margin-right:100px;" >

                                                <div class="arrow"></div>

                                                <div class="popover-inner">

                                                    <div class="popover-content">

                                                        <p> Are you sure you want to do this?<span class="sp_btn">

                                                                <button type="button" class="btn" onclick="location.href = '<?= site_url('admin/template/delete/' . $id); ?>'">Confirm</button>

                                                                <button type="button" class="btn" onclick="$('.popup_container').hide();">Cancel</button>

                                                            </span> </p>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
</div>

</div>

</div>

<div class="span5" style="border: 0px solid;">

	<div style="border: 0px solid; float: left; width: 100%;">
    	<div id="vardiv" style="width: 80%; height: 600px; border: 1px solid #8C8C8C;">
        	<?php if($template) { echo $template['template_content']; } ?>
        	<div id="width_val" style="border: 1px solid; width: 40px; display: none;"></div>
        	<div id="height_val" style="border: 1px solid; width: 50px; display: none;"></div>
   		</div>
	</div>

</div>


</div>	<!-- end tabular container -->

