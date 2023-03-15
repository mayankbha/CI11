<link href="<?PHP echo base_url()?>css/global.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript">
 


  $(function() {
  	str = $('#banner_conf').val();
	str1 = /^[^:]+/.exec(str)[0];
	width = str.substring(0,str.indexOf(' '));
	p_width=width+'px';	 
	$("#p_width").text(p_width); 
    $( "#width-slider" ).slider({
      range: "min",
      value: width,
      min: 1,
      max: 1536,
      slide: function( event, ui ) {
        $( "#background_el" ).val(ui.value );
		$("#background_el").css("width",ui.value+"px");
		$(".span7").css("width",ui.value+"px");
		$("#p_width").text(ui.value+"px"); 
      }
    });
	
 
  });
  
   $(function() {
   str = $('#banner_conf').val();
	str1 = /^[^:]+/.exec(str)[0];
	width = str.substring(0,str.indexOf(' '));
	del=width+" x ";
	height=str.replace(del,"");
	p_height=height+'px';	 
	$("#p_height").text(p_height);
    $( "#height-slider" ).slider({
      range: "min",
      value: height,
      min: 1,
      max: 2048,
      slide: function( event, ui ) {
	
        $( "#background_el" ).val(ui.value );
		$("#background_el").css("height",ui.value+"px");
		$(".span7").css("height",ui.value+"px");
		$("#p_height").text(ui.value+"px"); 
      }
    });
	

  });
  
  $(function() {
  
  
    $( "#dimensions-slider" ).slider({
      range: "min",
      value: 100,
      min: 1,
      max: 100,
      slide: function( event, ui ) {
	
        $("#background_el" ).val(ui.value );
//		$("#background_el").css("height",ui.value+"px");
//		$("#background_el").css("width",ui.value+"px");
//		$(".span7").css("width",ui.value+"px");
//		$(".span7").css("height",ui.value+"px");
		val=ui.value/100;
		
		$("#background_el").css('-webkit-transform','scale('+val+')');
		$("#background_el").css('-moz-transform','scale('+val+')');
		$("#background_el").css('transform','scale('+val+')');
		$("#p_dimensions").text(ui.value+"%"); 
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
    <script>
 $(window).load(function () { 
 		

 //change size 
	$('#banner_conf').change(function(){ 	
		str = $(this).val();
		str1 = /^[^:]+/.exec(str)[0];
	 	width = str.substring(0,str.indexOf(' '));
		del=width+" x ";
		height=str.replace(del,"");
		$("#background_el").height(height);
		$("#background_el").width(width);
		$(".span7").height(height);
		$(".span7").width(width);
		
		p_height=height+'px';	 
		$("#p_height").text(p_height);
		p_width=width+'px';	 
		$("#p_width").text(p_width); 
	
		 $( "#width-slider" ).slider({
      	range: "min",
      	value: width,
      	min: 1,
      	max: 1536
    	});
    	
    	$( "#height-slider" ).slider({
	      range: "min",
	      value: height,
	      min: 1,
	      max: 2048
	    });
    	
	 	
	});	 
	
	// end change size
	
	//save
	$('#finish').click(function(){ 
	
        htmlStr = $("#cont_div").html(); 
		
		var html = $.ajax({
		type: "POST",
		url: "<?php echo base_url()?>ads/save",
		data: ({
		'htmlStr' : htmlStr,
		'ads_id' : <?php print_r($ad['ads_id'])?>,
		}),
		dataType: "html",
		async: false
		}).responseText;
		
		$("#finish_form").submit();
	
    });
	
	//save
	$('#test').click(function(){ 
	
        
		//alert('sdf');die;
		$("#background_el").scale("4");
	
    });
	
  }); 
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
<form action="<?php print_r(base_url())?>ads/output/<?php print_r($ad['ads_id'])?>" method="post" id="finish_form">
<p>
<label style="color: #4C4C4C;font-size: 22px;">Creative ID:</label>
<?php print_r($ad['ads_id'])?>
</p>

<p>
<label style="color: #4C4C4C;font-size: 22px;">Creative Name:</label>
<?php print_r($ad['title'])?>
</p>

<p>
<label style="color: #4C4C4C;font-size: 22px;">Template:</label>
<?php print_r($ad['template_name'])?>
</p>

<p>
<label style="color: #4C4C4C;font-size: 22px;">Default Size:</label>
<?php foreach ($banners as $banner):?>
   <?php if(isset($ad['banner_id'])&&($ad['banner_id']==$banner['banner_id'])) print_r($banner['banner_size']);?> 
<?php endforeach;?>
</p>

<p>
<label style="color: #4C4C4C;font-size: 22px;">User:</label>
<?php print_r($ad['username'])?>
</p>

<p>
<label style="color: #4C4C4C;font-size: 22px;">Created on:</label>
<?php 
		$date = date("d/m/Y", strtotime($ad['created_date']));echo $date;
?>
</p>

<p>
<label style="color: #4C4C4C;font-size: 22px;">Last Edited:</label>
<?php 
		$date = date("d/m/Y", strtotime($ad['last_edit_date']));echo $date;
?>
</p>

</div>

<div class="vd_mdl">

<label>Responsive Size:</label>

<div class="slider_box1 clearfix" > 
	<span class="sb_txt">Width:</span>
	<span  style="width: 250px; height: 7px; background: #999999 !important; margin-top: 8px;" id="width-slider"></span>
	<p class="slider_val" id="p_width"></p>
</div>

<div class="slider_box2 clearfix">
	<span class="sb_txt">Height:</span>
	<span  style="width: 250px; height: 7px; background: #999999 !important; margin-top: 8px;" id="height-slider"></span>
	<p class="slider_val" id="p_height"></p>
</div>

<div class="slider_box3 clearfix">
	<span class="sb_txt">Dimensions:</span>
	<span  style="width: 250px; height: 7px; background: #999999 !important; margin-top: 8px;" id="dimensions-slider"></span>
	<p class="slider_val" id="p_dimensions">100%</p>
</div>

</div>


<div class="vd_btm">

<p>
<label>Pre-Set Size:</label>
<select class="input-block-level" name="banner_id" id="banner_conf">
            	<?php foreach ($banners as $banner):?>>
            		<option <?php if(isset($ad['banner_id'])&&($ad['banner_id']==$banner['banner_id'])) echo'selected';?> value="<?php print_r($banner['banner_size'])?>" ><?php print_r($banner['banner_size'])?></option>
            	<?php endforeach;?>
            </select>
</p>

<div class=" text-center">

<button class="btn" type="button" onClick="window.location='<?php  echo site_url('manager'); ?>'">Back</button>&nbsp;

<button class="btn" type="button" onClick="window.location='<?php  echo site_url('ads/index/');print_r("/".$ad['ads_id']); ?>'">Edit</button>&nbsp;

<button class="btn" type="button" id="finish">Finish</button>
</form>
</div>

</div>

</div>

<div class="span6">
	<div class="span7" style="overflow: hidden; border: 2px solid black; " id="cont_div">
	  <!--ad content -->
	  <?php print_r($ad['ads_content']);?>
  	</div>
</div>

</div>

</div><!-- end inner container -->

</div>
<!--end ymp innder for left right padding-->


</div>

</div>

</div>

</div>