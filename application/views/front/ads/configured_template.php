<script type="text/javascript" src="<?php echo base_url()?>js/colorpicker/js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/colorpicker/js/eye.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/colorpicker/js/utils.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/colorpicker/js/layout.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery/uploadify_31/jquery.uploadify-3.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>js/colorpicker/css/colorpicker.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>js/colorpicker/css/layout.css" media="screen" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/js/jquery/uploadify_31/uploadify.css" type="text/css" media="screen" />
<style>
	.back_inv {
		background: hsla(207, 38%, 47%, 0) !important;
	}
	label{
		text-align:left;
		color: inherit;
		font-size: 14px;
		color: #4C4C4C !important;
		font-family: Calibri,Arial,Helvetica,sans-serif;
	}
	select{
		float:left;
	}

	.imageshadow{
		box-shadow: 5px 5px 1px 1px rgb(0,0,0);
	}
	.textshadow{
		text-shadow: 5px 5px 1px rgb(0,0,0);
	}

	.h2n{
	 background: url("<?php echo base_url();?>images/h2_bg.gif") repeat-x scroll left 30px transparent;
    color: #4C4C4C;
    font-size: 35px;
    line-height: 1;
    padding: 0 0 10px;
    padding-bottom: 10px;
    height:35px;
	}
	h4 {
		color: #4C4C4C !important;
	}
	.tbar a {
		font-family: Calibri,Arial,Helvetica,sans-serif;
	}
	.ndate {
		font-family: Calibri,Arial,Helvetica,sans-serif !important;
		color: #4C4C4C !important;
		font-size: 13.5px !important;
	}
	.newp{
		overflow: hidden !important;
		margin-top: 15px;
	}
	.opened_drop_down_bar{
		padding-top: 0px;
	}
	.endp{
		padding-bottom: 15px !important;
	}

/* Required CSS classes: must be included in all pages using this script */

/* Apply the element you want to drag/resize */
.drsElement {
 position: absolute;
 border: 1px solid #333;
}

/*
 The main mouse handle that moves the whole element.
 You can apply to the same tag as drsElement if you want.
*/
.drsMoveHandle {
 height: 20px;
 background-color: #CCC;
 border-bottom: 1px solid #666;
 cursor: move;
}

/*
 The DragResize object name is automatically applied to all generated
 corner resize handles, as well as one of the individual classes below.
*/
.dragresize {
 position: absolute;
 width: 5px;
 height: 5px;
 font-size: 1px;
 background: #8C8C8C;
 border: 1px solid #8C8C8C;
}

/*
 Individual corner classes - required for resize support.
 These are based on the object name plus the handle ID.
*/
.dragresize-tl {
 top: -4px;
 left: -4px;
 cursor: nw-resize;
}
.dragresize-tm {
 top: -4px;
 left: 50%;
 margin-left: -4px;
 cursor: n-resize;
}
.dragresize-tr {
 top: -4px;
 right: -4px;
 cursor: ne-resize;
}

.dragresize-ml {
 top: 50%;
 margin-top: -4px;
 left: -4px;
 cursor: w-resize;
}
.dragresize-mr {
 top: 50%;
 margin-top: -4px;
 right: -4px;
 cursor: e-resize;
}

.dragresize-bl {
 bottom: -4px;
 left: -4px;
 cursor: sw-resize;
}
.dragresize-bm {
 bottom: -4px;
 left: 50%;
 margin-left: -4px;
 cursor: s-resize;
}
.dragresize-br {
 bottom: -4px;
 right: -4px;
 cursor: se-resize;
}
.ui-icon-gripsmall-diagonal-se {
	opacity: 0;
}
</style>


<script type="text/javascript">

	var Template = {

		current_size: false,
		current_width: false,
		current_height: false,
		size_positions: new Array(),

		init: function()
		{
			$('#banner_conf').on('change', function() { Template.change_size() });

			this.change_size();
		},

		change_size: function()
		{
			var size = $('#banner_conf').val();
			var dim = size.split(' x ');
			var width = dim[0];
			var height = dim[1];

			if (this.current_size)
			{
				this.save_size_positions(this.current_size);
			}

			$("#background_el").width(width);
			$("#background_el").height(height);

			this.load_size_positions(size);

			this.current_size = size;
			this.current_width = width;
			this.current_height = height;

			this.fix_positions();
		},

		save_size_positions: function(size)
		{
			var positions = new Array();
			$('#background_el .drsElement').each(function(key, item)
			{
				var $item = $(item);
				positions.push({
					id:		$item.attr('id'),
					width:	$item.width(),
					height:	$item.height(),
					top:	parseInt($item.css('top')),
					left:	parseInt($item.css('left'))
				});
			});
			this.size_positions[size] = positions;
		},

		load_size_positions: function(size)
		{
			if (typeof this.size_positions[size] != 'undefined')
			{
				$.each(this.size_positions[size], function(key, positions)
				{
					$('#' + positions.id).css({
						width:	positions.width + 'px',
						height:	positions.height + 'px',
						top:	positions.top + 'px',
						left:	positions.left + 'px'
					});
				});
			}
		},

		fix_positions: function()
		{
			var width = this.current_width;
			var height = this.current_height;

			$('#background_el .drsElement').each(function(key, item)
			{
				var $item = $(item);
				var positions = {
					width:	$item.width(),
					height:	$item.height(),
					top:	parseInt($item.css('top')),
					left:	parseInt($item.css('left'))
				}

				if (positions.top + positions.height > height)
				{
					positions.top = height - positions.height;
					if (positions.top < 0)
					{
						positions.top = 0;
					}
					$item.css('top', positions.top + 'px');
				}

				if (positions.left + positions.width > width)
				{
					positions.left = width - positions.width;
					if (positions.left < 0)
					{
						positions.left = 0;
					}
					$item.css('left', positions.left + 'px');
				}

				if (positions.height > height)
				{
					positions.height = height;
					$item.css('height', positions.height + 'px');

					var aspect = $item.data('aspect_ratio');
					if (aspect)
					{
						positions.width = Math.round(positions.height * aspect);
						$item.css('width', positions.width + 'px');
					}
				}

				if (positions.width > width)
				{
					positions.width = width;
					$item.css('width', positions.width + 'px');

					var aspect = $item.data('aspect_ratio');
					if (aspect)
					{
						positions.height = Math.round(positions.width / aspect);
						$item.css('height', positions.height + 'px');
					}
				}
			});
		}

	}

	$(document).ready(function()
	{
		Template.init();
	});

	function update_resizable(event, ui)
	{
		var $item = $(event.target);
		$item.css('line-height', $item.height() + 'px');
	}

	function set_item_image(item_selector, image_url)
	{
		var $item = $(item_selector);

		var img = new Image();
		img.src = image_url;
		img.onload = function()
		{
			var width = img.width;
			var height = img.height;
			var aspect = height ? width / height : 0;

			$item
				.data('image_added', true)
				.data('width', width)
				.data('height', height)
				.data('aspect_ratio', aspect)
				.css({
					backgroundImage:	'url(' + image_url + ')',
					width: $item.height() * aspect + 'px'
				})
				.html('');

			$(item_selector).resizable('destroy');
			$(item_selector).resizable({
				containment:	'#background_el',
				handles: 		'all',
				resize:			update_resizable,
				aspectRatio:	aspect
			});
		};

	}


$(window).load(function () {

	var base_url = (location.host);

	//viz block start properties

 	//top image
	 disp=$("#top_image_el").css("display");

	 if( disp=='block' ){
     	$("#disp_top").attr('checked', 'checked');
     }
     else
     {

     	$("#disp_top_n").attr('checked', 'checked');
     }

     //headline
	 disp=$("#headline_el").css("display");

	 if( disp=='block' ){
     	$("#disp_head").attr('checked', 'checked');
     }
     else
     {

     	$("#disp_head_n").attr('checked', 'checked');
     }

     //center image
	 disp=$("#center_image_el").css("display");

	 if( disp=='block' ){
     	$("#disp_center").attr('checked', 'checked');
     }
     else
     {

     	$("#disp_center_n").attr('checked', 'checked');
     }

     //paraghaph
	 disp=$("#paragraph_el").css("display");

	 if( disp=='block' ){
     	$("#disp_paragraph").attr('checked', 'checked');
     }
     else
     {

     	$("#disp_paragraph_n").attr('checked', 'checked');
     }

      //bottom
	 disp=$("#bottom_image_el").css("display");

	 if( disp=='block' ){
     	$("#disp_bottom").attr('checked', 'checked');
     }
     else
     {

     	$("#disp_bottom_n").attr('checked', 'checked');
     }


//	end viz block start properties


//get shadows options

 		//top image
	var result = $('#top_image_el').css('box-shadow').match(/(-?\d+px)|(rgb\(.+\))/g)
	 if( result ){
     	$("#shad_top").attr('checked', 'checked');
     }
     else
     {

     	$("#shad_top_n").attr('checked', 'checked');
     }


		//headline
	var result = $('#headline_el').css('text-shadow').match(/(-?\d+px)|(rgb\(.+\))/g)
	 if( result ){
     	$("#shad_headline").attr('checked', 'checked');
     }
     else
     {

     	$("#shad_headline_n").attr('checked', 'checked');
     }


 		//center image
	var result = $('#center_image_el').css('box-shadow').match(/(-?\d+px)|(rgb\(.+\))/g)
	 if( result ){
     	$("#shad_center").attr('checked', 'checked');
     }
     else
     {

     	$("#shad_center_n").attr('checked', 'checked');
     }

		//paragraph
	var result = $('#paragraph_el').css('text-shadow').match(/(-?\d+px)|(rgb\(.+\))/g)
	 if( result ){
     	$("#shad_paragraph").attr('checked', 'checked');
     }
     else
     {

     	$("#shad_paragraph_n").attr('checked', 'checked');
     }

		//bottom image
	var result = $('#bottom_image_el').css('box-shadow').match(/(-?\d+px)|(rgb\(.+\))/g)
	 if( result ){
     	$("#shad_bottom").attr('checked', 'checked');
     }
     else
     {

     	$("#shad_bottom_n").attr('checked', 'checked');
     }

//end get shadows options







	//background image
     br = $('#background_el').css('background-image');
	 patt=/\url|\(|\"|\"|\'|\)/g;
     $('#back_img').attr('value', br.replace(patt,''));

	//top image
     br = $('#top_image_el').css('background-image');
     $('#top_img').attr('value', br.replace(patt,''));

     //center image
     br = $('#center_image_el').css('background-image');
     $('#center_img').attr('value', br.replace(patt,''));

	//bottom image
     br = $('#bottom_image_el').css('background-image');
     $('#bottom_img').attr('value', br.replace(patt,''));


     //headline text
     text = $('#headline_el').text();
     $('#headline_text').attr('value', text);

	 //paragraph text
     text = $('#paragraph_el').text();
     $('#paragraph_text').attr('value', text);



	//spoilers

	//open first spoiler
	$('.close_conf_link:first').addClass("conf_link");
	$('.opened_drop_down_bar:first').show("");

	//click spoiler
	 $('.close_conf_link').click(function() {
	 	//remove all
	 	$('.close_conf_link').removeClass("conf_link");
	 	//change current
	 	$(this).addClass("conf_link");
	 	$('.opened_drop_down_bar').hide("");
	 	$('#' + this.id+'_desc').show();
	 	//scroll to
	 	 $('html, body').animate({
			scrollTop: $('#' + this.id).offset().top
			}, 2000);
	 });

	//open spoiler by object push
	 $('#background_el').click(function() {
	 	//remove all
	 	$('.close_conf_link').removeClass("conf_link");
	 	//change current
	 	$('#background').addClass("conf_link");
	 	$('.opened_drop_down_bar').hide("");
	 	$('#background_desc').show();
	 	//scroll to
	 	 $('html, body').animate({
			scrollTop: $('#background').offset().top
			}, 2000);
	 });

	  $('#top_image_el').click(function(event) {
	  //stop outer click
	  	event.stopPropagation();
	 	//remove all
	 	$('.close_conf_link').removeClass("conf_link");
	 	//change current
	 	$('#top_image').addClass("conf_link");
	 	$('.opened_drop_down_bar').hide("");
	 	$('#top_image_desc').show();
	 	//scroll to
	 	 $('html, body').animate({
			scrollTop: $('#top_image').offset().top
			}, 2000);
	 });


	 $('#headline_el').click(function(event) {
	 	//stop outer click
	  	event.stopPropagation();
	 	//remove all
	 	$('.close_conf_link').removeClass("conf_link");
	 	//change current
	 	$('#headline').addClass("conf_link");
	 	$('.opened_drop_down_bar').hide("");
	 	$('#headline_desc').show();
	 	//scroll to
	 	 $('html, body').animate({
			scrollTop: $('#headline').offset().top
			}, 2000);
	 });

	  $('#center_image_el').click(function(event) {
	  	//stop outer click
	  	event.stopPropagation();
	 	//remove all
	 	$('.close_conf_link').removeClass("conf_link");
	 	//change current
	 	$('#center_image').addClass("conf_link");
	 	$('.opened_drop_down_bar').hide("");
	 	$('#center_image_desc').show();
	 	//scroll to
	 	 $('html, body').animate({
			scrollTop: $('#center_image').offset().top
			}, 2000);
	 });

	$('#paragraph_el').click(function(event) {
		//stop outer click
	  	event.stopPropagation();
	 	//remove all
	 	$('.close_conf_link').removeClass("conf_link");
	 	//change current
	 	$('#paragraph').addClass("conf_link");
	 	$('.opened_drop_down_bar').hide("");
	 	$('#paragraph_desc').show();
	 	//scroll to
	 	 $('html, body').animate({
			scrollTop: $('#paragraph').offset().top
			}, 2000);
	 });

	 $('#bottom_image_el').click(function(event) {
	 	//stop outer click
	  	event.stopPropagation();
	 	//remove all
	 	$('.close_conf_link').removeClass("conf_link");
	 	//change current
	 	$('#bottom_image').addClass("conf_link");
	 	$('.opened_drop_down_bar').hide("");
	 	$('#bottom_image_desc').show();
	 	//scroll to
	 	 $('html, body').animate({
			scrollTop: $('#bottom_image').offset().top
			}, 2000);
	 });


	 //end spoilers

	//save
	$('#cont').click(function(){
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
		$("#result").empty().append(html);


    });

	//drag
	 $("#top_image_el").draggable({ containment:'parent' });
	$("#headline_el").draggable({ containment:'parent' });
	$("#center_image_el").draggable({ containment:'parent' });
	$("#paragraph_el").draggable({ containment:'parent' });
	$("#bottom_image_el").draggable({ containment:'parent' });
	//end drag

	$('#top_image_el, #headline_el, #center_image_el, #paragraph_el, #bottom_image_el').draggable({
		containment: '#background_el'
	});

	// resizable

	$('#top_image_el, #headline_el, #center_image_el, #paragraph_el, #bottom_image_el').resizable({
		containment:	'#background_el',
		handles: 		'all',
		resize:			update_resizable
	});

	// end change size

	//visability

	//background
	$('.background_v').change(function(){
        if( $(this).is(":checked") ){
            var val = $(this).val();
           if (val=='hide')
           {
           		$("#background_el").addClass("back_inv");
           }
           else
           {
           		$("#background_el").removeClass("back_inv");
           }
        }
    });
	//other blocks
	$('.vis').change(function(){
        if( $(this).is(":checked") ){
            var val = $(this).val();
            var name =$(this).attr("name");
           if (val=='hide')
           {
           		$("#"+name).hide();
           }
           else
           {
           		$("#"+name).show();
           }
        }
    });


	//end visability

	//click url
		$('.cl_url').on('change keyup paste', function(){

            var val = $(this).val();
            var name =$(this).attr("name");
          	var link="window.location='"+val+"'";
           	$("#"+name).attr("onClick",link);
    });


	//end click url

	//image upload
		$('.img_up').change(function(){

            var val = $(this).val();
            var name =$(this).attr("name");
          	link="url("+val+")";

           		$("#"+name).css('backgroundImage', link);
    });


	//end image upload

	//font size
		$('.m_font').on('change keyup paste', function()
	{
		var val = $(this).val();
        var name =$(this).attr("name");
       	var size=val+'px'
       	$("#"+name).css('font-size',size);
    });


	//end font size

	//font align
		$('.tex_al').on('change keyup paste', function()
	{

            var val = $(this).val();
            var name =$(this).attr("name");

           		$("#"+name).css('text-align',val);
    });


	//end font align

	//headline text
		$('#headline_text').on('change keyup paste', function()
	{
            var val = $(this).val();
          	$("#headline_el").text(val);
    });
	//end headline text

	//paragraph text
		$('#paragraph_text').on('change keyup paste', function()
	{
            var val = $(this).val();
          	$("#paragraph_el").text(val);
    });
	//end paragraph text


	//headline font
		$('#headline_font').on('change keyup paste', function()
	{
            var val = $(this).val();
          	$("#headline_el").css('font-family',val);
    });
	//end font text

	//paragraph font
		$('#paragraph_font').on('change keyup paste', function()
	{
            var val = $(this).val();
          	$("#paragraph_el").css('font-family',val);
    });
	//end paragraph font

	//repeat
	  $("#repeat").change(function (){
	  repeat =$(this).val();
	  $('#background_el').css("background-repeat", repeat);
	   });


	//shadow

	function update_image_shadow(location)
	{
		if (location == 'paragraph' || location == 'headline')
		{
			var $image = $('#' + location + '_el');
		}
		else
		{
			var $image = $('#' + location + '_image_el');
		}

		if ($('.image_shadow[name=' + location + ']:checked').val() == 'show')
		{
			var color = $('.image_shadow_color_input[name=' + location + ']').val();
			var size = $('.image_shadow_size[name=' + location + ']').val();
			var angle = $('.shadow_angle[name=' + location + ']').val();

			var x = Math.round(size * Math.cos(angle * Math.PI / 180));
			var y = Math.round(size * Math.sin(angle * Math.PI / 180));

			var style = x + 'px ' + y + 'px 5px #' + color;

			$image
				.addClass('imageshadow')
				.css({
					'boxShadow'				: style,
					'box-shadow'			: style,
					'-moz-box-shadow'		: style,
					'-webkit-box-shadow'	: style
				});
		}
		else
		{
			$image
				.removeClass('imageshadow')
				.css({
						'boxShadow'				: 'none',
						'box-shadow'			: 'none',
						'-moz-box-shadow'		: 'none',
						'-webkit-box-shadow'	: 'none'
					});
		}
	}

	//image shadow
	$('.image_shadow').change(function()
	{
		update_image_shadow($(this).attr('name'));
    });


	function update_text_shadow(location)
	{
		if (location == 'paragraph' || location == 'headline')
		{
			var $image = $('#' + location + '_el');
		}


		if ($('.text_shadow[name=' + location + ']:checked').val() == 'show')
		{
			var color = $('.text_shadow_color_input[name=' + location + ']').val();
			var size = $('.text_shadow_size[name=' + location + ']').val();
			var angle = $('.shadow_angle[name=' + location + ']').val();

			var x = Math.round(size * Math.cos(angle * Math.PI / 180));
			var y = Math.round(size * Math.sin(angle * Math.PI / 180));

			var style = x + 'px ' + y + 'px 5px #' + color;

			$image
				.addClass('textshadow')
				.css({
					'textShadow'				: style,
					'text-shadow'			: style,
					'-moz-text-shadow'		: style,
					'-webkit-text-shadow'	: style
				});
		}
		else
		{
			$image
				.removeClass('textshadow')
				.css({
						'textShadow'				: 'none',
						'text-shadow'			: 'none',
						'-moz-text-shadow'		: 'none',
						'-webkit-text-shadow'	: 'none'
					});
		}
	}

	//text shadow
	$('.text_shadow').change(function()
	{
		update_text_shadow($(this).attr('name'));
    });





    //image shadow size
	$('.image_shadow_size').on('change keyup paste', function()
	{
		update_image_shadow($(this).attr('name'));
    });

    //text shadow size
	$('.text_shadow_size').on('change keyup paste', function()
	{
		update_text_shadow($(this).attr('name'));
    });



   //image shadow angle
	$('.shadow_angle').on('change keyup paste', function()
	{
		update_image_shadow($(this).attr('name'));
    });

    //text shadow angle
	$('.shadow_angle').on('change keyup paste', function()
	{
		update_text_shadow($(this).attr('name'));
    });


});

$(document).ready(function(){

function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}
function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}
function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}
function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h}

// colorpickers


  //background
  $('#background_color0').ColorPicker({
    //color: '#53ccd0',
    onShow: function (cp) {
        $(cp).fadeIn(500);
        return false;
    },
    onHide: function (cp) {
        $(cp).fadeOut(500);
        return false;
    },
    onChange: function (hsb, hex, rgb) {
        $('#background_el').css('backgroundColor', '#' + hex);
         $('#background_color1').attr("value",hex);
    }
  });

  //top image shadow
  $('#top_image_shadow_color0').ColorPicker({
    //color: '#53ccd0',
    onShow: function (cp) {
        $(cp).fadeIn(500);
        return false;
    },
    onHide: function (cp) {
        $(cp).fadeOut(500);
        return false;
    },
    onChange: function (hsb, hex, rgb) {


         $('#top_image_shadow_color1').attr("value",hex);

         //get shadow options
	           		var result = $('#top_image_el').css('box-shadow').match(/(-?\d+px)|(rgb\(.+\))/g)
					// result => ['rgb(30, 43, 2)', '-4px', '11px', '8px']
					var color = result[0],
					    x = result[1],
					    y = result[2],
					    blur = result[3];
						size = result[4];
				col="#"+hex;

				R = hexToR(col);
				G = hexToG(col);
				B = hexToB(col);

				newcolor="rgb("+R+", "+G+", "+B+")";
				elem=document.getElementById("top_image_el");
				new1=x+" " +  y +" "+  blur + " "+ size + " "+newcolor;
				elem.style.boxShadow =new1;
				elem.style.MozBoxShadow=new1;
				elem.style.webkitBoxShadow=new1;

    }
  });


   //headline shadow
  $('#headline_shadow_color0').ColorPicker({
    onShow: function (cp) {
        $(cp).fadeIn(500);
        return false;
    },
    onHide: function (cp) {
        $(cp).fadeOut(500);
        return false;
    },
    onChange: function (hsb, hex, rgb) {

         $('#headline_shadow_color1').attr("value",hex);
        //get shadow options
	           		var result = $('#headline_el').css('text-shadow').match(/(-?\d+px)|(rgb\(.+\))/g)
					var color = result[0],
					    x = result[1],
					    y = result[2],
					    blur = result[3];
				col="#"+hex;

				R = hexToR(col);
				G = hexToG(col);
				B = hexToB(col);

				newcolor="rgb("+R+", "+G+", "+B+")";
				elem=document.getElementById("headline_el");
				new1=x+" " +  y +" "+  blur + " "+ newcolor;
				elem.style.textShadow =new1;
				elem.style.MozTextShadow=new1;
				elem.style.webkitTextShadow=new1;
    }
  });

   //headline font color
  $('#headline_font_color0').ColorPicker({
    onShow: function (cp) {
        $(cp).fadeIn(500);
        return false;
    },
    onHide: function (cp) {
        $(cp).fadeOut(500);
        return false;
    },
    onChange: function (hsb, hex, rgb) {
        $('#headline_el').css('color', '#' + hex);
         $('#headline_font_color1').attr("value",hex);
    }
  });


   //center_image shadow
  $('#center_image_shadow_color0').ColorPicker({
    onShow: function (cp) {
        $(cp).fadeIn(500);
        return false;
    },
    onHide: function (cp) {
        $(cp).fadeOut(500);
        return false;
    },
    onChange: function (hsb, hex, rgb) {

         $('#center_image_shadow_color1').attr("value",hex);

		//get shadow options
	           		var result = $('#center_image_el').css('box-shadow').match(/(-?\d+px)|(rgb\(.+\))/g)
					var color = result[0],
					    x = result[1],
					    y = result[2],
					    blur = result[3];
						size = result[4];
				col="#"+hex;

				R = hexToR(col);
				G = hexToG(col);
				B = hexToB(col);

				newcolor="rgb("+R+", "+G+", "+B+")";
				elem=document.getElementById("center_image_el");
				new1=x+" " +  y +" "+  blur + " "+ size + " "+newcolor;
				elem.style.boxShadow =new1;
				elem.style.MozBoxShadow=new1;
				elem.style.webkitBoxShadow=new1;
    }
  });



   //paragraph shadow
  $('#paragraph_shadow_color0').ColorPicker({
    onShow: function (cp) {
        $(cp).fadeIn(500);
        return false;
    },
    onHide: function (cp) {
        $(cp).fadeOut(500);
        return false;
    },
    onChange: function (hsb, hex, rgb) {

         $('#paragraph_shadow_color1').attr("value",hex);
        //get shadow options
	           		var result = $('#paragraph_el').css('text-shadow').match(/(-?\d+px)|(rgb\(.+\))/g)
					var color = result[0],
					    x = result[1],
					    y = result[2],
					    blur = result[3];
				col="#"+hex;

				R = hexToR(col);
				G = hexToG(col);
				B = hexToB(col);

				newcolor="rgb("+R+", "+G+", "+B+")";
				elem=document.getElementById("paragraph_el");
				new1=x+" " +  y +" "+  blur + " "+ newcolor;
				elem.style.textShadow =new1;
				elem.style.MozTextShadow=new1;
				elem.style.webkitTextShadow=new1;
    }
  });

   //paragraph font color
  $('#paragraph_font_color0').ColorPicker({
    onShow: function (cp) {
        $(cp).fadeIn(500);
        return false;
    },
    onHide: function (cp) {
        $(cp).fadeOut(500);
        return false;
    },
    onChange: function (hsb, hex, rgb) {
        $('#paragraph_el').css('color', '#' + hex);
         $('#paragraph_font_color1').attr("value",hex);
    }
  });

   //bottom_image shadow
  $('#bottom_image_shadow_color0').ColorPicker({
    onShow: function (cp) {
        $(cp).fadeIn(500);
        return false;
    },
    onHide: function (cp) {
        $(cp).fadeOut(500);
        return false;
    },
    onChange: function (hsb, hex, rgb) {

         $('#bottom_image_shadow_color1').attr("value",hex);
          //get shadow options
	           		var result = $('#bottom_image_el').css('box-shadow').match(/(-?\d+px)|(rgb\(.+\))/g)
					var color = result[0],
					    x = result[1],
					    y = result[2],
					    blur = result[3];
						size = result[4];
				col="#"+hex;

				R = hexToR(col);
				G = hexToG(col);
				B = hexToB(col);

				newcolor="rgb("+R+", "+G+", "+B+")";
				elem=document.getElementById("bottom_image_el");
				new1=x+" " +  y +" "+  blur + " "+ size + " "+newcolor;
				elem.style.boxShadow =new1;
				elem.style.MozBoxShadow=new1;
				elem.style.webkitBoxShadow=new1;
    }
  });

});

	// uploadify

    $(document).ready(function () {

        var base_url = '<?php echo base_url(); ?>';
	//bf img
       $('#upload-file').click(function (e) {
            e.preventDefault();
            $('#userfile').uploadify('upload', '*');
        });


        $('#userfile').uploadify({

            'debug':false,
            'auto':true,
            'buttonImg'      : base_url + 'images/plus_icon.png',
            'swf': base_url + 'assets/js/jquery/uploadify_31/uploadify.swf',
            'uploader': base_url + 'uploadify_v3/do_upload',
            'cancelImg': base_url + 'js/uploadify/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'',
            'buttonImg'      :  base_url + 'images/plus_icon.png',
            'multi':false,
            'removeCompleted':false,
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
            },
            //change back in block
            'onUploadSuccess' : function(file, file_name, response)
			{
				$('#background_el').css({
					backgroundImage:	'url(' + file_name + ')',
					backgroundSize:		'contain',
					backgroundRepeat:	'no-repeat'
				});
				$('.uploadify-queue').hide();
				$('#background_image_name').val(file.name);
			}
        });

        //top img

     $('#upload-file1').click(function (e) {
            e.preventDefault();
            $('#userfile1').uploadify('upload', '*');
        });


        $('#userfile1').uploadify({

            'debug':false,
            'auto':true,
            'buttonImg'      : base_url + 'images/plus_icon.png',
            'swf': base_url + 'assets/js/jquery/uploadify_31/uploadify.swf',
            'uploader': base_url + 'uploadify_v3/do_upload',
            'cancelImg': base_url + 'js/uploadify/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'',
            'buttonImg'      :  base_url + 'images/plus_icon.png',
            'multi':false,
            'removeCompleted':false,
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
            },
            'onUploadSuccess' : function(file, file_name, response)
			{
				set_item_image('#top_image_el', file_name);
				$('.uploadify-queue').hide();
				$('#top_image_name').val(file.name);
			}
        });

        // center img

         $('#upload-file2').click(function (e) {
            e.preventDefault();
            $('#userfile2').uploadify('upload', '*');
        });


        $('#userfile2').uploadify({

            'debug':false,
            'auto':true,
            'buttonImg'      : base_url + 'images/plus_icon.png',
            'swf': base_url + 'assets/js/jquery/uploadify_31/uploadify.swf',
            'uploader': base_url + 'uploadify_v3/do_upload',
            'cancelImg': base_url + 'js/uploadify/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'',
            'buttonImg'      :  base_url + 'images/plus_icon.png',
            'multi':false,
            'removeCompleted':false,
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
            },
            'onUploadSuccess' : function(file, file_name, response)
			{
				set_item_image('#center_image_el', file_name);
				$('.uploadify-queue').hide();
				$('#center_image_name').val(file.name);
			}
        });

        //bottom ing

           $('#upload-file3').click(function (e) {
            e.preventDefault();
            $('#userfile3').uploadify('upload', '*');
        });


        $('#userfile3').uploadify({

            'debug':false,
            'auto':true,
            'buttonImg'      : base_url + 'images/plus_icon.png',
            'swf': base_url + 'assets/js/jquery/uploadify_31/uploadify.swf',
            'uploader': base_url + 'uploadify_v3/do_upload',
            'cancelImg': base_url + 'js/uploadify/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'userfile',
            'buttonText':'',
            'buttonImg'      :  base_url + 'images/plus_icon.png',
            'multi':false,
            'removeCompleted':false,
            'onUploadStart' : function(vent,ID,fileObj)
			{
                $('.uploadify-queue').show();
            },
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
            },
            'onUploadSuccess' : function(file, file_name, response)
			{
				set_item_image('#bottom_image_el', file_name);
				$('.uploadify-queue').hide();
				$('#bottom_image_name').val(file.name);
			}
        });
    });


</script>

<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="ymp_inner">

<div class="heading_cont clearfix">

<h2 class="h2n"><span style="float: left;">Configure Template</span></h2>


</div>	<!-- end header cont -->



<div class="inner_content">

<div class="tbar">

<a href="#">Add an Ad  </a>

<a href="#" class="active">Configure Template</a>

<a href="#">Preview</a>

<a href="#">Output View</a>

</div>


<div class="configure_template row-fluid">


<div class="span5">
<form action="ads/preview" method="post">
    <p style="overflow: hidden !important;">
            <label>Configure Size:</label>
            <select class="input-block-level" name="banner_id" id="banner_conf">
            	<?php foreach ($banners as $banner):?>>
            		<option <?php if(isset($ad['banner_id'])&&($ad['banner_id']==$banner['banner_id'])) echo'selected';?> value="<?php print_r($banner['banner_size'])?>" ><?php print_r($banner['banner_size'])?></option>
            	<?php endforeach;?>
            </select>
    </p>

    <div class="bar_drop_down_container" style="padding-bottom: 0;">

    <div class="dropdown_bar clearfix" style="margin-top:15px;">

	    <h4 class="pull-left">BACKGROUND PROPERTIES</h4>
	    <span class="pull-right">

	        <div class="close_conf_link" id="background"></div>
	        <div class="view_conf_link"></div>
	    </span>

    </div>

    <div class="opened_drop_down_bar" id="background_desc">

    	<p class="clearfix newp" style="overflow: hidden !important">
            <label>Image URL:</label>

			<div style="width:397px">
				<div style="float:left; width:356px; padding-right:10px;">
					<input id="background_image_name" type="text" value="" name="background_image_name" class="input-block-level img_up" readonly="readonly" />
				</div>
				<div style="float:left;width:31px;height:30px;position:relative;">
					<?php echo form_upload('userfile','','id="userfile"'); ?>
				</div>
			</div>
			<div class="clearfix"></div>
        </p>

    	<p class="clearfix newp" >
            <label>Click URL:</label>
            <input type="text" value="<?php if(!empty($ad['url']) )print_r($ad['url']); ?>" class="input-block-level cl_url" name="background_el">
        </p>

    	<p class="clearfix newp">
            <label>Background Color:</label>
            <a href="#" class="pull-right"><img src="<?=base_url();?>images/bg_color_img.png" alt="background color" id="background_color0"></a>
            <span>
            	<input id="background_color1" type="text" value="00ff00" size="6" maxlength="6" class="input-block-level">
            </span>
        </p>

    	<p class="clearfix newp">
            <label>Visibility:</label>
            <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input type="radio" value="hide" name="background_v" class="background_v"> Hide
            </label><label class="radio inline">
            	<input type="radio" value="show" name="background_v" class="background_v" checked="checked"> Show
            </label>
            </p>
        </p>

    	<p class="clearfix newp">
            <label>Repeat:</label>
            <select id="repeat" class="input-block-level">
            	<option value="no-repeat">no-repeat</option>
            	<option value="repeat">repeat</option><
            	<option value="repeat-x">repeat-x</option><
            	<option value="repeat-y">repeat-y</option><
            </select></br>

        </p>
        </br>

    </div>


    <div class="dropdown_bar clearfix" >

	    <h4 class="pull-left">TOP IMAGE PROPERTIES</h4>
	    <span class="pull-right">
	    	<div class="close_conf_link" id="top_image"></div>
	        <div class="view_conf_link"></div>
	    </span>

    </div>

    <div class="opened_drop_down_bar" id="top_image_desc">

        <p class="clearfix newp">
            <label>Visibility:</label>
             <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input type="radio" value="hide" name="top_image_el"  class="vis" id="disp_top_n"> Hide
            </label><label class="radio inline">
            	<input type="radio" value="show" name="top_image_el" class="vis" id="disp_top"> Show
            </label>
            </p>
        </p>

    	<p class="clearfix newp">
            <label>Image URL:</label>
			<div style="float:left; width:356px; padding-right:10px;">
				<input id="top_image_name" type="text" value="" name="top_image_name" class="input-block-level img_up" readonly="readonly" />
			</div>
			<div style="float:left;width:31px;height:30px;position:relative;">
				<?php echo form_upload('userfile1','','id="userfile1"'); ?>
			</div>
			<div class="clearfix"></div>
        </p>

        <p class="clearfix newp">
            <label>Click URL:</label>
            <input type="text" value="" class="input-block-level cl_url" name="top_image_el">
        </p>

        <p class="clearfix newp">
            <label id="shsh">Shadow:</label>
            <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input class="image_shadow" type="radio" value="hide" name="top" id="shad_top_n"> Hide
            </label><label class="radio inline">
            	<input class="image_shadow" type="radio" value="show" name="top" id="shad_top"> Show
            </label>
            </p>
        </p>

        <p class="clearfix newp">
            <label>Shadow Color:</label>
            <a href="#" class="pull-right"><img src="<?=base_url();?>images/bg_color_img.png" alt="background color" id="top_image_shadow_color0"></a>
            <span>
            	<input id="top_image_shadow_color1" name="top" type="text" value="00ff00" size="6" maxlength="6" class="image_shadow_color_input input-block-level">
            </span>
        </p>


        <p class="clearfix newp">
            <label>Shadow size:</label>
            <input type="text" value="" name="top" class="image_shadow_size input-block-level" onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>

        <p class="clearfix newp endp">
            <label>Shadow angle:</label>
            <input type="text" value="" name="top" class="shadow_angle input-block-level" onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>

    </div>

    <div class="dropdown_bar clearfix">

	    <h4 class="pull-left">HEADLINE PROPERTIES</h4>
	    <span class="pull-right">
	    	<div class="close_conf_link" id="headline"></div>
	        <div class="view_conf_link"></div>
	    </span>

    </div>

    <div class="opened_drop_down_bar" id="headline_desc">

        <p class="clearfix newp">
            <label>Visibility:</label>
            <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input type="radio" value="hide" name="headline_el" id="disp_head_n" class="vis"> Hide
            </label><label class="radio inline">
            	<input type="radio" value="show" name="headline_el" id="disp_head"  class="vis"> Show
            </label>
            </p>
        </p>

    	<p class="clearfix newp">
            <label>Headline text:</label>
            <input type="text" value="<?php if(!empty($ad['url']) )print_r($ad['url']); ?>" class="input-block-level" id="headline_text">
        </p>

    	<p class="clearfix newp">
            <label>Headline font size:</label>
            <input type="text" value="12" class="input-block-level m_font" name="headline_el" onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>

         <p class="clearfix newp">
            <label>Headline font color:</label>
            <a href="#" class="pull-right"><img src="<?=base_url();?>images/bg_color_img.png" alt="background color" id="headline_font_color0"></a>
            <span>
            	<input id="headline_font_color1" type="text" value="00ff00" size="6" maxlength="6" class="input-block-level">
            </span>
        </p>

        <p class="clearfix newp">
            <label>Headline font:</label>
            <select class="input-block-level" id="headline_font">
	            <option value="Arial">Arial</option>
	            <option value="Helvetica">Helvetica</option>
	            <option value="Times New Roman">Times New Roman</option>
	            <option value="Times">Times</option>
	            <option value="Courier">Courier</option>
	            <option value="Georgia">Georgia</option>
	            <option value="Verdana">Verdana</option>
	            <option value="Tahoma">Tahoma</option>
	            <option value="Cosmic Sans">Cosmic Sans</option>
	            <option value="Garamond">Garamond</option>
            </select></br>
        </p>

        <p class="clearfix newp">
            <label>Headline align:</label>
          <select name="headline_el" class="tex_al input-block-level" >
           		<option value="left">left</option>
           		<option value="center">center</option>
           		<option value="right">right</option>
           	</select>
        </p>

        <p class="clearfix newp">
            <label>Shadow:</label>
             <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input class="text_shadow" type="radio" value="hide" name="headline" id="shad_headline_n"> Hide
            </label><label class="radio inline">
            	<input class="text_shadow" type="radio" value="show" name="headline" id="shad_headline"> Show
            </label>
            </p>
        </p>

         <p class="clearfix newp">
            <label>Shadow Color:</label>
            <a href="#" class="pull-right"><img src="<?=base_url();?>images/bg_color_img.png" alt="background color" id="headline_shadow_color0"></a>
            <span>
            	<input id="headline_shadow_color1" type="text" value="00ff00" size="6" maxlength="6" class="text_shadow_color_input input-block-level" name="headline">
            </span>
        </p>

        <p class="clearfix newp">
            <label>Shadow size:</label>
            <input type="text" value="" name="headline" class="text_shadow_size input-block-level" onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>

        <p class="clearfix newp endp">
            <label>Shadow angle:</label>
            <input type="text"  name="headline" value="" class="shadow_angle input-block-level" onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>
    </div>

    <div class="dropdown_bar clearfix">

	    <h4 class="pull-left">CENTER IMAGE PROPERTIES</h4>
	    <span class="pull-right">
	    	<div class="close_conf_link" id="center_image"></div>
	        <div class="view_conf_link"></div>
	    </span>

    </div>

    <div class="opened_drop_down_bar" id="center_image_desc">

        <p class="clearfix newp">
            <label>Visibility:</label>
             <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input type="radio" value="hide" name="center_image_el" id="disp_center_n"  class="vis"> Hide
            </label><label class="radio inline">
            	<input type="radio" value="show" name="center_image_el" id="disp_center" class="vis"> Show
            </label>
        </p>

    	<p class="clearfix newp">
            <label>Image URL:</label>
			<div style="float:left; width:356px; padding-right:10px;">
				<input id="center_image_name" type="text" value="" name="center_image_name" class="input-block-level img_up" readonly="readonly" />
			</div>
			<div style="float:left;width:31px;height:30px;position:relative;">
				<?php echo form_upload('userfile2','','id="userfile2"'); ?>
			</div>
			<div class="clearfix"></div>
        </p>

        <p class="clearfix newp">
            <label>Click URL:</label>
            <input type="text" value="" class="input-block-level cl_url" name="center_image_el">
        </p>

        <p class="clearfix newp">
            <label>Shadow:</label>
             <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input class="image_shadow" type="radio" value="hide" name="center" id="shad_center_n" > Hide
            </label><label class="radio inline">
            	<input class="image_shadow" type="radio" value="show" name="center"  id="shad_center"> Show
            </label>
            </p>
        </p>

         <p class="clearfix newp">
            <label>Shadow Color:</label>
            <a href="#" class="pull-right"><img src="<?=base_url();?>images/bg_color_img.png" alt="background color" id="center_image_shadow_color0"></a>
            <span>
            	<input id="center_image_shadow_color1" name="center" type="text" value="00ff00" size="6" maxlength="6" class="image_shadow_color_input input-block-level">
            </span>
        </p>

        <p class="clearfix newp">
            <label>Shadow size:</label>
           <input type="text" value="" name="center" class="image_shadow_size input-block-level" onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>

        <p class="clearfix newp endp">
            <label>Shadow angle:</label>
            <input type="text" value="" name="center" class="shadow_angle input-block-level" onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>

    </div>

    <div class="dropdown_bar clearfix">

	    <h4 class="pull-left">PARAGRAPH PROPERTIES</h4>
	    <span class="pull-right">
	    	<div class="close_conf_link" id="paragraph"></div>
	        <div class="view_conf_link"></div>
	    </span>

    </div>

    <div class="opened_drop_down_bar" id="paragraph_desc">

        <p class="clearfix newp">
            <label>Visibility:</label>
            <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input type="radio" value="hide" name="paragraph_el" id="disp_paragraph_n"  class="vis"> Hide
            </label><label class="radio inline">
            	<input type="radio" value="show" name="paragraph_el" id="disp_paragraph"  class="vis"> Show
            </label>
            </p>
        </p>

    	<p class="clearfix newp">
            <label>Paragraph text:</label>
            <input type="text" value="<?php if(!empty($ad['url']) )print_r($ad['url']); ?>" class="input-block-level" id="paragraph_text">
        </p>

    	<p class="clearfix newp">
            <label>Paragraph font size:</label>
            <input type="text" value="12" class="input-block-level m_font" name="paragraph_el" onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>

        <p class="clearfix newp">
            <label>Paragraph font color:</label>
            <a href="#" class="pull-right"><img src="<?=base_url();?>images/bg_color_img.png" alt="background color" id="paragraph_font_color0"></a>
            <span>
            	<input id="paragraph_font_color1" type="text" value="00ff00" size="6" maxlength="6" class="input-block-level">
            </span>
        </p>

        <p class="clearfix newp">
            <label>Paragraph font:</label>
             <select class="input-block-level" id="paragraph_font">
	            <option value="Arial">Arial</option>
	            <option value="Helvetica">Helvetica</option>
	            <option value="Times New Roman">Times New Roman</option>
	            <option value="Times">Times</option>
	            <option value="Courier">Courier</option>
	            <option value="Georgia">Georgia</option>
	            <option value="Verdana">Verdana</option>
	            <option value="Tahoma">Tahoma</option>
	            <option value="Cosmic Sans">Cosmic Sans</option>
	            <option value="Garamond">Garamond</option>
            </select></br>
        </p>

        <p class="clearfix newp">
            <label>Paragraph align:</label>
           	<select name="paragraph_el" class="tex_al input-block-level">
           		<option value="left">left</option>
           		<option value="center">center</option>
           		<option value="right">right</option>
           	</select>
        </p>

        <p class="clearfix newp">
            <label>Shadow:</label>
            <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input class="text_shadow" type="radio" value="hide" name="paragraph" id="shad_paragraph_n"> Hide
            </label><label class="radio inline">
            	<input class="text_shadow" type="radio" value="show" name="paragraph" id="shad_paragraph">Show
            </label>
            </p>
        </p>

         <p class="clearfix newp">
            <label>Shadow Color:</label>
            <a href="#" class="pull-right"><img src="<?=base_url();?>images/bg_color_img.png" alt="background color" id="paragraph_shadow_color0"></a>
            <span>
            	<input id="paragraph_shadow_color1" name="paragraph"  type="text" value="00ff00" size="6" maxlength="6" class="text_shadow_color_input input-block-level">
            </span>
        </p>

        <p class="clearfix newp">
            <label>Shadow size:</label>
            <input type="text" value="" class="text_shadow_size input-block-level" name="paragraph"   onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>

        <p class="clearfix newp endp">
            <label>Shadow angle:</label>
            <input type="text" value=""  class="shadow_angle input-block-level" name="paragraph"  onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>

    </div>

    <div class="dropdown_bar clearfix">

	    <h4 class="pull-left">BOTTOM IMAGE PROPERTIES</h4>
	    <span class="pull-right">
	    	<div class="close_conf_link" id="bottom_image"></div>
	        <div class="view_conf_link"></div>
	    </span>

    </div>

    <div class="opened_drop_down_bar" id="bottom_image_desc">
    	<p class="clearfix newp">
            <label>Visibility:</label>
            <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input type="radio" value="hide" name="bottom_image_el" id="disp_bottom_n" class="vis"> Hide
            </label><label class="radio inline">
            	<input type="radio" value="show" name="bottom_image_el"  id="disp_bottom" class="vis"> Show
            </label>
        </p>

    	<p class="clearfix newp">
            <label>Image URL:</label>
			<div style="float:left; width:356px; padding-right:10px;">
				<input id="bottom_image_name" type="text" value="" name="bottom_image_name" class="input-block-level img_up" readonly="readonly" />
			</div>
			<div style="float:left;width:31px;height:30px;position:relative;">
				<?php echo form_upload('userfile3','','id="userfile3"'); ?>
			</div>
			<div class="clearfix"></div>
		</p>

        <p class="clearfix newp">
            <label>Click URL:</label>
            <input type="text" value="" class="input-block-level cl_url" name="bottom_image_el">
        </p>

        <p class="clearfix newp">
            <label>Shadow:</label>
             <p style="margin-left:-142px; width:397px; padding-bottom:3px;">
            <label class="radio inline">
            	<input class="image_shadow" type="radio" value="hide" name="bottom"  id="shad_bottom_n"> Hide
            </label><label class="radio inline">
            	<input class="image_shadow" type="radio" value="show" name="bottom" id="shad_paragraph"> Show
            </label>
        </p>

       <p class="clearfix newp">
            <label>Shadow Color:</label>
            <a href="#" class="pull-right"><img src="<?=base_url();?>images/bg_color_img.png" alt="background color" id="bottom_image_shadow_color0"></a>
            <span>
            	<input id="bottom_image_shadow_color1" name="bottom" type="text" value="00ff00" size="6" maxlength="6" class="image_shadow_color_input input-block-level">
            </span>
        </p>

        <p class="clearfix newp">
            <label>Shadow size:</label>
            <input type="text" value="" name="bottom" class="image_shadow_size input-block-level" onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>

        <p class="clearfix newp endp">
            <label>Shadow angle:</label>
            <input type="text" value="" name="bottom" class="shadow_angle input-block-level" onkeyup="this.value = this.value.replace (/\D/, '')">
        </p>
    </div>
    <div style="width:397px;height:1px; background:gray;"></div>

    </div>

    <div class="text-center" style=" margin-top: 15px;">
        <button class="btn"  type="button" onClick="window.location='<?php  echo site_url('ads/index/'.$ad['ads_id']); ?>'">Cancel</button> &nbsp;
        <button id="cont" class="btn"  type="button">Save</button> &nbsp;
        <button  class="btn" type="button" onClick="window.location='<?php  echo site_url('ads/preview/'.$ad['ads_id']); ?>'">Continue</button>
       	<span id="result" class="error" style="color:red; position: absolute; margin-left: 14px; margin-top:8px;"></span>
    </div>

    </form>
</div>





<div class="cfr_ttl clearfix" style="float:left;  width:567px;margin-left:25px;">

<label class="pull-left" style="font-size:22px;">Edit Element:</label>

<span class="pull-right ndate">Last Modified:
<?php
		$date = date("d F h:ia\; Y", strtotime($ad['last_edit_date']));echo $date;
?>
</span>

</div>
<div class="span7" id="cont_div"  style="position: relative;overflow-x: auto; overflow-y:hidden; border: 1px solid black; height: 950px; max-width: width:567px; background: white;">

  <?php print_r($ad['ads_content']);?>

</div>






</div>

</div><!-- end inner container -->

</div>
<!--end ymp innder for left right padding-->


</div>

</div>

</div>

</div>
