$(function(){
	
	// Nav Slide Toggle
	var submenu = $('#nav .sub-menu');
	var trigger = submenu.siblings('a');
	
	trigger.prepend('<span class="arrow">&#9662;&nbsp;</span>');
	trigger.toggle( function(){
		$(this).addClass('open').children('span').html('&#9652;&nbsp;');
		submenu.stop(true, true).slideDown(250);
		return false;
	}, function(){
		$(this).removeClass('open').children('span').html('&#9662;&nbsp;');
		submenu.stop(true, true).slideUp(250);
		return false;
	});

	// Gallery
	function formatText(index, panel) {
    		  return "&bull;";
    	  };
	
	$('#jqGallery').anythingSlider({
		easing: 'easeInOutExpo',
		delay: 6000,
		animationTime: 1000,
		buildNavigation:true,
		navigationFormatter: formatText
	});
	
	// Awesomeness
	konami = new Konami()
	konami.code = function(){
		$('body').fadeOut().addClass('secret').fadeIn();
		$('.pageWrap, #topBar').hide();
		$('<a href="#" id="jqBack">&laquo; Back</a>').appendTo('body');
	};
	konami.load();
	
	// Undo Awesomeness
	$('#jqBack').live('click', function(){
		$('.pageWrap, #topBar').fadeIn();
		$('body').removeClass('secret');
		$(this).hide();
		return false;
	});
	
});