(function($){
	
var selected_elem = $(".navbar .nav > li.active"),
	next = selected_elem.next('li') || null,
	prev = selected_elem.prev('li') || null;
	
$(selected_elem).addClass('no_bg');
	
$(next).addClass('no_bg');
	
$(prev).addClass('no_bg');

})(jQuery);