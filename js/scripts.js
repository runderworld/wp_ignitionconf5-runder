jQuery(window).on("load", function () {

	/* -----------------------------------------
	 Sliders Functionality
	 ----------------------------------------- */
	jQuery("#main-slider").flexslider({
		slideshow:  false,
		controlNav: false,
		animation:  "slide",
		start:      centerSlider,
		sync:       jQuery("#image-slider")
	});

	jQuery("#image-slider").flexslider({
		slideshow:      false,
		controlNav:     false,
		directionNav:   false,
		animationSpeed: 1000
	});

	/* -----------------------------------------
	 Center the main slider
	 ----------------------------------------- */
	function centerSlider() {
		var	mainSlider   = jQuery("#main-slider"),
			imageSlider  = jQuery("#image-slider"),
			imageHeight  = imageSlider.height(),
			imageWidth   = imageSlider.width(),
			sliderHeight = mainSlider.height(),
			sliderWidth  = mainSlider.width();

		mainSlider.css({
			"left": imageWidth/2 - sliderWidth /2,
			"top": imageHeight/2 - sliderHeight/2
		});
	}
	jQuery(window).on("resize", centerSlider);

	/* -----------------------------------------
	 Handle Qtip for Speakers/Keynotes/Artists
	 ----------------------------------------- */
	var $speaker = jQuery(".speaker-pres");
	var $keynote = jQuery(".keynote");
	var $artist  = jQuery(".artist" );

	function initQtipForSpeakers(tooltipWidth, tooltipHeight, yPos) {
		$speaker.each(function () {
			var that = jQuery(this);
			that.qtip({
				show: {
					event: 'click',
					solo: true
				},
				hide: {
					event: 'unfocus'
				},
				content: jQuery(this).parent().find(".speaker-desc").clone(),
				position: {
					my: 'left center',
					at: 'right center',
					target: that,
					viewport: jQuery("#speakers").find(".row"),
					adjust: {
						x: 6,
						y: -yPos,
						screen: true,
						target: jQuery(document),
						resize: false
					}
				},
				style: {
					classes: 'qtip-dark qtip-shadow qtip-rounded',
					width: tooltipWidth,
					height: tooltipHeight,
					tip: {
						mimic: 'center',
						height: 4,
						width: 10,
						border: 4
					}
				},
				events: {
					visible: function (event, api) {
						jQuery(this).parent().find(".speaker-desc").mCustomScrollbar();
						jQuery('.mCustomScrollBox > .mCSB_scrollTools').animate({opacity: 1});
					},
					hidden: function (event, api) {
						jQuery(this).qtip('destroy');
						jQuery(this).parent().find(".speaker-desc").mCustomScrollbar('destroy');
					}
				}
			});
		}); // end: $speaker.each()
	} // end: function initQtipForSpeakers()

	function initQtipForKeynotes(tooltipWidth, tooltipHeight, yPos) {
		$keynote.each(function (idx) {
			// Keynote speakers are aligned horizontally and thus require
			// different tooltip positioning depending on the item.
			// http://qtip2.com/options#position.basic
			var attrMy, attrAt;
			switch (idx) {
				case 0:  // Left Keynote box
					attrMy = 'right center';
					attrAt = 'center';
					break;
				case 1:  // Middle Keynote box
					attrMy = 'center';
					attrAt = 'center';
					break;
				case 2:  // Right Keynote box
					attrMy = 'left center';
					attrAt = 'right center';
					break;
				default:
			}
			var that = jQuery(this);
			that.qtip({
				show: {
					event: 'click',
					solo: true
				},
				hide: {
					event: 'unfocus'
				},
				content: jQuery(this).find(".keynote-desc").clone(),
				position: {
					my: attrMy,
					at: attrAt,
					target: that,
					viewport: jQuery("#keynotes").find(".row"),
					adjust: {
						x: 6,
						y: -yPos,
						screen: true,
						target: jQuery(document),
						resize: false
					}
				},
				style: {
					classes: 'qtip-dark qtip-shadow qtip-rounded',
					width: tooltipWidth,
					height: tooltipHeight,
					tip: {
						mimic: 'center',
						height: 4,
						width: 10,
						border: 4
					}
				},
				events: {
					visible: function (event, api) {
						jQuery(this).find(".keynote-desc").mCustomScrollbar();
						jQuery('.mCustomScrollBox > .mCSB_scrollTools').animate({opacity: 1});
					},
					hidden: function (event, api) {
						jQuery(this).qtip('destroy');
						jQuery(this).find(".keynote-desc").mCustomScrollbar('destroy');
					}
				}
			});
		}); // end: $keynote.each()
	} // end: function initQtipForKeynotes()

	function initQtipForArtists(tooltipWidth, tooltipHeight, yPos) {
		$artist.each(function (idx) {
			// Artists are aligned horizontally and thus require
			// different tooltip positioning depending on the item.
			// http://qtip2.com/options#position.basic
			var attrMy, attrAt;
			switch (idx) {
				case 0:  // Left Artist box
					attrMy = 'right center';
					attrAt = 'center';
					break;
				case 1:  // Middle Artist box
					attrMy = 'center';
					attrAt = 'center';
					break;
				case 2:  // Right Artist box
					attrMy = 'left center';
					attrAt = 'right center';
					break;
				default:
			}
			var that = jQuery(this);
			that.qtip({
				show: {
					event: 'click',
					solo: true
				},
				hide: {
					event: 'unfocus'
				},
				content: jQuery(this).find(".artist-desc").clone(),
				position: {
					my: attrMy,
					at: attrAt,
					target: that,
					viewport: jQuery("#artists").find(".row"),
					adjust: {
						x: 6,
						y: -yPos,
						screen: true,
						target: jQuery(document),
						resize: false
					}
				},
				style: {
					classes: 'qtip-dark qtip-shadow qtip-rounded',
					width: tooltipWidth,
					height: tooltipHeight,
					tip: {
						mimic: 'center',
						height: 4,
						width: 10,
						border: 4
					}
				},
				events: {
					visible: function (event, api) {
						jQuery(this).find(".artist-desc").mCustomScrollbar();
						jQuery('.mCustomScrollBox > .mCSB_scrollTools').animate({opacity: 1});
					},
					hidden: function (event, api) {
						jQuery(this).qtip('destroy');
						jQuery(this).find(".artist-desc").mCustomScrollbar('destroy');
					}
				}
			});
		}); // end: $artist.each()
	} // end: function initQtipForArtists()

	function doQtipForSpeakers() {
		var tooltipWidth = (($speaker.outerWidth()) * 3) - ($speaker.outerWidth() - $speaker.width()) + 2,
				tooltipHeight = $speaker.height() + 2,
				yPos = jQuery("#header").outerHeight() - 4;
		initQtipForSpeakers(tooltipWidth, tooltipHeight, yPos);
	}

	function doQtipForKeynotes() {
		var tooltipWidth = (($keynote.outerWidth()) * 2) - ($keynote.outerWidth() - $keynote.width()) + 2,
				tooltipHeight = $keynote.height() + 2,
				yPos = jQuery("#header").outerHeight() - 4;
		initQtipForKeynotes(tooltipWidth, tooltipHeight, yPos);
	}

	function doQtipForArtists() {
		var tooltipWidth = (($artist.outerWidth()) * 2) - ($artist.outerWidth() - $artist.width()) + 2,
				tooltipHeight = $artist.height() + 2,
				yPos = jQuery("#header").outerHeight() - 4;
		initQtipForArtists(tooltipWidth, tooltipHeight, yPos);
	}

	$speaker.click(doQtipForSpeakers);

	$keynote.click(doQtipForKeynotes);

	$artist.click(doQtipForArtists);

	// First handle Speakers
	doQtipForSpeakers();

	// Now do the same for Keynotes
	doQtipForKeynotes();

	// Now do the same for Artists
	doQtipForArtists();

	/* -----------------------------------------
	 Responsive Menus Init with jPanelMenu
	 ----------------------------------------- */
	var jPM = jQuery.jPanelMenu({
		menu: '#navigation',
		trigger: '.menu-trigger',
		excludedPanelContent: "style, script, #wpadminbar"
	});

	var jRes = jRespond([
		{
			label: 'mobile',
			enter: 0,
			exit: 767
		}
	]);

	jRes.addFunc({
		breakpoint: 'mobile',
		enter: function () {
			jPM.on();

			// First handle Speakers
			var tooltipWidth = $speaker.width() + 2,
					tooltipHeight = $speaker.height() + 2;
			initQtipForSpeakers(tooltipWidth, tooltipHeight, 0);
			$speaker.click(function () {
				var tooltipWidth = $speaker.width() + 2,
						tooltipHeight = $speaker.height() + 2;
				initQtipForSpeakers(tooltipWidth, tooltipHeight, 0);
			});
			
			// Now do the same for Keynotes
			tooltipWidth = $keynote.width() + 2;
			tooltipHeight = $keynote.height() + 2;
			initQtipForKeynotes(tooltipWidth, tooltipHeight, 0);
			$keynote.click(function () {
				var tooltipWidth = $keynote.width() + 2,
						tooltipHeight = $keynote.height() + 2;
				initQtipForKeynotes(tooltipWidth, tooltipHeight, 0);
			});
			
			// Now do the same for Artists
			tooltipWidth = $artist.width() + 2;
			tooltipHeight = $artist.height() + 2;
			initQtipForArtists(tooltipWidth, tooltipHeight, 0);
			$artist.click(function () {
				var tooltipWidth = $artist.width() + 2,
						tooltipHeight = $artist.height() + 2;
				initQtipForArtists(tooltipWidth, tooltipHeight, 0);
			});
		},
		exit: function () {
			jPM.off();
			
			var tooltipWidth = (($speaker.outerWidth()) * 2) - ($speaker.outerWidth() - $speaker.width()) + 2,
					tooltipHeight = $speaker.height() + 2,
					yPos = jQuery("#header").outerHeight() - 4;

			// First handle Speakers
			$speaker.click(function () {
				var tooltipWidth = (($speaker.outerWidth()) * 2) - ($speaker.outerWidth() - $speaker.width()) + 2,
						tooltipHeight = $speaker.height() + 2,
						yPos = jQuery("#header").outerHeight() - 4;

				initQtipForSpeakers(tooltipWidth, tooltipHeight, yPos);
			});
			initQtipForSpeakers(tooltipWidth, tooltipHeight, yPos);

			// Now do the same for Keynotes
			tooltipWidth = (($keynote.outerWidth()) * 2) - ($keynote.outerWidth() - $keynote.width()) + 2;
			tooltipHeight = $keynote.height() + 2;
			$keynote.click(function () {
				var tooltipWidth = (($keynote.outerWidth()) * 2) - ($keynote.outerWidth() - $keynote.width()) + 2,
						tooltipHeight = $keynote.height() + 2,
						yPos = jQuery("#header").outerHeight() - 4;

				initQtipForKeynotes(tooltipWidth, tooltipHeight, yPos);
			});
			initQtipForKeynotes(tooltipWidth, tooltipHeight, yPos);

			// Now do the same for Artists
			tooltipWidth = (($artist.outerWidth()) * 2) - ($artist.outerWidth() - $artist.width()) + 2;
			tooltipHeight = $artist.height() + 2;
			$artist.click(function () {
				var tooltipWidth = (($artist.outerWidth()) * 2) - ($artist.outerWidth() - $artist.width()) + 2,
						tooltipHeight = $artist.height() + 2,
						yPos = jQuery("#header").outerHeight() - 4;

				initQtipForArtists(tooltipWidth, tooltipHeight, yPos);
			});
			initQtipForArtists(tooltipWidth, tooltipHeight, yPos);
		}
	});

	/* -----------------------------------------
	 Smooth Scroll Init
	 ----------------------------------------- */
	jQuery('body').on("click", ".sf-menu a.scroll", function (e) {
		$target = jQuery(this).attr('href');
		jQuery.smoothScroll({
			offset: -120,
			scrollTarget: $target,
			speed: 1000,
			beforeScroll: function () {
				jPM.close();
			}
		});
		e.preventDefault();
	});
});

jQuery(document).ready(function ($) {

	/* -----------------------------------------
	 Speakers - Effects Init
	 ----------------------------------------- */
	$speaker = $(".speaker-pres");
	$speaker.hover(function () {
		$(this).find('h3').stop().animate({"opacity": 1}, 300);
	}, function () {
		$(this).find('h3').stop().animate({"opacity": 0}, 300);
	});
	
	/* -----------------------------------------
	 Keynotes - Effects Init
	 ----------------------------------------- */
	$keynote = $(".keynote");
	$keynote.hover(function () {
		$(this).find('h3').stop().animate({"opacity": 1}, 300);
	}, function () {
		$(this).find('h3').stop().animate({"opacity": 0}, 300);
	});
	
	/* -----------------------------------------
	 Artists - Effects Init
	 ----------------------------------------- */
	$artist = $(".artist");
	$artist.hover(function () {
		$(this).find('h3').stop().animate({"opacity": 1}, 300);
	}, function () {
		$(this).find('h3').stop().animate({"opacity": 0}, 300);
	});

	$(window).scroll(function () {
		if ($(this).scrollTop() > 400) {
			$('#btop').fadeIn('slow');
		} else {
			$('#btop').fadeOut('slow');
		}
	});

	$('#btop').click(function (e) {
		$.smoothScroll({
			scrollTarget: '#page',
			speed: 1000
		});
		e.preventDefault();
	});

	$('.logo a').click(function (e) {
		$.smoothScroll({
			scrollTarget: '#page',
			speed: 1000
		});
		e.preventDefault();
	});

	/* -----------------------------------------
	 Map Init
	 ----------------------------------------- */
	if( $('div#map').length ) {
		initMap();
	}

});

/* -----------------------------------------
 Map Configuration
 ----------------------------------------- */
function initMap() {
	var myLatLng = new google.maps.LatLng(ThemeOption.map_coords_lat,ThemeOption.map_coords_long);

	var mapOptions = {
		zoom: parseInt(ThemeOption.map_zoom_level),
		center: myLatLng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	};

	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	var contentString = '<div id="content">'+ThemeOption.map_tooltip+'</div>';

	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});

	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		title: ''
	});
	google.maps.event.addListener(marker, 'click', function () {
		infowindow.open(map,marker);
	});
}
