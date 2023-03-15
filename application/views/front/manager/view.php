 <script type="text/javascript">
 

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
        $( "#background_el" ).val(ui.value );
		$("#background_el").css("width",ui.value+"px");
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
	
        $( "#background_el" ).val(ui.value );
		$("#background_el").css("height",ui.value+"px");
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
	
        $( "#background_el" ).val(ui.value );
		$("#background_el").css("height",ui.value+"px");
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

<h2><span>View Ad Detail</span></h2>

</div>	<!-- end header cont -->



<div class="inner_content">

<div class="perview row-fluid">

<div class="span6 view_template">

<div class="vt_top">
<form action="<?php print_r(base_url())?>ads/output" method="post">
<p>
<label>Creative ID:</label>
23456
</p>

<p>
<label>Creative Name:</label>
BMW Responsive
</p>

<p>
<label>Template:</label>
Single Product
</p>

<p>
<label>Default Size:</label>
300 x 600
</p>

<p>
<label>User:</label>
Stefan Kosel
</p>

<p>
<label>Created on:</label>
08/25/2013
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
	<span  style="width: 250px; height: 8px; background: #999999 !important; margin-top: 8px;" id="width-slider"></span>
</div>

<div class="slider_box2 clearfix">
	<span class="sb_txt">Height:</span>
	<span  style="width: 250px; height: 8px; background: #999999 !important; margin-top: 8px;" id="height-slider"></span>
</div>

<div class="slider_box3 clearfix">
	<span class="sb_txt">Dimensions:</span>
	<span  style="width: 250px; height: 8px; background: #999999 !important; margin-top: 8px;" id="dimensions-slider"></span>
</div>

</div>


<div class="vd_btm">

<p>
<label>Pre-Set Size:</label>
<select class="input-block-level">
<option>800 x 600</option>
</select>
</p>

<div class=" text-center">

<button class="btn" type="button" onClick="window.location='<?php  echo site_url('manager/'); ?>'">Back</button>&nbsp;

<button class="btn" type="button" onClick="window.location='<?php  echo site_url('ads/index'); ?>'">Edit</button>&nbsp;

<button class="btn" type="submit">Finish</button>

</form>
</div>

</div>

</div>

<div class="span6">
  <img src="<?=base_url();?>images/bmw_img.jpg" alt="bmw" class="img-border"> 
</div>

</div>

</div><!-- end inner container -->

</div>
<!--end ymp innder for left right padding-->


</div>

</div>

</div>

</div>