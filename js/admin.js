$(document).ready(function()
{
	$("a.RemovePopup").click(function () {
		var id = 	this.title;	
		
		$(".popup-mask").show();
		$("#popup_container"+id).show();
	});
	
	
	$('a.confirm_action').click(function()
	{
		var confirm_content = '<div class="confirm_message">' + this.title + '</div>';
		confirm_content += '<div class="confirm_buttons">';
		confirm_content += '<a href="' + this.href + '" style="color:#000;font-weight:800;" onclick="window.location=\''+ this.href +'\'"><strong>Yes</strong></a> ';
		confirm_content += '<a href="#" class="simplemodal-close" style="color:#000;font-weight:800;"><strong>No</strong></a>';
		confirm_content += '</div>';
		$('#osx-modal-title').html('Confirm Action');
		$('#osx-modal-data').html(confirm_content);
		$("#osx-modal-content").modal({
			overlayId: 'osx-overlay',
			containerId: 'osx-container',
			closeHTML: '<div class="close"><a href="#" class="simplemodal-close">x</a></div><div id="osx-modal-data">'+confirm_content+'</div>',
			minHeight:80,
			opacity:65, 
			position:['0',],
			overlayClose:true,
			onOpen:OSX.open,
			onClose:OSX.close
		});
		return false;
	});

});
		function CancelRemovePopup(id) { 
			$(".popup-mask").hide();
			$("#popup_container"+id).hide();
		}
var OSX = {
		container: null,
		open: function (d) {
			var self = this;
			self.container = d.container[0];
			d.overlay.fadeIn('slow', function () {
				$("#osx-modal-content", self.container).show();
				var title = $("#osx-modal-title", self.container);
				title.show();
				d.container.slideDown('slow', function () {
					setTimeout(function () {
						var h = $("#osx-modal-data", self.container).height()
							+ title.height()
							+ 20; // padding
						d.container.animate(
							{height: h}, 
							200,
							function () {
								$("div.close", self.container).show();
								$("#osx-modal-data", self.container).show();
							}
						);
					}, 300);
				});
			})
		},
		close: function (d) {
			var self = this;
			d.container.animate(
				{top:"-" + (d.container.height() + 20)},
				500,
				function () {
					self.close(); // or $.modal.close();
				}
			);
		}
	};
function openForm(url) 
{ 
	$.ajax({

	   type: "POST",

	   url: url,

	   success: function(msg){
		
		$("#basic-modal-content").html(msg);
		
		var maskHeight = $(document).height();    
		var maskWidth = $(window).width();  
		$('#gray_bak').css({height:maskHeight, width:maskWidth}).show();  
		$('#content').show();
		$('#basic-modal-content').modal();
		
		}

	 });	   
}
function closePP()
{
	$('#content').hide();
	$('#gray_bak').hide();
	$.modal.close();
}	
