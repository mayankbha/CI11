<script type="text/javascript">
$(document).ready(function(){
	$('#copycode').click(function(){
	 htmlStr = $("#code").html();
	$(".gc_bar_container").html(" ");
	$(".gc_bar_container").html(htmlStr);
    $("#code").attr("display", "block");
    });
    
    $("#generate").click(function(){
   
     $('.bar').width( 875);	
     $('#text_m').css('display', 'block').delay(30000);
     
    });
    
});
</script>

<style>

.progress {
    background-color: #8E8E8E !important;
   
    background-repeat: repeat-x;
    border-radius: 4px 4px 4px 4px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
    height: 20px;
    margin-bottom: 20px;
    overflow: hidden;
</style>
<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="ymp_inner">

<div class="heading_cont clearfix">

<h2><span>Preview</span></h2>

</div>	<!-- end header cont -->



<div class="inner_content">

<div class="tbar">

<a href="#">Add an Ad  </a>

<a href="#">Configure Template</a>

<a href="#">Preview</a>

<a href="#" class="active">Output View</a>

</div>


<div class="perview row-fluid">
<form action="#" method="get">

<p>
<label>Generate Code Options:</label>
<select>
<option>HTML</option>
</select>
</p>

<div class="generate_code">

<label>Generated Code:</label>

<div class="gc_bar_container" >

<div class="gc_bar">

    
    <div class="progress" style=" background-color: #8E8E8E !important;height: 20px !important;padding:4px;  background-image: none !important; border-radius: 10px; 	-webkit-border-radius: 10px;-moz-border-radius: 10px; ">
	  <div class="bar" style="width: 0px; background-color: #FF9600 !important;background-image: none !important; border-radius: 10px; 	-webkit-border-radius: 10px;-moz-border-radius: 10px; "></div>
	</div>
	
	<p class="text-center" style="display: none" id="text_m">Done.</p>
	
</div>


<div id="code" style="overflow: scroll; display: none; "> 
	<?php  echo htmlspecialchars($ad['ads_content'])?>
</div>





</div>

</div>

<div class="text-center" style="padding-top:20px;">
<button type="button" class="btn" id="generate">Generate</button>
&nbsp;


<button type="button" id="copycode" class="btn btn-warning">Copy Code</button>
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