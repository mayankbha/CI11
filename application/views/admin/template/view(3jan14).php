 <script>
 

	function show_remove(id){
	$('.popup_container').hide();
	$('.del_'+id).css('display',"block");
	}

  $(function() {
    $( "#width-slider" ).slider({
      range: "min",
      value: 50,
      min: 1,
      max: 700,
      slide: function( event, ui ) {
        $( ".span5" ).val(ui.value );
		$(".span5").css("width",ui.value+"px");
      }
    });
	
 
  });
  
   $(function() {
    $( "#height-slider" ).slider({
      range: "min",
      value: 50,
      min: 1,
      max: 700,
      slide: function( event, ui ) {
	
        $( ".span5" ).val(ui.value );
		$(".span5").css("height",ui.value+"px");
      }
    });
	

  });
  
  $(function() {
    $( "#dimensions-slider" ).slider({
      range: "min",
      value: 50,
      min: 1,
      max: 700,
      slide: function( event, ui ) {
	
        $( ".span5" ).val(ui.value );
		$(".span5").css("height",ui.value+"px");
      }
    });
	

  });
  
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
<span  style="width:300px; height: 8px; background: #FFA700;" id="width-slider"></span>
</div>

<div class="slider_box2 clearfix">

<span class="sb_txt">Height:</span>
<span  style="width: 300px; height: 8px; background: #FFA700;" id="height-slider"></span>
</div>

<div class="slider_box3 clearfix">
<span class="sb_txt">Dimensions:</span>
<span  style="width: 300px; height: 8px; background: #FFA700;" id="dimensions-slider"></span>
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

<div class="span5">
 <?php if($template) { echo $template['template_content'];  } ?>
</div>


</div>	<!-- end tabular container -->

